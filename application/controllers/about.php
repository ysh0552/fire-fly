<?php 
require_once "z_top.php";
class About extends z_top
{
	public function __construct()
	{
		parent::__construct();
	}
	
	public function index()
	{
		
		$data['contect']=$this->contact_model->user_select(8);

		

		$this->load->view('ABOUT',$data);
		$this->load->view('footer');
	}
}

?>