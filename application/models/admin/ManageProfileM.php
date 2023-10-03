<?php 
	defined('BASEPATH') OR exit('No direct script access allowed');

	class ManageProfileM extends CI_Model
	{
		public function selectAdmin($data)
		{
			return $this->db->get_where("tbladmin",$data)->result()[0];
		}
		public function updateProfile($aid,$data)
		{
			$this->db->where($aid)->update('tbladmin',$data);
		}
	}
?>