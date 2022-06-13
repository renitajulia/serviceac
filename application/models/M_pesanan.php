<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_pesanan extends CI_Model
{

    public function get($tbl, $where = null)
    {
        // jika ada where nya
        if ($where != null) {
            $this->db->where($where);
        }
        return $this->db->get($tbl);
    }

    function insert($tbl, $data)
    {
        $this->db->insert($tbl, $data);
        return ($this->db->affected_rows() != 1) ? false : true;
    }

    function update($table, $data, $pk = "id", $id)
    {
        $this->db->where($pk, $id);
        $hasil = $this->db->update($table, $data);
        return $hasil;
    }
}
