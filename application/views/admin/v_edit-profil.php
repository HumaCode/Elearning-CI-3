<!-- flashdata sweetalert -->
<div class="flash-data" data-flashdata="<?= $this->session->flashdata('pesan') ?>"></div>


<!-- page content -->
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Edit Profil</h3>
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
                        <br />
                        <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" action="" method="post">

                            <input type="hidden" id="id_user" name="id_user" value="<?= $userById['id_user'] ?>">

                            <div class="row">
                                <div class="col-lg-6 offset-lg-3">
                                    <div class="form-group">
                                        <label for="nama">Nama User</label>
                                        <input type="text" id="nama" class="form-control " name="nama" value="<?= $userById['nama'] ?>">
                                        <!-- pesan error -->
                                        <?= form_error('nama', '<small class="text-danger">', '</small>'); ?>
                                    </div>

                                    <div class="form-group">
                                        <label for="username">Username</label>
                                        <input type="number" min="0" id="username" class="form-control " name="username" value="<?= $userById['username'] ?>">
                                        <!-- pesan error -->
                                        <?= form_error('username', '<small class="text-danger">', '</small>'); ?>
                                    </div>
                                </div>
                            </div>

                            <div class="ln_solid"></div>
                            <div class="item form-group">
                                <div class="col-md-6 col-sm-6 offset-md-3 text-center">

                                    <a href="<?= base_url('administrator/profile') ?>" class="btn btn-danger">Batal</a>
                                    <button type="submit" class="btn btn-success">Simpan</button>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>