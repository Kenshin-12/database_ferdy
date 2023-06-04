<?php 
require_once('../config/config.php');

if (isset($_GET['buku_kode'])) {
	$get_query = "SELECT * FROM t_buku WHERE buku_kode='$_GET[buku_kode]';";
	$buku = mysqli_query($connect, $get_query)->fetch_assoc();
    $query = "DELETE FROM t_buku WHERE buku_kode='$_GET[buku_kode]'";
}

$result = mysqli_query($connect, $query);
if ($result) {
    echo "<script type='text/javascript'>";
    echo "alert('Berhasil hapus buku');";
    echo "window.location.href='halaman_list.php'";
    echo "</script>";
}
?>