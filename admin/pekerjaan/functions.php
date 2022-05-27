<?php 

//koneksi ke database
$con = mysqli_connect('localhost', 'root', '', 'kelurahan');
// global $con;


//function query untuk menampilkan tabel data pekerjaan
function query($query){

global $con;

$result = mysqli_query($con, $query);

$kotak = [];

while($pek = mysqli_fetch_array($result)){
    $kotak [] = $pek;
}
return $kotak;
}


//function tambah
function tambah($post){

    global $con;

    $pekerjaan = mysqli_real_escape_string($con, $post['pekerjaan']);
    
    $query = "INSERT INTO tb_pekerjaan VALUES('', '$pekerjaan')";
    
    mysqli_query($con, $query);
    
    return mysqli_affected_rows($con);
}


//function ubah
function ubah($post){

    global $con;
    
    $id_pekerjaan = $post['id_pekerjaan'];
    $pekerjaan = mysqli_real_escape_string($con, $post['pekerjaan']);
    
    $query = "UPDATE tb_pekerjaan SET
                pekerjaan = '$pekerjaan'
                WHERE id_pekerjaan = $id_pekerjaan
                ";
    
    mysqli_query($con, $query);
    
    return mysqli_affected_rows($con);
    
    }

//function hapus
function hapus($id_pekerjaan){

    global $con;
    
    //ambil data var $con dan masukkan perintah sql untuk menghapus colom tertentu pada table tb_pekerjaan
    mysqli_query($con, "DELETE FROM tb_pekerjaan WHERE id_pekerjaan = $id_pekerjaan");
    
    return mysqli_affected_rows($con);
    
    }


?>