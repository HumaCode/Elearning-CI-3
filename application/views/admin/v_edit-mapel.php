<!-- page content -->
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Edit Matapelajaran</h3>
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Edit</h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                            </li>
                            <li><a class="close-link"><i class="fa fa-close"></i></a>
                            </li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">

                        <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" action="" method="post">
                            <input type="hidden" name="id_mapel" id="id_mapel" value="<?= $mapelById['id_mapel'] ?>">
                            <div class="card">
                                <div class="card-body">

                                    <div class="row">
                                        <div class="col-lg-6 offset-lg-3">
                                            <div class="form-group">
                                                <label for="mapel">Matapelajaran</label>
                                                <input type="text" id="mapel" name="mapel" class="form-control " value="<?= $mapelById['mapel'] ?>">
                                                <!-- pesan error -->
                                                <?= form_error('mapel', '<small class="text-danger">', '</small>'); ?>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div class="card-footer text-center">
                                    <div class="item form-group">
                                        <div class="col-md-6 col-sm-6 offset-md-3">
                                            <a href="<?= base_url('administrator/mapel') ?>" class="btn btn-danger" type="button">Batal</a>
                                            <button type="submit" class="btn btn-success">Edit</button>
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