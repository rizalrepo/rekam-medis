<?php
include '../../app/config.php';

$no = 1;

if (isset($_POST['cetak'])) {

    $tgl1 = $_POST['tgl1'];
    $cektgl1 = isset($tgl1);
    $tgl2 = $_POST['tgl2'];
    $cektgl2 = isset($tgl2);
    $id_dokter = $_POST['id_dokter'];
    $cekid_dokter = isset($id_dokter);
    if ($tgl1 == $cektgl1 && $tgl2 == $cektgl2 && $id_dokter == null) {

        $sql = mysqli_query($con, "SELECT * FROM rm r JOIN pasien p ON p.id_pasien = r.id_pasien JOIN poli pl ON pl.id_poli = r.id_poli JOIN dokter d ON d.id_dokter = r.id_dokter WHERE r.tanggal BETWEEN '$tgl1' AND '$tgl2' ORDER BY id_rm DESC");
        $label = 'LAPORAN DATA REKAM MEDIS <br> Tanggal : ' . tgl($tgl1) . ' s/d ' . tgl($tgl2);
    } else if ($tgl1 == null && $tgl2 == null && $id_dokter == $cekid_dokter) {
        $sql = mysqli_query($con, "SELECT * FROM rm r JOIN pasien p ON p.id_pasien = r.id_pasien JOIN poli pl ON pl.id_poli = r.id_poli JOIN dokter d ON d.id_dokter = r.id_dokter WHERE r.id_dokter = '$id_dokter' ORDER BY id_rm DESC");
        $dt = $con->query("SELECT * FROM dokter WHERE id_dokter = '$id_dokter'")->fetch_array();
        $label = 'LAPORAN DATA REKAM MEDIS <br> Dokter : ' . $dt['nm_dokter'];
    } else if ($tgl1 == $cektgl1 && $tgl2 == $cektgl2 && $id_dokter == $cekid_dokter) {
        $sql = mysqli_query($con, "SELECT * FROM rm r JOIN pasien p ON p.id_pasien = r.id_pasien JOIN poli pl ON pl.id_poli = r.id_poli JOIN dokter d ON d.id_dokter = r.id_dokter WHERE r.tanggal BETWEEN '$tgl1' AND '$tgl2' AND r.id_dokter = '$id_dokter' ORDER BY id_rm DESC");
        $dt = $con->query("SELECT * FROM dokter WHERE id_dokter = '$id_dokter'")->fetch_array();
        $label = 'LAPORAN DATA REKAM MEDIS <br> Tanggal : ' . tgl($tgl1) . ' s/d ' . tgl($tgl2) . '<br> Dokter : ' . $dt['nm_dokter'];
    } else if ($tgl1 == null && $tgl2 == null && $id_dokter == null) {
        $sql = mysqli_query($con, "SELECT * FROM rm r JOIN pasien p ON p.id_pasien = r.id_pasien JOIN poli pl ON pl.id_poli = r.id_poli JOIN dokter d ON d.id_dokter = r.id_dokter ORDER BY id_rm DESC");
        $label = 'LAPORAN DATA REKAM MEDIS';
    }
}

require_once '../../assets/vendor/autoload.php';
$mpdf = new \Mpdf\Mpdf(['mode' => 'utf-8', 'format' => [400, 220]]);
ob_start();
?>

<script type="text/javascript">
    window.print();
</script>

<!DOCTYPE html>
<html>

<head>
    <title>Laporan Data Rekam Medis</title>
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
                    <img src="<?= base_url('assets/images/logo.png') ?>" align="left" height="75">
                </td>
                <td align="center">
                    <h4>PEMERINTAH KABUPATEN TANAH BUMBU</h4>
                    <h2>RSUD Dr. H. ANDI ABDURRAHMAN NOOR</h2>
                    <h6>Jl. H. M. Amin Km.10 RT.03, Desa Sepunggur, Kecamatan Kusan Hilir <br>
                        Kabupaten Tanah Bumbu, Kalimantan Selatan, Telp 0811 5000 266</h6>
                </td>
                <td align="center">
                    <img src="<?= base_url('assets/images/pelengkap.png') ?>" align="right" height="75">
                </td>
            </tr>
        </table>
    </div>
    <hr size="2px" color="black">

    <h4 align="center">
        <?= $label ?><br>
    </h4>
    <div class="row">
        <div class="col-sm-12">
            <div class="card-box table-responsive">
                <table border="1" cellspacing="0" cellpadding="6" width="100%">
                    <thead>
                        <tr bgcolor="#007BFF" align="center">
                            <th>No</th>
                            <th>Kode RM</th>
                            <th>Nama Pasien</th>
                            <th>Nomor Kartu</th>
                            <th>Jenis Kelamin</th>
                            <th>Usia</th>
                            <th>Waktu Periksa</th>
                            <th>Nama Poli</th>
                            <th>Keluhan</th>
                            <th>Diagnosis</th>
                            <th>Nama Dokter</th>
                            <th>Tindak Lanjut</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php while ($data = mysqli_fetch_array($sql)) {
                            $tgl = new DateTime($data['tgl_lahir']);
                            $today = new DateTime('today');
                            $y = $today->diff($tgl)->y; ?>
                            <tr>
                                <td align="center" width="5%"><?= $no++; ?></td>
                                <td align="center"><?= $data['id_rm'] ?></td>
                                <td><?= $data['nm_pasien'] ?></td>
                                <td align="center"><?= $data['no_kartu'] ?></td>
                                <td align="center"><?= $data['jk'] ?></td>
                                <td align="center"><?= $y . ' Tahun' ?></td>
                                <td align="center"><?= tgl_indo($data['tanggal']) ?></td>
                                <td align="center"><?= $data['nm_poli'] ?></td>
                                <td><?= $data['keluhan'] ?></td>
                                <td><?= $data['diagnosis'] ?></td>
                                <td><?= $data['nm_dokter'] ?></td>
                                <td><?= $data['tindakan'] ?></td>
                            </tr>
                        <?php } ?>
                    </tbody>

                </table>

            </div>
        </div>
    </div>
    <br>
    <br>

    <br>
    <div class="table-responsive">
        <table border="0" cellspacing="0" cellpadding="0" width="100%">
            <tr>
                <td align="center" width="85%">
                </td>
                <td align="center">
                    <h6>
                        <?= tgl_indo(date('Y-m-d')) ?><br>
                        Tanah Bumbu <br>
                        <br><br><br><br>
                        <u>Petugas</u><br>
                    </h6>
                </td>
            </tr>
        </table>
    </div>
</body>

</html>
<?php
$html = ob_get_contents();
ob_end_clean();
$mpdf->WriteHTML(utf8_encode($html));
$mpdf->Output();
?>