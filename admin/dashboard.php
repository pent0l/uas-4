<?php
session_start();
if ($_SESSION['status'] != "sudah_login") {
    //melakukan pengalihan
    header("location:../login/login.php");
}
include "../layout/header.php";
include "../config/koneksi.php";
//$id = $_GET['id'];
$query_1 = mysqli_query($koneksi, "SELECT id_produk,nama_produk,harga FROM produk WHERE id_produk=id_produk");
// $query_2 = mysqli_query($koneksi, 'SELECT * FROM jns_seleksi');
//$rs_1 = mysqli_fetch_assoc($query_1);
?>
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Selamat Datang : <?php echo $_SESSION['nama_lengkap']; ?></h1>

    </div>

    <!-- <canvas class="my-4 w-100" id="myChart" width="900" height="380"></canvas> -->

    <h4>Identitas Pengguna</h4>
    <div class="mb-3">
        <div class="table-responsive">
            <table class="table table-striped table-bordered display nowrap" id="example" style="width:100%">
                <tr>
                    <td>Nama Lengkap</td>
                    <td><?php echo $_SESSION['nama_lengkap']; ?></td>
                </tr>
                <tr>
                    <td>Alamat</td>
                    <td><?php echo $_SESSION['alamat']; ?></td>
                </tr>
                <tr>
                    <td>No TLP/HP</td>
                    <td><?php echo $_SESSION['tlp']; ?></td>
                </tr>
                <tr>
                    <td>Jenis Kelamin</td>
                    <td><?php echo $_SESSION['jk']; ?></td>
                </tr>
            </table>
            <br><br>
            <h4>Silahkan Pilih Produk</h4>
            <div class="mb-3">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered display nowrap" id="example" style="width:100%">
                        <thead class="table-light">
                            <tr>
                           
                            <th>Nama Produk</th>
                            <th>Harga</th>
                            <th>#</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            while ($rs_1 = mysqli_fetch_assoc($query_1)) : ?>
                                <tr>
    
                                    <td><?= $rs_1['nama_produk']; ?></td>
                                    <td><?= $rs_1['harga']; ?></td>
                                    <td>
                                        <a role="link" href="beli_produk.php?id=<?= $rs_1['id_produk']; ?>" class="btn btn-success btn-sm">Lihat</a>
                                    </td>
                                </tr>
                            <?php
                                $no++;
                            endwhile;
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
        <tbody>

        </tbody>
    </div>
</main>
<?php
include "../layout/footer.php";
?>