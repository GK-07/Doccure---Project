<?php 
	defined('BASEPATH') OR exit('No direct script access allowed');

	class ForgotPass extends CI_Controller
	{
		function __construct()
		{
			parent::__construct();
			$this->load->model('forgotPassM','fm');
			$this->load->helper('form'); 
			$this->load->library('form_validation');
          	$this->load->library('email');
	         $config = array();
	         $config['protocol'] = 'smtp';
	         $config['smtp_host'] = 'smtp.gmail.com';
	         $config['smtp_user'] = 'doccure77@gmail.com';
	         $config['smtp_pass'] = 'Kashyapsopari.456';
	         $config['smtp_port'] = 465;
	         $config['mailtype'] = 'html';
	         $config['smtp_crypto'] = 'ssl';
	         $config['wordwrap'] = true;

	         $this->email->initialize($config);
	         $this->email->set_newline("\r\n");
		}
		public function loadRegEmail()
		{
			$this->load->view('regEmail');
		}
		public function sendEmail()
		{
			$user=$this->input->post('txtUtype');
			$random_num=random_int(100000,999999);
			if($user=='doc')
			{
				$data=array(
					"emailid"=>$this->input->post('txtEmail')
				);
				$data2=$this->fm->selectDoctor($data);
				if(count($data2)>0)
				{
					$from_email = "doccure77@gmail.com"; 
		         	$to_email = $data2[0]->emailid;
		         	$name=$data2[0]->fullname;
		         	$uname=$data2[0]->username;
					$this->session->set_userdata('otp',$random_num);
					$this->session->set_userdata('userid',$data2[0]->userid);
					$this->sendMail($from_email,$to_email,$name,$random_num,$uname);
				}
				else
				{
					$d=array("error"=>"Account with this Email Address is Not Found");
					$this->load->view('regEmail',$d);
				}
	        }
	        elseif($user=='pat')
			{
				$data=array(
					"emailid"=>$this->input->post('txtEmail')
				);
				$data2=$this->fm->selectPatient($data);
				if(count($data2)>0)
				{
					$from_email = "doccure77@gmail.com"; 
		         	$to_email = $data2[0]->emailid;
		         	$name=$data2[0]->name;
		         	$uname=$data2[0]->username;
					$this->session->set_userdata('otp',$random_num);
					$this->session->set_userdata('userid',$data2[0]->userid);
					$this->sendMail($from_email,$to_email,$name,$random_num,$uname);
				}
				else
				{
					$d=array("error"=>"Account with this Email Address is Not Found");
					$this->load->view('regEmail',$d);
				}
	        }
	        elseif($user=='lab')
			{
				$data=array(
					"emailid"=>$this->input->post('txtEmail')
				);
				$data2=$this->fm->selectLab($data);
				if(count($data2)>0)
				{
					$from_email = "doccure77@gmail.com"; 
		         	$to_email = $data2[0]->emailid;
		         	$name=$data2[0]->name;
		         	$uname=$data2[0]->username;
					$this->session->set_userdata('otp',$random_num);
					$this->session->set_userdata('userid',$data2[0]->userid);
					$this->sendMail($from_email,$to_email,$name,$random_num,$uname);
				}
				else
				{
					$d=array("error"=>"Account with this Email Address is Not Found");
					$this->load->view('regEmail',$d);
				}
	        }
		}
		public function sendMail($from_email,$to_email,$name,$random_num,$uname)
		{
				$this->load->library('email');
		         
		         $this->email->from($from_email, 'Doccure'); 
		         $this->email->to($to_email);
		         $this->email->subject('Forgot Password OTP'); 
		         $this->email->reply_to(''); 
		         $this->email->message("Hello ! Mr./Ms.".$name.
		         	" One Time Password for username "."<b>$uname</b>"." is "."<strong><b style='font-size:25px'>$random_num</b></strong>" ."<br>"."Hope You are Doing Well.."."<br>"."

		         	-Doccure");
		         $this->email->send();
		         $this->load->view('enterotp');

		}
		public function loadNewPass()
		{
			$this->load->view('ForgotPassV');	
		}
		public function changePassword()
		{
			$this->fm->updatePassword(array("userid"=>$this->session->userid),array("password"=>$this->input->post('txtPwd')));
			session_destroy();
			redirect('login');
		}
	}
?>