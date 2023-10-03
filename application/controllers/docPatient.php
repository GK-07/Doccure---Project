<?php 
	defined('BASEPATH') OR exit('No direct script access allowed');

	class docPatient extends CI_Controller
	{
		function __construct()
		{
			parent::__construct();
			$this->load->model('docPatientM','dpm');
			$this->load->model('docAppointmentM','dam');
		}
		public function getPatientInfo()
		{
			if($this->session->uid)
			{
				$data=array(
					"pdata"=>$this->dpm->selectPatientInfo(array('d.userid'=>$this->session->uid)),
					"ddata"=>$this->dam->selectDoctorInfo(array('d.userid'=>$this->session->uid))
				);
				$this->load->view('docPatientV',$data);
			}
			else
			{
				redirect('login');
			}
		}
		public function loadPatientProfile($pid,$clickid='capp')
		{

			if($this->session->uid)
			{
				$data=array(
					"patientid"=>$pid			
				);
				$data1=array(
					"a.patientid"=>$pid, 
					"a.doctorid"=>$this->dam->selectDoctorInfo(array('d.userid'=>$this->session->uid))->doctorid
				);
				$temp=array(
					"pdata"=>$this->dpm->selectPatient($data),
					"ladata"=>$this->dpm->selectLastApp(array("a.patientid"=>$pid,"d.doctorid"=>$this->dam->selectDoctorInfo(array('d.userid'=>$this->session->uid))->doctorid)),
					"adata"=>$this->dpm->selectDocApp($data1),
					"casefiles"=>$this->dpm->selectCaseFiles(array("cf.patientid"=>$pid)),
					"labpred"=>$this->dpm->selectLabPre(array("lp.patientid"=>$pid,'d.userid'=>$this->session->uid)),
					"upreport"=>$this->dpm->uploadedReport(array("lp.patientid"=>$pid)),
					"upreport1"=>$this->dpm->uploadedReport1(array("lp.patientid"=>$pid,"ur.laboratoryid"=>0)),
					"clickid"=>$clickid
				);
				$this->load->view('patientProfileV',$temp);
			}
			else
			{
				redirect('login');
			}
		}
		public function getAppInfo($aid)
		{
			$data=array('appointmentid'=>$aid);
			$temp=$this->dam->selectModalApp($data);
			echo json_encode($temp);
		}
		public function updateAppStatus($aid,$st,$pid)
		{
			$appid=array(
				"appointmentid"=>$aid
			);
			$data=array(
				"status"=>$st
			);
			$this->dam->updateAppStatus($appid,$data);
			$data1=array(
				"a.patientid"=>$pid, 
				"a.doctorid"=>$this->dam->selectDoctorInfo(array('d.userid'=>$this->session->uid))->doctorid
			);
			$adata=$this->dpm->selectDocApp($data1);
			foreach ($adata as $ad) {
			?>
				<tr>
					<td>
						<h2 class="table-avatar">
							<a href="doctor-profile.html" class="avatar avatar-sm mr-2">
								<img class="avatar-img rounded-circle" src="<?=base_url('resources/shared/doctor/'.$ad->profileimage)?>" alt="User Image">
							</a>
							<a href="#"><?=$ad->fullname?> <span><?=$ad->categoryname?></span></a>
						</h2>
					</td>
					<td><?=$ad->date?><span class="d-block text-info"><?=$ad->time?></span></td>
					<td><?=$ad->createddt?></td>
					<td>
						<?php
							if($ad->status==1)
							{
						?>		<span class="badge badge-pill bg-success-light">Confirm</span>
						<?php
							}
							elseif($ad->status==-1)
							{
						?>
								<span class="badge badge-pill bg-warning-light">Pending</span>

						<?php
							}
							elseif($ad->status==0)
							{
						?>
								<span class="badge badge-pill bg-danger-light">Cancelled</span>
						<?php
							}
						?></td>
						<?php
							if($ad->status==-1)
							{
						?>		
						<td class="text-right">
							<div class="table-action">
							<a href="#" data-toggle="modal" data-target="#appt_details" class="btn btn-sm bg-success-light" onclick="getModal('<?=$ad->appointmentid?>')">
								<i class="far fa-eye"></i> View
								</a>
							<a href="#" class="btn btn-sm bg-danger-light upd" pid="<?=$ad->patientid?>" aid="<?=$ad->appointmentid?>" st="0">
								<i class="far fa-trash-alt"></i> Cancel
							</a>
							<a href="#" class="btn btn-sm bg-danger-light upd" pid="<?=$ad->patientid?>" aid="<?=$ad->appointmentid?>" st="1">
								<i class="far fa-trash-alt"></i> Accept
							</a>


							</div>
						</td>
					<?php
							}
							else
							{
						?>
						<td class="text-right">
						<div class="table-action">
							<a href="#" data-toggle="modal" data-target="#appt_details" class="btn btn-sm bg-success-light" onclick="getModal('<?=$ad->appointmentid?>')">
								<i class="far fa-eye"></i> View
							</a>
						</div>
					</td>
					<?php
					} 
					?>
				</tr>
				<?php		
					}
										
		}

		public function createCaseFile()
		{
			if($this->session->uid)
			{
				$data=array(
					"pid"=>$this->input->post('txtPid'),
					"desc"=>$this->input->post('txtDesc'),
				);
				$this->load->view('newCaseFile.php',$data);
			}
			else
			{
				redirect('login');
			}
		}
		public function addCaseFile($clickid)
		{
			$data=array(
				"patientid"=>$this->input->post('txtPid'),
				"description"=>$this->input->post('txtDesc'),
				"casedata"=>$this->input->post('caseData'),
				"doctorid"=>$this->dam->selectDoctorInfo(array('d.userid'=>$this->session->uid))->doctorid
			);
			$this->dpm->insertCaseFile($data);
			redirect('docPatient/loadPatientProfile/'.$data['patientid'].'/'.$clickid);
		}
		public function openCaseFile($cid,$duid)
		{
			$temp=array(
				"casefile"=>$this->dpm->selectCaseFiles(array('cf.casefileid'=>$cid))[0]
			);
			$this->load->view('openCaseFile',$temp);

		}
		public function editCaseFile($clickid)
		{
			$id=array(
				"casefileid"=>$this->input->post('txtCfid')
			);
			$data=array(
				"casedata"=>$this->input->post('caseData')
			);
			$this->dpm->updateCaseFile($id,$data);
			redirect('docPatient/loadPatientProfile/'.$this->input->post('txtPid').'/'.$clickid);
		}
		public function uploadLabPre()
		{  
			$img=$_FILES['txtPdf']['name'];
			move_uploaded_file($_FILES['txtPdf']['tmp_name'], "C:/xampp/htdocs/doccure/resources/user/pdf/".$img);
            $temp=array(
            	"patientid"=>$this->input->post('txtPid1'),
            	"doctorid"=>$this->dam->selectDoctorInfo(array('d.userid'=>$this->session->uid))->doctorid,
            	"labprepdf"=>$img,
            	"description"=>$this->input->post('txtDesc')
            );
            $this->dpm->insertLabPre($temp);
            redirect('docPatient/loadPatientProfile/'.$temp['patientid'].'/clabrep');
		}
		public function createPdf()
		{
			$this->load->view('createPdfV');
		}
	}
?>