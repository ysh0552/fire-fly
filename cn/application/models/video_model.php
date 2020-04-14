<?php
class Video_model extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}
	
	//插入数据库
	public function user_insert($arr)
	{
		$this->db->insert('pod_video',$arr);
	}
	
	//查询数据
	public function user_select($id='')
	{
		if($id != ''){
			$this->db->where('id',$id);
		}
		$query=$this->db->get('pod_video');
		return $query->result_array();
	}
	
	
	
	//查询数据
	public function user_types_select($types='')
	{
		if($types != ''){
			$this->db->where('types',$types);
		}
		$this->db->order_by('types','asc');
		$query=$this->db->get('pod_video');
		return $query->result_array();
	}
	
	//查询数据 roll
	public function user_roll_select($roll='')
	{
		if($roll != ''){
			$this->db->where('roll',$roll);
		}
		$this->db->order_by('id','desc');
		$query=$this->db->get('pod_video');
		return $query->result_array();
	}
	
	
	//更新数据
	public function user_update($id,$str)
	{
		$this->db->where('id',$id);
		$this->db->update('pod_video',$str);
	}
	
	//删除数据
	public function user_delete($id)
	{
		$this->db->where('id',$id);
		$this->db->delete('pod_video');
	}
	
	//get_where
	public function user_get_where($arr)
	{
		$query=$this->db->get_where('pod_video',$arr);
		return $query->result_array();
	}
	
	public function user_select_limit($start,$end)
	{
		$this->db->select('*');
		$this->db->limit($end,$start);
		$this->db->order_by('sort','asc');
		$query=$this->db->get('pod_video');
		return $query->result_array();
	}
	
	public function user_select_where_limit($index,$start,$end)
	{
		$this->db->select('*');
		$this->db->limit($end,$start);
		$this->db->where('index',$index);
		$query=$this->db->get('pod_video');
		return $query->result_array();
	}

	public function user_select_sid_limit($sid,$start,$end)
	{
		$this->db->select('*');
		$this->db->limit($end,$start);
		$this->db->order_by('sort','asc');
		$this->db->where('sid',$sid);
		$query=$this->db->get('pod_video');
		return $query->result_array();
	}

	
	//上一条
	public function user_pre($id)
	{
		$query=$this->db->query("select * from `pod_video` where `id`<{$id} order by `id` desc limit 1");
		return $query->result_array();
	}
	
	public function user_next($id)
	{
		$query=$this->db->query("select * from `pod_video` where `id`>{$id} order by `id` asc limit 1");
		return $query->result_array();
	}
	
	public function user_search($str)
	{
		$query=$this->db->query("select * from `pod_video` where `title` like '%{$str}%' ");
		return $query->result_array();
	}

}

?>