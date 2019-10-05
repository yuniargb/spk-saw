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
                                    <a href="<?= base_url('index.php/kriteria') ?>" class="btn btn-danger text-white" data-toggle="tooltip" data-placement="bottom" title="Hapus">Kembali</a>
                                </div>

                            </div>
                        </div>
                        <!-- title -->
                    </div>
                    <div class="container-fluid mb-3">
                        <form action="<?= base_url('index.php/kriteria/update') ?>" method="post">
                            <div class="modal-body">
                                <div class="form-group">
                                    <label for="kode">Kode</label>
                                    <input type="text" class="form-control" id="kode" value="<?= $data->kdkriteria ?>" name="kdkriteria" placeholder="Input Kode" readonly>
                                    <?= form_error('kdkriteria', '<div class="text-danger">', '</div>'); ?>
                                </div>
                                <div class="form-group">
                                    <label for="nama">Nama Kriteria</label>
                                    <input type="text" class="form-control" id="nama" value="<?= $data->nmkriteria ?>" name="nama" placeholder="Input Nama">
                                    <?= form_error('nama', '<div class="text-danger">', '</div>'); ?>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="validationDefaultUsername">Bobot</label>
                                            <div class="input-group">
                                                <input type="text" class="form-control" id="bobots" name="bobots" placeholder="Input Bobot" aria-describedby="inputGroupPrepend2">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="inputGroupPrepend2">%</span>
                                                </div>
                                                <?= form_error('bobots', '<div class="text-danger">', '</div>'); ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="bobot">Hasil Bobot</label>
                                            <input type="text" class="form-control" id="bobot" value="<?= $data->bobot ?>" name="bobot" placeholder="Input Bobot" readonly>
                                            <?= form_error('bobot', '<div class="text-danger">', '</div>'); ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="nama">Tipe</label>
                                    <select name="tipe" id="tipe" class="form-control">
                                        <option value="">Pilih Tipe</option>
                                        <option value="benefit" <?= $data->tipe == 'benefit' ? 'selected' : '' ?>>benefit</option>
                                        <option value="cost" <?= $data->tipe == 'cost' ? 'selected' : '' ?>>cost</option>
                                    </select>
                                    <?= form_error('tipe', '<div class="text-danger">', '</div>'); ?>
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