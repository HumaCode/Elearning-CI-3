<!-- page content -->
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Edit Kuis</h3>
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                    <div class="x_title">
                        <h2><?= $sesiId['sesi'] . ', ' . $kursusId['mapel'] . ', ' . $kursusId['kelas'] ?></h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                            </li>
                            <li><a class="close-link"><i class="fa fa-close"></i></a>
                            </li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">

                        <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" action="<?= base_url('guru/prosesEditKuis/') . $soalId['id_soal'] . '/' . $sesiId['id_sesi'] . '/' . $kursusId['id_kursus'] ?>" method="post" enctype="multipart/form-data">
                            <div class="card">
                                <div class="card-body">
                                    <input type="hidden" name="id_soal" id="id_soal" value="<?= $soalId['id_soal'] ?>">

                                    <div class="item form-group">
                                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="nama_kuis">Nama
                                        </label>
                                        <div class="col-md-6 col-sm-6 ">
                                            <input name="nama_kuis" class="form-control" id="nama_kuis" type="text" value="<?= $soalId['nama_soal'] ?>" required></input>
                                        </div>
                                    </div>

                                    <div class="item form-group">
                                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="nama_kuis">Kuis Ke
                                        </label>
                                        <div class="col-md-6 col-sm-6 ">
                                            <select name="sub_soal" id="disabledSelect" class="form-control">
                                                <option value="">-- Kuis Ke --</option>
                                                <?php
                                                for ($i = 1; $i <= 20; $i++) : ?>
                                                    <?php if ($i == $soalId['pertemuan']) : ?>
                                                        <option value="<?= $i ?>" selected><?= $i ?></option>
                                                    <?php else : ?>
                                                        <option value="<?= $i ?>"><?= $i ?></option>
                                                    <?php endif; ?>
                                                <?php endfor; ?>
                                            </select>
                                        </div>
                                    </div>



                                    <div class="item form-group">

                                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="nama_file">Upload File <span class="required">*</span>
                                        </label>

                                        <div class="col-md-4 col-sm-4 ">
                                            <input type="file" class="form-control-file" id="nama_file" name="nama_file" accept=".xlsx,.xls,.doc,.docx,.pdf,.ppt,.pptx,.mp4,.3gp,.flv">
                                            <!-- pesan error -->
                                            <?= form_error('nama_file', '<small class="text-danger">', '</small>'); ?>
                                            <small class="">* Maksimal 3MB</small><br>
                                            <small class="">* File yang di dukung doc, docx, pdf, xlsx, ppt,pptx, xls, mp4, 3gp, flv, jpeg, jpg, png</small><br>
                                            <small class="">* Jika soal menggunakan file atau video, silahkan upload file.</small><br>
                                            <small class="text-danger">* Jika tidak mengubah file, silahkan upload kembali file seperti sebelumnya.</small><br>
                                        </div>

                                        <div class="col-md-2">
                                            <?php if (substr($soalId['file'], -4) == '.mp4' || substr($soalId['file'], -4) == '.3gp' || substr($soalId['file'], -4) == '.flv' || substr($soalId['file'], -4) == 'File') { ?>

                                            <?php } else { ?>
                                                <a href="<?= base_url('assets/file/') . $soalId['file'] ?>" class="perbesar ">lihat file</a>
                                            <?php } ?>
                                        </div>
                                    </div>

                                    <div class="item form-group">
                                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="editor1">
                                        </label>
                                        <div class="col-md-6 col-sm-6 ">
                                            <textarea name="editor1" class="form-control" id="editor1" cols="30" rows="5" required><?= $soalId['soal'] ?></textarea>
                                        </div>
                                    </div>

                                </div>
                                <div class="card-footer text-center">
                                    <div class="item form-group">
                                        <div class="col-md-6 col-sm-6 offset-md-3">
                                            <a href="<?= base_url('guru/lihatSesiKursus/') . $sesiId['id_sesi'] . '/' . $kursusId['id_kursus'] ?>" class="btn btn-danger" type="button">Kembali</a>
                                            <button type="submit" class="btn btn-success">Ubah</button>
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