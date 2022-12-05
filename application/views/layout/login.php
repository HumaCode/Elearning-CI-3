<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Halaman Login</title>

    <!-- Bootstrap -->
    <link href="<?= base_url() ?>assets/vendor/gentelella-master/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Optional theme -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap-theme.min.css" integrity="sha384-6pzBo3FDv/PJ8r2KRkGHifhEocL+1X2rVCTTkUfGk7/0pbek5mMa1upzvWbrUbOZ" crossorigin="anonymous">
    <!-- Font Awesome -->
    <link href="<?= base_url() ?>assets/vendor/gentelella-master/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="<?= base_url() ?>assets/vendor/gentelella-master/vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- Animate.css -->
    <link href="<?= base_url() ?>assets/vendor/gentelella-master/vendors/animate.css/animate.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="<?= base_url() ?>assets/vendor/gentelella-master/build/css/custom.min.css" rel="stylesheet">
</head>

<body class="login">
    <div>
        <a class="hiddenanchor" id="signup"></a>
        <a class="hiddenanchor" id="signin"></a>

        <div class="login_wrapper">
            <div class="animate form login_form">
                <section class="login_content p-3">
                    <form method="post" action="<?= base_url('auth/login') ?>">
                        <h1>Halaman Login</h1>
                        <!-- pesan flashdata -->
                        <div class="pesan"><?= $this->session->flashdata('message'); ?></div>
                        <div>
                            <?= form_error('username', '<small class="text-danger pl-2">', '</small>'); ?>
                            <input type="text" class="form-control" placeholder="Username" name="username" />
                        </div>
                        <div>
                            <?= form_error('password', '<small class="text-danger pl-2">', '</small>'); ?>
                            <input type="password" class="form-control" placeholder="Password" name="password" />
                        </div>
                        <div>
                            <button class="btn btn-default btn-blok" type="submit">Masuk</button>
                        </div>
                    </form>
                    <div class="clearfix"></div>

                    <div class="separator">
                        <p class="change_link">Belum Punya Akun.?
                            <a href="#signup" class="to_register"> Daftar..! </a>
                        </p>

                        <div class="clearfix"></div>
                        <br />

                        <div>
                            <h1><i class="fa fa-paw"></i> Gentelella Alela!</h1>
                            <p>©2021 By Humaidi Zakaria | Built with Gentelella Alela! is a Bootstrap 3 template.</p>
                        </div>
                    </div>

                </section>
            </div>

            <div id="register" class="animate form registration_form">
                <section class="login_content p-3">
                    <form method="post" action="<?= base_url('auth/registrasi') ?>">
                        <h1>Buat Akun Baru</h1>
                        <div>
                            <?= form_error('nama', '<small class="text-danger pl-2">', '</small>'); ?>
                            <input type="text" class="form-control" placeholder="Nama Lengkap" name="nama" />
                        </div>
                        <div>
                            <?= form_error('username', '<small class="text-danger pl-2">', '</small>'); ?>
                            <input type="text" class="form-control" placeholder="Username" name="username" />
                        </div>
                        <div>
                            <select name="status" id="status" class="form-control" style="margin-bottom: 20px;" required>
                                <option value="">-- Pilih Status --</option>
                                <option value="Guru">Guru</option>
                                <option value="Siswa">Siswa</option>
                            </select>
                        </div>

                        <div>
                            <?= form_error('password1', '<small class="text-danger pl-2">', '</small>'); ?>
                            <input type="password" class="form-control" placeholder="Password" name="password1" />
                        </div>
                        <div>
                            <input type="password" class="form-control" placeholder="Ulangi Password" name="password2" />
                        </div>
                        <div>
                            <button class="btn btn-default" type="submit">Daftar</button>
                        </div>

                        <div class="clearfix"></div>

                        <div class="separator">
                            <p class="change_link">Sudah Punya Akun ?
                                <a href="#signin" class="to_register"> Silahkan Login </a>
                            </p>

                            <div class="clearfix"></div>
                            <br />

                            <div>
                                <h1><i class="fa fa-paw"></i>Gentelella Alela!</h1>
                                <p>©2021 By Humaidi Zakaria | Built with Gentelella Alela! is a Bootstrap 3 template.</p>
                            </div>
                        </div>
                    </form>
                </section>
            </div>
        </div>
    </div>
    <!-- Latest compiled and minified JavaScript -->
    <!-- <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js" integrity="sha384-aJ21OjlMXNL5UyIl/XNwTMqvzeRMZH2w8c5cRVpzpU8Y5bApTppSuUkhZXN0VxHd" crossorigin="anonymous"></script> -->
</body>

</html>