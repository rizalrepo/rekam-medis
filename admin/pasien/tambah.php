<?php
require '../../app/config.php';
include_once '../../template/header.php';
include_once '../../template/sidebar.php';

$jk = [
    '' => '---Pilih---',
    'Laki-laki' => 'Laki-laki',
    'Perempuan' => 'Perempuan',
];

$query = mysqli_query($con, "SELECT max(no_kartu) as kode FROM pasien");
$data = mysqli_fetch_array($query);
$kode = $data['kode'];

$urutan = (int) substr($kode, 7, 7);
$urutan++;
$huruf = "NKP";
$kode = $huruf . sprintf("%07s", $urutan);
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <h4 class="m-0 text-dark"><i class="fa fa-users ml-1 mr-1"></i> Tambah Data Pasien</h4>
                </div><!-- /.col -->
                <div class="col-sm-6 float-right">
                    <a href="#" onClick="history.go(-1);" class="btn btn-xs bg-dark float-right"><i class="fa fa-arrow-left"> Kembali</i></a>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- left column -->
            <div class="row">
                <div class="col-md-12">
                    <!-- Horizontal Form -->
                    <div class="card card-olive card-outline">
                        <!-- /.card-header -->
                        <!-- form start -->
                        <div class="card-body" style="background-color: white;">
                            <form class="form-horizontal" method="POST" action="" enctype="multipart/form-data">
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Nomor Kartu Pasien</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="no_kartu" value="<?= $kode ?>" readonly>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Nama Pasien</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="nm_pasien" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">NIK</label>
                                    <div class="col-sm-10">
                                        <input type="number" class="form-control" name="nik" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Jenis Kelamin</label>
                                    <div class="col-sm-10">
                                        <?= form_dropdown('jk', $jk, '', 'class="form-control" required') ?>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Tempat Tanggal Lahir</label>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control" name="tmpt_lahir" required>
                                    </div>
                                    <div class="col-sm-4">
                                        <input type="date" class="form-control" name="tgl_lahir" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Pekerjaan</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="pekerjaan" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Alamat</label>
                                    <div class="col-sm-10">
                                        <textarea name="alamat" class="form-control" required></textarea>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Pengobatan</label>
                                    <div class="col-sm-10">
                                        <select class="form-control" id="jp" name="jp" required>
                                            <option selected disabled>-- Pilih --</option>
                                            <option value="Umum">Umum</option>
                                            <option value="BPJS">BPJS</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row" id="bpjs" hidden>
                                    <label class="col-sm-2 col-form-label">No. BPJS</label>
                                    <div class="col-sm-10">
                                        <input type="number" class="form-control" name="bpjs">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Poli</label>
                                    <div class="col-sm-10">
                                        <?= cmb_dinamis('id_poli', 'poli', 'nm_poli', 'id_poli', '', 'required') ?>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">No. HP</label>
                                    <div class="col-sm-10">
                                        <input type="number" class="form-control" name="hp" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-12">
                                        <button type="submit" name="submit" class="btn btn-sm bg-cyan float-right"><i class="fa fa-save"> Simpan</i></button>
                                        <button type="reset" class="btn btn-sm btn-danger float-right mr-1"><i class="fa fa-times-circle"> Batal</i></button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <!-- /.card-body -->
                    </div>
                </div>
                <!--/.col (left) -->
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<?php
include_once '../../template/footer.php';
?>
<script type='text/javascript'>
    $(window).load(function() {
        $("#jp").change(function() {
            console.log($("#jp option:selected").val());
            if ($("#jp option:selected").val() == 'BPJS') {
                $('#bpjs').prop('hidden', false);
            } else {
                $('#bpjs').prop('hidden', 'true');
            }
        });
    });
</script>
<?php
if (isset($_POST['submit'])) {
    $no_kartu = $_POST['no_kartu'];
    $nm_pasien = $_POST['nm_pasien'];
    $nik = $_POST['nik'];
    $jk = $_POST['jk'];
    $tmpt_lahir = $_POST['tmpt_lahir'];
    $tgl_lahir = $_POST['tgl_lahir'];
    $pekerjaan = $_POST['pekerjaan'];
    $alamat = $_POST['alamat'];
    $jp = $_POST['jp'];
    $bpjs = $_POST['bpjs'];
    $id_poli = $_POST['id_poli'];
    $hp = $_POST['hp'];
    $user = $_SESSION['id_user'];
    $today = date('Y-m-d');

    $tambah = $con->query("INSERT INTO pasien VALUES (
        '', 
        '$no_kartu', 
        '$nm_pasien', 
        '$nik', 
        '$jk',
        '$tmpt_lahir',
        '$tgl_lahir',
        '$pekerjaan',
        '$alamat',
        '$jp',
        '$bpjs',
        '$id_poli',
        '$hp',
        '$user',
        '$today'
    )");

    if ($tambah) {
        $_SESSION['pesan'] = "Data Berhasil di Simpan";
        echo "<meta http-equiv='refresh' content='0; url=index'>";
    } else {
        echo "Data anda gagal disimpan. Ulangi sekali lagi";
        echo "<meta http-equiv='refresh' content='0; url=tambah'>";
    }
}


?>