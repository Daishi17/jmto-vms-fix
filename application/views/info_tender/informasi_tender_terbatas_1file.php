<!-- url -->
<input type="hidden" name="url_detail_paket" value="<?= base_url('tender_terundang/detail_paket/') ?>">
<input type="hidden" name="id_rup" value="<?= $rup['id_rup'] ?>">
<input type="hidden" name="id_vendor" value="<?= $this->session->userdata('id_vendor') ?>">
<input type="hidden" name="url_upload_syarat_tambahan" value="<?= base_url('tender_diikuti/upload_syarat_tambahan/') ?>">
<input type="hidden" name="url_get_syarat_tambahan_vendor" value="<?= base_url('tender_diikuti/get_syarat_tambahan/') ?>">
<input type="hidden" name="url_download_syarat_tambahan" value="<?= base_url('tender_diikuti/download_syarat_tambahan/') ?>">
<input type="hidden" name="url_hapus_persyaratan_tambahan" value="<?= base_url('tender_diikuti/hapus_syarat_tambahan/') ?>">
<!-- buka_penawaran -->
<input type="hidden" name="url_buka_penawaran" value="<?= base_url('tender_diikuti/acces_penawaran') ?>">
<input type="hidden" name="url_buka_penawaran_token" value="<?= base_url('tender_diikuti/buka_penawaran/') ?>">
<input type="hidden" name="url_dapatkan_token_penawaran" value="<?= base_url('tender_diikuti/kirim_token_penawaran') ?>">

