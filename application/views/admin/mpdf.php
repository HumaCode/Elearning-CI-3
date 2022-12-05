<?php

function tgl_indo($tanggal)
{
    $bulan = array(
        1 =>   'Januari',
        'Februari',
        'Maret',
        'April',
        'Mei',
        'Juni',
        'Juli',
        'Agustus',
        'September',
        'Oktober',
        'November',
        'Desember'
    );
    $pecahkan = explode('-', $tanggal);

    // variabel pecahkan 0 = tanggal
    // variabel pecahkan 1 = bulan
    // variabel pecahkan 2 = tahun

    return $pecahkan[2] . ' ' . $bulan[(int)$pecahkan[1]] . ' ' . $pecahkan[0];
}


?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Laporan Nilai Siswa</title>

    <!-- Compiled and minified CSS -->
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css"> -->

    <!-- Compiled and minified JavaScript -->
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script> -->

    <style>
        .nilai,
        .title,
        .nama,
        .tengah,
        .number {
            text-align: center;
        }

        .ttd {
            float: right;
        }

        .atas,
        .pas {
            font-size: 20px;
        }

        .bawah {
            font-size: 25px;
        }

        .pb {
            font-size: 10px;
        }

        hr {
            height: 5px;
            background-color: black;
        }

        .t2 {
            padding: 8px;
        }
    </style>

</head>

<body>

    <table width="100%">
        <tr>
            <td rowspan="3" width="70">
                <img src="<?= base_url('assets/img/logo/dinas.png') ?>" width="70" alt="">
            </td>
            <td class="tengah atas"><strong> PEMERINTAH KABUPATEN PEKALONGAN</strong></td>
        </tr>
        <tr>
            <td class="tengah pas"><strong> DINAS PENDIDIKAN DAN KEBUDAYAAN </strong></td>
        </tr>
        <tr>
            <td class="tengah bawah"><strong> SD NEGERI 01 WIRODITAN </strong></td>
        </tr>
        <tr>
            <td colspan="2" class="tengah pb">
                Alamat : Jl. Raya Raya Bojong No. 45 Bojong. Telp. (0285) 4482928 Pekalongan 51156 E-mail : sdn01wiroditan@gmail.com
            </td>
        </tr>
    </table>
    <hr>
    <br>
    <br>


    <h3 class="title"><strong> Daftar Nilai Siswa <?= $kursusId['kelas'] . ' Matapelajaran ' . $kursusId['mapel'] ?></strong></h3>

    <span>Sesi : <?= $soalId['nama_soal'] ?></span>
    <br><br>


    <table border="1" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th width="50" class="t2">No</th>
                <th class="t2">Nama</th>
                <th width="150" class="t2">Nilai</th>

            </tr>
        </thead>
        <tbody>
            <?php
            $i = 1;
            foreach ($nilai as $n) : ?>
                <?php

                if ($n['nilai'] >= 70) {
                    $nilai =  "<strong>" . $n['nilai'] . "</strong>";
                } else if ($n['nilai'] <= 69 || $n['nilai'] == 'Belum dinilai') {
                    $nilai = "<strong>" . $n['nilai'] . "</strong>";
                }

                ?>
                <tr>
                    <td width="50" class="number t2"><?= $i ?></td>
                    <td class="t2"><?= $n['nama'] ?></td>
                    <td class="nilai t2">
                        <?= $nilai ?>
                    </td>

                </tr>
            <?php $i++;
            endforeach; ?>
        </tbody>
    </table>

    <br>
    <br>
    <br>
    <br>

    <table>
        <tr>
            <td width="500"></td>
            <td style="text-align: center;">
                Bojong, <?= tgl_indo(date('Y-m-d')); ?>
                <br>
                <br>
                <br>
                <br>

                <?= $user['nama'] ?>
            </td>
        </tr>
    </table>

</body>

</html>