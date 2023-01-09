<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Tabelkaryawan extends CI_Controller{

	function __construct(){
		parent::__construct();
		$this->load->model('Global_m');
	}

	public function index()
	{
		$this->load->view ('header_v');
		$this->load->view ('Tabelkaryawan_v');
		$this->load->view ('footer_v');

	}
	public function gettabelkaryawan(){
		$this->Global_m->gettabelkaryawan();
	}

	public function SimpanData(){
		$Id_karyawan = $this->input->post('Id_karyawan');
		$nama_karyawan = $this->input->post('nama_karyawan');
		$alamat = $this->input->post('alamat');
		$ttl = $this->input->post('ttl');
		$pendidikan_terakhir = $this->input->post('pendidikan_terakhir');
		$no_hp = $this->input->post('no_hp');
		$email = $this->input->post('email');

		$data= array (
			'Id_karyawan' => $Id_karyawan,
			'nama_karyawan' => $nama_karyawan,
			'alamat' => $alamat,
			'ttl' => $ttl,
			'pendidikan_terakhir' => $pendidikan_terakhir,
			'no_hp' => $no_hp,
			'email' => $email,
		);
		$this->Global_m->input_data($data,'karyawan');

		echo '{"konfirmasi":"Data Berhasil Disimpan"}';
	}

	public function UpdateData(){
		$Id_karyawan = $this->input->post('Id_karyawan');
		$nama_karyawan = $this->input->post('nama_karyawan');
		$alamat = $this->input->post('alamat');
		$ttl = $this->input->post('ttl');
		$pendidikan_terakhir = $this->input->post('pendidikan_terakhir');
		$no_hp = $this->input->post('no_hp');
		$email = $this->input->post('email');

		$id_Id_karyawan = $this->input->get('id_Id_karyawan');

		$data= array (
			'Id_karyawan' => $Id_karyawan,
			'nama_karyawan' => $nama_karyawan,
			'alamat' => $alamat,
			'ttl' => $ttl,
			'pendidikan_terakhir' => $pendidikan_terakhir,
			'no_hp' => $no_hp,
			'email' => $email,
		);

		$where = array(
			'Id_karyawan' => $id_Id_karyawan
		);

		$this->Global_m->update_data($where,$data,'karyawan');

		echo '{"konfirmasi":"Data Berhasil DiUpdate"}';
	}
	public function Hapusdata(){
		$Id_karyawan = $this->input->post('Id_karyawan');
		$where = array (
			'Id_karyawan' => $Id_karyawan
		);
		$this->Global_m->hapus_data($where,'karyawan'); 
		echo '{"success":true}';
	}
}	