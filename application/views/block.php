<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Akses Ditolak.! </title>

    <!-- Bootstrap -->
    <link href="<?= base_url() ?>assets/vendor/gentelella-master/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="<?= base_url() ?>assets/vendor/gentelella-master/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="<?= base_url() ?>assets/vendor/gentelella-master/vendors/nprogress/nprogress.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="<?= base_url() ?>assets/vendor/gentelella-master/build/css/custom.min.css" rel="stylesheet">
</head>

<body class="nav-md">
    <div class="container body">
        <div class="main_container">
            <!-- page content -->
            <div class="col-md-12">
                <div class="col-middle">
                    <div class="text-center text-center">
                        <h1 class="error-number">403</h1>
                        <h2>Akses Ditolak.!</h2>
                        <p>Sepertinya anda mengakses halaman yang di larang.
                            <?php if ($this->session->userdata('status') == 'Administrator') { ?>
                                <a href="<?= base_url('administrator') ?>">Kembali ke Home</a>
                            <?php } else if ($this->session->userdata('status') == 'Guru') { ?>
                                <a href="<?= base_url('guru') ?>">Kembali ke Home</a>
                            <?php } else { ?>
                                <a href="<?= base_url('siswa') ?>">Kembali ke Home</a>
                            <?php } ?>
                        </p>

                    </div>
                </div>
            </div>
            <!-- /page content -->
        </div>
    </div>

    <!-- jQuery -->
    <script src="<?= base_url() ?>assets/vendor/gentelella-master/vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="<?= base_url() ?>assets/vendor/gentelella-master/vendors/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <!-- FastClick -->
    <script src="<?= base_url() ?>assets/vendor/gentelella-master/vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="<?= base_url() ?>assets/vendor/gentelella-master/vendors/nprogress/nprogress.js"></script>

    <!-- Custom Theme Scripts -->
    <script src="<?= base_url() ?>assets/vendor/gentelella-master/build/js/custom.min.js"></script>
</body>

</html>