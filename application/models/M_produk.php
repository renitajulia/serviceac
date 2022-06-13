<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_produk extends CI_Model
{
    public function customquery($query){		
		return $this->db->query($query);
    }	
    
    //manajemen buku
    public function getproduk()
    {
        return $this->db->get('produk');
    }

    public function produkWhere($where)
    {
        return $this->db->get_where('produk', $where);
    }

    public function simpanproduk($data = null)
    {
        $this->db->insert('produk',$data);
    }

    public function updateproduk($data = null, $where = null)
    {
        $this->db->update('produk', $data, $where);
    }

    public function hapusproduk($where = null)
    {
        $this->db->delete('produk', $where);
    }
     //join
     public function joindetail_produk($where)
     {
         /* Salah disini, yang ditampilin sebelumnya hanya 2 field saja, yaitu, id_kategori di tabel buku dan kategori di tabel kategori
         padahal di controller home function detailbuku variabelnya memanggil semua field,
         jadi harus dirubah query mySQLnya untuk menampilkan semua data dengan (*)
          */
         $this->db->select('*'); // <----- Salah disini
         $this->db->from('detail');
         $this->db->join('produk','detail.id_produk = produk.id_produk');
         $this->db->where($where);
         return $this->db->get();
     }
}