<div class="container-fluid">
  <div class="alert alert-success" role="alert">
    <i class="fas fa-plus"></i> Form Wisata
  </div>


  <?php foreach($wisata as $w): ?>
  <form action="<?= base_url('admin/wisata/update_aksi') ?>" method="post" enctype="multipart/form-data">
  <div class="row">
    <div class="col-md-6">  
      <div class="form-group">
        <label for="">NAMA WISATA</label>
        <input type="hidden" name="id_wisata" class="form-control" value=" <?= $w->id_wisata?>">
        <input type="text" name="nama_wisata" class="form-control" value="<?=$w->nama_wisata?>">
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
        <input type="text" name="Jam_buka" class="form-control" value="<?= $w->jam_buka?>">
      </div>
      
      <div class="form-group">
        <label for="">ALAMAT</label>
        <input type="text" name="alamat" class="form-control" value="<?= $w->alamat?>">
      </div>

      <div class="form-group">
        <label for="">DETAIL</label>
        <input type="text" name="detail" class="form-control" value="<?= $w->detail?>">
      </div>

      <div class="form-group">
        <label for="">FOTO</label>
        <input type="file" name="gambar" class="form-control" value="<?= $W->foto?>">
      </div>

      <button type="submit" class="btn btn-primary">Simpan</button>
      <?= anchor('admin/wisata', '<div class="btn btn-warning">Kembali</div>') ?>

    </div>
  </div>

  </form>
 <?php endforeach?>
</div>