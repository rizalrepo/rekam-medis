<?php
include '../../app/config.php';

$no = 1;

if (isset($_POST['cetak'])) {

    $jp = $_POST['jp'];
    if (!empty($jp)) {

        $sql = mysqli_query($con, "SELECT * FROM pasien p JOIN poli pl ON pl.id_poli = p.id_poli WHERE jp = '$jp' ORDER BY id_pasien DESC");
        $label = 'LAPORAN DATA PASIEN <br> Pengobatan : ' . $jp;
        $sql1 = mysqli_query($con, "SELECT * FROM pasien p JOIN poli pl ON pl.id_poli = p.id_poli WHERE jp = '$jp' AND jk = 'Laki-laki'");
        $sql2 = mysqli_query($con, "SELECT * FROM pasien p JOIN poli pl ON pl.id_poli = p.id_poli WHERE jp = '$jp' AND jk = 'Perempuan'");
        $num1 = mysqli_num_rows($sql1);
        $num2 = mysqli_num_rows($sql2);
    } else {
        $sql = mysqli_query($con, "SELECT * FROM pasien p JOIN poli pl ON pl.id_poli = p.id_poli ORDER BY id_pasien DESC");
        $label = 'LAPORAN DATA PASIEN';
        $sql1 = mysqli_query($con, "SELECT * FROM pasien p JOIN poli pl ON pl.id_poli = p.id_poli WHERE jk = 'Laki-laki'");
        $sql2 = mysqli_query($con, "SELECT * FROM pasien p JOIN poli pl ON pl.id_poli = p.id_poli WHERE jk = 'Perempuan'");
        $num1 = mysqli_num_rows($sql1);
        $num2 = mysqli_num_rows($sql2);
    }
}

require_once '../../assets/vendor/autoload.php';
$mpdf = new \Mpdf\Mpdf(['mode' => 'utf-8', 'format' => [450, 220]]);
ob_start();
?>

<script type="text/javascript">
    window.print();
</script>

<!DOCTYPE html>
<html>

<head>
    <title>Laporan Data Pasien</title>
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
                            <th>Nomor Kartu</th>
                            <th>Nama Pasien</th>
                            <th>NIK</th>
                            <th>Jenis Kelamin</th>
                            <th>TTL</th>
                            <th>Usia</th>
                            <th>Pekerjaan</th>
                            <th>Alamat</th>
                            <th>Pengobatan</th>
                            <!-- <th>Nomor BPJS</th> -->
                            <th>Poli</th>
                            <th>Nomor HP</th>
                            <!-- <th>Tanggal Input</th> -->
                        </tr>
                    </thead>

                    <tbody>
                        <?php while ($data = mysqli_fetch_array($sql)) {
                            $tgl = new DateTime($data['tgl_lahir']);
                            $today = new DateTime('today');
                            $y = $today->diff($tgl)->y; ?>
                            <tr>
                                <td align="center" width="5%"><?= $no++; ?></td>
                                <td align="center"><?= $data['no_kartu'] ?></td>
                                <td><?= $data['nm_pasien'] ?></td>
                                <td align="center"><?= $data['nik'] ?></td>
                                <td align="center"><?= $data['jk'] ?></td>
                                <td align="center"><?= $data['tmpt_lahir'] ?>, <?= tgl($data['tgl_lahir']) ?></td>
                                <td align="center"><?= $y . ' Tahun' ?></td>
                                <td align="center"><?= $data['pekerjaan'] ?></td>
                                <td><?= $data['alamat'] ?></td>
                                <td align="center"><?= $data['jp'] ?></td>
                                <!-- <td align="center">
                                    <?php if ($data['jp'] == 'BPJS') {
                                        echo $data['bpjs'];
                                    } else {
                                        echo '-';
                                    } ?>
                                </td> -->
                                <td align="center"><?= $data['nm_poli'] ?></td>
                                <td align="center"><?= $data['hp'] ?></td>
                                <!-- <td align="center"><?= tgl($data['tgl_input']) ?></td> -->
                            </tr>
                        <?php } ?>
                    </tbody>

                </table>
                <hr>
                <i>Jumlah Pasien Laki-laki : <b><?= $num1 ?> Orang</b></i><br>
                <i>Jumlah Pasien Perempuan : <b><?= $num2 ?> Orang</b></i>

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