<?php
require '../../app/config.php';
include_once '../../template/header.php';
include_once '../../template/sidebar.php';

$id = $_GET['id'];
$query = $con->query(" SELECT * FROM mcu_sehat m JOIN pasien p ON p.id_pasien = m.id_pasien WHERE id_mcu_sehat ='$id'");
$row = $query->fetch_array();

?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <h4 class="m-0 text-dark"><i class="fa fa-plus-square ml-1 mr-1"></i> Edit Data Diagnosa Keterangan Sehat</h4>
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
                                    <label class="col-sm-2 col-form-label">Untuk Keperluan</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="untuk" class="form-control" value="<?= $row['untuk'] ?>" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Tanggal Periksa</label>
                                    <div class="col-sm-10">
                                        <input type="date" class="form-control" name="tanggal" value="<?= $row['tanggal'] ?>" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Tekanan Darah</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="tekanan" class="form-control" placeholder="Contoh : 120/80" required value="<?= $row['tekanan'] ?>">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Tinggi Badan</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="tinggi" class="form-control" value="<?= $row['tinggi'] ?>" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Berat Badan</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="berat" class="form-control" value="<?= $row['berat'] ?>" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Nadi</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="nadi" class="form-control" value="<?= $row['nadi'] ?>" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Respirasi</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="respirasi" class="form-control" value="<?= $row['respirasi'] ?>" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Suhu Badan</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="suhu" class="form-control" value="<?= $row['suhu'] ?>" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Hasil</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="hasil" class="form-control" value="<?= $row['hasil'] ?>" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Catatan Dokter</label>
                                    <div class="col-sm-10">
                                        <textarea name="catatan" class="form-control" required><?= $row['catatan'] ?></textarea>
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
    $untuk = $_POST['untuk'];
    $tanggal = $_POST['tanggal'];
    $tekanan = $_POST['tekanan'];
    $tinggi = $_POST['tinggi'];
    $berat = $_POST['berat'];
    $nadi = $_POST['nadi'];
    $respirasi = $_POST['respirasi'];
    $suhu = $_POST['suhu'];
    $hasil = $_POST['hasil'];
    $catatan = $_POST['catatan'];
    $id_dokter = $_POST['id_dokter'];


    $update = $con->query("UPDATE mcu_sehat SET 
        id_pasien = '$id_pasien',
        untuk = '$untuk',
        tanggal = '$tanggal',
        tekanan = '$tekanan',
        tinggi = '$tinggi',
        berat = '$berat',
        nadi = '$nadi',
        respirasi = '$respirasi',
        suhu = '$suhu',
        hasil = '$hasil',
        catatan = '$catatan',
        id_dokter = '$id_dokter'
        WHERE id_mcu_sehat = '$id'
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