<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class city extends CI_Controller
	{
		function __construct()
		{
			parent::__construct();
			$this->load->model("admin/cityM","cm");
		}

		public function loadCity($sid)
		{ 
			if($this->session->aid)
			{
				$stid=array(
					"stateid"=>$sid
				);
				$data=array("cdata"=>$this->cm->selectCity($stid));
				$this->load->view("admin/city-list",$data);
			}
			else
			{
				redirect('admin/login');
			}

		}
		public function editStatus($status,$cid)
		{
				$cid=array("cityid"=>$cid);
				$st=array("status"=>$status);
				$this->cm->updateStatus($cid,$st);
				redirect('admin/loadCity');
		}
		public function enableAll($stid)
		{
			$sid=array("stateid"=>$stid);
			$st=array("status"=>1);
			$this->cm->enableAllCity($sid,$st);
		}
		public function addCity()
		{
			$data=array(
				'stateid'=>$this->input->post('txtSid'),
				'cityname'=>$this->input->post('txtCity'),
				'status'=>1
			);
			$this->cm->insertCity($data);
			redirect('admin/city/loadCity/'.$this->input->post('txtSid'));
		}
	}
?>