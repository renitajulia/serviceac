<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_toping extends CI_Model
{
    public function customquery($query){		
		return $this->db->query($query);
    }	
    
    //manajemen buku
    public function gettoping()
    {
        return $this->db->get('toping');
    }

    public function topingWhere($where)
    {
        return $this->db->get_where('toping', $where);
    }

    public function simpantoping($data = null)
    {
        $this->db->insert('toping',$data);
    }

    public function updatetoping($data = null, $where = null)
    {
        $this->db->update('toping', $data, $where);
    }

    public function hapustoping($where = null)
    {
        $this->db->delete('toping', $where);
    }
}