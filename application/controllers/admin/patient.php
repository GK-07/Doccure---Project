<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class patient extends CI_Controller
	{
		function __construct()
		{
			parent::__construct();
			$this->load->model("admin/patientM","pm");
		}

		public function loadPatient()
		{ 
			if($this->session->aid)
			{
				$data=array("patientdata"=>$this->pm->selectPatient());
				$this->load->view("admin/patient-list",$data);
			}
			else
			{
				redirect('admin/login');
			}
		}

		public function loadPatientMore($id)
		{
			if($this->session->aid)
			{
				$pid=array("p.patientid"=>$id);
				$data=array(
						"pdata"=>$this->pm->selectPatientById($pid)
				);
				$this->load->view("admin/PatientMore",$data);
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
			$this->pm->updateStatus($uid,$st);
			redirect('admin/loadPatient');
		}
	}
?>
