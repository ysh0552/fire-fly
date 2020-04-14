<?php
require_once "a_top.php";
class A_standby extends a_top
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('standby_model');
	}
	
	public function index()
	{
		$id=$this->uri->segment(3);
		
		$data['data_sort']=$this->standby_model->user_select($id);
		$this->load->view('admin/admin/standby',$data);
		$this->load->view('admin/footer');
	}
	
	
	/* 保存 */
	public function save()
	{
		$hid=$this->input->post('hid');
		$content=$this->input->post('content');
		$arr=array(
		'content'=>$content,
		);
		
		$this->standby_model->user_update($hid,$arr);
		admin_msg('a_standby/index/'.$hid,'修改成功');
	
	}
}

?>