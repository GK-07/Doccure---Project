<?php 
	defined('BASEPATH') OR exit('No direct script access allowed');

	class docProfile extends CI_Controller
	{
		function __construct()
		{
			parent::__construct();
			$this->load->library('form_validation');
			$this->load->helper('form');
			$this->load->model('docProfileM','dm');

		}
		public function loadDocProfile()
		{
			if($this->session->uid)
			{
				$data=array(
					"cr"=>$this->dm->selectCr(),
					"ddata"=>$this->dm->selectDoctorInfo(array('d.userid'=>$this->session->uid)),
					"sdata"=>$this->dm->selectState(),
					"ctdata"=>$this->dm->selectCerti(array('d.userid'=>$this->session->uid)),
					"year"=>array_reverse(range(1960, date('Y')-1))	
				);
				$data['cdata']=$this->dm->selectCity(array("stateid"=>$data['ddata']->stateid));
	/*			echo "<pre>";
				print_r($data); die();*/

				$this->load->view('docProfileV',$data);
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
				$city=$this->dm->selectCity($data);
				echo "<option value='-1'>Select City</option>";
				foreach ($city as $c) {
				?>
					<option value="<?php echo $c->stateid?>"><?php echo $c->cityname ?></option>
				<?php
				}
			}
		}
		public function editBasicInfo()
		{

			$gen=$this->input->post('txtGen');

			$this->form_validation->set_rules('txtFname', 'First Name', 'trim|required');
			$this->form_validation->set_rules('txtPhno', 'Phone Number', 'trim|required|numeric|min_length[10]|max_length[10]');
			$this->form_validation->set_rules('txtGen', 'Gender', 'required|callback_validate_gender');
			//\$this->form_validation->set_rules('pimage', 'Profile Image', 'required|callback_validate_image');
			$this->form_validation->set_error_delimiters('<div class="error">', '</div>');

			if($this->form_validation->run()==TRUE) 
			{	
				if(isset($_FILES['pimage']['name']) && $_FILES['pimage']['name']!="")
				{
					$uid=array(
							"d.userid"=>$this->session->uid
						);
					$did=$this->dm->selectDoctorInfo($uid)->doctorid;
					$img=$_FILES['pimage']['name'];
					move_uploaded_file($_FILES['pimage']['tmp_name'], "C:/xampp/htdocs/doccure/resources/shared/doctor/".$img);
					$data=array(
							"fullname"=>$this->input->post('txtFname'),
							"mobileno"=>$this->input->post('txtPhno'),
							"gender"=>$this->input->post('txtGen'),
							"dob"=>$this->input->post('txtDob'),
							"profileimage"=>$img
					);
					$this->session->propic=$img;
					$this->dm->updateProfile(array("doctorid"=>$did),$data);
					redirect('docProfile/loadDocProfile');
				}
				else
				{
					$uid=array(
							"d.userid"=>$this->session->uid
						);
					$did=$this->dm->selectDoctorInfo($uid)->doctorid;
					$data=array(
							"fullname"=>$this->input->post('txtFname'),
							"mobileno"=>$this->input->post('txtPhno'),
							"gender"=>$this->input->post('txtGen'),
							"dob"=>$this->input->post('txtDob'),
					);
					$this->dm->updateProfile(array("doctorid"=>$did),$data);
					redirect('docProfile/loadDocProfile');
				}	
			}
			else
			{
				$data=array(
				"ddata"=>$this->dm->selectDoctorInfo(array('d.userid'=>$this->session->uid)),
				"sdata"=>$this->dm->selectState(),
				"ctdata"=>$this->dm->selectCerti(array('d.userid'=>$this->session->uid)),
				"cr"=>$this->dm->selectCr(),
				"year"=>array_reverse(range(1960, date('Y')-1))	
				);
				$data['cdata']=$this->dm->selectCity(array("stateid"=>$data['ddata']->stateid));
				$this->load->view('docProfileV',$data);
			}
		}
		public function editDesc()
		{
			$this->form_validation->set_rules('txtDesc', 'Description', 'trim|required');
			$this->form_validation->set_error_delimiters('<div class="error">', '</div>');

			if($this->form_validation->run()==TRUE) 
			{	
				$uid=array(
						"d.userid"=>$this->session->uid
					);
				$did=$this->dm->selectDoctorInfo($uid)->doctorid;
				$data=array(
						"description"=>$this->input->post('txtDesc')
				);
				$this->dm->updateProfile(array("doctorid"=>$did),$data);
				redirect('docProfile/loadDocProfile');
			}
			else
			{
				$data=array(
				"ddata"=>$this->dm->selectDoctorInfo(array('d.userid'=>$this->session->uid)),
				"sdata"=>$this->dm->selectState(),
				"ctdata"=>$this->dm->selectCerti(array('d.userid'=>$this->session->uid)),
				"cr"=>$this->dm->selectCr(),
				"year"=>array_reverse(range(1960, date('Y')-1))
				);
				$data['cdata']=$this->dm->selectCity(array("stateid"=>$data['ddata']->stateid));
				$this->load->view('docProfileV',$data);
			}
		}
		public function editDetails()
		{
			$this->form_validation->set_rules('txtAddress', 'Address', 'trim|required');
			$this->form_validation->set_rules('txtState', 'State', 'required|callback_validate_state');
			$this->form_validation->set_rules('txtCity', 'City', 'required|callback_validate_city');
			$this->form_validation->set_error_delimiters('<div class="error">', '</div>');

			if($this->form_validation->run()==TRUE) 
			{	
				$uid=array(
						"d.userid"=>$this->session->uid
					);
				$did=$this->dm->selectDoctorInfo($uid)->doctorid;
				$data=array(
						"address"=>$this->input->post('txtAddress'),
						"cityid"=>$this->input->post('txtCity'),
				);
				$this->dm->updateProfile(array("doctorid"=>$did),$data);
				redirect('docProfile/loadDocProfile');
			}
			else
			{
				$data=array(
				"ddata"=>$this->dm->selectDoctorInfo(array('d.userid'=>$this->session->uid)),
				"sdata"=>$this->dm->selectState(),
				"ctdata"=>$this->dm->selectCerti(array('d.userid'=>$this->session->uid)),
				"cr"=>$this->dm->selectCr(),
				"year"=>array_reverse(range(1960, date('Y')-1))
				);
				$data['cdata']=$this->dm->selectCity(array("stateid"=>$data['ddata']->stateid));

				$this->load->view('docProfileV',$data);
			}
		}
		public function addDegree()
		{
			$d=$this->input->post('txtDegree');
			$year=$this->input->post('txtCyear');

			$this->form_validation->set_rules('txtCyear', 'Completion Year', 'trim|required|callback_validate_year');
			$this->form_validation->set_rules('txtDegree', 'Degree', 'trim|required|callback_validate_degree');
			$this->form_validation->set_rules('txtClg', 'College/Institute', 'trim|required');
			$this->form_validation->set_rules('txtCimage', 'Certificate Image','callback_validate_image');

			$this->form_validation->set_error_delimiters('<div class="error">', '</div>');

			if($this->form_validation->run()==FALSE) 
			{
				$data=array(
				"cr"=>$this->dm->selectCr(),
				"ddata"=>$this->dm->selectDoctorInfo(array('d.userid'=>$this->session->uid)),
				"sdata"=>$this->dm->selectState(),
				"ctdata"=>$this->dm->selectCerti(array('d.userid'=>$this->session->uid)),
				"year"=>array_reverse(range(1960, date('Y')-1)),
				"clickid"=>'add-education'
			);
			$data['cdata']=$this->dm->selectCity(array("stateid"=>$data['ddata']->stateid));

			$this->load->view('docProfileV',$data);
			}
			else
			{	
				$uid=array(
						"d.userid"=>$this->session->uid
						);
				$did=$this->dm->selectDoctorInfo($uid)->doctorid;
				$img=$_FILES['txtCimage']['name'];
				move_uploaded_file($_FILES['txtCimage']['tmp_name'],"C:/xampp/htdocs/doccure/resources/shared/doctor/certificate/".$img);
				$dcerti=array(
					"certificateid"=>$this->input->post('txtDegree'),
					"universityname"=>$this->input->post('txtClg'),
					"completionyear"=>$this->input->post('txtCyear'),
					"doctorid"=>$did,
					"certificateimageurl"=>$img
						);
				$this->dm->insertDoctorCertificate($dcerti);
				redirect('docProfile/loadDocProfile');
			}
		}
		
		public function validate_gender($gen)
		{
			if($gen==-1)
			{
				$this->form_validation->set_message('validate_gender','Select your Gender');
				return false;
			} 
			else
			{
				return true;
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
		public function validate_degree($d)
		{
			if($d==-1)
			{
				$this->form_validation->set_message('validate_degree','Select your Degree');
				return false;
			} 
			else
			{
				return true;
			}
		}
		public function validate_year($year)
		{
			if($year==-1)
			{
				$this->form_validation->set_message('validate_year','Select Year of Completion');
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
				print_r($_FILES['txtCimage']);
				return true;
			}
		}
		
		/*public function load()
		{
			$this->load->view('testing');
		}
		public function test()
		{
			print_r($this->input->post('txtimg'));
		}*/
	}
?>