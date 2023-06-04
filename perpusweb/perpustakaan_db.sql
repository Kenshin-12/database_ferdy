-- MySQL dump 10.16  Distrib 10.1.35-MariaDB, for Win32 (AMD64)
--
-- Host: localhost    Database: perpusweb_xirpla_rizkyferdiansyah
-- ------------------------------------------------------
-- Server version	10.1.35-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Current Database: `perpusweb_xirpla_rizkyferdiansyah`
--

CREATE DATABASE /*!32312 IF NOT EXISTS*/ `perpusweb_xirpla_rizkyferdiansyah` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `perpusweb_xirpla_rizkyferdiansyah`;

--
-- Table structure for table `t_buku`
--

DROP TABLE IF EXISTS `t_buku`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `t_buku` (
  `buku_kode` char(5) NOT NULL,
  `buku_judul` varchar(50) NOT NULL,
  `buku_penerbit` varchar(50) NOT NULL,
  `buku_jenis` enum('Religi','Pendidikan','Novel','Komik','Cerpen') NOT NULL,
  `buku_genre` varchar(255) NOT NULL,
  `buku_stok` int(11) NOT NULL,
  `buku_gambar` varchar(255) NOT NULL,
  `buku_sinopsis` text NOT NULL,
  PRIMARY KEY (`buku_kode`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `t_buku`
--

LOCK TABLES `t_buku` WRITE;
/*!40000 ALTER TABLE `t_buku` DISABLE KEYS */;
INSERT INTO `t_buku` VALUES ('BK001','Dilan: Dia adalah Dilanku Tahun 1991','Pastel Books (Mizan)','Novel',',Romantis,,,Action',40,'buku1.jpg','ika aku berkata bahwa aku mencintainya, maka itu adalah sebuah pernyataan yang sudah cukup lengkap.\"\"\r\n-Milea\r\n\"\"Senakal-nakalnya anak geng motor, Lia, mereka shalat pada waktu ujian praktek Agama.\"\"\r\n-Dilan\r\n\r\n@Viny_JKT48 \"\"Aku suka Dilan-nya Kak Pidi Baiq. Baru beli, tapi sudah aku baca dua kali lho~ Buku yang menyenangkan, jadi ingin kenal Dilan XD.\"\"\r\n@renindydevris \"\"Kukira cinta hanya sebatas kenal, bilang, dan jadi. Tetapi ternyata cinta itu bisa dibuat jadi seni yang amat menarik.\"\"\r\n@yusuf_imam29 \"\"Terima kasih, Dilan. Dirimu telah mengajarkanku tentang banyak hal. Terutama tentang mengistimewakan wanita.\"\"\r\n@IanisJanuar \"\"Selama hampir 27 tahun hidup, baru pertama kali baca novel sampe tamat. Thank You, Dilan.\"\"\r\n@rudijatjahja \"\"Hatur nuhun Surayah Pidi Baiq, sudah merawat selera tawa yang dibalut kisah bahagia dua sejoli Dilan dan Milea.\"\"\r\n@alirohman21 \"\"Bukan hanya novel tentang cinta remaja biasa, tapi juga cara mengungkapkan rasa sayang di luar kebiasaan.\"\"\r\n@saljuapi \"\"The greatest love story the world has ever known.\"\"\r\n@Tedy_Pensil \"\"Jika buku ini kumpulan rumus Fisika yang akan diujikan maka banyak pelajar yang membakarnya dan mengonsumsi abunya.'),('BK002','Angka, Huruf & Benda Sekitar: Kartu Cerdas Anak He','Erlangga','Pendidikan','Ilmu Pengetahuan,,,,',3,'buku2.jpg','Angka, Huruf & Benda Sekitar: Kartu Cerdas Anak Hebat'),('BK003','Aplikasi Pemrograman WEB Dinamis dengan PHP dan My','Gramedia','Pendidikan','Ilmu Pengetahuan,,,,',35,'buku3.jpg','Dengan menggunakan sistem pendekatan “ Learning by doing/Belajar sambil Mencoba “, maka buku ini akan memandu untuk mengantarkan Anda menjadi seorang Programmer Web yang handal. Dengan adanya tujuan tersebut, maka Penulis mencoba memandu Anda untuk mempelajari Pemrograman Web dari Pemrograman HTML dasar-lanjut, Pengelolaan database MySQL, Pemrograman PHP dasar, sampai dengan penerapannya dalam berbagai aplikasi web dinamis.\r\n\r\nSebagai bahan latihan, maka pada pembahasan akhir dari buku ini Anda akan belajar bagaimana membuat sebuah program aplikasi yang berkaitan dengan perpustakaan. Masalah yang diambil adalah “ Sistem Informasi Pengelolaan Data Buku ”, hal tersebut dapat Anda terapkan pada instansi atau kampus Anda sebagai media penerapan dari buku ini.\r\n\r\nTidak hanya pada lingkungan Windows, akan tetapi buku ini juga dapat diterapkan pada lingkungan Linux. Sehingga, siapapun Anda sangat cocok menggunakan buku ini.'),('BK004','Dragon Ball Super Vol.1','Elex Media Komputindo','Komik',',,Komedi,,Action',10,'buku4.jpg','Sejak bertarung sengit dengan Manusia Iblis Buu, Goku telah melewati hari-harinya tanpa terasa... Namun tiba-tiba muncul kembali seorang musuh tangguh yang ingin menghancurkan kedamaian di planet bumi. Musuh kali ini akan datang dari universe ke 6! Kisah yang diciptakan oleh Akira Toriyama ini akan dikembangkan dalam kisah yang seru hingga akhir. Ini dia \"Dragon Ball super“!!');
/*!40000 ALTER TABLE `t_buku` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2019-10-23 22:57:51
