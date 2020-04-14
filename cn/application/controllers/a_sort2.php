<?php
require_once "a_top.php";
class A_sort2 extends a_top
{
	public function __construct()
	{
		parent::__construct();
		$this->load->view('admin/sort2/top');
		$this->load->model('sort2_model');
	}
	
	public function index()
	{
		$data['data_sort2']=$this->sort2_model->user_select();
		$this->load->view('admin/sort2/list',$data);
		$this->load->view('admin/footer');
	}
	
	
	/* 添加 */
	public function add()
	{
		$this->edit();
	}
	
	/* 编辑 */
	public function edit()
	{
		$id=$this->uri->segment(3);
		$data['id']=$id;
		$data['sort2']=$this->sort2_model->user_select();
		if(!empty($id) && $id>0)
		{
			$data['title_text']='编辑分类';
			$data['button_name']='修改';
			$data['data_sort2']=$this->sort2_model->user_select($id);
			
		}else{
			$data['title_text']='添加分类';
			$data['button_name']='添加';
			
		}
		$this->load->view('admin/sort2/edit',$data);
		$this->load->view('admin/footer');
	}
	
	/* 保存 */
	public function save()
	{
		$id=$this->input->post('id');
		$sort2name=$this->input->post('sort2name');
		
		
		if(hmStrlen($sort2name)==0 && hmStrlen($sort2name)>400 )
		{
			admin_msg('a_sort2','类名称不能为空或大于200字');
			exit;
		}
		
		$arr=array('sort2name'=>$sort2name);
		if(!empty($id) && $id>0)
		{
			$this->sort2_model->user_update($id,$arr);
			admin_msg('a_sort2/index/','修改成功');
		}else{
			$this->sort2_model->user_insert($arr);
			admin_msg('a_sort2/index/','添加成功');
		}
	}
	
	
	/* 删除 */
	public function delete()
	{
		$id=$this->uri->segment(3);
		$this->sort2_model->user_delete($id);
				
		admin_msg('a_sort2');
		
	}
	
}

?>