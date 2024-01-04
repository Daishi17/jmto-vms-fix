<script>
    load_syarat_tambahan()

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
                    var times_mulai = new Date(response['jadwal'][i].waktu_mulai)
                    var times_selesai = new Date(response['jadwal'][i].waktu_selesai)

                    var month_mulai = times_mulai.getMonth();
                    var month_selesai = times_selesai.getMonth();
                    var m = ["Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember"];


                    // mulai
                    var time_mulai = times_mulai.toLocaleTimeString()
                    var tanggal_mulai = String(times_mulai.getDate()).padStart(2, '0');
                    var bulan_mulai = String(times_mulai.getMonth() + 1).padStart(2, '0');
                    var tahun_mulai = times_mulai.getFullYear()
                    var data_mulai = tanggal_mulai + ' ' + m[month_mulai] + ' ' + tahun_mulai + ' ' + time_mulai

                    // selesai
                    var time_selesai = times_selesai.toLocaleTimeString()
                    var tanggal_selesai = String(times_selesai.getDate()).padStart(2, '0');
                    var bulan_selesai = String(times_selesai.getMonth() + 1).padStart(2, '0');
                    var tahun_selesai = times_selesai.getFullYear()
                    var data_selesai = tanggal_selesai + ' ' + m[month_selesai] + ' ' + tahun_selesai + ' ' + time_selesai

                    var waktu_mulai = new Date();
                    var waktu_selesai = new Date(response['jadwal'][i].waktu_selesai);
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
                        '<td><small>' + data_mulai + '</small></td>' +
                        '<td><small>' + data_selesai + '</small></td>' +
                        '<td>' + status_waktu + '</td>' +
                        '<td>Panitia</td>' +
                        '<td>' + alasan + '</td>' +
                        '</tr>';
                }
                $('#load_jadwal').html(html);
            }
        })
    }

    function upload_syarat_tambahan(nama_persyaratan_tambahan) {
        var id_rup = $('[name="id_rup"]').val()
        $('#modal_syarat_tambahan').modal('show')
        $('#nama_syarat_tambahan').text(nama_persyaratan_tambahan)
        $('[name="nama_persyaratan_tambahan"]').val(nama_persyaratan_tambahan)

    }

    function load_syarat_tambahan() {
        var id_rup = $('[name="id_rup"]').val()
        var id_vendor = $('[name="id_vendor"]').val()
        var url_get_syarat_tambahan_vendor = $('[name="url_get_syarat_tambahan_vendor"]').val()
        $.ajax({
            type: "POST",
            url: url_get_syarat_tambahan_vendor,
            data: {
                id_rup: id_rup,
                id_vendor: id_vendor
            },
            dataType: "JSON",
            success: function(response) {
                var no = 1;
                var html = '';
                for (i = 0; i < response['syarat_tambahan'].length; i++) {
                    if (response['syarat_tambahan'][i].keterangan) {
                        var keterangan = response['syarat_tambahan'][i].keterangan
                    } else {
                        var keterangan = '-'
                    }

                    if (!response['syarat_tambahan'][i].status) {

                        var status_dicek = '<span class="badge bg-secondary">Belum Di Cek</span>'
                    } else {
                        if (response['syarat_tambahan'][i].status == 1) {
                            var status_dicek = '<span class="badge bg-success">Sudah Dievaluasi</span>'
                        } else {
                            var status_dicek = '<span class="badge bg-success">Sudah Dievaluasi</span>'
                        }
                    }
                    <?php if (date('Y-m-d H:i', strtotime($jadwal_upload_dokumen_prakualifikasi['waktu_selesai'])) >= date('Y-m-d H:i') || date('Y-m-d H:i', strtotime($jadwal_upload_dokumen_prakualifikasi['waktu_mulai'])) == date('Y-m-d H:i')) { ?>
                        <?php $date2 = $jadwal_upload_dokumen_prakualifikasi['waktu_selesai']; ?>
                        <?php if (date('Y-m-d H:i', strtotime($jadwal_upload_dokumen_prakualifikasi['waktu_mulai'])) >= date('Y-m-d H:i')) { ?>
                        <?php  } else if (date('Y-m-d H:i', strtotime($jadwal_upload_dokumen_prakualifikasi['waktu_selesai'])) >= date('Y-m-d H:i') || date('Y-m-d H:i', strtotime($jadwal_upload_dokumen_prakualifikasi['waktu_mulai']))  == date('Y-m-d H:i')) { ?>
                            html += '<tr>' +
                                '<td><small>' + no++ + '</small></td>' +
                                '<td><small>' + response['syarat_tambahan'][i].nama_syarat_tambahan + '</small></td>' +
                                '<td><a href="" target="_blank" onclick="download_file_syarat_tambahan(' + response['syarat_tambahan'][i].id_vendor_syarat_tambahan + ')" class="btn btn-sm btn-warning"><i class="fas fa fa-file"></i> Download File </a></td>' +
                                '<td><small>' + keterangan + '</small></td>' +
                                '<td><small>' + status_dicek + '</small></td>' +
                                '<td><a href="javascript:;"  onclick="delete_syarat_tambahan(\'' + response['syarat_tambahan'][i].id_vendor_syarat_tambahan + '\'' + ',' + '\'' + response['syarat_tambahan'][i].nama_syarat_tambahan + '\')" class="btn btn-sm btn-danger"><i class="fas fa fa-trash"></i> Hapus </a></td>' +
                                '</tr>';
                        <?php } else { ?>
                            html += '<tr>' +
                                '<td><small>' + no++ + '</small></td>' +
                                '<td><small>' + response['syarat_tambahan'][i].nama_syarat_tambahan + '</small></td>' +
                                '<td><a href="" target="_blank" onclick="download_file_syarat_tambahan(' + response['syarat_tambahan'][i].id_vendor_syarat_tambahan + ')" class="btn btn-sm btn-warning"><i class="fas fa fa-file"></i> Download File </a></td>' +
                                '<td><small>' + keterangan + '</small></td>' +
                                '<td><small>' + status_dicek + '</small></td>' +
                                '<td><a href="javascript:;" class="btn btn-sm btn-danger"><i class="fas fa fa-secondary"></i> Tahap Sudah Selesai </a></td>' +
                                '</tr>';
                        <?php  } ?>
                    <?php } else { ?>
                        <?php if (date('Y-m-d H:i', strtotime($jadwal_upload_dokumen_prakualifikasi['waktu_mulai']))  >= date('Y-m-d H:i')) { ?>
                        <?php  } else if (date('Y-m-d H:i', strtotime($jadwal_upload_dokumen_prakualifikasi['waktu_selesai'])) >= date('Y-m-d H:i') || date('Y-m-d H:i', strtotime($jadwal_upload_dokumen_prakualifikasi['waktu_mulai'])) == date('Y-m-d H:i')) { ?>
                            html += '<tr>' +
                                '<td><small>' + no++ + '</small></td>' +
                                '<td><small>' + response['syarat_tambahan'][i].nama_syarat_tambahan + '</small></td>' +
                                '<td><a href="" target="_blank" onclick="download_file_syarat_tambahan(' + response['syarat_tambahan'][i].id_vendor_syarat_tambahan + ')" class="btn btn-sm btn-warning"><i class="fas fa fa-file"></i> Download File </a></td>' +
                                '<td><small>' + keterangan + '</small></td>' +
                                '<td><small>' + status_dicek + '</small></td>' +
                                '<td><a href="javascript:;"  onclick="delete_syarat_tambahan(\'' + response['syarat_tambahan'][i].id_vendor_syarat_tambahan + '\'' + ',' + '\'' + response['syarat_tambahan'][i].nama_syarat_tambahan + '\')" class="btn btn-sm btn-danger"><i class="fas fa fa-trash"></i> Hapus </a></td>' +
                                '</tr>';
                        <?php  } else { ?>
                            html += '<tr>' +
                                '<td><small>' + no++ + '</small></td>' +
                                '<td><small>' + response['syarat_tambahan'][i].nama_syarat_tambahan + '</small></td>' +
                                '<td><a href="" target="_blank" onclick="download_file_syarat_tambahan(' + response['syarat_tambahan'][i].id_vendor_syarat_tambahan + ')" class="btn btn-sm btn-warning"><i class="fas fa fa-file"></i> Download File </a></td>' +
                                '<td><small>' + keterangan + '</small></td>' +
                                '<td><small>' + status_dicek + '</small></td>' +
                                '<td><a href="javascript:;" class="btn btn-sm btn-danger"><i class="fas fa fa-secondary"></i> Tahap Sudah Selesai </a></td>' +
                                '</tr>';
                        <?php  } ?>
                    <?php } ?>
                }
                $('#load_syarat_tambahan_vendor').html(html);
            }
        })
    }

    function delete_syarat_tambahan(id_vendor_syarat_tambahan, nama_syarat_tambahan) {
        var url_hapus_persyaratan_tambahan = $('[name="url_hapus_persyaratan_tambahan"]').val()
        Swal.fire({
            title: 'Apakah Anda Yakin Ingin Menghapus Persyaratan Tambahan ' + nama_syarat_tambahan + '?',
            text: 'Peringatan! Data Yang Sudah Di Hapus Tidak Dapat Di Kembalikan Lagi! ',
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
                    url: url_hapus_persyaratan_tambahan,
                    data: {
                        id_vendor_syarat_tambahan: id_vendor_syarat_tambahan,
                    },
                    dataType: "JSON",
                    success: function(response) {
                        if (response == 'success') {
                            Swal.fire(
                                'Berhasil!',
                                'Data Berhasil Di Hapus!',
                                'success'
                            )
                            $('#modal_syarat_tambahan').modal('hide')
                            load_syarat_tambahan()
                        }
                    }
                })

            }
        })
    }

    function download_file_syarat_tambahan(id_syarat_tambahan) {

        var url_download_syarat_tambahan = $('[name="url_download_syarat_tambahan"]').val()

        window.open(url_download_syarat_tambahan + id_syarat_tambahan, '_blank');
    }

    var form_perysaratan_tambahan = $('#form_perysaratan_tambahan')
    form_perysaratan_tambahan.on('submit', function(e) {
        var url_upload_syarat_tambahan = $('[name="url_upload_syarat_tambahan"]').val();
        var file_syarat_tambahan = $('[name="file_syarat_tambahan"]').val();
        if (file_syarat_tambahan == '') {
            e.preventDefault();
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Dokumen Wajib Di Isi!',
            })
        } else {
            e.preventDefault();
            $.ajax({
                url: url_upload_syarat_tambahan,
                method: "POST",
                data: new FormData(this),
                contentType: false,
                cache: false,
                processData: false,
                beforeSend: function() {
                    $('.btn-syarat-tambahan').attr("disabled", true);
                },
                success: function(response) {
                    let timerInterval
                    Swal.fire({
                        title: 'Sedang Proses Menyimpan Data!',
                        html: 'Membuat Data <b></b>',
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
                            Swal.fire('Data Berhasil Di Simpan!', '', 'success')
                            $('#modal_syarat_tambahan').modal('hide')
                            form_perysaratan_tambahan[0].reset()
                            load_syarat_tambahan()
                            $('.btn-syarat-tambahan').attr("disabled", false);
                        }
                    }).then((result) => {
                        /* Read more about handling dismissals below */
                        if (result.dismiss === Swal.DismissReason.timer) {

                        }
                    })
                }
            })
        }
    })

    // upload sanggahan prakualifikasi
    var form_sanggahan_prakualifikasi = $('#form_sanggahan_prakualifikasi')
    form_sanggahan_prakualifikasi.on('submit', function(e) {
        var url_upload_sanggahan_pra = $('[name="url_upload_sanggahan_pra"]').val();
        var file_sanggah_pra = $('[name="file_sanggah_pra"]').val();
        if (file_sanggah_pra == '') {
            e.preventDefault();
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Dokumen Wajib Di Isi!',
            })
        } else {
            e.preventDefault();
            $.ajax({
                url: url_upload_sanggahan_pra,
                method: "POST",
                data: new FormData(this),
                contentType: false,
                cache: false,
                processData: false,
                beforeSend: function() {
                    $('.btn-sanggah').attr("disabled", true);
                },
                success: function(response) {
                    let timerInterval
                    Swal.fire({
                        title: 'Sedang Proses Menyimpan Data!',
                        html: 'Membuat Data <b></b>',
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
                            Swal.fire('Data Berhasil Di Simpan!', '', 'success')
                            $('#modal_sanggahan_prakualifikasi').modal('hide')
                            form_sanggahan_prakualifikasi[0].reset()
                            load_dok_sanggahan_pra()
                            $('.btn-sanggah').attr("disabled", false);
                        }
                    }).then((result) => {
                        /* Read more about handling dismissals below */
                        if (result.dismiss === Swal.DismissReason.timer) {

                        }
                    })
                }
            })
        }
    })
    load_dok_sanggahan_pra()

    function load_dok_sanggahan_pra() {
        var id_rup = $('[name="id_rup"]').val()
        var id_vendor = $('[name="id_vendor"]').val()
        var url_get_sanggahan_pra = $('[name="url_get_sanggahan_pra"]').val()
        var url_open_sanggahan_pra = $('[name="url_open_sanggahan_pra"]').val()
        var url_open_sanggahan_pra_panitia = $('[name="url_open_sanggahan_pra_panitia"]').val()
        $.ajax({
            type: "POST",
            url: url_get_sanggahan_pra,
            data: {
                id_rup: id_rup,
                id_vendor: id_vendor
            },
            dataType: "JSON",
            success: function(response) {
                var no = 1;
                var html = '';
                for (i = 0; i < response['row_sanggahan_pra'].length; i++) {
                    if (response['row_sanggahan_pra'][i].ket_sanggah_pra) {
                        var ket_sanggah_pra = response['row_sanggahan_pra'][i].ket_sanggah_pra
                    } else {
                        var ket_sanggah_pra = '-'
                    }

                    if (response['row_sanggahan_pra'][i].file_sanggah_pra) {
                        var file_sanggah_pra = '<a target="_blank" href="' + url_open_sanggahan_pra + response['row_sanggahan_pra'][i].file_sanggah_pra + '"><img src="<?= base_url('assets/img/pdf.png') ?>" alt="File Sanggah" width="30px"></a>'
                    } else {
                        var file_sanggah_pra = '<span class="badge bg-secondary">Tidak Ada File</span>'
                    }

                    if (response['row_sanggahan_pra'][i].ket_sanggah_pra_panitia) {
                        var ket_sanggah_pra_panitia = response['row_sanggahan_pra'][i].ket_sanggah_pra_panitia
                    } else {
                        var ket_sanggah_pra_panitia = '-'
                    }

                    if (response['row_sanggahan_pra'][i].file_sanggah_pra_panitia) {
                        var file_sanggah_pra_panitia = '<a target="_blank" href="' + url_open_sanggahan_pra_panitia + 'SANGGAHAN_PRAKUALIFIKASI/' + response['row_sanggahan_pra'][i].file_sanggah_pra_panitia + '"><img src="<?= base_url('assets/img/pdf.png') ?>" alt="File Sanggah" width="30px"></a>'
                    } else {
                        var file_sanggah_pra_panitia = '<span class="badge bg-secondary">Tidak Ada File</span>'
                    }
                    html += '<tr>' +
                        '<td><small>' + response['row_sanggahan_pra'][i].nama_usaha + '</small></td>' +
                        '<td><small>' + ket_sanggah_pra + '</small></td>' +
                        '<td><small>' + file_sanggah_pra + '</small></td>' +
                        '<td><small>' + ket_sanggah_pra_panitia + '</small></td>' +
                        '<td><small>' + file_sanggah_pra_panitia + '</small></td>' +
                        '<td><a href="javascript:;"  onclick="delete_sanggah_pra(\'' + response['row_sanggahan_pra'][i].id_sanggah_pra_detail + '\')" class="btn btn-sm btn-danger"><i class="fas fa fa-trash"></i> Hapus </a></td>' +
                        '</tr>';
                    '</tr>';
                    $('#tbl_sanggah_pra').html(html);
                }
            }
        })
    }

    function delete_sanggah_pra(id_sanggah_pra_detail) {
        var url_hapus_sanggahan_pra = $('[name="url_hapus_sanggahan_pra"]').val()
        Swal.fire({
            title: 'Apakah Anda Yakin Ingin Batalkan Sanggahan Prakualifikasi?',
            text: 'Peringatan! Data Yang Sudah Di Hapus Tidak Dapat Di Kembalikan Lagi! ',
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
                    url: url_hapus_sanggahan_pra,
                    data: {
                        id_sanggah_pra_detail: id_sanggah_pra_detail,
                    },
                    dataType: "JSON",
                    success: function(response) {
                        if (response == 'success') {
                            Swal.fire(
                                'Berhasil!',
                                'Sanggahan Prakualifikasi Berhasil Di Batalkan!',
                                'success'
                            )
                            load_dok_sanggahan_pra()
                        }
                    }
                })

            }
        })
    }

    // upload sanggahan akhir
    var form_sanggahan_akhir = $('#form_sanggahan_akhir')
    form_sanggahan_akhir.on('submit', function(e) {
        var url_upload_sanggahan_akhir = $('[name="url_upload_sanggahan_akhir"]').val();
        var file_sanggah_akhir = $('[name="file_sanggah_akhir"]').val();
        if (file_sanggah_akhir == '') {
            e.preventDefault();
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Dokumen Wajib Di Isi!',
            })
        } else {
            e.preventDefault();
            $.ajax({
                url: url_upload_sanggahan_akhir,
                method: "POST",
                data: new FormData(this),
                contentType: false,
                cache: false,
                processData: false,
                beforeSend: function() {
                    $('.btn-sanggah-akhir').attr("disabled", true);
                },
                success: function(response) {
                    let timerInterval
                    Swal.fire({
                        title: 'Sedang Proses Menyimpan Data!',
                        html: 'Membuat Data <b></b>',
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
                            Swal.fire('Data Berhasil Di Simpan!', '', 'success')
                            $('#modal_sanggahan_akhir').modal('hide')
                            form_sanggahan_akhir[0].reset()
                            load_dok_sanggahan_akhir()
                            $('.btn-sanggah-akhir').attr("disabled", false);
                        }
                    }).then((result) => {
                        /* Read more about handling dismissals below */
                        if (result.dismiss === Swal.DismissReason.timer) {

                        }
                    })
                }
            })
        }
    })

    load_dok_sanggahan_akhir()

    function load_dok_sanggahan_akhir() {
        var id_rup = $('[name="id_rup"]').val()
        var id_vendor = $('[name="id_vendor"]').val()
        var url_get_sanggahan_akhir = $('[name="url_get_sanggahan_akhir"]').val()
        var url_open_sanggahan_akhir = $('[name="url_open_sanggahan_akhir"]').val()
        var url_open_sanggahan_akhir_panitia = $('[name="url_open_sanggahan_akhir_panitia"]').val()
        $.ajax({
            type: "POST",
            url: url_get_sanggahan_akhir,
            data: {
                id_rup: id_rup,
                id_vendor: id_vendor
            },
            dataType: "JSON",
            success: function(response) {
                var html = '';
                if (response['row_sanggahan_akhir'].ket_sanggah_akhir) {
                    var ket_sanggah_akhir = response['row_sanggahan_akhir'].ket_sanggah_akhir
                } else {
                    var ket_sanggah_akhir = '-'
                }

                if (response['row_sanggahan_akhir'].file_sanggah_akhir) {
                    var file_sanggah_akhir = '<a target="_blank" href="' + url_open_sanggahan_akhir + response['row_sanggahan_akhir'].file_sanggah_akhir + '"><img src="<?= base_url('assets/img/pdf.png') ?>" alt="File Sanggah" width="30px"></a>'
                } else {
                    var file_sanggah_akhir = '<span class="badge bg-secondary">Tidak Ada File</span>'
                }

                if (response['row_sanggahan_akhir'].ket_sanggah_akhir_panitia) {
                    var ket_sanggah_akhir_panitia = response['row_sanggahan_akhir'].ket_sanggah_akhir_panitia
                } else {
                    var ket_sanggah_akhir_panitia = '-'
                }

                if (response['row_sanggahan_akhir'].file_sanggah_akhir_panitia) {
                    var file_sanggah_akhir_panitia = '<a target="_blank" href="' + url_open_sanggahan_akhir_panitia + 'SANGGAHAN_AKHIR/' + response['row_sanggahan_akhir'].file_sanggah_akhir_panitia + '"><img src="<?= base_url('assets/img/pdf.png') ?>" alt="File Sanggah" width="30px"></a>'
                } else {
                    var file_sanggah_akhir_panitia = '<span class="badge bg-secondary">Tidak Ada File</span>'
                }

                html += '<tr>' +
                    '<td><small>' + response['row_sanggahan_akhir'].nama_usaha + '</small></td>' +
                    '<td><small>' + ket_sanggah_akhir + '</small></td>' +
                    '<td><small>' + file_sanggah_akhir + '</small></td>' +
                    '<td><small>' + ket_sanggah_akhir_panitia + '</small></td>' +
                    '<td><small>' + file_sanggah_akhir_panitia + '</small></td>' +
                    '<td><a href="javascript:;"  onclick="delete_sanggah_akhir(\'' + response['row_sanggahan_akhir'].id_vendor_mengikuti_paket + '\')" class="btn btn-sm btn-danger"><i class="fas fa fa-trash"></i> Hapus </a></td>' +
                    '</tr>';
                '</tr>';
                $('#tbl_sanggah_akhir').html(html);
            }
        })
    }

    function delete_sanggah_akhir(id_vendor_mengikuti_paket) {
        var url_hapus_sanggahan_akhir = $('[name="url_hapus_sanggahan_akhir"]').val()
        Swal.fire({
            title: 'Apakah Anda Yakin Ingin Batalkan Sanggahan akhir?',
            text: 'Peringatan! Data Yang Sudah Di Hapus Tidak Dapat Di Kembalikan Lagi! ',
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
                    url: url_hapus_sanggahan_akhir,
                    data: {
                        id_vendor_mengikuti_paket: id_vendor_mengikuti_paket,
                    },
                    dataType: "JSON",
                    success: function(response) {
                        if (response == 'success') {
                            Swal.fire(
                                'Berhasil!',
                                'Sanggahan akhir Berhasil Di Batalkan!',
                                'success'
                            )
                            load_dok_sanggahan_akhir()
                        }
                    }
                })

            }
        })
    }
