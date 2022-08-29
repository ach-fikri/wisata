<?php

class Wisata extends CI_Controller{
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
        $data ['wisata'] = $this->WisataModel->getwisata()->result();
        $this->load->view('templates_administrator/header');
        $this->load->view('templates_administrator/sidebar');
        $this->load->view('admin/wisata', $data);
        $this->load->view('templates_administrator/footer');

      //   var_dump($data);
    }

    public function input(){
        $this->load->view('templates_administrator/header');
        $this->load->view('templates_administrator/sidebar');
        $this->load->view('admin/form_wisata');
        $this->load->view('templates_administrator/footer');

    }


    public function tambah_aksi(){

        $foto = $this->upload();
        $nama_wisata =$this->input->post('nama_wisata');
        $id_kategori =$this->input->post('id_kategori');
        $jam_buka =$this->input->post('Jam_buka');
        $alamat =$this->input->post('alamat');
        $detail =$this->input->post('detail');
    

        $data = array(
            'nama_wisata' => $nama_wisata, 
            'id_kategori' => $id_kategori,
            'jam_buka' => $jam_buka,
            'alamat' => $alamat,
            'detail' =>$detail,
            'foto' =>$foto['file_name']
        );
        // var_dump($data);

        $this->WisataModel->input($data);
        $this->session->set_flashdata(
            'pesan',
            '<div class="alert alert-success alert-dismissible fade show" role="alert">
              Data berhasil ditambahkan
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>'
          );

        redirect('admin/Wisata');
    }

    public function update($id){
      $where = array('id_wisata'=>$id);
      $data['wisata'] = $this->WisataModel->edit($where, 'wisata')->result();
      $this->load->view('templates_administrator/header');
      $this->load->view('templates_administrator/sidebar');
      $this->load->view('admin/edit_wisata',$data);
      $this->load->view('templates_administrator/footer');
    }


    public function update_aksi(){


      $foto = $this->upload();
        $id = $this->input->post('id_wisata');
        $nama_wisata =$this->input->post('nama_wisata');
        $id_kategori =$this->input->post('id_kategori');
        $jam_buka =$this->input->post('Jam_buka');
        $alamat =$this->input->post('alamat');
        $detail =$this->input->post('detail');

        $data = array(
          'nama_wisata' => $nama_wisata, 
          'id_kategori' => $id_kategori,
          'jam_buka' => $jam_buka,
          'alamat' => $alamat,
          'detail' =>$detail,
          'foto' =>$foto['file_name']
      );

    $where = array(
      'id_wisata'=>$id
    );

    $this->KategoriModel->update($where, $data, 'wisata');
       $this->session->set_flashdata(
        'pesan',
        '<div class="alert alert-success alert-dismissible fade show" role="alert">
          Data berhasil update
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>'
      );

      redirect('admin/wisata');
    }

    public function detail($id)
    {
      $data ['wisata'] = $this->WisataModel->detail($id);
    
      $this->load->view('templates_administrator/header');
      $this->load->view('templates_administrator/sidebar');
      $this->load->view('admin/detail_wisata', $data);
      $this->load->view('templates_administrator/footer');
      
    }





    public function delete($id){
      $where = array (
          'id_wisata' => $id
      );

      $this->KategoriModel->delete($where, 'wisata');
      $this->session->set_flashdata(
          'pesan',
          '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            Data berhasil dihapus
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>'
        );

      redirect('admin/wisata');
      }








    function upload()
    {
            $config['upload_path']          = './assets/uploads';
            $config['allowed_types']        = 'gif|jpg|png';
            // $config['max_size']             = 100;
            // $config['max_width']            = 1024;
            // $config['max_height']           = 768;

            $this->load->library('upload', $config);

            if ( $this->upload->do_upload('gambar'))
            {
                   echo "ok";
                   return $this->upload->data();
            }
            else
            {
                  echo "adajdajkd";
            }
    }

} 