<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class category extends CI_Controller
	{
		function __construct()
		{
			parent::__construct();
			$this->load->model("admin/categoryM","cm");
		}

		public function loadCategory()
		{ 
			if($this->session->aid)
			{
				$data=array("catdata"=>$this->cm->selectCat());
				$this->load->view("admin/cat-list",$data);
			}
			else
			{
				redirect('admin/login');
			}
		}

		public function addCat()
		{
			$data=array();
			if($_FILES['cimage']['name']!="")
			{
				$img=$_FILES['cimage']['name'];
				move_uploaded_file($_FILES['cimage']['tmp_name'], "C:/xampp/htdocs/doccure/resources/admin/assets/img/specialities/".$img);
				$data=array(
						"categoryname"=>$this->input->post('txtCname'),
						"cimage"=>$img
				);
			}
			else
			{
				$data=array(
					"categoryname"=>$this->input->post('txtCname')
				);	
			}
			$this->cm->insertCat($data);
			redirect("admin/category/loadCategory");
		}

		public function editCat()
		{
			$cid=array(
				"categoryid"=>$this->input->post('txtCid')
			);

			$img="";
			if($_FILES['cimage']['name']!="")
			{
				$img=$_FILES['cimage']['name'];
				move_uploaded_file($_FILES['cimage']['tmp_name'], "C:/xampp/htdocs/doccure/resources/admin/assets/img/specialities/".$img);
			}
			else
			{
				$img=$this->cm->selectOldImg($cid)->cimage;
			}
			$data=array(
				"categoryname"=>$this->input->post('txtCname'),						
				"cimage"=>$img
			);
			$this->cm->updateCat($cid,$data);
			redirect('admin/category/loadCategory');
		}
	}
?>