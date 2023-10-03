<?php 
	defined('BASEPATH') OR exit('No direct script access allowed');

	class docProfileM extends CI_Model
	{
		public function selectDoctorInfo($id)
		{
			return $this->db->from('tbldoctor d')->join('tblcategory c','c.categoryid=d.categoryid')->join('tbluser u','u.userid=d.userid')->join('tblcity ct','ct.cityid=d.cityid')->join('tblstate s','s.stateid=ct.stateid')->where($id)->get()->result()[0];
		}
		public function selectState()
		{
			return $this->db->get('tblstate')->result();
		}
		public function selectCity($id)
		{
			return $this->db->get_where('tblcity',$id)->result();
		}
		public function selectCerti($id)
		{
			return $this->db->from('tbldoctorcertificates dc')->join('tblcertificate c','c.certificateid=dc.certificateid')->join('tbldoctor d','d.doctorid=dc.doctorid')->where($id)->get()->result();
		}
		public function updateProfile($did,$data)
		{
			$this->db->where($did)->update('tbldoctor',$data);
		}
		public function insertDoctorCertificate($dcerti)
		{
			$this->db->insert('tbldoctorcertificates',$dcerti);
		}
		public function selectCr()
		{
			return $this->db->get('tblcertificate')->result();
		}
	}
?>