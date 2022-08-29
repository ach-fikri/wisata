<?php

class Kategori extends CI_Controller{
  function __construct(){
    parent::__construct();

    if(!isset($this->session->userdata['username'])){
      $this->session->set_flashdata(
        'pesan',
        '<div class="alert alert-danger alert-dismissible fade show" role="alert">
          Anda belum login!
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>'
      );
      redirect('Welcome');
    }
  }

    public function index(){
        $data['kategori']=$this->KategoriModel->getdata()->result();
        $this->load->view('templates_administrator/header');
        $this->load->view('templates_administrator/sidebar');
        $this->load->view('admin/kategori', $data);
        $this->load->view('templates_administrator/footer');
        // var_dump($data);
    }

    public function input(){
        $this->load->view('templates_administrator/header');
        $this->load->view('templates_administrator/sidebar');
        $this->load->view('admin/form_kategori');
        $this->load->view('templates_administrator/footer');
      
    }

    public function inputaksi(){
        $data = array(
            'nama_kategori' =>  $this->input->post('nama_kategori')
        );
        // var_dump($data);

        $this->KategoriModel->input($data);
        $this->session->set_flashdata(
            'pesan',
            '<div class="alert alert-success alert-dismissible fade show" role="alert">
              Data berhasil ditambahkan
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>'
          );

        redirect('admin/Kategori');
    }

    public function update($id){
        $where = array('id_kategori'=>$id);
        $data['kategori']= $this->KategoriModel->edit($where,'kategori')->result();
        // var_dump($data);
        $this->load->view('templates_administrator/header');
        $this->load->view('templates_administrator/sidebar');
        $this->load->view('admin/edit_kategori', $data);
        $this->load->view('templates_administrator/footer');
    }

    public function aksi_update(){
       $id = $this->input->post('id_kategori');
       $nama = $this->input->post('nama_kategori');

       $data = array(
        'id_kategori' => $id,
        'nama_kategori' => $nama
       );

       $where = array(
        'id_kategori'=>$id
       );

       $this->KategoriModel->update($where, $data, 'kategori');
       $this->session->set_flashdata(
        'pesan',
        '<div class="alert alert-success alert-dismissible fade show" role="alert">
          Data berhasil update
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>'
      );

      redirect('admin/Kategori');
    }


    public function delete($id){
        $where = array (
            'id_kategori' => $id
        );

        $this->KategoriModel->delete($where, 'kategori');
        $this->session->set_flashdata(
            'pesan',
            '<div class="alert alert-danger alert-dismissible fade show" role="alert">
              Data berhasil dihapus
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>'
          );

        redirect('admin/kategori');

    }

}