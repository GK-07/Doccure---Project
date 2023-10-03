<?php 
	defined('BASEPATH') OR exit('No direct script access allowed');

	class doctorM extends CI_Model
	{
		public function selectDoctor()
		{
			$where="u.status=0 OR u.status=1";
			return $this->db->from("tbldoctor d")->join("tblcity ct","d.cityid=ct.cityid")->join('tblcategory c','c.categoryid=d.categoryid')->join('tbluser u','u.userid=d.userid')->where($where)->get()->result();
		}
		
		public function selectDoctorById($data)
		{
				return $this->db->from("tbldoctor d")->join("tblcity ct","d.cityid=ct.cityid")->join('tblcategory c','c.categoryid=d.categoryid')->join('tbluser u','u.userid=d.userid')->where($data)->get()->result()[0];
		}
		public function selectDoctorCerti($data)
		{
			return $this->db->from('tbldoctorcertificates dc')->join('tbldoctor d','dc.doctorid=d.doctorid')->join('tblcertificate c','c.certificateid=dc.certificateid')->where($data)->get()->result();
		}
		public function updateStatus($uid,$st)
		{
			$this->db->where($uid)->update("tbluser",$st);
		}
	}
?>