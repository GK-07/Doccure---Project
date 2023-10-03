<?php 
	defined('BASEPATH') OR exit('No direct script access allowed');

	class labProfile extends CI_Controller
	{
		function __construct()
		{
			parent::__construct();
			$this->load->library('form_validation');
			$this->load->helper('form');
			$this->load->model('labProfileM','lm');
		}

		public function loadLabProfile()
		{
			if($this->session->uid)
			{
				$id=array(
					"l.userid"=>$this->session->uid
				);
				$data=array(
					"ldata"=>$this->lm->selectLabInfo($id),
					"sdata"=>$this->lm->selectState()
				);
				$data['cdata']=$this->lm->selectCity(array("stateid"=>$data['ldata']->stateid));
				$this->load->view('labProfileV',$data);
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
				$city=$this->lm->selectCity($data);
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
			$this->form_validation->set_rules('txtLname', 'Laboratory Name', 'trim|required');
			$this->form_validation->set_rules('txtPhno', 'Phone Number', 'trim|required|numeric|min_length[10]|max_length[10]');
			
			$this->form_validation->set_error_delimiters('<div class="error">', '</div>');

			if($this->form_validation->run()==TRUE) 
			{	
				if(isset($_FILES['pimage']['name']) && $_FILES['pimage']['name']!="")
				{
					$uid=array(
							"l.userid"=>$this->session->uid
						);
					$lid=$this->lm->selectLabInfo($uid)->laboratoryid;
					$img=$_FILES['pimage']['name'];
					move_uploaded_file($_FILES['pimage']['tmp_name'], "C:/xampp/htdocs/doccure/resources/shared/lab/".$img);
					$data=array(
							"name"=>$this->input->post('txtLname'),
							"contactno"=>$this->input->post('txtPhno'),
							"profileimage"=>$img
					);
					/*print_r($data); die();*/
					$this->session->propic=$img;
					$this->lm->updateProfile(array("laboratoryid"=>$lid),$data);
					redirect('labProfile/loadLabProfile');
				}
				else
				{
					$uid=array(
							"l.userid"=>$this->session->uid
						);
					$lid=$this->lm->selectLabInfo($uid)->laboratoryid;
					$data=array(
							"name"=>$this->input->post('txtLname'),
							"contactno"=>$this->input->post('txtPhno')
					);
					$this->lm->updateProfile(array("laboratoryid"=>$lid),$data);
					redirect('labProfile/loadLabProfile');
				}	
			}
			else
			{
				$id=array(
						"l.userid"=>$this->session->uid
				);	
				$data=array(
					"ldata"=>$this->lm->selectLabInfo($id),
					"sdata"=>$this->lm->selectState(),
				);
				$data['cdata']=$this->lm->selectCity(array("stateid"=>$data['ldata']->stateid));
				$this->load->view('labProfileV',$data);
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
						"l.userid"=>$this->session->uid
					);
				$lid=$this->lm->selectLabInfo($uid)->laboratoryid;
				$data=array(
						"address"=>$this->input->post('txtAddress'),
						"cityid"=>$this->input->post('txtCity'),
				);
				$this->lm->updateProfile(array("laboratoryid"=>$lid),$data);
				redirect('labProfile/loadLabProfile');
			}
			else
			{
				$id=array(
						"l.userid"=>$this->session->uid
				);	
				$data=array(
					"ldata"=>$this->lm->selectLabInfo($id),
					"sdata"=>$this->lm->selectState(),
				);
				$data['cdata']=$this->lm->selectCity(array("stateid"=>$data['ldata']->stateid));
				$this->load->view('labProfileV',$data);
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