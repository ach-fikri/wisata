<div class="container-fluid">

  <div class="alert alert-success" role="alert">
    <i class="fas fa-university"></i> Informasi
  </div>

  <?= $this->session->flashdata('pesan'); ?>

  <?= anchor('admin/wisata/input', '<button class="btn btn-primary btn-sm mb-2"><i class="fas fa-plus fa-sm"></i> Tambah Informasi</button>') ?>

  <table id="tabel" class="table table-striped table-hover table-borderd">
    <tr>
      <th>NO</th>
      <th>FOTO</th>
      <th>KATEGORI</th>
      <th>NAMA WISATA</th>
    
      <th colspan="3">AKSI</th>
    </tr>

    <?php 
    $no = 1;
    foreach($wisata as $w): ?>
    <tr>
      <td width="20px;"><?= $no++; ?></td>
      <td><img src="<?= base_url()?>assets/uploads/<?= $w->foto?>" width="30px" alt="foto wisata"></td>
      <td><?= $w->nama_kategori; ?></td>
      <td><?= $w->nama_wisata; ?></td>
      
      <td width="20px"><?= anchor('admin/wisata/detail/'.$w->id_wisata, '<div class="btn btn-sm btn-info"><i class="fa fa-info"></i></div>') ?></td>
      <td width="20px"><?= anchor('admin/wisata/update/'.$w->id_wisata, '<div class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></div>') ?></td>
      <td width="20px"><?= anchor('admin/wisata/delete/'.$w->id_wisata, '<div onclick="return confirm(\'Yakin akan menghapus?\')" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></div>') ?></td>
    </tr>
    <?php endforeach; ?>
  </table>
</div>