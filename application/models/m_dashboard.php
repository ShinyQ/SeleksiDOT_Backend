<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_dashboard extends CI_Model {

  public function getDataBuku(){
    $this->db->select('*');
    $this->db->from('buku');
    $this->db->join('kategori','kategori.id_kategori=buku.id_kategori');
    return $this->db->get()->result();
  }

  public function getDataKategori(){
    $this->db->select('*');
    $this->db->from('kategori');
    return $this->db->get()->result();
  }

  public function data_buku($a)
  {
      return $this->db
                  ->where('id_buku', $a)
                  ->get('buku')
                  ->row();
  }

  public function tambah_buku()
  {

      $data = array(
          'nama_buku' => $this->input->post('nama_buku'),
          'jumlah'=>$this->input->post('jumlah'),
          'penerbit'=>$this->input->post('penerbit'),
          'tahun_terbit'=>$this->input->post('tahun_terbit'),
          'id_kategori'=>$this->input->post('id_kategori')
      );

      $this->db->insert('buku',$data);
        if($this->db->affected_rows()>0){
            return TRUE;
        }else{
            return FALSE;
        }
  }

  public function edit_buku()
  {
      $data = array(
          'nama_buku' => $this->input->post('nama_buku'),
          'jumlah'=>$this->input->post('jumlah'),
          'penerbit'=>$this->input->post('penerbit'),
          'tahun_terbit'=>$this->input->post('tahun_terbit')
      );

      return $this->db->where('id_buku', $this->input->post('id_buku'))
                  ->update('buku', $data);
  }

  public function hapus_buku(){
      $this->db->where('id_buku', $this->input->post('id_buku'));
      $this->db->delete('buku');
  }

}

?>
