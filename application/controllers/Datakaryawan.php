<?php  
defined('BASEPATH') OR exit('No direct script access allowed');

class Datakaryawan extends CI_Controller{

	function __construct(){
		parent::__construct();
		$this->load->model('Global_m');
	}

	public function index()
	{
		$this->load->view ('header_v');
		$this->load->view ('datakaryawan_v');
		$this->load->view ('footer_v');
	}
}