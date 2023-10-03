<?php 
	defined('BASEPATH') OR exit('No direct script access allowed');

	class stateM extends CI_Model
	{
		public function selectState()
		{
			return $this->db->get("tblstate")->result();
		}
		public function updateStatus($sid,$st)
		{
			$this->db->where($sid)->update("tblstate",$st);
			if($st['status']==0)
			{
				$this->db->where($sid)->update('tblcity',$st);
			}
		}
		public function insertState($data)
		{
			$this->db->insert('tblstate',$data);
		}
	}
?>