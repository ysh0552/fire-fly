<?php
require_once "a_top.php";
class A_sort extends a_top
{
	public function __construct()
	{
		parent::__construct();
		$this->load->view('admin/sort/top');
		$this->load->model('sort_model');
	}
	
	public function index()
	{
		$data['data_sort']=$this->sort_model->user_select();
		$this->load->view('admin/sort/list',$data);
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
		if(!empty($id) && $id>0)
		{
			$data['title_text']='编辑分类';
			$data['button_name']='修改';
			$data['data_sort']=$this->sort_model->user_select($id);
			
		}else{
			$data['title_text']='添加分类';
			$data['button_name']='添加';
			
		}
		$this->load->view('admin/sort/edit',$data);
		$this->load->view('admin/footer');
	}
	
	/* 保存 */
	public function save()
	{
		$id=$this->input->post('id');
		$sortname=$this->input->post('sortname');
		
		if(hmStrlen($sortname)==0 && hmStrlen($sortname)>400 )
		{
			admin_msg('a_sort','类名称不能为空或大于200字');
			exit;
		}
		
		$arr=array('sortname'=>$sortname);
		if(!empty($id) && $id>0)
		{
			$this->sort_model->user_update($id,$arr);
			admin_msg('a_sort/index/','修改成功');
		}else{
			$this->sort_model->user_insert($arr);
			admin_msg('a_sort/index/','添加成功');
		}
	}
	
	
	/* 删除 */
	public function delete()
	{
		$id=$this->uri->segment(3);
		$this->sort_model->user_delete($id);
		admin_msg('a_sort');
		
	}
	
}

?>