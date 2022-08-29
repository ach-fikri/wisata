<div class="container-fluid">
  <div class="alert alert-success" role="alert">
    <i class="fas fa-university"></i> Input Kategori
  </div>
  <form action="<?= base_url('/admin/kategori/inputaksi') ?>" method="post">
    <div class="row">
      <div class="col-md-6">
        <div class="form-group">
          <label for="">NAMA KATEGORI</label>
          <input type="text" name="nama_kategori" placeholder="Masukkan Kategori" class="form-control">
          <?= form_error('nama_kategori', '<div class="text-danger small">', '</div>'); ?>
        </div>   
        <button type="submit" class="btn btn-primary">Simpan</button>
      </div>
    </div>
  </form>
</div>