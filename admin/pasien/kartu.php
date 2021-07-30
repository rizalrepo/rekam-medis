<?php
include '../../app/config.php';

$no = 1;

$id = $_GET['id'];
$query = $con->query(" SELECT * FROM pasien WHERE id_pasien ='$id'");
$row = $query->fetch_array();

require_once '../../assets/vendor/autoload.php';
$mpdf = new \Mpdf\Mpdf(['mode' => 'utf-8', 'format' => [165, 97]]);
ob_start();
?>

<script type="text/javascript">
    window.print();
</script>

<!DOCTYPE html>
<html>

<head>
    <title>Kartu Pasien</title>
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
                    <h2>KARTU PASIEN</h2>
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
            <td width="25%"><b>Nama Lengkap</b></td>
            <td align="center" width="4%">:</td>
            <td><?= $row['nm_pasien'] ?></td>
        </tr>
        <tr>
            <td width="25%"><b>NIK</b></td>
            <td align="center" width="4%">:</td>
            <td><?= $row['nik'] ?></td>
        </tr>
        <tr>
            <td width="25%"><b>TTL</b></td>
            <td align="center" width="4%">:</td>
            <td><?= $row['tmpt_lahir'] . ', ' . tgl($row['tgl_lahir']) ?></td>
        </tr>
        <tr>
            <td width="25%"><b>Pekerjaan</b></td>
            <td align="center" width="4%">:</td>
            <td><?= $row['pekerjaan'] ?></td>
        </tr>
        <tr>
            <td width="25%" valign="top"><b>Alamat</b></td>
            <td align="center" width="4%" valign="top">:</td>
            <td><?= $row['alamat'] ?></td>
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