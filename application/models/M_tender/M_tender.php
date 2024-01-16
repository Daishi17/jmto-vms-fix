
<?php
defined('BASEPATH') or exit('No direct script access allowed');
date_default_timezone_set("Asia/Jakarta");

class M_tender extends CI_Model
{

    var $order =  array('tbl_rup.id_rup', 'tbl_rup.nama_rup', 'tbl_rup.tahun_rup', 'tbl_departemen.nama_departemen', 'tbl_jenis_pengadaan.nama_jenis_pengadaan', 'tbl_rup.total_hps_rup', 'tbl_rup.batas_pendaftaran_tender', 'tbl_rup.id_rup');

    // get nib

    public function hitung_terundang()
    {
        // session vendor
        $id_vendor = $this->session->userdata('id_vendor');

        // get izin usaha
        $nib_vendor = $this->get_nib_vendor($id_vendor);
        $nib_vendor_kbli = $this->get_nib_vendor_kbli($id_vendor);

        $siup_vendor = $this->get_siup_vendor($id_vendor);
        $siup_vendor_kbli = $this->get_siup_vendor_kbli($id_vendor);

        $siujk_vendor = $this->get_siujk_vendor($id_vendor);
        $siujk_vendor_kbli = $this->get_siujk_vendor_kbli($id_vendor);

        $skdp_vendor = $this->get_skdp_vendor($id_vendor);
        $skdp_vendor_kbli = $this->get_skdp_vendor_kbli($id_vendor);

        $sbu_vendor = $this->get_sbu_vendor($id_vendor);
        $sbu_vendor_kode = $this->get_sbu_vendor_kode($id_vendor);

        // get teknis
        $spt_vendor = $this->get_spt_vendor($id_vendor);
        $keuangan = $this->get_keuangan_vendor($id_vendor);
        $keuangan_audit = $this->get_keuangan_audit_vendor($id_vendor);

        $neraca = $this->get_neraca_vendor($id_vendor);
        $neraca_mulai = $this->get_neraca_vendor_mulai($id_vendor);
        $neraca_selesai = $this->get_neraca_vendor_selesai($id_vendor);
        $now = date('Y-m-d');
        $this->db->select('*');
        $this->db->from('tbl_rup');
        $this->db->join('tbl_izin_rup', 'tbl_rup.id_rup = tbl_izin_rup.id_rup', 'left');
        $this->db->join('tbl_izin_teknis_rup', 'tbl_rup.id_rup = tbl_izin_teknis_rup.id_rup', 'left');
        $this->db->join('tbl_syratat_kbli_tender', 'tbl_rup.id_rup = tbl_syratat_kbli_tender.id_rup', 'left');
        $this->db->join('tbl_syratat_sbu_tender', 'tbl_rup.id_rup = tbl_syratat_sbu_tender.id_rup', 'left');
        $this->db->join('tbl_departemen', 'tbl_rup.id_departemen = tbl_departemen.id_departemen', 'left');
        $this->db->join('tbl_section', 'tbl_rup.id_section = tbl_section.id_section', 'left');
        $this->db->join('tbl_jenis_pengadaan', 'tbl_rup.id_jenis_pengadaan = tbl_jenis_pengadaan.id_jenis_pengadaan', 'left');
        $this->db->where('tbl_rup.status_paket_diumumkan', 1);
        $this->db->where('tbl_rup.id_metode_pengadaan', 1);
        // if ($nib_vendor) {
        //     if ($nib_vendor_kbli) {
        //         $this->db->where_in('tbl_syratat_kbli_tender.id_kbli',  $nib_vendor_kbli);
        //         if ($nib_vendor['sts_seumur_hidup'] == 2) {
        //             $this->db->where('tbl_izin_rup.sts_masa_berlaku_nib', 2);
        //             $this->db->where('tbl_izin_rup.tgl_berlaku_nib <=', date('Y-m-d', strtotime('+50 year', strtotime($now))));
        //         } else {
        //             $this->db->where('tbl_izin_rup.tgl_berlaku_nib <=', $nib_vendor['tgl_berlaku']);
        //         }
        //     }
        // }

        // if ($siup_vendor) {
        //     if ($siup_vendor_kbli) {
        //         $this->db->where_in('tbl_syratat_kbli_tender.id_kbli',  $siup_vendor_kbli);
        //         if ($siup_vendor['sts_seumur_hidup'] == 2) {
        //             $this->db->where('tbl_izin_rup.sts_masa_berlaku_siup', 2);
        //             $this->db->where('tbl_izin_rup.tgl_berlaku_siup <=', date('Y-m-d', strtotime('+50 year', strtotime($now))));
        //         } else {
        //             $this->db->where('tbl_izin_rup.tgl_berlaku_siup <=', $siup_vendor['tgl_berlaku']);
        //         }
        //     }
        // }


        // if ($siujk_vendor) {
        //     if ($siujk_vendor_kbli) {
        //         $this->db->where_in('tbl_syratat_kbli_tender.id_kbli',  $siujk_vendor_kbli);
        //         if ($siujk_vendor['sts_seumur_hidup'] == 2) {
        //             $this->db->where('tbl_izin_rup.sts_masa_berlaku_siujk', 2);
        //             $this->db->where('tbl_izin_rup.tgl_berlaku_nib <=', date('Y-m-d', strtotime('+50 year', strtotime($now))));
        //         } else {
        //             $this->db->where('tbl_izin_rup.tgl_berlaku_siujk <=', $siujk_vendor['tgl_berlaku']);
        //         }
        //     }
        // }

        // if ($skdp_vendor) {
        //     if ($skdp_vendor_kbli) {
        //         $this->db->where_in('tbl_syratat_kbli_tender.id_kbli',  $skdp_vendor_kbli);
        //         if ($skdp_vendor['sts_seumur_hidup'] == 2) {
        //             $this->db->where('tbl_izin_rup.sts_masa_berlaku_skdp', 2);
        //             $this->db->where('tbl_izin_rup.tgl_berlaku_skdp <=', date('Y-m-d', strtotime('+50 year', strtotime($now))));
        //         } else {
        //             $this->db->where('tbl_izin_rup.tgl_berlaku_skdp <=', $skdp_vendor['tgl_berlaku']);
        //         }
        //     }
        // }

        // if ($sbu_vendor) {
        //     if ($sbu_vendor_kode) {
        //         $this->db->where_in('tbl_syratat_sbu_tender.id_sbu',  $sbu_vendor_kode);
        //         if ($sbu_vendor['sts_seumur_hidup'] == 2) {
        //             $this->db->where('tbl_izin_rup.sts_masa_berlaku_sbu', 2);
        //             $this->db->where('tbl_izin_rup.tgl_berlaku_sbu <=', date('Y-m-d', strtotime('+50 year', strtotime($now))));
        //         } else {
        //             $this->db->where('tbl_izin_rup.tgl_berlaku_sbu <=', $sbu_vendor['tgl_berlaku']);
        //         }
        //     }
        // }


        // if ($spt_vendor) {
        //     $this->db->where('tbl_izin_teknis_rup.tahun_lapor_spt <=', $spt_vendor['tahun_lapor']);
        // } else {
        // }

        // if ($keuangan) {
        //     $this->db->where('tbl_izin_teknis_rup.tahun_awal_laporan_keuangan <=', $keuangan['tahun_lapor']);
        //     $this->db->where('tbl_izin_teknis_rup.tahun_akhir_laporan_keuangan >=', $keuangan['tahun_lapor']);

        //     $this->db->where_in('tbl_izin_teknis_rup.sts_audit_laporan_keuangan',  $keuangan_audit);
        // } else {
        // }

        // if ($neraca) {
        //     $this->db->where('tbl_izin_teknis_rup.tahun_awal_neraca_keuangan <=', $neraca_selesai['sls']);
        //     $this->db->where('tbl_izin_teknis_rup.tahun_akhir_neraca_keuangan >=', $neraca_mulai['mulai']);
        // } else {
        // }
        $this->db->group_by('tbl_rup.id_rup');
        $query = $this->db->get();
        return $query->result_array();
    }

