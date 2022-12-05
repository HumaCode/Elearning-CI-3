<!-- page content -->
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Edit Data Guru</h3>
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
                                    <input type="hidden" name="id_guru" id="id_guru" value="<?= $guruById['id_guru'] ?>">
                                    <input type="hidden" name="username" id="username" value="<?= $userByUsername['username'] ?>">

                                    <div class="row">
                                        <div class="col-lg-6 offset-lg-3">


                                            <div class="form-group">
                                                <label for="nip">NIP</label>
                                                <input type="number" min="0" id="nip" name="nip" class="form-control" value="<?= $guruById['nip'] ?>" readonly>
                                                <!-- pesan error -->
                                                <?= form_error('nip', '<small class="text-danger">', '</small>'); ?>
                                            </div>

                                            <div class="form-group">
                                                <label for="nama">Nama Guru</label>
                                                <input type="text" id="nama" name="nama" class="form-control" value="<?= $guruById['nama'] ?>">
                                                <!-- pesan error -->
                                                <?= form_error('nama', '<small class="text-danger">', '</small>'); ?>
                                            </div>

                                            <div class="form-group">
                                                <label for="jk">Jenis Kelamin</label>
                                                <select name="jk" id="jk" class="form-control">
                                                    <?php foreach ($jenisKelamin as $jk) : ?>
                                                        <?php if ($jk == $guruById['jk']) : ?>
                                                            <option value="<?= $jk ?>" selected><?= $jk ?></option>
                                                        <?php else : ?>
                                                            <option value="<?= $jk ?>"><?= $jk ?></option>
                                                        <?php endif; ?>
                                                    <?php endforeach; ?>
                                                </select>
                                                <!-- pesan error -->
                                                <?= form_error('jk', '<small class="text-danger">', '</small>'); ?>
                                            </div>

                                            <div class="form-group">
                                                <label for="tmp_lahir">Tempat Lahir</label>
                                                <input id="tmp_lahir" class="form-control" type="text" name="tmp_lahir" value="<?= $guruById['tmp_lahir'] ?>">
                                                <!-- pesan error -->
                                                <?= form_error('tmp_lahir', '<small class="text-danger">', '</small>'); ?>
                                            </div>

                                            <div class="form-group">
                                                <label for="tgl_lahir">Tanggal Lahir</label>
                                                <input id="birthday" class="date-picker form-control" placeholder="dd-mm-yyyy" type="text" type="text" onfocus="this.type='date'" onmouseover="this.type='date'" onclick="this.type='date'" onblur="this.type='text'" onmouseout="timeFunctionLong(this)" name="tgl_lahir" value="<?= $guruById['tgl_lahir'] ?>">
                                                <script>
                                                    function timeFunctionLong(input) {
                                                        setTimeout(function() {
                                                            input.type = 'text';
                                                        }, 60000);
                                                    }
                                                </script>
                                                <!-- pesan error -->
                                                <?= form_error('tgl_lahir', '<small class="text-danger">', '</small>'); ?>
                                            </div>

                                            <div class="form-group">
                                                <label for="alamat">Alamat</label>
                                                <textarea name="alamat" id="alamat" cols="30" rows="3" class="form-control"><?= $guruById['alamat'] ?></textarea>
                                                <!-- pesan error -->
                                                <?= form_error('alamat', '<small class="text-danger">', '</small>'); ?>
                                            </div>

                                            <div class="form-group">
                                                <label for="tlp">No Hp</label>
                                                <input id="tlp" class="form-control" type="number" min="0" name="tlp" value="<?= $guruById['tlp'] ?>">
                                            </div>

                                            <div class="form-group">
                                                <label for="agama">Agama</label>
                                                <input id="agama" class="form-control" type="text" name="agama" value="<?= $guruById['agama'] ?>">
                                                <!-- pesan error -->
                                                <?= form_error('agama', '<small class="text-danger">', '</small>'); ?>
                                            </div>

                                            <div class="form-group">
                                                <label for="email">Email</label>
                                                <input id="email" class="form-control" type="text" name="email" value="<?= $guruById['email'] ?>">
                                                <!-- pesan error -->
                                                <?= form_error('email', '<small class="text-danger">', '</small>'); ?>
                                            </div>

                                            <div class="form-group">
                                                <label for="password">Password</label>
                                                <input id="password" class="form-control" type="password" name="password">
                                                <small>Jika ingin mengubah password, silahkan isikan dengan password baru.</small><br>
                                                <small>Jika tidak ingin mengubah password, abaikan saja</small><br>
                                                <small>Min 8 digit</small>
                                            </div>

                                            <div class="form-group form-check">
                                                <input type="checkbox" class="flat" name="is_active" <?php if ($guruById['is_active'] == 1) : ?> checked="checked" value="<?= $guruById['is_active'] ?>" <?php else : ?> <?php endif; ?> id="check">
                                                <label class="form-check-label" for="check">Status Akun</label>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div class="card-footer">
                                    <div class="item form-group">
                                        <div class="m-auto ">
                                            <a href="<?= base_url('administrator/guru') ?>" class="btn btn-danger" type="button">Batal</a>
                                            <button class="btn btn-primary" type="reset">Reset</button>
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