<!-- page content -->
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Halaman Nilai</h3>
            </div>
            <a href="<?= base_url('administrator/mpdf/') . $soalId['id_soal'] . '/' . $kursusId['id_kursus'] . '/' . $sesiByKursus['id_sesi'] ?>" class="btn btn-sm btn-danger float-right">PDF</a>

        </div>

        <div class="clearfix"></div>

        <div class="row">
            <div class="col-md-12 col-sm-12  ">
                <div class="x_panel">
                    <div class="x_title">
                        <small>Daftar nilai <?= $kursusId['mapel'] . ' ' . $kursusId['kelas'] ?></small>
                        <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                            </li>

                            <li><a class="close-link"><i class="fa fa-close"></i></a>
                            </li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">

                        <table id="datatable-responsive" class="table table-hover table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                            <thead class="thead-dark text-center">
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Nilai</th>

                                </tr>
                            </thead>
                            <tbody class="text-center">
                                <?php
                                $i = 1;
                                foreach ($nilai as $n) : ?>
                                    <?php

                                    if ($n['nilai'] >= 70) {
                                        $nilai =  "<strong>" . $n['nilai'] . "</strong>";
                                    } else if ($n['nilai'] <= 69 || $n['nilai'] == 'Belum dinilai') {
                                        $nilai = "<strong class='text-danger'>" . $n['nilai'] . "</strong>";
                                    }

                                    ?>
                                    <tr>
                                        <td width="50"><?= $i ?></td>
                                        <td><?= $n['nama'] ?></td>
                                        <td>
                                            <?= $nilai ?>
                                        </td>

                                    </tr>
                                <?php $i++;
                                endforeach; ?>
                            </tbody>
                        </table>

                    </div>
                </div>
                <a href="<?= base_url('administrator/lihatNilaiKursusSiswa/') . $kursusId['id_kursus'] . '/' . $sesiByKursus['id_sesi'] ?>" class="btn btn-danger btn-block">Kembali</a>
            </div>
        </div>
    </div>
</div>
<!-- /page content -->