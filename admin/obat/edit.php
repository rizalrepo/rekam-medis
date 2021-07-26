<?php
require '../../app/config.php';
include_once '../../template/header.php';
include_once '../../template/sidebar.php';

$id = $_GET['id'];
$query = $con->query("SELECT * FROM obat WHERE id_obat ='$id'");
$row = $query->fetch_array();

$bentuk = [
    '' => '-- Pilih --',
    'Bedak' => 'Bedak',
    'Flexpen' => 'Flexpen',
    'Gel' => 'Gel',
    'Infus' => 'Infus',
    'Injeksi' => 'Injeksi',
    'Kapsul' => 'Kapsul',
    'Larutan' => 'Larutan',
    'LMB' => 'LMB',
    'Nasal Spray' => 'Nasal Spray',
    'Nebules' => 'Nebules',
    'Obat Kumur' => 'Obat Kumur',
    'Respules' => 'Respules',
    'Salep Kulit' => 'Salep Kulit',
    'Salep Mata' => 'Salep Mata',
    'Serbuk' => 'Serbuk',
    'SM' => 'SM',
    'Spray' => 'Spray',
    'Supp' => 'Supp',
    'Syrup' => 'Syrup',
    'Tab Ovula' => 'Tab Ovula',
    'Tablet' => 'Tablet',
    'Tablet ER' => 'Tablet ER',
    'Tetes Mata' => 'Tetes Mata',
    'Tetes Telinga' => 'Tetes Telinga',
];
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <h4 class="m-0 text-dark"><i class="fa fa-pills ml-1 mr-1"></i> Edit Data Obat</h4>
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
                                    <label class="col-sm-2 col-form-label">Nama Obat</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="nm_obat" value="<?= $row['nm_obat'] ?>" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Kekuatan</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="kekuatan" value="<?= $row['kekuatan'] ?>" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Bentuk</label>
                                    <div class="col-sm-10">
                                        <?= form_dropdown('bentuk', $bentuk, $row['bentuk'], 'class="form-control" required') ?>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Harga Satuan</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="harga" value="<?= $row['harga'] ?>" required>
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
    $nm_obat = $_POST['nm_obat'];
    $kekuatan = $_POST['kekuatan'];
    $bentuk = $_POST['bentuk'];
    $harga = $_POST['harga'];

    $update = $con->query("UPDATE obat SET 
        nm_obat = '$nm_obat', 
        kekuatan = '$kekuatan',
        bentuk = '$bentuk',
        harga = '$harga'
        WHERE id_obat = '$id'
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