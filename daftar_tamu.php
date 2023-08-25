<?php require 'database/db_function.php'; ?>
<?php require 'layout/header.php'; ?>
<?php require 'layout/navbar.php'; ?>

<?php
$data_pemesanan = getAllPemesanan();
?>
<br><br>
<div class="container-md text-center">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card custom-card shadow">
        <div class="card-body">
          <div class="row mb-3">
            <h3 class="text-center">Daftar Pemasanan</h3>
          </div>
          <table class="table align-middle">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Nama Pemesan</th>
                <th scope="col">Tipe Kamar</th>
                <th scope="col"></th>
              </tr>
            </thead>
            <tbody>
              <?php $row_no = 1; ?>
              <?php foreach ($data_pemesanan as $pemesanan) : ?>
                <tr>
                  <th scope="row"><?= $row_no++ ?></th>
                  <td><?= $pemesanan['nama_pemesan'] ?></td>
                  <td><?= $pemesanan['nama_tipe_kamar'] ?></td>
                  <td><a href="reservasi.php?id=<?= $pemesanan['id_reservasi'] ?>" class="btn btn-primary btn-sm" style="width:100%">Lihat</a></td>
                </tr>
              <?php endforeach; ?>
              <?php if ($row_no == 1) : ?>
                <tr>
                  <td colspan="4">Data Kosong</td>
                </tr>
              <?php endif; ?>

            </tbody>
          </table>
        </div>

      </div>
    </div>
  </div>
  <br><br>

  <?php require 'layout/footer.php'; ?>