<!-- end url -->
<main class="container">
    <div class="row">
        <div class="col">
            <div class="card" style="position: fixed; top:100px;z-index:999;width:85%;">
                <div class="card-header bg-white text-black">
                    <ul class="nav nav-tabs">
                        <li class="nav-item">
                            <small>
                                <a class="nav-link active" style="margin-left: 5px;" href="#"><i class="fa fa-columns" aria-hidden="true"></i> Informasi Pengadaan</a>
                            </small>
                        </li>
                        <li class="nav-item">
                            <small>
                                <a class="nav-link bg-primary text-white" style="margin-left: 5px;" href="<?= base_url('tender_diikuti/aanwijzing/' . $rup['id_url_rup']) ?>"><i class="fa fa-comments" aria-hidden="true"></i> Aanwijzing (PQ)</a>
                            </small>
                        </li>
                        <li class="nav-item">
                            <small>
                                <a class="nav-link bg-primary text-white " style="margin-left: 5px;" href="<?= base_url('tender_diikuti/sanggahan_prakualifikasi/'  . $rup['id_url_rup']) ?>"><i class="fa fa-hourglass-start" aria-hidden="true"></i> Sanggahan Kualifikasi</a>
                            </small>
                        </li>

                        <li class="nav-item">
                            <small>
                                <a class="nav-link bg-primary text-white" style="margin-left: 5px;" href="<?= base_url('tender_diikuti/aanwijzing_penawaran/' . $rup['id_url_rup']) ?>"><i class="fa fa-comments" aria-hidden="true"></i> Aanwijzing (Penawaran)</a>
                            </small>
                        </li>
                        <li class="nav-item">
                            <small>
                                <a class="nav-link bg-primary text-white" style="margin-left: 5px;" href="<?= base_url('tender_diikuti/negosiasi/' . $rup['id_url_rup']) ?>"><i class="fa fa-tags" aria-hidden="true"></i> Negosiasi</a>
                            </small>
                        </li>
                        <li class="nav-item">
                            <small>
                                <a class="nav-link bg-primary text-white" style="margin-left: 5px;" href="<?= base_url('tender_diikuti/sanggahan_akhir/'  . $rup['id_url_rup']) ?>"><i class="fa fa-hourglass-start" aria-hidden="true"></i> Sanggahan Pemenang </a>
                            </small>
                        </li>
                    </ul>
                </div>
            </div>
            <hr>
            <br>
            <div class="card border-dark">
                <div class="card-header border-dark bg-primary d-flex justify-content-between align-items-center">
                    <div class="flex-grow-1 bd-highlight">
                        <span class="text-dark">
                            <small class="text-white"><strong><i class="fa-solid fa-table px-1"></i> Data Tabel - Info Pengadaan</strong></small>
                        </span>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-striped table-bordered">
                        <tr>
                            <th style="width: 300px;"> Kode Pengadaan</th>
                            <th> <?= $rup['kode_rup'] ?></th>
                        </tr>
                        <tr>
                            <th> Nama Paket</th>
                            <th><?= $rup['nama_rup'] ?></th>
                        </tr>
                        <tr>
                            <th>Nilai HPS</th>
                            <th>Rp. <?= number_format($rup['total_hps_rup'], 2, ",", "."); ?> </th>
                        </tr>
                        <tr>
                            <th> Persentase TKDN </th>
                            <th><?= number_format($rup['persen_pencatatan'], 2, ",", "."); ?> % (<?= $rup['status_pencatatan'] ?>)</th>
                        </tr>
                        <tr>
                            <th>Jangka Waktu Pelaksanaan Pekerjaan</th>
                            <th><?= $rup['jangka_waktu_hari_pelaksanaan'] ?> Hari Kalender</th>
                        </tr>
                        <tr>
                            <th>Jadwal Pengadaan</th>
                            <th><a href="javascript:;" onclick="lihat_detail_jadwal('<?= $rup['id_url_rup'] ?>')" class="btn btn-sm btn-primary"><i class="fa-solid fa-calendar-days px-1"></i> Detail Jadwal Pengadaan</a></th>
                        </tr>
                        <tr>
                            <th>Jumlah Peserta Kualifikasi</th>
                            <th><button type="button" class="btn btn-sm btn-primary">
                                    <i class="fa fa-users" aria-hidden="true"></i> <?= count($peserta) ?> Peserta
                                </button></th>
                        </tr>
                        <tr>
                            <th>Dokumen Kualifikasi</th>
                            <th>
                                <div class="row">
                                    <?php if (date('Y-m-d H:i', strtotime($jadwal_dokumen_kualifikasi['waktu_selesai'])) >= date('Y-m-d H:i') || date('Y-m-d H:i', strtotime($jadwal_pengumuman_pengadaan['waktu_mulai'])) == date('Y-m-d H:i')) { ?>
                                        <?php if (date('Y-m-d H:i', strtotime($jadwal_pengumuman_pengadaan['waktu_mulai'])) >= date('Y-m-d H:i')) { ?>
                                        <?php    } else if (date('Y-m-d H:i', strtotime($jadwal_dokumen_kualifikasi['waktu_selesai'])) >= date('Y-m-d H:i') || date('Y-m-d H:i', strtotime($jadwal_pengumuman_pengadaan['waktu_mulai']))  == date('Y-m-d H:i')) { ?>
                                            <div class="col-md-6">
                                                <div class="card">
                                                    <div class="card-header bg-primary text-white">
                                                        Dokumen Kualifikasi
                                                    </div>
                                                    <div class="card-body">
                                                        <table class="table table-bordered">
                                                            <thead>
                                                                <tr>
                                                                    <th>No</th>
                                                                    <th>Nama File</th>
                                                                    <th>File</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <?php $i = 1;
                                                                foreach ($dok_prakualifikasi as $key => $value) { ?>
                                                                    <tr>
                                                                        <td scope="row"><?= $i++ ?></td>
                                                                        <td><?= $value['nama_dok_prakualifikasi'] ?></td>
                                                                        <td>
                                                                            <a href="<?= $url_dok_prakualifikasi . $value['file_dok_prakualifikasi'] ?>" class="btn btn-sm btn-danger"><i class="fas fa fa-file"></i> Download</a>
                                                                            <?php if ($value['sts_dokumen_tambahan'] == 1) { ?>
                                                                                <a href="javascript:;" onclick="modal_lihat_keterangan_dokumen_perubahan('<?= $value['keterangan_dokumen'] ?>')" class="btn btn-sm btn-warning"><i class="fas fa fa-file"></i> Keterangan Perubahan Dokumen</a>
                                                                            <?php } else { ?>

                                                                            <?php  }
                                                                            ?>
                                                                        </td>
                                                                    </tr>
                                                                <?php } ?>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php    } else { ?>
                                            <!-- waktu Telah Selesai -->
                                        <?php    } ?>
                                    <?php } else { ?>
                                        <div class="col-md-6">
                                            <div class="card">
                                                <div class="card-header bg-primary text-white">
                                                    Dokumen Kualifikasi
                                                </div>
                                                <div class="card-body">
                                                    <table class="table table-bordered">
                                                        <thead>
                                                            <tr>
                                                                <th>No</th>
                                                                <th>Nama File</th>
                                                                <th>File</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td colspan="3"><span class="badge bg-danger"> Tahap Sudah Selesai!</span></td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    <?php } ?>
                                </div>
                            </th>
                        </tr>
                        <tr>
                            <th>Surat Pernyataan dan Persyaratan Tambahan</th>
                            <th>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="card">
                                            <div class="card-header bg-primary text-white">
                                                Surat Pernyataan
                                            </div>
                                            <div class="card-body">
                                                <table class="table table-bordered">
                                                    <thead>
                                                        <tr>
                                                            <th>No</th>
                                                            <th>Status Persetujuan</th>
                                                            <th>Surat Pernyataan</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td>1</td>

                                                            <td>
                                                                <?php if ($get_row_mengikuti['sts_suratpernyataan_1'] == 1) { ?>
                                                                    <span class="badge bg-success">Sudah Menyetujui Pakta Integritas</span>
                                                                <?php } else { ?>
                                                                    <span class="badge bg-danger">Silahkan Disetujui (Klik Nama Surat Pernyataan, Tombol Persetujuan Ada Pada Dalam Surat)</span>
                                                                <?php } ?>
                                                            </td>
                                                            <td>
                                                                <?php if (date('Y-m-d H:i', strtotime($jadwal_upload_dokumen_prakualifikasi['waktu_mulai']))  >= date('Y-m-d H:i')) { ?>
                                                                <?php    } else if (date('Y-m-d H:i', strtotime($jadwal_upload_dokumen_prakualifikasi['waktu_selesai'])) >= date('Y-m-d H:i') || date('Y-m-d H:i', strtotime($jadwal_upload_dokumen_prakualifikasi['waktu_mulai'])) == date('Y-m-d H:i')) { ?>
                                                                    <small><a href="<?= base_url('tender_diikuti/pakta_integritas/' . $rup['id_url_rup']) ?>" target="_blank" class="btn btn-danger"><i class="fa fa-file"></i> PAKTA INTEGRITAS</a></small>
                                                                <?php  } else { ?>

                                                                    <label for="" class="badge bg-secondary">Tahap Sudah Selesai</label>

                                                                <?php } ?>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>2</td>
                                                            <td>
                                                                <?php if ($get_row_mengikuti['sts_suratpernyataan_2'] == 1) { ?>
                                                                    <span class="badge bg-success">Sudah Menyetujui Surat Pernyataan Minat</span>
                                                                <?php } else { ?>
                                                                    <span class="badge bg-danger">Silahkan Disetujui (Klik Nama Surat Pernyataan, Tombol Persetujuan Ada Pada Dalam Surat)</span>
                                                                <?php } ?>
                                                            </td>
                                                            <td>
                                                                <?php if (date('Y-m-d H:i', strtotime($jadwal_upload_dokumen_prakualifikasi['waktu_mulai']))  >= date('Y-m-d H:i')) { ?>
                                                                <?php    } else if (date('Y-m-d H:i', strtotime($jadwal_upload_dokumen_prakualifikasi['waktu_selesai'])) >= date('Y-m-d H:i') || date('Y-m-d H:i', strtotime($jadwal_upload_dokumen_prakualifikasi['waktu_mulai'])) == date('Y-m-d H:i')) { ?>
                                                                    <small><a href="<?= base_url('tender_diikuti/surat_pernyataan_minat/' . $rup['id_url_rup']) ?>" target="_blank" class="btn btn-danger"><i class="fa fa-file"></i> SURAT PERNYATAAN MINAT </a></small>
                                                                <?php  } else { ?>

                                                                    <label for="" class="badge bg-secondary">Tahap Sudah Selesai</label>

                                                                <?php } ?>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>3</td>
                                                            <td>
                                                                <?php if ($get_row_mengikuti['sts_suratpernyataan_3'] == 1) { ?>
                                                                    <span class="badge bg-success">Sudah Menyetujui Surat Pernyataan Kebenaran Data</span>
                                                                <?php } else { ?>
                                                                    <span class="badge bg-danger">Silahkan Disetujui (Klik Nama Surat Pernyataan, Tombol Persetujuan Ada Pada Dalam Surat)</span>
                                                                <?php } ?>
                                                            </td>
                                                            <td>
                                                                <?php if (date('Y-m-d H:i', strtotime($jadwal_upload_dokumen_prakualifikasi['waktu_mulai']))  >= date('Y-m-d H:i')) { ?>
                                                                <?php    } else if (date('Y-m-d H:i', strtotime($jadwal_upload_dokumen_prakualifikasi['waktu_selesai'])) >= date('Y-m-d H:i') || date('Y-m-d H:i', strtotime($jadwal_upload_dokumen_prakualifikasi['waktu_mulai'])) == date('Y-m-d H:i')) { ?>
                                                                    <small><a href="<?= base_url('tender_diikuti/surat_kebenaran_data/' . $rup['id_url_rup']) ?>" target="_blank" class="btn btn-danger"><i class="fa fa-file"></i> SURAT PERNYATAAN KEBENARAN DATA <br> DALAM FORMULIR ISIAN KUALIFIKASI</a></small>
                                                                <?php  } else { ?>

                                                                    <label for="" class="badge bg-secondary">Tahap Sudah Selesai</label>

                                                                <?php } ?>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>4</td>
                                                            <td>
                                                                <?php if ($get_row_mengikuti['sts_suratpernyataan_4'] == 1) { ?>
                                                                    <span class="badge bg-success">Sudah Menyetujui Surat Pernyataan </span>
                                                                <?php } else { ?>
                                                                    <span class="badge bg-danger">Silahkan Disetujui (Klik Nama Surat Pernyataan, Tombol Persetujuan Ada Pada Dalam Surat)</span>
                                                                <?php } ?>
                                                            </td>
                                                            <td>
                                                                <?php if (date('Y-m-d H:i', strtotime($jadwal_upload_dokumen_prakualifikasi['waktu_mulai']))  >= date('Y-m-d H:i')) { ?>
                                                                <?php    } else if (date('Y-m-d H:i', strtotime($jadwal_upload_dokumen_prakualifikasi['waktu_selesai'])) >= date('Y-m-d H:i') || date('Y-m-d H:i', strtotime($jadwal_upload_dokumen_prakualifikasi['waktu_mulai'])) == date('Y-m-d H:i')) { ?>
                                                                    <small><a href="<?= base_url('tender_diikuti/surat_pernyataan/' . $rup['id_url_rup']) ?>" target="_blank" class="btn btn-danger"><i class="fa fa-file"></i> SURAT PERNYATAAN </a>
                                                                    <?php  } else { ?>

                                                                        <label for="" class="badge bg-secondary">Tahap Sudah Selesai</label>

                                                                    <?php } ?>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="card">
                                            <div class="card-header bg-primary text-white">
                                                Persyaratan Tambahan
                                            </div>
                                            <div class="card-body">
                                                <table class="table table-bordered">
                                                    <thead>
                                                        <tr>
                                                            <th>No</th>
                                                            <th>Nama Persyaratan</th>
                                                            <!-- <th>Keterangan</th> -->


                                                            <?php
                                                            if (date('Y-m-d H:i', strtotime($jadwal_pengumuman_pengadaan['waktu_mulai']))  >= date('Y-m-d H:i')) { ?>

                                                            <?php    } else if (date('Y-m-d H:i', strtotime($jadwal_dokumen_kualifikasi['waktu_selesai'])) >= date('Y-m-d H:i') || date('Y-m-d H:i', strtotime($jadwal_pengumuman_pengadaan['waktu_mulai'])) == date('Y-m-d H:i')) { ?>
                                                                <th>File Contoh Panitia</th>
                                                            <?php    } else { ?>

                                                            <?php    } ?>

                                                            <th>Upload File Peserta</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php $i = 1;
                                                        foreach ($dok_syarat_tambahan as $key => $value) { ?>
                                                            <tr>
                                                                <td scope="row"><?= $i++ ?></td>
                                                                <td><?= $value['nama_syarat_tambahan'] ?></td>

                                                                <?php
                                                                if (date('Y-m-d H:i', strtotime($jadwal_pengumuman_pengadaan['waktu_mulai']))  >= date('Y-m-d H:i')) { ?>

                                                                <?php    } else if (date('Y-m-d H:i', strtotime($jadwal_dokumen_kualifikasi['waktu_selesai'])) >= date('Y-m-d H:i') || date('Y-m-d H:i', strtotime($jadwal_pengumuman_pengadaan['waktu_mulai'])) == date('Y-m-d H:i')) { ?>
                                                                    <td>
                                                                        <?php if (date('Y-m-d H:i', strtotime($jadwal_dokumen_kualifikasi['waktu_selesai'])) >= date('Y-m-d H:i') || date('Y-m-d H:i', strtotime($jadwal_pengumuman_pengadaan['waktu_mulai'])) == date('Y-m-d H:i')) { ?>
                                                                            <?php $date2 = $jadwal_dokumen_kualifikasi['waktu_selesai'];
                                                                            if (date('Y-m-d H:i', strtotime($jadwal_pengumuman_pengadaan['waktu_mulai'])) >= date('Y-m-d H:i')) { ?>
                                                                            <?php    } else if (date('Y-m-d H:i', strtotime($jadwal_dokumen_kualifikasi['waktu_selesai'])) >= date('Y-m-d H:i') || date('Y-m-d H:i', strtotime($jadwal_pengumuman_pengadaan['waktu_mulai']))  == date('Y-m-d H:i')) { ?>
                                                                                <?php if ($value['file_syarat_tambahan']) { ?>
                                                                                    <a href="<?= $url_dok_syarat_tambahan . $value['file_syarat_tambahan'] ?>" class="btn btn-sm btn-danger"><i class="fas fa fa-file"></i> Download</a>
                                                                                <?php } else { ?>
                                                                                    <span href="#" class="badge bg-danger "> Tidak Ada Lampiran</span>
                                                                                <?php  } ?>

                                                                            <?php    } else { ?>
                                                                                <a href="javascript:;" class="btn btn-sm btn-secondary"> Tahap Sudah Selesai</a>
                                                                            <?php    } ?>
                                                                        <?php } else { ?>
                                                                            <?php
                                                                            if (date('Y-m-d H:i', strtotime($jadwal_pengumuman_pengadaan['waktu_mulai']))  >= date('Y-m-d H:i')) { ?>

                                                                            <?php    } else if (date('Y-m-d H:i', strtotime($jadwal_dokumen_kualifikasi['waktu_selesai'])) >= date('Y-m-d H:i') || date('Y-m-d H:i', strtotime($jadwal_pengumuman_pengadaan['waktu_mulai'])) == date('Y-m-d H:i')) { ?>
                                                                                <?php if ($value['file_syarat_tambahan']) { ?>
                                                                                    <a href="<?= $url_dok_syarat_tambahan . $value['file_syarat_tambahan'] ?>" class="btn btn-sm btn-danger"><i class="fas fa fa-file"></i> Download</a>
                                                                                <?php } else { ?>
                                                                                    <span href="#" class="badge bg-danger"> Tidak Ada Lampiran</span>
                                                                                <?php  } ?>
                                                                            <?php    } else { ?>
                                                                                <a href="javascript:;" class="btn btn-sm btn-secondary"> Tahap Sudah Selesai</a>
                                                                            <?php    } ?>
                                                                        <?php } ?>
                                                                    </td>
                                                                <?php    } else { ?>

                                                                <?php    } ?>


                                                                <td>
                                                                    <?php if (date('Y-m-d H:i', strtotime($jadwal_upload_dokumen_prakualifikasi['waktu_selesai'])) >= date('Y-m-d H:i') || date('Y-m-d H:i', strtotime($jadwal_upload_dokumen_prakualifikasi['waktu_mulai'])) == date('Y-m-d H:i')) { ?>
                                                                        <?php $date2 = $jadwal_upload_dokumen_prakualifikasi['waktu_selesai'];
                                                                        if (date('Y-m-d H:i', strtotime($jadwal_upload_dokumen_prakualifikasi['waktu_mulai'])) >= date('Y-m-d H:i')) { ?>
                                                                        <?php    } else if (date('Y-m-d H:i', strtotime($jadwal_upload_dokumen_prakualifikasi['waktu_selesai'])) >= date('Y-m-d H:i') || date('Y-m-d H:i', strtotime($jadwal_upload_dokumen_prakualifikasi['waktu_mulai']))  == date('Y-m-d H:i')) { ?>
                                                                            <a href="javascript:;" class="btn btn-sm btn-success" onclick="upload_syarat_tambahan('<?= $value['nama_syarat_tambahan'] ?>')"><i class="fa fa-upload"></i> Upload</a>
                                                                        <?php    } else { ?>
                                                                            <a href="javascript:;" class="btn btn-sm btn-secondary"> Tahap Sudah Selesai</a>
                                                                        <?php    } ?>
                                                                    <?php } else { ?>
                                                                        <?php
                                                                        if (date('Y-m-d H:i', strtotime($jadwal_upload_dokumen_prakualifikasi['waktu_mulai']))  >= date('Y-m-d H:i')) { ?>

                                                                        <?php    } else if (date('Y-m-d H:i', strtotime($jadwal_upload_dokumen_prakualifikasi['waktu_selesai'])) >= date('Y-m-d H:i') || date('Y-m-d H:i', strtotime($jadwal_upload_dokumen_prakualifikasi['waktu_mulai'])) == date('Y-m-d H:i')) { ?>
                                                                            <a href="javascript:;" class="btn btn-sm btn-success" onclick="upload_syarat_tambahan('<?= $value['nama_syarat_tambahan'] ?>')"><i class="fa fa-upload"></i> Upload</a>
                                                                        <?php    } else { ?>
                                                                            <a href="javascript:;" class="btn btn-sm btn-secondary"> Tahap Sudah Selesai</a>
                                                                        <?php    } ?>
                                                                    <?php } ?>

                                                                </td>
                                                            </tr>
                                                        <?php   } ?>

                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="card">
                                            <div class="card-header bg-primary text-white">
                                                Persyaratan Tambahan Yang Sudah Di Upload
                                            </div>
                                            <div class="card-body">
                                                <table class="table table-bordered">
                                                    <thead>
                                                        <tr>
                                                            <th>No</th>
                                                            <th>Nama Persyaratan</th>
                                                            <th>File</th>
                                                            <th>Keterangan</th>
                                                            <th>Status Dokumen</th>
                                                            <th>Aksi</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody id="load_syarat_tambahan_vendor">

                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </th>
                        </tr>

                        <?php if ($rup['sts_undangan_pembuktian'] == 1) { ?>
                            <tr>
                                <th>Undangan Pembuktian</th>
                                <th><a href="<?= base_url('tender_diikuti/lihat_undangan_pembuktian/' . $rup['id_url_rup']) ?>" class="btn btn-sm btn-danger" target="_blank"> <i class="fa fa-download" aria-hidden="true"></i> Lihat Undangan Pembuktian</a></th>
                            </tr>
                        <?php } else { ?>

                        <?php } ?>

                        <?php if (date('Y-m-d H:i', strtotime($jadwal_pengumuman_hasil_kualifikasi['waktu_selesai'])) >= date('Y-m-d H:i') || date('Y-m-d H:i', strtotime($jadwal_pengumuman_hasil_kualifikasi['waktu_mulai'])) == date('Y-m-d H:i')) { ?>
                            <?php $date2 = $jadwal_pengumuman_hasil_kualifikasi['waktu_selesai'];
                            if (date('Y-m-d H:i', strtotime($jadwal_pengumuman_hasil_kualifikasi['waktu_mulai'])) >= date('Y-m-d H:i')) { ?>
                            <?php    } else if (date('Y-m-d H:i', strtotime($jadwal_pengumuman_hasil_kualifikasi['waktu_selesai'])) >= date('Y-m-d H:i') || date('Y-m-d H:i', strtotime($jadwal_pengumuman_hasil_kualifikasi['waktu_mulai']))  == date('Y-m-d H:i')) { ?>
                                <?php if ($rup['sts_hasil_prakualifikasi'] == 1) { ?>
                                    <tr>
                                        <th>Pengumuman Hasil Kualifikasi</th>
                                        <th><a href="<?= base_url('tender_diikuti/lihat_pengumuman_hasil_kualifikasi/' . $rup['id_url_rup']) ?>" class="btn btn-sm btn-info text-white" target="_blank"> <i class="fa fa-download" aria-hidden="true"></i> Lihat Pengumuman Hasil Kualifikasi</a></th>
                                    </tr>
                                <?php } else { ?>
                                <?php } ?>
                            <?php    } else { ?>
                                <?php if ($rup['sts_hasil_prakualifikasi'] == 1) { ?>
                                    <tr>
                                        <th>Pengumuman Hasil Kualifikasi</th>
                                        <th><a href="<?= base_url('tender_diikuti/lihat_pengumuman_hasil_kualifikasi/' . $rup['id_url_rup']) ?>" class="btn btn-sm btn-info text-white" target="_blank"> <i class="fa fa-download" aria-hidden="true"></i> Lihat Pengumuman Hasil Kualifikasi</a></th>
                                    </tr>
                                <?php } else { ?>
                                <?php } ?>
                            <?php    } ?>
                        <?php } else { ?>
                            <?php
                            if (date('Y-m-d H:i', strtotime($jadwal_pengumuman_hasil_kualifikasi['waktu_mulai']))  >= date('Y-m-d H:i')) { ?>

                            <?php    } else if (date('Y-m-d H:i', strtotime($jadwal_pengumuman_hasil_kualifikasi['waktu_selesai'])) >= date('Y-m-d H:i') || date('Y-m-d H:i', strtotime($jadwal_pengumuman_hasil_kualifikasi['waktu_mulai'])) == date('Y-m-d H:i')) { ?>
                                <tr>
                                    <th>Pengumuman Hasil Kualifikasi</th>
                                    <th><a href="<?= base_url('tender_diikuti/lihat_pengumuman_hasil_kualifikasi/' . $rup['id_url_rup']) ?>" class="btn btn-sm btn-info text-white" target="_blank"> <i class="fa fa-download" aria-hidden="true"></i> Lihat Pengumuman Hasil Kualifikasi</a></th>
                                </tr>
                            <?php    } else { ?>
                                <tr>
                                    <th>Pengumuman Hasil Kualifikasi</th>
                                    <th><a href="<?= base_url('tender_diikuti/lihat_pengumuman_hasil_kualifikasi/' . $rup['id_url_rup']) ?>" class="btn btn-sm btn-info text-white" target="_blank"> <i class="fa fa-download" aria-hidden="true"></i> Lihat Pengumuman Hasil Kualifikasi</a></th>
                                </tr>
                            <?php    } ?>
                        <?php } ?>


                        <?php if (date('Y-m-d H:i', strtotime($jadwal_undangan_penawaran['waktu_mulai']))  >= date('Y-m-d H:i')) { ?>

                        <?php    } else if (date('Y-m-d H:i', strtotime($jadwal_undangan_penawaran['waktu_selesai'])) >= date('Y-m-d H:i') || date('Y-m-d H:i', strtotime($jadwal_undangan_penawaran['waktu_mulai'])) == date('Y-m-d H:i')) { ?>
                            <?php if ($get_row_mengikuti['ev_teknis']  >= 60 || $get_row_mengikuti['ev_keuangan']  >= 60) { ?>
                                <?php if ($rup['sts_undangan_penawaran'] == 1) { ?>
                                    <tr>
                                        <th>Undangan Penawaran</th>
                                        <th><a target="_blank" class="btn btn-sm btn-info text-white" href="https://eprocurement.jmto.co.id/panitia/info_tender/informasi_tender_terbatas_pra_1_file/lihat_undangan_penawran/<?= $rup['id_url_rup'] ?>"><i class="fa fa-eye"></i> Lihat Undangan Penawaran</a>
                                        <th>
                                    </tr>
                                <?php } else { ?>
                                <?php } ?>

                            <?php } else { ?>
                                <?php if ($rup['sts_undangan_penawaran'] == 1) { ?>
                                    <tr>
                                        <th>Undangan Penawaran</th>
                                        <th colspan="3"><span class="badge bg-danger"> Anda Telah Gugur Dalam Pengadaan Ini!</span></th>
                                    </tr>
                                <?php } else { ?>
                                <?php } ?>
                            <?php }  ?>
                        <?php } else { ?>
                            <?php if ($get_row_mengikuti['ev_teknis']  >= 60 || $get_row_mengikuti['ev_keuangan']  >= 60) { ?>
                                <?php if ($rup['sts_undangan_penawaran'] == 1) { ?>
                                    <tr>
                                        <th>Undangan Penawaran</th>
                                        <th><a target="_blank" class="btn btn-sm btn-info text-white" href="https://eprocurement.jmto.co.id/panitia/info_tender/informasi_tender_terbatas_pra_1_file/lihat_undangan_penawran/<?= $rup['id_url_rup'] ?>"><i class="fa fa-eye"></i> Lihat Undangan Penawaran</a>
                                        <th>
                                    </tr>
                                <?php } else { ?>
                                <?php } ?>

                            <?php } else { ?>
                                <?php if ($rup['sts_undangan_penawaran'] == 1) { ?>
                                    <tr>
                                        <th>Undangan Penawaran</th>
                                        <th colspan="3"><span class="badge bg-danger"> Anda Telah Gugur Dalam Pengadaan Ini!</span></th>
                                    </tr>
                                <?php } else { ?>
                                <?php } ?>
                            <?php }  ?>
                        <?php } ?>
                        <tr>
                            <?php if (date('Y-m-d H:i', strtotime($jadwal_download_dokumen_pengadaan['waktu_mulai']))  >= date('Y-m-d H:i')) { ?>
                            <?php    } else if (date('Y-m-d H:i', strtotime($jadwal_download_dokumen_pengadaan['waktu_selesai'])) >= date('Y-m-d H:i') || date('Y-m-d H:i', strtotime($jadwal_download_dokumen_pengadaan['waktu_mulai'])) == date('Y-m-d H:i')) { ?>
                                <th>Dokumen Pengadaan</th>
                                <th>
                                    <?php if ($get_row_mengikuti['ev_teknis'] >= 60 && $get_row_mengikuti['ev_keuangan'] >= 60) { ?>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="card">
                                                    <div class="card-header bg-primary text-white">
                                                        Dokumen Pengadaan
                                                    </div>
                                                    <div class="card-body">
                                                        <table class="table table-bordered">
                                                            <thead>
                                                                <tr>
                                                                    <th>No</th>
                                                                    <th>Nama File</th>
                                                                    <th>File</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <?php $i = 1;
                                                                foreach ($dok_pengadaan as $key => $value) { ?>
                                                                    <tr>
                                                                        <td scope="row"><?= $i++ ?></td>
                                                                        <td><?= $value['nama_dok_pengadaan'] ?></td>
                                                                        <td>
                                                                            <a href="<?= $url_dok_pengadaan . $value['file_dok_pengadaan'] ?>" class="btn btn-sm btn-danger"><i class="fas fa fa-file"></i> Download</a>
                                                                            <?php if ($value['keterangan_dokumen']) { ?>
                                                                                <a href="javascript:;" onclick="modal_lihat_keterangan_dokumen_perubahan('<?= $value['keterangan_dokumen'] ?>')" class="btn btn-sm btn-warning"><i class="fas fa fa-file"></i> Keterangan Perubahan Dokumen</a>
                                                                            <?php } else { ?>

                                                                            <?php  }
                                                                            ?>
                                                                        </td>
                                                                    </tr>
                                                                <?php } ?>

                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php } else { ?>
                                        <div class="col-md-6">
                                            <div class="card">
                                                <div class="card-header bg-primary text-white">
                                                    Dokumen Pengadaan
                                                </div>
                                                <div class="card-body">
                                                    <table class="table table-bordered">
                                                        <thead>
                                                            <tr>
                                                                <th>No</th>
                                                                <th>Nama File</th>
                                                                <th>File</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td colspan="3"><span class="badge bg-danger"> Anda Telah Gugur Dalam Pengadaan Ini!</span></td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    <?php } ?>
                                </th>

                            <?php    } else { ?>
                                <th>Dokumen Pengadaan</th>
                                <th>
                                    <div class="col-md-6">
                                        <div class="card">
                                            <div class="card-header bg-primary text-white">
                                                Dokumen Pengadaan
                                            </div>
                                            <div class="card-body">
                                                <table class="table table-bordered">
                                                    <thead>
                                                        <tr>
                                                            <th>No</th>
                                                            <th>Nama File</th>
                                                            <th>File</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td colspan="3"><span class="badge bg-danger"> Tahap Sudah Selesai!</span></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </th>
                            <?php    } ?>
                        </tr>


                        <tr>
                            <?php if (date('Y-m-d H:i', strtotime($jadwal_upload_dokumen_penawaran['waktu_mulai']))  >= date('Y-m-d H:i')) { ?>
                            <?php    } else if (date('Y-m-d H:i', strtotime($jadwal_upload_dokumen_penawaran['waktu_selesai'])) >= date('Y-m-d H:i') || date('Y-m-d H:i', strtotime($jadwal_upload_dokumen_penawaran['waktu_mulai'])) == date('Y-m-d H:i')) { ?>
                                <th>Upload Dokumen Pengadaan</th>
                                <?php if ($get_row_mengikuti['ev_teknis'] >= 60 && $get_row_mengikuti['ev_keuangan'] >= 60) { ?>
                                    <th>
                                        <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#buka_dokumen_penawaran">
                                            <i class="fa fa-folder-open" aria-hidden="true"></i> Upload Dokumen Penawaran
                                        </button>
                                    </th>
                                <?php } else { ?>
                                    <th>
                                        <button type="button" class="btn btn-sm btn-danger" disabled>
                                            <i class="fa fa-folder-close" aria-hidden="true"></i> Anda Telah Gugur Dalam Pengadaan Ini
                                        </button>
                                    </th>
                                <?php } ?>

                            <?php    } else { ?>
                                <th>Dokumen Penawaran</th>
                                <th>
                                    <label for="" class="badge bg-secondary">Tahap Sudah Selesai</label>
                                </th>
                            <?php    } ?>
                        </tr>

                        <tr>
                            <th>Berita Acara dan Pengumuman Pengadaan</th>
                            <th>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="card">
                                            <div class="card-header bg-primary text-white">
                                                Berita Acara dan Pengumuman Pengadaan
                                            </div>
                                            <div class="card-body">
                                                <table class="table table-bordered">
                                                    <thead>
                                                        <tr>
                                                            <th>Nama File</th>
                                                            <th>File</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <?php if ($rup['sts_kirim_ba_penjelasan_kualifikasi'] == 1) { ?>
                                                                <th>Berita Acara Penjelasan Kualifikasi</th>
                                                                <th><a target="_blank" class="btn btn-sm btn-info text-white" href="https://eprocurement.jmto.co.id/panitia/info_tender/informasi_tender_umum_pra_2_file/ba_penjelasan_kualifiaksi/<?= $rup['id_url_rup'] ?>"><i class="fa fa-eye"></i> Lihat</a></th>
                                                            <?php } ?>
                                                        </tr>

                                                        <tr>
                                                            <?php if ($rup['sts_kirim_pembuktian'] == 1) { ?>
                                                                <th>Berita Acara Pembuktian Kualifikasi</th>
                                                                <th><a target="_blank" class="btn btn-sm btn-info text-white" href="https://eprocurement.jmto.co.id/panitia/info_tender/informasi_tender_umum_pra_2_file/ba_pembuktian_kualifikasi/<?= $rup['id_url_rup'] ?>"><i class="fa fa-eye"></i> Lihat</a></th>
                                                            <?php } ?>

                                                        </tr>
                                                        <?php if ($get_row_mengikuti['ev_teknis'] >= 60 && $get_row_mengikuti['ev_teknis'] >= 60) { ?>

                                                            <tr>
                                                                <?php if ($rup['sts_kirim_ba_rapat_penjelasan'] == 1) { ?>
                                                                    <th>Berita Acara Rapat Penjelasan Dokumen Pengadaan</th>
                                                                    <th><a target="_blank" class="btn btn-sm btn-info text-white" href="https://eprocurement.jmto.co.id/panitia/info_tender/informasi_tender_umum_pra_2_file/ba_penjelasan_pengadaan/<?= $rup['id_url_rup'] ?>"><i class="fa fa-eye"></i> Lihat</a></th>
                                                                <?php } ?>

                                                            </tr>
                                                            <tr>
                                                                <?php if ($rup['sts_kirim_ba_sampul1'] == 1) { ?>
                                                                    <th>Berita Acara Pembukaan Dokumen Penawaran File I (Administrasi Dan Teknis)</th>
                                                                    <th><a target="_blank" class="btn btn-sm btn-info text-white" href="https://eprocurement.jmto.co.id/panitia/info_tender/Informasi_tender_terbatas_pra_1_file/ba_sampul_I/<?= $rup['id_url_rup'] ?>"><i class="fa fa-eye"></i> Lihat</a></th>
                                                                <?php } ?>
                                                            </tr>
                                                            <tr>
                                                                <?php if ($rup['sts_kirim_ba_sampul1_2'] == 1) { ?>
                                                                    <th>Pembukaan Penawaran Tender Terbatas Satu File</th>
                                                                    <th><a target="_blank" class="btn btn-sm btn-info text-white" href="https://eprocurement.jmto.co.id/panitia/info_tender/Informasi_tender_terbatas_pra_1_file/ba_sampul_I_2/<?= $rup['id_url_rup'] ?>"><i class="fa fa-eye"></i> Lihat</a></th>
                                                                <?php } ?>
                                                            </tr>
                                                            <tr>
                                                                <?php if ($rup['sts_kirim_undangan_presentasi_teknis'] == 1) { ?>
                                                                    <th>Undangan Rapat Presentasi Teknis</th>
                                                                    <th><a target="_blank" class="btn btn-sm btn-info text-white" href="https://eprocurement.jmto.co.id/panitia/info_tender/Informasi_tender_terbatas_pra_1_file/ba_undangan_rapat/<?= $rup['id_url_rup'] ?>"><i class="fa fa-eye"></i> Lihat</a></th>
                                                                <?php } ?>
                                                            </tr>

                                                            <tr>
                                                                <?php if ($rup['sts_kirim_ba_sampul2'] == 1) { ?>
                                                                    <th>Berita Acara Pembukaan Dokumen Penawaran File II</th>
                                                                    <th><a target="_blank" class="btn btn-sm btn-info text-white" href="https://eprocurement.jmto.co.id/panitia/info_tender/Informasi_tender_terbatas_pra_1_file/ba_sampul_II/<?= $rup['id_url_rup'] ?>"><i class="fa fa-eye"></i> Lihat</a></th>
                                                                <?php } ?>
                                                            </tr>



                                                            <?php if ($get_row_mengikuti['ev_terendah_peringkat'] == 1) { ?>
                                                                <tr>
                                                                    <?php if ($rup['sts_kirim_ba_negosiasi'] == 1) { ?>
                                                                        <th>Berita Acara Evaluasi dan Negosiasi</th>
                                                                        <th><a target="_blank" class="btn btn-sm btn-info text-white" href="https://eprocurement.jmto.co.id/panitia/info_tender/informasi_tender_umum_pra_2_file/ba_negosiasi/<?= $rup['id_url_rup'] ?>"><i class="fa fa-eye"></i> Lihat</a></th>
                                                                        <th><a href="javascript:;" class="btn btn-sm btn-success" data-bs-toggle="modal" data-bs-target="#modal_setujui_ba_negosiasi">Setujui Berita Acara</a></th>
                                                                    <?php } ?>
                                                                </tr>
                                                                <tr>
                                                                    <?php if ($rup['sts_kirim_ba_evaluasi_negosiasi'] == 1) { ?>
                                                                        <th>Berita Acara Klarifikasi & Penilaian Kewajaran Harga</th>
                                                                        <th><a target="_blank" class="btn btn-sm btn-info text-white" href="https://eprocurement.jmto.co.id/panitia/info_tender/informasi_tender_umum_pra_2_file/ba_evaluasinegosiasi/<?= $rup['id_url_rup'] ?>"><i class="fa fa-eye"></i> Lihat</a></th>
                                                                        <th><a href="javascript:;" class="btn btn-sm btn-success" data-bs-toggle="modal" data-bs-target="#modal_setujui_ba_klarifikasi">Setujui Berita Acara</a></th>
                                                                    <?php } ?>
                                                                </tr>


                                                            <?php } else { ?>


                                                            <?php } ?>
                                                            <tr>
                                                                <?php if ($rup['sts_kirim_ba_pemenang'] == 1) { ?>
                                                                    <th>Pengumuman Pemenang Pengadaan</th>
                                                                    <th><a target="_blank" class="btn btn-sm btn-info text-white" href="https://eprocurement.jmto.co.id/panitia/info_tender/informasi_tender_umum_pra_2_file/ba_pemenang_tender/<?= $rup['id_url_rup'] ?>"><i class="fa fa-eye"></i> Lihat</a></th>
                                                                <?php } ?>
                                                            </tr>
                                                        <?php   } ?>


                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </th>
                        </tr>

                        <?php if (date('Y-m-d H:i', strtotime($jadwal_masa_sanggah_akhir['waktu_mulai']))  >= date('Y-m-d H:i')) { ?>

                        <?php    } else if (date('Y-m-d H:i', strtotime($jadwal_masa_sanggah_akhir['waktu_selesai'])) >= date('Y-m-d H:i') || date('Y-m-d H:i', strtotime($jadwal_masa_sanggah_akhir['waktu_mulai'])) == date('Y-m-d H:i')) { ?>
                            <?php if ($rup['id_vendor_pemenang'] == $this->session->userdata('id_vendor')) { ?>
                                <tr>
                                    <th>Surat Penunjukan Pemenang Pengadaan</th>
                                    <th><button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#surat_penunjukan">
                                            <i class="fa fa-download" aria-hidden="true"></i> Download Surat Penunjukan
                                        </button></th>
                                </tr>

                            <?php } else { ?>

                            <?php } ?>
                        <?php    } else { ?>
                            <?php if ($rup['id_vendor_pemenang'] == $this->session->userdata('id_vendor')) { ?>
                                <tr>
                                    <th>Surat Penunjukan Pemenang Pengadaan</th>
                                    <th><button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#surat_penunjukan">
                                            <i class="fa fa-download" aria-hidden="true"></i> Download Surat Penunjukan
                                        </button></th>
                                </tr>

                            <?php } else { ?>

                            <?php } ?>
                        <?php    } ?>


                    </table>
                </div>
            </div>
        </div>
