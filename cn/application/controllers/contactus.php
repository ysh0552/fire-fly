<?php 
require_once "z_top.php";
class Contactus extends z_top
{
	public function __construct()
	{
		parent::__construct();
		
	}
	
	public function index()
	{

		$data['contact']=$this->ads1_model->user_select(14);
		
		$this->load->view('contactus',$data);
		$this->load->view('footer');
	}
	

	
}

?>