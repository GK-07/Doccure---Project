<?php 
	defined('BASEPATH') OR exit('No direct script access allowed');

	class labProfileM extends CI_Model
	{
		public function selectLabInfo($id)
		{
			return $this->db->from('tbllaboratory l')->join('tbluser u','u.userid=l.userid')->join('tblcity ct','ct.cityid=l.cityid')->join('tblstate s','s.stateid=ct.stateid')->where($id)->get()->result()[0];
		}
		public function selectState()
		{
			return $this->db->get('tblstate')->result();
		}
		public function selectCity($id)
		{
			return $this->db->get_where('tblcity',$id)->result();
		}
		public function updateProfile($lid,$data)
		{
			$this->db->where($lid)->update('tbllaboratory',$data);
		}
	}
?>