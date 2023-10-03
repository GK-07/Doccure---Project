<?php 
	defined('BASEPATH') OR exit('No direct script access allowed');
	class docPatientM extends CI_Model
	{
		public function selectPatientInfo($data)
		{
			return $this->db->select('p.*,c.*')->from('tblappointment a')->join('tblpatient p','p.patientid=a.patientid')->join('tbldoctor d','d.doctorid=a.doctorid')->join('tblcity c','c.cityid=p.cityid')->group_by('a.patientid')->where($data)->get()->result();
		}
		public function selectPatient($data)
		{
			return $this->db->from('tblpatient p')->join('tblcity c','c.cityid=p.cityid')->join('tblstate s','s.stateid=c.stateid')->where($data)->get()->result()[0];
		}
		public function selectLastApp($data)
		{
			return $this->db->from('tblappointment a')->join('tbldoctor d','d.doctorid=a.doctorid')->join('tblcategory c','c.categoryid=d.categoryid')->join('tblslot s','s.slotid=a.slotid')->where($data)->order_by('a.appointmentid','DESC')->limit(3)->get()->result();
		}

		public function selectDocApp($data)
		{
			return $this->db->from('tblappointment a')->join('tbldoctor d','d.doctorid=a.doctorid')->join('tblcategory c','c.categoryid=d.categoryid')->join('tblslot s','s.slotid=a.slotid')->where($data)->get()->result();
		}
		public function insertCaseFile($data)
		{
			$this->db->insert('tblcasefile',$data);
		}
		public function selectCaseFiles($data)
		{
			return $this->db->select('d.profileimage dp,p.profileimage pp,d.fullname,p.name,c.categoryname,cf.*,d.userid')->from('tblcasefile cf')->join('tbldoctor d','d.doctorid=cf.doctorid')->join('tblpatient p','p.patientid=cf.patientid')->join('tblcategory c','c.categoryid=d.categoryid')->where($data)->get()->result();
		}
		public function updateCaseFile($id,$data)
		{
			$this->db->where($id)->update('tblcasefile',$data);
		}
		public function selectLabPre($data)
		{
			return $this->db->select('lp.*,d.profileimage as dp,p.profileimage as pp,d.fullname,p.name,c.categoryname')->from('tbllabpre lp')->join('tbldoctor d','d.doctorid=lp.doctorid')->join('tblcategory c','c.categoryid=d.categoryid')->join('tblpatient p','p.patientid=lp.patientid')->where($data)->get()->result();
		}
		public function insertLabPre($data)
		{
			$this->db->insert('tbllabpre',$data);
		}
		public function uploadedReport($data)
		{
			return $this->db->select('ur.*,d.profileimage as dp,p.profileimage as pp,d.fullname,p.name,c.categoryname,lb.name as lname,lb.profileimage as lpi,lp.*')->from('tbluploadreport ur')->join('tbllabpre lp','lp.labpreid=ur.labpreid')->join('tbldoctor d','d.doctorid=lp.doctorid')->join('tblcategory c','c.categoryid=d.categoryid')->join('tblpatient p','p.patientid=lp.patientid')->join('tbllaboratory lb','lb.laboratoryid=ur.laboratoryid')->where($data)->get()->result();
		}
		public function uploadedReport1($data)
		{
			return $this->db->select('ur.*,p.name,p.profileimage as pp,d.fullname,d.profileimage as dp,c.categoryname,lp.*')->from('tbluploadreport ur')->join('tbllabpre lp','lp.labpreid=ur.labpreid')->join('tblpatient p','p.patientid=lp.patientid')->join('tbldoctor d','d.doctorid=lp.doctorid')->join('tblcategory c','c.categoryid=d.categoryid')->where($data)->get()->result();
		}
	}
?>
