<div class="main-content">
    
    <?php if ($this->session->flashdata('success')): ?>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <i class="fas fa-check-circle me-2"></i> <?= $this->session->flashdata('success'); ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    <?php endif; ?>

    <div class="card-custom">
        <div class="header-action-group mb-5"> 
            
            <div class="header-info">
                <h2 class="main-title-refined"><i class="fas fa-globe-asia text-primary me-2"></i> Manajemen Website</h2>
                <p class="text-subtitle-refined mb-0">Kelola semua aplikasi dan tautan website yang terdaftar di portal publik Disbudpar. 🥳</p>
            </div>
            
            <a href="<?= base_url('admin/website_tambah'); ?>" class="btn-tambah-icon-floating shadow-lg"> <i class="fas fa-plus-circle me-1"></i> Tambah Website Baru
            </a>
            
        </div>
        <div class="divider-line"></div> 

        <div class="table-responsive">
            <table class="table table-hover table-striped-custom table-refined align-middle"> 
                <thead>
                    <tr>
                        <th style="width: 3%;">#</th>
                        <th style="width: 6%;">Ikon</th>
                        <th style="width: 25%;">Nama Website & Deskripsi</th> 
                        <th style="width: 25%;">URL Publik</th>
                        <th style="width: 15%;">Slug</th>
                        <th style="width: 8%;" class="text-center">Status</th>
                        <th style="width: 10%;" class="text-center">Dibuat Pada</th>
                        <th class="text-center" style="width: 8%;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1; foreach ($websites as $w): ?>
                    <tr>
                        <td class="text-center"><?= $no++; ?></td>
                        <td class="text-center">
                            <?php if ($w->image): ?>
                                <img src="<?= base_url('uploads/website_icons/' . htmlspecialchars($w->image)); ?>" alt="Gambar" class="app-icon shadow-sm">
                            <?php else: ?>
                                <div class="default-icon-table"><i class="fas fa-link"></i></div> 
                            <?php endif; ?>
                        </td>
                        <td>
                            <strong class="text-dark d-block mb-1 text-website-title"><?= htmlspecialchars($w->nama_website); ?></strong>
                            <small class="text-muted-desc d-block text-truncate" style="max-width: 250px;"><?= htmlspecialchars($w->deskripsi); ?></small> 
                        </td>
                        <td>
                            <a href="<?= htmlspecialchars($w->user_url); ?>" target="_blank" class="url-link d-block mb-1">
                                <i class="fas fa-external-link-alt me-1"></i> Kunjungi Website
                            </a>
                            <small class="text-muted-light d-block text-truncate" style="font-size: 0.75rem; max-width: 100%;"><?= htmlspecialchars($w->user_url); ?></small>
                        </td>
                        <td><span class="slug-badge">/<?= htmlspecialchars($w->slug); ?></span></td> 
                        <td class="text-center">
                            <?php if ($w->is_active == 1): ?>
                                <span class="status-active"><i class="fas fa-check-circle me-1"></i>Aktif</span>
                            <?php else: ?>
                                <span class="status-inactive"><i class="fas fa-times-circle me-1"></i>Nonaktif</span>
                            <?php endif; ?>
                        </td>
                        <td class="text-center text-date-time">
                            <strong><?= date('d M Y', strtotime($w->dibuat_pada)); ?></strong><br>
                            <small class="text-muted-date"><?= date('H:i', strtotime($w->created_at)); ?> WIB</small>
                        </td>
                        <td class="text-center">
                            <a href="<?= base_url('admin/website_edit/' . $w->id_website); ?>" class="btn-act edit" title="Edit"><i class="fas fa-edit"></i></a>
                            <a href="<?= base_url('admin/website_hapus/' . $w->id_website); ?>" onclick="return confirm('Yakin ingin menghapus website ini?')" class="btn-act del" title="Hapus"><i class="fas fa-trash-alt"></i></a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<style>
/* =========================
🌿 MODERN TEAL–MINT DASHBOARD STYLE
========================= */

