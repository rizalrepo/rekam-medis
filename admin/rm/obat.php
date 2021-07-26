<?php
require '../../app/config.php';
include_once '../../template/header.php';
include_once '../../template/sidebar.php';

$id = $_GET['id'];
$query = $con->query("SELECT * FROM rm_obat ro JOIN rm r ON ro.id_rm = r.id_rm JOIN pasien p ON p.id_pasien = r.id_pasien WHERE ro.id_rm ='$id'");
$row = $query->fetch_array();
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <h4 class="m-0 text-dark"><i class="fa fa-pills ml-1 mr-1"></i> Tambah Data Obat</h4>
                </div><!-- /.col -->
                <div class="col-sm-6 text-right">
                    <a href="index" class="btn btn-xs bg-dark float-right"><i class="fa fa-stethoscope"> Data Rekam Medis</i></a>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-4">
                    <div class="card card-olive card-outline">
                        <div class="card-body" style="background-color: white;">
                            <form class="form-horizontal" method="POST" action="" enctype="multipart/form-data">
                                <div class="form-group row">
                                    <label class="col-form-label">Nama Obat</label>
                                    <select name="id_obat" class="form-control select2" style="width: 100%;">
                                        <option value="">-- Pilih --</option>
                                        <?php $data = $con->query("SELECT * FROM obat ORDER BY id_obat DESC"); ?>
                                        <?php foreach ($data as $dt) : ?>
                                            <option value="<?= $dt['id_obat'] ?>"><?= $dt['nm_obat'] ?></option>
                                        <?php endforeach ?>
                                    </select>
                                </div>
                                <div class="form-group row">
                                    <label class="col-form-label">Jumlah</label>
                                    <input type="number" class="form-control" name="jumlah" required>
                                </div>
                                <div class="form-group row">
                                    <label class="col-form-label">Dosis</label>
                                    <input type="text" class="form-control" name="dosis" required>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-12">
                                        <button type="submit" name="submit" class="btn btn-sm bg-cyan float-right"><i class="fa fa-save"> Simpan</i></button>
                                        <button type="reset" class="btn btn-sm btn-danger float-right mr-1"><i class="fa fa-times-circle"> Batal</i></button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-md-8">
                    <!-- Horizontal Form -->
                    <div class="card card-olive card-outline">
                        <!-- form start -->
                        <div class="card-body" style="background-color: white;">
                            <div class="text-center">
                                <p>
                                    <b>
                                        Kode RM : <?= $row['id_rm'] ?><br>
                                        Nama Pasien : <?= $row['nm_pasien'] ?>
                                    </b>
                                </p>
                            </div>
                            <hr>
                            <?php if (isset($_SESSION['pesan']) && $_SESSION['pesan'] <> '') { ?>
                                <div id="notif" class="alert bg-teal" role="alert"><i class="fa fa-check-circle mr-2"></i><b><?= $_SESSION['pesan'] ?></b></div>
                            <?php $_SESSION['pesan'] = '';
                            } ?>

                            <div class="table-responsive">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead class="bg-olive">
                                        <tr align="center">
                                            <th>No</th>
                                            <th>Nama Obat</th>
                                            <th>Jumlah</th>
                                            <th>Dosis</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <?php
                                        $no = 1;
                                        $data = $con->query("SELECT * FROM rm_obat ro LEFT JOIN rm r ON r.id_rm = ro.id_rm LEFT JOIN obat o ON o.id_obat = ro.id_obat WHERE ro.id_rm = '$id' ORDER BY id_rm_obat DESC");
                                        while ($row = $data->fetch_array()) {
                                        ?>
                                            <tr>
                                                <td align="center" width="5%"><?= $no++ ?></td>
                                                <td><?= $row['nm_obat'] ?></td>
                                                <td align="center"><?= $row['jumlah'] ?></td>
                                                <td align="center"><?= $row['dosis'] ?></td>
                                                <td align="center" width="5%">
                                                    <a href="hapus-obat?id=<?= $row[0] ?>&idm=<?= $id ?>" class="btn btn-danger btn-xs alert-hapus mt-1" title="Hapus"><i class="fa fa-trash"></i></a>
                                                </td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>

                                </table>
                            </div>
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

if (isset($_POST['submit'])) {
    $a = $_POST['id_obat'];
    $b = $_POST['jumlah'];
    $c = $_POST['dosis'];

    $tambah = $con->query("INSERT INTO rm_obat VALUES (
        '', 
        '$id',
        '$a', 
        '$b',
        '$c'
    )");

    if ($tambah) {
        $_SESSION['pesan'] = "Data Berhasil di Simpan";
        echo "<meta http-equiv='refresh' content='0; url=obat?id=$id'>";
    } else {
        echo "Data anda gagal disimpan. Ulangi sekali lagi";
        echo "<meta http-equiv='refresh' content='0; url=obat?id=$id'>";
    }
}
?>