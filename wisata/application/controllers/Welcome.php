<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

  public function index(){
	$this->load->view('login');

  }
  
  public function proses_login(){

    $this->form_validation->set_rules('username', 'Username', 'required', ['required' => 'Username wajib diisi']);
    $this->form_validation->set_rules('password', 'Password', 'required', ['required' => 'Password wajib diisi']);
    if($this->form_validation->run() == FALSE){
		$this->load->view('login');
    }
    else{
      $username = $this->input->post('username');
      $password = $this->input->post('password');

      $user = $username;
      $pass = md5($password);

      $cek = $this->Login->cek_login($user, $pass);

      if($cek->num_rows() > 0){
        foreach($cek->result() as $ck){
          $sess_data['username'] = $ck->username;
          $sess_data['email'] = $ck->email;

          $this->session->set_userdata($sess_data);
		  redirect('admin/dashboard');
        }
       
          
        }
     
        else{
          $this->session->set_flashdata(
            'pesan',
            '<div class="alert alert-danger alert-dismissible fade show" role="alert">
              Username atau password salah
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>'
          );
          redirect('welcome');
        }
      }
    }
  

  public function logout(){
    $this->session->sess_destroy();
    redirect('welcome');
  }
}

