<?php
class A_msginfo extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('myFun');
		$this->load->helper('url');
		$this->load->model('msg_model');
	}
	
	public function index()
	{
		$id=$this->uri->segment(3);
		$data['msginfo']=$this->msg_model->user_select($id);
		$this->load->view('admin/msg/pro_n',$data);
	}
	
}


?>