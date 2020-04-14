<?php
require_once "a_top.php";
class A_video extends a_top
{
	public function __construct()
	{
		parent::__construct();
		
		$this->load->model('video_model');
		$this->load->model('sort_model');
		$this->load->view('admin/video/top');
	}
	
	public function index()
	{
		
		//配置分页类
		$this->load->library('pagination');
			
		$total=$this->video_model->user_select();
		$pageTotal= count($total);
		$sid=$this->uri->segment(3);
		$id=$sid ? $sid : 1;
		
		$pageNum=10;
		
		$config['base_url']=site_url().'/a_video/index/';
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
		$data['pages'] = $this->pagination->create_links();
		if(!empty($data['page'])){
	
		}
	
		$start=($id-1)*$pageNum;
		$data['data_video']=$this->video_model->user_select_limit($start,$pageNum);

		$this->load->view('admin/video/list',$data);
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
		
		
		
		if(!empty($id) && $id>0){
			$data['title_text']='编辑';
			$data['button_name']='修改';
			
			$data_info=$this->video_model->user_select($id);
			
			$data['title']=$data_info[0]['title'];
			$data['copy']=$data_info[0]['copy'];
			$data['upfile']=$data_info[0]['upfile'];
			$data['upfile1']=$data_info[0]['upfile1'];
			$data['content']=$data_info[0]['content'];
			$data['types']=$data_info[0]['types'];
			$data['index']=$data_info[0]['index'];
			$data['big']=$data_info[0]['big'];
			$data['links']=$data_info[0]['links'];
			$data['sid']=$data_info[0]['sid'];
			$data['sort']=$data_info[0]['sort'];
			
		}else{
			$data['title_text']='添加';
			$data['button_name']='添加';
		}
		$this->load->view('admin/video/edit',$data);
		$this->load->view('admin/footer');
	}
	
	//保存
	public function save()
	{
		$id=$this->input->post('id');
		$title=$this->input->post('title');
		$copy=$this->input->post('copy');
		$sid=$this->input->post('sid');
		$index=$this->input->post('index');
		$upfile=$this->input->post('upfile');
		$upfile1=$this->input->post('upfile1');
		$types=$this->input->post('types');
		$big=$this->input->post('big');
		$links=$this->input->post('links');
		$sort=(int)$this->input->post('sort');
		$createtime=date('Y-m-d H:i:s');
		
		if($title == ''){
			admin_msg('back','标题不能为空');
			return;
		}
		
		if($id){	
			
		$arr=array(
				   'title'=>$title,
				   'copy'=>$copy,
				   'types'=>$types,
				   'links'=>$links,
				   'sid'=>$sid,
				   'index'=>$index,
				   'big'=>$big,
				   'upfile'=>$upfile,
				   'sort'=>$sort,				   
				   'upfile1'=>$upfile1,
				 );

			$this->video_model->user_update($id,$arr);
			admin_msg('a_video','修改成功'); 
		}else{
		$arr=array(
				   'title'=>$title,
				   'index'=>$index,
				   'sid'=>$sid,
				   'links'=>$links,
				   'big'=>$big,
				   'types'=>$types,
				   'createtime'=>$createtime,
				   'upfile'=>$upfile,
				   'upfile1'=>$upfile1,
				 );
			$this->video_model->user_insert($arr);
			admin_msg('a_video','添加成功'); 
		}
	}
	
	/* 删除 */
	public function delete()
	{
		$id=$this->uri->segment(3);
		$data_info=$this->video_model->user_select($id);
				
		$this->video_model->user_delete($id);
		admin_msg('a_video');
	}
	
	
}

?>