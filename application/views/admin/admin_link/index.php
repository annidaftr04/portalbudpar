<div class="container-fluid adminlink-glass">

    <div class="header-glass mb-5 header-wave-effect">
        <div class="header-content-wrapper">
            <h1 class="header-title-main"><i class="fas fa-circle-nodes me-3 text-gradient"></i> Manajemen Link Admin Pintas</h1>
            <p class="header-subtitle">Kelola tautan dengan cepat — desain lucu, informatif, dan mudah dipakai 🌸</p>
        </div>
        
        <a href="<?= site_url('admin/admin_link_tambah'); ?>" class="btn-tambah-wave">
            <i class="fas fa-plus me-2"></i> Tambah Link Baru
        </a>
    </div>
    
    <div class="card-glass p-4">
        <div class="table-responsive">
            <table class="table cute-table align-middle">
                <thead>
                    <tr>
                        <th style="width: 5%;">#</th>
                        <th class="text-center" style="width: 8%;">Ikon</th>
                        <th style="width: 30%;">Label & Catatan</th>
                        <th style="width: 15%;">Website</th>
                        <th class="text-center" style="width: 15%;">URL Akses</th>
                        <th class="text-center" style="width: 10%;">Urutan</th>
                        <th class="text-center" style="width: 17%;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1; foreach ($links as $link): ?>
                    <tr>
                        <td><span class="table-no-badge-glass"><?= $no++; ?></span></td>
                        <td class="text-center">
                            <?php if (!empty($link->image)): ?>
                                <img src="<?= base_url('uploads/website_admin_link/' . $link->image); ?>" alt="Ikon" class="icon-preview-glass">
                            <?php else: ?>
                                <div class="default-icon-glass"><i class="fas fa-key"></i></div>
                            <?php endif; ?>
                        </td>
                        <td>
                            <strong class="link-label-text"><?= $link->label; ?></strong><br>
                            <small class="text-muted-glass"><?= !empty($link->note) ? $link->note : 'Tanpa catatan.'; ?></small>
                        </td>
                        <td><span class="website-name-glass"><?= $link->nama_website; ?></span></td>
                        <td class="text-center">
                            <a href="<?= $link->url; ?>" target="_blank" class="btn-buka">
                                <i class="fas fa-external-link-alt me-1"></i> Buka
                            </a>
                        </td>
                        <td class="text-center">
                            <span class="order-badge"><?= $link->sort_order; ?></span>
                        </td>
                        <td class="text-center action-col-glass">
                            <a href="<?= site_url('admin/admin_link_edit/' . $link->id_link); ?>" class="btn-act edit" title="Edit Link"><i class="fas fa-pen"></i></a>
                            <a href="<?= site_url('admin/admin_link_hapus/' . $link->id_link); ?>" class="btn-act del" onclick="return confirm('Yakin hapus <?= $link->label; ?>?')" title="Hapus Link"><i class="fas fa-trash"></i></a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>

        <div class="footer-section">
            <span class="footer-info-text">Total **<?= count($links); ?>** Link disimpan — makin rapi makin cepat 🌸</span>
        </div>
    </div>

</div>

<style>
/* 🌿 HIJAU TOSCA THEME – ADMIN LINK PAGE */

/* === ANIMASI DASAR === */
@keyframes fadeUp {
  from { opacity: 0; transform: translateY(20px); }
  to { opacity: 1; transform: translateY(0); }
}

/* === BASE === */
body {
  background-color: #f1f8f6;
  font-family: 'Poppins', sans-serif;
}

.adminlink-glass {
  animation: fadeUp 0.8s ease forwards;
  padding-top: 25px;
}

