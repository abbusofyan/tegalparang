-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 13, 2018 at 07:46 AM
-- Server version: 10.1.32-MariaDB
-- PHP Version: 5.6.36

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tegalparang`
--

-- --------------------------------------------------------

--
-- Table structure for table `kontrakan`
--

CREATE TABLE `kontrakan` (
  `no` int(10) NOT NULL,
  `u_id` varchar(20) NOT NULL,
  `pemilik` varchar(255) NOT NULL,
  `nik` varchar(16) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `rt` varchar(255) NOT NULL,
  `rw` varchar(255) NOT NULL,
  `no_telp` varchar(255) NOT NULL,
  `status_tanah` varchar(255) NOT NULL,
  `no_imb` varchar(255) NOT NULL,
  `no_izin_kontrakan` varchar(255) NOT NULL,
  `sistem_sewa` varchar(255) NOT NULL,
  `jml_kamar` varchar(11) NOT NULL,
  `jml_lantai` varchar(11) NOT NULL,
  `harga_sewa` varchar(255) NOT NULL,
  `fasilitas` varchar(255) NOT NULL,
  `sisa_kamar` varchar(255) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `ket` varchar(255) NOT NULL,
  `tanggal` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kontrakan`
--

INSERT INTO `kontrakan` (`no`, `u_id`, `pemilik`, `nik`, `alamat`, `rt`, `rw`, `no_telp`, `status_tanah`, `no_imb`, `no_izin_kontrakan`, `sistem_sewa`, `jml_kamar`, `jml_lantai`, `harga_sewa`, `fasilitas`, `sisa_kamar`, `foto`, `ket`, `tanggal`) VALUES
(14, '86llkj', 'Abu Sofyan', '000113', 'Jl. H sulaiman, Gg dukuh atas, ', '001', '01', '089601361752', 'garapan negara', '', '', 'harian', '1-5', '1', '', '', '', 'kontrakan Abu Sofyan_0.', '', '2018-10-13');

-- --------------------------------------------------------

--
-- Table structure for table `kost`
--

