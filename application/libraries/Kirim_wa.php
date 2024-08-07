<?php
defined('BASEPATH') or exit('No direct script access allowed');
date_default_timezone_set("Asia/Jakarta");

class Kirim_wa
{
    protected $ci;
    public function kirim_wa_vendor_aktif($nomor_telpon)
    {
        $token = '3HGKVEwLaF7rIt@ZhVcV';
        $target = $nomor_telpon;
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://api.fonnte.com/send',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => array(
                'target' => $target,
                'message' => 'Selamat! Akun Anda Telah Aktif Pada Aplikasi E-PROCUREMENT PT. Jasamarga Tollroad Operator Silahkan Login Sebagai Penyedia https://drtproc.jmto.co.id/',
                'delay' => '120-300',
            ),
            CURLOPT_HTTPHEADER => array(
                "Authorization: $token"
            ),
        ));

        $response = curl_exec($curl);
        curl_close($curl);
    }
    public function kirim_wa_vendor_terdaftar($nomor_telpon, $pesan)
    {
        $token = '3HGKVEwLaF7rIt@ZhVcV';
        // $token = 'Md6J!e+vNCB4LNZkAcTq';
        $target = $nomor_telpon;
        $pesan = str_replace("-", " ", $pesan);
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://api.fonnte.com/send',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => array(
                'target' => $target,
                'message' => "$pesan",
                'delay' => '120-300',
            ),
            CURLOPT_HTTPHEADER => array(
                "Authorization: $token"
            ),
        ));

        $response = curl_exec($curl);
        curl_close($curl);
    }

    public function kirim_wa_vendor_terdaftar_regis($nomor_telpon, $data_wa)
    {
        $token_regis = $data_wa['token_regis'];
        $base_url = 'drtproc.jmto.co.id/registrasi/identitas/' . $token_regis;
        $token = '3HGKVEwLaF7rIt@ZhVcV';
        $target = $nomor_telpon;
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://api.fonnte.com/send',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => array(
                'target' => $target,
                'message' => "Silakan Klik Link Ini $base_url Untuk Melakukan Prosess Pendaftaran Selanjutnya atau Copy Paste Link tersebut Pada Browser dan Perangkat yang sama pada saat Melakukan Registrasi",
                'delay' => '120-300',
            ),
            CURLOPT_HTTPHEADER => array(
                "Authorization: $token"
            ),
        ));

        $response = curl_exec($curl);
        curl_close($curl);
    }


    public function kirim_wa_vendor_lupa_password($data)
    {
        $token_lupa_password = $data['token_lupa_password'];
        $base_url = 'https://drtproc.jmto.co.id/auth/buat_password/' . $token_lupa_password;
        $token = '3HGKVEwLaF7rIt@ZhVcV';
        $target = $data['no_telpon'];
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://api.fonnte.com/send',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => array(
                'target' => $target,
                'message' =>
                "Silakan Klik Link Ini $base_url Untuk Melakukan Prosess Pengubahan Password Anda 
Note : Agar membuka Link diperangkat dan Browser yang sama.",
                'delay' => '120-300',
            ),
            CURLOPT_HTTPHEADER => array(
                "Authorization: $token"
            ),
        ));

        $response = curl_exec($curl);
        curl_close($curl);
    }
}
