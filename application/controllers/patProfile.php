<?php 
	defined('BASEPATH') OR exit('No direct script access allowed');

	class patProfile extends CI_Controller
	{
		function __construct()
		{
			parent::__construct();
			$this->load->library('form_validation');
			$this->load->helper('form');
			$this->load->model('patProfileM','pm');
		}

		public function loadPatProfile()
		{
			if($this->session->uid)
			{
				$id=array(
					"p.userid"=>$this->session->uid
				);
				$data=array(
					"pdata"=>$this->pm->selectPatientInfo($id),
					"sdata"=>$this->pm->selectState()
				);
				$data['cdata']=$this->pm->selectCity(array("stateid"=>$data['pdata']->stateid));
				$this->load->view('patProfileV',$data);
			}
			else
			{
				redirect('login');
			}
		}

		public function loadCity($sid)
		{
			$data=array("stateid"=>$sid);
			if($sid=="-1")
			{
			}
			else
			{
				$city=$this->pm->selectCity($data);
				echo "<option value='-1'>Select City</option>";
				foreach ($city as $c) {
				?>
					<option value="<?php echo $c->cityid?>"><?php echo $c->cityname ?></option>
				<?php
				}
			}
		}
		public function editBasicInfo()
		{
			$gen=$this->input->post('txtGen');
			$blood=$this->input->post('txtBlood');

			$this->form_validation->set_rules('txtFname', 'Full Name', 'trim|required');
			$this->form_validation->set_rules('txtPhno', 'Phone Number', 'trim|required|numeric|min_length[10]|max_length[10]');
			$this->form_validation->set_rules('txtBlood', 'Blood Group', 'required|callback_validate_blood');
			$this->form_validation->set_rules('txtGen', 'Gender', 'required|callback_validate_gender');
			
			$this->form_validation->set_error_delimiters('<div class="error">', '</div>');

			if($this->form_validation->run()==TRUE) 
			{	
				if(isset($_FILES['pimage']['name']) && $_FILES['pimage']['name']!="")
				{
					$uid=array(
							"p.userid"=>$this->session->uid
						);
					$pid=$this->pm->selectPatientInfo($uid)->patientid;
					$img=$_FILES['pimage']['name'];
					move_uploaded_file($_FILES['pimage']['tmp_name'], "C:/xampp/htdocs/doccure/resources/shared/patient/".$img);
					$data=array(
							"name"=>$this->input->post('txtFname'),
							"mobileno"=>$this->input->post('txtPhno'),
							"profileimage"=>$img,
							"gender"=>$this->input->post('txtGen'),
							"dob"=>$this->input->post('txtDob'),
							"bloodgroup"=>$this->input->post('txtBlood')
					);
					/*print_r($data); die();*/
					$this->session->propic=$img;
					$this->pm->updateProfile(array("patientid"=>$pid),$data);
					redirect('patProfile/loadPatProfile');
				}
				else
				{
					$uid=array(
							"p.userid"=>$this->session->uid
						);
					$pid=$this->pm->selectPatientInfo($uid)->patientid;
					$data=array(
							"name"=>$this->input->post('txtFname'),
							"mobileno"=>$this->input->post('txtPhno'),
							"gender"=>$this->input->post('txtGen'),
							"dob"=>$this->input->post('txtDob'),
							"bloodgroup"=>$this->input->post('txtBlood')
					);
					$this->pm->updateProfile(array("patientid"=>$pid),$data);
					redirect('patProfile/loadPatProfile');
				}	
			}
			else
			{
				$id=array(
						"p.userid"=>$this->session->uid
				);	
				$data=array(
					"pdata"=>$this->pm->selectPatientInfo($id),
					"sdata"=>$this->pm->selectState(),
				);
				$data['cdata']=$this->pm->selectCity(array("stateid"=>$data['pdata']->stateid));
				$this->load->view('patProfileV',$data);
			}
		}
		public function editDetails()
		{
			$city=$this->input->post('txtCity');

			$this->form_validation->set_rules('txtAddress', 'Address', 'trim|required');
			$this->form_validation->set_rules('txtState', 'State', 'required|callback_validate_state');
			$this->form_validation->set_rules('txtCity', 'City', 'required|callback_validate_city');
			$this->form_validation->set_error_delimiters('<div class="error">', '</div>');

			if($this->form_validation->run()==TRUE) 
			{	
				$uid=array(
						"p.userid"=>$this->session->uid
					);
				$pid=$this->pm->selectPatientInfo($uid)->patientid;
				$data=array(
						"paddress"=>$this->input->post('txtAddress'),
						"cityid"=>$this->input->post('txtCity'),
				);
				$this->pm->updateProfile(array("patientid"=>$pid),$data);
				redirect('patProfile/loadPatProfile');
			}
			else
			{
				$id=array(
						"p.userid"=>$this->session->uid
				);	
				$data=array(
					"pdata"=>$this->pm->selectPatientInfo($id),
					"sdata"=>$this->pm->selectState(),
				);
				$data['cdata']=$this->pm->selectCity(array("stateid"=>$data['pdata']->stateid));
				$this->load->view('patProfileV',$data);
			}
		}
		
		public function validate_state($state)
		{
			if($state==-1)
			{
				$this->form_validation->set_message('validate_state','Select State');
				return false;
			} 
			else
			{
				return true;
			}
		}
		public function validate_City($city)
		{
			if($city==-1)
			{
				$this->form_validation->set_message('validate_city','Select City');
				return false;
			} 
			else
			{
				return true;
			}
		}
		public function validate_gender($gen)
		{
			if($gen==-1)
			{
				$this->form_validation->set_message('validate_gender','Select Gender');
				return false;
			} 
			else
			{
				return true;
			}
		}
		public function validate_blood($blood)
		{
			if($blood==-1)
			{
				$this->form_validation->set_message('validate_blood','Select Blood Group');
				return false;
			} 
			else
			{
				return true;
			}
		}
		public function validate_image()
		{
			if(empty($_FILES['txtCimage']['name']))
			{	
				$this->form_validation->set_message('validate_image','Upload Certificate image');
				return false;
			} 
			else
			{	
				return true;
			}
		}
	}
?>