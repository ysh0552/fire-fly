<?php
class A_top extends CI_Controller
{
	var $name;
	public function __construct()
	{
		parent::__construct();
		$this->load->helper('myfun');
		$this->load->helper('url');
		$this->name=$this->input->cookie('my');
		if(!$this->name)
		{
			admin_msg('a_login','请先登陆');
			exit;
		}
		$this->load->model('admin_model');
		
		$data['user_n']=$this->name;
		$this->load->view('admin/top',$data);
		
	}

}


?>