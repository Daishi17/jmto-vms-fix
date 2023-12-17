<?php if ($this->session->userdata('token_vendor') == $rup['token_vendor']) { ?>
    <main class="container-fluid">
        <div class="row">
            <div class="col">
                <hr>
                <div class="card border-dark">
                    <div class="card-header border-dark bg-white text-black">
                        <div class="card">
                            <div class="card-header bg-primary text-white">
                                <h4>Informasi Pengadaan</h4>
                            </div>
                            <div class="card-body">
                                <table class="table table-bordered">
                                    <tr>
                                        <th>Nama Paket</th>
                                        <td><?= $rup['nama_rup'] ?></td>
                                    </tr>
                                    <tr>
                                        <th>Nama Jenis Pengadaan</th>
                                        <td><?= $rup['nama_jenis_pengadaan'] ?></td>

                                    </tr>
                                    <tr>
                                        <th>Nama Metode Pemilihan </th>
                                        <td><?= $rup['nama_metode_pengadaan'] ?></td>
                                    </tr>
                                    <tr>
                                        <th>Bobot Teknis </th>
                                        <td><?= $rup['bobot_teknis'] ?></td>
                                    </tr>
                                    <tr>
                                        <th>Bobot Biaya </th>
                                        <td><?= $rup['bobot_biaya'] ?></td>
                                    </tr>
                                    <tr>
                                        <th>HPS</th>
                                        <td>Rp. <?= number_format($rup['total_hps_rup'], 2, ',', '.'); ?></td>
                                    </tr>
                                    <tr>
                                        <th>Persentase TKDN</th>
                                        <td><?= $rup['persen_pencatatan'] ?> %</td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                        <br>
                        <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                            <?php if (date('Y-m-d H:i', strtotime($jadwal_upload_dokumen_penawaran['waktu_mulai']))  >= date('Y-m-d H:i')) { ?>
                                <div class="tab-pane fade show active" id="pills-file1" role="tabpanel" aria-labelledby="pills-home-tab">
                                    <div class="card">
                                        <div class="card-header bg-danger text-white">
                                            Belum Memasuki Tahap Ini
                                        </div>
                                    </div>
                                </div>

                            <?php    } else if (date('Y-m-d H:i', strtotime($jadwal_upload_dokumen_penawaran['waktu_selesai'])) >= date('Y-m-d H:i') || date('Y-m-d H:i', strtotime($jadwal_upload_dokumen_penawaran['waktu_mulai'])) == date('Y-m-d H:i')) { ?>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-file1" type="button" role="tab" aria-controls="pills-home" aria-selected="true">Dokumen Pengadaan File I</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-file2" type="button" role="tab" aria-controls="pills-profile" aria-selected="false">Dokumen Penawaran File II</button>
                                </li>

                            <?php    } else { ?>
                                <div class="tab-pane fade show active" id="pills-file1" role="tabpanel" aria-labelledby="pills-home-tab">
                                    <div class="card">
                                        <div class="card-header bg-danger text-white">
                                            Tahap Upload Dokumen Penawaran Sudah Selesai!
                                        </div>
                                    </div>
                                </div>
                            <?php    } ?>


                        </ul>

                    </div>
                </div>
                <hr>
                <div class="card border-dark">
                    <div class="card-header border-dark bg-primary d-flex justify-content-between align-items-center">
                        <div class="flex-grow-1 bd-highlight">
                            <span class="text-dark">
                                <small class="text-white"><strong><i class="fa-solid fa-table px-1"></i> Data Tabel - Dokumen Pengadaan</strong></small>
                            </span>
                        </div>
                    </div>
                    <div class="card-body">
                        <?php if (date('Y-m-d H:i', strtotime($jadwal_upload_dokumen_penawaran['waktu_mulai']))  >= date('Y-m-d H:i')) { ?>
                            <div class="tab-pane fade show active" id="pills-file1" role="tabpanel" aria-labelledby="pills-home-tab">
                                <div class="card">
                                    <div class="card-header bg-danger text-white">
                                        Belum Memasuki Tahap Ini
                                    </div>
                                </div>
                            </div>

                        <?php    } else if (date('Y-m-d H:i', strtotime($jadwal_upload_dokumen_penawaran['waktu_selesai'])) >= date('Y-m-d H:i') || date('Y-m-d H:i', strtotime($jadwal_upload_dokumen_penawaran['waktu_mulai'])) == date('Y-m-d H:i')) { ?>
                            <div class="tab-content" id="pills-tabContent">

                                <div class="tab-pane fade show active" id="pills-file1" role="tabpanel" aria-labelledby="pills-home-tab">
                                    <div class="card">
                                        <div class="card-header bg-primary text-white">
                                            Dokumen Pengadaan File I
                                            <div style="float: right;">

                                            </div>

                                        </div>
                                        <div class="card-body">
                                            <table class="table table-stripped table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th>Nama File</th>
                                                        <th>File</th>
                                                        <th>Aksi</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="load_dok_file1_statis">

                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="pills-file2" role="tabpanel" aria-labelledby="pills-profile-tab">
                                    <div class="card">
                                        <div class="card-header bg-danger text-white">
                                            Dokumen Penawaran File II
                                        </div>
                                        <div class="card-body">
                                            <table class="table table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th>Nama File</th>
                                                        <th>File</th>
                                                        <th>Aksi</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="load_dok_file2_statis">

                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        <?php    } else { ?>
                            <div class="tab-pane fade show active" id="pills-file1" role="tabpanel" aria-labelledby="pills-home-tab">
                                <div class="card">
                                    <div class="card-header bg-danger text-white">
                                        Tahap Upload Dokumen Penawaran Sudah Selesai!
                                    </div>
                                </div>
                            </div>
                        <?php    } ?>

                    </div>
                </div>
            </div>
    </main>

    <div class="modal fade" id="upload_dok_file_1" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Upload Dokumen Pengadaan File I</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="form_upload_dok_penawaran_1" action="javascript:;" enctype="multipart/form-data">
                    <div class="modal-body">
                        <input type="hidden" name="id_vendor_mengikuti_paket">
                        <input type="hidden" name="type_post">
                        <input type="hidden" name="id_rup" value="<?= $rup['id_rup'] ?>">
                        <input type="hidden" name="id_url_rup" value="<?= $rup['id_url_rup'] ?>">
                        <input type="hidden" name="id_vendor" value="<?= $this->session->userdata('id_vendor') ?>">
                        <div class="form-group">
                            <label for="">Nama File</label>
                            <input type="text" name="nama_dokumen" class="form-control" placeholder="Nama File" aria-describedby="helpId" readonly>
                        </div>
                        <br>
                        <label for="">File Dokumen</label>
                        <div class="input-group">
                            <input type="file" class="form-control" accept=".xlsx, .xls, .pdf" name="file_dokumen_pengadaan_vendor">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary btn-upload">Upload</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="upload_dok_file_2" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Upload Dokumen Penawaran File II</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="form_upload_dok_penawaran_2" action="javascript:;" enctype="multipart/form-data">
                    <div class="modal-body">
                        <input type="hidden" name="id_vendor_mengikuti_paket">
                        <input type="hidden" name="type_post">
                        <input type="hidden" name="id_rup" value="<?= $rup['id_rup'] ?>">
                        <input type="hidden" name="id_url_rup" value="<?= $rup['id_url_rup'] ?>">
                        <input type="hidden" name="id_vendor" value="<?= $this->session->userdata('id_vendor') ?>">
                        <div class="form-group">
                            <label for="">Nama File</label>
                            <input type="text" name="nama_dokumen" class="form-control" placeholder="Nama File" aria-describedby="helpId" readonly>
                        </div>
                        <br>
                        <label for="">File Dokumen</label>
                        <div class="input-group">
                            <input type="file" class="form-control" accept=".xlsx, .xls, .pdf" id="file_dokumen_pengadaan_vendor2" name="file_dokumen_pengadaan_vendor">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary btn-upload">Upload</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

<?php } else { ?>
    <main class="container-fluid">
        <br>
        <div class="row">
            <div class="alert alert-primary d-flex align-items-center" role="alert">
                <div>
                    <i class="fa fa-info-circle" aria-hidden="true"></i> Anda Tidak Dapat Mengakses Halaman Ini !!!
                </div>
                <br>
            </div>
            <div class="col-md-5">

            </div>
            <div class="col-md-3">
                <a class="btn btn-primary" href="<?= base_url('tender_diikuti/informasi_tender/') . $rup['id_url_rup'] ?>"> Kembali Ke Informasi Pengadaan</a>
            </div>
            <div class="col-md-4">

            </div>
        </div>
    </main>
<?php }
?>