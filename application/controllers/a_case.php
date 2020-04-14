<?php
class A_case extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->helper('myFun');
		$this->load->helper('url');
		$this->load->model('case_model');

		$name=$this->input->cookie('my');
		if(!$name){
			admin_msg('a_admin','请先登陆');
			exit;
		}
		
		$data['user_n']=$name;
		$this->load->view('admin/top',$data);
		$this->load->view('admin/case/top');
	}
	
	public function index()
	{
		/* 分页 */
		$this->load->library('pagination');
		$id=$this->uri->segment(3);
		$id=$id <= 0 ? 1 : $id;
		
		$total=$this->case_model->user_select();	
		$pageTotal= count($total);
		$pageNum=20;
		$config['base_url']=site_url().'/a_case/index/';
		$config['total_rows'] =$pageTotal;//总条数
		$config['per_page']=$pageNum;//每页条数
		$config['uri_segment'] = 3;//url
		$config['num_links'] = 10;
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
		

		$data['data_case']=$this->case_model->user_select_limit($start,$pageNum);

		$this->load->view('admin/case/list',$data);
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
			$data['title_text']='编辑内容';
			$data['button_name']='修改';
			
			$data_info=$this->case_model->user_select($id);
			
			$data['title']=$data_info[0]['title'];
			$data['content']=$data_info[0]['content'];
			$data['curFile']=$data_info[0]['curFile'];
			$data['upfile']=$data_info[0]['upfile'];
			$data['index']=$data_info[0]['index'];
			$data['sort']=$data_info[0]['sort'];
			$data['num']=$data_info[0]['num'];
			$data['content2']=$data_info[0]['content2'];

		}else{
			$data['title_text']='添加内容';
			$data['button_name']='添加';
		}
		$this->load->view('admin/case/edit',$data);
		$this->load->view('admin/footer');
	}
	
	//保存
	public function save()
	{
		$id=$this->input->post('id');
		$title=$this->input->post('title');
		$content2=$this->input->post('content2');
		$index=(int)$this->input->post('index');
		$sort=(int)$this->input->post('sort');
		$num=(int)$this->input->post('num');
		$curFile=$this->input->post('curFile');
		$upfile=$this->input->post('upfile');
		
		$conEdit=$this->input->post('content');
		$content=str_replace('<img ', '<img onload="DrawImage(this,770,1000)" ', $conEdit);
		
		
		$arr=array(
			'title'=>$title,
			'content'=>$content,
			'content2'=>$content2,
			'index'=>$index,
			'sort'=>$sort,
			'num'=>$num,
			'curFile'=>$curFile,
			'upfile'=>$upfile,
		);
		
		if($id){
			$this->case_model->user_update($id,$arr);
			admin_msg('a_case','修改成功'); 
		}else{
			$id=$this->case_model->user_insert($arr);
			admin_msg('a_case','添加成功');
		}
	}
	
	/* 删除 */
	public function delete()
	{
		$id=$this->uri->segment(3);
		$data_info=$this->case_model->user_select($id);
		$upfile_path='./upload/case/';
		@unlink($upfile_path.$data_info[0]['curFile']);

		$editor_path='./resources/HMKindEditor/attached/';
		$content=$data_info[0]['content'];
		if($content != ''){
			$match_count = preg_match_all('/src\=.+?\.(jpg|png|bmp|gif)/',$content, $matches);
			for($i = 0; $i < $match_count; $i++){
				$editor_file=end(explode('/',$matches[0][$i]));
				@unlink($editor_path.$editor_file);
			}
		}
		$this->case_model->user_delete($id);
		admin_msg('a_case');
	}
	
	
	
}

?>