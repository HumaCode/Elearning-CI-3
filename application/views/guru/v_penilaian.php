<!-- flashdata sweetalert -->
<div class="flash-data" data-flashdata="<?= $this->session->flashdata('pesan') ?>"></div>

<!-- page content -->
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Penilaian</h3>
            </div>
        </div>

        <div class="clearfix"></div>

        <div class="row">
            <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Penilaian</h2>
                        <ul class="nav navbar-right panel_toolbox">
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
                                                        <li class="list-group-item text-danger text-center"><strong> Belum ada Penilaian yang tersedia</strong></li>
                                                    </ul>
                                                <?php else : ?>
                                                    <?php foreach ($kursusById as $kr) : ?>
                                                        <!-- price element -->
                                                        <div class="col-md-3 col-sm-6  mb-3">
                                                            <div class="pricing ">
                                                                <div class="title bg-secondary">
                                                                    <h1><?= $kr['mapel'] ?></h1>
                                                                </div>
                                                                <div class="x_content bg-green">
                                                                    <div class="mt-1">
                                                                        <div class="pricing_features text-dark">

                                                                            <div class="list-unstyled text-center mb-3">
                                                                                <img src="<?= base_url('assets/img/logo/scoring.png') ?>" alt="<?= $kr['gambar'] ?>" width="150">
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
                                                                        <a href="<?= base_url('guru/penilaianKursus/') . $kr['id_kursus'] ?>" class="btn btn-secondary btn-block" role="button">Lihat</a>
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