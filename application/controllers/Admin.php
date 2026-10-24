<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->database();
        // Memuat library form validation untuk mempermudah validasi data
        $this->load->library(['session', 'form_validation']); 
        $this->load->helper(['url','form']);
        $this->load->model('Website_model'); 
        $this->load->model('Website_admin_link_model');
        // Pastikan Anda telah menginstal dan mengkonfigurasi CodeIgniter
        // untuk menggunakan fitur password hashing (PHP >= 5.5)
    }

    public function register() {
        

        // Aturan validasi
        $this->form_validation->set_rules('nama', 'Nama Lengkap', 'required|max_length[100]');
        $this->form_validation->set_rules('username', 'Username', 'required|min_length[5]|max_length[150]|is_unique[portal_admin.username]', [
            'is_unique' => 'Username ini sudah terdaftar. Silakan gunakan username lain.'
        ]);
        $this->form_validation->set_rules('password', 'Password', 'required|min_length[6]');
        $this->form_validation->set_rules('passconf', 'Konfirmasi Password', 'required|matches[password]');
        // Role bisa diset default 'editor' atau 'superadmin' (untuk yang pertama kali)
        // $this->form_validation->set_rules('role', 'Role', 'required|in_list[superadmin,editor]');

        if ($this->form_validation->run() == FALSE) {
            // Jika validasi gagal atau form baru dibuka
            $this->load->view('admin/register'); // Anda perlu membuat file view ini
        } else {
            // Jika validasi sukses, masukkan data ke database
            $data = array(
                'nama'          => $this->input->post('nama'),
                'username'      => $this->input->post('username'),
                // Menggunakan password_hash() untuk keamanan
                'password_hash' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
                // 'role'          => $this->input->post('role')
            );

            $this->db->insert('portal_admin', $data);
            
            // Log aktivitas (opsional, tapi disarankan)
            $log_data = array(
                'id_admin'  => $this->session->userdata('admin_id') ? $this->session->userdata('admin_id') : NULL, // ID admin yang mendaftarkan, NULL jika pendaftaran pertama
                'aktivitas' => 'Admin baru didaftarkan: ' . $this->input->post('username')
            );
            $this->db->insert('portal_log', $log_data);

            // Set flashdata untuk pesan sukses
            $this->session->set_flashdata('success', 'Akun admin berhasil didaftarkan! Silakan login.');
            redirect('admin/login');
        }
    }
    
    // Login form (diperbaiki agar menggunakan 'username' sesuai DB)
    public function login() {
        // Cek jika sudah login, alihkan ke dashboard
        if ($this->session->userdata('admin_id')) {
            redirect('admin/dashboard');
        }
        
        // Cek jika ada data POST
        if ($this->input->post()) {
            $username = $this->input->post('username'); // Menggunakan username
            $password = $this->input->post('password');

            // Cari admin berdasarkan username
            $admin = $this->db->where('username', $username)->get('portal_admin')->row();
            
            // Verifikasi admin dan password
            if ($admin && password_verify($password, $admin->password_hash)) {
                // Login sukses
                $this->session->set_userdata('admin_id', $admin->id_admin);
                $this->session->set_userdata('admin_name', $admin->nama);
                $this->session->set_userdata('admin_role', $admin->role);

                // Log aktivitas
                $log_data = array(
                    'id_admin'  => $admin->id_admin,
                    'aktivitas' => 'Login ke portal admin'
                );
                $this->db->insert('portal_log', $log_data);

                redirect('admin/dashboard');
            } else {
                // Login gagal
                $data['error'] = "Username atau password salah!";
                $this->load->view('admin/login', $data); // Anda perlu membuat file view ini
                return;
            }
        }
        
        // Tampilkan form login
        $this->load->view('admin/login'); // Anda perlu membuat file view ini
    }

    // Logout
    public function logout() {
        // Log aktivitas sebelum logout
        if ($this->session->userdata('admin_id')) {
             $log_data = array(
                'id_admin'  => $this->session->userdata('admin_id'),
                'aktivitas' => 'Logout dari portal admin'
            );
            $this->db->insert('portal_log', $log_data);
        }
        
        $this->session->unset_userdata(['admin_id', 'admin_name', 'admin_role']);
        redirect('admin/login');
    }

    // Dashboard
    // Update fungsi dashboard di application/controllers/Admin.php

    public function dashboard()
{
    // Pastikan user sudah login
    $this->_require_login();

    /* ==========================
       1. Ambil Data Statistik
    =========================== */
    $data['total_websites']      = $this->db->count_all('website');
    $data['total_admin_links']   = $this->db->count_all('website_admin_link');
    $data['total_categories']    = $this->db->count_all('kategori');
    $data['total_admin_users']   = $this->db->count_all('portal_admin');

    /* =========================================
       2. Ambil 10 Log Aktivitas Terbaru
          (JOIN dengan portal_admin untuk nama)
    ========================================== */
    $data['latest_logs'] = $this->db
        ->select('portal_log.*, portal_admin.nama')
        ->from('portal_log')
        ->join('portal_admin', 'portal_admin.id_admin = portal_log.id_admin', 'left')
        ->order_by('portal_log.waktu', 'DESC')
        ->limit(10)
        ->get()
        ->result();

    /* ==========================
       3. Tampilkan Halaman View
    =========================== */
    $this->load->view('admin/sidebar');
    $this->load->view('admin/header', $data);
    $this->load->view('admin/dashboard', $data);
    $this->load->view('admin/footer');
}


    // CRUD Website (Lanjutan...)
    public function website() // Mengganti nama fungsi dari 'index' menjadi 'website'
    {
        $data['title'] = 'Manajemen Website';
        $data['websites'] = $this->Website_model->get_all(); // Ambil semua data website

    
        $this->load->view('admin/sidebar');
        $this->load->view('admin/header', $data);
        $this->load->view('admin/website/index', $data); // Menggunakan view index yang sama
        $this->load->view('admin/footer');
    }

    // Halaman Tambah dan Proses Tambah
    public function website_tambah()
    {
        $data['title'] = 'Tambah Website Baru';

        $this->form_validation->set_rules('nama_website', 'Nama Website', 'required|trim');
        $this->form_validation->set_rules('slug', 'Slug', 'required|trim|is_unique[website.slug]');
        $this->form_validation->set_rules('user_url', 'URL Publik', 'required|valid_url');

        if ($this->form_validation->run() == FALSE)
        {
            // Tampilkan form tambah
            $this->load->view('admin/sidebar');
            $this->load->view('admin/header', $data);
            $this->load->view('admin/website/form', $data);
            $this->load->view('admin/footer');
        }
        else
        {
            // --- Logika Upload Gambar ---
            $upload_image = '';
            if (!empty($_FILES['image']['name'])) {
                $config['upload_path'] = './uploads/website_icons/';
                $config['allowed_types'] = 'gif|jpg|png|jpeg';
                $config['max_size'] = 2048; 
                $config['file_name'] = url_title($this->input->post('slug'), 'dash', TRUE);

                $this->load->library('upload', $config);
                
                if ($this->upload->do_upload('image')) {
                    $upload_image = $this->upload->data('file_name');
                } else {
                    $this->session->set_flashdata('error', $this->upload->display_errors());
                    redirect('admin/website_tambah');
                    return;
                }
            }
            // --- Akhir Logika Upload Gambar ---

            // Data untuk disimpan
            $insert_data = array(
                'nama_website'  => $this->input->post('nama_website'),
                'slug'          => $this->input->post('slug'),
                'deskripsi'     => $this->input->post('deskripsi'),
                'user_url'      => $this->input->post('user_url'),
                'image'         => $upload_image,
                'is_active'     => $this->input->post('is_active') ? 1 : 0,
                'dibuat_pada'   => $this->input->post('dibuat_pada')
            );

            $this->Website_model->insert($insert_data);
            $this->session->set_flashdata('success', 'Data website berhasil ditambahkan.');
            redirect('admin/website');
        }
    }

    // Halaman Edit dan Proses Edit
    public function website_edit($id = null)
{
    // 1. Validasi ID dan Ambil Data Lama
    if ($id === null || !$data['website'] = $this->Website_model->get_by_id($id)) {
        $this->session->set_flashdata('error', 'Data tidak ditemukan.');
        redirect('admin/website');
    }

    $data['title'] = 'Edit Website: ' . $data['website']->nama_website;
    
    // Set Rules
    $this->form_validation->set_rules('nama_website', 'Nama Website', 'required|trim');
    $this->form_validation->set_rules('slug', 'Slug', 'required|trim|callback_website_slug_check[' . $id . ']');
    $this->form_validation->set_rules('user_url', 'URL Publik', 'required|valid_url');

    if ($this->form_validation->run() == FALSE)
    {
        // Tampilkan Form (Jika Validasi Gagal)
        $this->load->view('admin/sidebar');
        $this->load->view('admin/header', $data);
        $this->load->view('admin/website/form', $data);
        $this->load->view('admin/footer');
    }
    else
    {
        // 2. Definisikan Data Update Non-File
        $update_data = array(
            'nama_website'  => $this->input->post('nama_website'),
            'slug'          => $this->input->post('slug'),
            'deskripsi'     => $this->input->post('deskripsi'),
            'user_url'      => $this->input->post('user_url'),
            'is_active'     => $this->input->post('is_active') ? 1 : 0,
            'dibuat_pada'   => $this->input->post('dibuat_pada')
        );
        
        // AMBIL NAMA FILE LAMA DARI KOLOM 'image'
        $gambar_lama = $data['website']->image; 
        
        // PATH UPLOAD ABSOLUT
        $upload_dir = FCPATH . 'uploads/website_icons/'; 

        // 3. LOGIKA UPLOAD DAN GANTI GAMBAR
        
        // Konfigurasi Upload
        $config['upload_path']   = $upload_dir;
        $config['allowed_types'] = 'gif|jpg|png|jpeg';
        $config['max_size']      = 2048; // 2MB
        $config['file_name']     = 'icon_' . $id . '_' . time(); 
        
        // Pastikan folder ada dan berizin
        if (!is_dir($upload_dir)) {
            @mkdir($upload_dir, 0777, TRUE);
        }
        
        $this->load->library('upload', $config);
        $this->upload->initialize($config); 
        
        // Field name di form harus 'gambar'
        if (!empty($_FILES['gambar']['name'])) 
        {
            if ($this->upload->do_upload('gambar'))
            {
                // Upload sukses
                $upload_data = $this->upload->data();
                
                // UPDATE KE KOLOM 'image'
                $update_data['image'] = $upload_data['file_name']; 
                
                // Hapus file lama (jika ada dan bukan file default/kosong)
                if ($gambar_lama && file_exists($upload_dir . $gambar_lama)) {
                    @unlink($upload_dir . $gambar_lama);
                }
            }
            else
            {
                // Upload gagal
                $error_message = $this->upload->display_errors('', '');
                $this->session->set_flashdata('error', 'Gagal mengupload gambar: ' . $error_message);
                redirect('admin/website/edit/' . $id);
                return;
            }
        }
        
        // 4. Lakukan Update Data
        $this->Website_model->update($id, $update_data);
        
        $this->session->set_flashdata('success', 'Data website berhasil diperbarui.');
        redirect('admin/website');
    }
}

    // Proses Hapus
    public function website_hapus($id = null)
    {
        if ($id === null || !$this->Website_model->get_by_id($id)) {
            $this->session->set_flashdata('error', 'Data tidak ditemukan.');
        } else {
            // Tambahkan logika hapus file gambar dari server di sini
            $this->Website_model->delete($id);
            $this->session->set_flashdata('success', 'Data website berhasil dihapus.');
        }
        redirect('admin/website');
    }
    
    // Callback validasi untuk memastikan slug unik saat edit
    public function website_slug_check($slug, $id) {
        $check = $this->Website_model->check_slug_exists($slug, $id);
        if ($check) {
            $this->form_validation->set_message('website_slug_check', 'Slug sudah digunakan oleh website lain.');
            return FALSE;
        }
        return TRUE;
    }
    // Fungsi pembantu untuk mengecek status login
    private function _require_login() {
        if (!$this->session->userdata('admin_id')) {
            redirect('admin/login');
        }
    }
    public function admin_link()
{
    $this->_require_login();
    $data['title'] = 'Manajemen Link Admin Pintas';
    // Gunakan Website_admin_link_model untuk mengambil semua link
    $data['links'] = $this->Website_admin_link_model->get_all_with_website_name(); 
    
    // Set halaman aktif untuk sidebar
    $data['current_page'] = 'admin_link';

    $this->load->view('admin/sidebar', $data);
    $this->load->view('admin/header', $data);
    $this->load->view('admin/admin_link/index', $data);
    $this->load->view('admin/footer');
}

