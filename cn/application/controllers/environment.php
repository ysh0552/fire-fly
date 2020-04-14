<?php 
require_once "z_top.php";
class Environment extends z_top
{
	public function __construct()
	{
		parent::__construct();
	}
	
	public function index()
	{
		
		$data['pic']=$this->ads_model->user_search('ENVIRONMENT');

		$this->load->view('ENVIRONMENT',$data);
		$this->load->view('footer');
	}
}

?>