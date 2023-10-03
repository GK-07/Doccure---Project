<?php 
	defined('BASEPATH') OR exit('No direct script access allowed');

	class laboratoryM extends CI_Model
	{
		public function selectLab()
		{
			$where="u.status=0 OR u.status=1";	
			return $this->db->from("tbllaboratory l")->join("tblcity c","l.cityid=c.cityid")->join('tbluser u','u.userid=l.userid')->where($where)->get()->result();
		}
		/*public function selectState()
		{
			return $this->db->get("tblstate")->result();
		}
		public function selectCityByState($sid)
		{
			return $this->db->get_where("tblcity",$sid)->result();
		}*/
		public function selectLabById($data)
		{
				return $this->db->select("l.*,c.*")->from("tbllaboratory l")->join("tblcity c","l.cityid=c.cityid")->where($data)->get()->result()[0];
		}
	/*	public function insertLab($data)
		{
			$this->db->insert("tbllaboratory",$data);
		}*/
		public function updateStatus($uid,$st)
		{
			$this->db->where($uid)->update("tbluser",$st);
		}
	}
?>