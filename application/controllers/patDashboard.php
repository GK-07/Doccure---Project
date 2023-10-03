<?php 
	defined('BASEPATH') OR exit('No direct script access allowed');

	class patDashboard extends CI_Controller
	{
		function __construct()
		{
			parent::__construct();
			$this->load->library('form_validation');
			$this->load->helper('form');
			$this->load->model('patDashboardM','pm');
		}
		public function loadPatDashboard()
		{
			if($this->session->uid)
			{
				$data=array(
						"pdata"=>$this->pm->selectPatientInfo(array("p.userid"=>$this->session->uid)),
						"adata"=>$this->pm->selectAppointment(array("p.userid"=>$this->session->uid)),
						"casefiles"=>$this->pm->selectCaseFiles(array("p.userid"=>$this->session->uid)),
						"labpred"=>$this->pm->selectLabPre(array("p.userid"=>$this->session->uid)),
						"upreport"=>$this->pm->uploadedReport(array("p.userid"=>$this->session->uid)),
						"upreport1"=>$this->pm->uploadedReport1(array("p.userid"=>$this->session->uid,
						"ur.laboratoryid"=>0))
				);
				/*echo "<pre>";
				print_r($data); die();*/
				$this->load->view('patient-dashboard',$data);
			}
			else
			{
				redirect('login');
			}
		}
		public function getAppInfo($aid)
		{
			$data=array('appointmentid'=>$aid);
			$temp=$this->pm->selectModalApp($data);
			echo json_encode($temp);
		}
		public function loadChangePass()
		{
			if($this->session->uid)
			{
				$data=array(
					"pdata"=>$this->pm->selectPatientInfo(array("p.userid"=>$this->session->uid))
				);
				$this->load->view('patCpass',$data);
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
					"pdata"=>$this->pm->selectPatientInfo(array("p.userid"=>$this->session->uid))
				);
				$this->load->view('patCpass',$data);
			}
			else
			{
				$uid=array(
					"userid"=>$this->session->uid
				);
				$data=array(
					"password"=>$this->input->post('txtCpwd')
				);
				$this->pm->updatePassword($uid,$data);
				redirect('patDashboard/loadChangePass');
			}
		}

		public function edit_pass($oldpass)
		{
			$udata=$this->pm->selectUserInfo(array("userid"=>$this->session->uid));
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
		public function uploadReport()
		{  
			$img=$_FILES['txtPdf']['name'];
			move_uploaded_file($_FILES['txtPdf']['tmp_name'], "C:/xampp/htdocs/doccure/resources/user/pdf/".$img);
            $data=array(
            	"labpreid"=>$this->input->post('txtLpid'),
            	"reporturl"=>$img
            );
            $this->pm->insertReport($data);
            redirect('patDashboard/loadPatDashboard');
		}
		public function loadLabList($lid)
		{
			if($this->session->uid)
			{
				$data=array(
						"ldata"=>$this->pm->selectLabInfo(),
						"cdata"=>$this->pm->selectCity(),
						"labpreid"=>$lid
				);
				$this->load->view('labList',$data);
			}
			else
			{
				redirect('login');
			}
		}
		public function searchCity()
		{
			$ldata=$this->pm->getCity(array("l.cityid"=>$this->input->post('txtCity')));

			foreach($ldata as $l){ ?>
							<div class="card">
								<div class="card-body">
									<div class="doctor-widget">
										<div class="doc-info-left">
											<div class="doctor-img">
												<a href="doctor-profile.html">
													<img src="<?=base_url('resources/shared/lab/'.$l->profileimage)?>" class="img-fluid" alt="User Image">
												</a>
											</div>
											<div class="doc-info-cont">
												<h4 class="doc-name"><a href="doctor-profile.html"><?=$l->name?></a></h4>
												<p class="doc-speciality">Pathology</p>
												<p class="doc-speciality">+91 <?=$l->contactno?></p>
												<div class="clinic-details">
													<p class="doc-location"><i class="fas fa-map-marker-alt"></i> <?=$l->cityname?>, <?=$l->statename?></p>
													<ul class="clinic-gallery">
														<li>
															<a href="#" data-fancybox="gallery">
																<img src="<?=base_url('resources/user/')?>assets/img/features/feature-01.jpg" alt="Feature">
															</a>
														</li>
														<li>
															<a href="#" data-fancybox="gallery">
																<img  src="<?=base_url('resources/user/')?>assets/img/features/feature-02.jpg" alt="Feature">
															</a>
														</li>
														<li>
															<a href="#" data-fancybox="gallery">
																<img src="<?=base_url('resources/user/')?>assets/img/features/feature-03.jpg" alt="Feature">
															</a>
														</li>
														<li>
															<a href="#" data-fancybox="gallery">
																<img src="<?=base_url('resources/user/')?>assets/img/features/feature-04.jpg" alt="Feature">
															</a>
														</li>
													</ul>
												</div>
												<div class="clinic-services">
													<span><?=$l->address?></span>
												</div>
											</div>
										</div>
										<div class="doc-info-right">
											<div class="clini-infos">
												<ul>
													<li><i class="fas fa-map-marker-alt"></i> <span id="ct"><?=$l->cityname?></span>,<span> <?=$l->statename?></span></li>
													<li><i class="far fa-money-bill-alt"></i> &#8377; As Per Report <i class="fas fa-info-circle" data-toggle="tooltip" title="Report Fees"></i> </li>
												</ul>
											</div>
											<div class="clinic-booking">
												<a class="view-pro-btn" id="grep" data-target="#srep" data-toggle="modal" laboratoryid="<?=$l->laboratoryid?>">Get Report</a>
											</div><br>
											<div class="clinic-booking">
												<a class="apt-btn" href="<?=site_url('patDoctor/loadReport1/'.$l->laboratoryid)?>" style="background-color: red;border-color: red;">Report</a>
											</div>
										</div>
									</div>
								</div>
							</div>
							<?php }
		}
		public function uploadPre()
		{ 
            $data=array(
            	"labpreid"=>$this->input->post('txtLpid'),
            	"laboratoryid"=>$this->input->post('txtlid')     
            );
            $lpid=array("labpreid"=>$this->input->post('txtLpid'));
            $temp=array(
            		"uploadstatus"=>1
            );
           	/*print_r($temp); print_r($lpid); die();*/
            $this->pm->insertPre($data);
            $this->pm->updateStatus($lpid,$temp);
            redirect('patDashboard/loadPatDashboard');
		}
		public function loadLabMore($labid)
		{
			$data=array(
				"ldata"=>$this->pm->getLab(array('l.laboratoryid'=>$labid))
			);
			/*print_r($data); die();*/
			$this->load->view('labMore',$data);
		}
	}
?>
