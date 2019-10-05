<div class="page-wrapper" style="min-height:100vh;">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <!-- title -->
                        <div class="d-md-flex align-items-center">
                            <div>
                                <h4 class="card-title"><?= $hal ?></h4>
                            </div>
                        </div>
                        <!-- title -->
                    </div>
                    <div class="container-fluid mb-3">
                        <h2 class="text-center text-uppercase">
                            Selamat datang di sistem penunjang keputusan kenaikan jabatan karyawan
                        </h2>
                        <div class="ml-auto mb-3">
                            <div class="text-right upgrade-btn">
                                <a href="<?= base_url('index.php/laporan/hasil') ?>" target="_blank" class="btn btn-success text-white">
                                    Cetak
                                </a>
                            </div>
                        </div>
                        <table id="data" class="table v-middle">
                            <thead>
                                <tr>
                                    <th class="text-center">NO</th>
                                    <th class="text-center">NIK</th>
                                    <th class="text-center">Nama</th>
                                    <th class="text-center">Tahun</th>
                                    <th class="text-center">Hasil</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                foreach ($laporan as $p) :
                                    ?>
                                <tr>
                                    <td class="text-center"><?= $no ?></td>
                                    <td class="text-center"><?= $p->nik ?></td>
                                    <td class="text-center"><?= $p->nmkaryawan ?></td>
                                    <td class="text-center"><?= $p->tahun ?></td>
                                    <td class="text-center"><?= round($p->hasil, 2) ?></td>
                                </tr>
                                <?php $no++;
                                endforeach ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>