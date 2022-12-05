<!-- page content -->
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Detail Materi</h3>
            </div>
        </div>

        <div class="clearfix"></div>

        <div class="row">
            <div class="col-md-12 col-sm-12  ">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Materi</h2>
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
                            <div class="col-md-8 offset-md-2">
                                <div class="card">
                                    <div class="card-header">
                                        <h4 class="text-danger text-center"><strong>Materi</strong></h4>
                                    </div>

                                    <div class="card-body text-justify">
                                        <?php
                                        $m = substr($materi['nama_file'], -3);

                                        if ($m == 'mp4' || $m == '3gp' || $m == 'flv') { ?>
                                            <div class="text-center">
                                                <video controls id="video1" class="video-js vjs-default-skin  img-fluid ">
                                                    <source src="<?= base_url() . "assets/file/" . $materi['nama_file'] ?>" type="video/mp4" data-setup='{"controls" : true, "autoplay" : false, "preload" : "auto"}'>
                                                </video>
                                            </div>

                                            <div class="text-justify mt-4">
                                                <?= $materi['keterangan'] ?>
                                            </div>

                                        <?php } else if (substr($materi['nama_file'], -3) == 'jpg' || substr($materi['nama_file'], -3) == 'png' || substr($materi['nama_file'], -4) == 'jpeg') { ?>
                                            <div class="text-center m-2">
                                                <a href="<?= base_url('assets/file/') . $materi['nama_file'] ?>" class="perbesar img-fluid">
                                                    <img class="img-fluid" src="<?= base_url('assets/file/') . $materi['nama_file'] ?>" alt="">
                                                </a>
                                            </div>

                                            <div class="soal mt-4 text-justify">
                                                <?= $materi['keterangan'] ?>
                                            </div>
                                        <?php } else if ($materi['nama_file'] == 'Tidak ada File') { ?>
                                            <?= $materi['keterangan'] ?>
                                        <?php } else { ?>

                                            <div class="row">
                                                <div class="col-lg-9 text-center">

                                                    <?php if (substr($materi['nama_file'], -4) == '.pdf') { ?>
                                                        <img width="300" src="<?= base_url('assets/img/logo/pdf.png') ?>" alt="">
                                                    <?php } else if (substr($materi['nama_file'], -4) == '.doc' || substr($materi['nama_file'], -4) == 'docx') { ?>
                                                        <img width="300" src="<?= base_url('assets/img/logo/docx.png') ?>" alt="">
                                                    <?php } else if (substr($materi['nama_file'], -4) == '.xls' || substr($materi['nama_file'], -4) == 'xlsx') { ?>
                                                        <img width="300" src="<?= base_url('assets/img/logo/xlsx.png') ?>" alt="">
                                                    <?php } ?>

                                                </div>


                                                <div class="col-lg-3 mt-3">
                                                    <a href="<?= base_url('siswa/downloadMateri/') . $materi['id_sub_sesi'] ?>" class="btn btn-primary btn-sm btn-block">Download File</a>
                                                </div>

                                            </div>
                                            <div class="soal mt-4 text-justify">
                                                <?= $materi['keterangan'] ?>
                                            </div>

                                        <?php }  ?>
                                    </div>
                                    <div class="card-footer text-center">
                                        <a href="<?= base_url('siswa/lihatSesiKursus/') .  $materi['id_kursus'] . '/' .  $materi['id_sesi'] ?>" class="btn btn-danger btn-sm">Kembali</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /page content -->
    </div>
</div>