/* 🎨 WARNA DASAR */
:root {
  --teal: #10b981;
  --mint: #a7f3d0;
  --aqua: #6ee7b7;
  --teal-dark: #064e3b;
  --gray-dark: #1e293b;
  --gray-mid: #64748b;
  --gray-light: #f1f5f9;
  --bg: #f8fafc;
  --white: #ffffff;
}
/* === HEADER & ACTION GROUP REFINED === */

/* Menggantikan d-flex justify-content-between lama */
.header-action-group {
    display: flex;
    justify-content: space-between;
    align-items: flex-end; /* Align tombol ke bawah */
    gap: 20px;
    padding-bottom: 25px; /* Padding dihilangkan dari mb-4 pb-2 di HTML */
}
.header-info {
    flex-grow: 1;
}

.main-title-refined {
    /* Judul lebih tegas */
    font-size: 2.2rem !important; 
    font-weight: 900 !important;
    color: var(--gray-dark);
}
.text-subtitle-refined {
    font-size: 1rem !important;
    color: var(--gray-mid);
    margin-top: 5px;
}

/* 🚀 TOMBOL TAMBAH BARU (Floating Icon Style) */
.btn-tambah-icon-floating {
    /* Style dasar tombol tetap sama */
    background: linear-gradient(90deg, var(--teal), var(--aqua));
    color: var(--white) !important;
    font-weight: 700;
    border-radius: 50px;
    padding: 14px 35px; /* Padding lebih besar */
    text-decoration: none;
    transition: all 0.3s cubic-bezier(0.25, 0.8, 0.25, 1);

    /* Efek Floating */
    transform: translateY(-5px); /* Angkat lebih tinggi di posisi default */
    box-shadow: 0 10px 30px rgba(16, 185, 129, 0.5); /* Shadow lebih tebal */
    
    /* Ikon */
    display: flex;
    align-items: center;
    gap: 10px;
    font-size: 1.05rem;
    position: relative;
    z-index: 20;
}
.btn-tambah-icon-floating:hover {
    transform: translateY(-8px); /* Angkat lebih tinggi saat hover */
    box-shadow: 0 15px 40px rgba(16, 185, 129, 0.7);
}

/* Garis Pembatas Baru */
.divider-line {
    width: 100%;
    height: 3px;
    background: linear-gradient(90deg, var(--mint), var(--gray-light)); /* Gradien halus */
    border-radius: 1.5px;
    margin-bottom: 30px;
}


/* === RESPONSIVE FIXES (Diperbarui untuk layout baru) === */
@media (max-width: 992px) {
    .header-action-group {
        flex-direction: column;
        align-items: flex-start;
        padding-bottom: 15px;
    }
    .main-title-refined {
        font-size: 1.8rem !important;
    }
    .text-subtitle-refined {
        margin-bottom: 15px;
    }
    .btn-tambah-icon-floating {
        width: 100%;
        justify-content: center;
        transform: translateY(0); /* Hilangkan efek angkat di mobile */
        box-shadow: 0 5px 15px rgba(16, 185, 129, 0.4);
        font-size: 0.95rem;
    }
    .divider-line {
        margin-top: 15px;
    }
}

