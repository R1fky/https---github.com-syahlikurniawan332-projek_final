<?php 
include "connect.php";
$id = (isset($_POST['id'])) ? htmlentities($_POST['id']) : "";
$namabarang = (isset($_POST['namabarang'])) ? htmlentities($_POST['namabarang']) : "";
$stokbarang = (isset($_POST['stokbarang'])) ? htmlentities($_POST['stokbarang']) : "";
$tanggalmasuk = (isset($_POST['tanggalmasuk'])) ? htmlentities($_POST['tanggalmasuk']) : "";
$letakbarang = (isset($_POST['letakbarang'])) ? htmlentities($_POST['letakbarang']) : "";
$kategori = (isset($_POST['kategori'])) ? htmlentities($_POST['kategori']) : "";

$kode_rand = rand(10000, 99999) . "-";
$target_dir = "../gambar/" . $kode_rand;
$target_file = $target_dir . basename($_FILES['foto']['name']);
$imagetyp = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

if (!empty($_POST['tambah_data_barang'])) {
    // cek apakah gambar atau bukan
    $cek = getimagesize($_FILES['foto']['tmp_name']);
    if ($cek === false) {
        $message = "ini bukan file gamabar";
        $statusupload = 0;
    } else {
        $statusupload = 1;
        if (file_exists($target_file)) {
            $message = "maaf file yang dimasukkan sudah ada";
            $statusupload = 0;
        } else {
            if ($_FILES['foto']['size'] > 500000) { //500kb
                $message = "file foto yang diupload terlalu besar";
                $statusupload = 0;
            } else {
                if ($imagetyp != "jpg" && $imagetyp != "png" && $imagetype != "jpeg" && $imagetype != "gif") {
                    $message =  "maaf gambar yang boleh dimasukkan adalah jenis format jpg, jpeg, png, dan gif";
                    $statusupload = 0;
                }
            }
        }
    }


    if ($statusupload == 0) {
        $message = '<script>alert("' . $message . ', gambar tidak dapat diupload");
                window.location="../databarang"</script>';
    } else { // lanjut aja
        $select = mysqli_query($conn, "SELECT * FROM tb_databarang where namabarang = '$namabarang'");
        if (mysqli_num_rows($select) > 0) {
            $message = '<script>alert("Nama barang yang dimasukkan telah ada");
                    window.location="../databarang"</script>';
        } else {
            if (move_uploaded_file($_FILES['foto']['tmp_name'], $target_file)) {
                $query = mysqli_query($conn, "UPDATE tb_databarang SET foto='" . $kode_rand . $_FILES['foto']['name'] . "',namabarang='$namabarang', stokbarang='$stokbarang', tanggalmasuk='$tanggalmasuk', letakbarang='$letakbarang', kategori='$kategori' WHERE id_databarang ='$id'");
                if ($query) {
                    $message = '<script>alert("data berhasil dimasukkan");
                    window.location="../databarang"</script>';
                } else {
                    $message = '<script>alert("data gagal dimasukkan");
                    window.location="../databarang"</script>';
                }
            } else {
                $message = '<script>alert("maaf terjadi kesalah file tidak dapat diupload");
                    window.location="../databarang"</script>';
            }
        }
    }
    // echo $message;
    // exit();
}
echo $message;

?>