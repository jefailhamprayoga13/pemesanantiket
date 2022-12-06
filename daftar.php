<?php
include 'config/koneksi.php';
error_reporting(0);

session_start();

if (isset($_SESSION['username'])) {
    header("Location: index.php");
}

if (isset($_POST['submit'])) {
    $nik= $_POST['nik'];
    $nama = $_POST['nama'];
    $jenis_kel = $_POST['jenis_kel'];
    $no_hp = $_POST['no_hp'];
    $email = $_POST['email'];
    $username = $_POST['username'];
    $password = md5($_POST['password']);
    $cpassword = md5($_POST['cpassword']);
    $role = $_POST['role'];

    if ($password == $cpassword) {
        $sql = "SELECT * FROM users WHERE email='$email'";
        $result = mysqli_query($conn, $sql);

        if (!$result->num_rows > 0) {
            $sql = "INSERT INTO users (nik,nama, jenis_kel,no_hp, email, username, password, role)
                    VALUES ('$nik','$nama','$jenis_kel', '$no_hp', '$email', '$username', '$password', '$role')";
            $result = mysqli_query($conn, $sql);

            if ($result) {
                echo "<script>alert('Selamat, registrasi berhasil!')</script>";
                $email = "";
                $username = "";
                $_POST['password'] = "";
                $_POST['cpassword'] = "";
            } else {
                echo "<script>alert('Woops! Terjadi kesalahan.')</script>";
            }
        } else {
            echo "<script>alert('Woops! Email Sudah Terdaftar.')</script>";
        }
    } else {
        echo "<script>alert('Password Tidak Sesuai')</script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
    <title>Daftar</title>
</head>

<body>
    <section class="vh-auto bg-dark">
        <div class="container py-5 h-100%">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col col-xl-10">
                    <div class="card" style="border-radius: 1rem;">
                        <div class="row g-0">
                            <div class="col-md-6 col-lg-5 d-none d-md-block">
                                <img src="assets/images/reg.jpg" alt="login form" class="img-fluid" style="border-radius: 1rem 0 0 1rem; height:100%;" />
                            </div>
                            <div class="col-md-6 col-lg-7 d-flex align-items-center">
                                <div class=" card-body p-4 p-lg-5 text-black">





                                    <form action="" method="POST" class="login-email">

                                        <div class="d-flex align-items-center mb-3 pb-1">

                                            <span class="h1 fw-bold mb-0">Pemesanan Tiket Wisata</span>
                                        </div>

                                        <h5 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Masukkan Data Anda</h5>

                                        <div class="row">


                                            <div class="col-md-12 col-12">
                                                <div class="input-group">
                                                    <div class="mb-3 col-md-12">
                                                        <input class="form-control" aria-label="Name" aria-describedby="email-addon" type="text" placeholder="NIK" name="nik" value="<?php echo $nik; ?>" required>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-12 col-12">
                                                <div class="input-group">
                                                    <div class="mb-3 col-md-12">
                                                        <input class="form-control" aria-label="Name" aria-describedby="email-addon" type="text" placeholder="Nama Lengkap" name="nama" value="<?php echo $nama_lengkap; ?>" required>
                                                    </div>
                                                </div>
                                            </div>


                                            <div class="col-md-12 col-12">
                                                <div class="input-group">
                                                    <div class="mb-3 col-md-12">
                                                        <input type="radio" name="jenis_kel" value="Laki-Laki" required>
                                                        <label>Laki-Laki</label>
                                                        <input type="radio" name="jenis_kel" value="Perempuan" required>
                                                        <label>Perempuan</label>
                                                    </div>
                                                </div>


                                                <div class="col-md-12 col-12">
                                                    <div class="input-group">
                                                        <div class="mb-3 col-md-12">
                                                            <input class="form-control" aria-label="Name" aria-describedby="email-addon" type="text" placeholder="No HP" name="no_hp" value="<?php echo $no_hp; ?>" required>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="col-md-12 col-12">
                                                    <div class="input-group">
                                                        <div class="mb-3 col-md-12">
                                                            <input class="form-control" aria-label="Email" aria-describedby="email-addon" type="email" placeholder="Email" name="email" value="<?php echo $email; ?>" required>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-12 col-12">
                                                    <div class="input-group">
                                                        <div class="mb-3 col-md-12">
                                                            <input class="form-control" aria-label="Name" aria-describedby="email-addon" type="text" placeholder="Username" name="username" value="<?php echo $username; ?>" required>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>

                                            <div class="col-md-12 col-12">
                                                <div class="input-group">
                                                    <div class="mb-3 col-md-12">
                                                        <input class="form-control" aria-label="Password" aria-describedby="password-addon" type="password" placeholder="Password" name="password" value="<?php echo $_POST['password']; ?>" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12 col-12">
                                                <div class="input-group">
                                                    <div class="mb-3 col-md-12">
                                                        <input class="form-control" aria-label="Password" aria-describedby="password-addon" type="password" placeholder="Confirm Password" name="cpassword" value="<?php echo $_POST['cpassword']; ?>" required>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-12 col-12">
                                                <div class="input-group">
                                                    <div class="mb-3 col-md-12">
                                                        <input class="form-control" aria-label="Name" aria-describedby="email-addon" type="hidden" placeholder="Role" name="role" value="2" readonly="true" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="input-group">
                                                <div class="text-center">
                                                    <button class="btn bg-primary w-100 my-4 mb-2" style="color: white;" name="submit">Daftar</button>
                                                </div>
                                            </div>
                                            <p class="text-sm mt-3 mb-0">Sudah punya akun? <a href="index.php" class="text-dark font-weight-bolder">Masuk</a></p>
                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <script src="assets/js/bootstrap.min.js"></script>
</body>

</html>