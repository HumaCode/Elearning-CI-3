<!-- page content -->
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Tambah Sesi Kursus</h3>
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Tambah </h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                            </li>
                            <li><a class="close-link"><i class="fa fa-close"></i></a>
                            </li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">

                        <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" action="<?= base_url('guru/tambahSesiKursus/') . $kursusId['id_kursus'] ?>" method="post">
                            <div class="card">
                                <div class="card-body">
                                    <input type="hidden" id="id_kursus" name="id_kursus" value="<?= $kursusId['id_kursus'] ?>">

                                    <div class="item form-group">
                                        <label for="sesi" class="col-form-label col-md-3 col-sm-3 label-align">Sesi Kursus <span class="required">*</span></label>
                                        <div class="col-md-6 col-sm-6 ">
                                            <input id="sesi" class="form-control" type="text" name="sesi">
                                            <!-- pesan error -->
                                            <?= form_error('sesi', '<small class="text-danger">', '</small>'); ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer text-center">
                                    <div class="item form-group">
                                        <div class="col-md-6 col-sm-6 offset-md-3">
                                            <a href="<?= base_url('guru/detailKursus/') . $kursusId['id_kursus'] ?>" class="btn btn-danger" type="button">Batal</a>
                                            <button class="btn btn-primary" type="reset">Reset</button>
                                            <button type="submit" class="btn btn-success">Tambah</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>