</script>

<script>
    function buka_penawaran(id_url_rup) {
        var token_syalala = $('[name="token_"]').val()
        var url_buka_penawaran = $('[name="url_buka_penawaran"]').val()
        var url_buka_penawaran_token = $('[name="url_buka_penawaran_token"]').val()
        if (token_syalala == '') {
            Swal.fire('Harap Isi Token Anda!', '', 'warning')
        } else {
            $.ajax({
                type: "POST",
                url: url_buka_penawaran,
                data: {
                    id_url_rup: id_url_rup,
                    token_syalala: token_syalala,
                },
                dataType: "JSON",
                beforeSend: function() {
                    $('.btn_buka_penawaran').attr("disabled", true);
                },
                success: function(response) {
                    if (response == 'success') {
                        Swal.fire('Token Valid!', '', 'success')
                        setTimeout(() => {
                            $('.btn_buka_penawaran').attr("disabled", false);
                            window.open(url_buka_penawaran_token + id_url_rup, '_blank');
                        }, 2000);
                    } else {
                        Swal.fire('Token Anda Tidak Valid!', '', 'warning')
                        $('.btn_buka_penawaran').attr("disabled", false);
                    }
                }
            })
        }
    }

    function Kirim_pengumuman(id_url_rup) {
        var token_syalala = $('[name="token_syalala"]').val()
        var url_kirim_pengumuman = $('[name="url_kirim_pengumuman"]').val()
        $.ajax({
            type: "POST",
            url: url_kirim_pengumuman,
            data: {
                id_url_rup: id_url_rup,
            },
            dataType: "JSON",
            beforeSend: function() {
                $('.btn_kirim_pengumuman').attr("disabled", true);
            },
            success: function(response) {
                if (response == 'success') {
                    Swal.fire({
                        title: 'Sedang Proses Menyimpan Data!',
                        html: 'Proses Data <b></b>',
                        timer: 1000,
                        timerProgressBar: true,
                        didOpen: () => {
                            Swal.showLoading()
                            const b = Swal.getHtmlContainer().querySelector('b')
                            timerInterval = setInterval(() => {
                                // b.textContent = Swal.getTimerRight()
                            }, 100)
                        },
                        willClose: () => {
                            Swal.fire('Token Valid!', '', 'success')
                            setTimeout(() => {
                                $('.btn_kirim_pengumuman').attr("disabled", false);
                            }, 2000);

                        }
                    }).then((result) => {
                        /* Read more about handling dismissals below */
                        if (result.dismiss === Swal.DismissReason.timer) {

                        }
                    })
                } else {
                    Swal.fire('Token Anda Tidak Valid!', '', 'warning')
                    $('.btn_kirim_pengumuman').attr("disabled", false);
                }
            }
        })
    }

    load_negosiasi()

    function load_negosiasi() {
        var id_rup = $('[name="id_rup"]').val()
        var id_vendor = $('[name="id_vendor"]').val()
        var url_get_sanggahan_akhir = $('[name="url_get_sanggahan_akhir"]').val()
        $.ajax({
            type: "POST",
            url: url_get_sanggahan_akhir,
            data: {
                id_rup: id_rup,
                id_vendor: id_vendor
            },
            dataType: "JSON",
            success: function(response) {
                var html = '';
                if (response['row_sanggahan_akhir'].tanggal_negosiasi) {
                    var tanggal_negosiasi = response['row_sanggahan_akhir'].tanggal_negosiasi
                } else {
                    var tanggal_negosiasi = '<span class="badge bg-secondary">Belum Ada Tanggal Meet Negosiasi</span>'
                }

                if (response['row_sanggahan_akhir'].link_negosiasi) {
                    var link_negosiasi = response['row_sanggahan_akhir'].link_negosiasi
                } else {
                    var link_negosiasi = '<span class="badge bg-secondary">Belum Ada Link Meet Negosiasi</span>'
                }
                html += '<tr>' +
                    '<td><small>1</small></td>' +
                    '<td><small>' + response['row_sanggahan_akhir'].nama_usaha + '</small></td>' +
                    '<td>' + tanggal_negosiasi + '</td>' +
                    '<td>' + link_negosiasi + '</td>' +
                    '</tr>';
                '</tr>';
                $('#tbl_negosiasi').html(html);
            }
        })
    }

    function kirim_token_ke_wa(id_url_rup) {
        var url_dapatkan_token_penawaran = $('[name="url_dapatkan_token_penawaran"]').val()
        $.ajax({
            type: "POST",
            url: url_dapatkan_token_penawaran,
            dataType: "JSON",
            data: {
                id_url_rup: id_url_rup
            },
            beforeSend: function() {
                $('.btn_dapatkan_token').attr("disabled", true);
            },
            success: function(response) {
                if (response == 'success') {
                    Swal.fire('Token Berhasil Dikirim Ke Whatsapp Anda!', '', 'success')
                    $('.btn_dapatkan_token').attr("disabled", false);
                } else {
                    Swal.fire('Token Gagal Dikirim Ke Whatsapp Anda!', '', 'warning')
                    $('.btn_dapatkan_token').attr("disabled", false);
                }
            }
        })
    }

    function Cek_token() {
        var token_ = $('[name="token_"]').val()
        if (token_ == '') {
            $('.btn_buka_penawaran').css('display', 'none');
            $('.btn_dapatkan_token').css('display', 'block');
        } else {
            $('.btn_buka_penawaran').css('display', 'block');
            $('.btn_dapatkan_token').css('display', 'none');
        }
    }

    function load_dok_file1_statis() {

    }
