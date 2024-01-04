<div class="container-fluid">
    <footer class="d-flex flex-wrap justify-content-between align-items-center py-3 my-4 border-top">
        <div class="col-md-4 d-flex align-items-center">
            <a href="/" class="mb-3 me-2 mb-md-0 text-muted text-decoration-none lh-1">
                <img src="<?php echo base_url(); ?>assets/brand/bootstrap-logo.svg" alt="" width="29" height="24" class="d-inline-block align-text-top">
            </a>
            <span class="mb-3 mb-md-0 text-muted">Copy Right &copy; 2023 <b>Procurement, JMTO</b></span>
        </div>

        <div class="nav col-md-4 justify-content-end list-unstyled d-flex">
            <span class="mb-3 mb-md-0 text-muted">[ Version. 1.0 ]<b> E-DRT JMTO</b></span>
        </div>
    </footer>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="<?php echo base_url(); ?>assets/dist/js/bootstrap.bundle.min.js"></script>
<!-- InputMask -->
<script src="<?php echo base_url(); ?>assets/plugins/moment/moment.min.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/inputmask/jquery.inputmask.min.js"></script>
<!-- DataTables  & Plugins -->
<script src="<?php echo base_url(); ?>assets/plugins-lte/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins-lte/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins-lte/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins-lte/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins-lte/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins-lte/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins-lte/jszip/jszip.min.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins-lte/pdfmake/pdfmake.min.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins-lte/pdfmake/vfs_fonts.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins-lte/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins-lte/datatables-buttons/js/buttons.print.min.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins-lte/datatables-buttons/js/buttons.colVis.min.js"></script>
<!-- jQuery -->
<!-- Select2 -->
<!-- Scripts -->
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
    $(function() {
        $("#example1").DataTable({
            "responsive": false,
            "ordering": false,
            "lengthChange": false,
            "autoWidth": false,
            "buttons": ["excel", "pdf", "print", "colvis"]
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        $('#example2').DataTable({
            "paging": false,
            "lengthChange": false,
            "searching": false,
            "ordering": false,
            "info": false,
            "autoWidth": false,
            "responsive": false,
        });
    });
</script>
<script>
    $(function() {
        $('#example2').DataTable({
            "paging": false,
            "lengthChange": false,
            "searching": false,
            "ordering": false,
            "info": false,
            "autoWidth": false,
            "responsive": false,
        });
    });
</script>
<script>
    $(function() {
        $("#example5").DataTable({
            "responsive": false,
            "ordering": false,
            "lengthChange": false,
            "autoWidth": false,
            "buttons": ["excel", "pdf", "print", "colvis"]
        }).buttons().container().appendTo('#example5_wrapper .col-md-6:eq(0)');
        $('#example2').DataTable({
            "paging": false,
            "lengthChange": false,
            "searching": false,
            "ordering": false,
            "info": false,
            "autoWidth": false,
            "responsive": false,
        });
    });
</script>
<script>
    $(function() {
        $("#example7").DataTable({
            "responsive": false,
            "ordering": false,
            "lengthChange": false,
            "autoWidth": false,
            "buttons": ["excel", "pdf", "print", "colvis"]
        }).buttons().container().appendTo('#example7_wrapper .col-md-6:eq(0)');
        $('#example2').DataTable({
            "paging": false,
            "lengthChange": false,
            "searching": false,
            "ordering": false,
            "info": false,
            "autoWidth": false,
            "responsive": false,
        });
    });
</script>
<script>
    $(function() {
        $("#example8").DataTable({
            "responsive": false,
            "ordering": false,
            "lengthChange": false,
            "autoWidth": false,
            "buttons": ["excel", "pdf", "print", "colvis"]
        }).buttons().container().appendTo('#example8_wrapper .col-md-6:eq(0)');
        $('#example2').DataTable({
            "paging": false,
            "lengthChange": false,
            "searching": false,
            "ordering": false,
            "info": false,
            "autoWidth": false,
            "responsive": false,
        });
    });
</script>
<script>
    $(function() {
        //Money Euro
        $('[data-mask]').inputmask()
    });
    $('.date-own').datepicker({
        minViewMode: 2,
        format: 'yyyy'
    });
</script>

<script type="text/javascript">
    var rupiah = document.getElementById('rupiah');
    rupiah.addEventListener('keyup', function(e) {
        // tambahkan 'Rp.' pada saat form di ketik
        // gunakan fungsi formatRupiah() untuk mengubah angka yang di ketik menjadi format angka
        rupiah.value = formatRupiah(this.value, 'Rp. ');
    });
    var rupiah1 = document.getElementById('rupiah1');
    rupiah1.addEventListener('keyup', function(e) {
        // tambahkan 'Rp.' pada saat form di ketik
        // gunakan fungsi formatRupiah() untuk mengubah angka yang di ketik menjadi format angka
        rupiah1.value = formatRupiah(this.value, 'Rp. ');
    });
    var rupiah2 = document.getElementById('rupiah2');
    rupiah2.addEventListener('keyup', function(e) {
        // tambahkan 'Rp.' pada saat form di ketik
        // gunakan fungsi formatRupiah() untuk mengubah angka yang di ketik menjadi format angka
        rupiah2.value = formatRupiah(this.value, 'Rp. ');
    });


    /* Fungsi formatRupiah */
    function formatRupiah(angka, prefix) {
        var number_string = angka.replace(/[^,\d]/g, '').toString(),
            split = number_string.split(','),
            sisa = split[0].length % 3,
            rupiah = split[0].substr(0, sisa),
            ribuan = split[0].substr(sisa).match(/\d{3}/gi);

        // tambahkan titik jika yang di input sudah menjadi angka ribuan
        if (ribuan) {
            separator = sisa ? '.' : '';
            rupiah += separator + ribuan.join('.');
        }

        rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
        return prefix == undefined ? rupiah : (rupiah ? rupiah : '');
    }
</script>
<script>
    /* Tanpa Rupiah */
    var tanpa_rupiah = document.getElementById('tanpa-rupiah');
    tanpa_rupiah.addEventListener('keyup', function(e) {
        tanpa_rupiah.value = formatRupiah(this.value);
    });
    var tanpa_rupiah1 = document.getElementById('tanpa-rupiah1');
    tanpa_rupiah1.addEventListener('keyup', function(e) {
        tanpa_rupiah1.value = formatRupiah(this.value);
    });

    var rupiahku = $('.rupiahku');
    rupiahku.addEventListener('keyup', function(e) {
        rupiahku.value = formatRupiah(this.value);
    });

    /* Dengan Rupiah */
    var dengan_rupiah = document.getElementById('dengan-rupiah');
    dengan_rupiah.addEventListener('keyup', function(e) {
        dengan_rupiah.value = formatRupiah(this.value, 'Rp. ');
    });

    /* Fungsi */
    function formatRupiah(angka, prefix) {
        var number_string = angka.replace(/[^,\d]/g, '').toString(),
            split = number_string.split(','),
            sisa = split[0].length % 3,
            rupiah = split[0].substr(0, sisa),
            ribuan = split[0].substr(sisa).match(/\d{3}/gi);

        if (ribuan) {
            separator = sisa ? '.' : '';
            rupiah += separator + ribuan.join('.');
        }

        rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
        return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
    }
</script>

<script>
    $("#multiple").select2({
        placeholder: " Pilih Jenis Usaha...",
        allowClear: true
    });
    $("#multiple2").select2({
        placeholder: " Pilih Provinsi...",
        allowClear: true
    });
    $("#multiple3").select2({
        placeholder: " Pilih Kabupaten/Kota...",
        allowClear: true
    });
    $("#multiple4").select2({
        placeholder: " Pilih Kecamatan...",
        allowClear: true
    });
    $("#multiple5").select2({
        placeholder: " Pilih KBLI...",
        allowClear: true
    });

    $('.single-select-field').select2({
        theme: "bootstrap-5",
        width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style',
        placeholder: $(this).data('placeholder'),
    });
</script>
<script>
    window.onload = function() {
        jam();
    }

    function jam() {
        var e = document.getElementById('jam'),
            d = new Date(),
            h, m, s;
        h = d.getHours();
        m = set(d.getMinutes());
        s = set(d.getSeconds());

        e.innerHTML = h + ':' + m + ':' + s;

        setTimeout('jam()', 1000);
    }

    function set(e) {
        e = e < 10 ? '0' + e : e;
        return e;
    }
</script>

<script>
    function update_time_login() {
        $.ajax({
            url: '<?= base_url('auth/update_time') ?>',
            type: 'post',
            success: () => {

            }
        })
    }

    setInterval(() => {
        update_time_login()
    }, 2000);
</script>

<script>
    modal_dokumen_warning_siup()

    function modal_dokumen_warning_siup() {
        var modal_warning_dokumen = $('#modal_warning_dokumen');
        $.ajax({
            type: "GET",
            url: '<?= base_url('dashboard/cek_dokumen_warning') ?>',
            dataType: "JSON",
            success: function(response) {
                // siup
                console.log(new Date().getFullYear());
                if (response['row_siup'].sts_seumur_hidup == 2) {
                    $('#siup_warning').css('display', 'none');
                } else {
                    if (response['tahun_siup'] >= new Date().getFullYear()) {
                        $('#siup_warning').css('display', 'none');
                    } else {
                        if (response['validasi_bulan_siup'] <= 2) {
                            modal_warning_dokumen.modal('show');
                            $('#siup_warning').css('display', 'block');
                            $('#warning_siup').html(response['warning_siup']);
                            $('#nama_dokumen_siup').html(response['nama_dokumen_siup']);
                        } else {
                            $('#siup_warning').css('display', 'none');
                        }
                    }

                }

                // nib
                if (response['row_nib'].sts_seumur_hidup == 2) {
                    $('#nib_warning').css('display', 'none');
                } else {
                    // nib
                    if (response['tahun_nib'] >= new Date().getFullYear()) {
                        $('#nib_warning').css('display', 'none');
                    } else {
                        if (response['validasi_bulan_nib'] <= 2) {
                            modal_warning_dokumen.modal('show');
                            $('#nib_warning').css('display', 'block');
                            $('#warning_nib').html(response['warning_nib']);
                            $('#nama_dokumen_nib').html(response['nama_dokumen_nib']);
                        } else {
                            $('#nib_warning').css('display', 'none');
                        }
                    }
                }


                // sbu
                if (response['row_sbu'].sts_seumur_hidup == 2) {
                    $('#sbu_warning').css('display', 'none');
                } else {
                    // sbu
                    if (response['tahun_sbu'] >= new Date().getFullYear()) {
                        $('#sbu_warning').css('display', 'none');
                    } else {
                        if (response['validasi_bulan_sbu'] <= 2) {
                            modal_warning_dokumen.modal('show');
                            $('#sbu_warning').css('display', 'block');
                            $('#warning_sbu').html(response['warning_sbu']);
                            $('#nama_dokumen_sbu').html(response['nama_dokumen_sbu']);
                        } else {
                            $('#sbu_warning').css('display', 'none');
                        }
                    }
                }


                // akta_pendirian
                if (response['row_akta_pendirian'].sts_seumur_hidup == 2) {
                    $('#akta_pendirian_warning').css('display', 'none');
                } else {
                    // akta_pendirian
                    if (response['tahun_akta_pendirian'] >= new Date().getFullYear()) {
                        $('#akta_pendirian_warning').css('display', 'none');
                    } else {
                        if (response['validasi_bulan_akta_pendirian'] <= 2) {
                            modal_warning_dokumen.modal('show');
                            $('#akta_pendirian_warning').css('display', 'block');
                            $('#warning_akta_pendirian').html(response['warning_akta_pendirian']);
                            $('#nama_dokumen_akta_pendirian').html(response['nama_dokumen_akta_pendirian']);
                        } else {
                            $('#akta_pendirian_warning').css('display', 'none');
                        }
                    }
                }

                // sppkp
                if (response['row_sppkp'].sts_seumur_hidup == 2) {
                    $('#sppkp_warning').css('display', 'none');
                } else {
                    // sppkp
                    if (response['tahun_sppkp'] >= new Date().getFullYear()) {
                        $('#sppkp_warning').css('display', 'none');
                    } else {
                        if (response['validasi_bulan_sppkp'] <= 2) {
                            modal_warning_dokumen.modal('show');
                            $('#sppkp_warning').css('display', 'block');
                            $('#warning_sppkp').html(response['warning_sppkp']);
                            $('#nama_dokumen_sppkp').html(response['nama_dokumen_sppkp']);
                        } else {
                            $('#sppkp_warning').css('display', 'none');
                        }
                    }
                }

                // npwp
                if (response['row_npwp'].sts_seumur_hidup == 2) {
                    $('#npwp_warning').css('display', 'none');
                } else {
                     // npwp
                     if (response['tahun_npwp'] >= new Date().getFullYear()) {
                        $('#npwp_warning').css('display', 'none');
                    } else {
                        if (response['validasi_bulan_npwp'] <= 2) {
                            modal_warning_dokumen.modal('show');
                            $('#npwp_warning').css('display', 'block');
                            $('#warning_npwp').html(response['warning_npwp']);
                            $('#nama_dokumen_npwp').html(response['nama_dokumen_npwp']);
                        } else {
                            $('#npwp_warning').css('display', 'none');
                        }
                    }
                }



            }
        })
    }



    // modal_warning_lap_keuangan()

    // function modal_warning_lap_keuangan() {
    //     var modal_warning_lap_keuangan = $('#modal_warning_lap_keuangan');
    //     $.ajax({
    //         type: "GET",
    //         url: '<?= base_url('dashboard/cek_dokumen_warning') ?>',
    //         dataType: "JSON",
    //         success: function(response) {
    //             // spt
    //             if (response['row_spt'].sts_seumur_hidup == 2) {
    //                 $('#spt_warning').css('display', 'none');
    //             } else {
    //                 if (response['validasi_bulan_spt'] <= 2) {
    //                     modal_warning_lap_keuangan.modal('show');
    //                     $('#spt_warning').css('display', 'block');
    //                     $('#warning_spt').html(response['warning_spt']);
    //                     $('#nama_dokumen_spt').html(response['nama_dokumen_spt']);
    //                 } else {
    //                     $('#spt_warning').css('display', 'none');
    //                 }
    //             }
    //         }
    //     })
    // }
</script>
</body>

</html>