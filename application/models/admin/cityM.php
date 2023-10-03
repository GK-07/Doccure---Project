<?php 
	defined('BASEPATH') OR exit('No direct script access allowed');

	class cityM extends CI_Model
	{
		public function selectCity($stid)
		{
			return $this->db->get_where('tblcity',$stid)->result();
		}
		public function updateStatus($cid,$st)
		{
			$this->db->where($cid)->update("tblcity",$st);
		}
		public function enableAllCity($sid,$st)
		{
			$this->db->where($sid)->update("tblcity",$st);
		}
		public function insertCity($data)
		{
			$this->db->insert('tblcity',$data);
		}
	}
?>