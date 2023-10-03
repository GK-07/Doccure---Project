<?php 
	defined('BASEPATH') OR exit('No direct script access allowed');
	class patHomeM extends CI_Model
	{
		public function selectAllCategories()
		{
			return $this->db->get('tblcategory')->result();
		}
		public function countCategories()
		{
			return $this->db->select('COUNT(doctorid) as cc,categoryid')->group_by('categoryid')->get('tbldoctor')->result();
		}
		public function selectDoctors()
		{
			return $this->db->select('d.*,SUM(dr.rating)/COUNT(dr.doctorreviewid) as avgReview,c.*,s.*,ct.*,COUNT(dr.doctorreviewid) as rcount')->from('tbldoctor d')->join('tblcategory c','c.categoryid=d.categoryid')->join('tblcity ct','ct.cityid=d.cityid')->join('tblstate s','s.stateid=ct.stateid')->join('tbldoctorreview dr','dr.doctorid=d.doctorid','left outer')->group_by('d.doctorid')->order_by('avgReview','DESC')->limit(7)->get()->result();
		}
		/*public function docRatingNumber()
		{
			return $this->db->select('SUM(rating)/COUNT(doctorreviewid) as avgReview,doctorid,COUNT(doctorreviewid) as rcount')->group_by('doctorid')->get('tbldoctorreview')->result();
		}*/
		public function selectDoctorsByCat($data)
		{
			return $this->db->select('d.*,SUM(dr.rating)/COUNT(dr.doctorreviewid) as avgReview,c.*,s.*,ct.*,COUNT(dr.doctorreviewid) as rcount')->from('tbldoctor d')->join('tblcategory c','c.categoryid=d.categoryid')->join('tblcity ct','ct.cityid=d.cityid')->join('tblstate s','s.stateid=ct.stateid')->join('tbldoctorreview dr','dr.doctorid=d.doctorid','left outer')->group_by('d.doctorid')->order_by('avgReview','DESC')->where($data)->get()->result();
		}
		public function getCategories()
		{
			return $this->db->get('tblcategory')->result();
		}
		public function getCity()
		{
			$data=array("status"=>1);
			return $this->db->get_where('tblcity',$data)->result();
		}
		public function getFilterData1($city,$cat)
		{
			return $this->db->select('d.*,SUM(dr.rating)/COUNT(dr.doctorreviewid) as avgReview,c.*,s.*,ct.*,COUNT(dr.doctorreviewid) as rcount')->from('tbldoctor d')->join('tblcategory c','c.categoryid=d.categoryid')->join('tblcity ct','ct.cityid=d.cityid')->join('tblstate s','s.stateid=ct.stateid')->join('tbldoctorreview dr','dr.doctorid=d.doctorid','left outer')->group_by('d.doctorid')->order_by('avgReview','DESC')->where_in('d.categoryid',$cat)->where_in('ct.cityid',$city)->get()->result();
		}
		public function getFilterData2($city)
		{
			return $this->db->select('d.*,SUM(dr.rating)/COUNT(dr.doctorreviewid) as avgReview,c.*,s.*,ct.*,COUNT(dr.doctorreviewid) as rcount')->from('tbldoctor d')->join('tblcategory c','c.categoryid=d.categoryid')->join('tblcity ct','ct.cityid=d.cityid')->join('tblstate s','s.stateid=ct.stateid')->join('tbldoctorreview dr','dr.doctorid=d.doctorid','left outer')->group_by('d.doctorid')->order_by('avgReview','DESC')->where_in('ct.cityid',$city)->get()->result();
		}
		public function getFilterData3($cat)
		{
			return $this->db->select('d.*,SUM(dr.rating)/COUNT(dr.doctorreviewid) as avgReview,c.*,s.*,ct.*,COUNT(dr.doctorreviewid) as rcount')->from('tbldoctor d')->join('tblcategory c','c.categoryid=d.categoryid')->join('tblcity ct','ct.cityid=d.cityid')->join('tblstate s','s.stateid=ct.stateid')->join('tbldoctorreview dr','dr.doctorid=d.doctorid','left outer')->group_by('d.doctorid')->order_by('avgReview','DESC')->where_in('d.categoryid',$cat)->get()->result();
		}
	}
?>