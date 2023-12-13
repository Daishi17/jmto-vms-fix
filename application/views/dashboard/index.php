<main class="container-fluid" style="margin-top: 30px;">
    <div class="row">
        <div class="col">
            <div class="card border-primary">
                <div class="card-header bg-transparent border-primary">
                    <h6 class="card-title">
                        <span class="text-secondary">
                            <i class="fas fa-user-tag"></i>
                            <small><strong>Elektronik Data Rekanan Tervalidasi (E-DRT)</strong></small>
                        </span>
                    </h6>
                </div>
                <div class="card-body">
                    <div class="row mb-2">
                        <div class="col-md-4">
                            <div class="card border-primary shadow-lg">
                                <div class="card-body box-profile">
                                    <div class="text-center">
                                        <img src="<?php echo base_url(); ?>/assets/brand/logo usaha.png" alt="mdo" width="160" height="120" class="rounded-circle shadow-lg">
                                    </div>
                                    <h6 class="profile-username text-center text-sm">
                                        <small><strong><?= $row_vendor['nama_usaha'] ?></strong></small>
                                    </h6>
                                    <p class="text-muted text-center">
                                        <small>
                                            <?php foreach ($kualifikasi as $key => $value) { ?>
                                                <?php $kualifikasi = $this->M_dashboard->get_kualifikasi_izin($value); ?>
                                                <?php echo $kualifikasi['nama_jenis_usaha'] ?> <br>
                                            <?php    } ?>
                                        </small>
                                    </p><br>
                                    <table class="table table-bordered table-sm">
                                        <tr>
                                            <th class="bg-light">
                                                <small>Kualifikasi Usaha</small>
                                            </th>
                                            <td class="text-end">
                                                <small class="text-primary"><?= $row_vendor['kualifikasi_usaha'] ?></small>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th class="bg-light">
                                                <small>NPWP</small>
                                            </th>
                                            <td class="text-end">
                                                <small class="text-primary"><?= $row_vendor['npwp'] ?></small>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th class="bg-light">
                                                <small>Email</small>
                                            </th>
                                            <td class="text-end">
                                                <small class="text-primary"><?= $row_vendor['email'] ?></small>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th class="bg-light">
                                                <small>Status Dokumen</small>
                                            </th>
                                            <?php
                                            if ($count_validate == 15) { ?>
                                                <?php if ($count_tdk_validate > 0) { ?>
                                                    <td class="text-end">
                                                        <a href="javascript:;" data-bs-toggle="modal" data-bs-target="#rincian_dokumen"><small><span class="badge bg-danger">Belum Lengkap</span></small></a>
                                                    </td>
                                                <?php } else { ?>
                                                    <td class="text-end">
                                                        <a href="javascript:;" data-bs-toggle="modal" data-bs-target="#rincian_dokumen"><small><span class="badge bg-success">Sudah Valid</span></small></a>
                                                    </td>
                                                <?php  } ?>

                                            <?php } else { ?>
                                                <td class="text-end">
                                                    <a href="javascript:;" data-bs-toggle="modal" data-bs-target="#rincian_dokumen"><small><span class="badge bg-danger">Belum Lengkap</span></small></a>
                                                </td>
                                            <?php  }  ?>

                                        </tr>
                                        <tr>
                                            <th class="bg-light">
                                                <small>Tender Terundang</small>
                                            </th>
                                            <?php
                                            if ($row_vendor['sts_terundang'] == 1) { ?>
                                                <td class="text-end">
                                                    <small><span class="badge bg-success">Sudah Tervalidasi</span></small>
                                                </td>
                                            <?php } else { ?>
                                                <td class="text-end">
                                                    <small><span class="badge bg-secondary">Belum Tervalidasi</span></small>
                                                </td>
                                            <?php  }  ?>

                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="card border-primary shadow-lg">
                                <div class="card-header"><small class="text-primary"><b><i class="fa-solid fa-address-card px-1"></i>Profil Perusahaan</b></small></div>
                                <div class="card-body">
                                    <table class="table table-bordered table-sm">
                                        <tr>
                                            <th class="bg-light">
                                                <small>Bentuk Usaha</small>
                                            </th>
                                            <td>
                                                <i class="fa-solid fa-building px-2"></i>
                                                <small> <?= $row_vendor['bentuk_usaha'] ?></small>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th class="bg-light">
                                                <small>Alamat</small>
                                            </th>
                                            <td>
                                                <i class="fa-solid fa-road px-1"></i>
                                                <small> <?= $row_vendor['alamat'] ?></small>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th class="bg-light">
                                                <small>Provinsi</small>
                                            </th>
                                            <td>
                                                <i class="fa-solid fa-landmark px-1"></i>
                                                <small><?= $row_vendor['nama_provinsi'] ?></small>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th class="bg-light">
                                                <small>Kabupaten/Kota</small>
                                            </th>
                                            <td>
                                                <i class="fa-solid fa-tree-city px-1"></i>
                                                <small> <?= $row_vendor['nama_kabupaten'] ?></small>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th class="bg-light">
                                                <small>Kecamatan</small>
                                            </th>
                                            <td>
                                                <i class="fa-solid fa-map px-1"></i>
                                                <small> <?= $row_vendor['nama_kecamatan'] ?></small>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th class="bg-light">
                                                <small>Kelurahan</small>
                                            </th>
                                            <td>
                                                <i class="fa-solid fa-signs-post px-1"></i>
                                                <small> <?= $row_vendor['kelurahan'] ?></small>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th class="bg-light">
                                                <small>Kode Pos</small>
                                            </th>
                                            <td>
                                                <i class="fa-solid fa-location-dot px-1"></i>
                                                <small> <?= $row_vendor['kode_pos'] ?></small>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th class="bg-light">
                                                <small>No. Kontak</small>
                                            </th>
                                            <td>
                                                <i class="fa-solid fa-phone-volume px-1"></i>
                                                <small> <?= $row_vendor['no_telpon'] ?></small>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th class="bg-light">
                                                <small>Kantor Cabang</small>
                                            </th>
                                            <td>
                                                <i class="fa-solid fa-house px-1"></i>
                                                <?php if ($row_vendor['sts_kantor_cabang'] == 1) { ?>
                                                    <?= $row_vendor['alamat_kantor_cabang'] ?>
                                                <?php  } else { ?>
                                                    <small>Tidak Ada</small>
                                                <?php   }   ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th class="bg-light" colspan="2">
                                                <div class="row">
                                                    <div class="col-md-2">
                                                        <a href="<?= base_url('datapenyedia/identitas_perusahaan') ?>">
                                                            <button type="button" class="btn btn-warning btn-sm">
                                                                <i class="fa-solid fa-pen-to-square px-1"></i>
                                                                Ubah Profile Perusahaan
                                                            </button>
                                                        </a>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <a href="javascript:;" onclick="pengajuan_dokumen()">
                                                            <button type="button" class="btn btn-info btn-sm">
                                                                <i class="fa-solid fa-file px-1"></i>
                                                                Pengajuan Dokumen Baru
                                                            </button>
                                                        </a>
                                                    </div>
                                                </div>

                                            </th>
                                        </tr>

                                    </table>
                                    <span class="btn btn-success"><i class="fa fa-check"></i> <?= $row_vendor['nama_usaha'] ?> Sudah Menyetujui Pakta Integritas Yang Berlaku Dalam Pengadaan Sejak Dari Mendaftar Data Rekanan Tetap Pada PT. Jasamarga Tollroad Operator</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="card border-danger shadow-lg">
                            <div class="card-header"><small class="text-danger"><b>
                                        <i class="fa-solid fa-chart-simple px-1"></i>
                                        Info Grafik Rekanan</b></small>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-3 col-6">
                                        <div class="card shadow-lg" style="width: 18rem;">

                                            <?php if ($count_validate >= 15) { ?>
                                                <?php if ($count_tdk_validate > 0) { ?>
                                                    <div class="card-body bg-danger">
                                                        <div class="text-start">
                                                            <i class="fa-solid fa-envelope fa-beat fa-2xl"></i>
                                                        </div>
                                                        <div class="text-end">
                                                            <h5>
                                                                <input type="hidden" name="count_validate" value="<?= base_url('dashboard/count_validate') ?>">
                                                                <small class="text-white"><b id="count_validate"><?= $count_validate - $count_tdk_validate ?>/15</b></small>
                                                            </h5>
                                                            <small class="text-white"><b>Dokumen Yang Tervalidasi</b></small>
                                                        </div>
                                                    </div>
                                                <?php } else { ?>
                                                    <div class="card-body bg-success">
                                                        <div class="text-start">
                                                            <i class="fa-solid fa-envelope fa-beat fa-2xl"></i>
                                                        </div>
                                                        <div class="text-end">
                                                            <h5>
                                                                <input type="hidden" name="count_validate" value="<?= base_url('dashboard/count_validate') ?>">
                                                                <small class="text-white"><b id="count_validate"><?= $count_validate ?>/15</b></small>
                                                            </h5>
                                                            <small class="text-white"><b>Dokumen Yang Tervalidasi</b></small>
                                                        </div>
                                                    </div>
                                                <?php } ?>

                                            <?php } else { ?>
                                                <div class="card-body bg-danger">
                                                    <div class="text-start">
                                                        <i class="fa-solid fa-envelope fa-beat fa-2xl"></i>
                                                    </div>
                                                    <div class="text-end">
                                                        <h5>
                                                            <input type="hidden" name="count_validate" value="<?= base_url('dashboard/count_validate') ?>">
                                                            <small class="text-white"><b id="count_validate"><?= $count_validate ?>/15</b></small>
                                                        </h5>
                                                        <small class="text-white"><b>Dokumen Yang Tervalidasi</b></small>
                                                    </div>
                                                </div>
                                            <?php } ?>

                                            <div class="card-footer bg-light">
                                                <a href="#" class="small-box-footer">
                                                    <small>Informasi Lebih Lanjut</small> <i class="fas fa-arrow-circle-right"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-6">
                                        <div class="card shadow-lg" style="width: 18rem;">
                                            <div class="card-body bg-warning">
                                                <div class="text-start">
                                                    <i class="fa-solid fa-paper-plane fa-spin fa-2xl"></i>
                                                </div>
                                                <div class="text-end">
                                                    <h5>
                                                        <small class="text-dark"><b><?= count($count_tender_umum) + count($count_tender_terbatas) ?></b></small>
                                                    </h5>
                                                    <small class="text-dark"><b>Tender Terundang</b></small>
                                                </div>
                                            </div>
                                            <div class="card-footer bg-light">
                                                <a href="#" class="small-box-footer">
                                                    <small> Informasi Lebih Lanjut </small> <i class="fas fa-arrow-circle-right"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-6">
                                        <div class="card shadow-lg" style="width: 18rem;">
                                            <div class="card-body bg-success">
                                                <div class="text-start">
                                                    <i class="fa-solid fa-fax fa-flip fa-2xl"></i>
                                                </div>
                                                <div class="text-end">
                                                    <h5>
                                                        <small class="text-white"><b>0</b></small>
                                                    </h5>
                                                    <small class="text-white"><b>Penilaian Kinerja</b></small>
                                                </div>
                                            </div>
                                            <div class="card-footer bg-light">
                                                <a href="#" class="small-box-footer">
                                                    <small> Informasi Lebih Lanjut </small> <i class="fas fa-arrow-circle-right"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-6">
                                        <div class="card shadow-lg" style="width: 18rem;">
                                            <div class="card-body bg-primary">
                                                <div class="text-start">
                                                    <i class="fa-solid fa-certificate fa-bounce fa-2xl"></i>
                                                </div>
                                                <div class="text-end">
                                                    <h5>
                                                        <small class="text-white"><b>0</b></small>
                                                    </h5>
                                                    <small class="text-white"><b>Tender Berkontrak</b></small>
                                                </div>
                                            </div>
                                            <div class="card-footer bg-light">
                                                <a href="#" class="small-box-footer">
                                                    <small> Informasi Lebih Lanjut </small> <i class="fas fa-arrow-circle-right"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</main>
