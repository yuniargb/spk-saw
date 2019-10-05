<!-- Page wrapper  -->
<!-- ============================================================== -->
<div class="page-wrapper" style="min-height:100vh;">
    <div class="container-fluid">
        <!-- Table -->
        <!-- ============================================================== -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <!-- title -->
                        <div class="d-md-flex align-items-center">
                            <div>
                                <h4 class="card-title">Pilih Tahun</h4>
                            </div>
                        </div>
                        <!-- title -->
                    </div>
                    <div class="container-fluid mb-3">
                        <form action="<?= base_url('index.php/hasil') ?>" method="POST">
                            <select name="tahun" id="tahun" class="form-control">
                                <?php
                                $tahun  = date('Y');
                                $target = $tahun - 10;
                                while ($tahun >= $target) { ?>
                                <option value="<?= $tahun ?>" <?= $tahn == $tahun ? 'selected' : '' ?>><?= $tahun ?></option>
                                <?php
                                    $tahun--;
                                }
                                ?>
                            </select>
                            <button type="submit" class="btn btn-primary mt-3">Pilih</button>
                        </form>
                    </div>
                </div>
            </div>
            <!-- column -->
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <?php if ($this->session->flashdata('sukses')) { ?>
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <?= $this->session->flashdata('sukses') ?>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <?php } ?>
                        <?php if ($this->session->flashdata('gagal')) { ?>
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <?= $this->session->flashdata('gagal') ?>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <?php } ?>
                        <!-- title -->
                        <div class="d-md-flex align-items-center">
                            <div>
                                <h4 class="card-title">Data Nilai Alternatif</h4>
                            </div>
                        </div>
                        <!-- title -->
                    </div>
                    <div class="container-fluid mb-3">
                        <table id="data" class="table v-middle">
                            <thead>
                                <tr class="bg-light">
                                    <th class="border-top-0">NIK</th>
                                    <th class="border-top-0">Nama</th>
                                    <th class="border-top-0">Tahun</th>
                                    <?php
                                    $dataa = $data;
                                    $kriteriaa = $kriteria;
                                    foreach ($kriteriaa as $k) { ?>
                                    <th><?= $k->kdkriteria ?></th>
                                    <?php
                                    }
                                    ?>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($dataa as $d) { ?>
                                <tr>
                                    <td><?= $d->nik ?></td>
                                    <td><?= $d->nmkaryawan ?></td>
                                    <td><?= $d->tahun ?></td>
                                    <?php
                                        foreach ($kriteria as $k) {
                                            $data = array(
                                                'nik' => $d->nik,
                                                'tahun' => $d->tahun,
                                                'kdkriteria' =>  $k->kdkriteria
                                            );
                                            $c = $this->Mpenilaian->cekNilai($data);
                                            ?>
                                    <td><?= round($c['nilai'], 2) ?></td>
                                    <?php
                                        }
                                        ?>
                                </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <!-- title -->
                        <div class="d-md-flex align-items-center">
                            <div>
                                <h4 class="card-title">Data Nilai Normalisasi</h4>
                            </div>
                            <div class="ml-auto">
                                <a href="<?= base_url('index.php/hasil/refreshHasil/' . $tahn) ?>" class="btn btn-success mt-3">Refresh Data</a>
                            </div>
                        </div>
                        <!-- title -->
                    </div>
                    <div class="container-fluid mb-3">
                        <table id="data" class="table v-middle">
                            <thead>
                                <tr class="bg-light">
                                    <th class="border-top-0">NIK</th>
                                    <th class="border-top-0">Nama</th>
                                    <th class="border-top-0">Tahun</th>
                                    <?php
                                    foreach ($kriteria as $k) { ?>
                                    <th><?= $k->kdkriteria ?></th>
                                    <?php
                                    }
                                    ?>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach ($dataa as $d) {
                                    $nikk = $d->nik;
                                    $tahunn = $d->tahun;
                                    ?>
                                <tr>
                                    <td><?= $nikk ?></td>
                                    <td><?= $d->nmkaryawan ?></td>
                                    <td><?= $tahunn ?></td>
                                    <?php
                                        foreach ($kriteriaa as $k) {
                                            $kri = $k->kdkriteria;

                                            $c = $this->Mhasil->getHsl('normalisasi', $nikk, $tahunn, $kri);
                                            ?>
                                    <td><?= round($c['nilai_normalisasi'], 2) ?></td>
                                    <?php
                                        }
                                        ?>
                                </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <!-- title -->
                        <div class="d-md-flex align-items-center">
                            <div>
                                <h4 class="card-title">Data Nilai Hasil</h4>
                            </div>
                        </div>
                        <!-- title -->
                    </div>
                    <div class="container-fluid mb-3">
                        <table id="data" class="table v-middle">
                            <thead>
                                <tr class="bg-light">
                                    <th class="border-top-0">NIK</th>
                                    <th class="border-top-0">Nama</th>
                                    <?php
                                    foreach ($kriteria as $k) { ?>
                                    <th><?= $k->kdkriteria ?></th>
                                    <?php
                                    }
                                    ?>
                                    <th class="border-top-0">Hasil</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach ($hasil as $d) {
                                    $nikk = $d->nik;
                                    $tahunn = $d->tahun;
                                    ?>
                                <tr>
                                    <td><?= $nikk ?></td>
                                    <td><?= $d->nmkaryawan ?></td>
                                    <?php
                                        $hasil = 0;
                                        foreach ($kriteriaa as $k) {
                                            $kri = $k->kdkriteria;
                                            $c = $this->Mhasil->getHsl('normalisasi', $nikk, $tahunn, $kri);
                                            $cs = $c['nilai_normalisasi'] * $c['bobot'];
                                            $hasil += $c['nilai_normalisasi'] * $c['bobot'];
                                            ?>
                                    <td><?= round($cs, 2) ?></td>
                                    <?php
                                        }
                                        ?>
                                    <td>
                                        <?= round($hasil, 2) ?>
                                    </td>
                                </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- Table -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
    </div>
</div>