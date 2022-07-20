<?php
session_start();
if ($_SESSION['status'] != "sudah_login") {
    //melakukan pengalihan
    header("location:../login/login.php");
}
include "../config/koneksi.php";
$id_produk = $_POST['id_produk'];
//$id_santri = $_POST['id_santri'];
//$id_registrasi = $_POST['id_registrasi'];

$insert_data = mysqli_query($koneksi, "INSERT INTO pembelian_produk(id_produk) VALUES ('$id_produk')");

if ($insert_data) {
    header('location:beli_produk.php?pesan=Pesanan Sedang Diproses, Silahkan Lakukan Pembayaran');
} else {
    echo ('ERROR' . mysqli_error($koneksi));
    //header('location:beli_produk.php?pesan=Pesanan Gagal Diproses, Silahkan Lakukan Pemesanan Ulang');
}