<br>

<div class="modal fade" id="rincian_dokumen" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h5 class="modal-title text-white" id="exampleModalLabel">Rincian Dokumen Upload <?= $this->session->userdata('nama_usaha'); ?></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                <div class="card">
                    <div class="card-header bg-primary">
                        <center>
                            <h4 class="text-white">SIUP</h4>
                        </center>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>No Surat</th>
                                    <th>Status Validasi</th>
                                    <th>Tanggal Periksa</th>
                                </tr>
                            </thead>
                            <tbody id="rincian_siup">

                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header bg-primary">
                        <center>
                            <h4 class="text-white">KBLI SIUP</h4>
                        </center>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Kode KBLI/Jenis</th>
                                    <th>Status Validasi</th>
                                    <th>Tanggal Periksa</th>
                                </tr>
                            </thead>
                            <tbody id="rincian_kbli_siup">

                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header bg-primary">
                        <center>
                            <h4 class="text-white">NIB</h4>
                        </center>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>No Surat</th>
                                    <th>Status Validasi</th>
                                    <th>Tanggal Periksa</th>
                                </tr>
                            </thead>
                            <tbody id="rincian_nib">

                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header bg-primary">
                        <center>
                            <h4 class="text-white">KBLI NIB</h4>
                        </center>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Kode KBLI/Jenis</th>
                                    <th>Status Validasi</th>
                                    <th>Tanggal Periksa</th>
                                </tr>
                            </thead>
                            <tbody id="rincian_kbli_nib">

                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header bg-primary">
                        <center>
                            <h4 class="text-white">SBU</h4>
                        </center>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>No Surat</th>
                                    <th>Status Validasi</th>
                                    <th>Tanggal Periksa</th>
                                </tr>
                            </thead>
                            <tbody id="rincian_sbu">

                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header bg-primary">
                        <center>
                            <h4 class="text-white">KODE SBU</h4>
                        </center>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Kode SBU/Jenis</th>
                                    <th>Status Validasi</th>
                                    <th>Tanggal Periksa</th>
                                </tr>
                            </thead>
                            <tbody id="rincian_kbli_sbu">

                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header bg-primary">
                        <center>
                            <h4 class="text-white">SIUJK</h4>
                        </center>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>No Surat</th>
                                    <th>Status Validasi</th>
                                    <th>Tanggal Periksa</th>
                                </tr>
                            </thead>
                            <tbody id="rincian_siujk">

                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header bg-primary">
                        <center>
                            <h4 class="text-white">KBLI SIUJK</h4>
                        </center>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Kode KBLI/Jenis</th>
                                    <th>Status Validasi</th>
                                    <th>Tanggal Periksa</th>
                                </tr>
                            </thead>
                            <tbody id="rincian_kbli_siujk">

                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header bg-primary">
                        <center>
                            <h4 class="text-white">Akta Pendirian</h4>
                        </center>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>No Surat</th>
                                    <th>Status Validasi</th>
                                    <th>Tanggal Periksa</th>
                                </tr>
                            </thead>
                            <tbody id="rincian_akta_pendirian">

                            </tbody>
                        </table>
                    </div>
                </div>


                <div class="card">
                    <div class="card-header bg-primary">
                        <center>
                            <h4 class="text-white">Akta Perubahan</h4>
                        </center>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>No Surat</th>
                                    <th>Status Validasi</th>
                                    <th>Tanggal Periksa</th>
                                </tr>
                            </thead>
                            <tbody id="rincian_akta_perubahan">

                            </tbody>
                        </table>
                    </div>
                </div>


                <div class="card">
                    <div class="card-header bg-primary">
                        <center>
                            <h4 class="text-white">Pemilik Perusahaan</h4>
                        </center>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Nik/Paspor</th>
                                    <th>Status Validasi</th>
                                    <th>Tanggal Periksa</th>
                                </tr>
                            </thead>
                            <tbody id="rincian_pemilik">

                            </tbody>
                        </table>
                    </div>
                </div>


                <div class="card">
                    <div class="card-header bg-primary">
                        <center>
                            <h4 class="text-white">Pengurus Perusahaan</h4>
                        </center>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Nik/Paspor</th>
                                    <th>Status Validasi</th>
                                    <th>Tanggal Periksa</th>
                                </tr>
                            </thead>
                            <tbody id="rincian_pengurus">

                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header bg-primary">
                        <center>
                            <h4 class="text-white">Pengalaman</h4>
                        </center>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>No Kontrak</th>
                                    <th>Status Validasi</th>
                                    <th>Tanggal Periksa</th>
                                </tr>
                            </thead>
                            <tbody id="rincian_pengalaman">

                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header bg-primary">
                        <center>
                            <h4 class="text-white">SPPKP</h4>
                        </center>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>No Surat</th>
                                    <th>Status Validasi</th>
                                    <th>Tanggal Periksa</th>
                                </tr>
                            </thead>
                            <tbody id="rincian_sppkp">

                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header bg-primary">
                        <center>
                            <h4 class="text-white">NPWP</h4>
                        </center>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>No NPWP</th>
                                    <th>Status Validasi</th>
                                    <th>Tanggal Periksa</th>
                                </tr>
                            </thead>
                            <tbody id="rincian_npwp">

                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header bg-primary">
                        <center>
                            <h4 class="text-white">SPT</h4>
                        </center>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>No TTE/SPT</th>
                                    <th>Status Validasi</th>
                                    <th>Tanggal Periksa</th>
                                </tr>
                            </thead>
                            <tbody id="rincian_spt">

                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header bg-primary">
                        <center>
                            <h4 class="text-white">Laporan Keuangan</h4>
                        </center>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Tahun Laporan/Jenis Audit</th>
                                    <th>Status Validasi</th>
                                    <th>Tanggal Periksa</th>
                                </tr>
                            </thead>
                            <tbody id="rincian_keuangan">

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>


            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>


