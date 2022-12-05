<!-- page content -->
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Home</h3>
            </div>

        </div>

        <div class="clearfix"></div>

        <div class="row">
            <div class="col-md-9 col-sm-9  ">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Selamat Datang <span class="text-danger"><?= $user['status'] ?></span></h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                            </li>
                            <li><a class="close-link"><i class="fa fa-close"></i></a>
                            </li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        Ini adalah halaman untuk guru
                    </div>
                </div>

                <?php if ($guruBySession['tgl_lahir'] == '0000-00-00') : ?>
                    <div class="x_panel">
                        <div class="x_title">
                            <h2 class="text-danger">Perhatian</h2>

                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content bg-danger text-white" style="padding: 10px;">
                            Jika profil belum di lengkap, silahkan dilengkapi terlebih dahulu dengan cara mengklik tombol '<i>Lengkapi Profil</i>' di samping kanan.
                        </div>
                    </div>
                <?php endif; ?>
            </div>

            <div class="col-md-3 widget widget_tally_box m-auto">
                <div class="x_panel fixed_height_390">
                    <div class="x_content">

                        <div class="flex">
                            <ul class="list-inline widget_profile_box">
                                <li>
                                    <a>
                                        <i class="fa fa-user"></i>
                                    </a>
                                </li>
                                <li>
                                    <img src="<?= base_url('assets/img/user/') . $user['foto'] ?>" alt="..." class="img-circle profile_img">
                                </li>
                                <li>
                                    <a>
                                        <i class="fa fa-user"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>

                        <h3 class="name"><?= $user['nama'] ?></h3>

                        <div class="flex">
                            <ul class="list-inline">
                                <li>
                                    <ul>
                                        <li>NIP : <?= $user['username'] ?></li>
                                        <li>Email : <?= $guruBySession['email'] ?></li>
                                        <li>No Hp : <?= $guruBySession['tlp'] ?></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <p>
                            <?php if ($guruBySession['tgl_lahir'] == '0000-00-00') : ?>
                                <a href="<?= base_url('guru/editProfil/') . $guruBySession['id_guru'] ?>" class="btn btn-danger">Lengkapi Profil</a>
                            <?php else : ?>
                                <span class="btn btn-success">Profile Sudah Dilengkapi</span>
                            <?php endif; ?>
                        </p>
                    </div>
                </div>


                <div class="x_panel">
                    <div class="x_content">
                        <div class="flex">
                            <ul class="list-unstyled top_profiles scroll-view">
                                <li class="media event">
                                    <div class="media-body">
                                        <strong>Pengunjung Hari Ini </strong> : <?= $pengunjunghariini; ?> Orang <br>
                                        <strong>Total Pengunjung </strong> : <?= $totalpengunjung; ?> Orang <br>
                                        <strong>Pengunjung Online </strong> : <?= $pengunjungonline; ?> Orang
                                    </div>
                                </li>
                            </ul>
                        </div>

                    </div>
                </div>


            </div>



        </div>
    </div>
</div>
<!-- /page content -->