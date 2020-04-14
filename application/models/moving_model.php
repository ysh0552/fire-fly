<?php
class Moving_model extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}
	
	//插入数据库
	public function user_insert($arr)
	{
		$this->db->insert('moving',$arr);
	}

	//查询数据
	public function user_select($id='')
	{
		if($id != ''){
			$this->db->where('id',$id);
		}
		
		$query=$this->db->get('moving');
		return $query->result_array();
	}

	//更新数据
	public function user_update($id,$str)
	{
		$this->db->where('id',$id);
		$this->db->update('moving',$str);
	}

	//删除数据
	public function user_delete($id)
	{
		$this->db->where('id',$id);
		$this->db->delete('moving');
	}
	
	
	function user_select_limit($start,$end)
	{
		$this->db->select('*');
		$this->db->order_by("id", "desc");
		$this->db->limit($end,$start);
		$query=$this->db->get('moving');
		return $query->result_array();
	}
	
	
	function user_update_clicks($id)
	{
		$this->db->query("update `moving` set `clicks`=`clicks`+1 where `id`='{$id}'");
	}


}



?>