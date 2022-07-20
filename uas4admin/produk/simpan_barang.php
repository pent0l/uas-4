<?php
session_start();
if ($_SESSION['status'] != "sudah_login") {
   //melakukan pengalihan
   header("location:../login/login.php");
}
include "../config/koneksi.php";


$id_pemsok = $_POST['id_pemasok'];
$id_produk = $_POST['id_produk'];
$nama_barang = $_POST['nama_barang'];
//$created_at = $_POST['created_at'];
$jumlah_barang = $_POST['jumlah'];

//$insert_data = mysqli_query($koneksi, "INSERT INTO `ekskul` (`id_jns_ekskul`, `id_pengasuh`, `jadwal`, `keterangan`) VALUES ('$id_jns_ekskul', '$id_pengasuh', '$jadwal', '$keterangan')");

$insert_data = mysqli_query($koneksi, "INSERT INTO `barang` (`id_barang`, `nama_barang`, `jumlah`, `created_at`, `id_produk`, `id_pemasok`) VALUES (NULL, '$nama_barang', '$jumlah_barang', current_timestamp(), '$id_produk', '$id_pemasok')");
if ($insert_data) {
   header('location:data_barang.php?pesan=Data Berhasil Di Simpan');
} else {
   echo ('ERROR' . mysqli_error($koneksi));
   //header('location:data_barang.php?pesan=Data Gagal Di Simpan');
}
