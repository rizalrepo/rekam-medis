<div class="modal fade" id="lap_dokter" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Laporan Data Dokter</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?php
                $spesialis = [
                    '' => '-- Pilih --',
                    'Umum' => 'Umum',
                    'Spesialis Mata' => 'Spesialis Mata',
                    'Spesialis Kesehatan Jiwa' => 'Spesialis Kesehatan Jiwa',
                    'Spesialis Rehab Medik' => 'Spesialis Rehab Medik',
                    'Spesialis Anastesi' => 'Spesialis Anastesi',
                    'Spesialis Kandungan' => 'Spesialis Kandungan',
                    'Spesialis Anak' => 'Spesialis Anak',
                    'Spesialis Penyakit Dalam' => 'Spesialis Penyakit Dalam',
                    'Spesialis Bedah' => 'Spesialis Bedah',
                    'Spesialis Syaraf' => 'Spesialis Syaraf',
                    'Spesialis Orthopedi' => 'Spesialis Orthopedi',
                    'Spesialis Kulit dan Kelamin' => 'Spesialis Kulit dan Kelamin',
                    'Spesialis THT' => 'Spesialis THT',
                    'Spesialis Bedah Mulut' => 'Spesialis Bedah Mulut',
                ];
                ?>

                <form method="POST" target="_blank" action="<?= base_url('admin/dokter/cetak') ?>">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Pilih Spesialis</label>
                                <?= form_dropdown('spesialis', $spesialis, '', 'class="form-control"') ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group float-right">
                            <button type="submit" name="cetak" class="btn btn-info"><i class="fa fa-print"> </i> Cetak</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<div class="modal fade" id="lap_pasien" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Laporan Data Pasien</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?php
                $jp = [
                    '' => '-- Pilih --',
                    'Umum' => 'Umum',
                    'BPJS' => 'BPJS',
                ];
                ?>

                <form method="POST" target="_blank" action="<?= base_url('admin/pasien/cetak') ?>">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Pilih Pengobatan</label>
                                <?= form_dropdown('jp', $jp, '', 'class="form-control"') ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group float-right">
                            <button type="submit" name="cetak" class="btn btn-info"><i class="fa fa-print"> </i> Cetak</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<div class="modal fade" id="lap_rm" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Laporan Data Rekam Medis</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" target="_blank" action="<?= base_url('admin/rm/cetak') ?>">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Dari Tanggal</label>
                                <input type="date" class="form-control" name="tgl1">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Sampai Tanggal</label>
                                <input type="date" class="form-control" name="tgl2">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Pilih Dokter</label>
                                <select name="id_dokter" class="form-control select2" style="width: 100%;">
                                    <option value="">-- Pilih --</option>
                                    <?php $data = $con->query("SELECT * FROM dokter ORDER BY id_dokter DESC"); ?>
                                    <?php foreach ($data as $row) : ?>
                                        <option value="<?= $row['id_dokter'] ?>"><?= $row['nm_dokter'] ?> | NIP. <?= $row['nip'] ?></option>
                                    <?php endforeach ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group float-right">
                            <button type="submit" name="cetak" class="btn btn-info"><i class="fa fa-print"> </i> Cetak</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<div class="modal fade" id="lap_mata" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Laporan Data MCU Mata</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" target="_blank" action="<?= base_url('admin/mata/cetak') ?>">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Dari Tanggal</label>
                                <input type="date" class="form-control" name="tgl1">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Sampai Tanggal</label>
                                <input type="date" class="form-control" name="tgl2">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Pilih Dokter</label>
                                <select name="id_dokter" class="form-control select2" style="width: 100%;">
                                    <option value="">-- Pilih --</option>
                                    <?php $data = $con->query("SELECT * FROM dokter ORDER BY id_dokter DESC"); ?>
                                    <?php foreach ($data as $row) : ?>
                                        <option value="<?= $row['id_dokter'] ?>"><?= $row['nm_dokter'] ?> | NIP. <?= $row['nip'] ?></option>
                                    <?php endforeach ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group float-right">
                            <button type="submit" name="cetak" class="btn btn-info"><i class="fa fa-print"> </i> Cetak</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<div class="modal fade" id="lap_jiwa" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Laporan Data MCU Jiwa/Psikolog</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" target="_blank" action="<?= base_url('admin/jiwa/cetak') ?>">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Dari Tanggal</label>
                                <input type="date" class="form-control" name="tgl1">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Sampai Tanggal</label>
                                <input type="date" class="form-control" name="tgl2">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Pilih Dokter</label>
                                <select name="id_dokter" class="form-control select2" style="width: 100%;">
                                    <option value="">-- Pilih --</option>
                                    <?php $data = $con->query("SELECT * FROM dokter ORDER BY id_dokter DESC"); ?>
                                    <?php foreach ($data as $row) : ?>
                                        <option value="<?= $row['id_dokter'] ?>"><?= $row['nm_dokter'] ?> | NIP. <?= $row['nip'] ?></option>
                                    <?php endforeach ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group float-right">
                            <button type="submit" name="cetak" class="btn btn-info"><i class="fa fa-print"> </i> Cetak</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<div class="modal fade" id="lap_sehat" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Laporan Data MCU Keterangan Sehat</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" target="_blank" action="<?= base_url('admin/sehat/cetak') ?>">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Dari Tanggal</label>
                                <input type="date" class="form-control" name="tgl1">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Sampai Tanggal</label>
                                <input type="date" class="form-control" name="tgl2">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Pilih Dokter</label>
                                <select name="id_dokter" class="form-control select2" style="width: 100%;">
                                    <option value="">-- Pilih --</option>
                                    <?php $data = $con->query("SELECT * FROM dokter ORDER BY id_dokter DESC"); ?>
                                    <?php foreach ($data as $row) : ?>
                                        <option value="<?= $row['id_dokter'] ?>"><?= $row['nm_dokter'] ?> | NIP. <?= $row['nip'] ?></option>
                                    <?php endforeach ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group float-right">
                            <button type="submit" name="cetak" class="btn btn-info"><i class="fa fa-print"> </i> Cetak</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<div class="modal fade" id="lap_napza" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Laporan Data MCU NAPZA</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" target="_blank" action="<?= base_url('admin/napza/cetak') ?>">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Dari Tanggal</label>
                                <input type="date" class="form-control" name="tgl1">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Sampai Tanggal</label>
                                <input type="date" class="form-control" name="tgl2">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Pilih Dokter</label>
                                <select name="id_dokter" class="form-control select2" style="width: 100%;">
                                    <option value="">-- Pilih --</option>
                                    <?php $data = $con->query("SELECT * FROM dokter ORDER BY id_dokter DESC"); ?>
                                    <?php foreach ($data as $row) : ?>
                                        <option value="<?= $row['id_dokter'] ?>"><?= $row['nm_dokter'] ?> | NIP. <?= $row['nip'] ?></option>
                                    <?php endforeach ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group float-right">
                            <button type="submit" name="cetak" class="btn btn-info"><i class="fa fa-print"> </i> Cetak</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<div class="modal fade" id="lap_virus" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Laporan Data MCU Virus</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" target="_blank" action="<?= base_url('admin/virus/cetak') ?>">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Dari Tanggal</label>
                                <input type="date" class="form-control" name="tgl1">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Sampai Tanggal</label>
                                <input type="date" class="form-control" name="tgl2">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Pilih Dokter</label>
                                <select name="id_dokter" class="form-control select2" style="width: 100%;">
                                    <option value="">-- Pilih --</option>
                                    <?php $data = $con->query("SELECT * FROM dokter ORDER BY id_dokter DESC"); ?>
                                    <?php foreach ($data as $row) : ?>
                                        <option value="<?= $row['id_dokter'] ?>"><?= $row['nm_dokter'] ?> | NIP. <?= $row['nip'] ?></option>
                                    <?php endforeach ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group float-right">
                            <button type="submit" name="cetak" class="btn btn-info"><i class="fa fa-print"> </i> Cetak</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<div class="modal fade" id="lap_hamil" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Laporan Data MCU Kehamilan</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" target="_blank" action="<?= base_url('admin/hamil/cetak') ?>">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Dari Tanggal</label>
                                <input type="date" class="form-control" name="tgl1">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Sampai Tanggal</label>
                                <input type="date" class="form-control" name="tgl2">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Pilih Dokter</label>
                                <select name="id_dokter" class="form-control select2" style="width: 100%;">
                                    <option value="">-- Pilih --</option>
                                    <?php $data = $con->query("SELECT * FROM dokter ORDER BY id_dokter DESC"); ?>
                                    <?php foreach ($data as $row) : ?>
                                        <option value="<?= $row['id_dokter'] ?>"><?= $row['nm_dokter'] ?> | NIP. <?= $row['nip'] ?></option>
                                    <?php endforeach ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group float-right">
                            <button type="submit" name="cetak" class="btn btn-info"><i class="fa fa-print"> </i> Cetak</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<div class="modal fade" id="lap_fisik" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Laporan Data MCU Jantung & Fisik</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" target="_blank" action="<?= base_url('admin/fisik/cetak') ?>">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Dari Tanggal</label>
                                <input type="date" class="form-control" name="tgl1">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Sampai Tanggal</label>
                                <input type="date" class="form-control" name="tgl2">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Pilih Dokter</label>
                                <select name="id_dokter" class="form-control select2" style="width: 100%;">
                                    <option value="">-- Pilih --</option>
                                    <?php $data = $con->query("SELECT * FROM dokter ORDER BY id_dokter DESC"); ?>
                                    <?php foreach ($data as $row) : ?>
                                        <option value="<?= $row['id_dokter'] ?>"><?= $row['nm_dokter'] ?> | NIP. <?= $row['nip'] ?></option>
                                    <?php endforeach ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group float-right">
                            <button type="submit" name="cetak" class="btn btn-info"><i class="fa fa-print"> </i> Cetak</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>