<?php 
	defined('BASEPATH') OR exit('No direct script access allowed');

	class patDashboardM extends CI_Model
	{
		public function selectPatientInfo($id)
		{
			return $this->db->from('tblpatient p')->join('tblcity c','c.cityid=p.cityid')->join('tblstate s','s.stateid=c.stateid')->where($id)->get()->result()[0];
		}
		public function selectAppointment($id)
		{
			return $this->db->from('tblappointment a')->join('tblpatient p','p.patientid=a.patientid')->join('tbldoctor d','d.doctorid=a.doctorid')->join('tblcategory c','c.categoryid=d.categoryid')->join('tblslot s','s.slotid=a.slotid')->where($id)->get()->result();
		}
		public function selectCaseFiles($data)
		{
			return $this->db->select('d.profileimage dp,p.profileimage pp,d.fullname,p.name,c.categoryname,cf.*,d.userid')->from('tblcasefile cf')->join('tbldoctor d','d.doctorid=cf.doctorid')->join('tblpatient p','p.patientid=cf.patientid')->join('tblcategory c','c.categoryid=d.categoryid')->where($data)->get()->result();
		}
		public function selectModalApp($data)
		{
			return $this->db->from('tblappointment a')->join('tblslot s','s.slotid=a.slotid')->where($data)->get()->result()[0];
		}
		public function selectLabPre($data)
		{
			return $this->db->select('lp.*,d.profileimage as dp,p.profileimage as pp,d.fullname,p.name,c.categoryname')->from('tbllabpre lp')->join('tbldoctor d','d.doctorid=lp.doctorid')->join('tblcategory c','c.categoryid=d.categoryid')->join('tblpatient p','p.patientid=lp.patientid')->where($data)->get()->result();
		}
		public function uploadedReport($data)
		{
			return $this->db->select('ur.*,lp.*,d.profileimage as dp,p.profileimage as pp,d.fullname,p.name,c.categoryname,lb.name as lname,lb.profileimage as lp')->from('tbluploadreport ur')->join('tbllabpre lp','lp.labpreid=ur.labpreid')->join('tbldoctor d','d.doctorid=lp.doctorid')->join('tblcategory c','c.categoryid=d.categoryid')->join('tblpatient p','p.patientid=lp.patientid')->join('tbllaboratory lb','lb.laboratoryid=ur.laboratoryid')->where($data)->get()->result();
		}
		public function uploadedReport1($data)
		{
			return $this->db->select('ur.*,lp.*,p.name,p.profileimage as pp,d.fullname,d.profileimage as dp,c.categoryname')->from('tbluploadreport ur')->join('tbllabpre lp','lp.labpreid=ur.labpreid')->join('tblpatient p','lp.patientid=p.patientid')->join('tbldoctor d','d.doctorid=lp.doctorid')->join('tblcategory c','c.categoryid=d.categoryid')->where($data)->get()->result();
		}
		public function selectUserInfo($data)
		{
			return $this->db->get_where('tbluser',$data)->result()[0];
		}
		public function updatePassword($id,$data)
		{
			$this->db->where($id)->update('tbluser',$data);
		}
		public function insertReport($data)
		{
			$this->db->insert('tbluploadreport',$data);
		}
		public function selectLabInfo()
		{
			return $this->db->from('tbllaboratory l')->join('tblcity c','c.cityid=l.cityid')->join('tblstate s','s.stateid=c.stateid')->get()->result();
		}
		public function selectCity()
		{		
			return $this->db->get_where('tblcity',array('status'=>1))->result();
		}
		public function getCity($data)
		{
			return $this->db->from('tbllaboratory l')->join('tblcity c','c.cityid=l.cityid')->join('tblstate s','s.stateid=c.stateid')->where($data)->get()->result();
		}
		public function insertPre($data)
		{
			$this->db->insert('tbluploadlabpre',$data);
		}
		public function updateStatus($lpid,$data)
		{
			$this->db->where($lpid)->update('tbllabpre',$data);
		}
		public function getLab($data)
		{
			return $this->db->from('tbllaboratory l')->join('tblcity c','c.cityid=l.cityid')->join('tblstate s','s.stateid=c.stateid')->where($data)->get()->result()[0];
		}
	}
?>