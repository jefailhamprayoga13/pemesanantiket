<?php
if (isset($_GET['kode'])) {
    $sql_cek = "SELECT * FROM wisata WHERE id_wisata='" . $_GET['kode'] . "'";
    $query_cek = mysqli_query($conn, $sql_cek);
    $data_cek = mysqli_fetch_array($query_cek, MYSQLI_BOTH);
}
?>
<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">
            <i class="fa fa-edit"></i> Edit Data
        </h3>
    </div>
    <form action="" method="post" enctype="multipart/form-data">
        <div class="card-body">

            <input type="hidden" class="form-control" id="nip" name="id_wisata" value="<?php echo $data_cek['id_wisata']; ?>" required>


            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Nama Wisata</label>
                <div class="col-sm-5">
                    <input type="text" class="form-control" id="nip" name="nama_wisata" placeholder="Nama Wisata" value="<?php echo $data_cek['nama_wisata']; ?>" required>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Lokasi Wisata</label>
                <div class="col-sm-5">
                    <input type="text" class="form-control" id="nama" name="lokasi_wisata" placeholder="Lokasi Wisata" value="<?php echo $data_cek['lokasi_wisata']; ?>" required>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Harga Tiket</label>
                <div class="col-sm-5">
                    <input type="text" class="form-control" id="nama" name="harga_tiket" placeholder="Harga Tiket" value="<?php echo $data_cek['harga_tiket']; ?>" required>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Gambar</label>
                <div class="col-sm-5">
                    <input type="file" class="form-control" id="gambar" name="gambar" value="<?php echo $data_cek['gambar']; ?>" required>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Link Embed</label>
                <div class="col-sm-5">
                    <input type="text" class="form-control" id="nama" name="link" placeholder="Link Embed" value="<?php echo $data_cek['link']; ?>" required>
                </div>
            </div>




            <div class="card-footer">
                <a href="" data-bs-toggle="modal" data-bs-target="#exampleModal11">
                    <button type="submit" class="btn btn-primary">Ubah</button>
                </a>
                <div class="modal fade" id="exampleModal11" tabindex="-1" aria-labelledby="exampleModalLabel11" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel1">Tambah</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                Apakah data yang anda isi sudah benar?
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tidak</button>

                                <button type="submit" name="Ubah" value="Ubah" class="btn btn-primary">Ya</button>

                            </div>
                        </div>
                    </div>
                </div>
                <a href="?page=data-ru" title="Kembali" class="btn btn-secondary">Batal</a>
            </div>
    </form>
</div>

<?php


if (isset($_POST['Ubah'])) {
    $foto = $_FILES['gambar']['name'];
    $tmp = $_FILES['gambar']['tmp_name'];
    // Rename nama fotonya dengan menambahkan tanggal dan jam upload
    $fotobaru = date('dmYHis') . $foto;
    // Set path folder tempat menyimpan fotonya
    $path = "../../assets/images/" . $fotobaru;
    // Proses upload
    if (move_uploaded_file($tmp, $path)) { // Cek apakah gambar berhasil diupload atau tidak
        // Proses ubah ke Database
        $sql_ubah = "UPDATE wisata SET
        nama_wisata='" . $_POST['nama_wisata'] . "',
        lokasi_wisata='" . $_POST['lokasi_wisata'] . "',
        harga_tiket='" . $_POST['harga_tiket'] . "',
        gambar='" . $fotobaru . "',
        link='" . $_POST['link'] . "'
        WHERE id_wisata='" . $_POST['id_wisata'] . "'";

        $query_ubah = mysqli_query($conn, $sql_ubah);
        if ($query_ubah) { // Cek jika proses ubah ke database sukses atau tidak
            echo "<script>
                Swal.fire({title: 'Tambah Data Berhasil',text: '',icon: 'success',confirmButtonText: 'OK'
                }).then((result) => {
                    if (result.value) {
                        window.location = 'index.php?page=data-wisata';
                    }
                })</script>";
        } else {
            // Jika Gagal, Lakukan :
            echo "Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database.";
        }
    } else {
        // Jika gambar gagal diupload, Lakukan :
        echo "Maaf, Gambar gagal untuk diupload.";
        echo "<br><a href='form_ubah.php'>Kembali Ke Form</a>";
    }
}
?>