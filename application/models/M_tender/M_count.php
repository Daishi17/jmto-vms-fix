
<?php
defined('BASEPATH') or exit('No direct script access allowed');
date_default_timezone_set("Asia/Jakarta");

class M_count extends CI_Model
{
    public function count_tender_umum($id_vendor)
    {
        $id_vendor = $this->session->userdata('id_vendor');
        $this->db->select('*');
        $this->db->from('tbl_rup');
        $this->db->join('tbl_vendor_mengikuti_paket', 'tbl_rup.id_rup = tbl_vendor_mengikuti_paket.id_rup', 'left');
        $this->db->join('tbl_izin_rup', 'tbl_rup.id_rup = tbl_izin_rup.id_rup', 'left');
        $this->db->join('tbl_izin_teknis_rup', 'tbl_rup.id_rup = tbl_izin_teknis_rup.id_rup', 'left');
        $this->db->join('tbl_syratat_kbli_tender', 'tbl_rup.id_rup = tbl_syratat_kbli_tender.id_rup', 'left');
        $this->db->join('tbl_syratat_sbu_tender', 'tbl_rup.id_rup = tbl_syratat_sbu_tender.id_rup', 'left');
        $this->db->join('tbl_departemen', 'tbl_rup.id_departemen = tbl_departemen.id_departemen', 'left');
        $this->db->join('tbl_section', 'tbl_rup.id_section = tbl_section.id_section', 'left');
        $this->db->join('tbl_jenis_pengadaan', 'tbl_rup.id_jenis_pengadaan = tbl_jenis_pengadaan.id_jenis_pengadaan', 'left');
        $this->db->where('tbl_rup.status_paket_diumumkan', 1);
        $this->db->where('tbl_rup.id_metode_pengadaan', 1);
        // $this->db->like('tbl_rup.data_vendor_terundang', $id_vendor);
        $this->db->group_start();
        $this->db->where('FIND_IN_SET(' . $id_vendor . ', tbl_rup.data_vendor_terundang) !=', 0);
        $this->db->or_where('tbl_rup.data_vendor_terundang', '[]');
        $this->db->group_end();
        $this->db->group_by('tbl_rup.id_rup');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function count_tender_terbatas($id_vendor)
    {
        $this->db->select('*');
        $this->db->from('tbl_vendor_mengikuti_paket');
        $this->db->join('tbl_rup', 'tbl_rup.id_rup = tbl_vendor_mengikuti_paket.id_rup', 'left');
        $this->db->where('tbl_vendor_mengikuti_paket.id_vendor', $id_vendor);
        $this->db->where('tbl_rup.id_metode_pengadaan', 4);
        $this->db->where('tbl_rup.status_paket_panitia', 2);
        $this->db->where('tbl_rup.status_paket_diumumkan', 1);
        // $this->db->where('tbl_vendor_mengikuti_paket.sts_mengikuti_paket', 1);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function count_tender_umum_diikuti($id_vendor)
    {
        $this->db->select('*');
        $this->db->from('tbl_vendor_mengikuti_paket');
        $this->db->join('tbl_rup', 'tbl_rup.id_rup = tbl_vendor_mengikuti_paket.id_rup', 'left');
        $this->db->where('tbl_vendor_mengikuti_paket.id_vendor', $id_vendor);
        $this->db->where('tbl_vendor_mengikuti_paket.sts_mengikuti_paket', 1);
        $this->db->where('tbl_rup.id_metode_pengadaan', 1);
        $this->db->where('tbl_rup.status_paket_diumumkan', 1);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function count_tender_terbatas_diikuti($id_vendor)
    {
        $this->db->select('*');
        $this->db->from('tbl_vendor_mengikuti_paket');
        $this->db->join('tbl_rup', 'tbl_rup.id_rup = tbl_vendor_mengikuti_paket.id_rup', 'left');
        $this->db->where('tbl_vendor_mengikuti_paket.id_vendor', $id_vendor);
        $this->db->where('tbl_vendor_mengikuti_paket.sts_mengikuti_paket', 1);
        $this->db->where('tbl_rup.id_metode_pengadaan', 4);
        $this->db->where('tbl_rup.status_paket_diumumkan', 1);
        $query = $this->db->get();
        return $query->result_array();
    }


    // penunjukan_langsung
    public function count_tender_penunjukan_langsung($id_vendor)
    {
        $this->db->select('*');
        $this->db->from('tbl_vendor_mengikuti_paket');
        $this->db->join('tbl_rup', 'tbl_rup.id_rup = tbl_vendor_mengikuti_paket.id_rup', 'left');
        $this->db->where('tbl_vendor_mengikuti_paket.id_vendor', $id_vendor);
        $this->db->where('tbl_rup.id_metode_pengadaan', 3);
        $this->db->where('tbl_rup.status_paket_diumumkan', 1);
        $this->db->group_by('tbl_rup.id_rup');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function count_tender_penunjukan_langsung_diikuti($id_vendor)
    {
        $this->db->select('*');
        $this->db->from('tbl_vendor_mengikuti_paket');
        $this->db->join('tbl_rup', 'tbl_rup.id_rup = tbl_vendor_mengikuti_paket.id_rup', 'left');
        $this->db->where('tbl_vendor_mengikuti_paket.id_vendor', $id_vendor);
        $this->db->where('tbl_vendor_mengikuti_paket.sts_mengikuti_paket', 1);
        $this->db->where('tbl_rup.id_metode_pengadaan', 3);
        $this->db->where('tbl_rup.status_paket_diumumkan', 1);
        $query = $this->db->get();
        return $query->result_array();
    }
}
