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

                            <input type="hidden" id="id_guru" name="id_guru" value="<?= $guruById['id_guru'] ?>">

                            <div class="row">
                                <div class="col-lg-6 offset-lg-3">


                                    <?php if ($guruById['tgl_lahir'] == '0000-00-00') : ?>

                                        <input type="hidden" id="nip" class="form-control " name="nip" readonly value="<?= $guruById['nip'] ?>">


                                        <input type="hidden" id="nama" class="form-control " name="nama" value="<?= $guruById['nama'] ?>">


                                        <input type="hidden" id="tmp_lahir" class="form-control " name="tmp_lahir" value="<?= $guruById['tmp_lahir'] ?>">


                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Tanggal Lahir</label>
                                            <input id="birthday" name="tgl_lahir" class="date-picker form-control" placeholder="dd-mm-yyyy" type="text" type="text" onfocus="this.type='date'" onmouseover="this.type='date'" onclick="this.type='date'" onblur="this.type='text'" onmouseout="timeFunctionLong(this)" value="<?= $guruById['tgl_lahir'] ?>">
                                            <small class="text-danger">* Lengkapi tanggal lahir anda.!</small>
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

                                        <input type="hidden" name="alamat" id="alamat" class="form-control" value="<?= $guruById['alamat'] ?>">

                                        <input id="agama" class="form-control" type="hidden" name="agama" value="<?= $guruById['agama'] ?>">

                                        <input id="tlp" class="form-control" type="hidden" min="0" name="tlp" value="<?= $guruById['tlp'] ?>">

                                        <input id="jk" class="form-control" type="hidden" min="0" name="jk" value="<?= $guruById['jk'] ?>">

                                    <?php else : ?>


                                        <div class="form-group">
                                            <label for="nip">NIP</label>
                                            <input type="text" id="nip" class="form-control " name="nip" readonly value="<?= $guruById['nip'] ?>">
                                            <!-- pesan error -->
                                            <?= form_error('nip', '<small class="text-danger">', '</small>'); ?>
                                        </div>

                                        <div class="form-group">
                                            <label for="nama">Nama Guru</label>
                                            <input type="text" id="nama" class="form-control " name="nama" value="<?= $guruById['nama'] ?>">
                                            <!-- pesan error -->
                                            <?= form_error('nama', '<small class="text-danger">', '</small>'); ?>
                                        </div>

                                        <div class="form-group">
                                            <label for="tmp_lahir">Tempat Lahir</label>
                                            <input type="text" id="tmp_lahir" class="form-control " name="tmp_lahir" value="<?= $guruById['tmp_lahir'] ?>">
                                            <!-- pesan error -->
                                            <?= form_error('tmp_lahir', '<small class="text-danger">', '</small>'); ?>
                                        </div>

                                        <div class="form-group">
                                            <label for="tgl_lahir">Tanggal Lahir</label>
                                            <input id="birthday" name="tgl_lahir" class="date-picker form-control" placeholder="dd-mm-yyyy" type="text" type="text" onfocus="this.type='date'" onmouseover="this.type='date'" onclick="this.type='date'" onblur="this.type='text'" onmouseout="timeFunctionLong(this)" value="<?= $guruById['tgl_lahir'] ?>">
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
                                            <textarea name="alamat" id="alamat" cols="30" rows="3" class="form-control"><?= $guruById['alamat'] ?></textarea>
                                            <!-- pesan error -->
                                            <?= form_error('alamat', '<small class="text-danger">', '</small>'); ?>
                                        </div>


                                        <div class="form-group">
                                            <label for="agama">Agama</label>
                                            <input id="agama" class="form-control" type="text" name="agama" value="<?= $guruById['agama'] ?>">
                                            <!-- pesan error -->
                                            <?= form_error('agama', '<small class="text-danger">', '</small>'); ?>
                                        </div>

                                        <div class="form-group">
                                            <label for="tlp">No Hp</label>
                                            <input id="tlp" class="form-control" type="number" min="0" name="tlp" value="<?= $guruById['tlp'] ?>">
                                            <!-- pesan error -->
                                            <?= form_error('tlp', '<small class="text-danger">', '</small>'); ?>
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
                                        </div>

                                    <?php endif; ?>

                                </div>
                            </div>

                            <div class="ln_solid"></div>
                            <div class="item form-group">
                                <div class="col-md-6 col-sm-6 offset-md-3 text-center">

                                    <a href="<?= base_url('guru/profile') ?>" class="btn btn-danger">Batal</a>
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