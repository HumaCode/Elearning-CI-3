<!-- flashdata sweetalert -->
<div class="flash-data" data-flashdata="<?= $this->session->flashdata('pesan') ?>"></div>

<!-- page content -->
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Detail Kursus</h3>
            </div>


        </div>

        <div class="clearfix"></div>

        <div class="row">
            <div class="col-md-12 col-sm-12  ">
                <div class="x_panel">
                    <div class="x_title">
                        <h2><?= $kursusId['mapel'] ?></h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                            </li>

                            <li><a class="close-link"><i class="fa fa-close"></i></a>
                            </li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">

                        <h3>Selamat Datang <?= $user['nama'] ?> di halaman kursus <?= $kursusId['mapel'] ?></h3>

                        <div class="x_title"></div>
                        <div class="row mb-3">
                            <div class="col-md">

                                <a href="<?= base_url('guru/tambahSesiKursus/') . $kursusId['id_kursus'] ?>" class="btn btn-primary btn-sm float-right">Tambah Sesi</a>
                                <a href="<?= base_url('guru/lihatAnggotaKursus/') . $kursusId['id_kursus'] . '/' . $kursusId['id_kelas'] ?>" class="btn btn-info btn-sm float-right">Lihat Anggota</a>
                            </div>
                        </div>

                        <?php foreach ($sesiByKursus as $s) : ?>

                            <ul class="list-group">
                                <li class="list-group-item">
                                    <a href="<?= base_url('guru/lihatSesiKursus/') . $s['id_sesi'] . '/' . $kursusId['id_kursus']  ?>">
                                        <h3><?= $s['sesi'] ?></h3>
                                    </a>

                                    <a href="<?= base_url('guru/hapusSesiKursus/') . $s['id_sesi'] . '/' . $kursusId['id_kursus']  ?>" class="btn btn-sm btn-danger float-right tombol-hapus" data-toggle="tooltip" data-placement="bottom" title="Hapus"><i class="glyphicon glyphicon-trash"></i></a>
                                    <a href="<?= base_url('guru/editSesiKursus/') . $s['id_sesi'] . '/' . $kursusId['id_kursus'] ?>" class="btn btn-sm btn-success float-right" data-toggle="tooltip" data-placement="bottom" title="Edit"><i class="glyphicon glyphicon-pencil"></i></a>
                                    <a href="<?= base_url('guru/lihatSesiKursus/') . $s['id_sesi'] . '/' . $kursusId['id_kursus']  ?>" class="btn btn-sm btn-secondary float-right" data-toggle="tooltip" data-placement="bottom" title="Lihat"><i class="glyphicon glyphicon-eye-open"></i></a>
                                </li>
                            </ul>
                            <div class="x_title"></div>
                        <?php endforeach; ?>

                        <a href="<?= base_url('guru/kursusSaya') ?>" class="btn btn-sm btn-danger btn-block">Kembali</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /page content -->