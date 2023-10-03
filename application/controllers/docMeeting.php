<?php 
	defined('BASEPATH') OR exit('No direct script access allowed');

	class docMeeting extends CI_Controller
	{
		function __construct()
		{
			parent::__construct();
			$this->load->model('docMeetingM','dmm');
			$this->load->model('docAppointmentM','dam');
		}
		public function loadMeeting()
		{
			if($this->session->uid)
			{
				$data=array(
					"ddata"=>$this->dam->selectDoctorInfo(array("d.userid"=>$this->session->uid)),
					"mdata"=>$this->dmm->selectMeeting(array("a.doctorid"=>$this->dam->selectDoctorInfo(array("d.userid"=>$this->session->uid))->doctorid))
				);
				$this->load->view('docMeetingV',$data);
			}
		}
		public function loadVideoCall($mid)
		{
			if($this->session->uid)
			{
				$data=array(
					"mdata"=>$this->dmm->selectMeeting(array("r.roomid"=>$mid))[0]
				);
				$this->load->view('docVideoCall',$data);
			}
		}
	}
?>