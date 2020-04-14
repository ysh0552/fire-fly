<?php
class Download_model extends CI_Model
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
		$this->db->order_by('sort','asc');
		$query=$this->db->get('pod_download');
		return $query->result_array();
	}
	
	//更新数据
	public function user_update($id,$str)
	{
		$this->db->where('id',$id);
		$this->db->update('pod_download',$str);
	}
	public function user_insert($arr)
	{
		
		$this->db->insert('pod_download',$arr);
	}	
	
	//删除数据
	public function user_delete($id)
	{
		$this->db->where('id',$id);
		$this->db->delete('pod_download');
	}
	
	public function user_select_limit($start,$end)
	{
		$this->db->select('*');
		$this->db->limit($end,$start);
		$this->db->order_by('sort','asc');
		$query=$this->db->get('pod_download');
		return $query->result_array();
	}
	
	public function user_search($str)
	{
		$query=$this->db->query("select * from `pod_download` where `title` like '%{$str}%' ");
		return $query->result_array();
	}

	
	
}
?>