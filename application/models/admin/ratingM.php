<?php
  defined('BASEPATH') OR exit('No direct script access allowed');

  class ratingM extends CI_Model
  {
    public function selectRating()
    {
      return $this->db->select('r.*,d.fullname,p.name,d.profileimage as dp,p.profileimage as pp')->from('tbldoctorreview r')->join('tbldoctor d','d.doctorid=r.doctorid')->join('tblpatient p','p.patientid=r.patientid')->get()->result();
    }
    public function deleteRating($id)
	{
		$this->db->delete('tbldoctorreview',$id);
	}
  }
?>