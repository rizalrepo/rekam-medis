<?php
require '../../app/config.php';
include_once '../../template/header.php';
include_once '../../template/sidebar.php';

$id = $_GET['id'];
$query = $con->query(" SELECT * FROM dokter WHERE id_dokter ='$id'");
$row = $query->fetch_array();

$spesialis = [
    '' => '---Pilih---',
    'Umum' => 'Umum',
    'Spesialis Mata' => 'Spesialis Mata',
    'Spesialis Kesehatan Jiwa' => 'Spesialis Kesehatan Jiwa',
    'Spesialis Rehab Medik' => 'Spesialis Rehab Medik',
    'Spesialis Anastesi' => 'Spesialis Anastesi',
    'Spesialis Kandungan' => 'Spesialis Kandungan',
    'Spesialis Anak' => 'Spesialis Anak',
    'Spesialis Penyakit Dalam' => 'Spesialis Penyakit Dalam',
    'Spesialis Bedah' => 'Spesialis Bedah',
    'Spesialis Syaraf' => 'Spesialis Syaraf',
    'Spesialis Orthopedi' => 'Spesialis Orthopedi',
    'Spesialis Kulit dan Kelamin' => 'Spesialis Kulit dan Kelamin',
    'Spesialis THT' => 'Spesialis THT',
    'Spesialis Bedah Mulut' => 'Spesialis Bedah Mulut',
];
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <h4 class="m-0 text-dark"><i class="fa fa-user-md ml-1 mr-1"></i> Edit Data Dokter</h4>
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
                                    <label class="col-sm-2 col-form-label">Nama Dokter</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="nm_dokter" value="<?= $row['nm_dokter'] ?>" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">NIP</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="nip" value="<?= $row['nip'] ?>" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">SIP</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="sip" value="<?= $row['sip'] ?>" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Spesialis</label>
                                    <div class="col-sm-10">
                                        <?= form_dropdown('spesialis', $spesialis, $row['spesialis'], 'class="form-control" required') ?>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Tanggal Mulai Kerja</label>
                                    <div class="col-sm-10">
                                        <input type="date" class="form-control" name="tgl_masuk" value="<?= $row['tgl_masuk'] ?>" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Alamat</label>
                                    <div class="col-sm-10">
                                        <textarea name="alamat" class="form-control" required><?= $row['alamat'] ?></textarea>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">No. HP</label>
                                    <div class="col-sm-10">
                                        <input type="number" class="form-control" name="hp" value="<?= $row['hp'] ?>" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-12">
                                        <button type="submit" name="submit" class="btn btn-sm bg-cyan float-right"><i class="fa fa-save"> Update</i></button>
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

<?php
if (isset($_POST['submit'])) {
    $nm_dokter = $_POST['nm_dokter'];
    $nip = $_POST['nip'];
    $sip = $_POST['sip'];
    $spesialis = $_POST['spesialis'];
    $tgl_masuk = $_POST['tgl_masuk'];
    $alamat = $_POST['alamat'];
    $hp = $_POST['hp'];

    $update = $con->query("UPDATE dokter SET 
        nm_dokter = '$nm_dokter', 
        nip = '$nip', 
        sip = '$sip', 
        spesialis = '$spesialis', 
        tgl_masuk = '$tgl_masuk', 
        alamat = '$alamat', 
        hp = '$hp'
        WHERE id_dokter = '$id'
    ");

    if ($update) {
        $_SESSION['pesan'] = "Data Berhasil di Update";
        echo "<meta http-equiv='refresh' content='0; url=index'>";
    } else {
        echo "Data anda gagal diubah. Ulangi sekali lagi";
        echo "<meta http-equiv='refresh' content='0; url=edit?id=$id'>";
    }
}


?>