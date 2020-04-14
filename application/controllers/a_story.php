<?php
require_once "a_top.php";
class A_story extends a_top
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('about_model');
	}
	
	public function index(){
		$data['story']=$this->about_model->user_select(2);
		$this->load->view('admin/about/story',$data);
		$this->load->view('admin/footer');
	}
	
	//保存
	public function save()
	{
		$id=2;
		$old_cur_name=$this->input->post('old_cur_name');
		
		$file='';
		$dir='./upload/';
		$name=$_FILES['upfile']['name'];
		$type=$_FILES['upfile']['type'];
		$size=$_FILES['upfile']['size'];
		$byte=1024*1024*1;
		$tmp_name=$_FILES['upfile']['tmp_name'];
			if($name != ''){
				if($size > $byte){
					admin_msg('back','图片太大');
					return;
				}else{
					$ty='';
					switch($type){
						case 'image/png':$ty='png';break;
						case 'image/jpg':$ty='jpg';break;
						case 'image/jpeg':$ty='jpg';break;
						case 'image/gif':$ty='gif';break;
						case 'image/bmp':$ty='bmp';break;
					default:
						admin_msg('back','文件类型错误！');
						$ty='';
						break;
					}
					
					if($ty !=''){
						$name=date('Ymdhis').'.'.$ty;
						$file=$name;
						move_uploaded_file($tmp_name,$dir.$name);
					}
				}
		}
		
		if(!$name)
		{
			$file=$old_cur_name;
		}else{
			$curFile=$file;
			@unlink($dir.$old_cur_name);
		}

		$arr=array('upfile'=>$file);
	
		$this->about_model->user_update($id,$arr);
		admin_msg('a_story','修改成功'); 

	}

}







?>