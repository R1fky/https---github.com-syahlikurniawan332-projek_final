<?php 
include "connect.php";
$namabarang = (isset($_POST['namabarang'])) ? htmlentities($_POST['namabarang']) : "";
$stokbarang= (isset($_POST['stokbarang'])) ? htmlentities($_POST['stokbarang']) : "" ;
$tanggalmasuk = (isset($_POST['tanggalmasuk'])) ? htmlentities($_POST['tanggalmasuk']) : "" ;
$letakbarang = (isset($_POST['letakbarang'])) ? htmlentities($_POST['letakbarang']) : "" ;
$kategori = (isset($_POST['kategori'])) ? htmlentities($_POST['kategori']) : "" ;

if(!empty($_POST['tambah_data_barang'])) {
    $query = mysqli_query($conn, "INSERT INTO tb_databarang (namabarang,stokbarang,tanggalmasuk,letakbarang,kategori) 
    value ('$namabarang','$stokbarang','$tanggalmasuk','$letakbarang','$kategori')");
    if($query){
        echo $message = '<script>alert("data Barang berhasil Di Tambahkan");
                         window.location="../databarang"</script>';
    }else{
        echo  $message = '<script>alert("data barang gagal Di Tambahkan");
                          window.location="../databarang"</script>';
    }
}echo $message;
?>