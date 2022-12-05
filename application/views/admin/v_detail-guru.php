<!-- page content -->
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Detail Guru</h3>
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
                            <div class="profile_img">
                                <div id="crop-avatar">
                                    <!-- Current avatar -->
                                    <img class="img-responsive avatar-view" width="250" src="<?= base_url('assets/img/user/') . $guruById['foto']; ?>" alt="Avatar" title="Change the avatar">
                                </div>
                            </div>
                            <h3><?= $guruById['nama'] ?></h3>

                            <ul class="list-unstyled user_data">
                                <li><i class="fa fa-map-marker user-profile-icon"></i> <?= $guruById['alamat'] ?>
                                </li>

                                <li>
                                    <i class="fa fa-at"></i> <?= $guruById['email'] ?>
                                </li>

                                <li class="m-top-xs">
                                    <i class="fa fa-tty"></i>
                                    <?= $guruById['tlp'] ?>
                                </li>
                            </ul>
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
                                        <td><?= $guruById['nip'] ?></td>
                                    </tr>
                                    <tr>
                                        <td>Jenis Kelamin</td>
                                        <td>:</td>
                                        <td><?= $guruById['jk'] ?></td>
                                    </tr>
                                    <tr>
                                        <td>Tempat Lahir</td>
                                        <td>:</td>
                                        <td><?= $guruById['tmp_lahir'] ?></td>
                                    </tr>
                                    <tr>
                                        <td>Tanggal Lahir</td>
                                        <td>:</td>
                                        <td>
                                            <?= date('d F Y', strtotime($guruById['tgl_lahir'])) ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Agama</td>
                                        <td>:</td>
                                        <td><?= $guruById['agama'] ?></td>
                                    </tr>
                                    <tr>
                                        <td>Status Akun</td>
                                        <td>:</td>
                                        <td>
                                            <?php if ($guruById['is_active'] == 1) : ?>
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
                <div class="tombol">

                    <a href="<?= base_url('administrator/guru') ?>" class="btn btn-danger btn-block ">Kembali</a>
                </div>

            </div>
        </div>
    </div>
</div>
<!-- /page content -->