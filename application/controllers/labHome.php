<?php 
	defined('BASEPATH') OR exit('No direct script access allowed');
	include_once('src/instamojo.php');
	class labHome extends CI_Controller
	{
		function __construct()
		{
			parent::__construct();
			$this->load->library('form_validation');
			$this->load->helper('form');
			$this->load->model('labHomeM','lm');
		}

		public function loadLabHome()
		{	

			if($this->session->uid)
			{
				$id=array(
						"l.userid"=>$this->session->uid
				);
				$lid=$this->lm->selectlabInfo($id)->laboratoryid;

				$temp=array(
						"r.laboratoryid"=>$lid,
						"m.status"=>1,

				);
				$data=array(
					"ldata"=>$this->lm->selectLabInfo($id),
					"pdata"=>$this->lm->selectPendingRequest(array("l.userid"=>$this->session->uid,"ulp.prequestid!="=>"")),
					"pcount"=>count($this->lm->selectLabPatient($id)),
					"rcount"=>count($this->lm->uploadedReport($id))
				);
				/*echo "<pre>";
				print_r($data); die();*/
				$this->load->view("labHomeV",$data);
			}
			else
			{
				redirect("login");
			}
		}

		public function loadLabPatient()
		{
			if($this->session->uid)
			{
				$id=array(
						"l.userid"=>$this->session->uid
				);
				$data=array(
					"ldata"=>$this->lm->selectLabInfo($id),
					"pdata"=>$this->lm->selectLabPatient($id)
				);
				/*print_r($data); die();*/
				$this->load->view("labPatients",$data);
			}
			else
			{
				redirect("login");
			}
		}

		public function loadChangePass()
		{
			if($this->session->uid){
				$data=array(
					"ldata"=>$this->lm->selectLabInfo(array("l.userid"=>$this->session->uid))
				);
				$this->load->view('labCpass',$data);
			}
			else{
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
					"ldata"=>$this->lm->selectLabInfo(array("l.userid"=>$this->session->uid))
				);
				$this->load->view('labCpass',$data);
			}
			else
			{
				$uid=array(
					"userid"=>$this->session->uid
				);
				$data=array(
					"password"=>$this->input->post('txtCpwd')
				);
				$this->lm->updatePassword($uid,$data);
				redirect('labHome/loadChangePass');
			}
		}

		public function edit_pass($oldpass)
		{
			$udata=$this->lm->selectUserInfo(array("userid"=>$this->session->uid));
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
		public function getPendingRequest()
		{
			if($this->session->uid){
				$data=array(
					"prdata"=>$this->lm->selectPendingRequest(array("l.userid"=>$this->session->uid,"ulp.prequestid"=>"")),
					"ldata"=>$this->lm->selectlabInfo(array(
					"l.userid"=>$this->session->uid
				))
				);
				
				$this->load->view('labPrequest',$data);
			}
			else
			{
				redirect('login');
			}
		}
		public function sendPaymentRequest($lpid)
		{
			$pinfo=$this->lm->selectPendingRequest(array('lp.labpreid'=>$lpid))[0];
			print_r($pinfo);
			$API_KEY ="ca0fc5891f0edf21582ed9dad1423bba";
			$AUTH_TOKEN = "a75a39e9ceee8330fc39e68cc7559871";

				$api = new Instamojo\Instamojo($API_KEY,$AUTH_TOKEN,'https://www.instamojo.com/api/1.1/');

				try {
        			$response = $api->paymentRequestCreate(array(
			            "purpose" => "Laboratory Report at ".$pinfo->lname,
			            "buyer_name" => $pinfo->name,
			            "amount" => $this->input->post('txtAmount'),
			            "send_email" => true,
			            "phone"=> $pinfo->mobileno,
			            "send_sms"=>true,
			            "email" => $pinfo->emailid,
			            "redirect_url" => "",
			            "allow_repeated_payments"=>false
            		));
            		$this->lm->updatePreStatus(array("labpreid"=>$lpid),array("prequestid"=>$response['id']));
    			}
			    catch (Exception $e) {
			        print('Error: ' . $e->getMessage());

			    }

			   $prdata=$this->lm->selectPendingRequest(array("l.userid"=>$this->session->uid,"ulp.prequestid"=>""));

				foreach ($prdata as $p) {
				?>
				<tr>
					<td><?=$p->uploaddate?></td>
					<td>
						<h2 class="table-avatar">
							<a href="#" class="avatar avatar-sm mr-2">
								<img class="avatar-img rounded-circle" src="<?=base_url('resources/shared/doctor/'.$p->dp)?>" alt="User Image">
							</a>
							<a href="#"><?=$p->fullname?> <span><?=$p->categoryname?></span></a>
						</h2>
					</td>
					<td>
						<h2 class="table-avatar">
							<a href="#" class="avatar avatar-sm mr-2">
								<img class="avatar-img rounded-circle" src="<?=base_url('resources/shared/patient/'.$p->pp)?>" alt="User Image">
							</a>
							<a href="#"><?=$p->name?></a>
						</h2>
					</td>
					<td><?=$p->description?></td>
					<td>
						
							
								<a href="" onclick="
								window.open('<?=base_url('resources/user/pdf/'.$p->labprepdf)?>');" 
								  class="btn btn-sm bg-info-light">
									<i class="far fa-eye"></i> View
								</a>
						
					</td>
					<td>
							<form class="pay" method="post" lpid="<?=$p->uploadlabpreid?>">
								<div class="form-row"> 
								   <div class="form-group col-md-6">
								   <div class="input-group">
								        <div class="input-group-prepend">
								          <div class="input-group-text">&#8377;</div>
								        </div>
								        <input type="text" class="form-control" name="txtAmount" placeholder="Price">
								   </div>  
								  </div>

								  <div class="form-group col-md-3">
								    <button type="submit" class="btn btn-primary">Request</button>
								  </div>

								</div>
							</form>
					</td>
				</tr>
				<?php
					}
		}
		public function uploadReport()
		{
			$file=$_FILES['txtPdf']['name'];
			move_uploaded_file($_FILES['txtPdf']['tmp_name'], "C:/xampp/htdocs/doccure/resources/user/pdf/reports/".$file);
            $temp=array(
            	"labpreid"=>$this->input->post('txtLabpreid'),
            	"laboratoryid"=>$this->input->post('txtLabid'),
            	"reporturl"=>$file
            );
            $this->lm->insertReport($temp);
            $this->lm->updateUploadStatus(array("labpreid"=>$this->input->post('txtLabpreid')),array("uploadstatus"=>1));
            redirect('labHome/loadLabHome');
		}
		public function loadPatMore($pid)
		{
			if($this->session->uid)
			{
				$data=array(
					"pdata"=>$this->lm->selectPatient(array("p.patientid"=>$pid))
				);
				$this->load->view('patMore',$data);
			}
			else{
				redirect('login');
			}
		}
		public function loadDocMore($did)
		{
			if($this->session->uid)
			{
				$data=array(
					"ddata"=>$this->lm->selectDoctor(array("d.doctorid"=>$did)),
					"cdata"=>$this->lm->selectCerti(array("dc.doctorid"=>$did))
				);
				$this->load->view('docMore',$data);
			}
			else{
				redirect('login');
			}
		}
		public function loadUploadReport()
		{
			if($this->session->uid){
				$data=array(
					"ldata"=>$this->lm->selectLabInfo(array("l.userid"=>$this->session->uid)),
					"pdata"=>$this->lm->uploadedReport(array("l.userid"=>$this->session->uid))
				);
				$this->load->view('labUploadReport',$data);
			}
			else{
				redirect('login');
			}
					
		}
		
	}
?>
