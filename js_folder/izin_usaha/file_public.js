
get_row_vendor();
    // nib
    $('.file_valid_nib').change(function(e) {
        var geekss = e.target.files[0].name;
        $('[name="file_dokumen_nib_manipulasi"]').val(geekss);
    });

    
    // siup
    $('.file_valid_siup').change(function(e) {
        var geekss = e.target.files[0].name;
        $('[name="file_dokumen_siup_manipulasi"]').val(geekss);
    });

        
    // sbu
    $('.file_valid_sbu').change(function(e) {
        var geekss = e.target.files[0].name;
        $('[name="file_dokumen_sbu_manipulasi"]').val(geekss);
    });

            
    // siujk
    $('.file_valid_siujk').change(function(e) {
        var geekss = e.target.files[0].name;
        $('[name="file_dokumen_siujk_manipulasi"]').val(geekss);
    });

        // skdp
        $('.file_valid_skdp').change(function(e) {
            var geekss = e.target.files[0].name;
            $('[name="file_dokumen_skdp_manipulasi"]').val(geekss);
        });

                // lainnya
                $('.file_valid_lainnya').change(function(e) {
                    var geekss = e.target.files[0].name;
                    $('[name="file_dokumen_lainnya_manipulasi"]').val(geekss);
                });

function get_row_vendor() {
    var secret_token = $('[name="secret_token"]').val()
    var id_url_vendor = $('[name="id_url_vendor"]').val()
    var url_get_row_vendor = $('[name="url_get_row_vendor"]').val()
    $.ajax({
        method: "POST",
        url: url_get_row_vendor + id_url_vendor,
        dataType: "JSON",
        data: {
            secret_token: secret_token,
        },
        success: function(response) {

            if (response['row_nib']) {
                if (response['validasi_result_nib'] == 'ada') {
                    if (response['validasi_nib'] == 'sudah_tervalidasi') {
                        $('#sts_validasi_nib_kbli_0').css('display','none');
                        $('#sts_validasi_nib_kbli_1').css('display','block');
                        $('#sts_validasi_nib_kbli_2').css('display','none');
                    } else if(response['validasi_nib'] == 'belum_diperiksa'){
                        $('#sts_validasi_nib_kbli_0').css('display','block');
                        $('#sts_validasi_nib_kbli_1').css('display','none');
                        $('#sts_validasi_nib_kbli_2').css('display','none');
                    } else {
                        $('#sts_validasi_nib_kbli_0').css('display','none');
                        $('#sts_validasi_nib_kbli_1').css('display','none');
                        $('#sts_validasi_nib_kbli_2').css('display','block');
                    }
                } else {
                    $('#sts_validasi_nib_kbli_0').css('display','block');
                    $('#sts_validasi_nib_kbli_1').css('display','none');
                    $('#sts_validasi_nib_kbli_2').css('display','none');
                }
                    if (response['row_nib']['sts_validasi'] == 0 || response['row_nib']['sts_validasi'] == '') {
                        $('#sts_validasi_nib_0').css('display','block');
                        $('#sts_validasi_nib_1').css('display','none');
                        $('#sts_validasi_nib_2').css('display','none');
                        $('#sts_validasi_nib_3').css('display','none');
                    } else if (response['row_nib']['sts_validasi'] == 1) {
                        $('#sts_validasi_nib_0').css('display','none');
                        $('#sts_validasi_nib_1').css('display','block');
                        $('#sts_validasi_nib_2').css('display','none');
                        $('#sts_validasi_nib_3').css('display','none');
                    } else if (response['row_nib']['sts_validasi'] == 2) {
                        $('#sts_validasi_nib_0').css('display','none');
                        $('#sts_validasi_nib_1').css('display','none');
                        $('#sts_validasi_nib_2').css('display','block');
                        $('#sts_validasi_nib_3').css('display','none');
                    } else if (response['row_nib']['sts_validasi'] == 3) {
                        $('#sts_validasi_nib_0').css('display','none');
                        $('#sts_validasi_nib_1').css('display','none');
                        $('#sts_validasi_nib_2').css('display','none');
                        $('#sts_validasi_nib_3').css('display','block');
                    }
               
                $('.nomor_surat_nib').attr("readonly", true);
                $('.sts_seumur_hidup_nib').attr("disabled", true);
                $('.tgl_berlaku_nib').attr("readonly", true);
                $('.kualifikasi_izin_nib').attr("disabled", true);
                $('.file_dokumen_nib').attr("disabled", true);
                $('.btn_nib').attr("disabled", true);
                $('.kbli_nib').attr("readonly", true);
                $('#on_save_nib').attr("disabled", true);
                $('#button_save_kbli_nib').addClass("disabled");
                $('#button_edit_kbli_nib').addClass("disabled");
                $('span.sts_validasi_nib_1').attr('title',response['row_nib']['alasan_validator']);
            } else {
                $('.nomor_surat_nib').attr("readonly", false);
                $('.sts_seumur_hidup_nib').attr("disabled", false);
                $('.tgl_berlaku_nib').attr("readonly", false);
                $('.kualifikasi_izin_nib').attr("disabled", false);
                $('.file_dokumen_nib').attr("readonly", false);
                $('.kbli_nib').attr("readonly", false);
                $('#on_save_nib').attr("disabled", false);
                $('#button_save_kbli_nib').removeClass("disabled");
                $('#button_edit_kbli_nib').removeClass("disabled");
            }

            if (response['row_siup']) {
                // siup
                if (response['validasi_result_siup'] == 'ada') {
                    if (response['validasi_siup'] == 'sudah_tervalidasi') {
                        $('#sts_validasi_siup_kbli_0').css('display','none');
                        $('#sts_validasi_siup_kbli_1').css('display','block');
                        $('#sts_validasi_siup_kbli_2').css('display','none');
                    } else if(response['validasi_siup'] == 'belum_diperiksa'){
                        $('#sts_validasi_siup_kbli_0').css('display','block');
                        $('#sts_validasi_siup_kbli_1').css('display','none');
                        $('#sts_validasi_siup_kbli_2').css('display','none');
                    } else {
                        $('#sts_validasi_siup_kbli_0').css('display','none');
                        $('#sts_validasi_siup_kbli_1').css('display','none');
                        $('#sts_validasi_siup_kbli_2').css('display','block');
                    }
                } else {
                    $('#sts_validasi_siup_kbli_0').css('display','block');
                    $('#sts_validasi_siup_kbli_1').css('display','none');
                    $('#sts_validasi_siup_kbli_2').css('display','none');
                }
                if (response['row_siup']['sts_pemeriksaan'] == 0) {
                    $('#sts_validasi_siup_0').css('display','block');
                    $('#sts_validasi_siup_1').css('display','none');
                    $('#sts_validasi_siup_2').css('display','none');
                    $('#sts_validasi_siup_3').css('display','none');
                } else {
                    if (response['row_siup']['sts_validasi'] == 0 || response['row_siup']['sts_validasi'] == '') {
                        $('#sts_validasi_siup_0').css('display','block');
                        $('#sts_validasi_siup_1').css('display','none');
                        $('#sts_validasi_siup_2').css('display','none');
                        $('#sts_validasi_siup_3').css('display','none');
                    } else if (response['row_siup']['sts_validasi'] == 1) {
                        $('#sts_validasi_siup_0').css('display','none');
                        $('#sts_validasi_siup_1').css('display','block');
                        $('#sts_validasi_siup_2').css('display','none');
                        $('#sts_validasi_siup_3').css('display','none');
                    } else if (response['row_siup']['sts_validasi'] == 2) {
                        $('#sts_validasi_siup_0').css('display','none');
                        $('#sts_validasi_siup_1').css('display','none');
                        $('#sts_validasi_siup_2').css('display','block');
                        $('#sts_validasi_siup_3').css('display','none');
                    } else if (response['row_siup']['sts_validasi'] == 3) {
                        $('#sts_validasi_siup_0').css('display','none');
                        $('#sts_validasi_siup_1').css('display','none');
                        $('#sts_validasi_siup_2').css('display','none');
                        $('#sts_validasi_siup_3').css('display','block');
                    }
                }
              
                $('.btn_siup').attr("disabled", true);
                $('.nomor_surat_siup').attr("readonly", true);
                $('.sts_seumur_hidup_siup').attr("disabled", true);
                $('.tgl_berlaku_siup').attr("readonly", true);
                $('.kualifikasi_izin_siup').attr("disabled", true);
                $('.file_dokumen_siup').attr("disabled", true);
                $('.kbli_siup').attr("readonly", true);
                $('#on_save_siup').attr("disabled", true);
                $('#button_save_kbli_siup').addClass("disabled");
                $('#button_edit_kbli_siup').addClass("disabled");
            } else {
                $('.nomor_surat_siup').attr("readonly", false);
                $('.sts_seumur_hidup_siup').attr("disabled", false);
                $('.tgl_berlaku_siup').attr("readonly", false);
                $('.kualifikasi_izin_siup').attr("disabled", false);
                $('.file_dokumen_siup').attr("readonly", false);
                $('.kbli_siup').attr("readonly", false);
                $('#on_save_siup').attr("disabled", false);
                $('#button_save_kbli_siup').removeClass("disabled");
                $('#button_edit_kbli_siup').removeClass("disabled");
            }

            if (response['row_sbu']) {
                 // sbu
                 if (response['validasi_result_sbu'] == 'ada') {
                    if (response['validasi_sbu'] == 'sudah_tervalidasi') {
                        $('#sts_validasi_sbu_kbli_0').css('display','none');
                        $('#sts_validasi_sbu_kbli_1').css('display','block');
                        $('#sts_validasi_sbu_kbli_2').css('display','none');
                    } else if(response['validasi_sbu'] == 'belum_diperiksa'){
                        $('#sts_validasi_sbu_kbli_0').css('display','block');
                        $('#sts_validasi_sbu_kbli_1').css('display','none');
                        $('#sts_validasi_sbu_kbli_2').css('display','none');
                    } else {
                        $('#sts_validasi_sbu_kbli_0').css('display','none');
                        $('#sts_validasi_sbu_kbli_1').css('display','none');
                        $('#sts_validasi_sbu_kbli_2').css('display','block');
                    }
                } else {
                    $('#sts_validasi_sbu_kbli_0').css('display','block');
                    $('#sts_validasi_sbu_kbli_1').css('display','none');
                    $('#sts_validasi_sbu_kbli_2').css('display','none');
                }

                if (response['row_sbu']['sts_validasi'] == 0 || response['row_sbu']['sts_validasi'] == '') {
                    $('#sts_validasi_sbu_0').css('display','block');
                    $('#sts_validasi_sbu_1').css('display','none');
                    $('#sts_validasi_sbu_2').css('display','none');
                    $('#sts_validasi_sbu_3').css('display','none');
                } else if (response['row_sbu']['sts_validasi'] == 1) {
                    $('#sts_validasi_sbu_0').css('display','none');
                    $('#sts_validasi_sbu_1').css('display','block');
                    $('#sts_validasi_sbu_2').css('display','none');
                    $('#sts_validasi_sbu_3').css('display','none');
                } else if (response['row_sbu']['sts_validasi'] == 2) {
                    $('#sts_validasi_sbu_0').css('display','none');
                    $('#sts_validasi_sbu_1').css('display','none');
                    $('#sts_validasi_sbu_2').css('display','block');
                    $('#sts_validasi_sbu_3').css('display','none');
                } else if (response['row_sbu']['sts_validasi'] == 3) {
                    $('#sts_validasi_sbu_0').css('display','none');
                    $('#sts_validasi_sbu_1').css('display','none');
                    $('#sts_validasi_sbu_2').css('display','none');
                    $('#sts_validasi_sbu_3').css('display','block');
                }
                $('.nomor_surat_sbu').attr("readonly", true);
                $('.sts_seumur_hidup_sbu').attr("disabled", true);
                $('.tgl_berlaku_sbu').attr("readonly", true);
                $('.kualifikasi_izin_sbu').attr("disabled", true);
                $('.btn_sbu').attr("disabled", true);
                $('.file_dokumen_sbu').attr("disabled", true);
                $('.kbli_sbu').attr("readonly", true);
                $('#on_save_sbu').attr("disabled", true);
                $('#button_save_kbli_sbu').addClass("disabled");
                $('#button_edit_kbli_sbu').addClass("disabled");
            } else {
                $('.nomor_surat_sbu').attr("readonly", false);
                $('.sts_seumur_hidup_sbu').attr("disabled", false);
                $('.tgl_berlaku_sbu').attr("readonly", false);
                $('.kualifikasi_izin_sbu').attr("disabled", false);
                $('.file_dokumen_sbu').attr("readonly", false);
                $('.kbli_sbu').attr("readonly", false);
                $('#on_save_sbu').attr("disabled", false);
                $('#button_save_kbli_sbu').removeClass("disabled");
                $('#button_edit_kbli_sbu').removeClass("disabled");
            }

            if (response['row_siujk']) {
                  // siujk
                  if (response['validasi_result_siujk'] == 'ada') {
                    if (response['validasi_siujk'] == 'sudah_tervalidasi') {
                        $('#sts_validasi_siujk_kbli_0').css('display','none');
                        $('#sts_validasi_siujk_kbli_1').css('display','block');
                        $('#sts_validasi_siujk_kbli_2').css('display','none');
                    } else if(response['validasi_siujk'] == 'belum_diperiksa'){
                        $('#sts_validasi_siujk_kbli_0').css('display','block');
                        $('#sts_validasi_siujk_kbli_1').css('display','none');
                        $('#sts_validasi_siujk_kbli_2').css('display','none');
                    } else {
                        $('#sts_validasi_siujk_kbli_0').css('display','none');
                        $('#sts_validasi_siujk_kbli_1').css('display','none');
                        $('#sts_validasi_siujk_kbli_2').css('display','block');
                    }
                } else {
                    $('#sts_validasi_siujk_kbli_0').css('display','block');
                    $('#sts_validasi_siujk_kbli_1').css('display','none');
                    $('#sts_validasi_siujk_kbli_2').css('display','none');
                }
                if (response['row_siujk']['sts_validasi'] == 0 || response['row_siujk']['sts_validasi'] == '') {
                    $('#sts_validasi_siujk_0').css('display','block');
                    $('#sts_validasi_siujk_1').css('display','none');
                    $('#sts_validasi_siujk_2').css('display','none');
                    $('#sts_validasi_siujk_3').css('display','none');
                } else if (response['row_siujk']['sts_validasi'] == 1) {
                    $('#sts_validasi_siujk_0').css('display','none');
                    $('#sts_validasi_siujk_1').css('display','block');
                    $('#sts_validasi_siujk_2').css('display','none');
                    $('#sts_validasi_siujk_3').css('display','none');
                } else if (response['row_siujk']['sts_validasi'] == 2) {
                    $('#sts_validasi_siujk_0').css('display','none');
                    $('#sts_validasi_siujk_1').css('display','none');
                    $('#sts_validasi_siujk_2').css('display','block');
                    $('#sts_validasi_siujk_3').css('display','none');
                } else if (response['row_siujk']['sts_validasi'] == 3) {
                    $('#sts_validasi_siujk_0').css('display','none');
                    $('#sts_validasi_siujk_1').css('display','none');
                    $('#sts_validasi_siujk_2').css('display','none');
                    $('#sts_validasi_siujk_3').css('display','block');
                }
                $('.btn_siujk').attr("disabled", true);
                $('.file_dokumen_siujk').attr("disabled", true);
                $('.nomor_surat_siujk').attr("readonly", true);
                $('.sts_seumur_hidup_siujk').attr("disabled", true);
                $('.tgl_berlaku_siujk').attr("readonly", true);
                $('.kualifikasi_izin_siujk').attr("disabled", true);
                $('.kbli_siujk').attr("readonly", true);
                $('#on_save_siujk').attr("disabled", true);
                $('#button_save_kbli_siujk').addClass("disabled");
                $('#button_edit_kbli_siujk').addClass("disabled");
            } else {
                $('.nomor_surat_siujk').attr("readonly", false);
                $('.sts_seumur_hidup_siujk').attr("disabled", false);
                $('.tgl_berlaku_siujk').attr("readonly", false);
                $('.kualifikasi_izin_siujk').attr("disabled", false);
                $('.file_dokumen_siujk').attr("readonly", false);
                $('.kbli_siujk').attr("readonly", false);
                $('#on_save_siujk').attr("disabled", false);
                $('#button_save_kbli_siujk').removeClass("disabled");
                $('#button_edit_kbli_siujk').removeClass("disabled");
            }

            if (response['row_skdp']) {
                // skdp
                if (response['validasi_result_skdp'] == 'ada') {
                    if (response['validasi_skdp'] == 'sudah_tervalidasi') {
                        $('#sts_validasi_skdp_kbli_0').css('display','none');
                        $('#sts_validasi_skdp_kbli_1').css('display','block');
                        $('#sts_validasi_skdp_kbli_2').css('display','none');
                    } else if(response['validasi_skdp'] == 'belum_diperiksa'){
                        $('#sts_validasi_skdp_kbli_0').css('display','block');
                        $('#sts_validasi_skdp_kbli_1').css('display','none');
                        $('#sts_validasi_skdp_kbli_2').css('display','none');
                    } else {
                        $('#sts_validasi_skdp_kbli_0').css('display','none');
                        $('#sts_validasi_skdp_kbli_1').css('display','none');
                        $('#sts_validasi_skdp_kbli_2').css('display','block');
                    }
                } else {
                    $('#sts_validasi_skdp_kbli_0').css('display','block');
                    $('#sts_validasi_skdp_kbli_1').css('display','none');
                    $('#sts_validasi_skdp_kbli_2').css('display','none');
                }
                if (response['row_skdp']['sts_validasi'] == 0 || response['row_skdp']['sts_validasi'] == '') {
                    $('#sts_validasi_skdp_0').css('display','block');
                    $('#sts_validasi_skdp_1').css('display','none');
                    $('#sts_validasi_skdp_2').css('display','none');
                    $('#sts_validasi_skdp_3').css('display','none');
                } else if (response['row_skdp']['sts_validasi'] == 1) {
                    $('#sts_validasi_skdp_0').css('display','none');
                    $('#sts_validasi_skdp_1').css('display','block');
                    $('#sts_validasi_skdp_2').css('display','none');
                    $('#sts_validasi_skdp_3').css('display','none');
                } else if (response['row_skdp']['sts_validasi'] == 2) {
                    $('#sts_validasi_skdp_0').css('display','none');
                    $('#sts_validasi_skdp_1').css('display','none');
                    $('#sts_validasi_skdp_2').css('display','block');
                    $('#sts_validasi_skdp_3').css('display','none');
                } else if (response['row_skdp']['sts_validasi'] == 3) {
                    $('#sts_validasi_skdp_0').css('display','none');
                    $('#sts_validasi_skdp_1').css('display','none');
                    $('#sts_validasi_skdp_2').css('display','none');
                    $('#sts_validasi_skdp_3').css('display','block');
                }
                $('.nomor_surat_skdp').attr("readonly", true);
                $('.sts_seumur_hidup_skdp').attr("disabled", true);
                $('.tgl_berlaku_skdp').attr("readonly", true);
                $('.kualifikasi_izin_skdp').attr("disabled", true);
                $('.btn_skdp').attr("disabled", true);
                $('.file_dokumen_skdp').attr("disabled", true);
                $('.kbli_skdp').attr("readonly", true);
                $('#on_save_skdp').attr("disabled", true);
                $('#button_save_kbli_skdp').addClass("disabled");
                $('#button_edit_kbli_skdp').addClass("disabled");
            } else {
                $('.nomor_surat_skdp').attr("readonly", false);
                $('.sts_seumur_hidup_skdp').attr("disabled", false);
                $('.tgl_berlaku_skdp').attr("readonly", false);
                $('.kualifikasi_izin_skdp').attr("disabled", false);
                $('.file_dokumen_skdp').attr("readonly", false);
                $('.kbli_skdp').attr("readonly", false);
                $('#on_save_skdp').attr("disabled", false);
                $('#button_save_kbli_skdp').removeClass("disabled");
                $('#button_edit_kbli_skdp').removeClass("disabled");
            }

            if (response['row_lainnya']) {
                if (response['row_lainnya']['sts_validasi'] == 0 || response['row_lainnya']['sts_validasi'] == '') {
                    $('#sts_validasi_lainnya_0').css('display','block');
                    $('#sts_validasi_lainnya_1').css('display','none');
                    $('#sts_validasi_lainnya_2').css('display','none');
                    $('#sts_validasi_lainnya_3').css('display','none');
                } else if (response['row_lainnya']['sts_validasi'] == 1) {
                    $('#sts_validasi_lainnya_0').css('display','none');
                    $('#sts_validasi_lainnya_1').css('display','block');
                    $('#sts_validasi_lainnya_2').css('display','none');
                    $('#sts_validasi_lainnya_3').css('display','none');
                } else if (response['row_lainnya']['sts_validasi'] == 2) {
                    $('#sts_validasi_lainnya_0').css('display','none');
                    $('#sts_validasi_lainnya_1').css('display','none');
                    $('#sts_validasi_lainnya_2').css('display','block');
                    $('#sts_validasi_lainnya_3').css('display','none');
                } else if (response['row_lainnya']['sts_validasi'] == 3) {
                    $('#sts_validasi_lainnya_0').css('display','none');
                    $('#sts_validasi_lainnya_1').css('display','none');
                    $('#sts_validasi_lainnya_2').css('display','none');
                    $('#sts_validasi_lainnya_3').css('display','block');
                }
                $('.file_dokumen_lainnya').attr("disabled", true);
                $('.nomor_surat_lainnya').attr("readonly", true);
                $('.nama_surat').attr("readonly", true);
                $('.sts_seumur_hidup_lainnya').attr("disabled", true);
                $('.tgl_berlaku_lainnya').attr("readonly", true);
                $('.kualifikasi_izin_lainnya').attr("disabled", true);
                $('.kbli_lainnya').attr("readonly", true);
                $('#on_save_lainnya').attr("disabled", true);
                $('#button_save_kbli_lainnya').addClass("disabled");
                $('#button_edit_kbli_lainnya').addClass("disabled");
            } else {
                $('.nomor_surat_lainnya').attr("readonly", false);
                $('.nama_surat').attr("readonly", false);
                $('.sts_seumur_hidup_lainnya').attr("disabled", false);
                $('.tgl_berlaku_lainnya').attr("readonly", false);
                $('.kualifikasi_izin_lainnya').attr("disabled", false);
                $('.file_dokumen_lainnya').attr("readonly", false);
                $('.kbli_lainnya').attr("readonly", false);
                $('#on_save_lainnya').attr("disabled", false);
                $('#button_save_kbli_lainnya').removeClass("disabled");
                $('#button_edit_kbli_lainnya').removeClass("disabled");
            }

            if (response == 'maaf') {
                alert('Maaf Anda Kurang Beruntung');
            } else {
                // nib
                if (!response['row_nib']) {
                    
                } else {
                    var id_url_nib = response['row_nib']['id_url'];
                    $('[name="file_dokumen_nib_manipulasi"]').val(response['row_nib']['file_dokumen']);
                    $('[name="no_urut_nib"]').val(response['row_nib']['no_urut']);
                    $('[name="nomor_surat_nib"]').val(response['row_nib']['nomor_surat']);
                    $('[name="sts_seumur_hidup_nib"]').val(response['row_nib']['sts_seumur_hidup']);
                    $('[name="kualifikasi_izin_nib"]').val(response['row_nib']['kualifikasi_izin']);
                    $('.file_dokumen_nib').text(response['row_nib']['file_dokumen'])
                    
                    if (response['row_nib']['sts_seumur_hidup'] == 1) {
                        $('[name="tgl_berlaku_nib"]').val(response['row_nib']['tgl_berlaku']);
                    } else {
                        $('[name="tgl_berlaku_nib"]').val('');
                    }
                    if (response['row_nib']['sts_token_dokumen'] == 1) {
                        $('.button_enkrip_nib').html('<a href="javascript:;"  onclick="DekripEnkrip_nib(\'' + id_url_nib + '\'' + ',' + '\'' + 'dekrip' + '\')" class="btn btn-warning btn-sm"><i class="fas fa-lock-open mr-2"></i> Dekripsi Dokumen</a>');
                        var html2 = '<a href="javascript:;" style="white-space: nowrap;width: 200px;overflow: hidden;text-overflow: ellipsis;" class="btn btn-sm btn-info btn-block">' +
                            response['row_nib']['file_dokumen'] + '</a>';
                        $('#tampil_dokumen_nib').html(html2);
                        $('.token_generate_nib').html('<div class="input-group"><span class="input-group-text"><i class="fas fa-qrcode"></i></span><textarea class="form-control form-control-sm" disabled>' + response['row_nib']['token_dokumen'] + '</textarea></div>');
                    } else {
                        $('.button_enkrip_nib').html('<a href="javascript:;" onclick="DekripEnkrip_nib(\'' + id_url_nib + '\'' + ',' + '\'' + 'enkrip' + '\')" class="btn btn-success btn-sm"><i class="fas fa-lock mr-2"></i> Enkripsi Dokumen</a>');
                        var html2 = '<a href="javascript:;" style="white-space: nowrap;width: 200px;overflow: hidden;text-overflow: ellipsis;" onclick="DownloadFile_nib(\'' + id_url_nib + '\')" class="btn btn-sm btn-warning btn-block">' + response['row_nib']['file_dokumen'] + '</a>';
                        $('#tampil_dokumen_nib').html(html2);
                    }
                }
              

                // siup
                if (!response['row_siup']) {
                    
                } else {
                    var id_url_siup = response['row_siup']['id_url'];
                    $('[name="file_dokumen_siup_manipulasi"]').val(response['row_siup']['file_dokumen']);
                    $('[name="jenis_izin_siup"]').val(response['row_siup']['jenis_izin']);
                    $('[name="no_urut_siup"]').val(response['row_siup']['no_urut']);
                    $('[name="nomor_surat_siup"]').val(response['row_siup']['nomor_surat']);
                    $('[name="kualifikasi_izin_siup"]').val(response['row_siup']['kualifikasi_izin']);
                    $('[name="sts_seumur_hidup_siup"]').val(response['row_siup']['sts_seumur_hidup']);
                    // console.log(response['row_siup']['tgl_berlaku']);
                    $('.file_dokumen_siup').text(response['row_siup']['file_dokumen'])

                    
                    if (response['row_siup']['sts_seumur_hidup'] == 1) {
                        $('[name="tgl_berlaku_siup"]').val(response['row_siup']['tgl_berlaku']);
                    } else {
                        $('[name="tgl_berlaku_siup"]').val('');
                    }
                    if (response['row_siup']['sts_token_dokumen'] == 1) {
                        $('.button_enkrip_siup').html('<a href="javascript:;"  onclick="DekripEnkrip_siup(\'' + id_url_siup + '\'' + ',' + '\'' + 'dekrip' + '\')" class="btn btn-warning btn-sm"><i class="fas fa-lock-open mr-2"></i> Dekripsi Dokumen</a>');
                        var html2 = '<a href="javascript:;" style="white-space: nowrap;width: 200px;overflow: hidden;text-overflow: ellipsis;" class="btn btn-sm btn-info btn-block">' +
                            response['row_siup']['file_dokumen'] + '</a>';
                        $('#tampil_dokumen_siup').html(html2);
                        $('.token_generate_siup').html('<div class="input-group"><span class="input-group-text"><i class="fas fa-qrcode"></i></span><textarea class="form-control form-control-sm" disabled>' + response['row_siup']['token_dokumen'] + '</textarea></div>');
                    } else {
                        $('.button_enkrip_siup').html('<a href="javascript:;" onclick="DekripEnkrip_siup(\'' + id_url_siup + '\'' + ',' + '\'' + 'enkrip' + '\')" class="btn btn-success btn-sm"><i class="fas fa-lock mr-2"></i> Enkripsi Dokumen</a>');
                        var html2 = '<a href="javascript:;" style="white-space: nowrap;width: 200px;overflow: hidden;text-overflow: ellipsis;" onclick="DownloadFile_siup(\'' + id_url_siup + '\')" class="btn btn-sm btn-warning btn-block">' + response['row_siup']['file_dokumen'] + '</a>';
                        $('#tampil_dokumen_siup').html(html2);
                    }
                }
              
                // sbu
                if (!response['row_sbu']) {
                    
                } else {
                    var id_url_sbu = response['row_sbu']['id_url'];

                    $('[name="file_dokumen_sbu_manipulasi"]').val(response['row_sbu']['file_dokumen']);
                    $('[name="jenis_izin_sbu"]').val(response['row_sbu']['jenis_izin']);
                    $('[name="no_urut_sbu"]').val(response['row_sbu']['no_urut']);
                    $('[name="nomor_surat_sbu"]').val(response['row_sbu']['nomor_surat']);
                    $('[name="kualifikasi_izin_sbu"]').val(response['row_sbu']['kualifikasi_izin']);
                    $('[name="tgl_berlaku_sbu"]').val(response['row_sbu']['tgl_berlaku']);
                    $('[name="sts_seumur_hidup_sbu"]').val(response['row_sbu']['sts_seumur_hidup']);
                    $('.file_dokumen_sbu').text(response['row_sbu']['file_dokumen'])

                    if (response['row_sbu']['sts_seumur_hidup'] == 1) {
                        $('[name="tgl_berlaku_sbu"]').val(response['row_sbu']['tgl_berlaku']);
                    } else {
                        $('[name="tgl_berlaku_sbu"]').val('');
                    }

                    if (response['row_sbu']['sts_token_dokumen'] == 1) {
                        $('.button_enkrip_sbu').html('<a href="javascript:;"  onclick="DekripEnkrip_sbu(\'' + id_url_sbu + '\'' + ',' + '\'' + 'dekrip' + '\')" class="btn btn-warning btn-sm"><i class="fas fa-lock-open mr-2"></i> Dekripsi Dokumen</a>');
                        var html2 = '<a href="javascript:;" style="white-space: nowrap;width: 200px;overflow: hidden;text-overflow: ellipsis;" class="btn btn-sm btn-info btn-block">' +
                            response['row_sbu']['file_dokumen'] + '</a>';
                        $('#tampil_dokumen_sbu').html(html2);
                        $('.token_generate_sbu').html('<div class="input-group"><span class="input-group-text"><i class="fas fa-qrcode"></i></span><textarea class="form-control form-control-sm" disabled>' + response['row_sbu']['token_dokumen'] + '</textarea></div>');
                    } else {
                        $('.button_enkrip_sbu').html('<a href="javascript:;" onclick="DekripEnkrip_sbu(\'' + id_url_sbu + '\'' + ',' + '\'' + 'enkrip' + '\')" class="btn btn-success btn-sm"><i class="fas fa-lock mr-2"></i> Enkripsi Dokumen</a>');
                        var html2 = '<a href="javascript:;" style="white-space: nowrap;width: 200px;overflow: hidden;text-overflow: ellipsis;" onclick="DownloadFile_sbu(\'' + id_url_sbu + '\')" class="btn btn-sm btn-warning btn-block">' + response['row_sbu']['file_dokumen'] + '</a>';
                        $('#tampil_dokumen_sbu').html(html2);
                    }
                }
              

                // siujk
                // if (response['row_siujk']) {
                    
                // } else {
                //     var id_url_siujk = response['row_siujk']['id_url'];
                //     $('[name="file_dokumen_siujk_manipulasi"]').val(response['row_siujk']['file_dokumen']);
                //     $('[name="jenis_izin_siujk"]').val(response['row_siujk']['jenis_izin']);
                //     $('[name="no_urut_siujk"]').val(response['row_siujk']['no_urut']);
                //     $('[name="nomor_surat_siujk"]').val(response['row_siujk']['nomor_surat']);
                //     $('[name="kualifikasi_izin_siujk"]').val(response['row_siujk']['kualifikasi_izin']);
                //     $('[name="tgl_berlaku_siujk"]').val(response['row_siujk']['tgl_berlaku']);
                //     $('.file_dokumen_siujk').text(response['row_siujk']['file_dokumen'])
                //     if (response['row_siujk']['sts_token_dokumen'] == 1) {
                //         $('.button_enkrip_siujk').html('<a href="javascript:;"  onclick="DekripEnkrip_siujk(\'' + id_url_siujk + '\'' + ',' + '\'' + 'dekrip' + '\')" class="btn btn-warning btn-sm"><i class="fas fa-lock-open mr-2"></i> Dekripsi Dokumen</a>');
                //         var html2 = '<a href="javascript:;" style="white-space: nowrap;width: 200px;overflow: hidden;text-overflow: ellipsis;" class="btn btn-sm btn-info btn-block">' +
                //             response['row_siujk']['file_dokumen'] + '</a>';
                //         $('#tampil_dokumen_siujk').html(html2);
                //         $('.token_generate_siujk').html('<div class="input-group"><span class="input-group-text"><i class="fas fa-qrcode"></i></span><textarea class="form-control form-control-sm" disabled>' + response['row_siujk']['token_dokumen'] + '</textarea></div>');
                //     } else {
                //         $('.button_enkrip_siujk').html('<a href="javascript:;" onclick="DekripEnkrip_siujk(\'' + id_url_siujk + '\'' + ',' + '\'' + 'enkrip' + '\')" class="btn btn-success btn-sm"><i class="fas fa-lock mr-2"></i> Enkripsi Dokumen</a>');
                //         var html2 = '<a href="javascript:;" style="white-space: nowrap;width: 200px;overflow: hidden;text-overflow: ellipsis;" onclick="DownloadFile_siujk(\'' + id_url_siujk + '\')" class="btn btn-sm btn-warning btn-block">' + response['row_siujk']['file_dokumen'] + '</a>';
                //         $('#tampil_dokumen_siujk').html(html2);
                //     }
                // }
               

                if (!response['row_skdp']) {
                    
                } else {
                      // skdp
                  var id_url_skdp = response['row_skdp']['id_url'];
                  $('[name="file_dokumen_skdp_manipulasi"]').val(response['row_skdp']['file_dokumen']);
                  $('[name="jenis_izin_skdp"]').val(response['row_skdp']['jenis_izin']);
                  $('[name="no_urut_skdp"]').val(response['row_skdp']['no_urut']);
                  $('[name="sts_seumur_hidup_skdp"]').val(response['row_skdp']['sts_seumur_hidup']);
                  $('[name="nomor_surat_skdp"]').val(response['row_skdp']['nomor_surat']);
                  $('[name="kualifikasi_izin_skdp"]').val(response['row_skdp']['kualifikasi_izin']);
                  $('[name="tgl_berlaku_skdp"]').val(response['row_skdp']['tgl_berlaku']);
                  $('.file_dokumen_skdp').text(response['row_skdp']['file_dokumen'])

                  
                if (response['row_skdp']['sts_seumur_hidup'] == 1) {
                    $('[name="tgl_berlaku_skdp"]').val(response['row_skdp']['tgl_berlaku']);
                } else {
                    $('[name="tgl_berlaku_skdp"]').val('');
                }
                  if (response['row_skdp']['sts_token_dokumen'] == 1) {
                      $('.button_enkrip_skdp').html('<a href="javascript:;"  onclick="DekripEnkrip_skdp(\'' + id_url_skdp + '\'' + ',' + '\'' + 'dekrip' + '\')" class="btn btn-warning btn-sm"><i class="fas fa-lock-open mr-2"></i> Dekripsi Dokumen</a>');
                      var html2 = '<a href="javascript:;" style="white-space: nowrap;width: 200px;overflow: hidden;text-overflow: ellipsis;" class="btn btn-sm btn-info btn-block">' +
                          response['row_skdp']['file_dokumen'] + '</a>';
                      $('#tampil_dokumen_skdp').html(html2);
                      $('.token_generate_skdp').html('<div class="input-group"><span class="input-group-text"><i class="fas fa-qrcode"></i></span><textarea class="form-control form-control-sm" disabled>' + response['row_skdp']['token_dokumen'] + '</textarea></div>');
                  } else {
                      $('.button_enkrip_skdp').html('<a href="javascript:;" onclick="DekripEnkrip_skdp(\'' + id_url_skdp + '\'' + ',' + '\'' + 'enkrip' + '\')" class="btn btn-success btn-sm"><i class="fas fa-lock mr-2"></i> Enkripsi Dokumen</a>');
                      var html2 = '<a href="javascript:;" style="white-space: nowrap;width: 200px;overflow: hidden;text-overflow: ellipsis;" onclick="DownloadFile_skdp(\'' + id_url_skdp + '\')" class="btn btn-sm btn-warning btn-block">' + response['row_skdp']['file_dokumen'] + '</a>';
                      $('#tampil_dokumen_skdp').html(html2);
                  }
                }
                
                  // lainnya
                  if (!response['row_lainnya']) {
                    
                  } else {
                    var id_url_lainnya = response['row_lainnya']['id_url'];
                    $('[name="file_dokumen_lainnya_manipulasi"]').val(response['row_lainnya']['file_dokumen']);
                    $('[name="jenis_izin_lainnya"]').val(response['row_lainnya']['jenis_izin']);
                    $('[name="no_urut_lainnya"]').val(response['row_lainnya']['no_urut']);
                    $('[name="nomor_surat_lainnya"]').val(response['row_lainnya']['nomor_surat']);
                    $('[name="nama_surat"]').val(response['row_lainnya']['nama_surat']);
                    $('[name="kualifikasi_izin_lainnya"]').val(response['row_lainnya']['kualifikasi_izin']);
                    $('[name="tgl_berlaku_lainnya"]').val(response['row_lainnya']['tgl_berlaku']);
                    $('.file_dokumen_lainnya').text(response['row_lainnya']['file_dokumen'])

                    if (response['row_lainnya']['sts_seumur_hidup'] == 1) {
                        $('[name="tgl_berlaku_lainnya"]').val(response['row_lainnya']['tgl_berlaku']);
                    } else {
                        $('[name="tgl_berlaku_lainnya"]').val('');
                    }
                    if (response['row_lainnya']['sts_token_dokumen'] == 1) {
                        $('.button_enkrip_lainnya').html('<a href="javascript:;"  onclick="DekripEnkrip_lainnya(\'' + id_url_lainnya + '\'' + ',' + '\'' + 'dekrip' + '\')" class="btn btn-warning btn-sm"><i class="fas fa-lock-open mr-2"></i> Dekripsi Dokumen</a>');
                        var html2 = '<a href="javascript:;" style="white-space: nowrap;width: 200px;overflow: hidden;text-overflow: ellipsis;" class="btn btn-sm btn-info btn-block">' +
                            response['row_lainnya']['file_dokumen'] + '</a>';
                        $('#tampil_dokumen_lainnya').html(html2);
                        $('.token_generate_lainnya').html('<div class="input-group"><span class="input-group-text"><i class="fas fa-qrcode"></i></span><textarea class="form-control form-control-sm" disabled>' + response['row_lainnya']['token_dokumen'] + '</textarea></div>');
                    } else {
                        $('.button_enkrip_lainnya').html('<a href="javascript:;" onclick="DekripEnkrip_lainnya(\'' + id_url_lainnya + '\'' + ',' + '\'' + 'enkrip' + '\')" class="btn btn-success btn-sm"><i class="fas fa-lock mr-2"></i> Enkripsi Dokumen</a>');
                        var html2 = '<a href="javascript:;" style="white-space: nowrap;width: 200px;overflow: hidden;text-overflow: ellipsis;" onclick="DownloadFile_lainnya(\'' + id_url_lainnya + '\')" class="btn btn-sm btn-warning btn-block">' + response['row_lainnya']['file_dokumen'] + '</a>';
                        $('#tampil_dokumen_lainnya').html(html2);
                    }
                  }
               

            }

        }
    })
}
//  BATAS NIB
function DownloadFile_nib(id_url_nib) {
    var url_download_nib = $('[name="url_download_nib"]').val()
    location.href = url_download_nib + id_url_nib;
}

