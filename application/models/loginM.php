<?php 
	defined('BASEPATH') OR exit('No direct script access allowed');

	class loginM extends CI_Model
	{
		public function selectLoginInfo($data)
		{
			return $this->db->get_where('tbluser',$data)->result();
		}
		public function selectProPic($uid,$utype)
		{
			if($utype==="doc")
			{
				return $this->db->select('profileimage')->from('tbldoctor')->where($uid)->get()->result()[0];
			}
			elseif($utype==="pat") 
			{
				return $this->db->select('profileimage')->from('tblpatient')->where($uid)->get()->result()[0];
			}
			else
			{
				return $this->db->select('profileimage')->from('tbllaboratory')->where($uid)->get()->result()[0];
			}
		}
	}
?>