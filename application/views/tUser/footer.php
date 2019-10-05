<!-- All Jquery -->
<!-- ============================================================== -->
<script src="<?= base_url('assets/assets/libs/jquery/dist/jquery.min.js') ?>"></script>
<!-- Bootstrap tether Core JavaScript -->
<script src="<?= base_url('assets/assets/libs/popper.js/dist/umd/popper.min.js') ?>"></script>
<script src="<?= base_url('assets/assets/libs/bootstrap/dist/js/bootstrap.min.js') ?>"></script>
<script src="<?= base_url('assets/dist/js/app-style-switcher.js') ?>"></script>
<!--Wave Effects -->
<script src="<?= base_url('assets/dist/js/waves.js') ?>"></script>
<!--Menu sidebar -->
<script src="<?= base_url('assets/dist/js/sidebarmenu.js') ?>"></script>
<!--Custom JavaScript -->
<script src="<?= base_url('assets/dist/js/custom.js') ?>"></script>
<!--This page JavaScript -->
<!--chartis chart-->
<script src="<?= base_url('assets/assets/libs/chartist/dist/chartist.min.js') ?>"></script>
<script src="<?= base_url('assets/assets/libs/chartist-plugin-tooltips/dist/chartist-plugin-tooltip.min.js') ?>"></script>
<script src="<?= base_url('assets/dist/js/pages/dashboards/dashboard1.js') ?>"></script>

<!--DataTables -->
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>

<!-- SweetAlert -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>

<!-- select2 -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.8/js/select2.min.js"></script>

<script>
    $(document).ready(function() {
        $('.table').DataTable();
        $('.select2').select2({
            dropdownParent: $('#exampleModalCenter')
        });
        $('.btn-hapus').on('click', function(e) {
            e.preventDefault();
            var getLink = $(this).attr('href');
            const swalWithBootstrapButtons = Swal.mixin({
                customClass: {
                    confirmButton: 'btn btn-success',
                    cancelButton: 'btn btn-danger'
                },
                buttonsStyling: false
            })

            swalWithBootstrapButtons.fire({
                title: 'Anda yakin?',
                text: "Silahkan tekan tombol hapus jika anda yakin hapus data!",
                type: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Ya, hapus!',
                cancelButtonText: 'Tidak, batal!',
                reverseButtons: true
            }).then((result) => {
                if (result.value) {
                    window.location.href = getLink
                } else if (
                    /* Read more about handling dismissals below */
                    result.dismiss === Swal.DismissReason.cancel
                ) {
                    swalWithBootstrapButtons.fire(
                        'Berhasil dibatalkan',
                        'Data batal dihapus :)',
                        'error'
                    )
                }
            })
        });

        $('#karyawan').on('change', function() {
            var absen = $('#karyawan option:selected').data('absen');
            console.log('ok');
            $('#C1').val(absen);
        })
        $('#bobots').on('keyup', function() {
            var bobot = $(this).val() / 100;

            $('#bobot').val(bobot);
        })
    });
</script>
</body>

</html>