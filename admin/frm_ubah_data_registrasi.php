<?php
session_start();
if ($_SESSION['status'] != "sudah_login") {
    //melakukan pengalihan
    header("location:../login/login.php");
}
//include "../layout/header.php";
include "../config/koneksi.php";
$id = $_GET['id'];
$query = mysqli_query($koneksi, "SELECT * FROM `registrasi` WHERE id_registrasi=$id");
$rs = mysqli_fetch_assoc($query);
?>
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Form Ubah Data Pengguna</h1>
    </div>
    <div class="table-responsive">
        <form action="simpan_ubah_data_registrasi.php" method="POST">
            <div class="col-6">
                <div class="mb-3">
                    <label for="exampleFormControlInputl" class="form-label">Nama Lengkap</label>
                    <input type="text" name="nama_lengkap" value="<?= $rs['nama_lengkap']; ?>" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlTextareal" class="form-label">NIK</label>
                    <input type="text" name="nik" value="<?= $rs['nik']; ?>" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlTextareal" class="form-label">Jenis Kelamin</label>
                    <input type="text" name="jk" value="<?= $rs['jk']; ?>" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlTextareal" class="form-label">Alamat</label>
                    <input type="text" name="tlp" value="<?= $rs['tlp']; ?>" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlTextareal" class="form-label">No Tlp/HP</label>
                    <input type="text" name="alamat" value="<?= $rs['alamat']; ?>" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlTextareal" class="form-label">username</label>
                    <input type="text" name="username" value="<?= $rs['username']; ?>" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlTextareal" class="form-label">Password</label>
                    <input type="password" name="password" value="<?= $rs['password']; ?>" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlTextareal" class="form-label">created_at</label>
                    <input type="text" name="created" value="<?= $rs['created_at']; ?>" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlTextareal" class="form-label">Status</label>
                    <input type="text" name="status" value="<?= $rs['status']; ?>" class="form-control">
                </div>
                <input type="hidden" name="id_registrasi" value="<?= $id; ?>" id="">
                <div class="mb-3">
                    <button type="submit" class="btn btn-sm btn-primary">Simpan</button>
                </div>
            </div>
        </form>
    </div>
</main>
<?php
include "../layout/footer.php";
?>