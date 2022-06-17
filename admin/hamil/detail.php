<?php
require '../../app/configtables.php';
$con = mysqli_connect($con['host'], $con['user'], $con['pass'], $con['db']);
if (mysqli_connect_errno()) {
    echo mysqli_connect_error();
}
?>

<form action="#" method="POST" target="blank">
    <div id="id<?= $id = $row[0]; ?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="custom-width-modalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <!-- <button type="button" class="close" data-dismiss="modal" aria-hidden="true">Close</button> -->
                    <h5 class="modal-title" id="custom-width-modalLabel"> <button type="button" class="btn btn-default waves-effect" data-dismiss="modal"><i class="fa fa-info-circle"></i></button> Detail Data Diagnosa Kehamilan</h5>
                    <button type="button" class="btn btn-default waves-effect" data-dismiss="modal"><i class="fa fa-window-close"></i></button>
                </div>
                <?php
                $q = $con->query("SELECT * FROM mcu_hamil m JOIN pasien p ON p.id_pasien = m.id_pasien JOIN dokter d ON d.id_dokter = m.id_dokter JOIN user u ON u.id_user = m.id_user WHERE id_mcu_hamil = '$id' ");
                $d = $q->fetch_array();
                $tgl = new DateTime($d['tgl_lahir']);
                $today = new DateTime('today');
                $y = $today->diff($tgl)->y;
                ?>
                <div class="modal-body">
                    <div class="col-md-12">
                        <div class="form-group">
                            <?php if ($d['verif'] == 1) { ?>
                                <a href="surat?id=<?= $id ?>" class="btn btn-sm btn-primary" target="_blank"> <i class="fa fa-print"></i> Cetak Surat</a>
                            <?php } ?>
                            <div class="card-body" style="text-align: left;">
                                <dl class="row">
                                    <dt class="col-sm-3">Nama Pasien</dt>
                                    <dd class="col-sm-9">: <?= $d['nm_pasien'] ?></dd>
                                    <dt class="col-sm-3">Nomor Kartu</dt>
                                    <dd class="col-sm-9">: <?= $d['no_kartu'] ?></dd>
                                    <dt class="col-sm-3">Jenis Kelamin</dt>
                                    <dd class="col-sm-9">: <?= $d['jk'] ?></dd>
                                    <dt class="col-sm-3">TTL</dt>
                                    <dd class="col-sm-9">: <?= $d['tmpt_lahir'] ?>, <?= tgl($d['tgl_lahir']) ?></dd>
                                    <dt class="col-sm-3">Usia</dt>
                                    <dd class="col-sm-9">: <?= $y . ' Tahun' ?></dd>
                                    <dt class="col-sm-3">Pengobatan</dt>
                                    <dd class="col-sm-9">: <?= $d['jp'] ?></dd>
                                    <?php if ($d['jp'] == 'BPJS') { ?>
                                        <dt class="col-sm-3">Nomor BPJS</dt>
                                        <dd class="col-sm-9">: <?= $d['bpjs'] ?></dd>
                                    <?php } ?>
                                </dl>
                                <hr>
                                <dl class="row">
                                    <dt class="col-sm-3">Untuk Keperluan</dt>
                                    <dd class="col-sm-9">: <?= $d['untuk'] ?></dd>
                                    <dt class="col-sm-3">Tanggal Periksa</dt>
                                    <dd class="col-sm-9">: <?= tgl($d['tanggal']) ?></dd>
                                    <dt class="col-sm-3">PST</dt>
                                    <dd class="col-sm-9">: <?= $d['pst'] ?></dd>
                                    <dt class="col-sm-3">Catatan Dokter</dt>
                                    <dd class="col-sm-9">: <?= $d['catatan'] ?></dd>
                                    <dt class="col-sm-3">Nama Dokter</dt>
                                    <dd class="col-sm-9">: <?= $d['nm_dokter'] ?></dd>
                                </dl>
                                <hr>
                                <dl class="row">
                                    <dt class="col-sm-3">Petugas</dt>
                                    <dd class="col-sm-9">: <?= $d['nm_user'] ?></dd>
                                </dl>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
</form>