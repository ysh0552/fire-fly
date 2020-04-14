<?php
require_once "a_top.php";
class A_admin extends a_top
{
	public function __construct()
	{
		parent::__construct();
		$this->load->view('admin/admin/top');
	}
	public function index()
	{
		/* 分页 */
		$this->load->library('pagination');
		$sid=$this->uri->segment(3);
		$id=$sid ? $sid : 1;
		
		$total=$this->admin_model->user_select();
		$pageTotal= count($total);
		$pageNum=10;
		$config['base_url']=site_url('a_admin/index/');
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
		$this->pagination->initialize($config);
		
		$data['links']=$this->pagination->create_links();//创建分页
		
		$start=($id-1)*$pageNum;
		
		$data['data_admin']=$this->admin_model->user_select_limit($start,$pageNum);

		$this->load->view('admin/admin/list',$data);
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
			$data['table_text']='修改管理员';
			$data['button_name']='修改';
			$data_admin=$this->admin_model->user_select($id);
			$data['name']=$data_admin[0]['name'];
		}else{
			$data['table_text']='添加管理员';
			$data['button_name']='添加';
		}
		
		$this->load->view('admin/admin/edit',$data);
		$this->load->view('admin/footer');
	}
	
	
	/* 保存 */
	public function save()
	{
 		$id=$this->input->post('hid');
		$name=$this->input->post('name');
		$password=md5($this->input->post('password'));
		$old_password=md5($this->input->post('old_password'));
		$createtime=date('Y-m-d');
		
		
		
		if(!empty($id) && $id>0)
		{
			$data_admin=$this->admin_model->user_select($id);
			$data_password=$data_admin[0]['password'];
			if($data_password != $old_password)
			{
				admin_msg('back','当前密码错误');
			}else{
				$arr=array('password'=>$password);
				$this->admin_model->user_update($id,$arr);		
				admin_msg('a_admin','修改成功');
			}
		}else{
			$arr=array('name'=>$name,'password'=>$password,'createtime'=>$createtime);
			
			$r=$this->admin_model->user_name_select($name);
			if($r){
				if($r[0]['name']){
					admin_msg('back','用户名已存在！');
					exit;
				}
			}
			$this->admin_model->user_insert($arr);
			admin_msg('a_admin','添加成功');
		}
	}
	
	/* 删除管理员 */
	public function delete()
	{
		$id=$this->uri->segment(3);
		$this->load->helper('cookie');
		$name=$this->input->cookie('my');
		
		$data_admin=$this->admin_model->user_select($id);
		$data_name=$data_admin[0]['name'];
		if($name == $data_name)
		{
			admin_msg('back','不能删除当前用户');
		}else{
			$this->admin_model->user_delete($id);
			admin_msg('a_admin','删除成功');
		}	
	}
}



?>