<?php
session_start();
if ($_SESSION['status'] != "sudah_login") {
    //melakukan pengalihan
    header("location:../login/login.php");
}
include "../layout/header.php";
include "../config/koneksi.php";
//$id = $_GET['id'];
//$sql = mysqli_query($koneksi, "SELECT * FROM registrasi");

?>
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Profil Pengguna</h1>
    </div>
    <?php if (isset($_GET['pesan'])) : ?>
        <div class="alert alert-success" role="alert">
            <?php echo $_GET['pesan']; ?>
        </div>
    <?php endif; ?>

    <!-- <canvas class="my-4 w-100" id="myChart" width="900" height="380"></canvas> -->
    <!-- <h4>Data Jadwal Kegiatan</h4> -->
    <!-- <a href="frm_tambah_pendaftar.php" class="btn btn-sm btn-primary">Tambah Data</a>
    <br><br> -->
    <div class="table-responsive">
        <table class="table table-striped table-bordered display nowrap" id="example" style="width: 100%">

            <thead class="table-light">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nama Lengkap</th>
                    <th scope="col">NIK</th>
                    <th scope="col">Jenis Kelamin</th>
                    <th scope="col">Alamat</th>
                    <th scope="col">NO Tlp/Hp</th>
                    <th scope="col">Username</th>
                    <th scope="col">Password</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>

                <tr>
                    <td><?php ; ?></td>
                    <td><?php echo $_SESSION['nama_lengkap']; ?></td>
                    <td><?php echo $_SESSION['nik']; ?></td>
                    <td><?php echo $_SESSION['jk']; ?></td>
                    <td><?php echo $_SESSION['alamat']; ?></td>
                    <td><?php echo $_SESSION['tlp']; ?></td>
                    <td><?php echo $_SESSION['username']; ?></td>
                    <td><?php echo $_SESSION['password']; ?></td>
                    <td>
                        <a href="frm_ubah_data_registrasi.php" class="btn btn-info btn-sm">Ubah</a>

                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</main>

<?php
include "../layout/footer.php";
?>