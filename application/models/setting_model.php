<?php
class Setting_model extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}
	
	//插入数据库
	public function user_insert($arr)
	{
		$this->db->insert('xz_setting',$arr);
	}

	//查询数据
	public function user_select($id='')
	{
		if($id != ''){
			$this->db->where('id',$id);
		}
		
		$query=$this->db->get('xz_setting');
		return $query->result_array();
	}


	//更新数据
	public function user_update($id,$str)
	{
		$this->db->where('id',$id);
		$s=$this->db->update('xz_setting',$str);
		
		
	}

	//删除数据
	public function user_delete($id)
	{
		$this->db->where('id',$id);
		$this->db->delete('xz_setting');
	}
	
	function user_select_limit($start,$end)
	{
		$this->db->select('*');
		$this->db->limit($end,$start);
		$query=$this->db->get('xz_setting');
		return $query->result_array();
	}
	
}
?>