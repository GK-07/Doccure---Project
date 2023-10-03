<?php 
   class Email_controller extends CI_Controller { 
 
      function __construct() { 
         parent::__construct(); 
         $this->load->library('session'); 
         $this->load->helper('form'); 
          $this->load->library('email');
         $config = array();
         $config['protocol'] = 'smtp';
         $config['smtp_host'] = 'smtp.gmail.com';
         $config['smtp_user'] = 'doccure77@gmail.com';
         $config['smtp_pass'] = 'Kashyapsopari.456';
         $config['smtp_port'] = 465;
         $config['mailtype'] = 'html';
         $config['smtp_crypto'] = 'ssl';
         $config['wordwrap'] = true;

         $this->email->initialize($config);
         $this->email->set_newline("\r\n");
      } 
		
      public function index() { 
	
         $this->load->helper('form'); 
         $this->load->view('email_form'); 
      } 
  
      public function send_mail() { 
         $from_email = "doccure77@gmail.com"; 
         $to_email = $this->input->post('email'); 
   
         //Load email library 

         $this->load->library('email');
         
         $this->email->from($from_email, 'Doccure'); 
         $this->email->to($to_email);
         $this->email->subject('Testing'); 
         $this->email->reply_to(''); 
         $this->email->message('Hello ! From Doccure ! Hope you are well...'); 

         

   
         //Send mail 
         if($this->email->send()) 
         $this->session->set_flashdata("email_sent","Email sent successfully."); 
         else 
         $this->session->set_flashdata("email_sent","Error in sending Email."); 
         $this->load->view('email_form'); 
      } 
   } 
?>