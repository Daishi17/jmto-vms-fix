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
                <div class="col-md-1">
                    <label for="" style="margin-right: auto;">Nomor</label>
                </div>
                <div class="col-md-1">
                    <label for="" style="margin-right: auto;"> :</label>
                </div>
                <div class="col-md-4">
                    <label for="" style="margin-left: -90px;"><?= $rup['no_pengumuman_hasil_kualifikasi'] ?></label>
                </div>
                <div class="col-md-2">
                </div>
                <div class="col-md-2">
                </div>
                <div class="col-md-2">
                    <label><?= $rup['tanggal_pengumuman_hasil_kualifikasi'] ?></label>
                </div>
            </div>
            <div class="row ml-3 mr-3">
                <div class="col-md-1">
                    <label for="" style="margin-right: auto;">Hal</label>
                </div>
                <div class="col-md-1">
                    <label for="" style="margin-right: auto;"> :</label>
                </div>
                <div class="col-md-4">
                    <label for="" style="margin-left: -90px;"><b> Pengumuman Hasil Evaluasi Kualifikasi</b></label>
                </div>
            </div>
            <div class="row ml-3 mr-3">
                <div class="col-md-1">
                    <label for="" style="margin-right: auto;">Lampiran</label>
                </div>
                <div class="col-md-1">
                    <label for="" style="margin-right: auto;"> :</label>
                </div>
                <div class="col-md-4">
                    <label for="" style="margin-left: -90px;">1 (satu) Lembar</label>
                </div>
            </div>

            <div class="row mt-5">
                <div class="col-md-8">
                    <b>Kepada Yth.</b>
                    <br>
                    <b>Peserta <?= $rup['metode_kualifikasi'] ?> <?= $rup['nama_metode_pengadaan'] ?></b>
                    <br>
                    <b><?= $rup['nama_rup'] ?></b>
                    <br>
                    Di
                    <br>
                    <b>Tempat</b>
                </div>
            </div>

            <div class="row mt-5">
                <br>
                Dengan Hormat
                <br><br>
                <div class="mt-3 col-md-12">
                    Sehubungan dengan Tahapan kegiatan <?= $rup['metode_kualifikasi'] ?> <?= $rup['nama_metode_pengadaan'] ?> <?= $rup['nama_rup'] ?>, dengan ini kami sampaikan Hasil Evaluasi Kualifikasi sebagaimana terlampir dalam surat ini.
                </div>
                <br>
                <div class="mt-3 col-md-12">
                    Selanjutnya Peserta yang dapat mengikuti kegiatan Penawaran adalah Peserta yang dinyatakan Lulus.
                </div>
                <div class="mt-3 col-md-12">
                    Adapun Jadwal kegiatan Penawaran adalah sebagai berikut :
                </div>
            </div>

            <div class="row mt-3">
                <div class="row mt-3">
                    <div class="col-md-12">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Kegiatan</th>
                                    <th>Hari/Tanggal dan Waktu</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1. </td>
                                    <td>Sanggahan Prakualifikasi</td>
                                    <td>
                                        <div class="row">
                                            <div class="col-md-5">
                                                <?= $rup['hari_isi_pengumuman_hasil_kualifikasi_mulai'] ?>, <?= $rup['tanggal_isi_pengumuman_hasil_kualifikasi_mulai'] ?>
                                                <br>
                                                <?= $rup['pukul_isi_pengumuman_hasil_kualifikasi_mulai'] ?>
                                            </div>
                                            <div class="col-md-2">
                                                SD
                                            </div>
                                            <div class="col-md-5">
                                                <?= $rup['hari_isi_pengumuman_hasil_kualifikasi_selesai'] ?>, <?= $rup['tanggal_isi_pengumuman_hasil_kualifikasi_selesai'] ?>
                                                <br>
                                                <?= $rup['pukul_isi_pengumuman_hasil_kualifikasi_selesai'] ?>
                                            </div>
                                        </div>

                                    </td>
                                </tr>

                                <tr>
                                    <td>2. </td>
                                    <td>Konfirmasi Pembelian Dokumen Pengadaan & Rapat Penjelasan Pekerjaan</td>
                                    <td>Akan dikirimkan undangan Penawaran kepada Peserta yang dinyatakan Lulus Kualifikasi melalui e-mail</td>
                                </tr>

                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="row mt-4">
                    <div class="col-md-12">
                        Demikian kami sampaikan, atas perhatian Saudara, diucapkan terima kasih.
                    </div>
                </div>

                <div class="row mt-4">
                    <div class="col-md-12">
                        <b> PT Jasamarga Tollroad Operator</b>
                    </div>
                </div>
                <div class="row mt-4">
                    <div class="col-md-12">
                        TTD
                    </div>
                </div>
                <div class="row mt-4">
                    <div class="col-md-12">
                        <b> Panitia Pengadaan</b>
                    </div>
                </div>

                <div class="row mt-4">
                    <div class="col-md-12">
                        Catatan : <br>
                        • Apabila ada perubahan waktu akan diberitahukan kemudian <br>
                        • Jika ada hal yang kurang jelas dapat menghubungi (021) 22984722.
                    </div>
                </div>




                <div class="row mt-4">
                    <div class="mt-4 mb-5 col-md-12">
                        <center>
                            <label for="" style="text-transform:uppercase"> LAMPIRAN HASIL EVALUASI KUALIFIKASI <?= $rup['nama_metode_pengadaan'] ?>
                                <?= $rup['nama_rup'] ?> </label>
                        </center>
                    </div>
                    <div class="col-md-12">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Perusahaan </th>
                                    <th>Evaluasi Administrasi</th>
                                    <th>Evaluasi Keuangan</th>
                                    <th>Evaluasi Teknis</th>
                                    <th>Evaluasi Akhir</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1;
                                foreach ($data_evaluasi as $key => $value) { ?>
                                    <?php
                                    $this->db->select('*');
                                    $this->db->from('tbl_vendor_syarat_tambahan');
                                    $this->db->where('tbl_vendor_syarat_tambahan.id_rup', $value['id_rup']);
                                    $this->db->where('tbl_vendor_syarat_tambahan.id_vendor', $value['id_vendor']);
                                    $this->db->where('tbl_vendor_syarat_tambahan.status', 1);
                                    $cek_valid_vendor =  $this->db->count_all_results();
                                    ?>
                                    <tr>
                                        <td><?= $i++ ?></td>
                                        <td><?= $value['nama_usaha'] ?></td>
                                        <td>
                                            <?php if ($cek_valid_vendor >= $hitung_syarat) {
                                                $sts_administrasi =  '<span class="badge bg-success">Lulus</span>';
                                            } else {
                                                $sts_administrasi =  '<span class="badge bg-danger">Gugur</span>';
                                            } ?>
                                            <label for=""><?= $sts_administrasi ?></label>
                                        </td>
                                        <td>
                                            <?php  // nilai keuangan
                                            if ($cek_valid_vendor >= $hitung_syarat) {
                                                if ($value['ev_keuangan'] == NULL) {
                                                    $nilai_keuangan = '00.00';
                                                    $nilai_keuangan = '<span class="badge bg-secondary bg-sm">Tidak Dievaluasi</span>';
                                                } else {
                                                    if ($value['ev_keuangan'] >= 60) {
                                                        $nilai_keuangan = number_format($value['ev_keuangan'], 2, ',', '.');
                                                        $nilai_keuangan = '<span class="badge bg-success bg-sm">Lulus</span>';
                                                    } else {
                                                        $nilai_keuangan = number_format($value['ev_keuangan'], 2, ',', '.');
                                                        $nilai_keuangan = '<span class="badge bg-danger bg-sm">Gugur</span>';
                                                    }
                                                }
                                            } else {
                                                if ($value['ev_keuangan'] == NULL) {
                                                    $nilai_keuangan = '00.00';
                                                    $nilai_keuangan = '<span class="badge bg-secondary bg-sm">Tidak Dievaluasi</span>';
                                                } else {
                                                    if ($value['ev_keuangan'] >= 60) {
                                                        $nilai_keuangan = number_format($value['ev_keuangan'], 2, ',', '.');
                                                        $nilai_keuangan = '<span class="badge bg-success bg-sm">Lulus</span>';
                                                    } else {
                                                        $nilai_keuangan = number_format($value['ev_keuangan'], 2, ',', '.');
                                                        $nilai_keuangan = '<span class="badge bg-danger bg-sm">Gugur</span>';
                                                    }
                                                }
                                            } ?>
                                            <label for=""><?= $nilai_keuangan ?></label>
                                        </td>
                                        <td>
                                            <?php
                                            if ($cek_valid_vendor >= $hitung_syarat) {
                                                if ($value['ev_teknis'] == NULL) {
                                                    $nilai_teknis = '00.00';
                                                    $nilai_teknis = '<span class="badge bg-secondary bg-sm">Tidak Dievaluasi</span>';
                                                } else {
                                                    if ($value['ev_teknis'] >= 60) {
                                                        $nilai_teknis = number_format($value['ev_teknis'], 2, ',', '.');
                                                        $nilai_teknis = '<span class="badge bg-success bg-sm">Lulus</span>';
                                                    } else {
                                                        $nilai_teknis = number_format($value['ev_teknis'], 2, ',', '.');
                                                        $nilai_teknis = '<span class="badge bg-danger bg-sm">Gugur</span>';
                                                    }
                                                }
                                            } else {
                                                if ($value['ev_teknis'] == NULL) {
                                                    $nilai_teknis = '00.00';
                                                    $nilai_teknis = '<span class="badge bg-secondary bg-sm">Tidak Dievaluasi</span>';
                                                } else {
                                                    if ($value['ev_teknis'] >= 60) {
                                                        $nilai_teknis = number_format($value['ev_teknis'], 2, ',', '.');
                                                        $nilai_teknis = '<span class="badge bg-success bg-sm">Lulus</span>';
                                                    } else {
                                                        $nilai_teknis = number_format($value['ev_teknis'], 2, ',', '.');
                                                        $nilai_teknis = '<span class="badge bg-danger bg-sm">Gugur</span>';
                                                    }
                                                }
                                            } ?>
                                            <label for=""><?= $nilai_teknis ?></label>
                                        </td>
                                        <td>
                                            <?php if ($cek_valid_vendor >= $hitung_syarat) {
                                                if ($value['ev_kualifikasi_akhir'] == NULL) {
                                                    $nilai_akhir = '00.00';
                                                    $nilai_akhir = '<span class="badge bg-secondary bg-sm">Tidak Dievaluasi</span>';
                                                } else {
                                                    if ($value['ev_kualifikasi_akhir'] >= 60) {
                                                        $nilai_akhir = number_format($value['ev_kualifikasi_akhir'], 2, ',', '.');
                                                        $nilai_akhir = '<span class="badge bg-success bg-sm">Lulus</span>';
                                                    } else {
                                                        $nilai_akhir = number_format($value['ev_kualifikasi_akhir'], 2, ',', '.');
                                                        $nilai_akhir = '<span class="badge bg-danger bg-sm">Gugur</span>';
                                                    }
                                                }
                                            } else {
                                                if ($value['ev_kualifikasi_akhir'] == NULL) {
                                                    $nilai_akhir = '00.00';
                                                    $nilai_akhir = '<span class="badge bg-secondary bg-sm">Tidak Dievaluasi</span>';
                                                } else {
                                                    if ($value['ev_kualifikasi_akhir'] >= 60) {
                                                        $nilai_akhir = number_format($value['ev_kualifikasi_akhir'], 2, ',', '.');
                                                        $nilai_akhir = '<span class="badge bg-success bg-sm">Lulus</span>';
                                                    } else {
                                                        $nilai_akhir = number_format($value['ev_kualifikasi_akhir'], 2, ',', '.');
                                                        $nilai_akhir = '<span class="badge bg-danger bg-sm">Gugur</span>';
                                                    }
                                                }
                                            }
                                            ?>
                                            <label for=""><?= $nilai_akhir ?></label>
                                        </td>
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