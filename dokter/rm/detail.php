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
                    <h5 class="modal-title" id="custom-width-modalLabel"> <button type="button" class="btn btn-default waves-effect" data-dismiss="modal"><i class="fa fa-info-circle"></i></button> Detail Data Rekam Medis</h5>
                    <button type="button" class="btn btn-default waves-effect" data-dismiss="modal"><i class="fa fa-window-close"></i></button>
                </div>
                <?php
                $q = $con->query("SELECT * FROM rm r JOIN pasien p ON p.id_pasien = r.id_pasien JOIN poli pl ON pl.id_poli = r.id_poli JOIN dokter d ON d.id_dokter = r.id_dokter JOIN user u ON u.id_user = r.id_user WHERE id_rm = '$id' ");
                $d = $q->fetch_array();
                $tgl = new DateTime($d['tgl_lahir']);
                $today = new DateTime('today');
                $y = $today->diff($tgl)->y;
                ?>
                <div class="modal-body">
                    <div class="col-md-12">
                        <div class="form-group">
                            <div class="card-body" style="text-align: left;">
                                <dl class="row">
                                    <dt class="col-sm-3">Kode Rekam Medis</dt>
                                    <dd class="col-sm-9">: <?= $d['id_rm'] ?></dd>
                                </dl>
                                <hr>
                                <dl class="row">
                                    <dt class="col-sm-3">Nomor Kartu</dt>
                                    <dd class="col-sm-9">: <?= $d['no_kartu'] ?></dd>
                                    <dt class="col-sm-3">Nama Pasien</dt>
                                    <dd class="col-sm-9">: <?= $d['nm_pasien'] ?></dd>
                                    <dt class="col-sm-3">NIK</dt>
                                    <dd class="col-sm-9">: <?= $d['nik'] ?></dd>
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
                                    <dt class="col-sm-3">Tanggal Periksa</dt>
                                    <dd class="col-sm-9">: <?= tgl($d['tanggal']) ?></dd>
                                    <dt class="col-sm-3">Poli</dt>
                                    <dd class="col-sm-9">: <?= $d['nm_poli'] ?></dd>
                                    <dt class="col-sm-3">Keluhan</dt>
                                    <dd class="col-sm-9">: <?= $d['keluhan'] ?></dd>
                                    <dt class="col-sm-3">Diagnosis</dt>
                                    <dd class="col-sm-9">: <?= $d['diagnosis'] ?></dd>
                                    <dt class="col-sm-3">Nama Dokter</dt>
                                    <dd class="col-sm-9">: <?= $d['nm_dokter'] ?></dd>
                                    <dt class="col-sm-3">Tindak Lanjut</dt>
                                    <dd class="col-sm-9">: <?= $d['tindakan'] ?></dd>
                                </dl>
                                <hr>
                                <?php
                                $cek = $con->query("SELECT * FROM rm_obat ro LEFT JOIN obat o ON o.id_obat = ro.id_obat WHERE ro.id_rm = '$id' ")->fetch_array();
                                if (!empty($cek['id_rm'])) {
                                ?>
                                    <table class="table table-striped table-bordered">
                                        <thead class="bg-olive">
                                            <tr align="center">
                                                <th>No.</th>
                                                <th>Nama Obat</th>
                                                <th>Kekuatan</th>
                                                <th>Jumlah (Pcs)</th>
                                                <th>Dosis</th>
                                                <th>Aturan Pakai</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $no1 = 1;
                                            $dt = $con->query("SELECT * FROM rm_obat ro LEFT JOIN obat o ON o.id_obat = ro.id_obat WHERE ro.id_rm = '$id' ");
                                            while ($tampil = $dt->fetch_array()) { ?>
                                                <tr>
                                                    <td align="center"><?= $no1++; ?></td>
                                                    <td align="center"><?= $tampil['nm_obat'] ?></td>
                                                    <td align="center"><?= $tampil['kekuatan'] ?></td>
                                                    <td align="center"><?= $tampil['jumlah'] ?></td>
                                                    <td align="center"><?= $tampil['dosis'] ?></td>
                                                    <td align="center"><?= $tampil['aturan'] ?></td>
                                                </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                    <hr>
                                <?php } ?>
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