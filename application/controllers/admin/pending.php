<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class pending extends CI_Controller
	{
		function __construct()
		{
			parent::__construct();
			$this->load->model("admin/pendingM","pm");
		}

		public function loadPendingLabs()
		{ 
			if($this->session->aid)
			{
				$st=array(
					"u.status"=>-1
				);
				$data=array("labdata"=>$this->pm->selectPendingLabs($st));

				$this->load->view("admin/pending-lab-list",$data);
			}
			else
			{
				redirect('admin/login');
			}
		}
		public function verifyLab($uid)
		{
			$userid=array(
				"userid"=>$uid
			);
			$st=array(
				"status"=>1
			);
			$this->pm->updateStatus($userid,$st);
			redirect('admin/pending/loadPendingLabs');
		}
		public function loadPendingDoctor()
		{ 
			$st=array(
				"u.status"=>-1
			);
			$data=array("doctordata"=>$this->pm->selectPendingDoctor($st));

			$this->load->view("admin/pending-doctor-list",$data);
		}
		public function verifyDoctor($uid)
		{
			$userid=array(
				"userid"=>$uid
			);
			$st=array(
				"status"=>1
			);
			$this->pm->updateStatus($userid,$st);
			redirect('admin/pending/loadPendingDoctor');
		}
	}
?>