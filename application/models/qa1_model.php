<?php
class Qa1_model extends CI_Model
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
		$query=$this->db->get('qa1');
		return $query->result_array();
	}
	
	//更新数据
	public function user_update($id,$str)
	{
		$this->db->where('id',$id);
		$this->db->update('qa1',$str);
	}
	public function user_insert($arr)
	{
		
		$this->db->insert('qa1',$arr);
	}	
	
	//删除数据
	public function user_delete($id)
	{
		$this->db->where('id',$id);
		$this->db->delete('qa1');
	}
	
	public function user_select_where_limit($index,$start,$end)
	{
		$this->db->select('*');
		$this->db->limit($end,$start);
		$this->db->where('index',$index);
		$query=$this->db->get('qa1');
		return $query->result_array();
	}

}
?>