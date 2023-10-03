<?php 
	defined('BASEPATH') OR exit('No direct script access allowed');

	class complaintM extends CI_Model
	{
		public function selectDoctorComplaint()
		{
			return $this->db->select('c.*,d.profileimage as dp,d.fullname,p.profileimage as pp,p.name')->from('tblcomplaint c')->join('tbldoctor d','d.doctorid=c.doctorid')->join('tblpatient p','p.patientid=c.patientid')->get()->result();
		}
		public function deleteComplaint($id)
		{
			$this->db->delete('tblcomplaint',$id);
		}
		public function selectLabComplaint()
		{
			return $this->db->select('lc.*,p.profileimage as pp,l.profileimage as lp,l.name as lname,p.name as pname')->from('tbllabcomplaint lc')->join('tbllaboratory l','l.laboratoryid=lc.laboratoryid')->join('tblpatient p','p.patientid=lc.patientid')->get()->result();
		}
		public function deleteLabComplaint($id)
		{
			$this->db->delete('tbllabcomplaint',$id);
		}
	}
?>