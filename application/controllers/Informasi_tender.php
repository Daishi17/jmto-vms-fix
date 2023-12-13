<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Tender_umum extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $id_vendor = $this->session->userdata('id_vendor');
        $this->load->model('M_dashboard/M_dashboard');
        if (!$id_vendor) {
            redirect('auth');
        }
    }

    public function index()
    {
        $id_vendor = $this->session->userdata('id_vendor');
        $data['notifikasi'] = $this->M_dashboard->count_notifikasi($id_vendor);
        $data['count_tender_penunjukan_langsung'] =  $this->M_count->count_tender_penunjukan_langsung($id_vendor);
        $this->load->view('template_menu/header_menu', $data);
        $this->load->view('info_tender/index');
        $this->load->view('template_menu/new_footer');
        $this->load->view('info_tender/ajax');
    }
}
