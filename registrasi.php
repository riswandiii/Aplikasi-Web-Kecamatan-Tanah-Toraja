<?php   
session_start();

//koneksi ke halaman functions
require 'koneksi.php';

if(isset($_SESSION['login']))
{
    header("Location: index.php");
    exit;
}

// Proses registrasi user
if(isset($_POST['submit'])){
    include 'koneksi_db.php';

    $nama_panggilan 		= $_POST['nama_panggilan'];
    $nama_lengkap 		= $_POST['nama_lengkap'];
    $no_handphone 		= $_POST['no_handphone'];
    $email 		= $_POST['email'];
    $password 		= $_POST['password'];

    $user = mysqli_query($conn, "INSERT INTO tb_user VALUES (
        '',
        '".$nama_panggilan."',
        '".$nama_lengkap."',
        '".$no_handphone."',
        '".$email."',
        '".$password."'
        )");


        if($user){
            echo '<script>alert("Registrasi Anda Berhasil!")</script>';
            echo '<script>window.location="login_user.php"</script>';
        }else{
            echo 'Gagal'.mysqli_error($conn);
        }
}

 ?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login User</title>

    <style>

html body {
   background-image: url('img/background.jpg');
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
    }

</style>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
  </head>
  <body>
  
  <div class="container-fluid" id="container-fluid">
    <div class="container">
        <div class="row" data-aos="flip-up" data-aos-duration="2000">
        <div class="col-lg-6 offset-lg-3 col-md-8 offset-md-2 col-sm-10 offset-sm-1">
            <div class="card mt-5 mb-5 p-5" id="card">

                        <h3 class="text-center">Welcome Back!</h3>
                        <h5 class="text-center mt-2 mb-5">Form Registrasi User!</h5>

            <!-- {{-- Form --}} -->
            <form action="" method="post">
                
                <div class="mb-2">
                    <input type="text" class="form-control" name="nama_panggilan" placeholder="Nama Panggilan....." autofocus>
                </div>

                <div class="mb-2">
                    <input type="text" class="form-control" name="nama_lengkap" placeholder="Nama Lengkap....." autofocus>
                </div>

                <div class="mb-2">
                    <input type="number" class="form-control" name="no_handphone" placeholder="No. Handphone....." autofocus >
                </div>

                <div class="mb-2">
                    <input type="email" class="form-control" name="email" placeholder="Email....." autofocus >
                </div>

                <div class="mb-3">
                    <input type="password" class="form-control" name="password" placeholder="password....." autofocus >
                </div>

                <div class="mb-3">
                    <button type="submit" class="btn btn-success w-100" id="login" name="submit">REGISTRASI</button>
                </div>

                <div>
                    <small><p>Sudah punya akun? <a href="login_user.php" class="text-decoration-none">Login</a></p></small>
                </div>

                <!-- <div class="mt-4 text-center">
                    <p><small>Belom punya akun?<a href="registrasi.php" class="text-decoration-none"> Registrasi!</a></p></small>
                </div> -->
                
            </form>
            <!-- {{-- End Form --}} -->

            </div>
        </div>
    </div>
 </div>
 <br><br><br><br>
</div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
  </body>
</html>