<?php 
include "connect.php";
$namapegawai = (isset($_POST['namapegawai'])) ? htmlentities($_POST['namapegawai']) : "";
$jabatan= (isset($_POST['jabatan'])) ? htmlentities($_POST['jabatan']) : "" ;
$nohp = (isset($_POST['nohp'])) ? htmlentities($_POST['nohp']) : "" ;
$Alamat = (isset($_POST['Alamat'])) ? htmlentities($_POST['Alamat']) : "" ;
$tglmasukkerja = (isset($_POST['tglmasukkerja'])) ? htmlentities($_POST['tglmasukkerja']) : "" ;

if(!empty($_POST['tambah_data_barang'])) {
    $query = mysqli_query($conn, "INSERT INTO tb_datapegawai (namapegawai,jabatan,no_hp,alamat,tgl_masuk_kerja) 
    value ('$namapegawai','$jabatan','$nohp','$Alamat','$tglmasukkerja')");
    if($query){
        echo $message = '<script>alert("data Pegawai berhasil Di Tambahkan");
                         window.location="../datapegawai"</script>';
    }else{
        echo  $message = '<script>alert("data pegawai gagal Di Tambahkan");
                          window.location="../datapegawai"</script>';
    }
}echo $message;
?>