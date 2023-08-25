<?php require 'database/db_function.php'; ?>
<?php require 'layout/header.php'; ?>
<?php require 'layout/navbar.php'; ?>

<?php
if (isset($_POST['submit'])) {
  insertPemesanan($_POST);
}
if (isset($_GET['id_tipe_kamar'])) {
  $id_tipe_kamar = $_GET['id_tipe_kamar'];
} else {
  $id_tipe_kamar = 0;
}
$data_tipe_kamar = getAllTipeKamar();
?>

<br>
<div class="container-sm">
  <div class="row justify-content-center">
    <div class="col-md-10">
      <div class="card custom-card shadow">
        <div class="card-body">
          <form method="POST">
            <div class="row mb-3">
              <h2>Form Pemesanan</h2>
            </div>
            <div class="row mb-3">
              <label for="nama" class="col-sm-3 col-form-label">Nama Pemesan</label>
              <div class="col-sm-9">
                <input type="text" class="form-control" id="nama" name="nama" required>
              </div>
            </div>
            <div class="row mb-3">
              <label for="no_hp" class="col-sm-3 col-form-label">Jenis Kelamin</label>
              <div class="col-sm-9">
                <div class="form-check form-check-inline">
                  <input class="form-check-input" type="radio" name="jenis_kelamin" id="male" value="1" required>
                  <label class="form-check-label" for="male">Laki-laki</label>
                </div>
                <div class="form-check form-check-inline">
                  <input class="form-check-input" type="radio" name="jenis_kelamin" id="female" value="0" required>
                  <label class="form-check-label" for="female">Perempuan</label>
                </div>
              </div>
            </div>
            <div class="row mb-3">
              <label for="no_identitas" class="col-sm-3 col-form-label">Nomor Identitas</label>
              <div class="col-sm-9">
                <input type="text" class="form-control" id="no_identitas" name="no_identitas" pattern=".{16,16}" title="Isian salah..data harus 16 digit" required oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');">
              </div>
            </div>
            <div class="row mb-3">
              <label for="tipe_kamar" class="col-sm-3 col-form-label">Tipe Kamar</label>
              <div class="col-sm-9">
                <select class="form-select" id="tipe_kamar" name="tipe_kamar" onchange="updateHarga()" required>
                  <option value="0" disabled="disabled" selected>Pilih tipe kamar</option>
                  <?php
                  foreach ($data_tipe_kamar as $tipe_kamar) : ?>
                    <option value="<?= $tipe_kamar['id_tipe_kamar'] ?>" <?= $tipe_kamar['id_tipe_kamar'] == $id_tipe_kamar ? "selected" : "" ?>>
                      <?= $tipe_kamar['nama_tipe_kamar'] ?>
                    </option>
                  <?php endforeach; ?>
                </select>
              </div>
            </div>
            <div class="row mb-3">
              <label for="harga" class="col-sm-3 col-form-label">Harga</label>
              <div class="col-sm-9">
                <input type="text" class="form-control" id="harga" name="harga" disabled>
              </div>
            </div>
            <div class="row mb-3">
              <label for="tanggal" class="col-sm-3 col-form-label">Tanggal Keberangkatan</label>
              <div class="col-sm-9">
                <input type="date" class="form-control" id="tanggal" name="tanggal" required>
              </div>
            </div>
            <div class="row mb-3">
              <label for="durasi_menginap" class="col-sm-3 col-form-label">Durasi Menginap</label>
              <div class="col-sm-9">
                <input type="number" min="0" class="form-control" id="durasi_menginap" name="durasi_menginap" required>
              </div>
            </div>
            <div class="row mb-3">
              <label for="no_hp" class="col-sm-3 col-form-label">Termasuk Breakfast</label>
              <div class="col-sm-9">
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" id="breakfast" name="breakfast">
                  <label class="form-check-label" for="breakfast">
                    Ya
                  </label>
                </div>
              </div>
            </div>
            <div class="row mb-3">
              <label for="total_bayar" class="col-sm-3 col-form-label">Total Bayar</label>
              <div class="col-sm-9">
                <input type="text" class="form-control" id="total_bayar" name="total_bayar" disabled>
              </div>
            </div>
            <div class="row">
              <div class="col-md-4 my-1">
                <button type="button" class="btn btn-primary btn-block" style="width:100%" onclick="totalBayar()">Hitung Total Bayar</button>
              </div>
              <div class="col-md-4 my-1">
                <button type="submit" class="btn btn-primary btn-block" style="width:100%" name="submit">Pesan Tiket</button>
              </div>
              <div class="col-md-4 my-1">
                <button type="button" class="btn btn-primary btn-block" style="width:100%">Cancel</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
<br>

<script>
  document.getElementById('tipe_kamar').setAttribute('selected', 'selected');
  var harga = <?php
              $harga = array(0);
              foreach ($data_tipe_kamar as $tipe_kamar) {
                $harga += ["$tipe_kamar[id_tipe_kamar]" => intval($tipe_kamar['harga'])];
              }
              echo json_encode($harga); ?>;

  function updateHarga() {
    let tipe_kamar = document.getElementById('tipe_kamar').value;
    if (tipe_kamar != 0) {
      document.getElementById('harga').value = "Rp. " + numberFormat(harga[tipe_kamar]);
    }
  }

  function totalBayar() {
    let tipe_kamar = document.getElementById('tipe_kamar').value;
    let durasi = document.getElementById('durasi_menginap').value;
    let breakfast = document.getElementById('breakfast');
    let total_bayar = harga[tipe_kamar] * durasi;
    if (durasi > 3) {
      total_bayar = total_bayar - total_bayar * 1 / 10
    }
    if (breakfast.checked) {
      total_bayar = total_bayar + 80000
    }
    document.getElementById('total_bayar').value = "Rp. " + numberFormat(total_bayar);
  }

  function numberFormat(x) {
    return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
  }

  updateHarga();
</script>

<?php require 'layout/footer.php'; ?>