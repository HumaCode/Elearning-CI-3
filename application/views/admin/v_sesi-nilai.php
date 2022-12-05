<!-- page content -->
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Sesi Kuis</h3>
            </div>
            


        </div>

        <div class="clearfix"></div>

        <div class="row">
            <div class="col-md-12 col-sm-12  ">
                <div class="x_panel">
                    <div class="x_title">
                        <small>Daftar nilai mapel <?= $kursusId['mapel'] . ' ' .  $sesiByKursus['sesi'] . ' ' .  $kursusId['kelas'] ?></small>
                        <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                            </li>

                            <li><a class="close-link"><i class="fa fa-close"></i></a>
                            </li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">

                        <?php foreach ($soal as $s) : ?>
                            <ul class="list-group">
                                <li class="list-group-item">
                                    <?= $s['nama_soal'] ?>

                                    <a href="<?= base_url('administrator/lihatNilai/') . $s['id_soal'] . '/' . $s['id_kursus'] . '/' . $s['id_sesi'] ?>" class="badge badge-success float-right">Lihat</a>
                                </li>
                            </ul>
                        <?php endforeach; ?>

                    </div>
                </div>
                <a href="<?= base_url('administrator/detailKursus/') . $kursusId['id_kursus'] ?>" class="btn btn-danger btn-block">Kembali</a>
            </div>
        </div>
    </div>
</div>
<!-- /page content -->