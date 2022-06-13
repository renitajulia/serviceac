<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class M_member extends CI_Model{	

	function cek_login($query){		
		return $this->db->query($query);
	}	

	public function daftar($data){		
		
		// Query to insert data in database
		$this->db->insert('user', $data);
		if ($this->db->affected_rows() > 0) {
			return true;
			
		} else {
			return false;
		}
	}
	public function customquery($query){		
		return $this->db->query($query);
	}
	public function updatemember($data = null, $where = null)
    {
        $this->db->update('user', $data, $where);
	}
	public function memberWhere($where)
    {
        return $this->db->get_where('user', $where);
	}
	public function hapusmember($where = null)
    {
        $this->db->delete('user', $where);
    }
}