<?php 
require_once "z_top.php";
class Products extends z_top
{
	public function __construct()
	{
		parent::__construct();
	}
	
	public function index()
	{
		
		/* 分页 */
		$this->load->library('pagination');
		$sid=$this->uri->segment(3);
		$sid=$sid == '' ? 0 : $sid;
		$id=$this->uri->segment(4);
		$id=$id <= 0 ? 1 : $id;
		if($sid){
			$total=$this->product_model->user_sid_select($sid);
		}else{
			$total=$this->product_model->user_select();
		}


		
		$pageTotal= count($total);
		$pageNum=20;
		$config['base_url']=site_url().'/products/index/'.$sid.'/';
		$config['total_rows'] =$pageTotal;//总条数
		$config['per_page']=$pageNum;//每页条数
		$config['uri_segment'] = 4;//url
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

		$this->pagination->initialize($config);
		$data['links']=$this->pagination->create_links();//创建分页
		$start=($id-1)*$pageNum;
		if($sid){
			$data['data_pro']=$this->product_model->user_select_sid_limit($start,$pageNum,$sid);
		}else{
			$data['data_pro']=$this->product_model->user_select_limit($start,$pageNum);			
		}

		$data['sort']=$this->sort_model->user_select();

		$this->load->view('PRODUCTS',$data);
		$this->load->view('footer');
	}

	public function procontent(){
		//$sid=$this->uri->segment(3);
		$id=$this->uri->segment(3);
		$data['procontent']=$this->product_model->user_select($id);


		//var_dump($data['procontent']);


		//$data['sid']=$sid;
		$this->load->view('PRODUCTS2',$data);
		$this->load->view('footer');
	}


}

?>