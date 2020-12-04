        <!-- Top Menu -->
        <div class="col-9">
          <div class="container">
            <div class="row">
              <div class="col-12 sdc-top-menu">
                <div class="d-flex">
                  <span>Demand Data</span>
                  <div class="dropdown">
                    <button class="ml-3 mt-1 btn sdc-btn btn-sm dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      View
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                      <a class="dropdown-item" href="<?php echo base_url() ?>admin">View</a>
                      <a class="dropdown-item" href="<?php echo base_url() ?>insert">Insert</a>
                      <a class="dropdown-item" href="<?php echo base_url() ?>update">Update</a>
                      <a class="dropdown-item" href="<?php echo base_url() ?>delete">Delete</a>
                    </div>
                  </div>

                  <form class="form-inline ml-auto" action="<?php echo base_url() ?>admin" method="post">
                    <select name="kecamatan" class="form-control form-control-sm mx-4">
                      <option selected>Kecamatan</option>
                      <option value="Batujajar">Batujajar</option>
                      <option value="Cihampelas">Cihampelas</option>
                      <option value="Cikalong Wetan">Cikalong Wetan</option>
                      <option value="Cililin">Cililin</option>
                      <option value="Cipatat">Cipatat</option>
                      <option value="Cipeundeuy">Cipeundeuy</option>
                      <option value="Cipongkor">Cipongkor</option>
                      <option value="Cisarua">Cisarua</option>
                      <option value="Gununghalu">Gununghalu</option>
                      <option value="Lembang">Lembang</option>
                      <option value="Ngamprah">Ngamprah</option>
                      <option value="Padalarang">Padalarang</option>
                      <option value="Parongpong">Parongpong</option>
                      <option value="Rongga">Rongga</option>
                      <option value="Saguling">Saguling</option>
                      <option value="Sindangkerta">Sindangkerta</option>
                    </select>
                    <input type="submit" name="search" value="OK" class="form-control form-control-sm btn btn-sm btn-success">
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
                      <?php $no = $this->uri->segment('2') + 1; ?>
                      <?php if (isset($DataDemand) > 0): ?>
                        <?php foreach ($DataDemand as $Demand): ?>
                          <tr>
                            <th><?php echo $no++ ?></td>
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
