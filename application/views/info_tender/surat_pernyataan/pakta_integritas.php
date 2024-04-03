<!DOCTYPE html>
<html lang="en">

<head>
    <title>PAKTA INTEGRITAS
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
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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

    return $pecahkan[0] . ' ' . $bulan[(int) $pecahkan[1]] . ' ' .  $pecahkan[2];
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
    $huruf = array("", "Satu", "Dua", "Tiga", "Empat", "Lima", "Enam", "Tujuh", "Delapan", "Sembilan", "Sepuluh", "Sebelas");
    $temp = "";
    if ($nilai < 12) {
        $temp = " " . $huruf[$nilai];
    } else if ($nilai < 20) {
        $temp = penyebut($nilai - 10) . " Belas";
    } else if ($nilai < 100) {
        $temp = penyebut($nilai / 10) . " Puluh" . penyebut($nilai % 10);
    } else if ($nilai < 200) {
        $temp = " seratus" . penyebut($nilai - 100);
    } else if ($nilai < 1000) {
        $temp = penyebut($nilai / 100) . " Ratus" . penyebut($nilai % 100);
    } else if ($nilai < 2000) {
        $temp = " Seribu" . penyebut($nilai - 1000);
    } else if ($nilai < 1000000) {
        $temp = penyebut($nilai / 1000) . " Ribu" . penyebut($nilai % 1000);
    } else if ($nilai < 1000000000) {
        $temp = penyebut($nilai / 1000000) . " Juta" . penyebut($nilai % 1000000);
    } else if ($nilai < 1000000000000) {
        $temp = penyebut($nilai / 1000000000) . " Milyar" . penyebut(fmod($nilai, 1000000000));
    } else if ($nilai < 1000000000000000) {
        $temp = penyebut($nilai / 1000000000000) . " Trilyun" . penyebut(fmod($nilai, 1000000000000));
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
        <div class="container-fluid">
            <img class="pull-right" alt="LOGO" src="<?= base_url() ?>assets/logo_ba/logo_ba.png" width="50%" style="opacity: 0.5;" />
        </div>
        <center>
            <h4>PAKTA INTEGRITAS</h4>
        </center>
        <br>
        <label for="">Kami atas nama Pengurus <b><?= $nama_usaha ?></b> dalam rangka <b><?= $rup['nama_rup'] ?></b> dengan ini menyatakan bahwa saya: </label>
        <ol>
            <li>Tidak akan melakukan praktik Kolusi, Korupsi, dan Nepotisme (KKN);</li>
            <li>Akan melaporkan kepada pihak yang berwajib/berwenang apabila mengetahui adanya indikasi KKN di dalam proses Pengadaan ini;</li>
            <li>Dalam proses Pengadaan ini, berjanji akan melaksanakan tugas dan kewajiban secara bersih, transparan, dan profesional dalam arti akan mengerahkan segala kemampuan dan sumber daya secara maksimal untuk memberikan hasil kerja terbaik mulai dari persiapan, pelaksanaan, dan penyelesaian pekerjaan/kegiatan ini;</li>
            <li>Tidak akan melakukan pengaturan-pengaturan yang bertentangan dengan ketentuan/peraturan yang berlaku dan atau dengan prinsip-prinsip Pengadaan Jasa yang efisien, efektif, kompetitif, transparan, adil dan wajar, akuntabel;</li>
            <li>Saya bersedia dikenakan sanksi moral, sanksi administrasi, dan sanksi hukum sesuai dengan ketentuan peraturan perundang-undangan yang berlaku, apabila saya melanggar hal-hal yang telah saya nyatakan dalam PAKTA INTEGRITAS ini.</li>
        </ol>
        <div class="float-right mt-5">
            <b><?= $nama_usaha ?></b>
            <br>
            <br>
            <?php if ($vendor['sts_suratpernyataan_1'] == 1) { ?>
                <span class="btn btn-success">Sudah Menyetujui</span>
            <?php } else { ?>
                <?php if (date('Y-m-d H:i', strtotime($jadwal_upload_dokumen_prakualifikasi['waktu_mulai']))  >= date('Y-m-d H:i')) { ?>
                <?php    } else if (date('Y-m-d H:i', strtotime($jadwal_upload_dokumen_prakualifikasi['waktu_selesai'])) >= date('Y-m-d H:i') || date('Y-m-d H:i', strtotime($jadwal_upload_dokumen_prakualifikasi['waktu_mulai'])) == date('Y-m-d H:i')) { ?>
                    <?php if ($get_row_mengikuti['sts_suratpernyataan_1'] == 1) { ?>
                        <span class="badge bg-success">Sudah Menyetujui</span>
                    <?php } else { ?>
                        <center>
                            <a href="javascript:;" onclick="setujui_surat('<?= $rup['id_rup'] ?>','sts_suratpernyataan_1')" class="btn btn-sm btn-danger">Silahkan Disetujui (Klik Tombol Ini)</a>
                        </center>
                    <?php } ?>
                <?php  } else { ?>

                    <label for="" class="badge bg-secondary">Tahap Sudah Selesai</label>

                <?php } ?>
            <?php } ?>
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

    function setujui_surat(id_rup, type) {
        Swal.fire({
            title: "Anda Yakin Ingin Menyetujui?",
            text: "Data Yang Sudah Disetujui Tidak Bisa Dibatal!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Ya, Kirim!"
        }).then((result) => {

            if (result.isConfirmed) {
                $.ajax({
                    type: "POST",
                    url: '<?= base_url('tender_diikuti/update_status_persuratan') ?>',
                    dataType: "JSON",
                    data: {
                        post: type,
                        id_rup: '<?= $rup['id_rup'] ?>'
                    },
                    success: function(response) {
                        Swal.fire('Surat Pernyataan Berhasil Disetujui!', '', 'success')
                        setTimeout(() => {
                            location.reload();
                        }, 1500);
                    }
                })
            }
        });


    }
</script>