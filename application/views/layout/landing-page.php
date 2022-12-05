<?php

$data = $this->db->get_where('tb_setting', ['id_setting' => '1'])->row_array();

?>
<!doctype html>
<html lang="en" id="home">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
  <!-- Font Awesome -->
  <link href="<?= base_url() ?>assets/vendor/gentelella-master/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <!-- Fansybox -->
  <link href="<?= base_url() ?>assets/plugin/fancybox/source/jquery.fancybox.css?v=2.1.5" media="screen" rel="stylesheet">


  <link rel="stylesheet" href="<?= base_url('assets/css/style.css') ?>">

  <title>E-Learning</title>
</head>

<body>
  <!-- flashdata sweetalert -->
  <div class="flash-data" data-flashdata="<?= $this->session->flashdata('pesan') ?>"></div>

  <!-- nav bar  -->
  <nav class="navbar navbar-expand-lg  navbar-dark bg-dark fixed-top">
    <div class="container-fluid">
      <a class="navbar-brand page-scroll" href="#home"><?= $data['title'] ?></a>
      <div class="navbar-header">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
      </div>

      <div class="collapse navbar-collapse " id="navbarSupportedContent">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link page-scroll" href="#deskripsi">Deskripsi <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link page-scroll" href="#profil">Profile <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link page-scroll" href="#map">Map <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link page-scroll" href="#qna">Kritik dan Saran <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link page-scroll" href="<?= base_url('auth/login') ?>">Login <span class="sr-only">(current)</span></a>
          </li>
        </ul>
      </div>

    </div>
  </nav>
  <!-- AKHIR NAVBAR -->

  <!-- coreusel -->
  <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
      <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
      <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
      <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="<?= base_url('assets/img/logo/1.png') ?>" class="d-block w-100" alt="...">
        <div class="carousel-caption d-none d-md-block">
        </div>
      </div>
      <div class="carousel-item">
        <img src="<?= base_url('assets/img/logo/2.png') ?>" class="d-block w-100" alt="...">
        <div class="carousel-caption d-none d-md-block">
        </div>
      </div>
      <div class="carousel-item">
        <img src="<?= base_url('assets/img/logo/3.png') ?>" class="d-block w-100" alt="...">
        <div class="carousel-caption d-none d-md-block">
        </div>
      </div>
    </div>

    <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>

  <!-- AWAL DESKRIPSI -->
  <section class="deskripsi" id="deskripsi">
    <div class="container">
      <div class="row">
        <div class="col-sm-12">
          <h2 class="text-center">Deskripsi</h2>
          <hr>
        </div>
      </div>

      <div class="row text-justify">
        <div class="col-sm-6 ">
          <p class="pKiri"><?= $data['desk1'] ?></p>
          <p class="pKiri"><?= $data['desk2'] ?></p>
        </div>
        <div class="col-sm-6">
          <p class="pKanan"><?= $data['desk3'] ?></p>
          <p class="pKanan"><?= $data['desk4'] ?></p>
        </div>
      </div>
    </div>
  </section>
  <!-- AKHIR ABOUT -->

  <!-- AWAL PROFILE -->
  <section class="portfolio" id="profil">
    <div class="container">
      <div class="row">
        <div class="col-sm-12">
          <h2 class="text-center">Profil</h2>
          <hr>
        </div>
      </div>

      <div class="row mb-5">
        <div class="col-sm-5 offset-sm-2">
          <div class="card">
            <div class="card-body">
              <a href="<?= base_url('assets/img/logo/sd.png') ?>" class="perbesar img-fluid">
                <img src="<?= base_url('assets/img/logo/sd.png') ?>" class="img-fluid" alt="">
              </a>
            </div>
          </div>
        </div>
        <div class="col-sm-5">
          <table>
            <tr>
              <td>Nama Sekolah</td>
              <td>&nbsp;:&nbsp;</td>
              <td><?= $data['nm_sekolah'] ?></td>
            </tr>
            <tr>
              <td>NPSN</td>
              <td>&nbsp;:&nbsp;</td>
              <td><?= $data['npsn'] ?></td>
            </tr>
            <tr>
              <td>Jenjang Pendidikan</td>
              <td>&nbsp;:&nbsp;</td>
              <td><?= $data['j_pndidikan'] ?></td>
            </tr>
            <tr>
              <td>Status Sekolah</td>
              <td>&nbsp;:&nbsp;</td>
              <td><?= $data['status_sekolah'] ?></td>
            </tr>
            <tr>
              <td>Alamat Sekolah</td>
              <td>&nbsp;:&nbsp;</td>
              <td><?= $data['alamat'] ?></td>
            </tr>
            <tr>
              <td>RT / RW</td>
              <td>&nbsp;:&nbsp;</td>
              <td><?= $data['rt'] . ' / ' . $data['rw'] ?></td>
            </tr>
            <tr>
              <td>Kode Pos</td>
              <td>&nbsp;:&nbsp;</td>
              <td><?= $data['kd_pos'] ?></td>
            </tr>
            <tr>
              <td>Kelurahan</td>
              <td>&nbsp;:&nbsp;</td>
              <td><?= $data['kelurahan'] ?></td>
            </tr>
            <tr>
              <td>Kecamatan</td>
              <td>&nbsp;:&nbsp;</td>
              <td><?= $data['kecamatan'] ?></td>
            </tr>
            <tr>
              <td>Kabupaten</td>
              <td>&nbsp;:&nbsp;</td>
              <td><?= $data['kabupaten'] ?></td>
            </tr>
          </table>
        </div>
      </div>

      <div class="row mt-4">
        <div class="col-sm-9 offset-sm-3">
          <i class="fa fa-at mr-5"> Email : <?= $data['email'] ?></i> <i class="fa fa-facebook mr-5"> Facebook : <?= $data['fb'] ?></i> <i class="fa fa-phone"> Telepon : <?= $data['tlp'] ?></i>
        </div>
      </div>
    </div>


  </section>
  <!-- AKHIR PROFIL -->

  <!-- AWAL MAP -->
  <section class="map" id="map">
    <div class="container">
      <div class="row">
        <div class="col-sm-12">
          <h2 class="text-center">Map</h2>
          <hr>
        </div>
      </div>

      <div class="row">
        <div class="col-sm-6 offset-sm-3">
          <div class="embed-responsive embed-responsive-4by3">

            <iframe src="<?= $data['map'] ?>" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- AKHIR MAP -->

  <!-- CONTACT -->
  <section class="portfolio contact" id="qna">
    <div class="container">
      <div class="row">
        <div class="col-sm-12 text-center">
          <h2>Kritik dan Saran</h2>
          <hr>
        </div>
      </div>

      <div class="row ">
        <div class="col-sm-8 offset-sm-2">
          <form action="<?= base_url('auth/qna') ?>" method="post">
            <div class="form-group">
              <label for="email">Email</label>
              <input type="email" id="email" class="form-control" name="email" placeholder="masukan email kamu" autocomplete="off" required></input>
            </div>

            <div class="form-group">
              <label for="kritik">Kritik</label>
              <textarea class="form-control" name="kritik" id="kritik" rows="10" required></textarea>
            </div>

            <div class="form-group">
              <label for="saran">Saran</label>
              <textarea class="form-control" name="saran" id="saran" rows="10" required></textarea>
            </div>

            <button class="btn btn-primary mb-4" type="submit">KIRIM</button>
            <button class="btn btn-danger mb-4" type="reset">RESET</button>
          </form>
        </div>
      </div>
    </div>
  </section>
  <!-- AKHIR CONTACT -->

  <!-- FOOTER -->
  <footer>
    <div class="container text-center">
      <div class="row">
        <div class="col-sm-12">
          <p>&copy; copyright 2020 | Built by. <a href="http://instagram.com/amirzakaria986671">amirzakaria98</a>.</p>
        </div>
      </div>
    </div>
  </footer>
  <!-- AKHIR FOOTER -->

  <!-- Optional JavaScript; choose one of the two! -->

  <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
  <script src="<?= base_url('assets/js/jquery-3.1.1.min.js') ?>"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

  <!-- Fancy box -->
  <script src="<?= base_url() ?>assets/plugin/fancybox/source/jquery.fancybox.js?v=2.1.5"></script>
  <script>
    $(document).ready(function() {
      $('.perbesar').fancybox();
    });
  </script>
  <!-- SweetAlert -->
  <script src="<?= base_url() ?>assets/vendor/sweetalert/js/sweetalert2.all.min.js"></script>


  <script src="<?= base_url('assets/js/jquery.easing.1.3.js') ?>"></script>
  <script src="<?= base_url('assets/js/script.js') ?>"></script>



  <script>
    const flashData = $('.flash-data').data('flashdata');

    // jika ada flashDatanya maka jalankan sweetalertnya
    if (flashData) {
      Swal.fire(
        'Kritik dan Saran',
        'Berhasil ' + flashData,
        'success'
      )
    }
  </script>
</body>

</html>