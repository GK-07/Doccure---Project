<?php 
	defined('BASEPATH') OR exit('No direct script access allowed');

	class patDoctor extends CI_Controller
	{
		public function __construct()
		{
			parent::__construct();
			$this->load->model('patDoctorM','pdm');
		}
		public function index()
		{
			if($this->session->uid)
			{
				$data=array(
					"ddata"=>$this->pdm->selectDoctors(),
					"cdata"=>$this->pdm->getCategories()
				);
				/*echo "<pre>";
				print_r($data);
				die();*/
				$this->load->view('patDoctorV',$data);
			}
			else
			{
				redirect('login');
			}
		}

		public function filterData()
		{
			$category=$this->input->post('txtCat');
			$gender=$this->input->post('txtGen');
			$ddata=$this->pdm->getFilterData($gender,$category);
						foreach($ddata as $d){?>
							<!-- Doctor Widget -->
							<div class="card">
								<div class="card-body">
									<div class="doctor-widget">
										<div class="doc-info-left">
											<div class="doctor-img">
												<a href="<?=site_url('patDoctor/loadDoctorProfile/'.$d->doctorid)?>">
													<img src="<?=base_url('resources/shared/doctor/'.$d->profileimage)?>" class="img-fluid" alt="User Image">
												</a>
											</div>
											<div class="doc-info-cont">
													<h4 class="doc-name"><a href="<?=site_url('patDoctor/loadDoctorProfile/'.$d->doctorid)?>"><?=$d->fullname?></a></h4>
													<p class="doc-speciality"><?=$d->gender?></p>
													<h5 class="doc-department"><img src="<?=base_url('resources/admin/assets/img/specialities/'.$d->cimage)?>" class="img-fluid" alt="Speciality"><?=$d->categoryname?></h5>
													<?php if($d->rcount!=0){?>
													<div class="rating">
														<?php $rper=(floatval($d->avgReview)*100)/5;?>
														<div style="margin-top: 10px">
													            <div class="result-container">
													                <div class="rate-bg" style="width:<?=$rper?>%"></div>
													                <div class="rate-stars"></div>
													            </div>
													            <span class="d-inline-block average-rating">(<?=floatval($d->avgReview)?>)</span>
													    </div>
													    <p>Total Reviews : <?=$d->rcount?></p>
													</div>
												<?php } else {?>
													<div class="rating">
														<div style="margin-top: 10px">
													            <div class="result-container">
													                <div class="rate-bg" style="width:0%"></div>
													                <div class="rate-stars"></div>
													            </div>
													            <span class="d-inline-block average-rating">(0)</span>
													    </div>
													    <p>Total Reviews : <?=$d->rcount?></p>
													</div>
												<?php }?>
													<div class="clinic-details">
														<p class="doc-location"><i class="fas fa-map-marker-alt"></i> <?=$d->cityname?>, <?=$d->statename?></p>
													</div>
													<div class="clinic-services">
														<span><?=$d->description?></span>
													</div>
												</div>
											</div>
											<div class="doc-info-right">
												<div class="clini-infos">
													<ul>
														<li><i class="far fa-comment"></i> <?=$d->rcount?> Feedback</li>
														<li><i class="fas fa-map-marker-alt"></i><?=$d->cityname?>, <?=$d->statename?></li>
														<li><i class="far fa-money-bill-alt"></i> &#8377;299 <i class="fas fa-info-circle" data-toggle="tooltip" title="Apoointment Fees"></i> </li>
													</ul>
												</div>
												<div class="clinic-booking">
													<a class="view-pro-btn" href="<?=site_url('patDoctor/loadDoctorProfile/'.$d->doctorid)?>">View Profile</a>
													<a class="apt-btn" href="<?=site_url('patDoctor/loadDoctorBooking/'.$d->doctorid)?>">Book Appointment</a>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						<?php }
		}
		public function filterData2($val)
		{
			if($val==1)
			{
				$ddata=$this->pdm->selectDoctors();
			}
			elseif ($val==2) 
			{
				$ddata=$this->pdm->selectDoctorsByPop();	
			}
			elseif ($val==3) {
				$ddata=$this->pdm->selectDoctorsByLatest();				
			}
			foreach($ddata as $d){?>
							<!-- Doctor Widget -->
							<div class="card">
								<div class="card-body">
									<div class="doctor-widget">
										<div class="doc-info-left">
											<div class="doctor-img">
												<a href="<?=site_url('patDoctor/loadDoctorProfile/'.$d->doctorid)?>">
													<img src="<?=base_url('resources/shared/doctor/'.$d->profileimage)?>" class="img-fluid" alt="User Image">
												</a>
											</div>
											<div class="doc-info-cont">
													<h4 class="doc-name"><a href="<?=site_url('patDoctor/loadDoctorProfile/'.$d->doctorid)?>"><?=$d->fullname?></a></h4>
													<p class="doc-speciality"><?=$d->gender?></p>
													<h5 class="doc-department"><img src="<?=base_url('resources/admin/assets/img/specialities/'.$d->cimage)?>" class="img-fluid" alt="Speciality"><?=$d->categoryname?></h5>
													<?php if($d->rcount!=0){?>
													<div class="rating">
														<?php $rper=(floatval($d->avgReview)*100)/5;?>
														<div style="margin-top: 10px">
													            <div class="result-container">
													                <div class="rate-bg" style="width:<?=$rper?>%"></div>
													                <div class="rate-stars"></div>
													            </div>
													            <span class="d-inline-block average-rating">(<?=floatval($d->avgReview)?>)</span>
													    </div>
													    <p>Total Reviews : <?=$d->rcount?></p>
													</div>
												<?php } else {?>
													<div class="rating">
														<div style="margin-top: 10px">
													            <div class="result-container">
													                <div class="rate-bg" style="width:0%"></div>
													                <div class="rate-stars"></div>
													            </div>
													            <span class="d-inline-block average-rating">(0)</span>
													    </div>
													    <p>Total Reviews : <?=$d->rcount?></p>
													</div>
												<?php }?>
													<div class="clinic-details">
														<p class="doc-location"><i class="fas fa-map-marker-alt"></i> <?=$d->cityname?>, <?=$d->statename?></p>
													</div>
													<div class="clinic-services">
														<span><?=$d->description?></span>
													</div>
												</div>
											</div>
											<div class="doc-info-right">
												<div class="clini-infos">
													<ul>
														<li><i class="far fa-comment"></i> <?=$d->rcount?> Feedback</li>
														<li><i class="fas fa-map-marker-alt"></i><?=$d->cityname?>, <?=$d->statename?></li>
														<li><i class="far fa-money-bill-alt"></i> &#8377;299 <i class="fas fa-info-circle" data-toggle="tooltip" title="Apoointment Fees"></i> </li>
													</ul>
												</div>
												<div class="clinic-booking">
													<a class="view-pro-btn" href="<?=site_url('patDoctor/loadDoctorProfile/'.$d->doctorid)?>">View Profile</a>
													<a class="apt-btn" href="<?=site_url('patDoctor/loadDoctorBooking/'.$d->doctorid)?>">Book Appointment</a>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						<?php }
		}
		public function loadDoctorProfile($doctorid,$clickid="overview")
		{
			if($this->session->uid)
			{
				$patientid=$this->pdm->getpatient(array('userid'=>$this->session->uid))->patientid;
				$data=array(
					"ddata"=>$this->pdm->getDoctor(array('d.doctorid'=>$doctorid)),
					"social"=>$this->pdm->getDoctorSocial(array('doctorid'=>$doctorid)),
					"certificate"=>$this->pdm->getCertificate(array('dc.doctorid'=>$doctorid)),
					"reviews"=>$this->pdm->getReviews(array('dr.doctorid'=>$doctorid)),
					"preview"=>$this->pdm->getReviews(array('dr.patientid'=>$patientid,'dr.doctorid'=>$doctorid)),
					"clickid"=>$clickid
				);
	/*			echo "<pre>";
				print_r($data); die();*/
				$this->load->view('patDocProfile.php',$data);
			}
			else
			{
				redirect('login');
			}

		}
		public function getAllReviews($doctorid)
		{
			$reviews=$this->pdm->getReviews(array('dr.doctorid'=>$doctorid));?>
										<ul class="comments-list">
											 <?php foreach($reviews as $r)
											 {
											 ?>
											<li>
												<div class="comment">
													<img class="avatar avatar-sm rounded-circle" alt="User Image" src="<?=base_url('resources/shared/patient/'.$r->profileimage)?>">
													<div class="comment-body">
														<div class="meta-data">
															<span class="comment-author"><?=$r->name?></span>
															<span class="comment-date"><?php echo date('d M, Y H:i:s',strtotime($r->createddt))?></span>
															<div class="rating">
																<?php $rper=($r->rating*100)/5;?>
																<div style="margin-top: 10px">
															            <div class="result-container">
															                <div class="rate-bg" style="width:<?=$rper?>%"></div>
															                <div class="rate-stars"></div>
															            </div>
															    </div>
													</div>
														</div>
														<p class="comment-content">
															<?=$r->review?>
														</p>
													</div>
												</div>	
											</li>
										 	<?php
											}
											?>
										</ul>
										<div class="all-feedback text-center">
											<a href="#" id="showl" class="btn btn-primary btn-sm">
												Show Less
											</a>
										</div>
										<?php
										
		}
		public function getLessReviews($doctorid)
		{
			$reviews=$this->pdm->getReviews(array('dr.doctorid'=>$doctorid)); ?>
										<ul class="comments-list">
											<?php $i=0;?>
											<?php foreach($reviews as $r){ $i++; 
												if($i==4){break;}?>
											<li>
												<div class="comment">
													<img class="avatar avatar-sm rounded-circle" alt="User Image" src="<?=base_url('resources/shared/patient/'.$r->profileimage)?>">
													<div class="comment-body">
														<div class="meta-data">
															<span class="comment-author"><?=$r->name?></span>
															<span class="comment-date"><?php echo date('d M, Y H:i:s',strtotime($r->createddt))?></span>
															<div class="rating">
																<?php $rper=($r->rating*100)/5;?>
																<div style="margin-top: 10px">
															            <div class="result-container">
															                <div class="rate-bg" style="width:<?=$rper?>%"></div>
															                <div class="rate-stars"></div>
															            </div>
															    </div>
													</div>
														</div>
														<p class="comment-content">
															<?=$r->review?>
														</p>
													</div>
												</div>	
											</li>
										 <?php
											}
											?>
										</ul>
										<?php if(count($reviews) >3){?>
										<div class="all-feedback text-center">
											<a href="#" id="show" class="btn btn-primary btn-sm">
												Show all Reviews <strong>(<?=count($reviews)?>)</strong>
											</a>
										</div>
										<?php }
										
		}
		public function addReview($doctorid)
		{
			$data=array(
				"review"=>$this->input->post('txtReview'),
				"rating"=>$this->input->post('rating'),
				"doctorid"=>$doctorid,
				"patientid"=>$patientid=$this->pdm->getpatient(array('userid'=>$this->session->uid))->patientid
			);
			$this->pdm->addReview($data);
			redirect('patDoctor/loadDoctorProfile/'.$doctorid.'/review');
		}
		public function editReview($doctorid,$doctorreviewid)
		{
			$this->pdm->updateReview(array('doctorreviewid'=>$doctorreviewid),array("review"=>$this->input->post('txtReview'),
				"rating"=>$this->input->post('rating')));

			$reviews=$this->pdm->getReviews(array('dr.doctorid'=>$doctorid)); ?>
										<ul class="comments-list">
											<?php $i=0;?>
											<?php foreach($reviews as $r){ $i++; 
												if($i==4){break;}?>
											<li>
												<div class="comment">
													<img class="avatar avatar-sm rounded-circle" alt="User Image" src="<?=base_url('resources/shared/patient/'.$r->profileimage)?>">
													<div class="comment-body">
														<div class="meta-data">
															<span class="comment-author"><?=$r->name?></span>
															<span class="comment-date"><?php echo date('d M, Y H:i:s',strtotime($r->createddt))?></span>
															<div class="rating">
																<?php $rper=($r->rating*100)/5;?>
																<div style="margin-top: 10px">
															            <div class="result-container">
															                <div class="rate-bg" style="width:<?=$rper?>%"></div>
															                <div class="rate-stars"></div>
															            </div>
															    </div>
													</div>
														</div>
														<p class="comment-content">
															<?=$r->review?>
														</p>
													</div>
												</div>	
											</li>
										 <?php
											}
											?>
										</ul>
										<?php if(count($reviews) >3){?>
										<div class="all-feedback text-center">
											<a href="#" id="show" class="btn btn-primary btn-sm">
												Show all Reviews <strong>(<?=count($reviews)?>)</strong>
											</a>
										</div>
										<?php }
		}
		public function loadDoctorBooking($doctorid)
		{
			if($this->session->uid)
			{	
				$data=array(
					"ddata"=>$this->pdm->getDoctor(array('d.doctorid'=>$doctorid)),
					"slotdata"=>$this->pdm->getSlot(array('doctorid'=>$doctorid,'date>='=>date('Y-m-d')))
				);
				/*echo "<pre>";
				print_r($data); die();*/
				$this->load->view('docBooking',$data);
			}
			else
			{
				redirect('login');
			}
		}
		public function loadAppDescription($slotid,$doctorid)
		{
			if($this->session->uid)
			{
				$this->load->view('addAppDescription',array('slotid'=>$slotid,'doctorid'=>$doctorid));
			}
			else
			{
				redirect('login');
			}
		}
		public function bookAppointment()
		{
			$patientid=$this->pdm->getpatient(array('userid'=>$this->session->uid))->patientid;
			$data=array(
				"adesc"=>$this->input->post('txtAdesc'),
				"doctorid"=>$this->input->post('txtDid'),
				"slotid"=>$this->input->post('txtSid'),
				"patientid"=>$patientid
			);
			$this->pdm->insertAppointment($data);
			$data=array(
				"ddata"=>$this->pdm->getDoctor(array('d.doctorid'=>$this->input->post('txtDid'))),
				"slotdata"=>$this->pdm->getSlot(array('slotid'=>$this->input->post('txtSid')))[0]
			);
			$this->load->view('bookingSuccess',$data);
		}
		public function loadReport($doctorid)
		{
			if($this->session->uid)
			{
				$this->load->view('patDocReport',array('doctorid'=>$doctorid));
			}
			else
			{
				redirect('login');
			}
		}
		public function addReport()
		{
			$patientid=$this->pdm->getpatient(array('userid'=>$this->session->uid))->patientid;
			$data=array(
				"doctorid"=>$this->input->post('txtDocid'),
				"patientid"=>$patientid,
				"title"=>$this->input->post('txtTitle'),
				"description"=>$this->input->post('txtDesc')
			);
			$this->pdm->insertReport($data);
		}
		public function loadReport1($labid)
		{
			if($this->session->uid)
			{
				$this->load->view('patLabReport',array('laboratoryid'=>$labid));
			}
			else
			{
				redirect('login');
			}
		}
		public function addReport1()
		{
			$patientid=$this->pdm->getpatient(array('userid'=>$this->session->uid))->patientid;
			$data=array(
				"laboratoryid"=>$this->input->post('txtLabid'),
				"patientid"=>$patientid,
				"title"=>$this->input->post('txtTitle'),
				"description"=>$this->input->post('txtDesc')
			);
			$this->pdm->insertReport1($data);
		}
	}
?>