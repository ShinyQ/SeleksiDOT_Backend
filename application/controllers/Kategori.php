<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kategori extends CI_Controller {

    public function __construct() {
        parent::__construct();
        if ($this->session->userdata('login')!=TRUE) {
                redirect('admin/login','refresh');
        }
        $this->load->model('m_kategori','kategori');

    }

    public function index()
    {
      $data['judul'] = "Perpus Moklet | Kategori Buku";
      $data['konten'] = "data/v_kategori";
      $data['DataKategori'] = $this->kategori->getDataKategori();
      $this->load->view('template/v_template', $data);
    }

    public function data_kategori($id){
  		$data=$this->kategori->data_kategori($id);
  		echo json_encode($data);
    }

    public function tambah_kategori()
    {
       if($this->input->post('tambah')){
             $this->kategori->tambah_kategori();
             $this->session->set_flashdata('pesan_sukses', 'Sukses Menambah Kategori');
             redirect('kategori');
       }
    }

    public function edit_kategori()
    {
      $this->kategori->edit_kategori();
      $this->session->set_flashdata('pesan_sukses', 'Sukses Mengedit Data Kategori');
      redirect('kategori');
    }

    public function hapus_kategori()
    {
      $this->kategori->hapus_kategori();
      $this->session->set_flashdata('pesan_sukses', 'Sukses Menghapus Data Kategori');
      redirect('kategori');
    }

  }
?>
