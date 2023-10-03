<?php 
	defined('BASEPATH') OR exit('No direct script access allowed');
	class docReviewsM extends CI_Model
	{
		public function selectDocReviews($data)
		{
			return $this->db->select('dr.*,p.*')->from('tbldoctorreview dr')->join('tbldoctor d','d.doctorid=dr.doctorid')->join('tblpatient p','p.patientid=dr.patientid')->where($data)->get()->result();
		}
	}
?>