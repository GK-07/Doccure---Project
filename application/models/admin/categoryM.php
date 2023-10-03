<?php 
	defined('BASEPATH') OR exit('No direct script access allowed');

	class categoryM extends CI_Model
	{
		public function selectCat()
		{
			return $this->db->get('tblcategory')->result();
		}

		public function insertCat($data)
		{
			return $this->db->insert('tblcategory',$data);
		}

		public function updateCat($id,$data)
		{
			return $this->db->where($id)->update('tblCategory',$data);
		}
		public function selectOldImg($cid)
		{
			return $this->db->select('cimage')->from('tblcategory')->where($cid)->get()->result()[0];
		}

	}
?>