<script>
    load_notice_version()

    function load_notice_version() {
        setTimeout(() => {
            $('#modal_notice_version').modal('show')
        }, 500);

    }

    function load_dokumen() {
        url_post = $('[name="count_validate"]').val()
        $.ajax({
            type: "GET",
            url: url_post,
            dataType: "JSON",
            success: function(response) {

            }
        })
    }

    load_data()

    function load_data() {
        var id_vendor = <?= $this->session->userdata('id_vendor') ?>;
        $.ajax({
            method: "POST",
            url: '<?= base_url('dashboard/get_dokumen_vendor/') ?>' + id_vendor,
            dataType: "JSON",
            success: function(response) {
                // siup
                if (!response['row_siup']) {

                } else {
                    if (response['row_siup'].sts_validasi == null || response['row_siup'].sts_validasi == 0) {
                        var tombol_validasi = '<a href="javascript:;" onclick="Valid_siup(\'' + response['row_siup'].id_url + '\')" class="btn btn-success btn-sm shadow-lg"><i class="fa-solid fa-square-check px-1"></i><small>Valid</small></a> ' +
                            '<a href="javascript:;" onclick="NonValid_siup(\'' + response['row_siup'].id_url + '\')" class="btn btn-danger btn-sm shadow-lg"><i class="fa-solid fa-rectangle-xmark px-1"></i><small>Tidak Valid</small></a>';
                        var sts_validasi = '<span class="badge bg-secondary">Belum Di Periksa</span>'
                    } else if (response['row_siup'].sts_validasi == 1) {
                        var tombol_validasi = '<button href="javascript:;" class="btn btn-success btn-sm shadow-lg" disabled><i class="fa-solid fa-square-check px-1"></i><small>Valid</small></button> ' +
                            '<a href="javascript:;" onclick="NonValid_siup(\'' + response['row_siup'].id_url + '\')" class="btn btn-danger btn-sm shadow-lg"><i class="fa-solid fa-rectangle-xmark px-1"></i><small>Tidak Valid</small></a>';
                        var sts_validasi = '<span class="badge bg-success">Sudah Valid</span>'
                    } else if (response['row_siup'].sts_validasi == 2) {
                        var tombol_validasi = '<a href="javascript:;" onclick="Valid_siup(\'' + response['row_siup'].id_url + '\')" class="btn btn-success btn-sm shadow-lg"><i class="fa-solid fa-square-check px-1"></i><small>Valid</small></a> ' +
                            '<a href="javascript:;" onclick="NonValid_siup(\'' + response['row_siup'].id_url + '\')" class="btn btn-danger btn-sm shadow-lg"><i class="fa-solid fa-rectangle-xmark px-1"></i><small>Tidak Valid</small></a>';
                        var sts_validasi = '<span class="badge bg-danger">Tidak Valid</span>'
                    } else if (response['row_siup'].sts_validasi == 3) {
                        var tombol_validasi = '<a href="javascript:;" onclick="Valid_siup(\'' + response['row_siup'].id_url + '\')" class="btn btn-success btn-sm shadow-lg"><i class="fa-solid fa-square-check px-1"></i><small>Valid</small></a> ' +
                            '<a href="javascript:;" onclick="NonValid_siup(\'' + response['row_siup'].id_url + '\')" class="btn btn-danger btn-sm shadow-lg"><i class="fa-solid fa-rectangle-xmark px-1"></i><small>Tidak Valid</small></a>';
                        var sts_validasi = '<span class="badge bg-warning">Revisi</span>'
                    }
                    if (response['row_siup'].tgl_periksa) {
                        var tgl_periksa = response['row_siup'].tgl_periksa
                    } else {
                        var tgl_periksa = '-'
                    }

                    var html_siup_rincian = ''
                    html_siup_rincian += '<tr>' +
                        '<td>' + response['row_siup'].nomor_surat + '</td>' +
                        '<td>' + sts_validasi + '</td>' +
                        '<td>' + tgl_periksa + '</td>' +
                        '</tr>';
                    $('#rincian_siup').html(html_siup_rincian);
                }


                if (!response['kbli_siup']) {

                } else {
                    var html_kbli_siup = ''
                    for (i = 0; i < response['kbli_siup'].length; i++) {
                        if (response['kbli_siup'][i].sts_kbli_siup == null || response['kbli_siup'][i].sts_kbli_siup == 0) {
                            var sts_validasi = '<span class="badge bg-secondary">Belum Di Periksa</span>'
                        } else if (response['kbli_siup'][i].sts_kbli_siup == 1) {
                            var sts_validasi = '<span class="badge bg-success">Sudah Valid</span>'
                        } else if (response['kbli_siup'][i].sts_kbli_siup == 2) {
                            var sts_validasi = '<span class="badge bg-danger">Tidak Valid</span>'
                        } else if (response['kbli_siup'][i].sts_kbli_siup == 3) {
                            var sts_validasi = '<span class="badge bg-warning">Revisi</span>'
                        }
                        if (response['kbli_siup'][i].tgl_periksa) {
                            var tgl_periksa_kbli_siup = response['kbli_siup'][i].tgl_periksa
                        } else {
                            var tgl_periksa_kbli_siup = '-'
                        }
                        html_kbli_siup += '<tr>' +
                            '<td>' + response['kbli_siup'][i].kode_kbli + '|' + response['kbli_siup'][i].nama_kbli + '</td>' +
                            '<td>' + sts_validasi + '</td>' +
                            '<td>' + tgl_periksa_kbli_siup + '</td>' +
                            '</tr>';
                    }
                    $('#rincian_kbli_siup').html(html_kbli_siup);
                }

                // end siup

                // sbu
                if (!response['row_sbu']) {

                } else {
                    if (response['row_sbu'].sts_validasi == null || response['row_sbu'].sts_validasi == 0) {
                        var tombol_validasi = '<a href="javascript:;" onclick="Valid_sbu(\'' + response['row_sbu'].id_url + '\')" class="btn btn-success btn-sm shadow-lg"><i class="fa-solid fa-square-check px-1"></i><small>Valid</small></a> ' +
                            '<a href="javascript:;" onclick="NonValid_sbu(\'' + response['row_sbu'].id_url + '\')" class="btn btn-danger btn-sm shadow-lg"><i class="fa-solid fa-rectangle-xmark px-1"></i><small>Tidak Valid</small></a>';
                        var sts_validasi = '<span class="badge bg-secondary">Belum Di Periksa</span>'
                    } else if (response['row_sbu'].sts_validasi == 1) {
                        var tombol_validasi = '<button href="javascript:;" class="btn btn-success btn-sm shadow-lg" disabled><i class="fa-solid fa-square-check px-1"></i><small>Valid</small></button> ' +
                            '<a href="javascript:;" onclick="NonValid_sbu(\'' + response['row_sbu'].id_url + '\')" class="btn btn-danger btn-sm shadow-lg"><i class="fa-solid fa-rectangle-xmark px-1"></i><small>Tidak Valid</small></a>';
                        var sts_validasi = '<span class="badge bg-success">Sudah Valid</span>'
                    } else if (response['row_sbu'].sts_validasi == 2) {
                        var tombol_validasi = '<a href="javascript:;" onclick="Valid_sbu(\'' + response['row_sbu'].id_url + '\')" class="btn btn-success btn-sm shadow-lg"><i class="fa-solid fa-square-check px-1"></i><small>Valid</small></a> ' +
                            '<a href="javascript:;" onclick="NonValid_sbu(\'' + response['row_sbu'].id_url + '\')" class="btn btn-danger btn-sm shadow-lg"><i class="fa-solid fa-rectangle-xmark px-1"></i><small>Tidak Valid</small></a>';
                        var sts_validasi = '<span class="badge bg-danger">Tidak Valid</span>'
                    } else if (response['row_sbu'].sts_validasi == 3) {
                        var tombol_validasi = '<a href="javascript:;" onclick="Valid_sbu(\'' + response['row_sbu'].id_url + '\')" class="btn btn-success btn-sm shadow-lg"><i class="fa-solid fa-square-check px-1"></i><small>Valid</small></a> ' +
                            '<a href="javascript:;" onclick="NonValid_sbu(\'' + response['row_sbu'].id_url + '\')" class="btn btn-danger btn-sm shadow-lg"><i class="fa-solid fa-rectangle-xmark px-1"></i><small>Tidak Valid</small></a>';
                        var sts_validasi = '<span class="badge bg-warning">Revisi</span>'
                    }
                    if (response['row_sbu'].tgl_periksa) {
                        var tgl_periksa = response['row_sbu'].tgl_periksa
                    } else {
                        var tgl_periksa = '-'
                    }

                    var html_sbu_rincian = ''
                    html_sbu_rincian += '<tr>' +
                        '<td>' + response['row_sbu'].nomor_surat + '</td>' +
                        '<td>' + sts_validasi + '</td>' +
                        '<td>' + tgl_periksa + '</td>' +
                        '</tr>';
                    $('#rincian_sbu').html(html_sbu_rincian);
                }


                if (!response['kbli_sbu']) {

                } else {
                    var html_kbli_sbu = ''
                    for (i = 0; i < response['kbli_sbu'].length; i++) {
                        if (response['kbli_sbu'][i].sts_kbli_sbu == null || response['kbli_sbu'][i].sts_kbli_sbu == 0) {
                            var sts_validasi = '<span class="badge bg-secondary">Belum Di Periksa</span>'
                        } else if (response['kbli_sbu'][i].sts_kbli_sbu == 1) {
                            var sts_validasi = '<span class="badge bg-success">Sudah Valid</span>'
                        } else if (response['kbli_sbu'][i].sts_kbli_sbu == 2) {
                            var sts_validasi = '<span class="badge bg-danger">Tidak Valid</span>'
                        } else if (response['kbli_sbu'][i].sts_kbli_sbu == 3) {
                            var sts_validasi = '<span class="badge bg-warning">Revisi</span>'
                        }
                        if (response['kbli_sbu'][i].tgl_periksa) {
                            var tgl_periksa_kbli_sbu = response['kbli_sbu'][i].tgl_periksa
                        } else {
                            var tgl_periksa_kbli_sbu = '-'
                        }
                        html_kbli_sbu += '<tr>' + '<td>' + response['kbli_sbu'][i].kode_sbu + '|' + response['kbli_sbu'][i].nama_sbu + '</td>' + '<td>' + sts_validasi + '</td>' + '<td>' + tgl_periksa_kbli_sbu + '</td>' + '</tr>';
                    }
                    $('#rincian_kbli_sbu').html(html_kbli_sbu);
                }

                // end sbu

                // nib
                if (!response['row_nib']) {

                } else {
                    if (response['row_nib'].sts_validasi == null || response['row_nib'].sts_validasi == 0) {
                        var tombol_validasi = '<a href="javascript:;" onclick="Valid_nib(\'' + response['row_nib'].id_url + '\')" class="btn btn-success btn-sm shadow-lg"><i class="fa-solid fa-square-check px-1"></i><small>Valid</small></a> ' +
                            '<a href="javascript:;" onclick="NonValid_nib(\'' + response['row_nib'].id_url + '\')" class="btn btn-danger btn-sm shadow-lg"><i class="fa-solid fa-rectangle-xmark px-1"></i><small>Tidak Valid</small></a>';
                        var sts_validasi = '<span class="badge bg-secondary">Belum Di Periksa</span>'
                    } else if (response['row_nib'].sts_validasi == 1) {
                        var tombol_validasi = '<button href="javascript:;" class="btn btn-success btn-sm shadow-lg" disabled><i class="fa-solid fa-square-check px-1"></i><small>Valid</small></button> ' +
                            '<a href="javascript:;" onclick="NonValid_nib(\'' + response['row_nib'].id_url + '\')" class="btn btn-danger btn-sm shadow-lg"><i class="fa-solid fa-rectangle-xmark px-1"></i><small>Tidak Valid</small></a>';
                        var sts_validasi = '<span class="badge bg-success">Sudah Valid</span>'
                    } else if (response['row_nib'].sts_validasi == 2) {
                        var tombol_validasi = '<a href="javascript:;" onclick="Valid_nib(\'' + response['row_nib'].id_url + '\')" class="btn btn-success btn-sm shadow-lg"><i class="fa-solid fa-square-check px-1"></i><small>Valid</small></a> ' +
                            '<a href="javascript:;" onclick="NonValid_nib(\'' + response['row_nib'].id_url + '\')" class="btn btn-danger btn-sm shadow-lg"><i class="fa-solid fa-rectangle-xmark px-1"></i><small>Tidak Valid</small></a>';
                        var sts_validasi = '<span class="badge bg-danger">Tidak Valid</span>'
                    } else if (response['row_nib'].sts_validasi == 3) {
                        var tombol_validasi = '<a href="javascript:;" onclick="Valid_nib(\'' + response['row_nib'].id_url + '\')" class="btn btn-success btn-sm shadow-lg"><i class="fa-solid fa-square-check px-1"></i><small>Valid</small></a> ' +
                            '<a href="javascript:;" onclick="NonValid_nib(\'' + response['row_nib'].id_url + '\')" class="btn btn-danger btn-sm shadow-lg"><i class="fa-solid fa-rectangle-xmark px-1"></i><small>Tidak Valid</small></a>';
                        var sts_validasi = '<span class="badge bg-warning">Revisi</span>'
                    }
                    if (response['row_nib'].tgl_periksa) {
                        var tgl_periksa = response['row_nib'].tgl_periksa
                    } else {
                        var tgl_periksa = '-'
                    }
                    var html_nib_rincian = ''
                    html_nib_rincian += '<tr>' +
                        '<td>' + response['row_nib'].nomor_surat + '</td>' +
                        '<td>' + sts_validasi + '</td>' +
                        '<td>' + tgl_periksa + '</td>' +
                        '</tr>';
                }

                if (!response['kbli_nib']) {

                } else {
                    $('#rincian_nib').html(html_nib_rincian);
                    var html_kbli_nib = ''
                    for (i = 0; i < response['kbli_nib'].length; i++) {
                        if (response['kbli_nib'][i].sts_kbli_nib == null || response['kbli_nib'][i].sts_kbli_nib == 0) {
                            var sts_validasi = '<span class="badge bg-secondary">Belum Di Periksa</span>'
                        } else if (response['kbli_nib'][i].sts_kbli_nib == 1) {
                            var sts_validasi = '<span class="badge bg-success">Sudah Valid</span>'
                        } else if (response['kbli_nib'][i].sts_kbli_nib == 2) {
                            var sts_validasi = '<span class="badge bg-danger">Tidak Valid</span>'
                        } else if (response['kbli_nib'][i].sts_kbli_nib == 3) {
                            var sts_validasi = '<span class="badge bg-warning">Revisi</span>'
                        }
                        if (response['kbli_nib'][i].tgl_periksa) {
                            var tgl_periksa_kbli_nib = response['kbli_nib'][i].tgl_periksa
                        } else {
                            var tgl_periksa_kbli_nib = '-'
                        }
                        html_kbli_nib += '<tr>' + '<td>' + response['kbli_nib'][i].kode_kbli + '|' + response['kbli_nib'][i].nama_kbli + '</td>' + '<td>' + sts_validasi + '</td>' + '<td>' + tgl_periksa_kbli_nib + '</td>' + '</tr>';
                    }
                    $('#rincian_kbli_nib').html(html_kbli_nib);
                }

                // end nib

                // siujk
                if (!response['row_siujk']) {

                } else {
                    if (response['row_siujk'].sts_validasi == null || response['row_siujk'].sts_validasi == 0) {
                        var tombol_validasi = '<a href="javascript:;" onclick="Valid_siujk(\'' + response['row_siujk'].id_url + '\')" class="btn btn-success btn-sm shadow-lg"><i class="fa-solid fa-square-check px-1"></i><small>Valid</small></a> ' +
                            '<a href="javascript:;" onclick="NonValid_siujk(\'' + response['row_siujk'].id_url + '\')" class="btn btn-danger btn-sm shadow-lg"><i class="fa-solid fa-rectangle-xmark px-1"></i><small>Tidak Valid</small></a>';
                        var sts_validasi = '<span class="badge bg-secondary">Belum Di Periksa</span>'
                    } else if (response['row_siujk'].sts_validasi == 1) {
                        var tombol_validasi = '<button href="javascript:;" class="btn btn-success btn-sm shadow-lg" disabled><i class="fa-solid fa-square-check px-1"></i><small>Valid</small></button> ' +
                            '<a href="javascript:;" onclick="NonValid_siujk(\'' + response['row_siujk'].id_url + '\')" class="btn btn-danger btn-sm shadow-lg"><i class="fa-solid fa-rectangle-xmark px-1"></i><small>Tidak Valid</small></a>';
                        var sts_validasi = '<span class="badge bg-success">Sudah Valid</span>'
                    } else if (response['row_siujk'].sts_validasi == 2) {
                        var tombol_validasi = '<a href="javascript:;" onclick="Valid_siujk(\'' + response['row_siujk'].id_url + '\')" class="btn btn-success btn-sm shadow-lg"><i class="fa-solid fa-square-check px-1"></i><small>Valid</small></a> ' +
                            '<a href="javascript:;" onclick="NonValid_siujk(\'' + response['row_siujk'].id_url + '\')" class="btn btn-danger btn-sm shadow-lg"><i class="fa-solid fa-rectangle-xmark px-1"></i><small>Tidak Valid</small></a>';
                        var sts_validasi = '<span class="badge bg-danger">Tidak Valid</span>'
                    } else if (response['row_siujk'].sts_validasi == 3) {
                        var tombol_validasi = '<a href="javascript:;" onclick="Valid_siujk(\'' + response['row_siujk'].id_url + '\')" class="btn btn-success btn-sm shadow-lg"><i class="fa-solid fa-square-check px-1"></i><small>Valid</small></a> ' +
                            '<a href="javascript:;" onclick="NonValid_siujk(\'' + response['row_siujk'].id_url + '\')" class="btn btn-danger btn-sm shadow-lg"><i class="fa-solid fa-rectangle-xmark px-1"></i><small>Tidak Valid</small></a>';
                        var sts_validasi = '<span class="badge bg-warning">Revisi</span>'
                    }
                    if (response['row_siujk'].tgl_periksa) {
                        var tgl_periksa = response['row_siujk'].tgl_periksa
                    } else {
                        var tgl_periksa = '-'
                    }

                    var html_siujk_rincian = ''
                    html_siujk_rincian += '<tr>' +
                        '<td>' + response['row_siujk'].nomor_surat + '</td>' +
                        '<td>' + sts_validasi + '</td>' +
                        '<td>' + tgl_periksa + '</td>' +
                        '</tr>';
                    $('#rincian_siujk').html(html_siujk_rincian);

                }

                if (!response['kbli_siujk']) {

                } else {
                    var html_kbli_siujk = ''
                    for (i = 0; i < response['kbli_siujk'].length; i++) {
                        if (response['kbli_siujk'][i].sts_kbli_siujk == null || response['kbli_siujk'][i].sts_kbli_siujk == 0) {
                            var sts_validasi = '<span class="badge bg-secondary">Belum Di Periksa</span>'
                        } else if (response['kbli_siujk'][i].sts_kbli_siujk == 1) {
                            var sts_validasi = '<span class="badge bg-success">Sudah Valid</span>'
                        } else if (response['kbli_siujk'][i].sts_kbli_siujk == 2) {
                            var sts_validasi = '<span class="badge bg-danger">Tidak Valid</span>'
                        } else if (response['kbli_siujk'][i].sts_kbli_siujk == 3) {
                            var sts_validasi = '<span class="badge bg-warning">Revisi</span>'
                        }
                        if (response['kbli_siujk'][i].tgl_periksa) {
                            var tgl_periksa_kbli_siujk = response['kbli_siujk'][i].tgl_periksa
                        } else {
                            var tgl_periksa_kbli_siujk = '-'
                        }
                        html_kbli_siujk += '<tr>' + '<td>' + response['kbli_siujk'][i].kode_kbli + '|' + response['kbli_siujk'][i].nama_kbli + '</td>' + '<td>' + sts_validasi + '</td>' + '<td>' + tgl_periksa_kbli_siujk + '</td>' + '</tr>';
                    }
                    $('#rincian_kbli_siujk').html(html_kbli_siujk);
                }

                // end siujk

                // akta
                if (!response['row_akta_pendirian']) {

                } else {
                    if (response['row_akta_pendirian'].sts_validasi == null || response['row_akta_pendirian'].sts_validasi == 0) {
                        var tombol_validasi = '<a href="javascript:;" onclick="Valid_akta_pendirian(\'' + response['row_akta_pendirian'].id_url + '\')" class="btn btn-success btn-sm shadow-lg"><i class="fa-solid fa-square-check px-1"></i><small>Valid</small></a> ' +
                            '<a href="javascript:;" onclick="NonValid_akta_pendirian(\'' + response['row_akta_pendirian'].id_url + '\')" class="btn btn-danger btn-sm shadow-lg"><i class="fa-solid fa-rectangle-xmark px-1"></i><small>Tidak Valid</small></a>';
                        var sts_validasi = '<span class="badge bg-secondary">Belum Di Periksa</span>'
                    } else if (response['row_akta_pendirian'].sts_validasi == 1) {
                        var tombol_validasi = '<button href="javascript:;" class="btn btn-success btn-sm shadow-lg" disabled><i class="fa-solid fa-square-check px-1"></i><small>Valid</small></button> ' +
                            '<a href="javascript:;" onclick="NonValid_akta_pendirian(\'' + response['row_akta_pendirian'].id_url + '\')" class="btn btn-danger btn-sm shadow-lg"><i class="fa-solid fa-rectangle-xmark px-1"></i><small>Tidak Valid</small></a>';
                        var sts_validasi = '<span class="badge bg-success">Sudah Valid</span>'
                    } else if (response['row_akta_pendirian'].sts_validasi == 2) {
                        var tombol_validasi = '<a href="javascript:;" onclick="Valid_akta_pendirian(\'' + response['row_akta_pendirian'].id_url + '\')" class="btn btn-success btn-sm shadow-lg"><i class="fa-solid fa-square-check px-1"></i><small>Valid</small></a> ' +
                            '<a href="javascript:;" onclick="NonValid_akta_pendirian(\'' + response['row_akta_pendirian'].id_url + '\')" class="btn btn-danger btn-sm shadow-lg"><i class="fa-solid fa-rectangle-xmark px-1"></i><small>Tidak Valid</small></a>';
                        var sts_validasi = '<span class="badge bg-danger">Tidak Valid</span>'
                    } else if (response['row_akta_pendirian'].sts_validasi == 2) {
                        var tombol_validasi = '<a href="javascript:;" onclick="Valid_akta_pendirian(\'' + response['row_akta_pendirian'].id_url + '\')" class="btn btn-success btn-sm shadow-lg"><i class="fa-solid fa-square-check px-1"></i><small>Valid</small></a> ' +
                            '<a href="javascript:;" onclick="NonValid_akta_pendirian(\'' + response['row_akta_pendirian'].id_url + '\')" class="btn btn-danger btn-sm shadow-lg"><i class="fa-solid fa-rectangle-xmark px-1"></i><small>Tidak Valid</small></a>';
                        var sts_validasi = '<span class="badge bg-warning">Revisi</span>'
                    }
                    if (response['row_akta_pendirian'].tgl_periksa) {
                        var tgl_periksa = response['row_akta_pendirian'].tgl_periksa
                    } else {
                        var tgl_periksa = '-'
                    }
                    var html_rincian_pendirian = ''
                    html_rincian_pendirian += '<tr>' +
                        '<td>' + response['row_akta_pendirian'].no_surat + '</td>' +
                        '<td>' + sts_validasi + '</td>' +
                        '<td>' + response['row_akta_pendirian'].tgl_periksa + '</td>' +
                        '</tr>';
                    $('#rincian_akta_pendirian').html(html_rincian_pendirian);
                }


                if (!response['row_akta_perubahan']) {

                } else {
                    if (response['row_akta_perubahan'].sts_validasi == null || response['row_akta_perubahan'].sts_validasi == 0) {
                        var tombol_validasi = '<a href="javascript:;" onclick="Valid_akta_perubahan(\'' + response['row_akta_perubahan'].id_url + '\')" class="btn btn-success btn-sm shadow-lg"><i class="fa-solid fa-square-check px-1"></i><small>Valid</small></a> ' +
                            '<a href="javascript:;" onclick="NonValid_akta_perubahan(\'' + response['row_akta_perubahan'].id_url + '\')" class="btn btn-danger btn-sm shadow-lg"><i class="fa-solid fa-rectangle-xmark px-1"></i><small>Tidak Valid</small></a>';
                        var sts_validasi = '<span class="badge bg-secondary">Belum Di Periksa</span>'
                    } else if (response['row_akta_perubahan'].sts_validasi == 1) {
                        var tombol_validasi = '<button href="javascript:;" class="btn btn-success btn-sm shadow-lg" disabled><i class="fa-solid fa-square-check px-1"></i><small>Valid</small></button> ' +
                            '<a href="javascript:;" onclick="NonValid_akta_perubahan(\'' + response['row_akta_perubahan'].id_url + '\')" class="btn btn-danger btn-sm shadow-lg"><i class="fa-solid fa-rectangle-xmark px-1"></i><small>Tidak Valid</small></a>';
                        var sts_validasi = '<span class="badge bg-success">Sudah Valid</span>'
                    } else if (response['row_akta_perubahan'].sts_validasi == 2) {
                        var tombol_validasi = '<a href="javascript:;" onclick="Valid_akta_perubahan(\'' + response['row_akta_perubahan'].id_url + '\')" class="btn btn-success btn-sm shadow-lg"><i class="fa-solid fa-square-check px-1"></i><small>Valid</small></a> ' +
                            '<a href="javascript:;" onclick="NonValid_akta_perubahan(\'' + response['row_akta_perubahan'].id_url + '\')" class="btn btn-danger btn-sm shadow-lg"><i class="fa-solid fa-rectangle-xmark px-1"></i><small>Tidak Valid</small></a>';
                        var sts_validasi = '<span class="badge bg-danger">Tidak Valid</span>'
                    } else if (response['row_akta_perubahan'].sts_validasi == 3) {
                        var tombol_validasi = '<a href="javascript:;" onclick="Valid_akta_perubahan(\'' + response['row_akta_perubahan'].id_url + '\')" class="btn btn-success btn-sm shadow-lg"><i class="fa-solid fa-square-check px-1"></i><small>Valid</small></a> ' +
                            '<a href="javascript:;" onclick="NonValid_akta_perubahan(\'' + response['row_akta_perubahan'].id_url + '\')" class="btn btn-danger btn-sm shadow-lg"><i class="fa-solid fa-rectangle-xmark px-1"></i><small>Tidak Valid</small></a>';
                        var sts_validasi = '<span class="badge bg-warning">Revisi</span>'
                    }
                    if (response['row_akta_perubahan'].tgl_periksa) {
                        var tgl_periksa = response['row_akta_perubahan'].tgl_periksa
                    } else {
                        var tgl_periksa = '-'
                    }
                    var html_rincian_perubahan = ''
                    html_rincian_perubahan += '<tr>' +
                        '<td>' + response['row_akta_perubahan'].no_surat + '</td>' +
                        '<td>' + sts_validasi + '</td>' +
                        '<td>' + tgl_periksa + '</td>' +
                        '</tr>';
                    $('#rincian_akta_perubahan').html(html_rincian_perubahan);
                }

                // end akta

                // manajerial 

                if (!response['pemilik']) {

                } else {
                    var html_pemilik = ''
                    for (i = 0; i < response['pemilik'].length; i++) {
                        if (response['pemilik'][i].sts_validasi == null || response['pemilik'][i].sts_validasi == 0) {
                            var sts_validasi = '<span class="badge bg-secondary">Belum Di Periksa</span>'
                        } else if (response['pemilik'][i].sts_validasi == 1) {
                            var sts_validasi = '<span class="badge bg-success">Sudah Valid</span>'
                        } else if (response['pemilik'][i].sts_validasi == 2) {
                            var sts_validasi = '<span class="badge bg-danger">Tidak Valid</span>'
                        } else if (response['pemilik'][i].sts_validasi == 3) {
                            var sts_validasi = '<span class="badge bg-warning">Revisi</span>'
                        }
                        if (response['pemilik'][i].nama_validator) {
                            var nama_validator = response['pemilik'][i].nama_validator
                        } else {
                            var nama_validator = '-'
                        }
                        if (response['pemilik'][i].tgl_periksa) {
                            var tgl_periksa = response['pemilik'][i].tgl_periksa
                        } else {
                            var tgl_periksa = '-'
                        }
                        html_pemilik += '<tr>' +
                            '<td>' + response['pemilik'][i].nik + '</td>' +
                            '<td>' + sts_validasi + '</td>' +
                            '<td>' + tgl_periksa + '</td>' +
                            '</tr>';
                    }
                    $('#rincian_pemilik').html(html_pemilik);
                }


                if (!response['pengurus']) {

                } else {
                    var html_pengurus = ''
                    for (i = 0; i < response['pengurus'].length; i++) {
                        if (response['pengurus'][i].sts_validasi == null || response['pengurus'][i].sts_validasi == 0) {
                            var sts_validasi = '<span class="badge bg-secondary">Belum Di Periksa</span>'
                        } else if (response['pengurus'][i].sts_validasi == 1) {
                            var sts_validasi = '<span class="badge bg-success">Sudah Valid</span>'
                        } else if (response['pengurus'][i].sts_validasi == 2) {
                            var sts_validasi = '<span class="badge bg-danger">Tidak Valid</span>'
                        } else if (response['pengurus'][i].sts_validasi == 3) {
                            var sts_validasi = '<span class="badge bg-warning">Revisi</span>'
                        }
                        if (response['pengurus'][i].nama_validator) {
                            var nama_validator = response['pengurus'][i].nama_validator
                        } else {
                            var nama_validator = '-'
                        }
                        if (response['pengurus'][i].tgl_periksa) {
                            var tgl_periksa = response['pengurus'][i].tgl_periksa
                        } else {
                            var tgl_periksa = '-'
                        }
                        html_pengurus += '<tr>' +
                            '<td>' + response['pengurus'][i].nik + '</td>' +
                            '<td>' + sts_validasi + '</td>' +
                            '<td>' + tgl_periksa + '</td>' +
                            '</tr>';
                    }
                    $('#rincian_pengurus').html(html_pengurus);
                }


                // end manajerial

                // pengalaman
                if (!response['pengalaman']) {

                } else {
                    var html_pengalaman = ''
                    for (i = 0; i < response['pengalaman'].length; i++) {
                        if (response['pengalaman'][i].sts_validasi == null || response['pengalaman'][i].sts_validasi == 0) {
                            var sts_validasi = '<span class="badge bg-secondary">Belum Di Periksa</span>'
                        } else if (response['pengalaman'][i].sts_validasi == 1) {
                            var sts_validasi = '<span class="badge bg-success">Sudah Valid</span>'
                        } else if (response['pengalaman'][i].sts_validasi == 2) {
                            var sts_validasi = '<span class="badge bg-danger">Tidak Valid</span>'
                        } else if (response['pengalaman'][i].sts_validasi == 3) {
                            var sts_validasi = '<span class="badge bg-warning">Revisi</span>'
                        }
                        if (response['pengalaman'][i].nama_validator) {
                            var nama_validator = response['pengalaman'][i].nama_validator
                        } else {
                            var nama_validator = '-'
                        }
                        if (response['pengalaman'][i].tgl_periksa) {
                            var tgl_periksa = response['pengalaman'][i].tgl_periksa
                        } else {
                            var tgl_periksa = '-'
                        }
                        html_pengalaman += '<tr>' +
                            '<td>' + response['pengalaman'][i].no_kontrak + '</td>' +
                            '<td>' + sts_validasi + '</td>' +
                            '<td>' + tgl_periksa + '</td>' +
                            '</tr>';
                    }
                    $('#rincian_pengalaman').html(html_pengalaman);
                }

                // end pengalaman

                // sppkp
                if (!response['row_sppkp']) {

                } else {
                    if (response['row_sppkp'].sts_validasi == null || response['row_sppkp'].sts_validasi == 0) {
                        var tombol_validasi = '<a href="javascript:;" onclick="Valid_sppkp(\'' + response['row_sppkp'].id_url + '\')" class="btn btn-success btn-sm shadow-lg"><i class="fa-solid fa-square-check px-1"></i><small>Valid</small></a> ' +
                            '<a href="javascript:;" onclick="NonValid_sppkp(\'' + response['row_sppkp'].id_url + '\')" class="btn btn-danger btn-sm shadow-lg"><i class="fa-solid fa-rectangle-xmark px-1"></i><small>Tidak Valid</small></a>';
                        var sts_validasi = '<span class="badge bg-secondary">Belum Di Periksa</span>'
                    } else if (response['row_sppkp'].sts_validasi == 1) {
                        var tombol_validasi = '<button href="javascript:;" class="btn btn-success btn-sm shadow-lg" disabled><i class="fa-solid fa-square-check px-1"></i><small>Valid</small></button> ' +
                            '<a href="javascript:;" onclick="NonValid_sppkp(\'' + response['row_sppkp'].id_url + '\')" class="btn btn-danger btn-sm shadow-lg"><i class="fa-solid fa-rectangle-xmark px-1"></i><small>Tidak Valid</small></a>';
                        var sts_validasi = '<span class="badge bg-success">Sudah Valid</span>'
                    } else if (response['row_sppkp'].sts_validasi == 2) {
                        var tombol_validasi = '<a href="javascript:;" onclick="Valid_sppkp(\'' + response['row_sppkp'].id_url + '\')" class="btn btn-success btn-sm shadow-lg"><i class="fa-solid fa-square-check px-1"></i><small>Valid</small></a> ' +
                            '<a href="javascript:;" onclick="NonValid_sppkp(\'' + response['row_sppkp'].id_url + '\')" class="btn btn-danger btn-sm shadow-lg"><i class="fa-solid fa-rectangle-xmark px-1"></i><small>Tidak Valid</small></a>';
                        var sts_validasi = '<span class="badge bg-danger">Tidak Valid</span>'
                    } else if (response['row_sppkp'].sts_validasi == 3) {
                        var tombol_validasi = '<a href="javascript:;" onclick="Valid_sppkp(\'' + response['row_sppkp'].id_url + '\')" class="btn btn-success btn-sm shadow-lg"><i class="fa-solid fa-square-check px-1"></i><small>Valid</small></a> ' +
                            '<a href="javascript:;" onclick="NonValid_sppkp(\'' + response['row_sppkp'].id_url + '\')" class="btn btn-danger btn-sm shadow-lg"><i class="fa-solid fa-rectangle-xmark px-1"></i><small>Tidak Valid</small></a>';
                        var sts_validasi = '<span class="badge bg-warning">Revisi</span>'
                    }
                    if (response['row_sppkp'].tgl_periksa) {
                        var tgl_periksa = response['row_sppkp'].tgl_periksa
                    } else {
                        var tgl_periksa = '-'
                    }
                    var html_rincian_sppkp = ''
                    html_rincian_sppkp += '<tr>' +
                        '<td>' + response['row_sppkp'].no_surat + '</td>' +
                        '<td>' + sts_validasi + '</td>' +
                        '<td>' + tgl_periksa + '</td>' +
                        '</tr>';
                    $('#rincian_sppkp').html(html_rincian_sppkp);
                }

                // end sppkp

                // npwp
                if (!response['row_npwp']) {

                } else {
                    if (response['row_npwp'].sts_validasi == null || response['row_npwp'].sts_validasi == 0) {
                        var tombol_validasi = '<a href="javascript:;" onclick="Valid_npwp(\'' + response['row_npwp'].id_url + '\')" class="btn btn-success btn-sm shadow-lg"><i class="fa-solid fa-square-check px-1"></i><small>Valid</small></a> ' +
                            '<a href="javascript:;" onclick="NonValid_npwp(\'' + response['row_npwp'].id_url + '\')" class="btn btn-danger btn-sm shadow-lg"><i class="fa-solid fa-rectangle-xmark px-1"></i><small>Tidak Valid</small></a>';
                        var sts_validasi = '<span class="badge bg-secondary">Belum Di Periksa</span>'
                    } else if (response['row_npwp'].sts_validasi == 1) {
                        var tombol_validasi = '<button href="javascript:;" class="btn btn-success btn-sm shadow-lg" disabled><i class="fa-solid fa-square-check px-1"></i><small>Valid</small></button> ' +
                            '<a href="javascript:;" onclick="NonValid_npwp(\'' + response['row_npwp'].id_url + '\')" class="btn btn-danger btn-sm shadow-lg"><i class="fa-solid fa-rectangle-xmark px-1"></i><small>Tidak Valid</small></a>';
                        var sts_validasi = '<span class="badge bg-success">Sudah Valid</span>'
                    } else if (response['row_npwp'].sts_validasi == 2) {
                        var tombol_validasi = '<a href="javascript:;" onclick="Valid_npwp(\'' + response['row_npwp'].id_url + '\')" class="btn btn-success btn-sm shadow-lg"><i class="fa-solid fa-square-check px-1"></i><small>Valid</small></a> ' +
                            '<a href="javascript:;" onclick="NonValid_npwp(\'' + response['row_npwp'].id_url + '\')" class="btn btn-danger btn-sm shadow-lg"><i class="fa-solid fa-rectangle-xmark px-1"></i><small>Tidak Valid</small></a>';
                        var sts_validasi = '<span class="badge bg-danger">Tidak Valid</span>'
                    } else if (response['row_npwp'].sts_validasi == 3) {
                        var tombol_validasi = '<a href="javascript:;" onclick="Valid_npwp(\'' + response['row_npwp'].id_url + '\')" class="btn btn-success btn-sm shadow-lg"><i class="fa-solid fa-square-check px-1"></i><small>Valid</small></a> ' +
                            '<a href="javascript:;" onclick="NonValid_npwp(\'' + response['row_npwp'].id_url + '\')" class="btn btn-danger btn-sm shadow-lg"><i class="fa-solid fa-rectangle-xmark px-1"></i><small>Tidak Valid</small></a>';
                        var sts_validasi = '<span class="badge bg-warning">Revisi</span>'
                    }
                    if (response['row_npwp'].tgl_periksa) {
                        var tgl_periksa = response['row_npwp'].tgl_periksa
                    } else {
                        var tgl_periksa = '-'
                    }
                    var html_rincian_npwp = ''
                    html_rincian_npwp += '<tr>' +
                        '<td>' + response['row_npwp'].no_npwp + '</td>' +
                        '<td>' + sts_validasi + '</td>' +
                        '<td>' + tgl_periksa + '</td>' +
                        '</tr>';
                    $('#rincian_npwp').html(html_rincian_npwp);
                }
                // end npwp

                // spt
                if (!response['spt']) {

                } else {
                    var html_spt = ''
                    for (i = 0; i < response['spt'].length; i++) {
                        if (response['spt'][i].sts_validasi == null || response['spt'][i].sts_validasi == 0) {
                            var sts_validasi = '<span class="badge bg-secondary">Belum Di Periksa</span>'
                        } else if (response['spt'][i].sts_validasi == 1) {
                            var sts_validasi = '<span class="badge bg-success">Sudah Valid</span>'
                        } else if (response['spt'][i].sts_validasi == 2) {
                            var sts_validasi = '<span class="badge bg-danger">Tidak Valid</span>'
                        } else if (response['spt'][i].sts_validasi == 3) {
                            var sts_validasi = '<span class="badge bg-warning">Revisi</span>'
                        }
                        if (response['spt'][i].nama_validator) {
                            var nama_validator = response['spt'][i].nama_validator
                        } else {
                            var nama_validator = '-'
                        }
                        if (response['spt'].tgl_periksa) {
                            var tgl_periksa = response['spt'].tgl_periksa
                        } else {
                            var tgl_periksa = '-'
                        }
                        html_spt += '<tr>' +
                            '<td>' + response['spt'][i].nomor_surat + '</td>' +
                            '<td>' + sts_validasi + '</td>' +
                            '<td>' + tgl_periksa + '</td>' +
                            '</tr>';
                    }
                    $('#rincian_spt').html(html_spt);
                }
                // 

                // laporan keuangan
                if (!response['keuangan']) {

                } else {
                    var html_keuangan = ''
                    for (i = 0; i < response['keuangan'].length; i++) {
                        if (response['keuangan'][i].sts_validasi == null || response['keuangan'][i].sts_validasi == 0) {
                            var sts_validasi = '<span class="badge bg-secondary">Belum Di Periksa</span>'
                        } else if (response['keuangan'][i].sts_validasi == 1) {
                            var sts_validasi = '<span class="badge bg-success">Sudah Valid</span>'
                        } else if (response['keuangan'][i].sts_validasi == 2) {
                            var sts_validasi = '<span class="badge bg-danger">Tidak Valid</span>'
                        } else if (response['keuangan'][i].sts_validasi == 3) {
                            var sts_validasi = '<span class="badge bg-warning">Revisi</span>'
                        }
                        if (response['keuangan'][i].tgl_periksa) {
                            var tgl_periksa = response['keuangan'][i].tgl_periksa
                        } else {
                            var tgl_periksa = '-'
                        }
                        if (response['keuangan'][i].nama_validator) {
                            var nama_validator = response['keuangan'][i].nama_validator
                        } else {
                            var nama_validator = '-'
                        }
                        html_keuangan += '<tr>' +
                            '<td>' + response['keuangan'][i].tahun_lapor + ' | ' + response['keuangan'][i].jenis_audit + '</td>' +
                            '<td>' + sts_validasi + '</td>' +
                            '<td>' + tgl_periksa + '</td>' +
                            '</tr>';
                    }
                    $('#rincian_keuangan').html(html_keuangan);
                }

                // end laporan keuangan
            }
        })
    }
