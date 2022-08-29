<div class="container-fluid">
  <div class="alert alert-success" role="alert">
    <i class="fas fa-university"></i> Form Update Kategori
  </div>

  <?php foreach($kategori as $k): ?>
  <form action="<?= base_url('/admin/Kategori/aksi_update') ?>" method="post">

    <div class="row">
      <div class="col-md-6">

        <div class="form-group">
          <label for="">NAMA KATEGORI</label>
          <input type="hidden" name="id_kategori" value="<?= $k->id_kategori; ?>">
          <input type="text" name="nama_kategori" class="form-control" value="<?= $k->nama_kategori; ?>">
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>

      </div>
    </div>

  </form>
  <?php endforeach; ?>
</div>