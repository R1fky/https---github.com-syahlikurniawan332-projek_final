<?php
include "connect.php";
$username = (isset($_POST['username'])) ? htmlentities($_POST['username']) : "" ;
$password = (isset($_POST['password'])) ? md5(htmlentities($_POST['password'])) : "" ;

if (!empty($_POST['submit_validate'])){
    $query = mysqli_query($conn, "SELECT * FROM tb_user WHERE username = '$username' && password = '$password'");
    $hasil = mysqli_fetch_array($query);
    if($hasil){
        $_SESSION['username_udetiara'] = $username;
        $_SESSION['level_udetiara'] = $hasil ['level'];
        header('Location:../home');
    }else{ ?>
    <script>
        alert('Username or password yang dimasukkan salah');
        window.location = '../login.php';
    </script>
<?php
    }
}
?>
