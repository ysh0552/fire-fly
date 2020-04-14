<?php
require_once "a_top.php";
class A_qa extends a_top
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('qa_model');
	
	}
	
	public function index()
	{
		
		//配置分页类
		$this->load->library('pagination');
			
		$total=$this->qa_model->user_select();
		$pageTotal= count($total);
		$sid=$this->uri->segment(3);
		$id=$sid ? $sid : 1;
		
		$pageNum=10;
		
		$config['base_url']=site_url().'/a_qa/index/';
		$config['total_rows'] =$pageTotal;//总条数
		$config['per_page']=$pageNum;//每页条数
		$config['uri_segment'] = 3;//url
		$config['num_links'] = 2;
		$config['use_page_numbers']=TRUE;
		
		
		$config['full_tag_open'] = '<div class="pagination">';
		$config['full_tag_close'] = '</div>';
		$config['first_link'] = '&laquo; 首页';
		$config['last_link'] = '尾页 &raquo;';
		$config['next_link'] = '下一页 &raquo;';
		$config['prev_link'] = '&laquo; 上一页';
		$config['cur_tag_open'] = '<a class="number current" >';
		$config['cur_tag_close'] = '</a>';
//		$config['anchor_class'] =' class="ajax_fpage" ';
		//获取分页
		$this->pagination->initialize($config);
		$data['links'] = $this->pagination->create_links();

		$start=($id-1)*$pageNum;
		$data['qa_list']=$this->qa_model->user_select_limit($start,$pageNum);
		
		$this->load->view('admin/qa/top');
		$this->load->view('admin/qa/list',$data);
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
			
			$data_info=$this->qa_model->user_select($id);
			
			$data['title']=$data_info[0]['title'];
			$data['upfile']=$data_info[0]['upfile'];
			$data['content']=$data_info[0]['content'];
			$data['index']=$data_info[0]['index'];
			$data['sort']=$data_info[0]['sort'];

		}else{
			$data['title_text']='添加';
			$data['button_name']='添加';
		}
		$this->load->view('admin/qa/top');
		$this->load->view('admin/qa/edit',$data);
		$this->load->view('admin/footer');
	}
	
	public function save()
	{
		$id=$this->input->post('hid');
		$title=$this->input->post('title');
		$sort=(int)$this->input->post('sort');
		$index=$this->input->post('index');
		$conEdit=$this->input->post('content');
		$content=str_replace('<img ', '<img onload="DrawImage(this,1100,1100)" ', $conEdit);
		
		$createtime=date("Y/m/d");

		$old_name=$this->input->post('file_path');
		
		
		$upfile_path='./upload/qa/';
	
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
				   'sort'=>$sort,
				   'index'=>$index,
				   'content'=>$content,
				   'createtime'=>$createtime,
				   'upfile'=>$file_name
				   );
		$this->load->view('admin/qa/top');
		if($id){
			$this->qa_model->user_update($id,$arr);
			admin_msg('a_qa','修改成功！');
		}else{
			$this->qa_model->user_insert($arr);
			admin_msg('a_qa','添加成功！');
		}
	}

	public function delete()
	{
		$id=$this->uri->segment(3);
		$this->qa_model->user_delete($id);
		admin_msg('a_qa');
	}



}

?>