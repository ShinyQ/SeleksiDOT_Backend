<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

    public function __construct() {
        parent::__construct();
        if ($this->session->userdata('login')==TRUE) {
              redirect('dashboard','refresh');
      }
        $this->load->model('m_admin','admin');
    }

    public function register(){
    $this->load->view('v_register');
    }

    public function register_akun(){

		if($this->input->post('submit')){

            $this->form_validation->set_rules('nama', 'nama', 'trim|required');
            $this->form_validation->set_rules('username', 'username', 'trim|required');
            $this->form_validation->set_rules('password', 'password', 'trim|required');

			if ($this->form_validation->run() == TRUE) {

				if($this->admin->proses_daftar()==TRUE){
				$this ->session->set_flashdata('pesan_sukses', 'Sukses Menyimpan Data Anda');
				redirect('admin/login','refresh');
				}

				else{
				$this->session->set_flashdata('pesan_gagal', 'Gagal Menyimpan Data Anda');
				redirect('admin/register','refresh');
				}

			}

			else {
					$this->session->set_flashdata('pesan_gagal', validation_errors());
					redirect('admin/register','refresh');
				 }

		}

    }

    public function login(){
		$this->load->view('v_login');
    }

    public function proses_login(){
        if($this->input->post('submit')){
            $this->form_validation->set_rules('username','username', 'trim|required');
            $this->form_validation->set_rules('password','password', 'trim|required');
            if($this->form_validation->run() ==TRUE){
               if($this->admin->get_login()->num_rows()>0){
                   $data=$this->admin->get_login()->row();
                    $array=array(
                        'login'=> TRUE,
                        'nama'=>$data->nama,
                        'id_admin'=>$data->id_admin
                    );
                    $this->session->set_userdata($array);
                    $this->session->set_flashdata('pesan', 'Sukses Masuk Ke Akun');
                    redirect('dashboard','refresh');
                }else{
                    $this->session->set_flashdata('pesan_gagal','Username Atau Password Yang Anda Masukkan Salah');
                    redirect('admin/login','refresh');
                }
            }else{
                $this->session->set_flashdata('pesan_gagal',validation_errors());
                 redirect('admin/login','refresh');
            }
        }
    }

}



?>
