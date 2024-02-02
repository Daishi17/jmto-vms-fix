<input type="hidden" name="url_get_negosiasi" value="<?= base_url('tender_diikuti/get_negosiasi/') ?>">
<input type="hidden" name="id_rup" value="<?= $rup['id_rup'] ?>">
<input type="hidden" name="id_vendor" value="<?= $this->session->userdata('id_vendor') ?>">
<main class="container">
    <div class="row">
        <div class="col">
            <div class="card" style="position: fixed; top:100px;z-index:999;width:85%;">
                <div class="card-header bg-white text-black">
                    <ul class="nav nav-tabs">
                        <li class="nav-item">
                            <small>
                                <a class="nav-link bg-primary text-white" style="margin-left: 5px;" href="<?= base_url('tender_diikuti/informasi_tender/' . $rup['id_url_rup']) ?>"><i class="fa fa-columns" aria-hidden="true"></i> Informasi Pengadaan</a>
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
                                <a class="nav-link active" style="margin-left: 5px;" href="<?= base_url('tender_diikuti/negosiasi/' . $rup['id_url_rup']) ?>"><i class="fa fa-tags" aria-hidden="true"></i> Negosiasi</a>
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
                <div class="card">
                    <div class="card-header bg-primary text-white">
                        <h4>Aanwijzing Pengadaan</h4>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered">
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
                            <small class="text-white"><strong><i class="fa-solid fa-table px-1"></i> Data Tabel - Negosiasi Pengadaan</strong></small>
                        </span>
                    </div>
                </div>
                <div class="card-body">
                    <div style="overflow-x: auto;">
                        <table class="table table-bordered" id="tbl_evaluasi">
                            <thead class="bg-primary text-white">
                                <tr>
                                    <th width="50px">No</th>
                                    <th width="200px">Nama Peserta</th>
                                    <th>Tanggal Negosiasi</th>
                                    <th>Link Meet (Jika Daring)</th>
                                    <th>Harga Negosiasi</th>
                                    <th>Keterangan Negosiasi</th>
                                    <th>Kesepakatan</th>
                                </tr>
                            </thead>
                            <tbody id="tbl_negosiasi">

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
</main>