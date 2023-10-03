<?php 
	defined('BASEPATH') OR exit('No direct script access allowed');

	class docSchedule extends CI_Controller
	{
		function __construct()
		{
			parent::__construct();
			$this->load->model('docAppointmentM','dam');
			$this->load->model('docScheduleM','dsm');
		}
		public function loadSchedule()
		{
			if($this->session->uid)
			{
				/*$data1=array(
					"date"=>date('Y-m-d',strtotime('-1 day'))
				);
				$this->dsm->deleteSchedule($data1);*/
				$data=array(
					"ddata"=>$this->dam->selectDoctorInfo(array("d.userid"=>$this->session->uid)),
				);
					
				$this->load->view('docScheduleV',$data);
			}
			else
			{
				redirect('login');
			}
		}
		public function getSlotByDate($date)
		{
			$date=date('Y-m-d',strtotime($date));
			$ddata=$this->dam->selectDoctorInfo(array("d.userid"=>$this->session->uid));
			$dt=array("date"=>$date,"doctorid"=>$ddata->doctorid);
			$d=$this->dsm->selectSlotByDate($dt);
			echo json_encode($d);
		}
		public function validateSlot($h1,$m1,$h2,$m2,$date)
		{	

			$date=date('Y-m-d',strtotime($date));
			$data=array(
				"date"=>$date,
				"doctorid"=>$this->dam->selectDoctorInfo(array("d.userid"=>$this->session->uid))->doctorid
			);
			
			$stime1=strtotime($h1 . ':' . $m1);
			$etime1=strtotime($h2 . ':' . $m2);
			$res=$this->dsm->selectSlotByDate($data);
			foreach ($res as $r) 
			{
				$stime2=strtotime($r->starttime);
				$etime2=strtotime($r->endtime);

				if((($stime1 < $stime2) && ($etime1 < $stime2))||(($stime1 > $etime2) && ($etime1 > $etime2)))
				{
					$flag=true;
				}
				else
				{
					$flag=false;
					break;
				}	
			}
			$f=array("flag"=>$flag);
			echo json_encode($f);
		}
		public function validateESlot($h1,$m1,$h2,$m2,$date,$s,$e)
		{	
			$s=strtotime($s);
			$e=strtotime($e);

			$date=date('Y-m-d',strtotime($date));
			$data=array(
				"date"=>$date,
				"doctorid"=>$this->dam->selectDoctorInfo(array("d.userid"=>$this->session->uid))->doctorid
			);
			
			$stime1=strtotime($h1 . ':' . $m1);
			$etime1=strtotime($h2 . ':' . $m2);
			$res=$this->dsm->selectSlotByDate($data);
			foreach ($res as $r) 
			{
				$stime2=strtotime($r->starttime);
				$etime2=strtotime($r->endtime);
				if($s!=$stime2 && $e!=$etime2)
				{
					if((($stime1 < $stime2) && ($etime1 < $stime2))||(($stime1 > $etime2) && ($etime1 > $etime2)))
					{
						$flag=true;
					}
					else
					{
						$flag=false;
						break;
					}
				}
				else
				{
					$flag=true;
				}
			}
			$f=array("flag"=>$flag);
			echo json_encode($f);
		}		
		public function deleteTimeSlot($sid,$date)
		{
			$data=array("slotid"=>$sid);
			$this->dsm->removeTimeSlot($data);
			$ddata=$this->dam->selectDoctorInfo(array("d.userid"=>$this->session->uid));
			$dt=array("date"=>$date,"doctorid"=>$ddata->doctorid);
			$d=$this->dsm->selectSlotByDate($dt);
			echo json_encode($d);
		}
		public function addTimeSlot()
		{ 	
			$date=date('Y-m-d',strtotime($this->input->post('txtDate')));
			$stime=$this->input->post('txtH1').":".$this->input->post('txtM1');
			$etime=$this->input->post('txtH2').":".$this->input->post('txtM2');
			$stime=date('H:i',strtotime($stime));
			$etime=date('H:i',strtotime($etime));
			$data=array(
				"starttime"=>$stime,
				"endtime"=>$etime,
				"doctorid"=>$this->dam->selectDoctorInfo(array("d.userid"=>$this->session->uid))->doctorid,
				"date"=>$date
			);
			$this->dsm->insertTimeSlot($data);	
			$ddata=$this->dam->selectDoctorInfo(array("d.userid"=>$this->session->uid));
			$dt=array("date"=>$date,"doctorid"=>$ddata->doctorid);
			$d=$this->dsm->selectSlotByDate($dt);
			echo json_encode($d);
		}
		public function editTimeSlot()
		{
			$stime=$this->input->post('txtEH1').":".$this->input->post('txtEM1');
			$etime=$this->input->post('txtEH2').":".$this->input->post('txtEM2');
			$stime=date('H:i',strtotime($stime));
			$etime=date('H:i',strtotime($etime));
			$sid=array(
				"slotid"=>$this->input->post('txtSlot')
			);
			$data=array(
				"starttime"=>$stime,
				"endtime"=>$etime
			);
			print_r($data);
			print_r($sid);
			$this->dsm->updateTimeSlot($sid,$data);
			$date=date('Y-m-d',strtotime($this->input->post('txtDate')));
			$ddata=$this->dam->selectDoctorInfo(array("d.userid"=>$this->session->uid));
			$dt=array("date"=>$date,"doctorid"=>$ddata->doctorid);
			$d=$this->dsm->selectSlotByDate($dt);
			echo json_encode($d);
		}
	}
?>