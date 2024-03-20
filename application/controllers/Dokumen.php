<?php
defined('BASEPATH') or exit('No direct script access allowed');
date_default_timezone_set("Asia/Jakarta");
error_reporting(0);
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
}
