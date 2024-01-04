<script>
    $(document).ready(function() {
        var get_data_tender = $('[name="get_data_tender"]').val();
        $('#tbl_tender_umum').DataTable({
            "ordering": true,
            "autoWidth": false,
            "processing": true,
            "serverSide": true,
            "bDestroy": true,
            "dom": 'Bfrtip',
            "buttons": ["excel", "pdf", "print", "colvis"],
            "order": [],
            "ajax": {
                "url": get_data_tender,
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
        }).buttons().container().appendTo('#data_pengalaman_manajerial .col-md-6:eq(0)');
    });

    function reload_table() {
        $('#tbl_tender_umum').DataTable().ajax.reload();
    }


    function by_id_rup(id_url_rup, type) {
        var url_detail_paket = $('[name="url_detail_paket"]').val();
        $.ajax({
            type: "GET",
            url: url_detail_paket + id_url_rup,
            dataType: "JSON",
            success: function(response) {
                if (response['cek_ikut']) {
                    $('#tombol_mengikuti').html('<button disabled type="button" class="btn btn-default btn-primary"><i class="fa fa-spinner" aria-hidden="true"></i> Anda Sedang Mengikuti Pengadaan ini</button>')
                } else {
                    if (response['row_rup'].id_metode_pengadaan == 4) {
                        $('#tombol_mengikuti').html('<a type="javascript:;" onclick="pakta_integritas_question_terbatas(\'' + response['row_rup'].id_rup + '\'' + ',' + '\'' + response['row_rup'].nama_rup + '\')" class="btn btn-default btn-warning"><i class="fa-solid fa-circle-up px-1"></i> Ikuti Pengadaan Terbatas</a>')
                    } else {
                        $('#tombol_mengikuti').html('<a type="javascript:;" onclick="pakta_integritas_question(\'' + response['row_rup'].id_rup + '\'' + ',' + '\'' + response['row_rup'].nama_rup + '\')" class="btn btn-default btn-warning"><i class="fa-solid fa-circle-up px-1"></i> Ikuti Pengadaan</a>')
                    }
                }
                $('#modal-xl-detail').modal('show')
                $('#kode_rup').text(response['row_rup'].kode_rup)
                $('#tahun_rup').text(response['row_rup'].tahun_rup)
                $('#nama_rup').text(response['row_rup'].nama_rup)
                $('#nama_departemen').text(response['row_rup'].nama_departemen)
                $('#nama_section').text(response['row_rup'].nama_section)
                $('#detail_lokasi_rup').text(response['row_rup'].detail_lokasi_rup)
                $('#nama_jenis_pengadaan').text(response['row_rup'].nama_jenis_pengadaan)
                $('#nama_metode_pengadaan').text(response['row_rup'].nama_metode_pengadaan)
                $('#nama_metode_pemilihan').text(response['row_rup'].metode_kualifikasi)
                $('#dokumen_pemilihan').text(response['row_rup'].metode_dokumen)
                $('#batas_pendaftaran').text(response['row_rup'].batas_pendaftaran_tender)
                $('#jangka_waktu_hari_pelaksanaan').text(response['row_rup'].jangka_waktu_hari_pelaksanaan)
                $('#status_pencatatan').text(response['row_rup'].status_pencatatan)
                $('#persen_pencatatan').text(response['row_rup'].persen_pencatatan)
                if (response['row_rup'].jenis_kontrak == 1) {
                    jenis_kontrak = 'Lump Sum'
                } else if (response['row_rup'].jenis_kontrak == 2) {
                    jenis_kontrak = 'Harga Satuan'
                } else if (response['row_rup'].jenis_kontrak == 3) {
                    jenis_kontrak = 'Gabungan Lump Sum dan Harga Satuan'
                } else if (response['row_rup'].jenis_kontrak == 4) {
                    jenis_kontrak = 'Terima Jadi(Turnkey)'
                } else if (response['row_rup'].jenis_kontrak == 5) {
                    jenis_kontrak = 'Persentase( % )'
                }
                $('#jenis_kontrak').text(jenis_kontrak)
                $('#total_hps_rup').text(currency(response['row_rup'].total_hps_rup))

                if (response['result_kbli']) {
                    var res_kbli = ''
                    var i_kbli = 0;
                    for (i_kbli = 0; i_kbli < response['result_kbli'].length; i_kbli++) {

                        res_kbli += '<tr>' +
                            '<td>' + response['result_kbli'][i_kbli].kode_kbli + ' | ' + response['result_kbli'][i_kbli].nama_kbli + '</td>' +
                            '</tr>'
                    }
                    $('#load_kbli').html(res_kbli)
                } else {

                }

                if (response['result_sbu']) {
                    var res_sbu = ''
                    var i_sbu = 0;
                    for (i_sbu = 0; i_sbu < response['result_sbu'].length; i_sbu++) {

                        res_sbu += '<tr>' +
                            '<td>' + response['result_sbu'][i_sbu].kode_sbu + ' | ' + response['result_sbu'][i_sbu].nama_sbu + '</td>' +
                            '</tr>'
                    }
                    $('#load_sbu').html(res_sbu)
                } else {

                }

                if (response['row_rup'].beban_tahun_anggaran == 1) {
                    $('#beban_tahun_anggaran').text('Tahun Tunggal')
                } else {
                    $('#beban_tahun_anggaran').text('Tahun Jamak')
                }

                if (response['row_rup'].bobot_nilai == 1) {
                    $('#bobot_nilai').text('Kombinasi')
                    $('#Bobot').text(response['row_rup'].bobot_teknis + '% ' + '& ' + response['row_rup'].bobot_biaya + '% ')
                } else if (response['row_rup'].bobot_nilai == 2) {
                    $('#bobot_nilai').text('Bobot Teknis')
                    $('#Bobot').text(response['row_rup'].bobot_teknis + '% ' + '& ' + response['row_rup'].bobot_biaya + '% ')
                } else if (response['row_rup'].bobot_nilai == 3) {
                    $('#bobot_nilai').text('Bobot Biaya')
                    $('#Bobot').text(response['row_rup'].bobot_teknis + '% ' + '& ' + response['row_rup'].bobot_biaya + '% ')
                }
                if (response['row_rup'].jenis_kontrak == 1) {
                    jenis_kontrak = 'Lump Sum'
                } else if (response['row_rup'].jenis_kontrak == 2) {
                    jenis_kontrak = 'Harga Satuan'
                } else if (response['row_rup'].jenis_kontrak == 3) {
                    jenis_kontrak = 'Gabungan Lump Sum dan Harga Satuan'
                } else if (response['row_rup'].jenis_kontrak == 4) {
                    jenis_kontrak = 'Terima Jadi(Turnkey)'
                } else if (response['row_rup'].jenis_kontrak == 5) {
                    jenis_kontrak = 'Persentase( % )'
                }
                $('#jenis_kontrak').text(jenis_kontrak)


                $('#detail_jadwal').html('<a href="javascript:;" onclick="lihat_detail_jadwal(\'' + response['row_rup'].id_url_rup + '\')" class="btn btn-sm btn-primary"><i class="fa-solid fa-calendar-days px-1"></i> Detail Jadwal Pengadaan</a>')

                // ini untuk get syarat izin administarsi legalitas rup

                $('#syarat_tender_kualifikasi').text(response['row_rup'].syarat_tender_kualifikasi)
                // siup
                if (response['row_syarat_administrasi_rup'].sts_checked_siup == 1) {
                    $('#siup_izin').css('display', 'block')
                    if (response['row_syarat_administrasi_rup'].sts_masa_berlaku_siup == 1) {
                        $('#sts_masa_berlaku_siup').text(response['row_syarat_administrasi_rup'].tgl_berlaku_siup)
                    } else {
                        $('#sts_masa_berlaku_siup').text('Seumur Hidup')
                    }
                } else {

                }

                // nib
                if (response['row_syarat_administrasi_rup'].sts_checked_nib == 1) {
                    $('#nib_izin').css('display', 'block')
                    if (response['row_syarat_administrasi_rup'].sts_masa_berlaku_nib == 1) {
                        $('#sts_masa_berlaku_nib').text(response['row_syarat_administrasi_rup'].tgl_berlaku_nib)
                    } else {
                        $('#sts_masa_berlaku_nib').text('Seumur Hidup')
                    }
                } else {

                }

                // sbu
                if (response['row_syarat_administrasi_rup'].sts_checked_sbu == 1) {
                    $('#sbu_izin').css('display', 'block')
                    if (response['row_syarat_administrasi_rup'].sts_masa_berlaku_sbu == 1) {
                        $('#sts_masa_berlaku_sbu').text(response['row_syarat_administrasi_rup'].tgl_berlaku_sbu)
                    } else {
                        $('#sts_masa_berlaku_sbu').text('Seumur Hidup')
                    }
                } else {

                }

                // siujk
                if (response['row_syarat_administrasi_rup'].sts_checked_siujk == 1) {
                    $('#siujk_izin').css('display', 'block')
                    if (response['row_syarat_administrasi_rup'].sts_masa_berlaku_siujk == 1) {
                        $('#sts_masa_berlaku_siujk').text(response['row_syarat_administrasi_rup'].tgl_berlaku_siujk)
                    } else {
                        $('#sts_masa_berlaku_siujk').text('Seumur Hidup')
                    }
                } else {

                }


                // skdp
                if (response['row_syarat_administrasi_rup'].sts_checked_skdp == 1) {
                    $('#skdp_izin').css('display', 'block')
                    if (response['row_syarat_administrasi_rup'].sts_masa_berlaku_skdp == 1) {
                        $('#sts_masa_berlaku_skdp').text(response['row_syarat_administrasi_rup'].tgl_berlaku_skdp)
                    } else {
                        $('#sts_masa_berlaku_skdp').text('Seumur Hidup')
                    }
                } else {
                    $('#skdp_izin').css('display', 'none')
                    $('#sts_masa_berlaku_skdp').text('Tidak Diperlukan')
                }

                $('#detail_jadwal').html('<a href="javascript:;" onclick="lihat_detail_jadwal(\'' + response['row_rup'].id_url_rup + '\')" class="btn btn-sm btn-primary"><i class="fa-solid fa-calendar-days px-1"></i> Detail Jadwal Pengadaan</a>')

                // spt
                if (response['row_syarat_teknis_rup'].sts_checked_spt == 1) {
                    $('#spt_izin').css('display', 'block')
                    $('#tahun_spt').text('Tahun ' + response['row_syarat_teknis_rup'].tahun_lapor_spt)
                } else {
                    $('#spt_izin').css('display', 'none')
                    $('#tahun_spt').text('Tidak Diperlukan')
                }

                // keuangan
                if (response['row_syarat_teknis_rup'].sts_checked_laporan_keuangan == 1) {
                    $('#keuangan_izin').css('display', 'block')
                    $('#tahun_keuangan').text(response['row_syarat_teknis_rup'].sts_audit_laporan_keuangan + ' ' + 'Tahun Awal ' + response['row_syarat_teknis_rup'].tahun_awal_laporan_keuangan + ' ' + 'Tahun Akhir ' + response['row_syarat_teknis_rup'].tahun_akhir_laporan_keuangan)
                } else {
                    $('#keuangan_izin').css('display', 'none')
                    $('#tahun_keuangan').text('Tidak Diperlukan')
                }

                // neraca
                if (response['row_syarat_teknis_rup'].sts_checked_neraca_keuangan == 1) {
                    $('#neraca_izin').css('display', 'block')
                    $('#tahun_neraca').text('Tahun Awal ' + response['row_syarat_teknis_rup'].tahun_awal_neraca_keuangan + ' ' + 'Tahun Akhir ' + response['row_syarat_teknis_rup'].tahun_akhir_neraca_keuangan)
                } else {
                    $('#neraca_izin').css('display', 'none')
                    $('#tahun_neraca').text('Tidak Diperlukan')
                }

                var html_syarat_tambahan = '';
                var i;
                if (response['syarat_tambahan']) {
                    for (i = 0; i < response['syarat_tambahan'].length; i++) {
                        if (response['syarat_tambahan'][i].file_syarat_tambahan) {
                            var dok = '<a href="javascript:;" onclick="download_file_syarat_tambahan(' + response['syarat_tambahan'][i].id_syarat_tambahan + ')" class="btn btn-sm btn-warning"><i class="fas fa fa-donwload"></i> Download File</a>'
                        } else {
                            var dok = '<span class="badge bg-danger">Tidak Ada Lampiran</span>'
                        }
                        html_syarat_tambahan += '<tr>' +
                            '<td>' + response['syarat_tambahan'][i].nama_syarat_tambahan + '</td>' +
                            '<td><i>Lampiran Ada Di Dalam Informasi Pengadaan</i></td>' +
                            '</tr>'
                    }
                    $('#load_syarat_tambahan').html(html_syarat_tambahan)
                } else {

                }


            }
        })
    }


    function pakta_integritas_question(id, nama_paket) {
        var url_mengikuti = $('[name="url_mengikuti"]').val()
        Swal.fire({
            title: 'Nama Paket : ' + nama_paket,
            text: 'Apakah Anda Yakin Ingin Menjadi Peserta Pengadaan dan Menyetujui Pakta Integritas Pada PT. Jasamarga Tollroad Operator ? ',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, Yakin!',
            cancelButtonText: 'Batal!',
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    type: "POST",
                    url: url_mengikuti,
                    data: {
                        id_rup: id,
                    },
                    dataType: "JSON",
                    success: function(response) {
                        if (response == 'success') {
                            Swal.fire(
                                'Berhasil!',
                                'Anda Berhasil Menjadi Peserta Pengadaan ' + nama_paket + ' Silahkan Periksa Di Menu Tender Mengikuti Untuk Melihat Informasi Pengadaan!',
                                'success'
                            )
                            $('#modal-xl-detail').modal('hide')
                            reload_table();
                        }
                    }
                })

            }
        })
    }

    function pakta_integritas_question_terbatas(id, nama_paket) {
        var url_mengikuti_terbatas = $('[name="url_mengikuti_terbatas"]').val()
        Swal.fire({
            title: 'Nama Paket : ' + nama_paket,
            text: 'Apakah Anda Yakin Ingin Menjadi Peserta Pengadaan Terbatas dan Menyetujui Pakta Integritas Pada PT. Jasamarga Tollroad Operator ? ',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, Yakin!',
            cancelButtonText: 'Batal!',
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    type: "POST",
                    url: url_mengikuti_terbatas + id,
                    dataType: "JSON",
                    success: function(response) {
                        if (response == 'success') {
                            Swal.fire(
                                'Berhasil!',
                                'Anda Berhasil Menjadi Peserta Pengadaan ' + nama_paket + ' Silahkan Periksa Di Menu Tender Mengikuti Untuk Melihat Informasi Pengadaan!',
                                'success'
                            )
                            $('#modal-xl-detail').modal('hide')
                            reload_table();
                        }
                    }
                })

            }
        })
    }

    function currency(rp) {
        let num = rp;
        let rupiahFormat = num.toString().replace(/\B(?=(\d{3})+(?!\d))/g, '.');
        return rupiahFormat;
    }

    function jenis_kontrak(jenis_kontrak) {
        if (jenis_kontrak == 1) {
            jenis_kontrak = 'Lump Sum'
        } else if (jenis_kontrak == 2) {
            jenis_kontrak = 'Harga Satuan'
        } else if (jenis_kontrak == 3) {
            jenis_kontrak = 'Gabungan Lump Sum dan Harga Satuan'
        } else if (jenis_kontrak == 4) {
            jenis_kontrak = 'Terima Jadi(Turnkey)'
        } else if (jenis_kontrak == 5) {
            jenis_kontrak = 'Persentase( % )'
        }
        return jenis_kontrak
    }

    function zeros(i) {
        if (i < 10) {
            return "0" + i;
        } else {
            return i;
        }
    }

    function lihat_detail_jadwal(id_url_rup) {
        var url_detail_paket = $('[name="url_detail_paket"]').val();
        var modal_detail_jadwal = $('#modal_detail_jadwal')
        $.ajax({
            type: "GET",
            url: url_detail_paket + id_url_rup,
            dataType: "JSON",
            success: function(response) {
                modal_detail_jadwal.modal('show');
                var html = '';
                var i;
                var no = 1;
                for (i = 0; i < response['jadwal'].length; i++) {

                    var waktu_mulai = new Date(response['jadwal'][i].waktu_mulai);
                    var waktu_selesai = new Date(response['jadwal'][i].waktu_selesai);
                    const months = ["Jan", "Feb", "Mar", "Apr", "Mei", "Jun", "Jul", "Agu", "Sep", "Okt", "Nov", "Des"];
                    var sekarang = new Date();
                    // kondisi jadwal
                    if (sekarang < waktu_mulai) {
                        var check = '';
                        var status_waktu = '<small><span class="badge bg-danger"><i class="fa fa-clock" aria-hidden="true"></i> Tahap Belum Mulai </span></small>';
                    } else if (sekarang >= waktu_mulai && sekarang <= waktu_selesai) {
                        var check = '';
                        var status_waktu = '<small><span class="badge bg-warning"><i class="fa fa-clock" aria-hidden="true"></i> Tahap Sedang Di Mulai </span></small>';
                    } else if (sekarang > waktu_selesai && sekarang <= waktu_selesai) {
                        var check = '<i class="fa fa-check text-success" aria-hidden="true"></i>';
                        var status_waktu = '<small><span class="badge bg-success"><i class="fa fa-clock" aria-hidden="true"></i> Tahap Sudah Selesai </span></small>';
                    } else {
                        var check = '<i class="fa fa-check text-success" aria-hidden="true"></i>';
                        var status_waktu = '<small><span class="badge bg-success"><i class="fa fa-clock" aria-hidden="true"></i> Tahap Sudah Selesai </span></small>';
                    }


                    if (response['jadwal'][i].alasan) {
                        var alasan = response['jadwal'][i].alasan
                    } else {
                        var alasan = ''
                    }

                    html += '<tr>' +
                        '<td><small>' + no++ + '</small></td>' +
                        '<td><small>' + response['jadwal'][i].nama_jadwal_rup + ' ' + check + '</small></td>' +
                        `<td><small>${waktu_mulai.getDate()}-${months[waktu_mulai.getMonth()]}-${waktu_mulai.getFullYear()} ${zeros(waktu_mulai.getHours())}:${zeros(waktu_mulai.getMinutes())}</small></td>` +
                        `<td><small>${waktu_selesai.getDate()}-${months[waktu_selesai.getMonth()]}-${waktu_selesai.getFullYear()} ${zeros(waktu_selesai.getHours())}:${zeros(waktu_mulai.getMinutes())}</small></td>` +
                        '<td>' + status_waktu + '</td>' +
                        '<td><small>' + alasan + '</small></td>' +
                        '</tr>';
                }
                $('#load_jadwal').html(html);



            }
        })
    }
