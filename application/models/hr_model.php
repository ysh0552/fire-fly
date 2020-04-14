<?php
class Hr_model extends CI_Model
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
		$query=$this->db->get('hr');
		return $query->result_array();
	}
	
	//更新数据
	public function user_update($id,$str)
	{
		$this->db->where('id',$id);
		$this->db->update('hr',$str);
	}
	public function user_insert($arr)
	{
		
		$this->db->insert('hr',$arr);
	}	
	
	//删除数据
	public function user_delete($id)
	{
		$this->db->where('id',$id);
		$this->db->delete('hr');
	}
}
?>