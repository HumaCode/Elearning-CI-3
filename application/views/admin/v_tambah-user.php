<!-- page content -->
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Tambah User</h3>
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

                        <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" action="<?= base_url('administrator/tambahUser') ?>" method="post">
                            <div class="card">
                                <div class="card-body">

                                    <div class="row">
                                        <div class="col-lg-6 offset-lg-3">
                                            <div class="form-group">
                                                <label for="nama">Nama User</label>
                                                <input type="text" id="nama" name="nama" class="form-control ">
                                                <!-- pesan error -->
                                                <?= form_error('nama', '<small class="text-danger">', '</small>'); ?>
                                            </div>

                                            <div class="form-group">
                                                <label for="username">Username</label>
                                                <input type="text" id="username" name="username" class="form-control">
                                                <small>Jika usernya adalah siswa, maka username menggunakan nis</small><br>
                                                <small>Jika usernya guru, maka username menggunakan nip</small>
                                                <!-- pesan error -->
                                                <?= form_error('username', '<small class="text-danger">', '</small>'); ?>
                                            </div>

                                            <div class="form-group">
                                                <label for="password">Password</label>
                                                <input id="password" class="form-control" type="password" name="password">
                                                <small>Password Minimal 8 digit</small>
                                                <!-- pesan error -->
                                                <?= form_error('password', '<small class="text-danger">', '</small>'); ?>
                                            </div>

                                            <div class="form-group">
                                                <label for="status">Status</label>
                                                <select name="status" id="status" class="form-control">
                                                    <option value="">-- Pilih Status --</option>
                                                    <option value="Administrator">Administrator</option>
                                                    <option value="Guru">Guru</option>
                                                    <option value="Siswa">Siswa</option>
                                                </select>
                                                <!-- pesan error -->
                                                <?= form_error('status', '<small class="text-danger">', '</small>'); ?>
                                            </div>

                                        </div>
                                    </div>

                                </div>
                                <div class="card-footer">
                                    <div class="item form-group">
                                        <div class="col-md-6 col-sm-6 offset-md-3">
                                            <a href="<?= base_url('administrator/user') ?>" class="btn btn-danger" type="button">Batal</a>
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