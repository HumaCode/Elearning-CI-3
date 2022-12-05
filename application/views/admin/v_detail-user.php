<!-- page content -->
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Detail User</h3>
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
                                    <img class="img-responsive avatar-view" width="250" src="<?= base_url('assets/img/user/') . $userById['foto']; ?>" alt="Avatar" title="Change the avatar">
                                </div>
                            </div>
                            <h3><?= $userById['nama'] ?></h3>
                        </div>
                        <div class="col-md-9 col-sm-9 ">
                            <div class="profile_title">
                                <div class="col-md-6">
                                    <h2>Bergabung Sejak</h2>
                                </div>
                                <div class="col-md-6 float-right">
                                    <h2><?= date('d F Y', $userById['tgl_daftar'])  ?></h2>
                                </div>
                            </div>
                            <!-- start of user-activity-graph -->
                            <div style="margin-top: 10px;">
                                <table>
                                    <tr>
                                        <td width="200">Nama</td>
                                        <td>:</td>
                                        <td><?= $userById['nama'] ?></td>
                                    </tr>
                                    <tr>
                                        <td width="200">Username</td>
                                        <td>:</td>
                                        <td><?= $userById['username'] ?></td>
                                    </tr>
                                    <tr>
                                        <td>Status Akun</td>
                                        <td>:</td>
                                        <td>
                                            <?php if ($userById['is_active'] == 1) : ?>
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
                <a href="<?= base_url('administrator/user') ?>" class="btn btn-danger btn-block">Kembali</a>
            </div>
        </div>
    </div>
</div>
<!-- /page content -->