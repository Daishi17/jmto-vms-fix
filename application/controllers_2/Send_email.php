<?php
defined('BASEPATH') or exit('No direct script access allowed');
error_reporting(0);
class Send_email extends CI_Controller
{

    public function kirim_email_registrasi()
    {
        $email = $this->uri->segment(3);
        $token_regis = $this->uri->segment(4);
        $base_url = base_url('registrasi/identitas/' . $token_regis);
        $config = array(
            'protocol' => 'smtp',
            'smtp_host' => 'kintekindo.net',
            'smtp_port' => 465,
            'smtp_user' => 'admin@kintekindo.net',
            'smtp_pass' => 'Kintekindo0902#',
            'mailtype'  => 'html',
            'charset'   => 'iso-8859-1'
        );
        $this->load->library('email', $config);
        $this->email->set_newline("\r\n");
        // Email dan nama pengirim
        $this->email->from('admin@kintekindo.net', 'JMTO');

        // Email penerima

        $this->email->to($email); // Ganti dengan email tujuan

        $this->email->subject('E-PROCUREMENT JMTO :  REGISTRASI');

        // Isi email
        $this->email->message("Silakan Klik Link Ini $base_url Untuk Melakukan Prosess Pendaftaran Selanjutnya ");

        $this->email->send();
    }
}
