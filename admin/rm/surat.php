<?php
include '../../app/config.php';

$no = 1;

$id = $_GET['id'];
$query = $con->query("SELECT * FROM rm r JOIN pasien p ON p.id_pasien = r.id_pasien JOIN poli pl ON pl.id_poli = r.id_poli JOIN dokter d ON d.id_dokter = r.id_dokter JOIN user u ON u.id_user = r.id_user WHERE id_rm = '$id'");
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
    <title>Surat Keterangan Rekam Medis</title>
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
                    <h2>SURAT KETERANGAN REKAM MEDIS</h2>
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
            <td width="25%"><b>Kode Rekam Medis</b></td>
            <td align="center" width="4%">:</td>
            <td><?= $row['id_rm'] ?></td>
        </tr>
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
            <td width="25%"><b>Tanggal Periksa</b></td>
            <td align="center" width="4%">:</td>
            <td><?= tgl($row['tanggal']) ?></td>
        </tr>
        <tr>
            <td width="25%"><b>Poli</b></td>
            <td align="center" width="4%">:</td>
            <td><?= $row['nm_poli'] ?></td>
        </tr>
        <tr>
            <td width="25%"><b>Keluhan</b></td>
            <td align="center" width="4%">:</td>
            <td><?= $row['keluhan'] ?></td>
        </tr>
        <tr>
            <td width="25%"><b>Diagnosis</b></td>
            <td align="center" width="4%">:</td>
            <td><?= $row['diagnosis'] ?></td>
        </tr>
        <tr>
            <td width="25%"><b>Nama Dokter</b></td>
            <td align="center" width="4%">:</td>
            <td><?= $row['nm_dokter'] ?></td>
        </tr>
        <tr>
            <td width="25%"><b>Tindak Lanjut</b></td>
            <td align="center" width="4%">:</td>
            <td><?= $row['tindakan'] ?></td>
        </tr>
    </table>

    <?php
    $cek = $con->query("SELECT * FROM rm_obat ro LEFT JOIN obat o ON o.id_obat = ro.id_obat WHERE ro.id_rm = '$id' ")->fetch_array();
    if (!empty($cek['id_rm'])) {
    ?>

        <div class="row">
            <div class="col-sm-12">
                <div class="card-box table-responsive">
                    <table border="1" cellspacing="0" cellpadding="6" width="100%">
                        <thead>
                            <tr bgcolor="#007BFF" align="center">
                                <th>No.</th>
                                <th>Nama Obat</th>
                                <th>Kekuatan</th>
                                <th>Jumlah (Pcs)</th>
                                <th>Dosis</th>
                                <th>Aturan Pakai</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no1 = 1;
                            $rowt = $con->query("SELECT * FROM rm_obat ro LEFT JOIN obat o ON o.id_obat = ro.id_obat WHERE ro.id_rm = '$id' ");
                            while ($tampil = $rowt->fetch_array()) { ?>
                                <tr>
                                    <td align="center"><?= $no1++; ?></td>
                                    <td align="center"><?= $tampil['nm_obat'] ?></td>
                                    <td align="center"><?= $tampil['kekuatan'] ?></td>
                                    <td align="center"><?= $tampil['jumlah'] ?></td>
                                    <td align="center"><?= $tampil['dosis'] ?></td>
                                    <td align="center"><?= $tampil['aturan'] ?></td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    <?php } ?>
</body>

</html>
<?php
$html = ob_get_contents();
ob_end_clean();
$mpdf->WriteHTML(utf8_encode($html));
$mpdf->Output();
?>