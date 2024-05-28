<?php
defined('BASEPATH') or exit('No direct script access allowed');
date_default_timezone_set("Asia/Jakarta");
// error_reporting(0);
class Dokumen extends CI_Controller
{
    var $link_dok = 'https://eprocurement.jmto.co.id/file_paket/';
    public function __construct()
    {


        parent::__construct();
        $nama_jabatan_ba_nego = $this->session->userdata('id_vendor');
        $this->load->model('M_dashboard/M_dashboard');
        $this->load->model('M_jenis_usaha/M_jenis_usaha');
        $this->load->model('Wilayah/Wilayah_model');
        $this->load->model('M_dashboard/M_dashboard');
        $this->load->model('M_monitoring/M_monitoring');
        $this->load->model('M_tender/M_tender');
        $this->load->model('M_tender/M_count');
        $this->load->model('M_jadwal/M_jadwal');
        $this->load->helper('download');
        // if (!$id_vendor) {
        //     redirect('auth');
        // }
        // redirect('page_kosong/page_konstruksi');
    }

    public function lihat_undangan_pembuktian($id_url_rup)
    {
        $data['rup'] = $this->M_tender->get_row_rup($id_url_rup);
        $data['mengikuti'] = $this->M_tender->cek_mengikuti($data['rup']['id_rup']);
        $data['peserta'] = $this->M_tender->peserta($data['rup']['id_rup']);
        $this->load->view('info_tender/undangan_pembuktian', $data);
    }

