<?php 
require_once "z_top.php";
class Msg extends z_top
{
	public function __construct()
	{
		parent::__construct();
		
	}
	
	public function index()
	{
		$this->load->model('msg_model');
		$name=$this->input->post('name');
		$email=$this->input->post('email');
		$content=$this->input->post('content');
		$arr=array('name'=>$name,'email'=>$email,'content'=>$content,'createtime'=>date('Y-m-d H:i:s'));
		$this->msg_model->user_insert($arr);
		admin_msg('index','提交成功！');
		$this->load->view('index');
	}
	
	
}

?>