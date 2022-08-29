<?php

class WisataModel extends CI_Model{

public function getwisata(){

    $this->db->select('*');
    $this->db->from('wisata');
    $this->db->join('kategori','kategori.id_kategori = wisata.id_wisata');      
    $query = $this->db->get();
    return $query;
}

public function detail($id) {
    $this->db->select('*');
    $this->db->from('kategori');
    $this->db->join('wisata', 'wisata.id_wisata = kategori.id_kategori', 'left');
    $this->db->where('wisata.id_wisata', $id);
    return $this->db->get()->result();
  }
public function input($data){
    $this->db->insert('wisata', $data);
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