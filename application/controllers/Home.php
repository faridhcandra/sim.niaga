<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper(array('url','form','file'));
	}

	public function index()
	{
		$this->load->view('home');
	}

}

/* End of file Simniaga.php */
/* Location: ./application/controllers/Simniaga.php */