</script>

<script>
    function pengajuan_dokumen() {
        var modal_pengajuan_dokumen = $('#modal_pengajuan_dokumen');
        modal_pengajuan_dokumen.modal('show');
    }
    $(document).ready(function() {
        $('#datatable_pengajuan_dokumen').DataTable({
            "responsive": false,
            "ordering": true,
            "processing": true,
            "serverSide": true,
            "autoWidth": false,
            "bDestroy": true,
            // "buttons": ["excel", "pdf", "print", "colvis"],
            initComplete: function() {
                this.api().buttons().container().appendTo($('.col-md-6:eq(0)', this.api().table().container()));
            },
            "order": [],
            "ajax": {
                "url": '<?= base_url('dashboard/get_datatable_pengajuan_perubahan_dokumen') ?>',
                "type": "POST",
            },
            "columnDefs": [{
                "target": [-1],
                "orderable": false
            }],
            "oLanguage": {
                "sSearch": "Pencarian : ",
                "sEmptyTable": "Tidak Ada Pengajuan Dokume Baru",
                "sLoadingRecords": "Silahkan Tunggu - loading...",
                "sLengthMenu": "Menampilkan &nbsp;  _MENU_  &nbsp;   Data",
                "sZeroRecords": "Tidak Ada Data Yang Di Cari",
                "sProcessing": "Memuat Data...."
            }
        }).buttons().container().appendTo('#tbl_rup .col-md-6:eq(0)');
    });

    function reload_tbl_pengajuan_dokumen() {
        $('#datatable_pengajuan_dokumen').DataTable().ajax.reload();
    }

    function pilih_jenis_dokumen_perubahan() {
        var jenis_dokumen_perubahan = $('[name="jenis_dokumen_perubahan"]').val()
        if (jenis_dokumen_perubahan == '') {
            Swal.fire('Anda Belum Memilih Jenis Dokumen Yang Ingin Anda Ubah', 'warning')
        } else {
            $.ajax({
                type: "POST",
                url: '<?= base_url('dashboard/add_pengajuan') ?>',
                dataType: "JSON",
                data: {
                    jenis_dokumen_perubahan: jenis_dokumen_perubahan,
                },
                success: function(response) {
                    if (response['validasi']) {
                        reload_tbl_pengajuan_dokumen()
                        Swal.fire(response['validasi'], '', 'warning')
                    } else {
                        reload_tbl_pengajuan_dokumen()
                        Swal.fire('Dokumen Berhasil Di Pilih', '', 'success')
                    }
                }
            })
        }
    }



    function Hapus_pengajuan(id_dokumen_perubahan) {
        Swal.fire({
            title: "Yakin Mau Hapus",
            text: 'Data Ini Mau Di hapus?',
            icon: "warning",
            buttons: true,
            dangerMode: true,
        }).then((willDelete) => {
            if (willDelete) {
                $.ajax({
                    type: "POST",
                    url: '<?= base_url('dashboard/hapus_dokumen_pengajuan') ?>',
                    data: {
                        id_dokumen_perubahan: id_dokumen_perubahan
                    },
                    dataType: "JSON",
                    success: function(response) {
                        Swal.fire('Good job!', 'Data Beharhasil Dihapus!', 'success');
                        reload_tbl_pengajuan_dokumen()
                    }
                })
            }
        });
    }
</script>