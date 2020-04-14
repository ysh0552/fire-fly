<?php 
require_once "z_top.php";
class Distributors extends z_top
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
			$total=$this->news_model->user_sid_select($sid);
		}else{
			$total=$this->news_model->user_select();
		}
		
		$pageTotal= count($total);
		$pageNum=3;
		$config['base_url']=site_url().'/distributors/index/'.$sid.'/';
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
			$data['data_news']=$this->news_model->user_select_sid_limit($start,$pageNum,$sid);
		}else{
			$data['data_news']=$this->news_model->user_select_limit($start,$pageNum);			
		}
		

		$data['sort2']=$this->sort2_model->user_select($sid);
		$data['sid']=$sid;
		

		$this->load->view('DISTRIBUTORS',$data);
		$this->load->view('footer');
	}


	public function newscon(){
		$id=$this->uri->segment(3);
		

		$data['data_news']=$this->news_model->user_select($id);
		// $data['user_pres']=$this->down_model->user_sid_pre($id,$sid);
		// $data['user_nexts']=$this->down_model->user_sid_next($id,$sid);

		// if(count($data['user_pres']) > 0){
		// 	$data['user_pre'] = $data['user_pres'][0]['id'];
		// }else{
		// 	$data['user_pre'] = 0;
		// }

		// if(count($data['user_nexts']) > 0){
		// 	$data['user_next'] = $data['user_nexts'][0]['id'];
		// }else{
		// 	$data['user_next'] = 0;
		// }


		//$data['sort']=$this->sort_model->user_select($sid);
		//$data['sid']=$sid;
		$this->load->view('DISTRIBUTORS2',$data);
		$this->load->view('footer');
	}
}

?>