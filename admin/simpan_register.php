<?php
session_start();
if ($_SESSION['status'] != "sudah_login"){
    //melakukan pengalihan
    header("location:../login/login.php");
}

include "../config/koneksi.php";

$nama_lengkap = $_POST['nama_lengkap'];
$nik = $_POST['nik'];
$jk = $_POST['jk'];
$alamat = $_POST['alamat'];
$tlp = $_POST['tlp'];
$username = $_POST['username'];
$password = MD5($_POST['password']);
//$created = $_POST['created_at'];
$registrasi = $_POST['id_registrasi'];
$status = $_POST['status'];

$insert_data = mysqli_query($koneksi, "INSERT INTO `registrasi` (`id_registrasi`, `nama_lengkap`, `nik`, `jk`, `tlp`, `alamat`, `username`, `password`,`created_at`, `status`)
VALUES ('', '$nama_lengkap', '$nik', '$jk', '$tlp', '$alamat', '$username','$password', CURRENT_TIMESTAMP, '$status')");
if ($insert_data) {
    header('location:../login/login.php?pesan=Data Berhasil Di Simpan');
} else {
    //echo ('ERROR' . mysqli_error($koneksi));
    header('location:frm_register.php?pesan=Data Gagal Di Simpan');
}