</script>

<script>
    function modal_lihat_keterangan_dokumen_perubahan(keterangan_perubahan_dokumen) {
        $('[name="keterangan_perubahan_dokumen"]').val(keterangan_perubahan_dokumen)
        var modal_lihat_keterangan_dokumen_perubahan = $('#modal_lihat_keterangan_dokumen_perubahan');
        modal_lihat_keterangan_dokumen_perubahan.modal('show');
    }
</script>

<script>
    var form_presentasi_teknis_tender = $('#form_presentasi_teknis_tender')
    form_presentasi_teknis_tender.on('submit', function(e) {
        var ba_presentasi_teknis = $('[name="ba_presentasi_teknis"]').val();
        if (ba_presentasi_teknis == '') {
            e.preventDefault();
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Dokumen Wajib Di Isi!',
            })
        } else {
            e.preventDefault();
            $.ajax({
                url: '<?= base_url('tender_diikuti/simpan_ba_presentasi_teknis/') ?>',
                method: "POST",
                data: new FormData(this),
                contentType: false,
                cache: false,
                processData: false,
                success: function(response) {
                    let timerInterval
                    Swal.fire({
                        title: 'Sedang Proses Menyimpan Data!',
                        html: 'Membuat Data <b></b>',
                        timer: 2000,
                        timerProgressBar: true,
                        didOpen: () => {
                            Swal.showLoading()
                            const b = Swal.getHtmlContainer().querySelector('b')
                            timerInterval = setInterval(() => {
                                // b.textContent = Swal.getTimerRight()
                            }, 1500)
                        },
                        willClose: () => {
                            clearInterval(timerInterval)
                            Swal.fire('Data Berhasil Di Simpan!', '', 'success')
                            $('#upload_presentasi_teknis').modal('hide')
                            form_presentasi_teknis_tender[0].reset()
                            setTimeout(() => {
                                location.reload()
                            }, 1000);
                        }
                    }).then((result) => {
                        /* Read more about handling dismissals below */
                        if (result.dismiss === Swal.DismissReason.timer) {

                        }
                    })
                }
            })
        }
    })
</script>