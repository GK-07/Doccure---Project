<?php 
	defined('BASEPATH') OR exit('No direct script access allowed');

	class ManageProfile extends CI_Controller
	{
		function __construct()
		{
			parent::__construct();
			$this->load->model("admin/ManageProfileM","mp");
		}

		public function loadProfile()
		{
			if($this->session->aid)
			{
				$data=array(
							"adminid"=>$this->session->aid
					);
				$temp=array(
					"admindata"=>$this->mp->selectAdmin($data),
					"aadmindata"=>$this->mp->selectAdmin(array("adminid"=>$this->mp->selectAdmin($data)->addedbyid))
				);
					
				$this->load->view("admin/ManageProfileV",$temp);
			}
			else
			{
				redirect('admin/login');
			}
		}	
		public function loadChangePwd()
		{
			if($this->session->aid)
			{
				$this->load->view('admin/ChangePassword');
			}
			else
			{
				redirect('admin/login');
			}
		}
		public function editProfile()
		{
			$img="";
			if($_FILES['txtpropic']['name']=="")
			{
				$img=$_SESSION['apropic'];
			}
			else
			{
				$img=$_FILES['txtpropic']['name'];
				$_SESSION['apropic']=$img;
				move_uploaded_file($_FILES['txtpropic']['tmp_name'],"C:/xampp/htdocs/doccure/resources/admin/images/".$img);
			}
			$aid=array(
				"adminid"=>$_SESSION['aid']
			);
			$data=array(
				"username"=>$this->input->post('txtuname'),
				"emailid"=>$this->input->post('txtemail'),
				"mobileno"=>$this->input->post('txtmob'),
				"profilepic"=>$img
			);
			$_SESSION['aname']=$this->input->post('txtuname');
			$this->mp->updateProfile($aid,$data);
			redirect('admin/ManageProfile/loadProfile');

		}
		public function checkPaasword($pwd)
		{
			if($pwd==="")
			{
			?>
				<label>Old Password Must Be Entered...</label>
			<?php	
			}
			else
			{
				$data=array(
							"adminid"=>$this->session->aid
				);

				$temp=$this->mp->selectAdmin($data);
				if($pwd!=$temp->password)
				{
				?>
					<label>Old Password Not Matched...</label>
				<?php	
				}
			}
		}

		public function editPassword()
		{
			$data=array(
				 "password"=>$this->input->post('txtcpass')
			);
			$aid=array(
				"adminid"=>$this->session->aid
			);
			$this->mp->updateProfile($aid,$data);
			redirect('admin/ManageProfile/loadProfile');
		}
	}
?>