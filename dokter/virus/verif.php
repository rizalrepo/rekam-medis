<?php
require '../../app/config.php';
include_once '../../template/header.php';
include_once '../../template/sidebar.php';

$id = $_GET['id'];
$query = $con->query(" SELECT * FROM mcu_virus m JOIN pasien p ON p.id_pasien = m.id_pasien WHERE id_mcu_virus ='$id'");
$row = $query->fetch_array();

$covid = [
    '' => '-- Pilih --',
    'Reaktif' => 'Reaktif',
    'Non Reaktif' => 'Non Reaktif',
];

$hepatitis = [
    '' => '-- Pilih --',
    'Reaktif' => 'Reaktif',
    'Non Reaktif' => 'Non Reaktif',
];

$hiv = [
    '' => '-- Pilih --',
    'Reaktif' => 'Reaktif',
    'Non Reaktif' => 'Non Reaktif',
];
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <h4 class="m-0 text-dark"><i class="mdi mdi-virus ml-1 mr-1"></i> Verifikasi Data Diagnosa Virus</h4>
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
                                    <label class="col-sm-2 col-form-label">Nama Pasien</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="nm_pasien" value="<?= $row['nm_pasien'] ?>" readonly>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Nomor Kartu</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="no_kartu" value="<?= $row['no_kartu'] ?>" readonly>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Jenis Kelamin</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="jk" value="<?= $row['jk'] ?>" readonly>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Tempat Tanggal Lahir</label>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control" id="tmpt_lahir" placeholder="Tempat Lahir" value="<?= $row['tmpt_lahir'] ?>" readonly>
                                    </div>
                                    <div class="col-sm-4">
                                        <input type="date" class="form-control" id="tgl_lahir" placeholder="Tanggal Lahir" value="<?= $row['tgl_lahir'] ?>" readonly>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Pengobatan</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="jp" value="<?= $row['jp'] ?>" readonly>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Untuk Keperluan</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="untuk" class="form-control" value="<?= $row['untuk'] ?>" readonly>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Tanggal Periksa</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" value="<?= tgl($row['tanggal']) ?>" readonly>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Covid 19</label>
                                    <div class="col-sm-10">
                                        <?= form_dropdown('covid', $covid, $row['covid'], 'class="form-control" required') ?>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Hepatitis</label>
                                    <div class="col-sm-10">
                                        <?= form_dropdown('hepatitis', $hepatitis, $row['hepatitis'], 'class="form-control" required') ?>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">HIV</label>
                                    <div class="col-sm-10">
                                        <?= form_dropdown('hiv', $hiv, $row['hiv'], 'class="form-control" required') ?>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Catatan Dokter</label>
                                    <div class="col-sm-10">
                                        <textarea name="catatan" class="form-control" required><?= $row['catatan'] ?></textarea>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-12">
                                        <button type="submit" name="submit" class="btn btn-sm bg-cyan float-right"><i class="fa fa-save"> Verifikasi</i></button>
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

    $covid = $_POST['covid'];
    $hepatitis = $_POST['hepatitis'];
    $hiv = $_POST['hiv'];
    $catatan = $_POST['catatan'];


    $update = $con->query("UPDATE mcu_virus SET 
        covid = '$covid',
        hepatitis = '$hepatitis',
        hiv = '$hiv',
        catatan = '$catatan',
        verif = 1
        WHERE id_mcu_virus = '$id'
    ");

    if ($update) {
        $_SESSION['pesan'] = "Data Berhasil di Update";
        echo "<meta http-equiv='refresh' content='0; url=index'>";
    } else {
        echo "Data anda gagal diubah. Ulangi sekali lagi";
        echo "<meta http-equiv='refresh' content='0; url=verif?id=$id'>";
    }
}


?>