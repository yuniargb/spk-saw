<div class="page-wrapper" style="min-height:100vh;">
    <div class="container-fluid">
        <div class="row">
            <!-- column -->
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <!-- title -->
                        <div class="d-md-flex align-items-center">
                            <div>
                                <h4 class="card-title">Data <?= $hal ?></h4>
                                <h5 class="card-subtitle">Edit Data <?= $hal ?></h5>
                            </div>
                            <div class="ml-auto">
                                <div class="text-right upgrade-btn">
                                    <a href="<?= base_url('index.php/penilaian') ?>" class="btn btn-danger text-white" data-toggle="tooltip" data-placement="bottom" title="Hapus">Kembali</a>
                                </div>

                            </div>
                        </div>
                        <!-- title -->
                    </div>
                    <div class="container-fluid mb-3">
                        <form action="<?= base_url('index.php/penilaian/update') ?>" method="post">
                            <div class="modal-body">
                                <div class="form-group">
                                    <label for="tgl">Tahun</label>
                                    <select name="tahun" id="tahun" class="form-control" readonly>
                                        <?php
                                        $tahun  = date('Y');
                                        $target = $tahun - 10;
                                        while ($tahun >= $target) { ?>
                                        <option value="<?= $tahun ?>" <?= $tahun == $data->tahun ? 'selected' : '' ?>><?= $tahun ?></option>
                                        <?php
                                            $tahun--;
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="tgl">Karyawan</label>
                                    <input class="form-control" type="hidden" name="karyawan" value="<?= $data->nik  ?>">
                                    <select name="kr" id="karyawan" class="select2 form-control" style="width:100%;" required disabled>
                                        <option value="">== PILIH KARYAWAN ==</option>
                                        <?php foreach ($karyawan as $d) { ?>
                                        <option value="<?= $d->nik ?>" data-absen="<?= round($d->absen, 2) ?>" <?= $d->nik == $data->nik ? 'selected' : '' ?>><?= $d->nmkaryawan ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="row">
                                    <?php
                                    $nikk = $data->nik;
                                    $tahunn = $data->tahun;
                                    foreach ($kriteria as $k) {
                                        $data = array(
                                            'nik' => $nikk,
                                            'tahun' => $tahunn,
                                            'kdkriteria' =>  $k->kdkriteria
                                        );
                                        $cek = $this->Mpenilaian->cekNilai($data);
                                        ?>
                                    <div class="form-group col-md-6">
                                        <label for="<?= $k->kdkriteria ?>"><?= $k->nmkriteria ?> (<?= $k->kdkriteria ?>)</label>
                                        <input value="<?= $cek['nilai'] ?>" class="form-control" type="text" name="<?= $k->kdkriteria ?>" id="<?= $k->kdkriteria ?>" placeholder="Input <?= $k->nmkriteria ?>" <?= $k->kdkriteria == 'C1' ? 'readonly' : '' ?> required>
                                    </div>
                                    <?php } ?>
                                </div>
                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </div>
                            <div class="modal-footer">

                            </div>
                        </form>
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