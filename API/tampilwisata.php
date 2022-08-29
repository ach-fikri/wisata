<?php 

include 'koneksi.php';

$sql = mysqli_query($conn, "SELECT * FROM wisata");
$data = array();

while($get = mysqli_fetch_array($sql)) {
	$data['wisata'][] = [
		'error' => "false",
		'id_wisata' => $get['id_wisata'],
		'nama_wisata' => $get['nama_wisata'],
        'detail' =>  $get['detail'],
		'alamat' =>  $get['alamat'],
		'jam_buka' =>  $get['jam_buka'],
		'foto' =>  $get['foto'],
		'id_kategori' => $get['id_kategori']
	];
}

echo json_encode($data);