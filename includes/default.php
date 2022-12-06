<div class="container-fluid">
  <div class="page-header min-height-300 border-radius-xl mt-4" style="background-image: url('../../assets/img/curved-images/curved0.jpg'); background-position-y: 50%;">
    <span class="mask bg-gradient-primary "></span>
  </div>
  <div class="card card-body blur shadow-blur mx-4 mt-n6 overflow-hidden">
    <div class="row gx-4">
      <div class="col-auto">
        <div class="avatar avatar-xl position-relative">
          <img src="assets/img/team-2.jpg" alt="profile_image" class="w-100 border-radius-lg shadow-sm">
        </div>
      </div>
      <div class="col-auto my-auto">
        <div class="h-100">
          <h5 class="mb-1">
            <?php echo $data_user; ?>
          </h5>
          <p class="mb-0 font-weight-bold text-sm">
            <?php echo $data_nama; ?> / <?php echo $data_email; ?>
          </p>
        </div>
      </div>

    </div>
  </div>
</div>







          <script>
            $(document).ready(function() {
              $('#example').DataTable();
            });
          </script>