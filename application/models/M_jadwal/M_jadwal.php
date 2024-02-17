<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_jadwal extends CI_Model
{

    public function jadwal_pra_umum_1($id_rup)
    {
        $this->db->select('*');
        $this->db->from('tbl_jadwal_rup');
        $this->db->where('id_rup', $id_rup);
        $this->db->where('nama_jadwal_rup', 'Pengumuman Pengadaan');
        $query = $this->db->get();
        return $query->row_array();
    }

    public function jadwal_pra_umum_2($id_rup)
    {
        $this->db->select('*');
        $this->db->from('tbl_jadwal_rup');
        $this->db->where('id_rup', $id_rup);
        $this->db->where('nama_jadwal_rup', 'Download Dokumen Kualifikasi');
        $query = $this->db->get();
        return $query->row_array();
    }

    public function jadwal_pra_umum_3($id_rup)
    {
        $this->db->select('*');
        $this->db->from('tbl_jadwal_rup');
        $this->db->where('id_rup', $id_rup);
        $this->db->where('nama_jadwal_rup', 'Aanwijzing (Tanya Jawab Dokumen PQ)');
        $query = $this->db->get();
        return $query->row_array();
    }

    public function jadwal_pra_umum_4($id_rup)
    {
        $this->db->select('*');
        $this->db->from('tbl_jadwal_rup');
        $this->db->where('id_rup', $id_rup);
        $this->db->where('nama_jadwal_rup', 'Upload Dokumen Prakualifikasi');
        $query = $this->db->get();
        return $query->row_array();
    }

    public function get_mengikuti_cek_gugur($id_rup)
    {
        $id_vendor = $this->session->userdata('id_vendor');
        $this->db->select('*');
        $this->db->from('tbl_vendor_mengikuti_paket');
        $this->db->where('id_rup', $id_rup);
        $this->db->where('id_vendor', $id_vendor);
        $this->db->where('sts_mengikuti_paket', 1);
        $this->db->where('ev_terendah_harga !=', NULL);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function jadwal_pra_umum_5($id_rup)
    {
        $this->db->select('*');
        $this->db->from('tbl_jadwal_rup');
        $this->db->where('id_rup', $id_rup);
        $this->db->where('nama_jadwal_rup', 'Pembuktian Kualifikasi');
        $query = $this->db->get();
        return $query->row_array();
    }


    public function jadwal_pra_umum_6($id_rup)
    {
        $this->db->select('*');
        $this->db->from('tbl_jadwal_rup');
        $this->db->where('id_rup', $id_rup);
        $this->db->where('nama_jadwal_rup', 'Evaluasi Dokumen Kualifikasi');
        $query = $this->db->get();
        return $query->row_array();
    }

    public function jadwal_pra_umum_7($id_rup)
    {
        $this->db->select('*');
        $this->db->from('tbl_jadwal_rup');
        $this->db->where('id_rup', $id_rup);
        $this->db->where('nama_jadwal_rup', 'Penetapan Hasil Kualifikasi');
        $query = $this->db->get();
        return $query->row_array();
    }

    public function jadwal_pra_umum_8($id_rup)
    {
        $this->db->select('*');
        $this->db->from('tbl_jadwal_rup');
        $this->db->where('id_rup', $id_rup);
        $this->db->where('nama_jadwal_rup', 'Pengumuman Hasil Kualifikasi');
        $query = $this->db->get();
        return $query->row_array();
    }

    public function jadwal_pra_umum_9($id_rup)
    {
        $this->db->select('*');
        $this->db->from('tbl_jadwal_rup');
        $this->db->where('id_rup', $id_rup);
        $this->db->where('nama_jadwal_rup', 'Masa Sanggah Kualifikasi');
        $query = $this->db->get();
        return $query->row_array();
    }

    public function jadwal_pra_umum_10($id_rup)
    {
        $this->db->select('*');
        $this->db->from('tbl_jadwal_rup');
        $this->db->where('id_rup', $id_rup);
        $this->db->where('nama_jadwal_rup', 'Undangan Penawaran dan Download Dokumen Pengadaan');
        $query = $this->db->get();
        return $query->row_array();
    }

    public function jadwal_pra_umum_11($id_rup)
    {
        $this->db->select('*');
        $this->db->from('tbl_jadwal_rup');
        $this->db->where('id_rup', $id_rup);
        $this->db->where('nama_jadwal_rup', 'Aanwijzing (Tanya Jawab Dokumen Pengadaan)');
        $query = $this->db->get();
        return $query->row_array();
    }

    public function jadwal_pra_umum_12($id_rup)
    {
        $this->db->select('*');
        $this->db->from('tbl_jadwal_rup');
        $this->db->where('id_rup', $id_rup);
        $this->db->where('nama_jadwal_rup', 'Upload Dokumen Penawaran');
        $query = $this->db->get();
        return $query->row_array();
    }

    public function jadwal_pra_umum_13($id_rup)
    {
        $this->db->select('*');
        $this->db->from('tbl_jadwal_rup');
        $this->db->where('id_rup', $id_rup);
        $this->db->where('nama_jadwal_rup', 'Pembukaan dan Evaluasi Penawaran File I : Administrasi dan Teknis');
        $query = $this->db->get();
        return $query->row_array();
    }

    public function jadwal_pra_umum_14($id_rup)
    {
        $this->db->select('*');
        $this->db->from('tbl_jadwal_rup');
        $this->db->where('id_rup', $id_rup);
        $this->db->where('nama_jadwal_rup', 'Presentasi Dan Evaluasi Dokumen Teknis');
        $query = $this->db->get();
        return $query->row_array();
    }

    public function jadwal_pra_umum_15($id_rup)
    {
        $this->db->select('*');
        $this->db->from('tbl_jadwal_rup');
        $this->db->where('id_rup', $id_rup);
        $this->db->where('nama_jadwal_rup', 'Pemberitahuan/Pengumuman Peringkat Teknis');
        $query = $this->db->get();
        return $query->row_array();
    }

    public function jadwal_pra_umum_16($id_rup)
    {
        $this->db->select('*');
        $this->db->from('tbl_jadwal_rup');
        $this->db->where('id_rup', $id_rup);
        $this->db->where('nama_jadwal_rup', 'Pembukaan dan Evaluasi Penawaran File II : Harga');
        $query = $this->db->get();
        return $query->row_array();
    }

    public function jadwal_pra_umum_17($id_rup)
    {
        $this->db->select('*');
        $this->db->from('tbl_jadwal_rup');
        $this->db->where('id_rup', $id_rup);
        $this->db->where('nama_jadwal_rup', 'Upload Berita Acara Hasil Pengadaan');
        $query = $this->db->get();
        return $query->row_array();
    }

    public function jadwal_pra_umum_18($id_rup)
    {
        $this->db->select('*');
        $this->db->from('tbl_jadwal_rup');
        $this->db->where('id_rup', $id_rup);
        $this->db->where('nama_jadwal_rup', 'Penetapan Pemenang');
        $query = $this->db->get();
        return $query->row_array();
    }

    public function jadwal_pra_umum_19($id_rup)
    {
        $this->db->select('*');
        $this->db->from('tbl_jadwal_rup');
        $this->db->where('id_rup', $id_rup);
        $this->db->where('nama_jadwal_rup', 'Pengumuman Pemenang');
        $query = $this->db->get();
        return $query->row_array();
    }

    public function jadwal_pra_umum_20($id_rup)
    {
        $this->db->select('*');
        $this->db->from('tbl_jadwal_rup');
        $this->db->where('id_rup', $id_rup);
        $this->db->where('nama_jadwal_rup', 'Masa Sanggah Hasil Pengadaan');
        $query = $this->db->get();
        return $query->row_array();
    }

    public function jadwal_pra_umum_21($id_rup)
    {
        $this->db->select('*');
        $this->db->from('tbl_jadwal_rup');
        $this->db->where('id_rup', $id_rup);
        $this->db->where('nama_jadwal_rup', 'Surat Penunjukkan Penyedia Barang/Jasa');
        $query = $this->db->get();
        return $query->row_array();
    }

    public function jadwal_pra_umum_22($id_rup)
    {
        $this->db->select('*');
        $this->db->from('tbl_jadwal_rup');
        $this->db->where('id_rup', $id_rup);
        $this->db->where('nama_jadwal_rup', 'Penandatanganan Kontrak');
        $query = $this->db->get();
        return $query->row_array();
    }


    public function jadwal_pra_umum_223($id_rup)
    {
        $this->db->select('*');
        $this->db->from('tbl_jadwal_rup');
        $this->db->where('id_rup', $id_rup);
        $this->db->like('nama_jadwal_rup', 'Penandatanganan Kontrak');
        $query = $this->db->get();
        return $query->row_array();
    }

    public function jadwal_pra1file_umum_1($id_rup)
    {
        $this->db->select('*');
        $this->db->from('tbl_jadwal_rup');
        $this->db->where('id_rup', $id_rup);
        $this->db->like('nama_jadwal_rup', 'Pengumuman, Pendaftaran dan Download Dokumen Tender Terbatas');
        $query = $this->db->get();
        return $query->row_array();
    }

    public function jadwal_pra1file_umum_2($id_rup)
    {
        $this->db->select('*');
        $this->db->from('tbl_jadwal_rup');
        $this->db->where('id_rup', $id_rup);
        $this->db->like('nama_jadwal_rup', 'Anwijzing (Tanya Jawab PQ)');
        $query = $this->db->get();
        return $query->row_array();
    }

    public function jadwal_pra1file_umum_3($id_rup)
    {
        $this->db->select('*');
        $this->db->from('tbl_jadwal_rup');
        $this->db->where('id_rup', $id_rup);
        $this->db->where('nama_jadwal_rup', 'Pemasukan Dokumen PQ/Upload Dokumen Kualifikasi');
        $query = $this->db->get();
        return $query->row_array();
    }

    public function jadwal_pra1file_umum_4($id_rup)
    {
        $this->db->select('*');
        $this->db->from('tbl_jadwal_rup');
        $this->db->where('id_rup', $id_rup);
        $this->db->where('nama_jadwal_rup', 'Pembukaan Dokumen PQ');
        $query = $this->db->get();
        return $query->row_array();
    }

    public function jadwal_pra1file_umum_5($id_rup)
    {
        $this->db->select('*');
        $this->db->from('tbl_jadwal_rup');
        $this->db->where('id_rup', $id_rup);
        $this->db->where('nama_jadwal_rup', 'Pembuktian Kualifikasi');
        $query = $this->db->get();
        return $query->row_array();
    }

    public function jadwal_pra1file_umum_6($id_rup)
    {
        $this->db->select('*');
        $this->db->from('tbl_jadwal_rup');
        $this->db->where('id_rup', $id_rup);
        $this->db->where('nama_jadwal_rup', 'Evaluasi Kualifikasi');
        $query = $this->db->get();
        return $query->row_array();
    }

    public function jadwal_pra1file_umum_7($id_rup)
    {
        $this->db->select('*');
        $this->db->from('tbl_jadwal_rup');
        $this->db->where('id_rup', $id_rup);
        $this->db->where('nama_jadwal_rup', 'Persetujuan / Pengesahan Hasil Prakualifikasi');
        $query = $this->db->get();
        return $query->row_array();
    }

    public function jadwal_pra1file_umum_8($id_rup)
    {
        $this->db->select('*');
        $this->db->from('tbl_jadwal_rup');
        $this->db->where('id_rup', $id_rup);
        $this->db->where('nama_jadwal_rup', 'Pengumuman Hasil Prakualifikasi');
        $query = $this->db->get();
        return $query->row_array();
    }

    public function jadwal_pra1file_umum_9($id_rup)
    {
        $this->db->select('*');
        $this->db->from('tbl_jadwal_rup');
        $this->db->where('id_rup', $id_rup);
        $this->db->where('nama_jadwal_rup', 'Masa Sanggah & Jawaban Sanggah PQ');
        $query = $this->db->get();
        return $query->row_array();
    }

    public function jadwal_pra1file_umum_10($id_rup)
    {
        $this->db->select('*');
        $this->db->from('tbl_jadwal_rup');
        $this->db->where('id_rup', $id_rup);
        $this->db->like('nama_jadwal_rup', 'Undangan Penawaran');
        $query = $this->db->get();
        return $query->row_array();
    }

    public function jadwal_pra1file_umum_11($id_rup)
    {
        $this->db->select('*');
        $this->db->from('tbl_jadwal_rup');
        $this->db->where('id_rup', $id_rup);
        $this->db->where('nama_jadwal_rup', 'Pengambilan Dokumen Pengadaan/Download Dokumen Pengadaan');
        $query = $this->db->get();
        return $query->row_array();
    }

    public function jadwal_pra1file_umum_12($id_rup)
    {
        $this->db->select('*');
        $this->db->from('tbl_jadwal_rup');
        $this->db->where('id_rup', $id_rup);
        $this->db->where('nama_jadwal_rup', 'Rapat Penjelasan/Aanwijzing');
        $query = $this->db->get();
        return $query->row_array();
    }


    public function jadwal_pra1file_umum_13($id_rup)
    {
        $this->db->select('*');
        $this->db->from('tbl_jadwal_rup');
        $this->db->where('id_rup', $id_rup);
        $this->db->where('nama_jadwal_rup', 'Pemasukan Penawaran dan Jaminan Penawaran/Upload Dokumen Penawaran');
        $query = $this->db->get();
        return $query->row_array();
    }

    public function jadwal_pra1file_umum_14($id_rup)
    {
        $this->db->select('*');
        $this->db->from('tbl_jadwal_rup');
        $this->db->where('id_rup', $id_rup);
        $this->db->like('nama_jadwal_rup', 'Evaluasi Penawaran');
        $query = $this->db->get();
        return $query->row_array();
    }


    public function jadwal_pra1file_umum_15($id_rup)
    {
        $this->db->select('*');
        $this->db->from('tbl_jadwal_rup');
        $this->db->where('id_rup', $id_rup);
        $this->db->where('nama_jadwal_rup', 'Klarifikasi dan Negosiasi Teknik dan Biaya');
        $query = $this->db->get();
        return $query->row_array();
    }

    public function jadwal_pra1file_umum_16($id_rup)
    {
        $this->db->select('*');
        $this->db->from('tbl_jadwal_rup');
        $this->db->where('id_rup', $id_rup);
        $this->db->where('nama_jadwal_rup', 'Pengajuan Usulan Calon Pemenang / Hasil Negosiasi');
        $query = $this->db->get();
        return $query->row_array();
    }

    public function jadwal_pra1file_umum_17($id_rup)
    {
        $this->db->select('*');
        $this->db->from('tbl_jadwal_rup');
        $this->db->where('id_rup', $id_rup);
        $this->db->where('nama_jadwal_rup', 'Persetujuan Calon Pemenang / Hasil Negosiasi');
        $query = $this->db->get();
        return $query->row_array();
    }

    public function jadwal_pra1file_umum_18($id_rup)
    {
        $this->db->select('*');
        $this->db->from('tbl_jadwal_rup');
        $this->db->where('id_rup', $id_rup);
        $this->db->where('nama_jadwal_rup', 'Pemberitahuan / Pengumuman Pemenang Pengadaan');
        $query = $this->db->get();
        return $query->row_array();
    }

    public function jadwal_pra1file_umum_19($id_rup)
    {
        $this->db->select('*');
        $this->db->from('tbl_jadwal_rup');
        $this->db->where('id_rup', $id_rup);
        $this->db->where('nama_jadwal_rup', 'Masa Sanggah & Jawaban Sanggah terhadap Pemenang');
        $query = $this->db->get();
        return $query->row_array();
    }

    public function jadwal_pra1file_umum_20($id_rup)
    {
        $this->db->select('*');
        $this->db->from('tbl_jadwal_rup');
        $this->db->where('id_rup', $id_rup);
        $this->db->where('nama_jadwal_rup', 'Penunjukan Pelaksanaan Pekerjaan (Gunning)');
        $query = $this->db->get();
        return $query->row_array();
    }

    public function jadwal_pra1file_umum_21($id_rup)
    {
        $this->db->select('*');
        $this->db->from('tbl_jadwal_rup');
        $this->db->where('id_rup', $id_rup);
        $this->db->where('nama_jadwal_rup', 'Penandatanganan Kontrak');
        $query = $this->db->get();
        return $query->row_array();
    }

    // INI UNTUK JADWAL PENUNJUKAN LANGSUNG
    public function jadwal_juksung_4($id_rup)
    {
        $this->db->select('*');
        $this->db->from('tbl_jadwal_rup');
        $this->db->where('id_rup', $id_rup);
        $this->db->where('nama_jadwal_rup', 'Pembukaan Dokumen PQ');
        $query = $this->db->get();
        return $query->row_array();
    }

    public function jadwal_juksung_11($id_rup)
    {
        $this->db->select('*');
        $this->db->from('tbl_jadwal_rup');
        $this->db->where('id_rup', $id_rup);
        $this->db->where('nama_jadwal_rup', 'Pemasukan Penawaran dan Jaminan Penawaran');
        $query = $this->db->get();
        return $query->row_array();
    }



    public function jadwal_juksung_5($id_rup)
    {
        $this->db->select('*');
        $this->db->from('tbl_jadwal_rup');
        $this->db->where('id_rup', $id_rup);
        $this->db->where('nama_jadwal_rup', 'Pembuktian Dokumen PQ');
        $query = $this->db->get();
        return $query->row_array();
    }

    public function jadwal_juksung_8($id_rup)
    {
        $this->db->select('*');
        $this->db->from('tbl_jadwal_rup');
        $this->db->where('id_rup', $id_rup);
        $this->db->where('nama_jadwal_rup', 'Pengumuman Hasil Prakualifikasi');
        $query = $this->db->get();
        return $query->row_array();
    }

    public function jadwal_juksung_1($id_rup)
    {
        $this->db->select('*');
        $this->db->from('tbl_jadwal_rup');
        $this->db->where('id_rup', $id_rup);
        $this->db->where('nama_jadwal_rup', 'Pengumuman / Undangan Penunjukan Langsung');
        $query = $this->db->get();
        return $query->row_array();
    }

    public function jadwal_juksung_2($id_rup)
    {
        $this->db->select('*');
        $this->db->from('tbl_jadwal_rup');
        $this->db->where('id_rup', $id_rup);
        $this->db->where('nama_jadwal_rup', 'Pendaftaran (Pengambilan Dokumen PQ)/Download Dokumen Kulaifikasi');
        $query = $this->db->get();
        return $query->row_array();
    }



    public function jadwal_juksung_16($id_rup)
    {
        $this->db->select('*');
        $this->db->from('tbl_jadwal_rup');
        $this->db->where('id_rup', $id_rup);
        $this->db->like('nama_jadwal_rup', 'Penetapan Pemenang Pengadaan');
        $query = $this->db->get();
        return $query->row_array();
    }



    public function jadwal_juksung_15($id_rup)
    {
        $this->db->select('*');
        $this->db->from('tbl_jadwal_rup');
        $this->db->where('id_rup', $id_rup);
        $this->db->where('nama_jadwal_rup', 'Penetapan Pemenang Pengadaan');
        $query = $this->db->get();
        return $query->row_array();
    }

    // ININ UNUTK JADWAL PASACA KUALIFIKASI TENDER TERBATAS

    public function jadwal_pasca_terbatas($id_rup)
    {
        $this->db->select('*');
        $this->db->from('tbl_jadwal_rup');
        $this->db->where('id_rup', $id_rup);
        $this->db->like('nama_jadwal_rup', 'Penunjukan Pelaksanaan Pekerjaan (Gunning)');
        $query = $this->db->get();
        return $query->row_array();
    }


    public function jadwal_tender_terbatas_pasca_1_file_12($id_rup)
    {
        $this->db->select('*');
        $this->db->from('tbl_jadwal_rup');
        $this->db->where('id_rup', $id_rup);
        $this->db->like('nama_jadwal_rup', 'Masa Sanggah & Jawaban Sanggah terhadap Pemenang');
        $query = $this->db->get();
        return $query->row_array();
    }

    public function jadwal_tender_terbatas_pasca_1_file_8($id_rup)
    {
        $this->db->select('*');
        $this->db->from('tbl_jadwal_rup');
        $this->db->where('id_rup', $id_rup);
        $this->db->like('nama_jadwal_rup', 'Pembuktian Kualifikasi Terhadap Peringkat 1');
        $query = $this->db->get();
        return $query->row_array();
    }

    public function jadwal_tender_terbatas_pasca_1_file_11($id_rup)
    {
        $this->db->select('*');
        $this->db->from('tbl_jadwal_rup');
        $this->db->where('id_rup', $id_rup);
        $this->db->like('nama_jadwal_rup', 'Pemberitahuan / Pengumuman Pemenang Pengadaan');
        $query = $this->db->get();
        return $query->row_array();
    }


    public function jadwal_tender_terbatas_pasca_1_file_1($id_rup)
    {
        $this->db->select('*');
        $this->db->from('tbl_jadwal_rup');
        $this->db->where('id_rup', $id_rup);
        $this->db->like('nama_jadwal_rup', 'Pengumuman Tender Terbatas');
        $query = $this->db->get();
        return $query->row_array();
    }




    public function jadwal_tender_terbatas_pasca_1_file_2($id_rup)
    {
        $this->db->select('*');
        $this->db->from('tbl_jadwal_rup');
        $this->db->where('id_rup', $id_rup);
        $this->db->where('nama_jadwal_rup', 'Pengambilan Dokumen Tender (Kualifikasi dan Pengadaan) / Download Dokumen Tender (Kualifikasi dan Pengadaan)');
        $query = $this->db->get();
        return $query->row_array();
    }

    public function jadwal_tender_terbatas_pasca_1_file_3($id_rup)
    {
        $this->db->select('*');
        $this->db->from('tbl_jadwal_rup');
        $this->db->where('id_rup', $id_rup);
        $this->db->like('nama_jadwal_rup', 'Pemasukan Dokumen Tender (Kualifikasi dan Penawaran) / Upload Dokumen Tender (Kualifikasi dan Penawaran)');
        $query = $this->db->get();
        return $query->row_array();
    }


    public function jadwal_tender_terbatas_pasca_1_file_4($id_rup)
    {
        $this->db->select('*');
        $this->db->from('tbl_jadwal_rup');
        $this->db->where('id_rup', $id_rup);
        $this->db->like('nama_jadwal_rup', 'Pembukaan Dokumen Tender (Dok Kualifikasi dan Penawaran)');
        $query = $this->db->get();
        return $query->row_array();
    }


    public function jadwal_pra1file_pasca_3($id_rup)
    {
        $this->db->select('*');
        $this->db->from('tbl_jadwal_rup');
        $this->db->where('id_rup', $id_rup);
        $this->db->where('nama_jadwal_rup', 'Rapat Penjelasan/Aanwijzing');
        $query = $this->db->get();
        return $query->row_array();
    }
}
