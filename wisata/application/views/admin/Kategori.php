<div class="container-fluid">
  <div class="alert alert-success" role="alert">
    <i class="fas fa-university"></i> KATEGORI
  </div>
  <?= $this->session->flashdata('pesan'); ?>

  <?= anchor('admin/Kategori/input', '<button class="btn btn-primary btn-sm mb-2"><i class="fas fa-plus fa-sm"></i> Tambah Kategori</button>') ?>

  <table class="table table-bordered table-striped table-hover">
    <tr>
      <th>NO</th>
      <th>NAMA KATEGORI</th>
      <th>TANGGAL DIBUAT</th>
      <th colspan="2">AKSI</th>
    </tr>

    <?php
    $no = 1;
    foreach($kategori as $kw): ?>
    <tr>
      <td width="20px"><?= $no++; ?></td>
      <td><?= $kw->nama_kategori; ?></td>
      <td><?= $kw->created_at; ?></td>
      <td width="20px"><?= anchor('admin/Kategori/update/'.$kw->id_kategori, '<div class="btn btn-sm btn-primary "><i class="fa fa-edit"></i></div>') ?></td>
      <td width="20px"><?= anchor('admin/Kategori/delete/'.$kw->id_kategori, '<div onclick="return confirm(\'Yakin akan menghapus?\')" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></div>') ?></td>
      
    </tr>
    <?php endforeach; ?>
  </table>
</div>
btn btn-info btn-circl
