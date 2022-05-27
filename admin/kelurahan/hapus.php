<?php 	

//koneksi ke halaman function
require 'functions.php';

//simpan dalam var $id_kleurahan untuk data yang dikirim lewat url pada halamn kelurahan.php yaitu pada perintah hapus
$id_kelurahan = $_GET['id_kelurahan'];

//cek jika ada yang berubah dalam table data kelurahan dan kirim ke funcion hapus pada halaman functions
if(hapus($id_kelurahan) > 0){

//jika berhasil dihapus makaa kerja javascrip berikut
echo "
		<script>
				alert('Data Kelurahan berhasil dihapus!');
				document.location.href='kelurahan.php';
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