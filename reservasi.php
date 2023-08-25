<?php require 'database/db_function.php'; ?>
<?php require 'layout/header.php'; ?>
<?php require 'layout/navbar.php'; ?>

<?php
if (isset($_GET['id'])) {
  $data = getReservasi($_GET['id']);
} else {
  header('Location: index.php');
}
?>

<br><br>
<div class="row m-0 justify-content-center">
  <div class="col-md-6">
    <div class="tiket container shadow p-3 mb-5 rounded" style="background: linear-gradient(60deg, rgba(238, 238, 255, 1)40%, rgba(238, 238, 255, 0.5)), url(<?= $data["foto"] ?>); background-size: contain;background-position: right !important;">
      <form method="POST">
        <div class="row mb-2">
          <h3>Reservasi Kamar</h3>
        </div>
        <div class="row">
          <div for="nama_pemesan" class="col-sm-4">Nama Pemesan</div>
          <div class="col-sm-8">
            : <?= $data["nama_pemesan"] ?>
          </div>
        </div>
        <div class="row">
          <div for="no_identitas" class="col-sm-4">Nomor Identitas</div>
          <div class="col-sm-8">
            : <?= $data["no_identitas"] ?>
          </div>
        </div>
        <div class="row">
          <div for="jenis_kelamin" class="col-sm-4">Jenis Kelamin</div>
          <div class="col-sm-8">
            : <?= $data["jenis_kelamin"] ? "Laki-laki" : "Perempuan" ?>
          </div>
        </div>
        <div class="row">
          <div for="tipe_kamar" class="col-sm-4">Tipe Kamar</div>
          <div class="col-sm-8">
            : <?= $data["nama_tipe_kamar"] ?>
          </div>
        </div>
        <div class="row">
          <div for="durasi_menginap" class="col-sm-4">Durasi Penginapan</div>
          <div class="col-sm-8">
            : <?= $data["durasi_menginap"] ?> Hari
          </div>
        </div>
        <div class="row">
          <div class="col-sm-4">
            <div for="discount">Discount</div>
          </div>
          <div class="col-sm-8">
            : <?= $data["durasi_menginap"] > 3 ? "10" : "0" ?>%
          </div>
        </div>
        <div class="row">
          <div class="col-sm-4">Total Bayar</div>
          <div class="col-sm-8">
            <?php
              $total_bayar = $data["harga"] * $data["durasi_menginap"];
              if ($data["durasi_menginap"] > 3) {
                $total_bayar -= $total_bayar * 1 / 10;
              }
              if ($data["breakfast"]) {
                $total_bayar += 80000;
              }
            ?>
            : Rp. <?= number_format($total_bayar) ?>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
<div class="col-2" style="margin: auto;">
  <a href="daftar_tamu.php" class="btn btn-primary" style="width:100%">Back</a>
</div>
<br><br>

<?php require 'layout/footer.php'; ?>