<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Halaman <?= $data['judul']; ?></title>

  <link href="https://fonts.googleapis.com/css2?family=Lilita+One&display=swap" rel="stylesheet">

  <link rel="stylesheet" href="<?= BASEURL; ?>/css/bootstrap.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
  <link rel="stylesheet" href="<?= BASEURL; ?>/css/style.css">

</head>

<body>

<nav id="navbar" class="navbar bg-transparent">
  <div class="container-fluid d-flex">
    <!-- Brand -->
    <a class="navbar-brand me-3" href="<?= BASEURL; ?>">ProDev <span>14</span></a>
    <div style="width: 350px;"></div>

    <!-- Form Search -->
    <form class="main-form form-search d-flex align-items-center" role="search" action="<?= BASEURL; ?>/search" method="GET">
      <input class="form-control form-control-lg main-search rounded-pill me-2" type="search" placeholder="Search..." name="q" aria-label="Search">
      <button class="btn btn-lg main-search rounded-circle" type="submit">
        <i class="bi bi-search"></i>
      </button>
    </form>

    <!-- Notifikasi -->
    <a href="#" class="notif-icon d-flex align-items-center justify-content-center text-white text-decoration-none">
      <i class="bi bi-bell fs-5"></i>
    </a>

    <!-- User Info -->
    <div class="user-info d-flex align-items-center rounded-pill px-3 py-1">
      <span class="text-white fw-bold">Tajul</span>
      <i class="bi bi-person-circle text-white fs-2"></i>
    </div>
  </div>
</nav>



<?php
  $url = $_SERVER['REQUEST_URI'];
?>
<div id="sidebar" class="d-flex flex-column flex-shrink-0 sidebar-custom">
  <ul class="nav nav-pills flex-column mb-auto">
    <li class="nav-item">
      <?php $url = $_SERVER['REQUEST_URI']; ?>
      <a href="<?= BASEURL; ?>" 
        class="nav-link <?= $url == '/' || $url == '/manajemen-proyek/public/' || $url == '/manajemen-proyek/public/index.php' ? 'active' : '' ?>">
        <i class="bi bi-house-door me-2"></i> Home
      </a>
    </li>
    <li>
      <a href="<?= BASEURL; ?>/project" class="nav-link <?= str_contains($url, '/project') ? 'active' : '' ?>">
        <i class="bi bi-folder me-2"></i> Project
      </a>
    </li>
    <li>
      <a href="<?= BASEURL; ?>/new_project" class="nav-link <?= str_contains($url, '/new_project') ? 'active' : '' ?>">
        <i class="bi bi-file-earmark-plus me-2"></i> New Project
      </a>
    </li>
    <li>
      <a href="<?= BASEURL; ?>/schedule" class="nav-link <?= str_contains($url, '/schedule') ? 'active' : '' ?>">
        <i class="bi bi-calendar-event me-2"></i> Schedule
      </a>
    </li>
    <li>
      <a href="<?= BASEURL; ?>/mahasiswa" class="nav-link <?= str_contains($url, '/data') ? 'active' : '' ?>">
        <i class="bi bi-database me-2"></i> Data
      </a>
    </li>
    <li>
      <a href="<?= BASEURL; ?>/about" class="nav-link <?= str_contains($url, '/document') ? 'active' : '' ?>">
        <i class="bi bi-file-earmark-text me-2"></i> Document
      </a>
    </li>
    <li>
      <a href="<?= BASEURL; ?>/mahasiswa" class="nav-link <?= str_contains($url, '/report') ? 'active' : '' ?>">
        <i class="bi bi-bar-chart me-2"></i> Report
      </a>
    </li>
    <li>
      <a href="<?= BASEURL; ?>/mahasiswa" class="nav-link <?= str_contains($url, '/user') ? 'active' : '' ?>">
        <i class="bi bi-person me-2"></i> User
      </a>
    </li>
  </ul>
</div>
