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
                                    <th class="border-top-0">Tanggal Absen</th>
                                    <th class="border-top-0">Jumlah Karyawan</th>
                                    <th class="border-top-0">Hadir</th>
                                    <th class="border-top-0">Sakit</th>
                                    <th class="border-top-0">Izin</th>
                                    <th class="border-top-0">Alfa</th>
                                    <th class="border-top-0">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($data as $d) { ?>
                                    <tr>
                                        <td><?= date('d-m-Y', strtotime($d->tgl_absen)) ?></td>
                                        <td><?= $d->karyawan ?></td>
                                        <td><?= $d->hadir ?></td>
                                        <td><?= $d->sakit ?></td>
                                        <td><?= $d->izin ?></td>
                                        <td><?= $d->alfa ?></td>
                                        <td>
                                            <a href="<?= base_url('index.php/absensi/edit/' . $d->tgl_absen) ?>" class="btn btn-primary text-white" data-toggle="tooltip" data-placement="bottom" title="Edit"><i class="mdi mdi-update"></i></a>
                                            <a href="<?= base_url('index.php/absensi/delete/' . $d->tgl_absen) ?>" id="btn-hapus" class="btn btn-danger text-white btn-hapus" data-toggle="tooltip" data-placement="bottom" title="Hapus"><i class="mdi mdi-delete"></i></a>
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
            <form action="<?= base_url('index.php/absensi/tambah') ?>" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="tgl">Tanggal Absen</label>
                        <input type="date" class="form-control" id="tgl" name="tgl" placeholder="Input Kode">
                        <?= form_error('tgl', '<div class="text-danger">', '</div>'); ?>
                    </div>
                    <table id="data" class="table v-middle">
                        <thead class="thead-dark">
                            <tr class="bg-light">
                                <th class="border-top-0">NIK</th>
                                <th class="border-top-0">Karyawan</th>
                                <th class="border-top-0">Keterangan</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($karyawan as $d) { ?>
                                <tr>
                                    <td>
                                        <?= $d->nik ?>
                                        <input type="hidden" class="form-control" id="nik" name="nik[]" value="<?= $d->nik ?>">
                                    </td>
                                    <td><?= $d->nmkaryawan ?></td>
                                    <td>
                                        <select name="keterangan[]" class="form-control" id="keterangan">
                                            <option value="hadir">Hadir</option>
                                            <option value="sakit">Sakit</option>
                                            <option value="izin">Izin</option>
                                            <option value="alfa">Alfa</option>
                                        </select>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
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