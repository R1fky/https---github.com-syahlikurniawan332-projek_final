<?php 
include "connect.php";
$id = (isset($_POST['id'])) ? htmlentities($_POST['id']) : "";
$namabarang = (isset($_POST['namabarang'])) ? htmlentities($_POST['namabarang']) : "";
$stokbarang= (isset($_POST['stokbarang'])) ? htmlentities($_POST['stokbarang']) : "" ;
$tanggalmasuk = (isset($_POST['tanggalmasuk'])) ? htmlentities($_POST['tanggalmasuk']) : "" ;
$letakbarang = (isset($_POST['letakbarang'])) ? htmlentities($_POST['letakbarang']) : "" ;
$kategori = (isset($_POST['kategori'])) ? htmlentities($_POST['kategori']) : "" ;

if(!empty($_POST['tambah_data_barang'])) {
    $query = mysqli_query($conn, "UPDATE tb_databarang SET namabarang ='$namabarang', stokbarang = '$stokbarang', tanggalmasuk = '$tanggalmasuk', letakbarang = '$letakbarang', kategori = '$kategori' WHERE id = '$id'");
    if($query){
        echo $message = '<script>alert("data berhasil Di Edit");
                         window.location="../databarang"</script>';
    }else{
        echo  $message = '<script>alert("data barang gagal Di Edit");
                          window.location="../databarang"</script>';
    }
}echo $message;
?>