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
                        <small><?= $sesiId['sesi'] . ', ' . $kursusId['mapel'] ?></small>
                        <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                            </li>
                            <li><a class="close-link"><i class="fa fa-close"></i></a>
                            </li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <br />
                        <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" action="<?= base_url('administrator/prosesUploadKuisEssay/') . $sesiId['id_sesi'] . '/' . $kursusId['id_kursus'] ?>" method="post" enctype="multipart/form-data">

                            <div class="row">
                                <div class="col-lg-6 offset-lg-3">
                                    <div class="form-group">
                                        <label for="nama_kuis" class="text-danger">Title</label>
                                        <input name="nama_kuis" class="form-control" id="nama_kuis" type="text" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="sub_soal" class="text-danger">Kuis Ke</label>
                                        <select name="sub_soal" id="sub_soal" class="form-control" required>
                                            <option value="">-- Kuis Ke --</option>
                                            <?php
                                            for ($i = 1; $i <= 20; $i++) : ?>
                                                <option value="<?= $i ?>"><?= $i ?></option>
                                            <?php endfor; ?>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="nama_file">Upload File</label>
                                        <input type="file" class="form-control-file" id="nama_file" name="nama_file" accept=".xlsx,.xls,.doc,.docx,.pdf,.ppt,.pptx,.mp4,.3gp,.flv,.jpg,.jpeg,.png">
                                        <!-- pesan error -->
                                        <?= form_error('nama_file', '<small class="text-danger">', '</small>'); ?>
                                        <small class="">* Maksimal 3MB</small><br>
                                        <small class="">* File yang di dukung doc, docx, pdf, xlsx, ppt,pptx, xls, mp4, 3gp, flv, jpg, jpeg, png</small><br>
                                        <small class="">* Jika soal menggunakan file atau video, silahkan upload file.</small><br>
                                        <small class="">* Jika file / video yang akan di upload lebih dari 3 mb, silahkan gunakan text editor dibawah ini dengan cara menghubungkan melalui link.</small><br>
                                    </div>

                                    <div class="form-group">
                                        <textarea name="editor1" class="form-control" id="editor1" cols="30" rows="5" required></textarea>
                                    </div>
                                </div>
                            </div>

                            <div class="ln_solid"></div>

                            <div class="item form-group text-center">
                                <div class="col-md-6 col-sm-6 offset-md-3">
                                    <a href="<?= base_url('administrator/lihatSesiKursus/') . $kursusId['id_kursus'] . '/' . $sesiId['id_sesi'] ?>" class="btn btn-danger" type="button">Batal</a>
                                    <button class="btn btn-primary" type="reset">Reset</button>
                                    <button type="submit" class="btn btn-success">Tambah</button>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>