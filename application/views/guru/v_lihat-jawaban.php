<!-- flashdata sweetalert -->
<div class="flash-data" data-flashdata="<?= $this->session->flashdata('pesan') ?>"></div>

<!-- page content -->
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Jawaban Kuis</h3>
            </div>
        </div>
    </div>
    <div class="clearfix"></div>

    <div class="row">

        <div class="col-md-12 col-sm-12 ">
            <div class="x_panel">
                <div class="x_title">
                    <small>Jawaban dari <?= $jawaban['nama'] . ' ' . $kursusId['kelas'] ?> </small>
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
                        <div class="col-lg-6 offset-lg-3 mb-2 ">
                            <div class="card ">
                                <div class="card-header mb-2">
                                    <h4 class="text-center text-danger mb-2"><strong>Soal</strong></h4>
                                </div>

                                <div class="p-3">
                                    <?php if (substr($jawaban['file'], -3) == 'mp4' || substr($jawaban['file'], -3) == '3gp' || substr($jawaban['file'], -4) == 'flv') { ?>
                                        <div class="text-center m-2">
                                            <video controls id="video1" class="video-js vjs-default-skin m-auto img-fluid">
                                                <source src="<?= base_url() . "assets/file/" .  $jawaban['file'] ?>" type="video/mp4" data-setup='{"controls" : true, "autoplay" : false, "preload" : "auto"}'>
                                            </video>
                                        </div>

                                        <!-- jika soalnya gambar. maka tampilkan  -->
                                    <?php } else if (substr($jawaban['file'], -3) == 'jpg' || substr($jawaban['file'], -3) == 'png' || substr($jawaban['file'], -4) == 'jpeg') { ?>

                                        <div class="text-center m-2">
                                            <a href="<?= base_url('assets/file/') . $jawaban['file'] ?>" class="perbesar img-fluid">
                                                <img class="img-fluid" src="<?= base_url('assets/file/') . $jawaban['file'] ?>" alt="">
                                            </a>
                                        </div>

                                    <?php } else if (substr($jawaban['file'], -4) == '.pdf') { ?>

                                        <div class="row">
                                            <div class="col-lg-8 ">

                                                <?php if (substr($jawaban['file'], -4) == '.pdf') { ?>

                                                    <img width="200" src="<?= base_url('assets/img/logo/pdf.png') ?>" alt="">

                                                <?php } else if (substr($jawaban['file'], -4) == '.doc' || substr($jawaban['file'], -4) == 'docx') { ?>

                                                    <img width="200" src="<?= base_url('assets/img/logo/docx.png') ?>" alt="">

                                                <?php } else if (substr($jawaban['file'], -4) == '.xls' || substr($jawaban['file'], -4) == 'xlsx') { ?>

                                                    <img width="200" src="<?= base_url('assets/img/logo/xlsx.png') ?>" alt="">

                                                <?php } ?>

                                            </div>
                                            <div class="col-lg-4 mt-2">
                                                <a href="<?= base_url('guru/unduhFileSoal/') . $jawaban['id_soal'] ?>" target="_blank" class="btn btn-primary btn-sm btn-block"><small>Download File</small></a>
                                            </div>
                                        </div>

                                    <?php } ?>
                                </div>


                                <div class="card-footer mt-2">
                                    Keterangan :<br>
                                    <?= $jawaban['soal'] ?>
                                </div>

                            </div>
                        </div>
                    </div>

                    <?php
                    if ($jawaban['jwb_file'] == 'Tidak ada File') { ?>

                        <div class="row">
                            <div class="col-lg-6 offset-lg-3">
                                <div class="card ">
                                    <div class="card-body">
                                        <h4 class="text-danger text-center"><strong>Jawaban</strong></h4>
                                        <?= $jawaban['jwb'] ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php } else { ?>
                        <?php if (substr($jawaban['jwb_file'], -3) == 'jpg' || substr($jawaban['jwb_file'], -3) == 'png' || substr($jawaban['jwb_file'], -4) == 'jpeg') { ?>


                            <div class="row">
                                <div class="col-lg-6 offset-lg-3">
                                    <div class="card">
                                        <div class="card-body">
                                            <h4 class="text-danger text-center"><strong>Jawaban</strong></h4>
                                            <a href="<?= base_url('assets/file/') . $jawaban['jwb_file'] ?>" class="perbesar img-fluid">
                                                <img class="img-fluid" src="<?= base_url('assets/file/') . $jawaban['jwb_file'] ?>" alt="">
                                            </a>
                                            <div class="mt-3 text-justify">
                                                <?= $jawaban['jwb'] ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        <?php } else if (substr($jawaban['jwb_file'], -4) == '.mp4' || substr($jawaban['jwb_file'], -4) == '.3gp' || substr($jawaban['jwb_file'], -4) == '.flv') { ?>

                            <div class="row">
                                <div class="col-lg-6 offset-lg-3">
                                    <div class="card">
                                        <div class="card-body">
                                            <h4 class="text-danger text-center"><strong>Jawaban</strong></h4>
                                            <video controls id="video1" class="video-js vjs-default-skin m-auto img-fluid">
                                                <source src="<?= base_url() . "assets/file/" . $jawaban['jwb_file'] ?>" type="video/mp4" data-setup='{"controls" : true, "autoplay" : false, "preload" : "auto"}'>
                                            </video>
                                            <div class="mt-3 text-justify">
                                                <?= $jawaban['jwb'] ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        <?php } else { ?>

                            <div class="row">
                                <div class="col-lg-6 offset-lg-3 mb-2 ">
                                    <div class="card ">
                                        <div class="card-body text-center">
                                            <h4 class="text-danger mb-3"><strong>Jawaban</strong></h4>

                                            <div class="col-lg-8 ">

                                                <?php if (substr($jawaban['jwb_file'], -4) == '.pdf') { ?>

                                                    <img width="200" src="<?= base_url('assets/img/logo/pdf.png') ?>" alt="">

                                                <?php } else if (substr($jawaban['jwb_file'], -4) == '.doc' || substr($jawaban['jwb_file'], -4) == 'docx') { ?>

                                                    <img width="200" src="<?= base_url('assets/img/logo/docx.png') ?>" alt="">

                                                <?php } else if (substr($jawaban['jwb_file'], -4) == '.xls' || substr($jawaban['jwb_file'], -4) == 'xlsx') { ?>

                                                    <img width="200" src="<?= base_url('assets/img/logo/xlsx.png') ?>" alt="">

                                                <?php } ?>

                                            </div>
                                            <div class="col-lg-4">
                                                <a href="<?= base_url('guru/unduhFileJawaban/') . $jawaban['id_jawaban'] ?>" target="_blank" class="btn btn-primary btn-sm btn-block"><small>Download File</small></a>
                                            </div>

                                        </div>
                                        <div class="card-footer text-justify">

                                            <?= $jawaban['jwb'] ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                    <?php } ?>


                    <div class="col-lg-6 offset-lg-3 mt-2 ">
                        <div class="card">
                            <div class="card-body">
                                <?php if ($jawaban['nilai'] == 'Belum dinilai') : ?>
                                    <a href="" data-toggle="modal" data-target=".bs-example-modal-sm" class="btn btn-success btn-block">Nilai</a>
                                <?php else : ?>
                                    <a href="" data-toggle="modal" data-target=".bs-example-modal-sm" class="btn btn-success btn-block">Ubah Nilai</a>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>

                </div>

            </div>

            <a href="<?= base_url('guru/penilaianKuis/') . $jawaban['id_sesi'] . '/' . $jawaban['id_kursus'] . '/' . $jawaban['pertemuan'] ?>" class="btn btn-danger btn-block" type="button">Kembali</a>

        </div>
    </div>
</div>
</div>

<!-- modal nilai -->
<div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">

            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel2">Beri Nilai</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
                </button>
            </div>
            <form action="<?= base_url('guru/beriNilai/') . $jawaban['id_sesi'] . '/' . $jawaban['id_kursus'] . '/' . $jawaban['pertemuan'] ?>" method="post">
                <div class="modal-body">

                    <input type="hidden" name="id_jawaban" id="id_jawaban" value="<?= $jawaban['id_jawaban'] ?>">
                    <div class="form-group">
                        <input type="number" class="form-control" min="0" id="nilai" name="nilai">
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary btn-sm">Selesai</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- /modals -->