function DekripEnkrip_nib(id_url_nib, type) {
    var secret_token = $('[name="secret_token"]').val()
    var url_encryption_nib = $('[name="url_encryption_nib"]').val();
    var modal_dekrip_nib = $('#modal_dekrip_nib');
    if (type == 'dekrip') {
        modal_dekrip_nib.modal('show');
        $('input').attr("readonly", false);
        $('[name="id_url_nib"]').val(id_url_nib);
    } else {
        $.ajax({
            method: "POST",
            url: url_encryption_nib + id_url_nib,
            dataType: "JSON",
            data: {
                secret_token: secret_token,
                type: type
            },
            success: function(response) {
                let timerInterval
                Swal.fire({
                    title: 'Sedang Proses Enkripsi!',
                    html: 'Proses Enkripsi <b></b>',
                    timer: 2000,
                    timerProgressBar: true,
                    didOpen: () => {
                        Swal.showLoading()
                        const b = Swal.getHtmlContainer().querySelector('b')
                        timerInterval = setInterval(() => {
                            // b.textContent = Swal.getTimerRight()
                        }, 100)
                    },
                    willClose: () => {
                        clearInterval(timerInterval)
                        Swal.fire('Dokumen Berhasil Di Enkripsi', '', 'success')
                        get_row_vendor();
                    }
                }).then((result) => {
                    /* Read more about handling dismissals below */
                    if (result.dismiss === Swal.DismissReason.timer) {

                    }
                })
            }
        })
    }

}

