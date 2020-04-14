<?php
require_once "a_top.php";
class A_careers extends a_top
{
	public function __construct()
	{
		parent::__construct();
		$this->load->view('admin/careers/top');
	}
	
	public function index()
	{
		/* 分页 */
		$this->load->library('pagination');
		$sid=$this->uri->segment(3);
		$id=$sid ? $sid : 1;
		$total=$this->careers_model->user_select();
		
		$url=site_url('a_careers/index/');
		$pageTotal= count($total);
		$pageNum=10;
	
		$config['base_url']=$url;
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

		$data['data_careers']=$this->careers_model->user_select_limit($start,$pageNum);

		$this->load->view('admin/careers/list',$data);
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
		if(!empty($id) && $id>0)
		{
			$data['title_text']='编辑动态';
			$data['button_name']='修改';
			$data['data_event']=$this->careers_model->user_select($id);
		}else{
			$data['title_text']='添加动态';
			$data['button_name']='添加';
		}
		$this->load->view('admin/careers/edit',$data);
		$this->load->view('admin/footer');
	}
	
	/* 保存 */
	public function save()
	{
		$id=$this->input->post('hid');
		$title=$this->input->post('title');
		
		$keywords=$this->input->post('keywords');
		$description=$this->input->post('description');
		
		$createtime=date('Y-m-d');
		$content=$this->input->post('content');
		
		if(hmStrlen($title) == 0 || hmStrlen($title)> 200){
			admin_msg('back','标题不能为空或大于100字');
			return;
		}elseif(hmStrlen($keywords)> 200){
			admin_msg('back','关键词不能大于100字');
			return;
		}elseif(hmStrlen($description)> 200){
			admin_msg('back','描述不能大于100字');
			return;
		}
		
		if(!empty($id) && $id>0)
		{
			$arr=array(
						'title'=>$title,
						'keywords'=>$keywords,
						'description'=>$description,
						'content'=>$content
						);
			$this->careers_model->user_update($id,$arr);
			admin_msg('a_careers','修改成功');
		}else{
			$arr=array(
						'title'=>$title,
						'keywords'=>$keywords,
						'description'=>$description,
						'content'=>$content,
						'createtime'=>$createtime				
						);
			$this->careers_model->user_insert($arr);

			admin_msg('a_careers','添加成功');
		}
	}
	
	/* 删除 */
	public function delete()
	{
		$id=$this->uri->segment(3);
		$data_info=$this->careers_model->user_select($id);
		
		$editor_path='./resources/HMKindEditor/attached/';
		$content=$data_info[0]['content'];
		if($content != '')
		{
			$match_count = preg_match_all('/src\=.+?\.(jpg|png|bmp|gif)/',$content, $matches);
			for($i = 0; $i < $match_count; $i++)
			{
				$editor_file=end(explode('/',$matches[0][$i]));
				@unlink($editor_path.$editor_file);
			}
		}
		$this->careers_model->user_delete($id);
		admin_msg('a_careers');
	}

}



?>