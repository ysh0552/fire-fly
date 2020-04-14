<?php
require_once "a_top.php";
class A_download extends a_top
{
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('download_model');
	}
	
	public function index()
	{
		
		//配置分页类
		$this->load->library('pagination');
			
		$total=$this->download_model->user_select();
		$pageTotal= count($total);
		$sid=$this->uri->segment(3);
		$id=$sid ? $sid : 1;
		
		$pageNum=10;
		
		$config['base_url']=site_url().'/a_download/index/';
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
		if(!empty($data['page'])){
	
		}
	
		$start=($id-1)*$pageNum;
		$data['download_list']=$this->download_model->user_select_limit($start,$pageNum);

		
		
		$this->load->view('admin/download/top');
		$this->load->view('admin/download/list',$data);
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
			$data_info=$this->download_model->user_select($id);
			$data['title']=$data_info[0]['title'];
			$data['platform']=$data_info[0]['platform'];
			$data['sort']=$data_info[0]['sort'];
			$data['upfile']=$data_info[0]['upfile'];
			$data['big']=$data_info[0]['big'];
			$data['types']=$data_info[0]['types'];
			$data['explain']=$data_info[0]['explain'];

		}else{
			$data['title_text']='添加';
			$data['button_name']='添加';
		}
		$this->load->view('admin/download/top');
		$this->load->view('admin/download/edit',$data);
		$this->load->view('admin/footer');
	}
	
	public function save()
	{
		$id=$this->input->post('hid');
		$title=$this->input->post('title');
		$platform=$this->input->post('platform');
		$sort=(int)$this->input->post('sort');
		$upfile=$this->input->post('upfile');
		$big=$this->input->post('big');
		$types=$this->input->post('types');
		$explain=$this->input->post('explain');
		
		
		$updatetime=date('Y-m-d');
		$arr=array(
				   'title'=>$title,
				   'sort'=>$sort,
				   'upfile'=>$upfile,
				   'platform'=>$platform,
				   'big'=>$big,
				   'types'=>$types,
				   'explain'=>$explain,
				   'updatetime'=>$updatetime
				   );
				   
		$this->load->view('admin/download/top');
		if($id){
			$this->download_model->user_update($id,$arr);
			admin_msg('a_download','修改成功');
		}else{
			$this->download_model->user_insert($arr);
			admin_msg('a_download','保存成功');
		}
	}
	
	public function delete()
	{
		$id=$this->uri->segment(3);
		$targetFolder = './upload/'; //文件路径
		$data=$this->download_model->user_select($id);
		$upfilenames=$data[0]['upfile'];
		
		if(file_exists($targetFolder.$upfilenames)){
			@unlink($targetFolder.$upfilenames);
		}

		$this->download_model->user_delete($id);
		admin_msg('a_download');
	}





}

?>