/* 🌸 BODY & WRAPPER */
body {
  background: linear-gradient(180deg, #ecfeff, #f0fdf4);
  font-family: "Poppins", sans-serif;
  color: var(--gray-dark);
}

.main-content {
  padding: 40px 45px;
  max-width: 1600px;
  margin: auto;
}

/* 💎 CARD UTAMA */
.card-custom {
  background: rgba(255, 255, 255, 0.85);
  border-radius: 25px;
  backdrop-filter: blur(10px);
  border: 1px solid rgba(255, 255, 255, 0.5);
  box-shadow: 0 10px 30px rgba(0, 0, 0, 0.07);
  padding: 40px;
}

/* === HEADER CARD === */
.border-bottom-light {
  border-bottom: 1px solid #e5e7eb;
}

h2 {
  font-size: 1.9rem;
  font-weight: 800;
  color: var(--gray-dark);
  display: flex;
  align-items: center;
  gap: 10px;
}

.text-muted {
  color: var(--gray-mid) !important;
}

/* 🪩 TOMBOL TAMBAH WEBSITE */
.btn-tambah {
  background: linear-gradient(90deg, var(--teal), var(--aqua));
  color: var(--white) !important;
  font-weight: 700;
  border-radius: 50px;
  padding: 14px 32px;
  box-shadow: 0 8px 20px rgba(16, 185, 129, 0.4);
  transition: all 0.3s ease;
  display: flex;
  align-items: center;
  gap: 8px;
}

.btn-tambah:hover {
  transform: translateY(-3px);
  box-shadow: 0 12px 25px rgba(16, 185, 129, 0.5);
}

/* 📊 TABEL MODERN */
.table-refined {
  font-size: 0.96rem;
  border-collapse: separate;
  border-spacing: 0 8px;
}

/* HEADER TABEL */
.table th {
  background: linear-gradient(90deg, var(--mint), var(--aqua));
  color: var(--teal-dark);
  font-weight: 700;
  text-transform: uppercase;
  font-size: 0.85rem;
  padding: 15px;
  border: none;
  letter-spacing: 0.5px;
}

/* BODY TABEL */
.table tbody tr {
  background-color: var(--white);
  box-shadow: 0 2px 6px rgba(0, 0, 0, 0.03);
  border-radius: 10px;
  transition: transform 0.2s, box-shadow 0.2s;
}

.table tbody tr:hover {
  transform: translateY(-2px);
  box-shadow: 0 6px 14px rgba(16, 185, 129, 0.08);
}

.table td {
  padding: 16px 15px;
  vertical-align: middle;
  border-top: none;
}

/* === IKON WEBSITE === */
.app-icon {
  width: 48px;
  height: 48px;
  border-radius: 14px;
  object-fit: cover;
  box-shadow: 0 3px 8px rgba(0, 0, 0, 0.08);
}

.default-icon-table {
  width: 48px;
  height: 48px;
  border-radius: 14px;
  background: var(--gray-light);
  color: var(--gray-mid);
  display: flex;
  justify-content: center;
  align-items: center;
  font-size: 1.3rem;
}

/* === NAMA WEBSITE === */
.text-website-title {
  font-size: 1rem;
  color: var(--gray-dark);
  font-weight: 700;
}

.text-muted-desc {
  color: #94a3b8;
  font-size: 0.85rem;
}

/* === URL LINK === */
.url-link {
  color: #0ea5e9;
  font-weight: 700;
  text-decoration: none;
  transition: 0.2s;
}

.url-link:hover {
  text-decoration: underline;
}

/* === SLUG === */
.slug-badge {
  background: #e0f2fe;
  color: #1e40af;
  padding: 6px 14px;
  border-radius: 25px;
  font-size: 0.8rem;
  font-weight: 600;
}

/* === STATUS === */
.status-active {
  background: #dcfce7;
  color: #166534;
  border: 1px solid #bbf7d0;
  padding: 6px 14px;
  border-radius: 25px;
  font-size: 0.8rem;
  font-weight: 600;
}

.status-inactive {
  background: #fee2e2;
  color: #991b1b;
  border: 1px solid #fecaca;
  padding: 6px 14px;
  border-radius: 25px;
  font-size: 0.8rem;
  font-weight: 600;
}

/* === KOLOM TANGGAL === */
.text-date-time strong {
  font-size: 0.95rem;
  font-weight: 700;
}

.text-muted-date {
  font-size: 0.8rem;
  color: #94a3b8;
}

/* === TOMBOL AKSI === */
.btn-act {
  display: inline-flex;
  align-items: center;
  justify-content: center;
  width: 36px;
  height: 36px;
  color: white;
  border-radius: 10px;
  font-size: 0.85rem;
  transition: all 0.25s ease;
}

.btn-act.edit {
  background: #38bdf8;
}

.btn-act.del {
  background: #f87171;
}

.btn-act:hover {
  transform: translateY(-2px);
  opacity: 0.9;
}

/* === RESPONSIVE === */
@media (max-width: 992px) {
  .card-custom {
    padding: 25px;
  }

  .main-content {
    padding: 20px;
  }

  .d-flex.justify-content-between {
    flex-direction: column;
    align-items: flex-start !important;
    gap: 15px;
  }

  .btn-tambah {
    width: 100%;
    justify-content: center;
  }

  .table th,
  .table td {
    padding: 10px;
  }
}

</style>