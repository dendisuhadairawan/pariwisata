<?php
//load koneksi database
include '../../koneksi.php';

//ambil data dari form
$id = $_POST['id'];
$nama_destinasi_post = $_POST['nama_destinasi_post'];
$deskripsi_post = $_POST['deskripsi_post'];
$kategori_post = $_POST['kategori'];
//

//proses upload gambar
$nama_file = $_FILES['gambar_post']['name'];
$source = $_FILES['gambar_post']['tmp_name'];
$folder = './gambar/';
move_uploaded_file($source, $folder . $nama_file);
//
//update data ke database
$update = mysqli_query($koneksi, "UPDATE destinasi SET 
 nama_destinasi = '$nama_destinasi_post',
 deskripsi = '$deskripsi_post',
 gambar = '$nama_file',
 id_kategori = '$kategori_post'
 WHERE id = '$id'");
//cek apakah proses edit ke database berhasil
if ($update) {
  //jika berhasil tampilkan pesan berhasil edit data
  echo "<script>
 alert('Data Berhasil Diubah');
 window.location.href='index.php?page=destinasi';
 </script>";
} else {
  //jika gagal tampilkan pesan gagal edit data
  echo "<script>
 alert('Data Gagal Diubah');
 window.location.href='index.php?page=destinasi';
 </script>";
}
 //
