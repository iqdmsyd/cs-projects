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
                    <div class="d-flex">
                      <h5>Atur Lowongan Kerja</h5>
                      <button type="button" class="btn btn-small sdc-btn ml-auto" onclick="location.href='<?php echo base_url() ?>company/delete/<?php echo $Lowongan->ID ?>'">Delete</button>
                    </div>

                    <p>Isi data di bawah ini</p>

                    <?php if (isset($success)): ?>
                      <div class="alert alert-success col-12" role="alert">
                        <?php echo $success ?> <a href="<?php echo base_url() ?>company">Lihat lowongan.</a>
                      </div>
                    <?php endif; ?>

                    <form class="" action="<?php echo base_url(); ?>manage/<?php echo $Lowongan->ID ?>" method="post">
                      <div class="form-group row">
                        <label for="" class="col-4 col-form-label-sm">Judul Lowongan</label>
                        <div class="col-8">
                          <input type="text" name="Judul" class="form-control form-control-sm" placeholder="Judul lowongan" required value="<?php echo $Lowongan->Judul ?>" autofocus>
                        </div>
                      </div>

                      <div class="form-group row">
                        <label for="" class="col-4 col-form-label-sm">Kategori</label>
                        <div class="col-8">
                          <select name="Kategori" class="form-control form-control-sm" required >
                            <option selected><?php echo $Lowongan->Kategori ?></option>
                            <option value="Industri">Industri</option>
                            <option value="Manufaktur">Manufaktur</option>
                            <option value="Pertanian">Pertanian</option>
                          </select>
                        </div>
                      </div>

                      <div class="form-group row">
                        <label for="" class="col-4 col-form-label-sm">Kecamatan</label>
                        <div class="col-8">
                          <select name="Kecamatan" class="form-control form-control-sm" required>
                            <option selected><?php echo $Lowongan->Kecamatan ?></option>
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
                        </div>
                      </div>

                      <div class="form-group row">
                        <label for="" class="col-4 col-form-label-sm">Gaji</label>
                        <div class="col-8">
                          <input type="text" name="Gaji" class="form-control form-control-sm" placeholder="Gaji" required value="<?php echo $Lowongan->Gaji ?>">
                        </div>
                      </div>

                      <div class="form-group row">
                        <label for="" class="col-4 col-form-label-sm">Deskripsi</label>
                        <div class="col-8">
                          <textarea name="Deskripsi" class="form-control form-control-sm" placeholder="Deskripsi" required><?php echo $Lowongan->Deskripsi ?>
                          </textarea>
                        </div>
                      </div>

                      <div class="form-group row">
                        <label for="" class="col-4 col-form-label-sm">Kuota</label>
                        <div class="col-8">
                          <input type="number" name="Kuota" class="form-control form-control-sm" min="1" max="50" placeholder="1" required value="<?php echo $Lowongan->Kuota ?>">
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
