<?php
class Ads1_model extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}
	
	//插入数据库
	public function user_insert($arr)
	{
		$this->db->insert('xz_cn_ads1',$arr);
	}
	
	//查询数据
	public function user_select($id='')
	{
		if($id != ''){
			$this->db->where('id',$id);
		}
		$this->db->order_by("sort", "asc");
		$query=$this->db->get('xz_cn_ads1');
		return $query->result_array();
	}
	
	//查询gid
	public function user_gid_select($gid='')
	{
		$this->db->where('gid',$gid);
		$query=$this->db->get('xz_cn_ads1');
		return $query->result_array();
	}
	
	//更新数据
	public function user_update($id,$str)
	{
		$this->db->where('id',$id);
		$this->db->update('xz_cn_ads1',$str);
	}
	
	//删除数据
	public function user_delete($id)
	{
		$this->db->where('id',$id);
		$this->db->delete('xz_cn_ads1');
	}
	
	//get_where
	public function  user_get_where($arr)
	{
		$query=$this->db->get_where('xz_cn_ads1',$arr);
		return $query->result_array();
	}
	
	function user_select_limit($start,$end)
	{
		$this->db->select('*');
		$this->db->order_by("gid", "asc");
		$this->db->limit($end,$start);
		$query=$this->db->get('xz_cn_ads1');
		return $query->result_array();
	}

}

?>