<?php 
	defined('BASEPATH') OR exit('No direct script access allowed');

	class pendingM extends CI_Model
	{
		public function selectPendingLabs($st)
		{
			return $this->db->from('tbllaboratory l')->join('tblcity c','c.cityid=l.cityid')->join('tbluser u','u.userid=l.userid')->where($st)->get()->result();
		}
		public function updateStatus($uid,$data)
		{
			$this->db->where($uid)->update('tbluser',$data);
		}
		public function selectPendingDoctor($st)
		{
			return $this->db->from('tbldoctor d')->join('tblcity ct','ct.cityid=d.cityid')->join('tbluser u','u.userid=d.userid')->join('tblcategory c','c.categoryid=d.categoryid')->where($st)->get()->result();
		}
	}
?>