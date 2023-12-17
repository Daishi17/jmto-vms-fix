<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="print.css" type="text/css" media="print" />
    <title>JMTO - VMS</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/fontawesome-free/css/all.min.css">
    <link href="<?php echo base_url(); ?>assets/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- DataTables -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins-lte/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins-lte/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins-lte/datatables-buttons/css/buttons.bootstrap4.min.css">

    <!-- Styles -->
    <link rel="shortcut icon" href="<?php echo base_url(); ?>//assets/brand/jm1.png" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme@1.3.0/dist/select2-bootstrap-5-theme.min.css" />
    <!-- Or for RTL support -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme@1.3.0/dist/select2-bootstrap-5-theme.rtl.min.css" />


    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <meta name="theme-color" content="#7952b3">
    <?php
    function tgl_indo($tanggal)
    {
        $bulan = array(
            1 => 'Januari',
            'Februari',
            'Maret',
            'April',
            'Mei',
            'Juni',
            'Juli',
            'Agustus',
            'September',
            'Oktober',
            'November',
            'Desember'
        );
        $hari = array(
            1 => 'Senin',
            'Selasa',
            'Rabu',
            'Kamis',
            'Jumat',
            'Sabtu',
            'Minggu'
        );
        $pecahkan = explode('-', $tanggal);

        // Contoh tanggal 20 Maret 2016 adalah hari Minggu
        $num = date(
            'N',
            strtotime($tanggal)
        );
        return $pecahkan[2]  . '-' . $bulan[(int) $pecahkan[1]] . '-' . $pecahkan[0];
    }
    ?>




    <!-- Custom styles for this template -->
    <!-- <link href="headers.css" rel="stylesheet"> -->
</head>

