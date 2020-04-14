<?php
class A_solutions extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->helper('myFun');
		$this->load->helper('url');
		$this->load->model('solutions_model');
		$this->load->model('sort_model');
		
		$name=$this->input->cookie('my');
		if(!$name){
			admin_msg('a_admin','请先登陆');
			exit;
		}
		
		$data['user_n']=$name;
		$this->load->view('admin/top',$data);
		$this->load->view('admin/solutions/top');
	}
	
	public function index()
	{
		$data['data_solutions']=$this->solutions_model->user_select();
		$this->load->view('admin/solutions/list',$data);
		$this->load->view('admin/footer');
	}

	
	/* 添加 */
	public function add()
	{
		$this->edit();
	}
	
	
	/* 读取 */
	public function edit()
	{
		$id=$this->uri->segment(3);
		$data['id']=$id;
		
		$data['sort']=$this->sort_model->user_sid_select(2);
		
		
		if(!empty($id) && $id>0){
			$data['title_text']='编辑内容';
			$data['button_name']='修改';
			
			$data_info=$this->solutions_model->user_select($id);
			
			$data['title']=$data_info[0]['title'];
			$data['index']=$data_info[0]['index'];
			$data['sid']=$data_info[0]['sid'];
			$data['curFile']=$data_info[0]['curFile'];
			$data['hoverFile']=$data_info[0]['hoverFile'];
			$data['content']=$data_info[0]['content'];
			$data['content1']=$data_info[0]['content1'];
			$data['content2']=$data_info[0]['content2'];
			$data['content3']=$data_info[0]['content3'];
			$data['content4']=$data_info[0]['content4'];
			
		}else{
			$data['title_text']='添加内容';
			$data['button_name']='添加';
		}
		$this->load->view('admin/solutions/edit',$data);
		$this->load->view('admin/footer');
	}
	
	//保存
	public function save()
	{
		$id=$this->input->post('id');
		$index=$this->input->post('index');
		$title=$this->input->post('title');
		$sid=$this->input->post('sid');
		$createtime=date('Y-m-d H:i:s');
		$content=$this->input->post('content');
		$conEdit1=$this->input->post('content1');
		$conEdit2=$this->input->post('content2');
		$conEdit3=$this->input->post('content3');
		$conEdit4=$this->input->post('content4');
		$old_cur_name=$this->input->post('old_cur_name');
		$old_hover_name=$this->input->post('old_hover_name');
		
		$content1=str_replace('<img ', '<img onload="DrawImage(this,1100,1100)" ', $conEdit1);
		$content2=str_replace('<img ', '<img onload="DrawImage(this,1100,1100)" ', $conEdit2);
		$content3=str_replace('<img ', '<img onload="DrawImage(this,1100,1100)" ', $conEdit3);
		$content4=str_replace('<img ', '<img onload="DrawImage(this,1100,1100)" ', $conEdit4);
		
		$file='';
		$dir='./upload/solutions/';
		$name=$_FILES['upfile']['name'];
		$type=$_FILES['upfile']['type'];
		$size=$_FILES['upfile']['size'];
		$byte=1024*1024*1;
		$tmp_name=$_FILES['upfile']['tmp_name'];
		
		for($i=0; $i<count($name); $i++){
			if($name[$i] != ''){
				if($size[$i] > $byte){
					admin_msg('back','第'.($i+1).'张太大');
					return;
				}else{
					$ty[$i]='';
					switch($type[$i]){
						case 'image/png':$ty[$i]='png';break;
						case 'image/jpg':$ty[$i]='jpg';break;
						case 'image/jpeg':$ty[$i]='jpg';break;
						case 'image/gif':$ty[$i]='gif';break;
						case 'image/bmp':$ty[$i]='bmp';break;
					default:
						echo '第'.($i+1).'张文件类型错误！';
						$ty[$i]='';
						break;
					}
					
					if($ty[$i] !=''){
						$name[$i]=$i.date('Ymdhis').'.'.$ty[$i];
						$file[]=$name[$i];
						move_uploaded_file($tmp_name[$i],$dir.$name[$i]);
					}
				}
			}
		}
		
		if($name[0]){
			$curFile=$file[0];
			if($id){
				@unlink($dir.$old_cur_name);
			}
		}else{
			$curFile=$old_cur_name;
		}
		
		if($name[1]){
			if(count($file) == 1){
				$hoverFile=$file[0];
			}else{
				$hoverFile=$file[1];
			}
			if($id){
				@unlink($dir.$old_hover_name);
			}
		}else{
			$hoverFile=$old_hover_name;
		}
		
		$arr=array('title'=>$title,
				   'index'=>$index,
				   'curFile'=>$curFile,
				   'hoverFile'=>$hoverFile,
				   'createtime'=>$createtime,
				   'sid'=>$sid,
				   'content'=>$content,
				   'content1'=>$content1,
				   'content2'=>$content2,
				   'content3'=>$content3,
				   'content4'=>$content4
				  );   
		if($id){
			$this->solutions_model->user_update($id,$arr);
			admin_msg('a_solutions','修改成功'); 
		}else{
			$id=$this->solutions_model->user_insert($arr);
			admin_msg('a_solutions','添加成功');
		}
	}
	
	/* 删除 */
	public function delete()
	{
		$id=$this->uri->segment(3);
		$data_info=$this->solutions_model->user_select($id);
		$upfile_path='./upload/solutions/';
		@unlink($upfile_path.$data_info[0]['curFile']);
		@unlink($upfile_path.$data_info[0]['hoverFile']);

		$editor_path='./resources/HMKindEditor/attached/';
		$content=$data_info[0]['content'];
		if($content != ''){
			$match_count = preg_match_all('/src\=.+?\.(jpg|png|bmp|gif)/',$content, $matches);
			for($i = 0; $i < $match_count; $i++){
				$editor_file=end(explode('/',$matches[0][$i]));
				@unlink($editor_path.$editor_file);
			}
		}
		$this->solutions_model->user_delete($id);
		admin_msg('a_solutions');
	}
	
	
	
}

?>