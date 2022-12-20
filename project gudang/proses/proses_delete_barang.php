<?php
include "connect.php";
$id = (isset($_POST['id_databarang'])) ? htmlentities($_POST['id_databarang']) : "" ;
$foto = (isset($_POST['foto'])) ? htmlentities($_POST['foto']) : "" ;



if (!empty($_POST['tambah_data_barang'])) {
    
    $query = mysqli_query($conn,"DELETE FROM tb_databarang WHERE id_databarang ='$id'");
    if($query) {
        unlink("../gambar/$foto");
        $message = '<script>alert("data berhasil dihapus");
                    window.location="../databarang"</script>';
    }else { 
        $message = '<script>alert("data gagal dihapus");
                    window.location="../databarang"
                    </script>';
    
    }
}echo $message;
