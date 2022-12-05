<!-- flashdata sweetalert -->
<div class="flash-data" data-flashdata="<?= $this->session->flashdata('pesan') ?>"></div>

<!-- page content -->
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Data User </h3>
            </div>
            <a href="<?= base_url('administrator/tambahUser') ?>" class="btn btn-primary float-right" data-toggle="tooltip" data-placement="bottom" title="Tambah Data User"><i class="glyphicon glyphicon-plus"></i></a>
        </div>

        <div class="clearfix"></div>

        <div class="row">
            <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Data User</h2>
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
                                                <th>Username</th>
                                                <th>Foto</th>
                                                <th>Status Akun</th>
                                                <th>Status</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>


                                        <tbody>
                                            <?php
                                            $i = 1;
                                            foreach ($daftar_user as $du) : ?>

                                                <tr>
                                                    <td class="text-center"><?= $i; ?></td>
                                                    <td><?= $du['nama'] ?></td>
                                                    <td><?= $du['username'] ?></td>
                                                    <td class="text-center">
                                                        <img src="<?= base_url('assets/img/user/') . $du['foto'] ?>" alt="<?= $du['foto'] ?>" width="70">
                                                    </td>
                                                    <td class="text-center">
                                                        <?php if ($du['is_active'] == '0') : ?>
                                                            <span class="text-danger">Tidak Aktif</span>
                                                        <?php else : ?>
                                                            <span class="text-success">Aktif</span>
                                                        <?php endif; ?>
                                                    </td>
                                                    <td class="text-center">
                                                        <?php if ($du['status'] == 'Administrator') { ?>
                                                            <span class="badge badge-success">Administratr</span>
                                                        <?php } else  if ($du['status'] == 'Guru') { ?>
                                                            <span class="badge badge-warning">Guru</span>
                                                        <?php } else { ?>
                                                            <span class="badge badge-danger">Siswa</span>
                                                        <?php } ?>
                                                    </td>
                                                    <td class="text-center">
                                                        <a href="<?= base_url('administrator/detailUser/') . $du['id_user'] ?>" class="btn btn-success" data-toggle="tooltip" data-placement="bottom" title="Lihat Detail"><i class="glyphicon glyphicon-eye-open"></i></a>
                                                        <a href="<?= base_url('administrator/editUser/') . $du['id_user'] . '/' . $du['username'] . '/' . $du['status'] ?>" class="btn btn-primary" data-toggle="tooltip" data-placement="bottom" title="Edit"><i class="glyphicon glyphicon-pencil"></i></a>
                                                        <a href="<?= base_url('administrator/hapusUser/') . $du['id_user'] . '/' . $du['username'] ?>" class="btn btn-danger tombol-hapus" data-toggle="tooltip" data-placement="bottom" title="Hapus"><i class="glyphicon glyphicon-trash"></i></a>
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
            </div>
        </div>
    </div>
</div>