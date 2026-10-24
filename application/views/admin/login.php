<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Login Admin | Portal Budpar</title>

  <!-- Google Font -->
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">

  <!-- Font Awesome -->
  <script src="https://kit.fontawesome.com/a2d9d6bdb7.js" crossorigin="anonymous"></script>

  <style>
    /* === VARIABEL WARNA === */
    :root {
      --teal: #14b8a6;
      --mint: #a7f3d0;
      --aqua: #99f6e4;
      --bg: #ecfeff;
      --white: #ffffff;
      --text: #1e293b;
      --gray: #94a3b8;
    }

    /* === BODY BACKGROUND === */
    body {
      font-family: "Poppins", sans-serif;
      margin: 0;
      height: 100vh;
      background: linear-gradient(135deg, var(--aqua), var(--mint), #f0fdf4);
      display: flex;
      justify-content: center;
      align-items: center;
      overflow: hidden;
      position: relative;
    }

    /* === ANIMATED BACKGROUND BUBBLES === */
    .bubble {
      position: absolute;
      bottom: -100px;
      width: 60px;
      height: 60px;
      background: rgba(255, 255, 255, 0.2);
      border-radius: 50%;
      animation: rise 10s infinite ease-in;
    }
    .bubble:nth-child(1) { left: 15%; animation-delay: 0s; }
    .bubble:nth-child(2) { left: 40%; width: 90px; height: 90px; animation-delay: 2s; }
    .bubble:nth-child(3) { left: 65%; animation-delay: 4s; width: 70px; height: 70px; }
    .bubble:nth-child(4) { left: 80%; width: 50px; height: 50px; animation-delay: 1s; }
    @keyframes rise {
      0% { transform: translateY(0) scale(1); opacity: 0.8; }
      100% { transform: translateY(-1000px) scale(1.2); opacity: 0; }
    }

    /* === LOGIN CARD === */
    .login-card {
      position: relative;
      background: rgba(255, 255, 255, 0.85);
      backdrop-filter: blur(14px);
      border-radius: 25px;
      padding: 50px 45px;
      box-shadow: 0 20px 45px rgba(0, 0, 0, 0.15);
      width: 370px;
      z-index: 2;
      animation: fadeIn 1s ease forwards;
    }

    @keyframes fadeIn {
      from { opacity: 0; transform: translateY(20px); }
      to { opacity: 1; transform: translateY(0); }
    }

    /* === HEADER LOGIN === */
    .login-header {
      text-align: center;
      margin-bottom: 30px;
    }

    .login-header .logo {
      font-size: 2.8rem;
      color: var(--teal);
      background: var(--mint);
      width: 70px;
      height: 70px;
      line-height: 70px;
      border-radius: 50%;
      margin: 0 auto 15px;
      display: flex;
      align-items: center;
      justify-content: center;
      box-shadow: 0 6px 15px rgba(20, 184, 166, 0.4);
    }

    .login-header h2 {
      margin: 0;
      color: var(--text);
      font-weight: 700;
      font-size: 1.8rem;
    }

    .login-header p {
      margin-top: 4px;
      color: var(--gray);
      font-size: 0.9rem;
    }

    /* === FORM === */
    form .form-group {
      margin-bottom: 20px;
    }

    label {
      display: block;
      font-weight: 600;
      color: var(--text);
      margin-bottom: 6px;
      font-size: 0.95rem;
    }

    input[type="text"],
    input[type="password"] {
      width: 100%;
      padding: 12px 15px;
      border-radius: 10px;
      border: 1px solid #e2e8f0;
      font-size: 1rem;
      background: #f8fafc;
      transition: all 0.3s ease;
    }

    input:focus {
      outline: none;
      border-color: var(--teal);
      box-shadow: 0 0 0 3px rgba(20, 184, 166, 0.2);
      background: #fff;
    }

    /* === BUTTON === */
    button {
      width: 100%;
      background: linear-gradient(90deg, var(--teal), var(--aqua));
      border: none;
      border-radius: 12px;
      color: white;
      font-weight: 700;
      font-size: 1rem;
      padding: 13px;
      cursor: pointer;
      transition: all 0.3s ease;
      box-shadow: 0 8px 20px rgba(20, 184, 166, 0.4);
    }

    button:hover {
      transform: translateY(-2px);
      box-shadow: 0 12px 25px rgba(20, 184, 166, 0.6);
    }

    /* === PESAN === */
    .message-success {
      color: #16a34a;
      text-align: center;
      font-weight: 600;
      margin-bottom: 10px;
    }

    .message-error {
      color: #dc2626;
      text-align: center;
      font-weight: 600;
      margin-bottom: 10px;
    }

    /* === REGISTER LINK === */
    .register-link {
      text-align: center;
      margin-top: 20px;
      font-size: 0.9rem;
      color: var(--gray);
    }

    .register-link a {
      color: var(--teal);
      font-weight: 600;
      text-decoration: none;
      transition: color 0.3s ease;
    }

    .register-link a:hover {
      color: var(--aqua);
    }

    /* === RESPONSIVE === */
    @media (max-width: 480px) {
      .login-card {
        width: 90%;
        padding: 35px 25px;
      }
    }
  </style>
</head>
<body>

  <!-- 🫧 BUBBLE ANIMATION -->
  <div class="bubble"></div>
  <div class="bubble"></div>
  <div class="bubble"></div>
  <div class="bubble"></div>

  <!-- 💎 LOGIN CARD -->
  <div class="login-card">
    <div class="login-header">
      <div class="logo"><i class="fas fa-leaf"></i></div>
      <h2>Login Admin</h2>
      <p>Portal Budaya & Pariwisata 🌿</p>
    </div>

    <?php if ($this->session->flashdata('success')): ?>
      <p class="message-success"><?= $this->session->flashdata('success'); ?></p>
    <?php endif; ?>

    <?php if (isset($error)): ?>
      <p class="message-error"><?= $error; ?></p>
    <?php endif; ?>

    <?= form_open('admin/login'); ?>
      <div class="form-group">
        <label for="username">👤 Username</label>
        <input type="text" id="username" name="username" placeholder="Masukkan Username" required>
      </div>
      <div class="form-group">
        <label for="password">🔒 Password</label>
        <input type="password" id="password" name="password" placeholder="Masukkan Password" required>
      </div>
      <button type="submit">✨ Masuk Sekarang</button>
    <?= form_close(); ?>

    <div class="register-link">
      Belum punya akun? <a href="<?= site_url('admin/register'); ?>">Daftar Admin</a>
    </div>
  </div>

</body>
</html>