</script>

<script>
    $(document).ready(function() {
        var get_data_tender_terbatas = $('[name="get_data_tender_terbatas"]').val();
        $('#tbl_tender_terbatas').DataTable({
            "ordering": true,
            "autoWidth": false,
            "processing": true,
            "serverSide": true,
            "bDestroy": true,
            "dom": 'Bfrtip',
            "buttons": ["excel", "pdf", "print", "colvis"],
            "order": [],
            "ajax": {
                "url": get_data_tender_terbatas,
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
        }).buttons().container().appendTo('#data_pengalaman_manajerial .col-md-6:eq(0)');
    });


    $(document).ready(function() {
        var get_data_tender_penunjukan_langsung = $('[name="get_data_tender_penunjukan_langsung"]').val();
        $('#tbl_tender_penunjukan_langsung').DataTable({
            "ordering": true,
            "autoWidth": false,
            "processing": true,
            "serverSide": true,
            "bDestroy": true,
            "dom": 'Bfrtip',
            "buttons": ["excel", "pdf", "print", "colvis"],
            "order": [],
            "ajax": {
                "url": get_data_tender_penunjukan_langsung,
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
        }).buttons().container().appendTo('#data_pengalaman_manajerial .col-md-6:eq(0)');
    });

    function reload_table() {
        $('#tbl_tender_terbatas').DataTable().ajax.reload();
        $('#tbl_tender_umum').DataTable().ajax.reload();
    }
</script>