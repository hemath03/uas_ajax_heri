<?php 

/**
 * 
 */
class Member extends CI_Controller
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
		$this->load->view('members/member_view');
		$this->load->view('members/functions');
		$this->load->view('templates/footer');
	}


}

?>