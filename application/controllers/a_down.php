<?php
require_once "a_top.php";
class A_down extends a_top
{
	public function __construct()
	{
		parent::__construct();
		$this->load->view('admin/down/top');
		$this->load->model('down_model');
		$this->load->model('down_sort_model');
	}
	
	public function index()
	{
		/* 分页 */
		$this->load->library('pagination');
		$sid=$this->uri->segment(3);
		$id=$sid ? $sid : 1;
		
		$total=$this->down_model->user_select();
		$pageTotal= count($total);
		$pageNum=10;
		$config['base_url']=site_url().'/a_down/index/';
		$config['total_rows'] =$pageTotal;//总条数
		$config['per_page']=$pageNum;//每页条数
		$config['uri_segment'] = 3;//url
		$config['num_links'] = 2;
		$config['use_page_numbers']=TRUE;
		
		/* 分页样式 */
		$config['full_tag_open'] = '<div class="pagination">';
		$config['full_tag_close'] = '</div>';
		$config['first_link'] = '&laquo; 首页';
		$config['last_link'] = '尾页 &raquo;';
		$config['next_link'] = '下一页 &raquo;';
		$config['prev_link'] = '&laquo; 上一页';
		$config['cur_tag_open'] = '<a class="number current" >';
		$config['cur_tag_close'] = '</a>';
		$config['anchor_class'] =' class="ajax_fpage" ';
		
		$this->pagination->initialize($config);
		
		$data['links']=$this->pagination->create_links();//创建分页
		
		$start=($id-1)*$pageNum;
		
		$data['data_down']=$this->down_model->user_select_limit($start,$pageNum);

		$this->load->view('admin/down/list',$data);
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
			
			$data_info=$this->down_model->user_select($id);
			
			$data['title']=$data_info[0]['title'];
			$data['upfile']=$data_info[0]['upfile'];
			$data['content']=$data_info[0]['content'];
			$data['sid']=$data_info[0]['sid'];
			$data['index']=$data_info[0]['index'];
			$data['roll']=$data_info[0]['roll'];

		}else{
			$data['title_text']='添加';
			$data['button_name']='添加';
		}
		$this->load->view('admin/down/edit',$data);
		$this->load->view('admin/footer');
	}
	
	//保存
	public function save()
	{
		$id=$this->input->post('id');
		$title=$this->input->post('title');
		$index=$this->input->post('index');
		$roll=$this->input->post('roll');
		$upfile=$this->input->post('upfile');
		$content=$this->input->post('content');
		$sid=$this->input->post('sid');
		$createtime=date('Y-m-d H:i:s');

	
		
		if($id){		
		$arr=array(
				   'title'=>$title,
				   'upfile'=>$upfile,
				   'roll'=>$roll,
				   'index'=>$index,
				   'sid'=>$sid,
				   'content'=>$content				   
				 );

			$this->down_model->user_update($id,$arr);
			admin_msg('a_down','修改成功'); 
		}else{
		$arr=array(
				   'title'=>$title,
				   'index'=>$index,
				   'upfile'=>$upfile,
				   'roll'=>$roll,
				   'sid'=>$sid,
				   'content'=>$content,
				   'createtime'=>$createtime,
				 );
			$this->down_model->user_insert($arr);
			admin_msg('a_down','添加成功'); 
		}
	}
	
	/* 删除 */
	public function delete()
	{
		$id=$this->uri->segment(3);
		$data_info=$this->down_model->user_select($id);
		
		$editor_path='./resources/HMKindEditor/attached/';
		$content=$data_info[0]['content'];
		if($content != ''){
			$match_count = preg_match_all('/src\=.+?\.(jpg|png|bmp|gif)/',$content, $matches);
			for($i = 0; $i < $match_count; $i++){
				$editor_file=end(explode('/',$matches[0][$i]));
				@unlink($editor_path.$editor_file);
			}
		}
		
		$upfile_path='./upload/';
		
		$Dfile=$upfile_path.$data_info[0]['upfile'];

		if(file_exists($Dfile))
		{
			@unlink($Dfile);
		}
		
		$this->down_model->user_delete($id);
		admin_msg('a_down');
	}
	
	
}

?>