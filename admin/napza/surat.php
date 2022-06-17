<?php
include '../../app/config.php';

$no = 1;

$id = $_GET['id'];

$query = $con->query("SELECT * FROM mcu_napza m JOIN pasien p ON p.id_pasien = m.id_pasien JOIN dokter d ON d.id_dokter = m.id_dokter JOIN user u ON u.id_user = m.id_user WHERE id_mcu_napza = '$id' ");
$row = $query->fetch_array();

$tgl = new DateTime($row['tgl_lahir']);
$today = new DateTime('today');
$y = $today->diff($tgl)->y;

require_once '../../assets/vendor/autoload.php';
$mpdf = new \Mpdf\Mpdf(['mode' => 'utf-8', 'format' => 'A4-P']);
ob_start();
?>

<script type="text/javascript">
    window.print();
</script>

<!DOCTYPE html>
<html>

<head>
    <title>Surat Keterangan MCU NAPZA</title>
</head>

<style>
    th {
        color: white;
    }
</style>

<body>
    <div class="table-responsive">
        <table border="0" cellspacing="0" cellpadding="0" width="100%">
            <tr>
                <td align="center">
                    <img src="<?= base_url('assets/images/logo.png') ?>" align="left" height="60">
                </td>
                <td align="center">
                    <h2>SURAT KETERANGAN MCU NAPZA</h2>
                    <h4>RSUD Dr. H. ANDI ABDURRAHMAN NOOR</h4>
                </td>
                <td align="center">
                    <img src="<?= base_url('assets/images/pelengkap.png') ?>" align="right" height="60">
                </td>
            </tr>
        </table>
    </div>
    <hr size="2px" color="black">

    <table border="0" width="100%">
        <tr>
            <td width="25%"><b>Nomor Kartu</b></td>
            <td align="center" width="4%">:</td>
            <td><?= $row['no_kartu'] ?></td>
        </tr>
        <tr>
            <td width="25%"><b>Nama Pasien</b></td>
            <td align="center" width="4%">:</td>
            <td><?= $row['nm_pasien'] ?></td>
        </tr>
        <tr>
            <td width="25%"><b>NIK</b></td>
            <td align="center" width="4%">:</td>
            <td><?= $row['nik'] ?></td>
        </tr>
        <tr>
            <td width="25%"><b>Jenis Kelamin</b></td>
            <td align="center" width="4%">:</td>
            <td><?= $row['jk'] ?></td>
        </tr>
        <tr>
            <td width="25%"><b>TTL</b></td>
            <td align="center" width="4%">:</td>
            <td><?= $row['tmpt_lahir'] ?>, <?= tgl($row['tgl_lahir']) ?></td>
        </tr>
        <tr>
            <td width="25%"><b>Usia</b></td>
            <td align="center" width="4%">:</td>
            <td><?= $y . ' Tahun' ?></td>
        </tr>
        <tr>
            <td width="25%"><b>Pengobatan</b></td>
            <td align="center" width="4%">:</td>
            <td><?= $row['jp'] ?></td>
        </tr>
        <?php if ($row['jp'] == 'BPJS') { ?>
            <tr>
                <td width="25%"><b>Nomor BPJS</b></td>
                <td align="center" width="4%">:</td>
                <td><?= $row['bpjs'] ?></td>
            </tr>
        <?php } ?>
        <tr>
            <td width="25%"><b>Untuk Keperluan</b></td>
            <td align="center" width="4%">:</td>
            <td><?= $row['untuk'] ?></td>
        </tr>
        <tr>
            <td width="25%"><b>Tanggal Periksa</b></td>
            <td align="center" width="4%">:</td>
            <td><?= tgl($row['tanggal']) ?></td>
        </tr>
        <tr>
            <td width="25%"><b>Nama Dokter</b></td>
            <td align="center" width="4%">:</td>
            <td><?= $row['nm_dokter'] ?></td>
        </tr>
        <tr>
            <td width="25"><b>Methamphetamine</b></td>
            <td align="center" width="4%">:</td>
            <td><?= $row['methamphetamine'] ?></td>
        </tr>
        <tr>
            <td width="25"><b>Amphetamine</b></td>
            <td align="center" width="4%">:</td>
            <td><?= $row['amphetamine'] ?></td>
        </tr>
        <tr>
            <td width="25"><b>Benzodiazepine</b></td>
            <td align="center" width="4%">:</td>
            <td><?= $row['benzodiazepine'] ?></td>
        </tr>
        <tr>
            <td width="25"><b>THC</b></td>
            <td align="center" width="4%">:</td>
            <td><?= $row['thc'] ?></td>
        </tr>
        <tr>
            <td width="25"><b>Morphine</b></td>
            <td align="center" width="4%">:</td>
            <td><?= $row['morphine'] ?></td>
        </tr>
        <tr>
            <td width="25"><b>Cocaine</b></td>
            <td align="center" width="4%">:</td>
            <td><?= $row['cocaine'] ?></td>
        </tr>
        <tr>
            <td width="25"><b>Hasil</b></td>
            <td align="center" width="4%">:</td>
            <td><?= $row['hasil'] ?></td>
        </tr>
        <tr>
            <td width="25%"><b>Catatan Dokter</b></td>
            <td align="center" width="4%">:</td>
            <td><?= $row['catatan'] ?></td>
        </tr>
    </table>

</body>

</html>
<?php
$html = ob_get_contents();
ob_end_clean();
$mpdf->WriteHTML(utf8_encode($html));
$mpdf->Output();
?>