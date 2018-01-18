<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	function __construct()
    {
        parent::__construct();
        $this->load->model('Barang_m');
    } 

	public function index()
	{
		$data ['barang'] = $this->Barang_m->get_jumlah();
		$this->template->load('adminTemplate','dashboard');
	}

}
