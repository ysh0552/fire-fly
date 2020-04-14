<?php 
require_once "z_top.php";
class Industries extends z_top
{
	public function __construct()
	{
		parent::__construct();
	}
	
	public function index()
	{
		
		$data['ind']=$this->ads1_model->user_select();

		$this->load->view('INDUSTRIES',$data);
		$this->load->view('footer');
	}

	public function indcon(){

		$id=$this->uri->segment(3);

		$data['ind']=$this->ads1_model->user_select($id);

		$this->load->view('INDUSTRIES2',$data);
		$this->load->view('footer');

	}
}

?>