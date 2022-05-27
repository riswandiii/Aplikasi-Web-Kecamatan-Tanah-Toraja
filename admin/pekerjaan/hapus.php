<?php 	

//koneksi ke halaman function
require 'functions.php';

//simpan dalam var $id_pekerjaan untuk data yang dikirim lewat url pada halamn pekerjaan.php yaitu pada perintah hapus
$id_pekerjaan = $_GET['id_pekerjaan'];

//cek jika ada yang berubah dalam table data pekerjaan dan kirim ke funcion hapus pada halaman functions
if(hapus($id_pekerjaan) > 0){

//jika berhasil dihapus makaa kerja javascrip berikut
echo "
		<script>
				alert('Data Pekerjaan berhasil dihapus!');
				document.location.href='pekerjaan.php';
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