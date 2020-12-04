<div class="container mt-5">
  <div class="row">
    <!-- Sidebar -->
    <div class="col-3 sdc-sidebar">
      <div class="sdc-home">
        <p>Skill Development Center</p>
        <img src="<?php echo base_url() ?>assets/img/favicon.ico" alt="" class="img-fluid">
        <br>
        <span>Kab. Bandung Barat</span>
      </div>
      <div class="list-group">
        <a href="<?php echo base_url() ?>admin" class="list-group-item <?php if ($this->uri->segment(2) != 'company' && $this->uri->segment(2) != 'supply' && $this->uri->segment(2) != 'users' && $this->uri->segment(2) != 'newcompany'): ?><?php echo "active" ?><?php endif; ?>"><img src="<?php echo base_url() ?>assets/img/sdc/icon-demand.png" alt="">Demand Data</a>

        <a href="<?php echo base_url() ?>admin/supply" class="list-group-item <?php if ($this->uri->segment(2) == 'supply'): ?>
          <?php echo "active" ?><?php endif; ?>"><img src="<?php echo base_url() ?>assets/img/sdc/icon-supply.png" alt=""> Supply Data</a>

        <a href="<?php echo base_url() ?>admin/company" class="list-group-item <?php if ($this->uri->segment(2) == 'company' || $this->uri->segment(2) == 'newcompany'): ?>
          <?php echo "active" ?><?php endif; ?>"><img src="<?php echo base_url() ?>assets/img/sdc/icon-perusahaan.png" alt=""> Admin Perusahaan</a>

        <a href="<?php echo base_url() ?>admin/users" class="list-group-item <?php if ($this->uri->segment(2) == 'users'): ?>
          <?php echo "active" ?><?php endif; ?>"><img src="<?php echo base_url() ?>assets/img/sdc/icon-users.png" alt=""> Users</a>
      </div>
    </div>
    <!-- End of sidebar -->
