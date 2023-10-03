<?php 
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Home extends CI_Controller
	{
		function __construct()
		{
			parent::__construct();
			$this->load->model("admin/adminM","am");
		} 

		public function index()
		{
			if($this->session->aid)
			{
				$data=array(
					"ddata"=>$this->am->selectTopDoc(),
					"dcount"=>$this->am->docCount(),
					"pdata"=>$this->am->selectTopPatient(),
					"pcount"=>$this->am->PatientCount(),
					"adata"=>$this->am->selectTopApp(),
					"acount"=>$this->am->AppCount()		
				);
				$this->load->view("admin/index",$data);
			}
			else
			{
				redirect("admin/login");
			}
		}
		public function loadAdmin()
		{
			if($this->session->aid)
			{
				$data=array("admindata"=>$this->am->selectAdmin());
				$this->load->view('admin/adminV',$data);
			}
			else
			{
				redirect('admin/login');
			}
		}
		public function loadAddAdmin()
		{
			if($this->session->aid)
			{
				$this->load->view("admin/addAdmin");
			}
			else
			{
				redirect('admin/login');
			}
		}

		public function addAdmin()
		{
			if($this->input->post("txtPass")===$this->input->post("txtCpass"))
			{
				$data=array(
						"username"=>$this->input->post("txtAname"),
						"emailid"=>$this->input->post("txtEmail"),
						"mobileno"=>$this->input->post("txtMno"),
						"password"=>$this->input->post("txtPass"),
						"addedbyid"=>$this->session->aid
						);
				$this->am->insertAdmin($data);
				redirect("admin/Home");
			}
			else
			{
				$temp=array("errMsg"=>"*Password and Confirm Password does not Match");
				$this->load->view("admin/addAdmin",$temp);
			}

		}
		public function getAllCaseFiles()
		{
			if($this->session->aid)
			{
				$data=array(
					"casefiles"=>$this->am->getCaseFiles()
				);
				$this->load->view('admin/caseFiles',$data);
			}
			else
			{
				redirect('admin/login');
			}
		}
		public function openCaseFile($caseFileId)
		{
			if($this->session->aid)
			{
				$data=array(
					"casefile"=>$this->am->selectCaseFile(array('casefileid'=>$caseFileId))
				);
				$this->load->view('admin/openCaseFile',$data);
			}
			else
			{
				redirect('admin/login');
			}
		}
		
	}
?>