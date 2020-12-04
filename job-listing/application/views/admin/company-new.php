<!-- Top Menu -->
<div class="col-9">
  <div class="container">
    <div class="row">
      <div class="col-12 sdc-top-menu">
        <!-- <div class="d-flex"> -->
          <span>Tambah admin perusahaan</span>
          <a href="<?php echo base_url() ?>admin/company" style="margin-top: 3px;" class="ml-3"><button type="button" name="button" class="btn btn-sm sdc-btn">Lihat data</button></a>
        <!-- </div> -->
      </div>
    </div>
  </div>
  <!-- End of Top menu  -->

  <!-- Content -->
  <div class="container mt-3">
    <div class="row">
      <div class="col-12 sdc-content">
        <div class="container mt-2">
          <div class="row">
            <div class="col-12 form-add-lowongan">
              <h5>Tambah admin baru</h5>
              <p>Isi data di bawah ini</p>

              <?php if (isset($success)): ?>
                <div class="alert alert-success col-12" role="alert">
                  <?php echo $success ?> <a href="<?php echo base_url() ?>admin/company">Lihat data.</a>
                </div>
              <?php endif; ?>

              <form class="" action="<?php echo base_url(); ?>admin/newcompany" method="post">
                <div class="form-group row">
                  <label for="" class="col-4 col-form-label-sm">Nama Perusahaan</label>
                  <div class="col-8">
                    <input type="text" name="NamaPerusahaan" class="form-control form-control-sm" placeholder="Nama Perusahaan" required autofocus>
                  </div>
                </div>

                <div class="form-group row">
                  <label for="" class="col-4 col-form-label-sm">Email</label>
                  <div class="col-8">
                    <input type="text" name="Email" class="form-control form-control-sm" placeholder="Email perusahaan" required>
                  </div>
                </div>

                <div class="form-group row">
                  <label for="" class="col-4 col-form-label-sm">Password</label>
                  <div class="col-8">
                    <input type="password" name="Password" class="form-control form-control-sm" required>
                  </div>
                </div>

                <div class="form-group row">
                  <div class="col-8 offset-4">
                    <input type="submit" name="submit" class="btn btn-success btn-sm form-control form-control-sm">
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- End of Content -->
</div>
</div>
