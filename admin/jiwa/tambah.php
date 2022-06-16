<?php
require '../../app/config.php';
include_once '../../template/header.php';
include_once '../../template/sidebar.php';
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <h4 class="m-0 text-dark"><i class="fa fa-heartbeat ml-1 mr-1"></i> Tambah Data Diagnosa Jiwa/Psikolog</h4>
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
                                    <div class="col-sm-10 input-group">
                                        <input type="text" class="form-control" hidden name="id_pasien" id="id_pasien" required>
                                        <input type="text" class="form-control" id="nm_pasien" required readonly>
                                        <span class="input-group-append">
                                            <button type="button" data-toggle="modal" data-target="#modal_pasien" class="btn btn-info btn-flat"><i class="fa fa-search"></i></button>
                                        </span>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Nomor Kartu</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="no_kartu" readonly>
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
<div class="modal fade" id="modal_pasien" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Pilih Pasien</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="table-responsive">
                    <table id="example1" class="table table-bordered">
                        <thead class="bg-lightblue">
                            <tr align="center">
                                <th>No</th>
                                <th>Nomor Kartu</th>
                                <th>Nama Pasien</th>
                                <th>NIK</th>
                                <th>Jenis Kelamin</th>
                                <th>Jenis Pengobatan</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php
                            $no = 1;
                            $data = $con->query("SELECT * FROM pasien ORDER BY id_pasien ASC");
                            while ($row = $data->fetch_array()) {
                            ?>
                                <tr>
                                    <td align="center" width="5%"><?= $no++ ?></td>
                                    <td align="center"><?= $row['no_kartu'] ?></td>
                                    <td><?= $row['nm_pasien'] ?></td>
                                    <td align="center"><?= $row['nik'] ?></td>
                                    <td align="center"><?= $row['jk'] ?></td>
                                    <td align="center"><?= $row['jp'] ?></td>
                                    <td align="center" width="18%">
                                        <button class="btn btn-xs btn-success" id="select" data-nm_pasien="<?= $row['nm_pasien'] ?>" data-id_pasien="<?= $row['id_pasien'] ?>" data-tmpt_lahir="<?= $row['tmpt_lahir']  ?>" data-tgl_lahir="<?= $row['tgl_lahir'] ?>" data-no_kartu="<?= $row['no_kartu'] ?>" data-jk="<?= $row['jk'] ?>" data-jp="<?= $row['jp'] ?>">
                                            Pilih
                                        </button>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>

                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
include_once '../../template/footer.php';
?>
<script type="text/javascript">
    $(document).ready(function() {
        $(document).on('click', '#select', function() {
            var nm_pasien = $(this).data('nm_pasien');
            var id_pasien = $(this).data('id_pasien');
            var no_kartu = $(this).data('no_kartu');
            var tmpt_lahir = $(this).data('tmpt_lahir');
            var tgl_lahir = $(this).data('tgl_lahir');
            var jk = $(this).data('jk');
            var jp = $(this).data('jp');
            $('#nm_pasien').val(nm_pasien);
            $('#id_pasien').val(id_pasien);
            $('#no_kartu').val(no_kartu);
            $('#tmpt_lahir').val(tmpt_lahir);
            $('#tgl_lahir').val(tgl_lahir);
            $('#jk').val(jk);
            $('#jp').val(jp);
            $('#modal_pasien').modal('hide');
        });
    })
</script>
<?php
if (isset($_POST['submit'])) {
    $id_pasien = $_POST['id_pasien'];
    $untuk = $_POST['untuk'];
    $tanggal = $_POST['tanggal'];
    $rohani = $_POST['rohani'];
    $psikolog = $_POST['psikolog'];
    $catatan = $_POST['catatan'];
    $id_dokter = $_POST['id_dokter'];
    $user = $_SESSION['id_user'];

    $tambah = $con->query("INSERT INTO mcu_jiwa VALUES (
        '',
        '$id_pasien', 
        '$untuk', 
        '$tanggal', 
        null,
        null,
        null,
        '$id_dokter',
        '$user',
        0
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