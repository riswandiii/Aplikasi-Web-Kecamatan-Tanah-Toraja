<?php

//koneksi ke database
$con = mysqli_connect('localhost', 'root', '', 'kelurahan');
// global $con;


//function query untuk menampilkan tabel data kelurahan
function query($query){

global $con;

$result = mysqli_query($con, $query);

$kotak = [];

while($kel = mysqli_fetch_array($result)){
    $kotak [] = $kel;
}
return $kotak;
}

//function tambah
function tambah($post){

    global $con;

    $nama_kelurahan = mysqli_real_escape_string($con, $post['nama_kelurahan']);
    
    $query = "INSERT INTO tb_kelurahan VALUES('', '$nama_kelurahan')";
    
    mysqli_query($con, $query);
    
    return mysqli_affected_rows($con);
    
}


//function ubah
function ubah($post){

    global $con;
    
    $id_kelurahan = $post['id_kelurahan'];
    $nama_kelurahan = mysqli_real_escape_string($con, $post['nama_kelurahan']);
    
    $query = "UPDATE tb_kelurahan SET
                nama_kelurahan = '$nama_kelurahan'
                WHERE id_kelurahan = $id_kelurahan
                ";
    
    mysqli_query($con, $query);
    
    return mysqli_affected_rows($con);
    
    }


    
    //function hapus
    function hapus($id_kelurahan){

        global $con;
        
        //ambil data var $con dan masukkan perintah sql untuk menghapus colom tertentu pada table Tb_kelurahan
        mysqli_query($con, "DELETE FROM tb_kelurahan WHERE id_kelurahan = $id_kelurahan");
        
        return mysqli_affected_rows($con);
        
        }


?>