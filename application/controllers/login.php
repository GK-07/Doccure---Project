<?php 
	defined('BASEPATH') OR exit('No direct script access allowed');

	class login extends CI_Controller
	{
		function __construct()
		{
			parent::__construct();
			$this->load->model('loginM','lm');
		}
		public function index()
		{
			if($this->session->uid)
			{

				$res=$this->lm->selectLoginInfo(array('userid'=>$this->session->uid));
				if($res[0]->usertype==="doc")
				{
					redirect('docHome');
				}
				elseif($res[0]->usertype==="pat")
				{
					redirect('patHome');
				}
				elseif($res[0]->usertype==="lab");
				{
					redirect('labHome/loadLabHome');
				}
			}
			else
			{
				$this->load->view('loginV');
			}

		}
		public function validateLogin()
		{
			$data=array(
				"username"=>$this->input->post('txtUname'),	
				"password"=>$this->input->post('txtPass')
			);

			$res=$this->lm->selectLoginInfo($data);

			if(count($res)>0)
			{
				if($res[0]->status==1)
				{
					$uid=array(
						"userid"=>$res[0]->userid
					);
					$propic=$this->lm->selectProPic($uid,$res[0]->usertype)->profileimage;

					$this->session->set_userdata('uid',$res[0]->userid);
					$this->session->set_userdata('uname',$res[0]->username);
					$this->session->set_userdata('propic',$propic);
					$this->session->set_userdata('utype',$res[0]->usertype);

					if($res[0]->usertype==="doc")
					{
						redirect('docHome');
					}
					elseif($res[0]->usertype==="pat")
					{
						redirect('patHome');
					}
					elseif($res[0]->usertype==="lab")
					{
						redirect('labHome/loadLabHome');
					}
				}
				elseif($res[0]->status==0)
				{
					$error=array(
					"errMsg"=>"*You are temporarily BLOCKED!"
					);
					$this->load->view('loginV',$error);
				}
				else
				{
					$error=array(
					"errMsg"=>"*You are not verified yet!"
					);
					$this->load->view('loginV',$error);	
				}
			}			
			else
			{
				$error=array(
					"errMsg"=>"*Invalid Username or Password"
				);
				$this->load->view('loginV',$error);
			}

		}
		public function logout()
		{
			session_destroy();
			redirect("login");
		}
	}
?>