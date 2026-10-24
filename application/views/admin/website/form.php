<div class="container-fluid form-glass-wrapper">
  <div class="form-header">
    <div class="icon-circle">
      <i class="fas fa-edit"></i>
    </div>
    <div>
      <h1><?= $title; ?></h1>
      <p>Kelola detail website dengan mudah dan tampil menarik 🌷</p>
    </div>
  </div>

  <div class="glass-card animate-up">
    <?= form_open_multipart(
      isset($website) ? 'admin/website_edit/' . $website->id_website : 'admin/website_tambah',
      'class="form-pretty"'
    ); ?>

    <!-- ============================= -->
    <!-- Informasi Utama Website -->
    <!-- ============================= -->
    <div class="form-section">
      <h2><i class="fas fa-laptop-code"></i> Informasi Utama Website</h2>

      <div class="form-grid">
        <div class="form-item">
          <label>Nama Website <span>*</span></label>
          <input 
            type="text" 
            name="nama_website" 
            value="<?= set_value('nama_website', isset($website) ? $website->nama_website : ''); ?>" 
            placeholder="Contoh: Portal Budpar Tangerang"
          >
        </div>

        <div class="form-item">
          <label>Slug (URL Singkat) <span>*</span></label>
          <input 
            type="text" 
            name="slug" 
            value="<?= set_value('slug', isset($website) ? $website->slug : ''); ?>" 
            placeholder="Contoh: budpar-tangerang"
          >
        </div>

        <div class="form-item">
          <label>URL Publik <span>*</span></label>
          <input 
            type="url" 
            name="user_url" 
            value="<?= set_value('user_url', isset($website) ? $website->user_url : ''); ?>" 
            placeholder="https://domain.com/user/"
          >
        </div>
      </div>
    </div>

    <!-- ============================= -->
    <!-- Detail & Pengaturan -->
    <!-- ============================= -->
    <div class="form-section">
      <h2><i class="fas fa-ellipsis-h"></i> Detail & Pengaturan</h2>

      <textarea 
        name="deskripsi" 
        rows="3" 
        placeholder="Jelaskan fungsi utama website ini..."
      ><?= set_value('deskripsi', isset($website) ? $website->deskripsi : ''); ?></textarea>

      <div class="form-flex">
        <div class="form-item">
          <label>Tanggal Dibuat</label>
          <input 
            type="date" 
            name="dibuat_pada" 
            value="<?= set_value('dibuat_pada', isset($website) ? $website->dibuat_pada : date('Y-m-d')); ?>"
          >
        </div>

        <div class="form-item checkbox">
          <label>
            <input 
              type="checkbox" 
              name="is_active" 
              value="1" 
              <?= (isset($website) && $website->is_active) || !isset($website) ? 'checked' : ''; ?>
            >
            Aktifkan Website <i class="fas fa-globe"></i>
          </label>
        </div>
      </div>
    </div>

    <!-- ============================= -->
    <!-- Ikon Website -->
    <!-- ============================= -->
    <div class="form-section">
      <h2><i class="fas fa-image"></i> Ikon Website</h2>

      <div class="icon-upload">
        <div class="icon-preview">
          <?php if (isset($website) && $website->image): ?>
            <img 
              src="<?= base_url('uploads/website_icons/' . htmlspecialchars($website->image)); ?>" 
              alt="Ikon Saat Ini"
            >
          <?php else: ?>
            <div class="placeholder">
              <i class="fas fa-cloud-upload-alt"></i>
            </div>
          <?php endif; ?>
        </div>

        <div>
          <label>Upload Ikon Baru (max 2MB)</label>
          <input type="file" name="gambar">
          <small>Format: PNG/JPG/GIF</small>
        </div>
      </div>
    </div>

    <!-- ============================= -->
    <!-- Tombol Aksi -->
    <!-- ============================= -->
    <div class="form-footer">
      <a href="<?= base_url('admin/website'); ?>" class="btn-cancel">
        <i class="fas fa-arrow-left"></i> Batal
      </a>
      <button type="submit" class="btn-submit">
        <i class="fas fa-save"></i> 
        <?= isset($website) ? 'Simpan Perubahan' : 'Tambah Website'; ?>
      </button>
    </div>

    <?= form_close(); ?>
  </div>
</div>



<style>
/* 🌊 REFINED GLASS MORPHISM - FINAL POLISH */

/* 🎨 VARIABEL WARNA */
:root {
  --mint: #d1fae5;
  --aqua: #a7f3d0;
  --teal: #14b8a6;
  --teal-light: #34d399; /* teal terang untuk gradien */
  --teal-dark: #0f766e;
  --text: #1e293b;
  --bg: #f0fdf4;
  --white: #ffffff;
}

