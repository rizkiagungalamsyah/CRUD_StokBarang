<?php
  include "koneksi.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Halaman Tambah data</title>

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

</head>
<body>

  <section class="row">
    <div class="col-md-6 offset-md-3 align-self-center"> 
      <h1 class="text-center mt-4">Form Tambah Data</h1>
      <form method="POST">
        <div class="mb-3">
          <label for="inputNis" class="form-label">Nama Barang</label>
          <input type="text" class="form-control" id="inputNama" name="nama" placeholder="Masukan Nama Barang">
        </div>
        <div class="mb-3">
          <label for="inputNama" class="form-label">Kategori</label>
          <input type="text" class="form-control" id="inputKategori" name="kategori" placeholder="Masukan Kategori">
        </div>
        <div class="mb-3">
          <label for="inputKelas" class="form-label">Jumlah</label>
          <input type="text" class="form-control" id="inputJumlah" name="jumlah" placeholder="Masukan Jumlah">
        </div>
        <input name="daftar" type="submit" class="btn btn-primary" value="Tambah">
        <a href="index.php" type="button" class="btn btn-info text-white">Kembali</a>
      </form>
    </div>
  </section>

  <?php
    
    if(isset($_POST['daftar'])){
      
      $nama = $_POST['nama'];
      $kategori = $_POST['kategori'];
      $jumlah = $_POST['jumlah'];

      $query = "INSERT INTO tbbarang (nama, kategori, jumlah) VALUES('".$nama."', '".$kategori."', '".$jumlah."')";

      $result = mysqli_query($koneksi, $query);

      if($result){
        
      } else {
        echo "<script>alert('Data Gagal di tambahkan!')</script>";
      }

    }    

  ?>

</body>
</html>