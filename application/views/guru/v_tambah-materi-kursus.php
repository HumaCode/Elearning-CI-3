<!-- page content -->
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Tambah Materi</h3>
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Tambah</h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                            </li>
                            <li><a class="close-link"><i class="fa fa-close"></i></a>
                            </li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">

                        <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" action="<?= base_url('guru/uploadMateri/') . $sesiId['id_sesi'] . '/' . $kursusId['id_kursus'] ?>" method="post" enctype="multipart/form-data">
                            <div class="card">
                                <div class="card-body">
                                    <input type="hidden" name="id_sesi" id="id_sesi" value="<?= $sesiId['id_sesi'] ?>">
                                    <input type="hidden" name="id_kursus" id="id_kursus" value="<?= $kursusId['id_kursus'] ?>">

                                    <div class="item form-group">

                                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="nama_file">Nama File <span class="required">*</span>
                                        </label>

                                        <div class="col-md-6 col-sm-6 ">
                                            <input type="file" class="form-control-file" id="nama_file" name="nama_file" accept=".xlsx,.xls,.doc,.docx,.pdf,.ppt,.pptx,.mp4,.3gp,.flv,.jpeg,.jpg,.png">
                                            <!-- pesan error -->
                                            <?= form_error('nama_file', '<small class="text-danger">', '</small>'); ?>
                                            <small class="">Maksimal 3MB</small><br>
                                            <small class="">File yang di dukung doc, docx, pdf, xlsx, ppt,pptx, xls, mp4, 3gp, flv, jpg, jpeg, png</small><br>
                                            <small>Jika file melebihi batas, siahkan upload menggunakan link.</small>
                                        </div>

                                    </div>

                                    <div class="item form-group">
                                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="editor1">Keterangan <span class="required">*</span>
                                        </label>
                                        <div class="col-md-6 col-sm-6 ">
                                            <textarea name="editor1" class="form-control" id="editor1" cols="30" rows="5"></textarea>
                                            <!-- pesan error -->
                                            <?= form_error('editor1', '<small class="text-danger">', '</small>'); ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer text-center">
                                    <div class="item form-group">
                                        <div class="col-md-6 col-sm-6 offset-md-3">
                                            <a href="<?= base_url('guru/lihatSesiKursus/') . $sesiId['id_sesi'] . '/' . $kursusId['id_kursus'] ?>" class="btn btn-danger" type="button">Batal</a>
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