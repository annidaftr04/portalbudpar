<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Portal Budpar - Pengelola</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container">
    <a class="navbar-brand fw-bold" href="<?= site_url('pengelola') ?>">Pengelola Portal</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarPengelola">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarPengelola">
      <ul class="navbar-nav ms-auto">
        <li class="nav-item"><a href="<?= site_url('user') ?>" class="nav-link">User</a></li>
        <li class="nav-item"><a href="<?= site_url('pengelola') ?>" class="nav-link">Link Admin</a></li>
      </ul>
    </div>
  </div>
</nav>
