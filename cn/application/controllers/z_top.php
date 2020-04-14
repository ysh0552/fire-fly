<?php
class Z_top extends CI_Controller
{
	var $data;
	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->helper('myfun');

		$this->load->model('setting_model');
		$this->load->model('ads1_model');
		$this->load->model('ads_model');
		$this->load->model('about_model');
		$this->load->model('contact_model');
		$this->load->model('case_model');
		$this->load->model('word1_model');
		$this->load->model('sort2_model');
		$this->load->model('sort_model');
		$this->load->model('news_model');
		$this->load->model('product_model');
		$this->load->model('down_model');


		$data['ads']=$this->ads_model->user_search('首页轮播图');
		$data['set']=$this->setting_model->user_select();


		$data['title']       ='';
		$data['description'] = '';
		$data['keywords']    ='';

		$this->load->view('header',$data);
		
	}
}


?>