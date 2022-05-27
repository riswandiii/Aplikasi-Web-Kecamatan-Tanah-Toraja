<?php


//koneksi ke database
$con = mysqli_connect('localhost', 'root', '', 'kelurahan');
// global $con;


//function query untuk menampilkan tabel data pendidikan
function query($query){

global $con;

$result = mysqli_query($con, $query);

$kotak = [];

while($pen = mysqli_fetch_array($result)){
    $kotak [] = $pen;
}
return $kotak;
}


//function tambah
function tambah($post){

    global $con;

    $pendidikan = mysqli_real_escape_string($con, $post['pendidikan']);
    
    $query = "INSERT INTO tb_pendidikan VALUES('', '$pendidikan')";
    
    mysqli_query($con, $query);
    
    return mysqli_affected_rows($con);
    
}


//function ubah
function ubah($post){

    global $con;
    
    $id_pendidikan = $post['id_pendidikan'];
    $pendidikan = mysqli_real_escape_string($con, $post['pendidikan']);
    
    $query = "UPDATE tb_pendidikan SET
                pendidikan = '$pendidikan'
                WHERE id_pendidikan = $id_pendidikan
                ";
    
    mysqli_query($con, $query);
    
    return mysqli_affected_rows($con);
    
    }


      //function hapus
      function hapus($id_pendidikan){

        global $con;
        
        //ambil data var $con dan masukkan perintah sql untuk menghapus colom tertentu pada table tb_pendidikan
        mysqli_query($con, "DELETE FROM tb_pendidikan WHERE id_pendidikan = $id_pendidikan");
        
        return mysqli_affected_rows($con);
        
        }



?>