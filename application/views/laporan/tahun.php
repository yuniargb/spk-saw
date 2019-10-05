<div class="page-wrapper" style="min-height:100vh;">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <!-- title -->
                        <div class="d-md-flex align-items-center">
                            <div>
                                <h4 class="card-title">Laporan hasil</h4>
                            </div>
                        </div>
                        <!-- title -->
                    </div>
                    <div class="container-fluid mb-3">
                        <form action="<?= base_url('index.php/laporan/hasil') ?>" method="POST">
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
                            <button type="submit" class="btn btn-primary mt-3">Cetak</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>