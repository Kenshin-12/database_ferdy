<?php
    //koneksi ke database
	require_once('../config/config.php');
    // ambil data buku
    $result = mysqli_query($connect, "SELECT * FROM t_buku");
    // ambil data dari object result
	// Mengecek apakah ada parameter 'id' yang dikirimkan
	// if (isset($_GET['buku_kode'])) {
	// 	// Mengambil nilai parameter 'id'
	// 	$id = $_GET['buku_kode'];
	
		// Menghapus data dari basis data berdasarkan id
		// $query = "DELETE FROM t_buku buku_kode='$_GET[buku_kode]" . $id;
		// mysqli_query($koneksi, $query);
	
		// Mengarahkan kembali ke halaman utama setelah menghapus data
		// header("Location: index.php");
		// exit();

	//FUNCTION SEARCH 
	// Mendefinisikan variabel pencarian
	$search = "";

	// Mengecek apakah ada parameter 'search' yang dikirimkan
	if (isset($_GET['search'])) {
	// Mengambil nilai parameter 'search'
	$search = $_GET['search'];

	// Mendapatkan data dari basis data berdasarkan pencarian
	$query = "SELECT * FROM t_buku WHERE buku_judul LIKE '%" . $search . "%'";
	$result = mysqli_query($connect, $query);
}
	
?>

<!DOCTYPE html>
<html>
<head>
	<title>Perpustakaan</title>
	<link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.css">
</head>
<body>
<!-- BANNER -->
<div class="jumbotron"  style="margin-bottom:0">
	<h1>SELAMAT DATANG</h1>
	<H6>DI PERPUSTAKAAN XI RPL B SMK NEGERI 1 KOTA BEKASI</H6>
</div>
<!-- END BANNER; -->

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

	<h3>LIST Data Buku</h3>

	<div class="row">
		<!-- untuk input mencai -->
		<div class="col-sm-10">
			<form  method="GET" action="<?php echo $_SERVER['PHP_SELF']; ?>" class="form-inline" style="margin-bottom:10px;">
				<input type="text" name="search" class="form-control" value="<?php echo $search; ?>">
				<button type="submit" class="btn btn-primary" style="margin-left:10px;">Submit</button>
			</form>
		</div>
		
		<div class="col-sm-2">
			<a href="halaman_form.php" class="btn btn-success float-right">tambah</a>
		</div>

	</div>

	<div class="row">
		<div class="col-sm-12">
			<table class="table table-striped table-bordered">
				<tr class="thead-light">
					<th>No</th>
					<th>Judul Buku</th>
					<th>Kategori</th>
					<th>Penerbit</th>
					<th>Gambar</th>
					<th>Aksi</th>
				</tr>
				
				<!-- function untuk menampilkan data setelah dicari -->
                <?php 
					//menampilkan data
                    $angka=1; 
                    while($array = mysqli_fetch_array($result)): 
						//menampilkan data yg dicari
						if (isset($_GET['search'])) {
							if (mysqli_num_rows($result) > 0) {
							//    echo "<ul>";
							   while ($row = mysqli_fetch_assoc($result)) {
								//   echo "<li>" . $row['nama'] . "</li>";
							   }
							//    echo "</ul>";
							} 
						 }     
                ?>
				<tr>
					<td><?=$angka++;?></td>
					<td><?=$array["buku_judul"]?></td>
					<td><?=$array["buku_jenis"]?></td>
					<td><?=$array["buku_penerbit"]?></td>
					<td>
                    <?php if($array["buku_gambar"] == ""){?>
                    <img src="../assets/upload/default.jpg" class="rounded" style="width:100px;">
                    <?php }else{ ?>
                    <img src="../assets/upload/<?= $array["buku_gambar"]?>" class="rounded" style="width:100px;">
                    <?php } ?>
					</td>
					<td>
						<a href="halaman_detail.php?buku_kode=<?= $array['buku_kode'] ?>" class="btn btn-primary">Detail</a>
						<a href="halaman_edit.php?buku_kode=<?= $array['buku_kode'] ?>" class="btn btn-warning">Edit</a>
						<a href="halaman_hapus.php?buku_kode=<?= $array['buku_kode'] ?>" class="btn btn-danger">Hapus</a>
					</td>
				</tr>
				<?php endwhile ?>

            </table>

			<ul class="pagination justify-content-center">
			  <li class="page-item"><a class="page-link" href="#">Previous</a></li>
			  <li class="page-item"><a class="page-link" href="#">1</a></li>
			  <li class="page-item"><a class="page-link" href="#">2</a></li>
			  <li class="page-item"><a class="page-link" href="#">3</a></li>
			  <li class="page-item"><a class="page-link" href="#">Next</a></li>
			</ul>

		</div>
	</div>
</div>
</body>
</html>