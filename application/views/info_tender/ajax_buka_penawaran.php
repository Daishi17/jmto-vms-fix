<script>
    // INI UNTUK DOKUMEN PENGADAAN FILE I
    var table_dok_penawaran_file_I = $('#table_dok_penawaran_file_I')
    $(document).ready(function() {
        var id_url_rup = $('[name="id_url_rup"]').val();
        var id_vendor = $('[name="id_vendor"]').val();
        table_dok_penawaran_file_I.DataTable({
            "ordering": true,
            "autoWidth": false,
            "processing": true,
            "serverSide": true,
            "bDestroy": true,
            "dom": 'Bfrtip',
            "buttons": ["excel", "pdf", "print", "colvis"],
            "order": [],
            "ajax": {
                "url": '<?= base_url('tender_diikuti/get_table_dok_penawaran_file_I') ?>',
                "type": "POST",
                data: {
                    id_vendor: id_vendor,
                    id_url_rup: id_url_rup
                }
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
        }).buttons().container().appendTo('#table_dok_penawaran_file_I .col-md-6:eq(0)');
    });

    function reloadtable_dok_penawaran_file_I() {
        table_dok_penawaran_file_I.DataTable().ajax.reload();
    }



    var form_upload_dok_penawaran_1 = $('#form_upload_dok_penawaran_1')
    form_upload_dok_penawaran_1.on('submit', function(e) {
        var file_dokumen_pengadaan_vendor = $('[name="file_dokumen_pengadaan_vendor"]').val();
        var upload_dok_file_1 = $('#upload_dok_file_1');
        if (file_dokumen_pengadaan_vendor == '') {
            e.preventDefault();
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Dokumen Wajib Di Isi!',
            })
        } else {
            e.preventDefault();
            $.ajax({
                url: '<?= base_url('tender_diikuti/upload_penawaran_1') ?>',
                method: "POST",
                data: new FormData(this),
                contentType: false,
                cache: false,
                processData: false,
                beforeSend: function() {
                    $('.btn-upload').attr("disabled", true);
                },
                success: function(response) {
                    let timerInterval
                    Swal.fire({
                        title: 'Sedang Proses Menyimpan Data!',
                        html: 'Membuat Data <b></b>',
                        timer: 3000,
                        timerProgressBar: true,
                        didOpen: () => {
                            Swal.showLoading()
                            const b = Swal.getHtmlContainer().querySelector('b')
                            timerInterval = setInterval(() => {}, 100)
                        },
                        willClose: () => {
                            clearInterval(timerInterval)
                            Swal.fire('Data Berhasil Di Simpan!', '', 'success')
                            // reloadtable_dok_penawaran_file_I();
                            $('.btn-upload').attr("disabled", false);
                            upload_dok_file_1.modal('hide')
                            get_mengikuti()
                            form_upload_dok_penawaran_1[0].reset()
                        }
                    }).then((result) => {
                        if (result.dismiss === Swal.DismissReason.timer) {

                        }
                    })
                }
            })
        }
    })

    var form_upload_dok_penawaran_2 = $('#form_upload_dok_penawaran_2')
    form_upload_dok_penawaran_2.on('submit', function(e) {
        var file_dokumen_pengadaan_vendor2 = $('#file_dokumen_pengadaan_vendor2').val();
        var upload_dok_file_2 = $('#upload_dok_file_2');
        if (!file_dokumen_pengadaan_vendor2) {
            e.preventDefault();
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Dokumen Wajib Di Isi!',
            })
        } else {
            e.preventDefault();
            $.ajax({
                url: '<?= base_url('tender_diikuti/upload_penawaran_2') ?>',
                method: "POST",
                data: new FormData(this),
                contentType: false,
                cache: false,
                processData: false,
                beforeSend: function() {
                    $('.btn-upload').attr("disabled", true);
                },
                success: function(response) {
                    let timerInterval
                    Swal.fire({
                        title: 'Sedang Proses Menyimpan Data!',
                        html: 'Membuat Data <b></b>',
                        timer: 3000,
                        timerProgressBar: true,
                        didOpen: () => {
                            Swal.showLoading()
                            const b = Swal.getHtmlContainer().querySelector('b')
                            timerInterval = setInterval(() => {}, 100)
                        },
                        willClose: () => {
                            clearInterval(timerInterval)
                            Swal.fire('Data Berhasil Di Simpan!', '', 'success')
                            // reloadtable_dok_penawaran_file_I();
                            $('.btn-upload').attr("disabled", false);
                            upload_dok_file_2.modal('hide')
                            get_mengikuti2()
                            get_mengikuti()
                            form_upload_dok_penawaran_2[0].reset()
                        }
                    }).then((result) => {
                        if (result.dismiss === Swal.DismissReason.timer) {

                        }
                    })
                }
            })
        }
    })


    var form_upload_dok_penawaran_2_dkh = $('#form_upload_dok_penawaran_2_dkh')
    form_upload_dok_penawaran_2_dkh.on('submit', function(e) {
        var file_dokumen_pengadaan_vendor2_dkh = $('#file_dokumen_pengadaan_vendor2_dkh').val();
        var upload_dok_file_2_dkh = $('#upload_dok_file_2_dkh');
        if (!file_dokumen_pengadaan_vendor2_dkh) {
            e.preventDefault();
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Dokumen Wajib Di Isi!',
            })
        } else {
            e.preventDefault();
            $.ajax({
                url: '<?= base_url('tender_diikuti/upload_penawaran_2') ?>',
                method: "POST",
                data: new FormData(this),
                contentType: false,
                cache: false,
                processData: false,
                beforeSend: function() {
                    $('.btn-upload').attr("disabled", true);
                },
                success: function(response) {
                    let timerInterval
                    Swal.fire({
                        title: 'Sedang Proses Menyimpan Data!',
                        html: 'Membuat Data <b></b>',
                        timer: 3000,
                        timerProgressBar: true,
                        didOpen: () => {
                            Swal.showLoading()
                            const b = Swal.getHtmlContainer().querySelector('b')
                            timerInterval = setInterval(() => {}, 100)
                        },
                        willClose: () => {
                            clearInterval(timerInterval)
                            Swal.fire('Data Berhasil Di Simpan!', '', 'success')
                            // reloadtable_dok_penawaran_file_I();
                            $('.btn-upload').attr("disabled", false);
                            upload_dok_file_2_dkh.modal('hide')
                            get_mengikuti2()
                            get_mengikuti()
                            form_upload_dok_penawaran_2[0].reset()
                        }
                    }).then((result) => {
                        if (result.dismiss === Swal.DismissReason.timer) {

                        }
                    })
                }
            })
        }
    })

    function by_id_dok_penawran_file_I(id_dokumen_pengadaan_vendor, type) {
        var id_vendor = $('[name="id_vendor"]').val();
        var id_url_rup = $('[name="id_url_rup"]').val();
        var upload_dok_file_1 = $('#upload_dok_file_1')
        $.ajax({
            type: "POST",
            url: '<?= base_url('tender_diikuti/get_by_id_dokumen_pengadaan_vendor') ?>',
            data: {
                id_dokumen_pengadaan_vendor: id_dokumen_pengadaan_vendor,
            },
            dataType: "JSON",
            success: function(response) {
                if (type == 'edit') {
                    upload_dok_file_1.modal('show');
                    $('[name="type_post"]').val('edit');
                    $('[name="id_dokumen_pengadaan_vendor"]').val(response['row_dokumen_pengadaan_vendor'].id_dokumen_pengadaan_vendor);
                    $('[name="nama_dokumen_pengadaan_vendor"]').val(response['row_dokumen_pengadaan_vendor'].nama_dokumen_pengadaan_vendor);
                    $('[name="tkdn_dokumen_pengadaan"]').val(response['row_dokumen_pengadaan_vendor'].tkdn_dokumen_pengadaan);
                    $('[name="persentase_tkdn_dokumen_pengadaan"]').val(response['row_dokumen_pengadaan_vendor'].persentase_tkdn_dokumen_pengadaan);
                    $('[name="file_dokumen_pengadaan_vendor"]').val(response['row_dokumen_pengadaan_vendor'].file_dokumen_pengadaan_vendor);
                } else {
                    Question_dok_pengadaan_file_I(response['row_dokumen_pengadaan_vendor'].id_dokumen_pengadaan_vendor, response['row_dokumen_pengadaan_vendor'].nama_dokumen_pengadaan_vendor)
                }
            }
        })
    }

    // $("#upload_dok_file_1").on('hide.bs.modal', function() {
    //     $('[name="type_post"]').val('tambah');
    //     $('[name="id_dokumen_pengadaan_vendor"]').val('');
    //     $('[name="nama_dokumen_pengadaan_vendor"]').val('');
    //     $('[name="tkdn_dokumen_pengadaan"]').val('');
    //     $('[name="persentase_tkdn_dokumen_pengadaan"]').val('');
    //     $('[name="file_dokumen_pengadaan_vendor"]').val('');
    // });

    function Question_dok_pengadaan_file_I(id_dokumen_pengadaan_vendor, nama) {
        Swal.fire({
            title: 'Apakah Anda Yakin Menghapus Data Ini ? ',
            text: nama,
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya',
            cancelButtonText: 'Batal!',
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    type: "POST",
                    url: '<?= base_url('tender_diikuti/hapus_dokumen_pengadaan_vendor') ?>',
                    data: {
                        id_dokumen_pengadaan_vendor: id_dokumen_pengadaan_vendor,
                    },
                    dataType: "JSON",
                    success: function(response) {
                        if (response == 'success') {
                            Swal.fire(
                                'Berhasil!',
                                'Dokumen Pengadaan  ' + nama + ' Berhasil Di Hapus!',
                                'success'
                            )
                            reloadtable_dok_penawaran_file_I();
                        }
                    }
                })

            }
        })
    }

    // INI UNTUK DOKUMEN PENGADAAN FILE I
    var table_dok_penawaran_file_II = $('#table_dok_penawaran_file_II')
    $(document).ready(function() {
        var id_rup = $('[name="id_rup"]').val();
        var id_vendor = $('[name="id_vendor"]').val();
        table_dok_penawaran_file_II.DataTable({
            "ordering": true,
            "autoWidth": false,
            "processing": true,
            "serverSide": true,
            "bDestroy": true,
            "dom": 'Bfrtip',
            "buttons": ["excel", "pdf", "print", "colvis"],
            "order": [],
            "ajax": {
                "url": '<?= base_url('tender_diikuti/get_table_dok_penawaran_file_II') ?>',
                "type": "POST",
                data: {
                    id_vendor: id_vendor,
                    id_rup: id_rup
                }
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
        }).buttons().container().appendTo('#table_dok_penawaran_file_II .col-md-6:eq(0)');
    });

    function reloadtable_dok_penawaran_file_II() {
        table_dok_penawaran_file_II.DataTable().ajax.reload();
    }


    $(".nilai_penawaran_vendor").keyup(function() {
        var harga = $(".nilai_penawaran_vendor").val();
        var tanpa_rupiah = document.getElementById('rupiah_nilai_penawaran_vendor');
        tanpa_rupiah.value = formatRupiah(this.value, 'Rp. ');
        /* Fungsi */
        function formatRupiah(angka, prefix) {
            var number_string = angka.replace(/[^,\d]/g, '').toString(),
                split = number_string.split(','),
                sisa = split[0].length % 3,
                rupiah = split[0].substr(0, sisa),
                ribuan = split[0].substr(sisa).match(/\d{3}/gi);

            if (ribuan) {
                separator = sisa ? '.' : '';
                rupiah += separator + ribuan.join('.');
            }

            rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
            return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
        }
    });

    $(document).on('keyup', '.number_only', function(e) {

        var regex = /[^\d.]|\.(?=.*\.)/g;
        var subst = "";

        var str = $(this).val();
        var result = str.replace(regex, subst);
        $(this).val(result);

    });

    get_mengikuti()

    function get_mengikuti() {
        var id_url_rup = $('[name="id_url_rup"]').val()
        $.ajax({
            type: "POST",
            url: '<?= base_url('tender_diikuti/get_mengikuti_penawaran') ?>',
            data: {
                id_url_rup: id_url_rup,
            },
            dataType: "JSON",
            success: function(response) {
                if (response['row']['file1_administrasi']) {
                    var file1_administrasi = `<a href="<?= base_url('tender_diikuti/download_dokumen_pengadaan_vendor/') ?>${response['row']['id_vendor_mengikuti_paket']}/file1_administrasi" target="_blank" class="btn btn-sm btn-success text-white"><i class="fa fa-file"></i> Buka</a>`
                    var btn_file1_administrasi = `<a href="javascript:;" onclick="upload_file1(${response['row']['id_vendor_mengikuti_paket']},'file1_administrasi')" class="btn btn-sm btn-warning text-white"><i class="fa fa-upload"></i> Ubah</a>`
                } else {
                    var file1_administrasi = `<span class="badge bg-danger">Tidak Ada Dokumen</span>`
                    var btn_file1_administrasi = `<a href="javascript:;" onclick="upload_file1(${response['row']['id_vendor_mengikuti_paket']},'file1_administrasi')" class="btn btn-sm btn-danger"><i class="fa fa-upload"></i> Upload</a>`
                }

                if (response['row']['file1_teknis']) {
                    var file1_teknis = `<a href="<?= base_url('tender_diikuti/download_dokumen_pengadaan_vendor/') ?>${response['row']['id_vendor_mengikuti_paket']}/file1_teknis" target="_blank" class="btn btn-sm btn-success text-white"><i class="fa fa-file"></i> Buka</a>`
                    var btn_file1_teknis = `<a href="javascript:;" onclick="upload_file1(${response['row']['id_vendor_mengikuti_paket']},'file1_teknis')" class="btn btn-sm btn-warning text-white"><i class="fa fa-upload"></i> Ubah</a>`
                } else {
                    var file1_teknis = `<span class="badge bg-danger">Tidak Ada Dokumen</span>`
                    var btn_file1_teknis = `<a href="javascript:;" onclick="upload_file1(${response['row']['id_vendor_mengikuti_paket']},'file1_teknis')" class="btn btn-sm btn-danger"><i class="fa fa-upload"></i> Upload</a>`
                }

                if (response['row']['file1_organisasi']) {
                    var file1_organisasi = `<a href="<?= base_url('tender_diikuti/download_dokumen_pengadaan_vendor/') ?>${response['row']['id_vendor_mengikuti_paket']}/file1_organisasi" target="_blank" class="btn btn-sm btn-success text-white"><i class="fa fa-file"></i> Buka</a>`
                    var btn_file1_organisasi = `<a href="javascript:;" onclick="upload_file1(${response['row']['id_vendor_mengikuti_paket']},'file1_organisasi')" class="btn btn-sm btn-warning text-white"><i class="fa fa-upload"></i> Ubah</a>`
                } else {
                    var file1_organisasi = `<span class="badge bg-danger">Tidak Ada Dokumen</span>`
                    var btn_file1_organisasi = `<a href="javascript:;" onclick="upload_file1(${response['row']['id_vendor_mengikuti_paket']},'file1_organisasi')" class="btn btn-sm btn-danger"><i class="fa fa-upload"></i> Upload</a>`
                }

                if (response['row']['file1_pabrikan']) {
                    var file1_pabrikan = `<a href="<?= base_url('tender_diikuti/download_dokumen_pengadaan_vendor/') ?>${response['row']['id_vendor_mengikuti_paket']}/file1_pabrikan" target="_blank" class="btn btn-sm btn-success text-white"><i class="fa fa-file"></i> Buka</a>`
                    var btn_file1_pabrikan = `<a href="javascript:;" onclick="upload_file1(${response['row']['id_vendor_mengikuti_paket']},'file1_pabrikan')" class="btn btn-sm btn-warning text-white"><i class="fa fa-upload"></i> Ubah</a>`
                } else {
                    var file1_pabrikan = `<span class="badge bg-danger">Tidak Ada Dokumen</span>`
                    var btn_file1_pabrikan = `<a href="javascript:;" onclick="upload_file1(${response['row']['id_vendor_mengikuti_paket']},'file1_pabrikan')" class="btn btn-sm btn-danger"><i class="fa fa-upload"></i> Upload</a>`
                }

                if (response['row']['file1_peralatan']) {
                    var file1_peralatan = `<a href="<?= base_url('tender_diikuti/download_dokumen_pengadaan_vendor/') ?>${response['row']['id_vendor_mengikuti_paket']}/file1_peralatan" target="_blank" class="btn btn-sm btn-success text-white"><i class="fa fa-file"></i> Buka</a>`
                    var btn_file1_peralatan = `<a href="javascript:;" onclick="upload_file1(${response['row']['id_vendor_mengikuti_paket']},'file1_peralatan')" class="btn btn-sm btn-warning text-white"><i class="fa fa-upload"></i> Ubah</a>`
                } else {
                    var file1_peralatan = `<span class="badge bg-danger">Tidak Ada Dokumen</span>`
                    var btn_file1_peralatan = `<a href="javascript:;" onclick="upload_file1(${response['row']['id_vendor_mengikuti_paket']},'file1_peralatan')" class="btn btn-sm btn-danger"><i class="fa fa-upload"></i> Upload</a>`
                }

                if (response['row']['file1_personil']) {
                    var file1_personil = `<a href="<?= base_url('tender_diikuti/download_dokumen_pengadaan_vendor/') ?>${response['row']['id_vendor_mengikuti_paket']}/file1_personil" target="_blank" class="btn btn-sm btn-success text-white"><i class="fa fa-file"></i> Buka</a>`
                    var btn_file1_personil = `<a href="javascript:;" onclick="upload_file1(${response['row']['id_vendor_mengikuti_paket']},'file1_personil')" class="btn btn-sm btn-warning text-white"><i class="fa fa-upload"></i> Ubah</a>`
                } else {
                    var file1_personil = `<span class="badge bg-danger">Tidak Ada Dokumen</span>`
                    var btn_file1_personil = `<a href="javascript:;" onclick="upload_file1(${response['row']['id_vendor_mengikuti_paket']},'file1_personil')" class="btn btn-sm btn-danger"><i class="fa fa-upload"></i> Upload</a>`
                }

                if (response['row']['file1_makalah_teknis']) {
                    var file1_makalah_teknis = `<a href="<?= base_url('tender_diikuti/download_dokumen_pengadaan_vendor/') ?>${response['row']['id_vendor_mengikuti_paket']}/file1_makalah_teknis" target="_blank" class="btn btn-sm btn-success text-white"><i class="fa fa-file"></i> Buka</a>`
                    var btn_file1_makalah_teknis = `<a href="javascript:;" onclick="upload_file1(${response['row']['id_vendor_mengikuti_paket']},'file1_makalah_teknis')" class="btn btn-sm btn-warning text-white"><i class="fa fa-upload"></i> Ubah</a>`
                } else {
                    var file1_makalah_teknis = `<span class="badge bg-danger">Tidak Ada Dokumen</span>`
                    var btn_file1_makalah_teknis = `<a href="javascript:;" onclick="upload_file1(${response['row']['id_vendor_mengikuti_paket']},'file1_makalah_teknis')" class="btn btn-sm btn-danger"><i class="fa fa-upload"></i> Upload</a>`
                }

                if (response['row']['file1_pra_rk3']) {
                    var file1_pra_rk3 = `<a href="<?= base_url('tender_diikuti/download_dokumen_pengadaan_vendor/') ?>${response['row']['id_vendor_mengikuti_paket']}/file1_pra_rk3" target="_blank" class="btn btn-sm btn-success text-white"><i class="fa fa-file"></i> Buka</a>`
                    var btn_file1_pra_rk3 = `<a href="javascript:;" onclick="upload_file1(${response['row']['id_vendor_mengikuti_paket']},'file1_pra_rk3')" class="btn btn-sm btn-warning text-white"><i class="fa fa-upload"></i> Ubah</a>`
                } else {
                    var file1_pra_rk3 = `<span class="badge bg-danger">Tidak Ada Dokumen</span>`
                    var btn_file1_pra_rk3 = `<a href="javascript:;" onclick="upload_file1(${response['row']['id_vendor_mengikuti_paket']},'file1_pra_rk3')" class="btn btn-sm btn-danger"><i class="fa fa-upload"></i> Upload</a>`
                }

                if (response['row']['file1_spek']) {
                    var file1_spek = `<a href="<?= base_url('tender_diikuti/download_dokumen_pengadaan_vendor/') ?>${response['row']['id_vendor_mengikuti_paket']}/file1_spek" target="_blank" class="btn btn-sm btn-success text-white"><i class="fa fa-file"></i> Buka</a>`
                    var btn_file1_spek = `<a href="javascript:;" onclick="upload_file1(${response['row']['id_vendor_mengikuti_paket']},'file1_spek')" class="btn btn-sm btn-warning text-white"><i class="fa fa-upload"></i> Ubah</a>`
                } else {
                    var file1_spek = `<span class="badge bg-danger">Tidak Ada Dokumen</span>`
                    var btn_file1_spek = `<a href="javascript:;" onclick="upload_file1(${response['row']['id_vendor_mengikuti_paket']},'file1_spek')" class="btn btn-sm btn-danger"><i class="fa fa-upload"></i> Upload</a>`
                }

                var html = '';
                if (response['rup']['id_jadwal_tender'] == 1 || response['rup']['id_jadwal_tender'] == 9) {
                    if (response['row']['file2_penawaran']) {
                        var file2_penawaran = `<a href="<?= base_url('tender_diikuti/download_dokumen_penawaran_vendor/') ?>${response['row']['id_vendor_mengikuti_paket']}/file2_penawaran" target="_blank" class="btn btn-sm btn-success text-white"><i class="fa fa-file"></i> Buka</a>`
                        var btn_file2_penawaran = `<a href="javascript:;" onclick="upload_file2(${response['row']['id_vendor_mengikuti_paket']},'file2_penawaran')" class="btn btn-sm btn-warning text-white"><i class="fa fa-upload"></i> Ubah</a>`
                    } else {
                        var file2_penawaran = `<span class="badge bg-danger">Tidak Ada Dokumen</span>`
                        var btn_file2_penawaran = `<a href="javascript:;" onclick="upload_file2(${response['row']['id_vendor_mengikuti_paket']},'file2_penawaran')" class="btn btn-sm btn-danger"><i class="fa fa-upload"></i> Upload</a>`
                    }

                    if (response['row']['file2_dkh']) {
                        var file2_dkh = `<a  href="<?= base_url('tender_diikuti/download_dokumen_penawaran_vendor/') ?>${response['row']['id_vendor_mengikuti_paket']}/file2_dkh" target="_blank" class="btn btn-sm btn-success text-white"><i class="fa fa-file"></i> Buka</a>`
                        var btn_file2_dkh = `<a href="javascript:;" onclick="upload_file2(${response['row']['id_vendor_mengikuti_paket']},'file2_dkh')" class="btn btn-sm btn-warning text-white"><i class="fa fa-upload"></i> Ubah</a>`
                    } else {
                        var file2_dkh = `<span class="badge bg-danger">Tidak Ada Dokumen</span>`
                        var btn_file2_dkh = `<a href="javascript:;" onclick="upload_file2_dkh(${response['row']['id_vendor_mengikuti_paket']},'file2_dkh')" class="btn btn-sm btn-danger"><i class="fa fa-upload"></i> Upload</a>`
                    }


                    if (response['row']['file2_tkdn']) {
                        var file2_tkdn = `<a  href="<?= base_url('tender_diikuti/download_dokumen_penawaran_vendor/') ?>${response['row']['id_vendor_mengikuti_paket']}/file2_tkdn" target="_blank" class="btn btn-sm btn-success text-white"><i class="fa fa-file"></i> Buka</a>`
                        var btn_file2_tkdn = `<a href="javascript:;" onclick="upload_file2(${response['row']['id_vendor_mengikuti_paket']},'file2_tkdn')" class="btn btn-sm btn-warning text-white"><i class="fa fa-upload"></i> Ubah</a>`
                    } else {
                        var file2_tkdn = `<span class="badge bg-danger">Tidak Ada Dokumen</span>`
                        var btn_file2_tkdn = `<a href="javascript:;" onclick="upload_file2_dkh(${response['row']['id_vendor_mengikuti_paket']},'file2_tkdn')" class="btn btn-sm btn-danger"><i class="fa fa-upload"></i> Upload</a>`
                    }

                    html += `<tr>
                            <td>1.&ensp;Dokumen Penawaran Administrasi</td>
                            <td>${file1_administrasi}</td>
                            <td>${btn_file1_administrasi}</td>
                        </tr>
                        <tr>
                            <td>2.&ensp;Dokumen Penawaran Teknis (Disesuaikan Dengan Dokumen IKP) : </td>
                            <td>${file1_teknis}</td>
                            <td>${btn_file1_teknis}</td>
                        </tr>
                        <tr>
                            <td>3.&ensp;Dokumen Penawaran Harga, Lampiran DKH dan Lampiran TKDN</td>
                            <td>${file2_penawaran}</td>
                            <td>${btn_file2_penawaran}</td>
                         </tr>
                         <tr>
                            <td>4.&ensp;Dokumen DKH (Wajib Format Excel)</td>
                            <td>${file2_dkh}</td>
                            <td>${btn_file2_dkh}</td>
                        </tr>
                        <tr>
                            <td>5.&ensp;File Lampiran TKDN (Wajib Format Excel)</td>
                            <td>${file2_tkdn}</td>
                            <td>${btn_file2_tkdn}</td>
                        </tr>
                        `
                    $('#load_dok_file1_statis').html(html)
                } else {
                    html += `<tr>
                            <td>1.&ensp;Dokumen Penawaran Administrasi</td>
                            <td>${file1_administrasi}</td>
                            <td>${btn_file1_administrasi}</td>
                        </tr>
                        <tr>
                            <td>2.&ensp;Dokumen Penawaran Teknis (Disesuaikan Dengan Dokumen IKP) : </td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>&ensp;&ensp; a. Struktur Organisasi</td>
                            <td>${file1_organisasi}</td>
                            <td>${btn_file1_organisasi}</td>
                        </tr>
                        <tr>
                            <td>&ensp;&ensp; b. Surat Dukungan Pabrikan / Dealer</td>
                            <td>${file1_pabrikan}</td>
                            <td>${btn_file1_pabrikan}</td>
                        </tr>
                        <tr>
                            <td>&ensp;&ensp; c. Data Peralatan Pendukung Pekerjaan</td>
                            <td>${file1_peralatan}</td>
                            <td>${btn_file1_peralatan}</td>
                        </tr>
                        <tr>
                            <td>&ensp;&ensp; d. CV Personil</td>
                            <td>${file1_personil}</td>
                            <td>${btn_file1_personil}</td>
                        </tr>
                        <tr>
                            <td>&ensp;&ensp; e. Makalah Teknis Pekerjaan</td>
                            <td>${file1_makalah_teknis}</td>
                            <td>${btn_file1_makalah_teknis}</td>
                        </tr>
                        <tr>
                            <td>&ensp;&ensp; f. Dokumen Pra RK3-K dan HIRADC</td>
                            <td>${file1_pra_rk3}</td>
                            <td>${btn_file1_pra_rk3}</td>
                        </tr>
                        <tr>
                            <td>&ensp;&ensp; g. Dokumen Spesifikasi Perangkat (Jika Dipersyaratkan)</td>
                            <td>${file1_spek}</td>
                            <td>${btn_file1_spek}</td>
                        </tr>`
                    $('#load_dok_file1_statis').html(html)
                }


            }

        })
    }

    function download_file1(id_vendor_mengikuti_paket, file1_administrasi) {
        location.href = url_download_pendirian + id_url;
    }

    get_mengikuti2()

    function get_mengikuti2() {
        var id_url_rup = $('[name="id_url_rup"]').val()
        $.ajax({
            type: "POST",
            url: '<?= base_url('tender_diikuti/get_mengikuti_penawaran') ?>',
            data: {
                id_url_rup: id_url_rup,
            },
            dataType: "JSON",
            success: function(response) {
                if (response['row']['file2_penawaran']) {
                    var file2_penawaran = `<a href="<?= base_url('tender_diikuti/download_dokumen_penawaran_vendor/') ?>${response['row']['id_vendor_mengikuti_paket']}/file2_penawaran" target="_blank" class="btn btn-sm btn-success text-white"><i class="fa fa-file"></i> Buka</a>`
                    var btn_file2_penawaran = `<a href="javascript:;" onclick="upload_file2(${response['row']['id_vendor_mengikuti_paket']},'file2_penawaran')" class="btn btn-sm btn-warning text-white"><i class="fa fa-upload"></i> Ubah</a>`
                } else {
                    var file2_penawaran = `<span class="badge bg-danger">Tidak Ada Dokumen</span>`
                    var btn_file2_penawaran = `<a href="javascript:;" onclick="upload_file2(${response['row']['id_vendor_mengikuti_paket']},'file2_penawaran')" class="btn btn-sm btn-danger"><i class="fa fa-upload"></i> Upload</a>`
                }

                if (response['row']['file2_dkh']) {
                    var file2_dkh = `<a  href="<?= base_url('tender_diikuti/download_dokumen_penawaran_vendor/') ?>${response['row']['id_vendor_mengikuti_paket']}/file2_dkh" target="_blank" class="btn btn-sm btn-success text-white"><i class="fa fa-file"></i> Buka</a>`
                    var btn_file2_dkh = `<a href="javascript:;" onclick="upload_file2_dkh(${response['row']['id_vendor_mengikuti_paket']},'file2_dkh')" class="btn btn-sm btn-warning text-white"><i class="fa fa-upload"></i> Ubah</a>`
                } else {
                    var file2_dkh = `<span class="badge bg-danger">Tidak Ada Dokumen</span>`
                    var btn_file2_dkh = `<a href="javascript:;" onclick="upload_file2_dkh(${response['row']['id_vendor_mengikuti_paket']},'file2_dkh')" class="btn btn-sm btn-danger"><i class="fa fa-upload"></i> Upload</a>`
                }

                if (response['row']['file2_tkdn']) {
                    var file2_tkdn = `<a  href="<?= base_url('tender_diikuti/download_dokumen_penawaran_vendor/') ?>${response['row']['id_vendor_mengikuti_paket']}/file2_tkdn" target="_blank" class="btn btn-sm btn-success text-white"><i class="fa fa-file"></i> Buka</a>`
                    var btn_file2_tkdn = `<a href="javascript:;" onclick="upload_file2(${response['row']['id_vendor_mengikuti_paket']},'file2_tkdn')" class="btn btn-sm btn-warning text-white"><i class="fa fa-upload"></i> Ubah</a>`
                } else {
                    var file2_tkdn = `<span class="badge bg-danger">Tidak Ada Dokumen</span>`
                    var btn_file2_tkdn = `<a href="javascript:;" onclick="upload_file2_dkh(${response['row']['id_vendor_mengikuti_paket']},'file2_tkdn')" class="btn btn-sm btn-danger"><i class="fa fa-upload"></i> Upload</a>`
                }

                var html2 = '';
                html2 += `<tr>
                            <td>1. Dokumen Penawaran Harga</td>
                            <td>${file2_penawaran}</td>
                            <td>${btn_file2_penawaran}</td>
                         </tr>
                         <tr>
                            <td>2. Dokumen DKH (Wajib Format Excel)</td>
                            <td>${file2_dkh}</td>
                            <td>${btn_file2_dkh}</td>
                        </tr>
                        <tr>
                            <td>3.&ensp;File Lampiran TKDN (Wajib Format Excel)</td>
                            <td>${file2_tkdn}</td>
                            <td>${btn_file2_tkdn}</td>
                        </tr>`
                $('#load_dok_file2_statis').html(html2)
            }

        })
    }

    function upload_file1(id_vendor_mengikuti_paket, type) {

        $('[name="id_vendor_mengikuti_paket"]').val(id_vendor_mengikuti_paket)
        $('[name="type_post"]').val(type)
        if (type == 'file1_administrasi') {
            $('[name="nama_dokumen"]').val('File Penawaran Administrasi')
        } else if (type == 'file1_teknis') {
            $('[name="nama_dokumen"]').val('File Penawaran Teknis')
        } else if (type == 'file1_organisasi') {
            $('[name="nama_dokumen"]').val('Struktur Organisasi')
        } else if (type == 'file1_pabrikan') {
            $('[name="nama_dokumen"]').val('Surat Dukungan Pabrikan / Dealer')
        } else if (type == 'file1_peralatan') {
            $('[name="nama_dokumen"]').val('Data Peralatan Pendukung Pekerjaan')
        } else if (type == 'file1_personil') {
            $('[name="nama_dokumen"]').val('CV Personil')
        } else if (type == 'file1_makalah_teknis') {
            $('[name="nama_dokumen"]').val('Makalah Teknis Pekerjaan')
        } else if (type == 'file1_pra_rk3') {
            $('[name="nama_dokumen"]').val('Dokumen Pra RK3-K dan HIRADC')
        } else if (type == 'file1_spek') {
            $('[name="nama_dokumen"]').val('Dokumen Spesifikasi Perangkat (Jika Dipersyaratkan)')
        }
        $('#upload_dok_file_1').modal('show')
    }

    function upload_file2(id_vendor_mengikuti_paket, type) {

        $('[name="id_vendor_mengikuti_paket"]').val(id_vendor_mengikuti_paket)
        $('[name="type_post"]').val(type)
        if (type == 'file2_penawaran') {
            $('[name="nama_dokumen"]').val('Dokumen Penawaran Harga')
        } else if (type == 'file2_dkh') {
            $('[name="nama_dokumen"]').val('File DKH')
        } else if (type == 'file2_tkdn') {
            $('[name="nama_dokumen"]').val('File TKDN')
        }
        $('#upload_dok_file_2').modal('show')
    }

    function upload_file2_dkh(id_vendor_mengikuti_paket, type) {

        $('[name="id_vendor_mengikuti_paket"]').val(id_vendor_mengikuti_paket)
        $('[name="type_post"]').val(type)
        if (type == 'file2_penawaran') {
            $('[name="nama_dokumen"]').val('Dokumen Penawaran Harga')
        } else if (type == 'file2_dkh') {
            $('[name="nama_dokumen"]').val('File DKH')
        } else if (type == 'file2_tkdn') {
            $('[name="nama_dokumen"]').val('File TKDN')
        }
        $('#upload_dok_file_2_dkh').modal('show')
    }
</script>