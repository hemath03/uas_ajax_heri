<?php 

/**
 * 
 */
class Peminjaman extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->helper('form');

	}

	function index()
	{
		$this->load->view('templates/header');
		$this->load->view('templates/sidebar');
		$this->load->view('pinjam/pinjam_view');
		$this->load->view('pinjam/functions');
		$this->load->view('templates/footer');
	}


}

?>