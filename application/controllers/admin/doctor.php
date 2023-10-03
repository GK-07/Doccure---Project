<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class doctor extends CI_Controller
	{
		function __construct()
		{
			parent::__construct();
			$this->load->model("admin/doctorM","dm");
		}

		public function loadDoctor()
		{ 
			if($this->session->aid)
			{	
				$data=array("doctordata"=>$this->dm->selectDoctor());
				$this->load->view("admin/doctor-list",$data);
			}
			else
			{
				redirect('admin/login');
			}
		}

		public function loadDoctorMore($id)
		{
			if($this->session->aid)
			{
				$did=array("d.doctorid"=>$id);
				$data=array(
						"ddata"=>$this->dm->selectDoctorById($did),	
						"cdata"=>$this->dm->selectDoctorCerti($did)
				);
				$this->load->view("admin/doctorMore",$data);
			}
			else
			{
				redirect('admin/login');
			}
		}
		public function editStatus($status,$uid)
		{
			$uid=array("userid"=>$uid);
			$st=array("status"=>$status);
			$this->dm->updateStatus($uid,$st);
			redirect('admin/loadDoctor');
		}
	}
?> 

