<?php 
	defined('BASEPATH') OR exit('No direct script access allowed');

	class docHome extends CI_Controller
	{
		function __construct()
		{
			parent::__construct();
			$this->load->model('docAppointmentM','dam');
			$this->load->model('doctorM','dm');
		}
		public function index()
		{
			if($this->session->uid)
			{
				redirect('docAppointment');
			}
			else
			{
				redirect("login");
			}
		}
		public function loadAboutUs()
		{
			$this->load->view('aboutus.php');
		}
		public function loadContactUs()
		{
			$this->load->view('contactus.php');
		}
		public function loadSocial()
		{
			if($this->session->uid)
			{
				$did=$this->dam->selectDoctorInfo(array('d.userid'=>$this->session->uid))->doctorid;
				$data=array(
					"ddata"=>$this->dam->selectDoctorInfo(array("d.userid"=>$this->session->uid)),
					"sdata"=>$this->dm->selectSocial(array("doctorid"=>$did))
				);
				if(count($data["sdata"])>0)
				{
					$this->load->view('usocialMedia',$data);
				}
				else
				{
					$this->load->view('socialMedia',$data);
				}
			}
			else
			{
				redirect('login');
			}
		}
		public function addSocial()
		{
			$did=$this->dam->selectDoctorInfo(array('d.userid'=>$this->session->uid))->doctorid;

			$data=array(
					"twitter"=>$this->input->post('txtTwitter'),
					"facebook"=>$this->input->post('txtFacebook'),
					"instagram"=>$this->input->post('txtInsta'),
					"doctorid"=>$did
			);
			$this->dm->insertSocial($data);
			redirect('docHome/loadSocial');
		}
		public function editSocial()
		{
			$did=$this->dam->selectDoctorInfo(array('d.userid'=>$this->session->uid))->doctorid;
			$data=array(
					"twitter"=>$this->input->post('txtTwitter'),
					"facebook"=>$this->input->post('txtFacebook'),
					"instagram"=>$this->input->post('txtInsta'),
					
			);
			$id=array(
				"doctorid"=>$did
			);
			$this->dm->updateSocial($id,$data);	
			redirect('docHome/loadSocial');					
		}
	}
?>