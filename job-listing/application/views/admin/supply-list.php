<!-- Top Menu -->
<div class="col-9">
  <div class="container">
    <div class="row">
      <div class="col-12 sdc-top-menu">
        <div class="d-flex">
          <span>Lowongan Perkerjaan</span>
          <!-- <a href="<?php echo base_url() ?>admin/newcompany" style="margin-top: 3px;" class="ml-auto"><button type="button" name="button" class="btn btn-sm sdc-btn">+ Tambah admin</button></a> -->
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
                <th style="width: 130px !important">Kategori</th>
                <th style="width: 130px !important">Kecamatan</th>
                <th style="width: 130px !important">Gaji</th>
                <th style="width: 130px !important">Kuota</th>
                <th style="width: 130px !important">Pendaftar</th>
              </tr>
            </thead>
            <tbody>
              <?php $no = $this->uri->segment('3') + 1; ?>
              <?php if (isset($DataSupply) > 0): ?>
                <?php foreach ($DataSupply as $Supply): ?>
                  <tr>
                    <th><?php echo $no++ ?></td>
                    <td><?php echo $Supply->NamaPerusahaan ?></td>
                    <td><?php echo $Supply->Kategori ?></td>
                    <td><?php echo $Supply->Kecamatan ?></td>
                    <td>Rp. <?php echo number_format($Supply->Gaji) ?></td>
                    <td><?php echo $Supply->Kuota ?></td>
                    <td><?php echo $Supply->Pendaftar ?></td>
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
