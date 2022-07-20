<?php
session_start();
if ($_SESSION['status'] != "sudah_login") {
    //melakukan pengalihan
    header("location:../login/login.php");
}
include "../layout/header.php";
include "../config/koneksi.php";
$id = $_SESSION['id_registrasi'];
$sql = mysqli_query($koneksi, "SELECT * FROM `pembelian_produk` INNER JOIN pembayaran ON pembelian_produk.id_pembelian=pembayaran.id_pembelian where id_registrasi='$id'");
?>
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Riwayat pembelian <?php echo $_SESSION['nama_lengkap']; ?></h1>
    </div>
    <?php if (isset($_GET['pesan'])) : ?>
        <div class="alert alert-success" role="alert">
            <?php echo $_GET['pesan']; ?>
        </div>
    <?php endif; ?>

    <!-- <a href="frm_tambah_data_ekskul.php" class="btn btn-sm btn-primary">Tambah Data</a>
    <br><br> -->
    <div class="table-responsive">
        <table class="table table-striped table-bordered display nowrap" id="example" style="width:100%">
            <thead class="table-light">
                <tr>
                    
                    <th scope="col">#</th>
                    <th scope="col">jenis Produk</th>
                    <th scope="col">Tanggal</th>
                    <th scope="col">Status</th>
                    <th scope="col">Total Bayar</th>
                  
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                while ($rs = mysqli_fetch_assoc($sql)) : ?>
                    <tr>
                        <td><?= $no; ?></td>
                        <td><?= $rs['id_produk']; ?></td>
                        <td><?= $rs['tgl_bayar']; ?></td>
                        <td><?= $rs['status']; ?></td>
                        <td><?= $rs['total_bayar']; ?></td>
                        
                    </tr>
                <?php
                    $no++;
                endwhile;
                ?>
            </tbody>
        </table>
    </div>

</main>
<?php
include "../layout/footer.php";
?>