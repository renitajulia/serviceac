<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class M_login extends CI_Model{	

	function cek_login($query){		
		return $this->db->query($query);
	}	
}