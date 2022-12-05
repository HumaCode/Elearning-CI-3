<!-- flashdata sweetalert -->
<div class="flash-data" data-flashdata="<?= $this->session->flashdata('pesan') ?>"></div>

<!-- page content -->
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Daftar Anggota Kursus </h3>
            </div>
            <a href="" class="btn btn-primary float-right" data-toggle="modal" data-target=".bs-example-modal-lg"><i class="glyphicon glyphicon-plus"> </i> Tambah Anggota</a>

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
                                <td>&nbsp;:&nbsp;</td>
                                <td><strong><?= $kursusId['nama'] ?></strong></td>
                            </tr>
                            <tr>
                                <td>NIP</td>
                                <td>&nbsp;:&nbsp;</td>
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
                                                <th width="100">Aksi</th>
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

                                                    <td class="text-center">
                                                        <a href="<?= base_url('guru/hapusAnggotaKursus/') . $k['id_anggota'] . '/' . $k['id_kursus'] ?>" class="btn btn-danger tombol-hapus" data-toggle="tooltip" data-placement="bottom" title="Hapus"><i class="glyphicon glyphicon-trash"></i></a>
                                                    </td>
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
                <a href="<?= base_url('guru/detailKursus/') . $kursusId['id_kursus'] ?>" class="btn btn-sm btn-danger btn-block">Kembali</a>
            </div>
        </div>


    </div>

</div>


<!-- modal tambah kelas -->
<form action="<?= base_url('guru/tambahAnggota/') . $kursusId['id_kursus'] . '/' . $siswaId['id_kelas'] ?>" method="post">
    <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">

                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel">Tambah Anggota</h4>
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">

                    <div class="form-group row">
                        <label class="col-md-3 col-sm-3  control-label">Nama Siswa
                        </label>

                        <div class="col-md-9 col-sm-9 ">

                            <select class="bootstrap-select" name="siswa[]" data-width="100%" data-live-search="true" multiple required>
                                <?php foreach ($siswaIdKelas as $row) : ?>
                                    <option value="<?php echo $row['id_siswa']; ?>"><?php echo $row['nama']; ?></option>
                                <?php endforeach; ?>
                            </select>

                        </div>

                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Tambah</button>
                </div>
            </div>
        </div>
    </div>
</form>