<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class state extends CI_Controller
	{
		function __construct()
		{
			parent::__construct();
			$this->load->model("admin/stateM","sm");
		}

		public function loadState()
		{
			if($this->session->aid)
			{
				$data=array("sdata"=>$this->sm->selectState());
				$this->load->view("admin/state-list",$data);
			}
			else
			{
				redirect('admin/login');
			}
		}
		public function editStatus($status,$sid)
		{
				$sid=array("stateid"=>$sid);
				$st=array("status"=>$status);
				$this->sm->updateStatus($sid,$st);
		}
		public function addState()
		{
			$data=array(
				"statename"=>$this->input->post('txtState'),
				"status"=>1
			);
			$this->sm->insertState($data);
			redirect('admin/state/loadState');
		}
	}
?>