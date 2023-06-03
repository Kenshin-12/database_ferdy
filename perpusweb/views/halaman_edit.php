<?php
require_once('../config/config.php');
//get current record
if (isset($_GET['buku_kode'])) {
	$get_query = "SELECT * FROM t_buku WHERE buku_kode='$_GET[buku_kode]';";
	$buku = mysqli_query($connect, $get_query)->fetch_assoc();
}

// edit records in database
if (isset($_POST['simpan'])) {
	$genre_to_post = implode(', ', $_POST['buku_genre']);
	$query = "UPDATE t_buku SET 
			buku_judul = '$_POST[buku_judul]',
			buku_penerbit = '$_POST[buku_penerbit]',
			buku_jenis = '$_POST[buku_jenis]', 
			buku_genre='$genre_to_post', 
			buku_stok='$_POST[buku_stok]', 
			buku_sinopsis = '$_POST[buku_sinopsis]'
			WHERE buku_kode='$_GET[buku_kode]'";
	if (isset($_FILES['buku_gambar']) && $_FILES['buku_gambar']['error'] !== 4) {
		$gambar = $_FILES['buku_gambar'];
		$direktori = dirname(__FILE__, 2) . '/assets/upload/';
		$nama_file = uniqid() . '_' . $gambar['name'];
		$destinasi = $direktori . $nama_file;
		move_uploaded_file($gambar['tmp_name'], $destinasi);
		$query = "UPDATE t_buku SET 
				buku_judul = '$_POST[buku_judul]', 
				buku_penerbit = '$_POST[buku_penerbit]', 
				buku_jenis = '$_POST[buku_jenis]', 
				buku_genre= '$genre_to_post', 
				buku_stok= '$_POST[buku_stok]', 
				buku_sinopsis = '$_POST[buku_sinopsis]',
				buku_gambar = '$nama_file'
				WHERE buku_kode='$_GET[buku_kode]'";
	}
	$result = mysqli_query($connect, $query);
	if ($result) {
		echo "<script type='text/javascript'>";
		echo "alert('Berhasil edit buku');";
		echo "window.location.href='halaman_list.php'";
		echo "</script>";
	} else {
		echo "<script type='text/javascript'>";
		echo "alert('Buku gagal diedit');";
		echo "window.history.back();";
		echo "</script>";
	}
}
// if(isset(POS))
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

		<h3>Tambah Data Buku</h3>

		<form class="form" method="post" action="" enctype="multipart/form-data">
			<div class="row">
				<div class="col-sm-4 pr-5">

					<!-- KODE BUKU -->
					<h6 class="mt-4">Kode Buku :</h6>
					<input disabled required type="text" class="form-control" name="buku_kode"
						value="<?= $buku['buku_kode'] ?>">

					<!-- JUDUL BUKU -->
					<h6 class="mt-4">Judul Buku :</h6>
					<input required type="text" class="form-control" name="buku_judul"
						value="<?= $buku['buku_judul'] ?>">

					<!-- PENERBIT BUKU -->
					<h6 class="mt-4">Penerbit Buku :</h6>
					<select required class="form-control" name="buku_penerbit">
						<option value="">Pilih Penerbit</option>
						<option <?php if ($buku['buku_penerbit'] === 'Pastel Books (Mizan)')
							echo 'selected' ?>>Pastel
								Books (Mizan)</option>
							<option <?php if ($buku['buku_penerbit'] === 'Gramedia')
							echo 'selected' ?>>Gramedia</option>
							<option <?php if ($buku['buku_penerbit'] === 'Erlangga')
							echo 'selected' ?>>Erlangga</option>
							<option <?php if ($buku['buku_penerbit'] === 'Elex Media Komputindo')
							echo 'selected' ?>>Elex
								Media
								Komputindo</option>
						</select>

						<!-- STOK BUKU -->
						<h6 class="mt-4">Stok Buku :</h6>
						<input required type="number" class="form-control" name="buku_stok"
							value="<?= $buku['buku_stok'] ?>">

				</div>

				<div class="col-sm-4 pl-5">

					<!-- JENIS BUKU -->
					<h6 class="mt-4">Jenis Buku :</h6>
					<input type="radio" class="form-check-input" name="buku_jenis" value="Religi" <?php if ($buku['buku_jenis'] === 'Religi')
						echo 'checked' ?>>Religi
						<br><input type="radio" class="form-check-input" name="buku_jenis" value="Pendidikan" <?php if ($buku['buku_penerbit'] === 'Pendidikan')
						echo 'checked' ?>>Pendidikan
						<br><input type="radio" class="form-check-input" name="buku_jenis" value="Novel" <?php if ($buku['buku_penerbit'] === 'Novel')
						echo 'checked' ?>>Novel
						<br><input type="radio" class="form-check-input" name="buku_jenis" value="Komik" <?php if ($buku['buku_penerbit'] === 'Komik')
						echo 'checked' ?>>Komik
						<br><input type="radio" class="form-check-input" name="buku_jenis" value="Cerpen" <?php if ($buku['buku_penerbit'] === 'Cerpen')
						echo 'checked' ?>>Cerpen

						<!-- GENRE BUKU -->
					<?php $genre_to_arr = explode(', ', $buku['buku_genre']) ?>
					<h6 class="mt-4">Genre Buku :</h6>
					<input type="checkbox" class="form-check-input" name="buku_genre[]" value="Ilmu Pengetahuan" <?php if (in_array('Ilmu Pengetahuan', $genre_to_arr))
						echo 'checked' ?>>Ilmu Pengetahuan
						<br><input type="checkbox" class="form-check-input" name="buku_genre[]" value="Romantis" <?php if (in_array('Romantis', $genre_to_arr))
						echo 'checked' ?>>Romantis
						<br><input type="checkbox" class="form-check-input" name="buku_genre[]" value="Komedi" <?php if (in_array('Komedi', $genre_to_arr))
						echo 'checked' ?>>Komedi
						<br><input type="checkbox" class="form-check-input" name="buku_genre[]" value="Horor" <?php if (in_array('Horor', $genre_to_arr))
						echo 'checked' ?>>Horor
						<br><input type="checkbox" class="form-check-input" name="buku_genre[]" value="Action" <?php if (in_array('Action', $genre_to_arr))
						echo 'checked' ?>>Action
					</div>

					<div class="col-sm-4">

						<!-- GAMBAR BUKU -->
						<h6 class="mt-4">Gambar Buku :</h6>
						<input type="file" name="buku_gambar">

						<!-- SINOPSIS BUKU -->
						<h6 class="mt-4">Sinopsis Buku :</h6>
						<textarea class="form-control" name="buku_sinopsis"><?= $buku['buku_sinopsis'] ?></textarea>

				</div>

				<!-- SUBMIT -->
				<button type="submit" class="btn btn-primary mt-4" name="simpan">Edit</button>

			</div>
		</form>
	</div>

</body>

</html>