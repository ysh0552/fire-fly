<?php 
require_once "z_top.php";
class Technology extends z_top
{
	public function __construct()
	{
		parent::__construct();
	}
	
	public function index()
	{
		
		$data['word1']=$this->word1_model->user_select();

		$this->load->view('TECHNOLOGY',$data);
		$this->load->view('footer');
	}
}

?>
