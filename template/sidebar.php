<?php
function aktif($pageSekarang)
{
    $namaHalaman = $_SERVER['PHP_SELF'];
    $namaArray = explode('/', $namaHalaman);
    $jumlah = count($namaArray);
    $namaHalaman = $namaArray[$jumlah - 2];
    if ($pageSekarang == $namaHalaman) {
        echo 'active';
    }
}

function menu($pageSekarang)
{
    $namaHalaman = $_SERVER['PHP_SELF'];
    $namaArray = explode('/', $namaHalaman);
    $jumlah = count($namaArray);
    $namaHalaman = $namaArray[$jumlah - 2];
    if ($pageSekarang == $namaHalaman) {
        echo 'menu-open';
    }
}
?>


<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
        <img src="<?= base_url() ?>/assets/images/logo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text">Rekam Medis | MCU</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">

        <div class="user-panel mt-1 mb-1 d-flex">
            <div class="info">
                <a href="#" class="d-block"><i class="fas fa-user-circle mr-1"></i><b><?= $_SESSION['nm_user']; ?> </b></a>
            </div>
        </div>
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column nav-child-indent" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-header">Menu</li>
                <?php if ($_SESSION['level'] == 1) { ?>
                    <li class="nav-item">
                        <a href="<?= base_url() ?>/admin/" class="nav-link <?= aktif("admin") ?>">
                            <i class="nav-icon fa fa-tachometer-alt"></i>
                            <p>
                                Dashboard
                            </p>
                        </a>
                    </li>

                    <li class="nav-item has-treeview <?= menu('user') ?> <?= menu('dokter') ?> <?= menu('pasien') ?> <?= menu('poli') ?> <?= menu('obat') ?>">
                        <a href="#" class="nav-link <?= aktif('user') ?> <?= aktif('dokter') ?> <?= aktif('pasien') ?> <?= aktif('poli') ?> <?= aktif('obat') ?>">
                            <i class="nav-icon fa fa-database"></i>
                            <p>
                                Data Master
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">

                            <li class="nav-item">
                                <a href="<?= base_url() ?>/admin/pasien/" class="nav-link <?= aktif('pasien') ?>">
                                    <i class="fas fa-users mr-1"></i>
                                    <p>Data Pasien</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?= base_url() ?>/admin/dokter/" class="nav-link <?= aktif('dokter') ?>">
                                    <i class="fas fa-user-md mr-1"></i>
                                    <p>Data Dokter</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?= base_url() ?>/admin/poli/" class="nav-link <?= aktif('poli') ?>">
                                    <i class="fas fa-hospital mr-1"></i>
                                    <p>Data Poli</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?= base_url() ?>/admin/obat/" class="nav-link <?= aktif('obat') ?>">
                                    <i class="fas fa-pills mr-1"></i>
                                    <p>Data Obat</p>
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="<?= base_url() ?>/admin/user/" class="nav-link <?= aktif('user') ?>">
                                    <i class="fas fa-user mr-1"></i>
                                    <p>Data Pengguna</p>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li class="nav-item">
                        <a href="<?= base_url() ?>/admin/rm" class="nav-link <?= aktif("rm") ?>">
                            <i class="nav-icon fa fa-stethoscope"></i>
                            <p>
                                Data Rekam Medis
                            </p>
                        </a>
                    </li>

                    <li class="nav-item has-treeview <?= menu('mata') ?> <?= menu('jiwa') ?> <?= menu('sehat') ?> <?= menu('virus') ?> <?= menu('hamil') ?> <?= menu('fisik') ?> <?= menu('napza') ?>">
                        <a href="#" class="nav-link <?= aktif('mata') ?> <?= aktif('jiwa') ?> <?= aktif('sehat') ?> <?= aktif('virus') ?> <?= aktif('hamil') ?> <?= aktif('fisik') ?> <?= aktif('napza') ?>">
                            <i class="nav-icon fa fa-calendar-check"></i>
                            <p>
                                Data MCU
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">

                            <li class="nav-item">
                                <a href="<?= base_url() ?>/admin/mata/" class="nav-link <?= aktif('mata') ?>">
                                    <i class="fas fa-eye mr-1"></i>
                                    <p>Diagnosa Mata</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?= base_url() ?>/admin/jiwa/" class="nav-link <?= aktif('jiwa') ?>">
                                    <i class="fas fa-heartbeat mr-1"></i>
                                    <p>Diagnosa Jiwa/Psikolog</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?= base_url() ?>/admin/sehat/" class="nav-link <?= aktif('sehat') ?>">
                                    <i class="fas fa-plus-square mr-1"></i>
                                    <p>Diagnosa Keterangan Sehat</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?= base_url() ?>/admin/napza/" class="nav-link <?= aktif('napza') ?>">
                                    <i class="mdi mdi-human-handsup mr-1"></i>
                                    <p>Diagnosa NAPZA</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?= base_url() ?>/admin/virus/" class="nav-link <?= aktif('virus') ?>">
                                    <i class="mdi mdi-virus mr-1"></i>
                                    <p>Diagnosa Virus</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?= base_url() ?>/admin/hamil/" class="nav-link <?= aktif('hamil') ?>">
                                    <i class="mdi mdi-human-pregnant mr-1"></i>
                                    <p>Diagnosa Kehamilan</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?= base_url() ?>/admin/fisik/" class="nav-link <?= aktif('fisik') ?>">
                                    <i class="mdi mdi-human-greeting mr-1"></i>
                                    <p>Diagnosa Jantung & Fisik</p>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li class="nav-header">Laporan</li>
                    <li class="nav-item has-treeview">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fa fa-print"></i>
                            <p>
                                Laporan Cetak
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="#" data-toggle="modal" data-target="#lap_dokter" class="nav-link">
                                    <p>Data Dokter</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#" data-toggle="modal" data-target="#lap_pasien" class="nav-link">
                                    <p>Data Pasien</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#" data-toggle="modal" data-target="#lap_rm" class="nav-link">
                                    <p>Data Rekam Medis</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#" data-toggle="modal" data-target="#lap_mata" class="nav-link">
                                    <p>Data MCU Mata</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#" data-toggle="modal" data-target="#lap_jiwa" class="nav-link">
                                    <p>Data MCU Jiwa/Psikolog</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#" data-toggle="modal" data-target="#lap_sehat" class="nav-link">
                                    <p>Data MCU Keterangan Sehat</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#" data-toggle="modal" data-target="#lap_napza" class="nav-link">
                                    <p>Data MCU NAPZA</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#" data-toggle="modal" data-target="#lap_virus" class="nav-link">
                                    <p>Data MCU Virus</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#" data-toggle="modal" data-target="#lap_hamil" class="nav-link">
                                    <p>Data MCU Kehamilan</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#" data-toggle="modal" data-target="#lap_fisik" class="nav-link">
                                    <p>Data MCU Jantung & Fisik</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                <?php } else { ?>

                    <li class="nav-item">
                        <a href="<?= base_url() ?>/admin/" class="nav-link <?= aktif("admin") ?>">
                            <i class="nav-icon fa fa-tachometer-alt"></i>
                            <p>
                                Dashboard
                            </p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="<?= base_url() ?>/admin/pasien" class="nav-link <?= aktif("pasien") ?>">
                            <i class="nav-icon fa fa-users"></i>
                            <p>
                                Data Pasien
                            </p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="<?= base_url() ?>/admin/rm" class="nav-link <?= aktif("rm") ?>">
                            <i class="nav-icon fa fa-stethoscope"></i>
                            <p>
                                Data Rekam Medis
                            </p>
                        </a>
                    </li>

                    <li class="nav-item has-treeview <?= menu('mata') ?> <?= menu('jiwa') ?> <?= menu('sehat') ?> <?= menu('virus') ?> <?= menu('hamil') ?> <?= menu('fisik') ?> <?= menu('napza') ?>">
                        <a href="#" class="nav-link <?= aktif('mata') ?> <?= aktif('jiwa') ?> <?= aktif('sehat') ?> <?= aktif('virus') ?> <?= aktif('hamil') ?> <?= aktif('fisik') ?> <?= aktif('napza') ?>">
                            <i class="nav-icon fa fa-calendar-check"></i>
                            <p>
                                Data MCU
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">

                            <li class="nav-item">
                                <a href="<?= base_url() ?>/admin/mata/" class="nav-link <?= aktif('mata') ?>">
                                    <i class="fas fa-eye mr-1"></i>
                                    <p>Diagnosa Mata</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?= base_url() ?>/admin/jiwa/" class="nav-link <?= aktif('jiwa') ?>">
                                    <i class="fas fa-heartbeat mr-1"></i>
                                    <p>Diagnosa Jiwa/Psikolog</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?= base_url() ?>/admin/sehat/" class="nav-link <?= aktif('sehat') ?>">
                                    <i class="fas fa-plus-square mr-1"></i>
                                    <p>Diagnosa Keterangan Sehat</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?= base_url() ?>/admin/napza/" class="nav-link <?= aktif('napza') ?>">
                                    <i class="mdi mdi-human-handsup mr-1"></i>
                                    <p>Diagnosa NAPZA</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?= base_url() ?>/admin/virus/" class="nav-link <?= aktif('virus') ?>">
                                    <i class="mdi mdi-virus mr-1"></i>
                                    <p>Diagnosa Virus</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?= base_url() ?>/admin/hamil/" class="nav-link <?= aktif('hamil') ?>">
                                    <i class="mdi mdi-human-pregnant mr-1"></i>
                                    <p>Diagnosa Kehamilan</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?= base_url() ?>/admin/fisik/" class="nav-link <?= aktif('fisik') ?>">
                                    <i class="mdi mdi-human-greeting mr-1"></i>
                                    <p>Diagnosa Jantung & Fisik</p>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li class="nav-header">Laporan</li>
                    <li class="nav-item has-treeview">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fa fa-print"></i>
                            <p>
                                Laporan Cetak
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="#" data-toggle="modal" data-target="#lap_dokter" class="nav-link">
                                    <p>Data Dokter</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#" data-toggle="modal" data-target="#lap_pasien" class="nav-link">
                                    <p>Data Pasien</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#" data-toggle="modal" data-target="#lap_rm" class="nav-link">
                                    <p>Data Rekam Medis</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#" data-toggle="modal" data-target="#lap_mata" class="nav-link">
                                    <p>Data MCU Mata</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#" data-toggle="modal" data-target="#lap_jiwa" class="nav-link">
                                    <p>Data MCU Jiwa/Psikolog</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#" data-toggle="modal" data-target="#lap_sehat" class="nav-link">
                                    <p>Data MCU Keterangan Sehat</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#" data-toggle="modal" data-target="#lap_napza" class="nav-link">
                                    <p>Data MCU NAPZA</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#" data-toggle="modal" data-target="#lap_virus" class="nav-link">
                                    <p>Data MCU Virus</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#" data-toggle="modal" data-target="#lap_hamil" class="nav-link">
                                    <p>Data MCU Kehamilan</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#" data-toggle="modal" data-target="#lap_fisik" class="nav-link">
                                    <p>Data MCU Jantung & Fisik</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                <?php } ?>
            </ul>
        </nav>

    </div>
    <!-- /.sidebar -->
</aside>

<?php include 'modal.php'; ?>