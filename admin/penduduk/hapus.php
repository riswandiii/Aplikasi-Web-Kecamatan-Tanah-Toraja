<?php 	

//koneksi ke halaman function
require 'functions.php';

//simpan dalam var $id_penduduk untuk data yang dikirim lewat url pada halamn pendduk.php yaitu pada perintah hapus
$id_penduduk = $_GET['id_penduduk'];

//cek jika ada yang berubah dalam table data pendidikan dan kirim ke funcion hapus pada halaman functions
if(hapus($id_penduduk) > 0){

//jika berhasil dihapus makaa kerja javascrip berikut
echo "
		<script>
				alert('Data Penduduk berhasil dihapus!');
				document.location.href='penduduk.php';
		</script>
		";
//jika gagal maka kerja javascript berikut
}else{
	echo "
		<script>
				alert('Data  gagal dihapus!');
				document.location.href='penduduk.php';
		</script>
		";
}

 ?>