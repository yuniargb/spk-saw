<!-- Page wrapper  -->
<!-- ============================================================== -->
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
                        <table id="data" class="table v-middle table-responsive">
                            <thead>
                                <tr class="bg-light">
                                    <th class="border-top-0">NIK</th>
                                    <th class="border-top-0">Nama</th>
                                    <th class="border-top-0">Jenis Kelamin</th>
                                    <th class="border-top-0">Tanggal Lahir</th>
                                    <th class="border-top-0">Alamat</th>
                                    <th class="border-top-0">Jabatan</th>
                                    <th class="border-top-0">Tanggal Masuk</th>
                                    <th class="border-top-0">Tanggal Keluar</th>
                                    <th class="border-top-0">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($data as $d) { ?>
                                    <tr>
                                        <td><?= $d->nik ?></td>
                                        <td><?= $d->nmkaryawan ?></td>
                                        <td><?= $d->jenisk ?></td>
                                        <td><?= $d->tgl_lahir ?></td>
                                        <td><?= $d->alamat ?></td>
                                        <td><?= $d->jabatan ?></td>
                                        <td><?= $d->tgl_masuk ?></td>
                                        <td><?= $d->tgl_keluar ?></td>
                                        <td>
                                            <a href="<?= base_url('index.php/karyawan/edit/' . $d->nik) ?>" class="btn btn-primary text-white" data-toggle="tooltip" data-placement="bottom" title="Edit"><i class="mdi mdi-update"></i></a>
                                            <a href="<?= base_url('index.php/karyawan/delete/' . $d->nik) ?>" id="btn-hapus" class="btn btn-danger text-white btn-hapus" data-toggle="tooltip" data-placement="bottom" title="Hapus"><i class="mdi mdi-delete"></i></a>
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
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Tambah <?= $hal ?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('index.php/karyawan/tambah') ?>" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="nik">NIK</label>
                        <input type="text" class="form-control" id="nik" name="nik" placeholder="Input NIK">
                        <?= form_error('nik', '<div class="text-danger">', '</div>'); ?>
                    </div>
                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <input type="text" class="form-control" id="nama" name="nama" placeholder="Input Nama">
                        <?= form_error('nama', '<div class="text-danger">', '</div>'); ?>
                    </div>
                    <div class="form-group row">
                        <label for="jk" class="col-md-12">Jenis Kelamin</label>
                        <div class="col-md-6">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="jk" id="jk" value="laki-laki">
                                <label class="form-check-label" for="laki-laki">Laki-Laki</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="jk" id="jk" value="perempuan">
                                <label class="form-check-label" for="perempuan">Perempuan</label>
                            </div>
                        </div>
                        <?= form_error('jk', '<div class="text-danger col-md-12">', '</div>'); ?>
                    </div>
                    <div class="form-group">
                        <label for="tgllahir">Tanggal Lahir</label>
                        <input type="date" class="form-control" id="tgllahir" name="tgllahir" placeholder="Input Tanggal Lahir">
                        <?= form_error('tgllahir', '<div class="text-danger">', '</div>'); ?>
                    </div>
                    <div class="form-group">
                        <label for="nama">Jabatan</label>
                        <select name="jabatan" id="jabatan" class="form-control">
                            <option value="">Pilih Jabatan</option>
                            <option value="karyawan">karyawan</option>
                            <option value="manager">manager</option>
                        </select>
                        <?= form_error('jabatan', '<div class="text-danger">', '</div>'); ?>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="tglmasuk">Tanggal Masuk</label>
                            <input type="date" class="form-control" id="tglmasuk" name="tglmasuk" placeholder="Input Tanggal Lahir">
                            <?= form_error('tglmasuk', '<div class="text-danger">', '</div>'); ?>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="tglkeluar">Tanggal Keluar</label>
                            <input type="date" class="form-control" id="tglkeluar" name="tglkeluar" placeholder="Input Tanggal Lahir">
                            <?= form_error('tglkeluar', '<div class="text-danger">', '</div>'); ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="nama">Alamat</label>
                        <textarea name="alamat" id="alamat" cols="5" rows="5" placeholder="Input Alamat" class="form-control"></textarea>
                        <?= form_error('alamat', '<div class="text-danger">', '</div>'); ?>
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