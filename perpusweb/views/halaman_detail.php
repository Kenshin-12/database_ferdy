<?php
//koneksi ke database
require_once('../config/config.php');

// Mengecek apakah ada parameter 'buku_kode' yang dikirimkan
if (isset($_GET['buku_kode'])) {
	// Mengambil nilai parameter 'buku_kode'
	$get_query = "SELECT * FROM t_buku WHERE buku_kode='$_GET[buku_kode]';";
	$buku = mysqli_query($connect, $get_query)->fetch_assoc();
	$result = mysqli_query($connect, $get_query);
	$array = mysqli_fetch_array($result);
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Perpustakaan</title>
	<link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.css">
</head>
<body>

<!-- NAVIGASI -->
<nav class="navbar navbar-expand-sm bg-dark navbar-dark sticky-top">
	<ul class="navbar-nav">
		<li class="nav-item">
			<a class="nav-link" href="">Home</a>
		</li>
		<li class="nav-item">
			<a class="nav-link" href="">Buku</a>
		</li>
		<li class="nav-item">
			<a class="nav-link" href="">Kategori</a>
		</li>
	</ul>
</nav>
<!-- END NAVIGASI; -->
<div class="container" style="margin-top:30px;">
	<!-- menampilkan detail buku -->
	<h3>Detail Data</h3>

	<div class="row justify-content-center">
		<div class="col-sm-4">
			<img src="" class="rounded" style="width:100%;">
			<h4 class="text-center text-info"><?=$array["buku_kode"]?></h4>

			<div class="row justify-content-center" style="margin-top: 30px;">
				<a href="halaman_list.php" class="btn btn-success">kembali</a>			
			</div>
		</div>

			<div class="col-sm-8">
					<div>
						<?php if($array["buku_gambar"] == ""){?>
						<img src="../assets/upload/default.jpg" class="rounded" style="width:35%;padding-bottom:1rem;">
						<?php }else{ ?>
						<img src="../assets/upload/<?= $array["buku_gambar"]?>" class="rounded" style="width:35%;padding-bottom:1rem;">
						<?php } ?>
					</div>
				<h6 class="text-info">Judul</h6>
					<h3><?=$array["buku_judul"]?></h3>

				<h6 class="text-info">Penerbit</h6>
					<p><?=$array["buku_penerbit"]?></p>

				<h6 class="text-info">Jenis Buku</h6>
					<p><?=$array["buku_jenis"]?></p>

				<h6 class="text-info">Genre Buku</h6>		
					<p><?=$array["buku_genre"]?></p>

				<h6 class="text-info">Stok</h6>
					<p><?=$array["buku_stok"]?></p>

				<h6 class="text-info">Sinopsis</h6>
					<p><?=$array["buku_sinopsis"]?></p>
				<div>
				</div>
			</div>
	</div>
</div>
</body>
</html>