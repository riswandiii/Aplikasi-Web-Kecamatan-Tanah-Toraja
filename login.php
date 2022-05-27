<?php   
session_start();

//jika sudah login
if(isset($_SESSION['login']))
{
    header("Location: index.php");
    exit;
}

//koneksi ke halaman functions
require 'functions.php';

//jika tombol login di tekan
if(isset($_POST['login'])){

    $email = mysqli_real_escape_string($con, $_POST['email']);
    $password = mysqli_real_escape_string($con, $_POST['password']);
    $admin = $_POST['admin'];

    //cek admin dan level apakah yang diinputkan ada dalam tabel tb_admin
    $cek_admin = mysqli_query($con, "SELECT * FROM tb_admin WHERE email = '$email' AND admin = '$admin'");

    //cek jika ada satu baris yang cocok
    if(mysqli_num_rows($cek_admin) == 1){

      //ambil passwordnya
      $row = mysqli_fetch_array($cek_admin);

      //cek password
      if(password_verify( $password, $row['password'])){

        //buatkan session
        session_start();
        $_SESSION['nama_panggilan'] =  $row['nama_panggilan'];
        $_SESSION['nama_lengkap'] = $row['nama_lengkap'];
        $_SESSION['email'] = $row['email'];
        $_SESSION['no_handphone'] = $row['no_handphone'];
        $_SESSION['password'] = $row['password'];
        $_SESSION['admin'] = $row['admin'];
        $_SESSION['login'] = true;

        //cek level
        if($admin  == 'admin'){
          header('Location: admin/dashboard.php');
        }elseif($admin !== 'admin'){
          header('Location: login.php');
        }


      }else{
        $errorPassword = true;
      }

    }else{
      $errorEmail = true;
    }

}

 ?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>

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
            <br><br>
            <div class="card mt-5 mb-5 p-5" id="card">

                        <h3 class="text-center">Welcome Back!</h3>
                        <h5 class="text-center mt-2 ">Please Login!</h5>

                        <!-- Jika email ataupassword salah -->
                        <div class="row py-3">
                        <div class="col-lg-12">
                            <div class="text-center">
                            <?php  if(isset($errorEmail)) : ?>
                                <p class="text-danger">Email yang anda masukkan salah!</p>
                                <?php  endif; ?>

                                <?php  if(isset($errorPassword)) : ?>
                                    <p class="text-danger">Password yang anda masukkan salah!</p>
                                <?php  endif; ?>
                              </div>
                         </div>
                        </div>

            <!-- {{-- Form --}} -->
            <form action="" method="post">
                
                <div class="mb-3">
                    <input type="email" class="form-control" name="email" placeholder="Email....." autofocus id="email">
                </div>

                <div class="mb-3">
                    <input type="password" class="form-control" name="password" placeholder="Password....." autofocus id="password">
                </div>

                <input type="hidden" class="form-control" name="admin" value="admin">

                <div class="form-check mb-3">
                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                    <label class="form-check-label" for="flexCheckDefault">
                        <small class="text-dark">Show in password</small>
                    </label>
                </div>

                <div class="mb-3">
                    <button type="submit" class="btn btn-success w-100" id="login" name="login">LOGIN</button>
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