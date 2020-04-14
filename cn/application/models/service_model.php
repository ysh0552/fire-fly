<?php
class Service_model extends CI_Model
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
		$query=$this->db->get('service');
		return $query->result_array();
	}
	
	//更新数据
	public function user_update($id,$str)
	{
		$this->db->where('id',$id);
		$this->db->update('service',$str);
	}
	public function user_insert($arr)
	{
		$this->db->insert('service',$arr);
	}	
	
	//删除数据
	public function user_delete($id)
	{
		$this->db->where('id',$id);
		$this->db->delete('service');
	}
	public function user_select_limit($start,$end)
	{
		$this->db->select('*');
		$this->db->limit($end,$start);
		$this->db->order_by('id','desc');
		$query=$this->db->get('service');
		return $query->result_array();
	}
	
	public function user_select_index_limit($index,$start,$end)
	{
		$this->db->select('*');
		$this->db->limit($end,$start);
		$this->db->where('index',$index);
		$this->db->order_by('id','desc');
		$query=$this->db->get('service');
		return $query->result_array();
	}
	//上一条
	public function user_pre($id)
	{
		$query=$this->db->query("select * from `service` where `id`<{$id} order by `id` desc limit 1");
		return $query->result_array();
	}
	//下一条
	public function user_next($id)
	{
		$query=$this->db->query("select * from `service` where `id`>{$id} order by `id` asc limit 1");
		return $query->result_array();
	}}
?>