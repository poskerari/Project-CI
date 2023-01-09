<title>Login</title> 
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller{

	function __construct(){
		parent::__construct();
		$this->load->model('Global_m');
	}

	public function index()
	{
		$this->load->view ('login_v');
	}
	public function ceklogin()
	{
		$user=$this->input->post('username');
		$pass=$this->input->post('password');

		$key ="!@#$%^&*";
		$password=$key."".$pass."".$key;

		//echo "password = ".$pass."<br>";
		//echo "password + key = ".$pass."<br>";	
		//echo "password md5 = ".md5($password)."<br>";
		$where = array(
			'username' => $user,
			'password' =>  md5($password) 
		);

		$datauser=$this->Global_m->ceklogin_m('login',$where);

		foreach($datauser->result() as $dt){
			$nama=$dt->nama;
			$email=$dt->email;
		}

		//echo "nama anda adalah : ".$nama;
		//echo "email anda adalah : ".$email;
		if($datauser->num_rows()>0){
			$data_session = array(
				'nama' => $nama,
				'email' => $email,
				'username' => $user
			);

			$this->session->set_userdata($data_session);
			redirect(base_url("menuutama"));
		}else{
			?>	
				<script type="text/javascript">
					alert("MAAF USERNAME ATAU PASSWORD ANDA SALAH !!!!");
					window.open("<?php echo base_url()."login"?>","_self");
				</script>
			<?php

		}
	}	
}
