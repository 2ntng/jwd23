<?php
// Get URI
$page = substr($_SERVER["SCRIPT_NAME"], strrpos($_SERVER["SCRIPT_NAME"], "/") + 1);
?>

<nav class="navbar sticky-top navbar-expand-lg navbar-light bg-white">
  <div class="container-fluid">
    <a class="navbar-brand" href="index.php">
      <b>GRAND <span>OBELISK</span></b>
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse me-auto" id="navbarSupportedContent">
      <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link <?= $page == 'index.php' ? 'active' : ''; ?>" aria-current="page" href="index.php">Tipe Kamar</a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?= $page == 'pemesanan.php' ? 'active' : ''; ?>" href="pemesanan.php">Pemesanan</a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?= $page == 'daftar_tamu.php' ? 'active' : ''; ?>" href="daftar_tamu.php">Daftar Tamu</a>
        </li>
      </ul>
    </div>
  </div>
</nav>