function GenerateDekrip_nib() {
    var url_dekrip_nib = $('[name="url_dekrip_nib"]').val();
    var modal_dekrip_nib = $('#modal_dekrip_nib');
    $.ajax({
        method: "POST",
        url: url_dekrip_nib,
        dataType: "JSON",
        data: $('#form_dekrip_nib').serialize(),
        beforeSend: function() {
            $('#button_dekrip_generate_nib').css('display', 'none');
            $('#button_dekrip_generate_manipulasi_nib').css('display', 'block');
        },
        success: function(response) {
            if (response['maaf']) {
                $('#button_dekrip_generate_nib').css('display', 'block');
                $('#button_dekrip_generate_manipulasi_nib').css('display', 'none');
                Swal.fire(response['maaf'], '', 'warning')
            } else {
                let timerInterval
                Swal.fire({
                    title: 'Sedang Proses Deskripsi!',
                    html: 'Proses Deksripsi <b></b>',
                    timer: 2000,
                    timerProgressBar: true,
                    didOpen: () => {
                        Swal.showLoading()
                        const b = Swal.getHtmlContainer().querySelector('b')
                        timerInterval = setInterval(() => {
                            // b.textContent = Swal.getTimerRight()
                        }, 100)
                    },
                    willClose: () => {
                        clearInterval(timerInterval)
                        Swal.fire('Dokumen Berhasil Di Deskripsi!', '', 'success')
                        get_row_vendor();
                        $('#button_dekrip_generate_nib').css('display', 'block');
                        $('#button_dekrip_generate_manipulasi_nib').css('display', 'none');
                        modal_dekrip_nib.modal('hide');
                    }
                }).then((result) => {
                    /* Read more about handling dismissals below */
                    if (result.dismiss === Swal.DismissReason.timer) {

                    }
                })
            }
        }
    })
}

var form_nib = $('#form_nib')
form_nib.on('submit', function(e) {
    var url_post_nib = $('[name="url_post_nib"]').val();
    var file_dokumen_nib_manipulasi = $('[name="file_dokumen_nib_manipulasi"]').val();
        if (file_dokumen_nib_manipulasi == '') {
            e.preventDefault();
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Dokumen Wajib Di Isi!',
              })
        } else {
            e.preventDefault();
            $.ajax({
                url: url_post_nib,
                method: "POST",
                data: new FormData(this),
                contentType: false,
                cache: false,
                processData: false,
                beforeSend: function() {
                    $('#on_save_nib').attr("disabled", true);
                },
                success: function(response) {
                    if (response['error']) {
                        $(".nomor_surat_nib_error").css('display','block');
                        $(".sts_seumur_hidup_nib_error").css('display','block');
                        $(".file_dokumen_nib_error").css('display','block');
                        $(".file_dokumen_nib_error").html(response['error']['file_dokumen_nib']);
                        $(".nomor_surat_nib_error").html(response['error']['nomor_surat_nib']);
                        $(".sts_seumur_hidup_nib_error").html(response['error']['sts_seumur_hidup_nib']);
                        $('#on_save_nib').attr("disabled", false);
                    } else {
                        let timerInterval
                        Swal.fire({
                            title: 'Sedang Proses Menyimpan Data!',
                            html: 'Membuat Data <b></b>',
                            timer: 3000,
                            timerProgressBar: true,
                            didOpen: () => {
                                Swal.showLoading()
                                const b = Swal.getHtmlContainer().querySelector('b')
                                timerInterval = setInterval(() => {
                                    // b.textContent = Swal.getTimerRight()
                                }, 100)
                            },
                            willClose: () => {
                                clearInterval(timerInterval)
                                Swal.fire('Data Berhasil Di Simpan!', '', 'success')
                                get_row_vendor();
                                $('#on_save_nib').attr("disabled", false);
                                $(".nomor_surat_nib_error").css('display','none');
                                $(".sts_seumur_hidup_nib_error").css('display','none');
                                $(".file_dokumen_nib_error").css('display','none');
                            }
                        }).then((result) => {
                            /* Read more about handling dismissals below */
                            if (result.dismiss === Swal.DismissReason.timer) {
        
                            }
                        })
                    }
                }
            }) 
        }
})

function sts_berlaku_nib() {
    var sts_seumur_hidup_nib = $('[name="sts_seumur_hidup_nib"]').val()
    if (sts_seumur_hidup_nib == 1) {
        $('.tgl_berlaku_nib').attr("readonly", false);
    } else {
        $('.tgl_berlaku_nib').attr("readonly", true);
    }
}

function EditChangeGlobal_nib() {
    $('#apply_edit_nib').modal('hide')
    $('.nomor_surat_nib').attr("readonly", false);
    $('.sts_seumur_hidup_nib').attr("disabled", false);
    $('.tgl_berlaku_nib').attr("readonly", false);
    $('.kualifikasi_izin_nib').attr("disabled", false);
    $('.file_dokumen_nib').attr("readonly", false);
    $('.btn_nib').attr("disabled", false);
    $('.kbli_nib').attr("readonly", false);
    $('.file_dokumen_nib').attr("disabled", false);
    $('#on_save_nib').attr("disabled", false);
    $('#button_save_kbli_nib').removeClass("disabled");
    $('#button_edit_kbli_nib').removeClass("disabled");
}

function input_nib_edit() {
    $('#apply_edit_nib').modal('hide')
    $('#modal-xl-kbli-nib').modal('show')
    $('.nomor_surat_nib').attr("readonly", false);
    $('.sts_seumur_hidup_nib').attr("disabled", false);
    $('.tgl_berlaku_nib').attr("readonly", false);
    $('.kualifikasi_izin_nib').attr("disabled", false);
    $('.file_dokumen_nib').attr("readonly", false);
    $('.kbli_nib').attr("readonly", false);
    $('.file_dokumen_nib').attr("disabled", false);
    // $('#on_save_nib').attr("disabled", true);
    $('#button_save_kbli_nib').removeClass("disabled");
    $('#button_edit_kbli_nib').removeClass("disabled");
}

function BatalChangeGlobal_nib() {
    $('#apply_edit_nib').modal('hide')
    $('.nomor_surat_nib').attr("readonly", true);
    $('.sts_seumur_hidup_nib').attr("disabled", true);
    $('.tgl_berlaku_nib').attr("readonly", true);
    $('.kualifikasi_izin_nib').attr("disabled", true);
    $('.file_dokumen_nib').attr("readonly", true);
    $('.btn_nib').attr("disabled", true);
    $('.kbli_nib').attr("readonly", true);
    $('.file_dokumen_nib').attr("disabled", true);
    $('#on_save_nib').attr("disabled", true);
    $('#button_save_kbli_nib').addClass("disabled");
    $('#button_edit_kbli_nib').addClass("disabled");
}

$('#modal_dekrip_nib').on('hidden.bs.modal', function() {
    get_row_vendor();
})

// GET TABLE KBLI NIB
var table_kbli_nib = $('#table_kbli_nib')
$(document).ready(function() {
    var url_table_kbli_nib = $('[name="url_table_kbli_nib"]').val();
    table_kbli_nib.DataTable({
        "responsive": true,
        "ordering": false,
        "processing": true,
        "serverSide": true,
        "dom": 'Bfrtip',
        "bDestroy": true,
        "autoWidth": false,
        "buttons": ["excel", "pdf", "print", "colvis"],
        "ajax": {
            "url": url_table_kbli_nib,
            "type": "POST",
        },
        "columnDefs": [{
            "target": [-1],
            "orderable": false
        }],
        "oLanguage": {
            "sSearch": "Pencarian : ",
            "sEmptyTable": "Data Tidak Tersedia",
            "sLoadingRecords": "Silahkan Tunggu - loading...",
            "sLengthMenu": "Menampilkan &nbsp; _MENU_ &nbsp; Data",
            "sZeroRecords": "Tidak Ada Data Yang Di Cari",
            "sProcessing": "Memuat Data...."
        }
    }).buttons().container().appendTo('#table_kbli_nib .col-md-6:eq(0)');
});

var table_kbli_nib_bawah = $('#table_kbli_nib_bawah')
$(document).ready(function() {
    var url_table_kbli_nib = $('[name="url_table_kbli_nib"]').val();
    table_kbli_nib_bawah.DataTable({
        "responsive": false,
        "ordering": true,
        "processing": true,
        "serverSide": true,
        "dom": 'Bfrtip',
        "buttons": ["excel", "pdf", "print", "colvis"],
        "order": [],
        "ajax": {
            "url": url_table_kbli_nib,
            "type": "POST",
        },
        "columnDefs": [{
            "target": [-1],
            "orderable": false
        }],
        "oLanguage": {
            "sSearch": "Pencarian : ",
            "sEmptyTable": "Data Tidak Tersedia",
            "sLoadingRecords": "Silahkan Tunggu - loading...",
            "sLengthMenu": "Menampilkan &nbsp;  _MENU_  &nbsp;   Data",
            "sZeroRecords": "Tidak Ada Data Yang Di Cari",
            "sProcessing": "Memuat Data...."
        }
    }).buttons().container().appendTo('#table_kbli_nib .col-md-6:eq(0)');
});


function reloadTable_kbli_nib() {
    table_kbli_nib.DataTable().ajax.reload();
}

// ADD NIB
function simpan_kbli_nib() {
    var form_simpan_kbli_nib = $('#form_simpan_kbli_nib');
    var url_tambah_kbli_nib = $('[name="url_tambah_kbli_nib"]').val();
        $.ajax({
            method: "POST",
            url: url_tambah_kbli_nib,
            data: form_simpan_kbli_nib.serialize(),
            dataType: "JSON",
            beforeSend: function() {
                $('#button_save_kbli_nib').attr("disabled", true);
            },
            success: function(response) {
                if (response['message'] == 'success') {
                    Swal.fire('Good job!', 'Data Berhasil Ditambah!', 'success');
                    reloadTable_kbli_nib()
                    $(".id_kbli_nib").css('display','none');
                    $(".id_kualifikasi_izin_kbli_nib").css('display','none');
                    $(".ket_kbli_nib").css('display','none');
                    $('#button_save_kbli_nib').attr("disabled", false);
                    form_simpan_kbli_nib[0].reset();
                }else{
                    if (response['error']['id_kbli_nib'] == '<p>Kode Kbli Sudah Ada Di Table Anda</p>') {
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: 'KODE KBLI SUDAH ADA',
                          })
                        $(".id_kualifikasi_izin_kbli_nib").css('display','block');
                        $(".ket_kbli_nib").css('display','block');
                        $(".id_kualifikasi_izin_kbli_nib").html(response['error']['id_kualifikasi_izin_kbli_nib']);
                        $(".ket_kbli_nib").html(response['error']['ket_kbli_nib']);
                        $('#button_save_kbli_nib').attr("disabled", false);
                    } else {
                        $(".id_kbli_nib").css('display','block');
                        $(".id_kualifikasi_izin_kbli_nib").css('display','block');
                        $(".ket_kbli_nib").css('display','block');
                        $(".id_kbli_nib").html(response['error']['id_kbli_nib']);
                        $(".id_kualifikasi_izin_kbli_nib").html(response['error']['id_kualifikasi_izin_kbli_nib']);
                        $(".ket_kbli_nib").html(response['error']['ket_kbli_nib']);
                        $('#button_save_kbli_nib').attr("disabled", false);
                    }
                }
            }
        })
}


