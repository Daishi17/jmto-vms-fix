<?php
defined('BASEPATH') or exit('No direct script access allowed');
date_default_timezone_set("Asia/Jakarta");
error_reporting(0);
class Berita extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_datapenyedia/M_datapenyedia');
        $this->load->model('M_jenis_usaha/M_jenis_usaha');
        $this->load->model('Wilayah/Wilayah_model');
        $this->load->model('M_dashboard/M_dashboard');
        $this->load->model('M_monitoring/M_monitoring');
        $this->load->model('M_tender/M_count');
        $this->load->model('M_tender/M_tender');
        $this->load->helper('download');
        $id_vendor = $this->session->userdata('id_vendor');
        if ($this->session->userdata('id_vendor')) {
            redirect('auth/logout');
        }
    }

    function index()
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
        $data['berita'] = $this->M_tender->get_berita();
        $this->load->view('template_menu/header_menu', $data);
        $this->load->view('berita/index', $data);
        $this->load->view('template_menu/new_footer');
        $this->load->view('berita/file_public');
    }
}
