<?php 
include "connect.php";
$id = (isset($_POST['id_datapegawai'])) ? htmlentities($_POST['id_datapegawai']) : "";


if(!empty($_POST['tambah_data_barang'])) {
    $query = mysqli_query($conn, "DELETE FROM tb_datapegawai wHERE id_datapegawai ='$id'");
    if($query){
        echo $message = '<script>alert("data berhasil Di Hapus");
                         window.location="../datapegawai"</script>';
    }else{
        echo  $message = '<script>alert("data barang gagal Di Hapus");
                          window.location="../datapegawai"</script>';
    }
}echo $message;
?>