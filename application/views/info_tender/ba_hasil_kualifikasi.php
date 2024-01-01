<!DOCTYPE html>
<html lang="en">

<head>
    <title>Undangan Pembuktian</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="print.css" type="text/css" media="print" />
    <link rel="Shortcut Icon" href="https://eproc.jmtm.co.id/assets/img/unnamed.png" type="image/x-icon" sizes="96x96" />
    <link rel="stylesheet" href="https://eproc.jmtm.co.id/assets/boostrapnew/dist/css/bootstrap.min.css" type="text/css" media="all" />
    <!-- dataTables -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://eproc.jmtm.co.id/assets/fontawesome/css/all.min.css" rel="stylesheet" type="text/css" media="all">

    <!-- select2 -->
    <link rel="stylesheet" href="https://eproc.jmtm.co.id/assets/plugins/select2/css/select2.min.css">
    <link rel="stylesheet" href="https://eproc.jmtm.co.id/assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css" media="all">
    <!-- custom -->
    <!-- Sweetalert-->
    <link href="https://eproc.jmtm.co.id/assets/sweetalert2/sweetalert2.min.css" rel="stylesheet" media="all">
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/css/bootstrap-datepicker.min.css"> -->
    <link href="https://eproc.jmtm.co.id/assets/datetimepicekernew/plugins/jquery.datetimepicker.min.css" rel="stylesheet" media="all">
    <script src="https://eproc.jmtm.co.id/assets/js/sweetalert.min.js" media="all"></script>

    <script type="text/javascript" src="https://eproc.jmtm.co.id/assets/boostrapnew/dist/js/jquery.min.js" media="all"></script>

</head>

