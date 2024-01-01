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


<body style="font-size: 13px;">
    <div class="container mt-5">
        <img class="pull-right" alt="LOGO" src="<?= base_url() ?>assets/img/logo_asli.png" width="30%" />
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-1">
                    <label for="" style="margin-right: auto;">Nomor</label>
                </div>
                <div class="col-md-5">
                    <label for="">: <?= $rup['no_undangan'] ?></label>
                </div>
                <div class="col-md-2">
                </div>
                <div class="col-md-2">
                </div>
                <div class="col-md-2">
                    <label><?= $rup['tgl_surat_undangan'] ?></label>
                </div>
            </div>
            <div class="row">
                <div class="col-md-1">
                    <label for="" style="margin-right: auto;">Hal</label>
                </div>
                <div class="col-md-11">
                    <label for=""><b>: Undangan Pembuktian Kualifikasi (Syarat Tambahan)</b></label>
                </div>
            </div>
            <div class="row">
                <div class="col-md-1">
                    <label for="" style="margin-right: auto;">Lampiran</label>
                </div>
                <div class="col-md-11">
                    <label for="">: 1 (satu) Lembar</label>
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
                    <b>Tempat</b>
                </div>
            </div>

            <div class="row mt-5">
                <div class="col-md-12">
                    Sehubungan dengan kegiatan <?= $rup['nama_metode_pengadaan'] ?> dengan Pra Kualifikasi <b> Pengadaan <?= $rup['nama_rup'] ?>, </b> dengan ini kami mengundang Saudara untuk hadir dalam tahapan <b> Pembuktian Kualifikasi</b> yang akan diselenggarakan pada:
                </div>
            </div>
            <br><br>
            <div class="row ml-3">
                <div class="col-md-1">
                    <label for="">Hari/Tanggal</label>
                </div>
                <div class="col-md-4">
                    <label for="">: <?= $rup['hari_undangan'] ?> / <?= $rup['tanggal_undangan'] ?></label>
                </div>
            </div>
            <div class="row ml-3">
                <div class="col-md-1">
                    <label for="">Tempat</label>
                </div>
                <div class="col-md-4">
                    <label for="">: Ruang Rapat Besar Lantai 3 & 4 PT Jasamarga Tollroad Operator
                        & Video Conference Aplikasi Zoom</label>
                </div>
            </div>
            <div class="row ml-3">
                <div class="col-md-1">
                    <label for="">Waktu</label>
                </div>
                <div class="col-md-4">
                    <label for="">: <?= $rup['waktu_undangan'] ?></label>
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

            <br><br>
            <div class="row">
                <div class="col-md-4">
                    <center>
                        <h6>PT Jasamarga Tollroad Operator</h6>
                        <br>
                        <br>
                        <br><br>
                        <h6> <u style="text-transform: capitalize;"></u></h6>
                        <h6>
                            TTD Panitia
                        </h6>
                    </center>
                </div>
                <div class="col-md-4"></div>
                <div class="col-md-4"></div>

            </div>
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

            <div class="row mt-4">
                <div class="col-md-12">
                    Jadwal Kegiatan Pembuktian Kualifikasi
                </div>
                <div class="col-md-12">
                    <table class="table table-bordered">
                        <thead>
                            <tr class="text-center">
                                <th class="text-center">No</th>
                                <th class="text-center">Peserta Penawaran</th>
                                <th class="text-center">Waktu</th>
                                <th class="text-center">Metode</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1;
                            foreach ($peserta as $key => $value) { ?>
                                <tr class="text-center">
                                    <td class="text-center"><?= $i++ ?></td>
                                    <td class="text-center"><b> <?= $value['nama_usaha'] ?></b></td>
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