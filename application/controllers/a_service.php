<?php
require_once "a_top.php";
class A_service extends a_top
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('service_model');
	
	}
	
	public function index()
	{
		$data['service_list']=$this->service_model->user_select();
		$this->load->view('admin/service/top');
		$this->load->view('admin/service/list',$data);
		$this->load->view('admin/footer');
	}
	
	public function add()
	{
		$this->edit();
	}
	
	public function edit()
	{
		$id=$this->uri->segment(3);
		$data['id']=$id;
		if(!empty($id) && $id>0){
			$data['title_text']='编辑';
			$data['button_name']='修改';
			
			$data_info=$this->service_model->user_select($id);
			
			$data['title']=$data_info[0]['title'];
			$data['upfile']=$data_info[0]['upfile'];
			$data['content']=$data_info[0]['content'];
			$data['index']=$data_info[0]['index'];

		}else{
			$data['title_text']='添加';
			$data['button_name']='添加';
		}
		$this->load->view('admin/service/top');
		$this->load->view('admin/service/edit',$data);
		$this->load->view('admin/footer');
	}
	
	public function save()
	{
		$id=$this->input->post('hid');
		$title=$this->input->post('title');
		$index=$this->input->post('index');
		$conEdit=$this->input->post('content');
		$content=str_replace('<img ', '<img onload="DrawImage(this,1100,1100)" ', $conEdit);
		
		$createtime=date('Y-m-d H:i:s');
		
		$this->load->view('admin/service/top');
		if($id){
		$arr=array(
				   'title'=>$title,
				   'content'=>$content,
				   'index'=>$index
				   );
			
			$this->service_model->user_update($id,$arr);
			admin_msg('a_service','修改成功！');
		}else{
		$arr=array(
				   'title'=>$title,
				   'content'=>$content,
				   'index'=>$index,
				   'createtime'=>$createtime
				   );
			$this->service_model->user_insert($arr);
			admin_msg('a_service','添加成功！');
		}
	}

	public function delete()
	{
		$id=$this->uri->segment(3);
		$this->service_model->user_delete($id);
		admin_msg('a_service','删除成功！');
	}



}

?>