function byid_kbli_nib(id_url_kbli_nib, type) {
    var modal_edit_kbli_nib = $('#modal_edit_kbli_nib');
    var url_byid_kbli_nib = $('[name="url_byid_kbli_nib"]').val();
    if (type == 'edit') {
        saveData = 'edit';
    }

    if (type == 'hapus') {
        saveData = 'hapus';
    }

    $.ajax({
        type: "GET",
        url: url_byid_kbli_nib + id_url_kbli_nib,
        dataType: "JSON",
        success: function(response) {
            if (type == 'edit') {
                modal_edit_kbli_nib.modal('show');
                $('[name="id_url_kbli_nib"]').val(response['row_kbli_nib'].id_url_kbli_nib);
                $('[name="token_kbli_nib"]').val(response['row_kbli_nib'].token_kbli_nib);
                $('[name="id_kbli_nib"]').val(response['row_kbli_nib'].id_kbli);
                $('[name="id_kualifikasi_izin_kbli_nib"]').val(response['row_kbli_nib'].id_kualifikasi_izin);
                $('[name="ket_kbli_nib"]').val(response['row_kbli_nib'].ket_kbli_nib);
                $('#pilihan_kbli_nib').html(response['row_kbli_nib'].kode_kbli + ' || ' + response['row_kbli_nib'].nama_kbli);
                $('#pilihan_kualifikasi_kbli_nib').html(response['row_kbli_nib'].nama_kualifikasi);
            } else {
                Question_kbli_nib(id_url_kbli_nib, response['row_kbli_nib'].token_kbli_nib);
            }
        }
    })
}

function Question_kbli_nib(id_url_kbli_nib, token_kbli_nib) {
    var form_simpan_kbli_nib = $('#form_simpan_kbli_nib');
    var url_hapus_kbli_nib = $('[name="url_hapus_kbli_nib"]').val();
    Swal.fire({
        title: "Data Di Hapus",
        text: 'Kbli Ini Mau Di hapus?',
        icon: "warning",
        buttons: true,
        dangerMode: true,
    }).then((willDelete) => {
        if (willDelete) {
            $.ajax({
                type: "POST",
                url: url_hapus_kbli_nib,
                data: {
                    id_url_kbli_nib: id_url_kbli_nib,
                    token_kbli_nib: token_kbli_nib
                },
                dataType: "JSON",
                success: function(response) {
                    if (response['message'] == 'success') {
                        Swal.fire('Good job!', 'Data Berhasil Dihapus!', 'success');
                        form_simpan_kbli_nib[0].reset();
                        reloadTable_kbli_nib()
                    } else {
                        Swal.fire('Maaf', response['maaf'], 'warning');
                    }
                }
            })
        }
    });
}

function edit_kbli_nib() {
    var form_simpan_kbli_nib = $('#form_simpan_kbli_nib');
    var form_edit_kbli_nib = $('#form_edit_kbli_nib');
    var modal_edit_kbli_nib = $('#modal_edit_kbli_nib');
    var url_edit_kbli_nib = $('[name="url_edit_kbli_nib"]').val();
        $.ajax({
            method: "POST",
            url: url_edit_kbli_nib,
            data: form_edit_kbli_nib.serialize(),
            dataType: "JSON",
            beforeSend: function() {
                $('#button_edit_kbli_nib').attr("disabled", true);
            },
            success: function(response) {
                if (response['message'] == 'success') {
                        modal_edit_kbli_nib.modal('hide');
                        Swal.fire('Good job!', 'Data Berhasil Edit!', 'success');
                        form_simpan_kbli_nib[0].reset();
                        form_edit_kbli_nib[0].reset();
                        reloadTable_kbli_nib();
                        $('#button_edit_kbli_nib').attr("disabled", false);
                        $(".id_kbli_nib_error").css('display','none');
                        $(".id_kualifikasi_izin_kbli_nib_error").css('display','none');
                        $(".ket_kbli_nib_error").css('display','none');
                 } else {
                    if (response['error']['id_kbli_nib'] == '<p>Kode Kbli Sudah Ada Di Table Anda</p>') {
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: 'KODE KBLI SUDAH ADA',
                          })
                        $(".id_kualifikasi_izin_kbli_nib_error").css('display','block');
                        $(".ket_kbli_nib_error").css('display','block');
                        $(".id_kualifikasi_izin_kbli_nib_error").html(response['error']['id_kualifikasi_izin_kbli_nib']);
                        $(".ket_kbli_nib_error").html(response['error']['ket_kbli_nib']);
                        $('#button_edit_kbli_nib_error').attr("disabled", false);
                    } else {
                        $(".id_kbli_nib_error").css('display','block');
                        $(".id_kualifikasi_izin_kbli_nib_error").css('display','block');
                        $(".ket_kbli_nib_error").css('display','block');
                        $(".id_kbli_nib_error").html(response['error']['id_kbli_nib']);
                        $(".id_kualifikasi_izin_kbli_nib_error").html(response['error']['id_kualifikasi_izin_kbli_nib']);
                        $(".ket_kbli_nib_error").html(response['error']['ket_kbli_nib']);
                        $('#button_edit_kbli_nib_error').attr("disabled", false);
                    }
                }
            }
        })
}




//  BATAS siup
function DownloadFile_siup(id_url_siup) {
    var url_download_siup = $('[name="url_download_siup"]').val()
    location.href = url_download_siup + id_url_siup;
}

function DekripEnkrip_siup(id_url_siup, type) {
    var secret_token = $('[name="secret_token"]').val()
    var url_encryption_siup = $('[name="url_encryption_siup"]').val();
    var modal_dekrip_siup = $('#modal_dekrip_siup');
    if (type == 'dekrip') {
        modal_dekrip_siup.modal('show');
        $('input').attr("readonly", false);
        $('[name="id_url_siup"]').val(id_url_siup);
    } else {
        $.ajax({
            method: "POST",
            url: url_encryption_siup + id_url_siup,
            dataType: "JSON",
            data: {
                secret_token: secret_token,
                type: type
            },
            success: function(response) {
                let timerInterval
                Swal.fire({
                    title: 'Sedang Proses Enkripsi!',
                    html: 'Proses Enkripsi <b></b>',
                    timer: 2000,
                    timerProgressBar: true,
                    didOpen: () => {
                        Swal.showLoading()
                        const b = Swal.getHtmlContainer().querySelector('b')
                        timerInterval = setInterval(() => {
                            // b.textContent = Swal.getTimerRight()
                        }, 100)
                    },
                    willClose: () => {
                        clearInterval(timerInterval)
                        Swal.fire('Dokumen Berhasil Di Enkripsi', '', 'success')
                        get_row_vendor();
                    }
                }).then((result) => {
                    /* Read more about handling dismissals below */
                    if (result.dismiss === Swal.DismissReason.timer) {

                    }
                })
            }
        })
    }

}

function GenerateDekrip_siup() {
    var url_dekrip_siup = $('[name="url_dekrip_siup"]').val();
    var modal_dekrip_siup = $('#modal_dekrip_siup');
    $.ajax({
        method: "POST",
        url: url_dekrip_siup,
        dataType: "JSON",
        data: $('#form_dekrip_siup').serialize(),
        beforeSend: function() {
            $('#button_dekrip_generate_siup').css('display', 'none');
            $('#button_dekrip_generate_manipulasi_siup').css('display', 'block');
        },
        success: function(response) {
            if (response['maaf']) {
                $('#button_dekrip_generate_siup').css('display', 'block');
                $('#button_dekrip_generate_manipulasi_siup').css('display', 'none');
                Swal.fire(response['maaf'], '', 'warning')
            } else {
                let timerInterval
                Swal.fire({
                    title: 'Sedang Proses Deskripsi!',
                    html: 'Proses Deksripsi <b></b>',
                    timer: 2000,
                    timerProgressBar: true,
                    didOpen: () => {
                        Swal.showLoading()
                        const b = Swal.getHtmlContainer().querySelector('b')
                        timerInterval = setInterval(() => {
                            // b.textContent = Swal.getTimerRight()
                        }, 100)
                    },
                    willClose: () => {
                        clearInterval(timerInterval)
                        Swal.fire('Dokumen Berhasil Di Deskripsi!', '', 'success')
                        get_row_vendor();
                        $('#button_dekrip_generate_siup').css('display', 'block');
                        $('#button_dekrip_generate_manipulasi_siup').css('display', 'none');
                        modal_dekrip_siup.modal('hide');
                    }
                }).then((result) => {
                    /* Read more about handling dismissals below */
                    if (result.dismiss === Swal.DismissReason.timer) {

                    }
                })
            }
        }
    })
}

var form_siup = $('#form_siup')
form_siup.on('submit', function(e) {
    var url_post_siup = $('[name="url_post_siup"]').val();
    var file_dokumen_siup_manipulasi = $('[name="file_dokumen_siup_manipulasi"]').val();
    if (file_dokumen_siup_manipulasi == '') {
        e.preventDefault();
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Dokumen Wajib Di Isi!',
          })
    } else {
        e.preventDefault();
        $.ajax({
            url: url_post_siup,
            method: "POST",
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData: false,
            beforeSend: function() {
                $('#on_save_siup').attr("disabled", true);
            },
            success: function(response) {
                if (response['error']) {
                    $(".nomor_surat_siup_error").css('display', 'block');
                    $(".sts_seumur_hidup_siup_error").css('display', 'block');
                    $(".file_dokumen_siup_error").css('display', 'block');
                    $(".file_dokumen_siup_error").html(response['error']['file_dokumen_siup']);
                    $(".nomor_surat_siup_error").html(response['error']['nomor_surat_siup']);
                    $(".sts_seumur_hidup_siup_error").html(response['error']['sts_seumur_hidup_siup']);
                    $('#on_save_siup').attr("disabled", false);
                } else {
                let timerInterval
                Swal.fire({
                    title: 'Sedang Proses Menyimpan Data!',
                    html: 'Membuat Data <b></b>',
                    timer: 3000,
                    timerProgressBar: true,
                    didOpen: () => {
                        Swal.showLoading()
                        const b = Swal.getHtmlContainer().querySelector('b')
                        timerInterval = setInterval(() => {
                            // b.textContent = Swal.getTimerRight()
                        }, 100)
                    },
                    willClose: () => {
                        clearInterval(timerInterval)
                        Swal.fire('Data Berhasil Di Simpan!', '', 'success')
                        get_row_vendor();
                        $('#on_save_siup').attr("disabled", false);
                        $(".nomor_surat_siup_error").css('display', 'none');
                        $(".sts_seumur_hidup_siup_error").css('display', 'none');
                        $(".file_dokumen_siup_error").css('display', 'none');
                    }
                }).then((result) => {
                    /* Read more about handling dismissals below */
                    if (result.dismiss === Swal.DismissReason.timer) {

                    }
                })
                 }
            }
        })
            }
})

function sts_berlaku_siup() {
    var sts_seumur_hidup_siup = $('[name="sts_seumur_hidup_siup"]').val()
    if (sts_seumur_hidup_siup == 1) {
        $('.tgl_berlaku_siup').attr("readonly", false);
    } else {
        $('.tgl_berlaku_siup').attr("readonly", true);
    }
}

function EditChangeGlobal_siup() {
    $('#apply_edit_siup').modal('hide')
    $('.nomor_surat_siup').attr("readonly", false);
    $('.sts_seumur_hidup_siup').attr("disabled", false);
    $('.tgl_berlaku_siup').attr("readonly", false);
    $('.kualifikasi_izin_siup').attr("disabled", false);
    $('.file_dokumen_siup').attr("readonly", false);
    $('.kbli_siup').attr("readonly", false);
    $('.btn_siup').attr("disabled", false);
    $('.file_dokumen_siup').attr("disabled", false);
    $('#on_save_siup').attr("disabled", false);
    $('#button_save_kbli_siup').removeClass("disabled");
    $('#button_edit_kbli_siup').removeClass("disabled");
}

function input_siup_edit() {
    $('#apply_edit_siup').modal('hide')
    $('#modal-xl-kbli-siup').modal('show')
    $('.nomor_surat_siup').attr("readonly", false);
    $('.sts_seumur_hidup_siup').attr("disabled", false);
    $('.tgl_berlaku_siup').attr("readonly", false);
    $('.kualifikasi_izin_siup').attr("disabled", false);
    $('.file_dokumen_siup').attr("readonly", false);
    $('.kbli_siup').attr("readonly", false);
    $('.file_dokumen_siup').attr("disabled", false);
    // $('#on_save_siup').attr("disabled", true);
    $('#button_save_kbli_siup').removeClass("disabled");
    $('#button_edit_kbli_siup').removeClass("disabled");
}


function BatalChangeGlobal_siup() {
    $('#apply_edit_siup').modal('hide')
    $('.nomor_surat_siup').attr("readonly", true);
    $('.sts_seumur_hidup_siup').attr("disabled", true);
    $('.tgl_berlaku_siup').attr("readonly", true);
    $('.kualifikasi_izin_siup').attr("disabled", true);
    $('.file_dokumen_siup').attr("readonly", true);
    $('.kbli_siup').attr("readonly", true);
    $('.btn_siup').attr("disabled", true);
    $('.file_dokumen_siup').attr("disabled", true);
    $('#on_save_siup').attr("disabled", true);
    $('#button_save_kbli_siup').addClass("disabled");
    $('#button_edit_kbli_siup').addClass("disabled");
}

$('#modal_dekrip_siup').on('hidden.bs.modal', function() {
    get_row_vendor();
})


// GET TABLE KBLI siup
var table_kbli_siup = $('#table_kbli_siup')
$(document).ready(function() {
    var url_table_kbli_siup = $('[name="url_table_kbli_siup"]').val();
    table_kbli_siup.DataTable({
        "responsive": false,
        "ordering": true,
        "processing": true,
        "serverSide": true,
        "dom": 'Bfrtip',
        "buttons": ["excel", "pdf", "print", "colvis"],
        "order": [],
        "ajax": {
            "url": url_table_kbli_siup,
            "type": "POST",
        },
        "columnDefs": [{
            "target": [-1],
            "orderable": false
        }],
        "oLanguage": {
            "sSearch": "Pencarian : ",
            "sEmptyTable": "Data Tidak Tersedia",
            "sLoadingRecords": "Silahkan Tunggu - loading...",
            "sLengthMenu": "Menampilkan &nbsp;  _MENU_  &nbsp;   Data",
            "sZeroRecords": "Tidak Ada Data Yang Di Cari",
            "sProcessing": "Memuat Data...."
        }
    }).buttons().container().appendTo('#table_kbli_siup .col-md-6:eq(0)');
});

var table_kbli_siup_bawah = $('#table_kbli_siup_bawah')
$(document).ready(function() {
    var url_table_kbli_siup = $('[name="url_table_kbli_siup"]').val();
    table_kbli_siup_bawah.DataTable({
        "responsive": false,
        "ordering": true,
        "processing": true,
        "serverSide": true,
        "dom": 'Bfrtip',
        "buttons": ["excel", "pdf", "print", "colvis"],
        "order": [],
        "ajax": {
            "url": url_table_kbli_siup,
            "type": "POST",
        },
        "columnDefs": [{
            "target": [-1],
            "orderable": false
        }],
        "oLanguage": {
            "sSearch": "Pencarian : ",
            "sEmptyTable": "Data Tidak Tersedia",
            "sLoadingRecords": "Silahkan Tunggu - loading...",
            "sLengthMenu": "Menampilkan &nbsp;  _MENU_  &nbsp;   Data",
            "sZeroRecords": "Tidak Ada Data Yang Di Cari",
            "sProcessing": "Memuat Data...."
        }
    }).buttons().container().appendTo('#table_kbli_siup .col-md-6:eq(0)');
});

function reloadTable_kbli_siup() {
    table_kbli_siup.DataTable().ajax.reload();
}

// ADD siup
function simpan_kbli_siup() {
    var form_simpan_kbli_siup = $('#form_simpan_kbli_siup');
    var url_tambah_kbli_siup = $('[name="url_tambah_kbli_siup"]').val();
        $.ajax({
            method: "POST",
            url: url_tambah_kbli_siup,
            data: form_simpan_kbli_siup.serialize(),
            dataType: "JSON",
            beforeSend: function() {
                $('#button_save_kbli_siup').attr("disabled", true);
            },
            success: function(response) {
                if (response['message'] == 'success') {
                    reloadTable_kbli_siup()
                    Swal.fire('Good job!', 'Data Berhasil Ditambah!', 'success');
                    form_simpan_kbli_siup[0].reset();
                    $(".id_kbli_siup_error").css('display','none');
                    $(".id_kualifikasi_izin_kbli_siup_error").css('display','none');
                    $(".ket_kbli_siup_error").css('display','none');
                    $('#button_save_kbli_siup').attr("disabled", false);
                }else{
                    if (response['error']['id_kbli_siup'] == '<p>Kode Kbli Sudah Ada Di Table Anda</p>') {
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: 'KODE KBLI SUDAH ADA',
                          })
                        $(".id_kualifikasi_izin_kbli_siup_error").css('display','block');
                        $(".ket_kbli_siup_error").css('display','block');
                        $(".id_kualifikasi_izin_kbli_siup_error").html(response['error']['id_kualifikasi_izin_kbli_siup']);
                        $(".ket_kbli_siup_error").html(response['error']['ket_kbli_siup']);
                        $('#button_save_kbli_siup').attr("disabled", false);
                    } else {
                        $(".id_kbli_siup_error").css('display','block');
                        $(".id_kualifikasi_izin_kbli_siup_error").css('display','block');
                        $(".ket_kbli_siup_error_error").css('display','block');
                        $(".id_kbli_siup_error").html(response['error']['id_kbli_siup']);
                        $(".id_kualifikasi_izin_kbli_siup_error").html(response['error']['id_kualifikasi_izin_kbli_siup']);
                        $(".ket_kbli_siup_error").html(response['error']['ket_kbli_siup']);
                        $('#button_save_kbli_siup').attr("disabled", false);
                    }
                }
            }
        })
}


