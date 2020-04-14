<?php
require_once "a_top.php";
class A_about extends a_top
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('about_model');
		$this->load->model('qa_model');	
	}
	
	public function index()
	{
		$data['about_list']=$this->about_model->user_select();
		$this->load->view('admin/about/top');
		$this->load->view('admin/about/list',$data);
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
			
			$data_info=$this->about_model->user_select($id);
			
			$data['title']=$data_info[0]['title'];
			$data['upfile']=$data_info[0]['upfile'];
			$data['content']=$data_info[0]['content'];

		}else{
			$data['title_text']='添加';
			$data['button_name']='添加';
		}
		$this->load->view('admin/about/top');
		$this->load->view('admin/about/edit',$data);
		$this->load->view('admin/footer');
	}
	
	public function save()
	{
		$id=$this->input->post('hid');
		$title=$this->input->post('title');
		$conEdit=$this->input->post('content');
		$content=str_replace('<img ', '<img onload="DrawImage(this,1100,1100)" ', $conEdit);


		$old_name=$this->input->post('file_path');
		
		
		$upfile_path='./upload/about/';
	
		$Ofile=$upfile_path.'/'.$old_name;
		
		$config['upload_path']=$upfile_path;//路径
		$config['file_name']=date('ymdhis');  //文件名
		$config['allowed_types']='gif|jpg|png'; //类型
		$config['max_size']="20000"; //大小
		$this->load->library("upload",$config);
		
		if($this->upload->do_upload('upfile'))
		{
			
			$data=array('up_load'=>$this->upload->data());
			$file_name=$data['up_load']['file_name'];
			
			if($id){
				if(file_exists($Ofile)){
					@unlink($Ofile);
				}
			}
		}else{
			$file_name=$old_name;
		}
		
		$arr=array(
				   'title'=>$title,
				   'content'=>$content,
				   'upfile'=>$file_name
				   );
		$this->load->view('admin/about/top');
		if($id){
			$this->about_model->user_update($id,$arr);
			admin_msg('a_about','修改成功！');
		}else{
			$this->about_model->user_insert($arr);
			admin_msg('a_about','添加成功！');
		}
	}

	public function delete()
	{
		$id=$this->uri->segment(3);
		$this->about_model->user_delete($id);
		admin_msg('a_about','删除成功！');
	}



}

?>