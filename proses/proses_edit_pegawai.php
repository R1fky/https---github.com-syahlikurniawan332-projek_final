<?php 
include "connect.php";
$id = (isset($_POST['id_datapegawai'])) ? htmlentities($_POST['id_datapegawai']) : "";
$namapegawai = (isset($_POST['namapegawai'])) ? htmlentities($_POST['namapegawai']) : "";
$jabatan = (isset($_POST['jabatan'])) ? htmlentities($_POST['jabatan']) : "" ;
$nohp = (isset($_POST['nohp'])) ? htmlentities($_POST['nohp']) : "" ;
$Alamat = (isset($_POST['Alamat'])) ? htmlentities($_POST['Alamat']) : "" ;
$tglmasukkerja = (isset($_POST['tgl_masuk_kerja'])) ? htmlentities($_POST['tgl_masuk_kerja']) : "" ;

if(!empty($_POST['edit_data_pegawai'])) {
    $query = mysqli_query($conn, "UPDATE tb_datapegawai SET namapegawai ='$namapegawai', jabatan = '$jabatan', no_hp = '$nohp', alamat = '$Alamat', tgl_masuk_kerja = '$tglmasukkerja' WHERE id_datapegawai = '$id'");
    if($query){
        echo $message = '<script>alert("data berhasil Di Edit");
                         window.location="../datapegawai"</script>';
    }else{
        echo  $message = '<script>alert("data barang gagal Di Edit");
                           window.location="../datapegawai"</script>';
    }
}echo $message;
?>