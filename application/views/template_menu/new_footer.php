<div class="container-fluid">
    <footer class="d-flex flex-wrap justify-content-between align-items-center py-3 my-4 border-top">
        <div class="col-md-4 d-flex align-items-center">
            <a href="/" class="mb-3 me-2 mb-md-0 text-muted text-decoration-none lh-1">
                <!-- <img src="<?php echo base_url(); ?>assets/brand/bootstrap-logo.svg" alt="" width="29" height="24" class="d-inline-block align-text-top"> -->
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

                // SIUP
                var tanggal_berlaku_siup = new Date(response['row_siup'].tgl_berlaku);
                var tanggal_sekarang_siup = new Date();
                var di_suruh_update_siup = new Date().getFullYear() - 3;
                var selisih_waktu_siup = tanggal_berlaku_siup - tanggal_sekarang_siup;
                if (response['row_siup'].sts_seumur_hidup == 2) {
                    $('#siup_warning').css('display', 'none');
                } else {
                    if (selisih_waktu_siup > 0) {
                        var tahun_siup = Math.floor(selisih_waktu_siup / (1000 * 60 * 60 * 24 * 365.25));
                        var bulan_siup = Math.floor((selisih_waktu_siup % (1000 * 60 * 60 * 24 * 365.25)) / (1000 * 60 * 60 * 24 * 30.44));
                        var hari_siup = Math.floor((selisih_waktu_siup % (1000 * 60 * 60 * 24 * 30.44)) / (1000 * 60 * 60 * 24));
                        var jam_siup = Math.floor((selisih_waktu_siup % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));

                        if (tahun_siup == '') {
                            tahun_siup = ''
                        } else {
                            tahun_siup = `${tahun_siup}` + ' Tahun';
                        }
                        if (bulan_siup == '') {
                            bulan_siup = ''
                        } else {
                            bulan_siup = `${bulan_siup}` + ' Bulan';
                        }
                        if (hari_siup == '') {
                            hari_siup = ''
                        } else {
                            hari_siup = `${hari_siup}` + ' Hari';
                        }

                        if (jam_siup == '') {
                            jam_siup = ''
                        } else {
                            jam_siup = `${jam_siup}` + ' Jam';
                        }
                        var data_siup_validasi = ` ${tahun_siup} ${bulan_siup} ${hari_siup} ${jam_siup}`;
                        var data_siup_validasi_juni = ` Peringatan: Setiap Bulan Juni Harap Update Segera Dokumen Tahun ${di_suruh_update_siup} Anda !!`;
                        if (tanggal_sekarang_siup.getMonth() === 5) { // Peringatan Update Setiap Bulan Juni
                            modal_warning_dokumen.modal('show');
                            $('#siup_warning').css('display', 'block');
                            $('#nama_dokumen_siup').html(response['nama_dokumen_siup']);
                            $('#warning_siup').html(data_siup_validasi);
                            $('#warning_siup_juni').html(data_siup_validasi_juni);
                        } else {
                            modal_warning_dokumen.modal('show');
                            $('#siup_warning').css('display', 'block');
                            $('#nama_dokumen_siup').html(response['nama_dokumen_siup']);
                            $('#warning_siup').html(data_siup_validasi);
                        }
                    } else {
                        modal_warning_dokumen.modal('show');
                        $('#siup_warning').css('display', 'block');
                        $('#warning_siup').html('Masa berlaku telah kadaluarsa');
                        $('#nama_dokumen_siup').html(response['nama_dokumen_siup']);
                    }
                }


                // nib
                var tanggal_berlaku_nib = new Date(response['row_nib'].tgl_berlaku);
                var tanggal_sekarang_nib = new Date();
                var di_suruh_update_nib = new Date().getFullYear() - 3;
                var selisih_waktu_nib = tanggal_berlaku_nib - tanggal_sekarang_nib;
                if (response['row_nib'].sts_seumur_hidup == 2) {
                    $('#nib_warning').css('display', 'none');
                } else {
                    if (selisih_waktu_nib > 0) {
                        var tahun_nib = Math.floor(selisih_waktu_nib / (1000 * 60 * 60 * 24 * 365.25));
                        var bulan_nib = Math.floor((selisih_waktu_nib % (1000 * 60 * 60 * 24 * 365.25)) / (1000 * 60 * 60 * 24 * 30.44));
                        var hari_nib = Math.floor((selisih_waktu_nib % (1000 * 60 * 60 * 24 * 30.44)) / (1000 * 60 * 60 * 24));
                        var jam_nib = Math.floor((selisih_waktu_nib % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));

                        if (tahun_nib == '') {
                            tahun_nib = ''
                        } else {
                            tahun_nib = `${tahun_nib}` + ' Tahun';
                        }
                        if (bulan_nib == '') {
                            bulan_nib = ''
                        } else {
                            bulan_nib = `${bulan_nib}` + ' Bulan';
                        }
                        if (hari_nib == '') {
                            hari_nib = ''
                        } else {
                            hari_nib = `${hari_nib}` + ' Hari';
                        }

                        if (jam_nib == '') {
                            jam_nib = ''
                        } else {
                            jam_nib = `${jam_nib}` + ' Jam';
                        }
                        var data_nib_validasi = ` ${tahun_nib} ${bulan_nib} ${hari_nib} ${jam_nib}`;
                        var data_nib_validasi_juni = ` Peringatan: Setiap Bulan Juni Harap Update Segera Dokumen Tahun ${di_suruh_update_nib} Anda !!`;
                        if (tanggal_sekarang_nib.getMonth() === 5) { // Peringatan Update Setiap Bulan Juni
                            modal_warning_dokumen.modal('show');
                            $('#nib_warning').css('display', 'block');
                            $('#nama_dokumen_nib').html(response['nama_dokumen_nib']);
                            $('#warning_nib').html(data_nib_validasi);
                            $('#warning_nib_juni').html(data_nib_validasi_juni);
                        } else {
                            modal_warning_dokumen.modal('show');
                            $('#nib_warning').css('display', 'block');
                            $('#nama_dokumen_nib').html(response['nama_dokumen_nib']);
                            $('#warning_nib').html(data_nib_validasi);
                        }
                    } else {
                        modal_warning_dokumen.modal('show');
                        $('#nib_warning').css('display', 'block');
                        $('#warning_nib').html('Masa berlaku telah kadaluarsa');
                        $('#nama_dokumen_nib').html(response['nama_dokumen_nib']);
                    }
                }



                // sbu
                var tanggal_berlaku_sbu = new Date(response['row_sbu'].tgl_berlaku);
                var tanggal_sekarang_sbu = new Date();
                var di_suruh_update_sbu = new Date().getFullYear() - 3;
                var selisih_waktu_sbu = tanggal_berlaku_sbu - tanggal_sekarang_sbu;
                if (response['row_sbu'].sts_seumur_hidup == 2) {
                    $('#sbu_warning').css('display', 'none');
                } else {
                    if (selisih_waktu_sbu > 0) {
                        var tahun_sbu = Math.floor(selisih_waktu_sbu / (1000 * 60 * 60 * 24 * 365.25));
                        var bulan_sbu = Math.floor((selisih_waktu_sbu % (1000 * 60 * 60 * 24 * 365.25)) / (1000 * 60 * 60 * 24 * 30.44));
                        var hari_sbu = Math.floor((selisih_waktu_sbu % (1000 * 60 * 60 * 24 * 30.44)) / (1000 * 60 * 60 * 24));
                        var jam_sbu = Math.floor((selisih_waktu_sbu % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));

                        if (tahun_sbu == '') {
                            tahun_sbu = ''
                        } else {
                            tahun_sbu = `${tahun_sbu}` + ' Tahun';
                        }
                        if (bulan_sbu == '') {
                            bulan_sbu = ''
                        } else {
                            bulan_sbu = `${bulan_sbu}` + ' Bulan';
                        }
                        if (hari_sbu == '') {
                            hari_sbu = ''
                        } else {
                            hari_sbu = `${hari_sbu}` + ' Hari';
                        }

                        if (jam_sbu == '') {
                            jam_sbu = ''
                        } else {
                            jam_sbu = `${jam_sbu}` + ' Jam';
                        }
                        var data_sbu_validasi = ` ${tahun_sbu} ${bulan_sbu} ${hari_sbu} ${jam_sbu}`;
                        var data_sbu_validasi_juni = ` Peringatan: Setiap Bulan Juni Harap Update Segera Dokumen Tahun ${di_suruh_update_sbu} Anda !!`;
                        if (tanggal_sekarang_sbu.getMonth() === 5) { // Peringatan Update Setiap Bulan Juni
                            modal_warning_dokumen.modal('show');
                            $('#sbu_warning').css('display', 'block');
                            $('#nama_dokumen_sbu').html(response['nama_dokumen_sbu']);
                            $('#warning_sbu').html(data_sbu_validasi);
                            $('#warning_sbu_juni').html(data_sbu_validasi_juni);
                        } else {
                            modal_warning_dokumen.modal('show');
                            $('#sbu_warning').css('display', 'block');
                            $('#nama_dokumen_sbu').html(response['nama_dokumen_sbu']);
                            $('#warning_sbu').html(data_sbu_validasi);
                        }
                    } else {
                        modal_warning_dokumen.modal('show');
                        $('#sbu_warning').css('display', 'block');
                        $('#warning_sbu').html('Masa berlaku telah kadaluarsa');
                        $('#nama_dokumen_sbu').html(response['nama_dokumen_sbu']);
                    }

                }

                // akta_pendirian
                var tanggal_berlaku_akta_pendirian = new Date(response['row_akta_pendirian'].tgl_berlaku_akta);
                var tanggal_sekarang_akta_pendirian = new Date();
                var di_suruh_update_akta_pendirian = new Date().getFullYear() - 3;
                var selisih_waktu_akta_pendirian = tanggal_berlaku_akta_pendirian - tanggal_sekarang_akta_pendirian;

                if (response['row_akta_pendirian'].sts_seumur_hidup == 2) {
                    $('#akta_pendirian_warning').css('display', 'none');
                } else {

                    if (selisih_waktu_akta_pendirian > 0) {
                        var tahun_akta_pendirian = Math.floor(selisih_waktu_akta_pendirian / (1000 * 60 * 60 * 24 * 365.25));
                        var bulan_akta_pendirian = Math.floor((selisih_waktu_akta_pendirian % (1000 * 60 * 60 * 24 * 365.25)) / (1000 * 60 * 60 * 24 * 30.44));
                        var hari_akta_pendirian = Math.floor((selisih_waktu_akta_pendirian % (1000 * 60 * 60 * 24 * 30.44)) / (1000 * 60 * 60 * 24));
                        var jam_akta_pendirian = Math.floor((selisih_waktu_akta_pendirian % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));

                        if (tahun_akta_pendirian == '') {
                            tahun_akta_pendirian = ''
                        } else {
                            tahun_akta_pendirian = `${tahun_akta_pendirian}` + ' Tahun';
                        }
                        if (bulan_akta_pendirian == '') {
                            bulan_akta_pendirian = ''
                        } else {
                            bulan_akta_pendirian = `${bulan_akta_pendirian}` + ' Bulan';
                        }
                        if (hari_akta_pendirian == '') {
                            hari_akta_pendirian = ''
                        } else {
                            hari_akta_pendirian = `${hari_akta_pendirian}` + ' Hari';
                        }

                        if (jam_akta_pendirian == '') {
                            jam_akta_pendirian = ''
                        } else {
                            jam_akta_pendirian = `${jam_akta_pendirian}` + ' Jam';
                        }
                        var data_akta_pendirian_validasi = ` ${tahun_akta_pendirian} ${bulan_akta_pendirian} ${hari_akta_pendirian} ${jam_akta_pendirian}`;
                        var data_akta_pendirian_validasi_juni = ` Peringatan: Setiap Bulan Juni Harap Update Segera Dokumen Tahun ${di_suruh_update_akta_pendirian} Anda !!`;
                        if (tanggal_sekarang_akta_pendirian.getMonth() === 5) { // Peringatan Update Setiap Bulan Juni
                            modal_warning_dokumen.modal('show');
                            $('#akta_pendirian_warning').css('display', 'block');
                            $('#nama_dokumen_akta_pendirian').html(response['nama_dokumen_akta_pendirian']);
                            $('#warning_akta_pendirian').html(data_akta_pendirian_validasi);
                            $('#warning_akta_pendirian_juni').html(data_akta_pendirian_validasi_juni);
                        } else {
                            modal_warning_dokumen.modal('show');
                            $('#akta_pendirian_warning').css('display', 'block');
                            $('#nama_dokumen_akta_pendirian').html(response['nama_dokumen_akta_pendirian']);
                            $('#warning_akta_pendirian').html(data_akta_pendirian_validasi);
                        }
                    } else {
                        modal_warning_dokumen.modal('show');
                        $('#akta_pendirian_warning').css('display', 'block');
                        $('#warning_akta_pendirian').html('Masa berlaku telah kadaluarsa');
                        $('#nama_dokumen_akta_pendirian').html(response['nama_dokumen_akta_pendirian']);
                    }
                }

                // sppkp
                var tanggal_berlaku_sppkp = new Date(response['row_sppkp'].tgl_berlaku);
                var tanggal_sekarang_sppkp = new Date();
                var di_suruh_update_sppkp = new Date().getFullYear() - 3;
                var selisih_waktu_sppkp = tanggal_berlaku_sppkp - tanggal_sekarang_sppkp;

                if (response['row_sppkp'].sts_seumur_hidup == 2) {
                    $('#sppkp_warning').css('display', 'none');
                } else {
                    if (selisih_waktu_sppkp > 0) {
                        var tahun_sppkp = Math.floor(selisih_waktu_sppkp / (1000 * 60 * 60 * 24 * 365.25));
                        var bulan_sppkp = Math.floor((selisih_waktu_sppkp % (1000 * 60 * 60 * 24 * 365.25)) / (1000 * 60 * 60 * 24 * 30.44));
                        var hari_sppkp = Math.floor((selisih_waktu_sppkp % (1000 * 60 * 60 * 24 * 30.44)) / (1000 * 60 * 60 * 24));
                        var jam_sppkp = Math.floor((selisih_waktu_sppkp % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));

                        if (tahun_sppkp == '') {
                            tahun_sppkp = ''
                        } else {
                            tahun_sppkp = `${tahun_sppkp}` + ' Tahun';
                        }
                        if (bulan_sppkp == '') {
                            bulan_sppkp = ''
                        } else {
                            bulan_sppkp = `${bulan_sppkp}` + ' Bulan';
                        }
                        if (hari_sppkp == '') {
                            hari_sppkp = ''
                        } else {
                            hari_sppkp = `${hari_sppkp}` + ' Hari';
                        }

                        if (jam_sppkp == '') {
                            jam_sppkp = ''
                        } else {
                            jam_sppkp = `${jam_sppkp}` + ' Jam';
                        }
                        var data_sppkp_validasi = ` ${tahun_sppkp} ${bulan_sppkp} ${hari_sppkp} ${jam_sppkp}`;
                        var data_sppkp_validasi_juni = ` Peringatan: Setiap Bulan Juni Harap Update Segera Dokumen Tahun ${di_suruh_update_sppkp} Anda !!`;
                        if (tanggal_sekarang_sppkp.getMonth() === 5) { // Peringatan Update Setiap Bulan Juni
                            modal_warning_dokumen.modal('show');
                            $('#sppkp_warning').css('display', 'block');
                            $('#nama_dokumen_sppkp').html(response['nama_dokumen_sppkp']);
                            $('#warning_sppkp').html(data_sppkp_validasi);
                            $('#warning_sppkp_juni').html(data_sppkp_validasi_juni);
                        } else {
                            modal_warning_dokumen.modal('show');
                            $('#sppkp_warning').css('display', 'block');
                            $('#nama_dokumen_sppkp').html(response['nama_dokumen_sppkp']);
                            $('#warning_sppkp').html(data_sppkp_validasi);
                        }
                    } else {
                        modal_warning_dokumen.modal('show');
                        $('#sppkp_warning').css('display', 'block');
                        $('#warning_sppkp').html('Masa berlaku telah kadaluarsa');
                        $('#nama_dokumen_sppkp').html(response['nama_dokumen_sppkp']);
                    }
                }



                // npwp
                var tanggal_berlaku_npwp = new Date(response['row_npwp'].tgl_berlaku);
                var tanggal_sekarang_npwp = new Date();
                var di_suruh_update_npwp = new Date().getFullYear() - 3;
                var selisih_waktu_npwp = tanggal_berlaku_npwp - tanggal_sekarang_npwp;
                if (response['row_npwp'].sts_seumur_hidup == 2) {
                    $('#npwp_warning').css('display', 'none');
                } else {
                    if (selisih_waktu_npwp > 0) {
                        var tahun_npwp = Math.floor(selisih_waktu_npwp / (1000 * 60 * 60 * 24 * 365.25));
                        var bulan_npwp = Math.floor((selisih_waktu_npwp % (1000 * 60 * 60 * 24 * 365.25)) / (1000 * 60 * 60 * 24 * 30.44));
                        var hari_npwp = Math.floor((selisih_waktu_npwp % (1000 * 60 * 60 * 24 * 30.44)) / (1000 * 60 * 60 * 24));
                        var jam_npwp = Math.floor((selisih_waktu_npwp % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));

                        if (tahun_npwp == '') {
                            tahun_npwp = ''
                        } else {
                            tahun_npwp = `${tahun_npwp}` + ' Tahun';
                        }
                        if (bulan_npwp == '') {
                            bulan_npwp = ''
                        } else {
                            bulan_npwp = `${bulan_npwp}` + ' Bulan';
                        }
                        if (hari_npwp == '') {
                            hari_npwp = ''
                        } else {
                            hari_npwp = `${hari_npwp}` + ' Hari';
                        }

                        if (jam_npwp == '') {
                            jam_npwp = ''
                        } else {
                            jam_npwp = `${jam_npwp}` + ' Jam';
                        }
                        var data_npwp_validasi = ` ${tahun_npwp} ${bulan_npwp} ${hari_npwp} ${jam_npwp}`;
                        var data_npwp_validasi_juni = ` Peringatan: Setiap Bulan Juni Harap Update Segera Dokumen Tahun ${di_suruh_update_npwp} Anda !!`;

                        if (tanggal_sekarang_npwp.getMonth() === 5) { // Peringatan Update Setiap Bulan Juni
                            modal_warning_dokumen.modal('show');
                            $('#npwp_warning').css('display', 'block');
                            $('#nama_dokumen_npwp').html(response['nama_dokumen_npwp']);
                            $('#warning_npwp').html(data_npwp_validasi);
                            $('#warning_npwp_juni').html(data_npwp_validasi_juni);
                        } else {
                            modal_warning_dokumen.modal('show');
                            $('#npwp_warning').css('display', 'block');
                            $('#nama_dokumen_npwp').html(response['nama_dokumen_npwp']);
                            $('#warning_npwp').html(data_npwp_validasi);
                        }
                    } else {
                        modal_warning_dokumen.modal('show');
                        $('#npwp_warning').css('display', 'block');
                        $('#warning_npwp').html('Masa berlaku telah kadaluarsa');
                        $('#nama_dokumen_npwp').html(response['nama_dokumen_npwp']);
                    }
                }
            }
        })
    }
</script>
</body>

</html>