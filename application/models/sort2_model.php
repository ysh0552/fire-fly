<?php
class sort2_model extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}
	
	//插入数据库
	public function user_insert($arr)
	{
		$this->db->insert('xz_sort2',$arr);
	}

	//查询数据
	public function user_select($id='')
	{
		if($id != ''){
			$this->db->where('id',$id);
		}
		$this->db->order_by('sid','asc');
		$query=$this->db->get('xz_sort2');
		return $query->result_array();
	}


	//查询数据
	public function user_sid_select($sid='')
	{
		if($sid !== ''){
			$this->db->where('sid',$sid);
		}
		
		$query=$this->db->get('xz_sort2');
		
		return $query->result_array();
	}
	
	//查询数据
	public function user_w_w($sid,$id)
	{
		
		$this->db->where('sid',$sid);
		$this->db->where('id',$id);		
		$query=$this->db->get('xz_sort2');
		
		return $query->result_array();
	}

	//更新数据
	public function user_update($id,$str)
	{
		$this->db->where('id',$id);
		$this->db->update('xz_sort2',$str);
	}

	//删除数据
	public function user_delete($id)
	{
		$this->db->where('id',$id);
		$this->db->delete('xz_sort2');
	}
	
	function user_select_limit($start,$end)
	{
		$this->db->select('*');
		$this->db->limit($end,$start);
		$query=$this->db->get('xz_sort2');
		return $query->result_array();
	}
	
}
?>