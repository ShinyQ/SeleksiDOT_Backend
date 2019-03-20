<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

    public function __construct() {
        parent::__construct();
        if ($this->session->userdata('login')!=TRUE) {
                redirect('admin/login','refresh');
        }
        $this->load->model('m_dashboard','dashboard');

    }

    public function index()
    {
      $data['judul'] = "Perpus Moklet | Data Buku";
      $data['konten'] = "data/v_buku";
      $data['DataBuku'] = $this->dashboard->getDataBuku();
      $data['getKategori'] = $this->dashboard->getDataKategori();
      $this->load->view('template/v_template', $data);
    }

    public function data_buku($id){
  		$data=$this->dashboard->data_buku($id);
  		echo json_encode($data);
    }

    public function tambah_buku()
    {
       if($this->input->post('tambah')){
             $this->dashboard->tambah_buku();
             $this->session->set_flashdata('pesan_sukses', 'Sukses Menambah Buku');
             redirect('dashboard');
       }
    }

    public function edit_buku()
    {
      $this->dashboard->edit_buku();
      $this->session->set_flashdata('pesan_sukses', 'Sukses Mengedit Data Buku');
      redirect('dashboard');
    }

    public function hapus_buku()
    {
      $this->dashboard->hapus_buku();
      $this->session->set_flashdata('pesan_sukses', 'Sukses Menghapus Data Buku');
      redirect('dashboard');
    }

    public function logout(){
      $this->session->sess_destroy();
      $this->session->set_flashdata('pesan', 'Sukses Keluar Akun');
      redirect('admin/login','refresh');
    }

}
?>
