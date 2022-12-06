<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Users</title>
</head>

<body class="g-sidenav-show  bg-gray-100">

    <!-- End Navbar -->
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="card mb-4">
                    <div class="card-header pb-0">
                        <h6>Data Pemesanan</h6>
                    </div>
                    <div class="card-body px-0 pt-0 pb-2">
                        <div class="table-responsive p-0">

                            <table class="table align-items-center mb-0" id="example">

                                <thead>
                                    <tr align="center">
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">ID PEMESANAN</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">NIK</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">NAMA LENGKAP</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">NO_HP</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">WISATA</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">PENGUNJUNG DEWASA</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">PENGUNJUNG ANAK</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">TOTAL BAYAR</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    include '../../config/koneksi.php';
                                    $data = mysqli_query($conn, "SELECT pemesanan.*,wisata.id_wisata,wisata.nama_wisata FROM pemesanan INNER JOIN wisata ON wisata.id_wisata = pemesanan.wisata");
                                    while ($d = mysqli_fetch_array($data)) {
                                    ?>
                                        <tr>

                                            <td align="center">
                                                <p class="text-xs font-weight-bold mb-0"><?php echo $d['id_wisata']; ?></p>

                                            </td>

                                            <td align="center">
                                                <p class="text-xs font-weight-bold mb-0"><?php echo $d['nik']; ?></p>

                                            </td>

                                            <td align="center">
                                                <p class="text-xs font-weight-bold mb-0"><?php echo $d['nama']; ?></p>

                                            </td>

                                            <td align="center">
                                                <p class="text-xs font-weight-bold mb-0"><?php echo $d['no_hp']; ?></p>

                                            </td>
                                            <td align="center">
                                                <p class="text-xs font-weight-bold mb-0"><?php echo $d['nama_wisata']; ?></p>

                                            </td>
                                            <td align="center">
                                                <p class="text-xs font-weight-bold mb-0"><?php echo $d['pengunjung_dewasa']; ?></p>

                                            </td>
                                            <td align="center">
                                                <p class="text-xs font-weight-bold mb-0"><?php echo $d['pengunjung_anak']; ?></p>

                                            </td>
                                            <td align="center">
                                                <p class="text-xs font-weight-bold mb-0"><?php echo $d['total_bayar']; ?></p>

                                            </td>


                                    
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
    </main>

    <!--   Core JS Files   -->
    <script src="../../assets/js/core/popper.min.js"></script>
    <script src="../../assets/js/core/bootstrap.min.js"></script>
    <script src="../../assets/js/plugins/perfect-scrollbar.min.js"></script>
    <script src="../../assets/js/plugins/smooth-scrollbar.min.js"></script>

    <script src="../../assets/js/plugins/perfect-scrollbar.min.js"></script>
    <script src="../../assets/js/plugins/smooth-scrollbar.min.js"></script>
    <script src="../../assets/js/plugins/chartjs.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#example').DataTable();
        });
    </script>
    <script>
        var win = navigator.platform.indexOf('Win') > -1;
        if (win && document.querySelector('#sidenav-scrollbar')) {
            var options = {
                damping: '0.5'
            }
            Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
        }
    </script>
    <!-- Github buttons -->
    <script async defer src="../../jsonlen/buttons.js"></script>

    <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
    <script src="../../assets/js/soft-ui-dashboard.min.js?v=1.0.3"></script>
    <script>
        var win = navigator.platform.indexOf('Win') > -1;
        if (win && document.querySelector('#sidenav-scrollbar')) {
            var options = {
                damping: '0.5'
            }
            Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
        }
    </script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
    <!-- Github buttons -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
    <script src="../../assets/js/soft-ui-dashboard.min.js?v=1.0.3"></script>
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.11.4/js/dataTables.bootstrap5.min.js"></script>
</body>

</html>