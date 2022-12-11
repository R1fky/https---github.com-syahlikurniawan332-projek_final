<?php 
include "connect.php";
$id = (isset($_POST['id'])) ? htmlentities($_POST['id']) : "";


if(!empty($_POST['tambah_data_barang'])) {
    $query = mysqli_query($conn, "DELETE FROM tb_databarang wHERE id ='$id'");
    if($query){
        echo $message = '<script>alert("data berhasil Di Hapus");
                         window.location="../databarang"</script>';
    }else{
        echo  $message = '<script>alert("data barang gagal Di Hapus");
                          window.location="../databarang"</script>';
    }
}echo $message;
?>