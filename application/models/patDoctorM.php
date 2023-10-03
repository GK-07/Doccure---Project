<?php 
	defined('BASEPATH') OR exit('No direct script access allowed');
	class patDoctorM extends CI_Model
	{
		public function selectDoctors()
		{
			return $this->db->select('d.*,SUM(dr.rating)/COUNT(dr.doctorreviewid) as avgReview,c.*,s.*,ct.*,COUNT(dr.doctorreviewid) as rcount')->from('tbldoctor d')->join('tblcategory c','c.categoryid=d.categoryid')->join('tblcity ct','ct.cityid=d.cityid')->join('tblstate s','s.stateid=ct.stateid')->join('tbldoctorreview dr','dr.doctorid=d.doctorid','left outer')->group_by('d.doctorid')->order_by('avgReview','DESC')->get()->result();
		}
		public function getCategories()
		{
			return $this->db->get('tblcategory')->result();
		}
		public function getFilterData($gender,$cat)
		{
			return $this->db->select('d.*,SUM(dr.rating)/COUNT(dr.doctorreviewid) as avgReview,c.*,s.*,ct.*,COUNT(dr.doctorreviewid) as rcount')->from('tbldoctor d')->join('tblcategory c','c.categoryid=d.categoryid')->join('tblcity ct','ct.cityid=d.cityid')->join('tblstate s','s.stateid=ct.stateid')->join('tbldoctorreview dr','dr.doctorid=d.doctorid','left outer')->group_by('d.doctorid')->order_by('avgReview','DESC')->where_in('d.categoryid',$cat)->where_in('d.gender',$gender)->get()->result();
		}
		public function selectDoctorsByPop()
		{
			return $this->db->select('d.*,SUM(dr.rating)/COUNT(dr.doctorreviewid) as avgReview,c.*,s.*,ct.*,COUNT(dr.doctorreviewid) as rcount,COUNT(a.appointmentid) as acount')->from('tbldoctor d')->join('tblcategory c','c.categoryid=d.categoryid')->join('tblcity ct','ct.cityid=d.cityid')->join('tblstate s','s.stateid=ct.stateid')->join('tbldoctorreview dr','dr.doctorid=d.doctorid','left outer')->join('tblappointment a','a.doctorid=d.doctorid','left outer')->group_by('d.doctorid')->order_by('acount','DESC')->get()->result();
		}
		public function selectDoctorsByLatest()
		{
			return $this->db->select('d.*,SUM(dr.rating)/COUNT(dr.doctorreviewid) as avgReview,c.*,s.*,ct.*,COUNT(dr.doctorreviewid) as rcount,COUNT(a.appointmentid) as acount')->from('tbldoctor d')->join('tblcategory c','c.categoryid=d.categoryid')->join('tblcity ct','ct.cityid=d.cityid')->join('tblstate s','s.stateid=ct.stateid')->join('tbldoctorreview dr','dr.doctorid=d.doctorid','left outer')->join('tblappointment a','a.doctorid=d.doctorid','left outer')->group_by('d.doctorid')->order_by('d.rtime','DESC')->get()->result();	
		}
		public function getDoctor($data)
		{
			return $this->db->select('d.*,SUM(dr.rating)/COUNT(dr.doctorreviewid) as avgReview,c.*,s.*,ct.*,COUNT(dr.doctorreviewid) as rcount')->from('tbldoctor d')->join('tblcategory c','c.categoryid=d.categoryid')->join('tblcity ct','ct.cityid=d.cityid')->join('tblstate s','s.stateid=ct.stateid')->join('tbldoctorreview dr','dr.doctorid=d.doctorid','left outer')->group_by('d.doctorid')->where($data)->get()->result()[0];
		}
		public function getDoctorSocial($data)
		{
			 $query=$this->db->get_where('tblsocial',$data)->result();
			 if(count($query)>0)
			 {
			 	return $query[0];
			 }
		}
		public function getCertificate($data)
		{
			return $this->db->from('tbldoctorcertificates dc')->join('tblcertificate c','c.certificateid=dc.certificateid')->where($data)->get()->result();
		}
		public function getReviews($data)
		{
			$query=$this->db->select('p.*,dr.*')->from('tbldoctorreview dr')->join('tblpatient p','p.patientid=dr.patientid')->where($data)->get()->result();
			if(isset($query[0]->doctorreviewid))
			 {
			 	return $query;
			 }
		}
		public function getPatient($data)
		{
			return $this->db->get_where('tblpatient',$data)->result()[0];
		}
		public function addReview($data)
		{
			$this->db->insert('tbldoctorreview',$data);
		}
		public function updateReview($id,$data)
		{
			$this->db->where($id)->update('tbldoctorreview',$data);
		}
		public function getSlot($data)
		{
			return $this->db->get_where('tblslot',$data)->result();
		}
		public function insertAppointment($data)
		{
			$this->db->insert('tblappointment',$data);
		}
		public function insertReport($data)
		{
			$this->db->insert('tblcomplaint',$data);	
		}
		public function insertReport1($data)
		{
			$this->db->insert('tbllabcomplaint',$data);	
		}
	}
?>