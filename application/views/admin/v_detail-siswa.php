<!-- page content -->
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Detail Siswa</h3>
            </div>
        </div>

        <div class="clearfix"></div>

        <div class="row">
            <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Detail</h2>

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
                            <div class="profile_img ">
                                <div id="crop-avatar ">
                                    <!-- Current avatar -->
                                    <img class="img-responsive avatar-view" width="250" src="<?= base_url('assets/img/user/') . $siswaId['foto']; ?>" alt="Avatar" title="Change the avatar">
                                </div>
                            </div>
                            <h3><?= $siswaId['nama'] ?></h3>

                            <ul class="list-unstyled user_data">
                                <li><i class="fa fa-map-marker user-profile-icon mr-2"></i> <?= $siswaId['alamat'] ?>
                                </li>

                                <li class="m-top-xs">
                                    <i class="fa fa-tty mr-2"></i>
                                    <?= $siswaId['tlp'] ?>
                                </li>
                            </ul>
                        </div>
                        <div class="col-md-9 col-sm-9 ">
                            <div class="profile_title">
                                <div class="col-md-6">
                                    <h2>Bergabung Sejak</h2>
                                </div>
                                <div class="col-md-6 float-right">
                                    <h2><?= date('d F Y', $userNis['tgl_daftar'])  ?></h2>
                                </div>
                            </div>
                            <!-- start of user-activity-graph -->
                            <div style="margin-top: 10px;">
                                <table>
                                    <tr>
                                        <td width="200">Nis</td>
                                        <td>:</td>
                                        <td><?= $siswaId['nis'] ?></td>
                                    </tr>
                                    <tr>
                                        <td>Jenis Kelamin</td>
                                        <td>:</td>
                                        <td><?= $siswaId['jk'] ?></td>
                                    </tr>
                                    <tr>
                                        <td>Tempat Lahir</td>
                                        <td>:</td>
                                        <td><?= $siswaId['tmp_lahir'] ?></td>
                                    </tr>
                                    <tr>
                                        <td>Kelas</td>
                                        <td>:</td>
                                        <td><?= $siswaId['kelas'] ?></td>
                                    </tr>
                                    <tr>
                                        <td>Tahun Masuk</td>
                                        <td>:</td>
                                        <td><?= $siswaId['th_masuk'] ?></td>
                                    </tr>
                                    <tr>
                                        <td>Tanggal Lahir</td>
                                        <td>:</td>
                                        <td>
                                            <?= date('d F Y', strtotime($siswaId['tgl_lahir'])) ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Agama</td>
                                        <td>:</td>
                                        <td><?= $siswaId['agama'] ?></td>
                                    </tr>
                                    <tr>
                                        <td>Status Akun</td>
                                        <td>:</td>
                                        <td>
                                            <?php if ($siswaId['is_active'] == 1) : ?>
                                                <span class="text-success">Aktif</span>
                                            <?php else : ?>
                                                <span class="text-danger">Tidak Aktif</span>
                                            <?php endif; ?>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <a href="<?= base_url('administrator/siswa') ?>" class="btn btn-danger btn-block">Kembali</a>
            </div>
        </div>
    </div>
</div>
<!-- /page content -->