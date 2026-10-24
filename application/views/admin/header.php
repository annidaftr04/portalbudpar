<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= isset($title) ? $title . ' | Portal Admin' : 'Dashboard Admin | Portal Budpar'; ?></title>

  <!-- Font & Icon -->
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

  <style>
  :root {
  --tosca: #009688;
  --tosca-dark: #00796b;
  --tosca-light: #b2f5ea;
  --tosca-gradient: linear-gradient(90deg, #00796b 0%, #009688 50%, #26a69a 100%);
  --white: #ffffff;
  --gray-bg: #f4f8f7;
  --text-dark: #1b2b28;
  --muted: #6b7a76;
  --sidebar-width: 240px;
  --topbar-height: 70px;
}

/* Base */
body {
  font-family: 'Poppins', sans-serif;
  margin: 0;
  background: var(--gray-bg);
  color: var(--text-dark);
  overflow-x: hidden;
}

/* ============================ */
/* 🔝 FIXED TOPBAR REFINED */
/* ============================ */
.topbar {
  position: fixed;
  top: 0;
  left: var(--sidebar-width);
  height: var(--topbar-height);
  width: calc(100% - var(--sidebar-width)); /* lebar pas di samping sidebar */

  /* Menghilangkan celah di antara header dan scrollbar */
  margin-right: -20px; /* menutup ruang kosong di tepi kanan */

  /* Hanya padding kiri agar rata dan tidak terpotong kanan */
  padding: 0 0 0 24px;

  /* Warna gradasi tema tosca */
  background: linear-gradient(90deg, #00897b 0%, #009688 50%, #26a69a 100%);
  color: var(--white);

  /* Tata letak & bayangan */
  display: flex;
  justify-content: space-between;
  align-items: center;
  box-shadow: 0 2px 15px rgba(0, 0, 0, 0.12);
  border-bottom-left-radius: 10px;

  /* Pastikan tetap di atas konten */
  z-index: 1000;

  /* Transisi halus jika dibutuhkan */
  transition: all 0.3s ease;
}


/* Judul Halaman */
.page-title {
  font-weight: 700;
  font-size: 1.3rem;
  display: flex;
  align-items: center;
  gap: 10px;
  letter-spacing: 0.5px;
  text-shadow: 0 1px 2px rgba(0,0,0,0.2);
}
.page-title i {
  font-size: 1.1rem;
  color: #e0f2f1;
}

/* ============================ */
/* 👤 USER INFO BADGE */
/* ============================ */
/* User info */
.user-info {
  /* Tampilan dasar */
  background: rgba(255, 255, 255, 0.15);
  backdrop-filter: blur(6px);
  color: #ffffff;

  /* Spasi dan posisi */
  padding: 2px 4px 2px 12px; /* kiri lebih luas untuk keseimbangan ikon */
  margin-right: 10px; /* ruang aman dari tepi kanan topbar */

  /* Layout & bentuk */
  display: flex;
  align-items: center;
  gap: 6px;
  border-radius: 40px;
  white-space: nowrap;

  /* Teks & gaya */
  font-weight: 600;
  font-size: 0.9rem;

  /* Efek */
  box-shadow: 0 3px 8px rgba(0, 0, 0, 0.1);
}

/* =============================== */
/* 🎖️ Lencana Peran Admin (User Badge) */
/* =============================== */


.user-info:hover {
  background: rgba(255, 255, 255, 0.25);
}


/* ============================ */
/* 📦 KONTEN AREA */
/* ============================ */
.content {
  margin-left: var(--sidebar-width);
  margin-top: var(--topbar-height);
  padding: 30px;
  min-height: 100vh;
  box-sizing: border-box;
}


  </style>
</head>
<body>

<!-- ======= TOPBAR ======= -->
<div class="topbar">
  <div class="page-title">
    <i class="fas fa-chart-line"></i>
    <?= isset($title) ? $title : 'Dashboard Admin'; ?>
  </div>

  <div class="user-info">
    <span>Halo, <?= $this->session->userdata('admin_name'); ?>!</span>
  </div>
</div>

<!-- ======= KONTEN ======= -->
<div class="content">
  <div class="content-wrapper">
