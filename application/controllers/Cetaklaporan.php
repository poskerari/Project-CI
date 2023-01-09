<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Cetaklaporan extends CI_Controller{

	function __construct(){
		parent::__construct();
		$this->load->model('Global_m');
	}

	public function index()
	{
		$this->load->view ('header_v');
		$this->load->view ('cetaklaporan_v');
		$this->load->view ('footer_v');
	}
	public function cetakexcel(){
		$filter=$this->input->get('filter');
		$Id_karyawan=$this->input->get('Id_karyawan');
		$nama_karyawan=$this->input->get('nama_karyawan');

		if($filter=="id"){
			$field ='Id_karyawan';
			$datafield=$Id_karyawan;
		}else{
 			$field ='nama_karyawan';
			$datafield=$nama_karyawan;
		}

		$where = array(
			$field => $datafield 
		);
		$data ['laporan'] = $this->Global_m->data_laporan($where,'karyawan');
		$data['filter']=$filter;
		$this->load->view('laporanexcel_v',$data);
	}
	public function cetakpdf(){
		$filter=$this->input->get('filter');
		$Id_karyawan=$this->input->get('Id_karyawan');
		$nama_karyawan=$this->input->get('nama_karyawan');

		if($filter=="id"){
			$field ='Id_karyawan';
			$datafield=$Id_karyawan;
		}else{
			$field ='nama_karyawan';
			$datafield=$nama_karyawan;
		}

		$where = array(
			$field => $datafield 
		);
		$data ['laporan'] = $this->Global_m->data_laporan($where,'karyawan');
		$data['filter']=$filter;
		$this->load->view('laporanpdf_v',$data);
	}
}	 