<!-- flashdata sweetalert -->
<div class="flash-data" data-flashdata="<?= $this->session->flashdata('pesan') ?>"></div>

<!-- page content -->
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Daftar Soal</h3>
            </div>
        </div>
    </div>
    <div class="clearfix"></div>

    <div class="row">

        <div class="col-md-12 col-sm-12 ">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Soal <small><?= $kursusId['mapel'] . ', ' . $sesiId['sesi'] . ', ' . $kursusId['kelas'] ?></small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                        </li>
                        <li><a class="close-link"><i class="fa fa-close"></i></a>
                        </li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">

                    <div class="col-md-6 col-sm-6 offset-md-3">
                        <div class="card">
                            <div class="card-header">
                                <strong class="text-danger text-center">
                                    <h4> Soal </h4>
                                </strong>
                            </div>
                            <div class="card-body">

                                <?php
                                if ($soalEssay['file'] == 'Tidak ada File') { ?>

                                    <?= $soalEssay['soal'] ?>

                                <?php } else { ?>
                                    <?php if (substr($soalEssay['file'], -3) == 'jpg' || substr($soalEssay['file'], -3) == 'png' || substr($soalEssay['file'], -4) == 'jpeg') { ?>

                                        <div class="text-center m-2">
                                            <a href="<?= base_url('assets/file/') . $soalEssay['file'] ?>" class="perbesar img-fluid">
                                                <img class="img-fluid" src="<?= base_url('assets/file/') . $soalEssay['file'] ?>" alt="">
                                            </a>
                                        </div>

                                        <div class="soal mt-4 text-justify">
                                            <?= $soalEssay['soal'] ?>
                                        </div>

                                    <?php } else if (substr($soalEssay['file'], -4) == '.mp4' || substr($soalEssay['file'], -4) == '.3gp' || substr($soalEssay['file'], -4) == '.flv') { ?>

                                        <div class="text-center m-2">
                                            <video controls id="video1" class="video-js vjs-default-skin m-auto img-fluid">
                                                <source src="<?= base_url() . "assets/file/" . $soalEssay['file'] ?>" type="video/mp4" data-setup='{"controls" : true, "autoplay" : false, "preload" : "auto"}'>
                                            </video>
                                        </div>

                                        <div class="soal mt-4 text-justify">
                                            <?= $soalEssay['soal'] ?>
                                        </div>

                                    <?php } else { ?>

                                        <div class="row">
                                            <div class="col-lg-9 text-center">

                                                <?php if (substr($soalEssay['file'], -4) == '.pdf') { ?>
                                                    <img width="300" src="<?= base_url('assets/img/logo/pdf.png') ?>" alt="">
                                                <?php } else if (substr($soalEssay['file'], -4) == '.doc' || substr($soalEssay['file'], -4) == 'docx') { ?>
                                                    <img width="300" src="<?= base_url('assets/img/logo/docx.png') ?>" alt="">
                                                <?php } else if (substr($soalEssay['file'], -4) == '.xls' || substr($soalEssay['file'], -4) == 'xlsx') { ?>
                                                    <img width="300" src="<?= base_url('assets/img/logo/xlsx.png') ?>" alt="">
                                                <?php } ?>

                                            </div>


                                            <div class="col-lg-3 mt-3">
                                                <a href="<?= base_url('administrator/downloadSoal/') . $soalEssay['id_soal'] ?>" class="btn btn-primary btn-sm btn-block">Download File</a>
                                            </div>

                                        </div>
                                        <div class="soal mt-4 text-justify">
                                            <?= $soalEssay['soal'] ?>
                                        </div>
                                    <?php } ?>
                                <?php } ?>
                            </div>
                            <div class="card-footer">
                                <a href="<?= base_url('guru/lihatSesiKursus/') . $soalEssay['id_sesi'] . '/' . $soalEssay['id_kursus'] ?>" class="btn btn-danger btn-block" type="button">Kembali</a>

                            </div>
                        </div>


                    </div>
                </div>
            </div>
        </div>
    </div>
</div>