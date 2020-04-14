<?php
class Ads_model extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}
	
	//插入数据库
	public function user_insert($arr)
	{
		$this->db->insert('xz_cn_ads',$arr);
	}
	
	//查询数据
	public function user_select($id='')
	{
		if($id != ''){
			$this->db->where('id',$id);
		}
		$this->db->order_by("title", "asc");
		$this->db->order_by("sort", "asc");
		$query=$this->db->get('xz_cn_ads');
		return $query->result_array();
	}
	
	//title 搜索
	public function user_search($str)
	{
		$query=$this->db->query("select * from `xz_cn_ads` where `title` like '%{$str}%' order by sort asc");
		return $query->result_array();
	}
	
	
	//查询gid
	public function user_gid_select($gid='')
	{
		$this->db->where('gid',$gid);
		$query=$this->db->get('xz_cn_ads');
		return $query->result_array();
	}
	
	//更新数据
	public function user_update($id,$str)
	{
		$this->db->where('id',$id);
		$this->db->update('xz_cn_ads',$str);
	}
	
	//删除数据
	public function user_delete($id)
	{
		$this->db->where('id',$id);
		$this->db->delete('xz_cn_ads');
	}
	
	//get_where
	public function  user_get_where($arr)
	{
		$query=$this->db->get_where('xz_cn_ads',$arr);
		return $query->result_array();
	}
	
	function user_select_limit($start,$end)
	{
		$this->db->select('*');
		$this->db->order_by("gid", "asc");
		$this->db->limit($end,$start);
		$query=$this->db->get('xz_cn_ads');
		return $query->result_array();
	}

}

?>