<?php
require_once "a_top.php";
class A_learn extends a_top
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('learn_model');
	
	}
	
	public function index()
	{
		$data['learn_list']=$this->learn_model->user_select();
		$this->load->view('admin/learn/top');
		$this->load->view('admin/learn/list',$data);
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
			$data_info=$this->learn_model->user_select($id);
			$data['title']=$data_info[0]['title'];
			$data['content']=$data_info[0]['content'];

		}else{
			$data['title_text']='添加';
			$data['button_name']='添加';
		}
		$this->load->view('admin/learn/top');
		$this->load->view('admin/learn/edit',$data);
		$this->load->view('admin/footer');
	}
	
	
	
	public function save()
	{
		$id=$this->input->post('hid');
		$title=$this->input->post('title');
		$conEdit=$this->input->post('content');
		$content=str_replace('<img ', '<img onload="DrawImage(this,1100,1100)" ', $conEdit);


		
		
		$arr=array(
				   'title'=>$title,
				   'content'=>$content
				   );
		$this->load->view('admin/learn/top');
		if($id){
			$this->learn_model->user_update($id,$arr);
			admin_msg('a_learn','修改成功！');
		}else{
			$this->learn_model->user_insert($arr);
			admin_msg('a_learn','添加成功！');
		}
	}
	
	public function delete()
	{
		$id=$this->uri->segment(3);
		$this->learn_model->user_delete($id);
		admin_msg('a_learn','删除成功！');
	}





}

?>