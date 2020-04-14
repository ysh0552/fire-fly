<?php
require_once "a_top.php";
class A_ads1 extends a_top
{
	public function __construct()
	{
		parent::__construct();
		$this->load->view('admin/ads1/top');
		$this->load->model('ads1_model');
	}
	
	public function index()
	{
		
		$data['data_ads']=$total=$this->ads1_model->user_select();

		$this->load->view('admin/ads1/list',$data);
		$this->load->view('admin/footer');
	}

	
	/* 添加 */
	public function add()
	{
		$this->edit();
	}
	
	
	/* 读取 */
	public function edit()
	{
		$id=$this->uri->segment(3);
		$data['id']=$id;
		$data['gid']=0;
		if(!empty($id) && $id>0){
			$data['title_text']='编辑';
			$data['button_name']='修改';
			
			$data_info=$this->ads1_model->user_select($id);
			
			$data['title']=$data_info[0]['title'];
			$data['upfile']=$data_info[0]['upfile'];
			$data['links']=$data_info[0]['links'];
			$data['sort']=$data_info[0]['sort'];
			$data['content']=$data_info[0]['content'];
			$data['content2']=$data_info[0]['content2'];

		}else{
			$data['title_text']='添加';
			$data['button_name']='添加';
		}
		$this->load->view('admin/ads1/edit',$data);
		$this->load->view('admin/footer');
	}
	
	//保存
	public function save()
	{
		$id=$this->input->post('id');
		$title=$this->input->post('title');
		$sort=(int)$this->input->post('sort');
		$links=$this->input->post('links');
		$upfile=$this->input->post('upfile');
		$content=$this->input->post('content');
		$content2=$this->input->post('content2');
		
		$old_name=$this->input->post('file_path');
	
		
		
		$arr=array(
				   'content'=>$content,
				   'content2'=>$content2,
				   'title'=>$title,
				   'links'=>$links,				  
				   'sort'=>$sort,
				   'upfile'=>$upfile,				 
				 );   
		if($id){
			$this->ads1_model->user_update($id,$arr);
			admin_msg('a_ads1','修改成功'); 
		}else{
			$this->ads1_model->user_insert($arr);
			admin_msg('a_ads1','添加成功'); 
		}
	}
	
	/* 删除 */
	public function delete()
	{
		$id=$this->uri->segment(3);
		$data_info=$this->ads1_model->user_select($id);
		$upfile_path='./upload/';
		$Dfile=$upfile_path.$data_info[0]['upfile'];
		if(file_exists($Dfile))
		{
			@unlink($Dfile);
		}
		
		$this->ads1_model->user_delete($id);
		admin_msg('a_ads1');
	}
	
	
}

?>