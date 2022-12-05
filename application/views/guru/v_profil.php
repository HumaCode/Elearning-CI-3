<!-- flashdata sweetalert -->
<div class="flash-data" data-flashdata="<?= $this->session->flashdata('pesan') ?>"></div>

<!-- page content -->
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Profile</h3>
            </div>

            <?php
            if (isset($error)) {
                echo '<span class="text-danger">' . $error . '</span>';
            }

            ?>
        </div>

        <div class="clearfix"></div>

        <div class="row">
            <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Profil Saya</h2>

                        <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                            </li>
                            <li><a class="close-link"><i class="fa fa-close"></i></a>
                            </li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <div class="col-md-3 col-sm-3  profile_left">
                            <div class="profile_img">
                                <div id="crop-avatar">
                                    <!-- Current avatar -->
                                    <img class="img-responsive avatar-view" width="250" src="<?= base_url('assets/img/user/') . $guruBySession['foto']; ?>" alt="Avatar" title="Change the avatar">
                                </div>
                            </div>
                            <h3><?= $guruBySession['nama'] ?></h3>

                            <ul class="list-unstyled user_data">
                                <li><i class="fa fa-map-marker user-profile-icon"></i> <?= $guruBySession['alamat'] ?>
                                </li>

                                <li>
                                    <i class="fa fa-at"></i> <?= $guruBySession['email'] ?>
                                </li>

                                <li class="m-top-xs">
                                    <i class="fa fa-tty"></i>
                                    <?= $guruBySession['tlp'] ?>
                                </li>
                            </ul>

                            <a href="<?= base_url('guru/editProfil/') . $guruBySession['id_guru'] ?>" class="btn btn-success"><i class="fa fa-edit m-right-xs"></i>Edit Profile</a>
                            <br />

                            <!-- start skills -->
                            <h4>Kursus yang dibuat</h4><br>
                            <ul class="list-unstyled user_data">

                                <?php if (empty($kursusGuru)) : ?>
                                    <span class="text-danger">Belum ada kursus</span>
                                <?php else : ?>
                                    <?php foreach ($kursusGuru as $kg) : ?>
                                        <li>
                                            <strong><?= $kg['mapel'] ?></strong>
                                        </li>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </ul>
                            <!-- end of skills -->

                        </div>
                        <div class="col-md-9 col-sm-9 ">
                            <div class="profile_title">
                                <div class="col-md-6">
                                    <h2>Bergabung Sejak</h2>
                                </div>
                                <div class="col-md-6 float-right">
                                    <h2><?= date('d F Y', $user['tgl_daftar'])  ?></h2>
                                </div>
                            </div>
                            <!-- start of user-activity-graph -->
                            <div style="margin-top: 10px;">
                                <table>
                                    <tr>
                                        <td width="200">Nip</td>
                                        <td>:</td>
                                        <td><?= $guruBySession['nip'] ?></td>
                                    </tr>
                                    <tr>
                                        <td>Jenis Kelamin</td>
                                        <td>:</td>
                                        <td><?= $guruBySession['jk'] ?></td>
                                    </tr>
                                    <tr>
                                        <td>Tempat Lahir</td>
                                        <td>:</td>
                                        <td><?= $guruBySession['tmp_lahir'] ?></td>
                                    </tr>
                                    <tr>
                                        <td>Tanggal Lahir</td>
                                        <td>:</td>
                                        <td>
                                            <?= date('d F Y', strtotime($guruBySession['tgl_lahir'])) ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Alamat</td>
                                        <td>:</td>
                                        <td><?= $guruBySession['alamat'] ?></td>
                                    </tr>
                                    <tr>
                                        <td>Agama</td>
                                        <td>:</td>
                                        <td><?= $guruBySession['agama'] ?></td>
                                    </tr>
                                    <tr>
                                        <td>Status Akun</td>
                                        <td>:</td>
                                        <td>
                                            <?php if ($guruBySession['is_active'] == 1) : ?>
                                                <span class="text-success">Aktif</span>
                                            <?php else : ?>
                                                <span class="text-danger">Tidak Aktif</span>
                                            <?php endif; ?>
                                        </td>
                                    </tr>
                                </table>
                            </div>


                            <!-- end of user-activity-graph -->

                            <div class="" role="tabpanel" data-example-id="togglable-tabs">
                                <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
                                    <li role="presentation" class="active"><a href="#tab_content1" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">Ubah Foto</a>
                                    </li>
                                    <li role="presentation" class=""><a href="#tab_content2" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false">Ubah Email</a>
                                    </li>
                                    <li role="presentation" class=""><a href="#tab_content3" role="tab" id="profile-tab2" data-toggle="tab" aria-expanded="false">Ubah Password</a>
                                    </li>
                                </ul>
                                <!-- pesan error -->
                                <?= form_error('password', '<h5 class="text-danger ">', '</h5>'); ?>
                                <div id="myTabContent" class="tab-content">
                                    <div role="tabpanel" class="tab-pane active " id="tab_content1" aria-labelledby="home-tab">
                                        <form action="<?= base_url('guru/ubahFoto') ?>" method="post" enctype="multipart/form-data">
                                            <input type="hidden" id="id_guru" name="id_guru" value="<?= $guruBySession['id_guru'] ?>">
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <label>Foto</label>
                                                    <div class="custom-file">
                                                        <input type="file" class="custom-file-input inp" id="customFile" name="foto" required accept=".png,.jpg,.jpeg">
                                                        <label class="custom-file-label" for="customFile">Pilih Gambar</label>
                                                    </div>
                                                    <small>Format yang di dukung jpeg, jpg dan png</small><br>
                                                    <small>Maksimal 2 MB</small>
                                                </div>

                                                <div class="col-lg-6">
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
                                    <div role="tabpanel" class="tab-pane fade" id="tab_content2" aria-labelledby="profile-tab">

                                        <form action="<?= base_url('guru/ubahEmail') ?>" method="post">
                                            <input type="hidden" id="id_guru" name="id_guru" value="<?= $guruBySession['id_guru'] ?>">
                                            <div class="item form-group">
                                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="email">Email
                                                </label>
                                                <div class="col-md-6 col-sm-6 ">
                                                    <input type="email" id="email" class="form-control " name="email" value="<?= $guruBySession['email'] ?>" required>
                                                </div>
                                                <button type="submit" class="btn btn-primary float-sm-right ">Ubah</button>
                                            </div>
                                        </form>

                                    </div>
                                    <div role="tabpanel" class="tab-pane fade" id="tab_content3" aria-labelledby="profile-tab">
                                        <form action="<?= base_url('guru/profile') ?>" method="post">
                                            <input type="hidden" id="id_guru" name="id_guru" value="<?= $guruBySession['id_guru'] ?>">
                                            <div class="item form-group">

                                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="password">Password
                                                </label>
                                                <div class="col-md-6 col-sm-6 ">
                                                    <input type="password" id="password" class="form-control " name="password">

                                                </div>
                                                <button type=" submit" class="btn btn-primary float-sm-right ">Ubah</button>
                                            </div>
                                            <div class="col-md-6 offset-md-3">
                                                <small>Jika ingin mengubah password, silahkan masukan password baru</small><br>
                                                <small>Minimal 8 digit.</small>
                                            </div>
                                        </form>
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
<!-- /page content -->