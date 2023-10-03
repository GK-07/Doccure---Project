<?php 
	defined('BASEPATH') OR exit('No direct script access allowed');

	class patHome extends CI_Controller
	{
		function __construct()
		{
			parent::__construct();
			$this->load->model('patHomeM','phm');
			$this->load->model('patDoctorM','pdm');
			$this->load->model('patDashboardM','pm');
		}
		public function index()
		{
			if($this->session->uid)
			{
				$data=array(
					"catdata"=>$this->phm->selectAllCategories(),
					"ccount"=>$this->phm->countCategories(),
					"ddata"=>$this->phm->selectDoctors(),
					"ct"=>$this->phm->getCity()
					/*"rnum"=>$this->phm->docRatingNumber()*/
				);
				/*echo "<pre>";
				print_r($data); die();*/
				$this->load->view("patientIndex",$data);
			}
			else
			{
				redirect('login');
			}
		}
		public function loadByCat($catid)
		{
			if($this->session->uid)
			{
				$data=array(
					"ddata"=>$this->phm->selectDoctorsByCat(array("d.categoryid"=>$catid)),
					"cdata"=>$this->phm->getCategories()
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
		public function searchDoc()
		{
			if($this->input->post('txtCity')!='' && $this->input->post('txtCat')!=''){
				$city=$this->input->post('txtCity');
				$cat=$this->input->post('txtCat');
				$data=array("cdata"=>$this->phm->getCategories(),"ddata"=>$this->phm->getFilterData1($city,$cat));
			}
			elseif ($this->input->post('txtCity')!='') {
				$city=$this->input->post('txtCity');
				$data=array("cdata"=>$this->phm->getCategories(),"ddata"=>$this->phm->getFilterData2($city));
			}
			else{
				$cat=$this->input->post('txtCat');
				$data=array("cdata"=>$this->phm->getCategories(),"ddata"=>$this->phm->getFilterData3($cat));
			}


			$this->load->view('patDoctorV',$data);
			
		}
		public function loadLabList1()
		{
			if($this->session->uid)
			{
				$data=array(
						"ldata"=>$this->pm->selectLabInfo(),
						"cdata"=>$this->pm->selectCity()
				);
				$this->load->view('labList1',$data);
			}
			else
			{
				redirect('login');
			}
		}
	}
?>