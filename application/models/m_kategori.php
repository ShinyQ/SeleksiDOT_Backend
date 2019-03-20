<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_kategori extends CI_Model {

  public function getDataKategori(){
    $this->db->select('*');
    $this->db->from('kategori');
    return $this->db->get()->result();
  }


  public function data_kategori($a)
  {
      return $this->db
                  ->where('id_kategori', $a)
                  ->get('kategori')
                  ->row();
  }

  public function tambah_kategori()
  {

      $data = array(
          'nama_kategori' => $this->input->post('nama_kategori')
      );

      $this->db->insert('kategori',$data);
        if($this->db->affected_rows()>0){
            return TRUE;
        }else{
            return FALSE;
        }
  }

  public function edit_kategori()
  {
      $data = array(
          'nama_kategori' => $this->input->post('nama_kategori')
      );

      return $this->db->where('id_kategori', $this->input->post('id_kategori'))
                  ->update('kategori', $data);
  }

  public function hapus_kategori(){
      $this->db->where('id_kategori', $this->input->post('id_kategori'));
      $this->db->delete('kategori');
  }

}

?>