function byid_kbli_siup(id_url_kbli_siup, type) {
    var modal_edit_kbli_siup = $('#modal_edit_kbli_siup');
    var url_byid_kbli_siup = $('[name="url_byid_kbli_siup"]').val();
    if (type == 'edit') {
        saveData = 'edit';
    }

    if (type == 'hapus') {
        saveData = 'hapus';
    }

    $.ajax({
        type: "GET",
        url: url_byid_kbli_siup + id_url_kbli_siup,
        dataType: "JSON",
        success: function(response) {
            if (type == 'edit') {
                modal_edit_kbli_siup.modal('show');
                $('[name="id_url_kbli_siup"]').val(response['row_kbli_siup'].id_url_kbli_siup);
                $('[name="token_kbli_siup"]').val(response['row_kbli_siup'].token_kbli_siup);
                $('[name="id_kbli_siup"]').val(response['row_kbli_siup'].id_kbli);
                $('[name="id_kualifikasi_izin_kbli_siup"]').val(response['row_kbli_siup'].id_kualifikasi_izin);
                $('[name="ket_kbli_siup"]').val(response['row_kbli_siup'].ket_kbli_siup);
                $('#pilihan_kbli_siup').html(response['row_kbli_siup'].kode_kbli + ' || ' + response['row_kbli_siup'].nama_kbli);
                $('#pilihan_kualifikasi_kbli_siup').html(response['row_kbli_siup'].nama_kualifikasi);
            } else {
                Question_kbli_siup(id_url_kbli_siup, response['row_kbli_siup'].token_kbli_siup);
            }
        }
    })
}

function Question_kbli_siup(id_url_kbli_siup, token_kbli_siup) {
    var form_simpan_kbli_siup = $('#form_simpan_kbli_siup');
    var url_hapus_kbli_siup = $('[name="url_hapus_kbli_siup"]').val();
    Swal.fire({
        title: "Data Di Hapus",
        text: 'Kbli Ini Mau Di hapus?',
        icon: "warning",
        buttons: true,
        dangerMode: true,
    }).then((willDelete) => {
        if (willDelete) {
            $.ajax({
                type: "POST",
                url: url_hapus_kbli_siup,
                data: {
                    id_url_kbli_siup: id_url_kbli_siup,
                    token_kbli_siup: token_kbli_siup
                },
                dataType: "JSON",
                success: function(response) {
                    if (response['message'] == 'success') {
                        Swal.fire('Good job!', 'Data Berhasil Dihapus!', 'success');
                        form_simpan_kbli_siup[0].reset();
                        reloadTable_kbli_siup()
                    } else {
                        Swal.fire('Maaf', response['maaf'], 'warning');
                    }
                }
            })
        }
    });
}

function edit_kbli_siup() {
    var form_simpan_kbli_siup = $('#form_simpan_kbli_siup');
    var form_edit_kbli_siup = $('#form_edit_kbli_siup');
    var modal_edit_kbli_siup = $('#modal_edit_kbli_siup');
    var url_edit_kbli_siup = $('[name="url_edit_kbli_siup"]').val();
    $.ajax({
        method: "POST",
        url: url_edit_kbli_siup,
        data: form_edit_kbli_siup.serialize(),
        dataType: "JSON",
        beforeSend: function() {
            $('#button_edit_kbli_siup').attr("disabled", true);
        },
        success: function(response) {
            if (response['message'] == 'success') {
                reloadTable_kbli_siup()
                Swal.fire('Good job!', 'Data Berhasil Ditambah!', 'success');
                form_edit_kbli_siup[0].reset();
                form_simpan_kbli_siup[0].reset();
                $(".id_kbli_siup_error").css('display','none');
                $(".id_kualifikasi_izin_kbli_siup_error").css('display','none');
                $(".ket_kbli_siup_error").css('display','none');
                $('#button_edit_kbli_siup').attr("disabled", false);
            }else{
                if (response['error']['id_kbli_siup'] == '<p>Kode Kbli Sudah Ada Di Table Anda</p>') {
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'KODE KBLI SUDAH ADA',
                      })
                    $(".id_kualifikasi_izin_kbli_siup_error").css('display','block');
                    $(".ket_kbli_siup_error").css('display','block');
                    $(".id_kualifikasi_izin_kbli_siup_error").html(response['error']['id_kualifikasi_izin_kbli_siup']);
                    $(".ket_kbli_siup_error").html(response['error']['ket_kbli_siup']);
                    $('#button_edit_kbli_siup').attr("disabled", false);
                } else {
                    $(".id_kbli_siup_error").css('display','block');
                    $(".id_kualifikasi_izin_kbli_siup_error").css('display','block');
                    $(".ket_kbli_siup_error_error").css('display','block');
                    $(".id_kbli_siup_error").html(response['error']['id_kbli_siup']);
                    $(".id_kualifikasi_izin_kbli_siup_error").html(response['error']['id_kualifikasi_izin_kbli_siup']);
                    $(".ket_kbli_siup_error").html(response['error']['ket_kbli_siup']);
                    $('#button_edit_kbli_siup').attr("disabled", false);
                }
            }
        }
    })
}


//  BATAS sbu
function DownloadFile_sbu(id_url_sbu) {
  var url_download_sbu = $('[name="url_download_sbu"]').val()
  location.href = url_download_sbu + id_url_sbu;
}

function DekripEnkrip_sbu(id_url_sbu, type) {
  var secret_token = $('[name="secret_token"]').val()
  var url_encryption_sbu = $('[name="url_encryption_sbu"]').val();
  var modal_dekrip_sbu = $('#modal_dekrip_sbu');
  if (type == 'dekrip') {
      modal_dekrip_sbu.modal('show');
      $('input').attr("readonly", false);
      $('[name="id_url_sbu"]').val(id_url_sbu);
  } else {
      $.ajax({
          method: "POST",
          url: url_encryption_sbu + id_url_sbu,
          dataType: "JSON",
          data: {
              secret_token: secret_token,
              type: type
          },
          success: function(response) {
              let timerInterval
              Swal.fire({
                  title: 'Sedang Proses Enkripsi!',
                  html: 'Proses Enkripsi <b></b>',
                  timer: 2000,
                  timerProgressBar: true,
                  didOpen: () => {
                      Swal.showLoading()
                      const b = Swal.getHtmlContainer().querySelector('b')
                      timerInterval = setInterval(() => {
                          // b.textContent = Swal.getTimerRight()
                      }, 100)
                  },
                  willClose: () => {
                      clearInterval(timerInterval)
                      Swal.fire('Dokumen Berhasil Di Enkripsi', '', 'success')
                      get_row_vendor();
                  }
              }).then((result) => {
                  /* Read more about handling dismissals below */
                  if (result.dismiss === Swal.DismissReason.timer) {

                  }
              })
          }
      })
  }

}

function GenerateDekrip_sbu() {
  var url_dekrip_sbu = $('[name="url_dekrip_sbu"]').val();
  var modal_dekrip_sbu = $('#modal_dekrip_sbu');
  $.ajax({
      method: "POST",
      url: url_dekrip_sbu,
      dataType: "JSON",
      data: $('#form_dekrip_sbu').serialize(),
      beforeSend: function() {
          $('#button_dekrip_generate_sbu').css('display', 'none');
          $('#button_dekrip_generate_manipulasi_sbu').css('display', 'block');
      },
      success: function(response) {
          if (response['maaf']) {
              $('#button_dekrip_generate_sbu').css('display', 'block');
              $('#button_dekrip_generate_manipulasi_sbu').css('display', 'none');
              Swal.fire(response['maaf'], '', 'warning')
          } else {
              let timerInterval
              Swal.fire({
                  title: 'Sedang Proses Deskripsi!',
                  html: 'Proses Deksripsi <b></b>',
                  timer: 2000,
                  timerProgressBar: true,
                  didOpen: () => {
                      Swal.showLoading()
                      const b = Swal.getHtmlContainer().querySelector('b')
                      timerInterval = setInterval(() => {
                          // b.textContent = Swal.getTimerRight()
                      }, 100)
                  },
                  willClose: () => {
                      clearInterval(timerInterval)
                      Swal.fire('Dokumen Berhasil Di Deskripsi!', '', 'success')
                      get_row_vendor();
                      $('#button_dekrip_generate_sbu').css('display', 'block');
                      $('#button_dekrip_generate_manipulasi_sbu').css('display', 'none');
                      modal_dekrip_sbu.modal('hide');
                  }
              }).then((result) => {
                  /* Read more about handling dismissals below */
                  if (result.dismiss === Swal.DismissReason.timer) {

                  }
              })
          }
      }
  })
}

var form_sbu = $('#form_sbu')
form_sbu.on('submit', function(e) {
    var url_post_sbu = $('[name="url_post_sbu"]').val();
    var file_dokumen_sbu_manipulasi = $('[name="file_dokumen_sbu_manipulasi"]').val();
    if (file_dokumen_sbu_manipulasi == '') {
        e.preventDefault();
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Dokumen Wajib Di Isi!',
          })
    } else {
        e.preventDefault();
        $.ajax({
            url: url_post_sbu,
            method: "POST",
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData: false,
            beforeSend: function() {
                $('#on_save_sbu').attr("disabled", true);
            },
            success: function(response) {
                if (response['error']) {
                    $(".nomor_surat_sbu_error").css('display', 'block');
                    $(".sts_seumur_hidup_sbu_error").css('display', 'block');
                    $(".file_dokumen_sbu_error").css('display', 'block');
                    $(".file_dokumen_sbu_error").html(response['error']['file_dokumen_sbu']);
                    $(".nomor_surat_sbu_error").html(response['error']['nomor_surat_sbu']);
                    $(".sts_seumur_hidup_sbu_error").html(response['error']['sts_seumur_hidup_sbu']);
                    $('#on_save_sbu').attr("disabled", false);
                } else {
                let timerInterval
                Swal.fire({
                    title: 'Sedang Proses Menyimpan Data!',
                    html: 'Membuat Data <b></b>',
                    timer: 3000,
                    timerProgressBar: true,
                    didOpen: () => {
                        Swal.showLoading()
                        const b = Swal.getHtmlContainer().querySelector('b')
                        timerInterval = setInterval(() => {
                            // b.textContent = Swal.getTimerRight()
                        }, 100)
                    },
                    willClose: () => {
                        clearInterval(timerInterval)
                        Swal.fire('Data Berhasil Di Simpan!', '', 'success')
                        get_row_vendor();
                        $('#on_save_sbu').attr("disabled", false);
                        $(".nomor_surat_sbu_error").css('display', 'none');
                        $(".sts_seumur_hidup_sbu_error").css('display', 'none');
                        $(".file_dokumen_sbu_error").css('display', 'none');
                    }
                }).then((result) => {
                    /* Read more about handling dismissals below */
                    if (result.dismiss === Swal.DismissReason.timer) {

                    }
                })
                 }
            }
        })
            }
})

function sts_berlaku_sbu() {
  var sts_seumur_hidup_sbu = $('[name="sts_seumur_hidup_sbu"]').val()
  if (sts_seumur_hidup_sbu == 1) {
      $('.tgl_berlaku_sbu').attr("readonly", false);
  } else {
      $('.tgl_berlaku_sbu').attr("readonly", true);
  }
}

function EditChangeGlobal_sbu() {
  $('#apply_edit_sbu').modal('hide')
  $('.nomor_surat_sbu').attr("readonly", false);
  $('.sts_seumur_hidup_sbu').attr("disabled", false);
  $('.tgl_berlaku_sbu').attr("readonly", false);
  $('.kualifikasi_izin_sbu').attr("disabled", false);
  $('.file_dokumen_sbu').attr("readonly", false);
  $('.kbli_sbu').attr("readonly", false);
  $('.btn_sbu').attr("disabled", false);
  $('.file_dokumen_sbu').attr("disabled", false);
  $('#on_save_sbu').attr("disabled", false);
  $('#button_save_kbli_sbu').removeClass("disabled");
  $('#button_edit_kbli_sbu').removeClass("disabled");
}

function input_sbu_edit() {
    $('#apply_edit_sbu').modal('hide')
    $('#modal-xl-kbli-sbu').modal('show')
    $('.nomor_surat_sbu').attr("readonly", false);
    $('.sts_seumur_hidup_sbu').attr("disabled", false);
    $('.tgl_berlaku_sbu').attr("readonly", false);
    $('.kualifikasi_izin_sbu').attr("disabled", false);
    $('.file_dokumen_sbu').attr("readonly", false);
    $('.kbli_sbu').attr("readonly", false);
    $('.file_dokumen_sbu').attr("disabled", false);
    // $('#on_save_sbu').attr("disabled", true);
    $('#button_save_kbli_sbu').removeClass("disabled");
    $('#button_edit_kbli_sbu').removeClass("disabled");
}


function BatalChangeGlobal_sbu() {
  $('#apply_edit_sbu').modal('hide')
  $('.nomor_surat_sbu').attr("readonly", true);
  $('.sts_seumur_hidup_sbu').attr("disabled", true);
  $('.tgl_berlaku_sbu').attr("readonly", true);
  $('.kualifikasi_izin_sbu').attr("disabled", true);
  $('.file_dokumen_sbu').attr("readonly", true);
  $('.kbli_sbu').attr("readonly", true);
  $('.btn_sbu').attr("disabled", true);
  $('.file_dokumen_sbu').attr("disabled", true);
  $('#on_save_sbu').attr("disabled", true);
  $('#button_save_kbli_sbu').addClass("disabled");
  $('#button_edit_kbli_sbu').addClass("disabled");
}

$('#modal_dekrip_sbu').on('hidden.bs.modal', function() {
  get_row_vendor();
})


// GET TABLE KBLI sbu
var table_kbli_sbu = $('#table_kbli_sbu')
$(document).ready(function() {
  var url_table_kbli_sbu = $('[name="url_table_kbli_sbu"]').val();
  table_kbli_sbu.DataTable({
      "responsive": false,
      "ordering": true,
      "processing": true,
      "serverSide": true,
      "dom": 'Bfrtip',
      "buttons": ["excel", "pdf", "print", "colvis"],
      "order": [],
      "ajax": {
          "url": url_table_kbli_sbu,
          "type": "POST",
      },
      "columnDefs": [{
          "target": [-1],
          "orderable": false
      }],
      "oLanguage": {
          "sSearch": "Pencarian : ",
          "sEmptyTable": "Data Tidak Tersedia",
          "sLoadingRecords": "Silahkan Tunggu - loading...",
          "sLengthMenu": "Menampilkan &nbsp;  _MENU_  &nbsp;   Data",
          "sZeroRecords": "Tidak Ada Data Yang Di Cari",
          "sProcessing": "Memuat Data...."
      }
  }).buttons().container().appendTo('#table_kbli_sbu .col-md-6:eq(0)');
});

var table_kbli_sbu_bawah = $('#table_kbli_sbu_bawah')
$(document).ready(function() {
  var url_table_kbli_sbu = $('[name="url_table_kbli_sbu"]').val();
  table_kbli_sbu_bawah.DataTable({
      "responsive": false,
      "ordering": true,
      "processing": true,
      "serverSide": true,
      "dom": 'Bfrtip',
      "buttons": ["excel", "pdf", "print", "colvis"],
      "order": [],
      "ajax": {
          "url": url_table_kbli_sbu,
          "type": "POST",
      },
      "columnDefs": [{
          "target": [-1],
          "orderable": false
      }],
      "oLanguage": {
          "sSearch": "Pencarian : ",
          "sEmptyTable": "Data Tidak Tersedia",
          "sLoadingRecords": "Silahkan Tunggu - loading...",
          "sLengthMenu": "Menampilkan &nbsp;  _MENU_  &nbsp;   Data",
          "sZeroRecords": "Tidak Ada Data Yang Di Cari",
          "sProcessing": "Memuat Data...."
      }
  }).buttons().container().appendTo('#table_kbli_sbu .col-md-6:eq(0)');
});

function reloadTable_kbli_sbu() {
  table_kbli_sbu.DataTable().ajax.reload();
}

