<?php
require_once "a_top.php";
class A_msg extends a_top
{
	public function __construct()
	{
		parent::__construct();
		$this->load->view('admin/msg/top');
		$this->load->model('msg_model');
		$this->load->model('contact_model');
		
	}
	
	public function index()
	{
		/* 分页 */
		$this->load->library('pagination');
		$sid=$this->uri->segment(3);
		$id=$sid ? $sid : 1;
		
		$total=$this->msg_model->user_select();
		
		$pageTotal= count($total);
		$pageNum=13;
		$config['base_url']=site_url().'/a_msg/index/';
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
		
		$data['msg']=$this->msg_model->user_select_limit($start,$pageNum);
		
		$this->load->view('admin/msg/list',$data);
		$this->load->view('admin/footer');
	}
	
	/* 删除 */
	public function delete()
	{
		$id=$this->uri->segment(3);		
		$this->msg_model->user_delete($id);
		admin_msg('a_msg');
	}
	
	public function edit()
	{
		$data['contact']=$this->contact_model->user_select(1);
		$this->load->view('admin/msg/edit',$data);
		$this->load->view('admin/footer');
	}
	public function save()
	{
		$contant=$this->input->post('contact');
		$contant2=$this->input->post('contact2');
		
		$arr=array('contact'=>$contant,'contact2'=>$contant2);
		
		$data['contact']=$this->contact_model->user_update(1,$arr);
		admin_msg('a_msg/edit');
		
	}
}

?>