/* === HEADER UTAMA === */
.header-wave-effect {
  background: linear-gradient(135deg, #d1fae5, #f0fdfa);
  padding: 30px 40px;
  border-radius: 20px;
  box-shadow: 0 8px 25px rgba(0,0,0,0.05);
  display: flex;
  justify-content: space-between;
  align-items: center;
  position: relative;
  overflow: hidden;
}
.header-content-wrapper {
  flex-grow: 1;
  z-index: 10;
}

.header-title-main {
  font-weight: 700;
  font-size: 2.3rem;
  color: #134e4a;
  margin-bottom: 5px;
  position: relative;
}
.header-title-main::before {
  content: '';
  position: absolute;
  left: -25px;
  top: 50%;
  transform: translateY(-50%);
  width: 6px;
  height: 90%;
  background: linear-gradient(180deg, #009688, #26a69a);
  border-radius: 3px;
}
.header-title-main .text-gradient {
  color: #009688;
  font-size: 1.5rem;
}
.header-subtitle {
  font-size: 1rem;
  color: #475569;
  margin-left: 20px;
}

/* 🌊 EFEK GELOMBANG HIJAU */
.header-wave-effect::after {
  content: '';
  position: absolute;
  bottom: -50px;
  right: -50px;
  width: 220px;
  height: 220px;
  background: rgba(38, 166, 154, 0.15);
  border-radius: 45%;
  animation: rotateWave 10s linear infinite;
  z-index: 1;
}
@keyframes rotateWave {
  0% { transform: rotate(0deg); }
  50% { transform: rotate(180deg); }
  100% { transform: rotate(360deg); }
}

/* === TOMBOL TAMBAH === */
.btn-tambah-wave {
  background: linear-gradient(135deg, #009688, #26a69a);
  color: white !important;
  text-decoration: none;
  font-weight: 700;
  border-radius: 50px;
  padding: 14px 28px;
  font-size: 1rem;
  box-shadow: 0 8px 25px rgba(0,150,136,0.5);
  transition: all 0.3s ease;
  text-transform: uppercase;
  letter-spacing: 0.5px;
}
.btn-tambah-wave:hover {
  transform: translateY(-3px) scale(1.02);
  background: linear-gradient(135deg, #26a69a, #009688);
  box-shadow: 0 12px 30px rgba(0,150,136,0.6);
}

/* === CARD === */
.card-glass {
  background: #ffffff;
  border-radius: 20px;
  box-shadow: 0 8px 25px rgba(0,0,0,0.08);
  padding: 25px;
  transition: all 0.3s ease;
}
.card-glass:hover {
  box-shadow: 0 10px 35px rgba(0,0,0,0.1);
}

/* === TABEL === */
.cute-table {
  width: 100%;
  border-collapse: separate;
  border-spacing: 0 10px;
}
.cute-table thead th {
  background: #e0f2f1;
  color: #134e4a;
  font-weight: 600;
  padding: 14px 12px;
  border-bottom: 2px solid #a7f3d0;
  text-transform: uppercase;
  font-size: 0.8rem;
  letter-spacing: 0.5px;
}
.cute-table tbody tr {
  background: #ffffff;
  box-shadow: 0 2px 6px rgba(0,0,0,0.04);
  transition: all 0.25s ease;
}
.cute-table tbody tr:hover {
  background: #f0fdf4;
  box-shadow: 0 4px 10px rgba(38,166,154,0.1);
}
.cute-table td {
  padding: 12px 12px;
  vertical-align: middle;
  border-top: 1px solid #f1f5f9;
}

/* === NOMOR URUT === */
.table-no-badge-glass {
  background: #e0f2f1;
  color: #00796b;
  padding: 5px 10px;
  border-radius: 8px;
  font-weight: 700;
  font-size: 0.8rem;
}

/* === IKON === */
.icon-preview-glass {
  width: 45px;
  height: 45px;
  border-radius: 10px;
  object-fit: cover;
  box-shadow: 0 3px 8px rgba(0,0,0,0.1);
  border: 3px solid #f1f5f9;
}
.default-icon-glass {
  width: 45px;
  height: 45px;
  background-color: #e0f2f1;
  color: #009688;
  display: flex;
  align-items: center;
  justify-content: center;
  border-radius: 10px;
  font-size: 1.1rem;
  margin: auto;
}

/* === LABEL === */
.link-label-text {
  font-weight: 600;
  color: #134e4a;
}
.text-muted-glass {
  color: #6b7280 !important;
  font-size: 0.85rem;
}
.website-name-glass {
  color: #14532d;
  font-weight: 500;
}

/* === TOMBOL BUKA === */
.btn-buka {
  background: linear-gradient(90deg, #26a69a, #009688);
  color: white;
  text-decoration: none;
  border-radius: 50px;
  padding: 8px 18px;
  font-weight: 600;
  font-size: 0.85rem;
  box-shadow: 0 4px 10px rgba(0,150,136,0.3);
  transition: all 0.3s ease;
}
.btn-buka:hover {
  background: linear-gradient(90deg, #009688, #26a69a);
  transform: translateY(-1px);
  box-shadow: 0 6px 15px rgba(0,150,136,0.5);
}

/* === ORDER BADGE === */
.order-badge {
  background: #ecfdf5;
  color: #047857;
  padding: 6px 14px;
  border-radius: 50px;
  font-weight: 700;
  font-size: 0.85rem;
}

/* === AKSI EDIT/HAPUS === */
.btn-act {
  display: inline-flex;
  align-items: center;
  justify-content: center;
  width: 35px;
  height: 35px;
  border-radius: 8px;
  color: white;
  margin: 0 4px;
  transition: all 0.25s ease;
}
.btn-act.edit {
  background: #f59e0b;
}
.btn-act.del {
  background: #ef4444;
}
.btn-act.edit:hover {
  background: #f97316;
  transform: translateY(-1px) scale(1.1);
}
.btn-act.del:hover {
  background: #dc2626;
  transform: translateY(-1px) scale(1.1);
}

/* === FOOTER === */
.footer-section {
  display: flex;
  justify-content: space-between;
  align-items: center;
  margin-top: 25px;
  padding-top: 15px;
  border-top: 1px solid #e2e8f0;
}
.footer-info-text {
  color: #64748b;
  font-weight: 500;
  font-size: 0.9rem;
}

/* === RESPONSIVE === */
@media (max-width: 992px) {
  .header-wave-effect {
    flex-direction: column;
    align-items: flex-start;
    padding: 25px;
  }
  .btn-tambah-wave {
    width: 100%;
    text-align: center;
    margin-top: 10px;
  }
  .header-title-main::before {
    left: -15px;
  }
}

</style>