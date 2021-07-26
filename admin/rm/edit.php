<?php
require '../../app/config.php';
include_once '../../template/header.php';
include_once '../../template/sidebar.php';

$id = $_GET['id'];
$query = $con->query(" SELECT * FROM rm r JOIN pasien p ON p.id_pasien = r.id_pasien WHERE id_rm ='$id'");
$row = $query->fetch_array();

?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <h4 class="m-0 text-dark"><i class="fa fa-stethoscope ml-1 mr-1"></i> Edit Data Rekam Medis</h4>
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
                                    <label class="col-sm-2 col-form-label">Kode RM</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" value="<?= $row['id_rm'] ?>" required readonly>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Nama Pasien</label>
                                    <div class="col-sm-10">
                                        <select name="id_pasien" class="form-control select2" style="width: 100%;" onchange="changeValue(this.value)">
                                            <?php
                                            $jsArray = "var data = new Array();";
                                            $q = $con->query("SELECT * FROM pasien ORDER BY id_pasien DESC");
                                            while ($d = $q->fetch_array()) {
                                                if ($d['id_pasien'] == $row['id_pasien']) {
                                            ?>
                                                    <option value="<?= $d['id_pasien']; ?>" selected="<?= $d['id_pasien']; ?>"><?= $d['nm_pasien'] ?></option>
                                                <?php
                                                } else {
                                                ?>
                                                    <option value="<?= $d['id_pasien'] ?>"><?= $d['nm_pasien'] ?></option>
                                            <?php
                                                }
                                                $jsArray .= "data['" . $d['id_pasien'] . "'] = { jk:'" . addslashes($d['jk']) . "', tmpt_lahir:'" . addslashes($d['tmpt_lahir']) . "', tgl_lahir:'" . addslashes($d['tgl_lahir']) . "', jp:'" . addslashes($d['jp']) . "'};";
                                            }
                                            ?>
                                        </select>
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
                                    <label class="col-sm-2 col-form-label">Tanggal Periksa</label>
                                    <div class="col-sm-10">
                                        <input type="date" class="form-control" name="tanggal" value="<?= $row['tanggal'] ?>" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Poli</label>
                                    <div class="col-sm-10">
                                        <select name="id_poli" class="form-control select2" style="width: 100%;">
                                            <?php
                                            $q = $con->query("SELECT * FROM poli ORDER BY id_poli DESC");
                                            while ($d = $q->fetch_array()) {
                                                if ($d['id_poli'] == $row['id_poli']) {
                                            ?>
                                                    <option value="<?= $d['id_poli']; ?>" selected="<?= $d['id_poli']; ?>"><?= $d['nm_poli'] ?></option>
                                                <?php
                                                } else {
                                                ?>
                                                    <option value="<?= $d['id_poli'] ?>"><?= $d['nm_poli'] ?></option>
                                            <?php
                                                }
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Keluhan</label>
                                    <div class="col-sm-10">
                                        <textarea name="keluhan" class="form-control" required><?= $row['keluhan'] ?></textarea>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Diagnosis</label>
                                    <div class="col-sm-10">
                                        <textarea name="diagnosis" class="form-control" required><?= $row['diagnosis'] ?></textarea>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Nama Dokter</label>
                                    <div class="col-sm-10">
                                        <select name="id_dokter" class="form-control select2" style="width: 100%;">
                                            <?php
                                            $q = $con->query("SELECT * FROM dokter ORDER BY id_dokter DESC");
                                            while ($d = $q->fetch_array()) {
                                                if ($d['id_dokter'] == $row['id_dokter']) {
                                            ?>
                                                    <option value="<?= $d['id_dokter']; ?>" selected="<?= $d['id_dokter']; ?>"><?= $d['nm_dokter'] ?> | NIP. <?= $d['nip'] ?></option>
                                                <?php
                                                } else {
                                                ?>
                                                    <option value="<?= $d['id_dokter'] ?>"><?= $d['nm_dokter'] ?> | NIP. <?= $d['nip'] ?></option>
                                            <?php
                                                }
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Tindak Lanjut</label>
                                    <div class="col-sm-10">
                                        <textarea name="tindakan" class="form-control" required><?= $row['tindakan'] ?></textarea>
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
    $tanggal = $_POST['tanggal'];
    $id_poli = $_POST['id_poli'];
    $keluhan = $_POST['keluhan'];
    $diagnosis = $_POST['diagnosis'];
    $id_dokter = $_POST['id_dokter'];
    $tindakan = $_POST['tindakan'];


    $update = $con->query("UPDATE rm SET 
        id_pasien = '$id_pasien',
        tanggal = '$tanggal',
        id_poli = '$id_poli',
        keluhan = '$keluhan',
        diagnosis = '$diagnosis',
        id_dokter = '$id_dokter',
        tindakan = '$tindakan'
        WHERE id_rm = '$id'
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