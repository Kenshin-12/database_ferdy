<?php
require_once('../config/config.php');

// Mengecek apakah tombol 'simpan' telah diklik
if (isset($_POST['simpan'])) {
	// Menggabungkan nilai-nilai genre buku menjadi satu string
	$genre_to_post = implode(', ', $_POST['buku_genre']);
	// Membuat query untuk menyimpan data buku ke dalam tabel t_buku
	$query = "INSERT INTO t_buku (buku_kode, buku_judul, buku_penerbit, buku_jenis, buku_genre, buku_stok, buku_sinopsis) VALUES 
			('$_POST[buku_kode]', '$_POST[buku_judul]', '$_POST[buku_penerbit]', '$_POST[buku_jenis]', '$genre_to_post','$_POST[buku_stok]', '$_POST[buku_sinopsis]');";

	// Mengecek apakah ada file gambar yang diunggah dan tidak ada kesalahan pada proses upload
	if (isset($_FILES['buku_gambar']) && $_FILES['buku_gambar']['error'] !== 4) {
		// Mendapatkan informasi file gambar yang diunggah
		$gambar = $_FILES['buku_gambar'];
		// Mendapatkan direktori tujuan penyimpanan file gambar
		$direktori = dirname(__FILE__, 2) . '/assets/upload/';
		// Menghasilkan nama unik untuk file gambar
		$nama_file = uniqid() . '_' . $gambar['name'];
		// Menggabungkan direktori dengan nama file gambar	
		$destinasi = $direktori . $nama_file;
		// Memindahkan file gambar dari lokasi sementara ke destinasi yang ditentukan
		move_uploaded_file($gambar['tmp_name'], $destinasi);
		// Mengubah query untuk menyertakan nama file gambar saat menyimpan data buku
		$query = "INSERT INTO t_buku (buku_kode, buku_judul, buku_penerbit, buku_jenis, buku_genre, buku_stok, buku_sinopsis, buku_gambar) VALUES 
				('$_POST[buku_kode]', '$_POST[buku_judul]', '$_POST[buku_penerbit]', '$_POST[buku_jenis]', '$genre_to_post','$_POST[buku_stok]', '$_POST[buku_sinopsis]', '$nama_file');";
	}
	$result = mysqli_query($connect, $query);
	if ($result) {
		// Menampilkan pesan berhasil dan mengarahkan pengguna ke halaman list buku
		echo "<script type='text/javascript'>";
		echo "alert('Berhasil tambah buku');";
		echo "window.location.href='halaman_list.php'";
		echo "</script>";
	} else {
		// Menampilkan pesan gagal dan mengarahkan pengguna ke halaman sebelum
		echo "<script type='text/javascript'>";
		echo "alert('Buku gagal ditambahkan');";
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
					<input required type="text" class="form-control" name="buku_kode">

					<!-- JUDUL BUKU -->
					<h6 class="mt-4">Judul Buku :</h6>
					<input required type="text" class="form-control" name="buku_judul">

					<!-- PENERBIT BUKU -->
					<h6 class="mt-4">Penerbit Buku :</h6>
					<select required class="form-control" name="buku_penerbit">
						<option value="">Pilih Penerbit</option>
						<option>Pastel Books (Mizan)</option>
						<option>Gramedia</option>
						<option>Erlangga</option>
						<option>Elex Media Komputindo</option>
					</select>

					<!-- STOK BUKU -->
					<h6 class="mt-4">Stok Buku :</h6>
					<input required type="number" class="form-control" name="buku_stok">

				</div>

				<div class="col-sm-4 pl-5">

					<!-- JENIS BUKU -->
					<h6 class="mt-4">Jenis Buku :</h6>
					<input type="radio" class="form-check-input" name="buku_jenis" value="Religi">Religi
					<br><input type="radio" class="form-check-input" name="buku_jenis" value="Pendidikan">Pendidikan
					<br><input type="radio" class="form-check-input" name="buku_jenis" value="Novel">Novel
					<br><input type="radio" class="form-check-input" name="buku_jenis" value="Komik">Komik
					<br><input type="radio" class="form-check-input" name="buku_jenis" value="Cerpen">Cerpen

					<!-- GENRE BUKU -->
					<h6 class="mt-4">Genre Buku :</h6>
					<input type="checkbox" class="form-check-input" name="buku_genre[]" value="Ilmu Pengetahuan">Ilmu
					Pengetahuan
					<br><input type="checkbox" class="form-check-input" name="buku_genre[]" value="Romantis">Romantis
					<br><input type="checkbox" class="form-check-input" name="buku_genre[]" value="Komedi">Komedi
					<br><input type="checkbox" class="form-check-input" name="buku_genre[]" value="Horor">Horor
					<br><input type="checkbox" class="form-check-input" name="buku_genre[]" value="Action">Action
				</div>

				<div class="col-sm-4">

					<!-- GAMBAR BUKU -->
					<h6 class="mt-4">Gambar Buku :</h6>
					<input type="file" name="buku_gambar">

					<!-- SINOPSIS BUKU -->
					<h6 class="mt-4">Sinopsis Buku :</h6>
					<textarea class="form-control" name="buku_sinopsis"></textarea>

				</div>

				<!-- SUBMIT -->
				<button type="submit" class="btn btn-primary mt-4" name="simpan">Tambah Baru</button>

			</div>
		</form>
	</div>

</body>

</html>