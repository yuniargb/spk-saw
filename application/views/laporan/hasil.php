<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Required meta tags -->

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap.min.css') ?>">

    <!-- my css -->
    <link rel="stylesheet" href="<?php echo base_url('assets/css/style-front.css?v=3.3') ?>">
    <!-- Icon css -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">
    <!-- Title -->
    <title>Pembayaran</title>
    <style>
        .head {
            margin-bottom: 10px;
            padding-bottom: 10px;
            background-color: white;
            color: black;
            padding-left: 15px;
            border-bottom: 3px solid black;
            line-height: 10px;
            position: relative;
            text-align: center;
        }

        .head h1,
        .head h2 {
            text-transform: uppercase;
        }

        .head h1 {
            font-size: 40px;
        }

        .img-fluid {
            float: left;
            left: 35px;
            position: absolute;
            max-width: 10%;
            margin-right: 0px;
            margin-top: 10px;
        }

        .table-custom th {
            border: 1px solid #2c2d2d !important;
            padding: 10px;
        }

        .table-custom td {
            padding: 10px;
            border: 1px solid black;
            overflow: block;
        }

        .table-custom {
            border: 1px solid black;
        }

        /*.both {
          clear: both;
          text-align: center
        }
        .center{
            text-align: center;
        }*/
        .kanan {
            position: absolute;
            float: right;
            right: 0px;
            text-align: center;
            width: 100px;
        }

        .ttd {
            width: 100%;
            border: 1px solid black;
        }

        .ttdttd {
            height: 100px;
            border-bottom: 1px solid black;
            margin-bottom: 5px;
            text-align: center;
        }

        .nama {
            text-align: center;
        }

        .isi {
            margin-top: 30px;
            width: 100%;
            border: 1px solid black;
            position: relative;
            right: 20px;
            width: 200px;
            border: none;
        }

        .table-custom {
            color: #232323;
            border-collapse: collapse;
        }
    </style>
</head>

<body>
    <div class="body">
        <div class="head">
            <img src="<?php echo base_url('assets/gambar/logoo.jpeg') ?>" class="img-fluid" alt="" width="100" height="100">
            <h2>LAPORAN HASIL</h2>
            <h2>ZINKPOWER AUSTRINDO</h2>
            <p> Jl. Pancatama V Kav. 88B, Desa, Sukatani, Cikande, Serang, Banten 42186</p>
        </div>
        <div class="container">
            <table align="center" class="table-custom" style="width: 1000px;">
                <thead>
                    <tr>
                        <th align="center">NO</th>
                        <th align="center">NIK</th>
                        <th align="center">Nama</th>
                        <th align="center">Tahun</th>
                        <th align="center">Hasil</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    foreach ($laporan as $p) :
                        ?>
                    <tr>
                        <td align="center" width="10"><?= $no ?></td>
                        <td align="center" width="50"><?= $p->nik ?></td>
                        <td align="center" width="50"><?= $p->nmkaryawan ?></td>
                        <td align="center"><?= $p->tahun ?></td>
                        <td align="center" width="100"><?= round($p->hasil, 2) ?></td>
                    </tr>
                    <?php $no++;
                    endforeach ?>
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>