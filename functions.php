<?php 	
//koneksi ke databasse dan simpan dalama var
$con = mysqli_connect('localhost', 'root', '', 'kelurahan');


//functiom query
function query($query){

global $con;

$result = mysqli_query($con, $query);

$kotak = [];

while($reg = mysqli_fetch_array($result)){

$kotak [] = $reg;

}

return $kotak;

}


//function registrasi
function registrasi($post){

//globalkan var con agar bisa dipanggil dalam function registrasi
global $con;

//simpan dalam var masing-masing data yang diinputkan pada halaman registrasi ketika tombol registrasi di tekan
$nama_panggilan = strtolower(stripcslashes($post['nama_panggilan']));
$nama_lengkap = strtolower(stripcslashes($post['nama_lengkap']));
$email = strtolower(stripcslashes($post['email']));
$no_handphone = mysqli_real_escape_string($con, $post['no_handphone']);
$password = strtolower(stripcslashes($post['password']));
$admin = strtolower(stripcslashes($post['admin']));
$password2 = mysqli_real_escape_string($con, $post['password2']);

//sebelum masuk ke perintah menambah data ke table registrasi, simpan dalam var $cekemail perintah untuk menampilkan data sesuai email
$cekemail = mysqli_query($con, "SELECT email FROM tb_admin WHERE email = '$email'");

//cek apakah data dalam var $cekemail sudah ada dalam table tb_admin
if(mysqli_fetch_assoc($cekemail)){
	echo "
			<script>
				alert('Email sudah terdaftar!');
			</script>
		";
//berhentikan sampai baris ini jika confirmasi password salah agar perinath sql berikutnya tidak dijalankan
	return false;
}


//sebelum masuk ke perintah menambah data ke table registrasi, cek konfirmasi passwordnya
if($password !== $password2){
	echo "
			<script>
				alert('Confirmasi password salah!');
			</script>
		";
//berhentikan sampai baris ini jika confirmasi password salah agar perinath sql berikutnya tidak dijalankan
	return false;
}

//sebelum masuk ke perintah menambah data ke table registrasi, enkripsi password
$password = password_hash(	$password, PASSWORD_DEFAULT);

//simpan dalam var perintah sql untuk menambh data ke tabletb_admin
$query = "INSERT INTO tb_admin VALUES('', '$nama_panggilan', '$nama_lengkap', '$email', '$no_handphone', '$password', '$admin')";

//ambil data var conn dan data var query
mysqli_query($con, $query);

//kembalikan jika ada ynag berubah dalam table registrasi
return mysqli_affected_rows($con);

}


 ?>