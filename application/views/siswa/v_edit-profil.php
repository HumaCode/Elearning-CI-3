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

                        <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" action="<?= base_url('siswa/prosesEditSiswa') ?>" method="post">

                            <input type="hidden" id="id_siswa" name="id_siswa" value="<?= $siswaById['id_siswa'] ?>">

                            <div class="row">
                                <div class="col-lg-6 offset-lg-3">


                                    <?php if ($siswaById['tgl_lahir'] == '0000-00-00') : ?>
                                        <input type="hidden" id="nis" class="form-control " name="nis" value="<?= $siswaById['nis'] ?>">

                                        <input type="hidden" id="nama" class="form-control " name="nama" value="<?= $siswaById['nama'] ?>">


                                        <input type="hidden" id="tmp_lahir" class="form-control " name="tmp_lahir" value="<?= $siswaById['tmp_lahir'] ?>">

                                        <div class="form-group">
                                            <label for="tgl_lahir">Tanggal Lahir</label>
                                            <input id="birthday" name="tgl_lahir" class="date-picker form-control" placeholder="dd-mm-yyyy" type="text" type="text" onfocus="this.type='date'" onmouseover="this.type='date'" onclick="this.type='date'" onblur="this.type='text'" onmouseout="timeFunctionLong(this)" value="<?= $siswaById['tgl_lahir'] ?>">
                                            <small class="text-danger">Lengkapi tanggal lahir kamu.!</small>
                                            <!-- pesan error -->
                                            <?= form_error('tgl_lahir', '<small class="text-danger">', '</small>'); ?>
                                            <script>
                                                function timeFunctionLong(input) {
                                                    setTimeout(function() {
                                                        input.type = 'text';
                                                    }, 60000);
                                                }
                                            </script>
                                        </div>

                                        <input id="alamat" class="form-control" type="hidden" name="alamat" value="<?= $siswaById['alamat'] ?>">

                                        <input id="agama" class="form-control" type="hidden" name="agama" value="<?= $siswaById['agama'] ?>">

                                        <input id="th_masuk" class="form-control" type="hidden" name="th_masuk" value="<?= $siswaById['th_masuk'] ?>">

                                        <input id="kelas" class="form-control" type="hidden" name="kelas" value="<?= $siswaById['id_kelas'] ?>">


                                        <input id="tlp" class="form-control" type="hidden" min="0" name="tlp" value="<?= $siswaById['tlp'] ?>">

                                        <input id="jk" class="form-control" type="hidden" name="jk" value="<?= $siswaById['jk'] ?>">

                                    <?php else : ?>

                                        <div class="form-group">
                                            <label for="nis">NIS</label>
                                            <input type="text" id="nis" class="form-control " name="nis" readonly value="<?= $siswaById['nis'] ?>">
                                            <!-- pesan error -->
                                            <?= form_error('nis', '<small class="text-danger">', '</small>'); ?>
                                        </div>

                                        <div class="form-group">
                                            <label for="nama">Nama Siswa</label>
                                            <input type="text" id="nama" class="form-control " name="nama" value="<?= $siswaById['nama'] ?>">
                                            <!-- pesan error -->
                                            <?= form_error('nama', '<small class="text-danger">', '</small>'); ?>
                                        </div>

                                        <div class="form-group">
                                            <label for="tmp_lahir">Tempat Lahir</label>
                                            <input type="text" id="tmp_lahir" class="form-control " name="tmp_lahir" value="<?= $siswaById['tmp_lahir'] ?>">
                                            <!-- pesan error -->
                                            <?= form_error('tmp_lahir', '<small class="text-danger">', '</small>'); ?>
                                        </div>

                                        <div class="form-group">
                                            <label for="tgl_lahir">Tanggal Lahir</label>
                                            <input id="birthday" name="tgl_lahir" class="date-picker form-control" placeholder="dd-mm-yyyy" type="text" type="text" onfocus="this.type='date'" onmouseover="this.type='date'" onclick="this.type='date'" onblur="this.type='text'" onmouseout="timeFunctionLong(this)" value="<?= $siswaById['tgl_lahir'] ?>">
                                            <!-- pesan error -->
                                            <?= form_error('tgl_lahir', '<small class="text-danger">', '</small>'); ?>
                                            <script>
                                                function timeFunctionLong(input) {
                                                    setTimeout(function() {
                                                        input.type = 'text';
                                                    }, 60000);
                                                }
                                            </script>
                                        </div>

                                        <div class="form-group">
                                            <label for="alamat">Alamat</label>
                                            <textarea name="alamat" id="alamat" cols="30" rows="3" class="form-control"><?= $siswaById['alamat'] ?></textarea>
                                            <!-- pesan error -->
                                            <?= form_error('alamat', '<small class="text-danger">', '</small>'); ?>
                                        </div>

                                        <div class="form-group">
                                            <label for="agama">Agama</label>
                                            <input id="agama" class="form-control" type="text" name="agama" value="<?= $siswaById['agama'] ?>">
                                            <!-- pesan error -->
                                            <?= form_error('agama', '<small class="text-danger">', '</small>'); ?>
                                        </div>

                                        <div class="form-group">
                                            <label for="th_masuk">Tahun Masuk</label>
                                            <input id="th_masuk" class="form-control" type="text" name="th_masuk" value="<?= $siswaById['th_masuk'] ?>">
                                            <!-- pesan error -->
                                            <?= form_error('th_masuk', '<small class="text-danger">', '</small>'); ?>
                                        </div>

                                        <div class="form-group">
                                            <label for="kelas">Kelas</label>
                                            <select name="kelas" id="kelas" class="form-control">
                                                <option value="">-- Pilih Kelas --</option>
                                                <?php foreach ($kelas as $k) : ?>
                                                    <?php if ($k['id_kelas'] == $siswaById['id_kelas']) : ?>
                                                        <option value="<?= $k['id_kelas'] ?>" selected><?= $k['kelas'] ?></option>
                                                    <?php else : ?>
                                                        <option value="<?= $k['id_kelas'] ?>"><?= $k['kelas'] ?></option>
                                                    <?php endif; ?>
                                                <?php endforeach; ?>
                                            </select>

                                            <!-- pesan error -->
                                            <?= form_error('kelas', '<small class="text-danger">', '</small>'); ?>
                                        </div>

                                        <div class="form-group">
                                            <label for="tlp">No Hp</label>
                                            <input id="tlp" class="form-control" type="number" min="0" name="tlp" value="<?= $siswaById['tlp'] ?>">
                                            <!-- pesan error -->
                                            <?= form_error('tlp', '<small class="text-danger">', '</small>'); ?>
                                        </div>

                                        <div class="form-group">
                                            <label for="jk">Jenis Kelamin</label>
                                            <select name="jk" id="jk" class="form-control">
                                                <?php foreach ($jenisKelamin as $jk) : ?>
                                                    <?php if ($jk == $siswaById['jk']) : ?>
                                                        <option value="<?= $jk ?>" selected><?= $jk ?></option>
                                                    <?php else : ?>
                                                        <option value="<?= $jk ?>"><?= $jk ?></option>
                                                    <?php endif; ?>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>


                                    <?php endif; ?>

                                </div>
                            </div>
                            <div class="ln_solid"></div>
                            <div class="item form-group ">
                                <div class="col-lg-6 offset-lg-3 text-center">
                                    <a href="<?= base_url('siswa/profile') ?>" class="btn btn-danger">Batal</a>
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