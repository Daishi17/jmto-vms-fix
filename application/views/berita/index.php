<main class="container-fluid mt-5">
    <div class="row">
        <div class="col">
            <div class="card border-dark shadow-lg">
                <div class="card-header bg-primary d-flex bd-highlight">
                    <div class="flex-grow-1 bd-highlight">
                        <span class="text-white">
                            <i class="fa-regular fa-folder-open px-0"></i>
                            <small><strong>Berita</strong></small>
                        </span>
                    </div>
                </div>
                <div class="card-body">
                    <div class="card border-dark shadow-lg">
                        <div class="card-header bg-dark d-flex bd-highlight">
                            <div class="flex-grow-1 bd-highlight">
                                <span class="text-white">
                                    <i class="fa-regular fa-folder-open px-0"></i>
                                    <small><strong>Data Tabel - Berita</strong></small>
                                </span>
                            </div>
                        </div>
                        <div class="card-body">
                            <input type="hidden" name="get_data_izin" value="<?= base_url('monitoring_dokumen/get_data_izin') ?>">
                            <table id="tbl_berita" class="table table-sm table-bordered table-striped">
                                <thead class="bg-secondary">
                                    <tr>
                                        <th style="width:2%;"><small class="text-white">No </small></th>
                                        <th style="width:60%;"><small class="text-white">Nama Berita</small></th>
                                        <th style="width:20%;"><small class="text-white">File</small></th>
                                        <th style="width:60%;"><small class="text-white">Waktu Buat</small></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1;
                                    foreach ($berita as $key => $value) { ?>
                                        <tr>
                                            <td><?= $i++ ?></td>
                                            <td><?= $value['nama_berita'] ?></td>
                                            <td><a target="_blank" href="https://eprocurement.jmto.co.id/file_paket/DOKUMEN_BERITA_TENDER/<?= $value['file_berita'] ?>"> <img width="10%" src="<?= base_url('assets/img/pdf.png') ?>"></a> </td>
                                            <td><?= date('d-m-Y H:i', strtotime($value['time_created'])) ?></td>
                                        </tr>
                                    <?php  } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>