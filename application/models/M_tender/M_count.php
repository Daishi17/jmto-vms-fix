
<?php
defined('BASEPATH') or exit('No direct script access allowed');
date_default_timezone_set("Asia/Jakarta");

class M_count extends CI_Model
{
    public function count_tender_umum($id_vendor)
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

    public function count_tender_terbatas($id_vendor)
    {
        $this->db->select('*');
        $this->db->from('tbl_vendor_mengikuti_paket');
        $this->db->join('tbl_rup', 'tbl_rup.id_rup = tbl_vendor_mengikuti_paket.id_rup', 'left');
        $this->db->where('tbl_vendor_mengikuti_paket.id_vendor', $id_vendor);
        $this->db->where('tbl_rup.id_metode_pengadaan', 4);
        $this->db->where('tbl_rup.status_paket_diumumkan', 1);
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
