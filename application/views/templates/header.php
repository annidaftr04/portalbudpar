<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= isset($title) ? $title : 'Portal Budaya & Pariwisata | Akses Publik' ?></title>
  
  <!-- Fonts & Icons -->
  <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700&family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://unpkg.com/aos@2.3.4/dist/aos.css" rel="stylesheet">
  
  <style>
    /* 🌈 Header Premium */
    .custom-header {
      background: linear-gradient(90deg, rgba(255,255,255,0.8) 0%, rgba(255,255,255,0.5) 100%);
      backdrop-filter: blur(15px);
      -webkit-backdrop-filter: blur(15px);
      box-shadow: 0 4px 20px rgba(0,0,0,0.1);
      border-bottom: 2px solid #f7c94b;
      padding: 10px 0;
      transition: all 0.4s ease;
      z-index: 999;
    }

    /* 🌿 Scroll Effect */
    .custom-header.scrolled {
      background: rgba(255,255,255,0.95);
      border-bottom-color: #ffb703;
      box-shadow: 0 6px 25px rgba(0,0,0,0.08);
    }

    /* 🏛️ Brand */
    .navbar-brand {
      display: flex;
      align-items: center;
      text-decoration: none;
    }

    .navbar-brand img {
      height: 55px;
      width: auto;
      margin-right: 12px;
      transition: transform 0.3s ease;
    }

    .navbar-brand:hover img {
      transform: scale(1.05);
    }

    .brand-text {
      display: flex;
      flex-direction: column;
      line-height: 1.1;
    }

    .main-text {
      font-family: 'Playfair Display', serif;
      font-weight: 700;
      color: #1a1a1a;
      font-size: 1.3rem;
    }

    .sub-text {
      font-family: 'Poppins', sans-serif;
      font-size: 0.8rem;
      color: #6b6b6b;
      font-style: italic;
      letter-spacing: 0.5px;
    }

    /* ✨ Tombol Eksplor */
    .btn-explore {
      font-family: 'Poppins', sans-serif;
      background: linear-gradient(90deg, #f7c94b, #ffb703);
      color: #000;
      padding: 8px 18px;
      border-radius: 30px;
      font-weight: 600;
      text-decoration: none;
      transition: 0.3s ease;
      box-shadow: 0 2px 8px rgba(0,0,0,0.1);
    }

    .btn-explore:hover {
      background: linear-gradient(90deg, #ffb703, #f7c94b);
      transform: translateY(-2px);
      box-shadow: 0 4px 12px rgba(0,0,0,0.15);
      color: #000;
    }

    /* ✨ Animasi Muncul */
    .fade-in {
      opacity: 0;
      transform: translateY(-15px);
      animation: fadeInMove 1s ease forwards;
    }

    @keyframes fadeInMove {
      to {
        opacity: 1;
        transform: translateY(0);
      }
    }
  </style>
</head>

<body>

  <!-- 🌟 HEADER -->
  <nav class="navbar navbar-expand-lg fixed-top custom-header fade-in">
    <div class="container d-flex justify-content-between align-items-center">
      
      <!-- 🏛️ Logo + Teks -->
      <a class="navbar-brand" href="<?= base_url() ?>">
        <img src="<?= base_url('assets/img/logo_budpar.png') ?>" alt="Logo Disbudpar">
      </a>

      <!-- ✨ Tombol Aksi -->
      <a href="user" class="btn-explore">
        Eksplor Website <i class="fas fa-arrow-right ms-1"></i>
      </a>

    </div>
  </nav>

  <script>
    // 🌿 Efek Scroll: ubah tampilan header saat digulir
    window.addEventListener('scroll', () => {
      const header = document.querySelector('.custom-header');
      header.classList.toggle('scrolled', window.scrollY > 10);
    });
  </script>
</body>
</html>
