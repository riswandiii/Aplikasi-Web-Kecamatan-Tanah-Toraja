<?php 
require 'functions.php';

//jika tombol ok dipencet
if(isset($_POST['registrasi'])){
	if(tambah($_POST) > 0){
		echo "
				<script>
					alert('DATA PENDUDUK PENDUDUK BERHASIl DITAMBAH!');
					document.location='penduduk.php';
				</script>
			";
	}else{
		echo mysqli_error($con);
	}
}

//untuk menampilkan menul kelurahan di form tambah 
//function kelurahan untuk menampilkan tabel data kelurahan
function kelurahan($query){

    global $con;
    
    $result = mysqli_query($con, $query);
    
    $kotak = [];
    
    while($kel = mysqli_fetch_array($result)){
        $kotak [] = $kel;
    }
    return $kotak;
    }
$tb_kelurahan = kelurahan("SELECT * FROM tb_kelurahan");

//untuk menampilkan menul pendidikan di form tambah 
//function pendidikan untuk menampilkan tabel data pendidikan
function pendidikan($query){

    global $con;
    
    $result = mysqli_query($con, $query);
    
    $kotak = [];
    
    while($pen = mysqli_fetch_array($result)){
        $kotak [] = $pen;
    }
    return $kotak;
    }
$tb_pendidikan = pendidikan("SELECT * FROM tb_pendidikan");


//untuk menampilkan menul pekerjaan di form tambah 
//function pekerjaan untuk menampilkan tabel data kelurahan
function pekerjaan($query){

    global $con;
    
    $result = mysqli_query($con, $query);
    
    $kotak = [];
    
    while($pek = mysqli_fetch_array($result)){
        $kotak [] = $pek;
    }
    return $kotak;
    }
$tb_pekerjaan = pekerjaan("SELECT * FROM tb_pekerjaan");


 ?>



<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tambah Data Penduduk</title>

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
                        <h3 class="text-center mt-2 mb-4">Tambah Data Penduduk</h3>

            <!-- {{-- Form Tambah --}} -->
            <form action="" method="post" enctype="multipart/form-data">

            <div class="mb-2">
            <select class="form-select" aria-label="Default select example" name="id_kelurahan">
                <option selected>---Kelurahan---</option>
                <?php foreach($tb_kelurahan as $kelurahan) : ?>
                   <option value="<?php echo $kelurahan['id_kelurahan']; ?>"><?php echo $kelurahan['nama_kelurahan']; ?></option>
                <?php endforeach; ?>
            </select>
            </div>

            <div class="mb-2">
                <input type="number" class="form-control" id="nik" placeholder="Nik....." name="nik">
            </div>

            <div class="mb-2">
                <input type="number" class="form-control" id="no_kartu_keluarga" placeholder="Nomor Kartu Keluarga...." name="no_kartu_keluarga">
            </div>

            <div class="mb-2">
                <input type="text" class="form-control" id="nama_lengkap" placeholder="Nama Lengkap....." name="nama_lengkap">
            </div>

            <div class="mb-2">
                <input type="text" class="form-control" id="tempat_lahir" placeholder="Tempat Lahir....." name="tempat_lahir">
            </div>
            
            <div class="mb-2">
                <input type="date" class="form-control" id="tanggal_lahir" placeholder="Tanggal Lahir....." name="tanggal_lahir">
            </div>

            <div class="mb-2">
                <input type="text" class="form-control" id="alamat" placeholder="Alamat....." name="alamat">
            </div>
            
            <div class="mb-2">
            <div class="form-check">
            <input class="form-check-input" type="radio" name="jenis_kelamin" id="laki-laki" value="Laki-laki">
            <label class="form-check-label" for="laki-laki">
               Laki-laki
            </label>
            </div>
            </div>

            <div class="mb-2">
            <div class="form-check">
            <input class="form-check-input" type="radio" name="jenis_kelamin" id="perempuan" value="Perempuan">
            <label class="form-check-label" for="perempuan">
               Perempuan
            </label>
            </div>
            </div>

            <div class="mb-2">
            <select class="form-select" aria-label="Default select example" name="agama">
                <option selected>---Agama---</option>
                <option value="Islam">Islam</option>
                <option value="Kristen">Kristen</option>
                <option value="Budha">Budha</option>
                <option value="Katolik">Katolik</option>
            </select>
            </div>

            <div class="mb-2">
            <select class="form-select" aria-label="Default select example" name="status">
                <option selected>---Status---</option>
                <option value="Belom Menikah">Belom Menikah</option>
                <option value="Sudah Menikah">Sudah Menikah</option>
            </select>
            </div>

            <div class="mb-2">
            <select class="form-select" aria-label="Default select example" name="id_pendidikan">
                <option selected>---Pendidikan---</option>
                <?php foreach($tb_pendidikan as $pendidikan) : ?>
                   <option value="<?php echo $pendidikan['id_pendidikan']; ?>"><?php echo $pendidikan['pendidikan']; ?></option>
                <?php endforeach; ?>
            </select>
            </div>

            <div class="mb-4">
            <select class="form-select" aria-label="Default select example" name="id_pekerjaan">
                <option selected>---Pekerjaan---</option>
                <?php foreach($tb_pekerjaan as $pekerjaan) : ?>
                   <option value="<?php echo $pekerjaan['id_pekerjaan']; ?>"><?php echo $pekerjaan['pekerjaan']; ?></option>
                <?php endforeach; ?>
            </select>
            </div>

            <div class="mb-2">
                 <button type="submit" class="btn btn-success w-100" id="registrasi" name="registrasi">SUBMIT</button>
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