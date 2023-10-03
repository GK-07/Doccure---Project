<?php 
	defined('BASEPATH') OR exit('No direct script access allowed');

	class register extends CI_Controller
	{
		function __construct()
		{
			parent::__construct();
			$this->load->library('form_validation');
			$this->load->helper('form');
			$this->load->model('registerM','rm');
		}

		public function loadPatientRegister()
		{	
			$data=array(
				"sdata"=>$this->rm->selectState()
				);
				$this->load->view('patientRegister',$data);
		}

		public function loadCity($sid)
		{
			$data=array("stateid"=>$sid);
			if($sid=="-1")
			{
			}
			else
			{
				$city=$this->rm->selectCity($data);
				echo "<option value='-1'>Select City</option>";
				foreach ($city as $c) {
				?>
					<option value="<?php echo $c->cityid?>"><?php echo $c->cityname ?></option>
				<?php
				}
			}
		}

		public function loadDoctorRegister()
		{
			$data=array(
				"sdata"=>$this->rm->selectState(),
				"catdata"=>$this->rm->selectCategory()
			);
			$this->load->view('doctorRegister',$data);
		}
		public function loadLabRegister()
		{
			$data=array(
				"sdata"=>$this->rm->selectState()
			);
			$this->load->view('labRegister',$data);
		}

		public function addPatient()
		{
			$state=$this->input->post('txtState');
			$city=$this->input->post('txtCity');
			$blood=$this->input->post('txtBlood');
		
			$this->form_validation->set_rules('txtUname', 'Username', 'trim|required');
			$this->form_validation->set_rules('txtFname', 'Fullname', 'trim|required');
			$this->form_validation->set_rules('txtAddress', 'Address', 'trim|required');
			$this->form_validation->set_rules('txtEmail', 'Email ID', 'trim|required|valid_email');
			$this->form_validation->set_rules('txtPwd', 'Password', 'trim|required|matches[txtCpwd]');
			$this->form_validation->set_rules('txtCpwd', 'Confirm Password', 'trim|required|matches[txtPwd]');
			$this->form_validation->set_rules('gender', 'Gender', 'required');
			$this->form_validation->set_rules('txtDob', 'Date Of Birth', 'required');
			$this->form_validation->set_rules('txtMno', 'Mobile Number', 'trim|required|numeric|min_length[10]|max_length[10]');
			$this->form_validation->set_rules('txtState', 'State', 'required|callback_validate_state');
			$this->form_validation->set_rules('txtCity', 'City', 'required|callback_validate_city');
			$this->form_validation->set_rules('txtBlood', 'Blood Group', 'required|callback_validate_blood');
			// $this->form_validation->set_rules('pimage', 'Profile Picture', 'required');
			$this->form_validation->set_error_delimiters('<div class="error">', '</div>');

			if($this->form_validation->run()==TRUE) 
			{
				if($_FILES['dimage']['name']!="")
				{
					$img=$_FILES['dimage']['name'];
					move_uploaded_file($_FILES['dimage']['tmp_name'],"C:/xampp/htdocs/doccure/resources/shared/doctor/".$img);
				}
				else
				{
					$img='na.jpg';
				}
				$img=$_FILES['pimage']['name'];
				move_uploaded_file($_FILES['pimage']['tmp_name'],"C:/xampp/htdocs/doccure/resources/shared/patient/".$img);

			$user=array(
				"username"=>$this->input->post('txtUname'),
				"password"=>$this->input->post('txtPwd'),
				"status"=>1,
				"usertype"=>"pat"
					);
			$userid=$this->rm->insertUser($user);
			$pat=array(
					"name"=>$this->input->post('txtFname'),
					"emailid"=>$this->input->post('txtEmail'),
					"gender"=>$this->input->post('gender'),
					"paddress"=>$this->input->post('txtAddress'),
					"cityid"=>$this->input->post('txtCity'),
					"dob"=>$this->input->post('txtDob'),
					"bloodgroup"=>$this->input->post('txtBlood'),
					"mobileno"=>$this->input->post('txtMno'),
					"profileimage"=>$img,
					"userid"=>$userid
						);
			$this->rm->insertPatient($pat);
			redirect('login');
			} 
			else 
			{
				$data=array(
				"sdata"=>$this->rm->selectState()
				);
				$this->load->view('patientRegister',$data);
			}
			
		}

		public function addDoctor()
		{
			$state=$this->input->post('txtState');
			$city=$this->input->post('txtCity');
			$cat=$this->input->post('txtCat');
		
			$this->form_validation->set_rules('txtUname', 'Username', 'trim|required');
			$this->form_validation->set_rules('txtFname', 'Fullname', 'trim|required');
			$this->form_validation->set_rules('txtEmail', 'Email ID', 'trim|required|valid_email');
			$this->form_validation->set_rules('txtPwd', 'Password', 'trim|required|matches[txtCpwd]');
			$this->form_validation->set_rules('txtCpwd', 'Confirm Password', 'trim|required|matches[txtPwd]');
			$this->form_validation->set_rules('txtAddress', 'Address', 'trim|required');
			$this->form_validation->set_rules('txtDesc', 'Description', 'trim|required');
			$this->form_validation->set_rules('gender', 'Gender', 'required');
			$this->form_validation->set_rules('txtDob', 'Date Of Birth', 'required');
			$this->form_validation->set_rules('txtCat', 'Category', 'required|callback_validate_category');
			$this->form_validation->set_rules('txtMno', 'Mobile Number', 'trim|required|numeric|min_length[10]|max_length[10]');
			$this->form_validation->set_rules('txtState', 'State', 'required|callback_validate_state');
			$this->form_validation->set_rules('txtCity', 'City', 'required|callback_validate_city');
			$this->form_validation->set_error_delimiters('<div class="error">', '</div>');

			if($this->form_validation->run()==TRUE) 
			{
				if($_FILES['dimage']['name']!="")
				{
					$img=$_FILES['dimage']['name'];
					move_uploaded_file($_FILES['dimage']['tmp_name'],"C:/xampp/htdocs/doccure/resources/shared/doctor/".$img);
				}
				else
				{
					$img='na.jpg';
				}
				$user=array(
					"username"=>$this->input->post('txtUname'),
					"password"=>$this->input->post('txtPwd'),
					"status"=>-1,
					"usertype"=>"doc"
					);

				$userid=$this->rm->insertUser($user);
				$doc=array(
						"fullname"=>$this->input->post('txtFname'),
						"emailid"=>$this->input->post('txtEmail'),
						"gender"=>$this->input->post('gender'),
						"cityid"=>$this->input->post('txtCity'),
						"dob"=>$this->input->post('txtDob'),
						"categoryid"=>$this->input->post('txtCat'),
						"address"=>$this->input->post('txtAddress'),
						"description"=>$this->input->post('txtDesc'),
						"mobileno"=>$this->input->post('txtMno'),
						"profileimage"=>$img,
						"userid"=>$userid
					);
				$this->rm->insertDoctor($doc);
				redirect('register/loadCertificates');

			} 
			else 
			{
				$data=array(
				"sdata"=>$this->rm->selectState(),
				"catdata"=>$this->rm->selectCategory()
				);
				$this->load->view('doctorRegister',$data);
			}
			
		}
		public function addCertificates()
		{
			$d=$this->input->post('txtDegree');
			$year=$this->input->post('txtCyear');

			$this->form_validation->set_rules('txtUname', 'Username', 'trim|required');
			$this->form_validation->set_rules('txtCyear', 'Completion Year', 'trim|required|callback_validate_year');
			$this->form_validation->set_rules('txtDegree', 'Degree', 'trim|required|callback_validate_degree');
			$this->form_validation->set_rules('txtCimage', 'Certificate Image', 'callback_validate_image');
			$this->form_validation->set_error_delimiters('<div class="error">', '</div>');


			if($this->form_validation->run()==FALSE) 
			{

				$data=array(
					"cdata"=>$this->rm->selectCertificate(),
					"year"=>array_reverse(range(1960, date('Y')-1))
				);
				$this->load->view('doctorCertificateReg',$data);
			}
			else
			{
				if($this->input->post('add')=="reg")
				{
					$img=$_FILES['txtCimage']['name'];
					move_uploaded_file($_FILES['txtCimage']['tmp_name'], "C:/xampp/htdocs/doccure/resources/shared/doctor/certificate/".$img) or die("Cannot Upload Image");

					$dcerti=array(
							"certificateid"=>$this->input->post('txtDegree'),
							"universityname"=>$this->input->post('txtUname'),
							"completionyear"=>$this->input->post('txtCyear'),
							"certificateimageurl"=>$img,
							"doctorid"=>$this->rm->getLastDocId()->doctorid
					);
					$this->rm->insertDoctorCertificate($dcerti);
					$this->load->view('loginV');
				}
				else
				{
					$img=$_FILES['txtCimage']['name'];
					move_uploaded_file($_FILES['txtCimage']['tmp_name'], "C:/xampp/htdocs/doccure/resources/shared/doctor/certificate/".$img) or die("Cannot Upload Image");

					$dcerti=array(
							"certificateid"=>$this->input->post('txtDegree'),
							"universityname"=>$this->input->post('txtUname'),
							"completionyear"=>$this->input->post('txtCyear'),
							"certificateimageurl"=>$img,
							"doctorid"=>$this->rm->getLastDocId()->doctorid
					);
					$this->rm->insertDoctorCertificate($dcerti);
					redirect('register/loadCertificates');
				}
			}
		}

		public function addLaboratory()
		{
			$state=$this->input->post('txtState');
			$city=$this->input->post('txtCity');
		
			$this->form_validation->set_rules('txtUname', 'Username', 'trim|required');
			$this->form_validation->set_rules('txtLname', 'Laboratory name', 'trim|required');
			$this->form_validation->set_rules('txtAddress', 'Address', 'trim|required');
			$this->form_validation->set_rules('txtPincode', 'Pincode', 'trim|required');
			$this->form_validation->set_rules('txtEmail', 'Email ID', 'trim|required|valid_email');
			$this->form_validation->set_rules('txtPwd', 'Password', 'trim|required|matches[txtCpwd]');
			$this->form_validation->set_rules('txtCpwd', 'Confirm Password', 'trim|required|matches[txtPwd]');
			$this->form_validation->set_rules('txtMno', 'Mobile Number', 'trim|required|numeric|min_length[10]|max_length[10]');
			$this->form_validation->set_rules('txtState', 'State', 'required|callback_validate_state');
			$this->form_validation->set_rules('txtCimage', 'Certificate Image', 'callback_validate_image');
			$this->form_validation->set_rules('txtCity', 'City', 'required|callback_validate_city');
			// $this->form_validation->set_rules('pimage', 'Profile Picture', 'required');
			$this->form_validation->set_error_delimiters('<div class="error">', '</div>');

			if($this->form_validation->run()==TRUE) 
			{		
				if($_FILES['dimage']['name']!="")
				{
					$limg=$_FILES['dimage']['name'];
					move_uploaded_file($_FILES['dimage']['tmp_name'],"C:/xampp/htdocs/doccure/resources/shared/doctor/".$img);
				}
				else
				{
					$limg='na.jpg';
				}
				$limg=$_FILES['limage']['name'];
				move_uploaded_file($_FILES['limage']['tmp_name'],"C:/xampp/htdocs/doccure/resources/shared/lab/".$limg);

				$cimg=$_FILES['txtCimage']['name'];
				move_uploaded_file($_FILES['txtCimage']['tmp_name'],"C:/xampp/htdocs/doccure/resources/shared/lab/certificate".$cimg) or die("Cannot Upload Image");

			$user=array(
				"username"=>$this->input->post('txtUname'),
				"password"=>$this->input->post('txtPwd'),
				"status"=>-1,
				"usertype"=>"lab"
					);

			$userid=$this->rm->insertUser($user);
			$lab=array(
					"name"=>$this->input->post('txtLname'),
					"emailid"=>$this->input->post('txtEmail'),
					"cityid"=>$this->input->post('txtCity'),
					"contactno"=>$this->input->post('txtMno'),
					"address"=>$this->input->post('txtAddress'),
					"pincode"=>$this->input->post('txtPincode'),
					"profileimage"=>$limg,
					"certificate"=>$cimg,
					"userid"=>$userid
						);
			$this->rm->insertLaboratory($lab);
			redirect('login');
			} 
			else 
			{
				$data=array(
				"sdata"=>$this->rm->selectState()
				);
				$this->load->view('labRegister',$data);
			}
			
		}

		/*public function addNewCertificates()
		{
			$this->form_validation->set_rules('txtUname', 'Username', 'trim|required');
			$this->form_validation->set_rules('txtCyear', 'Completion Year', 'trim|required');
			$this->form_validation->set_rules('txtDegree', 'Degree', 'trim|required|callback_validate_degree');
			$this->form_validation->set_rules('txtCimage', 'Certificate Image', 'trim|required');
			$this->form_validation->set_error_delimiters('<div class="error">', '</div>');


			if($this->form_validation->run()==FALSE) 
			{

				$data=array(
					"cdata"=>$this->rm->selectCertificate()
				);
				$this->load->view('doctorCertificateReg',$data);
				// $this->rm->insertDoctorCertificates($dcerti);
			}
			else
			{
				// $dcerti=array("" => , );
				$this->rm->insertDoctorCertificates($dcerti);
				$this->load->view('login');
			}
		}*/

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
		public function validate_blood($blood)
		{
			if($blood==-1)
			{
				$this->form_validation->set_message('validate_blood','Select your Blood Group');
				return false;
			} 
			else
			{
				return true;
			}
		}
		public function validate_category($cat)
		{
			if($cat==-1)
			{
				$this->form_validation->set_message('validate_category','Select your Speciality');
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
			if(isset($_FILES['txtCimage']['name']) && $_FILES['txtCimage']['name']!="")
			{
				return true;
			} 
			else
			{
				$this->form_validation->set_message('validate_image','Upload Certificate image');
				return false;
			}
		}
		public function loadCertificates()
		{
			$data=array(
					"cdata"=>$this->rm->selectCertificate(),
					"year"=>array_reverse(range(1960, date('Y')-1))
			);
			$this->load->view('doctorCertificateReg',$data);
		}
	}
?>