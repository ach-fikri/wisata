<div class="container-fluid">
<?php foreach($wisata as $kw): ?>
<div class="card">
    <img class="card-img-top" src="<?=base_url()?>assets/uploads/<?= $kw->foto;?>" style="width: 30rem;" alt="Card image cap">
    <div class="card-body">
    <h1 class="card-title"><?= $kw->nama_wisata; ?></h1>
    <h5 class="card-title"> Jam Buka : <?= $kw->jam_buka; ?></h5>
    <h5 class="card-title"> Jam Buka : <?= $kw->alamat; ?></h5>
    <p class="card-text"><?= $kw->detail; ?></p>
    <p class="card-text"><small class="text-muted">Last make <?= $kw->created_at?></small></p>
  </div>

</div>
<?= anchor('admin/wisata/update/'.$kw->id_wisata, '<div class="btn btn-primary">Edit</div>') ?>
  <?= anchor('admin/wisata', '<div class="btn btn-warning">Kembali</div>') ?>
<?php endforeach; ?>
</div>