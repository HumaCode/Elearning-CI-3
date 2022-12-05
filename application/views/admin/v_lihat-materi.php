<!-- flashdata sweetalert -->
<div class="flash-data" data-flashdata="<?= $this->session->flashdata('pesan') ?>"></div>

<!-- page content -->
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Lihat Materi</h3>
            </div>
        </div>
    </div>
    <div class="clearfix"></div>

    <div class="row">

        <div class="col-md-12 col-sm-12 ">
            <div class="x_panel">
                <div class="x_title">
                    <small>Soal <?= $kursusId['mapel'] . ', ' . $sesiId['sesi'] ?></small>
                    <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                        </li>
                        <li><a class="close-link"><i class="fa fa-close"></i></a>
                        </li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">

                    <div class="col-md col-sm">
                        <div class="card ">
                            <div class="card-header text-center">
                                <strong class="text-danger">
                                    <h4>Materi</h4>
                                </strong>
                            </div>
                            <div class="card-body text-justify">

                                <?= $materi['keterangan'] ?>

                            </div>
                            <div class="card-footer text-center">
                                <div class="col-md-6 col-sm-6 offset-md-3">
                                    <a href="<?= base_url('administrator/lihatSesiKursus/') . $materi['id_sesi'] . '/' . $materi['id_kursus'] ?>" class="btn btn-danger" type="button">Kembali</a>
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