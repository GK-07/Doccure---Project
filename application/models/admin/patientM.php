<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class patientM extends CI_Model
	{
		public function selectPatient()
		{
			return $this->db->from("tblpatient p")->join("tblcity c","p.cityid=c.cityid")->join('tbluser u','u.userid=p.userid')->get()->result();
		}

		public function selectPatientById($data)
		{
				return $this->db->select("p.*,u.username,c.*")->from("tblpatient p")->join("tblcity c","p.cityid=c.cityid")->join("tbluser u","u.userid=p.userid")->where($data)->get()->result()[0];
		}
		public function updateStatus($uid,$st)
		{
			$this->db->where($uid)->update("tbluser",$st);
		}
	}
?>
