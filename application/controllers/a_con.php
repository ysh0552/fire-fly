<?php
require_once "a_top.php";
class A_con extends a_top
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('con_model');
	
	}
	
	public function index()
	{
		$data['con_list']=$this->con_model->user_select();
		$this->load->view('admin/con1/top');
		$this->load->view('admin/con1/list',$data);
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
			$data_info=$this->con_model->user_select($id);
			$data['upfile1']=$data_info[0]['upfile'];
			$data['content']=$data_info[0]['content'];

		}else{
			$data['title_text']='添加';
			$data['button_name']='添加';
		}
		$this->load->view('admin/con1/top');
		$this->load->view('admin/con1/edit',$data);
		$this->load->view('admin/footer');
	}
	
	
	
	public function save()
	{
		$id=$this->input->post('hid');
		$upfile=$this->input->post('upfile1');
		$content=$this->input->post('content');
		//$content=str_replace('<img ', '<img onload="DrawImage(this,1100,1100)" ', $conEdit);
		
		$arr=array(
				   'upfile'=>$upfile,
				   'content'=>$content
				   );
		$this->load->view('admin/con1/top');
		if($id){
			$this->con_model->user_update($id,$arr);
			admin_msg('a_con/edit/1','修改成功！');
		}else{
			$this->con_model->user_insert($arr);
			admin_msg('a_con','添加成功！');
		}
	}
	
	public function delete()
	{
		$id=$this->uri->segment(3);
		$this->con_model->user_delete($id);
		admin_msg('a_con','删除成功！');
	}





}

?>