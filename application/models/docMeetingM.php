<?php 
	defined('BASEPATH') OR exit('No direct script access allowed');

	class docMeetingM extends CI_Model
	{
		public function selectMeeting($data)
		{
			return $this->db->from('tblroom r')->join('tblappointment a','a.appointmentid=r.appointmentid')->join('tblpatient p','p.patientid=a.patientid')->join('tblslot s','s.slotid=a.slotid')->where($data)->get()->result();
		}
	}
?>