// ADD sbu
function simpan_kbli_sbu() {
    var form_simpan_kbli_sbu = $('#form_simpan_kbli_sbu');
    var url_tambah_kbli_sbu = $('[name="url_tambah_kbli_sbu"]').val();
        $.ajax({
            method: "POST",
            url: url_tambah_kbli_sbu,
            data: form_simpan_kbli_sbu.serialize(),
            dataType: "JSON",
            beforeSend: function() {
                $('#button_save_kbli_sbu').attr("disabled", true);
            },
            success: function(response) {
                if (response['message'] == 'success') {
                    reloadTable_kbli_sbu()
                    Swal.fire('Good job!', 'Data Berhasil Ditambah!', 'success');
                    form_simpan_kbli_sbu[0].reset();
                    $(".id_kbli_sbu_error").css('display','none');
                    $(".id_kualifikasi_izin_kbli_sbu_error").css('display','none');
                    $(".ket_kbli_sbu_error").css('display','none');
                    $('#button_save_kbli_sbu').attr("disabled", false);
                }else{
                    if (response['error']['id_kbli_sbu'] == '<p>Kode Kbli Sudah Ada Di Table Anda</p>') {
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: 'KODE SBU SUDAH ADA',
                          })
                        $(".id_kualifikasi_izin_kbli_sbu_error").css('display','block');
                        $(".ket_kbli_sbu_error").css('display','block');
                        $(".id_kualifikasi_izin_kbli_sbu_error").html(response['error']['id_kualifikasi_izin_kbli_sbu']);
                        $(".ket_kbli_sbu_error").html(response['error']['ket_kbli_sbu']);
                        $('#button_save_kbli_sbu').attr("disabled", false);
                    } else {
                        $(".id_kbli_sbu_error").css('display','block');
                        $(".id_kualifikasi_izin_kbli_sbu_error").css('display','block');
                        $(".ket_kbli_sbu_error_error").css('display','block');
                        $(".id_kbli_sbu_error").html(response['error']['id_kbli_sbu']);
                        $(".id_kualifikasi_izin_kbli_sbu_error").html(response['error']['id_kualifikasi_izin_kbli_sbu']);
                        $(".ket_kbli_sbu_error").html(response['error']['ket_kbli_sbu']);
                        $('#button_save_kbli_sbu').attr("disabled", false);
                    }
                }
            }
        })
}

function byid_kbli_sbu(id_url_kbli_sbu, type) {
  var modal_edit_kbli_sbu = $('#modal_edit_kbli_sbu');
  var url_byid_kbli_sbu = $('[name="url_byid_kbli_sbu"]').val();
  if (type == 'edit') {
      saveData = 'edit';
  }

  if (type == 'hapus') {
      saveData = 'hapus';
  }

  $.ajax({
      type: "GET",
      url: url_byid_kbli_sbu + id_url_kbli_sbu,
      dataType: "JSON",
      success: function(response) {
          if (type == 'edit') {
              modal_edit_kbli_sbu.modal('show');
              $('[name="id_url_kbli_sbu"]').val(response['row_kbli_sbu'].id_url_kbli_sbu);
              $('[name="token_kbli_sbu"]').val(response['row_kbli_sbu'].token_kbli_sbu);
              $('[name="id_kbli_sbu"]').val(response['row_kbli_sbu'].id_kbli);
              $('[name="id_kualifikasi_izin_kbli_sbu"]').val(response['row_kbli_sbu'].id_kualifikasi_izin);
              $('[name="ket_kbli_sbu"]').val(response['row_kbli_sbu'].ket_kbli_sbu);
              $('#pilihan_kbli_sbu').html(response['row_kbli_sbu'].kode_sbu + ' || ' + response['row_kbli_sbu'].nama_sbu);
              $('#pilihan_kualifikasi_kbli_sbu').html(response['row_kbli_sbu'].nama_kualifikasi);
          } else {
              Question_kbli_sbu(id_url_kbli_sbu, response['row_kbli_sbu'].token_kbli_sbu);
          }
      }
  })
}

function Question_kbli_sbu(id_url_kbli_sbu, token_kbli_sbu) {
  var form_simpan_kbli_sbu = $('#form_simpan_kbli_sbu');
  var url_hapus_kbli_sbu = $('[name="url_hapus_kbli_sbu"]').val();
  Swal.fire({
      title: "Data Di Hapus",
      text: 'SBU Ini Mau Di hapus?',
      icon: "warning",
      buttons: true,
      dangerMode: true,
  }).then((willDelete) => {
      if (willDelete) {
          $.ajax({
              type: "POST",
              url: url_hapus_kbli_sbu,
              data: {
                  id_url_kbli_sbu: id_url_kbli_sbu,
                  token_kbli_sbu: token_kbli_sbu
              },
              dataType: "JSON",
              success: function(response) {
                  if (response['message'] == 'success') {
                      Swal.fire('Good job!', 'Data Berhasil Dihapus!', 'success');
                      form_simpan_kbli_sbu[0].reset();
                      reloadTable_kbli_sbu()
                  } else {
                      Swal.fire('Maaf', response['maaf'], 'warning');
                  }
              }
          })
      }
  });
}

function edit_kbli_sbu() {
    var form_simpan_kbli_sbu = $('#form_simpan_kbli_sbu');
    var form_edit_kbli_sbu = $('#form_edit_kbli_sbu');
    var modal_edit_kbli_sbu = $('#modal_edit_kbli_sbu');
    var url_edit_kbli_sbu = $('[name="url_edit_kbli_sbu"]').val();
    $.ajax({
        method: "POST",
        url: url_edit_kbli_sbu,
        data: form_edit_kbli_sbu.serialize(),
        dataType: "JSON",
        beforeSend: function() {
            $('#button_edit_kbli_sbu').attr("disabled", true);
        },
        success: function(response) {
            if (response['message'] == 'success') {
                reloadTable_kbli_sbu()
                Swal.fire('Good job!', 'Data Berhasil Ditambah!', 'success');
                form_edit_kbli_sbu[0].reset();
                form_simpan_kbli_sbu[0].reset();
                $(".id_kbli_sbu_error").css('display','none');
                $(".id_kualifikasi_izin_kbli_sbu_error").css('display','none');
                $(".ket_kbli_sbu_error").css('display','none');
                $('#button_edit_kbli_sbu').attr("disabled", false);
            }else{
                if (response['error']['id_kbli_sbu'] == '<p>Kode Kbli Sudah Ada Di Table Anda</p>') {
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'KODE SBU SUDAH ADA',
                      })
                    $(".id_kualifikasi_izin_kbli_sbu_error").css('display','block');
                    $(".ket_kbli_sbu_error").css('display','block');
                    $(".id_kualifikasi_izin_kbli_sbu_error").html(response['error']['id_kualifikasi_izin_kbli_sbu']);
                    $(".ket_kbli_sbu_error").html(response['error']['ket_kbli_sbu']);
                    $('#button_edit_kbli_sbu').attr("disabled", false);
                } else {
                    $(".id_kbli_sbu_error").css('display','block');
                    $(".id_kualifikasi_izin_kbli_sbu_error").css('display','block');
                    $(".ket_kbli_sbu_error_error").css('display','block');
                    $(".id_kbli_sbu_error").html(response['error']['id_kbli_sbu']);
                    $(".id_kualifikasi_izin_kbli_sbu_error").html(response['error']['id_kualifikasi_izin_kbli_sbu']);
                    $(".ket_kbli_sbu_error").html(response['error']['ket_kbli_sbu']);
                    $('#button_edit_kbli_sbu').attr("disabled", false);
                }
            }
        }
    })
}

//  BATAS siujk
function DownloadFile_siujk(id_url_siujk) {
    var url_download_siujk = $('[name="url_download_siujk"]').val()
    location.href = url_download_siujk + id_url_siujk;
}

function DekripEnkrip_siujk(id_url_siujk, type) {
    var secret_token = $('[name="secret_token"]').val()
    var url_encryption_siujk = $('[name="url_encryption_siujk"]').val();
    var modal_dekrip_siujk = $('#modal_dekrip_siujk');
    if (type == 'dekrip') {
        modal_dekrip_siujk.modal('show');
        $('input').attr("readonly", false);
        $('[name="id_url_siujk"]').val(id_url_siujk);
    } else {
        $.ajax({
            method: "POST",
            url: url_encryption_siujk + id_url_siujk,
            dataType: "JSON",
            data: {
                secret_token: secret_token,
                type: type
            },
            success: function(response) {
                let timerInterval
                Swal.fire({
                    title: 'Sedang Proses Enkripsi!',
                    html: 'Proses Enkripsi <b></b>',
                    timer: 2000,
                    timerProgressBar: true,
                    didOpen: () => {
                        Swal.showLoading()
                        const b = Swal.getHtmlContainer().querySelector('b')
                        timerInterval = setInterval(() => {
                            // b.textContent = Swal.getTimerRight()
                        }, 100)
                    },
                    willClose: () => {
                        clearInterval(timerInterval)
                        Swal.fire('Dokumen Berhasil Di Enkripsi', '', 'success')
                        get_row_vendor();
                    }
                }).then((result) => {
                    /* Read more about handling dismissals below */
                    if (result.dismiss === Swal.DismissReason.timer) {

                    }
                })
            }
        })
    }

}

function GenerateDekrip_siujk() {
    var url_dekrip_siujk = $('[name="url_dekrip_siujk"]').val();
    var modal_dekrip_siujk = $('#modal_dekrip_siujk');
    $.ajax({
        method: "POST",
        url: url_dekrip_siujk,
        dataType: "JSON",
        data: $('#form_dekrip_siujk').serialize(),
        beforeSend: function() {
            $('#button_dekrip_generate_siujk').css('display', 'none');
            $('#button_dekrip_generate_manipulasi_siujk').css('display', 'block');
        },
        success: function(response) {
            if (response['maaf']) {
                $('#button_dekrip_generate_siujk').css('display', 'block');
                $('#button_dekrip_generate_manipulasi_siujk').css('display', 'none');
                Swal.fire(response['maaf'], '', 'warning')
            } else {
                let timerInterval
                Swal.fire({
                    title: 'Sedang Proses Deskripsi!',
                    html: 'Proses Deksripsi <b></b>',
                    timer: 2000,
                    timerProgressBar: true,
                    didOpen: () => {
                        Swal.showLoading()
                        const b = Swal.getHtmlContainer().querySelector('b')
                        timerInterval = setInterval(() => {
                            // b.textContent = Swal.getTimerRight()
                        }, 100)
                    },
                    willClose: () => {
                        clearInterval(timerInterval)
                        Swal.fire('Dokumen Berhasil Di Deskripsi!', '', 'success')
                        get_row_vendor();
                        $('#button_dekrip_generate_siujk').css('display', 'block');
                        $('#button_dekrip_generate_manipulasi_siujk').css('display', 'none');
                        modal_dekrip_siujk.modal('hide');
                    }
                }).then((result) => {
                    /* Read more about handling dismissals below */
                    if (result.dismiss === Swal.DismissReason.timer) {

                    }
                })
            }
        }
    })
}

var form_siujk = $('#form_siujk')
form_siujk.on('submit', function(e) {
    var url_post_siujk = $('[name="url_post_siujk"]').val();
    var file_dokumen_siujk_manipulasi = $('[name="file_dokumen_siujk_manipulasi"]').val();
    if (file_dokumen_siujk_manipulasi == '') {
        e.preventDefault();
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Dokumen Wajib Di Isi!',
        })
    } else {
        e.preventDefault();
        $.ajax({
            url: url_post_siujk,
            method: "POST",
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData: false,
            beforeSend: function() {
                $('#on_save_siujk').attr("disabled", true);
            },
            success: function(response) {
                if (response['error']) {
                    $(".nomor_surat_siujk_error").css('display', 'block');
                    $(".sts_seumur_hidup_siujk_error").css('display', 'block');
                    $(".file_dokumen_siujk_error").css('display', 'block');
                    $(".file_dokumen_siujk_error").html(response['error']['file_dokumen_siujk']);
                    $(".nomor_surat_siujk_error").html(response['error']['nomor_surat_siujk']);
                    $(".sts_seumur_hidup_siujk_error").html(response['error']['sts_seumur_hidup_siujk']);
                    $('#on_save_siujk').attr("disabled", false);
                } else {
                    let timerInterval
                    Swal.fire({
                        title: 'Sedang Proses Menyimpan Data!',
                        html: 'Membuat Data <b></b>',
                        timer: 3000,
                        timerProgressBar: true,
                        didOpen: () => {
                            Swal.showLoading()
                            const b = Swal.getHtmlContainer().querySelector('b')
                            timerInterval = setInterval(() => {
                                // b.textContent = Swal.getTimerRight()
                            }, 100)
                        },
                        willClose: () => {
                            clearInterval(timerInterval)
                            Swal.fire('Data Berhasil Di Simpan!', '', 'success')
                            get_row_vendor();
                            $('#on_save_siujk').attr("disabled", false);
                            $(".nomor_surat_siujk_error").css('display', 'none');
                            $(".sts_seumur_hidup_siujk_error").css('display', 'none');
                            $(".file_dokumen_siujk_error").css('display', 'none');
                        }
                    }).then((result) => {
                        /* Read more about handling dismissals below */
                        if (result.dismiss === Swal.DismissReason.timer) {

                        }
                    })
                }
            }
        })
    }
})

function sts_berlaku_siujk() {
    var sts_seumur_hidup_siujk = $('[name="sts_seumur_hidup_siujk"]').val()
    if (sts_seumur_hidup_siujk == 1) {
        $('.tgl_berlaku_siujk').attr("readonly", false);
    } else {
        $('.tgl_berlaku_siujk').attr("readonly", true);
    }
}

function EditChangeGlobal_siujk() {
    $('#apply_edit_siujk').modal('hide')
    $('.nomor_surat_siujk').attr("readonly", false);
    $('.sts_seumur_hidup_siujk').attr("disabled", false);
    $('.tgl_berlaku_siujk').attr("readonly", false);
    $('.kualifikasi_izin_siujk').attr("disabled", false);
    $('.file_dokumen_siujk').attr("readonly", false);
    $('.kbli_siujk').attr("readonly", false);
    $('.file_dokumen_siujk').attr("disabled", false);
    $('.btn_siujk').attr("disabled", false);
    $('#on_save_siujk').attr("disabled", false);
    $('#button_save_kbli_siujk').removeClass("disabled");
    $('#button_edit_kbli_siujk').removeClass("disabled");
}

function input_siujk_edit() {
    $('#apply_edit_siujk').modal('hide')
    $('#modal-xl-kbli-siujk').modal('show')
    $('.nomor_surat_siujk').attr("readonly", false);
    $('.sts_seumur_hidup_siujk').attr("disabled", false);
    $('.tgl_berlaku_siujk').attr("readonly", false);
    $('.kualifikasi_izin_siujk').attr("disabled", false);
    $('.file_dokumen_siujk').attr("readonly", false);
    $('.kbli_siujk').attr("readonly", false);
    $('.file_dokumen_siujk').attr("disabled", false);
    // $('#on_save_siujk').attr("disabled", true);
    $('#button_save_kbli_siujk').removeClass("disabled");
    $('#button_edit_kbli_siujk').removeClass("disabled");
}

function BatalChangeGlobal_siujk() {
    $('#apply_edit_siujk').modal('hide')
    $('.nomor_surat_siujk').attr("readonly", true);
    $('.sts_seumur_hidup_siujk').attr("disabled", true);
    $('.tgl_berlaku_siujk').attr("readonly", true);
    $('.kualifikasi_izin_siujk').attr("disabled", true);
    $('.file_dokumen_siujk').attr("readonly", true);
    $('.kbli_siujk').attr("readonly", true);
    $('.btn_siujk').attr("disabled", true);
    $('.file_dokumen_siujk').attr("disabled", true);
    $('#on_save_siujk').attr("disabled", true);
    $('#button_save_kbli_siujk').addClass("disabled");
    $('#button_edit_kbli_siujk').addClass("disabled");
}

$('#modal_dekrip_siujk').on('hidden.bs.modal', function() {
    get_row_vendor();
})


// GET TABLE KBLI siujk
var table_kbli_siujk = $('#table_kbli_siujk')
$(document).ready(function() {
    var url_table_kbli_siujk = $('[name="url_table_kbli_siujk"]').val();
    table_kbli_siujk.DataTable({
        "responsive": false,
        "ordering": true,
        "processing": true,
        "serverSide": true,
        "dom": 'Bfrtip',
        "buttons": ["excel", "pdf", "print", "colvis"],
        "order": [],
        "ajax": {
            "url": url_table_kbli_siujk,
            "type": "POST",
        },
        "columnDefs": [{
            "target": [-1],
            "orderable": false
        }],
        "oLanguage": {
            "sSearch": "Pencarian : ",
            "sEmptyTable": "Data Tidak Tersedia",
            "sLoadingRecords": "Silahkan Tunggu - loading...",
            "sLengthMenu": "Menampilkan &nbsp;  _MENU_  &nbsp;   Data",
            "sZeroRecords": "Tidak Ada Data Yang Di Cari",
            "sProcessing": "Memuat Data...."
        }
    }).buttons().container().appendTo('#table_kbli_siujk .col-md-6:eq(0)');
});

var table_kbli_siujk_bawah = $('#table_kbli_siujk_bawah')
$(document).ready(function() {
    var url_table_kbli_siujk = $('[name="url_table_kbli_siujk"]').val();
    table_kbli_siujk_bawah.DataTable({
        "responsive": false,
        "ordering": true,
        "processing": true,
        "serverSide": true,
        "dom": 'Bfrtip',
        "buttons": ["excel", "pdf", "print", "colvis"],
        "order": [],
        "ajax": {
            "url": url_table_kbli_siujk,
            "type": "POST",
        },
        "columnDefs": [{
            "target": [-1],
            "orderable": false
        }],
        "oLanguage": {
            "sSearch": "Pencarian : ",
            "sEmptyTable": "Data Tidak Tersedia",
            "sLoadingRecords": "Silahkan Tunggu - loading...",
            "sLengthMenu": "Menampilkan &nbsp;  _MENU_  &nbsp;   Data",
            "sZeroRecords": "Tidak Ada Data Yang Di Cari",
            "sProcessing": "Memuat Data...."
        }
    }).buttons().container().appendTo('#table_kbli_siujk .col-md-6:eq(0)');
});