<!-- Modal -->
<div class="modal fade" id="modal_pengajuan_dokumen" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title">Buat List Pengajuan Dokumen</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-2">

                    </div>

                    <div class="col-md-8">
                        <select name="jenis_dokumen_perubahan" onchange="pilih_jenis_dokumen_perubahan()" class="form-control select2">
                            <option value="">-- Pilih Jenis Dokumen Ingin Diubah --</option>
                            <option value="nib">NIB</option>
                            <option value="siup">SIUP</option>
                            <option value="sbu">SBU</option>
                            <option value="siujk">SIUJK</option>
                            <option value="skdp">SKDP</option>
                            <option value="izin_lainya">Izin Lainya</option>
                            <option value="akta_pendirian">Akta Pendirian</option>
                            <option value="akta_perubahan">Akta Perubahan</option>
                            <option value="pemilik_perusahaan">Pemilik Perusahaan</option>
                            <option value="pengurus_perusahaan">Pengurus Perusahaan</option>
                            <option value="pengalaman_perusahaan">Pengalaman Perusahaan</option>
                            <option value="sppkp">SPPKP</option>
                            <option value="npwp">NPWP</option>
                            <option value="spt">SPT</option>
                            <option value="laporan_keuangan">Laporan Keuangan</option>
                            <option value="neraca_keuangan">Neraca Keuangan</option>
                        </select>
                    </div>

                    <div class="col-md-2">

                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="card">
                        <div class="card-header bg-warning text-white">
                            List Dokumen Pengajun Perubahan Dokumen
                        </div>
                        <div class="card-body">
                            <table class="table" id="datatable_pengajuan_dokumen">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Jenis Dokumen</th>
                                        <th>Waktu Pengajuan</th>
                                        <th>Status</th>
                                        <th>Status Upload</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>



<!-- Modal -->

<div class="modal fade" id="modal_notice_version" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <a class="navbar-brand">
                    <img src="<?php echo base_url(); ?>/assets/brand/jm1.png" alt="" width="25" height="25" class="d-inline-block align-text-top">
                    <b><span class="text-primary">Jasamarga Tollroad Operator</span></b>
                    <br>
                    <b><span class="text-primary">Update Fitur Sistem DRT JMTO</span></b>
                </a>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="<?= base_url('assets/update_patch/patch3.jpg') ?>" class="d-block w-100" alt="...">
                            <br>

                            <label>1. Khusus Untuk Rekanan Yang Sudah Terundang Jika Ada Perubahan Dokumen Silahkan Mengajukan Perubahan Terlebih Dahulu Kepada Validator DRT JMTO</label>
                        </div>
                        <div class="carousel-item ">
                            <img src="<?= base_url('assets/update_patch//patch1.jpg') ?>" class="d-block w-100" alt="...">
                            <br>
                            <label>2. Berikut Adalah Tombol Untuk Pengajuan Ada Pada Menu Dashboard</label>
                        </div>

                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Tutup</button>
                <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
            </div>
        </div>
    </div>
</div>