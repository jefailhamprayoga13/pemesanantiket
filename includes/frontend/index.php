<?php
ob_start();
session_start();
include("../../config/koneksi.php");
if (empty($_SESSION["username"])) {
    header("location:pertama.php");
} else {
    $data_user = $_SESSION['username'];
    $data_nama = $_SESSION['nama'];
    $data_nik = $_SESSION['nik'];
    $data_no_hp = $_SESSION['no_hp'];
    $data_email = $_SESSION['email'];

    $date = date('Y-m-d');

    function youtube($url)
    {
        $link = str_replace('http://www.youtube.com/watch?v=', '', $url);
        $link = str_replace('https://www.youtube.com/watch?v=', '', $link);
        $data = '<object width="800" height="500" data="http://www.youtube.com/v/' . $link . '" type="application/x-shockwave-flash">
	<param name="src" value="http://www.youtube.com/v/' . $link . '" />
	</object>';
        return $data;
    }
}



?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Home</title>
    <meta content="" name="description">

    <meta content="" name="keywords">

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>



    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.4/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.4/css/jquery.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js">

    <!-- Favicons -->


    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="assets/vendor/aos/aos.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="assets/css/style.css" rel="stylesheet">

    <script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />

</head>

<body>

    <!-- ======= Header ======= -->
    <header id="header" class="header fixed-top">
        <div class="container-fluid container-xl d-flex align-items-center justify-content-between">

            <a href="index.html" class="logo d-flex align-items-center">
                <img src="" alt="">
                <span>Pemesanan Tiket</span>
            </a>

            <nav id="navbar" class="navbar">
                <ul>
                    <li><a class="nav-link scrollto active" href="../frontend/index.php">Home</a></li>
                    <li><a class="getstarted scrollto" href="../../logout.php">Logout</a></li>
                </ul>
                <i class="bi bi-list mobile-nav-toggle"></i>
            </nav>

        </div>
    </header>


    <section id="hero" class="hero d-flex align-items-center">

        <div class="container">
            <div class="row">
                <div class="col-lg-6 d-flex flex-column justify-content-center">
                    <h1 data-aos="fade-up">Aplikasi pemesanan tiket wisata secara online</h1>
                    <h2 data-aos="fade-up" data-aos-delay="400">Memudahkan pengguna memesan tiket wisata</h2>
                    <div data-aos="fade-up" data-aos-delay="600">
                        <div class="text-center text-lg-start">
                            <a href="#pesansekarang" class="btn-get-started scrollto d-inline-flex align-items-center justify-content-center align-self-center">
                                <span>Pesan Sekarang!</span>
                                <i class="bi bi-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 hero-img" data-aos="zoom-out" data-aos-delay="200">
                    <img src="assets/img/wisata.png" class="img-fluid" alt="">
                </div>
            </div>
        </div>

    </section>

    <main id="main">

        <!-- ======= Values Section ======= -->
        <section id="values" class="values">

            <div class="container" data-aos="fade-up">

                <header class="section-header">
                    <p>Tempat Wisata</p>
                </header>
                <div class="row">
                    <?php

                    include '../../config/koneksi.php';
                    $data = mysqli_query($conn, "SELECT * FROM wisata");
                    while ($d = mysqli_fetch_array($data)) {
                    ?>
                        <div class="col-lg-4" data-aos="fade-up" data-aos-delay="200">
                            <div class="box">
                                <img src="../../assets/images/<?php echo $d['gambar'] ?>" class="img-fluid" alt="">
                                <h3><?php echo $d['nama_wisata']; ?></h3>
                                <p><?php echo $d['lokasi_wisata']; ?></p>
                                <p>Harga tiket: Rp.<?php echo $d['harga_tiket']; ?></p>
                                <a class=" btn bg-primary text-white px-3 mb-0" href="../frontend/embed.php?kode=<?php echo $d['id_wisata']; ?>">Lihat Video</a>
                            </div>


                        </div>
                    <?php
                    }
                    ?>


                </div>



            </div>

        </section>

        <section id="features" class="features">

            <div class="container" data-aos="fade-up">

                <header class="section-header">
                    <p>Pesanan anda</p>
                </header>

                <div class="row">

                    <div class="col-lg-6">
                        <img src="../../assets/images/wis2.png" class="img-fluid" alt="">
                    </div>

                    <div class="col-lg-6 mt-5 mt-lg-0 d-flex">
                        <div class="row align-self-center gy-4">

                            <div class="container-fluid py-4">
                                <div class="row">
                                    <div class="col-12 lg-12">
                                        <div class="card mb-4">
                                            <div class="card-body px-0 pt-0 pb-2">
                                                <div class="table-responsive p-0">

                                                    <table class="table align-items-center mb-0" id="">

                                                        <thead>
                                                            <tr align="center">
                                                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">ID Pemesanan</th>
                                                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">NAMA PEMESAN</th>
                                                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">LOKASI</th>
                                                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">TANGGAL KUNJUNGAN</th>
                                                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">TOTAL BAYAR</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php
                                                            include '../../config/koneksi.php';

                                                            $data = mysqli_query($conn, "SELECT pemesanan.*,wisata.id_wisata,wisata.nama_wisata FROM pemesanan INNER JOIN wisata ON wisata.id_wisata = pemesanan.wisata WHERE pemesanan.nik = $data_nik ORDER BY id_pemesanan ASC LIMIT 5;");
                                                            while ($d = mysqli_fetch_array($data)) {
                                                            ?>
                                                                <tr>

                                                                    <td align="center">
                                                                        <p class="text-xs font-weight-bold mb-0"><?php echo $d['id_pemesanan']; ?></p>

                                                                    </td>

                                                                    <td align="center">
                                                                        <p class="text-xs font-weight-bold mb-0"><?php echo $d['nama']; ?></p>

                                                                    </td>

                                                                    <td align="center">
                                                                        <p class="text-xs font-weight-bold mb-0"><?php echo $d['nama_wisata']; ?></p>



                                                                    </td>
                                                                    <td align="center">
                                                                        <p class="text-xs font-weight-bold mb-0"><?php echo $d['tanggal_kunjungan']; ?></p>
                                                                    </td>
                                                                    </td>
                                                                    <td align="center">
                                                                        <p class="text-xs font-weight-bold mb-0"><?php echo $d['total_bayar']; ?></p>



                                                                </tr>

                                                            <?php
                                                            }

                                                            ?>
                                                        </tbody>
                                                    </table>

                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>

                        </div>


                    </div>

        </section><!-- End Features Section -->

        <div id="pesansekarang" class="row feture-tabs justify-content-center" data-aos="fade-up">
            <div class="box col-10">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">
                            <i class="fa fa-edit"></i> Form Pemesanan
                        </h3>
                    </div>
                    <form action="" method="post" enctype="multipart/form-data" onsubmit="if(document.getElementById('agree').checked) { return true; } else { alert('Mohon checklist persetujuan'); return false; }">
                        <div class="card-body">

                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label">Nama Lengkap</label>
                                <div class="col-sm-8 mb-3">
                                    <input type="text" class="form-control" id="nip" name="nama" placeholder="Nama Lengkap" value="<?php echo $data_nama ?>" readonly required>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label">Nomor Identitas</label>
                                <div class="col-sm-8 mb-3">
                                    <input type="text" class="form-control" id="nama" name="nik" placeholder="NIK" value="<?php echo $data_nik ?>" readonly required>
                                </div>
                            </div>

                            <div class=" form-group row">
                                <label class="col-sm-4 col-form-label">NO HP</label>
                                <div class="col-sm-8 mb-3">
                                    <input type="text" class="form-control" id="nama" name="no_hp" placeholder="NO HP" value="<?php echo $data_no_hp ?>" readonly required>
                                </div>
                            </div>


                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label">Tempat Wisata</label>
                                <div class="col-sm-8 mb-3">
                                    <select class="form-control" name="wisata" onchange="isi_otomatis()" id="id_wisata">
                                        <option value='' selected>- Pilih Tempat Wisata -</option>
                                        <?php
                                        $result1 = mysqli_query($conn, "SELECT * FROM wisata");
                                        while ($row = mysqli_fetch_array($result1)) {
                                            echo "<option  value='" . $row["id_wisata"] . "'>" . $row["id_wisata"] . " - " . $row["nama_wisata"] . "</option>";
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label">Date</label>
                                <div class="col-sm-8 mb-3">
                                    <input type="date" class="form-control" id="myDate" name="tanggal_kunjungan" min="<?php echo $date; ?>">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label">PENGUNJUNG DEWASA</label>
                                <div class="col-sm-8 mb-3">
                                    <input type="number" class="form-control" name="pengunjung_dewasa" id="pdew" onchange="total()" value="0" required>
                                </div>
                            </div>

                            <div class=" form-group row">
                                <label class="col-sm-4 col-form-label">PENGUNJUNG ANAK-ANAK</label>
                                <div class="col-sm-8 mb-3">
                                    <input type="number" class="form-control" name="pengunjung_anak" id="pank" onchange="total()" value="0" required>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label">HARGA TIKET</label>
                                <div class="col-sm-8 mb-3">
                                    <input type="text" class="form-control" name="harga_tiket" id="harga_tiket" onchange="total()" value="" readonly>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label">TOTAL BAYAR</label>
                                <div class="col-sm-8 mb-3">
                                    <input type="text" class="form-control" name="total_bayar" id="total_harga" value="" readonly>
                                </div>
                            </div>

                            <div class="form-group row">

                                <div class="col-sm-12 justify-content-center mb-3">
                                    <input type="checkbox" name="checkbox" value="check" id="agree" /><span>Saya menyetujui persyaratan</span>
                                </div>
                            </div>


                            <div class="card-footer">


                                <button type="submit" name="Simpan" class="btn btn-primary">Pesan Tiket</button>


                                <button type="reset" class="btn btn-secondary">Batal</button>
                            </div>
                    </form>
                </div>
            </div>
        </div>
    </main>
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.11.4/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script type="text/javascript">
        function isi_otomatis() {
            var id_wisata = $("#id_wisata").val();
            $.ajax({
                url: './ajax/proses-ajax.php',
                data: "id_wisata=" + id_wisata,
            }).success(function(data) {
                var json = data,
                    obj = JSON.parse(json);
                $('#harga_tiket').val(obj.harga_tiket);
            });
        }

        function total() {
            var pank = parseInt(document.getElementById('pank').value);
            var pdew = parseInt(document.getElementById('pdew').value);
            var harga = parseInt(document.getElementById('harga_tiket').value);
            if (pank >= 1) {
                var diskon = harga * 0.5;
                var jumlah_harga = pank * (harga - diskon) + pdew * harga;
            } else {
                var jumlah_harga = pdew * harga;
            }
            document.getElementById('total_harga').value = jumlah_harga;
        }

        function myFunction() {
            var x = document.getElementById("myDate").min;
        }
    </script>
    </script>



    <!-- Vendor JS Files -->
    <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
    <script src="assets/vendor/aos/aos.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
    <script src="assets/vendor/php-email-form/validate.js"></script>

    <!-- Template Main JS File -->
    <script src="assets/js/main.js"></script>


</body>

</html>
<?php


if (isset($_POST['Simpan'])) {

    if (empty($_POST['agree']) || $_POST['agree'] != 'agree') {
        echo 'Please indicate that you have read and agree to the Terms and Conditions and Privacy Policy';
    }


    $sql_simpan = "INSERT INTO pemesanan (nama,nik,no_hp,wisata,tanggal_kunjungan,pengunjung_dewasa,pengunjung_anak,total_bayar) VALUES (
'" . $_POST['nama'] . "',
'" . $_POST['nik'] . "',
'" . $_POST['no_hp'] . "',
'" . $_POST['wisata'] . "',
'" . $_POST['tanggal_kunjungan'] . "',
'" . $_POST['pengunjung_dewasa'] . "',
'" . $_POST['pengunjung_anak'] . "',
'" . $_POST['total_bayar'] . "')";

    $query_simpan = mysqli_query($conn, $sql_simpan);

    if ($query_simpan) {
        echo "<script>
    Swal.fire({
        title: 'Tambah Data Berhasil',
        text: '',
        icon: 'success',
        confirmButtonText: 'OK'
    }).then((result) => {
        if (result.value) {
            window.location = 'index.php';
        }
    })
</script>";
    } else {
        echo "<script>
    Swal.fire({
        title: 'Tambah Data Gagal',
        text: '',
        icon: 'error',
        confirmButtonText: 'OK'
    }).then((result) => {
        if (result.value) {
            window.location = 'index.php';
        }
    })
</script>";
    }
}
