<!doctype html>
<html lang="id">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width,initial-scale=1" />
  <title>Form Link — Revamp UI/UX</title>
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;700;800&family=Montserrat:wght@500;700&display=swap" rel="stylesheet">
  <style>
    /* 🌿 FORM LINK – TEMA HIJAU TOSCA */

/* ---------------------- */
/*  Friendly & Clean Look */
/* ---------------------- */
:root {
  --bg: #f4faf9;
  --card: #ffffff;
  --muted: #64748b;
  --accent1: #16a34a; /* hijau segar untuk aksen */
  --accent2: #26a69a; /* tosca lembut */
  --accent3: #009688; /* tosca utama */
  --glass: rgba(255,255,255,0.7);
  --radius: 18px;
  --shadow: 0 10px 30px rgba(16, 24, 40, 0.08);
}

* { box-sizing: border-box; }

body {
  font-family: 'Nunito', system-ui, -apple-system, Segoe UI, Roboto, 'Helvetica Neue', Arial;
  background: linear-gradient(180deg, #eafaf7 0%, var(--bg) 100%);
  color: #0f172a;
  margin: 0;
  padding: 36px;
}

.wrap { max-width: 980px; margin: 0 auto; }

/* header */
.hero {
  display: flex;
  gap: 18px;
  align-items: center;
  margin-bottom: 18px;
}
.mascot {
  width: 84px;
  height: 84px;
  border-radius: 22px;
  background: linear-gradient(135deg, var(--accent2), var(--accent3));
  display: flex;
  align-items: center;
  justify-content: center;
  box-shadow: var(--shadow);
  flex: 0 0 84px;
}
.mascot svg {
  width: 50px;
  height: 50px;
}
.hero h1 {
  font-size: 1.6rem;
  margin: 0;
  font-weight: 800;
  letter-spacing: -0.3px;
  color: var(--accent3);
}
.hero p {
  margin: 0;
  color: var(--muted);
  font-size: 0.95rem;
}

/* card utama */
.card {
  background: var(--card);
  border-radius: var(--radius);
  box-shadow: var(--shadow);
  padding: 22px;
  border: 1px solid rgba(10, 20, 40, 0.03);
}

/* layout grid */
.form-grid {
  display: grid;
  grid-template-columns: 1fr 1fr;
  gap: 16px;
}
.full {
  grid-column: 1 / -1;
}

/* label dan input */
label {
  display: block;
  font-weight: 700;
  margin-bottom: 8px;
  font-size: 0.92rem;
}
.required {
  color: var(--accent1);
  margin-left: 6px;
  font-weight: 800;
}
input[type='text'],
input[type='url'],
input[type='number'],
select,
textarea {
  width: 100%;
  padding: 12px 14px;
  border-radius: 12px;
  border: 1px solid rgba(15, 23, 42, 0.06);
  font-size: 0.95rem;
  background: linear-gradient(180deg, #fff, #fcfefe);
  transition: box-shadow 0.18s, transform 0.12s;
}
input:focus,
select:focus,
textarea:focus {
  outline: none;
  box-shadow: 0 6px 18px rgba(38, 166, 154, 0.2);
  transform: translateY(-2px);
}
textarea {
  min-height: 110px;
  resize: vertical;
}

.muted {
  color: var(--muted);
  font-size: 0.86rem;
}

/* file input */
.filebox {
  display: flex;
  gap: 12px;
  align-items: center;
}
.file-visual {
  width: 64px;
  height: 64px;
  border-radius: 12px;
  background: linear-gradient(135deg, #fff, #f7fffd);
  display: flex;
  align-items: center;
  justify-content: center;
  border: 1px dashed rgba(15, 23, 42, 0.08);
}
.file-visual img {
  width: 56px;
  height: 56px;
  border-radius: 10px;
  object-fit: cover;
}
.file-controls {
  flex: 1;
}
.file-controls small {
  display: block;
  color: var(--muted);
  margin-top: 6px;
}

/* tombol utama */
.btn {
  display: inline-flex;
  gap: 8px;
  align-items: center;
  padding: 10px 16px;
  border-radius: 12px;
  border: none;
  background: linear-gradient(90deg, var(--accent3), var(--accent2));
  color: white;
  font-weight: 700;
  cursor: pointer;
  box-shadow: 0 8px 20px rgba(0, 150, 136, 0.15);
  transition: all 0.25s ease;
}
.btn:hover {
  background: linear-gradient(90deg, var(--accent2), var(--accent3));
  transform: translateY(-2px);
  box-shadow: 0 10px 25px rgba(0, 150, 136, 0.25);
}
.btn.ghost {
  background: transparent;
  color: var(--muted);
  border: 1px solid rgba(15, 23, 42, 0.08);
  box-shadow: none;
}

/* section */
.section {
  padding: 14px;
  border-radius: 12px;
  border: 1px solid rgba(2, 6, 23, 0.02);
  background: linear-gradient(180deg, rgba(0, 150, 136, 0.03), transparent);
}
.section h3 {
  margin: 0 0 10px 0;
  font-size: 1.05rem;
  color: var(--accent3);
}

/* footer */
.actions {
  display: flex;
  justify-content: flex-end;
  gap: 10px;
  margin-top: 16px;
}

/* badge & note */
.badge {
  display: inline-flex;
  padding: 6px 10px;
  border-radius: 999px;
  background: linear-gradient(90deg, var(--accent2), #fff);
  font-weight: 800;
  font-size: 0.85rem;
  color: #064e3b;
  margin-right: 8px;
}
.note {
  display: flex;
  gap: 10px;
  align-items: center;
  background: linear-gradient(180deg, #fff, rgba(38, 166, 154, 0.05));
  padding: 10px;
  border-radius: 12px;
  border: 1px solid rgba(38, 166, 154, 0.1);
  color: var(--muted);
}

/* alert */
.alert {
  padding: 12px;
  border-radius: 10px;
  margin-bottom: 12px;
  font-weight: 700;
}
.alert.warn {
  background: #fefce8;
  color: #854d0e;
  border: 1px solid #fde68a;
}
.alert.error {
  background: #fef2f2;
  color: #991b1b;
  border: 1px solid #fecaca;
}

/* efek kecil */
.squiggle {
  display: inline-block;
  transform-origin: center;
  animation: wiggle 3s linear infinite;
}
@keyframes wiggle {
  0% { transform: rotate(-6deg); }
  50% { transform: rotate(6deg); }
  100% { transform: rotate(-6deg); }
}

/* floating mascot */
.mascot-float {
  position: relative;
  animation: float 6s ease-in-out infinite;
}
@keyframes float {
  0% { transform: translateY(0); }
  50% { transform: translateY(-6px); }
  100% { transform: translateY(0); }
}

/* responsive */
@media (max-width:880px) {
  .form-grid { grid-template-columns: 1fr; }
  .hero { flex-direction: row; gap: 12px; }
  .mascot { width: 64px; height: 64px; }
}

  </style>
</head>
<body>
  <div class="wrap">
    <div class="hero">
      <div class="mascot mascot-float" aria-hidden="true">
        <!-- friendly SVG mascot -->
        <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
          <circle cx="12" cy="10" r="6" fill="white" opacity="0.9"/>
          <path d="M9 10c0 .9-.7 1.6-1.6 1.6S5.8 10.9 5.8 10" stroke="#06b6d4" stroke-linecap="round" stroke-linejoin="round"/>
          <path d="M15 10c0 .9.7 1.6 1.6 1.6S18.2 10.9 18.2 10" stroke="#06b6d4" stroke-linecap="round" stroke-linejoin="round"/>
          <path d="M8.5 14.5c1.1 1.3 3.4 1.3 4.5 0" stroke="#ff6b6b" stroke-linecap="round" stroke-width="1.4"/>
        </svg>
      </div>

      <div>
        <h1><i class="fas fa-magic me-2"></i> Kelola Tautan Pintas Admin <span class="squiggle">✨</span></h1>
        <p>Perbarui atau buat tautan baru dengan formulir yang efisien, cepat, dan mudah dipahami.</p>
      </div>
    </div>

    <!-- card begin -->
    <div class="card" role="region" aria-label="Form link">

      <!-- server-side alerts (keaslian PHP tetap ada) -->
      <?php if (validation_errors()): ?>
        <div class="alert warn"><strong>Perhatian:</strong> Ada beberapa kesalahan pada input. Periksa yang diberi tanda merah.</div>
      <?php endif; ?>
      <?php if ($this->session->flashdata('error')): ?>
        <div class="alert error"><strong>Gagal:</strong> <?php echo $this->session->flashdata('error'); ?></div>
      <?php endif; ?>

      <!-- form -->
      <div style="margin-top:8px">
        <?php
          $action = isset($link) ? site_url('admin/admin_link_edit/' . $link->id_link) : site_url('admin/admin_link_tambah');
          echo form_open_multipart($action, ['class' => 'revamp-form', 'id' => 'revampForm']);
        ?>

        <div class="form-grid">
          <!-- left column: basic info -->
          <div class="section">
            <h3><span class="badge">1</span> Info Dasar <small class="hint">(wajib diisi)</small></h3>

            <label for="id_website">Website Induk <span class="required">*</span></label>
            <select name="id_website" id="id_website" required aria-required="true">
              <option value="">— Pilih Website —</option>
              <?php $selected_website = set_value('id_website', isset($link) ? $link->id_website : ''); ?>
              <?php foreach ($websites as $website): ?>
                <option value="<?php echo $website->id_website; ?>" <?php echo ($website->id_website == $selected_website) ? 'selected' : ''; ?>><?php echo $website->nama_website; ?></option>
              <?php endforeach; ?>
            </select>
            <?php echo form_error('id_website', '<div class="errtxt">', '</div>'); ?>

            <div style="height:12px"></div>

            <label for="label">Label Link <span class="required">*</span></label>
            <input type="text" name="label" id="label" placeholder="Contoh: Login E-Kinerja THL" value="<?php echo set_value('label', isset($link) ? $link->label : ''); ?>" required>
            <?php echo form_error('label', '<div class="errtxt">', '</div>'); ?>

            <div style="height:12px"></div>

            <label for="url">URL (Alamat Lengkap) <span class="required">*</span></label>
            <input type="url" name="url" id="url" placeholder="https://alamat.website.id/admin/login" value="<?php echo set_value('url', isset($link) ? $link->url : ''); ?>" required>
            <?php echo form_error('url', '<div class="errtxt">', '</div>'); ?>

          </div>

          <!-- right column: media & settings -->
          <div class="section">
            <h3><span class="badge">2</span> Media & Pengaturan</h3>

            <label for="image">Ikon / Logo (opsional)</label>
            <div class="filebox">
              <div class="file-visual" id="imgPreview">
                <?php if (isset($link) && !empty($link->image)): ?>
                  <img src="<?php echo base_url('uploads/website_admin_link/' . $link->image); ?>" alt="ikon saat ini">
                <?php else: ?>
                  <!-- placeholder svg -->
                  <svg width="36" height="36" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <rect x="3" y="4" width="18" height="14" rx="3" fill="#eef2ff" />
                    <path d="M7 12l3 3 7-9" stroke="#60a5fa" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"/>
                  </svg>
                <?php endif; ?>
              </div>

              <div class="file-controls">
                <input type="file" accept="image/*" name="image" id="image" style="margin-bottom:8px">
                <small class="muted">Maks 2MB — Format: jpg, png, webp. Ikon membuat link lebih mudah dikenali.</small>
                <?php if (isset($link) && !empty($link->image)): ?>
                  <div class="hint" style="margin-top:8px">Ikon saat ini: <strong><?php echo $link->image; ?></strong></div>
                <?php endif; ?>
              </div>
            </div>

            <div style="height:12px"></div>

            <label for="note">Catatan Tambahan</label>
            <textarea name="note" id="note" placeholder="Contoh: Digunakan untuk kuisioner sekretariat..."><?php echo set_value('note', isset($link) ? $link->note : ''); ?></textarea>
            <?php echo form_error('note', '<div class="errtxt">', '</div>'); ?>

            <div style="height:12px"></div>

            <label for="sort_order">Urutan Tampil <span class="hint">(angka, kecil tampil dulu)</span></label>
            <input type="number" name="sort_order" id="sort_order" value="<?php echo set_value('sort_order', isset($link) ? $link->sort_order : '0'); ?>">
            <?php echo form_error('sort_order', '<div class="errtxt">', '</div>'); ?>

          </div>

          <!-- fullwidth helper / tips -->
          <div class="full">
            <div class="section" style="display:flex;align-items:center;justify-content:space-between;gap:12px;flex-wrap:wrap">
              <div style="flex:1;min-width:220px">
                <h3 style="margin-bottom:6px">Butuh bantuan?</h3>
                <div class="note">
                  <div style="font-size:20px">🛈</div>
                  <div>
                    <div style="font-weight:700">Tips Cepat</div>
                    <div class="hint">Pastikan URL diawali <code>https://</code> agar terbuka di semua browser. Gunakan ikon supaya pengguna langsung mengenali link.</div>
                  </div>
                </div>
              </div>

              <div style="display:flex;gap:8px;align-items:center">
                <a href="<?php echo site_url('admin/admin_link'); ?>" class="btn ghost">⟵ Kembali</a>
                <button type="submit" class="btn" id="saveBtn">Simpan Link</button>
              </div>
            </div>
          </div>

        </div>

        <?php echo form_close(); ?>
      </div>

    </div>

    <div style="height:22px"></div>
    <div class="muted" style="font-size:0.9rem;text-align:center">Desain ini dibuat ulang — kalau mau versi gelap, compact, atau dengan Tailwind, katakan saja ✨</div>

  </div>

  <script>
    // small niceties: preview file, disable submit while uploading (client-side)
    (function(){
      const input = document.getElementById('image');
      const preview = document.getElementById('imgPreview');
      const form = document.getElementById('revampForm');
      const saveBtn = document.getElementById('saveBtn');

      if(input){
        input.addEventListener('change', (e)=>{
          const f = e.target.files && e.target.files[0];
          if(!f) return;
          if(f.size > 2_100_000){ alert('Ukuran file terlalu besar — gunakan file <= 2MB'); input.value = ''; return; }
          const reader = new FileReader();
          reader.onload = function(ev){ preview.innerHTML = '<img src="'+ev.target.result+'" alt="preview">'; };
          reader.readAsDataURL(f);
        });
      }

      if(form){
        form.addEventListener('submit', function(){
          saveBtn.disabled = true; saveBtn.innerText = 'Menyimpan...';
        });
      }

    })();
  </script>
</body>
</html>
