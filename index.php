<?php
if(isset($_GET['x']) && $_GET['x']== 'home'){
    include 'home.php';
}elseif(isset($_GET['x']) && $_GET['x']== 'databarang'){
    include 'databarang.php';
}elseif(isset($_GET['x']) && $_GET['x']== 'datapegawai'){
    include 'datapegawai.php';
}elseif(isset($_GET['x']) && $_GET['x']== 'daftaruser'){
    include 'daftaruser.php';
}elseif(isset($_GET['x']) && $_GET['x']== 'login'){
    include 'login.php';
}elseif(isset($_GET['x']) && $_GET['x']== 'logout'){
    include 'proses/proses_logout.php';
}else{
    include 'home.php';
}

?>
