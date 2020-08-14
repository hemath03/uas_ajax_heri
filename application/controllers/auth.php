<?php

/**
 * 
 */
class Auth extends CI_controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
	}
	
	function index()
	{
		$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
		$this->form_validation->set_rules('password', 'Password', 'required|trim');
		if ($this->form_validation->run() == false) {
			$this->load->view('auth/login');
		}else {
			$this->_login();
		}

	}

	private function _login(){
		$username = $this->input->post('email');
		$password = $this->input->post('password');

		$query = $this->db->get_where('pengguna', ['username'=>$username])->row_array();

	    if ($query) {
			 if (password_verify($password, $query['password'])) {
			 	$data = ['username' => $username];
			 	$this->session->set_userdata($data);
			 	redirect('admin');
			 } else {
			 	$this->session->set_flashdata('message', 
			 	'<div class="alert alert-danger" role="alert">
			 	Password salah</div>'); redirect('auth');
			 }
		} else {
			$this->session->set_flashdata('message', 
			'<div class="alert alert-danger" role="alert">Email tidak ditemukan</div>');
		 	redirect('auth');
		}

	}

	function registration()
	{	
		$this->form_validation->set_rules('name', 'Name', 'required|trim');
		$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[pengguna.username]');
		$this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[8]|matches[password2]',[
			'matches' => 'Password tidak sesuai',
			'min_length' => 'Minimal password 8 karakter'
		]);
		$this->form_validation->set_rules('password2', 'Password', 'required|trim|min_length[8]|matches[password1]');
		if ($this->form_validation->run() == false) {
			$this->load->view('auth/registration');
		} else{
		 	$data = array(
		 		'username' => htmlspecialchars($this->input->post('email', true)), 
		 		'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT), 
		 		'nama_user' => htmlspecialchars($this->input->post('name', true)), 
		 	);
		 	$this->db->insert('pengguna', $data);
		 	$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Selamat akun telah terdaftar</div>');
		 	redirect('auth');
		}
	}	

	function logout(){
		$this->session->unset_userdata('username');

		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Berhasil keluar</div>');
		 	redirect('auth');
	}

	function ubah_password(){
		$data['pengguna'] = $this->db->get_where('pengguna' , [
      		'username' => $this->session->userdata('username')
    	])->row_array();
    	$data['error'] = 'Minimal 8 karakter';
    	$this->load->view('templates/header');
		$this->load->view('templates/sidebar');
		$this->load->view('auth/ubah_password', $data);
		$this->load->view('templates/footer');
	}

	function update(){

		$this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[8]',[
			'min_length' => 'Minimal password 8 karakter'
		]);

    	if ($this->form_validation->run() == false) { 
			redirect('auth/ubah_password');
		} else{
		 	$nama_user 		= $this->input->post('nama');
			$password 		= password_hash($this->input->post('password'), PASSWORD_DEFAULT);
			$username 		= $this->input->post('username');
    	
	    	$data = array (
	    		'nama_user' => $nama_user,
				'password' 	=> $password,
				'username' 	=> $username,
	    	);

	    	$where = array(
	    		'username' => $username
    		);
		 	$this->db->where($where);
       		$this->db->update('pengguna',$data);
    		redirect('admin');
		}

    	
	}

}

?>