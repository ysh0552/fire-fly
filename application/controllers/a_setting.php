<?php
require_once "a_top.php";
class A_setting extends a_top
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('setting_model');
	}
	
	public function index()
	{
		$data['data_sort']=$this->setting_model->user_select();
		$this->load->view('admin/admin/setting',$data);
		$this->load->view('admin/footer');
	}
	
	
	/* 保存 */
	public function save()
	{
		$hid                   =$this->input->post('hid');
		$webname               =$this->input->post('webname');
		
		$index_name            =$this->input->post('index_name');
		$index_keywords        =$this->input->post('index_keywords');
		$index_description     =$this->input->post('index_description');
		
		$about_name            =$this->input->post('about_name');
		$about_keywords        =$this->input->post('about_keywords');
		$about_description     =$this->input->post('about_description');
		
		$case_name             =$this->input->post('case_name');
		$case_keywords         =$this->input->post('case_keywords');
		$case_description      =$this->input->post('case_description');
		
		$thinks_name           =$this->input->post('thinks_name');
		$thinks_keywords       =$this->input->post('thinks_keywords');
		$thinks_description    =$this->input->post('thinks_description');
		
		$service_name          =$this->input->post('service_name');
		$service_keywords      =$this->input->post('service_keywords');
		$service_description   =$this->input->post('service_description');
		
		$news_name             =$this->input->post('news_name');
		$news_keywords         =$this->input->post('news_keywords');
		$news_description      =$this->input->post('news_description');
		
		$contactus_name        =$this->input->post('contactus_name');
		$contactus_keywords    =$this->input->post('contactus_keywords');
		$contactus_description =$this->input->post('contactus_description');
		
		
		$indexPro              =$this->input->post('indexPro');
		$indexVideo            =$this->input->post('indexVideo');
		$copyright             =$this->input->post('copyright');
		$contect               =$this->input->post('contect');
		$tobuy                 =$this->input->post('tobuy');
		$applinks1             =$this->input->post('applinks1');
		$applinks2             =$this->input->post('applinks2');
		
		$weibo                 =$this->input->post('weibo');
		$weixin                =$this->input->post('weixin');
		$upfile1               =$this->input->post('upfile1');
		$upfile2               =$this->input->post('upfile2');
		$qq                    =$this->input->post('qq');
		$phone                 =$this->input->post('phone');


		$arr=array(
				'tobuy'                 =>$tobuy,
				'applinks1'             =>$applinks1,
				'applinks2'             =>$applinks2,		
				'webname'               =>$webname,
				'copyright'             =>$copyright,
				'weibo'                 =>$weibo,
				'weixin'                =>$weixin,
				'upfile1'               =>$upfile1,
				'upfile2'               =>$upfile2,
				'contect'               =>$contect,
				'phone'                 =>$phone,
				'indexPro'              =>$indexPro,	
				'indexVideo'            =>$indexVideo,
				'index_name'            =>$index_name,
				'index_keywords'        =>$index_keywords,
				'index_description'     =>$index_description,
				'about_name'            =>$about_name,
				'about_keywords'        =>$about_keywords,
				'about_description'     =>$about_description,
				'case_name'             =>$case_name,
				'case_keywords'         =>$case_keywords,
				'case_description'      =>$case_description,
				'thinks_name'           =>$thinks_name,
				'thinks_keywords'       =>$thinks_keywords,
				'thinks_description'    =>$thinks_description,
				'service_name'          =>$service_name,
				'service_keywords'      =>$service_keywords,
				'service_description'   =>$service_description,
				'news_name'             =>$news_name,
				'news_keywords'         =>$news_keywords,
				'news_description'      =>$news_description,
				'contactus_name'        =>$contactus_name,
				'contactus_keywords'    =>$contactus_keywords,
				'contactus_description' =>$contactus_description,
		);
		
		$this->setting_model->user_update($hid,$arr);
		admin_msg('a_setting','修改成功');
	
	}
}

?>