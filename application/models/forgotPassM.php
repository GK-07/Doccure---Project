<?php 
	defined('BASEPATH') OR exit('No direct script access allowed');

	class forgotPassM extends CI_Model
	{
		public function selectDoctor($data)
		{
			return $this->db->from('tbldoctor d')->join('tbluser u','u.userid=d.userid')->where($data)->get()->result();
		}
		public function selectPatient($data)
		{
			return $this->db->from('tblpatient p')->join('tbluser u','u.userid=p.userid')->where($data)->get()->result();
		}
		public function selectLab($data)
		{
			return $this->db->from('tbllaboratory l')->join('tbluser u','u.userid=l.userid')->where($data)->get()->result();
		}
		public function updatePassword($id,$data)
		{
			$this->db->where($id)->update('tbluser',$data);
		}
	}
?>