<body style="font-size: 13px;">
    <div class="container mt-5">
        <img class="pull-right" alt="LOGO" src="<?= base_url() ?>assets/img/logo_asli.png" width="30%" />
        <div class="container-fluid">
            <div class="row ml-3 mr-3">
                <div class="col-md-2">

                </div>
                <div class="col-md-8">
                    <center>
                        BERITA ACARA HASIL EVALUASI
                        PRAKUALIFIKASI PESERTA TENDER UMUM
                        PENGADAAN PEKERJAAN JASA PENGEMUDI SHUTTLE RUAS JABOTABEKDUNG, JAWA TENGAH DAN JAWA TIMUR PT JASAMARGA TOLLROAD OPERATOR
                    </center>
                </div>
                <div class="col-md-2">
                </div>
            </div>
            <hr>
            <div class="row ml-3 mr-3 mt-4">
                <center>
                    <div class="col-md-4">
                        <label for="" style="margin-right: auto;">Nomor : 458/BA-JMTO/VII/2023</label>
                    </div>
                </center>
            </div>
            <div class="row ml-3 mr-3 mt-3">
                <div class="col-md-12">
                    <label for="" style="margin-right: auto;">Pada hari ini Jumat, tanggal Dua puluh satu, bulan Juli, tahun Dua Ribu Dua Puluh Tiga (21-07-2023), Panitia Pengadaan telah mengadakan Rapat Evaluasi Prakualifikasi Peserta Tender Umum dengan hasil-hasil sebagai berikut:</label>
                </div>
            </div>

            <div class="row ml-3 mr-3 mt-3">
                <div class="col-md-12">
                    <label for="" style="margin-right: auto;">1. Jumlah Perusahaan yang mendaftar dan mengambil Dokumen Prakualifikasi sebanyak 15 (Lima belas) Perusahaan, yaitu:</label>
                    <div class="row">
                        <div class="col-md-6">
                            1. PT Zeta Karya Cigs <br>
                            2. PT Semanggi Tiga <br>
                            3. PT Labora Duta Anugrah <br>
                            4. PT Symphony Sistem Solusi <br>
                            5. PT Kartika Citra Nusantara <br>
                            6. PT Sierra Solutions Indonesia <br>
                            7. PT Pelita Adhidaya Servindo <br>
                            8. PT Synergy Cakra Buana <br>
                            9. PT Dapensi Trio Usaha
                        </div>
                        <div class="col-md-6">
                            10. PT Zeta Karya Cigs <br>
                            11. PT Semanggi Tiga <br>
                            12. PT Labora Duta Anugrah <br>
                            13. PT Symphony Sistem Solusi <br>
                            14. PT Kartika Citra Nusantara <br>
                            15. PT Sierra Solutions Indonesia <br>
                            16. PT Pelita Adhidaya Servindo <br>
                            17. PT Synergy Cakra Buana <br>
                            18. PT Dapensi Trio Usaha
                        </div>
                    </div>
                </div>
            </div>

            <div class="row ml-3 mr-3 mt-3">
                <div class="col-md-12">
                    <label for="" style="margin-right: auto;">2. Perusahaan yang mengembalikan dan memasukan Dokumen Prakualifikasi adalah sebanyak 9 (Sembilan) Perusahaan, yaitu:</label>
                    <div class="row">
                        <div class="col-md-6">
                            1. PT Semanggi Tiga <br>
                            2. PT Symphony Sistem Solusi <br>
                            3. PT Kartika Citra Nusantara <br>
                            4. PT Pelita Adhidaya Servindo <br>
                            5. PT Dapensi Trio Usaha <br>
                            6. PT Batanghari <br>
                            7. PT ISS Indonesia <br>
                            8. PT Citra Persada Infrastruk <br>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row ml-3 mr-3 mt-3">
                <div class="col-md-12">
                    <label for="" style="margin-right: auto;">3. Panitia Pengadaan melakukan evaluasi terhadap Dokumen Prakualifikasi yang masuk, meliputi aspek administrasi, keuangan dan teknis. <br>
                        Setelah melakukan evaluasi, Panitia Pengadaan sepakat menilai dan menetapkan bahwa Perusahaan yang memenuhi persyaratan Prakualifikasi adalah sebanyak 4 (Empat) Perusahaan, yaitu:
                    </label>
                    <div class="row">
                        <div class="col-md-6">
                            1. PT Semanggi Tiga <br>
                            2. PT Symphony Sistem Solusi <br>
                            3. PT Kartika Citra Nusantara <br>
                            4. PT Pelita Adhidaya Servindo <br>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row ml-3 mr-3 mt-3">
                <div class="col-md-12">
                    <label for="" style="margin-right: auto;">4. Hasil Evaluasi Prakualifikasi Peserta Tender Umum tertuang dalam Lampiran Berita Acara ini.
                        Demikian Berita Acara Evaluasi Prakualifikasi Peserta Tender Umum Pengadaan Pekerjaan Jasa Pengemudi Shuttle Ruas Jabotabekdung, Jawa Tengah dan Jawa Timur PT Jasamarga Tollroad Operator ini dibuat untuk dapat dipergunakan sebagaimana mestinya.

                    </label>
                    <div class="row">
                        <div class="col-md-6">
                            1. PT Semanggi Tiga <br>
                            2. PT Symphony Sistem Solusi <br>
                            3. PT Kartika Citra Nusantara <br>
                            4. PT Pelita Adhidaya Servindo <br>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row ml-3 mr-3 mt-3">
                <div class="col-md-12">
                    <label for="" style="margin-right: auto;">Hasil Evaluasi Prakualifikasi Peserta Tender Umum tertuang dalam Lampiran Berita Acara ini.
                        Demikian Berita Acara Evaluasi Prakualifikasi Peserta Tender Umum Pengadaan Pekerjaan Jasa Pengemudi Shuttle Ruas Jabotabekdung, Jawa Tengah dan Jawa Timur PT Jasamarga Tollroad Operator ini dibuat untuk dapat dipergunakan sebagaimana mestinya.
                    </label>
                    <div class="row">
                        <div class="col-md-6">
                            1. PT Semanggi Tiga <br>
                            2. PT Symphony Sistem Solusi <br>
                            3. PT Kartika Citra Nusantara <br>
                            4. PT Pelita Adhidaya Servindo <br>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row ml-3 mr-3 mt-3">
                <div class="col-md-12">
                    <label for="" style="margin-right: auto;">
                        PANITIA <?= $rup['nama_rup'] ?>
                    </label>
                    <div class="row">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Jabatan</th>
                                    <th>Tanda Tangan</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1;
                                foreach ($data_panitia as $key => $value) { ?>
                                    <tr>
                                        <td scope="row"><?= $no++ ?></td>
                                        <td><?= $value['nama_pegawai'] ?></td>
                                        <?php if ($value['role_panitia'] == 1) { ?>
                                            <td>Ketua</td>
                                        <?php } else if ($value['role_panitia'] == 2) { ?>
                                            <td>Sekertaris</td>
                                        <?php } else { ?>
                                            <td>Anggota</td>
                                        <?php } ?>
                                        <td><label for="" class="badge bg-success">Sah</label></td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

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

    // setTimeout(() => {
    //     window.print()
    // }, 2000);
</script>
</body>

</html>