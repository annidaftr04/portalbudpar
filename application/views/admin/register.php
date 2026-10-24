<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Registrasi Admin | Portal Budpar</title>

  <!-- Google Font -->
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">

  <!-- Font Awesome -->
  <script src="https://kit.fontawesome.com/a2d9d6bdb7.js" crossorigin="anonymous"></script>

  <style>
    :root {
      --teal: #14b8a6;
      --mint: #a7f3d0;
      --aqua: #99f6e4;
      --bg: #ecfeff;
      --white: #ffffff;
      --text: #1e293b;
      --gray: #64748b;
      --error: #ef4444;
      --success: #10b981;
    }

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

    /* 🫧 Floating Bubbles Background */
    .bubble {
      position: absolute;
      bottom: -100px;
      width: 60px;
      height: 60px;
      background: rgba(255, 255, 255, 0.2);
      border-radius: 50%;
      animation: rise 10s infinite ease-in;
    }
    .bubble:nth-child(1) { left: 10%; animation-delay: 0s; }
    .bubble:nth-child(2) { left: 35%; width: 90px; height: 90px; animation-delay: 2s; }
    .bubble:nth-child(3) { left: 60%; width: 75px; height: 75px; animation-delay: 4s; }
    .bubble:nth-child(4) { left: 85%; width: 50px; height: 50px; animation-delay: 1s; }

    @keyframes rise {
      0% { transform: translateY(0) scale(1); opacity: 0.8; }
      100% { transform: translateY(-1000px) scale(1.2); opacity: 0; }
    }

    /* 💎 Registration Card */
    .register-card {
      position: relative;
      background: rgba(255, 255, 255, 0.88);
      backdrop-filter: blur(14px);
      border-radius: 25px;
      padding: 45px 45px 55px;
      box-shadow: 0 20px 45px rgba(0, 0, 0, 0.15);
      width: 420px;
      z-index: 2;
      animation: fadeIn 1s ease forwards;
    }

    @keyframes fadeIn {
      from { opacity: 0; transform: translateY(20px); }
      to { opacity: 1; transform: translateY(0); }
    }

    .register-header {
      text-align: center;
      margin-bottom: 25px;
    }

    .register-header .logo {
      font-size: 2.6rem;
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

    .register-header h2 {
      margin: 0;
      color: var(--text);
      font-weight: 700;
      font-size: 1.7rem;
    }

    .register-header p {
      margin-top: 5px;
      color: var(--gray);
      font-size: 0.9rem;
    }

    /* ✏️ Form Style */
    form .form-group {
      margin-bottom: 18px;
    }

    label {
      display: block;
      font-weight: 600;
      color: var(--text);
      margin-bottom: 6px;
      font-size: 0.95rem;
    }

    input[type="text"],
    input[type="password"],
    select {
      width: 100%;
      padding: 12px 15px;
      border-radius: 10px;
      border: 1px solid #e2e8f0;
      font-size: 1rem;
      background: #f8fafc;
      transition: all 0.3s ease;
    }

    input:focus,
    select:focus {
      outline: none;
      border-color: var(--teal);
      box-shadow: 0 0 0 3px rgba(20, 184, 166, 0.2);
      background: #fff;
    }

    /* ✨ Button */
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
      margin-top: 10px;
    }

    button:hover {
      transform: translateY(-2px);
      box-shadow: 0 12px 25px rgba(20, 184, 166, 0.6);
    }

    /* 🔔 Error Messages */
    .error-message {
      color: var(--error);
      text-align: center;
      font-weight: 600;
      margin-bottom: 15px;
      font-size: 0.9rem;
    }

    /* 🌱 Login Link */
    .login-link {
      text-align: center;
      margin-top: 18px;
      font-size: 0.9rem;
      color: var(--gray);
    }

    .login-link a {
      color: var(--teal);
      font-weight: 600;
      text-decoration: none;
      transition: color 0.3s ease;
    }

    .login-link a:hover {
      color: var(--aqua);
    }

    /* 📱 Responsive */
    @media (max-width: 480px) {
      .register-card {
        width: 90%;
        padding: 35px 25px;
      }
    }
  </style>
</head>

<body>

  <!-- Floating Bubbles -->
  <div class="bubble"></div>
  <div class="bubble"></div>
  <div class="bubble"></div>
  <div class="bubble"></div>

  <div class="register-card">
    <div class="register-header">
      <div class="logo"><i class="fas fa-user-plus"></i></div>
      <h2>Registrasi Admin</h2>
      <p>Buat akun admin baru untuk Portal Budpar 🌿</p>
    </div>

    <?php if (validation_errors()): ?>
      <div class="error-message">
        <?= validation_errors(); ?>
      </div>
    <?php endif; ?>

    <?= form_open('admin/register'); ?>
      <div class="form-group">
        <label for="nama">🌸 Nama Lengkap</label>
        <input type="text" name="nama" value="<?= set_value('nama'); ?>" placeholder="Masukkan nama lengkap" required>
      </div>

      <div class="form-group">
        <label for="username">👤 Username</label>
        <input type="text" name="username" value="<?= set_value('username'); ?>" placeholder="Username unik" required>
      </div>

      <div class="form-group">
        <label for="password">🔒 Password</label>
        <input type="password" name="password" placeholder="Minimal 6 karakter" required>
      </div>

      <div class="form-group">
        <label for="passconf">🪄 Konfirmasi Password</label>
        <input type="password" name="passconf" placeholder="Ulangi password" required>
      </div>

      <button type="submit">✨ Daftar Sekarang</button>
    <?= form_close(); ?>

    <div class="login-link">
      Sudah punya akun? <a href="<?= site_url('admin/login'); ?>">Login di sini</a>
    </div>
  </div>

</body>
</html>
