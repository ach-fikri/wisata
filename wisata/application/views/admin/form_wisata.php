<div class="container-fluid">
  <div class="alert alert-success" role="alert">
    <i class="fas fa-plus"></i> Form Wisata
  </div>

  <form action="<?= base_url('admin/wisata/tambah_aksi') ?>" method="post" enctype="multipart/form-data">
  <div class="row">
    <div class="col-md-6">



      <div class="form-group">
        <label for="">NAMA WISATA</label>
        <!-- <input type="hidden" name="id_kategori" class="form-control" value=" //$id_wisata;"> -->
        <input type="text" name="nama_wisata" class="form-control" >
      </div>
      
      <div class="form-group">
        <label for="">KATEGORI</label>
        <?php
        $query = $this->db->query("SELECT id_kategori, nama_kategori FROM kategori");

        $dropdowns = $query->result();
        foreach($dropdowns as $dropdown){
          $dropdownsList[$dropdown->id_kategori] = $dropdown->nama_kategori;
        }

        echo form_dropdown('id_kategori', $dropdownsList,  'class="form-control" id="id_kategori"');
        ?>
      </div>
      <div class="form-group">
        <label for="">JAM BUKA</label>
        <input type="text" name="Jam_buka" class="form-control">
      </div>
      
      <div class="form-group">
        <label for="">ALAMAT</label>
        <input type="text" name="alamat" class="form-control">
      </div>

      <div class="form-group">
        <label for="">DETAIL</label>
        <input type="text" name="detail" class="form-control">
      </div>

      <div class="form-group">
        <label for="">FOTO</label>
        <input type="file" name="gambar" class="form-control">
      </div>

      <button type="submit" class="btn btn-primary">Simpan</button>
      <?= anchor('admin/wisata', '<div class="btn btn-warning">Kembali</div>') ?>

    </div>
  </div>

  </form>
</div>