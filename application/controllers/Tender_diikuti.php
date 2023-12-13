<?php
defined('BASEPATH') or exit('No direct script access allowed');
date_default_timezone_set("Asia/Jakarta");
class Tender_diikuti extends CI_Controller
{

    // var $link_dok = 'http://localhost/jmto-eproc';
    var $link_dok = 'https://jmto-eproc.kintekindo.net';
    public function __construct()
    {
        parent::__construct();
        $id_vendor = $this->session->userdata('id_vendor');
        $this->load->model('M_dashboard/M_dashboard');
        $this->load->model('M_jenis_usaha/M_jenis_usaha');
        $this->load->model('Wilayah/Wilayah_model');
        $this->load->model('M_dashboard/M_dashboard');
        $this->load->model('M_monitoring/M_monitoring');
        $this->load->model('M_tender/M_tender');
        $this->load->model('M_tender/M_count');
        $this->load->model('M_jadwal/M_jadwal');
        $this->load->helper('download');
        if (!$id_vendor) {
            redirect('auth');
        }
    }


    public function index()
    {
        $id_vendor = $this->session->userdata('id_vendor');
        $data['notifikasi'] = $this->M_dashboard->count_notifikasi($id_vendor);
        $data['notifikasi_izin'] = $this->M_dashboard->count_notifikasi_izin($id_vendor);
        $data['notifikasi_akta'] = $this->M_dashboard->count_notifikasi_akta($id_vendor);
        $data['notifikasi_manajerial'] = $this->M_dashboard->count_notifikasi_manajerial($id_vendor);
        $data['notifikasi_pengalaman'] = $this->M_dashboard->count_notifikasi_pengalaman($id_vendor);
        $data['notifikasi_pajak'] = $this->M_dashboard->count_notifikasi_pajak($id_vendor);
        $update_notif = ['notifikasi' => 0];
        $where = ['id_vendor' => $id_vendor];
        $this->M_monitoring->update_notif($where, $update_notif);
        $data['count_tender_umum'] =  $this->M_count->count_tender_umum_diikuti($id_vendor);
        $data['count_tender_terbatas'] =  $this->M_count->count_tender_terbatas_diikuti($id_vendor);
        $data['count_tender_terundang'] = $this->M_tender->hitung_terundang();
        $data['count_tender_penunjukan_langsung'] =  $this->M_count->count_tender_penunjukan_langsung_diikuti($id_vendor);
        // var_dump($data['count_tender_umum']);
        // die;
        $this->load->view('template_menu/header_menu', $data);
        $this->load->view('tender_diikuti/index', $data);
        $this->load->view('template_menu/new_footer');
        $this->load->view('tender_diikuti/file_public');
    }

