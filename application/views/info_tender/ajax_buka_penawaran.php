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
                            reloadtable_dok_penawaran_file_I();
                            $('.btn-upload').attr("disabled", false);
                            upload_dok_file_1.modal('hide')
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

    $("#upload_dok_file_1").on('hide.bs.modal', function() {
        $('[name="type_post"]').val('tambah');
        $('[name="id_dokumen_pengadaan_vendor"]').val('');
        $('[name="nama_dokumen_pengadaan_vendor"]').val('');
        $('[name="tkdn_dokumen_pengadaan"]').val('');
        $('[name="persentase_tkdn_dokumen_pengadaan"]').val('');
        $('[name="file_dokumen_pengadaan_vendor"]').val('');
    });

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


    var form_upload_dok_penawaran_2 = $('#form_upload_dok_penawaran_2')
    form_upload_dok_penawaran_2.on('submit', function(e) {
        var dok_penawaran_harga = $('[name="dok_penawaran_harga"]').val();
        var tkdn_dokumen_penawaran_vendor = $('[name="tkdn_dokumen_penawaran_vendor"]').val();
        var persentase_tkdn_dokumen_penawaran_vendor = $('[name="persentase_tkdn_dokumen_penawaran_vendor"]').val();
        var nilai_penawaran_vendor = $('[name="nilai_penawaran_vendor"]').val();
        var upload_dok_file_2 = $('#upload_dok_file_2');
        if (dok_penawaran_harga == '') {
            e.preventDefault();
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Dokumen Wajib Di Isi!',
            })
        } else if (nilai_penawaran_vendor == '') {
            e.preventDefault();
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Nilai Penawaran Wajib Di Isi!',
            })
        } else if (tkdn_dokumen_penawaran_vendor == '') {
            e.preventDefault();
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'TKDN/PDN/IMPORT Wajib Di Isi!',
            })
        } else if (persentase_tkdn_dokumen_penawaran_vendor == '') {
            e.preventDefault();
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Nilai Persentase TKDN/PDN/IMPORT Wajib Di Isi!',
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
                            reloadtable_dok_penawaran_file_II();
                            $('.btn-upload').attr("disabled", false);
                            upload_dok_file_2.modal('hide')
                        }
                    }).then((result) => {
                        if (result.dismiss === Swal.DismissReason.timer) {

                        }
                    })
                }
            })
        }
    })

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
</script>