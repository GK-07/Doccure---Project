<?php 
	defined('BASEPATH') OR exit('No direct script access allowed');

	class login extends CI_Controller
	{
		function __construct()
		{
			parent::__construct();
			$this->load->model("admin/loginM","lm");
		}
		public function index()
		{
			if($this->session->aid)
			{
				redirect("admin/Home");
			}
			else
			{
				$this->load->view("admin/login");
			}
		}

		public function validateAdminInfo()
		{
			$data=array(
				"username"=>$this->input->post("txtUname"),
				"password"=>$this->input->post("txtPass")
			);	
			$ainfo=$this->lm->selectAdmin($data);
			if(count($ainfo)>0)
			{
				$this->session->set_userdata("aid",$ainfo[0]->adminid);
				$this->session->set_userdata("aname",$ainfo[0]->username);
				$this->session->set_userdata("apropic",$ainfo[0]->profilepic);

				redirect("admin/Home");
			}
			else
			{
				$temp=array("errMsg"=>"*Invalid Username or Password");
				$this->load->view("admin/login",$temp);
				// redirect("admin/login");
			}
		}

		public function logout()
		{
			session_destroy();
			redirect("admin/login");
		}
	}
?>