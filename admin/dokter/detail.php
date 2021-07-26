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
                    <h5 class="modal-title" id="custom-width-modalLabel"> <button type="button" class="btn btn-default waves-effect" data-dismiss="modal"><i class="fa fa-info-circle"></i></button> Detail Data Dokter</h5>
                    <button type="button" class="btn btn-default waves-effect" data-dismiss="modal"><i class="fa fa-window-close"></i></button>
                </div>
                <?php
                $q = $con->query("SELECT * FROM dokter WHERE id_dokter = '$id' ");
                $d = $q->fetch_array();
                $tgl = new DateTime($d['tgl_masuk']);
                $today = new DateTime('today');
                $y = $today->diff($tgl)->y;
                ?>
                <div class="modal-body">
                    <div class="col-md-12">
                        <div class="form-group">
                            <div class="card-body" style="text-align: left;">
                                <dl class="row">
                                    <dt class="col-sm-3">Nama Dokter</dt>
                                    <dd class="col-sm-9">: <?= $d['nm_dokter'] ?></dd>
                                    <dt class="col-sm-3">NIP</dt>
                                    <dd class="col-sm-9">: <?= $d['nip'] ?></dd>
                                    <dt class="col-sm-3">SIP</dt>
                                    <dd class="col-sm-9">: <?= $d['sip'] ?></dd>
                                    <dt class="col-sm-3">Spesialis</dt>
                                    <dd class="col-sm-9">: <?= $d['spesialis'] ?></dd>
                                    <dt class="col-sm-3">Tanggal Mulai Kerja</dt>
                                    <dd class="col-sm-9">: <?= tgl($d['tgl_masuk']) ?></dd>
                                    <dt class="col-sm-3">Lama Kerja</dt>
                                    <dd class="col-sm-9">: <?= $y . ' Tahun' ?></dd>
                                    <dt class="col-sm-3">Alamat</dt>
                                    <dd class="col-sm-9">: <?= $d['alamat'] ?></dd>
                                    <dt class="col-sm-3">Nomor HP</dt>
                                    <dd class="col-sm-9">: <?= $d['hp'] ?></dd>
                                </dl>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
</form>