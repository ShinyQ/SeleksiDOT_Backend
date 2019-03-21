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

  public function tambah_buku($cover_buku)
  {

    if ($cover_buku=="") {
             $object = array(
                'nama_buku' => $this->input->post('nama_buku'),
                'jumlah' => $this->input->post('jumlah'),
                'id_kategori' => $this->input->post('id_kategori'),
                'penerbit' => $this->input->post('penerbit'),
                'tahun_terbit' => $this->input->post('tahun_terbit'),
                'tanggal_masuk' => $this->input->post('tanggal_masuk')
             );
        }else{
            $object = array(
              'nama_buku' => $this->input->post('nama_buku'),
              'jumlah' => $this->input->post('jumlah'),
              'id_kategori' => $this->input->post('id_kategori'),
              'penerbit' => $this->input->post('penerbit'),
              'tahun_terbit' => $this->input->post('tahun_terbit'),
              'tanggal_masuk' => $this->input->post('tanggal_masuk'),
              'cover_buku' => $cover_buku
             );
        }
        return $this->db->insert('buku', $object);
  }

  public function edit_buku()
  {
      $data = array(
          'nama_buku' => $this->input->post('nama_buku'),
          'jumlah'=>$this->input->post('jumlah'),
          'penerbit'=>$this->input->post('penerbit'),
          'tahun_terbit'=>$this->input->post('tahun_terbit'),
          'tanggal_masuk'=>$this->input->post('tanggal_masuk')
      );

      return $this->db->where('id_buku', $this->input->post('id_buku'))
                  ->update('buku', $data);
  }

  public function edit_buku_dengan_cover($cover_buku)
  {
    $data = array(
        'nama_buku' => $this->input->post('nama_buku'),
        'jumlah'=>$this->input->post('jumlah'),
        'penerbit'=>$this->input->post('penerbit'),
        'tahun_terbit'=>$this->input->post('tahun_terbit'),
        'tanggal_masuk'=>$this->input->post('tanggal_masuk'),
        'cover_buku'=> $cover_buku
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
