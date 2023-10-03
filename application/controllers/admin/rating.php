<?php
  defined('BASEPATH') OR exit('No direct script access allowed');

  class rating extends CI_Controller
  {
    function __construct()
    {
      parent::__construct();
      $this->load->model("admin/ratingM","rm");
    }

    public function loadRating()
    { 
      if($this->session->aid)
      {
        $data=array("rdata"=>$this->rm->selectRating());
        $this->load->view("admin/ratingV",$data);
      }
      else
      {
        redirect('admin/login');
      }
    }
    public function removeRating()
    {
      $data=array("doctorreviewid"=>$this->input->post('txtRid'));
      $this->rm->deleteRating($data);
      redirect('admin/rating/loadRating');
    }
  }
?>