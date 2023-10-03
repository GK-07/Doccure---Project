<?php 
	defined('BASEPATH') OR exit('No direct script access allowed');
	class doctorM extends CI_Model
	{
		public function selectUserInfo($data)
		{
			return $this->db->get_where('tbluser',$data)->result()[0];
		}
		public function updatePassword($id,$data)
		{
			$this->db->where($id)->update('tbluser',$data);
		}
		public function insertSocial($data)
		{
			$this->db->insert('tblsocial',$data);
		}
		public function selectSocial($data)
		{
			return $this->db->get_where('tblsocial',$data)->result();
		}
		public function updateSocial($id,$data)
		{
			$this->db->where($id)->update('tblsocial',$data);
		}

	}
?>