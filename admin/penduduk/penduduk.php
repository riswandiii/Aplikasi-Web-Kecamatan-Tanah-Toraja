<?php 
// cek jika belom login
session_start();
if(!isset($_SESSION['login']))
{
    header("Location: ../../login.php");
    exit;
}


    //koneksi kehalaman functions.php
    require 'functions.php';
    
     $tb_penduduk = query("SELECT * FROM tb_penduduk 
                           INNER JOIN tb_kelurahan ON tb_penduduk.id_kelurahan = tb_kelurahan.id_kelurahan 
                           INNER JOIN tb_pendidikan ON tb_penduduk.id_pendidikan = tb_pendidikan.id_pendidikan 
                           INNER JOIN tb_pekerjaan ON tb_penduduk.id_pekerjaan = tb_pekerjaan.id_pekerjaan
                            ");

    //jika tombol cari ditekna
    // if(isset($_POST['search'])){
	// $agenda = cari($_POST['keyword']);
// }

?>


<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Data Penduduk</title>

    <style>

html body {
   background-image: url('../../img/toraja3.jpg');
   background-size: cover;
   background-position: center;
   background-repeat: no-repeat;
}

    #email, #password, #login {
        border-radius: 25px;
    }

    #card {
        background-color: white;
        border-radius: 20px;
    }

    #container-fluid {
        background-color: black;
        opacity: 0.9;
        height: 700px;
    }

</style>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
  </head>
  <body>
  
  <div class="container-fluid" id="container-fluid">

    <div class="row text-white text-center">
        <div class="col-lg-12 mt-5">
            <h3>Data Tabel Penduduk</h3>
        </div>
    </div>

    <div class="row py-3 mb-3">
        <div class="col-lg-12">
            <a href="tambah.php" class="btn btn-primary btn-sm">Tambah Data Penduduk</a>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="table-responisve">
               <small>
               <table class="table table-sm table-striped table-bordered text-white">
                    <thead class="bg-dark">
                        <tr data-aos="fade-right" data-aos-duration="2000">
                            <th>No</th>
                            <th>Kelurahan</th>
                            <th>Nik</th>
                            <th>No Kartu Keluarga</th>
                            <th>Nama Lengkap</th>
                            <th>Tempat Lahir</th>
                            <th>Tanggal Lahir</th>
                            <th>Alamat</th>
                            <th>Jenis Kelamin</th>
                            <th>Agama</th>
                            <th>Status</th>
                            <th>Pendidikan</th>
                            <th>Pekerjaan</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php $i = 1; ?>
                    <?php foreach($tb_penduduk as $penduduk) : ?>

                        <tr data-aos="fade-right" data-aos-duration="2000">
                            <td class="colom text-white"><?php echo $i; ?></td>
                            <td class="text-white"><?php echo $penduduk['nama_kelurahan']; ?></td>
                            <td class="text-white"><?php echo $penduduk['nik']; ?></td>
                            <td class="text-white"><?php echo $penduduk['no_kartu_keluarga']; ?></td>
                            <td class="text-white"><?php echo $penduduk['nama_lengkap']; ?></td>
                            <td class="text-white"><?php echo $penduduk['tempat_lahir']; ?></td>
                            <td class="text-white"><?php echo $penduduk['tangal_lahir']; ?></td>
                            <td class="text-white"><?php echo $penduduk['alamat']; ?></td>
                            <td class="text-white"><?php echo $penduduk['jenis_kelamin']; ?></td>
                            <td class="text-white"><?php echo $penduduk['agama']; ?></td>
                            <td class="text-white"><?php echo $penduduk['status']; ?></td>
                            <td class="text-white"><?php echo $penduduk['pendidikan']; ?></td>
                            <td class="text-white"><?php echo $penduduk['pekerjaan']; ?></td>
                            <td class="aksi">
                                <button class="btn btn-danger btn-sm"><a class="text-decoration-none text-dark" href="hapus.php?id_penduduk=<?php echo $penduduk['id_penduduk']; ?>"onclick="return confirm('Yakin ingin hapus');">Hapus</a></button> ||
                                <button class="btn btn-primary btn-sm"><a  class="text-decoration-none text-dark" a href="ubah.php?id_penduduk=<?php echo $penduduk['id_penduduk']; ?>">Ubah</a></button>
                            </td>
                        </tr>

                    <?php $i++; ?>
                    <?php endforeach; ?>

                    </tbody>
                </table>
               </small>
            </div>
        </div>
    </div>

    <div class="row mt-3">
        <div class="col-lg-12">
            <a href="../dashboard.php" class="btn btn-success btn-sm">Back to Dassboard</a>
        </div>
    </div>

 <br><br>
</div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
  </body>
</html>