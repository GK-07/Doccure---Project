<?php 
	defined('BASEPATH') OR exit('No direct script access allowed');

	class patMeeting extends CI_Controller
	{
		function __construct()
		{
			parent::__construct();
			$this->load->model('patMeetingM','pmm');
			$this->load->model('patDashboardM','pm');
		}
		public function loadMeeting()
		{
			if($this->session->uid)
			{
				$data=array(
					"pdata"=>$this->pm->selectPatientInfo(array("p.userid"=>$this->session->uid)),
					"mdata"=>$this->pmm->selectMeeting(array("a.patientid"=>$this->pm->selectPatientInfo(array("p.userid"=>$this->session->uid))->patientid))
				);
				$this->load->view('patMeetingV',$data);
			}
			else
			{
				redirect('login');
			}
		}
		public function loadVideoCall($mid)
		{
			if($this->session->uid)
			{
				$data=array(
					"mdata"=>$this->pmm->selectMeeting(array("r.roomid"=>$mid))[0]
				);
				$this->load->view('patVideoCall',$data);
			}
			else
			{
				redirect('login');
			}
		}
		public function loadRoom($rid)
		{
			if($this->session->uid)
			{
				$data=array(
					"pdata"=>$this->pm->selectPatientInfo(array("p.userid"=>$this->session->uid)),
					"mdata"=>$this->pmm->selectMeeting(array("r.roomid"=>$rid))[0]
				);	
				/*echo "<pre>";
				print_r($data); die();*/
				$this->load->view('patRoom',$data);
			}
			else
			{
				redirect('login');
			}
		}
	}
?>