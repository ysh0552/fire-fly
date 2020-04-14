<?php 
require_once "z_top.php";
class Index extends z_top
{
	public function __construct()
	{
		parent::__construct();
	}
	
	public function index()
	{
		
		$data['contact']=$this->contact_model->user_select(8);
		$data['down']=$this->down_model->user_select_index_limit(1);
		$data['sort']=$this->sort_model->user_select();
		$data['case']=$this->case_model->user_select_index(1,0,5);
		$data['word1']=$this->word1_model->user_select_limit(0,5);

		$this->load->view('index',$data);
		$this->load->view('footer');
	}


}

?>