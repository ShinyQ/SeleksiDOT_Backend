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
    if($this->input->post('submit')){
		$this->form_validation->set_rules('nama_buku', 'nama_buku', 'trim|required');
		$this->form_validation->set_rules('jumlah', 'jumlah', 'trim|required');
		$this->form_validation->set_rules('id_kategori', 'id_kategori', 'trim|required');
		$this->form_validation->set_rules('penerbit', 'penerbit', 'trim|required');
		$this->form_validation->set_rules('tahun_terbit', 'tahun_terbit', 'trim|required');
		$this->form_validation->set_rules('tanggal_masuk', 'tanggal_masuk', 'trim|required');
		if ($this->form_validation->run()==TRUE) {
			$config['upload_path'] = './assets/cover/';
			$config['allowed_types'] = 'gif|jpg|png';
			$config['max_size']  = '2000';
			$config['max_width']  = '5000';
			$config['max_height']  = '5000';
			if ($_FILES['cover_buku']['name']!="") {
				$this->load->library('upload', $config);

				if (! $this->upload->do_upload('cover_buku')) {
					$this->session->set_flashdata('pesan', $this->upload->display_errors());
				}else {
					if ($this->dashboard->tambah_buku($this->upload->data('file_name'))) {
						$this->session->set_flashdata('pesan_sukses', 'Sukses menambah buku');
					}else{
						$this->session->set_flashdata('pesan_gagal', 'Gagal menambah buku');
					}
					redirect('dashboard','refresh');
				}
			}else{
				if ($this->dashboard->tambah_buku('')) {
					$this->session->set_flashdata('pesan_sukses', 'Sukses menambah buku');
				}else{
					$this->session->set_flashdata('pesan_gagal', 'Gagal menambah buku');
				}
				redirect('dashboard','refresh');
			}

		}else{
			$this->session->set_flashdata('pesan', validation_errors());
			redirect('dashboard','refresh');
		}
  }
	}

    public function edit_buku()
    {
      if($this->input->post('edit')){
			if($_FILES['cover_buku']['name']==""){
				if($this->dashboard->edit_buku()){
					$this->session->set_flashdata('pesan_sukses', 'Sukses Edit Data');
					redirect('dashboard','refresh');
				} else {
					$this->session->set_flashdata('pesan_gagal', 'Gagal Edit Data');
					redirect('dashboard','refresh');
				}
			} else {
        $config['upload_path'] = './assets/cover/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size']  = '2000';
        $config['max_width']  = '5000';
        $config['max_height']  = '5000';

				$this->load->library('upload', $config);

				if ( ! $this->upload->do_upload('cover_buku')){
					$this->session->set_flashdata('pesan_gagal', 'Gagal Upload Foto');
					redirect('dashboard','refresh');
				}
				else{
					if($this->dashboard->edit_buku_dengan_cover($this->upload->data('file_name'))){
						$this->session->set_flashdata('pesan_sukses', 'Sukses Edit Data');
						redirect('dashboard','refresh');
					} else {
						$this->session->set_flashdata('pesan_gagal', 'Gagal update data');
						redirect('dashboard','refresh');
					}
				}
			}

		}
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
