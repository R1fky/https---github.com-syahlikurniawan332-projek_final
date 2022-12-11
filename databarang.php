<?php
include "proses/connect.php";
$query = mysqli_query($conn, "SELECT * FROM tb_databarang");
while ($record = mysqli_fetch_array($query)) {
    $result[] = $record;
}
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.104.2">
    <title>Data Barang</title>

</head>

<body>
    <!-- header -->
    <?php
    include "header.php";
    ?>
    <!-- akhir header -->

    <!-- tabel -->
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col">
                        <button class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#modaltambahdatabarang"><i class="bi bi-plus-square me-2"></i>Tambah Data Barang</button>
                    </div>
                </div>

                <!-- Modal tambah data barang-->
                <div class="modal fade" id="modaltambahdatabarang" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-xl modal-fullscreen-md-down">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Modal Tambah Data Barang</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form class="needs-validation" novalidate action="proses/proses_Tdatabarang.php" method="POST">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="form-floating mb-3">
                                                <input type="text" class="form-control" id="floatingInput" placeholder="Nama Barang" name="namabarang" required>
                                                <label for="floatingInput">Nama Barang</label>
                                                <div class="invalid-feedback">
                                                    Masukkan Nama Barang
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-floating mb-3">
                                                <input type="number" class="form-control" id="floatingInput" placeholder="Stok Barang" value="" name="stokbarang" required>
                                                <label for="floatingInput">Stok Barang</label>
                                                <div class="invalid-feedback">
                                                    Masukkan Stok Barang
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-4">
                                            <div class="form-floating mb-3">
                                                <input type="date" class="form-control" id="floatingInput" placeholder="Tanggal Masuk Barang" name="tanggalmasuk" required>
                                                <label for="floatingInput">Tanggal Masuk Barang</label>
                                                <div class="invalid-feedback">
                                                    Masukkan Tanggal Masuk Barang
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-8">
                                            <div class="form-floating mb-3">
                                                <input type="text" class="form-control" id="floatingPassword" placeholder="Letak Barang" name="letakbarang" required>
                                                <label for="floatingPassword">Letak Barang</label>
                                                <div class="invalid-feedback">
                                                    Masukkan Letak Barang
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-floating mb-3">
                                        <input type="number" class="form-control" id="floatingInput" placeholder="katgori" value="0" name="kategori">
                                        <label for="floatingInput">Kategori</label>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-dark" data-bs-dismiss="modal">Close</button>
                                        <button type="sumbit" class="btn btn-dark" name="tambah_data_barang" value="12345">Save changes</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Akhir Modal tambah barang -->

                <?php
                foreach ($result as $row) {
                ?>
                    <!-- Edit Data Barang -->
                    <div class="modal fade" id="modaleditbarang<?php echo $row['id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-xl modal-fullscreen-md-down">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Data barang</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form class="needs-validation" novalidate action="proses/proses_edit_barang.php" method="POST">
                                        <input type="hidden" value="<?php  echo $row['id'] ?>" name="id">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="form-floating mb-3">
                                                    <input type="text" class="form-control" id="floatingInput" placeholder="Nama Barang" name="namabarang" required value="<?php echo $row['namabarang']; ?>">
                                                    <label for="floatingInput">Nama Barang</label>
                                                    <div class="invalid-feedback">
                                                        Masukkan Nama Barang
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-floating mb-3">
                                                    <input type="number" class="form-control" id="floatingInput" placeholder="Stok Barang" name="stokbarang" required value="<?php echo $row['stokbarang']; ?>">
                                                    <label for="floatingInput">Stok Barang</label>
                                                    <div class="invalid-feedback">
                                                        Masukkan Stok Barang
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-4">
                                                <div class="form-floating mb-3">
                                                    <input type="date" class="form-control" id="floatingInput" placeholder="Tanggal Masuk Barang" name="tanggalmasuk" required value="<?php echo $row['tanggalmasuk']; ?>">
                                                    <label for="floatingInput">Tanggal Masuk Barang</label>
                                                    <div class="invalid-feedback">
                                                        Masukkan Tanggal Masuk Barang
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-8">
                                                <div class="form-floating mb-3">
                                                    <input type="text" class="form-control" id="floatingPassword" placeholder="Letak Barang" name="letakbarang" required value="<?php echo $row['letakbarang']; ?>">
                                                    <label for="floatingPassword">Letak Barang</label>
                                                    <div class="invalid-feedback">
                                                        Masukkan Letak Barang
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <input type="number" class="form-control" id="floatingInput" placeholder="katgori" value="0" name="kategori" required value="<?php echo $row['kategori']; ?>">
                                            <label for="floatingInput">Kategori</label>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-dark" data-bs-dismiss="modal">Close</button>
                                            <button type="sumbit" class="btn btn-dark" name="tambah_data_barang" value="12345">Save changes</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Akhir Modal edit barang -->

                    <!-- Delete Data Barang -->
                    <div class="modal fade" id="modaldeletebarang<?php echo $row['id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-md modal-fullscreen-md-down">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Data barang</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form class="needs-validation" novalidate action="proses/proses_delete_barang.php" method="POST">
                                        <input type="hidden" value="<?php  echo $row['id'] ?>" name="id">
                                        <div class="col-lg-12">
                                            Apakah anda yakin ingin menghapus data barang <b><?php  echo $row['namabarang'] ?></b>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-dark" data-bs-dismiss="modal">Close</button>
                                            <button type="sumbit" class="btn btn-danger" name="tambah_data_barang" value="12345">Dalete</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Akhir Modal Delete barang -->


                <?php
                }
                if (empty($result)) {
                    echo "data barang tidak ada";
                } else {

                ?>
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Nama Barang</th>
                                    <th scope="col">Stok Barang</th>
                                    <th scope="col">Tanggal Masuk</th>
                                    <th scope="col">Letak Barang</th>
                                    <th scope="col">Kategori</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                foreach ($result as $row) {
                                    echo "<tr>";
                                ?>
                                    <tr>
                                        <th scope="row"><?php echo $no++ ?></th>
                                        <td><?php echo $row['namabarang'] ?></td>
                                        <td><?php echo $row['stokbarang'] ?></td>
                                        <td><?php echo $row['tanggalmasuk'] ?></td>
                                        <td><?php echo $row['letakbarang'] ?></td>
                                        <td><?php echo $row['kategori'] ?></td>
                                        <td class="d-flex">
                                            <button class="btn btn-warning btn-sm me-1" data-bs-toggle="modal" data-bs-target="#modaleditbarang<?php echo $row['id'] ?>"><i class="bi bi-pencil-square"></i></button>
                                            <button class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#modaldeletebarang<?php echo $row['id'] ?>"><i class="bi bi-trash3-fill"></i></button>
                                        </td>
                                    </tr>
                                <?php
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                <?php
                }
                ?>
            </div>
        </div>
    </div>
    <!-- akhir tabel -->

    <script>
        // Example starter JavaScript for disabling form submissions if there are invalid fields
        (() => {
            'use strict'

            // Fetch all the forms we want to apply custom Bootstrap validation styles to
            const forms = document.querySelectorAll('.needs-validation')

            // Loop over them and prevent submission
            Array.from(forms).forEach(form => {
                form.addEventListener('submit', event => {
                    if (!form.checkValidity()) {
                        event.preventDefault()
                        event.stopPropagation()
                    }

                    form.classList.add('was-validated')
                }, false)
            })
        })()
    </script>



    <!-- FOOTER -->
    <footer class="container">
        <p class="float-end"><a href="#">Back to top</a></p>
        <p>&copy; 2017–2022 Company, Inc. &middot; <a href="#">Privacy</a> &middot; <a href="#">Terms</a></p>
    </footer>
    </main>
    <!-- Akhir footer -->



    <script src="../assets/dist/js/bootstrap.bundle.min.js"></script>



</body>

</html>