CREATE TABLE `kost` (
  `no` int(10) NOT NULL,
  `u_id` varchar(255) NOT NULL,
  `nama_kost` varchar(255) NOT NULL,
  `alamat` varchar(255) DEFAULT NULL,
  `rt` varchar(9) NOT NULL,
  `rw` varchar(9) NOT NULL,
  `pemilik` varchar(255) NOT NULL,
  `nik` varchar(16) NOT NULL,
  `no_telp` varchar(255) NOT NULL,
  `status_tanah` varchar(255) NOT NULL,
  `no_imb` varchar(255) DEFAULT NULL,
  `no_izin_kost` varchar(255) NOT NULL,
  `sistem_sewa` varchar(255) DEFAULT NULL,
  `jml_kamar` varchar(255) NOT NULL,
  `jml_lantai` varchar(255) NOT NULL,
  `harga_sewa` varchar(255) NOT NULL,
  `fasilitas` varchar(255) NOT NULL,
  `sisa_kamar` varchar(255) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `ket` text NOT NULL,
  `tanggal` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kost`
--

INSERT INTO `kost` (`no`, `u_id`, `nama_kost`, `alamat`, `rt`, `rw`, `pemilik`, `nik`, `no_telp`, `status_tanah`, `no_imb`, `no_izin_kost`, `sistem_sewa`, `jml_kamar`, `jml_lantai`, `harga_sewa`, `fasilitas`, `sisa_kamar`, `foto`, `ket`, `tanggal`) VALUES
(6, 'j8psh2', 'Kost H. Muzahar Gani', 'Jalan Mampang Prapatan X No. 18A ', '001', '01', 'H. Muzahar Gani', '', '', 'garapan negara', '000001982987123', '288828712938791', 'bulanan', '1-5', '1', '', '', '', 'Kost Jalan Mampang Prapatan X No. 18A _0.', '', '2018-10-11'),
(7, 'kq8xm9', 'Kost Saidah A. Alwi', 'Jalan Mampang Prapatan X No. 18B ', '001', '01', 'Saidah A. Alwi', '', '', 'garapan negara', 'IMB', '', 'bulanan', '5-10', '1', '', '', '', 'Kost Saidah A. Alwi_0.', '', '2018-10-11'),
(8, 'wdw2oa', 'Kost Irdham', 'Jalan Mampang Prapatan X No. 35 ', '001', '01', 'Irdham', '', '', 'garapan negara', 'tidak ada', '', 'bulanan', '1-5', '1', '', '', '', 'Kost Irdham_0.', '', '2018-10-11'),
(9, '4a9n45', 'Kost Henni', 'Jalan Mampang Prapatan X No. 36 ', '001', '01', 'Henni', '', '', 'garapan negara', 'tidak ada', '', 'bulanan', '1-5', '1', '', '', '', 'Kost Henni_0.', '', '2018-10-11'),
(10, 'wdn0ra', 'Kost Sahwana, SE', 'Jalan Mampang Prapatan X No. 37E ', '001', '01', 'Sahwana, SE', '', '', 'garapan negara', 'tidak ada', '', 'bulanan', '5-10', '1', '', '', '', 'Kost Sahwana, SE_0.', '', '2018-10-11'),
(11, 'ed0t31', 'Kost Amrulloh', 'Jalan Mampang Prapatan X No. 37F ', '001', '01', 'Amrulloh', '', '', 'garapan negara', 'tidak ada', '', 'bulanan', '1-5', '1', '', '', '', 'Kost Amrulloh_0.', '', '2018-10-11'),
(12, 'gf6ifs', 'Kost Moh. Safaat', 'Jalan Mampang Prapatan X No. 100 ', '001', '01', 'Moh. Safaat', '', '', 'garapan negara', 'tidak ada', '', 'bulanan', '5-10', '1', '', '', '', 'Kost Moh. Safaat_0.', '', '2018-10-11'),
(13, '6fcui3', 'Kost Bambang Samuel', 'Jalan Mampang Prapatan VIII No. 16 ', '001', '01', 'Bambang Samuel', '', '', 'garapan negara', 'tidak ada', '', 'bulanan', '1-5', '1', '', '', '', 'Kost Bambang Samuel_0.', '', '2018-10-11'),
(14, 'j8mxbb', 'Kost Rustantini E', 'Jalan Mampang Prapatan VIII No. 14 ', '001', '01', 'Rustantini E', '', '', 'garapan negara', 'tidak ada', '', 'bulanan', '5-10', '2', '', '', '', 'Kost Rustantini E_0.', '', '2018-10-11'),
(15, 'tnvp59', 'Kost Hari', 'Jalan Mampang Prapatan X No. 36 ', '001', '01', 'Hari', '1111111111111111', '', 'garapan negara', 'IMB', '', 'bulanan', '1-5', '1', '', '', '', 'Kost Hari_0.', '', '2018-10-11'),
(17, 'ho02ta', 'Kost Supriyatin', 'Jalan Mampang Prapatan X No. 23 ', '001', '01', 'Supriyatin', '3174034706640004', '', 'garapan negara', 'tidak ada', '', 'bulanan', '1-5', '1', '', '', '', 'Kost Supriyatin_0.', '', '2018-10-11'),
(20, '6tvqle', 'Kost San san', 'Jalan Mampang Prapatan VIII No. 7', '001', '02', 'San san', '3174034111780002', '', 'SHGB', '', '', 'bulanan', '11-20', '2', '', '', '', 'Kost San san_0.', '', '2018-10-11'),
(28, 'e56oid', 'kost abu', 'Jl. H sulaiman, Gg dukuh atas, ', '001', '01', 'Abu Sofyan', '1111111111', '089601361752', 'garapan negara', '12313', '1212323', 'harian', '1-5', '1', '', '', '', 'kost abu_0.', '', '2018-10-13');

-- --------------------------------------------------------

--
-- Table structure for table `penghuni_kontrakan`
--

CREATE TABLE `penghuni_kontrakan` (
  `no` int(10) NOT NULL,
  `u_id` varchar(20) NOT NULL,
  `nama_pemilik` text NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `nik_penghuni` varchar(255) NOT NULL,
  `nama_penghuni` varchar(255) NOT NULL,
  `ttl` varchar(255) NOT NULL,
  `agama` varchar(255) NOT NULL,
  `j_kel` varchar(255) NOT NULL,
  `pekerjaan` varchar(255) NOT NULL,
  `alamat_ktp` text NOT NULL,
  `wna` varchar(255) NOT NULL,
  `no_pasport` varchar(255) NOT NULL,
  `no_itas` varchar(255) NOT NULL,
  `ket` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `penghuni_kontrakan`
--

INSERT INTO `penghuni_kontrakan` (`no`, `u_id`, `nama_pemilik`, `alamat`, `nik_penghuni`, `nama_penghuni`, `ttl`, `agama`, `j_kel`, `pekerjaan`, `alamat_ktp`, `wna`, `no_pasport`, `no_itas`, `ket`) VALUES
(1, 'e1b5cy', 'asep kurniawan', '4506 Woodside Circle, RT001/RW01', '222111', 'abdul jabar', 'jakarta, 22 september 1997', 'islam', 'L', 'karyawan', '4968 Snyder Avenue', 'tidak', '', '', ''),
(5, 'ze4n5s', 'supriyadi', '3178 Don Jackson Lane, RT001/RW01', '222115', 'zulham', 'bogor, 22,09,1998', 'islam', 'L', 'lain-lain', '616 Cantebury Drive', 'tidak', '', '', ''),
(8, 't09bhw', 'maryadi', '242 Oxford Court, RT001/RW02', '222118', 'sodikin', 'jakarta, 22 september 1997', 'hindu', 'L', 'wiraswasta', '4968 Snyder Avenue', 'tidak', '', '', ''),
(11, 'w6mavt', 'Abu Sofyan', 'Jl. H sulaiman, Gg dukuh atas, , RT001/RW01', '317403150700006', 'Christian Dinata Affandi', 'Depok / 1996-02-13', 'islam', 'P', 'wiraswasta', 'Jl. Siabdor No. 5-9, Pematang Siantar', 'tidak', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `penghuni_kost`
--

CREATE TABLE `penghuni_kost` (
  `no` int(10) NOT NULL,
  `u_id` varchar(20) NOT NULL,
  `nama_kost` varchar(255) NOT NULL,
  `nama_pemilik` varchar(255) NOT NULL,
  `alamat` text NOT NULL,
  `nik_penghuni` varchar(255) NOT NULL,
  `nama_penghuni` varchar(255) NOT NULL,
  `ttl` varchar(255) NOT NULL,
  `agama` varchar(255) NOT NULL,
  `j_kel` varchar(255) NOT NULL,
  `pekerjaan` varchar(255) NOT NULL,
  `alamat_ktp` text NOT NULL,
  `wna` varchar(255) NOT NULL,
  `no_pasport` varchar(255) NOT NULL,
  `no_itas` varchar(255) NOT NULL,
  `ket` text NOT NULL,
  `tanggal` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `penghuni_kost`
--

INSERT INTO `penghuni_kost` (`no`, `u_id`, `nama_kost`, `nama_pemilik`, `alamat`, `nik_penghuni`, `nama_penghuni`, `ttl`, `agama`, `j_kel`, `pekerjaan`, `alamat_ktp`, `wna`, `no_pasport`, `no_itas`, `ket`, `tanggal`) VALUES
(1, 'dmjgu0', 'Kost Hari', 'Hari', 'Jalan Mampang Prapatan X No. 36 , RT001/RW01', '1371111109870005', 'DWI ALDO SEPPUTRA', 'Padang  / 1987-09-09', 'islam', 'L', 'pelajar', 'Komp. Undul 4 Blok JJ No.12 RT.004/012, Kel. Parupuk, Tabing Kec. Koto Tengah', 'ya', '', '', '', ''),
(3, '55ut3y', 'Kost Hari', 'Hari', 'Jalan Mampang Prapatan X No. 36 , RT001/RW01', '3374075006890001', 'GISHA NAVITASARI', 'Surakarta / 1989-06-10', 'islam', 'P', 'pelajar', 'Jl. Radio II RT.004/07, Kel. MangunHarjo, Kec. Tembalang ', 'ya', '', '', '', ''),
(4, 'yr5bo8', 'Kost Hari', 'Hari', 'Jalan Mampang Prapatan X No. 36 , RT001/RW01', '3671111708430007', 'HAIDAR IRFAN MUHAMMAD', 'Jakarta / 17-08-1993', 'islam', 'L', 'pelajar', 'Jl. Menur I/39 Kav C.1182 RT.009/06, Kel. Pinang, Kec. Pinang', 'ya', '', '', '', ''),
(5, 'r8ecjv', 'Kost Hari', 'Hari', 'Jalan Mampang Prapatan X No. 36 , RT001/RW01', '3210164504940041', 'HJ. INDAH APRILIANA', 'Majalengka / 05-04-1994', 'islam', 'P', 'pelajar', 'Blok Selasa RT.010/02, Kel. Leuweung Hapit, Kec. Ligung', 'ya', '', '', '', ''),
(6, '8bf90f', 'Kost Hari', 'Hari', 'Jalan Mampang Prapatan X No. 36 , RT001/RW01', '3604052712890000', 'MUHAMMAD ARDIANSYAH', 'Serang / 27-12-1989', 'islam', 'L', 'pelajar', 'BKP Blok VI 8 No.01 RT.002/01, kel. Margatani, Kec. Kramatwatu', 'ya', '', '', '', ''),
(7, 'a7757d', 'Kost Supriyatin', 'Supriyatin', 'Jalan Mampang Prapatan X No. 23 , RT001/RW01', '3404071101890001', 'ANTONIUS SENO HARI PRASETYO', 'Sleman / 11-01-1989', 'katolik', 'L', 'pelajar', 'Nologaten C1 17/211 RT.006/02, Kel. Catur Tunggai, Kec. Depok', 'tidak', '', '', '', ''),
(8, 'a8snvj', 'Kost Supriyatin', 'Supriyatin', 'Jalan Mampang Prapatan X No. 23 , RT001/RW01', '1306090604890003', 'WAHYU FIRDAUS', 'Simpang IV / 06-04-1989', 'islam', 'L', 'pelajar', 'Jobong Joto Laweh, Kel. Koto Tangah, Kec. Tilatang kamang', 'tidak', '', '', '', ''),
(9, 'vj3dip', 'Kost Supriyatin', 'Supriyatin', 'Jalan Mampang Prapatan X No. 23 , RT001/RW01', '3404122210880005', 'DENNY ABDI TAMA PUTRA', 'Jakarta / 22-10-1988', 'kristen', 'L', 'pelajar', 'Griya Taman Asri Blok G 318 RT.001/035, Kel. Donoharjo, Kec. ngaglik', 'tidak', '', '', '', ''),
(10, '707cwb', 'Kost Supriyatin', 'Supriyatin', 'Jalan Mampang Prapatan X No. 23 , RT001/RW01', '3273020106870004', 'MAROJAHAN FERDINAN T', 'Sei Baruhur / 01-06-1987', 'kristen', 'L', 'karyawan', 'Sukasri II No.3 RT.001/02, Kel. Sekeloa, Kec. Coblong', 'tidak', '', '', '', ''),
(12, 'cmigo9', 'Kost San san', 'San san', 'Jalan Mampang Prapatan VIII No. 7, RT001/RW02', '3277014301920018', 'Tiara Birahmatika', 'Las Cruse / 1993-03-01', 'islam', 'P', 'pelajar', 'Jl. Tirta Indah 16 RT. 01/09, Cibeurem, Cimahi', 'tidak', '', '', '', ''),
(13, 'fxxwtk', 'Kost San san', 'San san', 'Jalan Mampang Prapatan VIII No. 7, RT001/RW02', '3311106302930007', 'Chinta Febrianti Soepardi', 'Ambon / 1993-02-23', 'islam', 'P', 'karyawan', 'Jesis Permai RT. 06/10, Gentam, Sukoharjo', 'tidak', '', '', '', ''),
(14, '1akjk4', 'Kost San san', 'San san', 'Jalan Mampang Prapatan VIII No. 7, RT001/RW02', '3603122808890001', 'Yulia Rahmaniah', 'Jakarta / 1989-08-18', 'islam', 'L', 'karyawan', 'Vila Tangerang RT. 02/05, Tangerang', 'tidak', '', '', '', ''),
(15, 'jq97lh', 'Kost San san', 'San san', 'Jalan Mampang Prapatan VIII No. 7, RT001/RW02', '3327201004920010', 'R. Trihadi Laksono', 'Pemalang / 1992-01-04', 'islam', 'L', 'pelajar', 'Ds. Tumbal RT. 03/03, Pemalang', 'tidak', '', '', '', ''),
(16, 'g9puy3', 'Kost San san', 'San san', 'Jalan Mampang Prapatan VIII No. 7, RT001/RW02', '1304082608910001', 'M. Ridho Syaputra', 'Batu Sangkar / 1991-08-26', 'islam', 'L', 'pelajar', 'Jorong Kt. Panjang, Tn. Datar', 'tidak', '', '', '', ''),
(17, 'd0ykon', 'Kost San san', 'San san', 'Jalan Mampang Prapatan VIII No. 7, RT001/RW02', '3174066611940001', 'Anggita Yolanda', 'Jakarta / 1994-11-26', 'islam', 'P', 'karyawan', 'Jl. Melur RT. 05/06, Pd. Labu, Jaksel', 'tidak', '', '', '', ''),
(18, 'o6gtmk', 'Kost San san', 'San san', 'Jalan Mampang Prapatan VIII No. 7, RT001/RW02', '3319020905910002', 'Fariz Dwi Pratama', 'Kudus / 1991-09-05', 'islam', 'L', 'karyawan', 'Melati Kidul RT. 01/02, Kudus', 'tidak', '', '', '', ''),
(19, 'a7sh2l', 'Kost San san', 'San san', 'Jalan Mampang Prapatan VIII No. 7, RT001/RW02', '3302052609910002', 'Syarif Hidayat', 'Banyumas / 1991-09-26', 'islam', 'L', 'karyawan', 'Grumbul Resabaya RT. 01/04, Banyumas', 'tidak', '', '', '', ''),
(20, 'gwi5mu', 'Kost San san', 'San san', 'Jalan Mampang Prapatan VIII No. 7, RT001/RW02', '3502101602720002', 'Ir. Erwin Tabrani', 'Malang / 1972-02-16', 'islam', 'L', 'wiraswasta', 'Jl. R. Bei RT. 01/01, Siman, Ponorogo', 'tidak', '', '', '', ''),
(21, 't1a7ax', 'Kost San san', 'San san', 'Jalan Mampang Prapatan VIII No. 7, RT001/RW02', '3674044707890008', 'Kriswardani Saptaningtias', '3674044707890008 / 1989-07-07', 'islam', 'P', 'karyawan', 'Grand Serpong LT. 02/03, Ciputat, Tangerang', 'ya', '', '', '', ''),
(22, 'nuh3it', 'Kost San san', 'San san', 'Jalan Mampang Prapatan VIII No. 7, RT001/RW02', '3201135307840001', 'Ranti Sukmawati', 'Depok / 1984-07-13', 'islam', 'P', 'karyawan', 'Jl. Tegal Mulya 4 RT. 04/05, Banyumas', 'tidak', '', '', '', ''),
(23, 'sk8dfa', 'Kost San san', 'San san', 'Jalan Mampang Prapatan VIII No. 7, RT001/RW02', '3302204211890001', 'Tri Rahayu Renggani Asri', 'Banyumas / 1989-02-11', 'islam', 'P', 'karyawan', 'Jl. Tegal Mulya 4 RT. 04/05, Banyumas', 'tidak', '', '', '', ''),
(24, 't7ln83', 'Kost San san', 'San san', 'Jalan Mampang Prapatan VIII No. 7, RT001/RW02', '3229030808910018', 'Bagus Hidayat', 'Brebes / 1991-08-08', 'islam', 'L', 'karyawan', 'Laren RT. 01/05, Laren, Brebes', 'tidak', '', '', '', ''),
(25, 'ncyn1n', 'Kost San san', 'San san', 'Jalan Mampang Prapatan VIII No. 7, RT001/RW02', '3175011110790006', 'Wawan Imam Setiadi', 'Kudus / 1979-11-10', 'islam', 'L', 'karyawan', 'Jl. Kesatrian RT.27/03, Kebon Manggis, Jakarta', 'tidak', '', '', '', ''),
(26, 'ut2wiw', 'Kost San san', 'San san', 'Jalan Mampang Prapatan VIII No. 7, RT001/RW02', '3175022807760007', 'Ujang Sulaeman', 'Jakarta / 1976-07-28', 'islam', 'L', 'karyawan', 'Rusun Pulo Gadung RT. 09/01, Pulo Gadung', 'tidak', '', '', '', ''),
(27, 'z27jww', 'Kost San san', 'San san', 'Jalan Mampang Prapatan VIII No. 7, RT001/RW02', '3275090612640005', 'Hikmat Budiman', 'Tasikmalaya / 1964-06-26', 'islam', 'L', 'karyawan', 'Perum Satwika RT. 04/09, Jatiluhur, Bekasi', 'tidak', '', '', '', ''),
(28, 'mhi4m2', 'Kost San san', 'San san', 'Jalan Mampang Prapatan VIII No. 7, RT001/RW02', '3403013006880004', 'M. Gasir Arafat', 'Gunung Kidul / 1988-06-30', 'islam', 'L', 'karyawan', 'Trimulyo RT. 01/01, Gunung Kidul', 'tidak', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `rt`
--

CREATE TABLE `rt` (
  `no` int(11) NOT NULL,
  `rw` varchar(5) NOT NULL,
  `rt` varchar(5) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `nik` varchar(16) NOT NULL,
  `jkel` varchar(255) NOT NULL,
  `ttl` varchar(255) NOT NULL,
  `pendidikan` varchar(255) NOT NULL,
  `alamat` text NOT NULL,
  `no_telp` varchar(255) NOT NULL,
  `pekerjaan` varchar(255) NOT NULL,
  `agama` varchar(255) NOT NULL,
  `masa_bakti` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rt`
--

INSERT INTO `rt` (`no`, `rw`, `rt`, `nama`, `nik`, `jkel`, `ttl`, `pendidikan`, `alamat`, `no_telp`, `pekerjaan`, `agama`, `masa_bakti`, `username`, `password`) VALUES
(1, '01', '0', 'Asmat Sugandi', '3174030402540001', 'Laki-laki', 'Jakarta', 'S.1', 'Jalan Mampang Prapatan XI RT. 006/01', '085710210111', 'Wiraswasta', 'Islam', '2017 - 2020', '', ''),
(2, '01', '001', 'Mansyur Yamin', '317403150700006', 'Laki-laki', 'Jakarta / 15 Oktober 1970', 'SLTA', 'Jalan Mampang Prapatan VIII No. 8A', '081315388862', 'Wiraswasta', 'Islam', '2017 - 2020', 'rt001rw01', 'adminrt'),
(3, '01', '002', 'Drs. WIDJOJO MM. MSC', '3174031811470001', 'Laki-laki', 'Klaten / 18-11-1947', '', 'Jalan Mampang Prapatan X ', '', '', 'Islam', '', 'rt002rw01', 'rt002rw01'),
(4, '01', '003', 'Mam\'nun', '3174036505650001', 'Perempuan', 'Jakarta /25 Mei 1965', 'S.1', 'Jalan Mampang Prapatan VIII', '08159213329', 'Guru', 'Islam', '2017 - 2020', 'rt003rw01', 'adminrt3'),
(5, '01', '004', 'Musiyem', '3174035310760008', 'Perempuan', 'Wonogiri / 13-10-1976', '', 'Jalan Mampang Prapatan VIII', '021-84024033', '', 'Islam', '2017 - 2020', 'rt004rw01', 'rt004rw01'),
(6, '01', '005', 'NUR SAMSIAH', '3174034203690002', 'Perempuan', 'Jakarta / 02-03-1969', '', 'Jalan Mampang Prapatan VIII', '', '', 'Islam', '2017 - 2020', 'rt005rw01', 'rt005rw01'),
(7, '01', '006', 'MAULANA SYARIFUDIN', '3174031906670001', 'Laki-laki', 'Jakarta / 19-06-1967', '', 'Jalan Mampang Prapatan XI/17A', '', '', 'Islam', '2017 - 2020', 'rt006rw01', 'rt006rw01'),
(8, '01', '007', 'Nursalam', '317403170159001', 'Laki-laki', 'Jakarta / 17-01-1959', '', 'Jalan Mampang Prapatan XI No. 3A', '085738588402', '', 'Islam', '2017 - 2020', 'rt007rw01', 'rt007rw01'),
(9, '01', '008', 'Zakwani Marzuki', '3174033103640001', 'Laki-laki', 'Jakarta / 31 Maret 1964', 'SLTA', 'Jalan Mampang Prapatan XI No. 51B', '0811987494', 'Wiraswasta', 'Islam', '2017 - 2020', 'rt008rw01', 'rt008rw01'),
(10, '01', '009', 'Ramdani HS.', '', 'Laki-laki', '', '', '', '', '', 'Islam', '2017 - 2020', 'rt009rw01', 'rt009rw01'),
(11, '01', '010', 'Firmansyah', '3174030607810003', 'Laki-laki', 'Jakarta / 6 Juli 1981', 'SLTA', 'Jalan Mampang Prapatan XI', '', 'Wiraswasta', 'Islam', '2017 - 2020', 'rt010rw01', 'rt010rw01'),
(12, '01', '011', 'H. Ahmad Murodi', '317403051249000', 'Laki-laki', 'Jakarta / 5 Desember 1949', 'SLTA', 'Jalan Mampang Prapatan XIV', '021-96974462', 'Wiraswasta', 'Islam', '2017 - 2020', 'rt011rw01', 'rt011rw01'),
(13, '01', '012', 'H. Taufik. SH', '3174030710700007', 'Laki-laki', 'Jakarta', 'S.1', 'Jalan Mampang Prapatan XIV', '08128679774', 'Wiraswasta', 'Islam', '2017 - 2020', 'rt012rw01', 'rt012rw01'),
(14, '01', '013', 'Salman Farisi', '3174032105600002', 'Laki-laki', 'Jakarta / 21 Mei 1960', 'S.1', 'Jalan Mampang Prapatan XV', '083898521832', 'Karyawan', 'Islam', '2017 - 2020', 'rt013rw01', 'rt013rw01'),
(15, '02', '0', 'Muhamad Sidi', '3174032311430002', 'Laki-laki', 'Maos / 23 November  1943', 'SLTA', 'Jalan Mampang Prapatan VI  RT.003/02', '217945105', 'Wiraswasta', 'Islam', '2017 - 2020', '', ''),
(16, '02', '001', 'Ahmad Sidik', '3174031112560002', 'Laki-laki', 'Jakarta / 11 Desember 1956', 'S.1', 'Jalan Mampang Prapatan VIII', '021-987331', 'Karyawan', 'Islam', '2017 - 2020', 'rt001rw02', 'rt001rw02'),
(17, '02', '002', 'H. Syarifudin. SPd', '3174031505680002', 'Laki-laki', 'Jakarta / 15 Mei 1968', 'S.1', 'Jalan Mampang Prapatan VI No. 2A', '021-91991609', 'Guru', 'Islam', '2017 - 2020', 'rt002rw02', 'rt002rw02'),
(18, '02', '003', 'ARBIYANTO. SE', '', 'Laki-laki', '', 'S.1', 'Jalan Mampang Prapatan VI  RT.003/02', '', '', 'Islam', '2017 - 2020', 'rt003rw02', 'rt003rw02'),
(19, '02', '004', 'Husaini A.S', '3174031604550002', 'Laki-laki', 'Jakarta / 16 April 1956', 'SLTA', 'Jalan Mampang Prapatan VI No. 62', '082112050559', 'Swasta', 'Islam', '2017 - 2020', 'rt004rw02', 'rt004rw02'),
(20, '02', '005', 'Muhlis', '3174030505800009', 'Laki-laki', 'Jakarta / 5 Mei 1980', 'SLTA', 'Jalan Mampang Prapatan VI No. 81', '087888599017', 'Karyawan', 'Islam', '2017 - 2020', 'rt005rw02', 'rt005rw02'),
(21, '02', '006', 'Rizah Hafiz', '3174033009700001', 'Laki-laki', 'Jakarta / 30 September 1970', 'SMP', 'Jalan Mampang Prapatan VI No. 30', '087888599017', 'Wiraswasta', 'Islam', '2017 - 2020', 'rt006rw02', 'rt006rw02'),
(22, '02', '007', 'Taufik Hidayat', '3174032612710010', 'Laki-laki', 'Jakarta / 26 Desember 1971', 'SLTA', 'Jalan Mampang Prapatan IV No. 7', '021-94114741', 'Wiraswasta', 'Islam', '2017 - 2020', 'rt007rw02', 'rt007rw02'),
(23, '02', '008', 'Achmad Syarif', '3174032404690003', 'Laki-laki', 'Jakarta / 24 April 1969', 'SLTA', 'Jalan Mampang Prapatan VI', '021-92333528', 'Karyawan', 'Islam', '2017 - 2020', 'rt008rw02', 'rt008rw02'),
(24, '02', '009', 'Kasiman', '3174032705620002', 'Laki-laki', 'Purwokerto / 27 Mei 1962', 'SLTA', 'Jalan Mampang Prapatan VI No. 57', '021-7940906', 'Swasta', 'Islam', '2017 - 2020', 'rt009rw02', 'rt009rw02'),
(25, '02', '010', 'Daniah', '', 'Perempuan', 'Jakarta / 12 Juni 1976', 'SLTA', 'Jalan Mampang Prapatan VI', '081513116575', '-', 'Islam', '2017 - 2020', 'rt010rw02', 'rt010rw02'),
(26, '03', '0', 'H. Ahmad Fahmi', '3174031208680006', 'Laki-laki', 'Jakarta / 12 Agustus 1968', 'S.1', 'Jl. Mampang Prapatan XIII / 7 RT. 001/03', '087884374999', 'PNS', 'Islam', '2017 - 2020', '', ''),
(27, '03', '001', 'Heruyanto', '', 'Laki-laki', '', '', '', '', '', 'Islam', '2017 - 2020', 'rt001rw03', 'rt001rw03'),
(28, '03', '002', 'Nahrowi', '3174030811660001', 'Laki-laki', 'Jakarta / 08 November 1966', '', 'Jalan Mampang Prapatan XVI', '', 'WIRASWASTA', 'Islam', '2017 - 2020', 'rt002rw03', 'rt002rw03'),
(29, '03', '003', 'Suhadi', '3174031610430001', 'Laki-laki', 'Solo / 16 Oktober 1943', 'SLTA', 'Jalan Mampang Prapatan XIII', '021-79884871 ', 'Wiraswasta', 'Islam', '2017 - 2020', 'rt003rw03', 'rt003rw03'),
(30, '03', '004', 'A. Hilwan Wahab', '3174031409640001', 'Laki-laki', 'Jakarta / 14 September 1964', 'S.1', 'Jalan Mampang Prapatan XIII', '081316216942', 'Swasta', 'Islam', '2017 - 2020', 'rt004rw03', 'rt004rw03'),
(31, '03', '005', 'Faruk Fathoni. M.Pd', '3174032612900004', 'Laki-laki', 'Jakarta  /26 Desember 1990', 'S.2', 'Jalan Mampang Prapatan XIII', '087782316006', 'Karyawan', 'Islam', '2017 - 2020', 'rt005rw03', 'rt005rw03'),
(32, '03', '006', 'Eko Suprapto', '', '', '', '', '', '', '', 'Islam', '2017 - 2020', 'rt006rw03', 'rt006rw03'),
(33, '03', '007', 'Hamdi', '', '', '', '', '', '', '', 'Islam', '2017 - 2020', 'rt007rw03', 'rt007rw03'),
(34, '03', '008', 'Rohmani', '3174031903560002', 'Laki-laki', 'Jakarta / 19 Maret 1958', 'SLTA', 'Jalan Mampang Prapatan IX', '081293115056', 'Wiraswasta', 'Islam', '2017 - 2020', 'rt008rw03', 'rt008rw03'),
(35, '03', '009', 'H. Murodi ', '3174030512490001', 'Laki-laki', 'Jakarta', 'SLTA', 'Jalan Mampang Prapatan XIII', '085719367374', 'Wiraswasta', 'Islam', '2017 - 2020', 'rt009rw03', 'rt009rw03'),
(36, '03', '010', 'Zulkifli', '3174032209640006', 'Laki-laki', 'Jakarta', 'SLTA', 'Gang H. Dahlan', '081310614110', 'Wiraswasta', 'Islam', '2017 - 2020', 'rt010rw03', 'rt010rw03'),
(37, '04', '0', 'H. Muhamim Salim', '3174030101540009', 'Laki-laki', '', 'SLTA', 'Jalan Tegal Parang Selatan V RT.007/04', '085714366643', 'Wiraswasta', 'Islam', '2017 - 2020', '', ''),
(38, '04', '001', 'Etty Lasmini', '3174034506590001', 'Perempuan', 'Tasikmalaya / 07-06-1959', 'SLTA', 'Jalan Mampang Prapatan XIV', '08569942851', 'Wiraswasta', 'Islam', '2017 - 2020', 'rt001rw04', 'rt001rw04'),
(39, '04', '002', 'Zulkarnain', '317401906700001', 'Laki-laki', 'Jakarta / 19-06-1970', 'SLTA', 'Jalan Mampang Prapatan XV No. 44', '08567205332', 'Wiraswasta', 'Islam', '2017 - 2020', 'rt002rw04', 'rt002rw04'),
(40, '04', '003', 'Rohmani', '3174031809580002', 'Laki-laki', 'Jakarta / 18-09-1958', 'SLTA', 'Jalan Mampang Prapatan XV', '021-79884871 ', 'Wiraswasta', 'Islam', '2017 - 2020', 'rt003rw04', 'rt003rw04'),
(41, '04', '004', 'Hardwarman', '3174031005700001', 'Laki-laki', 'Jakarta / 10 Mei 1970', '', 'Jalan Mampang Prapatan XIV / 24', '081314143956', 'Karyawan', 'Islam', '2017 - 2020', 'rt004rw04', 'rt004rw04'),
(42, '04', '005', 'Sa\'roni', '3174031001650005', 'Laki-laki', 'Jakarta / 10-01-1965', 'SLTA', 'Jalan Mampang Prapatan XI', '085693912220', 'Swasta', 'Islam', '2017 - 2020', 'rt005rw04', 'rt005rw04'),
(43, '04', '006', 'Kamaludin', '', '', '', '', '', '', '', 'Islam', '2018 - 2021', 'rt006rw04', 'rt006rw04'),
(44, '04', '007', 'Mursyidi', '3174031812660004', 'Laki-laki', 'Jakarta / 18 Desember 1965', 'SLTA', 'Jalan Mampang Prapatan XI', '', 'Karyawan', 'Islam', '2017 - 2020', 'rt007rw04', 'rt007rw04'),
(45, '04', '008', 'Alwi Jamalulail', '3174030912620004', 'Laki-laki', 'Jakarta / 09 Desember 1962', '', 'Jalan Mampang Prapatan XIV', '081388095870', 'Wiraswasta', 'Islam', '2018 - 2021', 'rt008rw04', 'rt008rw04'),
(46, '05', '0', 'H. Abd. Rahman Hakim', '3174033009560003', 'Laki-laki', 'Jakarta / 30-09-1956', 'SLTA', 'Jalan Tegal Parang Selatan RT.002/05', '081316681252', 'Guru', 'Islam', '2017 - 2020', '', ''),
(47, '05', '001', 'Subagio', '3174031911490002', 'Laki-laki', 'Bandung / 19-11-1949', 'SLTA', 'Jalan Tegal Parang Selatan I No. 58', '021-7947925', 'Wiraswasta', 'Islam', '2017 - 2020', 'rt001rw05', 'rt001rw05'),
(48, '05', '002', 'Abdul Kadir', '3174031009720001', 'Laki-laki', 'Jakarta / 10-09-1972', 'SLTA', 'Jalan Tegal Parang Selatan I No. 31', '021-97074699', 'Swasta', 'Islam', '2017 - 2020', 'rt002rw05', 'rt002rw05'),
(49, '05', '003', 'H. Hilmani', '3174030302670002', 'Laki-laki', 'Jakarta / 03-02-1967', 'SLTA', 'Jalan Masjid Al-Istiqomah No.67', '', 'Swasta', 'Islam', '2017 - 2020', 'rt003rw05', 'rt003rw05'),
(50, '05', '004', 'H. Sulaiman', '3174030505630007', 'Laki-laki', 'Jakarta / 05-05-1963', 'SLTA', 'Jalan Mampang Prapatan VI Gang BB', '08129973613', 'Wiraswasta', 'Islam', '2017 - 2020', 'rt004rw05', 'rt004rw05'),
(51, '05', '005', 'Sudirman', '3174030111269000', 'Laki-laki', 'Bima / 01-12-1969', 'SLTA', 'Jalan BB No. 18', '081381599980', 'Wiraswasta', 'Islam', '2017 - 2020', 'rt005rw05', 'rt005rw05'),
(52, '05', '006', 'Ahmad Puadi', '3174030804770007', 'Laki-laki', 'Jakarta / 08-04-1977', 'SLTA', 'Jalan Tegal Parang Utara I Gg. BB No. 23', '085210448437', 'Swasta', 'Islam', '2017 - 2020', 'rt006rw05', 'rt006rw05'),
(53, '05', '007', 'Abdul Rohim', '3174031408690004', 'Laki-laki', 'Bekasi / 14 Agustus 1969', 'SLTA', 'Jalan BB II No. 45', '081385606262', 'Wiraswasta', 'Islam', '2017 - 2020', 'rt007rw05', 'rt007rw05'),
(54, '05', '008', 'Sobari', '3174030708610006', 'Laki-laki', 'Jakarta', 'SLTA', 'Jalan Tegal Parang Utara I', '0217990570', 'Wiraswasta', 'Islam', '2017 - 2020', 'rt008rw05', 'rt008rw05'),
(55, '06', '0', 'M. Soedjarno', '3174030507520001', 'Laki-laki', 'Sragen / 05-07-1952', 'SLTA', 'Jalan Mampang Prapatan V RT. 005/06', '8129415607', 'Pensiunan', 'Islam', '2017 - 2020', '', ''),
(56, '06', '001', 'Abdullah', '3174030208440001', 'Laki-laki', 'Jakarta / 02-08-1944', 'SLTA', 'Jalan Mampang Prapatan VII', '081315638646', 'Swasta', 'Islam', '2017 - 2020', 'rt001rw06', 'rt001rw06'),
(57, '06', '002', 'Ahmad Mahdi', '3174030503570003', 'Laki-laki', 'Jakarta / 05-03-1957', 'SLTA', 'Jalan Mampang Prapatan VII', '08994488804', 'Swasta', 'Islam', '2017 - 2020', 'rt002rw06', 'rt002rw06'),
(58, '06', '003', 'M. Soleh AR.', '3174032911710001', 'Laki-laki', 'Jakarta / 29-11-1971', 'SLTA', 'Jalan Mampang Prapatan VII', '082113509158', 'Wiraswasta', 'Islam', '2017 - 2020', 'rt003rw06', 'rt003rw06'),
(59, '06', '004', 'Karmen', '3174031305590002', 'Laki-laki', 'Brebes / 13-05-1959', 'SLTA', 'Jalan Mampang Prapatan VII', '088210960248', 'Swasta', 'Islam', '2017 - 2020', 'rt004rw06', 'rt004rw06'),
(60, '06', '005', 'H. Ngadimin', '3174031502510002', 'Laki-laki', 'Yogyakarta / 15-02-1951', 'SLTA', 'Jalan Mampang Prapatan VII', '08129097484', 'Wiraswasta', 'Islam', '2017 - 2020', 'rt005rw06', 'rt005rw06'),
(61, '06', '006', 'M. Sidik', '3174031206620007', 'Laki-laki', 'Jakarta / 12-06-1962', 'SLTA', 'Jalan Mampang Prapatan V', '08979094396', 'Wiraswasta', 'Islam', '2017 - 2020', 'rt006rw06', 'rt006rw06'),
(62, '06', '007', 'Purmiati', '3174036002590001', 'Perempuan', 'Pacitan / 20-02-1959', 'SLTA', 'Jalan Mampang Prapatan V', '081282327744', '-', 'Islam', '2017 - 2020', 'rt007rw06', 'rt007rw06'),
(63, '06', '008', 'Ashari Roby', '3174031912530001', 'Laki-laki', 'Klaten / 19-12-1953', 'SLTA', 'Jalan Mampang Prapatan V No. 34', '082220324326', 'Swasta', 'Islam', '2017 - 2020', 'rt008rw06', 'rt008rw06'),
(64, '06', '009', 'Pauzi', '3174030103580003', 'Laki-laki', 'Jakarta / 01-03-1958', 'SLTA', 'Jalan Mampang Prapatan V', '021-51206870', 'Swasta', 'Islam', '2017 - 2020', 'rt009rw06', 'rt009rw06'),
(65, '07', '0', 'Faried Noor', '3174032505570001', 'Laki-laki', 'Jakarta / 25-05-1957', 'SLTA', 'Jalan Tegal Parang Selatan V GG Raufal RT.005/007', '081310221443', 'Swasta', 'Islam', '2017 - 2020', '', ''),
(66, '07', '001', 'MA\'MUN SALEH', '3174030402690004', 'Laki-laki', 'Jakarta / 04-02-1969', 'SLTA', 'Jalan Tegal Parang Selatan II', '081285012046', 'Wiraswasta', 'Islam', '2017 - 2020', 'rt001rw07', 'rt001rw07'),
(67, '07', '002', 'Agus Salim', '3174031708630002', 'Laki-laki', 'Jakarta / 17-08-1963', 'SLTA', 'Jalan Tegal Parang Selatan II', '081383402047', 'Wiraswasta', 'Islam', '2017 - 2020', 'rt002rw07', 'rt002rw07'),
(68, '07', '003', 'Hidayatullah', '3174031408640006', 'Laki-laki', 'Jakarta / 14-08-1964', 'SLTA', 'Jalan Tegal Parang Selatan II', '021-91262291 ', 'Swasta', 'Islam', '2017 - 2020', 'rt003rw07', 'rt003rw07'),
(69, '07', '004', 'Tjetjep Susila', '3174031103520002', 'Laki-laki', 'Bandung / 11-03-1952', 'SLTA', 'Jalan Tegal Parang Selatan V No. 11', '081383530053', 'Swasta', 'Islam', '2017 - 2020', 'rt004rw07', 'rt004rw07'),
(70, '07', '005', 'Abdul Hamid', '3174030409570001', 'Laki-laki', 'Jakarta / 04-09-1957', 'SLTA', 'Jalan Mampang Prapatan XI', '021-7990714', 'Swasta', 'Islam', '2017 - 2020', 'rt005rw07', 'rt005rw07'),
(71, '07', '006', 'Hairul Anwar', '3174031612570004', 'Laki-laki', 'Jakarta / 16-12-1957', 'SLTA', 'Jalan H. Ali No. 7', '', 'Swasta', 'Islam', '2017 - 2020', 'rt006rw07', 'rt006rw07'),
(72, '07', '007', 'HILMI', '3174032709670005', 'Laki-laki', 'Jakarta / 27 September 1967', 'DIII', 'Jlan Tegal Parang Selatan II/48', '081290187474', 'WIRASWASTA', 'Islam', '2017 - 2020', 'rt007rw07', 'rt007rw07'),
(73, '07', '008', 'Abd. Basit', '3174031403820007', 'Laki-laki', 'Jakarta / 14-03-1982', 'SLTA', 'Jalan Tegal Parang Selatan III', '085775453268', 'Swasta', 'Islam', '2017-2020', 'rt008rw07', 'rt008rw07');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `nik` int(16) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`nik`, `username`, `email`, `password`) VALUES
(123, 'abbusofyan', 'abu@gmail.com', 'admin123'),
(321, 'admin', 'admin@gmail.com', 'abbu');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kontrakan`
--
ALTER TABLE `kontrakan`
  ADD PRIMARY KEY (`no`);

--
-- Indexes for table `kost`
--
ALTER TABLE `kost`
  ADD PRIMARY KEY (`no`);

--
-- Indexes for table `penghuni_kontrakan`
--
ALTER TABLE `penghuni_kontrakan`
  ADD PRIMARY KEY (`no`);

--
-- Indexes for table `penghuni_kost`
--
ALTER TABLE `penghuni_kost`
  ADD PRIMARY KEY (`no`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kontrakan`
--
ALTER TABLE `kontrakan`
  MODIFY `no` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `kost`
--
ALTER TABLE `kost`
  MODIFY `no` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `penghuni_kontrakan`
--
ALTER TABLE `penghuni_kontrakan`
  MODIFY `no` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `penghuni_kost`
--
ALTER TABLE `penghuni_kost`
  MODIFY `no` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
