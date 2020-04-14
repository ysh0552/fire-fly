<?php
require_once "a_top.php";
class A_business extends a_top
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('business_model');
	}

	public function index()
	{
		$id=1;
		$d=$this->business_model->user_select($id);
		$data['title']=$d[0]['title'];
		$data['t1']=$d[0]['t1'];
		$data['t2']=$d[0]['t2'];
		$data['t3']=$d[0]['t3'];
		$data['t4']=$d[0]['t4'];
		$data['t5']=$d[0]['t5'];
		$data['c1']=$d[0]['c1'];
		$data['c2']=$d[0]['c2'];
		$data['c3']=$d[0]['c3'];
		$data['c4']=$d[0]['c4'];
		$data['c5']=$d[0]['c5'];

		
		$this->load->view('admin/business/edit',$data);
		$this->load->view('admin/footer');
	}
	
	public function save()
	{
		$id=1;
		$title=$this->input->post('title');
		$t1=$this->input->post('t1');
		$t2=$this->input->post('t2');
		$t3=$this->input->post('t3');
		$t4=$this->input->post('t4');
		$t5=$this->input->post('t5');
		$c1=$this->input->post('c1');
		$c2=$this->input->post('c2');
		$c3=$this->input->post('c3');
		$c4=$this->input->post('c4');
		$c5=$this->input->post('c5');
		
		if(hmStrlen($title) == 0 || hmStrlen($title) > 200 ){
			admin_msg('back','标题不能为空或大于100字');
			exit;
		}
		$arr=array('title'=>$title,
		't1'=>$t1,
		'c1'=>$c1,
		't2'=>$t2,
		'c2'=>$c2,
		't3'=>$t3,
		'c3'=>$c3,
		't4'=>$t4,
		'c4'=>$c4,
		't5'=>$t5,
		'c5'=>$c5
		);
		
		$this->business_model->user_update($id,$arr);
		admin_msg('a_business');
	}
	
}













?>