// application/controllers/Admin.php

public function admin_link_tambah()
{
    $this->_require_login();
    $data['title'] = 'Tambah Link Admin Baru';
    $data['websites'] = $this->Website_model->get_all(); // Ambil daftar website
    
    $this->form_validation->set_rules('id_website', 'Website', 'required|integer');
    $this->form_validation->set_rules('label', 'Label Link', 'required|max_length[150]');
    $this->form_validation->set_rules('url', 'URL', 'required|valid_url|max_length[1000]');

    if ($this->form_validation->run() == FALSE)
    {
        $data['current_page'] = 'admin_link';
        $this->load->view('admin/sidebar', $data);
        $this->load->view('admin/header', $data);
        $this->load->view('admin/admin_link/form', $data);
        $this->load->view('admin/footer');
    }
    else
    {
        // --- Logika Upload Gambar ---
        $upload_image = '';
        if (!empty($_FILES['image']['name'])) {
            $config['upload_path'] = './uploads/website_admin_link/'; // Path folder upload
            $config['allowed_types'] = 'gif|jpg|png|jpeg|svg';
            $config['max_size'] = 2048; // Maksimal 2MB
            // Nama file menggunakan slug website + label link
            $website = $this->Website_model->get_by_id($this->input->post('id_website'));
            $file_name_slug = url_title($website->slug . '-' . $this->input->post('label'), 'dash', TRUE);
            $config['file_name'] = $file_name_slug;

            $this->load->library('upload', $config);
            
            if ($this->upload->do_upload('image')) {
                $upload_image = $this->upload->data('file_name');
            } else {
                $this->session->set_flashdata('error', 'Gagal Upload Gambar: ' . $this->upload->display_errors());
                redirect('admin/admin_link_tambah');
                return;
            }
        }
        // --- Akhir Logika Upload Gambar ---
        
        $insert_data = array(
            'id_website'  => $this->input->post('id_website'),
            'label'       => $this->input->post('label'),
            'image'       => $upload_image, // Simpan nama file gambar
            'url'         => $this->input->post('url'),
            'note'        => $this->input->post('note'),
            'sort_order'  => $this->input->post('sort_order') ? $this->input->post('sort_order') : 0,
        );

        $this->Website_admin_link_model->insert($insert_data);
        $this->session->set_flashdata('success', 'Link admin berhasil ditambahkan.');
        redirect('admin/admin_link');
    }
}

