<link rel="stylesheet" href="<?= base_url('assets/css/portal-styles.css') ?>">
<?php
$this->load->view('templates/header'); 
?>

    <section class="hero">
        <div class="container position-relative">
            <h1 data-aos="fade-down" data-aos-duration="1500">
                DINAS KEBUDAYAAN & PARIWISATA<br>KOTA TANGERANG
            </h1>
            <p data-aos="fade-up" data-aos-delay="500" data-aos-duration="1500">
                Akses mudah dan cepat ke semua website Budaya, Pariwisata, dan Aplikasi Internal Disbudpar.
            </p>
        </div>
    </section>

    <div class="container py-5 container-main" id="user-section">
        
        <div class="section-divider mx-auto" data-aos="zoom-in" data-aos-delay="200">
            <h2 style="font-size: 1.8rem;"><i class="fas fa-users-cog me-2 bounce-icon"></i> Akses Publik (User)</h2>
        </div>

        <p class="text-center mb-5 text-muted" data-aos="fade-up" data-aos-delay="300">
            Kumpulan aplikasi yang dapat diakses oleh masyarakat umum atau Tenaga Harian Lepas (THL).
        </p>
        
        <div class="row g-5">
            
            <?php 
            // Cek data HANYA SEKALI
            if (isset($websites) && is_array($websites) && !empty($websites)): 
                
                // Loop HANYA SEKALI untuk menampilkan setiap card
                foreach ($websites as $index => $w): 
            ?>
                <div class="col-md-6 col-lg-3">
                    <div class="card card-custom h-100 reveal-card" 
                         data-aos="fade-up" 
                         data-aos-offset="100" 
                         data-aos-delay="<?= 400 + ($index * 150) ?>">
                        
                        <div class="card-body d-flex flex-column align-items-center">
                            
                            <div class="card-inner-content"> 
                                <div class="img-circle-container">
                                    <img src="<?= htmlspecialchars($w->image_url) ?>" 
                                        alt="<?= htmlspecialchars($w->nama_website) ?>" 
                                        class="img-fluid">
                                </div>
                                <h5 class="card-title"><?= htmlspecialchars($w->nama_website) ?></h5>
                            </div>

                            <div class="card-detail-overlay mt-auto flex-grow-1"> 
                                <p class="card-text mb-4">
                                    <?= htmlspecialchars($w->deskripsi) ?: 'Tidak ada deskripsi yang tersedia.' ?>
                                </p>
                                <a href="<?= htmlspecialchars($w->user_url) ?>" class="btn btn-elegant btn-reveal" target="_blank">
                                    Kunjungi <i class="fas fa-external-link-alt ms-1"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php 
                endforeach; // Tutup FOREACH
            else:
            // Blok ELSE jika data $websites kosong
            ?>
                <div class="col-12 text-center py-5">
                    <p class="lead text-danger"><i class="fas fa-exclamation-triangle me-2"></i> Data website tidak ditemukan atau belum dimuat dari database.</p>
                </div>
            <?php endif; // Tutup IF
            ?>
        </div>
    </div>
    
<?php
$this->load->view('templates/footer'); 
?>