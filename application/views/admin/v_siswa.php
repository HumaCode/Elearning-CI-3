<!-- flashdata sweetalert -->
<div class="flash-data" data-flashdata="<?= $this->session->flashdata('pesan') ?>"></div>


<!-- page content -->
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Data Siswa </h3>
            </div>
            <a href="<?= base_url('administrator/tambahSiswa') ?>" class="btn btn-primary float-right" data-toggle="tooltip" data-placement="bottom" title="Tambah Data Siswa"><i class="glyphicon glyphicon-plus-sign"></i></a>

            <a href="" class="btn btn-secondary float-right" data-toggle="modal" data-target=".bs-example-modal-lg"><i class="glyphicon glyphicon-floppy-disk"></i></a>
        </div>

        <div class="clearfix"></div>

        <div class="row">
            <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Data Siswa</h2>
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

                                    <table id="datatable-responsive" class="table table-hover table-bordered dt-responsive nowrap" style="width:100%">
                                        <thead class="thead-dark text-center">
                                            <tr>
                                                <th>No</th>
                                                <th>Nama</th>
                                                <th>NIS</th>
                                                <th>Foto</th>
                                                <th>Kelas</th>
                                                <th>Status Akun</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            <?php
                                            $i = 1;
                                            foreach ($siswa as $s) : ?>
                                                <tr>
                                                    <td class="text-center"><?= $i; ?></td>
                                                    <td><?= $s['nama'] ?></td>
                                                    <td><?= $s['nis'] ?></td>
                                                    <td class="text-center">
                                                        <img src="<?= base_url('assets/img/user/') . $s['foto'] ?>" alt="<?= $s['foto'] ?>" width="70">
                                                    </td>
                                                    <td><?= $s['kelas'] ?></td>
                                                    <td class="text-center">
                                                        <?php if ($s['is_active'] == '0') : ?>
                                                            <span class="text-danger">Tidak Aktif</span>
                                                        <?php else : ?>
                                                            <span class="text-success">Aktif</span>
                                                        <?php endif; ?>
                                                    </td>

                                                    <td class="text-center">
                                                        <a href="<?= base_url('administrator/detailSiswa/') . $s['id_siswa'] . '/' . $s['nis'] ?>" class="btn btn-success" data-toggle="tooltip" data-placement="bottom" title="Lihat Detail"><i class="glyphicon glyphicon-eye-open"></i></a>
                                                        <a href="<?= base_url('administrator/editSiswa/') . $s['id_siswa'] . '/' . $s['nis'] ?>" class="btn btn-primary" data-toggle="tooltip" data-placement="bottom" title="Edit"><i class="glyphicon glyphicon-pencil"></i></a>
                                                        <a href="<?= base_url('administrator/hapusSiswa/') . $s['id_siswa'] . '/' . $s['nis'] ?>" class="btn btn-danger tombol-hapus" data-toggle="tooltip" data-placement="bottom" title="Hapus"><i class="glyphicon glyphicon-trash"></i></a>
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
                <div class="row">
                    <div class="col-md-12 col-sm-12  ">
                        <div class="x_panel">
                            <div class="x_title">
                                <h2 class="text-danger">Panduan Import dengan Excel</h2>
                                <ul class="nav navbar-right panel_toolbox">
                                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                    </li>
                                    <li><a class="close-link"><i class="fa fa-close"></i></a>
                                    </li>
                                </ul>
                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">
                                <ul>
                                    <li>Siapkan datanya dengan format seperti gambar berikut, <a href="" data-toggle="modal" data-target=".panduan"><i>klik disini</i></a></li>
                                    <li>Untuk data id siswa bisa di lihat di tabel siswa di dalam database</li>
                                    <li>Kemudian save</li>

                                    <li>Ketika akan mengimport menggunakan file excel klik ikon di atas sebelah kiri</li>
                                    <li>Kemudian pilih file excel yang sebelumnya sudah di siapkan</li>
                                    <li>Kemudian Klik Tambah</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- modal import data guru -->
<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">Tambah Banyak</h4>
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('administrator/importSiswa') ?>" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="file">File input</label>
                        <input type="file" id="file" name="file" accept=".xlsx,.xls" required>
                        <p class="help-block">Masukan File excel dengan format xlsx atau xls.</p>
                    </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Tambah</button>
            </div>
            </form>

        </div>
    </div>
</div>

<!-- modal panduan import -->
<div class="modal fade panduan" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">Gambar 1</h4>
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body text-center">
                <div class="card">
                    <div class="card-body">
                        <a href="<?= base_url('assets/img/logo/importSiswa.png') ?>" class="perbesar img-fluid">
                            <img src="<?= base_url('assets/img/logo/importSiswa.png') ?>" class="img-fluid" alt="">
                        </a>
                    </div>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>

        </div>
    </div>
</div>