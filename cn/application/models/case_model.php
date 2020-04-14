<?php
class Case_model extends CI_Model
{

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}
	
	//插入数据库
	public function user_insert($arr)
	{
		$this->db->insert('xz_cn_case',$arr);
		//return mysql_insert_id();
	}
	
	//查询数据
	public function user_select($id='')
	{
		if($id != ''){
			$this->db->where('id',$id);
		}
		$query=$this->db->get('xz_cn_case');
		return $query->result_array();
	}
	
	//查询数据首页显示
	public function user_select_index($index='',$start,$end)
	{
		if($index != ''){
			$this->db->where('index',$index);
		}
		$this->db->order_by('num','desc');
		$this->db->limit($end,$start);
		$query=$this->db->get('xz_cn_case');
		
		return $query->result_array();
	}
	
	//查询sid
	public function user_sid_select($sid='')
	{
		if($sid != ''){
			$this->db->where('sort',$sid);
		}
		$query=$this->db->get('xz_cn_case');
		return $query->result_array();
	}
	
	public function user_sid_limit($start,$end)
	{
		$this->db->order_by('num','desc');
		$this->db->select('*');
		$this->db->limit($end,$start);
		$query=$this->db->get('xz_cn_case');
		return $query->result_array();
	}
	
	//更新数据
	public function user_update($id,$str)
	{
		$this->db->where('id',$id);
		$this->db->update('xz_cn_case',$str);
	}
	
	//删除数据
	public function user_delete($id)
	{
		$this->db->where('id',$id);
		$this->db->delete('xz_cn_case');
	}
	
	//get_where
	public function user_get_where($arr)
	{
		$query=$this->db->get_where('xz_cn_case',$arr);
		return $query->result_array();
	}
	
	function user_select_limit($start,$end)
	{
		$this->db->order_by('num','desc');
		$this->db->select('*');
		$this->db->limit($end,$start);
		$query=$this->db->get('xz_cn_case');
		return $query->result_array();
	}
	
	public function where_sid_in($sid)
	{
		$q=$this->db->query("select * from `xz_case` where `sid` in($sid)");
		return $q->result_array();
	}
	
	public function user_where_in_limit($start,$end,$sid='')
	{
		$query=$this->db->query("select * from `xz_case` where `sid` in($sid) limit $start,$end");
		return $query->result_array();
	}
	
	public function select_xz_case_limit($index,$nums)
	{
		$query=$this->db->query("select `id`,`index`,`title`,`curFile`,`hoverFile` from `xz_case` where `index`='{$index}' order by `id` desc limit 0,".$nums);
		return $query->result_array();
	}


	//下一条
	public function user_next($id)
	{
		$query=$this->db->query("select * from `xz_case` where `id`<{$id} order by `id` desc limit 1");
		return $query->result_array();
	}
	//上一条
	public function user_pre($id)
	{
		$query=$this->db->query("select * from `xz_case` where `id`>{$id} order by `id` desc limit 1");
		return $query->result_array();
	}
}

?>