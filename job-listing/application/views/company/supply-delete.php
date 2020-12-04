<!-- Top Menu, Content -->
<div class="col-9">
  <div class="container">
    <div class="row">
      <div class="col-12 sdc-top-menu">
        <div class="d-flex">
        <span>Atur Lowongan Kerja</span>
        <a href="<?php echo base_url() ?>company" style="margin-top: 3px;"><button type="button" name="button" class="btn btn-sm sdc-btn">Lihat lowongan</button></a>
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
                    <?php if (isset($success)): ?>
                      <div class="alert alert-success col-12" role="alert">
                        <?php echo $success ?> <a href="<?php echo base_url() ?>company">Lihat lowongan.</a>
                      </div>
                    <?php endif; ?>
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
