<main class="container-fluid">
    <div class="row">
        <hr>
        <div class="card border-dark bg-danger mt-3">
            <div class="card-header border-dark bg-gradient-color1">
                <h6 class="card-title">
                    <span class="text-white">
                        <i class="fa-solid fa-circle-info"></i>
                        <small><strong>Info Tender / Pengadaan</strong></small>
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
                        <small><strong>Data Tabel - Info Tender / Pengadaan</strong></small>
                    </span>
                </div>
            </div>
            <div class="card-body">
                <div class="card border-warning shadow-sm">
                    <div class="card-header">
                        <div class="nav nav-tabs mb-3 bg-info" id="nav-tab" role="tablist">
                            <button class="nav-link active text-dark" id="nav-tenderumum-tab" data-bs-toggle="tab" data-bs-target="#nav-tenderumum" type="button" role="tab" aria-controls="nav-tenderumum" aria-selected="true">
                                <i class="fa-solid fa-gift"></i>
                                <small><b>Tender Umum &nbsp;<span class="badge bg-secondary"><?= $count_tender_umum ?></span></b></small>
                            </button>
                            <button class="nav-link text-dark" id="nav-seleksiumum-tab" data-bs-toggle="tab" data-bs-target="#nav-seleksiumum" type="button" role="tab" aria-controls="nav-seleksiumum" aria-selected="true">
                                <i class="fa-solid fa-gift"></i>
                                <small><b>Seleksi Umum &nbsp;<span class="badge bg-secondary">4</span></b></small>
                            </button>
                            <button class="nav-link text-dark" id="nav-juksung-tab" data-bs-toggle="tab" data-bs-target="#nav-juksung" type="button" role="tab" aria-controls="nav-juksung" aria-selected="true">
                                <i class="fa-solid fa-gift"></i>
                                <small><b>Penunjukan Langsung &nbsp;<span class="badge bg-secondary">4</span></b></small>
                            </button>
                            <button class="nav-link text-dark" id="nav-tenderbatas-tab" data-bs-toggle="tab" data-bs-target="#nav-tenderbatas" type="button" role="tab" aria-controls="nav-tenderbatas" aria-selected="true">
                                <i class="fa-solid fa-gift"></i>
                                <small><b>Tender Terbatas &nbsp;<span class="badge bg-secondary">4</span></b></small>
                            </button>
                            <button class="nav-link text-dark" id="nav-selekterbatas-tab" data-bs-toggle="tab" data-bs-target="#nav-selekterbatas" type="button" role="tab" aria-controls="nav-selekterbatas" aria-selected="true">
                                <i class="fa-solid fa-gift"></i>
                                <small><b>Seleksi Terbatas &nbsp;<span class="badge bg-secondary">4</span></b></small>
                            </button>
                            <button class="nav-link text-dark" id="nav-penglangsung-tab" data-bs-toggle="tab" data-bs-target="#nav-penglangsung" type="button" role="tab" aria-controls="nav-penglangsung" aria-selected="true">
                                <i class="fa-solid fa-gift"></i>
                                <small><b>Pengadaan Langsung &nbsp;<span class="badge bg-secondary">4</span></b></small>
                            </button>
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
                                <table id="example1" class="table table-bordered border-dark table-sm table-striped">
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
                                        <tr>
                                            <td><small>2023</small></td>
                                            <td><small>Pengadaan Sewa Keamanan / Securty</small></td>
                                            <td><small>General Affair</small></td>
                                            <td><small>Jasa Lain</small></td>
                                            <td><small>1.300.000.000</small></td>
                                            <td><small><span class="badge bg-info">Pengumuman Tender</span></small></td>
                                            <td>
                                                <div class="text-center">
                                                    <button type="button" class="btn btn-info btn-sm shadow-lg" data-bs-toggle="modal" data-bs-target="#modal-xl-detail">
                                                        <i class="fa-solid fa-users-viewfinder"></i>
                                                        <small>Detail</small>
                                                    </button>
                                                </div>
                                            </td>
                                        </tr>
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
                                                    <div class="text-center">#</div>
                                                </small></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td><small>2023</small></td>
                                            <td><small>Pengadaan Sewa Keamanan / Securty</small></td>
                                            <td><small>General Affair</small></td>
                                            <td><small>Jasa Lain</small></td>
                                            <td><small>1.300.000.000</small></td>
                                            <td><small><span class="badge bg-success">Tender Sedang Berlangsung</span></small></td>
                                            <td>
                                                <div class="text-center">
                                                    <button type="button" class="btn btn-info btn-sm shadow-lg" data-bs-toggle="modal" data-bs-target="#modal-xl-detail">
                                                        <i class="fa-solid fa-users-viewfinder"></i>
                                                        <small>Detail</small>
                                                    </button>
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="tab-pane fade" id="nav-juksung" role="tabpanel" aria-labelledby="nav-juksung-tab">
                                <div class="card border-dark">
                                    <div class="card-header border-dark bg-primary d-flex justify-content-between align-items-center">
                                        <div class="flex-grow-1 bd-highlight">
                                            <span class="text-white">
                                                <i class="fa-solid fa-circle-info px-1"></i>
                                                <small><strong>Transaksi Penunjukan Langsung</strong></small>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <table id="example5" class="table table-bordered border-dark table-sm table-striped">
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
                                        <tr>
                                            <td><small>2023</small></td>
                                            <td><small>Pengadaan Sewa Keamanan / Securty</small></td>
                                            <td><small>General Affair</small></td>
                                            <td><small>Jasa Lain</small></td>
                                            <td><small>1.300.000.000</small></td>
                                            <td><small><span class="badge bg-danger">Tender Sudah Selesai</span></small></td>
                                            <td>
                                                <div class="text-center">
                                                    <button type="button" class="btn btn-info btn-sm shadow-lg" data-bs-toggle="modal" data-bs-target="#modal-xl-detail">
                                                        <i class="fa-solid fa-users-viewfinder"></i>
                                                        <small>Detail</small>
                                                    </button>
                                                </div>
                                            </td>
                                        </tr>
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
                                <table id="example7" class="table table-bordered border-dark table-sm table-striped">
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
                                        <tr>
                                            <td><small>2023</small></td>
                                            <td><small>Pengadaan Sewa Keamanan / Securty</small></td>
                                            <td><small>General Affair</small></td>
                                            <td><small>Jasa Lain</small></td>
                                            <td><small>1.300.000.000</small></td>
                                            <td><small><span class="badge bg-danger">Tender Sudah Selesai</span></small></td>
                                            <td>
                                                <div class="text-center">
                                                    <button type="button" class="btn btn-info btn-sm shadow-lg" data-bs-toggle="modal" data-bs-target="#modal-xl-detail">
                                                        <i class="fa-solid fa-users-viewfinder"></i>
                                                        <small>Detail</small>
                                                    </button>
                                                </div>
                                            </td>
                                        </tr>
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
                                        <tr>
                                            <td><small>2023</small></td>
                                            <td><small>Pengadaan Sewa Keamanan / Securty</small></td>
                                            <td><small>General Affair</small></td>
                                            <td><small>Jasa Lain</small></td>
                                            <td><small>1.300.000.000</small></td>
                                            <td><small><span class="badge bg-danger">Tender Sudah Selesai</span></small></td>
                                            <td>
                                                <div class="text-center">
                                                    <button type="button" class="btn btn-info btn-sm shadow-lg" data-bs-toggle="modal" data-bs-target="#modal-xl-detail">
                                                        <i class="fa-solid fa-users-viewfinder"></i>
                                                        <small>Detail</small>
                                                    </button>
                                                </div>
                                            </td>
                                        </tr>
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
                                        <tr>
                                            <td><small>2023</small></td>
                                            <td><small>Pengadaan Sewa Keamanan / Securty</small></td>
                                            <td><small>General Affair</small></td>
                                            <td><small>Jasa Lain</small></td>
                                            <td><small>1.300.000.000</small></td>
                                            <td><small><span class="badge bg-danger">Tender Sudah Selesai</span></small></td>
                                            <td>
                                                <div class="text-center">
                                                    <button type="button" class="btn btn-info btn-sm shadow-lg" data-bs-toggle="modal" data-bs-target="#modal-xl-detail">
                                                        <i class="fa-solid fa-users-viewfinder"></i>
                                                        <small>Detail</small>
                                                    </button>
                                                </div>
                                            </td>
                                        </tr>
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
                                    <small><strong>List Data - Paket Penyedia</strong></small>
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
                                            CP.101.2023.0001
                                        </small>
                                    </td>
                                    <th class="col-2 vertical-align: middle; bg-light"><small>Tahun</small></th>
                                    <td class="col-4 vertical-align: middle;">
                                        <small>
                                            <i class="fa-solid fa-calendar-days px-1"></i>
                                            2023
                                        </small>
                                    </td>
                                </tr>
                                <tr>
                                    <th class="col-2 vertical-align: middle; bg-light"><small>Nama Peket Penyedia</small></th>
                                    <td class="col-10 vertical-align: middle;" colspan="3">
                                        <small>
                                            <i class="fa-solid fa-keyboard px-1"></i>
                                            Pengadaan Sewa Keamanan / Securty
                                        </small>
                                    </td>
                                </tr>
                                <tr>
                                    <th class="col-2 vertical-align: middle; bg-light"><small>Detail Lokasi Pekerjaan</small></th>
                                    <td class="col-10 vertical-align: middle;" colspan="3">
                                        <small>
                                            <i class="fa-solid fa-map-location px-1"></i>
                                            Jakarta Timur Jl. TMII No.11
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
                                            General Affair
                                        </small>
                                    </td>
                                    <th class="col-2 vertical-align: middle; bg-light"><small>Sections</small></th>
                                    <td class="col-4 vertical-align: middle;">
                                        <small>
                                            <i class="fa-solid fa-map px-1"></i>
                                            Procurement
                                        </small>
                                    </td>
                                </tr>
                                <tr>
                                    <th class="col-2 vertical-align: middle; bg-light"><small>Jenis Pengadaan</small></th>
                                    <td class="col-4 vertical-align: middle;">
                                        <small>
                                            <i class="fa-solid fa-briefcase px-1"></i>
                                            Jasa Lain
                                        </small>
                                    </td>
                                    <th class="col-2 vertical-align: middle; bg-light"><small>Metode Pengadaan</small></th>
                                    <td class="col-4 vertical-align: middle;">
                                        <small>
                                            <i class="fa-solid fa-business-time px-1"></i>
                                            Tender Umum
                                        </small>
                                    </td>
                                </tr>
                                <tr>
                                    <th class="col-2 vertical-align: middle; bg-light"><small>Metode Pemilhan</small></th>
                                    <td class="col-4 vertical-align: middle;">
                                        <small>
                                            <i class="fa-regular fa-folder-open px-1"></i>
                                            Prakualifikasi
                                        </small>
                                    </td>
                                    <th class="col-2 vertical-align: middle; bg-light"><small>Dokumen Pemilihan</small></th>
                                    <td class="col-4 vertical-align: middle;">
                                        <small>
                                            <i class="fa-solid fa-folder-tree px-1"></i>
                                            Dua File
                                        </small>
                                    </td>
                                </tr>
                                <tr>
                                    <th class="col-2 vertical-align: middle; bg-light"><small>Tanggal Pengadaan</small></th>
                                    <td class="col-4 vertical-align: middle;">
                                        <small>
                                            <i class="fa-solid fa-calendar-days px-1"></i>
                                            dd/mm/yyyy - dd/mm/yyyy
                                        </small>
                                    </td>
                                    <th class="col-2 vertical-align: middle; bg-light"><small>Waktu Pelaksana (hari)</small></th>
                                    <td class="col-4 vertical-align: middle;">
                                        <small>
                                            <i class="fa-solid fa-clock px-1"></i>
                                            180
                                        </small>
                                    </td>
                                </tr>
                                <tr>
                                    <th class="col-2 vertical-align: middle; bg-light"><small>TKDN/PDN/Import</small></th>
                                    <td class="col-4 vertical-align: middle;">
                                        <small>
                                            <i class="fa-regular fa-clipboard px-1 fa-lg"></i>
                                            TKDN
                                        </small>
                                    </td>
                                    <th class="col-2 vertical-align: middle; bg-light"><small>Persentase</small></th>
                                    <td class="col-4 vertical-align: middle;">
                                        <small>
                                            <i class="fa-solid fa-percent px-1"></i>
                                            75
                                        </small>
                                    </td>
                                </tr>
                                <tr>
                                    <th class="col-2 vertical-align: middle; bg-light"><small>HPS</small></th>
                                    <td class="col-4 vertical-align: middle;">
                                        <small>
                                            <i class="fa-solid fa-rupiah-sign px-1"></i>
                                            1.250.000.000
                                        </small>
                                    </td>
                                    <th class="col-2 vertical-align: middle; bg-light"><small>Dokumen HPS</small></th>
                                    <td class="col-4 vertical-align: middle;">
                                        <button type="button" class="btn btn-sm btn-primary">
                                            <i class="fa-solid fa-file px-1"></i>
                                            File Dokumen HPS
                                        </button>
                                    </td>
                                </tr>
                                <tr>
                                    <th class="col-2 vertical-align: middle; bg-light"><small>Jenis Kontrak</small></th>
                                    <td class="col-4 vertical-align: middle;">
                                        <small>
                                            <i class="fa-solid fa-pen-to-square px-1"></i>
                                            Lump Sum
                                        </small>
                                    </td>
                                    <th class="col-2 vertical-align: middle; bg-light"><small>Beban Tahun Anggaran</small></th>
                                    <td class="col-4 vertical-align: middle;">
                                        <small>
                                            <i class="fa-regular fa-calendar px-1"></i>
                                            Tahun Tunggal
                                        </small>
                                    </td>
                                </tr>
                                <tr>
                                    <th class="col-2 vertical-align: middle; bg-light"><small>Bobot Penilaian</small></th>
                                    <td class="col-4 vertical-align: middle;">
                                        <small>
                                            <i class="fa-solid fa-square-poll-vertical fa-lg px-1"></i>
                                            Kombinasi
                                        </small>
                                    </td>
                                    <th class="col-2 vertical-align: middle; bg-light"><small>Teknis & Biaya</small></th>
                                    <td class="col-4 vertical-align: middle;">
                                        <small>
                                            <i class="fa-solid fa-square-poll-vertical fa-lg px-1"></i>
                                            10 &#37; &amp; 90 &#37;
                                        </small>
                                    </td>
                                </tr>
                                <tr>
                                    <th class="col-2 vertical-align: middle; bg-light"><small>Status Jadwal Tender</small></th>
                                    <td class="col-4 vertical-align: middle;">
                                        <small>
                                            <i class="fa-solid fa-calendar-days fa-lg px-1"></i>
                                            <span class="badge bg-success">Tender Sedang Berjalan</span>
                                        </small>
                                    </td>
                                    <th class="col-2 vertical-align: middle; bg-light"><small>Detail Jadwal Tender</small></th>
                                    <td class="col-4 vertical-align: middle;">
                                        <button type="button" class="btn btn-sm btn-success">
                                            <i class="fa-solid fa-calendar-days px-1"></i>
                                            Jadwal Tender
                                        </button>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="4">
                                        <div class="card border-dark shadow-lg">
                                            <div class="card-header bg-info border-dark bd-blue-700 d-flex justify-content-between align-items-center text-center">
                                                <div class="flex-grow-1 bd-highlight">
                                                    <span class="text-white">
                                                        <i class="fa-solid fa-file-circle-check px-1"></i>
                                                        <small><strong>Persyaratan Tender / Pengadaan</strong></small>
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
                                                                <small>Minimal Menengah</small>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <small>Nomor Induk Berusaha (NIB)</small>
                                                            </td>
                                                            <td>
                                                                <small>dd/mm/yyyy</small>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <small>KBLI</small>
                                                            </td>
                                                            <td>
                                                                <small>66209 || Jasa Komputer Lainnya</small>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
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
                                                        <tr>
                                                            <td>
                                                                <small>Kualifikasi Usaha</small>
                                                            </td>
                                                            <td>
                                                                <small>Minimal Menengah</small>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <small>Nomor Induk Berusaha (NIB)</small>
                                                            </td>
                                                            <td>
                                                                <small>dd/mm/yyyy</small>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <small>KBLI</small>
                                                            </td>
                                                            <td>
                                                                <small>66209 || Jasa Komputer Lainnya</small>
                                                            </td>
                                                        </tr>
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
                                                                <small>Jenis Persyaratan</small>
                                                            </th>
                                                            <th class="text-white bg-secondary" style="text-align:left; vertical-align:middle;">
                                                                <small>Keterangan Persyaratan</small>
                                                            </th>
                                                            <th class="text-white bg-secondary" style="text-align:left; vertical-align:middle;">
                                                                <small>Format Dokumen</small>
                                                            </th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td>
                                                                <small>Kualifikasi Usaha</small>
                                                            </td>
                                                            <td>
                                                                <small>Minimal Menengah</small>
                                                            </td>
                                                            <td>
                                                                <button type="button" class="btn btn-sm btn-success">
                                                                    <i class="fa-solid fa-file px-1"></i>
                                                                    Nama File Dokumen
                                                                </button>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <small>Nomor Induk Berusaha (NIB)</small>
                                                            </td>
                                                            <td>
                                                                <small>dd/mm/yyyy</small>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <small>KBLI</small>
                                                            </td>
                                                            <td>
                                                                <small>66209 || Jasa Komputer Lainnya</small>
                                                            </td>
                                                        </tr>
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
                    <a type="button" class="btn btn-default btn-warning" href="<?= base_url('tender_diikuti/informasi_tender') ?>">
                        <i class="fa-solid fa-circle-up px-1"></i>
                        Halaman Paket Penyedia
                    </a>
                    <button type="button" class="btn btn-default btn-danger" data-bs-dismiss="modal">
                        <i class="fa-solid fa-rectangle-xmark"></i>
                        Keluar
                    </button>
                </div>
            </div>
        </div>
    </div>
</main>