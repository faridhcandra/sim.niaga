<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Auth extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper(array('url','form','file'));
	}

	public function index()
	{
		$this->load->view('login');
	}

	public function page404()
	{
		$this->load->view('notfound404');
	}

}

/* End of file Auth.php */
/* Location: ./application/controllers/Auth.php */