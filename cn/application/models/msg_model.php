<?php
class Msg_model extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}
	
	public function user_insert($arr)
	{
		$this->db->insert('pod_msg',$arr);
	}
	//查询数据
	public function user_select($id='')
	{
		if($id != ''){
			$this->db->where('id',$id);
		}
		
		$query=$this->db->get('pod_msg');
		return $query->result_array();
	}
	//删除数据
	public function user_delete($id)
	{
		$this->db->where('id',$id);
		$this->db->delete('pod_msg');
	}
	
	public function user_select_limit($start,$end)
	{
		$this->db->select('*');
		$this->db->order_by("id", "desc");
		$this->db->limit($end,$start);
		$query=$this->db->get('pod_msg');
		return $query->result_array();
	}
}
?>