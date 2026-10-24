<!-- =======================================
 DASHBOARD ADMIN – Portal Budpar (Refined)
 Tosca Premium • Glassmorphism • Responsive
======================================= -->
<div class="dashboard-container">
  <div class="header-section">
    <h1><i class="fas fa-tachometer-alt"></i> Ringkasan Portal Admin</h1>
    <p>
      Selamat datang kembali,
      <strong><?= $this->session->userdata('admin_name'); ?></strong>!
      Anda login sebagai
      <span class="role"><?= ucfirst($this->session->userdata('admin_role')); ?></span>.
      Yuk, kelola Budpar dengan semangat baru! 🌿
    </p>
  </div>

  <!-- Statistik -->
  <div class="stats-grid">
    <div class="stat glass stat-blue">
      <i class="fas fa-globe-asia"></i>
      <div>
        <h3>Website Terdaftar</h3>
        <p><?= isset($total_websites) ? $total_websites : '0'; ?></p>
        <a href="<?= site_url('admin/website'); ?>">Kelola Website »</a>
      </div>
    </div>

    <div class="stat glass stat-green">
      <i class="fas fa-key"></i>
      <div>
        <h3>Link Admin Pintas</h3>
        <p><?= isset($total_admin_links) ? $total_admin_links : '0'; ?></p>
        <a href="<?= site_url('admin/admin_link'); ?>">Kelola Link Admin »</a>
      </div>
    </div>

    <div class="stat glass stat-purple">
      <i class="fas fa-user-shield"></i>
      <div>
        <h3>Admin Pengelola</h3>
        <p><?= isset($total_admin_users) ? $total_admin_users : $this->db->count_all('portal_admin'); ?></p>
        <a href="<?= site_url('admin/users'); ?>">Kelola Akun »</a>
      </div>
    </div>
  </div>

  <!-- Aktivitas & Menu Pintas -->
  <div class="main-grid">
    <div class="activity glass">
        <h2><i class="fas fa-history"></i> Aktivitas Terbaru</h2>
        
        <div class="activity-scroll">
            <?php if (isset($latest_logs) && !empty($latest_logs)): ?>
            <ul class="timeline">
                <?php foreach ($latest_logs as $log): ?>
                <li>
                    <span class="dot"></span>
                    <div class="content">
                    <p class="log-text"><?= htmlspecialchars($log->aktivitas); ?></p>
                    <p class="log-meta">
                        <span class="log-admin"><?= htmlspecialchars($log->nama ?? 'Sistem'); ?></span>
                        <span class="log-time"><?= date('d M Y | H:i', strtotime($log->waktu)); ?></span>
                    </p>
                    </div>
                </li>
                <?php endforeach; ?>
            </ul>
            <?php else: ?>
            <p class="empty">🎉 Tidak ada aktivitas terbaru.</p>
            <?php endif; ?>
        </div>
    </div>


    <div class="quick glass">
      <h2><i class="fas fa-bolt"></i> Menu Pintas Cepat</h2>
      <a href="<?= site_url('admin/website_tambah'); ?>" class="btn-blue">
        <i class="fas fa-plus-circle"></i> Tambah Website Baru
      </a>
      <a href="<?= site_url('admin/users_tambah'); ?>" class="btn-purple">
        <i class="fas fa-user-plus"></i> Tambah Admin Baru
      </a>
      <p class="note">Gunakan tombol ini untuk tugas yang sering dilakukan.</p>
    </div>
  </div>
</div>

<style>
/* 🌿 Warna & Variabel */
:root {
  --tosca: #009688;
  --tosca-light: #26a69a;
  --tosca-pale: #b2dfdb;
  --blue: #00b4d8;
  --green: #00c48c;
  --purple: #9b59b6;
  --text: #1b2b28;
  --muted: #6b7a76;
  --bg: #f0f8f7;
}

