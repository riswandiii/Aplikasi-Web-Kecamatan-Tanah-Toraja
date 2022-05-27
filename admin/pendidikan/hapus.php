<?php 	

//koneksi ke halaman function
require 'functions.php';

//simpan dalam var $id_pendidikan untuk data yang dikirim lewat url pada halamn pendidikanphp yaitu pada perintah hapus
$id_pendidikan = $_GET['id_pendidikan'];

//cek jika ada yang berubah dalam table data pendidikan dan kirim ke funcion hapus pada halaman functions
if(hapus($id_pendidikan) > 0){

//jika berhasil dihapus makaa kerja javascrip berikut
echo "
		<script>
				alert('Data Pendidikan berhasil dihapus!');
				document.location.href='pendidikan.php';
		</script>
		";
//jika gagal maka kerja javascript berikut
}else{
	echo "
		<script>
				alert('Data  gagal dihapus!');
				document.location.href='ubah.php';
		</script>
		";
}

 ?>