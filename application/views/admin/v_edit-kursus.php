<!-- page content -->
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Edit Kursus</h3>
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Edit </h2>
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
                                    <input type="hidden" name="id_kursus" id="id_kursus" value="<?= $kursusId['id_kursus'] ?>">

                                    <div class="row">
                                        <div class="col-lg-6 offset-lg-3">

                                            <div class="form-group">
                                                <label for="mapel">Matapelajaran</label>
                                                <select name="mapel" id="mapel" class="form-control">
                                                    <?php foreach ($mapel as $m) : ?>
                                                        <?php if ($m['id_mapel'] == $kursusId['id_mapel']) : ?>
                                                            <option value="<?= $m['id_mapel'] ?>" selected><?= $m['mapel'] ?></option>
                                                        <?php else : ?>
                                                            <option value="<?= $m['id_mapel'] ?>"><?= $m['mapel'] ?></option>
                                                        <?php endif; ?>
                                                    <?php endforeach; ?>
                                                </select>
                                                <!-- pesan error -->
                                                <?= form_error('mapel', '<small class="text-danger">', '</small>'); ?>
                                            </div>

                                            <div class="form-group">
                                                <label for="guru">Guru Pengampu</label>
                                                <select name="guru" id="guru" class="form-control">

                                                    <?php foreach ($guru as $g) : ?>
                                                        <?php if ($guru['id_guru'] == $kursusId['id_guru']) : ?>
                                                            <option value="<?= $g['id_guru'] ?>" selected><?= $g['nama'] ?></option>
                                                        <?php else : ?>
                                                            <option value="<?= $g['id_guru'] ?>"><?= $g['nama'] ?></option>
                                                        <?php endif; ?>
                                                    <?php endforeach; ?>
                                                </select>
                                                <!-- pesan error -->
                                                <?= form_error('guru', '<small class="text-danger">', '</small>'); ?>
                                            </div>

                                            <div class="form-group">
                                                <label for="kelas">Kelas</label>
                                                <select name="kelas" id="kelas" class="form-control">
                                                    <?php foreach ($kelas as $k) : ?>
                                                        <?php if ($k['id_kelas'] == $kursusId['id_kelas']) : ?>
                                                            <option value="<?= $k['id_kelas'] ?>" selected><?= $k['kelas'] ?></option>
                                                        <?php else : ?>
                                                            <option value="<?= $k['id_kelas'] ?>"><?= $k['kelas'] ?></option>
                                                        <?php endif; ?>
                                                    <?php endforeach; ?>
                                                </select>
                                                <!-- pesan error -->
                                                <?= form_error('kelas', '<small class="text-danger">', '</small>'); ?>
                                            </div>

                                        </div>
                                    </div>


                                </div>
                                <div class="card-footer text-center">
                                    <div class="item form-group">
                                        <div class="col-md-6 col-sm-6 offset-md-3">
                                            <a href="<?= base_url('administrator/kursus') ?>" class="btn btn-danger" type="button">Batal</a>
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