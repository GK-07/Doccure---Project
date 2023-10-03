<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class laboratory extends CI_Controller
	{
		function __construct()
		{
			parent::__construct();
			$this->load->model("admin/laboratoryM","lm");
		}

		public function loadLabList()
		{ 
			if($this->session->aid)
			{
				$data=array("labdata"=>$this->lm->selectLab());
				$this->load->view("admin/lab-list",$data);
			}
			else
			{
				redirect('admin/login');
			}
		}

		public function loadLabMore($id)
		{
			if($this->session->aid)
			{
				$lid=array("l.laboratoryid"=>$id);
				$data=array(
						"ldata"=>$this->lm->selectLabById($lid)
				);
				$this->load->view("admin/labMore",$data);
			}
			else
			{
				redirect('admin/login');
			}
		}
		/*public function loadAddLab()
		{
			$data=array(
				"stated"=>$this->lm->selectState()
			);
			$this->load->view("admin/addLab",$data);
		}
		public function loadCityByState($sid)
		{
			$sid=array("stateid"=>$sid);
			$cityd=$this->lm->selectCityByState($sid);
			?>
			<option value="-1">Select City</option>
			<?php
			foreach ($cityd as $c) 
			{
			?>
				<option value="<?=$c->cityid?>"><?=$c->cityname?></option>
			<?php
			}
		}

		public function addLab()
		{	
			$img=$_FILES['txtLabImg']['name'];
			move_uploaded_file($_FILES['txtLabImg']['tmp_name'],"C:/xampp/htdocs/doccure/resources/admin/images/".$img) or die("Cannot upload image");
			$data=array(
				"name"=>$this->input->post("txtAname"),
				"emailid"=>$this->input->post("txtEmail"),
				"contactno"=>$this->input->post("txtMno"),	
				"address"=>$this->input->post("txtAddress"),
				"cityid"=>$this->input->post("txtCity"),
				"pincode"=>$this->input->post("txtPin"),
				"profileimage"=>$img
					);
				$this->lm->insertLab($data);
				redirect("admin/laboratory/loadLabList");
		}*/
		public function editStatus($status,$uid)
		{
			$uid=array("userid"=>$uid);
			$st=array("status"=>$status);
			$this->dm->updateStatus($uid,$st);
			redirect('admin/loadDoctor');
		}
	}
?> 