/* 🌸 WRAPPER & BASE */
body {
  background: linear-gradient(180deg, #ecfeff, #f0fdf4);
  font-family: 'Poppins', sans-serif;
  color: var(--text);
}
.form-glass-wrapper {
  max-width: 1000px;
  margin: 0 auto;
  padding: 50px 20px 80px;
}

/* 🪩 HEADER */
.form-header {
  display: flex;
  align-items: center;
  gap: 20px; /* Jarak header sedikit diperlebar */
  margin-bottom: 35px;
}
.icon-circle {
  background: linear-gradient(135deg, var(--aqua), var(--teal)); /* gradien di ikon circle */
  color: var(--white); /* ikon putih */
  border-radius: 50%; /* bulat sempurna */
  padding: 18px; /* padding lebih besar */
  font-size: 1.2rem;
  box-shadow: 0 6px 20px rgba(20, 184, 166, 0.3); /* shadow lebih tebal */
}
.form-header h1 {
  font-weight: 800; /* judul lebih tebal */
  font-size: 2rem;
  margin: 0;
  color: var(--text);
}
.form-header p {
  color: #64748b;
  font-size: 0.95rem;
  margin: 4px 0 0;
}

/* 💎 KARTU GLASS */
.glass-card {
  background: rgba(255, 255, 255, 0.85); /* sedikit lebih solid */
  border-radius: 20px;
  backdrop-filter: blur(10px);
  border: 1px solid rgba(255, 255, 255, 0.5); /* border halus */
  padding: 40px 45px; /* padding lebih besar & simetris */
  box-shadow: 0 15px 45px rgba(0, 0, 0, 0.1); /* shadow lebih dalam */
}

/* 🧁 SECTION */
.form-section {
  margin-bottom: 30px; /* jarak vertikal */
  padding-bottom: 20px;
  border-bottom: 1px dashed var(--mint); /* garis pemisah dashed yang halus */
}
.form-section:last-of-type {
  border-bottom: none;
  margin-bottom: 20px;
}
.form-section h2 {
  font-size: 1.15rem; /* judul section sedikit diperbesar */
  color: var(--teal-dark);
  font-weight: 700;
  margin-bottom: 20px;
  align-items: center;
  letter-spacing: 0.5px;
}
.form-section h2 i {
  color: var(--teal);
  font-size: 1rem;
}

/* 🪷 INPUT & TEXTAREA */
input[type="text"],
input[type="url"],
input[type="date"],
textarea {
  padding: 14px 18px; /* padding lebih besar untuk estetika */
  border-radius: 10px;
  border: 1px solid #e2e8f0; /* border netral */
  background: #f8fafc;
  font-size: 1rem; /* ukuran font lebih profesional */
  transition: all 0.25s ease;
  font-weight: 500;
  color: #334155;
  width: 100%;
  box-sizing: border-box;
}
input:focus,
textarea:focus {
  outline: none;
  border-color: var(--teal);
  box-shadow: 0 0 0 4px rgba(20, 184, 166, 0.1); /* ring fokus lembut */
  background: var(--white);
  transform: translateY(-1px); /* efek angkat halus */
}
textarea {
  min-height: 100px; /* tinggi textarea */
  resize: vertical;
}

/* 🌿 GRID & FLEX */
.form-grid {
  display: grid;
  /* menggunakan kolom responsif */
  grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
  gap: 25px; /* jarak lega */
}
.form-flex {
  display: grid; /* grid 2 kolom di desktop */
  grid-template-columns: 1fr 1fr;
  gap: 25px;
  align-items: flex-start;
}
.form-item {
  margin-bottom: 0 !important; /* margin dikendalikan oleh gap */
}
.form-item label {
  font-weight: 600;
  font-size: 0.95rem;
  color: #334155;
  margin-bottom: 8px;
  display: block;
}

/* 📸 UPLOAD ICON */
.icon-upload {
  display: flex;
  align-items: center;
  gap: 30px;
}
.icon-preview {
  flex-shrink: 0;
}
.icon-preview img,
.placeholder {
  width: 96px; /* ikon sedikit diperbesar */
  height: 96px;
  border-radius: 50%;
  border: 4px solid var(--aqua);
  background: #f0fdf4;
  font-size: 1.8rem;
  color: var(--teal);
  box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
  display: flex;
  align-items: center;
  justify-content: center;
}
.icon-upload input[type="file"] {
  border: 1px solid #e2e8f0;
  padding: 10px;
  border-radius: 8px;
  background: #fff;
}
.icon-upload small {
  display: block;
  font-size: 0.85rem;
  color: #64748b;
  margin-top: 5px;
}

/* 🌈 FOOTER BUTTONS */
.form-footer {
  display: flex;
  justify-content: flex-end;
  gap: 20px;
  padding-top: 30px;
}
.btn-submit {
  background: linear-gradient(90deg, var(--teal), var(--teal-light)); /* gradien halus */
  font-weight: 700;
  padding: 14px 30px; /* padding lebih besar */
  border-radius: 50px;
  color: #ffffff;
  border: none;
  cursor: pointer;
  box-shadow: 0 6px 20px rgba(20, 184, 166, 0.4);
  transition: transform 0.18s ease, box-shadow 0.18s ease;
}
.btn-submit:hover {
  transform: translateY(-3px);
  box-shadow: 0 10px 30px rgba(20, 184, 166, 0.6);
}
.btn-cancel {
  background: #f1f5f9;
  color: #475569;
  font-weight: 600;
  padding: 14px 25px;
  border-radius: 50px;
  border: none;
  cursor: pointer;
}

/* === RESPONSIVE FIXES === */
@media (max-width: 767px) {
  .glass-card {
    padding: 25px;
  }
  .form-header {
    flex-direction: column;
    text-align: center;
    gap: 12px;
  }
  .form-grid,
  .form-flex {
    grid-template-columns: 1fr;
    gap: 15px;
  }
  .icon-upload {
    flex-direction: column;
    text-align: center;
    gap: 15px;
  }
  .icon-preview img,
  .placeholder {
    margin: 0 auto;
  }
  .form-footer {
    flex-direction: column-reverse;
    align-items: stretch;
  }
  .btn-submit,
  .btn-cancel {
    width: 100%;
  }
}


</style>