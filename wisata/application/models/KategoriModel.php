<?php

class KategoriModel extends CI_Model{


    public function getdata()
    {
      return  $this->db->get('kategori');
    }

    public function input($data){

        $this->db->insert('kategori', $data);

    }

    public function edit($where, $table){
      return  $this->db->get_where($table, $where);
    }

    public function update($where, $data, $table){
        $this->db->where($where);
        $this->db->update($table, $data);
    }


    public function delete($where, $table){
        $this->db->where($where);
        $this->db->delete($table);
    }



}