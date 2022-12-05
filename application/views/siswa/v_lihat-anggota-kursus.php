<!-- flashdata sweetalert -->
<div class="flash-data" data-flashdata="<?= $this->session->flashdata('pesan') ?>"></div>

<!-- page content -->
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Daftar Anggota Kursus </h3>
            </div>

        </div>

        <div class="clearfix"></div>

        <div class="row">
            <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                    <div class="x_title">
                        <small>Daftar Anggota Kursus <?= $kursusId['mapel'] . ' ' . $kursusId['kelas'] ?> </small>
                        <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                            </li>
                            <li><a class="close-link"><i class="fa fa-close"></i></a>
                            </li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>

                    <div class="x_panel">
                        <table>
                            <tr>
                                <td>Guru Pengampu</td>
                                <td>:</td>
                                <td><strong><?= $kursusId['nama'] ?></strong></td>
                            </tr>
                            <tr>
                                <td>NIP</td>
                                <td>:</td>
                                <td><strong><?= $kursusId['nip'] ?></strong></td>
                            </tr>
                        </table>
                    </div>


                    <div class="x_content">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="card-box table-responsive">

                                    <table id="datatable-responsive" class="table table-hover table-bordered dt-responsive nowrap" style="width:100%">
                                        <thead class="thead-dark text-center">
                                            <tr>
                                                <th width="50">No</th>
                                                <th>Nama Siswa</th>
                                                <th>NIS</th>
                                                <th>Status</th>
                                            </tr>
                                        </thead>


                                        <tbody>
                                            <?php
                                            $i = 1;
                                            foreach ($anggotaIdKursus as $k) : ?>

                                                <tr>
                                                    <td class="text-center"><?= $i; ?></td>
                                                    <td><strong><?= $k['nama'] ?></strong></td>
                                                    <td><strong><?= $k['nis'] ?></strong></td>
                                                    <td><strong><?= $k['status'] ?></strong></td>


                                                </tr>
                                            <?php
                                                $i++;
                                            endforeach; ?>
                                        </tbody>
                                    </table>
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