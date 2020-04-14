<?php
class Article_model extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}
	
	//插入数据库
	public function user_insert($arr)
	{
		$this->db->insert('article',$arr);
	}

	//查询数据
	public function user_select($id='')
	{
		if($id != ''){
			$this->db->where('id',$id);
		}
		$query=$this->db->get('article');
		return $query->result_array();
	}

	//查询sid数据
	public function user_sid_select($sid='')
	{
		if($sid != ''){
			$this->db->where('sid',$sid);
		}
		$this->db->order_by("sid", "desc");
		$query=$this->db->get('article');
		return $query->result_array();
	}

	//更新数据
	public function user_update($id,$arr)
	{
		$this->db->where('id',$id);
		$this->db->update('article',$arr);
	}

	//删除数据
	public function user_delete($id)
	{
		$this->db->where('id',$id);
		$this->db->delete('article');
	} 
	
	public function user_select_limit($start,$end)
	{
		$this->db->select('*');
		$this->db->order_by("createtime", "desc");
		$this->db->order_by("index", "desc");
		$this->db->limit($end,$start);
		$query=$this->db->get('article');
		return $query->result_array();
	}
	
	
	public function user_sid_limit($start,$end,$sid='')
	{
		if($sid != ''){
			$this->db->where('sid',$sid);
		}
		$this->db->select('*');
		$this->db->order_by("index", "desc");
		$this->db->order_by("createtime", "desc");
		$this->db->limit($end,$start);
		$query=$this->db->get('article');
		return $query->result_array();
	}
	
	public function user_index_sid($sid,$index,$nums)
	{
		$query=$this->db->query("select `id`,`index`,`sid`,`title`,`content` from `article` where `index`='{$index}' and `sid`='{$sid}' order by `id` desc limit 0,".$nums);
		return $query->result_array();
	}
	
	
	


	
	
}



?>