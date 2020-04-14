<?php
class Qa_model extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	//查询数据
	public function user_select($id='')
	{
		if($id != ''){
			$this->db->where('id',$id);
		}
		$query=$this->db->get('pod_qa');
		return $query->result_array();
	}
	//查询数据
	public function user_content_select($id='')
	{
		if($id != ''){
			$this->db->where('content',$id);
		}
		$query=$this->db->get('pod_qa');
		return $query->result_array();
	}
	
	//更新数据
	public function user_update($id,$str)
	{
		$this->db->where('id',$id);
		$this->db->update('pod_qa',$str);
	}
	public function user_insert($arr)
	{
		
		$this->db->insert('pod_qa',$arr);
	}	
	
	public function user_select_where_limit($index,$start,$end)
	{
		$this->db->select('*');
		$this->db->limit($end,$start);
		$this->db->where('index',$index);
		$query=$this->db->get('pod_qa');
		return $query->result_array();
	}

	//删除数据
	public function user_delete($id)
	{
		$this->db->where('id',$id);
		$this->db->delete('pod_qa');
	}
	
	public function user_select_limit($start,$end)
	{
		$this->db->select('*');
		$this->db->order_by('sort','asc');
		$this->db->limit($end,$start);
		$query=$this->db->get('pod_qa');
		return $query->result_array();
	}
	
	public function user_search($str)
	{
		$query=$this->db->query("select * from `pod_qa` where `title` like '%{$str}%' ");
		return $query->result_array();
	}
}
?>