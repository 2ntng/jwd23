<?php
require 'db_config.php';

/**
 * Fungsi menambahkan data pemesanan kedalam db.
 * 
 * @param array $data data dari form pesan.
 */
function insertPemesanan($data)
{
  global $conn;
  $id = md5(time());
  $breakfast = false;
  if (isset($data['breakfast'])) {
    $breakfast = true;
  }

  $query = "INSERT INTO tb_reservasi VALUES ('$id', '$data[nama]', '$data[jenis_kelamin]',
              '$data[no_identitas]', $data[tipe_kamar], 
              '$data[tanggal]', $data[durasi_menginap], 
              '$breakfast', now(), now())";
  if (mysqli_query($conn, $query)) {
    header('Location: reservasi.php?id=' . $id);
  } else {
    echo mysqli_error($conn);
  }
}

/**
 * Fungsi mengambil data reservasi/pemesanan pada db dengan id.
 *
 * @param string $id id reservasi/pemesanan berbentuk hash.
 * @return array array asosiatif berisi data reservasi/pemesanan.
 */
function getReservasi($id)
{
  global $conn;
  $query = "SELECT * FROM tb_reservasi R
              JOIN tb_tipe_kamar T ON T.id_tipe_kamar = R.id_tipe_kamar
              WHERE R.id_reservasi = '$id'";
  if (mysqli_query($conn, $query)) {
    return mysqli_fetch_assoc(mysqli_query($conn, $query));
  } else {
    echo mysqli_error($conn);
  }
}

/**
 * Fungsi mengambil seluruh data pemesanan yang ada pada db.
 *
 * @return array array asosiatif berisi seluruh data tiket.
 */
function getAllPemesanan()
{
  global $conn;
  $query = "SELECT * FROM tb_reservasi R
              JOIN tb_tipe_kamar T ON T.id_tipe_kamar = R.id_tipe_kamar";
  if (mysqli_query($conn, $query)) {
    return mysqli_query($conn, $query);
  } else {
    echo mysqli_error($conn);
  }
}

/**
 * Fungsi mengambil seluruh data tipe kamar yang ada pada db.
 *
 * @return array array asosiatif berisi seluruh data kelas.
 */
function getAllTipeKamar()
{
  global $conn;
  $query = "SELECT * FROM tb_tipe_kamar";
  if (mysqli_query($conn, $query)) {
    return mysqli_query($conn, $query);
  } else {
    echo mysqli_error($conn);
  }
}
