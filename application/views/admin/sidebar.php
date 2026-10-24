<?php 
// Ambil role admin dari session
$admin_role = $this->session->userdata('admin_role');
?>

<!-- ==============================
     🌿 SIDEBAR PORTAL BUDPAR (TOSCA MODERN)
============================== -->
<div class="sidebar">
    <div class="sidebar-header">
        <i class="fas fa-seedling"></i>
        <span>Portal Budpar</span>
    </div>

    <nav class="sidebar-content">
        <!-- Navigasi Utama -->
        <div class="sidebar-menu-group">
            <div class="menu-title"><i class="fas fa-home"></i> Navigasi Utama</div>
            <a href="<?= site_url('admin/dashboard'); ?>" class="<?= (isset($current_page) && $current_page == 'dashboard') ? 'active' : ''; ?>">
                <i class="fas fa-tachometer-alt"></i> Dashboard
            </a>
        </div>

        <!-- Kelola Data -->
        <div class="sidebar-menu-group">
            <div class="menu-title"><i class="fas fa-database"></i> Kelola Data</div>
            <a href="<?= site_url('admin/website'); ?>" class="<?= (isset($current_page) && in_array($current_page, ['website','website_tambah','website_edit'])) ? 'active' : ''; ?>">
                <i class="fas fa-globe-asia"></i> Daftar Website
            </a>

            <?php if ($admin_role == 'superadmin'): ?>
            <a href="<?= site_url('admin/admin_link'); ?>" class="<?= (isset($current_page) && $current_page == 'categories') ? 'active' : ''; ?>">
                <i class="fas fa-link"></i> Website Admin
            </a>
            <?php endif; ?>
        </div>

        <!-- Admin Only -->
        <?php if ($admin_role == 'superadmin'): ?>
        <div class="sidebar-menu-group">
            <div class="menu-title"><i class="fas fa-user-shield"></i> Administrasi</div>
            <a href="<?= site_url('admin/users'); ?>" class="<?= (isset($current_page) && in_array($current_page, ['users','users_tambah','users_edit'])) ? 'active' : ''; ?>">
                <i class="fas fa-users-cog"></i> Akun Admin
            </a>
        </div>
        <?php endif; ?>
    </nav>

    <div class="sidebar-footer">
        <a href="<?= site_url('admin/logout'); ?>" class="logout-link">
            <i class="fas fa-sign-out-alt"></i> Logout
        </a>
    </div>
</div>

<style>
/* =========================================
   🌿 SIDEBAR PORTAL BUDPAR (TOSCA ELEGAN)
========================================= */
:root {
  --tosca: #009688;
  --tosca-dark: #00695c;
  --tosca-light: #a7ffeb;
  --bg-gradient: linear-gradient(180deg, #00796b 0%, #009688 60%, #26a69a 100%);
  --white: #ffffff;
  --text-light: #e8fdf9;
  --text-muted: #aee0d9;
}

/* Sidebar Wrapper */
.sidebar {
  width: 240px;
  height: 100vh;
  background: var(--bg-gradient);
  position: fixed;
  top: 0;
  left: 0;
  color: var(--text-light);
  display: flex;
  flex-direction: column;
  justify-content: space-between;
  box-shadow: 6px 0 20px rgba(0, 0, 0, 0.1);
  overflow-y: auto;
  scrollbar-width: thin;
  scrollbar-color: rgba(255,255,255,0.2) transparent;
  transition: all 0.3s ease-in-out;
}

/* Header */
.sidebar-header {
  text-align: center;
  font-weight: 700;
  font-size: 1.25rem;
  padding: 24px 15px;
  color: #fff;
  border-bottom: 1px solid rgba(255, 255, 255, 0.15);
  display: flex;
  align-items: center;
  justify-content: center;
  gap: 8px;
  letter-spacing: 0.6px;
}
.sidebar-header i {
  color: var(--tosca-light);
  font-size: 1.3rem;
}

/* Scrollable Content */
.sidebar-content {
  flex: 1;
  padding: 15px 12px 70px;
}

/* Menu Group */
.sidebar-menu-group {
  margin-bottom: 18px;
}
.menu-title {
  font-size: 0.75rem;
  font-weight: 600;
  text-transform: uppercase;
  color: var(--tosca-light);
  margin-bottom: 8px;
  display: flex;
  align-items: center;
  gap: 6px;
  opacity: 0.9;
}
.menu-title i {
  font-size: 0.85rem;
}

/* Menu Links */
.sidebar a {
  display: flex;
  align-items: center;
  gap: 10px;
  text-decoration: none;
  color: var(--text-light);
  padding: 10px 12px;
  font-size: 0.95rem;
  font-weight: 500;
  border-radius: 8px;
  transition: all 0.25s ease;
}
.sidebar a i {
  width: 22px;
  text-align: center;
  color: #b2dfdb;
  font-size: 1rem;
}

.sidebar a:hover {
  background: rgba(255, 255, 255, 0.15);
  transform: translateX(4px);
}

/* Active link */
.sidebar a.active {
  background: var(--white);
  color: var(--tosca-dark);
  font-weight: 700;
  box-shadow: 0 2px 8px rgba(0,0,0,0.1);
}
.sidebar a.active i {
  color: var(--tosca-dark);
}

/* Footer */
.sidebar-footer {
  padding: 18px 15px;
  border-top: 1px solid rgba(255,255,255,0.1);
}
.logout-link {
  color: #fff;
  background: rgba(255,255,255,0.08);
  display: flex;
  align-items: center;
  gap: 8px;
  padding: 10px 12px;
  border-radius: 8px;
  text-decoration: none;
  transition: all 0.25s;
}
.logout-link i {
  color: #ffcdd2;
}
.logout-link:hover {
  background: #ef4444;
  color: #fff !important;
  transform: translateX(4px);
}
</style>
