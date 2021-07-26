<?php
include '../../app/config.php';

$no = 1;

if (isset($_POST['cetak'])) {

    $spesialis = $_POST['spesialis'];
    if (!empty($spesialis)) {

        $sql = mysqli_query($con, "SELECT * FROM dokter WHERE spesialis = '$spesialis' ORDER BY id_dokter DESC");
        $label = 'LAPORAN DATA DOKTER <br> Spesialis : ' . $spesialis;
    } else {
        $sql = mysqli_query($con, "SELECT * FROM dokter ORDER BY id_dokter DESC");
        $label = 'LAPORAN DATA DOKTER';
    }
}

require_once '../../assets/vendor/autoload.php';
$mpdf = new \Mpdf\Mpdf(['mode' => 'utf-8', 'format' => 'LEGAL-L']);
ob_start();
?>

<script type="text/javascript">
    window.print();
</script>

<!DOCTYPE html>
<html>

<head>
    <title>Laporan Data Dokter</title>
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
                            <th>Nama Dokter</th>
                            <th>NIP</th>
                            <th>SIP</th>
                            <th>Spesialis</th>
                            <th>Tanggal Mulai Kerja</th>
                            <th>Lama Kerja</th>
                            <th>Alamat</th>
                            <th>Nomor HP</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php while ($data = mysqli_fetch_array($sql)) {
                            $tgl = new DateTime($data['tgl_masuk']);
                            $today = new DateTime('today');
                            $y = $today->diff($tgl)->y; ?>
                            <tr>
                                <td align="center" width="5%"><?= $no++; ?></td>
                                <td><?= $data['nm_dokter'] ?></td>
                                <td align="center"><?= $data['nip'] ?></td>
                                <td align="center"><?= $data['sip'] ?></td>
                                <td align="center"><?= $data['spesialis'] ?></td>
                                <td align="center"><?= tgl($data['tgl_masuk']) ?></td>
                                <td align="center"><?= $y . ' Tahun' ?></td>
                                <td><?= $data['alamat'] ?></td>
                                <td align="center"><?= $data['hp'] ?></td>
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