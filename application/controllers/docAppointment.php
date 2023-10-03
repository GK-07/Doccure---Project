<?php 
	defined('BASEPATH') OR exit('No direct script access allowed');
	require 'src/instamojo.php';
	class docAppointment extends CI_Controller
	{
		function __construct()
		{
			parent::__construct();
			$this->load->model('docAppointmentM','dam');
			$this->load->model('docPatientM','dpm');
			$this->load->library('session'); 
         	$this->load->helper('form'); 
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
		public function index()
		{

			$data=array(
					"ddata"=>$this->dam->selectDoctorInfo(array("d.userid"=>$this->session->uid)),
					"adata"=>$this->dam->selectAppInfo(array("d.userid"=>$this->session->uid,"a.status"=>1)),
					"acount"=>count($this->dam->selectAppInfo(array("d.userid"=>$this->session->uid,"a.status"=>1,"s.date"=>date('Y-m-d')))),
					"pcount"=>count($this->dpm->selectPatientInfo(array('d.userid'=>$this->session->uid)))
			);
			/*echo '<pre>';
			print_r($data); die();*/
			$this->load->view("doctorHome",$data);
		}
		public function loadAppointment()
		{
			if($this->session->uid)
			{	
				$data=array(
					"d.userid"=>$this->session->uid,
					"a.status"=>-1,
					"s.date >="=>date('Y-m-d'),
					/*"a.time >"=>date('H:i:s')*/
				);
				$temp=array(
					"ddata"=>$this->dam->selectDoctorInfo(array("d.userid"=>$this->session->uid)),
					"padata"=>$this->dam->selectPendingApp($data)
				);
				$this->load->view('docAppointments',$temp);
			}
			else
			{
				redirect('login');
			}

		}
		public function changeAppStatus($aid,$status,$slotid)
		{
			$id=array(
				"appointmentid"=>$aid
			);
			$newdata=array(
				"status"=>$status
			);
			$this->dam->updateAppStatus($id,$newdata);
			if($status==1)
			{
				$this->dam->updateSlotAppStatus(array("slotid"=>$slotid),array("appstatus"=>1));
				$this->dam->updateAppStatus(array("status"=>-1,"slotid"=>$slotid),array("status"=>0));

				$pinfo=$this->dam->selectAppInfo(array("a.appointmentid"=>$aid))[0];

				$API_KEY ="ca0fc5891f0edf21582ed9dad1423bba";
				$AUTH_TOKEN = "a75a39e9ceee8330fc39e68cc7559871";

				$api = new Instamojo\Instamojo($API_KEY,$AUTH_TOKEN,'https://www.instamojo.com/api/1.1/');

				try {
        			$response = $api->paymentRequestCreate(array(
			            "purpose" => "Appointment with ".$pinfo->fullname." for ".$pinfo->adesc,
			            "buyer_name" => $pinfo->name,
			            "amount" => "299",
			            "send_email" => true,
			            "phone"=> $pinfo->mobileno,
			            "send_sms"=>true,
			            "email" => $pinfo->emailid,
			            "redirect_url" => "",
			            "allow_repeated_payments"=>false
            		));
            		$this->dam->updateAppStatus(array("appointmentid"=>$aid),array("prequestid"=>$response['id']));
            		$api->__destruct();
    			}
			    catch (Exception $e) {
			        print('Error: ' . $e->getMessage());

			    }
			}
		}
		public function getAppInfo($aid)
		{
			$data=array('a.appointmentid'=>$aid);
			$temp=$this->dam->selectModalApp($data);
			echo json_encode($temp);
		}	
		public function getDiv()
		{
			$data=array(
				"d.userid"=>$this->session->uid,
				"a.status"=>-1,
				"s.date >="=>date('Y-m-d'),
				/*"a.time >"=>date('H:i:s')*/
			);
			$padata=$this->dam->selectPendingApp($data);
				foreach ($padata as $pd) 
				{
				?>
								<!-- Appointment List -->
					<div class="appointment-list">
									<div class="profile-info-widget">
										<a href="patient-profile.html" class="booking-doc-img">
											<img src="<?=base_url('resources/user/images/'.$pd->profileimage)?>" alt="User Image">
										</a>
										<div class="profile-det-info">
											<h3><a href="patient-profile.html"><?=$pd->name?></a></h3>
											<div class="patient-details">
												<h5><i class="far fa-clock"></i> <?=$pd->date?>, <?=$pd->starttime?>-<?=$pd->endtime?></h5>
												<h5><i class="fas fa-map-marker-alt"></i><?=$pd->cityname?></h5>
												<h5><i class="fas fa-envelope"></i><?=$pd->emailid?></h5>
												<h5 class="mb-0"><i class="fas fa-phone"></i>+91 <?=$pd->mobileno?></h5>
											</div>
										</div>
									</div>
									<div class="appointment-action">
										<a href="#" class="btn btn-sm bg-info-light" data-toggle="modal" data-target="#appt_details">
											<i class="far fa-eye"></i> View
										</a>
										<a href="<?=site_url('docAppointment/changeAppStatus/'.$pd->appointmentid)?>" class="btn btn-sm bg-success-light">
											<i class="fas fa-check"></i> Accept
										</a>
										<a href="javascript:void(0);" class="btn btn-sm bg-danger-light">
											<i class="fas fa-times"></i> Cancel
										</a>
									</div>
					</div>
				<?php
				}

		}
		public function createRoom($appid)
		{
			$random_num=random_int(100000,999999);
			$data=array(
				"roomstatus"=>1
			);
			$this->dam->updateRoomStatus($data,array('appointmentid'=>$appid));
			$data1=array(
				"roomcode"=>$random_num,
				"appointmentid"=>$appid
			);
			$this->dam->insertRoom($data1);
			$data2=$this->dam->selectAppInfo(array('appointmentid'=>$appid))[0];
			$from_email = "doccure77@gmail.com"; 
         	$to_email = $data2->emailid;
   
         //Load email library 

	         $this->load->library('email');
	         
	         $this->email->from($from_email, 'Doccure'); 
	         $this->email->to($to_email);
	         $this->email->subject('ROOM CODE'); 
	         $this->email->reply_to(''); 
	         $this->email->message("Hello ! Mr./Ms.".$data2->name.
	         	" roomcode for your appointment with ".$data2->fullname." on ".$data2->date." at ".$data2->time." is ". "<strong><b style='font-size:25px'>$random_num</b></strong>" ." Kindly join meeting at time! Hope You are Doing Well..

	         	-Doccure");
	         $this->email->send();
	         redirect('docAppointment');
		}
	}
?>