/* ===== Layout dasar ===== */
.dashboard-container {
  background: linear-gradient(135deg, #f8fffd, #e6f7f5);
  min-height: 100vh;
  padding: 40px 60px;
  font-family: "Poppins", sans-serif;
  color: var(--text);
}

/* ===== Header ===== */
.header-section h1 {
  font-size: 1.8rem;
  font-weight: 700;
  margin-bottom: 6px;
  color: var(--tosca-dark);
}
.header-section p {
  color: var(--muted);
  font-size: 1rem;
  line-height: 1.6;
}
.header-section .role {
  color: var(--tosca);
  font-weight: 700;
}

/* ===== Statistik ===== */
.stats-grid {
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(260px, 1fr));
  gap: 25px;
  margin: 35px 0;
}
.stat {
  display: flex;
  gap: 15px;
  align-items: center;
  padding: 22px;
  border-radius: 18px;
  backdrop-filter: blur(16px);
  background: rgba(255, 255, 255, 0.65);
  box-shadow: 0 6px 18px rgba(0, 0, 0, 0.08);
  transition: all 0.3s ease;
}
.stat:hover {
  transform: translateY(-5px);
  box-shadow: 0 10px 25px rgba(0, 0, 0, 0.15);
}
.stat i {
  font-size: 2.3rem;
  opacity: 0.85;
}
.stat h3 {
  margin: 0;
  font-size: 1rem;
  color: var(--muted);
  text-transform: uppercase;
}
.stat p {
  margin: 5px 0;
  font-size: 1.9rem;
  font-weight: 700;
}
.stat a {
  font-size: 0.85rem;
  color: var(--tosca);
  text-decoration: none;
}
.stat-blue i, .stat-blue p { color: var(--blue); }
.stat-green i, .stat-green p { color: var(--green); }
.stat-purple i, .stat-purple p { color: var(--purple); }

/* ===== Grid Utama ===== */
.main-grid {
  display: grid;
  grid-template-columns: 2fr 1fr;
  gap: 25px;
  margin-bottom: 50px;
}

/* ===== Glass Panels ===== */
.glass {
  background: rgba(255, 255, 255, 0.7);
  backdrop-filter: blur(18px);
  border-radius: 20px;
  box-shadow: 0 8px 24px rgba(0, 0, 0, 0.06);
  padding: 25px;
}
.glass h2 {
  font-size: 1.2rem;
  font-weight: 700;
  margin-bottom: 18px;
  color: var(--text);
}

/* ===== AKTIVITAS TERBARU (PERBAIKAN LAYOUT) ===== */
.activity {
  display: flex;
  flex-direction: column;
  max-height: 420px; /* batas tinggi */
  overflow: hidden;
}

.activity-scroll {
  overflow-y: auto;
  max-height: 340px;
  padding-right: 8px;
  scrollbar-width: thin;
  scrollbar-color: var(--tosca) #d9f3f0;
}

/* Scrollbar untuk Webkit (Chrome, Edge) */
.activity-scroll::-webkit-scrollbar {
  width: 8px;
}
.activity-scroll::-webkit-scrollbar-thumb {
  background-color: var(--tosca);
  border-radius: 10px;
}
.activity-scroll::-webkit-scrollbar-track {
  background: #e0f2f1;
  border-radius: 10px;
}

.timeline {
  list-style: none;
  margin: 0;
  padding-left: 20px;
  border-left: 3px solid rgba(0,0,0,0.05);
}
.timeline li {
  position: relative;
  margin-bottom: 14px;
}
.timeline .dot {
  position: absolute;
  left: -9px;
  top: 6px;
  width: 10px;
  height: 10px;
  background: var(--tosca);
  border-radius: 50%;
  box-shadow: 0 0 0 4px rgba(0,150,136,0.15);
}
.timeline .content {
  margin-left: 8px;
}
.log-text {
  font-weight: 500;
  color: var(--text);
  font-size: 0.9rem;
  line-height: 1.4;
  margin-bottom: 2px;
  white-space: nowrap;
  overflow: hidden;
  text-overflow: ellipsis;
  max-width: 100%;
}
.log-meta {
  font-size: 0.8rem;
  display: flex;
  justify-content: space-between;
  color: var(--muted);
}
.log-admin {
  color: var(--green);
  font-weight: 600;
}
.log-time {
  opacity: 0.8;
}


/* ===== Quick Menu ===== */
.quick a {
  display: block;
  text-align: center;
  font-weight: 700;
  padding: 14px;
  border-radius: 12px;
  color: white;
  margin-bottom: 12px;
  text-decoration: none;
  transition: all 0.25s ease;
}
.quick a:hover {
  transform: translateY(-3px);
  box-shadow: 0 10px 25px rgba(0, 0, 0, 0.12);
}
.btn-blue {
  background: linear-gradient(90deg, #00b4d8, #48cae4);
}
.btn-purple {
  background: linear-gradient(90deg, #9b59b6, #a855f7);
}
.note {
  font-size: 0.85rem;
  color: var(--muted);
  margin-top: 10px;
  text-align: center;
}

/* ===== Responsive ===== */
@media (max-width: 992px) {
  .main-grid { grid-template-columns: 1fr; }
  .dashboard-container { padding: 25px; }
  .log-text { white-space: normal; }
}
</style>
