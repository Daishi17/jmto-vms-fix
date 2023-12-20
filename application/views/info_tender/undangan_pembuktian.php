<!DOCTYPE html>
<html lang="en">

<head>
    <title>KLARIFIKASI & PENILAIAN KEWAJARAN HARGA
    </title>
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
                    <label for="" style="margin-left: -90px;"><?= $rup['no_undangan'] ?></label>
                </div>
                <div class="col-md-2">
                </div>
                <div class="col-md-2">
                </div>
                <div class="col-md-2">
                    <label><?= $rup['tgl_surat_undangan'] ?></label>
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
                    <label for="" style="margin-left: -90px;"><b> Undangan Pembuktian Kualifikasi (Syarat Tambahan)</b></label>
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
                    <b>Peserta Pra Kualifikasi <?= $rup['nama_metode_pengadaan'] ?></b>
                    <br>
                    <b><?= $rup['nama_rup'] ?></b>
                    <br>
                    Di
                    <br>
                    <b>Tempat</b>
                </div>
            </div>

            <div class="row mt-5">
                <div class="col-md-12">
                    Sehubungan dengan kegiatan <?= $rup['nama_metode_pengadaan'] ?> dengan Pra Kualifikasi <b> Pengadaan <?= $rup['nama_rup'] ?>, </b> dengan ini kami mengundang Saudara untuk hadir dalam tahapan <b> Pembuktian Kualifikasi</b> yang akan diselenggarakan pada:
                </div>
            </div>

            <div class="row mt-3">
                <div class="row ml-3 mr-3" style="margin-left: 25px;">
                    <div class="col-md-1">
                        <label for="" style="margin-right: auto;">Hari/Tanggal</label>
                    </div>
                    <div class="col-md-1">
                        <label for="" style="margin-right: auto;"> :</label>
                    </div>
                    <div class="col-md-4">
                        <label for="" style="margin-left: -90px;"><?= $rup['hari_undangan'] ?> / <?= $rup['tanggal_undangan'] ?></label>
                    </div>
                </div>
                <div class="row ml-3 mr-3" style="margin-left: 25px;">
                    <div class="col-md-1">
                        <label for="" style="margin-right: auto;">Tempat</label>
                    </div>
                    <div class="col-md-1">
                        <label for="" style="margin-right: auto;"> :</label>
                    </div>
                    <div class="col-md-4">
                        <label for="" style="margin-left: -90px;">Ruang Rapat Besar Lantai 3 & 4 PT Jasamarga Tollroad Operator
                            & Video Conference Aplikasi Zoom
                        </label>
                    </div>
                </div>
                <div class="row ml-3 mr-3" style="margin-left: 25px;">
                    <div class="col-md-1">
                        <label for="" style="margin-right: auto;">Waktu</label>
                    </div>
                    <div class="col-md-1">
                        <label for="" style="margin-right: auto;"> :</label>
                    </div>
                    <div class="col-md-4">
                        <label for="" style="margin-left: -90px;">
                            <?= $rup['waktu_undangan'] ?>
                        </label>
                    </div>
                </div>

                <div class="row mt-3">
                    <div class="col-md-12">
                        Dengan ketentuan sebagai berikut :
                        <ul>
                            <li>Peserta wajib menyerahkan <b> Dokumen - Dokumen Asli</b> sesuai syarat tambahan yang diminta.</li>
                            <li><b>Bagi Peserta yang tidak hadir dalam Pembuktian Kualifikasi dan tidak menyampaikan Dokumen Asli dinyatakan GUGUR.</b></li>
                            <li>Mohon agar hadir 15 menit sebelum jadwal pembuktian masing-masing peserta.</li>
                            <li>Apabila saat pembuktian kualifikasi diwakilkan maka harus disertakan <b>Surat Kuasa</b> dari Direktur/Pimpinan Perusahaan</li>
                        </ul>
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
                        Jadwal Kegiatan Pembuktian Kualifikasi
                    </div>
                    <div class="col-md-12">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Peserta Penawaran</th>
                                    <th>Waktu</th>
                                    <th>Metode</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1;
                                foreach ($peserta as $key => $value) { ?>
                                    <tr>
                                        <td><?= $i++ ?></td>
                                        <td><b> <?= $value['nama_usaha'] ?></b></td>
                                        <td> <?= $value['wkt_undang_pembuktian'] ?></td>
                                        <td><?= $value['metode_pembuktian'] ?></td>
                                    </tr>
                                <?php } ?>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

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
</body>

</html>
<script>
    window.print();
</script>