<?php 
	defined('BASEPATH') OR exit('No direct script access allowed');

	class docReviews extends CI_Controller
	{
		function __construct()
		{
			parent::__construct();
			$this->load->model('docReviewsM','drm');
			$this->load->model('docAppointmentM','dam');
		}
		public function getDocReviews()
		{
			if($this->session->uid)
			{
				$data=array(
					"ddata"=>$this->dam->selectDoctorInfo(array("d.userid"=>$this->session->uid)),
					"drdata"=>$this->drm->selectDocReviews(array("d.userid"=>$this->session->uid))
				);
				$this->load->view('docReviewsV',$data);
			}
			else
			{
				redirect('login');
			}
		}
	}
?>