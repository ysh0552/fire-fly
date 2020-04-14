<?php
require_once "a_top.php";
class A_links extends a_top
{
	public function __construct()
	{
		parent::__construct();
		$this->load->view('admin/links/top');
	}
	
	public function index()
	{
		$data['data_sort']=$this->links_model->user_select();
		$this->load->view('admin/links/list',$data);
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
		$data['sort']=$this->links_model->user_select();
		if(!empty($id) && $id>0)
		{
			$data['title_text']='编辑分类';
			$data['button_name']='修改';
			$data['data_sort']=$this->links_model->user_select($id);
			
		}else{
			$data['title_text']='添加分类';
			$data['button_name']='添加';
			
		}
		$this->load->view('admin/links/edit',$data);
		$this->load->view('admin/footer');
	}
	
	/* 保存 */
	public function save()
	{
		$id=$this->input->post('id');
		$links=$this->input->post('links');

		if(hmStrlen($links)==0)
		{
			admin_msg('back','类名称不能为空');
			exit;
		}
		
		$arr=array('links'=>$links);
		if(!empty($id) && $id>0)
		{
			$this->links_model->user_update($id,$arr);
			admin_msg('a_links/index/','修改成功');
		}else{
			$this->links_model->user_insert($arr);
			admin_msg('a_sort/index/','添加成功');
		}
	}
	
	
}

?>