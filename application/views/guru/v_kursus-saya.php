<!-- flashdata sweetalert -->
<div class="flash-data" data-flashdata="<?= $this->session->flashdata('pesan') ?>"></div>

<!-- page content -->
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Kursus Saya</h3>
            </div>
        </div>

        <div class="clearfix"></div>

        <div class="row">
            <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Semua Kursus</h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li>
                                <a href="<?= base_url('guru/tambahKursus') ?>" class="btn btn-primary btn-sm text-dark">Tambah Kursus</a>
                            </li>
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                            </li>
                            <li><a class="close-link"><i class="fa fa-close"></i></a>
                            </li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="card-box table-responsive">

                                    <div class="x_content">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <?php if ($kursusById == null) : ?>
                                                    <ul class="list-group">
                                                        <li class="list-group-item text-danger text-center"><strong> Belum ada kursus yang tersedia</strong></li>
                                                    </ul>
                                                <?php else : ?>
                                                    <?php foreach ($kursusById as $kr) : ?>
                                                        <!-- price element -->
                                                        <div class="col-md-3 col-sm-6  mb-3">
                                                            <div class="pricing">
                                                                <div class="title">
                                                                    <h1><?= $kr['mapel'] ?></h1>
                                                                </div>
                                                                <div class="x_content">
                                                                    <div class="">
                                                                        <div class="pricing_features">

                                                                            <div class="list-unstyled text-center mb-3">
                                                                                <img src="<?= base_url('assets/img/logo/') . $kr['gambar'] ?>" alt="<?= $kr['gambar'] ?>" width="150">
                                                                            </div>

                                                                            <small>
                                                                                <table>
                                                                                    <tr>
                                                                                        <td>Guru Pengampu</td>
                                                                                        <td>:</td>
                                                                                        <td><?= $kr['nama'] ?></td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td>Dibuat</td>
                                                                                        <td>:</td>
                                                                                        <td><?= date('d F Y', $kr['tgl_dibuat'])  ?></td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td>Kelas</td>
                                                                                        <td>:</td>
                                                                                        <td><?= $kr['kelas']  ?></td>
                                                                                    </tr>
                                                                                </table>
                                                                            </small>

                                                                        </div>
                                                                    </div>
                                                                    <div class="pricing_footer">
                                                                        <a href="<?= base_url('guru/detailKursus/') . $kr['id_kursus'] ?>" class="btn btn-success btn-block" role="button">Mulai</a>


                                                                        <a href="<?= base_url('guru/editKursus/') . $kr['id_kursus'] ?>" class="btn btn-success btn-sm" data-toggle="tooltip" data-placement="bottom" title="Edit"><i class="glyphicon glyphicon-pencil"></i></a>
                                                                        <a href="<?= base_url('guru/hapusKursus/') . $kr['id_kursus'] ?>" class="btn btn-danger btn-sm tombol-hapus" data-toggle="tooltip" data-placement="bottom" title="Hapus"><i class="glyphicon glyphicon-trash"></i></a>

                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- price element -->

                                                    <?php endforeach; ?>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>