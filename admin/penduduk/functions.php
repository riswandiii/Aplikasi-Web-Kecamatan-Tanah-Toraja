<?php
$con = mysqli_connect('localhost', 'root', '', 'kelurahan');
// global $con;

//function query untuk menampilkan tabel data penduduk
function query($query){

global $con;

$result = mysqli_query($con, $query);

$kotak = [];

while($penduduk = mysqli_fetch_array($result)){
    $kotak [] = $penduduk;
}
return $kotak;
}



//function tambah
function tambah($post){

    global $con;

    $id_kelurahan = mysqli_real_escape_string($con, $post['id_kelurahan']);
    $nik = mysqli_real_escape_string($con, $post['nik']);
    $no_kartu_keluarga = mysqli_real_escape_string($con, $post['no_kartu_keluarga']);
    $nama_lengkap = mysqli_real_escape_string($con, $post['nama_lengkap']);
    $tempat_lahir = mysqli_real_escape_string($con, $post['tempat_lahir']);
    $tanggal_lahir = mysqli_real_escape_string($con, $post['tanggal_lahir']);
    $alamat = mysqli_real_escape_string($con, $post['alamat']);
    $jenis_kelamin = mysqli_real_escape_string($con, $post['jenis_kelamin']);
    $agama = mysqli_real_escape_string($con, $post['agama']);
    $status = mysqli_real_escape_string($con, $post['status']);
    $id_pendidikan = mysqli_real_escape_string($con, $post['id_pendidikan']);
    $id_pekerjaan = mysqli_real_escape_string($con, $post['id_pekerjaan']);
    
    $query = "INSERT INTO tb_penduduk VALUES('', '$id_kelurahan', '$nik', '$no_kartu_keluarga', '$nama_lengkap', '$tempat_lahir', '$tanggal_lahir', '$alamat', '$jenis_kelamin', '$agama', '$status', '$id_pendidikan', '$id_pekerjaan')";
    
    mysqli_query($con, $query);
    
    return mysqli_affected_rows($con);
}


//function ubah
function ubah($post){

    global $con;
    
    $id_penduduk = $post['id_penduduk'];
    $id_kelurahan = $post['id_kelurahan'];
    $nik = mysqli_real_escape_string($con, $post['nik']);
    $no_kartu_keluarga = mysqli_real_escape_string($con, $post['no_kartu_keluarga']);
    $nama_lengkap = mysqli_real_escape_string($con, $post['nama_lengkap']);
    $tempat_lahir = mysqli_real_escape_string($con, $post['tempat_lahir']);
    $tanggal_lahir = mysqli_real_escape_string($con, $post['tanggal_lahir']);
    $alamat = mysqli_real_escape_string($con, $post['alamat']);
    $jenis_kelamin = mysqli_real_escape_string($con, $post['jenis_kelamin']);
    $agama = mysqli_real_escape_string($con, $post['agama']);
    $status = mysqli_real_escape_string($con, $post['status']);
    $id_pendidikan = mysqli_real_escape_string($con, $post['id_pendidikan']);
    $id_pekerjaan = mysqli_real_escape_string($con, $post['id_pekerjaan']);
    
    $query = "UPDATE tb_penduduk SET
                id_kelurahan = '$id_kelurahan',
                nik = '$nik',
                no_kartu_keluarga = '$no_kartu_keluarga',
                nama_lengkap = '$nama_lengkap',
                tempat_lahir = '$tempat_lahir',
                tangal_lahir = '$tanggal_lahir',
                alamat = '$alamat',
                jenis_kelamin = '$jenis_kelamin',
                agama = '$agama',
                status = '$status',
                id_pendidikan = '$id_pendidikan',
                id_pekerjaan = '$id_pekerjaan'
                WHERE id_penduduk = $id_penduduk
                ";
    
    mysqli_query($con, $query);
    
    return mysqli_affected_rows($con);
    
    }


      //function hapus
      function hapus($id_penduduk){

        global $con;
        
        //ambil data var $con dan masukkan perintah sql untuk menghapus colom tertentu pada table tb_pendudk
        mysqli_query($con, "DELETE FROM tb_penduduk WHERE id_penduduk = $id_penduduk");
        
        return mysqli_affected_rows($con);
        
        }



?>