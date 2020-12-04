<!-- Top Menu -->
<div class="col-9">
  <div class="container">
    <div class="row">
      <div class="col-12 sdc-top-menu">
        <div class="d-flex">
          <span>Demand Data</span>
          <div class="dropdown">
            <button class="ml-3 mt-1 btn sdc-btn btn-sm dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Update
            </button>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
              <a class="dropdown-item" href="<?php echo base_url() ?>admin">View</a>
              <a class="dropdown-item" href="<?php echo base_url() ?>insert">Insert</a>
              <a class="dropdown-item" href="<?php echo base_url() ?>update">Update</a>
              <a class="dropdown-item" href="<?php echo base_url() ?>delete">Delete</a>
            </div>
          </div>
          <form class="form-inline ml-auto" action="<?php echo base_url() ?>update" method="get">
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
        <div class="container mt-2">
          <div class="row">
            <?php if (isset($failed)): ?>
              <div class="alert alert-danger col-12" role="alert">
                <?php echo $failed ?>
              </div>
            <?php endif; ?>

            <?php if (isset($success)): ?>
              <div class="alert alert-success col-12" role="alert">
                <?php echo $success ?> <a href="<?php echo base_url() ?>admin">Lihat data.</a>
              </div>
            <?php endif; ?>

            <?php if (isset($Demand->ID)): ?>
              <div class="col-12 form-add-lowongan">
                <h5>Update data demand</h5>
                <p>Isi data di bawah ini</p>

                <form class="" action="<?php echo base_url(); ?>update" method="post">

                  <input type="text" name="ID" value="<?php echo $Demand->ID ?>" hidden>

                  <div class="form-group row">
                    <label for="" class="col-4 col-form-label-sm">NIK</label>
                    <div class="col-8">
                      <input type="text" value="<?php echo $Demand->NIK ?>" name="NIK" class="form-control form-control-sm" placeholder="NIK" required autofocus>
                    </div>
                  </div>

                  <div class="form-group row">
                    <label for="" class="col-4 col-form-label-sm">Nama Lengkap</label>
                    <div class="col-8">
                      <input type="text" value="<?php echo $Demand->Nama ?>" name="Nama" class="form-control form-control-sm" placeholder="Nama lengkap" required>
                    </div>
                  </div>

                  <div class="form-group row">
                    <label for="" class="col-4 col-form-label-sm">Tempat Lahir</label>
                    <div class="col-8">
                      <input type="text" value="<?php echo $Demand->TempatLahir ?>" name="TempatLahir" class="form-control form-control-sm" placeholder="Tempat lahir" required>
                    </div>
                  </div>

                  <div class="form-group row">
                    <label for="" class="col-4 col-form-label-sm">Tanggal Lahir</label>
                    <div class="col-3">
                      <input type="date" value="<?php echo $Demand->TanggalLahir ?>" name="TanggalLahir" class="form-control form-control-sm" required>
                    </div>
                  </div>

                  <div class="form-group row">
                    <label for="" class="col-4 col-form-label-sm">Jenis Kelamin</label>
                    <div class="col-3">
                      <select value="<?php echo $Demand->JenisKelamin ?>" name="JenisKelamin" class="form-control form-control-sm" required>
                        <option value="<?php echo $Demand->JenisKelamin ?>"><?php echo $Demand->JenisKelamin ?></option>
                        <option value="Perempuan">Perempuan</option>
                        <option value="Laki-laki">Laki-laki</option>
                      </select>
                    </div>
                  </div>

                  <div class="form-group row">
                    <label for="" class="col-4 col-form-label-sm">Alamat</label>
                    <div class="col-8">
                      <input type="text" value="<?php echo $Demand->Alamat ?>" name="Alamat" class="form-control form-control-sm" placeholder="Alamat" required>
                    </div>
                  </div>

                  <div class="form-group row">
                    <label for="" class="col-4 col-form-label-sm">RT</label>
                    <div class="col-3">
                      <input type="text" value="<?php echo $Demand->RT ?>" name="RT" class="form-control form-control-sm" placeholder="RT" required>
                    </div>
                  </div>

                  <div class="form-group row">
                    <label for="" class="col-4 col-form-label-sm">RW</label>
                    <div class="col-3">
                      <input type="text" value="<?php echo $Demand->RW ?>" name="RW" class="form-control form-control-sm" placeholder="RW" required>
                    </div>
                  </div>

                  <div class="form-group row">
                    <label for="" class="col-4 col-form-label-sm">Desa</label>
                    <div class="col-8">
                      <input type="text" value="<?php echo $Demand->Desa ?>" name="Desa" class="form-control form-control-sm" placeholder="Desa" required>
                    </div>
                  </div>

                  <div class="form-group row">
                    <label for="" class="col-4 col-form-label-sm">Kecamatan</label>
                    <div class="col-8">
                      <select name="Kecamatan" class="form-control form-control-sm" required>
                        <option value="<?php echo $Demand->Kecamatan ?>" selected><?php echo $Demand->Kecamatan ?></option>
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
                    <label for="" class="col-4 col-form-label-sm">Telepon</label>
                    <div class="col-8">
                      <input type="text" value="<?php echo $Demand->Telepon ?>" name="Telepon" class="form-control form-control-sm" placeholder="Telepon" required>
                    </div>
                  </div>

                  <div class="form-group row">
                    <label for="" class="col-4 col-form-label-sm">Email</label>
                    <div class="col-8">
                      <input type="text" value="<?php echo $Demand->Email ?>" name="Email" class="form-control form-control-sm" placeholder="Email" required>
                    </div>
                  </div>

                  <div class="form-group row">
                    <label for="" class="col-4 col-form-label-sm">Status</label>
                    <div class="col-3">
                      <select name="Status" class="form-control form-control-sm" required>
                        <option value="<?php echo $Demand->Status ?>"><?php echo $Demand->Status ?></option>
                        <option value="KAWIN">Kawin</option>
                        <option value="BELUM KAWIN">Belum kawin</option>
                      </select>
                    </div>
                  </div>

                  <div class="form-group row">
                    <label for="" class="col-4 col-form-label-sm">Pendidikan</label>
                    <div class="col-4">
                      <input type="text" value="<?php echo $Demand->Pendidikan ?>" name="Pendidikan" class="form-control form-control-sm" placeholder="Pendidikan" required>
                    </div>
                  </div>

                  <div class="form-group row">
                    <label for="" class="col-4 col-form-label-sm">Jurusan</label>
                    <div class="col-4">
                      <input type="text" value="<?php echo $Demand->Jurusan ?>" name="Jurusan" class="form-control form-control-sm" placeholder="Jurusan" required>
                    </div>
                  </div>

                  <div class="form-group row">
                    <label for="" class="col-4 col-form-label-sm">NEM/IPK</label>
                    <div class="col-4">
                      <input type="text" value="<?php echo $Demand->NEMIPK ?>" name="NEM/IPK" class="form-control form-control-sm" placeholder="NEM/IPK" required>
                    </div>
                  </div>

                  <div class="form-group row">
                    <label for="" class="col-4 col-form-label-sm">Tahun</label>
                    <div class="col-4">
                      <input type="text" value="<?php echo $Demand->Tahun ?>" name="Tahun" class="form-control form-control-sm" placeholder="Tahun" required>
                    </div>
                  </div>

                  <div class="form-group row">
                    <label for="" class="col-4 col-form-label-sm">Keterampilan</label>
                    <div class="col-8">
                      <textarea value="<?php echo $Demand->Keterampilan ?>" name="Keterampilan" class="form-control form-control-sm" placeholder="Keterampilan" required><?php echo $Demand->Keterampilan ?>
                      </textarea>
                    </div>
                  </div>

                  <div class="form-group row">
                    <label for="" class="col-4 col-form-label-sm">KemampuanBahasa</label>
                    <div class="col-3">
                      <select name="KemampuanBahasa" class="form-control form-control-sm" required>
                        <option value="<?php echo $Demand->KemampuanBahasa ?>"><?php echo $Demand->KemampuanBahasa ?></option>
                        <option value="INGGRIS">Inggris</option>
                        <option value="INDONESIA">Indonesia</option>
                      </select>
                    </div>
                  </div>

                  <div class="form-group row">
                    <label for="" class="col-4 col-form-label-sm">Jabatan</label>
                    <div class="col-8">
                      <input type="text" value="<?php echo $Demand->Jabatan ?>" name="Jabatan" class="form-control form-control-sm" placeholder="Jabatan" required>
                    </div>
                  </div>

                  <div class="form-group row">
                    <label for="" class="col-4 col-form-label-sm">Uraian Tugas</label>
                    <div class="col-8">
                      <input type="text" value="<?php echo $Demand->UraianTugas ?>" name="UraianTugas" class="form-control form-control-sm" placeholder="Uraian tugas" required>
                    </div>
                  </div>

                  <div class="form-group row">
                    <label for="" class="col-4 col-form-label-sm">LamaKerja</label>
                    <div class="col-8">
                      <input type="text" value="<?php echo $Demand->LamaKerja ?>" name="LamaKerja" class="form-control form-control-sm" placeholder="Lama kerja" required>
                    </div>
                  </div>

                  <div class="form-group row">
                    <label for="" class="col-4 col-form-label-sm">Jabatan Diinginkan</label>
                    <div class="col-8">
                      <input type="text" value="<?php echo $Demand->JabatanDiinginkan ?>" name="JabatanDiinginkan" class="form-control form-control-sm" placeholder="Jabatan yang diinginkan" required>
                    </div>
                  </div>

                  <div class="form-group row">
                    <label for="" class="col-4 col-form-label-sm">Tempat Kerja</label>
                    <div class="col-8">
                      <select name="TempatKerja" class="form-control form-control-sm" required>
                        <option value="<?php echo $Demand->TempatKerja ?>"><?php echo $Demand->TempatKerja ?></option>
                        <option value="DALAM NEGERI">Dalam negeri</option>
                        <option value="LUAR NEGERI">Luar negeri</option>
                      </select>
                    </div>
                  </div>

                  <div class="form-group row">
                    <label for="" class="col-4 col-form-label-sm">Lokasi Kerja</label>
                    <div class="col-8">
                      <input type="text" value="<?php echo $Demand->LokasiKerja ?>" name="LokasiKerja" class="form-control form-control-sm" placeholder="Lokasi bekerja" required>
                    </div>
                  </div>

                  <div class="form-group row">
                    <label for="" class="col-4 col-form-label-sm">Besaran Upah</label>
                    <div class="col-8">
                      <input type="text" value="<?php echo $Demand->BesaranUpah ?>" name="BesaranUpah" class="form-control form-control-sm" placeholder="Rp.." required>
                    </div>
                  </div>

                  <div class="form-group row">
                    <label for="" class="col-4 col-form-label-sm">Usia</label>
                    <div class="col-8">
                      <input type="number" value="<?php echo $Demand->Usia ?>" name="Usia" class="form-control form-control-sm" min="10" max="80" required>
                    </div>
                  </div>

                  <div class="form-group row">
                    <div class="col-8 offset-4">
                      <input type="submit" name="submit" class="btn btn-success btn-sm form-control form-control-sm">
                    </div>
                  </div>
                </form>
              </div>
            <?php endif; ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- End of Content -->
</div>
</div>
