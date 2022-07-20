<?php
// mengaktifkan session php
session_start();

// menghubungkan dengan koneksi
include '../config/koneksi.php';

// menangkap data yang dikirim dari form
$username = $_POST['username'];
$password = md5($_POST['password']);

// menyeleksi data user dengan username dan password yang sesuai
$result = mysqli_query($koneksi, "SELECT * FROM registrasi where username='$username' and password='$password'");

$cek = mysqli_num_rows($result);

if ($cek > 0) {
    $data = mysqli_fetch_array($result);
    $_SESSION['username'] = $username;
    $_SESSION['nama_lengkap'] = $data['nama_lengkap'];
    $_SESSION['nik'] = $data['nik'];
    $_SESSION['jk'] = $data['jk'];
    $_SESSION['tlp'] = $data['tlp'];
    $_SESSION['alamat'] = $data['alamat'];
    $_SESSION['creted_at'] = $data['created_at'];
    $_SESSION['status'] = "sudah_login";
    $_SESSION['id_registrasi'] = $data['id_registrasi'];
    header("location:../admin/dashboard.php");
} else {
    header("location:login.php?pesan=gagal login data tidak ditemukan.");
}
