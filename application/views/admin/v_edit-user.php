<!-- page content -->
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Edit User</h3>
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

                        <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" action="" method="post">
                            <div class="card">
                                <div class="card-body">
                                    <input type="hidden" name="id_user" id="id_user" value="<?= $userById['id_user'] ?>"><br>

                                    <?php if ($userById['status'] == 'Guru') { ?>
                                        <input type="hidden" name="nip" id="nip" value="<?= $userByUsername['nip'] ?>"><br>
                                    <?php } else if ($userById['status'] == 'Siswa') { ?>
                                        <input type="hidden" name="nis" id="nis" value="<?= $userByUsername['nis'] ?>">
                                    <?php } ?>

                                    <div class="row">
                                        <div class="col-lg-6 offset-lg-3">
                                            <div class="form-group">
                                                <label for="nama">Nama User</label>
                                                <input type="text" id="nama" name="nama" class="form-control " value="<?= $userById['nama'] ?>">
                                                <!-- pesan error -->
                                                <?= form_error('nama', '<small class="text-danger">', '</small>'); ?>
                                            </div>

                                            <div class="form-group">
                                                <label for="username">Username</label>
                                                <input type="text" id="username" name="username" class="form-control" value="<?= $userById['username'] ?>">
                                                <small>Jika usernya adalah siswa, maka username menggunakan nis</small><br>
                                                <small>Jika usernya guru, maka username menggunakan nip</small>
                                                <!-- pesan error -->
                                                <?= form_error('username', '<small class="text-danger">', '</small>'); ?>
                                            </div>

                                            <div class="form-group">
                                                <label for="password">Password</label>
                                                <input id="password" class="form-control" type="password" name="password">
                                                <small>Jika ingin mengubah, silahkan isi dengan password baru</small><br>
                                                <small>jika ingin mengubah, minimal 8 digit</small>
                                                <!-- pesan error -->
                                                <?= form_error('password', '<small class="text-danger">', '</small>'); ?>
                                            </div>

                                            <div class="form-group">
                                                <label for="status">Status</label>
                                                <select name="status" id="status" class="form-control">
                                                    <?php foreach ($status as $s) : ?>
                                                        <?php if ($s == $userById['status']) : ?>
                                                            <option value="<?= $s ?>" selected><?= $s ?></option>
                                                        <?php else : ?>
                                                            <option value="<?= $s ?>"><?= $s ?></option>
                                                        <?php endif; ?>
                                                    <?php endforeach; ?>
                                                </select>
                                                <!-- pesan error -->
                                                <?= form_error('status', '<small class="text-danger">', '</small>'); ?>
                                            </div>

                                        </div>
                                    </div>

                                </div>
                                <div class="card-footer text-center">
                                    <div class="item form-group">
                                        <div class="col-md-6 col-sm-6 offset-md-3">
                                            <a href="<?= base_url('administrator/user') ?>" class="btn btn-danger" type="button">Batal</a>
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