</main>

<div class="modal fade" id="buka_dokumen_penawaran" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title" id="exampleModalLabel"> <i class="fa fa-folder-open" aria-hidden="true"></i> Buka Dokumen Penawaran</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="alert alert-primary d-flex align-items-center" role="alert">
                        <div>
                            <i class="fa fa-info-circle" aria-hidden="true"></i> Silakan Masukan Kodefikasi Paket Yang Dikirim Ke Whatsapp Anda
                        </div>
                    </div>
                    <div class="col-md-2">
                    </div>
                    <div class="col-md-8">
                        <center>
                            <br>
                            <a onclick="kirim_token_ke_wa('<?= $rup['id_url_rup'] ?>')" class="btn btn-warning btn_dapatkan_token" style="width: 300px;"><i class="fa fa-unlock-alt" aria-hidden="true"></i> Kirim Kodefikasi ke WhatsApp</a>
                            <br>
                            <br>
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1"> <i class="fa fa-unlock-alt" aria-hidden="true"></i></span>
                                <input type="text" class="form-control" name="token_" placeholder="Masukan Kodefikasi..." aria-describedby="basic-addon1" onkeyup="Cek_token()">
                            </div>
                            <br>
                            <a target="_blank" onclick="buka_penawaran('<?= $rup['id_url_rup'] ?>')" style="display:none" class="btn btn-success btn_buka_penawaran"><i class="fa fa-unlock-alt" aria-hidden="true"></i> Akses Halaman</a>
                        </center>
                    </div>
                    <div class="col-md-2">

                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="undangan_pembuktian" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-warning text-white">
                <h5 class="modal-title" id="exampleModalLabel"> <i class="fa fa-bullhorn" aria-hidden="true"></i> Undangan Pembuktian</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="alert alert-primary d-flex align-items-center" role="alert">
                    <div>
                        <i class="fa fa-info-circle" aria-hidden="true"> </i> Undangan Pembuktian Pengadaan !!! <br>
                    </div>
                </div>
                <br>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama File</th>
                            <th>File</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td scope="row">1</td>
                            <td>Undangan Pembuktian</td>
                            <?php if ($rup['file_undangan_pembuktian']) { ?>
                                <td><a href="<?= $url_dok_undangan_pembuktian . $rup['id_rup'] ?>" class="btn btn-sm btn-warning"> Lihat</a></td>
                            <?php } else { ?>
                                <td><label for="" class="btn btn-sm btn-danger"> Belum Upload Undangan</label></td>
                            <?php } ?>

                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="hasil_prakualifikasi" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-warning text-white">
                <h5 class="modal-title" id="exampleModalLabel"> <i class="fa fa-bullhorn" aria-hidden="true"></i> Pengumuman Hasil Kualifikasi</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="alert alert-primary d-flex align-items-center" role="alert">
                    <div>
                        <i class="fa fa-info-circle" aria-hidden="true"> </i> Pengumuman Hasil Kualifikasi Pengadaan !!! <br>
                    </div>
                </div>
                <!-- <form id="form_upload_hasil_rakualifikasi" action="javascript:;" enctype="multipart/form-data">
                    <div class="input-group">
                        <input type="file" class="form-control" accept=".xlsx, .xls, .pdf" name="file_hps">
                        <button class="btn btn-outline-secondary file_hps_btn" type="submit">Upload</button>
                    </div>
                </form> -->
                <br>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama File</th>
                            <th>File</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td scope="row">1</td>
                            <td>Pengumuman Hasil Kualifikasi</td>
                            <?php if ($rup['file_pengumuman_prakualifikasi']) { ?>
                                <td><a href="<?= $url_dok_pengumuman_pra . $rup['id_rup'] ?>" class="btn btn-sm btn-warning"> Lihat</a></td>
                            <?php } else { ?>
                                <td><label for="" class="btn btn-sm btn-danger"> Belum Upload Undangan</label></td>
                            <?php } ?>

                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="surat_penunjukan" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title" id="exampleModalLabel"> <i class="fa fa-bullhorn" aria-hidden="true"></i> Surat Penunjukan Pemenang</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="alert alert-primary d-flex align-items-center" role="alert">
                    <div>
                        <i class="fa fa-info-circle" aria-hidden="true"></i> Upload Surat Penunjukan Pemenang Pengadaan !!! <br>
                    </div>
                </div>
                <!-- <form id="form_upload_surat_penunjukan" action="javascript:;" enctype="multipart/form-data">
                    <div class="input-group">
                        <input type="file" class="form-control" accept=".xlsx, .xls, .pdf" name="file_hps">
                        <button class="btn btn-outline-secondary file_hps_btn" type="submit">Upload</button>
                    </div>
                </form> -->
                <br>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama File</th>
                            <th>File</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td scope="row">1</td>
                            <td>Surat Penunjukan</td>
                            <?php if ($rup['file_surat_penunjukan_pemenang']) { ?>
                                <td><a target="_blank" href="<?= $url_dok_penunjukan_pemenang . $rup['file_surat_penunjukan_pemenang'] ?>" class="btn btn-sm btn-warning"> Lihat</a></td>
                            <?php } else { ?>
                                <td><label for="" class="btn btn-sm btn-danger"> Belum Upload Undangan</label></td>
                            <?php } ?>
                        </tr>
                    </tbody>
                </table>
                <!-- <br>
                <hr> -->
                <!-- <center>
                    Vendor Pemenang
                </center>
                <hr> -->
                <!-- <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Peserta</th>
                            <th>Email</th>
                            <th>Pemenang</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td scope="row">1</td>
                            <td>METRINDOCRB</td>
                            <td>metrindocirebon@yahoo.co.id</td>
                            <td><i class="fas fa fa-star text-warning"></i></td>
                        </tr>
                    </tbody>
                </table> -->
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="lihat_peserta" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title" id="exampleModalLabel"> <i class="fa fa-bullhorn" aria-hidden="true"></i> Peserta Pengadaan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="alert alert-primary d-flex align-items-center" role="alert">
                    <div>
                        <i class="fa fa-info-circle" aria-hidden="true"> </i> Peserta Ini Merupakan Peserta Yang Mengikuti Pengadaan !!! <br>
                    </div>
                </div>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Peserta</th>
                            <!-- <th>Email</th> -->
                            <!-- <th>Telepon</th> -->
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1;
                        foreach ($peserta as $key => $value) { ?>
                            <tr>
                                <td scope="row"><?= $i++ ?></td>
                                <td><?= $value['nama_usaha'] ?></td>
                            </tr>
                        <?php } ?>

                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modal_syarat_tambahan" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title" id="exampleModalLabel"> <i class="fa fa-bullhorn" aria-hidden="true"></i> Upload Syarat Tambahan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="javascript:;" id="form_perysaratan_tambahan">
                <div class="modal-body">
                    <div class="alert alert-primary d-flex align-items-center" role="alert">
                        <div>
                            <i class="fa fa-info-circle" aria-hidden="true"> </i> Silahkan Masukkan File Syarat Tambahan Yang Sesuai Dengan Yang Di Tentukan !!! <br>
                        </div>
                    </div>
                    <div class="form-group">
                        <input type="hidden" name="nama_persyaratan_tambahan">
                        <input type="hidden" name="id_rup" value="<?= $rup['id_rup'] ?>">
                        <table class="table table-bordered">
                            <tr>
                                <th>Nama Persyaratan Tambahan</th>
                                <td><label for="" id="nama_syarat_tambahan"></label></td>
                            </tr>
                            <tr>
                                <th>Upload</th>
                                <td><input type="file" accept=".pdf,.xlsx" name="file_syarat_tambahan"></td>
                            </tr>
                        </table>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"> Batal</button>
                    <button type="submit" class="btn btn-success btn-syarat-tambahan"><i class="fas fa fa-upload"></i> Upload</button>
                </div>
            </form>
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
                                            <th><small>Alasan Perubahan</small></th>
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
                <a class="btn btn-success" href="<?= base_url('tender_diikuti/' . 'cetak_jadwal/' . $rup['id_url_rup']) ?>" target="_blank">Cetak Jadwal</a>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" tabindex="-1" id="modal_lihat_keterangan_dokumen_perubahan">
    <div class="modal-dialog modal-dialog-scrollable modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <a class="navbar-brand">
                    <img src="<?php echo base_url(); ?>/assets/brand/jm1.png" alt="" width="25" height="25" class="d-inline-block align-text-top">
                    <b><span class="text-primary">Keterangan Perubahan Dokumen</span></b>
                </a>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <textarea readonly name="keterangan_perubahan_dokumen" class="form-control"></textarea>
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

