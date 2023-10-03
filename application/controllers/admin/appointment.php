<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class appointment extends CI_Controller
	{
		function __construct()
		{
			parent::__construct();
			$this->load->model("admin/appointmentM","am");
		}

		public function loadAppointment()
		{ 
			if($this->session->aid)
			{
				$data=array("adata"=>$this->am->selectAppointment());
				$this->load->view("admin/appointment-list",$data);
			}
			else
			{
				redirect('admin/login');
			}
		}

		public function removeAppointment()
		{
			$data=array("appointmentid"=>$this->input->post('txtAid'));
			$this->am->deleteAppointment($data);
			redirect('admin/appointment/loadAppointment');
		}
	}
?> 