function reloadTable_kbli_siujk() {
    table_kbli_siujk.DataTable().ajax.reload();
}

function simpan_kbli_siujk() {
    var form_simpan_kbli_siujk = $('#form_simpan_kbli_siujk');
    var url_tambah_kbli_siujk = $('[name="url_tambah_kbli_siujk"]').val();
    $.ajax({
        method: "POST",
        url: url_tambah_kbli_siujk,
        data: form_simpan_kbli_siujk.serialize(),
        dataType: "JSON",
        beforeSend: function() {
            $('#button_save_kbli_siujk').attr("disabled", true);
        },
        success: function(response) {
            if (response['message'] == 'success') {
                reloadTable_kbli_siujk()
                Swal.fire('Good job!', 'Data Berhasil Ditambah!', 'success');
                form_simpan_kbli_siujk[0].reset();
                $(".id_kbli_siujk_error").css('display', 'none');
                $(".id_kualifikasi_izin_kbli_siujk_error").css('display', 'none');
                $(".ket_kbli_siujk_error").css('display', 'none');
                $('#button_save_kbli_siujk').attr("disabled", false);
            } else {
                if (response['error']['id_kbli_siujk'] == '<p>Kode Kbli Sudah Ada Di Table Anda</p>') {
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'KODE KBLI SUDAH ADA',
                    })
                    $(".id_kualifikasi_izin_kbli_siujk_error").css('display', 'block');
                    $(".ket_kbli_siujk_error").css('display', 'block');
                    $(".id_kualifikasi_izin_kbli_siujk_error").html(response['error']['id_kualifikasi_izin_kbli_siujk']);
                    $(".ket_kbli_siujk_error").html(response['error']['ket_kbli_siujk']);
                    $('#button_save_kbli_siujk').attr("disabled", false);
                } else {
                    $(".id_kbli_siujk_error").css('display', 'block');
                    $(".id_kualifikasi_izin_kbli_siujk_error").css('display', 'block');
                    $(".ket_kbli_siujk_error_error").css('display', 'block');
                    $(".id_kbli_siujk_error").html(response['error']['id_kbli_siujk']);
                    $(".id_kualifikasi_izin_kbli_siujk_error").html(response['error']['id_kualifikasi_izin_kbli_siujk']);
                    $(".ket_kbli_siujk_error").html(response['error']['ket_kbli_siujk']);
                    $('#button_save_kbli_siujk').attr("disabled", false);
                }
            }
        }
    })
}


function byid_kbli_siujk(id_url_kbli_siujk, type) {
    var modal_edit_kbli_siujk = $('#modal_edit_kbli_siujk');
    var url_byid_kbli_siujk = $('[name="url_byid_kbli_siujk"]').val();
    if (type == 'edit') {
        saveData = 'edit';
    }

    if (type == 'hapus') {
        saveData = 'hapus';
    }

    $.ajax({
        type: "GET",
        url: url_byid_kbli_siujk + id_url_kbli_siujk,
        dataType: "JSON",
        success: function(response) {
            if (type == 'edit') {
                modal_edit_kbli_siujk.modal('show');
                $('[name="id_url_kbli_siujk"]').val(response['row_kbli_siujk'].id_url_kbli_siujk);
                $('[name="token_kbli_siujk"]').val(response['row_kbli_siujk'].token_kbli_siujk);
                $('[name="id_kbli_siujk"]').val(response['row_kbli_siujk'].id_kbli);
                $('[name="id_kualifikasi_izin_kbli_siujk"]').val(response['row_kbli_siujk'].id_kualifikasi_izin);
                $('[name="ket_kbli_siujk"]').val(response['row_kbli_siujk'].ket_kbli_siujk);
                $('#pilihan_kbli_siujk').html(response['row_kbli_siujk'].kode_kbli + ' || ' + response['row_kbli_siujk'].nama_kbli);
                $('#pilihan_kualifikasi_kbli_siujk').html(response['row_kbli_siujk'].nama_kualifikasi);
            } else {
                Question_kbli_siujk(id_url_kbli_siujk, response['row_kbli_siujk'].token_kbli_siujk);
            }
        }
    })
}

function Question_kbli_siujk(id_url_kbli_siujk, token_kbli_siujk) {
    var form_simpan_kbli_siujk = $('#form_simpan_kbli_siujk');
    var url_hapus_kbli_siujk = $('[name="url_hapus_kbli_siujk"]').val();
    Swal.fire({
        title: "Data Di Hapus",
        text: 'Kbli Ini Mau Di hapus?',
        icon: "warning",
        buttons: true,
        dangerMode: true,
    }).then((willDelete) => {
        if (willDelete) {
            $.ajax({
                type: "POST",
                url: url_hapus_kbli_siujk,
                data: {
                    id_url_kbli_siujk: id_url_kbli_siujk,
                    token_kbli_siujk: token_kbli_siujk
                },
                dataType: "JSON",
                success: function(response) {
                    if (response['message'] == 'success') {
                        Swal.fire('Good job!', 'Data Berhasil Dihapus!', 'success');
                        form_simpan_kbli_siujk[0].reset();
                        reloadTable_kbli_siujk()
                    } else {
                        Swal.fire('Maaf', response['maaf'], 'warning');
                    }
                }
            })
        }
    });
}

function edit_kbli_siujk() {
    var form_simpan_kbli_siujk = $('#form_simpan_kbli_siujk');
    var form_edit_kbli_siujk = $('#form_edit_kbli_siujk');
    var modal_edit_kbli_siujk = $('#modal_edit_kbli_siujk');
    var url_edit_kbli_siujk = $('[name="url_edit_kbli_siujk"]').val();
    $.ajax({
        method: "POST",
        url: url_edit_kbli_siujk,
        data: form_edit_kbli_siujk.serialize(),
        dataType: "JSON",
        beforeSend: function() {
            $('#button_edit_kbli_siujk').attr("disabled", true);
        },
        success: function(response) {
            if (response['message'] == 'success') {
                reloadTable_kbli_siujk()
                Swal.fire('Good job!', 'Data Berhasil Ditambah!', 'success');
                form_edit_kbli_siujk[0].reset();
                form_simpan_kbli_siujk[0].reset();
                $(".id_kbli_siujk_error").css('display', 'none');
                $(".id_kualifikasi_izin_kbli_siujk_error").css('display', 'none');
                $(".ket_kbli_siujk_error").css('display', 'none');
                $('#button_edit_kbli_siujk').attr("disabled", false);
            } else {
                if (response['error']['id_kbli_siujk'] == '<p>Kode Kbli Sudah Ada Di Table Anda</p>') {
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'KODE KBLI SUDAH ADA',
                    })
                    $(".id_kualifikasi_izin_kbli_siujk_error").css('display', 'block');
                    $(".ket_kbli_siujk_error").css('display', 'block');
                    $(".id_kualifikasi_izin_kbli_siujk_error").html(response['error']['id_kualifikasi_izin_kbli_siujk']);
                    $(".ket_kbli_siujk_error").html(response['error']['ket_kbli_siujk']);
                    $('#button_edit_kbli_siujk').attr("disabled", false);
                } else {
                    $(".id_kbli_siujk_error").css('display', 'block');
                    $(".id_kualifikasi_izin_kbli_siujk_error").css('display', 'block');
                    $(".ket_kbli_siujk_error_error").css('display', 'block');
                    $(".id_kbli_siujk_error").html(response['error']['id_kbli_siujk']);
                    $(".id_kualifikasi_izin_kbli_siujk_error").html(response['error']['id_kualifikasi_izin_kbli_siujk']);
                    $(".ket_kbli_siujk_error").html(response['error']['ket_kbli_siujk']);
                    $('#button_edit_kbli_siujk').attr("disabled", false);
                }
            }
        }
    })
}

// skdp
var form_skdp = $('#form_skdp')
form_skdp.on('submit', function(e) {
    var url_post_skdp = $('[name="url_post_skdp"]').val();
    var file_dokumen_skdp_manipulasi = $('[name="file_dokumen_skdp_manipulasi"]').val();
    if (file_dokumen_skdp_manipulasi == '') {
        e.preventDefault();
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Dokumen Wajib Di Isi!',
          })
    } else {
        e.preventDefault();
        $.ajax({
            url: url_post_skdp,
            method: "POST",
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData: false,
            beforeSend: function() {
                $('#on_save_skdp').attr("disabled", true);
            },
            success: function(response) {
                if (response['error']) {
                    $(".nomor_surat_skdp_error").css('display', 'block');
                    $(".sts_seumur_hidup_skdp_error").css('display', 'block');
                    $(".file_dokumen_skdp_error").css('display', 'block');
                    $(".file_dokumen_skdp_error").html(response['error']['file_dokumen_skdp']);
                    $(".nomor_surat_skdp_error").html(response['error']['nomor_surat_skdp']);
                    $(".sts_seumur_hidup_skdp_error").html(response['error']['sts_seumur_hidup_skdp']);
                    $('#on_save_skdp').attr("disabled", false);
                } else {
                let timerInterval
                Swal.fire({
                    title: 'Sedang Proses Menyimpan Data!',
                    html: 'Membuat Data <b></b>',
                    timer: 3000,
                    timerProgressBar: true,
                    didOpen: () => {
                        Swal.showLoading()
                        const b = Swal.getHtmlContainer().querySelector('b')
                        timerInterval = setInterval(() => {
                            // b.textContent = Swal.getTimerRight()
                        }, 100)
                    },
                    willClose: () => {
                        clearInterval(timerInterval)
                        Swal.fire('Data Berhasil Di Simpan!', '', 'success')
                        get_row_vendor();
                        $('#on_save_skdp').attr("disabled", false);
                        $(".nomor_surat_skdp_error").css('display', 'none');
                        $(".sts_seumur_hidup_skdp_error").css('display', 'none');
                        $(".file_dokumen_skdp_error").css('display', 'none');
                    }
                }).then((result) => {
                    /* Read more about handling dismissals below */
                    if (result.dismiss === Swal.DismissReason.timer) {

                    }
                })
                 }
            }
        })
            }
})

function sts_berlaku_skdp() {
    var sts_seumur_hidup_skdp = $('[name="sts_seumur_hidup_skdp"]').val()
    if (sts_seumur_hidup_skdp == 1) {
        $('.tgl_berlaku_skdp').attr("readonly", false);
    } else {
        $('.tgl_berlaku_skdp').attr("readonly", true);
    }
}

function EditChangeGlobal_skdp() {
    $('#apply_edit_skdp').modal('hide')
    $('.nomor_surat_skdp').attr("readonly", false);
    $('.sts_seumur_hidup_skdp').attr("disabled", false);
    $('.tgl_berlaku_skdp').attr("readonly", false);
    $('.kualifikasi_izin_skdp').attr("disabled", false);
    $('.file_dokumen_skdp').attr("readonly", false);
    $('.btn_skdp').attr("disabled", false);
    $('.kbli_skdp').attr("readonly", false);
    $('.file_dokumen_skdp').attr("disabled", false);
    $('#on_save_skdp').attr("disabled", false);
    $('#button_save_kbli_skdp').removeClass("disabled");
    $('#button_edit_kbli_skdp').removeClass("disabled");
}

function input_skdp_edit() {
    $('#apply_edit_skdp').modal('hide')
    $('#modal-xl-kbli-skdp').modal('show')
    $('.nomor_surat_skdp').attr("readonly", false);
    $('.sts_seumur_hidup_skdp').attr("disabled", false);
    $('.tgl_berlaku_skdp').attr("readonly", false);
    $('.kualifikasi_izin_skdp').attr("disabled", false);
    $('.file_dokumen_skdp').attr("readonly", false);
    $('.kbli_skdp').attr("readonly", false);
    $('.file_dokumen_skdp').attr("disabled", false);
    // $('#on_save_skdp').attr("disabled", true);
    $('#button_save_kbli_skdp').removeClass("disabled");
    $('#button_edit_kbli_skdp').removeClass("disabled");
}

function BatalChangeGlobal_skdp() {
    $('#apply_edit_skdp').modal('hide')
    $('.nomor_surat_skdp').attr("readonly", true);
    $('.sts_seumur_hidup_skdp').attr("disabled", true);
    $('.tgl_berlaku_skdp').attr("readonly", true);
    $('.kualifikasi_izin_skdp').attr("disabled", true);
    $('.file_dokumen_skdp').attr("readonly", true);
    $('.kbli_skdp').attr("readonly", true);
    $('.btn_skdp').attr("disabled", true);
    $('.file_dokumen_skdp').attr("disabled", true);
    $('#on_save_skdp').attr("disabled", true);
    $('#button_save_kbli_skdp').addClass("disabled");
    $('#button_edit_kbli_skdp').addClass("disabled");
}
$('#modal_dekrip_skdp').on('hidden.bs.modal', function() {
    get_row_vendor();
})


// GET TABLE KBLI skdp
var table_kbli_skdp = $('#table_kbli_skdp')
$(document).ready(function() {
    var url_table_kbli_skdp = $('[name="url_table_kbli_skdp"]').val();
    table_kbli_skdp.DataTable({
        "responsive": false,
        "ordering": true,
        "processing": true,
        "serverSide": true,
        "dom": 'Bfrtip',
        "buttons": ["excel", "pdf", "print", "colvis"],
        "order": [],
        "ajax": {
            "url": url_table_kbli_skdp,
            "type": "POST",
        },
        "columnDefs": [{
            "target": [-1],
            "orderable": false
        }],
        "oLanguage": {
            "sSearch": "Pencarian : ",
            "sEmptyTable": "Data Tidak Tersedia",
            "sLoadingRecords": "Silahkan Tunggu - loading...",
            "sLengthMenu": "Menampilkan &nbsp;  _MENU_  &nbsp;   Data",
            "sZeroRecords": "Tidak Ada Data Yang Di Cari",
            "sProcessing": "Memuat Data...."
        }
    }).buttons().container().appendTo('#table_kbli_skdp .col-md-6:eq(0)');
});

var table_kbli_skdp_bawah = $('#table_kbli_skdp_bawah')
$(document).ready(function() {
    var url_table_kbli_skdp = $('[name="url_table_kbli_skdp"]').val();
    table_kbli_skdp_bawah.DataTable({
        "responsive": false,
        "ordering": true,
        "processing": true,
        "serverSide": true,
        "dom": 'Bfrtip',
        "buttons": ["excel", "pdf", "print", "colvis"],
        "order": [],
        "ajax": {
            "url": url_table_kbli_skdp,
            "type": "POST",
        },
        "columnDefs": [{
            "target": [-1],
            "orderable": false
        }],
        "oLanguage": {
            "sSearch": "Pencarian : ",
            "sEmptyTable": "Data Tidak Tersedia",
            "sLoadingRecords": "Silahkan Tunggu - loading...",
            "sLengthMenu": "Menampilkan &nbsp;  _MENU_  &nbsp;   Data",
            "sZeroRecords": "Tidak Ada Data Yang Di Cari",
            "sProcessing": "Memuat Data...."
        }
    }).buttons().container().appendTo('#table_kbli_skdp .col-md-6:eq(0)');
});

function reloadTable_kbli_skdp() {
    table_kbli_skdp.DataTable().ajax.reload();
}

function simpan_kbli_skdp() {
    var form_simpan_kbli_skdp = $('#form_simpan_kbli_skdp');
    var url_tambah_kbli_skdp = $('[name="url_tambah_kbli_skdp"]').val();
    $.ajax({
        method: "POST",
        url: url_tambah_kbli_skdp,
        data: form_simpan_kbli_skdp.serialize(),
        dataType: "JSON",
        beforeSend: function() {
            $('#button_save_kbli_skdp').attr("disabled", true);
        },
        success: function(response) {
            if (response['message'] == 'success') {
                reloadTable_kbli_skdp()
                Swal.fire('Good job!', 'Data Berhasil Ditambah!', 'success');
                form_simpan_kbli_skdp[0].reset();
                $(".id_kbli_skdp_error").css('display', 'none');
                $(".id_kualifikasi_izin_kbli_skdp_error").css('display', 'none');
                $(".ket_kbli_skdp_error").css('display', 'none');
                $('#button_save_kbli_skdp').attr("disabled", false);
            } else {
                if (response['error']['id_kbli_skdp'] == '<p>Kode Kbli Sudah Ada Di Table Anda</p>') {
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'KODE KBLI SUDAH ADA',
                    })
                    $(".id_kualifikasi_izin_kbli_skdp_error").css('display', 'block');
                    $(".ket_kbli_skdp_error").css('display', 'block');
                    $(".id_kualifikasi_izin_kbli_skdp_error").html(response['error']['id_kualifikasi_izin_kbli_skdp']);
                    $(".ket_kbli_skdp_error").html(response['error']['ket_kbli_skdp']);
                    $('#button_save_kbli_skdp').attr("disabled", false);
                } else {
                    $(".id_kbli_skdp_error").css('display', 'block');
                    $(".id_kualifikasi_izin_kbli_skdp_error").css('display', 'block');
                    $(".ket_kbli_skdp_error_error").css('display', 'block');
                    $(".id_kbli_skdp_error").html(response['error']['id_kbli_skdp']);
                    $(".id_kualifikasi_izin_kbli_skdp_error").html(response['error']['id_kualifikasi_izin_kbli_skdp']);
                    $(".ket_kbli_skdp_error").html(response['error']['ket_kbli_skdp']);
                    $('#button_save_kbli_skdp').attr("disabled", false);
                }
            }
        }
    })
}


