<?php
defined('BASEPATH') or exit('No direct script access allowed');
date_default_timezone_set("Asia/Jakarta");
class Dashboard extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $id_vendor = $this->session->userdata('id_vendor');
        $this->load->model('M_dashboard/M_dashboard');
        $this->load->model('M_tender/M_count');
        $this->load->model('M_tender/M_tender');
        if (!$id_vendor) {
            redirect('auth');
        }
    }

    public function index()
    {
        $id_vendor = $this->session->userdata('id_vendor');
        $data['row_vendor'] = $this->M_dashboard->get_row_vendor($id_vendor);
        $data['kualifikasi'] = str_split($data['row_vendor']['id_jenis_usaha']);

        $data['count_tender_umum'] =  $this->M_count->count_tender_umum($id_vendor);
        $data['count_tender_terbatas'] =  $this->M_count->count_tender_terbatas($id_vendor);
        $data['count_tender_terundang'] = $this->M_tender->hitung_terundang();
        // izin usaha
        $cek_siup = $this->M_dashboard->cek_vendor_tervalidasi_siup($id_vendor);
        $cek_kbli_siup = $this->M_dashboard->cek_vendor_tervalidasi_kbli_siup($id_vendor);
        $cek_nib = $this->M_dashboard->cek_vendor_tervalidasi_nib($id_vendor);
        $cek_kbli_nib = $this->M_dashboard->cek_vendor_tervalidasi_kbli_nib($id_vendor);
        $cek_sbu = $this->M_dashboard->cek_vendor_tervalidasi_sbu($id_vendor);
        $cek_kbli_sbu = $this->M_dashboard->cek_vendor_tervalidasi_kbli_sbu($id_vendor);
        $cek_siujk = $this->M_dashboard->cek_vendor_tervalidasi_siujk($id_vendor);
        $cek_kbli_siujk = $this->M_dashboard->cek_vendor_tervalidasi_kbli_siujk($id_vendor);

        // akta
        $cek_akta_pendirian = $this->M_dashboard->cek_vendor_tervalidasi_akta_pendirian($id_vendor);
        $cek_akta_perubahan = $this->M_dashboard->cek_vendor_tervalidasi_akta_perubahan($id_vendor);
        // end akta

        // manajerial
        $cek_pemilik = $this->M_dashboard->cek_vendor_tervalidasi_pemilik($id_vendor);
        $cek_pengurus = $this->M_dashboard->cek_vendor_tervalidasi_pengurus($id_vendor);
        // end manajerial

        // pengalaman
        $cek_pengalaman = $this->M_dashboard->cek_vendor_tervalidasi_pengalaman($id_vendor);
        // end pengalaman

        // pajak
        $cek_sppkp = $this->M_dashboard->cek_vendor_tervalidasi_sppkp($id_vendor);
        $cek_npwp = $this->M_dashboard->cek_vendor_tervalidasi_npwp($id_vendor);
        $cek_spt = $this->M_dashboard->cek_vendor_tervalidasi_spt($id_vendor);
        $cek_neraca_keuangan = $this->M_dashboard->cek_vendor_tervalidasi_neraca_keuangan($id_vendor);
        $cek_keuangan = $this->M_dashboard->cek_vendor_tervalidasi_keuangan($id_vendor);
        // end pajak


        // tidak valid
        $cek_tdk_valid_siup = $this->M_dashboard->cek_vendor_tdk_valid_siup($id_vendor);
        $cek_tdk_valid_kbli_siup = $this->M_dashboard->cek_vendor_tdk_valid_kbli_siup($id_vendor);
        $cek_tdk_valid_nib = $this->M_dashboard->cek_vendor_tdk_valid_nib($id_vendor);
        $cek_tdk_valid_kbli_nib = $this->M_dashboard->cek_vendor_tdk_valid_kbli_nib($id_vendor);
        $cek_tdk_valid_sbu = $this->M_dashboard->cek_vendor_tdk_valid_sbu($id_vendor);
        $cek_tdk_valid_kbli_sbu = $this->M_dashboard->cek_vendor_tdk_valid_kbli_sbu($id_vendor);
        $cek_tdk_valid_siujk = $this->M_dashboard->cek_vendor_tdk_valid_siujk($id_vendor);
        $cek_tdk_valid_kbli_siujk = $this->M_dashboard->cek_vendor_tdk_valid_kbli_siujk($id_vendor);

        // akta
        $cek_tdk_valid_akta_pendirian = $this->M_dashboard->cek_vendor_tdk_valid_akta_pendirian($id_vendor);
        $cek_tdk_valid_akta_perubahan = $this->M_dashboard->cek_vendor_tdk_valid_akta_perubahan($id_vendor);
        // end akta

        // manajerial
        $cek_tdk_valid_pemilik = $this->M_dashboard->cek_vendor_tdk_valid_pemilik($id_vendor);
        $cek_tdk_valid_pengurus = $this->M_dashboard->cek_vendor_tdk_valid_pengurus($id_vendor);
        // end manajerial

        // pengalaman
        $cek_tdk_valid_pengalaman = $this->M_dashboard->cek_vendor_tdk_valid_pengalaman($id_vendor);
        // end pengalaman

        // pajak
        $cek_tdk_valid_sppkp = $this->M_dashboard->cek_vendor_tdk_valid_sppkp($id_vendor);
        $cek_tdk_valid_npwp = $this->M_dashboard->cek_vendor_tdk_valid_npwp($id_vendor);
        $cek_tdk_valid_spt = $this->M_dashboard->cek_vendor_tdk_valid_spt($id_vendor);
        $cek_tdk_valid_neraca_keuangan = $this->M_dashboard->cek_vendor_tdk_valid_neraca_keuangan($id_vendor);
        $cek_tdk_valid_keuangan = $this->M_dashboard->cek_vendor_tdk_valid_keuangan($id_vendor);
        // end pajak
        // end tidak valid
        $id_vendor = $this->session->userdata('id_vendor');
        $data['notifikasi'] = $this->M_dashboard->count_notifikasi($id_vendor);
        $data['count_tdk_validate'] =  $cek_tdk_valid_siup + $cek_tdk_valid_kbli_siup + $cek_tdk_valid_nib + $cek_tdk_valid_kbli_nib + $cek_tdk_valid_sbu + $cek_tdk_valid_kbli_sbu + $cek_tdk_valid_akta_pendirian + $cek_tdk_valid_pemilik + $cek_tdk_valid_pengurus + $cek_tdk_valid_pengalaman + $cek_tdk_valid_sppkp + $cek_tdk_valid_npwp + $cek_tdk_valid_spt + $cek_tdk_valid_neraca_keuangan + $cek_tdk_valid_keuangan;

        $data['count_validate'] = $cek_siup + $cek_kbli_siup + $cek_nib + $cek_kbli_nib + $cek_sbu + $cek_kbli_sbu + $cek_akta_pendirian + $cek_pemilik + $cek_pengurus + $cek_pengalaman + $cek_sppkp + $cek_npwp + $cek_spt + $cek_neraca_keuangan + $cek_keuangan;


        $this->load->view('template_menu/header_menu', $data);
        $this->load->view('dashboard/index', $data);
        $this->load->view('template_menu/new_footer');
        $this->load->view('dashboard/file_public');
        // angga
        // $this->load->view('dashboard/ajax');
    }


    function get_dokumen_vendor($id_vendor)
    {
        // $id_vendor = $this->M_dashboard->get_row_vendor($id_vendor);
        $row_siup = $this->M_dashboard->get_row_siup($id_vendor);
        $kbli_siup = $this->M_dashboard->get_result_siup_kbli($id_vendor);

        $row_nib = $this->M_dashboard->get_row_nib($id_vendor);
        $kbli_nib = $this->M_dashboard->get_result_nib_kbli($id_vendor);

        $row_sbu = $this->M_dashboard->get_row_sbu($id_vendor);
        $kbli_sbu = $this->M_dashboard->get_result_sbu_kbli($id_vendor);

        $row_siujk = $this->M_dashboard->get_row_siujk($id_vendor);
        $kbli_siujk = $this->M_dashboard->get_result_siujk_kbli($id_vendor);
        $kbli_skdp = $this->M_dashboard->get_result_skdp_kbli($id_vendor);
        $row_akta_pendirian = $this->M_dashboard->get_row_akta_pendirian($id_vendor);
        $row_akta_perubahan = $this->M_dashboard->get_row_akta_perubahan($id_vendor);

        $get_row_pemilik_manajerial = $this->M_dashboard->get_row_pemilik_manajerial($id_vendor);
        $get_result_pemilik_manajerial = $this->M_dashboard->get_result_pemilik_manajerial($id_vendor);

        $get_row_pengurus_manajerial = $this->M_dashboard->get_row_pengurus_manajerial($id_vendor);
        $get_result_pengurus_manajerial = $this->M_dashboard->get_result_pengurus_manajerial($id_vendor);

        $row_pengalaman = $this->M_dashboard->get_row_pengalaman($id_vendor);
        $result_pengalaman = $this->M_dashboard->get_result_pengalaman($id_vendor);

        $row_sppkp = $this->M_dashboard->get_row_sppkp($id_vendor);
        $row_npwp = $this->M_dashboard->get_row_npwp($id_vendor);

        $row_spt = $this->M_dashboard->get_row_spt($id_vendor);
        $result_spt = $this->M_dashboard->get_result_spt($id_vendor);

        $row_neraca = $this->M_dashboard->get_row_neraca($id_vendor);
        $result_neraca = $this->M_dashboard->get_result_neraca($id_vendor);

        $row_keuangan = $this->M_dashboard->get_row_keuangan($id_vendor);
        $result_keuangan = $this->M_dashboard->get_result_keuangan($id_vendor);

        $row_skdp = $this->M_dashboard->get_row_skdp($id_vendor);
        $row_lainnya = $this->M_dashboard->get_row_lainnya($id_vendor);
        $response = [
            'row_siup' => $row_siup,
            'row_nib' => $row_nib,
            'row_sbu' => $row_sbu,
            'row_siujk' => $row_siujk,
            'row_akta_pendirian' => $row_akta_pendirian,
            'row_akta_perubahan' => $row_akta_perubahan,
            'row_pemilik_manajerial' => $get_row_pemilik_manajerial,
            'row_pengurus_manajerial' => $get_row_pengurus_manajerial,
            'row_pengalaman' => $row_pengalaman,
            'row_sppkp' => $row_sppkp,
            'row_npwp' => $row_npwp,
            'row_spt' => $row_spt,
            'row_neraca' => $row_neraca,
            'row_keuangan' => $row_keuangan,
            'kbli_siup' => $kbli_siup,
            'kbli_nib' => $kbli_nib,
            'kbli_sbu' => $kbli_sbu,
            'kbli_siujk' => $kbli_siujk,
            'kbli_skdp' => $kbli_skdp,
            'pemilik' => $get_result_pemilik_manajerial,
            'pengurus' => $get_result_pengurus_manajerial,
            'pengalaman' => $result_pengalaman,
            'spt' => $result_spt,
            'keuangan' => $result_keuangan,
            'neraca' => $result_neraca,
            'row_skdp' => $row_skdp,
            'row_lainnya' => $row_lainnya
        ];
        $this->output->set_content_type('application/json')->set_output(json_encode($response));
    }
    function get_datatable_pengajuan_perubahan_dokumen()
    {
        $result = $this->M_dashboard->getdatatable_pengajuan_dokumen();
        $data = [];
        $no = $_POST['start'];
        foreach ($result as $res) {
            $row = array();
            $row[] = ++$no;
            $row[] = $res->jenis_dokumen_perubahan;
            $row[] = $res->waktu_pengajuan;
            if ($res->status_perubahan_dokumen == 1) {
                $row[] = '<small><span class="badge bg-warning">Dalam Prosess</span></small>';
            } else if ($res->status_perubahan_dokumen == 2) {
                $row[] = '<small><span class="badge bg-success">Berhasil Di Setujui</span></small>';
            } else {
                $row[] = '<small><span class="badge bg-danger">Pengajuan Ditolak</span></small>';
            }
            if ($res->sts_upload_dokumen_perubahan == 1) {
                $row[] = '<small><span class="badge bg-danger">Belum Upload Perubahan Dokumen</span></small>';
            } else {
                $row[] = '<small><span class="badge bg-success">Sudah Upload</span></small>';
            }
            $row[] = '<a href="javascript:;" onclick="Hapus_pengajuan(' . $res->id_dokumen_perubahan . ')" class="btn btn-danger btn-sm"><i class="fas fa fa-trash"></i></a>';
            $data[] = $row;
        }
        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->M_dashboard->count_all_pengajuan_dokumen(),
            "recordsFiltered" => $this->M_dashboard->count_filtered_pengajuan_dokumen(),
            "data" => $data
        );
        $this->output->set_content_type('application/json')->set_output(json_encode($output));
    }

    function add_pengajuan()
    {

        $id_vendor = $this->session->userdata('id_vendor');
        $jenis_dokumen_perubahan = $this->input->post('jenis_dokumen_perubahan');
        $cek_dokumen_pengajuan = $this->M_dashboard->cek_jika_sudah_ada_pengajuan($jenis_dokumen_perubahan);
        if ($cek_dokumen_pengajuan) {
            $response = [
                'validasi' => 'Jenis Dokumen ' . $jenis_dokumen_perubahan . ' Sudah Di Ajukan & Dalam Prosess',
            ];
        } else {
            $data = [
                'id_vendor' => $id_vendor,
                'jenis_dokumen_perubahan' => $jenis_dokumen_perubahan,
                'waktu_pengajuan' => date('Y-m-d H:i'),
                'status_perubahan_dokumen' => 1,
                'sts_upload_dokumen_perubahan' => 1,
            ];
            $response = [
                'success' => 'Berhasil Membuat Pengajuan Dokumen',
            ];
            $this->M_dashboard->tambah_dokumen_pengajuan($data);
            $row_trakhir_pengajuan = $this->M_dashboard->cek_row_pengajuan_terakhir($jenis_dokumen_perubahan);
            if ($jenis_dokumen_perubahan == 'pemilik_perusahaan' || $jenis_dokumen_perubahan == 'pengurus_perusahaan' || $jenis_dokumen_perubahan == 'pengalaman_perusahaan' || $jenis_dokumen_perubahan == 'spt' || $jenis_dokumen_perubahan == 'laporan_keuangan' || $jenis_dokumen_perubahan == 'neraca_keuangan') {
                $where = [
                    'id_vendor' => $id_vendor
                ];
                $data_update = [
                    'id_dokumen_perubahan_' . $jenis_dokumen_perubahan . '' => $row_trakhir_pengajuan['id_dokumen_perubahan'],
                ];
                $this->M_datapenyedia->update_id_pengajun_result_by_vendor($data_update, $where);
            } else {
                $where = [
                    'id_vendor' => $id_vendor
                ];
                $data_update = [
                    'id_dokumen_perubahan' => $row_trakhir_pengajuan['id_dokumen_perubahan'],
                ];
                $global_update_dokumen = 'update_' . $jenis_dokumen_perubahan . '';
                $this->M_datapenyedia->$global_update_dokumen($data_update, $where);
            }
        }
        $this->output->set_content_type('application/json')->set_output(json_encode($response));
    }

    public function hapus_dokumen_pengajuan()
    {
        $where = [
            'id_dokumen_perubahan' => $this->input->post('id_dokumen_perubahan')
        ];
        $this->M_dashboard->delete_dokumen_pengajuan($where);
        $this->output->set_content_type('application/json')->set_output(json_encode('success'));
    }
}
