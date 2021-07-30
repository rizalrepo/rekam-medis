<?php
require '../../app/config.php';
include_once '../../template/header.php';
include_once '../../template/sidebar.php';

$id = $_GET['id'];
$query = $con->query(" SELECT * FROM pasien WHERE id_pasien ='$id'");
$row = $query->fetch_array();

$jk = [
    '' => '---Pilih---',
    'Laki-laki' => 'Laki-laki',
    'Perempuan' => 'Perempuan',
];
$jp = [
    '' => '---Pilih---',
    'Umum' => 'Umum',
    'BPJS' => 'BPJS',
];
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <h4 class="m-0 text-dark"><i class="fa fa-users ml-1 mr-1"></i> Edit Data Pasien</h4>
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
                                        <input type="text" class="form-control" name="no_kartu" value="<?= $row['no_kartu'] ?>" readonly>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Nama Pasien</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="nm_pasien" value="<?= $row['nm_pasien'] ?>" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">NIK</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="nik" value="<?= $row['nik'] ?>" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Jenis Kelamin</label>
                                    <div class="col-sm-10">
                                        <?= form_dropdown('jk', $jk, $row['jk'], 'class="form-control" required') ?>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Tempat Tanggal Lahir</label>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control" name="tmpt_lahir" value="<?= $row['tmpt_lahir'] ?>" required>
                                    </div>
                                    <div class="col-sm-4">
                                        <input type="date" class="form-control" name="tgl_lahir" value="<?= $row['tgl_lahir'] ?>" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Pekerjaan</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="pekerjaan" value="<?= $row['pekerjaan'] ?>" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Alamat</label>
                                    <div class="col-sm-10">
                                        <textarea name="alamat" class="form-control" required><?= $row['alamat'] ?></textarea>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Pengobatan</label>
                                    <div class="col-sm-10">
                                        <?= form_dropdown('jp', $jp, $row['jp'], 'class="form-control" required id="jp"') ?>
                                    </div>
                                </div>
                                <?php if ($row['jp'] == 'BPJS') {
                                    $tampil = '';
                                } else {
                                    $tampil = 'hidden';
                                } ?>

                                <div class="form-group row" id="bpjs" <?= $tampil ?>>
                                    <label class="col-sm-2 col-form-label">No. BPJS</label>
                                    <div class="col-sm-10">
                                        <input type="number" class="form-control" name="bpjs" value="<?= $row['bpjs'] ?>">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Poli</label>
                                    <div class="col-sm-10">
                                        <?= cmb_dinamis('id_poli', 'poli', 'nm_poli', 'id_poli', $row['id_poli'], 'required') ?>
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

    $update = $con->query("UPDATE pasien SET 
        nm_pasien = '$nm_pasien', 
        nik = '$nik', 
        jk = '$jk',
        tmpt_lahir = '$tmpt_lahir',
        tgl_lahir = '$tgl_lahir',
        pekerjaan = '$pekerjaan',
        alamat = '$alamat',
        jp = '$jp',
        bpjs = '$bpjs',
        id_poli = '$id_poli',
        hp = '$hp'
        WHERE id_pasien = '$id'
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