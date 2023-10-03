<?php 
	defined('BASEPATH') OR exit('No direct script access allowed');

	class patMeetingM extends CI_Model
	{
		public function selectMeeting($data)
		{
			return $this->db->from('tblroom r')->join('tblappointment a','a.appointmentid=r.appointmentid')->join('tbldoctor d','d.doctorid=a.doctorid')->join('tblslot s','s.slotid=a.slotid')->where($data)->get()->result();
		}
	}
?>
