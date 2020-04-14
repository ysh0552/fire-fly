<?php
require_once "a_top.php";
class A_contact extends a_top
{
	public function __construct()
	{
		parent::__construct();
		$this->load->view('admin/contact/top');
		$this->load->model('contact_model');
	}
	
	public function index(){
		$data['contact']=$this->contact_model->user_select();
		$this->load->view('admin/contact/list',$data);
		$this->load->view('admin/footer');
	}
	
	public function add(){
		$this->edit();
	}
	
	public function edit()
	{
		$id=$this->uri->segment(3);
		$data['id']=$id;
		if($id){
			$d=$this->contact_model->user_select($id);
			$data['address']=$d[0]['address'];
			$data['content']=$d[0]['content'];
			
			$data['title']='更新内容';
			$data['buttonname']=' 保 存 ';
		}else{
			$data['title']='添加内容';
			$data['buttonname']=' 添 加 ';
		}
		
		$this->load->view('admin/contact/edit',$data);
		$this->load->view('admin/footer');
	}
	
	public function save()
	{
		$id=$this->input->post('hid');
		$address=$this->input->post('address');
		$content=$this->input->post('content');
		
	
		$arr=array('address'=>$address,'content'=>$content);
		if($id){
			$this->contact_model->user_update($id,$arr);
		}else{
			$this->contact_model->user_insert($arr);
		}
		admin_msg('a_contact/edit/8','保存成功');
	}
	
	/* 删除 */
	public function delete()
	{
		$id=$this->uri->segment(3);
		$data_info=$this->contact_model->user_select($id);
		
		$editor_path='./resources/HMKindEditor/attached/';
		$content=$data_info[0]['content'];
		if($content != ''){
			$match_count = preg_match_all('/src\=.+?\.(jpg|png|bmp|gif)/',$content, $matches);
			for($i = 0; $i < $match_count; $i++){
				$editor_file=end(explode('/',$matches[0][$i]));
				@unlink($editor_path.$editor_file);
			}
		}
		$this->contact_model->user_delete($id);
		admin_msg('a_contact');
	}
	
}













?>