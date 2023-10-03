<?php
  defined('BASEPATH') OR exit('No direct script access allowed');

  class complaint extends CI_Controller
  {
    function __construct()
    {
      parent::__construct();
      $this->load->model("admin/complaintM","cm");
    }

    public function loadDoctorComplaint()
    { 
      if($this->session->aid)
      {
        $data=array("dcdata"=>$this->cm->selectDoctorComplaint());
        $this->load->view("admin/DoctorComplaint",$data);
      }
      else
      {
        redirect('admin/login');
      }
    }
    public function removeDoctorComplaint()
    {
      $data=array("complaintid"=>$this->input->post('txtCid'));
      $this->cm->deleteComplaint($data);
      redirect('admin/complaint/loadDoctorComplaint');
    }
    public function loadLabComplaint()
    { 
      if($this->session->aid)
      {
        $data=array("lcdata"=>$this->cm->selectLabComplaint());
        $this->load->view("admin/labComplaint",$data);
      }
      else
      {
        redirect('admin/login');
      }
    }
    public function removeLabComplaint()
    {
      $data=array("labcomplaintid"=>$this->input->post('txtLid'));
      $this->cm->deleteLabComplaint($data);
      redirect('admin/complaint/loadLabComplaint');
    }
  }
?>