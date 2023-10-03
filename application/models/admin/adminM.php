<?php 
	defined('BASEPATH') OR exit('No direct script access allowed');

	class adminM extends CI_Model
	{
		public function selectAdmin()
		{
			return $this->db->select('a.*,aa.username as adu,aa.profilepic as apic')->from('tbladmin a')->join('tbladmin aa','aa.adminid=a.addedbyid')->get()->result();
		}
		public function insertAdmin($data)
		{
			$this->db->insert("tbladmin",$data);
		}
		public function selectTopdoc()
		{
			return $this->db->from('tbldoctor d')->join('tblcategory c','c.categoryid=d.categoryid')->limit(5)->get()->result();
		}
		public function docCount()
		{
			return $this->db->get('tbldoctor')->num_rows();
		}
		public function selectTopPatient()
		{
			return $this->db->from("tblpatient p")->join("tblcity c","c.cityid=p.cityid")->limit(5)->get()->result();
		}
		public function patientCount()
		{
			return $this->db->get('tblpatient')->num_rows();
		}
		public function selectTopApp()
		{
			return $this->db->select('a.*,d.fullname,p.name,d.profileimage as dp,p.profileimage as pp,c.categoryname,ct.cityname,s.*')->from('tblappointment a')->join('tblslot s','s.slotid=a.slotid')->join('tbldoctor d','d.doctorid=a.doctorid')->join('tblpatient p','p.patientid=a.patientid')->join('tblcategory c','c.categoryid=d.categoryid')->join('tblcity ct','ct.cityid=d.cityid')->limit(5)->get()->result();
		}
		public function AppCount()
		{
			return $this->db->get('tblappointment')->num_rows();
		}
		public function getCaseFiles()
		{
			return $this->db->select('cf.*,d.profileimage as dp,p.profileimage as pp,d.fullname,p.name,c.categoryname')->from('tblcasefile cf')->join('tbldoctor d','d.doctorid=cf.doctorid')->join('tblcategory c','c.categoryid=d.categoryid')->join('tblpatient p','p.patientid=cf.patientid')->get()->result();
		}
		public function selectCaseFile($data)
		{
			return $this->db->get_where('tblcasefile',$data)->result()[0];
		}
	}
?>