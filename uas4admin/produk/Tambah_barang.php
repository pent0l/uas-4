<?php
session_start();
if ($_SESSION['status'] != "sudah_login") {
	//melakukan pengalihan
	header("location:../login/login.php");
}
include "../layout/header.php";
include "../config/koneksi.php";
$query_1 = mysqli_query($koneksi, "SELECT * FROM pemasok");
$query_2 = mysqli_query($koneksi, "SELECT * FROM produk");

?>

<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
	<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
		<h1 class="h2">Form Tambah Barang</h1>
	</div>
	<div class="table-responsive">
		<form action="simpan_barang.php" method="POST">
			<div class="col-6">
				<div class="mb-3">
					<label for="exampleFormControlInputl" class="form-label">Nama Pemasok</label>
					<select name="id_pemasok" class="form-control" id="">
						<option value=""> Pilih Pemasok</option>
						<?php
						while ($rs_1 = mysqli_fetch_assoc($query_1)) : ?>
							<option value="<?= $rs_1['id_pemasok']; ?>"> <?= $rs_1['nama_pemasok']; ?></option>
						<?php endwhile; ?>
					</select>
				</div>
				<div class="mb-3">
					<label for="exampleFormControlTextareal" class="form-label">Nama Barang</label>
					<input type="text" name="nama_barang" class="form-control">
				</div>
				<div class="mb-3">
					<label for="exampleFormControlTextareal" class="form-label">Jumlah Barang</label>
					<input type="text" name="jumlah_barang" class="form-control">
				</div>
				<div class="mb-3">
					<label for="exampleFormControlTextareal" class="form-label">Jenis Produk</label>
					<select name="id_produk" class="form-control" id="">
						<option value="">Pilih Jenis Produk</option>
						<?php
						while ($rs_2 = mysqli_fetch_assoc($query_2)) : ?>
							<option value="<?= $rs_2['id_produk']; ?>"><?= $rs_2['nama_produk']; ?></option>
						<?php endwhile; ?>
					</select>
				</div>
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