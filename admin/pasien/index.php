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
                    <h4 class="m-0 text-dark"><i class="fa fa-users ml-1 mr-1"></i> Data Pasien</h4>
                </div><!-- /.col -->
                <div class="col-sm-6 text-right">
                    <?php if ($_SESSION['level'] == 2) { ?>
                        <a href="tambah" class="btn btn-sm bg-dark"><i class="fa fa-plus-circle"> Tambah Data</i></a>
                    <?php } ?>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <!-- Horizontal Form -->
                    <div class="card card-olive card-outline">
                        <!-- form start -->
                        <div class="card-body" style="background-color: white;">

                            <?php if (isset($_SESSION['pesan']) && $_SESSION['pesan'] <> '') { ?>
                                <div id="notif" class="alert bg-teal" role="alert"><i class="fa fa-check-circle mr-2"></i><b><?= $_SESSION['pesan'] ?></b></div>
                            <?php $_SESSION['pesan'] = '';
                            } ?>

                            <div class="table-responsive">
                                <table id="example1" class="table table-bordered table-striped dataTable">
                                    <thead class="bg-olive">
                                        <tr align="center">
                                            <th>No</th>
                                            <th>Nama Pasien</th>
                                            <th>NIK</th>
                                            <th>Jenis Kelamin</th>
                                            <th>Usia</th>
                                            <th>Pengobatan</th>
                                            <th>No. HP</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <?php
                                        $no2 = 1;
                                        $data = $con->query("SELECT * FROM pasien ORDER BY id_pasien DESC");
                                        while ($row = $data->fetch_array()) {
                                            $tgl = new DateTime($row['tgl_lahir']);
                                            $today = new DateTime('today');
                                            $y = $today->diff($tgl)->y;
                                        ?>
                                            <tr>
                                                <td align="center" width="5%"><?= $no2++ ?></td>
                                                <td><?= $row['nm_pasien'] ?></td>
                                                <td align="center"><?= $row['nik'] ?></td>
                                                <td align="center"><?= $row['jk'] ?></td>
                                                <td align="center"><?= $y . ' Tahun' ?></td>
                                                <td align="center"><?= $row['jp'] ?></td>
                                                <td align="center"><?= $row['hp'] ?></td>
                                                <td align="center" width="13%">
                                                    <a href="#id<?= $row[0]; ?>" data-toggle="modal" class="btn bg-purple btn-xs" title="Detail"><i class="fa fa-info-circle"></i></a>
                                                    <a href="edit?id=<?= $row[0] ?>" class="btn btn-info btn-xs" title="Edit"><i class="fa fa-edit"></i></a>
                                                    <a href="hapus?id=<?= $row[0] ?>" class="btn btn-danger btn-xs alert-hapus" title="Hapus"><i class="fa fa-trash"></i></a>
                                                    <?php include('detail.php'); ?>
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
?>