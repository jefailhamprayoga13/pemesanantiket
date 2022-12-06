<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Wisata</title>
</head>

<body class="g-sidenav-show  bg-gray-100">

    <!-- End Navbar -->
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="card mb-4">
                    <div class="card-header pb-0">
                        <h6>Data Wisata</h6>
                    </div>
                    <div style="margin-left: 20px;">
                        <a href="?page=tambah-wisata" class="btn btn-primary">
                            <i class="fa fa-edit"></i> Tambah Data</a>
                    </div>
                    <div class="card-body px-0 pt-0 pb-2">
                        <div class="table-responsive p-0">

                            <table class="table align-items-center mb-0" id="example">

                                <thead>
                                    <tr align="center">
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">ID WISATA</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">NAMA WISATA</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">LOKASI</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">HARGA TIKET</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">GAMBAR</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">LINK</th>


                                        <th class="text-secondary opacity-7"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    include '../../config/koneksi.php';
                                    $data = mysqli_query($conn, "SELECT * FROM wisata");
                                    while ($d = mysqli_fetch_array($data)) {
                                    ?>
                                        <tr>

                                            <td align="center">
                                                <p class="text-xs font-weight-bold mb-0"><?php echo $d['id_wisata']; ?></p>

                                            </td>
                                            <td align="center">
                                                <p class="text-xs font-weight-bold mb-0"><?php echo $d['nama_wisata']; ?></p>

                                            </td>
                                            <td align="center">
                                                <p class="text-xs font-weight-bold mb-0"><?php echo $d['lokasi_wisata']; ?></p>

                                            </td>
                                            <td align="center">
                                                <p class="text-xs font-weight-bold mb-0"><?php echo $d['harga_tiket']; ?></p>

                                            </td>
                                            <td align="center">
                                                <img src='../../assets/images/<?php echo $d['gambar'] ?>' width='100' height='100'>

                                            </td>

                                            <td align="center">
                                                <p class="text-xs font-weight-bold mb-0"><?php echo $d['link']; ?></p>

                                            </td>

                                            <td class="align-middle" style="">
                                                <div class="ms-auto text-end">
                                                    <a class="btn text-danger bg-danger px-3 mb-0 " href="#" data-bs-toggle="modal" data-bs-target="#exampleModal2<?php echo $d['id_wisata']; ?>"><i class="far fa-trash-alt text-white "></i></a>


                                                    <div class="modal fade" id="exampleModal2<?= $d['id_wisata']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel2" aria-hidden="true">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="exampleModalLabel2">Delete</h5>
                                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    Apakah anda yakin ingin menghapus data?
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tidak</button>
                                                                    <a href="?page=del-wisata&kode=<?php echo $d['id_wisata']; ?>">
                                                                        <button type="button" class="btn btn-primary">Ya</button>
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <a class="btn bg-success px-3 mb-0" href="?page=edit-wisata&kode=<?php echo $d['id_wisata']; ?>"><i class="fas fa-pencil-alt text-white " aria-hidden="true"></i></a>
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