<?php
function tgl_indo($tanggal)
{
    $bulan = array(
        1 =>   'Januari',
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
    $pecahkan = explode('-', $tanggal);

    // variabel pecahkan 0 = tanggal
    // variabel pecahkan 1 = bulan
    // variabel pecahkan 2 = tahun

    return $pecahkan[2] . ' ' . $bulan[(int) $pecahkan[1]] . ' ' . $pecahkan[0];
} ?>

<?php
function bln_indo($bulan)
{
    if ($bulan == '01') {
        echo 'Januari';
    } else if ($bulan == '02') {
        echo 'Februari';
    } else if ($bulan == '03') {
        echo 'Maret';
    } else if ($bulan == '04') {
        echo 'April';
    } else if ($bulan == '05') {
        echo 'Mei';
    } else if ($bulan == '06') {
        echo 'Juni';
    } else if ($bulan == '07') {
        echo 'Juli';
    } else if ($bulan == '08') {
        echo 'Agustus';
    } else if ($bulan == '09') {
        echo 'September';
    } else if ($bulan == '11') {
        echo 'November';
    } else if ($bulan == '12') {
        echo 'Desember';
    }
}

function penyebut($nilai)
{
    $nilai = abs($nilai);
    $huruf = array("", "satu", "dua", "tiga", "empat", "lima", "enam", "tujuh", "delapan", "sembilan", "sepuluh", "sebelas");
    $temp = "";
    if ($nilai < 12) {
        $temp = " " . $huruf[$nilai];
    } else if ($nilai < 20) {
        $temp = penyebut($nilai - 10) . " belas";
    } else if ($nilai < 100) {
        $temp = penyebut($nilai / 10) . " puluh" . penyebut($nilai % 10);
    } else if ($nilai < 200) {
        $temp = " seratus" . penyebut($nilai - 100);
    } else if ($nilai < 1000) {
        $temp = penyebut($nilai / 100) . " ratus" . penyebut($nilai % 100);
    } else if ($nilai < 2000) {
        $temp = " seribu" . penyebut($nilai - 1000);
    } else if ($nilai < 1000000) {
        $temp = penyebut($nilai / 1000) . " ribu" . penyebut($nilai % 1000);
    } else if ($nilai < 1000000000) {
        $temp = penyebut($nilai / 1000000) . " juta" . penyebut($nilai % 1000000);
    } else if ($nilai < 1000000000000) {
        $temp = penyebut($nilai / 1000000000) . " milyar" . penyebut(fmod($nilai, 1000000000));
    } else if ($nilai < 1000000000000000) {
        $temp = penyebut($nilai / 1000000000000) . " trilyun" . penyebut(fmod($nilai, 1000000000000));
    }
    return $temp;
}

function terbilang($nilai)
{
    if ($nilai < 0) {
        $hasil = "minus " . trim(penyebut($nilai));
    } else {
        $hasil = trim(penyebut($nilai));
    }
    return $hasil;
}
?>
</head>

<body style="font-size: 18px;">
    <div class="container">
        <img class="pull-right" alt="LOGO" src="<?= base_url() ?>assets/logo_ba/logo_ba.png" width="50%" style="opacity: 0.5;" />
        <div class="container-fluid">
            <table>
                <tr>
                    <td width="100px">Nomor</td>
                    <th>&ensp;&ensp;:&ensp;&ensp;</th>
                    <td><?= $rup['no_pengumuman_hasil_kualifikasi'] ?></td>
                </tr>
            </table>
            <table>
                <tr>
                    <td width="100px">Hal</td>
                    <th>&ensp;&ensp;:&ensp;&ensp;</th>
                    <td>Pengumuman Hasil Evaluasi Kualifikasi</td>
                </tr>
            </table>
            <table>
                <tr>
                    <td width="100px">Lampiran</td>
                    <th>&ensp;&ensp;:&ensp;&ensp;</th>
                    <td>1 (satu) Lembar</td>
                </tr>
            </table>

            <div class="float-right">
                Jakarta, <?= $rup['tanggal_pengumuman_hasil_kualifikasi'] ?>
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


            <br>
            Dengan Hormat
            <br><br>
            <p>
                Sehubungan dengan Tahapan kegiatan <b> <?= $rup['metode_kualifikasi'] ?></b> <?= $rup['nama_metode_pengadaan'] ?> <?= $rup['nama_rup'] ?>, dengan ini kami sampaikan Hasil Evaluasi Kualifikasi sebagaimana terlampir dalam surat ini.
            </p>
            <br>
            <p>
                Selanjutnya Peserta yang dapat mengikuti kegiatan Penawaran adalah Peserta yang dinyatakan Lulus.
            </p>
            <p>
                Adapun Jadwal kegiatan Penawaran adalah sebagai berikut :
            </p>


            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Kegiatan</th>
                        <th>Tanggal dan Waktu</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1. </td>
                        <td>Sanggahan Prakualifikasi</td>
                        <td>
                            <div class="row">
                                <div class="col-md-5">
                                    <!-- <?= $rup['hari_isi_pengumuman_hasil_kualifikasi_mulai'] ?>, <?= $rup['tanggal_isi_pengumuman_hasil_kualifikasi_mulai'] ?>
                                                <br>
                                                <?= $rup['pukul_isi_pengumuman_hasil_kualifikasi_mulai'] ?> -->
                                    <?= date('d-m-Y H:i', strtotime($jadwal_masa_sanggah_kualifikasi['waktu_mulai'])) ?>
                                    &ensp;
                                    S/D
                                    &ensp;
                                    <?= date('d-m-Y H:i', strtotime($jadwal_masa_sanggah_kualifikasi['waktu_selesai'])) ?>
                                </div>
                                <div class="col-md-1">

                                </div>
                                <div class="col-md-5">
                                    <!-- <?= $rup['hari_isi_pengumuman_hasil_kualifikasi_selesai'] ?>, <?= $rup['tanggal_isi_pengumuman_hasil_kualifikasi_selesai'] ?>
                                                <br>
                                                <?= $rup['pukul_isi_pengumuman_hasil_kualifikasi_selesai'] ?> -->

                                </div>
                            </div>

                        </td>
                    </tr>

                    <tr>
                        <td>2. </td>
                        <td>Rapat Penjelasan dan Download Dokumen Pengadaan</td>
                        <td><?= date('d-m-Y H:i', strtotime($jadwal_download_dokumen_pengadaan['waktu_mulai'])) ?> &ensp; S/D &ensp;<?= date('d-m-Y H:i', strtotime($jadwal_download_dokumen_pengadaan['waktu_selesai'])) ?></td>
                    </tr>

                </tbody>
            </table>

            <p>Demikian kami sampaikan, atas perhatian Saudara, diucapkan terima kasih.</p>

            <label for="">PT Jasamarga Tollroad Operator</label>
            <br>
            <br>
            <br>
            TTD
            <br>
            <br>
            <br>
            <label for="">Panitia Pengadaan</label>
            <br>
            <br>
            Catatan : <br>
            • Apabila ada perubahan waktu akan diberitahukan kemudian <br>
            • Jika ada hal yang kurang jelas dapat menghubungi (021) 22984722.
            <br>
            <br>
            <br> <br>
            <br>
            <br> <br>
            <br>
            <br> <br>
            <br>
            <br>
            <div class="float-left">
                <img src="<?= base_url('assets/logo_ba/logo_ba2.png') ?>" alt="logo" width="30%" style="opacity: 0.5;">
            </div>
            <br>
            <br>
            <center>
                <label for="" style="text-transform:uppercase"> LAMPIRAN HASIL EVALUASI KUALIFIKASI <?= $rup['nama_metode_pengadaan'] ?>
                    <?= $rup['nama_rup'] ?> </label>
            </center>


            <div class="row mt-1">
                <div class="row mt-1">
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


<!-- Jquery -->
<!-- Bootstrap -->
<script type="text/javascript" src="https://eproc.jmtm.co.id/assets/boostrapnew/dist/js/bootstrap.min.js" media="all"></script>
<!-- dataTables -->
<script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js" media="all"></script>
<!-- select2 -->
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js" media="all"></script>

<!-- custom js -->
<script type="text/javascript" src="https://eproc.jmtm.co.id/assets/kintek.js" media="all"></script>

<!-- datepicker -->
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/js/bootstrap-datepicker.min.js" integrity="sha512-ZrigzIl5MysuwHc2LaGI+uOLnLDdyYUth+pA5OuJC++WEleiYrztIc7nU/iBRWeP+ufmSGepuJULdgh/K0rIAA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script> -->
<script media="all" type="text/javascript" src="https://eproc.jmtm.co.id/assets/datetimepicekernew/plugins/jquery.datetimepicker.full.min.js"></script>

<script>
    function update_time_login() {
        $.ajax({
            url: '<?= base_url('auth/update_time') ?>',
            type: 'post',
            success: () => {

            }
        })
    }

    setTimeout(() => {
        window.print()
    }, 2000);
</script>
</body>

</html>