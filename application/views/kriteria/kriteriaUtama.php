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
                        <table id="data" class="table v-middle">
                            <thead>
                                <tr class="bg-light">
                                    <th class="border-top-0">Kode</th>
                                    <th class="border-top-0">Kriteria</th>
                                    <th class="border-top-0">Bobot</th>
                                    <th class="border-top-0">Tipe</th>
                                    <th class="border-top-0">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($data as $d) { ?>
                                <tr>
                                    <td><?= $d->kdkriteria ?></td>
                                    <td><?= $d->nmkriteria ?></td>
                                    <td><?= $d->bobot ?></td>
                                    <td><?= $d->tipe ?></td>
                                    <td>
                                        <a href="<?= base_url('index.php/kriteria/edit/' . $d->kdkriteria) ?>" class="btn btn-primary text-white" data-toggle="tooltip" data-placement="bottom" title="Edit"><i class="mdi mdi-update"></i></a>
                                        <a href="<?= base_url('index.php/kriteria/delete/' . $d->kdkriteria) ?>" id="btn-hapus" class="btn btn-danger text-white btn-hapus" data-toggle="tooltip" data-placement="bottom" title="Hapus"><i class="mdi mdi-delete"></i></a>
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
            <form action="<?= base_url('index.php/kriteria/tambah') ?>" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="kode">Kode</label>
                        <input type="text" class="form-control" id="kode" name="kdkriteria" placeholder="Input Kode">
                        <?= form_error('kdkriteria', '<div class="text-danger">', '</div>'); ?>
                    </div>
                    <div class="form-group">
                        <label for="nama">Nama Kriteria</label>
                        <input type="text" class="form-control" id="nama" name="nama" placeholder="Input Nama">
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
                                <input type="text" class="form-control" id="bobot" name="bobot" placeholder="Input Bobot" readonly>
                                <?= form_error('bobot', '<div class="text-danger">', '</div>'); ?>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="nama">Tipe</label>
                        <select name="tipe" id="tipe" class="form-control">
                            <option value="">Pilih Tipe</option>
                            <option value="benefit">benefit</option>
                            <option value="cost">cost</option>
                        </select>
                        <?= form_error('tipe', '<div class="text-danger">', '</div>'); ?>
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