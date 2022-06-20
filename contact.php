<?php

// cek jika belom login
session_start();
require 'koneksi.php';
if(!isset($_SESSION['login']))
{
    header("Location: login_user.php");
    exit;
}

$id_user = $_SESSION['id_user'];
$user = mysqli_query($conn, "SELECT * FROM tb_user WHERE id_user = '$id_user' ");
$usr = mysqli_fetch_array($user);

?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Contact</title>

    <!-- Css Boostrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

    <style>
       #ul {
        position: relative;
        z-index: 200;
      }
      
      #container-fluid {
            height: 580px;
        }
    </style>

    <!-- {{-- Link Animation aos --}} -->
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />

     <!-- {{-- Link Style Css --}} -->
     <link rel="stylesheet" href="css/home.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

  </head>
  <body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg bg-dark navbar-dark">
  <div class="container">
    <a class="navbar-brand" href="#">KECAMATAN TORAJA</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="kelurahan.php">Kelurahan</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="contact.php">Contact</a>
        </li>
      </ul>
      <ul class="navbar-nav ms-auto">
        <?php if(isset($_SESSION['login'])) { ?>
          <li class="nav-item">
            <a class="nav-link" href="profil.php">Welcome, <?php echo $usr['nama_lengkap'] ?></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="logout.php"> || Logout</a>
          </li>
        <?php }else{ ?>
          <li class="nav-item">
            <a class="nav-link" href="login.php"> || Login</a>
          </li>
        <?php } ?>
      </ul>
    </div>
  </div>
</nav>
<!-- End Navbar -->

    <div class="container-fluid" id="container-fluid">
        <div class="container-fluid py-5">
    
            <div class="row text-center text-white mt-3">
                <div class="col-lg-8 offset-lg-2">
                    <h1 class="mb-4">~About Us~</h1>
                    <hr>
                </div>
            </div>
        
            <div class="row mb-2 gx-1">
                <div class="col-lg-10 offset-lg-1">
                <div class="card mb-3 p-3">
                <div class="card-header">
                    <h3>Hubungi Contact Kami</h3>
                    <p>Untuk keluhan dan saran, silahkan hubungi cotact kami melalui kontak berikut</p>
                </div>
                <div class="card-body">
                    <div class="row  d-flex justify-content-center">
                    <div class="col-lg-4">
                        <h5><i class="bi bi-geo-alt"></i> Alamat</h5>
                        <smal class="d-block">Jalan Poros Toraja</smal>
                        <smal  class="d-block">Toraja, Sulawesi-Selatan</smal>
                    </div>
                    <div class="col-lg-4">
                        <h5><i class="bi bi-telephone-fill"></i> No a</h5>
                        <p class="d-block">Untuk fast respon silahkan hubungi nomor wa berikut</p>
                        <p  class="d-block">+081215138436</p>
                    </div>
                    <div class="col-lg-4">
                        <h5><i class="bi bi-envelope-fill"></i> Email</h5>
                        <p class="d-block">Gunakan email untuk memberikan saran Anda</p>
                        <p  class="d-block">@tiapalentek@gmail.com</p>
                    </div>
                    </div>
                </div>
                </div>
                </div>
            </div>

    
    </div>
    </div>

    <!-- Footer -->
    <div class="container-fluid bg-dark" id="footer">
      <div class="container">
        <div class="row">
          <div class="col-lg-12">
              <div class="text-center m-2">
                <small><p class="text-white">&copy;CREATED_AT BY : TIA PALENTEK</p></small>
              </div>
          </div>
        </div>
      </div>
    </div>
    <!-- End Footer -->
   

    <!-- {{-- Link Js Aos --}} -->
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
      AOS.init();
    </script>
    
    <!-- Js Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
  </body>
</html>




