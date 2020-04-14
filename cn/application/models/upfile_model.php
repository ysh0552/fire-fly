<?php
class Upfile_model extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}
	
	//插入数据库
	public function user_insert($arr)
	{
		$this->db->insert('upfile',$arr);
	}
	//同时插入多条数据
	public function user_batchInsert($arr)
	{
		$this->db->insert_batch('upfile',$arr);
	}
	

	public function user_where_in($arr)
	{
		$this->db->where_in('id',$arr);
		$query=$this->db->get('upfile');
		return $query->result_array();
	}

	
	//查询数据
	public function user_select($id='')
	{
		if($id != ''){
			$this->db->where('id',$id);
		}
		$query=$this->db->get('upfile');
		return $query->result_array();
	}
	
	//查询sid
	public function user_fid_select($fid)
	{
		$this->db->where('fid',$fid);
		$this->db->order_by('extensions','desc');
		$query=$this->db->get('upfile');
		return $query->result_array();
	}

	
	//更新数据
	public function user_update($id,$str)
	{
		$this->db->where('id',$id);
		$this->db->update('upfile',$str);
	}
	
	//删除数据
	public function user_delete($id)
	{
		$this->db->where('id',$id);
		$this->db->delete('upfile');
	}

	//get_where
	public function  user_get_where($arr)
	{
		$query=$this->db->get_where('upfile',$arr);
		return $query->result_array();
	}
	
	public function user_select_limit($start,$end)
	{
		$this->db->select('*');
		$this->db->limit($end,$start);
		$query=$this->db->get('upfile');
		return $query->result_array();
	}
	
	public function user_info_select($fid,$filename)
	{
		$q=$this->db->query("select * from `upfile` where `fid`={$fid} and `filename`='{$filename}'");
		return $q->result_array();
	}

	
	
	

}

?>