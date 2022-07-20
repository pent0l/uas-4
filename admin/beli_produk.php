<?php
session_start();
if ($_SESSION['status'] != "sudah_login") {
    //melakukan pengalihan
    header("location:../login/login.php");
}
include "../layout/header.php";
include "../config/koneksi.php";
$id = $_GET['id'];
$id2 = $_GET['id'];
$query_1 = mysqli_query($koneksi, "SELECT id_produk,nama_produk,harga FROM produk WHERE id_produk='$id'");
$query_2 = mysqli_query($koneksi, "SELECT * FROM `barang` WHERE id_produk='$id2'");
$rs_1 = mysqli_fetch_assoc($query_1);
//$rs_2 = mysqli_fetch_assoc($query_2);
?>
<main class="col=md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Pembelian Produk</h1>
    </div>

    <div class="row">
        <div class="table-responsive">
            <form action="simpan_beli_produk.php" method="POST">
                <div class="mb-3">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered display nowrap" id="example" style="width:100%">

                            <tr>
                                <td>Nama Produk</td>
                                <td><?= $rs_1['nama_produk']; ?></td>
                            </tr>
                            <tr>
                                <td>Harga</td>
                                <td><?= $rs_1['harga']; ?></td>
                            </tr>
                        </table>
                    </div>
                </div>

                <div class="mb-6">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered display nowrap" id="example" style="width:100%">

                            <tr>
                                <th>Nama barang</th>
                                <th>Jumlah</th>
                            </tr>
                            <?php while ($rs_2 = mysqli_fetch_assoc($query_2)) : ?>
                                <tr>
                                    <td><?= $rs_2['nama_barang']; ?></td>
                                    <td><?= $rs_2['jumlah']; ?></td>
                                </tr>
                            <?php
                            endwhile;
                            ?>
                        </table>
                    </div>
                </div>
                <div class="mb-3">
                    <button type="submit" class="btn btn-sm btn-success">Beli</button>
                </div>
            </form>
        </div>
    </div>
</main>
<?php
include "../layout/footer.php";
?>