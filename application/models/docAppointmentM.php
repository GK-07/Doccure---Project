<?php 
	defined('BASEPATH') OR exit('No direct script access allowed');

	class docAppointmentM extends CI_Model
	{
		public function selectDoctorInfo($id)
		{
			return $this->db->from('tbldoctor d')->join('tblcategory c','c.categoryid=d.categoryid')->join('tblcity ct','ct.cityid=d.cityid')->where($id)->get()->result()[0];
		}
		public function selectCertiInfo($id)
		{
			return $this->db->from('tbldoctorcertificates dc')->join('tblcertificate c','c.certificateid=dc.certificateid')->get()->result();
		}
		public function selectAppInfo($id)
		{
			return $this->db->from('tbldoctor d')->join('tblappointment a','a.doctorid=d.doctorid')->join('tblpatient p','p.patientid=a.patientid')->join('tblcity c','c.cityid=p.cityid')->join('tblslot s','s.slotid=a.slotid')->where($id)->get()->result();
		}
		public function selectPendingApp($data)
		{
			return $this->db->from('tbldoctor d')->join('tblappointment a','a.doctorid=d.doctorid')->join('tblpatient p','p.patientid=a.patientid')->join('tblcity c','c.cityid=p.cityid')->join('tblslot s','s.slotid=a.slotid')->where($data)->get()->result(); 
		}
		public function updateAppStatus($id,$data)
		{
			$this->db->where($id)->update('tblappointment',$data);
		}
		public function selectModalApp($data)
		{
			return $this->db->from('tblappointment a')->join('tblslot s','s.slotid=a.slotid')->where($data)->get()->result()[0];
		}
		public function updateRoomStatus($data,$id)
		{
			$this->db->where($id)->update('tblappointment',$data);
		}
		public function insertRoom($data)
		{
			$this->db->insert('tblroom',$data);
		}
		public function updateSlotAppStatus($id,$data)
		{
			$this->db->where($id)->update('tblslot',$data);
		}
		public function selectPatient($data)
		{
			return $this->db->from('tblpatient p')->join('tblcity c','c.cityid=p.cityid')->join('tblstate s','s.stateid=c.stateid')->where($data)->get()->result()[0];
		}
		public function selectLab($data)
		{
			return $this->db->from('tbllaboratory l')->join('tblcity c','c.cityid=l.cityid')->join('tblstate s','s.stateid=c.stateid')->where($data)->get()->result()[0];
		}
	}
?>