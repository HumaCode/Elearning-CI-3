<!-- page content -->
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Kritik dan Saran</h3>
            </div>


        </div>

        <div class="clearfix"></div>

        <div class="row">
            <div class="col-md-12 col-sm-12  ">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Kritik dan Saran</h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                            </li>

                            <li><a class="close-link"><i class="fa fa-close"></i></a>
                            </li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <div class="card">
                            <div class="card-header">

                                <h4>Pengirim : <?= $qnaById['email'] ?></h4>
                            </div>
                            <div class="card-body">

                                <div class="row mt-4">
                                    <div class="col-md-6">
                                        <h4 class="text-center">Kritik</h4>
                                        <ul class="list-group text-justify">
                                            <li class="list-group-item"><?= $qnaById['kritik'] ?></li>
                                        </ul>
                                    </div>
                                    <div class="col-md-6">
                                        <h4 class="text-center">Saran</h4>
                                        <ul class="list-group text-justify">
                                            <li class="list-group-item"><?= $qnaById['saran'] ?></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <a href="<?= base_url('administrator/setting') ?>" class="btn btn-danger btn-block">Kembali</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /page content -->