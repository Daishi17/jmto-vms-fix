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


<body style="font-size: 18px; text-align:justify">
    <div class="container">
        <img class="pull-right" alt="LOGO" src="<?= base_url() ?>assets/logo_ba/logo_ba.png" width="50%" style="opacity: 0.5;" />
        <div class="container-fluid">
            <table>
                <tr>
                    <td width="100px">Nomor</td>
                    <th>&ensp;&ensp;:&ensp;&ensp;</th>
                    <td><?= $rup['no_undangan'] ?></td>
                </tr>
            </table>
            <table>
                <tr>
                    <td width="100px">Hal</td>
                    <th>&ensp;&ensp;:&ensp;&ensp;</th>
                    <td>Undangan Pembuktian Kualifikasi (Syarat Tambahan)</td>
                </tr>
            </table>
            <table>
                <tr>
                    <td width="100px">Lampiran</td>
                    <th>&ensp;&ensp;:&ensp;&ensp;</th>
                    <td>1 (satu) Lembar</td>
                </tr>
            </table>

            <div class="row mt-5">
                <div class="col-md-8">
                    <b>Kepada Yth.</b>
                    <br>
                    <b>Peserta Pra Kualifikasi <?= $rup['nama_metode_pengadaan'] ?></b>
                    <br>
                    <b><?= $rup['nama_rup'] ?></b>
                    <br>
                    Di
                    <b>Tempat</b>
                </div>
            </div>
            <br>
            <br>
            <p> Sehubungan dengan kegiatan <?= $rup['nama_metode_pengadaan'] ?> dengan Pra Kualifikasi <b> Pengadaan <?= $rup['nama_rup'] ?>, </b> dengan ini kami mengundang Saudara untuk hadir dalam tahapan <b> Pembuktian Kualifikasi</b> yang akan diselenggarakan pada:</p>

            <table>
                <tr>
                    <td width="100px">Hari/Tanggal</td>
                    <th>&ensp;&ensp;:&ensp;&ensp;</th>
                    <td> <?= $rup['hari_undangan'] ?> / <?= $rup['tanggal_undangan'] ?></td>
                </tr>
            </table>

            <table>
                <tr>
                    <td width="100px">Tempat</td>
                    <th>&ensp;&ensp;:&ensp;&ensp;</th>
                    <td>
                        Ruang Rapat Besar Lantai 3 & 4 PT Jasamarga Tollroad Operator (Jika Offline)
                        <br>
                        Video Conference Aplikasi Zoom (Jika Online)
                    </td>
                </tr>
            </table>


            <table>
                <tr>
                    <td width="100px">Waktu</td>
                    <th>&ensp;&ensp;:&ensp;&ensp;</th>
                    <td> <?= $rup['waktu_undangan'] ?></td>
                </tr>
            </table>

            <br>
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

            <br><br>
            <h6>PT Jasamarga Tollroad Operator</h6>
            <br>
            <br>
            <h6>
                TTD
            </h6>
            <br><br>
            <h6> <u style="text-transform: capitalize;"></u></h6>
            <h6>Panitia</h6>
            <!-- <div class="row mt-4">
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
            </div> -->

            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <div class="float-left">
                <img src="<?= base_url('assets/logo_ba/logo_ba2.png') ?>" alt="logo" width="30%" style="opacity: 0.5;">
            </div>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <div class="row mt-4">
                <div class="col-md-12">
                    Jadwal Kegiatan Pembuktian Kualifikasi
                </div>
                <div class="col-md-12">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th class="text-center">No</th>
                                <th class="text-center">Peserta Penawaran</th>
                                <th class="text-center">Waktu</th>
                                <th class="text-center">Metode</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1;
                            foreach ($peserta as $key => $value) { ?>
                                <tr>
                                    <td class="text-center"><?= $i++ ?></td>
                                    <td><b> <?= $value['nama_usaha'] ?></b></td>
                                    <td class="text-center"> <?= $value['wkt_undang_pembuktian'] ?></td>
                                    <td class="text-center"><?= $value['metode_pembuktian'] ?></td>
                                </tr>
                            <?php } ?>

                        </tbody>
                    </table>
                </div>
            </div>

            <br><br>
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