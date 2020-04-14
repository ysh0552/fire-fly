<?php
class Solutions_model extends CI_Model
{

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}
	
	//插入数据库
	public function user_insert($arr)
	{
		$this->db->insert('solutions',$arr);
		return mysql_insert_id();
	}
	
	//查询数据
	public function user_select($id='')
	{
		if($id != ''){
			$this->db->where('id',$id);
		}
		$query=$this->db->get('solutions');
		return $query->result_array();
	}
	
	//查询数据index
	public function user_select_index($index='')
	{
		if($index != ''){
			$this->db->where('index',$index);
		}
		$query=$this->db->get('solutions');
		return $query->result_array();
	}
	
	//查询sid
	public function user_sid_select($sid='')
	{
		if($sid != ''){
			$this->db->where('sid',$sid);
		}
		$this->db->order_by('sid','asc');
		$query=$this->db->get('solutions');
		return $query->result_array();
	}
	
	public function user_sid_limit($start,$end,$sid='')
	{
		if($sid != ''){
			$this->db->where('sid',$sid);
		}
		$this->db->order_by('sid','desc');
		$this->db->limit($end,$start);
		$query=$this->db->get('solutions');
		return $query->result_array();
	}
	
	//更新数据
	public function user_update($id,$str)
	{
		$this->db->where('id',$id);
		$this->db->update('solutions',$str);
	}
	
	//删除数据
	public function user_delete($id)
	{
		$this->db->where('id',$id);
		$this->db->delete('solutions');
	}
	
	//get_where
	public function user_get_where($arr)
	{
		$query=$this->db->get_where('solutions',$arr);
		return $query->result_array();
	}
	
	function user_select_limit($start,$end,$index='')
	{
		if($index !=''){
			$this->db->where('index',$index);
		}
		$this->db->select('*');
		$this->db->limit($end,$start);
		$query=$this->db->get('solutions');
		return $query->result_array();
	}
	
	public function where_sid_in($sid)
	{
		$q=$this->db->query("select * from `solutions` where `sid` in($sid)");
		return $q->result_array();
	}
	
	public function user_where_in_limit($start,$end,$sid='')
	{
		$query=$this->db->query("select * from `solutions` where `sid` in($sid) limit $start,$end");
		return $query->result_array();
	}
	
	public function select_solutions_limit($index,$nums)
	{
		$query=$this->db->query("select `id`,`index`,`title`,`curFile`,`hoverFile` from `solutions` where `index`='{$index}' order by `id` desc limit 0,".$nums);
		return $query->result_array();
	}
}

?>