<!-- flashdata sweetalert -->
<div class="flash-data" data-flashdata="<?= $this->session->flashdata('pesan') ?>"></div>

<!-- page content -->
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Daftar Matapelajaran </h3>
            </div>
            <a href="<?= base_url('administrator/tambahMapel') ?>" class="btn btn-primary float-right"><i class="glyphicon glyphicon-plus"> </i> Tambah Mapel</a>

        </div>

        <div class="clearfix"></div>

        <div class="row">
            <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Daftar Mapel</h2>
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
                                                <th width="50">No</th>
                                                <th class="text-center">Matapelajaran</th>
                                                <th width="100">Aksi</th>
                                            </tr>
                                        </thead>


                                        <tbody>
                                            <?php
                                            $i = 1;
                                            foreach ($mapel as $m) : ?>

                                                <tr>
                                                    <td class="text-center"><?= $i; ?></td>
                                                    <td><strong><?= $m['mapel'] ?></strong></td>

                                                    <td class="text-center">
                                                        <a href="<?= base_url('administrator/editMapel/') . $m['id_mapel'] ?>" class="btn btn-success" data-toggle="tooltip" data-placement="bottom" title="Edit"><i class=" glyphicon glyphicon-pencil"></i></a>
                                                        <a href="<?= base_url('administrator/hapusMapel/') . $m['id_mapel'] ?>" class="btn btn-danger tombol-hapus" data-toggle="tooltip" data-placement="bottom" title="Hapus"><i class="glyphicon glyphicon-trash"></i></a>
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