<?php 

include 'koneksi.php';

$sql = mysqli_query($conn, "SELECT * FROM kategori");
$data = array();

while($get = mysqli_fetch_array($sql)) {
	$data['kategori'][] = [
		'error' => "false",
		'id_kategori' => $get['id_kategori'],
		'nama_kategori' => $get['nama_kategori']
	];
}

echo json_encode($data);