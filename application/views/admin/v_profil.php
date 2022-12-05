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
                                    <img class="img-responsive avatar-view" width="250" src="<?= base_url('assets/img/user/') . $user['foto']; ?>" alt="Avatar" title="Change the avatar">
                                </div>
                            </div>
                            <h3><?= $user['nama'] ?></h3>



                            <a href="<?= base_url('administrator/editProfile/') . $user['id_user'] ?>" class="btn btn-success"><i class="fa fa-edit m-right-xs"></i>Edit Profile</a>
                            <br />

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
                                        <td><?= $user['username'] ?></td>
                                    </tr>
                                    </tr>
                                </table>
                            </div>


                            <!-- end of user-activity-graph -->

                            <div class="" role="tabpanel" data-example-id="togglable-tabs">
                                <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
                                    <li role="presentation" class="active"><a href="#tab_content1" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">Ubah Foto</a>
                                    </li>
                                    <li role="presentation" class=""><a href="#tab_content3" role="tab" id="profile-tab2" data-toggle="tab" aria-expanded="false">Ubah Password</a>
                                    </li>
                                </ul>
                                <!-- pesan error -->
                                <?= form_error('password', '<h5 class="text-danger ">', '</h5>'); ?>
                                <div id="myTabContent" class="tab-content">
                                    <div role="tabpanel" class="tab-pane active " id="tab_content1" aria-labelledby="home-tab">
                                        <form action="<?= base_url('administrator/ubahFoto') ?>" method="post" enctype="multipart/form-data">
                                            <input type="hidden" id="id_user" name="id_user" value="<?= $user['id_user'] ?>">
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

                                    <div role="tabpanel" class="tab-pane fade" id="tab_content3" aria-labelledby="profile-tab">
                                        <form action="<?= base_url('administrator/profile') ?>" method="post">
                                            <input type="hidden" id="id_user" name="id_user" value="<?= $user['id_user'] ?>">
                                            <div class="item form-group">

                                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="password">Password
                                                </label>
                                                <div class="col-md-6 col-sm-6 ">
                                                    <input type="password" id="password" class="form-control " name="password">

                                                </div>
                                                <div class="col-md-2">
                                                    <button type=" submit" class="btn btn-primary float-sm-right ">Ubah</button>
                                                </div>
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