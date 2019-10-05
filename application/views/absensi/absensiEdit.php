<div class="page-wrapper" style="min-height:100vh;">
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <!-- <div class="page-breadcrumb">
        <div class="row align-items-center">
            <div class="col-5">
                <h4 class="page-title">Karyawan</h4>
                <div class="d-flex align-items-center">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Library</li>
                        </ol>
                    </nav>
                </div>
            </div>
            <div class="col-7">
                <div class="text-right upgrade-btn">
                    <a href="https://wrappixel.com/templates/xtremeadmin/" class="btn btn-danger text-white" target="_blank">Upgrade to Pro</a>
                </div>
            </div>
        </div>
    </div> -->
    <!-- ============================================================== -->
    <!-- End Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- Container fluid  -->
    <!-- ============================================================== -->
    <!-- Container fluid  -->
    <!-- ============================================================== -->
    <div class="container-fluid">
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Table -->
        <!-- ============================================================== -->
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
                                    <a href="<?= base_url('index.php/absensi') ?>" class="btn btn-danger text-white" data-toggle="tooltip" data-placement="bottom" title="Hapus">Kembali</a>
                                </div>

                            </div>
                        </div>
                        <!-- title -->
                    </div>
                    <div class="container-fluid mb-3">
                        <form action="<?= base_url('index.php/absensi/update') ?>" method="post">
                            <div class="modal-body">
                                <div class="form-group">
                                    <label for="tgl">Tanggal Absen</label>
                                    <input type="date" class="form-control" id="tgl" name="tgl" value="<?= $data->tgl_absen ?>" placeholder="Input Kode" readonly>
                                    <?= form_error('tgl', '<div class="text-danger">', '</div>'); ?>
                                </div>
                                <table class="table v-middle">
                                    <thead class="thead-dark">
                                        <tr class="bg-light">
                                            <th class="border-top-0">NIK</th>
                                            <th class="border-top-0">Karyawan</th>
                                            <th class="border-top-0">Keterangan</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($absen as $d) { ?>
                                            <tr>
                                                <td>
                                                    <?= $d->nik ?>
                                                    <input type="hidden" class="form-control" id="kdabsen" name="kdabsen[]" value="<?= $d->kdabsen ?>">
                                                </td>
                                                <td><?= $d->nmkaryawan ?></td>
                                                <td>
                                                    <select name="keterangan[]" class="form-control" id="keterangan">
                                                        <option value="hadir" <?= $d->keterangan == "hadir" ? 'selected' : '' ?>>Hadir</option>
                                                        <option value="sakit" <?= $d->keterangan == "sakit" ? 'selected' : '' ?>>Sakit</option>
                                                        <option value="izin" <?= $d->keterangan == "izin" ? 'selected' : '' ?>>Izin</option>
                                                        <option value="alfa" <?= $d->keterangan == "alfa" ? 'selected' : '' ?>>Alfa</option>
                                                    </select>
                                                </td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
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