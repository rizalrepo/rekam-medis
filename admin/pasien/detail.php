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
                    <h5 class="modal-title" id="custom-width-modalLabel"> <button type="button" class="btn btn-default waves-effect" data-dismiss="modal"><i class="fa fa-info-circle"></i></button> Detail Data Pasien</h5>
                    <button type="button" class="btn btn-default waves-effect" data-dismiss="modal"><i class="fa fa-window-close"></i></button>
                </div>
                <?php
                $q = $con->query("SELECT * FROM pasien p JOIN user u ON u.id_user = p.id_user JOIN poli pl ON p.id_poli = pl.id_poli WHERE id_pasien = '$id' ");
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
                                    <dt class="col-sm-3">No. Kartu Pasien</dt>
                                    <dd class="col-sm-9">: <?= $d['no_kartu'] ?> | <a href="kartu?id=<?= $id ?>" class="btn btn-xs btn-info ml-1" target="_blank"><i class="fa fa-print"></i> Cetak</a></dd>
                                    <dt class="col-sm-3">Nama Pasien</dt>
                                    <dd class="col-sm-9">: <?= $d['nm_pasien'] ?></dd>
                                    <dt class="col-sm-3">Jenis Kelamin</dt>
                                    <dd class="col-sm-9">: <?= $d['jk'] ?></dd>
                                    <dt class="col-sm-3">TTL</dt>
                                    <dd class="col-sm-9">: <?= $d['tmpt_lahir'] ?>, <?= tgl($d['tgl_lahir']) ?></dd>
                                    <dt class="col-sm-3">Usia</dt>
                                    <dd class="col-sm-9">: <?= $y . ' Tahun' ?></dd>
                                    <dt class="col-sm-3">Pekerjaan</dt>
                                    <dd class="col-sm-9">: <?= $d['pekerjaan'] ?></dd>
                                    <dt class="col-sm-3">Alamat</dt>
                                    <dd class="col-sm-9">: <?= $d['alamat'] ?></dd>
                                    <dt class="col-sm-3">Pengobatan</dt>
                                    <dd class="col-sm-9">: <?= $d['jp'] ?></dd>
                                    <?php if ($d['jp'] == 'BPJS') { ?>
                                        <dt class="col-sm-3">Nomor BPJS</dt>
                                        <dd class="col-sm-9">: <?= $d['bpjs'] ?></dd>
                                    <?php } ?>
                                    <dt class="col-sm-3">Poli</dt>
                                    <dd class="col-sm-9">: <?= $d['nm_poli'] ?></dd>
                                    <dt class="col-sm-3">Nomor HP</dt>
                                    <dd class="col-sm-9">: <?= $d['hp'] ?></dd>
                                </dl>
                                <hr>
                                <dl class="row">
                                    <dt class="col-sm-3">Petugas</dt>
                                    <dd class="col-sm-9">: <?= $d['nm_user'] ?></dd>
                                    <dt class="col-sm-3">Waktu Input</dt>
                                    <dd class="col-sm-9">: <?= tgl_indo($d['tgl_input']) ?></dd>
                                </dl>
                                <hr>
                                <?php
                                $no = 1;
                                $data2 = $con->query("SELECT * FROM rm r JOIN pasien p ON p.id_pasien = r.id_pasien JOIN poli pl ON pl.id_poli = r.id_poli JOIN dokter d ON d.id_dokter = r.id_dokter JOIN user u ON u.id_user = r.id_user WHERE r.id_pasien = '$id' ORDER BY id_rm DESC");
                                while ($row2 = $data2->fetch_array()) { ?>
                                    <div class="card card-olive card-outline collapsed-card">
                                        <div class="card-header">
                                            <h3 class="card-title"><b>History Rekam Medis <?= tgl($row2['tanggal']) ?></b></h3>
                                            <div class="card-tools">
                                                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-plus"></i></button>
                                                <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-remove"></i></button>
                                            </div>
                                        </div>
                                        <div class="card-body" style="background-color: white;">
                                            <dl class="row">
                                                <dt class="col-sm-3">Kode Rekam Medis</dt>
                                                <dd class="col-sm-9">: <?= $row2['id_rm'] ?></dd>
                                                <dt class="col-sm-3">Tanggal Periksa</dt>
                                                <dd class="col-sm-9">: <?= tgl($row2['tanggal']) ?></dd>
                                                <dt class="col-sm-3">Poli</dt>
                                                <dd class="col-sm-9">: <?= $row2['nm_poli'] ?></dd>
                                                <dt class="col-sm-3">Keluhan</dt>
                                                <dd class="col-sm-9">: <?= $row2['keluhan'] ?></dd>
                                                <dt class="col-sm-3">Diagnosis</dt>
                                                <dd class="col-sm-9">: <?= $row2['diagnosis'] ?></dd>
                                                <dt class="col-sm-3">Nama Dokter</dt>
                                                <dd class="col-sm-9">: <?= $row2['nm_dokter'] ?></dd>
                                                <dt class="col-sm-3">Tindak Lanjut</dt>
                                                <dd class="col-sm-9">: <?= $row2['tindakan'] ?></dd>
                                            </dl>
                                            <hr>
                                            <?php
                                            $cek = $con->query("SELECT * FROM rm_obat ro LEFT JOIN obat o ON o.id_obat = ro.id_obat WHERE ro.id_rm = '$row2[id_rm]' ")->fetch_array();
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
                                                        $dt = $con->query("SELECT * FROM rm_obat ro LEFT JOIN obat o ON o.id_obat = ro.id_obat WHERE ro.id_rm = '$row2[id_rm]' ");
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
                                        </div>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
</form>