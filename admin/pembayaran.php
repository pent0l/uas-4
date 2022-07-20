<?php
session_start();
if ($_SESSION['status'] != "sudah_login") {
    //melakukan pengalihan
    header("location:../login/login.php");
}
include "../config/koneksi.php";
$id = $_GET['id'];
$query_1 = mysqli_query($koneksi, "SELECT id_pembelian, id_produk, id_registrasi FROM pembelian_produk WHERE id_pembelian=$id");
$rs_1 = mysqli_fetch_assoc($query_1);
$query_2 = mysqli_query($koneksi, "SELECT * FROM pembayaran WHERE id_pembayaran='$id'");
$rs_2 = mysqli_fetch_assoc($query_2);
$id_pembelian = $rs_2['id_pembelian'];
$total_bayar = $rs_2['total_bayar'];



$insert_data = mysqli_query($koneksi, "INSERT INTO pembayaran (id_pembelian,total_bayar) VALUES ('$id_pembelian','$total_bayar')");

if ($insert_data) {
    header('location:beli_produk.php?pesan:Transaksi Berhasil Dilakukan');
} else {
    echo ('ERROR' . mysqli_error($koneksi));
    //header('location:data_seleksi.php?pesan=Transaksi Gagal Dilakukan');
}
