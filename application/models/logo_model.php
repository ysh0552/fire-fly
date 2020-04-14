<?php
class Logo_model extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}
	
	//插入数据库
	public function user_insert($arr)
	{
		$this->db->insert('logo',$arr);
	}
	
	//查询数据
	public function user_select($id='')
	{
		if($id != ''){
			$this->db->where('id',$id);
		}
		$this->db->order_by('id','desc');
		$query=$this->db->get('logo');
		
		return $query->result_array();
	}

	//查询name
	public function user_name_select($name='')
	{
		if($name != ''){
			$this->db->where('name',$name);
		}
		$query=$this->db->get('logo');
		return $query->result_array();
	}
	
	//更新数据
	public function user_update($id,$str)
	{
		$this->db->where('id',$id);
		$this->db->update('logo',$str);
	}
	
	//删除数据
	public function user_delete($id)
	{
		$this->db->where('id',$id);
		$this->db->delete('logo');
	}
	
	//get_where
	public function user_get_where($arr)
	{
		$query=$this->db->get_where('logo',$arr);
		return $query->result_array();
	}
	
	function user_select_limit($start,$end)
	{
		$this->db->select('*');
		$this->db->limit($end,$start);
		$query=$this->db->get('logo');
		return $query->result_array();
	}

}

?>