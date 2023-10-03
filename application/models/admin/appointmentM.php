<?php 
	defined('BASEPATH') OR exit('No direct script access allowed');

	class appointmentM extends CI_Model
	{
		public function selectAppointment()
		{
			return $this->db->select('a.*,d.fullname,p.name,d.profileimage as dp,p.profileimage as pp,c.categoryname,ct.cityname,s.*')->from('tblappointment a')->join('tbldoctor d','d.doctorid=a.doctorid')->join('tblpatient p','p.patientid=a.patientid')->join('tblcategory c','c.categoryid=d.categoryid')->join('tblcity ct','ct.cityid=d.cityid')->join('tblslot s','s.slotid=a.slotid')->get()->result();
		}
		public function deleteAppointment($id)
		{
			$this->db->delete('tblappointment',$id);
		}
	}
?>