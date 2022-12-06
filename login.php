<?php

session_start();
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));


?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title></title>
</head>

<body>

    <section class="vh-100 bg-dark">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col col-xl-10">
                    <div class="card" style="border-radius: 1rem;">
                        <div class="row g-0">
                            <div class="col-md-6 col-lg-5 d-none d-md-block">
                                <img src="assets/images/reg.jpg" alt="login form" class="img-fluid" style="border-radius: 1rem 0 0 1rem; height:100%;" />
                            </div>
                            <div class="col-md-6 col-lg-7 d-flex align-items-center">
                                <div class=" card-body p-4 p-lg-5 text-black">


                                    <form role="form" action="" method="POST">

                                        <div class="d-flex align-items-center mb-3 pb-1">

                                            <span class="h1 fw-bold mb-0">Pemesanan Tiket Wisata</span>
                                        </div>

                                        <h5 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Masuk ke akun anda</h5>

                                        <div class="mb-3 col-md-12">
                                            <div class="form-group">
                                                <input type="text" name="username" class="form-control" placeholder="Masukan Username" required autofocus />
                                            </div>
                                        </div>


                                        <div class="mb-3 col-md-12">
                                            <div class="form-group">
                                                <input type="password" name="password" class="form-control" placeholder="Masukan Password" required autofocus />
                                            </div>
                                        </div>


                                        <div class="form-group">
                                            <input type="submit" name="login" class="btn btn-primary btn-block" style="color: white;" value="Masuk" />

                                        </div>
                                        <p class="text-sm mt-3 mb-0">Belum punya akun? <a href="daftar.php" class="text-dark font-weight-bolder">Daftar</a></p>


                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


</body>

</html>

<?php
include 'config/koneksi.php';

$username = $_POST['username'];
$password = md5($_POST['password']);
$login = $_POST['login'];


if ($login) {
    $sql = "SELECT * from users where username='$username' and password='$password'";
    $result = mysqli_query($conn, $sql);
    $ketemu = mysqli_num_rows($result);
    $data = mysqli_fetch_assoc($result);

    if ($ketemu >= 1) {
        session_start();

        if ($data['role'] == 1 ) {

            $_SESSION['username'] = $data["username"];
            $_SESSION['email'] = $data["email"];
            $_SESSION['id_user'] = $data["id_user"];
            $_SESSION['nama'] = $data["nama"];
            header("location:includes/backend/index.php");
        } else if ($data['role'] == 2 ) {
            $_SESSION['username'] = $data["username"];
            $_SESSION['nama'] = $data["nama"];
            $_SESSION['nik'] = $data["nik"];
            $_SESSION['no_hp'] = $data["no_hp"];
            $_SESSION['email'] = $data["email"];
            $_SESSION['id_user'] = $data["id_user"];
            header("location:includes/frontend/index.php");
        }
    } else {
        echo '<center><div class="alert alert-danger">Upss...!!! Login gagal. Silakan Coba Kembali</div></center>';
    }
}

?>