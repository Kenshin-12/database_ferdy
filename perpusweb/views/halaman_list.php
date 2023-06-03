<?php
    //koneksi ke database
    $connect = mysqli_connect("localhost", "root", "", "perpusweb_xirpla_rizkyferdiansyah");
    // ambil data mahasiswa
    $result = mysqli_query($connect, "SELECT * FROM t_buku");
    // ambil data dari object result
    $array = mysqli_fetch_array($result);
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
		<div class="col-sm-10">
			<form class="form-inline" style="margin-bottom:10px;">
				<input type="text" name="" class="form-control">
				<button type="submit" class="btn btn-primary" style="margin-left:10px;">Submit</button>
			</form>
		</div>
		
		<div class="col-sm-2">
			<a href="halaman_form.html" class="btn btn-success float-right">tambah</a>
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
                <?php 
                    $angka=1; 
                    while($array = mysqli_fetch_array($result)):               
                ?>
				<tr>
					<td><?=$angka++;?></td>
					<td><?=$array["buku_judul"]?></td>
					<td><?=$array["buku_jenis"]?></td>
					<td><?=$array["buku_penerbit"]?></td>
					<td>
                    <?php if($array["buku_gambar"] == ""){?>
                    <img src="../assets/upload/default.jpg" class="rounded" style="width:100px;">;
                    <?php }else{ ?>
                    <img src="../assets/upload/<?= $array["buku_gambar"]?>" class="rounded" style="width:100px;">;
                    <?php } ?>
					</td>
					<td>
						<a href="" class="btn btn-primary">Detail</a>
						<a href="" class="btn btn-warning">Edit</a>
						<a href="" class="btn btn-danger">Hapus</a>
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