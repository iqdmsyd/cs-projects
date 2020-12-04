<!-- Top Menu -->
<div class="col-9">
  <div class="container">
    <div class="row">
      <div class="col-12 sdc-top-menu">
        <div class="d-flex">
          <span>Perusahaan</span>
          <a href="<?php echo base_url() ?>admin/newcompany" style="margin-top: 3px;" class="ml-auto"><button type="button" name="button" class="btn btn-sm sdc-btn">+ Tambah admin</button></a>
        </div>
      </div>
    </div>
  </div>
  <!-- End of Top menu  -->

  <!-- Content -->
  <div class="container mt-3">
    <div class="row">
      <div class="col-12 sdc-content">
        <div class="table-responsive">
          <table class="table table-sm table-stripped" style="table-layout: fixed !important;" width="500">
            <thead class="thead-sdc">
              <tr>
                <th style="width: 30px !important">No</th>
                <th style="width: 200px !important">Nama Perusahaan</th>
                <th style="width: 130px !important">Email</th>
                <th style="width: 130px !important">Telepon</th>
              </tr>
            </thead>
            <tbody>
              <?php $no = $this->uri->segment('3') + 1; ?>
              <?php if (isset($DataCompany) > 0): ?>
                <?php foreach ($DataCompany as $Company): ?>
                  <tr>
                    <th><?php echo $no++ ?></td>
                    <td><?php echo $Company->NamaPerusahaan ?></td>
                    <td><?php echo $Company->Email ?></td>
                    <td><?php echo $Company->Telepon ?></td>
                  </tr>
                <?php endforeach; ?>
              <?php endif; ?>
            </tbody>
          </table>
        </div>
        <p class="pagination"><?php echo $this->pagination->create_links(); ?></p>
      </div>
    </div>
  </div>
</div>
<!-- End of Content -->
</div>
</div>