    public function lihat_pengumuman_hasil_kualifikasi($id_url_rup)
    {
        $data['rup'] = $this->M_tender->get_row_rup($id_url_rup);
        $data['mengikuti'] = $this->M_tender->cek_mengikuti($data['rup']['id_rup']);
        $data['peserta'] = $this->M_tender->peserta($data['rup']['id_rup']);
        $data['hitung_syarat'] = $this->M_tender->hitung_total_syarat($data['rup']['id_rup']);
        $data['data_evaluasi'] = $this->M_tender->data_evaluasi($data['rup']['id_rup']);
        $data['peserta_tender_pq_lolos'] = $this->M_tender->get_peserta_tender_ba_pra_lolos($data['rup']['id_rup']);

        if ($data['rup']['id_jadwal_tender'] == 5) {
            $data['jadwal_pengumuman_pengadaan'] =  $this->M_jadwal->jadwal_pra_umum_1($data['rup']['id_rup']);
            $data['jadwal_dokumen_kualifikasi'] =  $this->M_jadwal->jadwal_pra_umum_2($data['rup']['id_rup']);
            $data['jadwal_aanwijzing_pq'] =  $this->M_jadwal->jadwal_pra_umum_3($data['rup']['id_rup']);
            $data['jadwal_upload_dokumen_prakualifikasi'] =  $this->M_jadwal->jadwal_pra_umum_4($data['rup']['id_rup']);
            $data['jadwal_pembuktian_kualifikasi'] =  $this->M_jadwal->jadwal_pra_umum_5($data['rup']['id_rup']);
            $data['jadwal_evaluasi_dokumen_kualifikasi'] =  $this->M_jadwal->jadwal_pra_umum_6($data['rup']['id_rup']);
            $data['jadwal_penetapan_hasil_kualifikasi'] =  $this->M_jadwal->jadwal_pra_umum_7($data['rup']['id_rup']);
            $data['jadwal_pengumuman_hasil_kualifikasi'] =  $this->M_jadwal->jadwal_pra_umum_8($data['rup']['id_rup']);
            $data['jadwal_masa_sanggah_kualifikasi'] =  $this->M_jadwal->jadwal_pra_umum_9($data['rup']['id_rup']);
            $data['jadwal_download_dokumen_pengadaan'] =  $this->M_jadwal->jadwal_pra_umum_10($data['rup']['id_rup']);
            $data['jadwal_aanwijzing'] =  $this->M_jadwal->jadwal_pra_umum_11($data['rup']['id_rup']);
            $data['jadwal_upload_dokumen_penawaran'] =  $this->M_jadwal->jadwal_pra_umum_12($data['rup']['id_rup']);
            $data['jadwal_pembukaan_file1'] =  $this->M_jadwal->jadwal_pra_umum_13($data['rup']['id_rup']);
            $data['jadwal_presentasi_evaluasi'] =  $this->M_jadwal->jadwal_pra_umum_14($data['rup']['id_rup']);
            $data['jadwal_pengumuman_peringkat'] =  $this->M_jadwal->jadwal_pra_umum_15($data['rup']['id_rup']);
            $data['jadwal_pembukaan_file2'] =  $this->M_jadwal->jadwal_pra_umum_16($data['rup']['id_rup']);
            $data['jadwal_upload_ba'] =  $this->M_jadwal->jadwal_pra_umum_17($data['rup']['id_rup']);
            $data['jadwal_penetapan_pemenang'] =  $this->M_jadwal->jadwal_pra_umum_18($data['rup']['id_rup']);
            $data['jadwal_pengumuman_pemenang'] =  $this->M_jadwal->jadwal_pra_umum_19($data['rup']['id_rup']);
            $data['jadwal_masa_sanggah_akhir'] =  $this->M_jadwal->jadwal_pra_umum_20($data['rup']['id_rup']);
            $data['jadwal_upload_surat_penunjukan'] =  $this->M_jadwal->jadwal_pra_umum_21($data['rup']['id_rup']);
            // end get tahap
        } else if ($data['rup']['id_jadwal_tender'] == 2 || $data['rup']['id_jadwal_tender'] == 10) {
            $data['jadwal_pengumuman_pengadaan'] =  $this->M_jadwal->jadwal_pra_umum_1($data['rup']['id_rup']);
            $data['jadwal_dokumen_kualifikasi'] =  $this->M_jadwal->jadwal_pra_umum_2($data['rup']['id_rup']);
            $data['jadwal_aanwijzing_pq'] =  $this->M_jadwal->jadwal_pra_umum_3($data['rup']['id_rup']);
            $data['jadwal_upload_dokumen_prakualifikasi'] =  $this->M_jadwal->jadwal_pra_umum_4($data['rup']['id_rup']);
            $data['jadwal_pembuktian_kualifikasi'] =  $this->M_jadwal->jadwal_pra_umum_5($data['rup']['id_rup']);
            $data['jadwal_evaluasi_dokumen_kualifikasi'] =  $this->M_jadwal->jadwal_pra_umum_6($data['rup']['id_rup']);
            $data['jadwal_penetapan_hasil_kualifikasi'] =  $this->M_jadwal->jadwal_pra_umum_7($data['rup']['id_rup']);
            $data['jadwal_pengumuman_hasil_kualifikasi'] =  $this->M_jadwal->jadwal_pra_umum_8($data['rup']['id_rup']);
            $data['jadwal_masa_sanggah_kualifikasi'] =  $this->M_jadwal->jadwal_pra_umum_9($data['rup']['id_rup']);
            $data['jadwal_download_dokumen_pengadaan'] =  $this->M_jadwal->jadwal_pra_umum_10($data['rup']['id_rup']);
            $data['jadwal_aanwijzing'] =  $this->M_jadwal->jadwal_pra_umum_11($data['rup']['id_rup']);
            $data['jadwal_upload_dokumen_penawaran'] =  $this->M_jadwal->jadwal_pra_umum_12($data['rup']['id_rup']);
            $data['jadwal_pembukaan_file1'] =  $this->M_jadwal->jadwal_pra_umum_13($data['rup']['id_rup']);
            $data['jadwal_presentasi_evaluasi'] =  $this->M_jadwal->jadwal_pra_umum_14($data['rup']['id_rup']);
            $data['jadwal_pengumuman_peringkat'] =  $this->M_jadwal->jadwal_pra_umum_15($data['rup']['id_rup']);
            $data['jadwal_pembukaan_file2'] =  $this->M_jadwal->jadwal_pra_umum_16($data['rup']['id_rup']);
            $data['jadwal_upload_ba'] =  $this->M_jadwal->jadwal_pra_umum_17($data['rup']['id_rup']);
            $data['jadwal_penetapan_pemenang'] =  $this->M_jadwal->jadwal_pra_umum_18($data['rup']['id_rup']);
            $data['jadwal_pengumuman_pemenang'] =  $this->M_jadwal->jadwal_pra_umum_19($data['rup']['id_rup']);
            $data['jadwal_masa_sanggah_akhir'] =  $this->M_jadwal->jadwal_pra_umum_20($data['rup']['id_rup']);
            $data['jadwal_upload_surat_penunjukan'] =  $this->M_jadwal->jadwal_pra_umum_21($data['rup']['id_rup']);
            // end get tahap
        } else if ($data['rup']['id_jadwal_tender'] == 1) {
            $data['jadwal_pengumuman_pengadaan'] =  $this->M_jadwal->jadwal_pra1file_umum_1($data['rup']['id_rup']);
            $data['jadwal_dokumen_kualifikasi'] =  $this->M_jadwal->jadwal_pra1file_umum_2($data['rup']['id_rup']);
            $data['jadwal_aanwijzing_pq'] =  $this->M_jadwal->jadwal_pra1file_umum_3($data['rup']['id_rup']);
            $data['jadwal_upload_dokumen_prakualifikasi'] =  $this->M_jadwal->jadwal_pra1file_umum_3($data['rup']['id_rup']);
            $data['jadwal_pembuktian_kualifikasi'] =  $this->M_jadwal->jadwal_pra1file_umum_5($data['rup']['id_rup']);
            $data['jadwal_evaluasi_dokumen_kualifikasi'] =  $this->M_jadwal->jadwal_pra1file_umum_6($data['rup']['id_rup']);
            $data['jadwal_penetapan_hasil_kualifikasi'] =  $this->M_jadwal->jadwal_pra1file_umum_7($data['rup']['id_rup']);
            $data['jadwal_pengumuman_hasil_kualifikasi'] =  $this->M_jadwal->jadwal_pra1file_umum_8($data['rup']['id_rup']);
            $data['jadwal_masa_sanggah_kualifikasi'] =  $this->M_jadwal->jadwal_pra1file_umum_9($data['rup']['id_rup']);
            $data['jadwal_download_dokumen_pengadaan'] =  $this->M_jadwal->jadwal_pra1file_umum_11($data['rup']['id_rup']);
            $data['jadwal_aanwijzing'] =  $this->M_jadwal->jadwal_pra1file_umum_12($data['rup']['id_rup']);
            $data['jadwal_upload_dokumen_penawaran'] =  $this->M_jadwal->jadwal_pra1file_umum_13($data['rup']['id_rup']);
            $data['jadwal_pembukaan_file1'] =  $this->M_jadwal->jadwal_pra1file_umum_13($data['rup']['id_rup']);
            $data['jadwal_presentasi_evaluasi'] =  $this->M_jadwal->jadwal_pra1file_umum_14($data['rup']['id_rup']);
            $data['jadwal_pengumuman_peringkat'] =  $this->M_jadwal->jadwal_pra1file_umum_15($data['rup']['id_rup']);
            $data['jadwal_pembukaan_file2'] =  $this->M_jadwal->jadwal_pra1file_umum_16($data['rup']['id_rup']);
            $data['jadwal_upload_ba'] =  $this->M_jadwal->jadwal_pra1file_umum_17($data['rup']['id_rup']);
            $data['jadwal_penetapan_pemenang'] =  $this->M_jadwal->jadwal_pra1file_umum_18($data['rup']['id_rup']);
            $data['jadwal_pengumuman_pemenang'] =  $this->M_jadwal->jadwal_pra1file_umum_19($data['rup']['id_rup']);
            $data['jadwal_masa_sanggah_akhir'] =  $this->M_jadwal->jadwal_pra1file_umum_20($data['rup']['id_rup']);
            $data['jadwal_upload_surat_penunjukan'] =  $this->M_jadwal->jadwal_pra1file_umum_21($data['rup']['id_rup']);
            // end get tahap
        } else if ($data['rup']['id_jadwal_tender'] == 9) {
            $data['jadwal_pengumuman_pengadaan'] =  $this->M_jadwal->jadwal_juksung_1($data['rup']['id_rup']);
            $data['jadwal_dokumen_kualifikasi'] =  $this->M_jadwal->jadwal_juksung_2($data['rup']['id_rup']);
            $data['jadwal_aanwijzing_pq'] =  $this->M_jadwal->jadwal_pra1file_umum_3($data['rup']['id_rup']);
            $data['jadwal_upload_dokumen_prakualifikasi'] =  $this->M_jadwal->jadwal_pra1file_umum_3($data['rup']['id_rup']);
            $data['jadwal_pembuktian_kualifikasi'] =  $this->M_jadwal->jadwal_juksung_5($data['rup']['id_rup']);
            $data['jadwal_evaluasi_dokumen_kualifikasi'] =  $this->M_jadwal->jadwal_pra1file_umum_6($data['rup']['id_rup']);
            $data['jadwal_penetapan_hasil_kualifikasi'] =  $this->M_jadwal->jadwal_pra1file_umum_7($data['rup']['id_rup']);
            $data['jadwal_pengumuman_hasil_kualifikasi'] =  $this->M_jadwal->jadwal_pra1file_umum_8($data['rup']['id_rup']);
            $data['jadwal_masa_sanggah_kualifikasi'] =  $this->M_jadwal->jadwal_pra1file_umum_9($data['rup']['id_rup']);
            $data['jadwal_download_dokumen_pengadaan'] =  $this->M_jadwal->jadwal_pra1file_umum_11($data['rup']['id_rup']);
            $data['jadwal_aanwijzing'] =  $this->M_jadwal->jadwal_pra1file_umum_11($data['rup']['id_rup']);
            $data['jadwal_upload_dokumen_penawaran'] =  $this->M_jadwal->jadwal_juksung_11($data['rup']['id_rup']);
            $data['jadwal_pembukaan_file1'] =  $this->M_jadwal->jadwal_pra1file_umum_13($data['rup']['id_rup']);
            $data['jadwal_presentasi_evaluasi'] =  $this->M_jadwal->jadwal_pra1file_umum_14($data['rup']['id_rup']);
            $data['jadwal_pengumuman_peringkat'] =  $this->M_jadwal->jadwal_pra1file_umum_15($data['rup']['id_rup']);
            $data['jadwal_pembukaan_file2'] =  $this->M_jadwal->jadwal_pra1file_umum_16($data['rup']['id_rup']);
            $data['jadwal_upload_ba'] =  $this->M_jadwal->jadwal_pra1file_umum_17($data['rup']['id_rup']);
            $data['jadwal_penetapan_pemenang'] =  $this->M_jadwal->jadwal_juksung_15($data['rup']['id_rup']);
            $data['jadwal_pengumuman_pemenang'] =  $this->M_jadwal->jadwal_pra1file_umum_19($data['rup']['id_rup']);
            $data['jadwal_masa_sanggah_akhir'] =  $this->M_jadwal->jadwal_pra1file_umum_20($data['rup']['id_rup']);
            $data['jadwal_upload_surat_penunjukan'] =  $this->M_jadwal->jadwal_pra1file_umum_21($data['rup']['id_rup']);
            // end get tahap
        } else if ($data['rup']['id_jadwal_tender'] == 3) {
            $data['jadwal_pengumuman_pengadaan'] =  $this->M_jadwal->jadwal_tender_terbatas_pasca_1_file_1($data['rup']['id_rup']);
            $data['jadwal_dokumen_kualifikasi'] =  $this->M_jadwal->jadwal_tender_terbatas_pasca_1_file_4($data['rup']['id_rup']);
            $data['jadwal_aanwijzing_pq'] =  $this->M_jadwal->jadwal_pra_umum_3($data['rup']['id_rup']);
            $data['jadwal_upload_dokumen_prakualifikasi'] =  $this->M_jadwal->jadwal_tender_terbatas_pasca_1_file_3($data['rup']['id_rup']);
            $data['jadwal_pembuktian_kualifikasi'] =  $this->M_jadwal->jadwal_tender_terbatas_pasca_1_file_8($data['rup']['id_rup']);
            $data['jadwal_evaluasi_dokumen_kualifikasi'] =  $this->M_jadwal->jadwal_pra_umum_6($data['rup']['id_rup']);
            $data['jadwal_penetapan_hasil_kualifikasi'] =  $this->M_jadwal->jadwal_tender_terbatas_pasca_1_file_11($data['rup']['id_rup']);
            $data['jadwal_pengumuman_hasil_kualifikasi'] =  $this->M_jadwal->jadwal_tender_terbatas_pasca_1_file_11($data['rup']['id_rup']);
            $data['jadwal_masa_sanggah_kualifikasi'] =  $this->M_jadwal->jadwal_pra_umum_9($data['rup']['id_rup']);
            $data['jadwal_download_dokumen_pengadaan'] =  $this->M_jadwal->jadwal_tender_terbatas_pasca_1_file_2($data['rup']['id_rup']);
            $data['jadwal_aanwijzing'] =  $this->M_jadwal->jadwal_tender_terbatas_pasca_1_file_3($data['rup']['id_rup']);
            $data['jadwal_upload_dokumen_penawaran'] =  $this->M_jadwal->jadwal_tender_terbatas_pasca_1_file_3($data['rup']['id_rup']);
            $data['jadwal_pembukaan_file1'] =  $this->M_jadwal->jadwal_pra_umum_13($data['rup']['id_rup']);
            $data['jadwal_presentasi_evaluasi'] =  $this->M_jadwal->jadwal_pra_umum_14($data['rup']['id_rup']);
            $data['jadwal_pengumuman_peringkat'] =  $this->M_jadwal->jadwal_pra_umum_15($data['rup']['id_rup']);
            $data['jadwal_pembukaan_file2'] =  $this->M_jadwal->jadwal_pra_umum_16($data['rup']['id_rup']);
            $data['jadwal_upload_ba'] =  $this->M_jadwal->jadwal_pra_umum_17($data['rup']['id_rup']);
            $data['jadwal_penetapan_pemenang'] =  $this->M_jadwal->jadwal_tender_terbatas_pasca_1_file_11($data['rup']['id_rup']);
            $data['jadwal_pengumuman_pemenang'] =  $this->M_jadwal->jadwal_pra_umum_19($data['rup']['id_rup']);
            $data['jadwal_masa_sanggah_akhir'] =  $this->M_jadwal->jadwal_tender_terbatas_pasca_1_file_12($data['rup']['id_rup']);
            $data['jadwal_upload_surat_penunjukan'] =  $this->M_jadwal->jadwal_pra_umum_21($data['rup']['id_rup']);
            // end get tahap
        } else if ($data['rup']['id_jadwal_tender'] == 6) {
            $data['jadwal_pengumuman_pengadaan'] =  $this->M_jadwal->jadwal_pra_umum_1($data['rup']['id_rup']);
            $data['jadwal_dokumen_kualifikasi'] =  $this->M_jadwal->jadwal_pra_umum_2($data['rup']['id_rup']);
            $data['jadwal_aanwijzing_pq'] =  $this->M_jadwal->jadwal_pra_umum_3($data['rup']['id_rup']);
            $data['jadwal_upload_dokumen_prakualifikasi'] =  $this->M_jadwal->jadwal_pra_umum_4($data['rup']['id_rup']);
            $data['jadwal_pembuktian_kualifikasi'] =  $this->M_jadwal->jadwal_pra_umum_5($data['rup']['id_rup']);
            $data['jadwal_evaluasi_dokumen_kualifikasi'] =  $this->M_jadwal->jadwal_pra_umum_6($data['rup']['id_rup']);
            $data['jadwal_penetapan_hasil_kualifikasi'] =  $this->M_jadwal->jadwal_pra_umum_7($data['rup']['id_rup']);
            $data['jadwal_pengumuman_hasil_kualifikasi'] =  $this->M_jadwal->jadwal_pra_umum_8($data['rup']['id_rup']);
            $data['jadwal_masa_sanggah_kualifikasi'] =  $this->M_jadwal->jadwal_pra_umum_9($data['rup']['id_rup']);
            $data['jadwal_download_dokumen_pengadaan'] =  $this->M_jadwal->jadwal_pra_umum_10($data['rup']['id_rup']);
            $data['jadwal_aanwijzing'] =  $this->M_jadwal->jadwal_pra_umum_11($data['rup']['id_rup']);
            $data['jadwal_upload_dokumen_penawaran'] =  $this->M_jadwal->jadwal_pra_umum_12($data['rup']['id_rup']);
            $data['jadwal_pembukaan_file1'] =  $this->M_jadwal->jadwal_pra_umum_13($data['rup']['id_rup']);
            $data['jadwal_presentasi_evaluasi'] =  $this->M_jadwal->jadwal_pra_umum_14($data['rup']['id_rup']);
            $data['jadwal_pengumuman_peringkat'] =  $this->M_jadwal->jadwal_pra_umum_15($data['rup']['id_rup']);
            $data['jadwal_pembukaan_file2'] =  $this->M_jadwal->jadwal_pra_umum_16($data['rup']['id_rup']);
            $data['jadwal_upload_ba'] =  $this->M_jadwal->jadwal_pra_umum_17($data['rup']['id_rup']);
            $data['jadwal_penetapan_pemenang'] =  $this->M_jadwal->jadwal_pra_umum_18($data['rup']['id_rup']);
            $data['jadwal_pengumuman_pemenang'] =  $this->M_jadwal->jadwal_pra_umum_19($data['rup']['id_rup']);
            $data['jadwal_masa_sanggah_akhir'] =  $this->M_jadwal->jadwal_pra_umum_20($data['rup']['id_rup']);
            $data['jadwal_upload_surat_penunjukan'] =  $this->M_jadwal->jadwal_pra_umum_21($data['rup']['id_rup']);
            // end get tahap
        }


        $this->load->view('info_tender/ba_hasil_kualifikasi', $data);
    }
}
