<?php
require '../../app/config.php';
include_once '../../template/header.php';
include_once '../../template/sidebar.php';

$tatto = [
    '' => '-- Pilih --',
    'Bertatto' => 'Bertatto',
    'Tidak Bertatto' => 'Tidak Bertatto',
];
$cacat = [
    '' => '-- Pilih --',
    'Ada' => 'Ada',
    'Tidak Ada' => 'Tidak Ada',
];
$terbang = [
    '' => '-- Pilih --',
    'Laik Terbang' => 'Laik Terbang',
    'Tidak Laik Terbang' => 'Tidak Laik Terbang',
];
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <h4 class="m-0 text-dark"><i class="mdi mdi-human-greeting ml-1 mr-1"></i> Tambah Data Diagnosa Jantung & Fisik</h4>
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
                                        <select name="id_pasien" class="form-control select2" style="width: 100%;" onchange="changeValue(this.value)">
                                            <option value="">-- Pilih --</option>
                                            <?php
                                            $jsArray = "var data = new Array();";
                                            $data = $con->query("SELECT * FROM pasien ORDER BY id_pasien DESC"); ?>
                                            <?php foreach ($data as $row) : ?>
                                                <option value="<?= $row['id_pasien'] ?>"><?= $row['nm_pasien'] ?></option>
                                            <?php
                                                $jsArray .= "data['" . $row['id_pasien'] . "'] = { jk:'" . addslashes($row['jk']) . "', tmpt_lahir:'" . addslashes($row['tmpt_lahir']) . "', tgl_lahir:'" . addslashes($row['tgl_lahir']) . "', jp:'" . addslashes($row['jp']) . "'};";
                                            endforeach ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Jenis Kelamin</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="jk" readonly>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Tempat Tanggal Lahir</label>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control" id="tmpt_lahir" placeholder="Tempat Lahir" readonly>
                                    </div>
                                    <div class="col-sm-4">
                                        <input type="date" class="form-control" id="tgl_lahir" placeholder="Tanggal Lahir" readonly>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Pengobatan</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="jp" readonly>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Untuk Keperluan</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="untuk" class="form-control" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Tanggal Periksa</label>
                                    <div class="col-sm-10">
                                        <input type="date" class="form-control" name="tanggal" value="<?= date('Y-m-d') ?>" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">EKG</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="ekg" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Tatto</label>
                                    <div class="col-sm-10">
                                        <?= form_dropdown('tatto', $tatto, '', 'class="form-control" required') ?>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Cacat Fisik</label>
                                    <div class="col-sm-10">
                                        <?= form_dropdown('cacat', $cacat, '', 'class="form-control" required') ?>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Laik Terbang</label>
                                    <div class="col-sm-10">
                                        <?= form_dropdown('terbang', $terbang, '', 'class="form-control" required') ?>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Catatan Dokter</label>
                                    <div class="col-sm-10">
                                        <textarea name="catatan" class="form-control" required></textarea>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Nama Dokter</label>
                                    <div class="col-sm-10">
                                        <select name="id_dokter" class="form-control select2" style="width: 100%;">
                                            <option value="">-- Pilih --</option>
                                            <?php $data = $con->query("SELECT * FROM dokter ORDER BY id_dokter DESC"); ?>
                                            <?php foreach ($data as $row) : ?>
                                                <option value="<?= $row['id_dokter'] ?>"><?= $row['nm_dokter'] ?> | NIP. <?= $row['nip'] ?></option>
                                            <?php endforeach ?>
                                        </select>
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
<script type="text/javascript">
    <?= $jsArray ?>

    function changeValue(id_pasien) {
        document.getElementById('jk').value = data[id_pasien].jk;
        document.getElementById('tmpt_lahir').value = data[id_pasien].tmpt_lahir;
        document.getElementById('tgl_lahir').value = data[id_pasien].tgl_lahir;
        document.getElementById('jp').value = data[id_pasien].jp;
    }
</script>
<?php
if (isset($_POST['submit'])) {
    $id_pasien = $_POST['id_pasien'];
    $untuk = $_POST['untuk'];
    $tanggal = $_POST['tanggal'];
    $ekg = $_POST['ekg'];
    $tatto = $_POST['tatto'];
    $cacat = $_POST['cacat'];
    $terbang = $_POST['terbang'];
    $catatan = $_POST['catatan'];
    $id_dokter = $_POST['id_dokter'];
    $user = $_SESSION['id_user'];

    $tambah = $con->query("INSERT INTO mcu_fisik VALUES (
        '',
        '$id_pasien', 
        '$untuk', 
        '$tanggal', 
        '$ekg',
        '$tatto',
        '$cacat',
        '$terbang',
        '$catatan',
        '$id_dokter',
        '$user'
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