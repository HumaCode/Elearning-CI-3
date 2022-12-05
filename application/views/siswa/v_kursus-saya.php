<!-- flashdata sweetalert -->
<div class="flash-data" data-flashdata="<?= $this->session->flashdata('pesan') ?>"></div>

<!-- page content -->
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Daftar Kursus </h3>
            </div>
        </div>

        <div class="clearfix"></div>

        <div class="row">
            <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Semua Kursus</h2>
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
                                                                                </table>
                                                                            </small>


                                                                            <div class="list-unstyled text-center mt-2">
                                                                                <img src="<?= base_url('assets/img/logo/') . $kr['gambar'] ?>" alt="<?= $kr['gambar'] ?>" width="150">
                                                                            </div>
                                                                            <ul class="list-unstyled text-left">
                                                                                <li></li>
                                                                            </ul>
                                                                        </div>
                                                                    </div>
                                                                    <div class="pricing_footer">

                                                                        <!-- <a href="" data-toggle="modal" data-target=".id<?= $kr['id_kursus'] ?>" class="btn btn-success btn-block" role="button">Mulai</a> -->

                                                                        <a href="<?= base_url('siswa/detailKursus/') . $kr['id_kursus'] ?>" class="btn btn-success btn-block" role="button">Mulai</a>



                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- price element -->

                                                        <!-- modal -->
                                                        <div class="modal fade id<?= $kr['id_kursus'] ?>" tabindex="-1" role="dialog" aria-hidden="true">
                                                            <div class="modal-dialog modal-lg">
                                                                <div class="modal-content">

                                                                    <div class="modal-header">
                                                                        <h4 class="modal-title" id="myModalLabel2">Masukan Kode</h4>
                                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
                                                                        </button>
                                                                    </div>
                                                                    <form action="<?= base_url('siswa/aksesKelas/') . $kr['id_kursus'] . '/' . $kr['id_kelas'] . '/' . $kr['id_mapel'] ?>" method="post">
                                                                        <div class="modal-body">
                                                                            <div class="item form-group">
                                                                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="kode">Masukan Kode Kelas <span class="required">*</span>
                                                                                </label>
                                                                                <div class="col-md-6 col-sm-6 ">
                                                                                    <input type="text" id="kode" name="kode" required="required" class="form-control">
                                                                                </div>
                                                                            </div>

                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                            <button type="submit" class="btn btn-primary">Masuk</button>
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- /modals -->

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