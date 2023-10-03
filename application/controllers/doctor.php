<?php 
	defined('BASEPATH') OR exit('No direct script access allowed');

	class doctor extends CI_Controller
	{
		function __construct()
		{
			parent::__construct();
			$this->load->library('form_validation');
			$this->load->helper('form');
			$this->load->model('docAppointmentM','dam');
			$this->load->model('doctorM','dm');
		}
		public function loadChangePass()
		{
			if($this->session->uid)
			{
				$data=array(
					"ddata"=>$this->dam->selectDoctorInfo(array("d.userid"=>$this->session->uid))
				);
				$this->load->view('docCpass',$data);
			}
			else
			{
				redirect('login');
			}
		}
		public function checkPassword()
		{
			$oldpass=$this->input->post('txtOpwd');

			$this->form_validation->set_rules('txtOpwd','Old Password','trim|required|callback_edit_pass');
			$this->form_validation->set_rules('txtPwd','Password','trim|required|matches[txtCpwd]|differs[txtOpwd]');
			$this->form_validation->set_rules('txtCpwd','Confirm Password','trim|required|matches[txtPwd]');
			$this->form_validation->set_error_delimiters('<div class="error">','</div>');

			if($this->form_validation->run()==FALSE)
			{
				$data=array(
					"ddata"=>$this->dam->selectDoctorInfo(array("d.userid"=>$this->session->uid))
				);
				$this->load->view('docCpass',$data);
			}
			else
			{
				$uid=array(
					"userid"=>$this->session->uid
				);
				$data=array(
					"password"=>$this->input->post('txtCpwd')
				);
				$this->dm->updatePassword($uid,$data);
				redirect('doctor/loadChangePass');
			}
		}

		public function edit_pass($oldpass)
		{
			$udata=$this->dm->selectUserInfo(array("userid"=>$this->session->uid));
			if($oldpass!=$udata->password)
			{
				$this->form_validation->set_message('edit_pass','Old Password does not match!');
				return false;
			}
			else
			{
				return true;
			}
		}
		public function loadDocMore($did)
		{
			if($this->session->uid)
			{
				$data=array(
					"ddata"=>$this->dam->selectDoctorInfo(array('d.doctorid'=>$did)),
					"cdata"=>$this->dam->selectCertiInfo(array('d.doctorid'=>$did))
				);
				$this->load->view('docMore',$data);
			}
			else
			{
				redirect('login');
			}
		}
		public function loadPatMore($pid)
		{
			if($this->session->uid)
			{
				$data=array(
					"pdata"=>$this->dam->selectPatient(array("p.patientid"=>$pid))
				);
				$this->load->view('patMore',$data);
			}
			else
			{
				redirect('login');
			}
		}
		public function loadLabMore($lid)
		{
			if($this->session->uid)
			{
				$data=array(
					"ldata"=>$this->dam->selectLab(array("l.laboratoryid"=>$lid))
				);
				$this->load->view('labMore',$data);
			}
			else
			{
				redirect('login');
			}
		}
	}
?>