    private function _get_data_query()
    {
        // session vendor
        $id_vendor = $this->session->userdata('id_vendor');

        // get izin usaha
        $nib_vendor = $this->get_nib_vendor($id_vendor);
        $nib_vendor_kbli = $this->get_nib_vendor_kbli($id_vendor);

        $siup_vendor = $this->get_siup_vendor($id_vendor);
        $siup_vendor_kbli = $this->get_siup_vendor_kbli($id_vendor);

        $siujk_vendor = $this->get_siujk_vendor($id_vendor);
        $siujk_vendor_kbli = $this->get_siujk_vendor_kbli($id_vendor);

        $skdp_vendor = $this->get_skdp_vendor($id_vendor);
        $skdp_vendor_kbli = $this->get_skdp_vendor_kbli($id_vendor);

        $sbu_vendor = $this->get_sbu_vendor($id_vendor);
        $sbu_vendor_kode = $this->get_sbu_vendor_kode($id_vendor);

        // get teknis
        $spt_vendor = $this->get_spt_vendor($id_vendor);
        $keuangan = $this->get_keuangan_vendor($id_vendor);
        $keuangan_audit = $this->get_keuangan_audit_vendor($id_vendor);

        $neraca = $this->get_neraca_vendor($id_vendor);
        $neraca_mulai = $this->get_neraca_vendor_mulai($id_vendor);
        $neraca_selesai = $this->get_neraca_vendor_selesai($id_vendor);
        $now = date('Y-m-d');
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
        // if ($nib_vendor) {
        //     if ($nib_vendor_kbli) {
        //         $this->db->where_in('tbl_syratat_kbli_tender.id_kbli',  $nib_vendor_kbli);
        //         if ($nib_vendor['sts_seumur_hidup'] == 2) {
        //             $this->db->where('tbl_izin_rup.sts_masa_berlaku_nib', 2);
        //             $this->db->where('tbl_izin_rup.tgl_berlaku_nib <=', date('Y-m-d', strtotime('+50 year', strtotime($now))));
        //         } else {
        //             $this->db->where('tbl_izin_rup.tgl_berlaku_nib <=', $nib_vendor['tgl_berlaku']);
        //         }
        //     }
        // }

        // if ($siup_vendor) {
        //     if ($siup_vendor_kbli) {
        //         $this->db->where_in('tbl_syratat_kbli_tender.id_kbli',  $siup_vendor_kbli);
        //         if ($siup_vendor['sts_seumur_hidup'] == 2) {
        //             $this->db->where('tbl_izin_rup.sts_masa_berlaku_siup', 2);
        //             $this->db->where('tbl_izin_rup.tgl_berlaku_siup <=', date('Y-m-d', strtotime('+50 year', strtotime($now))));
        //         } else {
        //             $this->db->where('tbl_izin_rup.tgl_berlaku_siup <=', $siup_vendor['tgl_berlaku']);
        //         }
        //     }
        // }


        // if ($siujk_vendor) {
        //     if ($siujk_vendor_kbli) {
        //         $this->db->where_in('tbl_syratat_kbli_tender.id_kbli',  $siujk_vendor_kbli);
        //         if ($siujk_vendor['sts_seumur_hidup'] == 2) {
        //             $this->db->where('tbl_izin_rup.sts_masa_berlaku_siujk', 2);
        //             $this->db->where('tbl_izin_rup.tgl_berlaku_nib <=', date('Y-m-d', strtotime('+50 year', strtotime($now))));
        //         } else {
        //             $this->db->where('tbl_izin_rup.tgl_berlaku_siujk <=', $siujk_vendor['tgl_berlaku']);
        //         }
        //     }
        // }

        // if ($skdp_vendor) {
        //     if ($skdp_vendor_kbli) {
        //         $this->db->where_in('tbl_syratat_kbli_tender.id_kbli',  $skdp_vendor_kbli);
        //         if ($skdp_vendor['sts_seumur_hidup'] == 2) {
        //             $this->db->where('tbl_izin_rup.sts_masa_berlaku_skdp', 2);
        //             $this->db->where('tbl_izin_rup.tgl_berlaku_skdp <=', date('Y-m-d', strtotime('+50 year', strtotime($now))));
        //         } else {
        //             $this->db->where('tbl_izin_rup.tgl_berlaku_skdp <=', $skdp_vendor['tgl_berlaku']);
        //         }
        //     }
        // }

        // if ($sbu_vendor) {
        //     if ($sbu_vendor_kode) {
        //         $this->db->where_in('tbl_syratat_sbu_tender.id_sbu',  $sbu_vendor_kode);
        //         if ($sbu_vendor['sts_seumur_hidup'] == 2) {
        //             $this->db->where('tbl_izin_rup.sts_masa_berlaku_sbu', 2);
        //             $this->db->where('tbl_izin_rup.tgl_berlaku_sbu <=', date('Y-m-d', strtotime('+50 year', strtotime($now))));
        //         } else {
        //             $this->db->where('tbl_izin_rup.tgl_berlaku_sbu <=', $sbu_vendor['tgl_berlaku']);
        //         }
        //     }
        // }


        // if ($spt_vendor) {
        //     $this->db->where('tbl_izin_teknis_rup.tahun_lapor_spt <=', $spt_vendor['tahun_lapor']);
        // } else {
        // }

        // if ($keuangan) {
        //     $this->db->where('tbl_izin_teknis_rup.tahun_awal_laporan_keuangan <=', $keuangan['tahun_lapor']);
        //     $this->db->where('tbl_izin_teknis_rup.tahun_akhir_laporan_keuangan >=', $keuangan['tahun_lapor']);
        //     $this->db->where_in('tbl_izin_teknis_rup.sts_audit_laporan_keuangan',  $keuangan_audit);
        // } else {
        // }

        // if ($neraca) {
        //     $this->db->where('tbl_izin_teknis_rup.tahun_awal_neraca_keuangan <=', $neraca_selesai['sls']);
        //     $this->db->where('tbl_izin_teknis_rup.tahun_akhir_neraca_keuangan >=', $neraca_mulai['mulai']);
        // } else {
        // }
        $this->db->group_by('tbl_rup.id_rup');
        $i = 0;
        foreach ($this->order as $item) // looping awal
        {
            if ($_POST['search']['value']) // jika datatable mengirimkan pencarian dengan metode POST
            {

                if ($i === 0) // looping awal
                {
                    $this->db->group_start();
                    $this->db->like($item, $_POST['search']['value']);
                } else {
                    $this->db->or_like(
                        $item,
                        $_POST['search']['value']
                    );
                }

                if (count($this->order) - 1 == $i)
                    $this->db->group_end();
            }
            $i++;
        }
        if (isset($_POST['order'])) {
            $this->db->order_by($this->order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } else {
            $this->db->order_by('tbl_rup.id_rup', 'DESC');
        }
    }

    public function gettable() //nam[ilin data pake ini
    {
        $this->_get_data_query(); //ambil data dari get yg di atas
        if ($_POST['length'] != -1) {
            $this->db->limit($_POST['length'], $_POST['start']);
        }
        $query = $this->db->get();
        return $query->result();
    }
    public function count_filtered_data()
    {
        $this->_get_data_query(); //ambil data dari get yg di atas
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function count_all_data()
    {
        $id_vendor = $this->session->userdata('id_vendor');

        // get izin usaha
        $nib_vendor = $this->get_nib_vendor($id_vendor);
        $nib_vendor_kbli = $this->get_nib_vendor_kbli($id_vendor);

        $siup_vendor = $this->get_siup_vendor($id_vendor);
        $siup_vendor_kbli = $this->get_siup_vendor_kbli($id_vendor);

        $siujk_vendor = $this->get_siujk_vendor($id_vendor);
        $siujk_vendor_kbli = $this->get_siujk_vendor_kbli($id_vendor);

        $skdp_vendor = $this->get_skdp_vendor($id_vendor);
        $skdp_vendor_kbli = $this->get_skdp_vendor_kbli($id_vendor);

        $sbu_vendor = $this->get_sbu_vendor($id_vendor);
        $sbu_vendor_kode = $this->get_sbu_vendor_kode($id_vendor);

        // get teknis
        $spt_vendor = $this->get_spt_vendor($id_vendor);
        $keuangan = $this->get_keuangan_vendor($id_vendor);
        $keuangan_audit = $this->get_keuangan_audit_vendor($id_vendor);

        $neraca = $this->get_neraca_vendor($id_vendor);
        $neraca_mulai = $this->get_neraca_vendor_mulai($id_vendor);
        $neraca_selesai = $this->get_neraca_vendor_selesai($id_vendor);


        $this->db->select('*');
        $this->db->from('tbl_rup');
        $this->db->join('tbl_izin_rup', 'tbl_rup.id_rup = tbl_izin_rup.id_rup', 'left');
        $this->db->join('tbl_izin_teknis_rup', 'tbl_rup.id_rup = tbl_izin_teknis_rup.id_rup', 'left');
        $this->db->join('tbl_syratat_kbli_tender', 'tbl_rup.id_rup = tbl_syratat_kbli_tender.id_rup', 'left');
        $this->db->join('tbl_syratat_sbu_tender', 'tbl_rup.id_rup = tbl_syratat_sbu_tender.id_rup', 'left');
        $this->db->join('tbl_departemen', 'tbl_rup.id_departemen = tbl_departemen.id_departemen', 'left');
        $this->db->join('tbl_section', 'tbl_rup.id_section = tbl_section.id_section', 'left');
        $this->db->join('tbl_jenis_pengadaan', 'tbl_rup.id_jenis_pengadaan = tbl_jenis_pengadaan.id_jenis_pengadaan', 'left');
        $this->db->where('tbl_rup.status_paket_diumumkan', 1);
        $this->db->where('tbl_rup.id_metode_pengadaan', 1);
        if ($nib_vendor) {
            if ($nib_vendor_kbli) {
                $this->db->where_in('tbl_syratat_kbli_tender.id_kbli',  $nib_vendor_kbli);
                if ($nib_vendor['sts_seumur_hidup'] == 2) {
                    $this->db->where('tbl_izin_rup.sts_masa_berlaku_nib', 2);
                    // $this->db->or_where('tbl_izin_rup.tgl_berlaku_nib >=', $nib_vendor['tgl_berlaku']);
                } else {
                    $this->db->where('tbl_izin_rup.tgl_berlaku_nib >=', $nib_vendor['tgl_berlaku']);
                }
            }
        }

        if ($siup_vendor) {
            if ($siup_vendor_kbli) {
                $this->db->where_in('tbl_syratat_kbli_tender.id_kbli',  $siup_vendor_kbli);
                if ($siup_vendor['sts_seumur_hidup'] == 2) {
                    $this->db->where('tbl_izin_rup.sts_masa_berlaku_siup', 2);
                    // $this->db->or_where('tbl_izin_rup.tgl_berlaku_siup >=', $siup_vendor['tgl_berlaku']);
                } else {
                    $this->db->where('tbl_izin_rup.tgl_berlaku_siup >=', $siup_vendor['tgl_berlaku']);
                }
            }
        }

        // if ($siujk_vendor) {
        //     if ($siujk_vendor_kbli) {
        //         $this->db->where_in('tbl_syratat_kbli_tender.id_kbli',  $siujk_vendor_kbli);
        //         if ($siujk_vendor['sts_seumur_hidup'] == 2) {
        //             $this->db->where('tbl_izin_rup.sts_masa_berlaku_siujk', 2);
        //             // $this->db->or_where('tbl_izin_rup.tgl_berlaku_siujk >=', $siujk_vendor['tgl_berlaku']);
        //         } else {
        //             $this->db->where('tbl_izin_rup.tgl_berlaku_siujk >=', $siujk_vendor['tgl_berlaku']);
        //         }
        //     }
        // }

        // if ($skdp_vendor) {
        //     if ($skdp_vendor_kbli) {
        //         $this->db->where_in('tbl_syratat_kbli_tender.id_kbli',  $skdp_vendor_kbli);
        //         if ($skdp_vendor['sts_seumur_hidup'] == 2) {
        //             $this->db->where('tbl_izin_rup.sts_masa_berlaku_skdp', 2);
        //             // $this->db->or_where('tbl_izin_rup.tgl_berlaku_skdp >=', $skdp_vendor['tgl_berlaku']);
        //         } else {
        //             $this->db->where('tbl_izin_rup.tgl_berlaku_skdp >=', $skdp_vendor['tgl_berlaku']);
        //         }
        //     }
        // }

        // if ($sbu_vendor) {
        //     if ($sbu_vendor_kode) {
        //         $this->db->where_in('tbl_syratat_sbu_tender.id_sbu',  $sbu_vendor_kode);
        //         if ($sbu_vendor['sts_seumur_hidup'] == 2) {
        //             $this->db->where('tbl_izin_rup.sts_masa_berlaku_sbu', 2);
        //             // $this->db->or_where('tbl_izin_rup.tgl_berlaku_sbu >=', $sbu_vendor['tgl_berlaku']);
        //         } else {
        //             $this->db->where('tbl_izin_rup.tgl_berlaku_sbu >=', $sbu_vendor['tgl_berlaku']);
        //         }
        //     }
        // }

        // if ($spt_vendor) {
        //     $this->db->where('tbl_izin_teknis_rup.tahun_lapor_spt <=', $spt_vendor['tahun_lapor']);
        // }

        // if ($keuangan) {
        //     $this->db->where('tbl_izin_teknis_rup.tahun_awal_laporan_keuangan <=', $keuangan['tahun_lapor']);
        //     $this->db->where('tbl_izin_teknis_rup.tahun_akhir_laporan_keuangan >=', $keuangan['tahun_lapor']);

        //     $this->db->where_in('tbl_izin_teknis_rup.sts_audit_laporan_keuangan',  $keuangan_audit);
        // }

        // if ($neraca) {
        //     $this->db->where('tbl_izin_teknis_rup.tahun_awal_neraca_keuangan <=', $neraca_selesai['sls']);
        //     $this->db->where('tbl_izin_teknis_rup.tahun_akhir_neraca_keuangan >=', $neraca_mulai['mulai']);
        // }
        $this->db->group_by('tbl_rup.id_rup');
        $this->db->get();
        return $this->db->count_all_results();
    }

    // validasi nib
    private function get_nib_vendor($id_vendor)
    {
        $this->db->select('*');
        $this->db->from('tbl_vendor_nib');
        $this->db->where('id_vendor', $id_vendor);
        $this->db->where('sts_validasi', 1);
        $query = $this->db->get();
        return $query->row_array();
    }

    private function get_nib_vendor_kbli($id_vendor)
    {
        $this->db->select('tbl_vendor_kbli_nib.id_kbli');
        $this->db->from('tbl_vendor_kbli_nib');
        $this->db->where('id_vendor', $id_vendor);
        $this->db->where('sts_kbli_nib', 1);
        $query = $this->db->get()->result_array();
        $data = [];
        foreach ($query as $key => $value) {
            $data[] = $value['id_kbli'];
        }
        return $data;
    }

    // validasi siup
    private function get_siup_vendor($id_vendor)
    {
        $this->db->select('*');
        $this->db->from('tbl_vendor_siup');
        $this->db->where('id_vendor', $id_vendor);
        $this->db->where('sts_validasi', 1);
        $query = $this->db->get();
        return $query->row_array();
    }

    private function get_siup_vendor_kbli($id_vendor)
    {
        $this->db->select('tbl_vendor_kbli_siup.id_kbli');
        $this->db->from('tbl_vendor_kbli_siup');
        $this->db->where('id_vendor', $id_vendor);
        $this->db->where('sts_kbli_siup', 1);
        $query = $this->db->get()->result_array();
        $data = [];
        foreach ($query as $key => $value) {
            $data[] = $value['id_kbli'];
        }
        return $data;
    }

    // validasi sbu
    private function get_sbu_vendor($id_vendor)
    {
        $this->db->select('*');
        $this->db->from('tbl_vendor_sbu');
        $this->db->where('id_vendor', $id_vendor);
        $this->db->where('sts_validasi', 1);
        $query = $this->db->get();
        return $query->row_array();
    }

    private function get_sbu_vendor_kode($id_vendor)
    {
        $this->db->select('tbl_vendor_kbli_sbu.id_sbu');
        $this->db->from('tbl_vendor_kbli_sbu');
        $this->db->where('id_vendor', $id_vendor);
        $this->db->where('sts_kbli_sbu', 1);
        $query = $this->db->get()->result_array();
        $data = [];
        foreach ($query as $key => $value) {
            $data[] = $value['id_sbu'];
        }
        return $data;
    }

    // validasi siujk
    private function get_siujk_vendor($id_vendor)
    {
        $this->db->select('*');
        $this->db->from('tbl_vendor_siujk');
        $this->db->where('id_vendor', $id_vendor);
        $this->db->where('sts_validasi', 1);
        $query = $this->db->get();
        return $query->row_array();
    }

    private function get_siujk_vendor_kbli($id_vendor)
    {
        $this->db->select('tbl_vendor_kbli_siujk.id_kbli');
        $this->db->from('tbl_vendor_kbli_siujk');
        $this->db->where('id_vendor', $id_vendor);
        $this->db->where('sts_kbli_siujk', 1);
        $query = $this->db->get()->result_array();
        $data = [];
        foreach ($query as $key => $value) {
            $data[] = $value['id_kbli'];
        }
        return $data;
    }

    // validasi skdp
    private function get_skdp_vendor($id_vendor)
    {
        $this->db->select('*');
        $this->db->from('tbl_vendor_skdp');
        $this->db->where('id_vendor', $id_vendor);
        $this->db->where('sts_validasi', 1);
        $query = $this->db->get();
        return $query->row_array();
    }

    private function get_skdp_vendor_kbli($id_vendor)
    {
        $this->db->select('tbl_vendor_kbli_skdp.id_kbli');
        $this->db->from('tbl_vendor_kbli_skdp');
        $this->db->where('id_vendor', $id_vendor);
        $this->db->where('sts_kbli_skdp', 1);
        $query = $this->db->get()->result_array();
        $data = [];
        foreach ($query as $key => $value) {
            $data[] = $value['id_kbli'];
        }
        return $data;
    }
    // 


    private function get_spt_vendor($id_vendor)
    {
        $this->db->select('tahun_lapor');
        $this->db->from('tbl_vendor_spt');
        $this->db->where('id_vendor', $id_vendor);
        $this->db->where('sts_validasi', 1);
        $this->db->order_by('tahun_lapor', 'DESC');
        $query = $this->db->get()->row_array();
        return $query;
    }

    private function get_keuangan_vendor($id_vendor)
    {
        $this->db->select_max('tahun_lapor');
        $this->db->from('tbl_vendor_keuangan');
        $this->db->where('id_vendor', $id_vendor);
        $this->db->where('sts_validasi', 1);
        $query = $this->db->get()->row_array();
        return $query;
    }

    private function get_keuangan_audit_vendor($id_vendor)
    {
        $this->db->select('jenis_audit');
        $this->db->from('tbl_vendor_keuangan');
        $this->db->where('id_vendor', $id_vendor);
        $this->db->where('sts_validasi', 1);
        $query = $this->db->get()->result_array();
        $data = [];
        foreach ($query as $key => $value) {
            $data[] = $value['jenis_audit'];
        }
        return $data;
    }

    private function get_neraca_vendor($id_vendor)
    {
        $this->db->select('*');
        $this->db->from('tbl_vendor_neraca_keuangan');
        $this->db->where('id_vendor', $id_vendor);
        $this->db->where('sts_validasi', 1);
        $query = $this->db->get()->result_array();
        return $query;
    }

    private function get_neraca_vendor_mulai($id_vendor)
    {
        $this->db->select_min('tahun_mulai', 'mulai');
        $this->db->from('tbl_vendor_neraca_keuangan');
        $this->db->where('id_vendor', $id_vendor);
        $this->db->where('sts_validasi', 1);
        $query = $this->db->get()->row_array();
        return $query;
    }


    private function get_neraca_vendor_selesai($id_vendor)
    {
        $this->db->select_max('tahun_selesai', 'sls');
        $this->db->from('tbl_vendor_neraca_keuangan');
        $this->db->where('id_vendor', $id_vendor);
        $this->db->where('sts_validasi', 1);
        $query = $this->db->get()->row_array();
        return $query;
    }

    public function get_row_rup($id_rup)
    {
        $this->db->select('*');
        $this->db->from('tbl_rup');
        $this->db->join('tbl_departemen', 'tbl_rup.id_departemen = tbl_departemen.id_departemen', 'left');
        $this->db->join('tbl_section', 'tbl_rup.id_section = tbl_section.id_section', 'left');
        $this->db->join('tbl_jenis_pengadaan', 'tbl_rup.id_jenis_pengadaan = tbl_jenis_pengadaan.id_jenis_pengadaan', 'left');
        $this->db->join('tbl_metode_pengadaan', 'tbl_rup.id_metode_pengadaan = tbl_metode_pengadaan.id_metode_pengadaan', 'left');
        $this->db->join('tbl_jadwal_tender', 'tbl_rup.id_jadwal_tender = tbl_jadwal_tender.id_jadwal_tender', 'left');
        // $this->db->where('tbl_rup.status_paket_diumumkan', 1);
        $this->db->where('tbl_rup.id_url_rup', $id_rup);
        $this->db->group_by('tbl_rup.id_rup');
        $query = $this->db->get();
        return $query->row_array();
    }

    public function get_row_rup_byid($id_rup)
    {
        $this->db->select('*');
        $this->db->from('tbl_rup');
        $this->db->join('tbl_departemen', 'tbl_rup.id_departemen = tbl_departemen.id_departemen', 'left');
        $this->db->join('tbl_section', 'tbl_rup.id_section = tbl_section.id_section', 'left');
        $this->db->join('tbl_jenis_pengadaan', 'tbl_rup.id_jenis_pengadaan = tbl_jenis_pengadaan.id_jenis_pengadaan', 'left');
        $this->db->join('tbl_metode_pengadaan', 'tbl_rup.id_metode_pengadaan = tbl_metode_pengadaan.id_metode_pengadaan', 'left');
        $this->db->join('tbl_jadwal_tender', 'tbl_rup.id_jadwal_tender = tbl_jadwal_tender.id_jadwal_tender', 'left');
        $this->db->where('tbl_rup.id_url_rup', $id_rup);
        $query = $this->db->get();
        return $query->row_array();
    }

    public function get_rup_byid($id_rup)
    {
        $this->db->select('*');
        $this->db->from('tbl_rup');
        $this->db->join('tbl_izin_rup', 'tbl_rup.id_rup = tbl_izin_rup.id_rup', 'left');
        $this->db->join('tbl_izin_teknis_rup', 'tbl_rup.id_rup = tbl_izin_teknis_rup.id_rup', 'left');
        $this->db->join('tbl_syratat_kbli_tender', 'tbl_rup.id_rup = tbl_syratat_kbli_tender.id_rup', 'left');
        $this->db->join('tbl_syratat_sbu_tender', 'tbl_rup.id_rup = tbl_syratat_sbu_tender.id_rup', 'left');
        $this->db->join('tbl_departemen', 'tbl_rup.id_departemen = tbl_departemen.id_departemen', 'left');
        $this->db->join('tbl_section', 'tbl_rup.id_section = tbl_section.id_section', 'left');
        $this->db->join('tbl_jenis_pengadaan', 'tbl_rup.id_jenis_pengadaan = tbl_jenis_pengadaan.id_jenis_pengadaan', 'left');
        $this->db->join('tbl_metode_pengadaan', 'tbl_rup.id_metode_pengadaan = tbl_metode_pengadaan.id_metode_pengadaan', 'left');
        $this->db->join('tbl_jadwal_tender', 'tbl_rup.id_jadwal_tender = tbl_jadwal_tender.id_jadwal_tender', 'left');
        $this->db->where('tbl_rup.status_paket_diumumkan', 1);
        $this->db->where('tbl_rup.id_rup', $id_rup);
        $query = $this->db->get();
        return $query->row_array();
    }

    public function get_jadwal($id_url_rup)
    {
        $this->db->select('*');
        $this->db->from('tbl_jadwal_rup');
        $this->db->where('id_url_rup', $id_url_rup);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function get_syarat_izin_usaha_tender($id_rup)
    {
        $this->db->select('*');
        $this->db->from('tbl_izin_rup');
        $this->db->where('id_rup', $id_rup);
        $query = $this->db->get();
        return $query->row_array();
    }

    public function cek_mengikuti($id_rup)
    {
        $id_vendor = $this->session->userdata('id_vendor');
        $this->db->select('*');
        $this->db->from('tbl_vendor_mengikuti_paket');
        $this->db->where('id_rup', $id_rup);
        $this->db->where('id_vendor', $id_vendor);
        $this->db->where('sts_mengikuti_paket', 1);
        $query = $this->db->get();
        return $query->row_array();
    }

    public function insert_mengikuti($data)
    {
        $this->db->insert('tbl_vendor_mengikuti_paket', $data);
        return $this->db->affected_rows();
    }

    function result_syarat_tambahan($id_rup)
    {
        $this->db->select('*');
        $this->db->from('tbl_syarat_tambahan_rup');
        $this->db->where('tbl_syarat_tambahan_rup.id_rup', $id_rup);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function get_syarat_by_name($nama_persyaratan_tambahan, $id_rup, $id_vendor)
    {
        $this->db->select('*');
        $this->db->from('tbl_vendor_syarat_tambahan');
        $this->db->where('tbl_vendor_syarat_tambahan.nama_syarat_tambahan', $nama_persyaratan_tambahan);
        $this->db->where('tbl_vendor_syarat_tambahan.id_vendor', $id_vendor);
        $this->db->where('tbl_vendor_syarat_tambahan.id_rup', $id_rup);
        $query = $this->db->get();
        return $query->row_array();
    }


    // INI UNTUK BAGIAN SYARAT ADMINISTRASI TEJNIS
    public function get_syarat_izin_teknis_tender($id_rup)
    {
        $this->db->select('*');
        $this->db->from('tbl_izin_teknis_rup');
        $this->db->where('id_rup', $id_rup);
        $query = $this->db->get();
        return $query->row_array();
    }



    // tender umum diikuti
    private function _get_data_query_diikuti($id_vendor)
    {
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
        $this->db->where('tbl_vendor_mengikuti_paket.sts_mengikuti_paket', 1);
        $this->db->where('tbl_vendor_mengikuti_paket.id_vendor', $id_vendor);
        $this->db->group_by('tbl_rup.id_rup');
        $i = 0;
        foreach ($this->order as $item) // looping awal
        {
            if ($_POST['search']['value']) // jika datatable mengirimkan pencarian dengan metode POST
            {

                if ($i === 0) // looping awal
                {
                    $this->db->group_start();
                    $this->db->like($item, $_POST['search']['value']);
                } else {
                    $this->db->or_like(
                        $item,
                        $_POST['search']['value']
                    );
                }

                if (count($this->order) - 1 == $i)
                    $this->db->group_end();
            }
            $i++;
        }
        if (isset($_POST['order'])) {
            $this->db->order_by($this->order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } else {
            $this->db->order_by('tbl_rup.id_rup', 'DESC');
        }
    }

    public function gettable_diikuti($id_vendor) //nam[ilin data pake ini
    {
        $this->_get_data_query_diikuti($id_vendor); //ambil data dari get yg di atas
        if ($_POST['length'] != -1) {
            $this->db->limit($_POST['length'], $_POST['start']);
        }
        $query = $this->db->get();
        return $query->result();
    }
    public function count_filtered_data_diikuti($id_vendor)
    {
        $this->_get_data_query($id_vendor); //ambil data dari get yg di atas
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function count_all_data_diikuti($id_vendor)
    {
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
        $this->db->where('tbl_vendor_mengikuti_paket.sts_mengikuti_paket', 1);
        $this->db->where('tbl_vendor_mengikuti_paket.id_vendor', $id_vendor);
        $this->db->group_by('tbl_rup.id_rup');
        $this->db->get();
        return $this->db->count_all_results();
    }

    public function peserta($id_rup)
    {
        $this->db->select('*');
        $this->db->from('tbl_rup');
        $this->db->join('tbl_vendor_mengikuti_paket', 'tbl_rup.id_rup = tbl_vendor_mengikuti_paket.id_rup', 'left');
        $this->db->join('tbl_vendor', 'tbl_vendor_mengikuti_paket.id_vendor = tbl_vendor.id_vendor', 'left');
        $this->db->where('tbl_vendor_mengikuti_paket.id_rup', $id_rup);
        $this->db->where('tbl_vendor_mengikuti_paket.sts_mengikuti_paket', 1);
        $query = $this->db->get();
        return $query->result_array();
    }


    public function count_peserta($id_rup)
    {
        $this->db->select('*');
        $this->db->from('tbl_rup');
        $this->db->join('tbl_vendor_mengikuti_paket', 'tbl_rup.id_rup = tbl_vendor_mengikuti_paket.id_rup', 'left');
        $this->db->join('tbl_vendor', 'tbl_vendor_mengikuti_paket.id_vendor = tbl_vendor.id_vendor', 'left');
        $this->db->where('tbl_vendor_mengikuti_paket.id_rup', $id_rup);
        $this->db->get();
        return $this->db->count_all_results();
    }

    public function count_peserta_lolos($id_rup)
    {
        $this->db->select('*');
        $this->db->from('tbl_rup');
        $this->db->join('tbl_vendor_mengikuti_paket', 'tbl_rup.id_rup = tbl_vendor_mengikuti_paket.id_rup', 'left');
        $this->db->join('tbl_vendor', 'tbl_vendor_mengikuti_paket.id_vendor = tbl_vendor.id_vendor', 'left');
        $this->db->where('tbl_vendor_mengikuti_paket.id_rup', $id_rup);
        $this->db->where('tbl_vendor_mengikuti_paket.ev_penawaran_teknis >=', 60);
        $this->db->get();
        return $this->db->count_all_results();
    }

    public function dok_pengadaan($id_rup)
    {
        $this->db->select('*');
        $this->db->from('tbl_dokumen_pengadaan');
        $this->db->where('tbl_dokumen_pengadaan.id_rup', $id_rup);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function dok_prakualifikasi($id_rup)
    {
        $this->db->select('*');
        $this->db->from('tbl_dokumen_prakualifikasi');
        $this->db->where('tbl_dokumen_prakualifikasi.id_rup', $id_rup);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function get_syarat_tambahan($id_rup)
    {
        $this->db->select('*');
        $this->db->from('tbl_syarat_tambahan_rup');
        $this->db->where('tbl_syarat_tambahan_rup.id_rup', $id_rup);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function update_syarat_tambahan($data, $where)
    {
        $this->db->update('tbl_vendor_syarat_tambahan', $data, $where);
        return $this->db->affected_rows();
    }

    public function insert_syarat_tambahan($data)
    {
        $this->db->insert('tbl_vendor_syarat_tambahan', $data);
        return $this->db->affected_rows();
    }

    public function delete_syarat_tambahan($id_vendor_syarat_tambahan)
    {
        $this->db->where('id_vendor_syarat_tambahan', $id_vendor_syarat_tambahan);
        $this->db->delete('tbl_vendor_syarat_tambahan');
    }

    public function get_syarat_tambahan_vendor($id_rup, $id_vendor)
    {
        $this->db->select('*');
        $this->db->from('tbl_vendor_syarat_tambahan');
        $this->db->where('tbl_vendor_syarat_tambahan.id_rup', $id_rup);
        $this->db->where('tbl_vendor_syarat_tambahan.id_vendor', $id_vendor);
        $this->db->order_by('tbl_vendor_syarat_tambahan.id_vendor_syarat_tambahan', 'DESC');
        // $this->db->group_by('tbl_vendor_syarat_tambahan.id_vendor');
        // $this->db->limit(1);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function row_syarat_tambahan($id_vendor_syarat_tambahan)
    {
        $this->db->select('*');
        $this->db->from('tbl_vendor_syarat_tambahan');
        $this->db->join('tbl_rup', 'tbl_vendor_syarat_tambahan.id_rup = tbl_rup.id_rup', 'left');
        $this->db->where('tbl_vendor_syarat_tambahan.id_vendor_syarat_tambahan', $id_vendor_syarat_tambahan);
        $query = $this->db->get();
        return $query->row_array();
    }



    // INI UNTUK AANWIJZING
    public function getPesan($id_rup)
    {
        $this->db->from('tbl_pesan');
        $this->db->join('tbl_vendor', 'tbl_pesan.id_pengirim = tbl_vendor.id_vendor', 'left');
        $this->db->join('tbl_pegawai', 'tbl_pesan.id_pengirim = tbl_pegawai.id_pegawai', 'left');
        $this->db->where('tbl_pesan.id_rup', $id_rup);
        $r = $this->db->get();
        return $r->result();
    }


    public function getPesan_penawaran($id_rup)
    {
        $this->db->from('tbl_pesan_penawaran');
        $this->db->join('tbl_vendor', 'tbl_pesan_penawaran.id_pengirim = tbl_vendor.id_vendor', 'left');
        $this->db->join('tbl_pegawai', 'tbl_pesan_penawaran.id_pengirim = tbl_pegawai.id_pegawai', 'left');
        $this->db->where('tbl_pesan_penawaran.id_rup', $id_rup);
        $r = $this->db->get();
        return $r->result();
    }

    public function getDataById($id_rup)
    {
        $this->db->select('*');
        $this->db->from('tbl_vendor_mengikuti_paket');
        $this->db->join('tbl_vendor', 'tbl_vendor.id_vendor = tbl_vendor_mengikuti_paket.id_vendor', 'left');
        $this->db->join('tbl_rup', 'tbl_rup.id_rup = tbl_vendor_mengikuti_paket.id_rup', 'left');
        $this->db->where('tbl_vendor_mengikuti_paket.id_rup', $id_rup);
        $query = $this->db->get();
        return $query->row_array();
    }

    public function tambah_chat($in)
    {
        $this->db->insert('tbl_pesan', $in);
    }

    public function tambah_chat_penawaran($in)
    {
        $this->db->insert('tbl_pesan_penawaran', $in);
    }


    // ini untuk Anwizing (tanya jawab)
    public function jadwal_aanwizing($id_rup)
    {
        $query = $this->db->query("SELECT * FROM tbl_jadwal_rup WHERE id_rup = $id_rup AND nama_jadwal_rup = 'Anwizing (tanya jawab)'");
        return $query->row_array();
    }

    // INI UNTUK DOKUMEN PENGADAAN FILE I
    public function insert_dok_pengadaan_file_I($data)
    {
        $this->db->insert('tbl_vendor_dokumen_pengadaan', $data);
        return $this->db->affected_rows();
    }

    public function delete_dok_pengadaan_file_I($id_dokumen_pengadaan_vendor)
    {
        $this->db->where('id_dokumen_pengadaan_vendor', $id_dokumen_pengadaan_vendor);
        $this->db->delete('tbl_vendor_dokumen_pengadaan');
    }

    public function get_dok_pengadaan_file_I_vendor($id_rup, $id_vendor)
    {
        $this->db->select('*');
        $this->db->from('tbl_vendor_dokumen_pengadaan');
        $this->db->where('tbl_vendor_dokumen_pengadaan.id_rup', $id_rup);
        $this->db->where('tbl_vendor_dokumen_pengadaan.id_vendor', $id_vendor);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function row_dok_pengadaan_file_I($id_dokumen_pengadaan_vendor)
    {
        $this->db->select('*');
        $this->db->from('tbl_vendor_dokumen_pengadaan');
        $this->db->join('tbl_rup', 'tbl_vendor_dokumen_pengadaan.id_rup = tbl_rup.id_rup', 'left');
        $this->db->where('tbl_vendor_dokumen_pengadaan.id_dokumen_pengadaan_vendor', $id_dokumen_pengadaan_vendor);
        $query = $this->db->get();
        return $query->row_array();
    }

    public function update_dok_pengadaan_file_I($data, $where)
    {
        $this->db->update('tbl_vendor_dokumen_pengadaan', $data, $where);
        return $this->db->affected_rows();
    }


    // tender umum dok_penawaran_I
    private function _get_data_query_dok_penawaran_I($id_vendor, $id_rup)
    {
        $this->db->select('*');
        $this->db->from('tbl_vendor_dokumen_pengadaan');
        $this->db->where('tbl_vendor_dokumen_pengadaan.id_rup', $id_rup);
        $this->db->where('tbl_vendor_dokumen_pengadaan.id_vendor', $id_vendor);
        $i = 0;
        foreach ($this->order as $item) // looping awal
        {
            if ($_POST['search']['value']) // jika datatable mengirimkan pencarian dengan metode POST
            {

                if ($i === 0) // looping awal
                {
                    $this->db->group_start();
                    $this->db->like($item, $_POST['search']['value']);
                } else {
                    $this->db->or_like(
                        $item,
                        $_POST['search']['value']
                    );
                }

                if (count($this->order) - 1 == $i)
                    $this->db->group_end();
            }
            $i++;
        }
        if (isset($_POST['order'])) {
            $this->db->order_by($this->order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } else {
            $this->db->order_by('tbl_vendor_dokumen_pengadaan.id_dokumen_pengadaan_vendor', 'DESC');
        }
    }

    public function gettable_dok_penawaran_I($id_vendor, $id_url_rup) //nam[ilin data pake ini
    {
        $this->_get_data_query_dok_penawaran_I($id_vendor, $id_url_rup); //ambil data dari get yg di atas
        if ($_POST['length'] != -1) {
            $this->db->limit($_POST['length'], $_POST['start']);
        }
        $query = $this->db->get();
        return $query->result();
    }
    public function count_filtered_data_dok_penawaran_I($id_vendor, $id_url_rup)
    {
        $this->_get_data_query_dok_penawaran_I($id_vendor, $id_url_rup); //ambil data dari get yg di atas
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function count_all_data_dok_penawaran_I($id_vendor, $id_url_rup)
    {
        $this->db->select('*');
        $this->db->from('tbl_vendor_dokumen_pengadaan');
        $this->db->where('tbl_vendor_dokumen_pengadaan.id_url_rup', $id_url_rup);
        $this->db->where('tbl_vendor_dokumen_pengadaan.id_vendor', $id_vendor);
        $this->db->get();
        return $this->db->count_all_results();
    }

    // penawaran II
    private function _get_data_query_dok_penawaran_II($id_vendor, $id_rup)
    {
        $this->db->select('*');
        $this->db->from('tbl_vendor_mengikuti_paket');
        $this->db->where('id_rup', $id_rup);
        $this->db->where('id_vendor', $id_vendor);
        $i = 0;
        foreach ($this->order as $item) // looping awal
        {
            if ($_POST['search']['value']) // jika datatable mengirimkan pencarian dengan metode POST
            {

                if ($i === 0) // looping awal
                {
                    $this->db->group_start();
                    $this->db->like($item, $_POST['search']['value']);
                } else {
                    $this->db->or_like(
                        $item,
                        $_POST['search']['value']
                    );
                }

                if (count($this->order) - 1 == $i)
                    $this->db->group_end();
            }
            $i++;
        }
        if (isset($_POST['order'])) {
            $this->db->order_by($this->order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } else {
            $this->db->order_by('tbl_vendor_mengikuti_paket.id_vendor_mengikuti_paket', 'DESC');
        }
    }

    public function gettable_dok_penawaran_II($id_vendor, $id_rup) //nam[ilin data pake ini
    {
        $this->_get_data_query_dok_penawaran_II($id_vendor, $id_rup); //ambil data dari get yg di atas
        if ($_POST['length'] != -1) {
            $this->db->limit($_POST['length'], $_POST['start']);
        }
        $query = $this->db->get();
        return $query->result();
    }
    public function count_filtered_data_dok_penawaran_II($id_vendor, $id_rup)
    {
        $this->_get_data_query_dok_penawaran_II($id_vendor, $id_rup); //ambil data dari get yg di atas
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function count_all_data_dok_penawaran_II($id_vendor, $id_rup)
    {
        $this->db->select('*');
        $this->db->from('tbl_vendor_mengikuti_paket');
        $this->db->where('id_rup', $id_rup);
        $this->db->where('id_vendor', $id_vendor);
        $this->db->get();
        return $this->db->count_all_results();
    }

    public function update_dok_pengadaan_file_II($data, $where)
    {
        $this->db->update('tbl_vendor_mengikuti_paket', $data, $where);
        return $this->db->affected_rows();
    }

    public function get_row_vendor_mengikuti_paket($id_vendor_mengikuti_paket)
    {
        $this->db->select('*');
        $this->db->from('tbl_vendor_mengikuti_paket');
        $this->db->join('tbl_rup', 'tbl_vendor_mengikuti_paket.id_rup = tbl_rup.id_rup', 'left');
        $this->db->where('id_vendor_mengikuti_paket', $id_vendor_mengikuti_paket);
        $query = $this->db->get();
        return $query->row_array();
    }

    // sanggahan prakualifikasi
    public function update_mengikuti($data, $where)
    {
        $this->db->update('tbl_vendor_mengikuti_paket', $data, $where);
        return $this->db->affected_rows();
    }

    public function get_row_vendor_sanggahan($id_rup, $id_vendor)
    {
        $this->db->select('*');
        $this->db->from('tbl_vendor_mengikuti_paket');
        $this->db->join('tbl_rup', 'tbl_vendor_mengikuti_paket.id_rup = tbl_rup.id_rup', 'left');
        $this->db->join('tbl_vendor', 'tbl_vendor_mengikuti_paket.id_vendor = tbl_vendor.id_vendor', 'left');
        $this->db->where('tbl_vendor_mengikuti_paket.id_rup', $id_rup);
        $this->db->where('tbl_vendor_mengikuti_paket.id_vendor', $id_vendor);
        $query = $this->db->get();
        return $query->row_array();
    }

    // get ba tender
    public function get_ba_tender($id_rup)
    {
        $this->db->select('*');
        $this->db->from('tbl_ba_tender');
        $this->db->where('id_rup', $id_rup);
        $query = $this->db->get();
        return $query->result_array();
    }

    // tender terbatas

    private function _get_data_query_terbatas($id_vendor)
    {
        $this->db->select('*');
        $this->db->from('tbl_vendor_mengikuti_paket');
        $this->db->join('tbl_rup', 'tbl_vendor_mengikuti_paket.id_rup = tbl_rup.id_rup', 'left');
        $this->db->join('tbl_izin_rup', 'tbl_rup.id_rup = tbl_izin_rup.id_rup', 'left');
        $this->db->join('tbl_izin_teknis_rup', 'tbl_rup.id_rup = tbl_izin_teknis_rup.id_rup', 'left');
        $this->db->join('tbl_syratat_kbli_tender', 'tbl_rup.id_rup = tbl_syratat_kbli_tender.id_rup', 'left');
        $this->db->join('tbl_syratat_sbu_tender', 'tbl_rup.id_rup = tbl_syratat_sbu_tender.id_rup', 'left');
        $this->db->join('tbl_departemen', 'tbl_rup.id_departemen = tbl_departemen.id_departemen', 'left');
        $this->db->join('tbl_section', 'tbl_rup.id_section = tbl_section.id_section', 'left');
        $this->db->join('tbl_jenis_pengadaan', 'tbl_rup.id_jenis_pengadaan = tbl_jenis_pengadaan.id_jenis_pengadaan', 'left');
        $this->db->where('tbl_vendor_mengikuti_paket.id_vendor', $id_vendor);
        // $this->db->where('tbl_vendor_mengikuti_paket.sts_mengikuti_paket', 1);
        $this->db->where('tbl_rup.id_metode_pengadaan', 4);
        $this->db->where('tbl_rup.status_paket_diumumkan', 1);
        $i = 0;
        foreach ($this->order as $item) // looping awal
        {
            if ($_POST['search']['value']) // jika datatable mengirimkan pencarian dengan metode POST
            {

                if ($i === 0) // looping awal
                {
                    $this->db->group_start();
                    $this->db->like($item, $_POST['search']['value']);
                } else {
                    $this->db->or_like(
                        $item,
                        $_POST['search']['value']
                    );
                }

                if (count($this->order) - 1 == $i)
                    $this->db->group_end();
            }
            $i++;
        }
        if (isset($_POST['order'])) {
            $this->db->order_by($this->order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } else {
            $this->db->order_by('tbl_vendor_mengikuti_paket.id_vendor_mengikuti_paket', 'DESC');
        }
        $this->db->group_by('tbl_rup.id_rup');
    }

    public function gettable_terbatas($id_vendor) //nam[ilin data pake ini
    {
        $this->_get_data_query_terbatas($id_vendor); //ambil data dari get yg di atas
        if ($_POST['length'] != -1) {
            $this->db->limit($_POST['length'], $_POST['start']);
        }
        $query = $this->db->get();
        return $query->result();
    }
    public function count_filtered_data_terbatas($id_vendor)
    {
        $this->_get_data_query_terbatas($id_vendor); //ambil data dari get yg di atas
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function count_all_data_terbatas($id_vendor)
    {
        $this->db->select('*');
        $this->db->from('tbl_vendor_mengikuti_paket');
        $this->db->join('tbl_rup', 'tbl_vendor_mengikuti_paket.id_rup = tbl_rup.id_rup', 'left');
        $this->db->join('tbl_izin_rup', 'tbl_rup.id_rup = tbl_izin_rup.id_rup', 'left');
        $this->db->join('tbl_izin_teknis_rup', 'tbl_rup.id_rup = tbl_izin_teknis_rup.id_rup', 'left');
        $this->db->join('tbl_syratat_kbli_tender', 'tbl_rup.id_rup = tbl_syratat_kbli_tender.id_rup', 'left');
        $this->db->join('tbl_syratat_sbu_tender', 'tbl_rup.id_rup = tbl_syratat_sbu_tender.id_rup', 'left');
        $this->db->join('tbl_departemen', 'tbl_rup.id_departemen = tbl_departemen.id_departemen', 'left');
        $this->db->join('tbl_section', 'tbl_rup.id_section = tbl_section.id_section', 'left');
        $this->db->join('tbl_jenis_pengadaan', 'tbl_rup.id_jenis_pengadaan = tbl_jenis_pengadaan.id_jenis_pengadaan', 'left');
        $this->db->where('id_vendor', $id_vendor);
        $this->db->where('tbl_rup.id_metode_pengadaan', 4);
        $this->db->where('tbl_rup.status_paket_diumumkan', 1);
        $this->db->get();
        return $this->db->count_all_results();
    }



    private function _get_data_query_terbatas_diikuti($id_vendor)
    {
        $this->db->select('*');
        $this->db->from('tbl_vendor_mengikuti_paket');
        $this->db->join('tbl_rup', 'tbl_vendor_mengikuti_paket.id_rup = tbl_rup.id_rup', 'left');
        $this->db->join('tbl_izin_rup', 'tbl_rup.id_rup = tbl_izin_rup.id_rup', 'left');
        $this->db->join('tbl_izin_teknis_rup', 'tbl_rup.id_rup = tbl_izin_teknis_rup.id_rup', 'left');
        $this->db->join('tbl_syratat_kbli_tender', 'tbl_rup.id_rup = tbl_syratat_kbli_tender.id_rup', 'left');
        $this->db->join('tbl_syratat_sbu_tender', 'tbl_rup.id_rup = tbl_syratat_sbu_tender.id_rup', 'left');
        $this->db->join('tbl_departemen', 'tbl_rup.id_departemen = tbl_departemen.id_departemen', 'left');
        $this->db->join('tbl_section', 'tbl_rup.id_section = tbl_section.id_section', 'left');
        $this->db->join('tbl_jenis_pengadaan', 'tbl_rup.id_jenis_pengadaan = tbl_jenis_pengadaan.id_jenis_pengadaan', 'left');
        $this->db->where('tbl_vendor_mengikuti_paket.id_vendor', $id_vendor);
        $this->db->where('tbl_vendor_mengikuti_paket.sts_mengikuti_paket', 1);
        $this->db->where('tbl_rup.id_metode_pengadaan', 4);
        $this->db->where('tbl_rup.status_paket_diumumkan', 1);
        $i = 0;
        foreach ($this->order as $item) // looping awal
        {
            if ($_POST['search']['value']) // jika datatable mengirimkan pencarian dengan metode POST
            {

                if ($i === 0) // looping awal
                {
                    $this->db->group_start();
                    $this->db->like($item, $_POST['search']['value']);
                } else {
                    $this->db->or_like(
                        $item,
                        $_POST['search']['value']
                    );
                }

                if (count($this->order) - 1 == $i)
                    $this->db->group_end();
            }
            $i++;
        }
        if (isset($_POST['order'])) {
            $this->db->order_by($this->order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } else {
            $this->db->order_by('tbl_vendor_mengikuti_paket.id_vendor_mengikuti_paket', 'DESC');
        }
        $this->db->group_by('tbl_rup.id_rup');
    }

    public function gettable_terbatas_diikuti($id_vendor) //nam[ilin data pake ini
    {
        $this->_get_data_query_terbatas_diikuti($id_vendor); //ambil data dari get yg di atas
        if ($_POST['length'] != -1) {
            $this->db->limit($_POST['length'], $_POST['start']);
        }
        $query = $this->db->get();
        return $query->result();
    }
    public function count_filtered_data_terbatas_diikuti($id_vendor)
    {
        $this->_get_data_query_terbatas_diikuti($id_vendor); //ambil data dari get yg di atas
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function count_all_data_terbatas_diikuti($id_vendor)
    {
        $this->db->select('*');
        $this->db->from('tbl_vendor_mengikuti_paket');
        $this->db->join('tbl_rup', 'tbl_vendor_mengikuti_paket.id_rup = tbl_rup.id_rup', 'left');
        $this->db->join('tbl_izin_rup', 'tbl_rup.id_rup = tbl_izin_rup.id_rup', 'left');
        $this->db->join('tbl_izin_teknis_rup', 'tbl_rup.id_rup = tbl_izin_teknis_rup.id_rup', 'left');
        $this->db->join('tbl_syratat_kbli_tender', 'tbl_rup.id_rup = tbl_syratat_kbli_tender.id_rup', 'left');
        $this->db->join('tbl_syratat_sbu_tender', 'tbl_rup.id_rup = tbl_syratat_sbu_tender.id_rup', 'left');
        $this->db->join('tbl_departemen', 'tbl_rup.id_departemen = tbl_departemen.id_departemen', 'left');
        $this->db->join('tbl_section', 'tbl_rup.id_section = tbl_section.id_section', 'left');
        $this->db->join('tbl_jenis_pengadaan', 'tbl_rup.id_jenis_pengadaan = tbl_jenis_pengadaan.id_jenis_pengadaan', 'left');
        $this->db->where('id_vendor', $id_vendor);
        $this->db->where('tbl_rup.id_metode_pengadaan', 4);
        $this->db->where('tbl_rup.status_paket_diumumkan', 1);
        $this->db->where('tbl_vendor_mengikuti_paket.sts_mengikuti_paket', 1);
        $this->db->get();
        return $this->db->count_all_results();
    }




    // tender penunjukan_langsung

    private function _get_data_query_penunjukan_langsung($id_vendor)
    {
        $this->db->select('*');
        $this->db->from('tbl_vendor_mengikuti_paket');
        $this->db->join('tbl_rup', 'tbl_vendor_mengikuti_paket.id_rup = tbl_rup.id_rup', 'left');
        $this->db->join('tbl_izin_rup', 'tbl_rup.id_rup = tbl_izin_rup.id_rup', 'left');
        $this->db->join('tbl_izin_teknis_rup', 'tbl_rup.id_rup = tbl_izin_teknis_rup.id_rup', 'left');
        $this->db->join('tbl_syratat_kbli_tender', 'tbl_rup.id_rup = tbl_syratat_kbli_tender.id_rup', 'left');
        $this->db->join('tbl_syratat_sbu_tender', 'tbl_rup.id_rup = tbl_syratat_sbu_tender.id_rup', 'left');
        $this->db->join('tbl_departemen', 'tbl_rup.id_departemen = tbl_departemen.id_departemen', 'left');
        $this->db->join('tbl_section', 'tbl_rup.id_section = tbl_section.id_section', 'left');
        $this->db->join('tbl_jenis_pengadaan', 'tbl_rup.id_jenis_pengadaan = tbl_jenis_pengadaan.id_jenis_pengadaan', 'left');
        $this->db->where('tbl_vendor_mengikuti_paket.id_vendor', $id_vendor);
        $this->db->where('tbl_rup.status_paket_diumumkan', 1);
        $this->db->where('tbl_rup.id_metode_pengadaan', 3);
        $i = 0;
        foreach ($this->order as $item) // looping awal
        {
            if ($_POST['search']['value']) // jika datatable mengirimkan pencarian dengan metode POST
            {

                if ($i === 0) // looping awal
                {
                    $this->db->group_start();
                    $this->db->like($item, $_POST['search']['value']);
                } else {
                    $this->db->or_like(
                        $item,
                        $_POST['search']['value']
                    );
                }

                if (count($this->order) - 1 == $i)
                    $this->db->group_end();
            }
            $i++;
        }
        if (isset($_POST['order'])) {
            $this->db->order_by($this->order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } else {
            $this->db->order_by('tbl_vendor_mengikuti_paket.id_vendor_mengikuti_paket', 'DESC');
        }
    }

    public function gettable_penunjukan_langsung($id_vendor) //nam[ilin data pake ini
    {
        $this->_get_data_query_penunjukan_langsung($id_vendor); //ambil data dari get yg di atas
        if ($_POST['length'] != -1) {
            $this->db->limit($_POST['length'], $_POST['start']);
        }
        $query = $this->db->get();
        return $query->result();
    }
    public function count_filtered_data_penunjukan_langsung($id_vendor)
    {
        $this->_get_data_query_penunjukan_langsung($id_vendor); //ambil data dari get yg di atas
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function count_all_data_penunjukan_langsung($id_vendor)
    {
        $this->db->select('*');
        $this->db->from('tbl_vendor_mengikuti_paket');
        $this->db->join('tbl_rup', 'tbl_vendor_mengikuti_paket.id_rup = tbl_rup.id_rup', 'left');
        $this->db->join('tbl_izin_rup', 'tbl_rup.id_rup = tbl_izin_rup.id_rup', 'left');
        $this->db->join('tbl_izin_teknis_rup', 'tbl_rup.id_rup = tbl_izin_teknis_rup.id_rup', 'left');
        $this->db->join('tbl_syratat_kbli_tender', 'tbl_rup.id_rup = tbl_syratat_kbli_tender.id_rup', 'left');
        $this->db->join('tbl_syratat_sbu_tender', 'tbl_rup.id_rup = tbl_syratat_sbu_tender.id_rup', 'left');
        $this->db->join('tbl_departemen', 'tbl_rup.id_departemen = tbl_departemen.id_departemen', 'left');
        $this->db->join('tbl_section', 'tbl_rup.id_section = tbl_section.id_section', 'left');
        $this->db->join('tbl_jenis_pengadaan', 'tbl_rup.id_jenis_pengadaan = tbl_jenis_pengadaan.id_jenis_pengadaan', 'left');
        $this->db->where('tbl_vendor_mengikuti_paket.id_vendor', $id_vendor);
        $this->db->where('tbl_rup.status_paket_diumumkan', 1);
        $this->db->where('tbl_rup.id_metode_pengadaan', 3);
        $this->db->get();
        return $this->db->count_all_results();
    }



    private function _get_data_query_penunjukan_langsung_diikuti($id_vendor)
    {
        $this->db->select('*');
        $this->db->from('tbl_vendor_mengikuti_paket');
        $this->db->join('tbl_rup', 'tbl_vendor_mengikuti_paket.id_rup = tbl_rup.id_rup', 'left');
        $this->db->join('tbl_izin_rup', 'tbl_rup.id_rup = tbl_izin_rup.id_rup', 'left');
        $this->db->join('tbl_izin_teknis_rup', 'tbl_rup.id_rup = tbl_izin_teknis_rup.id_rup', 'left');
        $this->db->join('tbl_syratat_kbli_tender', 'tbl_rup.id_rup = tbl_syratat_kbli_tender.id_rup', 'left');
        $this->db->join('tbl_syratat_sbu_tender', 'tbl_rup.id_rup = tbl_syratat_sbu_tender.id_rup', 'left');
        $this->db->join('tbl_departemen', 'tbl_rup.id_departemen = tbl_departemen.id_departemen', 'left');
        $this->db->join('tbl_section', 'tbl_rup.id_section = tbl_section.id_section', 'left');
        $this->db->join('tbl_jenis_pengadaan', 'tbl_rup.id_jenis_pengadaan = tbl_jenis_pengadaan.id_jenis_pengadaan', 'left');
        $this->db->where('tbl_vendor_mengikuti_paket.id_vendor', $id_vendor);
        $this->db->where('tbl_vendor_mengikuti_paket.sts_mengikuti_paket', 1);
        $this->db->where('tbl_rup.id_metode_pengadaan', 3);
        $i = 0;
        foreach ($this->order as $item) // looping awal
        {
            if ($_POST['search']['value']) // jika datatable mengirimkan pencarian dengan metode POST
            {

                if ($i === 0) // looping awal
                {
                    $this->db->group_start();
                    $this->db->like($item, $_POST['search']['value']);
                } else {
                    $this->db->or_like(
                        $item,
                        $_POST['search']['value']
                    );
                }

                if (count($this->order) - 1 == $i)
                    $this->db->group_end();
            }
            $i++;
        }
        if (isset($_POST['order'])) {
            $this->db->order_by($this->order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } else {
            $this->db->order_by('tbl_vendor_mengikuti_paket.id_vendor_mengikuti_paket', 'DESC');
        }
    }

    public function gettable_penunjukan_langsung_diikuti($id_vendor) //nam[ilin data pake ini
    {
        $this->_get_data_query_penunjukan_langsung_diikuti($id_vendor); //ambil data dari get yg di atas
        if ($_POST['length'] != -1) {
            $this->db->limit($_POST['length'], $_POST['start']);
        }
        $query = $this->db->get();
        return $query->result();
    }
    public function count_filtered_data_penunjukan_langsung_diikuti($id_vendor)
    {
        $this->_get_data_query_penunjukan_langsung_diikuti($id_vendor); //ambil data dari get yg di atas
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function count_all_data_penunjukan_langsung_diikuti($id_vendor)
    {
        $this->db->select('*');
        $this->db->from('tbl_vendor_mengikuti_paket');
        $this->db->join('tbl_rup', 'tbl_vendor_mengikuti_paket.id_rup = tbl_rup.id_rup', 'left');
        $this->db->join('tbl_izin_rup', 'tbl_rup.id_rup = tbl_izin_rup.id_rup', 'left');
        $this->db->join('tbl_izin_teknis_rup', 'tbl_rup.id_rup = tbl_izin_teknis_rup.id_rup', 'left');
        $this->db->join('tbl_syratat_kbli_tender', 'tbl_rup.id_rup = tbl_syratat_kbli_tender.id_rup', 'left');
        $this->db->join('tbl_syratat_sbu_tender', 'tbl_rup.id_rup = tbl_syratat_sbu_tender.id_rup', 'left');
        $this->db->join('tbl_departemen', 'tbl_rup.id_departemen = tbl_departemen.id_departemen', 'left');
        $this->db->join('tbl_section', 'tbl_rup.id_section = tbl_section.id_section', 'left');
        $this->db->join('tbl_jenis_pengadaan', 'tbl_rup.id_jenis_pengadaan = tbl_jenis_pengadaan.id_jenis_pengadaan', 'left');
        $this->db->where('id_vendor', $id_vendor);
        $this->db->where('tbl_rup.id_metode_pengadaan', 3);
        $this->db->where('tbl_vendor_mengikuti_paket.sts_mengikuti_paket', 1);
        $this->db->get();
        return $this->db->count_all_results();
    }



    public function get_persyaratan_kbli($id_rup)
    {
        $this->db->select('*');
        $this->db->from('tbl_syratat_kbli_tender');
        $this->db->join('tbl_kbli', 'tbl_syratat_kbli_tender.id_kbli = tbl_kbli.id_kbli', 'left');
        $this->db->where('id_rup', $id_rup);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function get_persyaratan_sbu($id_rup)
    {
        $this->db->select('*');
        $this->db->from('tbl_syratat_sbu_tender');
        $this->db->join('tbl_sbu', 'tbl_syratat_sbu_tender.id_sbu = tbl_sbu.id_sbu', 'left');
        $this->db->where('id_rup', $id_rup);
        $query = $this->db->get();
        return $query->result_array();
    }

    function data_evaluasi($id_rup)
    {
        $this->db->select('*');
        $this->db->from('tbl_vendor_mengikuti_paket');
        $this->db->join('tbl_rup', 'tbl_vendor_mengikuti_paket.id_rup = tbl_rup.id_rup', 'left');
        $this->db->join('tbl_vendor', 'tbl_vendor_mengikuti_paket.id_vendor = tbl_vendor.id_vendor', 'left');
        $this->db->where('tbl_vendor_mengikuti_paket.id_rup', $id_rup);
        $this->db->where('tbl_vendor_mengikuti_paket.sts_mengikuti_paket', 1);
        $query = $this->db->get();
        return $query->result_array();
    }


    public function hitung_total_syarat($id_rup)
    {
        $this->db->select('*');
        $this->db->from('tbl_syarat_tambahan_rup');
        $this->db->where('tbl_syarat_tambahan_rup.id_rup', $id_rup);
        return $this->db->count_all_results();
    }

    public function get_panitia($id_rup)
    {
        $this->db->select('*');
        $this->db->from('tbl_panitia');
        $this->db->join('tbl_manajemen_user', 'tbl_panitia.id_manajemen_user = tbl_manajemen_user.id_manajemen_user', 'left');
        $this->db->join('tbl_pegawai', 'tbl_manajemen_user.id_pegawai = tbl_pegawai.id_pegawai', 'left');
        $this->db->where('id_rup', $id_rup);
        $this->db->where('tbl_manajemen_user.role', 5);
        $query = $this->db->get();
        return $query->result_array();
    }


    public function simpan_sanggah_prakualifikasi($data)
    {
        $this->db->insert('tbl_sanggah_detail', $data);
        return $this->db->affected_rows();
    }

    public function get_row_vendor_sanggahan_pra($id_rup, $id_vendor)
    {
        $this->db->select('*');
        $this->db->from('tbl_sanggah_detail');
        $this->db->join('tbl_vendor', 'tbl_sanggah_detail.id_vendor = tbl_vendor.id_vendor', 'left');
        $this->db->where('tbl_sanggah_detail.id_rup', $id_rup);
        $this->db->where('tbl_sanggah_detail.id_vendor', $id_vendor);
        $query = $this->db->get();
        return $query->result_array();
    }
    
    public function delete_sanggah_pra($id_sanggah_pra_detail)
    {
        $this->db->where('id_sanggah_pra_detail', $id_sanggah_pra_detail);
        $this->db->delete('tbl_sanggah_detail');
    }

    public function simpan_sanggah_akhir($data)
    {
        $this->db->insert('tbl_sanggah_detail_akhir', $data);
        return $this->db->affected_rows();
    }

    public function get_row_vendor_sanggahan_akhir($id_rup, $id_vendor)
    {
        $this->db->select('*');
        $this->db->from('tbl_sanggah_detail_akhir');
        $this->db->join('tbl_vendor', 'tbl_sanggah_detail_akhir.id_vendor = tbl_vendor.id_vendor', 'left');
        $this->db->where('tbl_sanggah_detail_akhir.id_rup', $id_rup);
        $this->db->where('tbl_sanggah_detail_akhir.id_vendor', $id_vendor);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function delete_sanggah_akhir($id_sanggah_akhir_detail)
    {
        $this->db->where('id_sanggah_akhir_detail', $id_sanggah_akhir_detail);
        $this->db->delete('tbl_sanggah_detail_akhir');
    }
}
