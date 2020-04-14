<?php

class Ajax_page extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->helper('myfun');
		$this->load->helper('url');
		
		
	}
	
	public function index()
	{

	}
	
	public function product()
	{
		$this->load->model('word_model');
		$this->load->model('sort_model');
		$this->load->model('con_model');
		
		$data['pro_sort']=$this->sort_model->user_select();
		//配置分页类
		$this->load->library('pagination');
		
		$sid=$this->uri->segment(3);
		$sid=$sid ? $sid : 3;
		$id=$this->uri->segment(4);
		$id=$id ? $id : 1;
		
		$total=$this->word_model->user_sid_select($sid);
		$pageTotal= count($total);
		$pageNum=4;
		$config['base_url']=site_url().'/ajax_page/product/'.$sid;
		$config['total_rows'] =$pageTotal;//总条数
		$config['per_page']=$pageNum;//每页条数
		$config['uri_segment'] = 4;//url
		$config['num_links'] = 3;
		$config['use_page_numbers']=TRUE;

		$config['first_link'] = FALSE;
		$config['last_link'] = FALSE;
		$config['full_tag_open'] = '<div class="page" style="margin-top:-20px;">';
		$config['full_tag_close'] = '</div>';
		$config['next_link'] = '&gt;';
		$config['prev_link'] = '&lt;';
		$config['cur_tag_open'] = '<a class="currentPage" >';
		$config['cur_tag_close'] = '</a>';

		//获取分页
		$this->pagination->initialize($config);
		$data['pages'] = $this->pagination->create_ajax_links($sid,1);
		if(!empty($data['pages'])){}
		$start=($id-1)*$pageNum;
		$data['data_pro']=$this->word_model->user_select_sid_limit($sid,$start,$pageNum);

		$data['con_data']=$this->con_model->user_select(1);

		$this->load->view('products',$data);
	}
	
	public function productcon()
	{
		$this->load->model('word_model');

		$id=$this->uri->segment(3);
		$info=$this->word_model->user_select($id);
		
	    $content=$info[0]['pro_upfile'];
		$files='';
		if($content != ''){ 
			$match_count = preg_match_all('/src\=.+?\.(jpg|png|bmp|gif)/',$content,$matches);
			
			for($i=0;$i<$match_count;$i++){
				$files[]=end(explode('/',$matches[0][$i]));	
			}
		}
		$html_img='';
		$html_nav='<ul><li class="thistitle"></li>';
		if($files){
			for($i=0;$i<count($files);$i++){
				$html_img[]='<li><a href="javascript:;" target="_blank"><img src="'.base_url().'resources/HMKindEditor/attached/'.$files[$i].'" width="960" height="512"></a></li>';
				if($i>0){
					$html_nav.='<li></li>';
				}
			}
			
		}
		$html_nav.='</ul>';
		$arr=array(
			'title'=>$info[0]['title'],
			'content'=>$info[0]['content'],	
			'Features'=>$info[0]['Features'],
			'Specifications'=>$info[0]['Specifications'],
			'html_img'=>$html_img,
			'html_nav'=>$html_nav
			
		);
		echo json_encode($arr);
	}
	
	
	//document
	public function document()
	{
		$this->load->model('video_model');
		//配置分页类
		$this->load->library('pagination');
	
		$id=$this->uri->segment(3);
		$id=$id ? $id : 1;
		
		$total=$this->video_model->user_select();
		$pageTotal= count($total);
		$pageNum=6;
		$config['base_url']=site_url().'/ajax_page/document/';
		$config['total_rows'] =$pageTotal;//总条数
		$config['per_page']=$pageNum;//每页条数
		$config['uri_segment'] = 3;//url
		$config['num_links'] = 3;
		$config['use_page_numbers']=TRUE;

		$config['first_link'] = FALSE;
		$config['last_link'] = FALSE;
		$config['full_tag_open'] = '<div class="page">';
		$config['full_tag_close'] = '</div>';
		$config['next_link'] = '&gt;';
		$config['prev_link'] = '&lt;';
		$config['cur_tag_open'] = '<a class="currentPage" >';
		$config['cur_tag_close'] = '</a>';

		//获取分页
		$this->pagination->initialize($config);

		$data['Document_pages'] = $this->pagination->create_ajax_links(NULL,0);
		if(!empty($data['Document_pages'])){}
		$start=($id-1)*$pageNum;
		$data['Document_data']=$this->video_model->user_select_limit($start,$pageNum);

		$this->load->view('document',$data);
	}
	
	public function downloads()
	{
		//配置分页类
			
		$this->load->model('download_model');
		
		$this->load->library('pagination');
	
		$id=$this->uri->segment(3);
		$id=$id ? $id : 1;
		
		$total=$this->download_model->user_select();
		$pageTotal= count($total);
		$pageNum=7;
		$config['base_url']=site_url().'/ajax_page/downloads/';
		$config['total_rows'] =$pageTotal;//总条数
		$config['per_page']=$pageNum;//每页条数
		$config['uri_segment'] = 3;//url
		$config['num_links'] = 3;
		$config['use_page_numbers']=TRUE;

		$config['first_link'] = FALSE;
		$config['last_link'] = FALSE;
		$config['full_tag_open'] = '<div class="page">';
		$config['full_tag_close'] = '</div>';
		$config['next_link'] = '&gt;';
		$config['prev_link'] = '&lt;';
		$config['cur_tag_open'] = '<a class="currentPage" >';
		$config['cur_tag_close'] = '</a>';

		//获取分页
		$this->pagination->initialize($config);

		$data['downloads_pages'] = $this->pagination->create_ajax_links(NULL,1);
		if(!empty($data['downloads_pages'])){}
		$start=($id-1)*$pageNum;
		$data['downloads_data']=$this->download_model->user_select_limit($start,$pageNum);

		$this->load->view('downloads',$data);
	}
	
	public function alter_sale()
	{
		
		$this->load->model('word1_model');
		//配置分页类
		$this->load->library('pagination');
		$id=$this->uri->segment(3);
		$id=$id ? $id : 1;
		
		$total=$this->word1_model->user_select();
		$pageTotal= count($total);
		$pageNum=6;
		$config['base_url']=site_url().'/ajax_page/alter_sale/';
		$config['total_rows'] =$pageTotal;//总条数
		$config['per_page']=$pageNum;//每页条数
		$config['uri_segment'] = 3;//url
		$config['num_links'] = 3;
		$config['use_page_numbers']=TRUE;

		$config['first_link'] = FALSE;
		$config['last_link'] = FALSE;
		$config['full_tag_open'] = '<div class="page">';
		$config['full_tag_close'] = '</div>';
		$config['next_link'] = '&gt;';
		$config['prev_link'] = '&lt;';
		$config['cur_tag_open'] = '<a class="currentPage" >';
		$config['cur_tag_close'] = '</a>';

		//获取分页
		$this->pagination->initialize($config);

		$data['alter_sale_pages'] = $this->pagination->create_ajax_links(NULL,2);
		if(!empty($data['alter_sale_pages'])){}
		$start=($id-1)*$pageNum;
		$data['alter_sale_data']=$this->word1_model->user_select_limit($start,$pageNum);

		$this->load->view('alter_sale',$data);
	}
	
	public function altercon()
	{
		$this->load->model('word1_model');
		$id=$this->uri->segment(3);
		$info=$this->word1_model->user_select($id);
		
	 
		$arr=array(
			'title'=>$info[0]['title'],
			'content'=>$info[0]['content']			
			
		);
		echo json_encode($arr);
	}
	
	public function qa()
	{
		
		$this->load->model('qa_model');
		//配置分页类
		$this->load->library('pagination');
		$id=$this->uri->segment(3);
		$id=$id ? $id : 1;
		
		$total=$this->qa_model->user_select();
		$pageTotal= count($total);
		$pageNum=7;
		$config['base_url']=site_url().'/ajax_page/qa/';
		$config['total_rows'] =$pageTotal;//总条数
		$config['per_page']=$pageNum;//每页条数
		$config['uri_segment'] = 3;//url
		$config['num_links'] = 3;
		$config['use_page_numbers']=TRUE;

		$config['first_link'] = FALSE;
		$config['last_link'] = FALSE;
		$config['full_tag_open'] = '<div class="page" style="width: 700px; float:right; margin-top: -20px;">';
		$config['full_tag_close'] = '</div>';
		$config['next_link'] = '&gt;';
		$config['prev_link'] = '&lt;';
		$config['cur_tag_open'] = '<a class="currentPage" >';
		$config['cur_tag_close'] = '</a>';

		//获取分页
		$this->pagination->initialize($config);

		$data['FAQ_pages'] = $this->pagination->create_ajax_links(NULL,3);
		if(!empty($data['FAQ_pages'])){}
		$start=($id-1)*$pageNum;
		$data['FAQ_data']=$this->qa_model->user_select_limit($start,$pageNum);

		$this->load->view('qa',$data);
	}
	
	public function qacon()
	{
		$this->load->model('qa_model');
		$id=$this->uri->segment(3);
		$info=$this->qa_model->user_select($id);
		
	 
		$arr=array(
			'title'=>$info[0]['title'],
			'content'=>$info[0]['content']			
			
		);
		echo json_encode($arr);
	}
	
	
	public function aboutus()
	{
		$this->load->model('sort2_model');
		$this->load->model('news_model');
		$data['aboutus_sort']=$this->sort2_model->user_select();
		//配置分页类
		$this->load->library('pagination');
		
		$sid=$this->uri->segment(3);
		$sid=$sid ? $sid : 3;
		$id=$this->uri->segment(4);
		$id=$id ? $id : 1;
		
		$total=$this->news_model->user_sid_select($sid);
		$pageTotal= count($total);
		if($sid == 44){
			$pageNum=3;
		}else{
			$pageNum=7;
		}
		$config['base_url']=site_url().'/ajax_page/aboutus/'.$sid;
		$config['total_rows'] =$pageTotal;//总条数
		$config['per_page']=$pageNum;//每页条数
		$config['uri_segment'] = 4;//url
		$config['num_links'] = 3;
		$config['use_page_numbers']=TRUE;

		$config['first_link'] = FALSE;
		$config['last_link'] = FALSE;
		$config['full_tag_open'] = '<div class="page" >';
		$config['full_tag_close'] = '</div>';
		$config['next_link'] = '&gt;';
		$config['prev_link'] = '&lt;';
		$config['cur_tag_open'] = '<a class="currentPage" >';
		$config['cur_tag_close'] = '</a>';

		//获取分页
		$this->pagination->initialize($config);
		$data['aboutus_pages'] = $this->pagination->create_ajax_links($sid,2);
		if(!empty($data['aboutus_pages'])){}
		$start=($id-1)*$pageNum;
		$data['aboutus_data']=$this->news_model->user_select_sid_limit($sid,$start,$pageNum);
		
		$data['aboutus_sid']=$sid;


		$this->load->view('news',$data);
	}
	
	public function aboutuscon()
	{
		$this->load->model('news_model');
		
		$id=$this->uri->segment(3);
		$info=$this->news_model->user_select($id);
		
		$arr=array(
			'title'=>$info[0]['title'],
			'content'=>$info[0]['content']			
			
		);
		echo json_encode($arr);
	}
	
	
}
?>