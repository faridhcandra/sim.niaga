<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Gudang extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper(array('url','form','file'));
	}

	public function index()
	{
		$data['menutitle'] = 'Dashboard';
		$data['menu'] = 'Home';
		$data['submenu'] = 'Dashboard';

		$this->load->view('gudang/template/head');
		$this->load->view('gudang/template/navbar');
		$this->load->view('gudang/template/sidebar',$data);
		$this->load->view('gudang/template/content');
		$this->load->view('gudang/template/footer');
	}

}

/* End of file Gudang.php */
/* Location: ./application/controllers/Gudang.php */