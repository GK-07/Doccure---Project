<?php 
	defined('BASEPATH') OR exit('No direct script access allowed');

	class labHomeM extends CI_Model
	{
		public function selectLabInfo($id)
		{
			return $this->db->from('tbllaboratory l')->join('tbluser u','u.userid=l.userid')->join('tblcity c','c.cityid=l.cityid')->where($id)->get()->result()[0];
		}

		public function selectLabPatient($id)
		{
			return $this->db->select('ur.*,p.*,lp.*,c.cityname,s.statename')->from('tbluploadreport ur')->join('tbllabpre lp','lp.labpreid=ur.labpreid')->join('tblpatient p','p.patientid=lp.patientid')->join('tbllaboratory l','l.laboratoryid=ur.laboratoryid')->join('tblcity c','c.cityid=p.cityid')->join('tblstate s','s.stateid=c.stateid')->where($id)->group_by('p.patientid')->get()->result();
		}
		public function selectUserInfo($data)
		{
			return $this->db->get_where('tbluser',$data)->result()[0];
		}
		public function updatePassword($id,$data)
		{
			$this->db->where($id)->update('tbluser',$data);
		}
		public function selectPendingRequest($data)
		{
			return $this->db->select('ulp.*,lp.*,d.fullname,p.name,d.profileimage as dp,p.profileimage as pp,c.*,l.name as lname,p.mobileno,p.emailid,l.laboratoryid')->from('tbluploadlabpre ulp')->join('tbllabpre lp','lp.labpreid=ulp.labpreid')->join('tbllaboratory l','l.laboratoryid=ulp.laboratoryid')->join('tbldoctor d','d.doctorid=lp.doctorid')->join('tblpatient p','p.patientid=lp.patientid')->join('tblcategory c','c.categoryid=d.categoryid')->where($data)->get()->result();
		}
		public function updatePreStatus($id,$data)
		{
			$this->db->where($id)->update('tbluploadlabpre',$data);
		}
		public function insertReport($data)
		{
			$this->db->insert('tbluploadreport',$data);
		}
		public function updateUploadStatus($id,$data)
		{	
			$this->db->where($id)->update('tbllabpre',$data);
		}
		public function selectPatient($id)
		{
	         	return $this->db->from('tblpatient p')->join('tblcity c','c.cityid=p.cityid')->join('tblstate s','s.stateid=c.stateid')->where($id)->get()->result()[0];
		}
		public function selectDoctor($id)
		{
	         	return $this->db->from('tbldoctor d')->join('tblcity ct','ct.cityid=d.cityid')->join('tblstate s','s.stateid=ct.stateid')->join('tblcategory c','c.categoryid=d.categoryid')->where($id)->get()->result()[0];
		}
		public function selectCerti($id)
		{
			return $this->db->from('tbldoctorcertificates dc')->join('tblcertificate c','c.certificateid=dc.certificateid')->where($id)->get()->result();
		}
		public function uploadedReport($data)
		{
			return $this->db->select('ur.createddt,ur.reporturl,d.fullname,d.doctorid,d.profileimage as dp,p.patientid,p.name,p.profileimage as pp,c.categoryname,lp.description')->from('tbluploadreport ur')->join('tbllabpre lp','lp.labpreid=ur.labpreid')->join('tblpatient p','p.patientid=lp.patientid')->join('tbllaboratory l','l.laboratoryid=ur.laboratoryid')->join('tbldoctor d','d.doctorid=lp.doctorid')->join('tblcategory c','c.categoryid=d.categoryid')->where($data)->order_by('ur.uploadreportid','desc')->get()->result();
		}
	}
?>