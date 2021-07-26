-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 26, 2021 at 03:59 PM
-- Server version: 10.1.25-MariaDB
-- PHP Version: 7.1.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_rm`
--

-- --------------------------------------------------------

--
-- Table structure for table `dokter`
--

CREATE TABLE `dokter` (
  `id_dokter` int(11) NOT NULL,
  `nm_dokter` varchar(50) NOT NULL,
  `nip` varchar(30) NOT NULL,
  `sip` varchar(30) NOT NULL,
  `spesialis` varchar(50) NOT NULL,
  `tgl_masuk` date NOT NULL,
  `alamat` text NOT NULL,
  `hp` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dokter`
--

INSERT INTO `dokter` (`id_dokter`, `nm_dokter`, `nip`, `sip`, `spesialis`, `tgl_masuk`, `alamat`, `hp`) VALUES
(2, 'dr. Agung Prihatnanto, Sp. KFR', '11223344551', '-', 'Spesialis Rehab Medik', '2018-06-07', 'Pagatan', '084589585899'),
(3, 'dr. Ahmad Hamidi', '11223344553', '-', 'Umum', '2018-07-13', 'Batulicin', '081391701913');

-- --------------------------------------------------------

--
-- Table structure for table `mcu_fisik`
--

CREATE TABLE `mcu_fisik` (
  `id_mcu_fisik` int(11) NOT NULL,
  `id_pasien` int(11) NOT NULL,
  `untuk` varchar(50) NOT NULL,
  `tanggal` date NOT NULL,
  `ekg` varchar(50) NOT NULL,
  `tatto` varchar(20) NOT NULL,
  `cacat` varchar(20) NOT NULL,
  `terbang` varchar(20) NOT NULL,
  `catatan` text NOT NULL,
  `id_dokter` int(11) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mcu_fisik`
--

INSERT INTO `mcu_fisik` (`id_mcu_fisik`, `id_pasien`, `untuk`, `tanggal`, `ekg`, `tatto`, `cacat`, `terbang`, `catatan`, `id_dokter`, `id_user`) VALUES
(2, 3, 'lorem', '2021-07-07', 'lorem', 'Tidak Bertatto', 'Tidak Ada', 'Laik Terbang', 'lorem', 3, 2);

-- --------------------------------------------------------

--
-- Table structure for table `mcu_hamil`
--

CREATE TABLE `mcu_hamil` (
  `id_mcu_hamil` int(11) NOT NULL,
  `id_pasien` int(11) NOT NULL,
  `untuk` varchar(50) NOT NULL,
  `tanggal` date NOT NULL,
  `pst` varchar(20) NOT NULL,
  `catatan` text NOT NULL,
  `id_dokter` int(11) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mcu_hamil`
--

INSERT INTO `mcu_hamil` (`id_mcu_hamil`, `id_pasien`, `untuk`, `tanggal`, `pst`, `catatan`, `id_dokter`, `id_user`) VALUES
(2, 2, 'lorem', '2021-07-07', 'Negatif', 'lorem', 3, 2);

-- --------------------------------------------------------

--
-- Table structure for table `mcu_jiwa`
--

CREATE TABLE `mcu_jiwa` (
  `id_mcu_jiwa` int(11) NOT NULL,
  `id_pasien` int(11) NOT NULL,
  `untuk` varchar(50) NOT NULL,
  `tanggal` date NOT NULL,
  `rohani` varchar(100) NOT NULL,
  `psikolog` varchar(100) NOT NULL,
  `catatan` text NOT NULL,
  `id_dokter` int(11) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mcu_jiwa`
--

INSERT INTO `mcu_jiwa` (`id_mcu_jiwa`, `id_pasien`, `untuk`, `tanggal`, `rohani`, `psikolog`, `catatan`, `id_dokter`, `id_user`) VALUES
(1, 3, 'Masuk Sekolah', '2021-07-06', 'Sehat', 'Sehat', 'lorem', 2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `mcu_mata`
--

CREATE TABLE `mcu_mata` (
  `id_mcu_mata` int(11) NOT NULL,
  `id_pasien` int(11) NOT NULL,
  `untuk` varchar(50) NOT NULL,
  `tanggal` date NOT NULL,
  `buta` varchar(100) NOT NULL,
  `cacat` varchar(100) NOT NULL,
  `catatan` text NOT NULL,
  `id_dokter` int(11) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mcu_mata`
--

INSERT INTO `mcu_mata` (`id_mcu_mata`, `id_pasien`, `untuk`, `tanggal`, `buta`, `cacat`, `catatan`, `id_dokter`, `id_user`) VALUES
(1, 3, 'Masuk Sekolah SMK', '2021-07-06', 'Tidak', 'Tidak', 'lorem', 3, 2);

-- --------------------------------------------------------

--
-- Table structure for table `mcu_napza`
--

CREATE TABLE `mcu_napza` (
  `id_mcu_napza` int(11) NOT NULL,
  `id_pasien` int(11) NOT NULL,
  `untuk` varchar(50) NOT NULL,
  `tanggal` date NOT NULL,
  `methamphetamine` varchar(20) NOT NULL,
  `amphetamine` varchar(20) NOT NULL,
  `benzodiazepine` varchar(20) NOT NULL,
  `thc` varchar(20) NOT NULL,
  `morphine` varchar(20) NOT NULL,
  `cocaine` varchar(20) NOT NULL,
  `hasil` varchar(50) NOT NULL,
  `catatan` text NOT NULL,
  `id_dokter` int(11) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mcu_napza`
--

INSERT INTO `mcu_napza` (`id_mcu_napza`, `id_pasien`, `untuk`, `tanggal`, `methamphetamine`, `amphetamine`, `benzodiazepine`, `thc`, `morphine`, `cocaine`, `hasil`, `catatan`, `id_dokter`, `id_user`) VALUES
(2, 3, 'Masuk Sekolah SMK', '2021-07-07', 'Non Reaktif', 'Non Reaktif', 'Non Reaktif', 'Non Reaktif', 'Non Reaktif', 'Non Reaktif', 'Negatif NAPZA', 'lorem', 2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `mcu_sehat`
--

CREATE TABLE `mcu_sehat` (
  `id_mcu_sehat` int(11) NOT NULL,
  `id_pasien` int(11) NOT NULL,
  `untuk` varchar(50) NOT NULL,
  `tanggal` date NOT NULL,
  `tekanan` varchar(20) NOT NULL,
  `tinggi` varchar(10) NOT NULL,
  `berat` varchar(10) NOT NULL,
  `nadi` varchar(10) NOT NULL,
  `respirasi` varchar(10) NOT NULL,
  `suhu` varchar(10) NOT NULL,
  `hasil` varchar(50) NOT NULL,
  `catatan` text NOT NULL,
  `id_dokter` int(11) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mcu_sehat`
--

INSERT INTO `mcu_sehat` (`id_mcu_sehat`, `id_pasien`, `untuk`, `tanggal`, `tekanan`, `tinggi`, `berat`, `nadi`, `respirasi`, `suhu`, `hasil`, `catatan`, `id_dokter`, `id_user`) VALUES
(2, 3, 'Masuk Sekolah SMK', '2021-07-06', '120/80', '168,5', '50', '80', '20', '35', 'Sehat', 'lorem', 3, 2);

-- --------------------------------------------------------

--
-- Table structure for table `mcu_virus`
--

CREATE TABLE `mcu_virus` (
  `id_mcu_virus` int(11) NOT NULL,
  `id_pasien` int(11) NOT NULL,
  `untuk` varchar(50) NOT NULL,
  `tanggal` date NOT NULL,
  `covid` varchar(20) NOT NULL,
  `hepatitis` varchar(20) NOT NULL,
  `hiv` varchar(20) NOT NULL,
  `catatan` text NOT NULL,
  `id_dokter` int(11) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mcu_virus`
--

INSERT INTO `mcu_virus` (`id_mcu_virus`, `id_pasien`, `untuk`, `tanggal`, `covid`, `hepatitis`, `hiv`, `catatan`, `id_dokter`, `id_user`) VALUES
(2, 3, 'Masuk Sekolah SMK', '2021-07-06', 'Reaktif', 'Non Reaktif', 'Non Reaktif', 'Aman', 3, 2);

-- --------------------------------------------------------

--
-- Table structure for table `obat`
--

CREATE TABLE `obat` (
  `id_obat` int(11) NOT NULL,
  `nm_obat` varchar(100) NOT NULL,
  `kekuatan` varchar(20) NOT NULL,
  `bentuk` varchar(20) NOT NULL,
  `harga` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `obat`
--

INSERT INTO `obat` (`id_obat`, `nm_obat`, `kekuatan`, `bentuk`, `harga`) VALUES
(1, 'Abacavir 300 mg tab', '300 mg', 'Tablet', '8250'),
(2, 'ABILIFY DISCMELT 10 MG TAB', '10 mg', 'Tablet', '51594'),
(3, 'ACARBOSE TABLET 100 MG TAB', '100 mg', 'Tablet', '2102.98'),
(4, 'ACARBOSE TABLET 50 MG', '50 mg', 'Tablet', '1304.38'),
(5, 'ACETYLCYSTEINE CAP', '200 mg', 'Kapsul', '1100'),
(6, 'ACETYLCYSTEINE INJ', '200 mg/ml', 'Injeksi', '199000'),
(7, 'Actemra 400 mg /20 ml Inj', '400 mg', 'Injeksi', '9885321.6'),
(8, 'Actilyse 50 mg inj', '50 mg', 'Injeksi', '4249999.6'),
(9, 'ACYCLOVIR 200 MG TAB', '200 mg', 'Tablet', '485.23'),
(10, 'ACYCLOVIR 400 MG TAB', '400 mg', 'Tablet', '832'),
(11, 'ACYCLOVIR CR', '3%', 'Salep Kulit', '4000'),
(12, 'ADALAT OROS 30 TAB', '30 mg', 'Tablet', '3948'),
(13, 'Adona AC  5 cc injeksi', '10 mg/2 ml', 'Injeksi', '16016'),
(14, 'Adona AC 10 cc injeksi', '25 mg/5 ml', 'Injeksi', '22880'),
(15, 'Adona AC 17 tablet ', '-', 'Tablet', '2217.6'),
(16, 'AHFC Sachet', '-', 'Serbuk', '14666.63'),
(17, 'ALGANAX 0,5 MG TAB', '0.5 mg', 'Tablet', '6154'),
(18, 'Alimta 500 mg Inj', '500 mg', 'Injeksi', '2823500'),
(19, 'ALINAMIN TAB 5 mg', '5 mg', 'Tablet', '1320'),
(20, 'Alkeran 2 mg tab', '2 mg', 'Tablet', '12130.01'),
(21, 'Alletrol Comp TTM', '-', 'Tetes Mata', '15796'),
(22, 'ALLORIS SYR', '10 mg', 'Syrup', '57860'),
(23, 'ALLUPURINOL 100 MG TAB', '100 mg', 'Tablet', '199'),
(24, 'ALLUPURINOL 300 MG TAB', '300 mg', 'Tablet', '462'),
(25, 'Aloclair Gel', '-', 'Gel', '105999.3'),
(26, 'ALPENTIN 100 MG TAB', '100 mg', 'Tablet', '1495'),
(27, 'Alpentin 300 mg kapsul', '300 mg', 'Kapsul', '1639'),
(28, 'Alprazolam 0.5 mg tab', '0.5 mg', 'Tablet', '731.25'),
(29, 'ALPRAZOLAM 1 MG TAB', '1 mg', 'Tablet', '128'),
(30, 'ALPRAZOLAM TAB. 0,5 MG', '5 mg', 'Tablet', '731'),
(31, 'Aluvia tab', '200 mg/50 mg', 'Tablet', '0'),
(32, 'AMBROXOL TAB', '30 mg', 'Tablet', '330'),
(33, 'AMBROXOL 15 MG / 5 ML SYR', '15 mg/5 ml', 'Syrup', '5011.6'),
(34, 'Amikacin 250 mg inj', '250 mg', 'Injeksi', '95832'),
(35, 'AMIKACIN 500 MG INJ', '500 mg', 'Injeksi', '35349.6'),
(36, 'Aminefron kaplet', '-', 'Tablet', '7150'),
(37, 'AMINOFLUID INF', '-', 'Infus', '70189'),
(38, 'AMINOFUSIN HEPAR INF', '-', 'Infus', '88499.4'),
(39, 'Aminofusin Paed 250 ml Infus', '-', 'Infus', '56999.8'),
(40, 'AMINOLEBAN INFUS', '-', 'Infus', '187000'),
(41, 'AMINOPHYLLIN INJ', '240 mg', 'Injeksi', '3959.93'),
(42, 'Aminosteril Infant 6 % 100 ml INF', '6%', 'Infus', '51216'),
(43, 'AMIODARONE INJ', '50 mg/ml', 'Injeksi', '8700.08'),
(44, 'AMITRIPTILIN 25 MG TAB', '25 mg', 'Tablet', '187'),
(45, 'AMLODIPINE 10 MG TAB', '10 mg', 'Tablet', '250'),
(46, 'AMLODIPINE 5 MG TAB', '5 mg', 'Tablet', '150'),
(47, 'AMOXAN 500 CAP', '500 mg', 'Kapsul', '3410'),
(48, 'AMOXAN DROP', '100 mg/ml', 'Syrup', '24640'),
(49, 'AMOXAN SYR', '125 mg/5 ml', 'Syrup', '24750'),
(50, 'AMOXYCILLIN 125 MG / 5 ML SYR', '125 mg/5 ml', 'Syrup', '7399.7'),
(51, 'AMOXYCILLIN 500 MG TAB', '500 mg', 'Kapsul', '406.67'),
(52, 'AMPICCILLIN 1000 INJ', '1000 mg', 'Injeksi', '9500'),
(53, 'ANALSIK TAB', '500 mg-2 mg', 'Tablet', '1677.5'),
(54, 'ANALTRAM KAPS', '-', 'Kapsul', '11999.97'),
(55, 'ANEMOLAT TAB', '1 mg', 'Tablet', '204.17'),
(56, 'ANTASIDA TAB', '-', 'Tablet', '211'),
(57, 'ANTRAIN INJ', '500 mg', 'Injeksi', '9900'),
(58, 'APIALYST DROP', '-', 'Syrup', '55000'),
(59, 'APIDRA SOLOSTAR.', '-', 'Flexpen', '87080'),
(60, 'APTOR TAB', '80 mg', 'Tablet', '330'),
(61, 'Aquadest 1 liter Wida', '-', 'Infus', '19.8'),
(62, 'Aquadest 25 cc Inj', '-', 'Injeksi', '2860'),
(63, 'Arava 20 mg tab', '20 mg', 'Tablet', '23321.98'),
(64, 'ARCOXIA 90 MG TAB', '90 mg', 'Tablet', '17105'),
(65, 'ARDIUM TABLET', '500 mg', 'Tablet', '8470'),
(66, 'ARICEPT 5 MG TAB', '5 mg', 'Tablet', '25345'),
(67, 'Aricept Evess 10 mg tab', '10 mg', 'Tablet', '12485'),
(68, 'ARIMIDEX 1 MG TAB', '1 mg', 'Tablet', '7300'),
(69, 'ARIXTRA 2,5MG INJ', '5 mg', 'Injeksi', '273799.9'),
(70, 'AROMASIN 25 MG TAB', '25 mg', 'Tablet', '42999.99'),
(71, 'As.Tranex 500 tab (Nutranex)', '500 mg', 'Tablet', '1800'),
(72, 'Asam Mefenamat 500 mg tab', '500 mg', 'Tablet', '250'),
(73, 'ASAM TRANEXSAMAT 500 MGTAB', '500 mg', 'Tablet', '1800'),
(74, 'ASAM TRANEXSAMAT INJ 250 MG', '250 mg', 'Injeksi', '6600'),
(75, 'ASAM TRANEXSAMAT INJ 500 MG', '500 mg', 'Injeksi', '6352.5'),
(76, 'ASAM VALPROAT 250 MG/5 ML SYR', '250 mg/5 ml ', 'Syrup', '50820'),
(77, 'ASERING INFUS', '-', 'Infus', '9645.9'),
(78, 'ASPAR K TAB', '300 mg', 'Tablet', '2721.29'),
(79, 'ASPILET 80 MG TAB', '80 mg', 'Tablet', '533.83'),
(80, 'Asta plus kap', '-', 'Kapsul', '11700'),
(81, 'Ataroc 25 mg tab', '25 mg', 'Tablet', '2365'),
(82, 'Ataroc syr', '25 mg/5 ml', 'Syrup', '51150'),
(83, 'Atevir 0.5 mg tab.', '0.5 mg', 'Tablet', '40700'),
(84, 'Atorvastatin 20 mg tab', '20 mg', 'Tablet', '3520'),
(85, 'ATORVASTATIN TAB', '10 mg', 'Tablet', '1155'),
(86, 'Atracurium Besilat 25 mg/2 ml inj', '25 mg/2 ml', 'Injeksi', '19800'),
(87, 'Atripla tab', '-', 'Tablet', '0'),
(88, 'AVAMYS NASAL SPRAY', '27.5 mcg', 'Nasal Spray', '112476.1'),
(89, 'AVODART 0,5 MG CAP', '5 mg', 'Tablet', '4935'),
(90, 'Azithromycin 200Mg/5ml Syr', '200 mg/5 ml', 'Syrup', '26535'),
(91, 'Azithromycin 500 mg inj', '500 mg', 'Injeksi', '143000'),
(92, 'AZITHROMYCIN SIRUP KERING 200MG/5ML', '200 mg/5ml', 'Syrup', '26352.7'),
(93, 'AZYTRHOMYCIN 500MG TAB', '500 mg', 'Tablet', '4613.02'),
(94, 'Bactesyn 0.75 gr Inj', '750 mg', 'Injeksi', '51702.2'),
(95, 'BAMGETOL 200 MG TAB', '200 mg', 'Tablet', '2112'),
(96, 'BAQUINOR F 500 MG TAB', '500 mg', 'Tablet', '14927'),
(97, 'Becom C tab ', '-', 'Tablet', '1732.5'),
(98, 'Becom-Zet  kaplet', '-', 'Tablet', '2310'),
(99, 'BEDAK SALICYL 100 GR', '2%', 'Bedak', '6426.2'),
(100, 'BEDAK SALICYL 2% 60 GR', '2%', 'Bedak', '6426'),
(101, 'Benzatin Benzil P 1.2 juta IU inj', '1.2 juta', 'Injeksi', '14712.5'),
(102, 'BEROTEC SPRAY 100 MG', '100 mg', 'Spray', '83189.7'),
(103, 'BETABLOK 50 MG TAB', '50 mg', 'Tablet', '1467'),
(104, 'BETADINE OBAT KUMUR 100 ML', '2%', 'Obat kumur', '15785'),
(105, 'BETADINE OBAT KUMUR 190 ML', '2%', 'Obat kumur', '25800'),
(106, 'Betadine Sol. 30 ml', '10%', 'Infus', '19085'),
(107, 'Betadine Sol. 60 ml', '10%', 'Infus', '30850'),
(108, 'BETAHISTIN 6 MG TAB', '6 mg', 'Tablet', '380'),
(109, 'BETAMETASON 0,1% CR', '1%', 'Salep Kulit', '2438.7'),
(110, 'BFLUID 500 ML INFUS', '-', 'Infus', '76300.4'),
(111, 'Binecap tab', '500 mg', 'Tablet', '18032.96'),
(112, 'BIO PLACENTON JELL 15 GR', '-', 'Salep Kulit', '22000'),
(113, 'BioCurkem tab', '-', 'Tablet', '11733.33'),
(114, 'BISOLVON INJ', '4 mg/2 ml', 'Injeksi', '61145.7'),
(115, 'BISOPROLOL 5 Mg tab', '5 mg', 'Tablet', '398.99'),
(116, 'BLEDSTOP TAB', '0.125 mg', 'Tablet', '594'),
(117, 'Bleocin 15 mg inj', '15 mg', 'Injeksi', '382874.8'),
(118, 'Bonevell inj', '500 mg', 'Injeksi', '580250'),
(119, 'Brainact 250 mg / 2 ml  Inj', '250 mg', 'Injeksi', '47300'),
(120, 'BRAINACT 500 INJ', '500 mg', 'Injeksi', '77000'),
(121, 'BRAINACT 500 TABLET', '500 mg', 'Tablet', '13750'),
(122, 'BRAINACT INJ 250 MG', '250 mg', 'Injeksi', '47300'),
(123, 'BRAXIDIN TAB', '5 mg-2.5 mg', 'Tablet', '1221'),
(124, 'BREATHY NASAL SPRAY (BNS)', '-', 'Spray', '69999.6'),
(125, 'Brexel 20 mg inj', '20 mg', 'Injeksi', '191400'),
(126, 'Brexel 80 mg inj', '80 mg', 'Injeksi', '986700'),
(127, 'BRICASMA 5 ML INJ', '0.5 mg/ml', 'Injeksi', '16545.32'),
(128, 'BRICASMA RESP 2,5 mg', '2.5 mg', 'Nebules', '7700'),
(129, 'BRILINTA 90 MG TAB', '90 mg', 'Tablet', '8350'),
(130, 'BURNAZIN CREAM 35 GR', '10 mg/g', 'Salep Kulit', '61792.5'),
(131, 'BUSCOPAN 10 MG TAB', '10 mg', 'Tablet', '3435.62'),
(132, 'BUSCOPAN INJ', '10 mg', 'Injeksi', '35909.5'),
(133, 'BUSCOPAN PLUS TAB.', '10 mg-500 mg', 'Tablet', '4443.45'),
(134, 'CA.GLUCONAS INJ', '100 mg/ml', 'Injeksi', '10351'),
(135, 'CAL - 95 TAB', '-', 'Tablet', '5720'),
(136, 'Caladin Lotion 95 ml', '-', 'Infus', '22000'),
(137, 'CALCI LACTAS', '500 mg', 'Tablet', '187'),
(138, 'Calcium Folinate inj', '50 mg', 'Injeksi', '47088'),
(139, 'Calnic plus syr', '-', 'Syrup', '91000'),
(140, 'Calnic Plus tab', '-', 'Tablet', '3025'),
(141, 'CALOS TAB', '500 mg', 'Tablet', '880'),
(142, 'Campto 100 mg 5ml inj', '100 mg', 'Injeksi', '715500.5'),
(143, 'Campto 40 mg 2 ml inj', '40 mg', 'Injeksi', '396077'),
(144, 'Canderin 8 mg tab', '8 mg', 'Tablet', '9000'),
(145, 'Candesartan 16 mg tab', '16 mg', 'Tablet', '1200'),
(146, 'Candesartan 8 mg tab', '8 mg', 'Tablet', '700'),
(147, 'CAPTOPRIL 12,5 MG TAB', '12.5 mg', 'Tablet', '145.99'),
(148, 'CAPTOPRIL 25 MG TAB', '25 mg', 'Tablet', '225.94'),
(149, 'CARBAMAZEPIN 200 MG TAB', '200 mg', 'Tablet', '250'),
(150, 'Carboplatin 150 mg / 15 ml inj', '150 mg', 'Injeksi', '131000'),
(151, 'Carboplatin 450 mg inj / 45 ml inj', '450 mg', 'Injeksi', '304200'),
(152, 'Cardio Aspirin tab', '80 mg', 'Tablet', '1274.17'),
(153, 'Car-Q 100 mg tab', '100 mg', 'Tablet', '12000'),
(154, 'Cartylo 80 mg tab', '80 mg', 'Tablet', '380'),
(155, 'Casodex 150 mg tab', '150 mg', 'Tablet', '45800'),
(156, 'CATAFLAM TAB 50 MG TAB', '50 mg', 'Tablet', '6242.9'),
(157, 'Cathejell 12,5 G Syringe', '-', 'Salep Kulit', '43679.9'),
(158, 'Cedantron 8 mg / 4 ml injeksi', '8 mg', 'Injeksi', '66000'),
(159, 'CEFADROXIL 125 MG SYR', '125 mg/5 ml', 'Kapsul', '9839.5'),
(160, 'CEFADROXIL 500 MG TAB', '500 mg', 'Kapsul', '1210'),
(161, 'Cefazolin 1 g inj', '1 g', 'Injeksi', '21580'),
(162, 'Cefepime 1 g inj', '1 g', 'Injeksi', '25025'),
(163, 'CEFIXIM 100 CAP', '100 mg', 'Kapsul', '1430'),
(164, 'Cefixim 200 mg caps', '200 mg', 'Kapsul', '4033.33'),
(165, 'CEFIXIM DRY SYR 100 MG/30 ML', '100 mg/5 ml', 'Syrup', '18000'),
(166, 'CEFOBACTAM INJ', '500 mg-500 mg', 'Injeksi', '221265'),
(167, 'CEFOPERAZONE INJ', '1 g', 'Injeksi', '60500'),
(168, 'Cefoperazone Sulbactam 1 g inj', '1 g', 'Injeksi', '121000'),
(169, 'CEFOTAXIM I G INJ', '1 g', 'Injeksi', '9636'),
(170, 'CEFPIROM INJ', '1 g', 'Injeksi', '92000'),
(171, 'Cefspan 200 mg tab', '200 mg', 'Tablet', '38500'),
(172, 'CEFSPAN SYRUP', '100 mg/5 ml', 'Syrup', '136199.8'),
(173, 'CEFSPAN TAB 100 MG', '100 mg', 'Tablet', '24200'),
(174, 'CEFTAZIDIME 1 G INJ', '1 g', 'Injeksi', '37620'),
(175, 'CEFTRIAXON I G INJ', '1 g', 'Injeksi', '11000'),
(176, 'CEFTRIMAX INJ', '1 g', 'Injeksi', '231000'),
(177, 'CEFUROXIME INJ', '750 mg', 'Injeksi', '29975'),
(178, 'CELEBREX 100 MG TAB', '100 mg', 'Tablet', '11330'),
(179, 'Cellcept 500 mg tab', '500 mg', 'Tablet', '17750'),
(180, 'CENDO CARPINE 1 % FL 5CC', '1%', 'Tetes Mata', '17050'),
(181, 'CENDO CARPINE 2% 5 CC', '2%', 'Tetes Mata', '20900'),
(182, 'CENDO CATARLENT 5 CC FL', '-', 'Tetes Mata', '24887.5'),
(183, 'CENDO EFRISEL 10 % ED MD', '10%', 'Tetes Mata', '16775'),
(184, 'CENDO FLOXA ED MD', '3 mg/0.6 ml', 'Tetes Mata', '33577.5'),
(185, 'CENDO GENTA FL 0,3 % 5 CC', '0.3%', 'Tetes Mata', '31212.5'),
(186, 'CENDO GENTAMYCIN ED MD 0,3 %', '0.03%', 'Tetes Mata', '31212.5'),
(187, 'CENDO GENTAMYCIN EO 3,5 GR', '0.3%', 'Salep Kulit', '40012.5'),
(188, 'CENDO HERVIS EO', '500 mg/5 ml', 'Salep Kulit', '40425'),
(189, 'CENDO HOMATRO 2% ED FL 5 CC', '2%', 'Tetes Mata', '39050'),
(190, 'CENDO LFX ED MD', '5 mg/ml', 'Tetes Mata', '15180'),
(191, 'CENDO LYTEERS FL 15 CC', '-', 'Tetes Mata', '25850'),
(192, 'CENDO MYDRIATYL 0,5 % FL 5 CC', '0.5%', 'Tetes Mata', '31763'),
(193, 'CENDO NATACEN FL 5CC', '5%', 'SM', '9158'),
(194, 'CENDO TIMOL 0,5 % ED MD', '5%', 'Tetes Mata', '52526'),
(195, 'CENDO TROPIN 0,5 % FL 5 CC', '0.5%', 'Tetes Mata', '12375'),
(196, 'CENDO TROPIN 0,5% ED MD', '5%', 'Infus', '12375'),
(197, 'CENDO VASACON A FL 15 CC', '-', 'Tetes Mata', '24612.5'),
(198, 'CENDO VASACON A MD', '0.05%', 'Tetes Mata', '17875'),
(199, 'CENDO XITROL ED FL 5 CC', '-', 'Tetes Mata', '29975'),
(200, 'Cepezet 100 mg tab', '100 mg', 'Tablet', '495'),
(201, 'CEPEZET INJ (MERSI)', '5 mg/ml', 'Injeksi', '12100'),
(202, 'CERNEVIT INJ.', '-', 'Injeksi', '236500'),
(203, 'CETADOP 200 MG INJEKSI', '200 mg', 'Injeksi', '40260'),
(204, 'CETIRIZINE DROP', '5 mg/ml', 'Syrup', '27500'),
(205, 'CETIRIZINE SYR 5MG/5ML', '5 mg/ml', 'Syrup', '3061.3'),
(206, 'CETIRIZINE TAB', '10 mg', 'Tablet', '104.01'),
(207, 'Chana kapsul', '-', 'Kapsul', '6655'),
(208, 'CHLORAMPHENICOL SM', '1%', 'Salep Mata', '1925'),
(209, 'Cilostazol 100 mg tab', '100 mg', 'Tablet', '7350'),
(210, 'CIPROFLOXACIN INFUS', '200 mg/100 ml', 'Infus', '25000'),
(211, 'CIPROFLOXASIN 500 MG TAB', '500 mg', 'Tablet', '1723'),
(212, 'Cisplatin 10 mg inj', '10 mg', 'Injeksi', '23650'),
(213, 'Cisplatin 50 mg Inj', '50 mg', 'Injeksi', '103000'),
(214, 'Citicoline 500 mg inj', '500 mg', 'Injeksi', '27500'),
(215, 'CITICOLINE INJ 250MG/2ML', '500 mg', 'Injeksi', '27500'),
(216, 'CITICOLINE TABLET 500MG', '500 mg', 'Tablet', '8999.98'),
(217, 'Citra Lock 4% 5ml', '4%', 'Injeksi', '31999.99'),
(218, 'CLANEKSI 500 MG TAB', '500 mg', 'Tablet', '17000'),
(219, 'CLANEKSI SYR', '125 mg/5 ml', 'Syrup', '58300'),
(220, 'CLINDAMICIN 150 MG TAB', '150 mg', 'Kapsul', '982.3'),
(221, 'CLINDAMYCIN 300 MG TAB', '300 mg', 'Kapsul', '1375.44'),
(222, 'CLINIMIX INFUS 1 L', '-', 'Infus', '259999.3'),
(223, 'CLINOLEIC 20% INFUS 250 ML', '250 ml', 'Infus', '169125'),
(224, 'CLOBAZAM TAB 10 MG TAB', '10 mg', 'Tablet', '1175.63'),
(225, 'Clonazepam 2 mg tab ', '2 mg', 'Tablet', '5271'),
(226, 'CLONIDINE TAB', '0.15 mg', 'Tablet', '223.99'),
(227, 'CLOPIDOGREL TAB 75 MG TAB', '75 mg', 'Tablet', '4000'),
(228, 'CLOZAPINE 100 MG TAB', '100 mg', 'Tablet', '3622'),
(229, 'CLOZAPINE 25 MG TAB', '25 mg', 'Tablet', '3399.99'),
(230, 'CODEIN 10 MG TAB', '10 mg', 'Tablet', '684.97'),
(231, 'CODEIN 15 MG TAB', '15 mg', 'Tablet', '1234'),
(232, 'CODEIN 20 MG TAB', '20 mg', 'Tablet', '1623.6'),
(233, 'CODIPRONT CAP', '-', 'Kapsul', '12000'),
(234, 'Codipront Cum Exp Syrup', '-', 'Syrup', '61105'),
(235, 'CODIPRONT SYR 60 ML', '-', 'Syrup', '56265'),
(236, 'Colergis Tablet', '-', 'Tablet', '3630'),
(237, 'COMAFUSIN HEPAR INF', '-', 'Infus', '90302'),
(238, 'COMBIVENT UDV INJ.', '0.5-2.5 mg', 'Nebules', '22699.99'),
(239, 'Concor 1.25 mg tab', '1.25 mg', 'Tablet', '1904.98'),
(240, 'Concor 10 mg tab', '10 mg', 'Tablet', '3097'),
(241, 'CONCOR 2,5 MG TABLET', '2.5 mg', 'Tablet', '745.83'),
(242, 'Coralan 5 mg tab', '5 mg', 'Tablet', '8745'),
(243, 'CORTIDEX INJ', '4 mg', 'Injeksi', '6215'),
(244, 'COTRIMOXAZOL 480 MG TAB', '400 mg-80 mg', 'Tablet', '300'),
(245, 'COTRIMOXAZOL SYR', '200 mg-40 mg', 'Syrup', '6600'),
(246, 'Cotrimoxazole Forte 960 mg cap', '800 mg-160 mg', 'Kapsul', '450'),
(247, 'Counterpain Cream 30 g', '-', 'Salep Kulit', '36190'),
(248, 'Covifor 100 mg Inj', '100 mg', 'Injeksi', '1650000'),
(249, 'CRAVIT INJ 750 MG', '750 mg', 'Injeksi', '385000'),
(250, 'Crestor 20 mg tab', '20 mg', 'Tablet', '17675.82'),
(251, 'Cripsa tab', '2.5 mg', 'Tablet', '18700'),
(252, 'CTM TAB', '4 mg', 'Tablet', '200'),
(253, 'Curacil 500 mg/10 ml Injeksi', '500 mg', 'Injeksi', '40008.1'),
(254, 'CURCUMA TAB', '-', 'Tablet', '973.5'),
(255, 'Curliv Plus Syrup 120 ml', '-', 'Syrup', '55000'),
(256, 'Curvit 60 ml syrup', '-', 'Syrup', '24200'),
(257, 'Cyclophosphamide 1 gram inj', '1 g', 'Injeksi', '200970'),
(258, 'Cyclophosphamide 200 mg inj', '200 mg', 'Injeksi', '64350'),
(259, 'Cygest 400 supp', '400 mg', 'Supp', '26620'),
(260, 'Cymevene 500 mg inj', '500 mg', 'Injeksi', '448916'),
(261, 'Cystistat 40 mg Inj', '40 mg', 'Injeksi', '1787500'),
(262, 'CYSTONE TAB', '-', 'Tablet', '3575'),
(263, 'D5% + 1/2 NS Infus Wida', '-', 'Infus', '10680'),
(264, 'D5% + 1/4 NS Infus Wida', '-', 'Infus', '10625'),
(265, 'Dactinomycin  0.5 mg injeksi', '0.5 mg', 'Injeksi', '410536.5'),
(266, 'Daunocin 20 mg inj', '20 mg', 'Injeksi', '258250'),
(267, 'Decubal 20 gr', '-', 'Salep Kulit', '55000'),
(268, 'DEPAKOTE 250 MG TAB.', '250 mg', 'Tablet ER', '2990'),
(269, 'Depakote ER 250 mg tab', '250 mg', 'Tablet', '2990'),
(270, 'Depakote ER 500 mg tab', '500 mg', 'Tablet', '5999.99'),
(271, 'DESOLEX OINT', '0.05%', 'Salep Kulit', '31350'),
(272, 'DESOXIMETASONE 0.25 CR 15 GR', '0.25%', 'Salep Kulit', '17952'),
(273, 'Dexaflox 400 mg tab', '400 mg', 'Tablet', '30208'),
(274, 'DEXAMETHASON 0,5 MG TAB', '0.5 mg', 'Tablet', '149.17'),
(275, 'DEXAMETHASON INJ', '4 mg', 'Injeksi', '3300'),
(276, 'Dextrose 10 % Infus OGB Wida', '10%', 'Infus', '8002.5'),
(277, 'Dextrose 40% Inj', '40%', 'Injeksi', '10010'),
(278, 'Dextrose 5 % Infus  OBG Wida', '5%', 'Infus', '7364.5'),
(279, 'Dextrose 5% 100 ml Infus B.Braun', '-', 'Infus', '9075'),
(280, 'Diamicron MR tab', '80 mg', 'Tablet', '6237'),
(281, 'Diazepam 2 mg tab', '2 mg', 'Tablet', '137.26'),
(282, 'DIAZEPAM 5 MG TAB', '5 mg', 'Tablet', '114'),
(283, 'Dibekacin 100 mg Inj', '100 mg', 'Injeksi', '89045'),
(284, 'Difenhidramin 10 mg inj', '10 mg', 'Injeksi', '1864.61'),
(285, 'DIGOXIN 0,25 MCG TAB', '0.25 mcg', 'Tablet', '200.2'),
(286, 'DILTIAZEM TAB 30 MG tab', '30 mg', 'Tablet', '154'),
(287, 'DISFLATYL TAB', '40 mg', 'Tablet', '555.5'),
(288, 'Disolf  EC 490 mg tab', '490 mg', 'Tablet', '7700'),
(289, 'DOBUTAMIN 250 MG / 5 ML INJ', '250 mg/5 ml ', 'Injeksi', '37733.74'),
(290, 'Docetexel 20mg/2ml inj', '20 mg', 'Injeksi', '187196.9'),
(291, 'Docetexel 80 mg/8 ml inj', '80 mg', 'Injeksi', '981473'),
(292, 'Dogmatil 50 mg cap', '50 mg', 'Kapsul', '4268'),
(293, 'DOMPERIDONE SYRUP 60 ML', '5 mg/5 ml', 'Infus', '12650'),
(294, 'DOMPERIDONE TABLET 10 MG', '10 mg', 'Tablet', '416.1'),
(295, 'DOPAMET TAB 250 MG', '250 mg', 'Tablet', '2057'),
(296, 'Dormicum 15 mg/3 ml inj', '15 mg/3 ml', 'Injeksi', '49309'),
(297, 'Dorner tab', '20 mcg', 'Tablet', '4873'),
(298, 'Doxorubicin 10 mg / 5 ml Inj', '10 mg', 'Injeksi', '44499.4'),
(299, 'Doxorubicin 50 mg / 25 ml inj', '50 mg', 'Injeksi', '227700'),
(300, 'DOXYCICLIN 100 MG TAB', '100 mg', 'Kapsul', '392.15'),
(301, 'DULCOLAX SUPP 10 MG', '10 mg', 'Supp', '16055.6'),
(302, 'DULCOLAX SUPP 5 MG', '5 mg', 'Supp', '1888'),
(303, 'DULCOLAX TAB', '5 mg', 'Tablet', '1400.58'),
(304, 'Durogesic 25 MU', '25 mcg', 'Lmb', '208638.98'),
(305, 'Durogesic Matrix 12.5 ', '12.5 mcg', 'Lmb', '110732'),
(306, 'DUROGESIC PAD', '12.5 mg', 'Lmb', '110732.16'),
(307, 'Duviral tab (Lami+Zido)', '150 mg-300 mg', 'Tablet', '0'),
(308, 'DVit Syr', '400 iu', 'Syrup', '27500'),
(309, 'Efavirenz 600 mg tab', '600 mg', 'Tablet', '0'),
(310, 'Eflagen 50 mg tab', '50 mg', 'Tablet', '2310'),
(311, 'Eligard 22.5 mg Inj', '22.5 mg', 'Injeksi', '2727000'),
(312, 'Elkana Syr.', '-', 'Syrup', '25410'),
(313, 'Elocon Cream', '0.1%', 'Salep Kulit', '63360'),
(314, 'Emla 5 % cream 5 gr', '5%', 'Salep Kulit', '57999'),
(315, 'Endoxan 1000 mg Inj', '1 g', 'Injeksi', '200970'),
(316, 'Endoxan 200 mg Injeksi', '200 mg', 'Injeksi', '64350'),
(317, 'Endoxan 500 mg Injeksi', '500 mg', 'Injeksi', '173000'),
(318, 'Enystin 12 ml', '100,000/ml', 'Syrup', '39600'),
(319, 'EPHEDRIN INJ', '50 mg/ml', 'Injeksi', '10989'),
(320, 'Epifri syrp', '250 mg/5 ml ', 'Syrup', '109090'),
(321, 'EPINEPHRINE INJ. 0,1 % ETC', '1%', 'Injeksi', '2530'),
(322, 'Epirubicin 10 mg /5 ml Inj', '10 mg', 'Injeksi', '86001.3'),
(323, 'Epirubicin 50 mg/25 ml Injeksi', '50 mg', 'Injeksi', '424999.3'),
(324, 'Epodion 3000IU/0.3ml inj', '3000 iu', 'Injeksi', '93500'),
(325, 'Eporon 3.000 IU/0.3 ml inj', '3000 iu', 'Injeksi', '99770'),
(326, 'Erbitux 100 mg/20 ml inj', '100 mg/20 ml', 'Injeksi', '2450000'),
(327, 'Ericaf tab', '1 mg-50 mcg', 'Tablet', '5626'),
(328, 'ERYTHROMYCIN 250 TAB', '250 mg', 'Tablet', '700'),
(329, 'ERYTHROMYCYN 500 TAB', '500 mg', 'Tablet', '900'),
(330, 'ERYTROMICYN SYR', '200 mg/5 ml', 'Injeksi', '9801'),
(331, 'Esilgan 1 mg tab', '1 mg', 'Tablet', '4576'),
(332, 'ESILGAN 2 MG TAB', '2 mg ', 'Tablet', '6913.5'),
(333, 'Esomax Inj', '40 mg', 'Injeksi', '165000'),
(334, 'Esomeprazole 40 mg inj', '40 mg', 'Injeksi', '31499.6'),
(335, 'ETHAMBUTOL 500 MG TAB', '500 mg', 'Tablet', '827.53'),
(336, 'Etopul Inj', '100 mg/5 ml', 'Injeksi', '89210'),
(337, 'EUTHYROX 100 MG TAB', '100 mg', 'Tablet', '1694.17'),
(338, 'Euvax B inj', '-', 'Injeksi', '87846'),
(339, 'Exjade 250 mg tab', '250 mg', 'Tablet', '108000'),
(340, 'EXJADE 500 MG TAB', '500 mg', 'Tablet', '155000'),
(341, 'Extrace 200 mg/ 2 ml Inj', '200 mg', 'Injeksi', '12100'),
(342, 'Extrace 500 mg / 5 ml inj', '500 mg', 'Injeksi', '22000'),
(343, 'Eye vit tab', '-', 'Tablet', '4950'),
(344, 'Ezelin Insulin Glargine 100 IU/ML', '-', 'Flexpen', '84999.2'),
(345, 'Faktu Supp', '-', 'supp', '6836'),
(346, 'FARGOXIN 2 ML INJ', '0.5 mg/2 ml', 'Injeksi', '38500'),
(347, 'FARMABES INJ', '50 mg', 'Injeksi', '56628'),
(348, 'Farneltik tab', '-', 'Tablet', '16500'),
(349, 'FARSORBID 5 MG TAB', '5 mg', 'Tablet', '223'),
(350, 'FARSORBID INJ', '1 mg/ml', 'Injeksi', '38500'),
(351, 'FARTISON 100 MG INJ', '100 mg', 'Injeksi', '104500'),
(352, 'Favipiravir 200 mg tab (Bantuan)', '200 mg', 'Tablet', '18260'),
(353, 'Feburic 80 mg tab', '80 mg', 'Tablet', '27500'),
(354, 'Fendex 25 mg tab', '25 mg', 'Tablet', '6050'),
(355, 'Fenofibrate 100 mg caps', '100 mg', 'Kapsul', '2420'),
(356, 'Fenofibrate 300 mg tab', '300 mg', 'Tablet', '1445.99'),
(357, 'FENTANYL INJ 2ML/AMPUL', '0.05 mg/ml', 'Injeksi', '44390.94'),
(358, 'FERRIPROX 100 MG/ML 250 ML SYR', '250 ml', 'Syrup', '1680000'),
(359, 'FERRIPROX FCT 500 MG', '500 mg', 'Tablet', '33000'),
(360, 'Ferriz Drop', '-', 'Syrup', '39999.3'),
(361, 'Ferriz syrup', '-', 'Syrup', '33000'),
(362, 'FETIK SUPPOSITORIA 100 MG', '100 mg', 'Supp', '10500'),
(363, 'FG Throces tab', '2.5 mg-1.5 mg', 'Tablet', '1045'),
(364, 'FIBRION 1,5 IU INJ', '5 iu ', 'Injeksi', '4180000'),
(365, 'Fibumin 500 mg tab', '500 mg', 'Salep Kulit', '5500'),
(366, 'FITBON KAP', '-', 'Kapsul', '2300'),
(367, 'FLAGYL SUPP 500 Mg', '500 mg', 'Supp', '19379'),
(368, 'FLAMICORT 10 MG/ML INJ', '10 mg/ml', 'Injeksi', '95700'),
(369, 'Flamicort 40 mg/ml inj IM', '40 mg/ml', 'Injeksi', '95700'),
(370, 'Flamicort IA/ID 10mg/5ml', '10 mg', 'Injeksi', '137500'),
(371, 'FLEET ENEMA', '-', 'Supp', '46881'),
(372, 'FLEET PHOSPHOSODA', '-', 'Supp', '38500'),
(373, 'FLIXOTIDE NEB. INJ', '0.5 mg/2 ml', 'Injeksi', '19140'),
(374, 'FLUCONAZOLE 150 MG TAB', '150 mg', 'Tablet', '21527.99'),
(375, 'FLUCONAZOLE INF', '200 mg', 'Infus', '20500'),
(376, 'Fludara 10 mg tab', '10 mg', 'Tablet', '332999.7'),
(377, 'FLUIMUCIL 200MG CAP', '200 mg', 'Kapsul', '6032'),
(378, 'Folavit 400 mcg tab', '400 mcg', 'Tablet', '1199.99'),
(379, 'FOLAVIT TAB 400 mcg', '400 mcg', 'Tablet', '1199.99'),
(380, 'FOLIC ACID 1 MG TAB', '1 mg', 'Tablet', '173'),
(381, 'Foncogem 1000 mg inj', '1000 mg', 'Injeksi', '699999'),
(382, 'Fonkopac 100 mg inj', '100 mg', 'Injeksi', '260000.4'),
(383, 'Fonkopac 30 mg inj', '30 mg', 'Injeksi', '130499.6'),
(384, 'Fontrexed 500 mg LYO Inj', '500 mg', 'Injeksi', '2615000'),
(385, 'Formyco 200 mg tab', '200 mg', 'Tablet', '5610'),
(386, 'Formyco krim', '2%', 'Salep Kulit', '19800'),
(387, 'FORNEURO TAB', '-', 'Tablet', '5867'),
(388, 'FORTANEST 15 MG/3 ML INJ', '15 mg/3 ml', 'Syrup', '9801'),
(389, 'FORUMEN TT', '5 mg', 'Tetes Telinga', '28105'),
(390, 'Fraizeron LYVI 150 mg inj', '150 mg', 'Injeksi', '2973749.9'),
(391, 'Frego 10 mg tab', '10 mg', 'Tablet', '8140'),
(392, 'FREGO 5 MG TAB', '5 mg', 'Tablet', '6600'),
(393, 'FRESOFOL 1% MCT/LCT INJ', '1%', 'Injeksi', '11308'),
(394, 'Furamin 2.5 mg  inj', '2.5 mg', 'Injeksi', '16999.84'),
(395, 'FUROSEMID 10 MG INJ', '10 mg', 'Injeksi', '2058.33'),
(396, 'FUROSEMID 40 MG TAB', '40 mg', 'Tablet', '130'),
(397, 'FUSON CREAM', '2%', 'Salep Kulit', '48510'),
(398, 'FUSYCOM CREAM 5 GR', '2%', 'Salep Kulit', '10000'),
(399, 'FUTROLIT INF', '-', 'Infus', '45289.2'),
(400, 'GABAPENTIN 300 TAB', '300 mg', 'Tablet', '4851'),
(401, 'Gabaxa inf', '-', 'Injeksi', '220000'),
(402, 'Galvus 50 mg tab', '50 mg', 'Tablet', '1647'),
(403, 'GAMARAAS INJ', '2.5 g', 'Injeksi', '3407800'),
(404, 'Garam Inggris', '-', 'Serbuk', '4400'),
(405, 'GELAFUSAL 500 ML INF', '500 ml', 'Infus', '176000'),
(406, 'GELOFUSIN INF', '-', 'Infus', '195499.7'),
(407, 'Gemcikal 1000 mg inj', '1000 mg', 'Injeksi', '899999'),
(408, 'Gemcikal 200 mg inj', '200 mg', 'Injeksi', '145000'),
(409, 'GEMFIBROZIL 300 MG TAB', '300 mg', 'Kapsul', '429'),
(410, 'Gemfibrozil 600 mg tab', '600 mg', 'Tablet', '913'),
(411, 'Genisone 20 mg tab', '20 mg', 'Tablet', '6150'),
(412, 'Genoint 0.3 % salep mata', '0.3%', 'Salep Mata', '8580'),
(413, 'GENOINT 0.3% TM', '0.3%', 'Tetes Mata', '10065'),
(414, 'GENOINT SALEP KULIT', '0.1%', 'Salep Kulit', '3659'),
(415, 'GENOINT SM', '0.3%', 'Salep Mata', '8580'),
(416, 'GENTAMICIN INJ 80', '80 mg', 'Injeksi', '6497.04'),
(417, 'GENTAMYCIN 0,1 % 5 GR OINT', '0.1%', 'Salep Kulit', '2385.72'),
(418, 'Giotrif 20 mg tab', '20 mg', 'Tablet', '280000'),
(419, 'Giotrif 30 mg tab', '30 mg', 'Tablet', '280000'),
(420, 'Giotrif 40 mg tab', '40 mg', 'Tablet', '280000'),
(421, 'Gitas inj', '10 mg', 'Injeksi', '28297.5'),
(422, 'GLAUSETA TAB', '250 mg', 'Tablet', '4625.5'),
(423, 'GLIBENKLAMIDE 5 MG TAB', '5 mg', 'Tablet', '152.74'),
(424, 'GLICAB 80 MG TAB', '80 mg', 'Tablet', '2999.99'),
(425, 'Gliclazide 80 mg tab', '80 mg', 'Tablet', '3000'),
(426, 'GLIMEPIRIDE TAB 1 MG', '1 mg', 'Tablet', '180'),
(427, 'GLIMEPIRIDE TAB 2 MG', '2 mg', 'Tablet', '207'),
(428, 'GLIMEPIRIDE TAB 3 MG', '3 mg', 'Tablet', '250'),
(429, 'GLIQUIDONE 30 MG TAB', '30 mg', 'Tablet', '1209'),
(430, 'GLIVEC FCT 100 MG TAB', '100 mg', 'Tablet', '35166.67'),
(431, 'Glucophage 500 mg tab', '500 mg', 'Tablet', '1873.94'),
(432, 'Glucophage XR 500 mg tab', '500 mg', 'Tablet', '2999.99'),
(433, 'GLUCOSAMINE 500 MG TAB', '500 mg', 'Tablet', '1595'),
(434, 'Glycophos 20 ml inj', '-', 'Injeksi', '132000'),
(435, 'Goldtrion tab', '-', 'Tablet', '8800'),
(436, 'Granitron 3mg/3ml Inj', '3 mg/3 ml', 'Injeksi', '110000'),
(437, 'Granon 1 mg/ml inj', '1 mg/ml', 'Injeksi', '60500'),
(438, 'HAEMOCTIN 1.000 IU INJ', '1000 iu', 'Injeksi', '3948269.6'),
(439, 'Haemoctin 250 iu inj', '250 iu', 'Injeksi', '1013744.6'),
(440, 'HAEMOCTIN 500 IU INJ', '500 iu', 'Injeksi', '2027490'),
(441, 'HALOPERIDOL 0,5 MG TAB', '0.5 mg', 'Tablet', '77'),
(442, 'HALOPERIDOL 1,5 MG TAB', '5 mg', 'Tablet', '103.11'),
(443, 'HALOPERIDOL 5 MG TAB', '5 mg', 'Tablet', '103.11'),
(444, 'HARNAL 0,2 MG KAP', '2 mg', 'Tablet', '7788'),
(445, 'Harnal D 0,2 mg tab', '0.2 mg', 'Tablet', '6281'),
(446, 'HARNAL OCAS 0,4MG TAB', '0.4 mg', 'Tablet', '6281'),
(447, 'HB-VIT CAP', '-', 'Kapsul', '2145'),
(448, 'HCT 25 MG TAB', '25 mg', 'Tablet', '178'),
(449, 'HEMAPO INJ 3000 IU/ML', '3000 iu/ml', 'Injeksi', '139950'),
(450, 'HEPA - MERZ INJ', '-', 'Injeksi', '121000'),
(451, 'Hepabal tab', '-', 'Tablet', '9090'),
(452, 'HEPA-BALANCE TAB', '-', 'Tablet', '13750'),
(453, 'Hepamax kapsul', '-', 'Kapsul', '10083.33'),
(454, 'HEPA-Q TAB', '-', 'Tablet', '4950'),
(455, 'HERBESER CD 100MG TAB', '100 mg', 'Tablet', '4460.01'),
(456, 'HERBESER CD 200MG TAB', '200 mg', 'Tablet', '4835'),
(457, 'HERBESSER INJ 50 MG', '50 mg', 'Injeksi', '154399.96'),
(458, 'Herzemab 440 mg Inj', '440 mg', 'Injeksi', '8929800'),
(459, 'Hexilon 125 mg Inj', '125 mg', 'Injeksi', '96800'),
(460, 'HEXYMER 2 MG TAB', '2 mg', 'Tablet', '1500'),
(461, 'HI - BONE TAB', '1000 iu', 'Tablet', '2860'),
(462, 'Hi-D 1000 tab', '1000 iu', 'Tablet', '2860'),
(463, 'Hi-D 5000 tab', '5000 iu', 'Tablet', '3630'),
(464, 'Hiviral tab (Lamivudine)', '100 mg', 'Tablet', '0'),
(465, 'Holoxan 1 gram inj', '1 g', 'Injeksi', '1470040'),
(466, 'Holoxan 2 gram inj', '2 g', 'Injeksi', '2091480'),
(467, 'Holoxan 500 mg inj', '500 mg', 'Injeksi', '851250'),
(468, 'HP PRO TAB', '-', 'Kapsul', '6083.33'),
(469, 'Human Albumin 20 % 100 ml Biotest', '20%', 'Infus', '858000'),
(470, 'HYDROCORTISON CR 1 % 5 GR', '1%', 'Salep Kulit', '4400'),
(471, 'HYDROCORTISON CR 2,5% 5 GR', '2.5%', 'Salep Kulit', '5500'),
(472, 'Hydromal Inf', '-', 'Injeksi', '55602.8'),
(473, 'Hydroxychloroquine 200 mg tab', '200 mg', 'Tablet', '2186.8'),
(474, 'HYDROXYUREA KAPS', '500 mg', 'Kapsul', '3950'),
(475, 'Hyloquin 200 mg tab', '200 mg', 'Tablet', '18150'),
(476, 'HYPOBHAC 200 MG INJ', '200 mg', 'Injeksi', '256996'),
(477, 'HYTROZ 2 MG TAB', '2 mg', 'Tablet', '1425'),
(478, 'IBUPROFEN 100 MG SYR', '100 mg', 'Syrup', '4195'),
(479, 'IBUPROFEN 400 MG TAB', '400 mg', 'Tablet', '385'),
(480, 'Icunes 2 ml inj', '118.3/ml', 'Injeksi', '374000'),
(481, 'ILLIADIN SPRAY DEWASA 0.05%', '0.05%', 'Nasal Spray', '39468'),
(482, 'ILLIADIN TETES ANAK 0.025%', '0.25', 'Nasal Spray', '35999.7'),
(483, 'IM Boost Force kaplet', '-', 'Tablet', '6453.26'),
(484, 'Imodium tab', '2 mg', 'Tablet', '7295.66'),
(485, 'IMUNOS SYR', '-', 'Syrup', '86000.2'),
(486, 'Imuran 50 mg tab', '50 mg', 'Tablet', '7489.9'),
(487, 'INTERHISTIN 50 MG TAB', '50 mg', 'Tablet', '913'),
(488, 'Interlac Drop', '-', 'Syrup', '280500'),
(489, 'Intratect 5% 50 ml Inf', '2.5 g', 'Infus', '2143963.8'),
(490, 'INVICLOT INJ', '5000 iu', 'Injeksi', '43994.5'),
(491, 'INVITEC TAB', '4 mg', 'Tablet', '12466.63'),
(492, 'Invomit 8 mg inj', '8 mg', 'Injeksi', '84700'),
(493, 'Iopamiro  370/100ml', '370 mg', 'Injeksi', '669075'),
(494, 'Iopamiro 300 /30 ml', '300 mg', 'Infus', '204600'),
(495, 'Iopamiro 300 /50 ml', '300 mg', 'Infus', '299200'),
(496, 'Iopamiro 370 /30 ml', '370 mg', 'Infus', '251570'),
(497, 'Iopamiro 370 /50 ml', '370 mg', 'Infus', '358600'),
(498, 'IOPAMIRO 370/CC', '370 mg', 'Injeksi', '669075'),
(499, 'IRBESARTAN 150 MG TAB', '150 mg', 'Tablet', '1963.5'),
(500, 'IRBESARTAN 300 MG TAB', '300 mg', 'Tablet', '760'),
(501, 'Iressa 250 mg tab', '250 mg', 'Tablet', '294954'),
(502, 'Isoniazide 100 mg tab', '100 mg', 'Tablet', '179.74'),
(503, 'Isoniazide 300 mg tab', '300 mg', 'Tablet', '262.31'),
(504, 'Isosorbide Dinitrade 1 mg Inj', '1 mg/ml', 'Injeksi', '35000'),
(505, 'Isosorbide Dinitrat 5 mg tab', '5 mg', 'Tablet', '123.02'),
(506, 'ISOTIC ADRETOR 0,25% TM', '0.25', 'Tetes Mata', '12405'),
(507, 'ISOTIC ADRETOR 0,50% TM', '0.5%', 'Tetes Mata', '12405'),
(508, 'Isprinol 500 mg tab', '500 mg', 'Tablet', '10312.5'),
(509, 'Kabipem 500 mg inj', '500 mg', 'Injeksi', '2299000'),
(510, 'Kabitarin 1 g inj', '1 g', 'Injeksi', '570350'),
(511, 'Kabiven infus', '-', 'Injeksi', '363330'),
(512, 'KAEN 3 B infus', '-', 'Infus', '15660.7'),
(513, 'KAEN MG.3 INFUS', '-', 'Infus', '85450.2'),
(514, 'Kalbamin Inf', '-', 'Infus', '85450'),
(515, 'KALITAKE 5 Gr', '5 gr', 'Serbuk', '17325'),
(516, 'KALIUM DIKLOFENAK 50 MG TAB', '50 mg', 'Tablet', '778.82'),
(517, 'KALNEX TAB. 500 MG', '500 mg', 'Tablet', '3520'),
(518, 'KALTROFEN SUPP', '100 mg', 'Supp', '12650'),
(519, 'KALXETIN 10 MG TAB', '10 mg', 'Tablet', '4400'),
(520, 'KALXETIN 20 MG TAB', '20 mg', 'Tablet', '7333.33'),
(521, 'KCL INJ', '-', 'Injeksi', '32235.83'),
(522, 'KDN 1 Wida inf', '-', 'Infus', '14850'),
(523, 'KDN 2 Wida inf', '-', 'Infus', '14850'),
(524, 'KENDARON TAB.', '4 mg', 'Tablet', '1026.67'),
(525, 'Keppra 500 mg tab', '500 mg', 'Tablet', '4935'),
(526, 'KETAMIN HAMELN INJ / MG', '100 mg', 'Injeksi', '112735.7'),
(527, 'Ketokonazol 10 gr Cream/tube', '2%', 'Salep Kulit', '4675'),
(528, 'Ketokonazol 2% Crem 20 g', '2%', 'Salep Kulit', '4675'),
(529, 'KETOKONAZOL 200 MG', '200 mg', 'Tablet', '450.98'),
(530, 'KETOKONAZOL CR', '2%', 'Salep Kulit', '4675'),
(531, 'Ketomed cream 15 gr', '2%', 'Salep Kulit', '55500'),
(532, 'Ketopain 30 mg injeksi', '30 mg', 'Injeksi', '38500'),
(533, 'KETOPROFEN 100 MG TAB', '100 mg', 'Tablet', '1620'),
(534, 'Ketorolac 10 mg Inj ', '10 mg', 'Injeksi', '5000'),
(535, 'KETOROLAC 10MG TAB', '10 mg', 'Injeksi', '5000'),
(536, 'KETOROLAC INJ 30 MG', '30 mg', 'Injeksi', '1100'),
(537, 'Ketosteril tab', '-', 'Tablet', '7900'),
(538, 'Ketricin Orabase 0,1% 5 gr', '0.1%', 'Salep Kulit', '49500'),
(539, 'Kifovir 300 mg tab', '300 mg', 'Tablet', '12833.33'),
(540, 'Kloderma 10 gr cream', '0.05%', 'Salep Kulit', '34787.5'),
(541, 'KN 1 Wida inf', '-', 'Infus', '14300'),
(542, 'KN 2 Wida inf', '-', 'Infus', '15730'),
(543, 'KOATE 600 UI INJ', '600 ui', 'Injeksi', '1900000'),
(544, 'KOATE INJ 1000 IU', '1000 iu', 'Injeksi', '3700000'),
(545, 'KOATE INJ 260 UI', '260 ui', 'Injeksi', '1289999'),
(546, 'KSR TAB', '600 mg', 'Tablet', '1841.99'),
(547, 'KUTOIN CAP', '50 mg/ml', 'Kapsul', '1265'),
(548, 'L - BIO SAC', '-', 'Serbuk', '4636'),
(549, 'LACBON SAC', '-', 'Serbuk', '3630'),
(550, 'Lactamam kapsul', '-', 'Kapsul', '3300'),
(551, 'LACTO - B SAC', '-', 'Serbuk', '6490'),
(552, 'LAKTULOSA 60 ML SYR', '3.335 mg/5 ml', 'Syrup', '15060.1'),
(553, 'LAMESON 4 MG TAB', '4 mg', 'Tablet', '3740'),
(554, 'Lameson 8 tab', '8 mg', 'Tablet', '6050'),
(555, 'LANCID TAB', '30 mg', 'Tablet', '16225'),
(556, 'Lansoprazole 30 mg caps', '30 mg', 'Kapsul', '1100'),
(557, 'Lansoprazole Inj', '30 mg', 'Injeksi', '99000'),
(558, 'Lantus Flexpen inj', '-', 'Flexpen', '83950.02'),
(559, 'LAPIBAL INJ', '500 mg', 'Injeksi', '27500'),
(560, 'LAPIBAL KAPSUL 250 MG', '250 mg', 'Kapsul', '2475'),
(561, 'LAPIBAL KAPSUL 500 MG', '500 mg', 'Kapsul', '2475'),
(562, 'LAPRAZ 30 MG KAPS', '30 mg', 'Kapsul', '19000'),
(563, 'Latanoprost 2.5 ml E.D', '0.005%', 'Tetes Mata', '110000'),
(564, 'Latropil 500 mg/5 ml syr', '500 mg/5 ml', 'Syrup', '35200'),
(565, 'LAXADIN SYR 60 ML', '5 mg/5 ml', 'Syrup', '12449.8'),
(566, 'LAXADINE SYR 110 ML', '-', 'Syrup', '44000'),
(567, 'L-CISIN TAB 0,5 MG', '0.5 mg', 'Tablet', '4400'),
(568, 'LEPARSON TABLET', '25 mg-100 mg', 'Tablet', '4383.23'),
(569, 'Lesichol 100 capsul', '100 mg', 'Kapsul', '6930'),
(570, 'Lesichol 300 mg capsul', '300 mg', 'Kapsul', '11550'),
(571, 'Lesichol 600 mg tab', '600 mg', 'Kapsul', '24999.99'),
(572, 'Leucogen Inj', '300 mcg', 'Injeksi', '324995'),
(573, 'Leunase Inj', '10,000 iu', 'Injeksi', '1221999.9'),
(574, 'LEVEMIR FLEXPEN', '-', 'Flexpen', '87020'),
(575, 'LEVOCIN ED', '0.10%', 'Tetes Mata', '19819.8'),
(576, 'LEVOFLOXACIN 500 INF', '500 mg', 'Infus', '57000'),
(577, 'LEVOFLOXACIN TAB', '500 mg', 'Tablet', '1327'),
(578, 'Levopront Syr 120/ml', '-', 'Syrup', '85499.7'),
(579, 'Lezra 2.5 mg tab', '2.5 mg', 'Tablet', '3899.13'),
(580, 'LIDOCAIN 2% INJ', '2%', 'Injeksi', '1500'),
(581, 'Lipantyl 200 cap', '200 mg', 'Kapsul', '16487.69'),
(582, 'LISINOPRIL 10 MG TAB', '10 mg', 'Tablet', '660'),
(583, 'LISINOPRIL 5 MG TAB', '5 mg', 'Tablet', '409.99'),
(584, 'Livamin 500 ml Infus', '-', 'Infus', '227865'),
(585, 'Liver Prime caps', '-', 'Kapsul', '7663'),
(586, 'Livron B Plex tab', '-', 'Tablet', '280.5'),
(587, 'Lodia tab', '2 mg', 'Tablet', '1100'),
(588, 'Longatin 50 mg kapsul', '50 mg', 'Kapsul', '5750'),
(589, 'Lonide tab', '40 mg', 'Tablet', '8636'),
(590, 'Lopivia 200/50 mg tab', '200 mg/50 mg', 'Tablet', '8250'),
(591, 'LORATADIN 10 MG', '10 mg', 'Tablet', '333.08'),
(592, 'Lorazepam 2 mg tab', '2 mg', 'Tablet', '995.01'),
(593, 'LOVENOX INJ 40 MG', '40 mg', 'Injeksi', '90703.8'),
(594, 'LOVENOX INJ 60 MG', '60 mg', 'Injeksi', '125384.05'),
(595, 'Mabthera 100 mg inj', '100 mg', 'Injeksi', '1529000'),
(596, 'Mabthera 500 mg inj', '500 mg', 'Injeksi', '7645000'),
(597, 'Maltofer Chewable tab', '-', 'Tablet', '3700'),
(598, 'MANITOL 20% 500 ML', '500 ml', 'Infus', '43499.5'),
(599, 'Marimer nasal spray', '-', 'Nasal Spray', '122727'),
(600, 'MARTOS INFUS', '-', 'Infus', '145000'),
(601, 'Mebo Oint', '-', 'Salep Kulit', '87450'),
(602, 'MECOBALAMIN CAPS 500', '500 mg', 'Tablet', '880'),
(603, 'MECOBALAMIN INJ', '500 mg', 'Injeksi', '9680'),
(604, 'Medixon 8 mg tab', '8 mg', 'Tablet', '4500'),
(605, 'MEFINAL 500 MG TAB', '500 mg', 'Tablet', '1468.5'),
(606, 'Meiact 200 mg tab', '200 mg', 'Tablet', '33000'),
(607, 'MELOXICAM 15 MG TAB', '15 mg', 'Tablet', '1410'),
(608, 'MELOXICAM 7,5 MG TAB', '5 mg', 'Tablet', '450'),
(609, 'Mercaptopurine 50 mg tab', '50 mg', 'Tablet', '10500'),
(610, 'MERLOPAM 2 MG TAB', '2 mg', 'Tablet', '3300'),
(611, 'Merofen inj 1 g inj', '1 g', 'Injeksi', '539000'),
(612, 'MEROPENEM 0,5 G INJ', '0.5 g', 'Injeksi', '90000'),
(613, 'MEROPENEM 1 G INJ', '3 g', 'Injeksi', '110000'),
(614, 'Meropenem 500 mg inj', '500 mg', 'Injeksi', '30000'),
(615, 'MERTIGO TAB', '6 mg', 'Tablet', '3740'),
(616, 'Mertigo SR tab', '12 mg', 'Tablet', '6050'),
(617, 'MESTINON TAB', '60 mg', 'Tablet', '7513'),
(618, 'METACOSFAR 100 ML INJ', '320 mgl/ml', 'Injeksi', '880000'),
(619, 'METACOSFAR 50 ML INJ', '320 mgl/ml', 'Injeksi', '440000'),
(620, 'METFORMIN 500 MG TAB', '500 mg', 'Tablet', '217.8'),
(621, 'METFORMIN 850 MG TAB', '850 mg', 'Tablet', '363'),
(622, 'Methotrexate 50 mg inj', '50 mg', 'Injeksi', '41079.5'),
(623, 'Methycobalt 500 kapsul', '500 mg', 'Kapsul', '4055.84'),
(624, 'METHYL COBAL 500 MG INJ', '500 mg', 'Injeksi', '33830.94'),
(625, 'METHYL PREDNISOLON 4 MG TAB.', '4 mg', 'Tablet', '525'),
(626, 'METHYL PREDNISOLON INJ 125 MG', '125 mg', 'Injeksi', '26000'),
(627, 'METHYL PREDNISOLONE 16 MG TAB.', '16 mg', 'Tablet', '1138.5'),
(628, 'METHYLERGOMETRIN INJ', '2 mg/ml', 'Injeksi', '3500'),
(629, 'METOCLOPRAMIDE 10 MG TAB', '10 mg', 'Tablet', '143'),
(630, 'METRONIDAZOL 500 MG TAB', '500 mg', 'Tablet', '300'),
(631, 'METRONIDAZOL INFUS', '500 mg', 'Infus', '9000'),
(632, 'MEYLON INJ', '84 mg/ml', 'Infus', '9100.3'),
(633, 'MgSo4 20%  inj', '20%', 'Infus', '3327.5'),
(634, 'MgSo4 40 % inj', '40%', 'Infus', '3796.1'),
(635, 'Micardis 40 mg tab', '40 mg', 'Tablet', '3045.02'),
(636, 'MICARDIS 80 mg tab', '80 mg', 'Tablet', '6500.01'),
(637, 'MICONAZOLE CR', '2%', 'Salep Kulit', '4999.5'),
(638, 'Microlax 5 gr Enema', '-', 'Salep Kulit', '21000'),
(639, 'MILOS 5 ML INJ', '5 mg', 'Injeksi', '5671.6'),
(640, 'Miloz 5 mg inj', '5 mg', 'Injeksi', '5672'),
(641, 'MINIASPI 80 MG TAB', '80 mg', 'Tablet', '163'),
(642, 'Minirin  0.1 mg tab', '0.1 mg', 'Tablet', '14886'),
(643, 'Minirin 0.2 mg tab', '0.2 mg', 'Tablet', '25100'),
(644, 'MOFACORT CREAM 10 GR', '1%', 'Salep Kulit', '38390'),
(645, 'MOLOCO B12 TAB', '-', 'Tablet', '3520'),
(646, 'MOMETASONE FUROATE KRIM 5 GR', '0.10%', 'Salep Kulit', '13715'),
(647, 'Morfikaf 10 mg tab', '10 mg', 'Tablet', '4033.33'),
(648, 'MORPHIN HCL INJ', '10 mg', 'Injeksi', '34049.95'),
(649, 'Moxifloxacin Infus 400 mg/250ml', '400 mg', 'Infus', '220000'),
(650, 'MOXIFLOXACIN TAB', '400 mg', 'Injeksi', '41999.98'),
(651, 'Mozuku capsul', '-', 'Kapsul', '12999.8'),
(652, 'MST CONTINUS 10 MG TAB', '10 mg', 'Tablet', '15620'),
(653, 'MST Continus 15 mg tab', '15 mg', 'Tablet', '22990'),
(654, 'MST Continus 30 mg tab', '30 mg', 'Tablet', '41470'),
(655, 'Mucos drop', '15 mg/ml', 'Syrup', '47499'),
(656, 'MUCOSTA 100MG TAB', '100 mg', 'Tablet', '6500'),
(657, 'Multivitamin Sivit Zinc  tab', '-', 'Tablet', '0'),
(658, 'MYCAMINE inj', '50 mg', 'Injeksi', '720374'),
(659, 'Myfortic 180 mg caps', '180 mg', 'Kapsul', '8000'),
(660, 'Myfortic 360 caps', '360 mg', 'Kapsul', '16000.01'),
(661, 'Myonal tablet', '50 mg', 'Tablet', '7856.59'),
(662, 'Myores tab', '50 mg', 'Tablet', '4950'),
(663, 'NA DIKLOFENAC 50 MG TAB', '50 mg', 'Tablet', '300'),
(664, 'NaCl 0,9 % Infus Wida', '0.9%', 'Infus', '9515'),
(665, 'Nacl 100 ml B.Braun inf', '-', 'Infus', '9900'),
(666, 'NaCl 1000 ml B.Braun', '-', 'Infus', '19800'),
(667, 'NaCl 3% / SALIN 3 [Otsu] inf', '3%', 'Infus', '30334.7'),
(668, 'NAIRET INJ', '0.5 mg/ml', 'Injeksi', '26400'),
(669, 'Nasacort AQ Spray', '-', 'Nasal Spray', '112000'),
(670, 'Nasalyn spray', '-', 'Nasal Spray', '117999.2'),
(671, 'Nasea 0.3 mg injeksi', '0.3 mg', 'Injeksi', '331999.8'),
(672, 'Nateran 25 mg tab ', '25 mg', 'Tablet', '44000'),
(673, 'Natrium Bicarbonat tab', '500 mg', 'Tablet', '162.25'),
(674, 'Navelbine 10 mg inj', '10 mg', 'Injeksi', '641862.1'),
(675, 'Nefrofer inj', '20 mg/5 ml', 'Injeksi', '48400'),
(676, 'Neuciti 250 mg Inj', '250 mg', 'Injeksi', '41250'),
(677, 'Neurobion 5000 Dual inj', '-', 'Injeksi', '10300'),
(678, 'NEUROBION TAB.', '-', 'Tablet', '1768'),
(679, 'Neurocet 800 tablet', '800 mg', 'Tablet', '2035'),
(680, 'NEURODEX TAB', '-', 'Tablet', '605'),
(681, 'NEUROSANBE 5000 TAB', '-', 'Tablet', '2810.5'),
(682, 'NEUROSANBE TAB', '-', 'Tablet', '1314.5'),
(683, 'NEUROTAM SYRUP 100 ML', '500 mg/5 ml', 'Syrup', '82500'),
(684, 'Neviral tab (Nevirapine)', '200 mg', 'Tablet', '0'),
(685, 'NEW DIATAB TAB', '-', 'Tablet', '605'),
(686, 'NICARDIPINE INJ', '1 mg/ml', 'Injeksi', '24000.02'),
(687, 'NIFEDIPIN 10 MG TAB', '10 mg', 'Tablet', '163.19'),
(688, 'NIFLEC SERBUK', '-', 'Serbuk', '176000'),
(689, 'NIMOTOP INFUS 50 ML', '2%', 'Infus', '341199.1'),
(690, 'NIMOTOP TABLET', '30 mg', 'Tablet', '3841.99'),
(691, 'NITROKAF FORTE KAPS', '5 mg', 'Kapsul', '2761.99'),
(692, 'NITROKAF RETARD TAB', '2.5 mg', 'Kapsul', '1800.84'),
(693, 'Norages Syrup', '250 mg/5 ml ', 'Syrup', '34100'),
(694, 'NORELUT TAB', '5 mg', 'Tablet', '4730'),
(695, 'NOREPINEPHRINE BITARTRATE 4 MG INJ', '4mg', 'Injeksi', '66000'),
(696, 'Noros caplet', '-', 'Tablet', '2915'),
(697, 'NOVO RAPID FLEXPEN', '-', 'Flexpen', '87000'),
(698, 'NOVOMIX-30 FLEXPEN', '-', 'Flexpen', '110968'),
(699, 'Nutribreast kapsul', '-', 'Kapsul', '11999.97'),
(700, 'Nutriflam Neo tab', '-', 'Tablet', '14999.97'),
(701, 'Nutriflam tablet', '-', 'Tablet', '10581.45'),
(702, 'OBH SYR ( GENERIK)', '-', 'Syrup', '6600'),
(703, 'Octaflex 500 IU inf', '500 iu', 'Injeksi', '5445000'),
(704, 'Octagam 5% inf', '2.5 g', 'Infus', '2150000'),
(705, 'OCTALBIN 20 % 100 CC inf', '20%', 'Infus', '860000'),
(706, 'Octalbin 25% 100 ml inf', '25%', 'Infus', '1674999.7'),
(707, 'Octanine F 500 IU/ml inf', '500 iu', 'Injeksi', '4929980'),
(708, 'ODR 4 mg/5 ml Syrup', '4 mg/5 ml', 'Syrup', '150000'),
(709, 'Ofloxacin 200 mg tab', '200 mg', 'Tablet', '697.99'),
(710, 'OFLOXACIN 400 MG TAB', '400 mg', 'Tablet', '900'),
(711, 'Olanzapine 10 mg tab', '10 mg', 'Tablet', '4725'),
(712, 'OMEPRAZOLE 20 MG KAP', '20 mg', 'Kapsul', '528'),
(713, 'OMEPRAZOLE INJ', '20 mg', 'Injeksi', '42000'),
(714, 'OMNISCAN 287 MG/ML INJ', '287 mg/ml', 'Infus', '368500'),
(715, 'ONDANSETRON 4 MG TAB', '4 mg', 'Tablet', '1700'),
(716, 'ONDANSETRON 4MG/2ML INJ', '4 mg/2 ml', 'Injeksi', '5445'),
(717, 'ONDANSETRON 8 MG/4 ML INJ', '4 ml', 'Injeksi', '8712'),
(718, 'ONDANSETRON 8 MG TAB', '8 mg', 'Tablet', '1700'),
(719, 'ORALIT SAC', '-', 'Serbuk', '608'),
(720, 'Orinox 90 mg tab', '90 mg', 'Tablet', '11000'),
(721, 'Oscal 0.5 mg kapsul', '0.5 mg', 'Kapsul', '9817.5'),
(722, 'Oseltamivir 75 mg tab', '75 mg', 'Tablet', '16500'),
(723, 'Osteonate OAW tab', '5 mg', 'Tablet', '52500'),
(724, 'Ostriol 0.25 mg caps', '0.25 mg', 'Kapsul', '1705'),
(725, 'OTOPAIN TETES TELINGA', '-', 'Tetes Telinga', '67100'),
(726, 'Oxaliplatin 100 mg inj', '100 mg', 'Injeksi', '533550'),
(727, 'Oxaliplatin 50 mg inj', '50 mg', 'Injeksi', '266775.3'),
(728, 'Oxoferin Sol.', '-', 'Larutan', '77000'),
(729, 'OXYTOCIN INJ', '10 iu', 'Injeksi', '2750'),
(730, 'Paclitaxel 100 mg inj', '100 mg', 'Injeksi', '260001.5'),
(731, 'Paclitaxel 30 mg inj', '30 mg', 'Injeksi', '130500'),
(732, 'Palofer Inj', '0.05/ml', 'Injeksi', '165000'),
(733, 'Pantomex inj', '40 mg', 'Injeksi', '159500'),
(734, 'PANTOPRAZOLE INJEKSI', '40 mg', 'Injeksi', '40700'),
(735, 'PARACETAMOL DROP', '120 mg/5 ml', 'Syrup', '7700'),
(736, 'PARACETAMOL INFUS', '1 g', 'Infus', '25000'),
(737, 'PARACETAMOL SYR', '120 mg/ 5 ml', 'Syrup', '3493.33'),
(738, 'PARACETAMOL TAB', '500 mg', 'Tablet', '170.5'),
(739, 'PARATUSIN TAB', '-', 'Tablet', '576.92'),
(740, 'Pariet  20  mg tab', '20 mg', 'Tablet', '26199.96'),
(741, 'Pariet 10 mg tab', '10 mg', 'Tablet', '18561.48'),
(742, 'PEHACAIN INJ', '2 mg', 'Injeksi', '3113.06'),
(743, 'Peinlos 400 Inj', '400 mg', 'Injeksi', '55000'),
(744, 'Pepsol 20 mg tab', '20 mg', 'Tablet', '17999.3'),
(745, 'Pepzol 40 mg tab', '40 mg', 'Tablet', '23499.96'),
(746, 'Pepzol Inj', '40 mg', 'Injeksi', '154000'),
(747, 'Pervita Tablet', '-', 'Tablet', '1447'),
(748, 'Pharolit Sitras', '-', 'Syrup', '1357'),
(749, 'PHENOBARBITAL 30 MG TAB', '30 mg', 'Tablet', '240'),
(750, 'PHENYTOIN CAP', '50 mg/ml', 'Kapsul', '634'),
(751, 'PHENYTOIN INJ', '50 mg/ml', 'Injeksi', '4121.04'),
(752, 'PICYN INJ 750 MG', '750 mg', 'Injeksi', '63250'),
(753, 'PIOGLITAZONE 30MG TAB', '30 mg', 'Tablet', '4675'),
(754, 'Piracetam 800 mg tab', '800 mg', 'Tablet', '836'),
(755, 'PIRACETAM INJ 3 GR', '3 g', 'Injeksi', '11000'),
(756, 'PIROTOP CREAM 2% 5 GR', '2%', 'Salep Kulit', '65650'),
(757, 'PLASBUMIN 20% 100 ml', '20%', 'Infus', '858000'),
(758, 'PLASBUMIN 25 % 100 ML', '25%', 'Infus', '1509999'),
(759, 'PLASMINEX 500 INJ', '500 mg', 'Injeksi', '13668'),
(760, 'PLASMINEX 500 TAB', '500 mg', 'Tablet', '2904'),
(761, 'PLAVIX TAB', '75 mg', 'Tablet', '33999.98'),
(762, 'PLETAAL 100 MG TAB', '100 mg', 'Tablet ', '5800.3'),
(763, 'PLETAAL 50 MG TAB', '50 mg', 'Tablet', '9335'),
(764, 'Pletaal SR 100 mg tab', '100 mg', 'Tablet', '5800.3'),
(765, 'Polyren  Sachet  5 g', '-', 'Serbuk', '14300'),
(766, 'PONDEX SYRUP 60 ML', '250 mg/5 ml ', 'Syrup', '11275'),
(767, 'PRADAXA 110 MG TAB', '110 mg', 'Tablet', '35950.02'),
(768, 'PRADAXA 75 MG CAP', '75 mg ', 'Tablet', '14799.95'),
(769, 'PREDNISON 5 MG TAB', '5 mg', 'Tablet', '181.5'),
(770, 'Pregabalin 75 mg kapsul', '75 mg', 'Kapsul', '7865'),
(771, 'Primet 25 mg tab', '25 mg', 'Tablet', '2200'),
(772, 'PRIMOLUT N 5 MG TAB', '5 mg', 'Tablet', '5320'),
(773, 'PRO TB 2 KID tab', '150 mg-150 mg', 'Tablet', '3300'),
(774, 'PRO TB 2 TSS  tab', '150 mg-150 mg', 'Tablet', '7246.25'),
(775, 'Pro TB 3 Kid tab', '-', 'Tablet', '4675'),
(776, 'PRO TB 4 TSS tab', '-', 'Tablet', '5426.65'),
(777, 'Probiostim tab', '-', 'Tablet', '14000'),
(778, 'Prograf 1 mg caps', '1 mg', 'Kapsul', '28380'),
(779, 'Prohiper 10 mg tab', '10 mg', 'Tablet', '5500'),
(780, 'Prolepsi tab', '300 mg', 'Tablet', '7524'),
(781, 'Promuba syr', '125 mg/5 ml', 'Syrup', '42900'),
(782, 'PROPANOLOL 10 MG TAB', '10 mg', 'Tablet', '97.41'),
(783, 'PROPANOLOL 40 MG TAB', '40 mg', 'Tablet', '299.92'),
(784, 'PRORENAL TAB.', '-', 'Tablet', '6600'),
(785, 'PROSOGAN 30 MG INJ', '30 mg', 'Injeksi', '92500'),
(786, 'Protofen Supp 100 mg', '100 mg', 'Supp', '9137'),
(787, 'Prove D3 1000 IU tab', '1000 iu', 'Tablet', '2420'),
(788, 'PTU TAB', '100 mg', 'Tablet', '546.02'),
(789, 'PULMICORT RESPULES 0.5 MG', '5 mg', 'Respules', '17847.06'),
(790, 'PUMPISEL INJ', '40 mg', 'Injeksi', '162855'),
(791, 'PUMPITOR INJ', '40 mg', 'Injeksi', '165000'),
(792, 'PYRAZINAMID 500 MG TAB', '500 mg', 'Tablet', '500'),
(793, 'Quatro tab', '400 mcg', 'Tablet', '3850'),
(794, 'Ramipril 2,5 mg tab', '2.5 mg', 'Tablet', '352'),
(795, 'RAMIPRIL 5 MG TAB', '5 mg', 'Tablet', '635.8'),
(796, 'RANITIDIN 150 MG TAB', '150 mg', 'Tablet', '302.5'),
(797, 'RANITIDIN INJ', '25 mg/ml', 'Injeksi', '3201.67'),
(798, 'Rebozet FCT 25 mg tab', '25 mg', 'Tablet', '113234.88'),
(799, 'Rebozet FCT 50 mg tab', '50 mg', 'Tablet', '226471'),
(800, 'Recormon PFS 2000 IU inj', '2000 iu', 'Injeksi', '128500'),
(801, 'Redoxon tab', '-', 'Tablet', '44495'),
(802, 'REGIVELL 4 ML INJ', '4 ml', 'Injeksi', '60500'),
(803, 'Remdesevir Inj', '100 mg', 'Injeksi', '0'),
(804, 'Remikaf 2 mg inj', '2 mg', 'Injeksi', '127600'),
(805, 'Renogen 3000 IU inj', '3000 iu', 'Injeksi', '99000'),
(806, 'Renvela tab', '800 mg', 'Tablet', '29090'),
(807, 'Renxamin 200 ml inf', '-', 'Infus', '106150'),
(808, 'Resfar 25 ml injeksi', '200 mg/ml', 'Injeksi', '218900'),
(809, 'RETAPYL SR TAB.', '300 mg', 'Tablet', '1475'),
(810, 'Reviral tab (Zidovudin)', '300 mg', 'Tablet', '0'),
(811, 'Rexta 50 mg inj', '50 mg', 'Injeksi', '250000'),
(812, 'Rheu-Trex tab', '2.5 mg', 'Tablet', '3100'),
(813, 'RHINOFED TAB', '-', 'Tablet', '2300'),
(814, 'Rhinofed syr', '15 mg/5 ml', 'Syrup', '27500'),
(815, 'Rhinos SR tab', '-', 'Tablet', '6050'),
(816, 'Rhodium tab', '450 mg', 'Tablet', '6050'),
(817, 'RIBACTER 500 mg INJ', '500 mg', 'Injeksi', '529666'),
(818, 'RIFAMPICIN 300 MG TAB', '300 mg', 'Tablet', '1402.5'),
(819, 'RIFAMPICIN 450 MG TAB', '450 mg', 'Tablet', '1815'),
(820, 'RIFAMPICIN 600 MG TAB', '600 mg', 'Tablet', '2585'),
(821, 'RIFAMTIBI 450 MG TAB', '450 mg', 'Tablet', '1815'),
(822, 'Rimactazid 450/300 mg tab', '450 mg-300 mg', 'Tablet', '8514'),
(823, 'RINDONEM 1 G INJ', '1 g', 'Infus', '7630.1'),
(824, 'Ringer Dekstrose Inf', '-', 'Infus', '12012'),
(825, 'Ringer Laktat inf B.Barun', '-', 'Infus', '8800'),
(826, 'RINOFER INJ', '20 mg/ml', 'Injeksi', '88000'),
(827, 'Risperidone 2 mg tab', '2 mg', 'Tablet', '347'),
(828, 'Rituxikal 500 mg inj', '500 mg', 'Injeksi', '7128000'),
(829, 'RL INF', '-', 'Infus', '7630'),
(830, 'Roculax inj', '10 mg/ml', 'Injeksi', '65000'),
(831, 'Rosuvastatin Calcium 10 mg tab', '10 mg', 'Tablet', '1650'),
(832, 'Ryzodeg Flex Touch ', '-', 'Injeksi', '312004'),
(833, 'SA INJ', '0.25 mg/ml', 'Injeksi', '2541'),
(834, 'SABU INJ 5 ML', '-', 'Injeksi', '0'),
(835, 'Sagestam 80 mg/2 ml Inj', '80 mg', 'Injeksi', '14999.82'),
(836, 'Sagestam cream', '0.1%', 'Salep Kulit', '13530'),
(837, 'SALBUTAMOL 2 MG TAB', '2 mg', 'Tablet', '113.28'),
(838, 'SALBUTAMOL 4 MG TAB', '4 mg', 'Tablet', '120.18'),
(839, 'SALOFALK 250MG KAPSUL', '250mg', 'Kapsul', '13679.82'),
(840, 'Salofalk 500 mg kapsul', '500 mg', 'Kapsul', '13680'),
(841, 'Salticin 80 mg inj', '80 mg', 'Injeksi', '14600'),
(842, 'Sancoidan kap', '-', 'Tablet', '16500'),
(843, 'SANDEPRIL TAB', '50 mg', 'Tablet', '3476'),
(844, 'Sandimun 100 mg tab', '100 mg', 'Tablet', '42999.99'),
(845, 'Sandimun 25 mg tab', '25 mg', 'Tablet', '12000.01'),
(846, 'Sanfuliq tablet', '-', 'Tablet', '5747.5'),
(847, 'Sangobion Drop', '-', 'Syrup', '17000'),
(848, 'SANMAG TAB', '-', 'Tablet', '929.5'),
(849, 'SANMOL DROP', '100 mg/ml', 'Syrup', '22000'),
(850, 'SANMOL INFUS', '1 g', 'Infus', '67210'),
(851, 'SANMOL SYR', '120 mg/5 ml', 'Syrup', '12870'),
(852, 'SANMOL TAB', '500 mg', 'Tablet', '319'),
(853, 'Sanotake tab', '-', 'Tablet', '20167'),
(854, 'SANPRIMA FORTE', '800 mg-160 mg', 'Tablet', '2140'),
(855, 'SANPRIMA TAB', '480 mg', 'Tablet', '858'),
(856, 'SANSULIN N INJ', '-', 'Injeksi', '92000'),
(857, 'SANTA E TAB', '400 iu', 'Tablet', '1500'),
(858, 'SANTAGESIK INJ', '500 mg', 'Injeksi', '16667'),
(859, 'SANTOCYN INJ', '10 iu/ml', 'Injeksi', '14545'),
(860, 'Scabimite 30 gr', '5%', 'Salep Kulit', '80300'),
(861, 'SCABIMITE CREAM 10 GR', '5%', 'Salep Kulit', '12155'),
(862, 'SEQUEST SACH', '4 g', 'Serbuk', '26900'),
(863, 'SERETIDE DISKUS 250', '500 mcg', 'Spray', '124733.4'),
(864, 'SERETIDE MDI 125 ', '250 mcg', 'Spray', '132000'),
(865, 'SERTRALINE HCL 50 MG TAB', '50 mg', 'Tablet', '9000'),
(866, 'SIBITAL INJ', '200 mg', 'Injeksi', '10890'),
(867, 'SIFROL 0,375 MG TAB', '0.375 mg ', 'Tablet', '8300.01'),
(868, 'SILDENAFIL CITRATE 100 MG TAB', '100 mg', 'Tablet', '47300'),
(869, 'SIMARC-2', '2 mg', 'Tablet', '1501.5'),
(870, 'Simdes Syrup', '2.5 mg/5 ml', 'Syrup', '103199.8'),
(871, 'Simprazol Inj', '40 mg', 'Injeksi', '181500'),
(872, 'SIMVASTATIN 10 MG TAB', '10 mg', 'Tablet', '540'),
(873, 'SIMVASTATIN 20 MG TAB', '20 mg', 'Tablet', '237'),
(874, 'Sistenol tablet', '-', 'Tablet', '2200'),
(875, 'SMECTA / SACH', '-', 'Serbuk', '3667'),
(876, 'Smoflipid 20% 100 ml inf', '-', 'Infus', '84315'),
(877, 'SNMC/Stronger Neo MC inj', '-', 'Injeksi', '115500'),
(878, 'Solac syrup', '3.335 g', 'Syrup', '79200'),
(879, 'Somatostatin Lyomark inj', '3 mg', 'Injeksi', '774400'),
(880, 'Sotatic Inj', '5 mg/ml', 'Injeksi', '4400'),
(881, 'SPIRAMYCIN 500 TAB', '50 mg', 'Tablet', '2492.6'),
(882, 'SPIRIVA REFILL', '2.5 mcg', 'Spray', '452999.8'),
(883, 'SPIRONOLACTONE 25 MG TAB', '25mg', 'Tablet', '381'),
(884, 'SPIRONOLAKTON 100 MG TAB', '100 mg', 'Tablet', '1160'),
(885, 'Sporetik 200 mg kaps', '200 mg', 'Kapsul', '31405'),
(886, 'SPORETIK CAPS 100 MG', '100 mg', 'Kapsul', '21208'),
(887, 'Sporetik Syrup', '100 mg/5 ml', 'Syrup', '91795'),
(888, 'Stablon tab', '12.5 mg', 'Tablet', '9159'),
(889, 'Stalevo 100 mg tab', '100 mg', 'Tablet', '8899.99'),
(890, 'STELAZIN 5 MG TAB', '5 mg', 'Tablet', '1087'),
(891, 'STESOLID INJ 2 ML', '5 mg/2 ml', 'Injeksi', '5400'),
(892, 'STESOLID SUPP 10/rectal tube', '10 mg/tube', 'Supp', '21021'),
(893, 'STESOLID SUPP 5/rectal tube', '5 mg/tube', 'Supp', '14458.4'),
(894, 'Stobled Caps', '-', 'Kapsull', '7425');
INSERT INTO `obat` (`id_obat`, `nm_obat`, `kekuatan`, `bentuk`, `harga`) VALUES
(895, 'STREPTOMYCIN INJ 1000 MG', '1 g', 'Injeksi', '7700'),
(896, 'SULFADIAZINE SILVER CREAM 35 GR', '1%', 'Salep Kulit', '22999.9'),
(897, 'SULFAZALANINE 500 KAP', '500 mg', 'Tablet', '2200'),
(898, 'Supportan Syr', '-', 'Syrup', '32450'),
(899, 'SUPRAFENID SUPP', '100 mg', 'Supp', '2379.96'),
(900, 'Supralysin drop', '-', 'Syrup', '30250'),
(901, 'Supralysin syr 60 ml', '-', 'Syrup', '24200'),
(902, 'Survanta 25 mg/ml', '25 mg', 'Injeksi', '3499999.8'),
(903, 'Sustanon Inj 250 mg/ml', '250 mg', 'Injeksi', '209878.9'),
(904, 'SYMBICORT 160/4,5 UG 60ML', '160/4.5 mcg', 'Spray', '135000'),
(905, 'SYMBICORT 80/4.5 UG', '80/4.5 mcg', 'Spray', '126000'),
(906, 'TABLET TAMBAH DARAH', '60 mg', 'Tablet', '409'),
(907, 'Tamicil 4.5 mg inj', '4.5 g', 'Injeksi', '286000'),
(908, 'TAMOFEN 10 MG TAB', '10 mg', 'Tablet', '1987'),
(909, 'TAMOFEN 20 MG TAB', '20 mg', 'Tablet', '1986.97'),
(910, 'TAMOLIV 100 ml', '1 g', 'Infus', '49500'),
(911, 'TANAPRESS 10 MG TAB', '10 mg', 'Tablet', '4735.01'),
(912, 'TANAPRESS 5 MG TAB', '5 mg', 'Tablet', '2530'),
(913, 'Tapros 3M depot inj', '3 mg', 'Injeksi', '3100000'),
(914, 'Tapros Inj 1,88 mg inj', '1.88 mg', 'Injeksi', '780000'),
(915, 'TARIVID OTIC SOLOTION', '0.3%', 'Tetes Telinga', '84700'),
(916, 'Tasigna 200 mg caps', '200 mg', 'Kapsul', '95219'),
(917, 'Tasigna HGC 150 mg caps', '150 mg', 'Kapsul', '35200'),
(918, 'TAXEGRAM INJ 1 GR', '2 g', 'Injeksi', '156970'),
(919, 'Tazam 4.5 g Inj', '4.5 g', 'Injeksi', '302500'),
(920, 'Tebokan Forte 120 mg tab', '-', 'Tablet', '17123'),
(921, 'TEBOKAN SP TAB', '-', 'Tablet', '11715'),
(922, 'TEBOKAN TAB', '-', 'Tablet', '5841'),
(923, 'Telmisartan 80 mg tab', '80 mg', 'Tablet', '6200'),
(924, 'Temodal 100 mg caps', '100 mg', 'Kapsul', '1170000'),
(925, 'Temodal 20 mg caps', '20 mg', 'Kapsul', '230000'),
(926, 'Tenofovir tab', '300 mg', 'Tablet', '0'),
(927, 'TETAGAM INJ', '250 iu', 'Injeksi', '206800'),
(928, 'THEOBRON KAP', '300 mg', 'Kapsul', '990'),
(929, 'THROMBOPHOB GEL', '5000 iu', 'Salep Kulit', '54450'),
(930, 'THYROZOL 10 MG TAB', '10 mg', 'Tablet', '1621.4'),
(931, 'THYROZOL 5 MG TAB', '5 mg', 'Tablet', '689'),
(932, 'Tiriz Drop', '5 mg/ml', 'Syrup', '85000'),
(933, 'TKV Tab @ 30', '0.5 mg', 'Tablet', '29333'),
(934, 'Tofedex tab', '25 mg', 'Tablet', '9200'),
(935, 'TOMIT INJ 2 ML', '2 ml', 'Injeksi', '11165'),
(936, 'Tomit tab', '10 mg', 'Tablet', '440'),
(937, 'Topamax 100 mg tab', '100 mg', 'Tablet', '11220'),
(938, 'Topamax 25 mg tab', '25 mg', 'Tablet', '2950'),
(939, 'TOPAZOL INJ', '40 mg', 'Injeksi', '161700'),
(940, 'Tracetat Syr', '40 mg/ml', 'Syrup', '401500'),
(941, 'Tracetat tablet', '160 mg', 'Tablet', '23100'),
(942, 'TRAMADOL INJ', '25 mg/ml', 'Injeksi', '6402'),
(943, 'TRAMADOL KAPSUL', '50 mg', 'Kapsul', '825'),
(944, 'TREMENZA TAB', '-', 'Tablet', '1600.5'),
(945, 'Triamcinolone tab', '4 mg', 'Tablet', '876.65'),
(946, 'Trifacort 5 mg (prednison) tab', '5 mg', 'Tablet', '238.24'),
(947, 'Trifluoperazin 5 mg tab', '5 mg', 'Tablet', '682'),
(948, 'TRIFLUOPERAZINE 5 MG TAB', '5 mg', 'Tablet', '682'),
(949, 'TRIHEXYPHENIDIL 2 MG', '2 mg', 'Tablet', '116'),
(950, 'TRILAC INJ', '10 mg/ml', 'Injeksi', '4583'),
(951, 'TRIOFUCIN 500 INF', '-', 'Infus', '77000'),
(952, 'Trisetron 8 mg tab (Ondan)', '8 mg', 'Tablet', '2200'),
(953, 'TRIZEDON MR TAB', '35 mg', 'Tablet', '3593'),
(954, 'Trolip 160 tablet', '160 mg', 'Tablet', '13000'),
(955, 'Trovensis 8 mg inj 4 ml', '8 mg', 'Injeksi', '75614'),
(956, 'TUTOFUCIN OPS INF', '-', 'Infus', '41500'),
(957, 'Tygacil 50 mg inj', '50 mg', 'Injeksi', '809482.3'),
(958, 'Tykerb 250 mg tab', '250 mg', 'Tablet', '72600'),
(959, 'Ubi Q 100 mg kapsul', '100 mg', 'Kapsul', '14687'),
(960, 'ULSAFATE SUSP 100 ML', '500 mg/5 ml', 'Syrup', '10200'),
(961, 'ULSAFATE SUSP 200 ML', '500 mg/5 ml', 'Syrup', '28000'),
(962, 'ULSIDEX 500 MG TAB', '500 mg', 'Tablet', '1234.2'),
(963, 'ULTRACET 37.5 MG TAB', '375 mg-37.5 mg', 'Tablet', '5803'),
(964, 'UMARONE 2 ML INJ', '10 mg/ml', 'Injeksi', '192500'),
(965, 'Urinter tab', '400 mg', 'Tablet', '5857.5'),
(966, 'Urogetix 100 mg Caplet', '100 mg', 'Kapsul', '5107.3'),
(967, 'Urografin inj', '76%', 'Injeksi', '85800'),
(968, 'Uromitexan 400 mg inj', '400 mg', 'Injeksi', '99095.7'),
(969, 'Urotractin 400 mg tab', '400 mg', 'Tablet', '3410'),
(970, 'URSODEOXYCHOLIC ACID 250 MG KAPS', '250 mg', 'Kapsul', '3138.3'),
(971, 'UTROGESTAN 100 MG TAB', '100 mg', 'Tablet', '10050'),
(972, 'VAGISTIN OVULA', '500 mg-100,000 iu', 'Tab Ovula', '15125'),
(973, 'Valcyte FC Tab 450 mg tab', '450 mg', 'Tablet', '176250'),
(974, 'Valisanbe 5 mg tab', '5 mg', 'Tablet', '429'),
(975, 'VALISANBE INJ', '5 mg/2 ml', 'Injeksi', '19789'),
(976, 'VALSARTAN 160 MG TAB', '160 mg', 'Tablet', '2700'),
(977, 'VALSARTAN 80 MG TAB', '80 mg', 'Tablet', '4400'),
(978, 'Vancep 0,5 gr inj', '0.5 g', 'Injeksi', '121995'),
(979, 'VBlock 6.25 mg tab', '6.25 mg', 'Tablet', '2750'),
(980, 'Vectrine 300 mg kapsul', '300 mg', 'Kapsul', '5500'),
(981, 'VENTOLIN NEBULIZER INJ', '2.5 mg/2.5 ml', 'Nebules', '4000'),
(982, 'VENTOLIN SPRAY', '100 mcg', 'Spray', '98868'),
(983, 'Verona tablet', '-', 'Tablet', '5999.4'),
(984, 'Verorab inj', '-', 'Injeksi', '0'),
(985, 'VICCILLIN SX 1500 MG INJ', '1 g-500 mg', 'Injeksi', '90200'),
(986, 'Vincristine 1 mg injeksi', '1 mg', 'Injeksi', '45397'),
(987, 'Vincristine 2 mg Injeksi', '2 mg', 'Injeksi', '80999.6'),
(988, 'VIPALBUMIN KAPSUL', '-', 'Kapsul', '7333.33'),
(989, 'Visanne 2 mg tab', '2 mg', 'Tablet', '13871.98'),
(990, 'VIT B 12 TAB', '500 mcg', 'Tablet', '87'),
(991, 'VIT B COMPL. TAB', '-', 'Tablet', '144'),
(992, 'VIT B1 100 MG TAB', '100 mg', 'Tablet', '461'),
(993, 'VIT B1 50 mg TAB', '50 mg', 'Tablet', '135.83'),
(994, 'VIT B6 TAB 10 MG', '10 mg', 'Tablet', '150'),
(995, 'VIT C 50 MG TAB', '50 mg', 'Tablet', '190.4'),
(996, 'VIT C 500 mg Inj', '500 mg', 'Injeksi', '44000'),
(997, 'Vit K 10 mg inj', '10 mg', 'Injeksi', '5243'),
(998, 'Vit K 2 mg inj', '2 mg', 'Injeksi', '4236'),
(999, 'VIT. C 1000 mg inj', '1000 mg', 'Injeksi', '22000'),
(1000, 'VIT. C INJ', '250 mg/ml', 'Injeksi', '7054'),
(1001, 'Vit. K tab', '10 mg', 'Tablet', '818'),
(1002, 'Viusid 100 ml Syr', '-', 'Syrup', '275000'),
(1003, 'Vivena inj', '-', 'Injeksi', '77272'),
(1004, 'VOLTAREN GEL 10GR', '1%', 'Salep Kulit', '204000'),
(1005, 'Volulyte  6  infus  500 ml', '-', 'Infus', '18000'),
(1006, 'VOLUVEN 6% 500 ML INF', '500 ml', 'Injeksi', '90000'),
(1007, 'VOMETA DROP', '5 mg/ml', 'Syrup', '49500'),
(1008, 'VOMETA FT TAB.', '10 mg', 'Tablet', '4400'),
(1009, 'VOMETA SYRUP', '5 mg/5 ml', 'Syrup', '50000'),
(1010, 'Vosedon tab', '10 mg', 'Tablet', '2492'),
(1011, 'Votrient 400 mg tab', '400 mg', 'Tablet', '288235'),
(1012, 'Wida HSD wida inf', '-', 'Infus', '9499.6'),
(1013, 'WIDAHES INF', '-', 'Infus', '10293'),
(1014, 'XALATAN ED 0.005%', '0.05%', 'Tetes Mata', '121499.4'),
(1015, 'Xanax 0.5 mg tab', '0.5 mg', 'Tablet', '2531'),
(1016, 'Xarelto 10 mg tab', '10 mg', 'Tablet', '27500'),
(1017, 'XARELTO 15 MG TAB', '15 mg', 'Tablet', '25717.02'),
(1018, 'Xarelto 20 mg tab', '20 mg', 'Tablet', '27500'),
(1019, 'Xolmetras 100 ml inj', '-', 'Infus', '561000'),
(1020, 'Xolmetras 50 ml inj', '-', 'Injeksi', '302500'),
(1021, 'Xyzal 5 mg tab', '5 mg', 'Tablet', '8439'),
(1022, 'ZAMEL SYR', '-', 'Syrup', '4500'),
(1023, 'Zinc 20 mg tab', '20 mg', 'Tablet', '592'),
(1024, 'Zinc Sulfate Syr', '20 mg', 'Syrup', '3284.6'),
(1025, 'ZINCPRO DROP 15 ML', '10 mg', 'Syrup', '6281'),
(1026, 'Zink Dispersible tab', '20 mg', 'Tablet', '604'),
(1027, 'Zoladex 10.8 mg Inj', '10.8 mg', 'Injeksi', '2740000'),
(1028, 'ZOLADEX INJ', '3.6 mg', 'Injeksi', '979000'),
(1029, 'ZOMETA 4 mg inj', '4 mg', 'Injeksi', '1528800'),
(1030, 'ZOVIRAC inf', '250 mg', 'Infus', '220000'),
(1031, 'Zyloric 300 mg tab', '300 mg', 'Tablet', '5080.46');

-- --------------------------------------------------------

--
-- Table structure for table `pasien`
--

CREATE TABLE `pasien` (
  `id_pasien` int(11) NOT NULL,
  `nm_pasien` varchar(50) NOT NULL,
  `jk` varchar(20) NOT NULL,
  `tmpt_lahir` varchar(50) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `pekerjaan` varchar(50) NOT NULL,
  `alamat` text NOT NULL,
  `jp` varchar(20) NOT NULL,
  `bpjs` varchar(30) DEFAULT NULL,
  `hp` varchar(20) NOT NULL,
  `id_user` int(11) NOT NULL,
  `tgl_input` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pasien`
--

INSERT INTO `pasien` (`id_pasien`, `nm_pasien`, `jk`, `tmpt_lahir`, `tgl_lahir`, `pekerjaan`, `alamat`, `jp`, `bpjs`, `hp`, `id_user`, `tgl_input`) VALUES
(2, 'Nabila Zaskia', 'Perempuan', 'Banjarmasin', '1999-05-27', 'Mahasiswa', 'Komplek H. Iyus No. 666', 'Umum', '', '084589585800', 2, '2021-07-01'),
(3, 'Abdul Khodir', 'Laki-laki', 'Banjarbaru', '1994-07-13', 'Pelajar', 'Batulicin', 'BPJS', '567890', '084589585800', 2, '2021-07-01');

-- --------------------------------------------------------

--
-- Table structure for table `poli`
--

CREATE TABLE `poli` (
  `id_poli` int(11) NOT NULL,
  `nm_poli` varchar(50) NOT NULL,
  `ket` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `poli`
--

INSERT INTO `poli` (`id_poli`, `nm_poli`, `ket`) VALUES
(2, 'Poli Anak', 'Poli Untuk Pemeriksaan Anak'),
(3, 'Poli THT', 'Poli Untuk THT');

-- --------------------------------------------------------

--
-- Table structure for table `rm`
--

CREATE TABLE `rm` (
  `id_rm` varchar(11) NOT NULL,
  `id_pasien` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `id_poli` int(11) NOT NULL,
  `keluhan` text NOT NULL,
  `diagnosis` text NOT NULL,
  `id_dokter` int(11) NOT NULL,
  `tindakan` text NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rm`
--

INSERT INTO `rm` (`id_rm`, `id_pasien`, `tanggal`, `id_poli`, `keluhan`, `diagnosis`, `id_dokter`, `tindakan`, `id_user`) VALUES
('RM0000001', 2, '2021-06-30', 2, 'Sakit Kepala', 'Vertigo', 3, 'Pemberian Obat Terjadwal', 2);

-- --------------------------------------------------------

--
-- Table structure for table `rm_obat`
--

CREATE TABLE `rm_obat` (
  `id_rm_obat` int(11) NOT NULL,
  `id_rm` varchar(11) NOT NULL,
  `id_obat` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `dosis` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rm_obat`
--

INSERT INTO `rm_obat` (`id_rm_obat`, `id_rm`, `id_obat`, `jumlah`, `dosis`) VALUES
(3, 'RM0000001', 1029, 4, '3x1');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nm_user` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `level` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nm_user`, `username`, `password`, `level`) VALUES
(1, 'Administrator', 'admin', '21232f297a57a5a743894a0e4a801fc3', '1'),
(2, 'Novia Noor Rahmanida', 'novia', 'f75f175dc9f6e5a0e4ddc9dec255b2fd', '2');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dokter`
--
ALTER TABLE `dokter`
  ADD PRIMARY KEY (`id_dokter`);

--
-- Indexes for table `mcu_fisik`
--
ALTER TABLE `mcu_fisik`
  ADD PRIMARY KEY (`id_mcu_fisik`);

--
-- Indexes for table `mcu_hamil`
--
ALTER TABLE `mcu_hamil`
  ADD PRIMARY KEY (`id_mcu_hamil`);

--
-- Indexes for table `mcu_jiwa`
--
ALTER TABLE `mcu_jiwa`
  ADD PRIMARY KEY (`id_mcu_jiwa`);

--
-- Indexes for table `mcu_mata`
--
ALTER TABLE `mcu_mata`
  ADD PRIMARY KEY (`id_mcu_mata`);

--
-- Indexes for table `mcu_napza`
--
ALTER TABLE `mcu_napza`
  ADD PRIMARY KEY (`id_mcu_napza`);

--
-- Indexes for table `mcu_sehat`
--
ALTER TABLE `mcu_sehat`
  ADD PRIMARY KEY (`id_mcu_sehat`);

--
-- Indexes for table `mcu_virus`
--
ALTER TABLE `mcu_virus`
  ADD PRIMARY KEY (`id_mcu_virus`);

--
-- Indexes for table `obat`
--
ALTER TABLE `obat`
  ADD PRIMARY KEY (`id_obat`);

--
-- Indexes for table `pasien`
--
ALTER TABLE `pasien`
  ADD PRIMARY KEY (`id_pasien`);

--
-- Indexes for table `poli`
--
ALTER TABLE `poli`
  ADD PRIMARY KEY (`id_poli`);

--
-- Indexes for table `rm`
--
ALTER TABLE `rm`
  ADD PRIMARY KEY (`id_rm`);

--
-- Indexes for table `rm_obat`
--
ALTER TABLE `rm_obat`
  ADD PRIMARY KEY (`id_rm_obat`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `dokter`
--
ALTER TABLE `dokter`
  MODIFY `id_dokter` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `mcu_fisik`
--
ALTER TABLE `mcu_fisik`
  MODIFY `id_mcu_fisik` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `mcu_hamil`
--
ALTER TABLE `mcu_hamil`
  MODIFY `id_mcu_hamil` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `mcu_jiwa`
--
ALTER TABLE `mcu_jiwa`
  MODIFY `id_mcu_jiwa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `mcu_mata`
--
ALTER TABLE `mcu_mata`
  MODIFY `id_mcu_mata` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `mcu_napza`
--
ALTER TABLE `mcu_napza`
  MODIFY `id_mcu_napza` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `mcu_sehat`
--
ALTER TABLE `mcu_sehat`
  MODIFY `id_mcu_sehat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `mcu_virus`
--
ALTER TABLE `mcu_virus`
  MODIFY `id_mcu_virus` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `obat`
--
ALTER TABLE `obat`
  MODIFY `id_obat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1032;
--
-- AUTO_INCREMENT for table `pasien`
--
ALTER TABLE `pasien`
  MODIFY `id_pasien` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `poli`
--
ALTER TABLE `poli`
  MODIFY `id_poli` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `rm_obat`
--
ALTER TABLE `rm_obat`
  MODIFY `id_rm_obat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
