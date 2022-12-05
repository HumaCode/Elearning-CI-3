<!-- page content -->
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Penilaian Kuis</h3>
            </div>

            <a href="">HALO</a>
        </div>

        <div class="clearfix"></div>

        <div class="row">
            <div class="col-md-12 col-sm-12  ">
                <div class="x_panel">
                    <div class="x_title">
                        <small><?= $sesiId['sesi'] ?> Matapelajaran <?= $kursusId['mapel'] . ' ' . $kursusId['kelas'] ?></small>
                        <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                            </li>
                            <li><a class="close-link"><i class="fa fa-close"></i></a>
                            </li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <ul class="list-group">
                            <?php foreach ($kuisByPertemuan as $k) : ?>
                                <li class="list-group-item"><?= $k['nama_soal'] ?><a href="<?= base_url('guru/penilaianKuis/') . $k['id_sesi'] . '/' . $k['id_kursus'] . '/' . $k['pertemuan'] ?>" class="btn btn-success btn-sm float-right">lihat</a></li>
                            <?php endforeach; ?>
                        </ul>
                        <a href="<?= base_url('guru/penilaianKursus/') . $kursusId['id_kursus'] ?>" class="btn btn-danger btn-lg mt-2 btn-block">Kembali</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /page content -->