// application/controllers/Admin.php

public function admin_link_edit($id_link = null)
{
    $this->_require_login();
    
    if ($id_link === null || !$data['link'] = $this->Website_admin_link_model->get_by_id($id_link)) {
        $this->session->set_flashdata('error', 'Link tidak ditemukan.');
        redirect('admin/admin_link');
    }

    $data['title'] = 'Edit Link Admin: ' . $data['link']->label;
    $data['websites'] = $this->Website_model->get_all();
    
    $this->form_validation->set_rules('id_website', 'Website', 'required|integer');
    $this->form_validation->set_rules('label', 'Label Link', 'required|max_length[150]');
    $this->form_validation->set_rules('url', 'URL', 'required|valid_url|max_length[1000]');

    if ($this->form_validation->run() == FALSE)
    {
        $data['current_page'] = 'admin_link';
        $this->load->view('admin/sidebar', $data);
        $this->load->view('admin/header', $data);
        $this->load->view('admin/admin_link/form', $data);
        $this->load->view('admin/footer');
    }
    else
    {
        $update_data = array(
            'id_website'  => $this->input->post('id_website'),
            'label'       => $this->input->post('label'),
            'url'         => $this->input->post('url'),
            'note'        => $this->input->post('note'),
            'sort_order'  => $this->input->post('sort_order') ? $this->input->post('sort_order') : 0,
        );

        // --- Logika Update Gambar ---
        if (!empty($_FILES['image']['name'])) {
            $config['upload_path'] = './uploads/website_admin_link/';
            $config['allowed_types'] = 'gif|jpg|png|jpeg|svg';
            $config['max_size'] = 2048;
            $website = $this->Website_model->get_by_id($this->input->post('id_website'));
            $file_name_slug = url_title($website->slug . '-' . $this->input->post('label'), 'dash', TRUE);
            $config['file_name'] = $file_name_slug;

            $this->load->library('upload', $config);
            
            if ($this->upload->do_upload('image')) {
                // Hapus gambar lama jika ada
                if (!empty($data['link']->image) && file_exists($config['upload_path'] . $data['link']->image)) {
                    unlink($config['upload_path'] . $data['link']->image);
                }
                $update_data['image'] = $this->upload->data('file_name');
            } else {
                $this->session->set_flashdata('error', 'Gagal Upload Gambar: ' . $this->upload->display_errors());
                redirect('admin/admin_link_edit/' . $id_link);
                return;
            }
        }
        // --- Akhir Logika Update Gambar ---

        $this->Website_admin_link_model->update($id_link, $update_data);
        $this->session->set_flashdata('success', 'Link admin berhasil diperbarui.');
        redirect('admin/admin_link');
    }
}

// Tambahkan logika hapus gambar di fungsi admin_link_hapus()
public function admin_link_hapus($id_link = null)
{
    $this->_require_login();
    
    $link = $this->Website_admin_link_model->get_by_id($id_link);
    
    if ($id_link === null || !$link) {
        $this->session->set_flashdata('error', 'Link tidak ditemukan.');
    } else {
        // Hapus file gambar dari server
        if (!empty($link->image)) {
            $path = './uploads/website_admin_link/' . $link->image;
            if (file_exists($path)) {
                unlink($path);
            }
        }
        
        $this->Website_admin_link_model->delete($id_link);
        $this->session->set_flashdata('success', 'Link admin berhasil dihapus.');
    }
    
    redirect('admin/admin_link');
}
}