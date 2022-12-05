<!-- flashdata sweetalert -->
<div class="flash-data" data-flashdata="<?= $this->session->flashdata('pesan') ?>"></div>

<!-- page content -->
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Detail Soal</h3>
            </div>
        </div>
    </div>
    <div class="clearfix"></div>

    <div class="row">

        <div class="col-md-12 col-sm-12 ">
            <div class="x_panel">
                <div class="x_title">
                    <small>Soal <?= $kursusId['mapel'] . ' ' . $sesiId['sesi'] . ' ' . $kursusId['kelas'] ?></small>
                    <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                        </li>
                        <li><a class="close-link"><i class="fa fa-close"></i></a>
                        </li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">



                    <?php if (empty($jwbByPertemuan['pertemuan'])) { ?>

                        <div class="card">
                            <div class="card-header">
                                <h4>Kerjakan dengan teliti.</h4>
                            </div>


                            <div class="card-body">

                                <?php
                                if ($soalEssay['file'] == 'Tidak ada File') { ?>

                                    <div class="row">
                                        <div class="col-lg-10 col-sm-8 offset-lg-1">
                                            <div class="card p-3">
                                                <h4 class="text-danger text-center"><strong> Soal</strong></h4>
                                                <hr>

                                                <?= $soalEssay['soal'] ?>

                                            </div>
                                        </div>
                                    </div>



                                <?php } else { ?>

                                    <div class="row">
                                        <div class="col-lg-6 offset-lg-3">

                                            <div class="card p-3">

                                                <h4 class="text-danger text-center"><strong> Soal</strong></h4>
                                                <hr>

                                                <?php if (substr($soalEssay['file'], -3) == 'jpg' || substr($soalEssay['file'], -3) == 'png' || substr($soalEssay['file'], -4) == 'jpeg') { ?>

                                                    <a href="<?= base_url('assets/file/') . $soalEssay['file'] ?>" class="perbesar img-fluid">
                                                        <img class="img-fluid" src="<?= base_url('assets/file/') . $soalEssay['file'] ?>" alt="">
                                                    </a>

                                                    <p class="mt-3 text-justify"><?= $soalEssay['soal'] ?></p>
                                                <?php } else if (substr($soalEssay['file'], -4) == '.mp4' || substr($soalEssay['file'], -4) == '.3gp' || substr($soalEssay['file'], -4) == '.flv') { ?>


                                                    <video controls id="video1" class="video-js vjs-default-skin m-auto img-fluid">
                                                        <source src="<?= base_url() . "assets/file/" . $soalEssay['file'] ?>" type="video/mp4" data-setup='{"controls" : true, "autoplay" : false, "preload" : "auto"}'>
                                                    </video>

                                                    <p class="mt-3 text-justify"><?= $soalEssay['soal'] ?></p>

                                                <?php } else { ?>

                                                    <div class="row">
                                                        <div class="col-lg-6 text-center">
                                                            <?php if (substr($soalEssay['file'], -4) == '.pdf') { ?>
                                                                <img src="<?= base_url('assets/img/logo/pdf.png') ?>" class="img-fluid" alt="">
                                                            <?php } else if (substr($soalEssay['file'], -4) == '.doc' || substr($soalEssay['file'], -4) == 'docx') { ?>
                                                                <img width="300" src="<?= base_url('assets/img/logo/docx.png') ?>" alt="">
                                                            <?php } else if (substr($soalEssay['file'], -4) == '.xls' || substr($soalEssay['file'], -4) == 'xlsx') { ?>
                                                                <img width="300" src="<?= base_url('assets/img/logo/xlsx.png') ?>" alt="">
                                                            <?php } ?>
                                                        </div>

                                                        <div class="col-lg-6 mt-3">
                                                            <a href="<?= base_url('siswa/downloadSoal/') . $soalEssay['id_soal'] ?>" class="btn btn-primary btn-sm btn-block">Download File</a>
                                                        </div>
                                                    </div>
                                                    <hr>
                                                    <p class=" text-justify"><?= $soalEssay['soal'] ?></p>

                                                <?php } ?>
                                            </div>

                                        </div>
                                    </div>

                                <?php } ?>

                                <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" action="<?= base_url('siswa/prosesJawab/') . $soalEssay['id_sesi'] . '/' . $soalEssay['id_kursus'] . '/' . $soalEssay['pertemuan'] . '/' . $soalEssay['id_soal'] ?>" method="post" enctype="multipart/form-data">

                                    <input type="hidden" name="id_soal" id="id_soal" value="<?= $soalEssay['id_soal'] ?>">

                                    <div class="row mt-3 ">
                                        <div class="col-lg ">
                                            <div class="item form-group ">
                                                <div class="card p-3 m-auto">
                                                    <h4 class="text-danger text-center"><strong> Lembar Jawab</strong></h4>
                                                    <hr>

                                                    <textarea name="jawab" id="editor1" cols="30" rows="3" class="form-control"></textarea>
                                                    <small class="mt-2">Jika jawaban menggunakan file, boleh di kosongi</small>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-6 offset-lg-3">

                                            <input type="file" name="file" id="file" class="form-control"><br>

                                            <small class="m-2">Jika jawaban menggunakan file silahkan upload file</small>
                                        </div>
                                    </div>
                            </div>

                            <div class="card-footer ">
                                <div class="row">
                                    <div class="col-md-6 offset-md-3">

                                        <button type="submit" class="btn btn-success btn-sm btn-block">Jawab</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        </form>
                    <?php } else { ?>
                        <div class="text-center">
                            <div class="alert alert-success">
                                <h3>Anda sudah menjawab</h3>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
            <a href="<?= base_url('siswa/lihatSesiKursus/') . $soalEssay['id_sesi'] . '/' . $soalEssay['id_kursus'] ?>" class="btn btn-danger btn-sm btn-block">Kembali</a>
        </div>
    </div>
</div>