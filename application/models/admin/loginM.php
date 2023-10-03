<?php 
	defined('BASEPATH') OR exit('No direct script access allowed');

	class loginM extends CI_Model
	{
		public function selectAdmin($data)
		{
			return $this->db->get_where("tbladmin",$data)->result();
		}

		public function insertAdmin($data)
		{
			$this->db->insert("tbladmin",$data);
		}
	}
?>