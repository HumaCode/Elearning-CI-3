<!-- flashdata sweetalert -->
<div class="flash-data" data-flashdata="<?= $this->session->flashdata('pesan') ?>"></div>

<!-- page content -->
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Penilaian Kuis</h3>
            </div>
            <a href="<?= base_url('guru/mpdf/') . $soalId['id_soal'] . '/' . $kursusId['id_kursus'] . '/' . $sesiId['id_sesi'] ?>" class="btn btn-sm btn-danger float-right">PDF</a>

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

                                            <ul class="nav nav-tabs bar_tabs" id="myTab" role="tablist">
                                                <li class="nav-item">
                                                    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#kuis" role="tab" aria-controls="profile" aria-selected="false">Jawaban Siswa</a>
                                                </li>

                                            </ul>
                                            <div class="tab-content" id="myTabContent">

                                                <div class="tab-pane fade show active" id="kuis" role="tabpanel" aria-labelledby="profile-tab">

                                                    <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                                                        <thead class="thead-dark text-center">
                                                            <tr>
                                                                <th>No</th>
                                                                <th>Nama Kuis</th>
                                                                <th>Nama Siswa</th>
                                                                <th>Nama Sesi</th>
                                                                <th>Jenis</th>
                                                                <th>Tanggal Pengumpulan</th>
                                                                <th>Status Penilaian</th>
                                                                <th>Aksi</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>


                                                            <?php $i = 1;
                                                            foreach ($jawabanBySesi as $k) : ?>
                                                                <tr>
                                                                    <td class="text-center"><?= $i ?></td>
                                                                    <td><?= $k['nama_soal'] ?></td>
                                                                    <td><?= $k['nama']
                                                                        ?></td>
                                                                    <td><?= $k['sesi'] ?></td>
                                                                    <td class="text-center">
                                                                        <?php if (substr($k['jwb_file'], -4) == '.mp4' || substr($k['jwb_file'], -4) == '.3gp' || substr($k['jwb_file'], -4) == '.flv') { ?>
                                                                            <span>Video</span>
                                                                        <?php } else if (substr($k['jwb_file'], -4) == '.doc' || substr($k['jwb_file'], -4) == 'docx' || substr($k['jwb_file'], -4) == '.pdf' || substr($k['jwb_file'], -4) == '.xls' || substr($k['jwb_file'], -4) == 'xlsx' || substr($k['jwb_file'], -4) == '.ppt' || substr($k['jwb_file'], -4) == 'pptx') { ?>
                                                                            <span>Dokumen</span>
                                                                        <?php } else if (substr($k['jwb_file'], -4) == '.jpg' || substr($k['jwb_file'], -4) == '.jpeg' || substr($k['jwb_file'], -4) == '.png') { ?>
                                                                            <span>Gambar</span>
                                                                        <?php } else { ?>
                                                                            <span>Tidak ada File yang di Upload</span>
                                                                        <?php } ?>
                                                                    </td>
                                                                    <td class="text-center">
                                                                        <?= date('d F Y', $k['tgl_jwb']) ?>
                                                                    </td>
                                                                    <td class="text-center">
                                                                        <?php if ($k['nilai'] == 'Belum dinilai') { ?>
                                                                            <span class="text-danger"><strong><?= $k['nilai'] ?></strong></span>
                                                                        <?php } else { ?>
                                                                            <span class=""><strong><?= $k['nilai'] ?></strong></span>
                                                                        <?php } ?>
                                                                    </td>
                                                                    <td class="text-center">
                                                                        <a href="<?= base_url('guru/lihatJawaban/') . $k['id_jawaban'] . '/' . $k['id_soal'] . '/' . $k['id_sesi'] . '/' . $k['id_kursus'] . '/' . $k['pertemuan'] ?>" class="btn btn-sm btn-info" data-toggle="tooltip" data-placement="bottom" title="Lihat Jawaban"><i class="glyphicon glyphicon-eye-open"></i></a>
                                                                        <a href="<?= base_url('guru/hapusJawaban/') . $k['id_jawaban'] . '/' . $k['id_sesi'] . '/' . $k['id_kursus'] . '/' . $k['pertemuan'] ?>" class="btn btn-sm btn-danger tombol-hapus" data-toggle="tooltip" data-placement="bottom" title="Hapus"><i class="glyphicon glyphicon-trash"></i></a>
                                                                    </td>
                                                                </tr>
                                                            <?php $i++;
                                                            endforeach; ?>


                                                        </tbody>

                                                    </table>


                                                </div>
                                                <a href="<?= base_url('guru/lihatSesiPenilaian/') . $sesiId['id_sesi'] . '/' . $kursusId['id_kursus'] ?>" class="btn btn-danger btn-lg btn-block mt-2">Kembali</a>
                                            </div>
                                        </div>
                                    </div>


                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>