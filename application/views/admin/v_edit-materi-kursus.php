<!-- page content -->
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Edit Materi</h3>
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

                        <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" action="" method="post" enctype="multipart/form-data">
                            <div class="card">
                                <div class="card-body">
                                    <input type="hidden" name="id_sesi" id="id_sesi" value="<?= $sesiId['id_sesi'] ?>">
                                    <input type="hidden" name="id_kursus" id="id_kursus" value="<?= $kursusId['id_kursus'] ?>">
                                    <input type="hidden" name="id_sub_sesi" id="id_sub_sesi" value="<?= $subSesiId['id_sub_sesi'] ?>">


                                    <div class="row">
                                        <div class="col-lg-6 offset-lg-3">
                                            <div class="form-group">
                                                <input type="file" class="form-control-file" id="nama_file" name="nama_file" accept=".xlsx,.xls,.doc,.docx,.pdf,.ppt,.pptx,.mp4,.3gp,.flv">
                                                <small class="">Maksimal 3MB</small><br>
                                                <small class="">File yang di dukung doc, docx, pdf, xlsx, ppt,pptx, xls, mp4, 3gp, flv, jpeg, jpg, png</small><br>
                                                <small class="">Jika file tidak kosong, dan ingin mengubah keteranganya saja, silahkan upload ulang file.</small>
                                            </div>

                                            <div class="form-group">
                                                <label for="editor1" class="text-danger">Keterangan</label>
                                                <textarea name="editor1" class="form-control" id="editor1" cols="30" rows="5"><?= $subSesiId['keterangan'] ?></textarea>
                                                <!-- pesan error -->
                                                <?= form_error('editor1', '<small class="text-danger">', '</small>'); ?>
                                            </div>

                                        </div>
                                    </div>



                                </div>
                                <div class="card-footer text-center">
                                    <div class="item form-group">
                                        <div class="col-md-6 col-sm-6 offset-md-3">
                                            <a href="<?= base_url('administrator/lihatSesiKursus/') . $subSesiId['id_sesi'] . '/' . $subSesiId['id_kursus'] ?>" class="btn btn-danger" type="button">Batal</a>
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