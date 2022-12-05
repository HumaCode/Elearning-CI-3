<!-- page content -->
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Tambah Kuis Essay</h3>
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                    <div class="x_title">
                        <small><?= $sesiId['sesi'] . ', ' . $kursusId['mapel'] . ', ' . $kursusId['kelas'] ?></small>
                        <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                            </li>
                            <li><a class="close-link"><i class="fa fa-close"></i></a>
                            </li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">


                        <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" action="<?= base_url('guru/prosesUploadKuisEssay/') . $sesiId['id_sesi'] . '/' . $kursusId['id_kursus'] ?>" method="post" enctype="multipart/form-data">
                            <div class="card">
                                <div class="card-body">
                                    <div class="item form-group">
                                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="nama_kuis">Nama
                                        </label>
                                        <div class="col-md-6 col-sm-6 ">
                                            <input name="nama_kuis" class="form-control" id="nama_kuis" type="text" required></input>
                                        </div>
                                    </div>

                                    <div class="item form-group">
                                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="nama_kuis">Kuis Ke
                                        </label>
                                        <div class="col-md-6 col-sm-6 ">
                                            <select name="sub_soal" id="sub_soal" class="form-control" required>
                                                <option value="">-- Kuis Ke --</option>
                                                <?php
                                                for ($i = 1; $i <= 20; $i++) : ?>
                                                    <option value="<?= $i ?>"><?= $i ?></option>
                                                <?php endfor; ?>
                                            </select>
                                        </div>
                                    </div>



                                    <div class="item form-group">

                                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="nama_file">Upload File
                                        </label>

                                        <div class="col-md-6 col-sm-6 ">
                                            <input type="file" class="form-control-file" id="nama_file" name="nama_file" accept=".xlsx,.xls,.doc,.docx,.pdf,.ppt,.pptx,.mp4,.3gp,.flv,.jpg,.jpeg,.png">
                                            <!-- pesan error -->
                                            <?= form_error('nama_file', '<small class="text-danger">', '</small>'); ?>
                                            <small class="">* Maksimal 3MB</small><br>
                                            <small class="">* File yang di dukung doc, docx, pdf, xlsx, ppt,pptx, xls, mp4, 3gp, flv, jpeg, jpg, png</small><br>
                                            <small class="">* Jika soal menggunakan file atau video, silahkan upload file.</small><br>
                                            <small class="">* Jika file yang akan di upload lebih dari 3 mb, silahkan gunakan text editor dibawah ini dengan cara meredirect dengan link.</small><br>
                                        </div>
                                    </div>

                                    <div class="item form-group">
                                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="editor1">
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