<?php
class Word_model extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}
	
	//插入数据库
	public function user_insert($arr)
	{
		$this->db->insert('pod_word',$arr);
	}
	
	//查询数据
	public function user_select($id='')
	{
		if($id != ''){
			$this->db->where('id',$id);
		}
	
		$query=$this->db->get('pod_word');
		return $query->result_array();
	}
	
	//查询数据
	public function user_sid_select($sid='')
	{
		if($sid != ''){
			$this->db->where('sid',$sid);
		}
		$this->db->order_by('sid','desc');
		$query=$this->db->get('pod_word');
		return $query->result_array();
	}
	
	//查询数据 roll
	public function user_roll_select($roll='')
	{
		if($roll != ''){
			$this->db->where('roll',$roll);
		}
		$this->db->order_by('id','desc');
		$query=$this->db->get('pod_word');
		return $query->result_array();
	}
	
	
	//更新数据
	public function user_update($id,$str)
	{
		$this->db->where('id',$id);
		$this->db->update('pod_word',$str);
	}
	
	//删除数据
	public function user_delete($id)
	{
		$this->db->where('id',$id);
		$this->db->delete('pod_word');
	}
	
	//get_where
	public function user_get_where($arr)
	{
		$query=$this->db->get_where('pod_word',$arr);
		return $query->result_array();
	}
	
	public function user_select_limit($start,$end)
	{
		$this->db->select('*');
		$this->db->limit($end,$start);
		$this->db->order_by('index','asc');
		$query=$this->db->get('pod_word');
		return $query->result_array();
	}
	
	public function user_select_where_limit($index,$start,$end)
	{
		$this->db->select('*');
		$this->db->limit($end,$start);
		$this->db->where('index',$index);
		$query=$this->db->get('pod_word');
		return $query->result_array();
	}

	public function user_select_sid_limit($sid,$start,$end)
	{
		$this->db->select('*');
		$this->db->limit($end,$start);
		$this->db->order_by('id','desc');
		$this->db->where('sid',$sid);
		$query=$this->db->get('pod_word');
		return $query->result_array();
	}
	
	//上一条
	public function user_pre($id)
	{
		$query=$this->db->query("select * from `pod_word` where `id`<{$id} order by `id` desc limit 1");
		return $query->result_array();
	}
	
	public function user_next($id)
	{
		$query=$this->db->query("select * from `pod_word` where `id`>{$id} order by `id` asc limit 1");
		return $query->result_array();
	}
	
	public function user_search($table,$str)
	{
		$query=$this->db->query("select `title`,`id`,`createtime` from `{$table}` where `title` like '%{$str}%' ");
		return $query->result_array();
	}
	
	
}

?>