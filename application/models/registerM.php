<?php 
	defined('BASEPATH') OR exit('No direct script access allowed');

	class registerM extends CI_Model
	{
		public function selectState()
		{
			return $this->db->get('tblstate')->result();
		}
		public function selectCity($id)
		{
			return $this->db->get_where('tblcity',$id)->result();
		}
		public function selectCategory()
		{
			return $this->db->get('tblcategory')->result();
		}
		public function insertUser($user)
		{
			$this->db->insert('tbluser',$user);
			return $this->db->insert_id();
		}
		public function insertPatient($pat)
		{
			$this->db->insert('tblpatient',$pat);
		}
		public function insertDoctor($doc)
		{
			$this->db->insert('tbldoctor',$doc);
		}
		public function insertDoctorCertificate($dcerti)
		{
			$this->db->insert('tbldoctorcertificates',$dcerti);

		}
		public function selectCertificate()
		{
			return $this->db->get('tblcertificate')->result();
		}
		public function getLastDocId()
		{
			return $this->db->select('doctorid')->from('tbldoctor')->order_by('doctorid','DESC')->limit(1)->get()->result()[0];
		}
		public function insertLaboratory($lab)
		{
			$this->db->insert('tbllaboratory',$lab);
		}
	}
?>