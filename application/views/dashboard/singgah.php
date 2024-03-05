if (!response['row_skdp']) {

} else {
if (response['row_skdp'].sts_validasi == null || response['row_skdp'].sts_validasi == 0) {
var tombol_validasi = '<a href="javascript:;" onclick="Valid_skdp(\'' + response['row_skdp'].id_url + '\')" class="btn btn-success btn-sm shadow-lg"><i class="fa-solid fa-square-check px-1"></i><small>Valid</small></a> ' +
'<a href="javascript:;" onclick="NonValid_skdp(\'' + response['row_skdp'].id_url + '\')" class="btn btn-danger btn-sm shadow-lg"><i class="fa-solid fa-rectangle-xmark px-1"></i><small>Tidak Valid</small></a>';
var sts_validasi = '<span class="badge bg-secondary">Belum Di Periksa</span>'
} else if (response['row_skdp'].sts_validasi == 1) {
var tombol_validasi = '<button href="javascript:;" class="btn btn-success btn-sm shadow-lg" disabled><i class="fa-solid fa-square-check px-1"></i><small>Valid</small></button> ' +
'<a href="javascript:;" onclick="NonValid_skdp(\'' + response['row_skdp'].id_url + '\')" class="btn btn-danger btn-sm shadow-lg"><i class="fa-solid fa-rectangle-xmark px-1"></i><small>Tidak Valid</small></a>';
var sts_validasi = '<span class="badge bg-success">Sudah Valid</span>'
} else if (response['row_skdp'].sts_validasi == 2) {
var tombol_validasi = '<a href="javascript:;" onclick="Valid_skdp(\'' + response['row_skdp'].id_url + '\')" class="btn btn-success btn-sm shadow-lg"><i class="fa-solid fa-square-check px-1"></i><small>Valid</small></a> ' +
'<a href="javascript:;" onclick="NonValid_skdp(\'' + response['row_skdp'].id_url + '\')" class="btn btn-danger btn-sm shadow-lg"><i class="fa-solid fa-rectangle-xmark px-1"></i><small>Tidak Valid</small></a>';
var sts_validasi = '<span class="badge bg-danger">Tidak Valid</span>'
} else if (response['row_skdp'].sts_validasi == 3) {
var tombol_validasi = '<a href="javascript:;" onclick="Valid_skdp(\'' + response['row_skdp'].id_url + '\')" class="btn btn-success btn-sm shadow-lg"><i class="fa-solid fa-square-check px-1"></i><small>Valid</small></a> ' +
'<a href="javascript:;" onclick="NonValid_skdp(\'' + response['row_skdp'].id_url + '\')" class="btn btn-danger btn-sm shadow-lg"><i class="fa-solid fa-rectangle-xmark px-1"></i><small>Tidak Valid</small></a>';
var sts_validasi = '<span class="badge bg-warning">Revisi</span>'
}
if (response['row_skdp'].tgl_periksa) {
var tgl_periksa = response['row_skdp'].tgl_periksa
} else {
var tgl_periksa = '-'
}

var html_skdp_rincian = ''
html_skdp_rincian += '<tr>' +
    '<td>' + response['row_skdp'].nomor_surat + '</td>' +
    '<td>' + sts_validasi + '</td>' +
    '<td>' + tgl_periksa + '</td>' +
    '</tr>';
$('#rincian_skdp').html(html_skdp_rincian);

}