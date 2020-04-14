<?php
require_once "a_top.php";
class A_product extends a_top
{
	public function __construct()
	{
		parent::__construct();
		$this->load->view('admin/product/top');
		$this->load->model('product_model');
		$this->load->model('sort_model');
		$this->output->enable_profiler(FALSE);
	}
	
	public function index()
	{
		/* 分页 */
		$this->load->library('pagination');
		$sid=$this->uri->segment(3);
		$sid=$sid ? $sid : 0;
		$data['sid']=$sid;
		$id=$this->uri->segment(4);
		$id=$id ? $id : 1;	
		if($sid){
			$f=$this->sort_model->user_select($sid);
			if($f[0]['sid'] == 0){
				$s=$this->sort_model->user_sid_select($sid);			
				foreach($s as $v){
					$ss[]=$v['id'];
				}
				$pp=implode(",",$ss);
				$total=$this->product_model->where_sid_in($pp);
			}else{
				$total=$this->product_model->user_sid_select($sid);
			}
		}else{
			$total=$this->product_model->user_select();
		}
		$pageTotal= count($total);
		$pageNum=10;
		$config['base_url']=site_url().'/a_product/index/'.$sid.'/';
		$config['total_rows'] =$pageTotal;//总条数
		$config['per_page']=$pageNum;//每页条数
		$config['uri_segment'] = 4;//url
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
		$config['anchor_class'] =' class="ajax_fpage" ';
		
		$this->pagination->initialize($config);
		
		$data['links']=$this->pagination->create_links();//创建分页
		
		$start=($id-1)*$pageNum;
		
		if($sid){
			if($f[0]['sid'] == 0){
				if($total == false){
					$data['data_pro']='';
				}else{
				foreach($total as $v){
					$vv[]=$v['sid'];
				}
				$kk=implode(",",$vv);
				$data['data_pro']=$this->product_model->user_where_in_limit($start,$pageNum,$kk);
				}
			}else{
				$data['data_pro']=$this->product_model->user_select_sid_limit($sid,$start,$pageNum);
			}
		}else{
			$data['data_pro']=$this->product_model->user_select_limit($start,$pageNum);
		}
		
		$data['sort']=$this->sort_model->user_sid_select(0);
		$this->load->view('admin/product/list',$data);
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
		
		$data['sort']=$this->sort_model->user_sid_select(1);
		
		if(!empty($id) && $id>0){
			$data['title_text']='编辑';
			$data['button_name']='修改';
			
			$data_info=$this->product_model->user_select($id);
			
			$data['title']=$data_info[0]['title'];
			$data['upfile']=$data_info[0]['upfile'];
			$data['content1']=$data_info[0]['content1'];
			$data['content2']=$data_info[0]['content2'];
			$data['content3']=$data_info[0]['content3'];
			$data['content4']=$data_info[0]['content4'];
			$data['sequence']=$data_info[0]['sequence'];
			$data['sid']=$data_info[0]['sid'];
			$data['types']=$data_info[0]['types'];
			$data['buylinks']=$data_info[0]['buylinks'];
			
		}else{
			$data['title_text']='添加';
			$data['button_name']='添加';
		}
		$this->load->view('admin/product/edit',$data);
		$this->load->view('admin/footer');
	}
	
	//保存
	public function save()
	{
		$id=$this->input->post('id');
		$sid=$this->input->post('sid');
		$upfile=$this->input->post('upfile');
		$title=$this->input->post('title');
		$sequence=(int)$this->input->post('sequence');
		$types=$this->input->post('types');
		$buylinks=$this->input->post('buylinks');
		$content1=$this->input->post('content1');
		$content2=$this->input->post('content2');
		$content3=$this->input->post('content3');
		$content4=$this->input->post('content4');
		$createtime=date('Y-m-d H:i:s');
		

		
		if($id){		
		$arr=array(
				   'title'=>$title,
				   'upfile'=>$upfile,
				   'sid'=>$sid,
				   'buylinks'=>$buylinks,
				   'types'=>$types,
				   'sequence'=>$sequence,
				   'content1'=>$content1,
				   'content2'=>$content2,
				   'content3'=>$content3,
				   'content4'=>$content4
				 );

			$this->product_model->user_update($id,$arr);
			admin_msg('a_product','修改成功'); 
		}else{
		$arr=array(
				   'title'=>$title,
				   'upfile'=>$upfile,
				   'sid'=>$sid,
				   'buylinks'=>$buylinks,
				   'types'=>$types,
				   'sequence'=>$sequence,
				   'content1'=>$content1,
				   'content2'=>$content2,
				   'content3'=>$content3,
				   'content4'=>$content4,
				   'createtime'=>$createtime
				 );
			$this->product_model->user_insert($arr);
			admin_msg('a_product','添加成功'); 
		}
	}
	
	/* 删除 */
	public function delete()
	{
		$id=$this->uri->segment(3);
		$data_info=$this->product_model->user_select($id);
	
		$editor_path='./resources/HMKindEditor/attached/';
		$content=$data_info[0]['content1'];
		if($content != ''){
			$match_count = preg_match_all('/src\=.+?\.(jpg|png|bmp|gif)/',$content, $matches);
			for($i = 0; $i < $match_count; $i++){
				$editor_file=end(explode('/',$matches[0][$i]));
				@unlink($editor_path.$editor_file);
			}
		}
		
		$this->product_model->user_delete($id);
		admin_msg('a_product');
	}
	
	
}

?>