<div class="modal fade" id="modal_setujui_ba_negosiasi" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <a class="navbar-brand">
                    <img src="<?php echo base_url(); ?>/assets/brand/jm1.png" alt="" width="25" height="25" class="d-inline-block align-text-top">
                    <b><span class="text-primary">Jasamarga Tollroad Operator</span></b>

                </a>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="form_setujui_ba_nego" action="javascript:;">
                <div class="modal-body">
                    <div class="card">
                        <div class="card-header border-dark bg-primary d-flex justify-content-between align-items-center">
                            <div class="flex-grow-1 bd-highlight">
                                <span class="text-dark">
                                    <small class="text-white">
                                        <strong><i class="fa-solid fa-edit px-1"></i>
                                            Setujui Berita Acara Evaluasi dan Negosiasi
                                        </strong>
                                    </small>
                                </span>
                            </div>
                        </div>
                        <div class="card-body">
                            <input type="hidden" name="id_rup" value="<?= $rup['id_rup'] ?>">
                            <input type="hidden" name="id_vendor" value="<?= $this->session->userdata('id_vendor') ?>">
                            <div class="mb-1">
                                <label for="" class="form-label">Persetujuan</label>
                                <select name="persetujuan_ba_nego" id="" class="form-control">
                                    <option value="1">Setuju</option>
                                    <option value="2">Tidak Setuju</option>
                                </select>
                            </div>
                            <div class="mb-1">
                                <label for="" class="form-label">Nama Jabatan Yang Menyetujui</label>
                                <input type="text" name="nama_jabatan_ba_nego" class="form-control" value="<?= $get_row_mengikuti['nama_jabatan_ba_nego'] ?>">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-success">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="modal_setujui_ba_klarifikasi" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <a class="navbar-brand">
                    <img src="<?php echo base_url(); ?>/assets/brand/jm1.png" alt="" width="25" height="25" class="d-inline-block align-text-top">
                    <b><span class="text-primary">Jasamarga Tollroad Operator</span></b>

                </a>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="form_setujui_ba_klarifikasi" action="javascript:;">
                <div class="modal-body">
                    <div class="card">
                        <div class="card-header border-dark bg-primary d-flex justify-content-between align-items-center">
                            <div class="flex-grow-1 bd-highlight">
                                <span class="text-dark">
                                    <small class="text-white">
                                        <strong><i class="fa-solid fa-edit px-1"></i>
                                            Setujui Berita Acara Klarifikasi
                                        </strong>
                                    </small>
                                </span>
                            </div>
                        </div>
                        <div class="card-body">
                            <input type="hidden" name="id_rup" value="<?= $rup['id_rup'] ?>">
                            <input type="hidden" name="id_vendor" value="<?= $this->session->userdata('id_vendor') ?>">
                            <div class="mb-1">
                                <label for="" class="form-label">Persetujuan</label>
                                <select name="persetujuan_klarifikasi_nego" id="" class="form-control">
                                    <option value="1">Setuju</option>
                                    <option value="2">Tidak Setuju</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-success">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>