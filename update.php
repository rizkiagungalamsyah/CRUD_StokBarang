<?php
  include "koneksi.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Halaman Update data</title>

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

</head>
<body>

  <?php

    $id = $_GET['id'];

    $query = "SELECT * FROM tbbarang WHERE id = $id";
    
    $result = mysqli_query($koneksi, $query);
    foreach($result as $data) {
  ?>

  <section class="row">
    <div class="col-md-6 offset-md-3 align-self-center"> 
      <h1 class="text-center mt-4">Form Update Data</h1>
      <form method="POST">
        <!-- Inputan tersembunyi untuk menyimpan data id yang digunakan untuk mengupdate data, lebih aman di banding menggunakan id dari params -->
        <input type="hidden" value="<?= $data['id'] ?>" name="id">
        <div class="mb-3">
          <label for="inputNis" class="form-label">Nama Barang</label>
          <input type="text" class="form-control" id="inputNama" value="<?= $data['nama'] ?>" name="nama" placeholder="Masukan Nama Barang">
        </div>
        <div class="mb-3">
          <label for="inputNama" class="form-label">Kategori</label>
          <input type="text" class="form-control" id="inputKategori" value="<?= $data['kategori'] ?>" name="kategori" placeholder="Masukan Kategori">
        </div>
        <div class="mb-3">
          <label for="inputKelas" class="form-label">Jumlah</label>
          <input type="text" class="form-control" id="inputJumlah" value="<?= $data['jumlah'] ?>" name="jumlah" placeholder="Masukan Jumlah">
        </div>
        <input name="daftar" type="submit" class="btn btn-primary" value="Update">
        <a href="index.php" type="button" class="btn btn-info text-white">Kembali</a>
      </form>
    </div>
  </section>

  <?php } ?>

  <?php
    
    // Buat kondisi jika tombol data di klik
    if(isset($_POST['daftar'])){
      // Membuat variable setiap field inputan agar kodingan lebih rapi.
      $id = $_POST['id'];
      $nama = $_POST['nama'];
      $kategori = $_POST['kategori'];
      $jumlah = $_POST['jumlah'];

      // Membuat Query
      $query = "UPDATE tbbarang SET nama = '$nama', kategori = '$kategori', jumlah = '$jumlah' WHERE id = '$id'";

      $result = mysqli_query($koneksi, $query);

      if($result){
        
      } else {
        echo "<script>alert('Data Gagal di update!')</script>";
      }

    }    

  ?>

</body>
</html>