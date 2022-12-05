<!-- page content -->
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Tambah Data Siswa</h3>
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

                        <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" action="<?= base_url('administrator/tambahSiswa') ?>" method="post">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-lg-6 offset-lg-3">
                                            <div class="form-group">
                                                <label for="nis">NIS</label>
                                                <input type="number" class="form-control" id="nis" min="0">
                                                <!-- pesan error -->
                                                <?= form_error('nis', '<small class="text-danger">', '</small>'); ?>
                                            </div>

                                            <div class="form-group">
                                                <label for="nama">Nama Siswa</label>
                                                <input type="text" class="form-control" id="nama">
                                                <!-- pesan error -->
                                                <?= form_error('nama', '<small class="text-danger">', '</small>'); ?>
                                            </div>

                                            <div class="form-group">
                                                <label for="jk">Jenis Kelamin</label>
                                                <select name="jk" id="jk" class="form-control">
                                                    <option value="">-- Jenis Kelamin --</option>
                                                    <option value="Laki-laki">Laki-laki</option>
                                                    <option value="Perempuan">Perempuan</option>
                                                </select>
                                                <!-- pesan error -->
                                                <?= form_error('jk', '<small class="text-danger">', '</small>'); ?>
                                            </div>

                                            <div class="form-group">
                                                <label for="kelas">Kelas</label>
                                                <select name="kelas" id="kelas" class="form-control">
                                                    <option value="">-- Kelas --</option>
                                                    <?php foreach ($kelas as $k) : ?>
                                                        <option value="<?= $k['id_kelas'] ?>"><?= $k['kelas'] ?></option>
                                                    <?php endforeach; ?>
                                                </select>
                                                <!-- pesan error -->
                                                <?= form_error('kelas', '<small class="text-danger">', '</small>'); ?>
                                            </div>

                                            <div class="form-group">
                                                <label for="tmp_lahir">Tempat Lahir</label>
                                                <input type="text" class="form-control" id="tmp_lahir">
                                                <!-- pesan error -->
                                                <?= form_error('tmp_lahir', '<small class="text-danger">', '</small>'); ?>
                                            </div>

                                            <div class="form-group">
                                                <label for="tgl_lahir">Tanggal Lahir</label>
                                                <input id="birthday" class="date-picker form-control" placeholder="dd-mm-yyyy" type="text" type="text" onfocus="this.type='date'" onmouseover="this.type='date'" onclick="this.type='date'" onblur="this.type='text'" onmouseout="timeFunctionLong(this)" name="tgl_lahir">
                                                <!-- pesan error -->
                                                <?= form_error('tgl_lahir', '<small class="text-danger">', '</small>'); ?>
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
                                                <textarea name="alamat" id="alamat" cols="30" rows="3" class="form-control"></textarea>
                                                <!-- pesan error -->
                                                <?= form_error('alamat', '<small class="text-danger">', '</small>'); ?>
                                            </div>

                                            <div class="form-group">
                                                <label for="tlp">No Hp</label>
                                                <input id="tlp" class="form-control" type="number" min="0" name="tlp">
                                                <!-- pesan error -->
                                                <?= form_error('tlp', '<small class="text-danger">', '</small>'); ?>
                                            </div>

                                            <div class="form-group">
                                                <label for="agama">Agama</label>
                                                <input id="agama" class="form-control" type="text" name="agama">
                                                <!-- pesan error -->
                                                <?= form_error('agama', '<small class="text-danger">', '</small>'); ?>
                                            </div>

                                            <div class="form-group">
                                                <label for="th_masuk">Tahun Masuk</label>
                                                <input id="th_masuk" class="form-control" type="number" min="0" name="th_masuk">
                                                <!-- pesan error -->
                                                <?= form_error('th_masuk', '<small class="text-danger">', '</small>'); ?>
                                            </div>

                                            <div class="form-group">
                                                <label for="password">Password</label>
                                                <input id="password" class="form-control" type="password" name="password" value="12345678" readonly>
                                                <small>Password default 12345678</small>
                                                <!-- pesan error -->
                                                <?= form_error('password', '<small class="text-danger">', '</small>'); ?>
                                            </div>

                                        </div>
                                    </div>

                                    <div class="card-footer text-center">
                                        <div class="item form-group">
                                            <div class="col-md-6 col-sm-6 offset-md-3">
                                                <a href="<?= base_url('administrator/siswa') ?>" class="btn btn-danger" type="button">Batal</a>
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