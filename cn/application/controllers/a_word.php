<?php
require_once "a_top.php";
class A_word extends a_top
{
	public function __construct()
	{
		parent::__construct();
		$this->load->view('admin/word/top');
		$this->load->model('word_model');
		$this->load->model('sort_model');
	}
	
	public function index()
	{
		/* 分页 */
		$this->load->library('pagination');
		$sid=$this->uri->segment(3);
		$id=$sid ? $sid : 1;
		
		$total=$this->word_model->user_select();
		$pageTotal= count($total);
		$pageNum=10;
		$config['base_url']=site_url().'/a_word/index/';
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
		
		$data['data_word']=$this->word_model->user_select_limit($start,$pageNum);

		$this->load->view('admin/word/list',$data);
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
		
		$data['sort']=$this->sort_model->user_select();
		if(!empty($id) && $id>0){
			$data['title_text']='编辑';
			$data['button_name']='修改';
			
			$data_info=$this->word_model->user_select($id);
			
			$data['title']=$data_info[0]['title'];
			$data['upfile']=$data_info[0]['upfile'];
			$data['content']=$data_info[0]['content'];
			$data['sid']=$data_info[0]['sid'];
			$data['pro_upfile']=$data_info[0]['pro_upfile'];
			$data['index']=$data_info[0]['index'];
			$data['roll']=$data_info[0]['roll'];
			$data['Features']=$data_info[0]['Features'];
			$data['Specifications']=$data_info[0]['Specifications'];

		}else{
			$data['title_text']='添加';
			$data['button_name']='添加';
		}
		$this->load->view('admin/word/edit',$data);
		$this->load->view('admin/footer');
	}
	
	//保存
	public function save()
	{
		$id=$this->input->post('id');
		$title=$this->input->post('title');
		$index=$this->input->post('index');
		$upfile=$this->input->post('upfile');
		$roll=$this->input->post('roll');
		$Features=$this->input->post('Features');
		$Specifications=$this->input->post('Specifications');
		$content=$this->input->post('content');
		$pro_upfile=$this->input->post('pro_upfile');
		$sid=$this->input->post('sid');
		$createtime=date('Y-m-d H:i:s');
		$old_name=$this->input->post('file_path');
		
		if($id){		
		$arr=array(
				   'title'=>$title,
				   'roll'=>$roll,
				   'Features'=>$Features,
				   'Specifications'=>$Specifications,
				   'index'=>$index,
				   'sid'=>$sid,
				   'pro_upfile'=>$pro_upfile,
				   'content'=>$content,
				   'upfile'=>$upfile,
				 );

			$this->word_model->user_update($id,$arr);
			admin_msg('a_word','修改成功'); 
		}else{
		$arr=array(
				   'title'=>$title,
				   'index'=>$index,
				   'roll'=>$roll,
				   'Features'=>$Features,
				   'Specifications'=>$Specifications,
				   'sid'=>$sid,
				   'content'=>$content,
				   'createtime'=>$createtime,
				   'upfile'=>$upfile,
				    'pro_upfile'=>$pro_upfile,
				 );
			$this->word_model->user_insert($arr);
			admin_msg('a_word','添加成功'); 
		}
	}
	
	/* 删除 */
	public function delete()
	{
		$id=$this->uri->segment(3);
		$data_info=$this->word_model->user_select($id);
		
		$upfile_path='./upload/word/';
		
		
		$Dfile=$upfile_path.$data_info[0]['upfile'];
		

		if(file_exists($Dfile))
		{
			@unlink($Dfile);
		}
		
		$this->word_model->user_delete($id);
		admin_msg('a_word');
	}
	
	
}

?>