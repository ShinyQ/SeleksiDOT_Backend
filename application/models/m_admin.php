<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_admin extends CI_Model {

    public function get_login(){
        $this->db->select('*');
        $this->db->from('admin');
        $this->db->where('username', $this->input->post('username'));
        $this->db->where('password', $this->input->post('password'));
        return $this->db->get();
    }

    public function proses_daftar(){
        $nama=$this->input->post('nama');
        $username=$this->input->post('username');
        $password=$this->input->post('password');
        $datasimpan=array(
            'nama'=>$nama,
            'username'=>$username,
            'password'=>$password,
        );
        $this->db->insert('admin',$datasimpan);
        if($this->db->affected_rows()>0){
            return TRUE;
        }else{
            return FALSE;
        }
    }

}

?>
