<?php
session_start();
if ($_SESSION['status'] != "sudah_login") {
    //melakukan pengalihan
    header("location:../login/login.php");
}
include "../layout/header.php";
include "../config/koneksi.php";
?>
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Selamat Datang : <?php echo $_SESSION['nama_lengkap']; ?></h1>

    </div>

    <!-- <canvas class="my-4 w-100" id="myChart" width="900" height="380"></canvas> -->
        <tbody>



        </tbody>
    </div>
</main>
<?php
include "../layout/footer.php";
?>