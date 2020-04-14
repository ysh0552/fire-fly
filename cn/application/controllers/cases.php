<?php 
require_once "z_top.php";
class Cases extends z_top
{
	public function __construct()
	{
		parent::__construct();
	}
	
	public function index()
	{
		/* 分页 */
		$this->load->library('pagination');
		
		$id=$this->uri->segment(3);
		$id=$id <= 0 ? 1 : $id;
		
		$total=$this->case_model->user_select();
		
		
		$pageTotal= count($total);
		$pageNum=30;
		$config['base_url']=site_url().'/cases/index/';
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
		$data['data_case']=$this->case_model->user_select_limit($start,$pageNum);
		
		$this->load->view('CASE',$data);
		$this->load->view('footer');
	}
	
	public function casecon()
	{
		$id=$this->uri->segment(3);
		$data['casecon']=$this->case_model->user_select($id);
		$data['case_info']=$this->case_model->user_select_limit(0,4);


		// $data['user_pres']=$this->case_model->user_pre($id);
		// $data['user_nexts']=$this->case_model->user_next($id);

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

		

		$this->load->view('CASE2',$data);
		$this->load->view('footer');
	}
}

?>