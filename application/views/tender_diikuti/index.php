<main class="container-fluid">
    <div class="row">
        <hr>
        <div class="card border-dark bg-danger mt-3">
            <div class="card-header border-dark bg-gradient-color1">
                <h6 class="card-title">
                    <span class="text-white">
                        <i class="fa-solid fa-circle-info"></i>
                        <small><strong>Info Pengadaan</strong></small>
                    </span>
                </h6>
            </div>
        </div>
        <hr>
        <div class="card border-dark">
            <div class="card-header border-dark bg-warning d-flex justify-content-between align-items-center">
                <div class="flex-grow-1 bd-highlight">
                    <span class="text-dark">
                        <i class="fa-solid fa-table px-1"></i>
                        <small><strong>Data Tabel - Info Pengadaan</strong></small>
                    </span>
                </div>
            </div>
            <div class="card-body">
                <div class="card border-warning shadow-sm">
                    <div class="card-header">
                        <div class="nav nav-tabs mb-3 bg-info" id="nav-tab" role="tablist">
                            <input type="hidden" name="get_data_tender" value="<?= base_url('tender_diikuti/get_data_tender') ?>">
                            <input type="hidden" name="url_detail_paket" value="<?= base_url('tender_diikuti/detail_paket/') ?>">
                            <input type="hidden" name="url_info_tender" value="<?= base_url('tender_diikuti/informasi_tender/') ?>">
                            <input type="hidden" name="url_info_tender_penunjukan_langsung" value="<?= base_url('informasi_tender_penunjukan_langsung/') ?>">
                            <input type="hidden" name="get_data_tender_terbatas" value="<?= base_url('tender_diikuti/get_data_tender_terbatas') ?>">

                            <input type="hidden" name="get_data_tender_penunjukan_langsung" value="<?= base_url('tender_diikuti/get_data_tender_penunjukan_langsung') ?>">
                            <button class="nav-link active text-dark" id="nav-tenderumum-tab" data-bs-toggle="tab" data-bs-target="#nav-tenderumum" type="button" role="tab" aria-controls="nav-tenderumum" aria-selected="true">
                                <i class="fa-solid fa-gift"></i>
                                <small><b>Tender Umum &nbsp;<span class="badge bg-secondary"><?= count($count_tender_umum) ?></span></b></small>
                            </button>
                            <button class="nav-link text-dark" id="nav-tenderbatas-tab" data-bs-toggle="tab" data-bs-target="#nav-tenderbatas" type="button" role="tab" aria-controls="nav-tenderbatas" aria-selected="true">
                                <i class="fa-solid fa-gift"></i>
                                <small><b>Tender Terbatas &nbsp;<span class="badge bg-secondary"><?= count($count_tender_terbatas) ?></span></b></small>
                            </button>
                            <!-- <button class="nav-link text-dark" id="nav-seleksiumum-tab" data-bs-toggle="tab" data-bs-target="#nav-seleksiumum" type="button" role="tab" aria-controls="nav-seleksiumum" aria-selected="true">
                                <i class="fa-solid fa-gift"></i>
                                <small><b>Seleksi Umum &nbsp;<span class="badge bg-secondary">0</span></b></small>
                            </button> -->
                            <button class="nav-link text-dark" id="nav-juksung-tab" data-bs-toggle="tab" data-bs-target="#nav-juksung" type="button" role="tab" aria-controls="nav-juksung" aria-selected="true">
                                <i class="fa-solid fa-gift"></i>
                                <small><b>Penunjukan Langsung &nbsp;<span class="badge bg-secondary"><?= count($count_tender_penunjukan_langsung) ?></span></b></small>
                            </button>

                            <!-- <button class="nav-link text-dark" id="nav-selekterbatas-tab" data-bs-toggle="tab" data-bs-target="#nav-selekterbatas" type="button" role="tab" aria-controls="nav-selekterbatas" aria-selected="true">
                                <i class="fa-solid fa-gift"></i>
                                <small><b>Seleksi Terbatas &nbsp;<span class="badge bg-secondary">0</span></b></small>
                            </button> -->
                            <!-- <button class="nav-link text-dark" id="nav-penglangsung-tab" data-bs-toggle="tab" data-bs-target="#nav-penglangsung" type="button" role="tab" aria-controls="nav-penglangsung" aria-selected="true">
                                <i class="fa-solid fa-gift"></i>
                                <small><b>Pengadaan Langsung &nbsp;<span class="badge bg-secondary">0</span></b></small>
                            </button> -->
                        </div>
                        <div class="tab-content p-3 border bg-light" id="nav-tabContent">
                            <div class="tab-pane fade active show" id="nav-tenderumum" role="tabpanel" aria-labelledby="nav-tenderumum-tab">
                                <div class="card border-dark">
                                    <div class="card-header border-dark bg-primary d-flex justify-content-between align-items-center">
                                        <div class="flex-grow-1 bd-highlight">
                                            <span class="text-white">
                                                <i class="fa-solid fa-circle-info px-1"></i>
                                                <small><strong>Transaksi Tender Umum</strong></small>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <table id="tbl_tender_umum" class="table table-bordered border-dark table-sm table-striped">
                                    <thead class="bg-secondary col-12">
                                        <tr>
                                            <th><small class="text-white">No</small></th>
                                            <th class="col-1"><small class="text-white">Tahun</small></th>
                                            <th class="col-3"><small class="text-white">Nama Paket Penyedia</small></th>
                                            <th class="col-2"><small class="text-white">Departemen</small></th>
                                            <th class="col-2"><small class="text-white">Jenis Pengadaan</small></th>
                                            <th class="col-2"><small class="text-white">Total HPS (Rp)</small></th>
                                            <th class="col-1"><small class="text-white">Status</small></th>
                                            <th class="col-1"><small class="text-white">
                                                    <div class="text-center">Aksi</div>
                                                </small></th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                    </tbody>
                                </table>
                            </div>


                            <div class="tab-pane fade" id="nav-tenderbatas" role="tabpanel" aria-labelledby="nav-tenderbatas-tab">
                                <div class="card border-dark">
                                    <div class="card-header border-dark bg-primary d-flex justify-content-between align-items-center">
                                        <div class="flex-grow-1 bd-highlight">
                                            <span class="text-white">
                                                <i class="fa-solid fa-circle-info px-1"></i>
                                                <small><strong>Transaksi Tender Terbatas</strong></small>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <table id="tbl_tender_terbatas" class="table table-bordered border-dark table-sm table-striped">
                                    <thead class="bg-secondary col-12">
                                        <tr>
                                            <th><small class="text-white">No</small></th>
                                            <th class="col-1"><small class="text-white">Tahun</small></th>
                                            <th class="col-3"><small class="text-white">Nama Paket Penyedia</small></th>
                                            <th class="col-2"><small class="text-white">Departemen</small></th>
                                            <th class="col-2"><small class="text-white">Jenis Pengadaan</small></th>
                                            <th class="col-2"><small class="text-white">Total HPS (Rp)</small></th>
                                            <th class="col-1"><small class="text-white">Status</small></th>
                                            <th class="col-1"><small class="text-white">
                                                    <div class="text-center">Aksi</div>
                                                </small></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                </table>
                            </div>

                            <div class="tab-pane fade" id="nav-seleksiumum" role="tabpanel" aria-labelledby="nav-seleksiumum-tab">
                                <div class="card border-dark">
                                    <div class="card-header border-dark bg-primary d-flex justify-content-between align-items-center">
                                        <div class="flex-grow-1 bd-highlight">
                                            <span class="text-white">
                                                <i class="fa-solid fa-circle-info px-1"></i>
                                                <small><strong>Transaksi Seleksi Umum</strong></small>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <table id="example3" class="table table-bordered border-dark table-sm table-striped">
                                    <thead class="bg-secondary col-12">
                                        <tr>
                                            <th><small class="text-white">No</small></th>
                                            <th class="col-1"><small class="text-white">Tahun</small></th>
                                            <th class="col-3"><small class="text-white">Nama Paket Penyedia</small></th>
                                            <th class="col-2"><small class="text-white">Departemen</small></th>
                                            <th class="col-2"><small class="text-white">Jenis Pengadaan</small></th>
                                            <th class="col-2"><small class="text-white">Total HPS (Rp)</small></th>
                                            <th class="col-1"><small class="text-white">Status</small></th>
                                            <th class="col-1"><small class="text-white">
                                                    <div class="text-center">Aksi</div>
                                                </small></th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                    </tbody>
                                </table>
                            </div>


                            <div class="tab-pane fade" id="nav-juksung" role="tabpanel" aria-labelledby="nav-juksung-tab">
                                <div class="card border-dark">
                                    <div class="card-header border-dark bg-danger d-flex justify-content-between align-items-center">
                                        <div class="flex-grow-1 bd-highlight">
                                            <span class="text-white">
                                                <i class="fa-solid fa-circle-info px-1"></i>
                                                <small><strong>Transaksi Penunjukan Langsung</strong></small>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <table id="tbl_tender_penunjukan_langsung" class="table table-bordered border-dark table-sm table-striped">
                                    <thead class="bg-secondary col-12">
                                        <tr>
                                            <th><small class="text-white">No</small></th>
                                            <th class="col-1"><small class="text-white">Tahun</small></th>
                                            <th class="col-3"><small class="text-white">Nama Paket Penyedia</small></th>
                                            <th class="col-2"><small class="text-white">Departemen</small></th>
                                            <th class="col-2"><small class="text-white">Jenis Pengadaan</small></th>
                                            <th class="col-2"><small class="text-white">Total HPS (Rp)</small></th>
                                            <th class="col-1"><small class="text-white">Status</small></th>
                                            <th class="col-1"><small class="text-white">
                                                    <div class="text-center">Aksi</div>
                                                </small></th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                    </tbody>
                                </table>
                            </div>

                            <div class="tab-pane fade" id="nav-selekterbatas" role="tabpanel" aria-labelledby="nav-selekterbatas-tab">
                                <div class="card border-dark">
                                    <div class="card-header border-dark bg-primary d-flex justify-content-between align-items-center">
                                        <div class="flex-grow-1 bd-highlight">
                                            <span class="text-white">
                                                <i class="fa-solid fa-circle-info px-1"></i>
                                                <small><strong>Transaksi Seleksi Terbatas</strong></small>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <table id="example9" class="table table-bordered border-dark table-sm table-striped">
                                    <thead class="bg-secondary col-12">
                                        <tr>
                                            <th class="col-1"><small class="text-white">Tahun</small></th>
                                            <th class="col-3"><small class="text-white">Nama Paket Penyedia</small></th>
                                            <th class="col-2"><small class="text-white">Departemen</small></th>
                                            <th class="col-2"><small class="text-white">Jenis Pengadaan</small></th>
                                            <th class="col-2"><small class="text-white">Total HPS (Rp)</small></th>
                                            <th class="col-1"><small class="text-white">Status</small></th>
                                            <th class="col-1"><small class="text-white">
                                                    <div class="text-center">#</div>
                                                </small></th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                    </tbody>
                                </table>
                            </div>
                            <div class="tab-pane fade" id="nav-penglangsung" role="tabpanel" aria-labelledby="nav-penglangsung-tab">
                                <div class="card border-dark">
                                    <div class="card-header border-dark bg-primary d-flex justify-content-between align-items-center">
                                        <div class="flex-grow-1 bd-highlight">
                                            <span class="text-white">
                                                <i class="fa-solid fa-circle-info px-1"></i>
                                                <small><strong>Transaksi Pengadaan Langsung</strong></small>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <table id="example11" class="table table-bordered border-dark table-sm table-striped">
                                    <thead class="bg-secondary col-12">
                                        <tr>
                                            <th class="col-1"><small class="text-white">Tahun</small></th>
                                            <th class="col-3"><small class="text-white">Nama Paket Penyedia</small></th>
                                            <th class="col-2"><small class="text-white">Departemen</small></th>
                                            <th class="col-2"><small class="text-white">Jenis Pengadaan</small></th>
                                            <th class="col-2"><small class="text-white">Total HPS (Rp)</small></th>
                                            <th class="col-1"><small class="text-white">Status</small></th>
                                            <th class="col-1"><small class="text-white">
                                                    <div class="text-center">#</div>
                                                </small></th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="modal-xl-detail">
        <div class="modal-dialog modal-dialog-scrollable modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <a class="navbar-brand">
                        <img src="<?php echo base_url(); ?>/assets/brand/jm1.png" alt="" width="25" height="25" class="d-inline-block align-text-top">
                        <b><span class="text-primary">Jasamarga Tollroad Operator</span></b>
                    </a>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="card border-dark">
                        <div class="card-header border-dark bg-primary d-flex justify-content-between align-items-center">
                            <div class="flex-grow-1 bd-highlight">
                                <span class="text-white">
                                    <i class="fa-solid fa-table px-1"></i>
                                    <small><strong>List Detail - Paket Penyedia</strong></small>
                                </span>
                            </div>
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered table-sm shadow-lg">
                                <tr>
                                    <th class="col-2 vertical-align: middle; bg-light"><small>Kode</small></th>
                                    <td class="col-4 vertical-align: middle;">
                                        <small>
                                            <i class="fa-solid fa-barcode px-1"></i>
                                            <label for="" id="kode_rup"></label>
                                        </small>
                                    </td>
                                    <th class="col-2 vertical-align: middle; bg-light"><small>Tahun</small></th>
                                    <td class="col-4 vertical-align: middle;">
                                        <small>
                                            <i class="fa-solid fa-calendar-days px-1"></i>
                                            <label for="" id="tahun_rup"></label>
                                        </small>
                                    </td>
                                </tr>
                                <tr>
                                    <th class="col-2 vertical-align: middle; bg-light"><small>Nama Peket Penyedia</small></th>
                                    <td class="col-10 vertical-align: middle;" colspan="3">
                                        <small>
                                            <i class="fa-solid fa-keyboard px-1"></i>
                                            <label for="" id="nama_rup"></label>
                                        </small>
                                    </td>
                                </tr>
                                <tr>
                                    <th class="col-2 vertical-align: middle; bg-light"><small>Detail Lokasi Pekerjaan</small></th>
                                    <td class="col-10 vertical-align: middle;" colspan="3">
                                        <small>
                                            <i class="fa-solid fa-map-location px-1"></i>
                                            <label for="" id="detail_lokasi_rup"></label>
                                        </small>
                                    </td>
                                </tr>
                                <tr>
                                    <th class="col-2 vertical-align: middle; bg-light"><small>Ruas Toll</small></th>
                                    <td class="col-10 vertical-align: middle;" colspan="3">
                                        <small>
                                            <i class="fa-solid fa-road px-1"></i>
                                            Jagorawi - Japek
                                        </small>
                                    </td>
                                </tr>
                                <tr>
                                    <th class="col-2 vertical-align: middle; bg-light"><small>Departemen</small></th>
                                    <td class="col-4 vertical-align: middle;">
                                        <small>
                                            <i class="fa-solid fa-landmark px-1"></i>
                                            <label for="" id="nama_departemen"></label>
                                        </small>
                                    </td>
                                    <th class="col-2 vertical-align: middle; bg-light"><small>Sections</small></th>
                                    <td class="col-4 vertical-align: middle;">
                                        <small>
                                            <i class="fa-solid fa-map px-1"></i>
                                            <label for="" id="nama_section"></label>
                                        </small>
                                    </td>
                                </tr>
                                <tr>
                                    <th class="col-2 vertical-align: middle; bg-light"><small>Jenis Pengadaan</small></th>
                                    <td class="col-4 vertical-align: middle;">
                                        <small>
                                            <i class="fa-solid fa-briefcase px-1"></i>
                                            <label for="" id="nama_jenis_pengadaan"></label>
                                        </small>
                                    </td>
                                    <th class="col-2 vertical-align: middle; bg-light"><small>Metode Pengadaan</small></th>
                                    <td class="col-4 vertical-align: middle;">
                                        <small>
                                            <i class="fa-solid fa-business-time px-1"></i>
                                            <label for="" id="nama_metode_pengadaan"></label>
                                        </small>
                                    </td>
                                </tr>
                                <tr>
                                    <th class="col-2 vertical-align: middle; bg-light"><small>Metode Pemilihan</small></th>
                                    <td class="col-4 vertical-align: middle;">
                                        <small>
                                            <i class="fa-regular fa-folder-open px-1"></i>
                                            <label for="" id="nama_metode_pemilihan"></label>
                                        </small>
                                    </td>
                                    <th class="col-2 vertical-align: middle; bg-light"><small>Dokumen Pemilihan</small></th>
                                    <td class="col-4 vertical-align: middle;">
                                        <small>
                                            <i class="fa-solid fa-folder-tree px-1"></i>
                                            <label for="" id="dokumen_pemilihan"></label>
                                        </small>
                                    </td>
                                </tr>
                                <tr>
                                    <th class="col-2 vertical-align: middle; bg-light"><small>Batas Pendaftaraan Pengadaan</small></th>
                                    <td class="col-4 vertical-align: middle;">
                                        <small>
                                            <i class="fa-solid fa-calendar-days px-1"></i>
                                            <label for="" id="batas_pendaftaran"></label>
                                        </small>
                                    </td>
                                    <th class="col-2 vertical-align: middle; bg-light"><small>Waktu Pelaksana (hari)</small></th>
                                    <td class="col-4 vertical-align: middle;">
                                        <small>
                                            <i class="fa-solid fa-clock px-1"></i>
                                            <label for="" id="jangka_waktu_hari_pelaksanaan"></label>
                                        </small>
                                    </td>
                                </tr>
                                <tr>
                                    <th class="col-2 vertical-align: middle; bg-light"><small>TKDN/PDN/Import</small></th>
                                    <td class="col-4 vertical-align: middle;">
                                        <small>
                                            <i class="fa-regular fa-clipboard px-1 fa-lg"></i>
                                            <label for="" id="status_pencatatan"></label>
                                        </small>
                                    </td>
                                    <th class="col-2 vertical-align: middle; bg-light"><small>Persentase</small></th>
                                    <td class="col-4 vertical-align: middle;">
                                        <small>
                                            <i class="fa-solid fa-percent px-1"></i>
                                            <label for="" id="persen_pencatatan"></label>
                                        </small>
                                    </td>

                                </tr>
                                <tr>
                                    <th class="col-2 vertical-align: middle; bg-light"><small>HPS</small></th>
                                    <td class="col-4 vertical-align: middle;">
                                        <small>
                                            <i class="fa-solid fa-rupiah-sign px-1"></i>
                                            <label for="" id="total_hps_rup"></label>
                                        </small>
                                    </td>
                                </tr>
                                <tr>
                                    <th class="col-2 vertical-align: middle; bg-light"><small>Jenis Kontrak</small></th>
                                    <td class="col-4 vertical-align: middle;">
                                        <small>
                                            <i class="fa-solid fa-pen-to-square px-1"></i>
                                            <label for="" id="jenis_kontrak"></label>
                                        </small>
                                    </td>
                                    <th class="col-2 vertical-align: middle; bg-light"><small>Beban Tahun Anggaran</small></th>
                                    <td class="col-4 vertical-align: middle;">
                                        <small>
                                            <i class="fa-regular fa-calendar px-1"></i>
                                            <label for="" id="beban_tahun_anggaran"></label>
                                        </small>
                                    </td>
                                </tr>
                                <tr>
                                    <th class="col-2 vertical-align: middle; bg-light"><small>Bobot Penilaian</small></th>
                                    <td class="col-4 vertical-align: middle;">
                                        <small>
                                            <i class="fa-solid fa-square-poll-vertical fa-lg px-1"></i>
                                            <label for="" id="bobot_nilai"></label>
                                        </small>
                                    </td>
                                    <th class="col-2 vertical-align: middle; bg-light"><small>Teknis & Biaya</small></th>
                                    <td class="col-4 vertical-align: middle;">
                                        <small>
                                            <i class="fa-solid fa-square-poll-vertical fa-lg px-1"></i>
                                            <label for="" id="Bobot"></label>
                                        </small>
                                    </td>
                                </tr>
                                <tr>
                                    <th class="col-2 vertical-align: middle; bg-light"><small>Status Jadwal Pengadaan</small></th>
                                    <td class="col-4 vertical-align: middle;">
                                        <small>
                                            <i class="fa-solid fa-calendar-days fa-lg px-1"></i>
                                            <span class="badge bg-success">Tender Sedang Berjalan</span>
                                        </small>
                                    </td>
                                    <th class="col-2 vertical-align: middle; bg-light"><small>Detail Jadwal Pengadaan</small></th>
                                    <td class="col-4 vertical-align: middle;">
                                        <!-- <button type="button" class="btn btn-sm btn-success">
                                        <i class="fa-solid fa-calendar-days px-1"></i>
                                        Jadwal Pengadaan
                                    </button> -->
                                        <div id="detail_jadwal"></div>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="4">
                                        <div class="card border-dark shadow-lg">
                                            <div class="card-header bg-info border-dark bd-blue-700 d-flex justify-content-between align-items-center text-center">
                                                <div class="flex-grow-1 bd-highlight">
                                                    <span class="text-white">
                                                        <i class="fa-solid fa-file-circle-check px-1"></i>
                                                        <small><strong>Persyaratan Pengadaan</strong></small>
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="card-body">
                                                <table class="table table-bordered border-dark table-sm shadow-lg">
                                                    <thead>
                                                        <tr>
                                                            <th class="text-white bg-danger" style="text-align:center; vertical-align:middle;" colspan="2">
                                                                <small>Persyaratan Administrasi / Legalitas</small>
                                                            </th>
                                                        </tr>
                                                    </thead>
                                                    <thead>
                                                        <tr>
                                                            <th class="text-white bg-secondary" style="text-align:left; vertical-align:middle;">
                                                                <small>Jenis Persyaratan</small>
                                                            </th>
                                                            <th class="text-white bg-secondary" style="text-align:left; vertical-align:middle;">
                                                                <small>Keterangan Persyaratan</small>
                                                            </th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td>
                                                                <small>Kualifikasi Usaha</small>
                                                            </td>
                                                            <td>
                                                                <small><label for="" id="syarat_tender_kualifikasi"></label></small>
                                                            </td>
                                                        </tr>
                                                        <div id="siup_izin" style="display: none;">
                                                            <tr>
                                                                <td>
                                                                    <small>Surat Izin Usaha Perdagangan (SIUP)</small>
                                                                </td>
                                                                <td>
                                                                    <small><label for="" id="sts_masa_berlaku_siup"></label></small>
                                                                </td>
                                                            </tr>
                                                        </div>

                                                        <div id="nib_izin" style="display: none;">
                                                            <tr>
                                                                <td>
                                                                    <small>Nomor Induk Berusaha (NIB/TDP)</small>
                                                                </td>
                                                                <td>
                                                                    <small><label for="" id="sts_masa_berlaku_nib"></label></small>
                                                                </td>
                                                            </tr>
                                                        </div>

                                                        <div id="sbu_izin" style="display: none;">
                                                            <tr>
                                                                <td>
                                                                    <small>Sertifikat Badan Usaha (SBU)</small>
                                                                </td>
                                                                <td>
                                                                    <small><label for="" id="sts_masa_berlaku_sbu"></label></small>
                                                                </td>
                                                            </tr>
                                                        </div>

                                                        <div id="siujk_izin" style="display: none;">
                                                            <tr>
                                                                <td>
                                                                    <small>Surat Izin Jasa Konstruksi (SIUJK)</small>
                                                                </td>
                                                                <td>
                                                                    <small><label for="" id="sts_masa_berlaku_siujk"></label></small>
                                                                </td>
                                                            </tr>
                                                        </div>

                                                        <div id="skdp_izin" style="display: none;">
                                                            <tr>
                                                                <td>
                                                                    <small>Surat Keterangan Domisili Perusahan (SKDP)</small>
                                                                </td>
                                                                <td>
                                                                    <small><label for="" id="sts_masa_berlaku_skdp"></label></small>
                                                                </td>
                                                            </tr>
                                                        </div>
                                                    </tbody>
                                                </table>

                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <table class="table table-bordered border-dark table-sm shadow-lg">
                                                            <thead>
                                                                <tr>
                                                                    <th class="text-white bg-danger" style="text-align:center; vertical-align:middle;" colspan="2">
                                                                        <small>Persyaratan KBLI </small>
                                                                    </th>
                                                                </tr>
                                                            </thead>
                                                            <tbody id="load_kbli">

                                                            </tbody>
                                                        </table>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <table class="table table-bordered border-dark table-sm shadow-lg">
                                                            <thead>
                                                                <tr>
                                                                    <th class="text-white bg-danger" style="text-align:center; vertical-align:middle;" colspan="2">
                                                                        <small>Persyaratan SBU</small>
                                                                    </th>
                                                                </tr>
                                                            </thead>
                                                            <tbody id="load_sbu">

                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                                <table class="table table-bordered border-dark table-sm shadow-lg">
                                                    <thead>
                                                        <tr>
                                                            <th class="text-white bg-danger" style="text-align:center; vertical-align:middle;" colspan="2">
                                                                <small>Persyaratan Teknis</small>
                                                            </th>
                                                        </tr>
                                                    </thead>
                                                    <thead>
                                                        <tr>
                                                            <th class="text-white bg-secondary" style="text-align:left; vertical-align:middle;">
                                                                <small>Jenis Persyaratan</small>
                                                            </th>
                                                            <th class="text-white bg-secondary" style="text-align:left; vertical-align:middle;">
                                                                <small>Keterangan Persyaratan</small>
                                                            </th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <div id="spt_izin" style="display: none;">
                                                            <tr>
                                                                <td>
                                                                    <small>Surat Pemberitahuan Tahunan (SPT) Badan</small>
                                                                </td>
                                                                <td>
                                                                    <small><label for="" id="tahun_spt"></label></small>
                                                                </td>
                                                            </tr>
                                                        </div>
                                                        <div id="keuangan_izin" style="display: none;">
                                                            <tr>
                                                                <td>
                                                                    <small>Laporan Keuangan</small>
                                                                </td>
                                                                <td>
                                                                    <small><label for="" id="tahun_keuangan"></label></small>
                                                                </td>
                                                            </tr>
                                                        </div>
                                                        <!-- neraca -->
                                                        <div id="neraca_izin" style="display: none;">
                                                            <tr>
                                                                <td>
                                                                    <small>Neraca Keuangan</small>
                                                                </td>
                                                                <td>
                                                                    <small><label for="" id="tahun_neraca"></label></small>
                                                                </td>
                                                            </tr>
                                                        </div>
                                                    </tbody>
                                                </table>
                                                <table class="table table-bordered border-dark table-sm shadow-lg">
                                                    <thead>
                                                        <tr>
                                                            <th class="text-white bg-danger" style="text-align:center; vertical-align:middle;" colspan="3">
                                                                <small>Persyaratan Tambahan</small>
                                                            </th>
                                                        </tr>
                                                    </thead>
                                                    <thead>
                                                        <tr>
                                                            <th class="text-white bg-secondary" style="text-align:left; vertical-align:middle;">
                                                                <small>Keterangan Persyaratan</small>
                                                            </th>
                                                            <th class="text-white bg-secondary" style="text-align:left; vertical-align:middle;">
                                                                <small>Format Dokumen</small>
                                                            </th>
                                                        </tr>
                                                    </thead>
                                                    <tbody id="load_syarat_tambahan">
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </td>
                                </tr>

                            </table>
                        </div>
                    </div>
                </div>
                <div class="modal-footer justify-content-start">
                    <div id="tombol_mengikuti">

                    </div>
                    <button type="button" class="btn btn-default btn-danger" data-bs-dismiss="modal">
                        <i class="fa-solid fa-rectangle-xmark"></i>
                        Keluar
                    </button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" tabindex="-1" id="modal_detail_jadwal">
        <div class="modal-dialog modal-dialog-scrollable modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <a class="navbar-brand">
                        <img src="<?php echo base_url(); ?>/assets/brand/jm1.png" alt="" width="25" height="25" class="d-inline-block align-text-top">
                        <b><span class="text-primary">Jasamarga Tollroad Operator</span></b>
                    </a>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col">
                            <div class="card border-dark shadow-lg">
                                <div class="card-header border-dark bg-info bd-blue-700 d-flex justify-content-between align-items-center">
                                    <div class="flex-grow-1 bd-highlight">
                                        <span class="text-white">
                                            <i class="fa-regular fa-rectangle-list px-1"></i>
                                            <small><strong>Detail Jadwal</strong></small>
                                        </span>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <table class="table table-bordered table-sm shadow-lg">
                                        <thead class="bg-secondary text-white">
                                            <tr>
                                                <th><small>No</small></th>
                                                <th><small>Nama Jadwal</small></th>
                                                <th><small>Waktu Mulai</small></th>
                                                <th><small>Waktu Selesai</small></th>
                                                <th><small>Status Tahap</small></th>
                                            </tr>
                                        </thead>
                                        <tbody id="load_jadwal">

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer d-flex justify-content-start">
                    <button type="button" class="btn btn-default btn-danger" data-bs-dismiss="modal">
                        <i class="fa-solid fa-rectangle-xmark"></i>
                        Keluar
                    </button>
                </div>
            </div>
        </div>
    </div>
</main>