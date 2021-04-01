<?php

/**
 * 
 */
class Export_model extends CI_model
{
	
	public function feedbacklist()
	{
		$query = $this->db->select(['name','email','feedback'])
						->from('feedback')
						->get();
						return $query->result();
	}
}
?>