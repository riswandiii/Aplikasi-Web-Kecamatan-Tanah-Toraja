<?php 
require 'functions.php';

$id_kelurahan = $_GET['id_kelurahan'];
$kelurahan = query("SELECT * FROM tb_kelurahan WHERE id_kelurahan = $id_kelurahan")[0];

//jika tombol submit dipencet
if(isset($_POST['submit'])){
	if(ubah($_POST) > 0){
		echo "
				<script>
					alert('DATA KELURAHAN BERHASIL DI UBAH!');
					document.location='kelurahan.php';
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
    <title>Ubah Data Kelurahan</title>

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
        position: relative;
        top: 25%;
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
    <div class="containe">
        <div class="row">
        <div class="col-lg-6 offset-lg-3 col-md-8 offset-md-2 col-sm-10 offset-sm-1">
            <div class="card mt-5 mb-5 p-5" id="card" data-aos="flip-up" data-aos-duration="2000">
                        <h3 class="text-center mt-2 mb-4">Ubah Data Kelurahan</h3>

            <!-- {{-- Form --}} -->
            <form action="" method="post" enctype="multipart/form-data">

               <input type="hidden" name="id_kelurahan" value="<?php echo $kelurahan['id_kelurahan']; ?>">

                <div class="mb-3">
                    <input type="text" class="form-control" name="nama_kelurahan" placeholder="Nama Panggilan....." autofocus id="nama_kelurahan"  value="<?php echo $kelurahan['nama_kelurahan']; ?>">
                </div>

                <div class="mb-3">
                    <button type="submit" class="btn btn-success w-100" id="registrasi" name="submit">SUBMIT</button>
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