    public function get_data_tender()
    {
        $id_vendor = $this->session->userdata('id_vendor');
        $resultss = $this->M_tender->gettable_diikuti($id_vendor);
        $data = [];
        $no = $_POST['start'];
        $now = date('Y-m-d H:i');
        foreach ($resultss as $rs) {
            $rup = $this->M_tender->get_row_rup_byid($rs->id_url_rup);
            if ($rs->id_jadwal_tender == 3 || $rs->id_jadwal_tender == 6) {
                $jadwal_terakhir = $this->M_jadwal->jadwal_pasca_terbatas($rup['id_rup']);
            } else {
                $jadwal_terakhir = $this->M_jadwal->jadwal_pra_umum_22($rup['id_rup']);
            }
            $row = array();
            $row[] = ++$no;
            $row[] = $rs->tahun_rup;
            $row[] = $rs->nama_rup;
            $row[] = $rs->nama_departemen;
            $row[] = $rs->nama_jenis_pengadaan;
            $row[] = 'Rp. ' . number_format($rs->total_hps_rup, 2, ",", ".");;
            if ($jadwal_terakhir['waktu_mulai'] < $now) {
                $row[] = '<span class="badge bg-success text-white">Pengadaan Sudah Selesai
                </span>';
            } else {
                $row[] = '<span class="badge bg-danger text-white">Sedang Berlangsung
                </span>';
            }
            $row[] = '<a href="' . base_url('tender_diikuti/informasi_tender/' . $rs->id_url_rup) . '" class="btn btn-info btn-sm shadow-lg text-white"><i class="fa fa-info-circle" aria-hidden="true"></i> Lihat Pengadaan</a>';
            $data[] = $row;
        }
        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->M_tender->count_all_data_diikuti($id_vendor),
            "recordsFiltered" => $this->M_tender->count_filtered_data_diikuti($id_vendor),
            "data" => $data
        );
        $this->output->set_content_type('application/json')->set_output(json_encode($output));
    }

    public function get_data_tender_terbatas()
    {
        $session = $this->session->userdata('id_vendor');
        $resultss = $this->M_tender->gettable_terbatas_diikuti($session);
        $data = [];
        $now = date('Y-m-d H:i');
        $no = $_POST['start'];
        foreach ($resultss as $rs) {
            $rup = $this->M_tender->get_row_rup_byid($rs->id_url_rup);
            if ($rs->id_jadwal_tender == 3 || $rs->id_jadwal_tender == 6) {
                $jadwal_terakhir = $this->M_jadwal->jadwal_pasca_terbatas($rup['id_rup']);
            } else {
                $jadwal_terakhir = $this->M_jadwal->jadwal_pra_umum_223($rup['id_rup']);
            }
            $row = array();
            $row[] = ++$no;
            $row[] = $rs->tahun_rup;
            $row[] = $rs->nama_rup;
            $row[] = $rs->nama_departemen;
            $row[] = $rs->nama_jenis_pengadaan;
            $row[] = 'Rp. ' . number_format($rs->total_hps_rup, 2, ",", ".");;
            if ($jadwal_terakhir['waktu_mulai'] <= $now) {
                $row[] = '<span class="badge bg-success text-white">Pengadaan Sudah Selesai
                </span>';
            } else {
                $row[] = '<span class="badge bg-danger text-white">Sedang Berlangsung
                </span>';
            }
            $row[] = '<a href="javascript:;" class="btn btn-info btn-sm shadow-lg text-white"  onClick="by_id_rup(' . "'" . $rs->id_url_rup . "'" . ')"><i class="fa fa-info-circle" aria-hidden="true"></i> Detail</a>';
            $data[] = $row;
        }
        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->M_tender->count_all_data_terbatas_diikuti($session),
            "recordsFiltered" => $this->M_tender->count_filtered_data_terbatas_diikuti($session),
            "data" => $data
        );
        $this->output->set_content_type('application/json')->set_output(json_encode($output));
    }

    public function get_data_tender_penunjukan_langsung()
    {
        $session = $this->session->userdata('id_vendor');
        $resultss = $this->M_tender->gettable_penunjukan_langsung_diikuti($session);
        $data = [];
        $now = date('Y-m-d H:i');
        $no = $_POST['start'];
        foreach ($resultss as $rs) {
            $rup = $this->M_tender->get_row_rup_byid($rs->id_url_rup);
            if ($rs->id_jadwal_tender == 3 || $rs->id_jadwal_tender == 6) {
                $jadwal_terakhir = $this->M_jadwal->jadwal_pasca_terbatas($rup['id_rup']);
            } else {
                $jadwal_terakhir = $this->M_jadwal->jadwal_pra_umum_223($rup['id_rup']);
            }
            $row = array();
            $row[] = ++$no;
            $row[] = $rs->tahun_rup;
            $row[] = $rs->nama_rup;
            $row[] = $rs->nama_departemen;
            $row[] = $rs->nama_jenis_pengadaan;
            $row[] = 'Rp. ' . number_format($rs->total_hps_rup, 2, ",", ".");;
            if ($jadwal_terakhir['waktu_mulai'] < $now) {
                $row[] = '<span class="badge bg-success text-white">Pengadaan Sudah Selesai
                </span>';
            } else {
                $row[] = '<span class="badge bg-danger text-white">Sedang Berlangsung
                </span>';
            }
            $row[] = '<a href="javascript:;" class="btn btn-info btn-sm shadow-lg text-white"  onClick="by_id_rup(' . "'" . $rs->id_url_rup . "'" . ')"><i class="fa fa-info-circle" aria-hidden="true"></i> Detail</a>';
            $data[] = $row;
        }
        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->M_tender->count_all_data_penunjukan_langsung_diikuti($session),
            "recordsFiltered" => $this->M_tender->count_filtered_data_penunjukan_langsung_diikuti($session),
            "data" => $data
        );
        $this->output->set_content_type('application/json')->set_output(json_encode($output));
    }

    public function detail_paket($id_rup)
    {

        $data_rup = $this->M_tender->get_row_rup_byid($id_rup);
        $root_jadwal = $data_rup['root_jadwal'];
        $jadwal = $this->M_tender->get_jadwal($id_rup);
        $row_syarat_administrasi_rup = $this->M_tender->get_syarat_izin_usaha_tender($data_rup['id_rup']);
        $cek_ikut =  $this->M_tender->cek_mengikuti($data_rup['id_rup']);
        $syarat_tambahan = $this->M_tender->result_syarat_tambahan($data_rup['id_rup']);
        $row_syarat_administrasi_rup = $this->M_tender->get_syarat_izin_usaha_tender($data_rup['id_rup']);
        $row_syarat_teknis_rup = $this->M_tender->get_syarat_izin_teknis_tender($data_rup['id_rup']);
        $get_kbli = $this->M_tender->get_persyaratan_kbli($data_rup['id_rup']);
        $get_sbu =  $this->M_tender->get_persyaratan_sbu($data_rup['id_rup']);
        $response = [
            'root_jadwal' => $root_jadwal,
            'row_rup' => $data_rup,
            'jadwal' => $jadwal,
            'row_syarat_administrasi_rup' => $row_syarat_administrasi_rup,
            'row_syarat_teknis_rup' => $row_syarat_teknis_rup,
            'syarat_tambahan' => $syarat_tambahan,
            'cek_ikut' => $cek_ikut,
            'result_kbli' => $get_kbli,
            'result_sbu' => $get_sbu
        ];
        $this->output->set_content_type('application/json')->set_output(json_encode($response));
    }

    public function informasi_tender($id_url_rup)
    {
        $id_vendor = $this->session->userdata('id_vendor');
        $data['notifikasi'] = $this->M_dashboard->count_notifikasi($id_vendor);
        $data['notifikasi_izin'] = $this->M_dashboard->count_notifikasi_izin($id_vendor);
        $data['notifikasi_akta'] = $this->M_dashboard->count_notifikasi_akta($id_vendor);
        $data['notifikasi_manajerial'] = $this->M_dashboard->count_notifikasi_manajerial($id_vendor);
        $data['notifikasi_pengalaman'] = $this->M_dashboard->count_notifikasi_pengalaman($id_vendor);
        $data['notifikasi_pajak'] = $this->M_dashboard->count_notifikasi_pajak($id_vendor);
     

        $update_notif = ['notifikasi' => 0];
        $where = ['id_vendor' => $id_vendor];
        $this->M_monitoring->update_notif($where, $update_notif);

        // query tendering
        $data['count_tender_umum'] =  $this->M_tender->count_all_data();
        $data['rup'] = $this->M_tender->get_row_rup($id_url_rup);
        // id_rup non url
        $id_rup = $data['rup']['id_rup'];
        $nama_rup = $data['rup']['nama_rup'];
        $data['peserta'] = $this->M_tender->peserta($id_rup);
        // count peserta
        $count_peserta = $this->M_tender->count_peserta($id_rup);
        if ($count_peserta > 3) {
            $data['sts_nego'] = 'buka_negosiasi';
        } else {
            $data['sts_nego'] = 'tutup_negosiasi';
        }
        $data['dok_prakualifikasi'] = $this->M_tender->dok_prakualifikasi($id_rup);
        $data['dok_pengadaan'] = $this->M_tender->dok_pengadaan($id_rup);
        $data['dok_syarat_tambahan'] = $this->M_tender->get_syarat_tambahan($id_rup);
        $data['ba_tender'] = $this->M_tender->get_ba_tender($id_rup);

        $data['get_row_mengikuti'] = $this->M_tender->cek_mengikuti($id_rup);
        // panggil private urlpan
        $data['url_dok_pengadaan'] = $this->link_dok . $nama_rup . '/' . 'DOKUMEN_PENGADAAN/';
        $data['url_dok_prakualifikasi'] = $this->link_dok . $nama_rup . '/' . 'DOKUMEN_PRAKUALIFIKASI/';
        $data['url_dok_syarat_tambahan'] = $this->link_dok . $nama_rup . '/' . 'SYARAT_TAMBAHAN/';

        $data['url_dok_pengumuman_pra'] = $this->link_dok . $nama_rup . '/' . 'HASIL_PRAKUALIFIKASI/';
        $data['url_dok_undangan_pembuktian'] = $this->link_dok . $nama_rup . '/' . 'HASIL_PRAKUALIFIKASI/';
        $data['url_dok_ba_tender'] = $this->link_dok . $nama_rup . '/' . 'BERITA_ACARA_PENGADAAN/';
        $data['url_dok_penunjukan_pemenang'] = $this->link_dok . $nama_rup . '/' . 'SURAT_PENUNJUKAN_PEMENANG/';

        // $data['url_dok_pengadaan'] = $this->link_dok . '/panitia/info_tender/dokumen_tender/pengadaan/';
        // $data['url_dok_prakualifikasi'] = $this->link_dok . '/panitia/info_tender/dokumen_tender/prakualifikasi/';
        // $data['url_dok_syarat_tambahan'] = $this->link_dok . '/panitia/info_tender/dokumen_tender/syarat_tambahan/';

        // $data['url_dok_pengumuman_pra'] = $this->link_dok . '/panitia/info_tender/dokumen_tender/pengumuman_pra/';
        // $data['url_dok_undangan_pembuktian'] = $this->link_dok . '/panitia/info_tender/dokumen_tender/undangan_pembuktian/';
        // $data['url_dok_ba_tender'] = $this->link_dok . '/';
        // $data['url_dok_penunjukan_pemenang'] = $this->link_dok . '/';


        // get tahap

        $data['count_tender_umum'] =  $this->M_count->count_tender_umum($id_vendor);
        $data['count_tender_terbatas'] =  $this->M_count->count_tender_terbatas($id_vendor);
        $data['count_tender_terundang'] = $this->M_tender->hitung_terundang();
        $this->load->view('template_menu/header_menu', $data);
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
            $this->load->view('info_tender/informasi_tender_umum', $data);
        } else if ($data['rup']['id_jadwal_tender'] == 2) {
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
            $this->load->view('info_tender/informasi_tender_terbatas', $data);
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
            $data['jadwal_aanwijzing'] =  $this->M_jadwal->jadwal_pra1file_umum_11($data['rup']['id_rup']);
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
            $this->load->view('info_tender/informasi_tender_terbatas_1file', $data);
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
            $this->load->view('info_tender/informasi_tender_penunjukan_langsung', $data);
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
            $this->load->view('info_tender/informasi_tender_terbatas_pasca_1_file', $data);
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
            $this->load->view('info_tender/informasi_tender_terbatas_pasca_2_file', $data);
        }
        $this->load->view('template_menu/new_footer');
        $this->load->view('info_tender/ajax', $data);
    }


    public function upload_syarat_tambahan()
    {

        // post
        $id_rup = $this->input->post('id_rup');
        $nama_persyaratan_tambahan = $this->input->post('nama_persyaratan_tambahan');

        // get value vendor dan paket untuk genrate file
        $nama_rup = $this->M_tender->get_rup_byid($id_rup);
        $nama_usaha = $this->session->userdata('nama_usaha');
        $id_vendor = $this->session->userdata('id_vendor');

        if (!is_dir('file_paket/' . $nama_rup['nama_rup'] . '/' .  $nama_usaha . '/' . 'SYARAT_TAMBAHAN')) {
            mkdir('file_paket/' . $nama_rup['nama_rup'] . '/' .  $nama_usaha . '/' . 'SYARAT_TAMBAHAN', 0777, TRUE);
        }
        $config['upload_path'] = './file_paket/' . $nama_rup['nama_rup'] . '/' .  $nama_usaha . '/' . 'SYARAT_TAMBAHAN';
        $config['allowed_types'] = 'pdf|xlsx|xls';
        $config['max_size'] = 0;
        $this->load->library('upload', $config);

        if ($this->upload->do_upload('file_syarat_tambahan')) {
            $fileData = $this->upload->data();
            $upload = [
                'id_rup' => $id_rup,
                'id_vendor' => $id_vendor,
                'nama_syarat_tambahan' => $nama_persyaratan_tambahan,
                'file_syarat_tambahan' => $fileData['file_name']
            ];
            $this->M_tender->insert_syarat_tambahan($upload);
            $this->output->set_content_type('application/json')->set_output(json_encode('success'));
        } else {
            $this->output->set_content_type('application/json')->set_output(json_encode('gagal'));
        }
    }

    public function hapus_syarat_tambahan()
    {
        $id_vendor_syarat_tambahan = $this->input->post('id_vendor_syarat_tambahan');
        $this->M_tender->delete_syarat_tambahan($id_vendor_syarat_tambahan);
        $this->output->set_content_type('application/json')->set_output(json_encode('success'));
    }

    public function get_syarat_tambahan()
    {
        $id_rup = $this->input->post('id_rup');
        $id_vendor = $this->input->post('id_vendor');

        $data = $this->M_tender->get_syarat_tambahan_vendor($id_rup, $id_vendor);
        $response = [
            'syarat_tambahan' => $data,
        ];
        $this->output->set_content_type('application/json')->set_output(json_encode($response));
    }

    public function download_syarat_tambahan($id_vendor_syarat_tambahan)
    {
        $row_syarat  = $this->M_tender->row_syarat_tambahan($id_vendor_syarat_tambahan);
        $nama_usaha = $this->session->userdata('nama_usaha');

        $file_url = 'file_paket/' . $row_syarat['nama_rup'] . '/' .  $nama_usaha . '/' . 'SYARAT_TAMBAHAN' . '/'  . $row_syarat['file_syarat_tambahan'];
        $url  = $file_url;
        redirect($url);
    }

    public function aanwijzing($id_url_rup)
    {
        $id_vendor = $this->session->userdata('id_vendor');
        $data['notifikasi'] = $this->M_dashboard->count_notifikasi($id_vendor);
        // query tendering
        $data['rup'] = $this->M_tender->get_row_rup($id_url_rup);
        // id_rup non url
        $id_rup = $data['rup']['id_rup'];
        $data['peserta'] = $this->M_tender->peserta($id_rup);
        // count peserta
        $count_peserta = $this->M_tender->count_peserta($id_rup);
        if ($data['rup']['id_jadwal_tender'] == 9) {
            $data['sts_nego'] = 'buka_negosiasi';
        } else {
            if ($count_peserta > 3) {
                $data['sts_nego'] = 'buka_negosiasi';
            } else {
                $data['sts_nego'] = 'tutup_negosiasi';
            }
        }
        $data['count_tender_umum'] =  $this->M_count->count_tender_umum($id_vendor);
        $data['count_tender_terbatas'] =  $this->M_count->count_tender_terbatas($id_vendor);
        $data['count_tender_terundang'] = $this->M_tender->hitung_terundang();
        // start tahap
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
        } else if ($data['rup']['id_jadwal_tender'] == 2) {
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
            $data['jadwal_aanwijzing_pq'] =  $this->M_jadwal->jadwal_pra1file_pasca_3($data['rup']['id_rup']);
            $data['jadwal_upload_dokumen_prakualifikasi'] =  $this->M_jadwal->jadwal_pra1file_umum_3($data['rup']['id_rup']);
            $data['jadwal_pembuktian_kualifikasi'] =  $this->M_jadwal->jadwal_pra1file_umum_5($data['rup']['id_rup']);
            $data['jadwal_evaluasi_dokumen_kualifikasi'] =  $this->M_jadwal->jadwal_pra1file_umum_6($data['rup']['id_rup']);
            $data['jadwal_penetapan_hasil_kualifikasi'] =  $this->M_jadwal->jadwal_pra1file_umum_7($data['rup']['id_rup']);
            $data['jadwal_pengumuman_hasil_kualifikasi'] =  $this->M_jadwal->jadwal_pra1file_umum_8($data['rup']['id_rup']);
            $data['jadwal_masa_sanggah_kualifikasi'] =  $this->M_jadwal->jadwal_pra1file_umum_9($data['rup']['id_rup']);
            $data['jadwal_download_dokumen_pengadaan'] =  $this->M_jadwal->jadwal_pra1file_umum_11($data['rup']['id_rup']);
            $data['jadwal_aanwijzing'] =  $this->M_jadwal->jadwal_pra1file_umum_11($data['rup']['id_rup']);
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
        $data['data2'] = $this->M_tender->getDataById($data['rup']['id_rup']);
        $this->load->view('template_menu/header_menu', $data);
        $this->load->view('info_tender/aanwijzing');
        $this->load->view('template_menu/new_footer');
        $this->load->view('info_tender/ajax_chat', $data);
    }

    public function ngeload_chatnya($id_rup)
    {
        $data = $this->M_tender->getPesan($id_rup);
        echo json_encode(array(
            'data' => $data
        ));
    }

    public function kirim_pesanya($id_rup)
    {
        $isi = $this->input->post('isi');
        $id_pengirim = $this->input->post('id_pengirim');
        $id_penerima = $this->input->post('id_penerima');
        $id_rup = $this->input->post('id_rup');
        $config['upload_path'] = './file_chat/';
        $config['allowed_types'] = 'pdf|jpeg|jpg|png|jfif|gif|xlsx|docx';
        $this->load->library('upload', $config);

        if ($this->upload->do_upload('dokumen_chat')) {

            $fileData = $this->upload->data();

            $upload = [
                'id_pengirim' => $id_pengirim,
                'isi' => $isi,
                'id_penerima' => $id_penerima,
                'id_rup' => $id_rup,
                'dokumen_chat' => $fileData['file_name'],
            ];
            $this->M_tender->tambah_chat($upload);
            $log = array('status' => true);
            echo json_encode($log);
            return true;
        } else if ($this->upload->do_upload('img_chat')) {

            $fileData2 = $this->upload->data();

            $upload = [
                'id_pengirim' => $id_pengirim,
                'isi' => $isi,
                'id_penerima' => $id_penerima,
                'id_rup' => $id_rup,
                'img_chat' => $fileData2['file_name'],
            ];
            $this->M_tender->tambah_chat($upload);
            $log = array('status' => true);
            echo json_encode($log);
            return true;
        } else {
            $upload = [
                'id_pengirim' => $id_pengirim,
                'isi' => $isi,
                'id_penerima' => $id_penerima,
                'id_rup' => $id_rup,
            ];
            $this->M_tender->tambah_chat($upload);
            $log = array('status' => true);
            echo json_encode($log);
            return true;
        }
    }

    public function aanwijzing_penawaran($id_url_rup)
    {
        $id_vendor = $this->session->userdata('id_vendor');

        $data['notifikasi'] = $this->M_dashboard->count_notifikasi($id_vendor);
        // query tendering

        $data['rup'] = $this->M_tender->get_row_rup($id_url_rup);
        // id_rup non url
        $id_rup = $data['rup']['id_rup'];
        $data['peserta'] = $this->M_tender->peserta($id_rup);
        // count peserta
        $count_peserta = $this->M_tender->count_peserta($id_rup);
        if ($count_peserta > 3) {
            $data['sts_nego'] = 'buka_negosiasi';
        } else {
            $data['sts_nego'] = 'tutup_negosiasi';
        }
        $data['get_row_mengikuti'] = $this->M_tender->cek_mengikuti($id_rup);
        // start tahap
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
        } else if ($data['rup']['id_jadwal_tender'] == 2) {
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
            $data['jadwal_aanwijzing'] =  $this->M_jadwal->jadwal_pra1file_umum_11($data['rup']['id_rup']);
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
        $data['data2'] = $this->M_tender->getDataById($data['rup']['id_rup']);

        $data['count_tender_umum'] =  $this->M_count->count_tender_umum($id_vendor);
        $data['count_tender_terbatas'] =  $this->M_count->count_tender_terbatas($id_vendor);
        $data['count_tender_terundang'] = $this->M_tender->hitung_terundang();
        $this->load->view('template_menu/header_menu', $data);
        $this->load->view('info_tender/aanwijzing_penawaran');
        $this->load->view('template_menu/new_footer');
        $this->load->view('info_tender/ajax_chat_penawaran', $data);
    }

    public function ngeload_chatnya_penawaran($id_rup)
    {
        $data = $this->M_tender->getPesan_penawaran($id_rup);
        echo json_encode(array(
            'data' => $data
        ));
    }

    public function kirim_pesanya_penawaran($id_rup)
    {
        $isi = $this->input->post('isi');
        $id_pengirim = $this->input->post('id_pengirim');
        $id_penerima = $this->input->post('id_penerima');
        $id_rup = $this->input->post('id_rup');
        $config['upload_path'] = './file_chat/';
        $config['allowed_types'] = 'pdf|jpeg|jpg|png|jfif|gif|xlsx|docx';
        $this->load->library('upload', $config);

        if ($this->upload->do_upload('dokumen_chat')) {

            $fileData = $this->upload->data();

            $upload = [
                'id_pengirim' => $id_pengirim,
                'isi' => $isi,
                'id_penerima' => $id_penerima,
                'id_rup' => $id_rup,
                'dokumen_chat' => $fileData['file_name'],
            ];
            $this->M_tender->tambah_chat_penawaran($upload);
            $log = array('status' => true);
            echo json_encode($log);
            return true;
        } else if ($this->upload->do_upload('img_chat')) {

            $fileData2 = $this->upload->data();

            $upload = [
                'id_pengirim' => $id_pengirim,
                'isi' => $isi,
                'id_penerima' => $id_penerima,
                'id_rup' => $id_rup,
                'img_chat' => $fileData2['file_name'],
            ];
            $this->M_tender->tambah_chat_penawaran($upload);
            $log = array('status' => true);
            echo json_encode($log);
            return true;
        } else {
            $upload = [
                'id_pengirim' => $id_pengirim,
                'isi' => $isi,
                'id_penerima' => $id_penerima,
                'id_rup' => $id_rup,
            ];
            $this->M_tender->tambah_chat_penawaran($upload);
            $log = array('status' => true);
            echo json_encode($log);
            return true;
        }
    }



    // sanggahan prakualifikasi
    public function sanggahan_prakualifikasi($id_url_rup)
    {
        $id_vendor = $this->session->userdata('id_vendor');
        $data['count_tender_umum'] =  $this->M_count->count_tender_umum($id_vendor);
        $data['count_tender_terbatas'] =  $this->M_count->count_tender_terbatas($id_vendor);
        $data['count_tender_terundang'] = $this->M_tender->hitung_terundang();
        $data['notifikasi'] = $this->M_dashboard->count_notifikasi($id_vendor);

        $data['rup'] = $this->M_tender->get_row_rup($id_url_rup);
        // id_rup non url
        $id_rup = $data['rup']['id_rup'];
        $data['peserta'] = $this->M_tender->peserta($id_rup);
        // count peserta
        $count_peserta = $this->M_tender->count_peserta($id_rup);
        if ($count_peserta > 3) {
            $data['sts_nego'] = 'buka_negosiasi';
        } else {
            $data['sts_nego'] = 'tutup_negosiasi';
        }
        // start tahap

        $data['data2'] = $this->M_tender->getDataById($data['rup']['id_rup']);
        $this->load->view('template_menu/header_menu', $data);
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
            $this->load->view('info_tender/informasi_tender_umum', $data);
        } else if ($data['rup']['id_jadwal_tender'] == 2) {
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
            $data['jadwal_aanwijzing'] =  $this->M_jadwal->jadwal_pra1file_umum_11($data['rup']['id_rup']);
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
        $this->load->view('info_tender/sanggahan_prakualifikasi', $data);
        $this->load->view('template_menu/new_footer');
        $this->load->view('info_tender/ajax');
    }

    public function get_sanggahan_pra()
    {
        $id_rup = $this->input->post('id_rup');
        $id_vendor = $this->input->post('id_vendor');
        $row_sanggahan_pra = $this->M_tender->get_row_vendor_sanggahan($id_rup, $id_vendor);
        $output = [
            'row_sanggahan_pra' => $row_sanggahan_pra,
        ];
        $this->output->set_content_type('application/json')->set_output(json_encode($output));
    }

    public function upload_sanggahan_pra()
    {
        // post
        $id_rup = $this->input->post('id_rup');
        $ket_sanggah_pra = $this->input->post('ket_sanggah_pra');

        // get value vendor dan paket untuk genrate file
        $nama_rup = $this->M_tender->get_rup_byid($id_rup);
        $nama_usaha = $this->session->userdata('nama_usaha');
        $id_vendor = $this->session->userdata('id_vendor');

        if (!is_dir('file_paket/' . $nama_rup['nama_rup'] . '/' .  $nama_usaha . '/' . 'SANGGAHAN_PRAKUALIFIKASI')) {
            mkdir('file_paket/' . $nama_rup['nama_rup'] . '/' .  $nama_usaha . '/' . 'SANGGAHAN_PRAKUALIFIKASI', 0777, TRUE);
        }
        $config['upload_path'] = './file_paket/' . $nama_rup['nama_rup'] . '/' .  $nama_usaha . '/' . 'SANGGAHAN_PRAKUALIFIKASI';
        $config['allowed_types'] = 'pdf|xlsx|xls';
        $config['max_size'] = 0;
        $this->load->library('upload', $config);

        if ($this->upload->do_upload('file_sanggah_pra')) {
            $fileData = $this->upload->data();
            $upload = [
                'ket_sanggah_pra' => $ket_sanggah_pra,
                'file_sanggah_pra' => $fileData['file_name']
            ];

            $where = [
                'id_rup' => $id_rup,
                'id_vendor' => $id_vendor,
            ];
            $this->M_tender->update_mengikuti($upload, $where);
            $this->output->set_content_type('application/json')->set_output(json_encode('success'));
        } else {
            $this->output->set_content_type('application/json')->set_output(json_encode('gagal'));
        }
    }

    public function hapus_sanggahan_pra()
    {
        // post
        $id_vendor_mengikuti_paket = $this->input->post('id_vendor_mengikuti_paket');

        // get value vendor dan paket untuk genrate file
        $nama_usaha = $this->session->userdata('nama_usaha');
        $id_vendor = $this->session->userdata('id_vendor');

        $upload = [
            'ket_sanggah_pra' => '',
            'file_sanggah_pra' => ''
        ];

        $where = [
            'id_vendor_mengikuti_paket' => $id_vendor_mengikuti_paket,
        ];
        $this->M_tender->update_mengikuti($upload, $where);
        $this->output->set_content_type('application/json')->set_output(json_encode('success'));
    }
    // end sanggahan prakualifikasi


    // sanggahan akhir
    public function sanggahan_akhir($id_url_rup)
    {
        $id_vendor = $this->session->userdata('id_vendor');
        $data['notifikasi'] = $this->M_dashboard->count_notifikasi($id_vendor);
        $data['notifikasi_izin'] = $this->M_dashboard->count_notifikasi_izin($id_vendor);
        $data['notifikasi_akta'] = $this->M_dashboard->count_notifikasi_akta($id_vendor);
        $data['notifikasi_manajerial'] = $this->M_dashboard->count_notifikasi_manajerial($id_vendor);
        $data['notifikasi_pengalaman'] = $this->M_dashboard->count_notifikasi_pengalaman($id_vendor);
        $data['notifikasi_pajak'] = $this->M_dashboard->count_notifikasi_pajak($id_vendor);

        $update_notif = ['notifikasi' => 0];
        $where = ['id_vendor' => $id_vendor];
        $this->M_monitoring->update_notif($where, $update_notif);
        $data['count_tender_umum'] =  $this->M_count->count_tender_umum($id_vendor);
        $data['count_tender_terbatas'] =  $this->M_count->count_tender_terbatas($id_vendor);
        $data['count_tender_terundang'] = $this->M_tender->hitung_terundang();
        $data['notifikasi'] = $this->M_dashboard->count_notifikasi($id_vendor);

        $data['rup'] = $this->M_tender->get_row_rup($id_url_rup);
        // id_rup non url
        $id_rup = $data['rup']['id_rup'];
        $data['peserta'] = $this->M_tender->peserta($id_rup);
        // count peserta
        $count_peserta = $this->M_tender->count_peserta($id_rup);
        if ($count_peserta > 3) {
            $data['sts_nego'] = 'buka_negosiasi';
        } else {
            $data['sts_nego'] = 'tutup_negosiasi';
        }
        $data['data2'] = $this->M_tender->getDataById($data['rup']['id_rup']);
        $this->load->view('template_menu/header_menu', $data);
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
        } else if ($data['rup']['id_jadwal_tender'] == 2) {
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
            $data['jadwal_aanwijzing'] =  $this->M_jadwal->jadwal_pra1file_umum_11($data['rup']['id_rup']);
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
        $this->load->view('info_tender/sanggahan_akhir', $data);
        $this->load->view('template_menu/new_footer');
        $this->load->view('info_tender/ajax');
    }

    public function get_sanggahan_akhir()
    {
        $id_rup = $this->input->post('id_rup');
        $id_vendor = $this->input->post('id_vendor');
        $row_sanggahan_akhir = $this->M_tender->get_row_vendor_sanggahan($id_rup, $id_vendor);
        $output = [
            'row_sanggahan_akhir' => $row_sanggahan_akhir,
        ];
        $this->output->set_content_type('application/json')->set_output(json_encode($output));
    }

    public function upload_sanggahan_akhir()
    {
        // post
        $id_rup = $this->input->post('id_rup');
        $ket_sanggah_akhir = $this->input->post('ket_sanggah_akhir');

        // get value vendor dan paket untuk genrate file
        $nama_rup = $this->M_tender->get_rup_byid($id_rup);
        $nama_usaha = $this->session->userdata('nama_usaha');
        $id_vendor = $this->session->userdata('id_vendor');

        if (!is_dir('file_paket/' . $nama_rup['nama_rup'] . '/' . $nama_usaha . '/' . 'SANGGAHAN_AKHIR')) {
            mkdir('file_paket/' . $nama_rup['nama_rup'] . '/' . $nama_usaha . '/' . 'SANGGAHAN_AKHIR', 0777, TRUE);
        }
        $config['upload_path'] = './file_paket/' . $nama_rup['nama_rup'] . '/' . $nama_usaha . '/' . 'SANGGAHAN_AKHIR';
        $config['allowed_types'] = 'pdf|xlsx|xls';
        $config['max_size'] = 0;
        $this->load->library('upload', $config);

        if ($this->upload->do_upload('file_sanggah_akhir')) {
            $fileData = $this->upload->data();
            $upload = [
                'ket_sanggah_akhir' => $ket_sanggah_akhir,
                'file_sanggah_akhir' => $fileData['file_name']
            ];

            $where = [
                'id_rup' => $id_rup,
                'id_vendor' => $id_vendor,
            ];
            $this->M_tender->update_mengikuti($upload, $where);
            $this->output->set_content_type('application/json')->set_output(json_encode('success'));
        } else {
            $this->output->set_content_type('application/json')->set_output(json_encode('gagal'));
        }
    }

    public function hapus_sanggahan_akhir()
    {
        // post
        $id_vendor_mengikuti_paket = $this->input->post('id_vendor_mengikuti_paket');

        // get value vendor dan paket untuk genrate file
        $nama_usaha = $this->session->userdata('nama_usaha');
        $id_vendor = $this->session->userdata('id_vendor');

        $upload = [
            'ket_sanggah_akhir' => '',
            'file_sanggah_akhir' => ''
        ];

        $where = [
            'id_vendor_mengikuti_paket' => $id_vendor_mengikuti_paket,
        ];
        $this->M_tender->update_mengikuti($upload, $where);
        $this->output->set_content_type('application/json')->set_output(json_encode('success'));
    }
    // end sanggahan akhir

    public function negosiasi($id_url_rup)
    {
        $id_vendor = $this->session->userdata('id_vendor');
        $data['count_tender_umum'] =  $this->M_count->count_tender_umum($id_vendor);
        $data['count_tender_terbatas'] =  $this->M_count->count_tender_terbatas($id_vendor);
        $data['count_tender_terundang'] = $this->M_tender->hitung_terundang();
        $data['notifikasi'] = $this->M_dashboard->count_notifikasi($id_vendor);
        // query tendering

        $data['rup'] = $this->M_tender->get_row_rup($id_url_rup);
        // id_rup non url
        $id_rup = $data['rup']['id_rup'];
        $data['peserta'] = $this->M_tender->peserta($id_rup);
        // count peserta
        $count_peserta = $this->M_tender->count_peserta($id_rup);
        if ($count_peserta > 3) {
            $data['sts_nego'] = 'buka_negosiasi';
        } else {
            $data['sts_nego'] = 'tutup_negosiasi';
        }
        // start tahap
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
        } else if ($data['rup']['id_jadwal_tender'] == 2) {
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
            $data['jadwal_aanwijzing'] =  $this->M_jadwal->jadwal_pra1file_umum_11($data['rup']['id_rup']);
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
        $data['data2'] = $this->M_tender->getDataById($data['rup']['id_rup']);
        $this->load->view('template_menu/header_menu', $data);
        $this->load->view('info_tender/negosiasi');
        $this->load->view('template_menu/new_footer');
        $this->load->view('info_tender/ajax');
    }

    public function buka_penawaran($id_url_rup)
    {
        $id_vendor = $this->session->userdata('id_vendor');
        $data['notifikasi'] = $this->M_dashboard->count_notifikasi($id_vendor);
        // query tendering
        $data['count_tender_umum'] =  $this->M_tender->count_all_data();
        $data['rup'] = $this->M_tender->get_row_rup($id_url_rup);
        if ($data['rup']['id_jadwal_tender'] == 5) {
            $data['jadwal_upload_dokumen_penawaran'] =  $this->M_jadwal->jadwal_pra_umum_12($data['rup']['id_rup']);
        } else if ($data['rup']['id_jadwal_tender'] == 2) {
            $data['jadwal_upload_dokumen_penawaran'] =  $this->M_jadwal->jadwal_pra_umum_12($data['rup']['id_rup']);
        } else if ($data['rup']['id_jadwal_tender'] == 1) {
            $data['jadwal_upload_dokumen_penawaran'] =  $this->M_jadwal->jadwal_pra1file_umum_13($data['rup']['id_rup']);
        } else if ($data['rup']['id_jadwal_tender'] == 9) {
            $data['jadwal_upload_dokumen_penawaran'] =  $this->M_jadwal->jadwal_juksung_11($data['rup']['id_rup']);
        }


        $data['jadwal_aanwizing'] = $this->M_tender->jadwal_aanwizing($data['rup']['id_rup']);
        $data['data2'] = $this->M_tender->getDataById($data['rup']['id_rup']);
        $this->load->view('template_menu/header_menu', $data);
        $this->load->view('info_tender/buka_penawaran', $data);
        $this->load->view('template_menu/new_footer');
        $this->load->view('info_tender/ajax_buka_penawaran', $data);
    }

    function kirim_token_penawaran()
    {
        $id_url_rup = $this->input->post('id_url_rup');
        $row_rup = $this->M_tender->get_row_rup($id_url_rup);
        $message = 'Token : ' . $row_rup['token_vendor'] . ' , Dengan Nama Pengadaan : ' . $row_rup['nama_rup'] . '';
        $this->kirim_wa->kirim_wa_vendor_terdaftar($this->session->userdata('no_telpon'), $message);
        $this->output->set_content_type('application/json')->set_output(json_encode('success'));
    }

    function acces_penawaran()
    {
        $id_url_rup = $this->input->post('id_url_rup');
        $token_syalala = $this->input->post('token_syalala');
        $row_rup = $this->M_tender->get_row_rup($id_url_rup);
        if ($row_rup['token_vendor'] == $token_syalala) {
            $userdata = [
                'token_vendor' => $token_syalala,
            ];
            $this->session->set_userdata($userdata);
            $this->output->set_content_type('application/json')->set_output(json_encode('success'));
        } else {
            $this->output->set_content_type('application/json')->set_output(json_encode('token_salah'));
        }
    }

    public function upload_penawaran_1()
    {
        $id_vendor = $this->input->post('id_vendor');
        $nama_dokumen_pengadaan_vendor = $this->input->post('nama_dokumen_pengadaan_vendor');
        $id_url_rup = $this->input->post('id_url_rup');
        $id_rup = $this->input->post('id_rup');
        $nama_rup = $this->M_tender->get_rup_byid($id_rup);
        $nama_usaha = $this->session->userdata('nama_usaha');
        $type_post = $this->input->post('type_post');
        if ($type_post == 'tambah') {
            if (!is_dir('file_paket/' . $nama_rup['nama_rup'] . '/' .  $nama_usaha . '/' . 'DOKUMEN_PENGADAAN_FILE_I')) {
                mkdir('file_paket/' . $nama_rup['nama_rup'] . '/' .  $nama_usaha . '/' . 'DOKUMEN_PENGADAAN_FILE_I', 0777, TRUE);
            }
            $config['upload_path'] = './file_paket/' . $nama_rup['nama_rup'] . '/' .  $nama_usaha . '/' . 'DOKUMEN_PENGADAAN_FILE_I';
            $config['allowed_types'] = 'pdf|xlsx|xls';
            $config['max_size'] = 0;
            $this->load->library('upload', $config);
            if ($this->upload->do_upload('file_dokumen_pengadaan_vendor')) {
                $fileData = $this->upload->data();

                $upload = [
                    'id_rup' => $id_rup,
                    'id_url_rup' => $id_url_rup,
                    'id_vendor' => $id_vendor,
                    'nama_dokumen_pengadaan_vendor' => $nama_dokumen_pengadaan_vendor,
                    'file_dokumen_pengadaan_vendor' => $fileData['file_name']
                ];

                $this->M_tender->insert_dok_pengadaan_file_I($upload);
                $this->output->set_content_type('application/json')->set_output(json_encode('success'));
            } else {
                $this->output->set_content_type('application/json')->set_output(json_encode('gagal'));
            }
        } else {
            $id_dokumen_pengadaan_vendor = $this->input->post('id_dokumen_pengadaan_vendor');
            if (!is_dir('file_paket/' . $nama_rup['nama_rup'] . '/' .  $nama_usaha . '/' . 'DOKUMEN_PENGADAAN_FILE_I')) {
                mkdir('file_paket/' . $nama_rup['nama_rup'] . '/' .  $nama_usaha . '/' . 'DOKUMEN_PENGADAAN_FILE_I', 0777, TRUE);
            }
            $config['upload_path'] = './file_paket/' . $nama_rup['nama_rup'] . '/' .  $nama_usaha . '/' . 'DOKUMEN_PENGADAAN_FILE_I';
            $config['allowed_types'] = 'pdf|xlsx|xls';
            $config['max_size'] = 0;
            $this->load->library('upload', $config);
            if ($this->upload->do_upload('file_dokumen_pengadaan_vendor')) {
                $fileData = $this->upload->data();
                $where = [
                    'id_dokumen_pengadaan_vendor' => $id_dokumen_pengadaan_vendor
                ];
                $upload = [
                    'id_rup' => $id_rup,
                    'id_url_rup' => $id_url_rup,
                    'id_vendor' => $id_vendor,
                    'nama_dokumen_pengadaan_vendor' => $nama_dokumen_pengadaan_vendor,
                    'file_dokumen_pengadaan_vendor' => $fileData['file_name']
                ];

                $this->M_tender->update_dok_pengadaan_file_I($upload, $where);
                $this->output->set_content_type('application/json')->set_output(json_encode('success'));
            }
        }
    }


    public function upload_penawaran_2()
    {
        $id_vendor = $this->input->post('id_vendor');
        $nilai_penawaran_vendor = $this->input->post('nilai_penawaran_vendor');
        $tkdn_dokumen_penawaran_vendor = $this->input->post('tkdn_dokumen_penawaran_vendor');
        $persentase_tkdn_dokumen_penawaran_vendor = $this->input->post('persentase_tkdn_dokumen_penawaran_vendor');
        $id_rup = $this->input->post('id_rup');
        $nama_rup = $this->M_tender->get_rup_byid($id_rup);
        $nama_usaha = $this->session->userdata('nama_usaha');
        if (!is_dir('file_paket/' . $nama_rup['nama_rup'] . '/' .  $nama_usaha . '/' . 'DOKUMEN_PENGADAAN_FILE_II')) {
            mkdir('file_paket/' . $nama_rup['nama_rup'] . '/' .  $nama_usaha . '/' . 'DOKUMEN_PENGADAAN_FILE_II', 0777, TRUE);
        }
        $config['upload_path'] = './file_paket/' . $nama_rup['nama_rup'] . '/' .  $nama_usaha . '/' . 'DOKUMEN_PENGADAAN_FILE_II';
        $config['allowed_types'] = 'pdf|xlsx|xls';
        $config['max_size'] = 0;
        $this->load->library('upload', $config);
        if ($this->upload->do_upload('dok_penawaran_harga')) {
            $fileData = $this->upload->data();
            $where = [
                'id_rup' => $id_rup,
                'id_vendor' => $id_vendor
            ];
            $upload = [
                'persentase_tkdn_dokumen_penawaran_vendor' => $persentase_tkdn_dokumen_penawaran_vendor,
                'tkdn_dokumen_penawaran_vendor' => $tkdn_dokumen_penawaran_vendor,
                'nilai_penawaran_vendor' => $nilai_penawaran_vendor,
                'dok_penawaran_harga' => $fileData['file_name']
            ];

            $this->M_tender->update_dok_pengadaan_file_II($upload, $where);
            $this->output->set_content_type('application/json')->set_output(json_encode('success'));
        }
    }

    public function get_table_dok_penawaran_file_I()
    {
        $id_vendor = $this->input->post('id_vendor');
        $id_url_rup = $this->input->post('id_url_rup');

        $rup = $this->M_tender->get_row_rup_byid($id_url_rup);

        $resultss = $this->M_tender->gettable_dok_penawaran_I($id_vendor, $rup['id_rup']);
        $data = [];
        $no = $_POST['start'];
        foreach ($resultss as $rs) {
            $row = array();
            $row[] = ++$no;
            $row[] = $rs->nama_dokumen_pengadaan_vendor;
            $row[] =  '<a  href="' . base_url('tender_diikuti/download_dokumen_pengadaan_vendor/') . $rs->id_dokumen_pengadaan_vendor . '" class="btn btn-info btn-sm shadow-lg text-white" <i class="fa fa-download" aria-hidden="true"></i> Download File</a>';
            $row[] = '<a href="javascript:;" class="btn btn-info btn-sm shadow-lg text-white"  onClick="by_id_dok_penawran_file_I(' . "'" . $rs->id_dokumen_pengadaan_vendor  . "','edit'" . ')"><i class="fa fa-info-circle" aria-hidden="true"></i> Edit</a><a href="javascript:;" class="btn btn-danger btn-sm shadow-lg text-white"  onClick="by_id_dok_penawran_file_I(' . "'" . $rs->id_dokumen_pengadaan_vendor  . "','hapus'" . ')"><i class="fa fa-trash" aria-hidden="true"></i> hapus</a>';
            $data[] = $row;
        }
        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->M_tender->count_all_data_dok_penawaran_I($id_vendor, $id_url_rup),
            "recordsFiltered" => $this->M_tender->count_filtered_data_dok_penawaran_I($id_vendor, $id_url_rup),
            "data" => $data
        );
        $this->output->set_content_type('application/json')->set_output(json_encode($output));
    }


    public function get_table_dok_penawaran_file_II()
    {
        $id_vendor = $this->input->post('id_vendor');
        $id_rup = $this->input->post('id_rup');
        $resultss = $this->M_tender->gettable_dok_penawaran_II($id_vendor, $id_rup);
        $data = [];
        $no = $_POST['start'];
        foreach ($resultss as $rs) {
            $row = array();
            $row[] = ++$no;
            if ($rs->dok_penawaran_harga) {
                $row[] = '<a href="' . base_url('tender_diikuti/download_dokumen_penawaran_vendor/') . $rs->id_vendor_mengikuti_paket . '" class="btn btn-info btn-sm shadow-lg text-white" <i class="fa fa-download" aria-hidden="true"></i> Download File</a>';
            } else {
                $row[] = '<span class="badge bg-danger">Belum Upload</span>';
            }


            $data[] = $row;
        }
        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->M_tender->count_all_data_dok_penawaran_II($id_vendor, $id_rup),
            "recordsFiltered" => $this->M_tender->count_filtered_data_dok_penawaran_II($id_vendor, $id_rup),
            "data" => $data
        );
        $this->output->set_content_type('application/json')->set_output(json_encode($output));
    }

    function get_by_id_dokumen_pengadaan_vendor()
    {
        $id_dokumen_pengadaan_vendor = $this->input->post('id_dokumen_pengadaan_vendor');
        $data_row_dokumen_pengadaan_vendor = $this->M_tender->row_dok_pengadaan_file_I($id_dokumen_pengadaan_vendor);
        $output = [
            'row_dokumen_pengadaan_vendor' => $data_row_dokumen_pengadaan_vendor,
        ];
        $this->output->set_content_type('application/json')->set_output(json_encode($output));
    }

    public function hapus_dokumen_pengadaan_vendor()
    {
        $id_dokumen_pengadaan_vendor = $this->input->post('id_dokumen_pengadaan_vendor');
        $this->M_tender->delete_dok_pengadaan_file_I($id_dokumen_pengadaan_vendor);
        $this->output->set_content_type('application/json')->set_output(json_encode('success'));
    }

    public function download_dokumen_pengadaan_vendor($id_dokumen_pengadaan_vendor)
    {
        $root  = $this->M_tender->row_dok_pengadaan_file_I($id_dokumen_pengadaan_vendor);
        $nama_usaha = $this->session->userdata('nama_usaha');
        $file_url = 'file_paket/' . $root['nama_rup'] . '/' .  $nama_usaha . '/' . 'DOKUMEN_PENGADAAN_FILE_I' . '/'  . $root['file_dokumen_pengadaan_vendor'];
        $url  = $file_url;
        return force_download($url, NULL);
    }

    public function download_dokumen_penawaran_vendor($id_vendor_mengikuti_paket)
    {
        $root  = $this->M_tender->get_row_vendor_mengikuti_paket($id_vendor_mengikuti_paket);
        $nama_usaha = $this->session->userdata('nama_usaha');
        $file_url = 'file_paket/' . $root['nama_rup'] . '/' .  $nama_usaha . '/' . 'DOKUMEN_PENGADAAN_FILE_II' . '/'  . $root['dok_penawaran_harga'];
        $url  = $file_url;
        return force_download($url, NULL);
    }
     public function lihat_undangan_pembuktian($id_url_rup)
    {
        $data['rup'] = $this->M_tender->get_row_rup($id_url_rup);
        $data['mengikuti'] = $this->M_tender->cek_mengikuti($data['rup']['id_rup']);
        $data['peserta'] = $this->M_tender->peserta($data['rup']['id_rup']);
        $this->load->view('info_tender/undangan_pembuktian', $data);
    }
}
