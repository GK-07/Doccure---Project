<?php 
	defined('BASEPATH') OR exit('No direct script access allowed');

	class patProfileM extends CI_Model
	{
		public function selectPatientInfo($id)
		{
			return $this->db->from('tblpatient p')->join('tbluser u','u.userid=p.userid')->join('tblcity ct','ct.cityid=p.cityid')->join('tblstate s','s.stateid=ct.stateid')->where($id)->get()->result()[0];
		}
		public function selectState()
		{
			return $this->db->get('tblstate')->result();
		}
		public function selectCity($id)
		{
			return $this->db->get_where('tblcity',$id)->result();
		}
		public function updateProfile($pid,$data)
		{
			$this->db->where($pid)->update('tblpatient',$data);
		}
	}
?>