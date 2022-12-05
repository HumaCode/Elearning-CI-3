<!-- flashdata sweetalert -->
<div class="flash-data" data-flashdata="<?= $this->session->flashdata('pesan') ?>"></div>

<!-- page content -->
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Materi Dan Kuis</h3>
            </div>

        </div>

        <div class="clearfix"></div>

        <div class="row">
            <div class="col-md-12 col-sm-12 ">
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
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="card-box table-responsive">

                                    <div class="">
                                        <div class="x_content">

                                            <div class="dropdown float-right">


                                            </div>

                                            <ul class="nav nav-tabs bar_tabs" id="myTab" role="tablist">
                                                <li class="nav-item">
                                                    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#materi" role="tab" aria-controls="home" aria-selected="true">Materi</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#kuis" role="tab" aria-controls="profile" aria-selected="false">Kuis</a>
                                                </li>

                                            </ul>
                                            <div class="tab-content" id="myTabContent">
                                                <div class="tab-pane fade show active" id="materi" role="tabpanel" aria-labelledby="home-tab">
                                                    <table id="datatable-responsive" class="table table-hover table-bordered dt-responsive nowrap" style="width:100%">
                                                        <thead class="thead-dark text-center">
                                                            <tr>
                                                                <th>No</th>
                                                                <th>Nama file</th>
                                                                <th>Sesi</th>
                                                                <th>Dibuat</th>
                                                                <th>Keterangan</th>
                                                                <th>Aksi</th>
                                                            </tr>
                                                        </thead>

                                                        <tbody>
                                                            <?php
                                                            $i = 1;
                                                            foreach ($subSesi as $ss) : ?>

                                                                <?php
                                                                // format file
                                                                $file = substr($ss['nama_file'], -4);
                                                                if ($file == '.jpg' || $file == 'jpeg' || $file == '.png') {
                                                                    $file = 'Gambar';
                                                                } else if ($file == '.mp4' || $file == '.3gp' || $file == '.flv') {
                                                                    $file = 'Video';
                                                                } else if ($file == '.doc' || $file == 'docx' || $file == '.ppt' || $file == 'pptx' || $file == '.xls' || $file == 'xlsx') {
                                                                    $file = 'Documen';
                                                                } else if ($file == 'File') {
                                                                    $file = 'Tidak menggunakan File';
                                                                }
                                                                ?>

                                                                <tr>
                                                                    <td class="text-center"><?= $i; ?></td>
                                                                    <td>
                                                                        <?= $file ?>
                                                                    </td>
                                                                    <td><?= $ss['sesi'] ?></td>
                                                                    <td><?= date('d F Y', $ss['dibuat']) ?></td>
                                                                    <td>
                                                                        <?php if ($ss['keterangan'] !== 'null' && $ss['nama_file'] == 'Tidak ada File') : ?>
                                                                            ----
                                                                        <?php else : ?>
                                                                            <?= $ss['keterangan'] ?>
                                                                        <?php endif; ?>
                                                                    </td>
                                                                    <td class="text-center">
                                                                        <?php if ($ss['nama_file'] == 'Tidak ada File') : ?>
                                                                            <a href="<?= base_url('siswa/lihatMateri/') . $ss['id_sub_sesi'] . '/' . $sesiId['id_sesi'] . '/' . $kursusId['id_kursus'] ?>" class="btn btn-sm btn-success" data-toggle="tooltip" data-placement="bottom" title="Lihat"><i class="glyphicon glyphicon-eye-open"></i></a>
                                                                        <?php else : ?>
                                                                            <a href="<?= base_url('siswa/downloadMateri/') . $ss['id_sub_sesi'] ?>" class="btn btn-sm btn-info"><i class="glyphicon glyphicon-download-alt" data-toggle="tooltip" data-placement="bottom" title="Download"></i></a>
                                                                            <a href="<?= base_url('siswa/lihatMateri/') . $ss['id_sub_sesi'] . '/' . $sesiId['id_sesi'] . '/' . $kursusId['id_kursus'] ?>" class="btn btn-sm btn-success" data-toggle="tooltip" data-placement="bottom" title="Lihat"><i class="glyphicon glyphicon-eye-open"></i></a>
                                                                        <?php endif; ?>



                                                                    </td>
                                                                </tr>
                                                            <?php $i++;
                                                            endforeach; ?>
                                                        </tbody>
                                                    </table>
                                                </div>
                                                <div class="tab-pane fade" id="kuis" role="tabpanel" aria-labelledby="profile-tab">

                                                    <table id="datatable-keytable" class="table table-hover table-bordered table-responsive-sm" style="width:100%">
                                                        <thead class="thead-dark text-center">
                                                            <tr>
                                                                <th>No</th>
                                                                <th>Nama Kuis</th>
                                                                <th>Nama Sesi</th>
                                                                <th>Jenis</th>
                                                                <th>Aksi</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>

                                                            <?php
                                                            if (!empty($kuis)) {
                                                            ?>
                                                                <?php $i = 1;
                                                                foreach ($kuis as $k) : ?>
                                                                    <tr>
                                                                        <td class="text-center"><?= $i ?></td>
                                                                        <td><?= $k['nama_soal'] ?></td>
                                                                        <td><?= $k['sesi'] ?></td>
                                                                        <td class="text-center">
                                                                            <?php if (substr($k['file'], -4) == '.mp4' || substr($k['file'], -4) == '.3gp' || substr($k['file'], -4) == '.flv') { ?>
                                                                                <span>Video</span>
                                                                            <?php } else if (substr($k['file'], -4) == '.doc' || substr($k['file'], -4) == 'docx' || substr($k['file'], -4) == '.pdf' || substr($k['file'], -4) == '.xls' || substr($k['file'], -4) == 'xlsx' || substr($k['file'], -4) == '.ppt' || substr($k['file'], -4) == 'pptx') { ?>
                                                                                <span>Dokumen</span>
                                                                            <?php } else if (substr($k['file'], -4) == '.jpg' || substr($k['file'], -4) == '.jpeg' || substr($k['file'], -4) == '.png') { ?>
                                                                                <span>Gambar</span>
                                                                            <?php } else { ?>
                                                                                <span>Tidak ada File yang di Upload</span>
                                                                            <?php } ?>
                                                                        </td>
                                                                        <td class="text-center">
                                                                            <a href="<?= base_url('siswa/detailKuis/') . $k['id_soal'] . '/' . $k['id_sesi'] . '/' . $k['id_kursus'] . '/' . $k['pertemuan'] ?>" class="btn btn-sm btn-secondary" data-toggle="tooltip" data-placement="bottom" title="Lihat"><i class="glyphicon glyphicon-eye-open"></i></a>
                                                                        </td>
                                                                    </tr>
                                                                <?php $i++;
                                                                endforeach; ?>
                                                            <?php  } else {
                                                            ?>
                                                                <tr>
                                                                    <td colspan="9" class="text-center">
                                                                        <h2 class="text-danger ">Kuis belum ada, Silahkan tambah Kuis</h2>
                                                                    </td>
                                                                </tr>
                                                            <?php }
                                                            ?>

                                                        </tbody>

                                                    </table>


                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <a href="<?= base_url('siswa/detailKursus/') . $kursusId['id_kursus'] ?>" class="btn btn-danger btn-block">Kembali</a>
            </div>
        </div>
    </div>
</div>