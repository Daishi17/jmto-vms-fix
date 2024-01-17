<input type="hidden" name="url_upload_sanggahan_akhir" value="<?= base_url('tender_diikuti/upload_sanggahan_akhir/') ?>">
<input type="hidden" name="url_hapus_sanggahan_akhir" value="<?= base_url('tender_diikuti/hapus_sanggahan_akhir/') ?>">
<input type="hidden" name="url_get_sanggahan_akhir" value="<?= base_url('tender_diikuti/get_sanggahan_akhir/') ?>">
<input type="hidden" name="url_open_sanggahan_akhir" value="<?= base_url('file_paket/' . $rup['nama_rup'] . '/' . $this->session->userdata('nama_usaha') . '/SANGGAHAN_AKHIR' . '/') ?>">
<input type="hidden" name="url_open_sanggahan_akhir_panitia" value="http://localhost/jmto-eproc/file_paket/<?= $rup['nama_rup'] ?>/">
<input type="hidden" name="id_rup" value="<?= $rup['id_rup'] ?>">
<input type="hidden" name="id_vendor" value="<?= $this->session->userdata('id_vendor') ?>">

<main class="container">
    <div class="row">
        <div class="col">
            <div class="card border-dark mt-3">
                <div class="card-header border-dark bg-white text-black">
                    <ul class="nav nav-tabs">
                        <!-- <li class="nav-item">
                            <a class="nav-link " aria-current="page"><i class="fa fa-list-alt" aria-hidden="true"> </i> Menu Tender</a>
                        </li> -->
                        <li class="nav-item">
                            <a class="nav-link bg-primary text-white" style="margin-left: 5px;" href="<?= base_url('tender_diikuti/informasi_tender/' . $rup['id_url_rup']) ?>"><i class="fa fa-columns" aria-hidden="true"></i> Informasi Pengadaan</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link bg-primary text-white" style="margin-left: 5px;" href="<?= base_url('tender_diikuti/aanwijzing/' . $rup['id_url_rup']) ?>"><i class="fa fa-comments" aria-hidden="true"></i> Aanwijzing (PQ)</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link bg-primary text-white " style="margin-left: 5px;" href="<?= base_url('tender_diikuti/sanggahan_prakualifikasi/'  . $rup['id_url_rup']) ?>"><i class="fa fa-hourglass-start" aria-hidden="true"></i> Sanggahan Prakualifikasi</a>
                        </li>


                        <!-- <?php if ($sts_nego == 'buka_negosiasi') { ?>
                            <?php if (date('Y-m-d H:i', strtotime($jadwal_penetapan_pemenang['waktu_selesai'])) >= date('Y-m-d H:i') || date('Y-m-d H:i', strtotime($jadwal_penetapan_pemenang['waktu_mulai'])) == date('Y-m-d H:i')) { ?>
                                <?php $date2 = $jadwal_penetapan_pemenang['waktu_selesai'];
                                        if (date('Y-m-d H:i', strtotime($jadwal_penetapan_pemenang['waktu_mulai'])) >= date('Y-m-d H:i')) { ?>
                                <?php    } else if (date('Y-m-d H:i', strtotime($jadwal_penetapan_pemenang['waktu_selesai'])) >= date('Y-m-d H:i') || date('Y-m-d H:i', strtotime($jadwal_penetapan_pemenang['waktu_mulai']))  == date('Y-m-d H:i')) { ?>
                                    <li class="nav-item">
                                        <a class="nav-link bg-primary text-white" style="margin-left: 5px;" href="<?= base_url('tender_diikuti/negosiasi/' . $rup['id_url_rup']) ?>"><i class="fa fa-tags" aria-hidden="true"></i> Negosiasi</a>
                                    </li>
                                <?php    } else { ?>
                                <?php    } ?>
                            <?php } else { ?>
                                <?php
                                        if (date('Y-m-d H:i', strtotime($jadwal_penetapan_pemenang['waktu_mulai']))  >= date('Y-m-d H:i')) { ?>

                                <?php    } else if (date('Y-m-d H:i', strtotime($jadwal_penetapan_pemenang['waktu_selesai'])) >= date('Y-m-d H:i') || date('Y-m-d H:i', strtotime($jadwal_penetapan_pemenang['waktu_mulai'])) == date('Y-m-d H:i')) { ?>
                                    <li class="nav-item">
                                        <a class="nav-link bg-primary text-white" style="margin-left: 5px;" href="<?= base_url('tender_diikuti/negosiasi/' . $rup['id_url_rup']) ?>"><i class="fa fa-tags" aria-hidden="true"></i> Negosiasi</a>
                                    </li>
                                <?php    } else { ?>

                                <?php    } ?>
                            <?php } ?>
                        <?php } else { ?>

                        <?php   }
                        ?> -->
                        <li class="nav-item">
                            <a class="nav-link bg-primary text-white" style="margin-left: 5px;" href="<?= base_url('tender_diikuti/aanwijzing_penawaran/' . $rup['id_url_rup']) ?>"><i class="fa fa-comments" aria-hidden="true"></i> Aanwijzing (Penawaran)</a>
                        </li>
                        <!-- <?php if ($rup['id_jadwal_tender'] == 1) { ?>

                        <?php  } else { ?>
                            <li class="nav-item">
                                <a class="nav-link bg-primary text-white" style="margin-left: 5px;" href="<?= base_url('tender_diikuti/aanwijzing_penawaran/' . $rup['id_url_rup']) ?>"><i class="fa fa-comments" aria-hidden="true"></i> Aanwijzing (Penawaran)</a>
                            </li>
                        <?php }
                        ?> -->
                        <!-- <?php if (date('Y-m-d H:i', strtotime($jadwal_aanwijzing['waktu_selesai'])) >= date('Y-m-d H:i') || date('Y-m-d H:i', strtotime($jadwal_aanwijzing['waktu_mulai'])) == date('Y-m-d H:i')) { ?>
                            <?php $date2 = $jadwal_aanwijzing['waktu_selesai'];
                                    if (date('Y-m-d H:i', strtotime($jadwal_aanwijzing['waktu_mulai'])) >= date('Y-m-d H:i')) { ?>
                            <?php    } else if (date('Y-m-d H:i', strtotime($jadwal_aanwijzing['waktu_selesai'])) >= date('Y-m-d H:i') || date('Y-m-d H:i', strtotime($jadwal_aanwijzing['waktu_mulai']))  == date('Y-m-d H:i')) { ?>

                            <?php    } else { ?>

                            <?php    } ?>
                        <?php } else { ?>
                            <?php
                                    if (date('Y-m-d H:i', strtotime($jadwal_aanwijzing['waktu_mulai']))  >= date('Y-m-d H:i')) { ?>

                            <?php    } else if (date('Y-m-d H:i', strtotime($jadwal_aanwijzing['waktu_selesai'])) >= date('Y-m-d H:i') || date('Y-m-d H:i', strtotime($jadwal_aanwijzing['waktu_mulai'])) == date('Y-m-d H:i')) { ?>

                            <?php    } else { ?>

                            <?php    } ?>
                        <?php } ?> -->
                        <li class="nav-item">
                            <a class="nav-link bg-primary text-white" style="margin-left: 5px;" href="<?= base_url('tender_diikuti/negosiasi/' . $rup['id_url_rup']) ?>"><i class="fa fa-tags" aria-hidden="true"></i> Negosiasi</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link active" style="margin-left: 5px;" href="<?= base_url('tender_diikuti/sanggahan_akhir/'  . $rup['id_url_rup']) ?>"><i class="fa fa-hourglass-start" aria-hidden="true"></i> Sanggahan Pemenang </a>
                        </li>
                        <!-- <?php if (date('Y-m-d H:i', strtotime($jadwal_masa_sanggah_akhir['waktu_selesai'])) >= date('Y-m-d H:i') || date('Y-m-d H:i', strtotime($jadwal_masa_sanggah_akhir['waktu_mulai'])) == date('Y-m-d H:i')) { ?>
                            <?php $date2 = $jadwal_masa_sanggah_akhir['waktu_selesai'];
                                    if (date('Y-m-d H:i', strtotime($jadwal_masa_sanggah_akhir['waktu_mulai'])) >= date('Y-m-d H:i')) { ?>
                            <?php    } else if (date('Y-m-d H:i', strtotime($jadwal_masa_sanggah_akhir['waktu_selesai'])) >= date('Y-m-d H:i') || date('Y-m-d H:i', strtotime($jadwal_masa_sanggah_akhir['waktu_mulai']))  == date('Y-m-d H:i')) { ?>
                                <li class="nav-item">
                                    <a class="nav-link bg-primary text-white" style="margin-left: 5px;" href="<?= base_url('tender_diikuti/sanggahan_akhir/'  . $rup['id_url_rup']) ?>"><i class="fa fa-hourglass-start" aria-hidden="true"></i> Sanggahan Pemenang </a>
                                </li>
                            <?php    } else { ?>
                            <?php    } ?>
                        <?php } else { ?>
                            <?php
                                    if (date('Y-m-d H:i', strtotime($jadwal_masa_sanggah_akhir['waktu_mulai']))  >= date('Y-m-d H:i')) { ?>

                            <?php    } else if (date('Y-m-d H:i', strtotime($jadwal_masa_sanggah_akhir['waktu_selesai'])) >= date('Y-m-d H:i') || date('Y-m-d H:i', strtotime($jadwal_masa_sanggah_akhir['waktu_mulai'])) == date('Y-m-d H:i')) { ?>
                                <li class="nav-item">
                                    <a class="nav-link bg-primary text-white" style="margin-left: 5px;" href="<?= base_url('tender_diikuti/sanggahan_akhir/'  . $rup['id_url_rup']) ?>"><i class="fa fa-hourglass-start" aria-hidden="true"></i> Sanggahan Pemenang </a>
                                </li>
                            <?php    } else { ?>
                            <?php    } ?>
                        <?php } ?> -->
                        <!-- <?php if (date('Y-m-d H:i', strtotime($jadwal_masa_sanggah_akhir['waktu_selesai'])) >= date('Y-m-d H:i') || date('Y-m-d H:i', strtotime($jadwal_masa_sanggah_akhir['waktu_mulai'])) == date('Y-m-d H:i')) { ?>
                            <?php $date2 = $jadwal_masa_sanggah_akhir['waktu_selesai'];
                                    if (date('Y-m-d H:i', strtotime($jadwal_masa_sanggah_akhir['waktu_mulai'])) >= date('Y-m-d H:i')) { ?>
                            <?php    } else if (date('Y-m-d H:i', strtotime($jadwal_masa_sanggah_akhir['waktu_selesai'])) >= date('Y-m-d H:i') || date('Y-m-d H:i', strtotime($jadwal_masa_sanggah_akhir['waktu_mulai']))  == date('Y-m-d H:i')) { ?>
                                <li class="nav-item">
                                    <a class="nav-link active " style="margin-left: 5px;" href="<?= base_url('tender_diikuti/sanggahan_akhir/'  . $rup['id_url_rup']) ?>"><i class="fa fa-hourglass-start" aria-hidden="true"></i> Sanggahan Prakualifikasi</a>
                                </li>
                            <?php    } else { ?>
                            <?php    } ?>
                        <?php } else { ?>
                            <?php
                                    if (date('Y-m-d H:i', strtotime($jadwal_masa_sanggah_akhir['waktu_mulai']))  >= date('Y-m-d H:i')) { ?>

                            <?php    } else if (date('Y-m-d H:i', strtotime($jadwal_masa_sanggah_akhir['waktu_selesai'])) >= date('Y-m-d H:i') || date('Y-m-d H:i', strtotime($jadwal_masa_sanggah_akhir['waktu_mulai'])) == date('Y-m-d H:i')) { ?>
                                <li class="nav-item">
                                    <a class="nav-link active " style="margin-left: 5px;" href="<?= base_url('tender_diikuti/sanggahan_akhir/'  . $rup['id_url_rup']) ?>"><i class="fa fa-hourglass-start" aria-hidden="true"></i> Sanggahan Prakualifikasi</a>
                                </li>
                            <?php    } else { ?>
                            <?php    } ?>
                        <?php } ?> -->
                    </ul>
                </div>
            </div>
            <hr>
            <div class="card border-dark">
                <div class="card">
                    <div class="card-header bg-primary text-white">
                        <h4>Informasi Pengadaan</h4>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered table-striped">
                            <tr>
                                <th style="width: 400px;">Nama Paket</th>
                                <td><?= $rup['nama_rup'] ?></td>
                            </tr>
                            <tr>
                                <th>Kode Tender</th>
                                <td><?= $rup['kode_rup'] ?></td>
                            </tr>
                            <tr>
                                <th>Nama Jenis Pengadaan</th>
                                <td>Pengadaan <?= $rup['nama_jenis_pengadaan'] ?></td>
                            </tr>
                            <tr>
                                <th>Nama Metode Pemilihan </th>
                                <td><?= $rup['nama_metode_pengadaan'] ?> <?= $rup['metode_kualifikasi'] ?> (<?= $rup['metode_dokumen'] ?>)</td>
                            </tr>
                        </table>
                    </div>
                </div>
                <div class="card-header border-dark bg-primary d-flex justify-content-between align-items-center">
                    <div class="flex-grow-1 bd-highlight">
                        <span class="text-dark">
                            <small class="text-white"><strong><i class="fa-solid fa-table px-1"></i> Data Tabel - Sanggahan Prakualifikasi</strong></small>
                        </span>
                    </div>
                </div>
                <div class="card-body">
                    <?php if (date('Y-m-d H:i', strtotime($jadwal_masa_sanggah_akhir['waktu_selesai'])) >= date('Y-m-d H:i') || date('Y-m-d H:i', strtotime($jadwal_masa_sanggah_akhir['waktu_mulai'])) == date('Y-m-d H:i')) { ?>
                        <?php $date2 = $jadwal_masa_sanggah_akhir['waktu_selesai'];
                        if (date('Y-m-d H:i', strtotime($jadwal_masa_sanggah_akhir['waktu_mulai'])) >= date('Y-m-d H:i')) { ?>
                        <?php    } else if (date('Y-m-d H:i', strtotime($jadwal_masa_sanggah_akhir['waktu_selesai'])) >= date('Y-m-d H:i') || date('Y-m-d H:i', strtotime($jadwal_masa_sanggah_akhir['waktu_mulai']))  == date('Y-m-d H:i')) { ?>
                            <a href="javascript:;" data-bs-toggle="modal" data-bs-target="#modal_sanggahan_akhir" class="btn btn-sm btn-primary mb-2"><i class="fa fa-upload"></i> Kirim Sanggahan </a>

                        <?php    } else { ?>
                            <a href="javascript:;" class="btn btn-sm btn-primary mb-2"> Waktu Sudah Berakhir </a>
                        <?php    } ?>
                    <?php } else { ?>
                        <?php
                        if (date('Y-m-d H:i', strtotime($jadwal_masa_sanggah_akhir['waktu_mulai']))  >= date('Y-m-d H:i')) { ?>

                        <?php    } else if (date('Y-m-d H:i', strtotime($jadwal_masa_sanggah_akhir['waktu_selesai'])) >= date('Y-m-d H:i') || date('Y-m-d H:i', strtotime($jadwal_masa_sanggah_akhir['waktu_mulai'])) == date('Y-m-d H:i')) { ?>
                            <a href="javascript:;" data-bs-toggle="modal" data-bs-target="#modal_sanggahan_akhir" class="btn btn-sm btn-primary mb-2"><i class="fa fa-upload"></i> Kirim Sanggahan </a>

                        <?php    } else { ?>
                            <a href="javascript:;" class="btn btn-sm btn-primary mb-2"> Waktu Sudah Berakhir </a>
                        <?php    } ?>
                    <?php } ?>

                    <table class="table table-bordered">
                        <thead class="bg-primary text-white">
                            <tr>
                                <!-- <th>No</th> -->
                                <th width="200px">Nama Peserta</th>
                                <th>Keterangan Penyedia</th>
                                <th>Download Sanggahan Penyedia</th>
                                <th>Keterangan Panitia</th>
                                <th>File Balasan</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody id="tbl_sanggah_akhir">

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
</main>


<div class="modal fade" id="modal_sanggahan_akhir" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title" id="exampleModalLabel"> <i class="fa fa-bullhorn" aria-hidden="true"></i> Upload Sanggahan Prakualifikasi</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="javascript:;" id="form_sanggahan_akhir">
                <div class="modal-body">
                    <div class="alert alert-primary d-flex align-items-center" role="alert">
                        <div>
                            <i class="fa fa-info-circle" aria-hidden="true"> </i> Silahkan Masukkan File Sanggahan Prakualifikasi !!! <br>
                        </div>
                    </div>
                    <div class="form-group">
                        <input type="hidden" name="id_rup" value="<?= $rup['id_rup'] ?>">
                        <table class="table table-bordered">
                            <tr>
                                <th>Keterangan</th>
                                <td><textarea name="ket_sanggah_akhir" class="form-control"></textarea></td>
                            </tr>
                            <tr>
                                <th>Upload</th>
                                <td><input accept="application/pdf" type="file" name="file_sanggah_akhir"></td>
                            </tr>
                        </table>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"> Batal</button>
                    <button type="submit" class="btn btn-success btn-sanggah"><i class="fas fa fa-upload"></i> Upload</button>
                </div>
            </form>
        </div>
    </div>
</div>