    <!-- Top Menu, Content -->
    <div class="col-9">
      <div class="container">
        <div class="row">
          <div class="col-12 sdc-top-menu">
            <div class="d-flex">
            <span>Lowongan Kerja</span>
            <a href="<?php echo base_url() ?>company/newsupply" style="margin-top: 3px;"><button type="button" name="button" class="btn btn-sm sdc-btn">+ Tambah</button></a>

              <form class="form-inline ml-auto" action="<?php echo base_url() ?>company" method="post">
                <select name="kategori" class="form-control form-control-sm mx-4">
                  <option selected>Kategori</option>
                  <!-- <option value="Batujajar">Batujajar</option>
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
                  <option value="Sindangkerta">Sindangkerta</option> -->
                </select>
                <input type="submit" name="search" value="OK" class="form-control form-control-sm btn btn-sm btn-success">
              </form>
            </div>
          </div>
        </div>
      </div>
      <div class="container mt-3">
        <div class="row">
          <div class="col-12 sdc-content">
            <div class="container">
              <div class="row">

                <!--List lowongan kerja -->
                <?php $no = $this->uri->segment('2') + 1; ?>
                <?php if (isset($DataLowongan) > 0): ?>
                  <?php foreach ($DataLowongan as $Lowongan): ?>
                    <div class="col-12 sdc-list-lowongan">
                      <div class="container">
                        <div class="row">
                          <div class="col-2">
                            <img src="<?php echo base_url() ?>assets/img/koenigsegg.png" alt="">
                          </div>
                          <div class="col-10">
                            <div class="d-flex">
                              <p class="sdc-lowongan-title">
                                <?php echo $Lowongan->Judul ?>
                              </p>
                                <button type="button" name="button" class="btn btn-sm sdc-btn ml-auto" onclick="location.href='<?php echo base_url() ?>company/manage/<?php echo $Lowongan->ID ?>'">Manage</button>
                            </div>
                            <span class="sdc-lowongan-kategori"><?php echo $Lowongan->Kategori ?></span>

                            <div class="sdc-lowongan-detail">
                              <p></p>
                              <table>
                                <tr>
                                  <td>Kuota</td>
                                  <td>:</td>
                                  <td><?php echo $Lowongan->Pendaftar ?> / <?php echo $Lowongan->Kuota ?></td>
                                </tr>
                                <tr>
                                  <td>Kecamatan</td>
                                  <td>:</td>
                                  <td><?php echo $Lowongan->Kecamatan ?></td>
                                </tr>
                                <tr>
                                  <td>Gaji</td>
                                  <td>:</td>
                                  <td>Rp. <?php echo number_format($Lowongan->Gaji) ?></td>
                                </tr>
                              </table>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  <?php endforeach; ?>
                <?php endif; ?>
                <!-- End of List lowongan Kerja -->

              </div>
            </div>
            <p class="pagination"><?php echo $this->pagination->create_links(); ?></p>
          </div>
        </div>
      </div>
    </div>
    <!-- End of Top Menu, Content -->
  </div>
</div>
