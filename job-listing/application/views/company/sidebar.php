
  <div class="container mt-5">
    <div class="row">
      <!-- Sidebar -->
      <div class="col-3 sdc-sidebar">
        <div class="sdc-home">
          <p><?php echo $this->session->userdata('Company')->NamaPerusahaan ?></p>
          <img src="<?php echo base_url() ?>assets/img/koenigsegg.png" alt="" class="img-fluid">
          <br>
          <span><?php echo $this->session->userdata('Company')->Alamat ?></span>
        </div>
        <div class="list-group">
          <a href="<?php echo base_url() ?>company" class="list-group-item <?php if ($this->uri->segment(1) == 'newsupply' || $this->uri->segment(2) == 'manage' || ($this->uri->segment(1) == 'company' && $this->uri->segment(2) == NULL )):?><?php echo "active" ?><?php endif; ?>"><img src="<?php echo base_url() ?>assets/img/sdc/icon-supply.png" alt="">Supply Data</a>

          <a href="<?php echo base_url() ?>company/profile" class="list-group-item <?php if ($this->uri->segment(2) == 'profile'):?><?php echo "active" ?><?php endif; ?>"><img src="<?php echo base_url() ?>assets/img/sdc/icon-users.png" alt=""> Info Perusahaan</a>

          <a href="#" class="list-group-item"><img src="<?php echo base_url() ?>assets/img/sdc/icon-supply.png" alt=""> Lorem ipsum</a>

          <a href="#" class="list-group-item"><img src="<?php echo base_url() ?>assets/img/sdc/icon-perusahaan.png" alt=""> Lorem ipsum</a>
        </div>
      </div>
      <!-- End of sidebar -->
