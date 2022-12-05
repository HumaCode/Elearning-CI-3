<!-- page content -->
<div class="right_col" role="main">
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-lg-12">

                    <div class="top_tiles">

                        <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 ">
                            <div class="tile-stats p-2">
                                <div class="icon"><i class="glyphicon glyphicon-user"></i></div>
                                <div class="count"><?= $jumlahUser ?></div>
                                <h4>Jumlah User</h4>
                                <p class="text-center "><a href="<?= base_url('administrator/user') ?>">Lihat <i class="glyphicon glyphicon-chevron-right"></i></a></p>
                            </div>
                        </div>
                        <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 ">
                            <div class="tile-stats p-2">
                                <div class="icon"><i class="fa fa-list"></i></div>
                                <div class="count"><?= $jumlahGuru ?></div>
                                <h4>Jumlah Guru</h4>
                                <p class="text-center"><a href="<?= base_url('administrator/guru') ?>">Lihat <i class="glyphicon glyphicon-chevron-right"></i></a></p>
                            </div>
                        </div>
                        <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 ">
                            <div class="tile-stats p-2">
                                <div class="icon"><i class="fa fa-users"></i></div>
                                <div class="count"><?= $jumlahSiswa ?></div>
                                <h4>Jumlah Siswa</h4>
                                <p class="text-center"><a href="<?= base_url('administrator/siswa') ?>">Lihat <i class="glyphicon glyphicon-chevron-right"></i></a></p>
                            </div>
                        </div>
                        <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 ">
                            <div class="tile-stats p-2">
                                <div class="icon"><i class="glyphicon glyphicon-book"></i></div>
                                <div class="count"><?= $jumlahKursus ?></div>
                                <h4>Jumlah Kursus</h4>
                                <p class="text-center"><a href="<?= base_url('administrator/kursus') ?>">Lihat <i class="glyphicon glyphicon-chevron-right"></i></a></p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-8">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>Selamat Datang <small class="text-danger"> <?= $user['status']; ?></small></h2>
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                            <div class="col-md-7 col-sm-12 ">
                                <div class="demo-container" style="height:280px">
                                    <h3>tes</h3>
                                </div>
                                <div class="tiles">
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

                <div class="col-md-4 col-sm-12 ">
                    <div>
                        <div class="x_title">
                            <h2>User Konfirmasi</h2>
                            <div class="clearfix"></div>
                        </div>
                        <ul class="list-unstyled top_profiles scroll-view">
                            <li class="media event">
                                <a class="pull-left border-aero profile_thumb">
                                    <i class="fa fa-user aero"></i>
                                </a>
                                <div class="media-body">
                                    <a class="title" href="#"><?= $user_konfirmasi; ?> User belum di konfirmasi</a>
                                    <p>
                                        <small>
                                            <a href="<?= base_url('administrator/konfirm') ?>" class="badge badge-success">Lihat Semua</a>
                                        </small>
                                    </p>
                                </div>
                            </li>
                        </ul>
                    </div>

                    <div>
                        <div class="x_title">
                            <h2>Informasi User</h2>
                            <div class="clearfix"></div>
                        </div>
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