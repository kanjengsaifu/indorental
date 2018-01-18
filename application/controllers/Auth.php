<?php
class Auth extends CI_Controller{
    function __construct(){
        parent::__construct();
        $this->load->model('users_m');
    }
 
    function index(){
        $this->load->view('auth/login');
    }

    function nothing(){
        $this->load->view('auth/404');
    }
 
    function authlog(){
        $username=htmlspecialchars($this->input->post('username',TRUE),ENT_QUOTES);
        $password=htmlspecialchars($this->input->post('password',TRUE),ENT_QUOTES);
 
        $authlog=$this->users_m->authlog($username,$password);
 
        if($authlog->num_rows() > 0){ //jika login sebagai dosen
                    $data=$authlog->row_array();
                    $this->session->set_userdata('masuk',TRUE);
                    if($data['id_level_user']=='1'){ //Akses admin
                    $this->session->set_userdata('akses','1');
                    $this->session->set_userdata('ses_us',$data['username']);
                    $this->session->set_userdata('ses_nama',$data['nama_lengkap']);
                    redirect('admin/welcome');
 
                 }
                 if($data['id_level_user']=='2'){ //Akses admin
                    $this->session->set_userdata('akses','1');
                    $this->session->set_userdata('ses_us',$data['username']);
                    $this->session->set_userdata('ses_nama',$data['nama_lengkap']);
                    redirect('gudang/welcome');
 
                 }
                 if($data['id_level_user']=='3'){ //Akses admin
                    $this->session->set_userdata('akses','1');
                    $this->session->set_userdata('ses_us',$data['username']);
                    $this->session->set_userdata('ses_nama',$data['nama_lengkap']);
                    redirect('adm/welcome');
 
                 }
 
    }
}
 
    function logout(){
        $this->session->sess_destroy();
        $url=base_url('');
        redirect($url);
    }
 
}