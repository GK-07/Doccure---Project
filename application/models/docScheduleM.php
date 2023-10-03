<?php 
	defined('BASEPATH') OR exit('No direct script access allowed');
	class docScheduleM extends CI_Model
	{
		public function selectSlotByDate($data)
		{
			return $this->db->get_where('tblslot',$data)->result();
		}
		public function deleteSchedule($data)
		{
			$res=$this->db->from('tblslot')->where($data)->get()->result();
			if(count($res)>0)
			{	
				$this->db->delete('tblslot',$data);
			}
		}
		public function removeTimeSlot($data)
		{
			$this->db->delete("tblslot",$data);
		}
	
		public function insertTimeSlot($data)
		{
			$this->db->insert('tblslot',$data);
		}
		public function updateTimeSlot($sid,$data)
		{
			$this->db->where($sid)->update('tblslot',$data);
		}
	}
?>