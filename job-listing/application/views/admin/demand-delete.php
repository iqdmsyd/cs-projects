<!-- Top Menu -->
<div class="col-9">
  <div class="container">
    <div class="row">
      <div class="col-12 sdc-top-menu">
        <div class="d-flex">
          <span>Demand Data</span>
          <div class="dropdown">
            <button class="ml-3 mt-1 btn sdc-btn btn-sm dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Delete
            </button>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
              <a class="dropdown-item" href="<?php echo base_url() ?>admin">View</a>
              <a class="dropdown-item" href="<?php echo base_url() ?>insert">Insert</a>
              <a class="dropdown-item" href="<?php echo base_url() ?>update">Update</a>
              <a class="dropdown-item" href="<?php echo base_url() ?>delete">Delete</a>
            </div>
          </div>
          <form class="form-inline ml-auto" action="<?php echo base_url() ?>delete" method="get">
            <input type="text" name="q" class="form-control form-control-sm mr-3" placeholder="NIK.." autofocus>
            <input type="submit" class="form-control btn btn-sm sdc-btn" value="Cari">
          </form>
        </div>
      </div>
    </div>
  </div>
  <!-- End of Top menu  -->

  <!-- Content -->
  <div class="container mt-3">
    <div class="row">
      <div class="col-12 sdc-content">
        <?php if (isset($success)): ?>
          <div class="alert alert-success col-12" role="alert">
            <?php echo $success ?> <a href="<?php echo base_url() ?>admin">Lihat data.</a>
          </div>
        <?php endif; ?>

        <?php if (isset($failed)): ?>
          <div class="alert alert-danger col-12" role="alert">
            <?php echo $failed ?>
          </div>
        <?php endif; ?>

        <?php if (isset($Demand)): ?>
        <div class="table-responsive">
          <table class="table table-sm table-stripped" style="table-layout: fixed !important;" width="500">
            <thead class="thead-sdc">
              <tr>
                <th style="width: 30px !important">No</th>
                <th style="width: 130px !important">NIK</th>
                <th style="width: 200px !important">Nama</th>
                <th style="width: 130px !important">Tempat Lahir</th>
                <th style="width: 100px !important">Tanggal Lahir</th>
                <th style="width: 100px !important">Jenis Kelamin</th>
                <th style="width: 300px !important">Alamat</th>
                <th style="width: 150px !important">Kecamatan</th>
                <th style="width: 100px !important">Telepon</th>
                <th style="width: 200px !important">Email</th>
                <th style="width: 100px !important">Pendidikan</th>
                <th style="width: 240px !important">Jurusan</th>
              </tr>
            </thead>
            <tbody>

                <tr>
                  <th><?php echo "1" ?></td>
                  <td><?php echo $Demand->NIK ?></td>
                  <td><?php echo $Demand->Nama ?></td>
                  <td><?php echo $Demand->TempatLahir ?></td>
                  <td><?php echo $Demand->TanggalLahir ?></td>
                  <td><?php echo $Demand->JenisKelamin ?></td>
                  <td><?php echo $Demand->Alamat ?></td>
                  <td><?php echo $Demand->Kecamatan ?></td>
                  <td><?php echo $Demand->Telepon ?></td>
                  <td><?php echo $Demand->Email ?></td>
                  <td><?php echo $Demand->Pendidikan ?></td>
                  <td><?php echo $Demand->Jurusan ?></td>
                </tr>

            </tbody>
          </table>
        </div>

        <form class="form-inline d-flex mt-3" action="<?php echo base_url() ?>delete" method="post">
          <input type="text" name="ID" value="<?php echo $Demand->ID ?>" hidden>
          <input type="submit" name="submit" value="Delete" class="form-control btn btn-sm sdc-btn ml-auto">
        </form>
        <?php endif; ?>
      </div>
    </div>
  </div>
</div>
<!-- End of Content -->
</div>
</div>
