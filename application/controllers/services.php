<?php 
require_once "z_top.php";
class Services extends z_top
{
	public function __construct()
	{
		parent::__construct();
	}
	
	public function index()
	{
		$data['service']=$this->ads1_model->user_select(13);
		$data['word1']=$this->word1_model->user_select();
		
		$this->load->view('services',$data);
		$this->load->view('footer');
	}
}

?>