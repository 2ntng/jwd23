<?php require 'database/db_function.php'; ?>
<?php require 'layout/header.php'; ?>
<?php require 'layout/navbar.php'; ?>
<?php
$data_tipe_kamar = getAllTipeKamar();
?>

<br><br>
<div class="container-md text-center">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card custom-card shadow">
        <div class="card-body">

          <div class="row mb-2">
            <h3 class="text-center">Tipe Kamar</h3>
          </div>

          <div class="row row-cols-1 row-cols-md-3 g-4">
            <?php foreach ($data_tipe_kamar as $tipe_kamar) : ?>
              <div class="col">
                <div class="card h-100">
                  <img src="<?= $tipe_kamar['foto'] ?>" class="card-img-top" alt="...">
                  <div class="card-body">
                    <h5 class="card-title"><?= $tipe_kamar['nama_tipe_kamar'] ?></h5>
                  </div>
                  <ul class="list-group list-group-flush">
                    <li class="list-group-item">Rp. <?= number_format($tipe_kamar['harga']) ?></li>
                  </ul>
                  <div class="card-body text-center">
                    <a href="pemesanan.php?id_tipe_kamar=<?= $tipe_kamar['id_tipe_kamar'] ?>" class="btn btn-danger">Pesan tiket</a>
                  </div>
                </div>
              </div>
            <?php endforeach; ?>

          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<br><br>


<?php require 'layout/footer.php'; ?>