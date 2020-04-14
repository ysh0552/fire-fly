<?php
require_once "a_top.php";
class A_show extends a_top
{
	var $name;
	public function __construct()
	{
		parent::__construct();
		
		$this->load->model('show_model');
	}
	
	public function index()
	{
		$data['show_list']=$this->show_model->user_select();
		$this->load->view('admin/show/top');
		$this->load->view('admin/show/list',$data);
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
			$data_info=$this->show_model->user_select($id);
			$data['title']=$data_info[0]['title'];
			$data['upfile']=$data_info[0]['upfile'];
			$data['upfile2']=$data_info[0]['upfile2'];
			$data['content']=$data_info[0]['content'];
			$data['big']=$data_info[0]['big'];
			$data['types']=$data_info[0]['types'];
			$data['links']=$data_info[0]['links'];

		}else{
			$data['title_text']='添加';
			$data['button_name']='添加';
		}
		$this->load->view('admin/show/top');
		$this->load->view('admin/show/edit',$data);
		$this->load->view('admin/footer');
	}
	
	public function save()
	{
		$id=$this->input->post('hid');
		$title=$this->input->post('title');
		$upfile=$this->input->post('upfile');
		$upfile2=$this->input->post('upfile2');
		$content=$this->input->post('content');
		$big=$this->input->post('big');
		$types=$this->input->post('types');
		$links=$this->input->post('links');
		$updatetime=date('Y-m-d H:i:s');
		$arr=array(
				   'title'=>$title,
				   'links'=>$links,
				   'upfile'=>$upfile,
				   'upfile2'=>$upfile2,
				   'content'=>$content,
				   'big'=>$big,
				   'types'=>$types,
				   'updatetime'=>$updatetime
				   );
				   
		$this->load->view('admin/show/top');
		if($id){
			$this->show_model->user_update($id,$arr);
			admin_msg('a_show','修改成功');
		}else{
			$this->show_model->user_insert($arr);
			admin_msg('a_show','保存成功');
		}
	}
	
	public function delete()
	{
		$id=$this->uri->segment(3);
		$targetFolder = './upload/'; //文件路径
		$data=$this->show_model->user_select($id);
		$upfilenames=$data[0]['upfile'];
		$upfilenames2=$data[0]['upfile2'];
		
		if(file_exists($targetFolder.$upfilenames)){
			@unlink($targetFolder.$upfilenames);
			@unlink($targetFolder.$upfilenames2);
		}

		$this->show_model->user_delete($id);
		admin_msg('a_show');
	}





}

?>