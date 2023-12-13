<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Landing extends CI_Controller
{
	public function index()
	{
		redirect('https://eprocurement.jmto.co.id/');
		//$this->load->view('landing/index');
	}
}
