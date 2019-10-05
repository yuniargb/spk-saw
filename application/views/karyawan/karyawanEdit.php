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
                                    <a href="<?= base_url('index.php/karyawan') ?>" class="btn btn-danger text-white" data-toggle="tooltip" data-placement="bottom" title="Hapus">Kembali</a>
                                </div>

                            </div>
                        </div>
                        <!-- title -->
                    </div>
                    <div class="container-fluid mb-3">
                        <form action="<?= base_url('index.php/karyawan/update') ?>" method="post">
                            <div class="modal-body">
                                <div class="form-group">
                                    <label for="nik">NIK</label>
                                    <input type="text" class="form-control" id="nik" value="<?= $data->nik ?>" name="nik" placeholder="Input NIK" readonly>
                                    <?= form_error('nik', '<div class="text-danger">', '</div>'); ?>
                                </div>
                                <div class="form-group">
                                    <label for="nama">Nama</label>
                                    <input type="text" class="form-control" id="nama" value="<?= $data->nmkaryawan ?>" name="nama" placeholder="Input Nama">
                                    <?= form_error('nama', '<div class="text-danger">', '</div>'); ?>
                                </div>
                                <div class="form-group row">
                                    <label for="jk" class="col-md-12">Jenis Kelamin</label>
                                    <div class="col-md-6">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="jk" id="jk" value="laki-laki" <?= $data->jenisk == "laki-laki" ? "checked" : "" ?>>
                                            <label class="form-check-label" for="laki-laki">Laki-Laki</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="jk" id="jk" value="perempuan" <?= $data->jenisk == "perempuan" ? "checked" : "" ?>>
                                            <label class="form-check-label" for="perempuan">Perempuan</label>
                                        </div>
                                    </div>
                                    <?= form_error('jk', '<div class="text-danger col-md-12">', '</div>'); ?>
                                </div>
                                <div class="form-group">
                                    <label for="tgllahir">Tanggal Lahir</label>
                                    <input type="date" class="form-control" id="tgllahir" value="<?= $data->tgl_lahir ?>" name="tgllahir" placeholder="Input Tanggal Lahir">
                                    <?= form_error('tgllahir', '<div class="text-danger">', '</div>'); ?>
                                </div>
                                <div class="form-group">
                                    <label for="nama">Jabatan</label>
                                    <select value="<?= $data->nik ?>" name="jabatan" id="jabatan" class="form-control">
                                        <option value="">Pilih Jabatan</option>
                                        <option value="karyawan" <?= $data->jabatan == "karyawan" ? "selected" : "" ?>>karyawan</option>
                                        <option value="manager" <?= $data->jabatan == "manager" ? "selected" : "" ?>>manager</option>
                                    </select>
                                    <?= form_error('jabatan', '<div class="text-danger">', '</div>'); ?>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label for="tglmasuk">Tanggal Masuk</label>
                                        <input type="date" class="form-control" id="tglmasuk" value="<?= $data->tgl_masuk ?>" name="tglmasuk" placeholder="Input Tanggal Lahir">
                                        <?= form_error('tglmasuk', '<div class="text-danger">', '</div>'); ?>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="tglkeluar">Tanggal Keluar</label>
                                        <input type="date" class="form-control" id="tglkeluar" value="<?= $data->tgl_keluar ?>" name="tglkeluar" placeholder="Input Tanggal Lahir">
                                        <?= form_error('tglkeluar', '<div class="text-danger">', '</div>'); ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="nama">Alamat</label>
                                    <textarea name="alamat" id="alamat" cols="5" rows="5" placeholder="Input Alamat" class="form-control"><?= $data->alamat ?></textarea>
                                    <?= form_error('alamat', '<div class="text-danger">', '</div>'); ?>
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