<?php

defined('BASEPATH') or exit('No direct script access allowed');

class User_login
{
    protected $ci;

    public function __construct()
    {
        $this->ci = &get_instance();
    }
 
    public function proteksi_halaman()
    {
        // lakukan instansiasi agar bisa terbaca di MVC
        $ci = get_instance(); // sama seperti $this->

        // cek sessionya apakah sudah melakukan proses login apa belum
        if (!$ci->session->userdata('username')) {

            $ci->session->set_flashdata('message', '<div class="alert alert-danger text-danger" role="alert">Anda harus login terlebih dahulu.!</div>');
            redirect('auth/login');
        } else {
            $status = $ci->session->userdata('status');
            $url = $ci->uri->segment(1);

            if (strtolower($status) !== $url) {
                redirect('auth/block');
            }
        }
    }
}
