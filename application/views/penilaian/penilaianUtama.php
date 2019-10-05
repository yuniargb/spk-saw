<!-- Page wrapper  -->
<!-- ============================================================== -->
<div class="page-wrapper" style="min-height:100vh;">
    <div class="container-fluid">
        <!-- Table -->
        <!-- ============================================================== -->
        <div class="row">
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
                                <h4 class="card-title">Data <?= $hal ?></h4>
                                <h5 class="card-subtitle">List Data <?= $hal ?></h5>
                            </div>
                            <div class="ml-auto">
                                <div class="text-right upgrade-btn">
                                    <button type="button" class="btn btn-success text-white" data-toggle="modal" data-target="#exampleModalCenter">
                                        Tambah <?= $hal ?>
                                    </button>
                                </div>
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
                                    <th class="border-top-0">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($data as $d) { ?>
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
                                    <td>
                                        <a href="<?= base_url('index.php/penilaian/edit/' . $d->nik . '/' . $d->tahun) ?>" class="btn btn-primary text-white" data-toggle="tooltip" data-placement="bottom" title="Edit"><i class="mdi mdi-update"></i></a>
                                        <a href="<?= base_url('index.php/penilaian/delete/' . $d->nik . '/' . $d->tahun) ?>" class="btn btn-danger text-white btn-hapus" data-toggle="tooltip" data-placement="bottom" title="Hapus"><i class="mdi mdi-delete"></i></a>
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

<!-- Modal Tambah -->
<div class="modal fade bd-example-modal-xl" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content modal-dialog modal-lg">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Tambah <?= $hal ?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('index.php/penilaian/tambah') ?>" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="tgl">Tahun</label>
                        <select name="tahun" id="tahun" class="form-control">
                            <?php
                            $tahun  = date('Y');
                            $target = $tahun - 10;
                            while ($tahun >= $target) { ?>
                            <option value="<?= $tahun ?>"><?= $tahun ?></option>
                            <?php
                                $tahun--;
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="tgl">Karyawan</label>
                        <select name="karyawan" id="karyawan" class="select2 form-control" style="width:100%;" required>
                            <option value="">== PILIH KARYAWAN ==</option>
                            <?php foreach ($karyawan as $d) { ?>
                            <option value="<?= $d->nik ?>" data-absen="<?= round($d->absen, 2) ?>"><?= $d->nmkaryawan ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="row">
                        <?php foreach ($kriteria as $k) { ?>
                        <div class="form-group col-md-6">
                            <label for="<?= $k->kdkriteria ?>"><?= $k->nmkriteria ?></label>
                            <input class="form-control" type="text" name="<?= $k->kdkriteria ?>" id="<?= $k->kdkriteria ?>" placeholder="Input <?= $k->nmkriteria ?>" <?= $k->kdkriteria == 'C1' ? 'readonly' : '' ?> required>
                        </div>
                        <?php } ?>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Modal Tambah -->