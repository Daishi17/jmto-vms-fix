<tr>
    <th>Dokumen Penawaran</th>
    <th>
        <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#buka_dokumen_penawaran">
            <i class="fa fa-folder-open" aria-hidden="true"></i> Upload Dokumen Penawaran
        </button>
    </th>
</tr>

<tr>
    <th>Dokumen Penawaran</th>
    <th>
        <label for="" class="badge bg-secondary">Tahap Sudah Selesai</label>
    </th>
</tr>

<tr>
    <th>Upload Dokumen Penawaran</th>
    <th>
        <button type="button" class="btn btn-sm btn-danger" disabled>
            <i class="fa fa-folder-close" aria-hidden="true"></i> Anda Telah Gugur Dalam Pengadaan Ini
        </button>
    </th>
</tr>

<?php $sts_valid_0 = $get_row_mengikuti['file1_administrasi_sts'] == 0 || $get_row_mengikuti['file1_organisasi_sts'] == 0 || $get_row_mengikuti['file1_pabrikan_sts'] == 0 || $get_row_mengikuti['file1_peralatan_sts'] == 0 || $get_row_mengikuti['file1_personil_sts'] == 0 || $get_row_mengikuti['file1_makalah_teknis_sts'] == 0 || $get_row_mengikuti['file1_pra_rk3_sts'] == 0 || $get_row_mengikuti['file1_spek_sts'] == 0;

$sts_valid = $get_row_mengikuti['file1_administrasi_sts'] == 1 && $get_row_mengikuti['file1_organisasi_sts'] == 1 && $get_row_mengikuti['file1_pabrikan_sts'] == 1 && $get_row_mengikuti['file1_peralatan_sts'] == 1 && $get_row_mengikuti['file1_personil_sts'] == 1 && $get_row_mengikuti['file1_makalah_teknis_sts'] == 1 && $get_row_mengikuti['file1_pra_rk3_sts'] == 1 && $get_row_mengikuti['file1_spek_sts'] == 1 || $get_row_mengikuti['file1_administrasi_sts'] == 3 && $get_row_mengikuti['file1_organisasi_sts'] == 3 && $get_row_mengikuti['file1_pabrikan_sts'] == 3 && $get_row_mengikuti['file1_peralatan_sts'] == 3 && $get_row_mengikuti['file1_personil_sts'] == 3 && $get_row_mengikuti['file1_makalah_teknis_sts'] == 3 && $get_row_mengikuti['file1_pra_rk3_sts'] == 3 && $get_row_mengikuti['file1_spek_sts'] == 3;

$sts_tdk_valid = $get_row_mengikuti['file1_administrasi_sts'] == 2 || $get_row_mengikuti['file1_organisasi_sts'] == 2 || $get_row_mengikuti['file1_pabrikan_sts'] == 2 || $get_row_mengikuti['file1_peralatan_sts'] == 2 || $get_row_mengikuti['file1_personil_sts'] == 2 || $get_row_mengikuti['file1_makalah_teknis_sts'] == 2 || $get_row_mengikuti['file1_pra_rk3_sts'] == 2 || $get_row_mengikuti['file1_spek_sts'] == 2;

if ($sts_valid_0) { ?>
    <span class="badge bg-warning text-white">Belum Diperiksa</span>

<?php } else if ($sts_valid) { ?>
    <span class="badge bg-success text-white">Lengkap</span>
<?php } else if ($sts_tdk_valid) { ?>
    <span class="badge bg-danger text-white">Tidak Lengkap</span>
<?php } else {   ?>
    <span class="badge bg-success text-white">Lengkap</span>
<?php } ?>