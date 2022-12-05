<!-- flashdata sweetalert -->
<div class="flash-data" data-flashdata="<?= $this->session->flashdata('pesan') ?>"></div>

<!-- page content -->
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3> Setting</h3>
            </div>

        </div>

        <div class="clearfix"></div>

        <div class="">

            <div class="x_panel">
                <div class="x_title">
                    <h2><i class="fa fa-bars"></i> Tabs </h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                        </li>

                        <li><a class="close-link"><i class="fa fa-close"></i></a>
                        </li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">

                    <ul class="nav nav-tabs bar_tabs" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Setting Halaman Awal</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Ubah Foto</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">Kritik dan Saran</a>
                        </li>
                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                            <form action="" method="post">
                                <input type="hidden" name="id_setting" id="id_setting" value="<?= $setting['id_setting'] ?>">

                                <div class="form-group">
                                    <label for="title">Title</label>
                                    <input type="text" name="title" class="form-control" id="title" value="<?= $setting['title'] ?>">
                                </div>


                                <div class="x_title mt-4 "></div>
                                <div class="x_title  mb-4"></div>
                                <h4 class="text-danger text-center">Deskripsi</h4>


                                <div class="form-group">
                                    <label for="deskripsi1">Deskripsi 1</label>
                                    <textarea name="deskripsi1" class="form-control" id="deskripsi1" cols="30" rows="3"><?= $setting['desk1'] ?></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="deskripsi2">Deskripsi 2</label>
                                    <textarea name="deskripsi2" class="form-control" id="deskripsi2" cols="30" rows="3"><?= $setting['desk2'] ?></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="deskripsi3">Deskripsi 3</label>
                                    <textarea name="deskripsi3" class="form-control" id="deskripsi3" cols="30" rows="3"><?= $setting['desk3'] ?></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="deskripsi4">Deskripsi 4</label>
                                    <textarea name="deskripsi4" class="form-control" id="deskripsi4" cols="30" rows="3"><?= $setting['desk4'] ?></textarea>
                                </div>

                                <div class="x_title mt-4 "></div>
                                <div class="x_title  mb-4"></div>
                                <h4 class="text-danger text-center">Profile</h4>

                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="nm_sekolah">Nama Sekolah</label>
                                            <input type="text" name="nm_sekolah" class="form-control" id="nm_sekolah" value="<?= $setting['nm_sekolah'] ?>">
                                            <!-- pesan error -->
                                            <?= form_error('nm_sekolah', '<small class="text-danger">', '</small>'); ?>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="npsn">NPSN</label>
                                            <input type="number" min="0" name="npsn" class="form-control" id="npsn" value="<?= $setting['npsn'] ?>">
                                            <!-- pesan error -->
                                            <?= form_error('npsn', '<small class="text-danger">', '</small>'); ?>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="j_pndidikan">Jenjang Pendidikan</label>
                                            <input type="text" name="j_pndidikan" class="form-control" id="j_pndidikan" value="<?= $setting['j_pndidikan'] ?>">
                                            <!-- pesan error -->
                                            <?= form_error('j_pndidikan', '<small class="text-danger">', '</small>'); ?>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="rt">RT</label>
                                            <input type="number" min="0" name="rt" class="form-control" id="rt" value="<?= $setting['rt'] ?>">
                                            <!-- pesan error -->
                                            <?= form_error('rt', '<small class="text-danger">', '</small>'); ?>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="rw">RW</label>
                                            <input type="number" min="0" name="rw" class="form-control" id="rw" value="<?= $setting['rw'] ?>">
                                            <!-- pesan error -->
                                            <?= form_error('rw', '<small class="text-danger">', '</small>'); ?>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="kd_pos">Kode Pos</label>
                                            <input type="number" min="0" name="kd_pos" class="form-control" id="kd_pos" value="<?= $setting['kd_pos'] ?>">
                                            <!-- pesan error -->
                                            <?= form_error('kd_pos', '<small class="text-danger">', '</small>'); ?>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="alamat">Alamat</label>
                                    <textarea name="alamat" id="alamat" cols="30" rows="3" class="form-control"><?= $setting['alamat'] ?></textarea>
                                    <!-- pesan error -->
                                    <?= form_error('alamat', '<small class="text-danger">', '</small>'); ?>
                                </div>

                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="kelurahan">Kelurahan</label>
                                            <input type="text" name="kelurahan" class="form-control" id="kelurahan" value="<?= $setting['kelurahan'] ?>">
                                            <!-- pesan error -->
                                            <?= form_error('kelurahan', '<small class="text-danger">', '</small>'); ?>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="kecamatan">Kecamatan</label>
                                            <input type="text" name="kecamatan" class="form-control" id="kecamatan" value="<?= $setting['kecamatan'] ?>">
                                            <!-- pesan error -->
                                            <?= form_error('kecamatan', '<small class="text-danger">', '</small>'); ?>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="kabupaten">Kabupaten</label>
                                            <input type="text" name="kabupaten" class="form-control" id="kabupaten" value="<?= $setting['kabupaten'] ?>">
                                            <!-- pesan error -->
                                            <?= form_error('kabupaten', '<small class="text-danger">', '</small>'); ?>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="status">Status Sekolah</label>
                                            <input type="text" name="status" class="form-control" id="status" value="<?= $setting['status_sekolah'] ?>">
                                        </div>
                                        <!-- pesan error -->
                                        <?= form_error('status', '<small class="text-danger">', '</small>'); ?>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="email">Email</label>
                                            <input type="text" name="email" class="form-control" id="email" value="<?= $setting['email'] ?>">
                                            <!-- pesan error -->
                                            <?= form_error('email', '<small class="text-danger">', '</small>'); ?>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="fb">Facebook</label>
                                            <input type="text" name="fb" class="form-control" id="fb" value="<?= $setting['fb'] ?>">
                                            <!-- pesan error -->
                                            <?= form_error('fb', '<small class="text-danger">', '</small>'); ?>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="tlp">Telepon</label>
                                            <input type="number" min="0" name="tlp" class="form-control" id="tlp" value="<?= $setting['tlp'] ?>">
                                            <!-- pesan error -->
                                            <?= form_error('tlp', '<small class="text-danger">', '</small>'); ?>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="map">Map</label>
                                    <textarea name="map" id="map" cols="30" rows="3" class="form-control"><?= $setting['map'] ?></textarea>
                                    <!-- pesan error -->
                                    <?= form_error('map', '<small class="text-danger">', '</small>'); ?>
                                </div>


                                <button type="submit" class="btn btn-primary">Ubah</button>

                            </form>
                        </div>

                        <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">

                            <div class="row">
                                <div class="col-md-6 offset-md-3">
                                    <h4 class="text-center">Gambar yang sedang digunakan</h4>
                                    <img src="<?= base_url('assets/img/logo/') . $setting['gambar'] ?>" class="img-fluid" alt="">
                                </div>
                            </div>

                            <form action="<?= base_url('administrator/settingUpload') ?>" method="post" enctype="multipart/form-data">
                                <input type="hidden" name="id_setting" id="id_setting" value="<?= $setting['id_setting'] ?>">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="mt-3">Gambar</label>
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input inp" id="customFile" name="gambar" required accept=".jpg,.jpeg,.png">
                                            <label class="custom-file-label" for="customFile">Pilih Gambar</label>
                                        </div>
                                        <small>Format yang di dukung jpeg, jpg dan png</small><br>
                                        <small>Maksimal 2 MB</small>
                                    </div>

                                    <div class="col-md-6">
                                        <label class="mt-3">Preview</label>
                                        <div class="form-group">
                                            <img src="<?= base_url() . 'assets/img/logo/noimage.png' ?> " class="img-thumbnail " width="250" alt="" id="gambar_load">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <button type="submit" class="btn btn-primary float-sm-right ">Ubah</button>
                                    </div>

                                </div>
                            </form>
                        </div>

                        <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                            <table id="datatable-responsive" class="table table-hover table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                                <thead class="thead-dark text-center">
                                    <tr>
                                        <th>No</th>
                                        <th>Email</th>
                                        <th>Kritik</th>
                                        <th>Saran</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $i = 1;
                                    foreach ($qna as $q) : ?>
                                        <tr>
                                            <td class="text-center"><?= $i ?></td>
                                            <td><?= $q['email'] ?></td>
                                            <td><?= $q['kritik'] ?></td>
                                            <td><?= $q['saran'] ?></td>
                                            <td class="text-center">
                                                <a href="<?= base_url('administrator/lihatQna/') . $q['id_qna'] ?>" class="btn btn-secondary btn-sm">Lihat</a>
                                                <a href="<?= base_url('administrator/hapusQna/') . $q['id_qna'] ?>" class="btn btn-danger btn-sm tombol-hapus">Hapus</a>
                                            </td>
                                        </tr>
                                    <?php $i++;
                                    endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </div>
</div>
<!-- /page content -->