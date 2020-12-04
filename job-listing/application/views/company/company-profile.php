<!-- Top Menu, Content -->
<div class="col-9">
  <div class="container">
    <div class="row">
      <div class="col-12 sdc-top-menu">
        <div class="d-flex">
        <span>Edit Informasi Perusahaan</span>
        <!-- <a href="<?php echo base_url() ?>info" style="margin-top: 3px;"><button type="button" name="button" class="btn btn-sm sdc-btn">Lihat perusahaan</button></a> -->
        </div>
      </div>
    </div>
  </div>
  <div class="container mt-3">
    <div class="row">
      <div class="col-12 sdc-content">
        <div class="container">
          <!--  -->
          <div class="row">
            <div class="col-12">
              <div class="container mt-2">
                <div class="row">
                  <div class="col-12 form-add-lowongan">
                    <h5>Edit informasi perusahaan</h5>
                    <p>Isi data di bawah ini</p>

                    <?php if (isset($success)): ?>
                      <div class="alert alert-success col-12" role="alert">
                        <?php echo $success ?>
                      </div>
                    <?php endif; ?>

                    <form class="" action="<?php echo base_url(); ?>company/profile" method="post">
                      <div class="form-group row">
                        <label for="" class="col-4 col-form-label-sm">Nama Perusahaan</label>
                        <div class="col-8">
                          <input type="text" name="NamaPerusahaan" class="form-control form-control-sm" placeholder="Nama perusahaan" required autofocus value="<?php echo $CompanyInfo->NamaPerusahaan ?>">
                        </div>
                      </div>

                      <div class="form-group row">
                        <label for="" class="col-4 col-form-label-sm">Email Perusahaan</label>
                        <div class="col-8">
                          <input type="text" name="Email" class="form-control form-control-sm" placeholder="Email perusahaan" required autofocus value="<?php echo $CompanyInfo->Email ?>">
                        </div>
                      </div>

                      <div class="form-group row">
                        <label for="" class="col-4 col-form-label-sm">Alamat Perusahaan</label>
                        <div class="col-8">
                          <textarea name="Alamat" class="form-control form-control-sm" rows="3"><?php echo $CompanyInfo->Alamat ?>
                          </textarea>
                        </div>
                      </div>

                      <div class="form-group row">
                        <label for="" class="col-4 col-form-label-sm">Telepon</label>
                        <div class="col-8">
                          <input type="text" name="Telepon" class="form-control form-control-sm" placeholder="Nomor telepon" required autofocus value="<?php echo $CompanyInfo->Telepon ?>">
                        </div>
                      </div>

                      <div class="form-group row">
                        <label for="" class="col-4 col-form-label-sm">Password</label>
                        <div class="col-8">
                          <input type="password" name="Password" class="form-control form-control-sm" required autofocus value="<?php echo $CompanyInfo->Password ?>">
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
    </div>
  </div>
</div>
<!-- End of Top Menu, Content -->
</div>
</div>
