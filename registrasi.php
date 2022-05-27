<?php
session_start();
//koneksi ke halaman functions
require 'functions.php';

//jika tombol registrasi di tekan
if(isset($_POST['registrasi'])){

//cek jika ada data yang berhasil ditambah ke table tb_admin
if(registrasi($_POST) > 0){

		echo "
						<script>
								alert('Registrasi berhasil');
								document.location.href='login.php';
						</script>
				";

}else{
	echo mysqli_error($con);

}

}

 ?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Registrasi</title>

    <style>

html body {
   background-image: url('img/background.jpg');
   background-size: cover;
   background-position: center;
   background-repeat: no-repeat;
}

    #email, #password, #login, #nama_panggilan, #nama_lengkap, #no_handphone, #registrasi, #password2 {
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
    <div class="containe">
        <div class="row">
        <div class="col-lg-6 offset-lg-3 col-md-8 offset-md-2 col-sm-10 offset-sm-1">
            <div class="card mt-5 mb-5 p-5" id="card" data-aos="flip-up" data-aos-duration="2000">
                        <h3 class="text-center">Welcome Back!</h3>
                        <h5 class="text-center mt-2 mb-4">Please Registrasi!</h5>

            <!-- {{-- Form --}} -->
            <form action="" method="post">
        

                <div class="mb-3">
                    <input type="text" class="form-control" name="nama_panggilan" placeholder="Nama Panggilan....." autofocus id="nama_panggilan">
                </div>
                
                <div class="mb-3">
                    <input type="text" class="form-control"  name="nama_lengkap" placeholder="Nama Lengkap....." autofocus id="nama_lengkap">
                </div>

                <div class="mb-3">
                    <input type="email" class="form-control" name="email" placeholder="Email....." autofocus id="email">
                </div>

                <div class="mb-3">
                    <input type="number" class="form-control" name="no_handphone" placeholder="No. Handphone....." autofocus id="no_handphone">
                </div>

                <div class="mb-3">
                    <input type="password" class="form-control" name="password" placeholder="Password....." autofocus id="password">
                </div>

                <input type="hidden" name="admin" value="admin">

                <div class="mb-3">
                    <input type="password2" class="form-control" name="password2" placeholder="Confirmasi Password....." autofocus id="password2">
                </div>

                <div class="mb-3">
                    <button type="submit" class="btn btn-success w-100" id="registrasi" name="registrasi">SUBMIT</button>
                </div>

                <div class="mt-4 text-center">
                    <p><small>Sudah punya akun?<a href="login.php" class="text-decoration-none"> Login!</a></p></small>
                </div>
                
            </form>
            <!-- {{-- End Form --}} -->

            </div>
        </div>
    </div>
    </div>
</div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
  </body>
</html>