function byid_kbli_skdp(id_url_kbli_skdp, type) {
    var modal_edit_kbli_skdp = $('#modal_edit_kbli_skdp');
    var url_byid_kbli_skdp = $('[name="url_byid_kbli_skdp"]').val();
    if (type == 'edit') {
        saveData = 'edit';
    }

    if (type == 'hapus') {
        saveData = 'hapus';
    }

    $.ajax({
        type: "GET",
        url: url_byid_kbli_skdp + id_url_kbli_skdp,
        dataType: "JSON",
        success: function(response) {
            if (type == 'edit') {
                modal_edit_kbli_skdp.modal('show');
                $('[name="id_url_kbli_skdp"]').val(response['row_kbli_skdp'].id_url_kbli_skdp);
                $('[name="token_kbli_skdp"]').val(response['row_kbli_skdp'].token_kbli_skdp);
                $('[name="id_kbli_skdp"]').val(response['row_kbli_skdp'].id_kbli);
                $('[name="id_kualifikasi_izin_kbli_skdp"]').val(response['row_kbli_skdp'].id_kualifikasi_izin);
                $('[name="ket_kbli_skdp"]').val(response['row_kbli_skdp'].ket_kbli_skdp);
                $('#pilihan_kbli_skdp').html(response['row_kbli_skdp'].kode_kbli + ' || ' + response['row_kbli_skdp'].nama_kbli);
                $('#pilihan_kualifikasi_kbli_skdp').html(response['row_kbli_skdp'].nama_kualifikasi);
            } else {
                Question_kbli_skdp(id_url_kbli_skdp, response['row_kbli_skdp'].token_kbli_skdp);
            }
        }
    })
}

function Question_kbli_skdp(id_url_kbli_skdp, token_kbli_skdp) {
    var form_simpan_kbli_skdp = $('#form_simpan_kbli_skdp');
    var url_hapus_kbli_skdp = $('[name="url_hapus_kbli_skdp"]').val();
    Swal.fire({
        title: "Data Di Hapus",
        text: 'Kbli Ini Mau Di hapus?',
        icon: "warning",
        buttons: true,
        dangerMode: true,
    }).then((willDelete) => {
        if (willDelete) {
            $.ajax({
                type: "POST",
                url: url_hapus_kbli_skdp,
                data: {
                    id_url_kbli_skdp: id_url_kbli_skdp,
                    token_kbli_skdp: token_kbli_skdp
                },
                dataType: "JSON",
                success: function(response) {
                    if (response['message'] == 'success') {
                        Swal.fire('Good job!', 'Data Berhasil Dihapus!', 'success');
                        form_simpan_kbli_skdp[0].reset();
                        reloadTable_kbli_skdp()
                    } else {
                        Swal.fire('Maaf', response['maaf'], 'warning');
                    }
                }
            })
        }
    });
}

function edit_kbli_skdp() {
    var form_simpan_kbli_skdp = $('#form_simpan_kbli_skdp');
    var form_edit_kbli_skdp = $('#form_edit_kbli_skdp');
    var modal_edit_kbli_skdp = $('#modal_edit_kbli_skdp');
    var url_edit_kbli_skdp = $('[name="url_edit_kbli_skdp"]').val();
    $.ajax({
        method: "POST",
        url: url_edit_kbli_skdp,
        data: form_edit_kbli_skdp.serialize(),
        dataType: "JSON",
        beforeSend: function() {
            $('#button_edit_kbli_skdp').attr("disabled", true);
        },
        success: function(response) {
            if (response['message'] == 'success') {
                reloadTable_kbli_skdp()
                Swal.fire('Good job!', 'Data Berhasil Ditambah!', 'success');
                form_edit_kbli_skdp[0].reset();
                form_simpan_kbli_skdp[0].reset();
                $(".id_kbli_skdp_error").css('display', 'none');
                $(".id_kualifikasi_izin_kbli_skdp_error").css('display', 'none');
                $(".ket_kbli_skdp_error").css('display', 'none');
                $('#button_edit_kbli_skdp').attr("disabled", false);
            } else {
                if (response['error']['id_kbli_skdp'] == '<p>Kode Kbli Sudah Ada Di Table Anda</p>') {
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'KODE KBLI SUDAH ADA',
                    })
                    $(".id_kualifikasi_izin_kbli_skdp_error").css('display', 'block');
                    $(".ket_kbli_skdp_error").css('display', 'block');
                    $(".id_kualifikasi_izin_kbli_skdp_error").html(response['error']['id_kualifikasi_izin_kbli_skdp']);
                    $(".ket_kbli_skdp_error").html(response['error']['ket_kbli_skdp']);
                    $('#button_edit_kbli_skdp').attr("disabled", false);
                } else {
                    $(".id_kbli_skdp_error").css('display', 'block');
                    $(".id_kualifikasi_izin_kbli_skdp_error").css('display', 'block');
                    $(".ket_kbli_skdp_error_error").css('display', 'block');
                    $(".id_kbli_skdp_error").html(response['error']['id_kbli_skdp']);
                    $(".id_kualifikasi_izin_kbli_skdp_error").html(response['error']['id_kualifikasi_izin_kbli_skdp']);
                    $(".ket_kbli_skdp_error").html(response['error']['ket_kbli_skdp']);
                    $('#button_edit_kbli_skdp').attr("disabled", false);
                }
            }
        }
    })
}


function DekripEnkrip_skdp(id_url_skdp, type) {
    var secret_token = $('[name="secret_token"]').val()
    var url_encryption_skdp = $('[name="url_encryption_skdp"]').val();
    var modal_dekrip_skdp = $('#modal_dekrip_skdp');
    if (type == 'dekrip') {
        modal_dekrip_skdp.modal('show');
        $('input').attr("readonly", false);
        $('[name="id_url_skdp"]').val(id_url_skdp);
    } else {
        $.ajax({
            method: "POST",
            url: url_encryption_skdp + id_url_skdp,
            dataType: "JSON",
            data: {
                secret_token: secret_token,
                type: type
            },
            success: function(response) {
                let timerInterval
                Swal.fire({
                    title: 'Sedang Proses Enkripsi!',
                    html: 'Proses Enkripsi <b></b>',
                    timer: 2000,
                    timerProgressBar: true,
                    didOpen: () => {
                        Swal.showLoading()
                        const b = Swal.getHtmlContainer().querySelector('b')
                        timerInterval = setInterval(() => {
                            // b.textContent = Swal.getTimerRight()
                        }, 100)
                    },
                    willClose: () => {
                        clearInterval(timerInterval)
                        Swal.fire('Dokumen Berhasil Di Enkripsi', '', 'success')
                        get_row_vendor();
                    }
                }).then((result) => {
                    /* Read more about handling dismissals below */
                    if (result.dismiss === Swal.DismissReason.timer) {

                    }
                })
            }
        })
    }

}

function GenerateDekrip_skdp() {
    var url_dekrip_skdp = $('[name="url_dekrip_skdp"]').val();
    var modal_dekrip_skdp = $('#modal_dekrip_skdp');
    $.ajax({
        method: "POST",
        url: url_dekrip_skdp,
        dataType: "JSON",
        data: $('#form_dekrip_skdp').serialize(),
        beforeSend: function() {
            $('#button_dekrip_generate_skdp').css('display', 'none');
            $('#button_dekrip_generate_manipulasi_skdp').css('display', 'block');
        },
        success: function(response) {
            if (response['maaf']) {
                $('#button_dekrip_generate_skdp').css('display', 'block');
                $('#button_dekrip_generate_manipulasi_skdp').css('display', 'none');
                Swal.fire(response['maaf'], '', 'warning')
            } else {
                let timerInterval
                Swal.fire({
                    title: 'Sedang Proses Deskripsi!',
                    html: 'Proses Deksripsi <b></b>',
                    timer: 2000,
                    timerProgressBar: true,
                    didOpen: () => {
                        Swal.showLoading()
                        const b = Swal.getHtmlContainer().querySelector('b')
                        timerInterval = setInterval(() => {
                            // b.textContent = Swal.getTimerRight()
                        }, 100)
                    },
                    willClose: () => {
                        clearInterval(timerInterval)
                        Swal.fire('Dokumen Berhasil Di Deskripsi!', '', 'success')
                        get_row_vendor();
                        $('#button_dekrip_generate_skdp').css('display', 'block');
                        $('#button_dekrip_generate_manipulasi_skdp').css('display', 'none');
                        modal_dekrip_skdp.modal('hide');
                    }
                }).then((result) => {
                    /* Read more about handling dismissals below */
                    if (result.dismiss === Swal.DismissReason.timer) {

                    }
                })
            }
        }
    })
}

function DownloadFile_skdp(id_url_skdp) {
    var url_download_skdp = $('[name="url_download_skdp"]').val()
    location.href = url_download_skdp + id_url_skdp;
}
// end skdp
// lainnya
var form_lainnya = $('#form_lainnya')
form_lainnya.on('submit', function(e) {
    var url_post_lainnya = $('[name="url_post_lainnya"]').val();
    var file_dokumen_lainnya_manipulasi = $('[name="file_dokumen_lainnya_manipulasi"]').val();
    if (file_dokumen_lainnya_manipulasi == '') {
        e.preventDefault();
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Dokumen Wajib Di Isi!',
          })
    } else {
        e.preventDefault();
        $.ajax({
            url: url_post_lainnya,
            method: "POST",
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData: false,
            beforeSend: function() {
                $('#on_save_lainnya').attr("disabled", true);
            },
            success: function(response) {
                if (response['error']) {
                    $(".nomor_surat_lainnya_error").css('display', 'block');
                    $(".sts_seumur_hidup_lainnya_error").css('display', 'block');
                    $(".file_dokumen_lainnya_error").css('display', 'block');
                    $(".file_dokumen_lainnya_error").html(response['error']['file_dokumen_lainnya']);
                    $(".nomor_surat_lainnya_error").html(response['error']['nomor_surat_lainnya']);
                    $(".sts_seumur_hidup_lainnya_error").html(response['error']['sts_seumur_hidup_lainnya']);
                    $('#on_save_lainnya').attr("disabled", false);
                } else {
                let timerInterval
                Swal.fire({
                    title: 'Sedang Proses Menyimpan Data!',
                    html: 'Membuat Data <b></b>',
                    timer: 3000,
                    timerProgressBar: true,
                    didOpen: () => {
                        Swal.showLoading()
                        const b = Swal.getHtmlContainer().querySelector('b')
                        timerInterval = setInterval(() => {
                            // b.textContent = Swal.getTimerRight()
                        }, 100)
                    },
                    willClose: () => {
                        clearInterval(timerInterval)
                        Swal.fire('Data Berhasil Di Simpan!', '', 'success')
                        get_row_vendor();
                        $('#on_save_lainnya').attr("disabled", false);
                        $(".nomor_surat_lainnya_error").css('display', 'none');
                        $(".sts_seumur_hidup_lainnya_error").css('display', 'none');
                        $(".file_dokumen_lainnya_error").css('display', 'none');
                    }
                }).then((result) => {
                    /* Read more about handling dismissals below */
                    if (result.dismiss === Swal.DismissReason.timer) {

                    }
                })
                 }
            }
        })
            }
})

function sts_berlaku_lainnya() {
    var sts_seumur_hidup_lainnya = $('[name="sts_seumur_hidup_lainnya"]').val()
    if (sts_seumur_hidup_lainnya == 1) {
        $('.tgl_berlaku_lainnya').attr("readonly", false);
    } else {
        $('.tgl_berlaku_lainnya').attr("readonly", true);
    }
}

function EditChangeGlobal_lainnya() {
    $('#apply_edit_lainnya').modal('hide')
    $('.nomor_surat_lainnya').attr("readonly", false);
    $('.nama_surat').attr("readonly", false);
    $('.sts_seumur_hidup_lainnya').attr("disabled", false);
    $('.tgl_berlaku_lainnya').attr("readonly", false);
    $('.kualifikasi_izin_lainnya').attr("disabled", false);
    $('.file_dokumen_lainnya').attr("readonly", false);
    $('.kbli_lainnya').attr("readonly", false);
    $('.file_dokumen_lainnya').attr("disabled", false);
    $('#on_save_lainnya').attr("disabled", false);
    $('#button_save_kbli_lainnya').removeClass("disabled");
    $('#button_edit_kbli_lainnya').removeClass("disabled");
}

function input_lainnya_edit() {
    $('#apply_edit_lainnya').modal('hide')
    $('#modal-xl-kbli-lainnya').modal('show')
    $('.nomor_surat_lainnya').attr("readonly", true);
    $('.sts_seumur_hidup_lainnya').attr("disabled", true);
    $('.tgl_berlaku_lainnya').attr("readonly", true);
    $('.kualifikasi_izin_lainnya').attr("disabled", true);
    $('.file_dokumen_lainnya').attr("readonly", true);
    $('.kbli_lainnya').attr("readonly", true);
    $('.file_dokumen_lainnya').attr("disabled", true);
    $('#on_save_lainnya').attr("disabled", true);
    $('#button_save_kbli_lainnya').removeClass("disabled");
    $('#button_edit_kbli_lainnya').removeClass("disabled");
}

function BatalChangeGlobal_lainnya() {
    $('#apply_edit_lainnya').modal('hide')
    $('.nomor_surat_lainnya').attr("readonly", true);
    $('.sts_seumur_hidup_lainnya').attr("disabled", true);
    $('.tgl_berlaku_lainnya').attr("readonly", true);
    $('.kualifikasi_izin_lainnya').attr("disabled", true);
    $('.file_dokumen_lainnya').attr("readonly", true);
    $('.kbli_lainnya').attr("readonly", true);
    $('.file_dokumen_lainnya').attr("disabled", true);
    $('#on_save_lainnya').attr("disabled", true);
    $('#button_save_kbli_lainnya').addClass("disabled");
    $('#button_edit_kbli_lainnya').addClass("disabled");
}

$('#modal_dekrip_lainnya').on('hidden.bs.modal', function() {
    get_row_vendor();
})


function DekripEnkrip_lainnya(id_url_lainnya, type) {
    var secret_token = $('[name="secret_token"]').val()
    var url_encryption_lainnya = $('[name="url_encryption_lainnya"]').val();
    var modal_dekrip_lainnya = $('#modal_dekrip_lainnya');
    if (type == 'dekrip') {
        modal_dekrip_lainnya.modal('show');
        $('input').attr("readonly", false);
        $('[name="id_url_lainnya"]').val(id_url_lainnya);
    } else {
        $.ajax({
            method: "POST",
            url: url_encryption_lainnya + id_url_lainnya,
            dataType: "JSON",
            data: {
                secret_token: secret_token,
                type: type
            },
            success: function(response) {
                let timerInterval
                Swal.fire({
                    title: 'Sedang Proses Enkripsi!',
                    html: 'Proses Enkripsi <b></b>',
                    timer: 2000,
                    timerProgressBar: true,
                    didOpen: () => {
                        Swal.showLoading()
                        const b = Swal.getHtmlContainer().querySelector('b')
                        timerInterval = setInterval(() => {
                            // b.textContent = Swal.getTimerRight()
                        }, 100)
                    },
                    willClose: () => {
                        clearInterval(timerInterval)
                        Swal.fire('Dokumen Berhasil Di Enkripsi', '', 'success')
                        get_row_vendor();
                    }
                }).then((result) => {
                    /* Read more about handling dismissals below */
                    if (result.dismiss === Swal.DismissReason.timer) {

                    }
                })
            }
        })
    }

}

function GenerateDekrip_lainnya() {
    var url_dekrip_lainnya = $('[name="url_dekrip_lainnya"]').val();
    var modal_dekrip_lainnya = $('#modal_dekrip_lainnya');
    $.ajax({
        method: "POST",
        url: url_dekrip_lainnya,
        dataType: "JSON",
        data: $('#form_dekrip_lainnya').serialize(),
        beforeSend: function() {
            $('#button_dekrip_generate_lainnya').css('display', 'none');
            $('#button_dekrip_generate_manipulasi_lainnya').css('display', 'block');
        },
        success: function(response) {
            if (response['maaf']) {
                $('#button_dekrip_generate_lainnya').css('display', 'block');
                $('#button_dekrip_generate_manipulasi_lainnya').css('display', 'none');
                Swal.fire(response['maaf'], '', 'warning')
            } else {
                let timerInterval
                Swal.fire({
                    title: 'Sedang Proses Deskripsi!',
                    html: 'Proses Deksripsi <b></b>',
                    timer: 2000,
                    timerProgressBar: true,
                    didOpen: () => {
                        Swal.showLoading()
                        const b = Swal.getHtmlContainer().querySelector('b')
                        timerInterval = setInterval(() => {
                            // b.textContent = Swal.getTimerRight()
                        }, 100)
                    },
                    willClose: () => {
                        clearInterval(timerInterval)
                        Swal.fire('Dokumen Berhasil Di Deskripsi!', '', 'success')
                        get_row_vendor();
                        $('#button_dekrip_generate_lainnya').css('display', 'block');
                        $('#button_dekrip_generate_manipulasi_lainnya').css('display', 'none');
                        modal_dekrip_lainnya.modal('hide');
                    }
                }).then((result) => {
                    /* Read more about handling dismissals below */
                    if (result.dismiss === Swal.DismissReason.timer) {

                    }
                })
            }
        }
    })
}

function DownloadFile_lainnya(id_url_lainnya) {
    var url_download_lainnya = $('[name="url_download_lainnya"]').val()
    location.href = url_download_lainnya + id_url_lainnya;
}
// end lainnya
