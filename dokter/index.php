<?php
require '../app/config.php';
include_once '../template/header.php';
include_once '../template/sidebar.php';

$log = $con->query("SELECT * FROM user WHERE id_user = '$_SESSION[id_user]' ")->fetch_array();

$rm = $con->query("SELECT COUNT(*) AS total FROM rm WHERE id_dokter = '$log[id_dokter]'")->fetch_array();
$mcu_mata = $con->query("SELECT COUNT(*) AS total FROM mcu_mata WHERE id_dokter = '$log[id_dokter]'")->fetch_array();
$mcu_jiwa = $con->query("SELECT COUNT(*) AS total FROM mcu_jiwa WHERE id_dokter = '$log[id_dokter]'")->fetch_array();
$mcu_sehat = $con->query("SELECT COUNT(*) AS total FROM mcu_sehat WHERE id_dokter = '$log[id_dokter]'")->fetch_array();
$mcu_napza = $con->query("SELECT COUNT(*) AS total FROM mcu_napza WHERE id_dokter = '$log[id_dokter]'")->fetch_array();
$mcu_virus = $con->query("SELECT COUNT(*) AS total FROM mcu_virus WHERE id_dokter = '$log[id_dokter]'")->fetch_array();
$mcu_hamil = $con->query("SELECT COUNT(*) AS total FROM mcu_hamil WHERE id_dokter = '$log[id_dokter]'")->fetch_array();
$mcu_fisik = $con->query("SELECT COUNT(*) AS total FROM mcu_fisik WHERE id_dokter = '$log[id_dokter]'")->fetch_array();
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">

        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-3">
                    <div class="info-box mb-3 bg-olive">
                        <span class="info-box-icon"><i class="fas fa-stethoscope"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">Rekam Medis</span>
                            <span class="info-box-number"><?= $rm['total'] ?> Data</span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="info-box mb-3 bg-olive">
                        <span class="info-box-icon"><i class="fas fa-eye"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">MCU Mata</span>
                            <span class="info-box-number"><?= $mcu_mata['total'] ?> Data</span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="info-box mb-3 bg-olive">
                        <span class="info-box-icon"><i class="fas fa-heartbeat"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">MCU Jiwa/Psikolog</span>
                            <span class="info-box-number"><?= $mcu_jiwa['total'] ?> Data</span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="info-box mb-3 bg-olive">
                        <span class="info-box-icon"><i class="fas fa-plus-square"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">MCU Keterangan Sehat</span>
                            <span class="info-box-number"><?= $mcu_sehat['total'] ?> Data</span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="info-box mb-3 bg-cyan">
                        <span class="info-box-icon"><i class="mdi mdi-human-handsup"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">MCU NAPZA</span>
                            <span class="info-box-number"><?= $mcu_napza['total'] ?> Data</span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="info-box mb-3 bg-cyan">
                        <span class="info-box-icon"><i class="mdi mdi-virus"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">MCU Virus</span>
                            <span class="info-box-number"><?= $mcu_virus['total'] ?> Data</span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="info-box mb-3 bg-cyan">
                        <span class="info-box-icon"><i class="mdi mdi-human-pregnant"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">MCU Kehamilan</span>
                            <span class="info-box-number"><?= $mcu_hamil['total'] ?> Data</span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="info-box mb-3 bg-cyan">
                        <span class="info-box-icon"><i class="mdi mdi-human-greeting"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">MCU Jantung & Fisik</span>
                            <span class="info-box-number"><?= $mcu_fisik['total'] ?> Data</span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                </div>
            </div>
        </div>
        <!--/. container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<?php
include_once '../template/footer.php';
?>