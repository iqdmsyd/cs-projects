<!-- Main content -->

      <!-- Content start -->
      <div class="pcoded-content">
          <div class="pcoded-inner-content">
              <div class="main-body">
                <div class="page-wrapper">
                  <!-- Page-header start -->
                  <div class="page-header">
                      <div class="row align-items-end">
                          <div class="col-lg-8">
                              <div class="page-header-title">
                                  <div class="d-inline">
                                      <h4>Unverified Users List</h4>
                                      <span>lorem ipsum dolor sit amet, consectetur adipisicing elit</span>
                                  </div>
                              </div>
                          </div>
                          <div class="col-lg-4">
                              <div class="page-header-breadcrumb">
                                  <ul class="breadcrumb-title">
                                      <li class="breadcrumb-item">
                                          <a href="<?php echo base_url() ?>"> <i class="feather icon-users"></i> </a>
                                      </li>
                                      <li class="breadcrumb-item"><a href="<?php echo base_url("user/verify") ?>">Verify</a> </li>
                                  </ul>
                              </div>
                          </div>
                      </div>
                  </div>
                  <!-- Page-header end -->

                  <!-- Page-body start -->              
                  <div class="page-body">
                    <div class="row justify-content-center align-items-center">
                      <!-- Table start -->
                      <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h5>Unverified users</h5>
                                <span>Lorem Ipsum</span>
                                <div class="card-header-right">
                                  <ul class="list-unstyled card-option">
                                      <li><i class="feather icon-maximize full-card"></i></li>
                                      <li><i class="feather icon-minus minimize-card"></i></li>
                                  </ul>
                              </div>
                            </div>
                            <div class="card-block">
                                <div class="dt-responsive table-responsive">
                                    <table id="simpletable" class="table table-hover table-striped table-bordered nowrap">
                                        <thead style="font-size: 12px">
                                        <tr>
                                          <th scope="col">#</th>
                                          <th scope="col">NIPP</th>
                                          <th scope="col">Username</th>
                                          <th scope="col">Full Name</th>
                                          <th scope="col">Email</th>
                                          <th scope="col">User Type</th>
                                          <th scope="col">Action</th>
                                        </tr>
                                        </thead>
                                        <tbody style="">
                                          <?php $i=1 ?>
                                          <?php foreach ($users as $val): ?>
                                            <tr>
                                              <th scope="row" class="p-1"><?php echo $i++ ?></th>
                                              <td class="p-1"><?php echo $val->NIP ?></td>
                                              <td class="p-1"><?php echo $val->USERNAME ?></td>
                                              <td class="p-1"><?php echo $val->NAMA_LENGKAP ?></td>
                                              <td class="p-1"><?php echo $val->EMAIL ?></td>
                                              <td class="p-1 text-center"><label class="<?php 
                                                if($val->NAMA_TIPE_USER == "Admin"){
                                                  echo "label label-inverse";}
                                                elseif($val->NAMA_TIPE_USER == "Manager"){
                                                  echo "label label-success";}
                                                elseif($val->NAMA_TIPE_USER == "Junior Manager"){
                                                  echo "label label-info";}
                                                elseif($val->NAMA_TIPE_USER == "Unverified"){
                                                  echo "label label-danger";}
                                                else{
                                                  echo "label label-inverse-info-border";}
                                               ?>"><?php echo $val->NAMA_TIPE_USER ?></label></td>
                                              <td class="p-1 text-center">
                                                <!-- <a href="<?php echo base_url("user/proses_verify/".$val->ID_USER) ?>"> -->
                                                <button type="button" class="label label-warning btn btn-sm" data-toggle="modal" data-target="#userVerifyModal" data-id_user="<?php echo $val->ID_USER ?>" data-nip="<?php echo $val->NIP ?>" data-username="<?php echo $val->USERNAME ?>" data-nama_lengkap="<?php echo $val->NAMA_LENGKAP ?>" data-email="<?php echo $val->EMAIL ?>">
                                                    <i class="feather icon-alert-circle"></i> Verify
                                                  </button>
                                                <!-- </a> -->
                                              </td>
                                            </tr>
                                          <?php endforeach; ?>
                                        </tbody>
                                        <!-- <tfoot style="font-size: 12px">
                                        <tr>
                                            <th>Name</th>
                                            <th>Position</th>
                                            <th>Office</th>
                                            <th>Age</th>
                                            <th>Start date</th>
                                            <th>Salary</th>
                                        </tr>
                                        </tfoot> -->
                                    </table>
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
      <!-- Content end -->
    </div>
</div>
<!-- Main Content end -->
</div>
</div>

 <!-- MODALS -->
<div class="modal fade" id="userVerifyModal" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">User Verification</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
      </div>
      <div class="modal-body">
      <form class="" action="<?php echo base_url('User/proses_verify') ?>" method="POST">
        <input type="hidden" id="id_user" class="form-control" name="id">
        <div class="form-group">
          <label>NIPP</label>
          <input type="text" id="nip" class="form-control" name="nip" value="nip" readonly="">
        </div>
        <div class="form-group">
          <label>Username</label>
          <input type="text" id="username" class="form-control" name="username" readonly="">
        </div>
        <div class="form-group">
          <label>Full Name</label>
          <input type="text" id="nama_lengkap" class="form-control" name="nama_lengkap" readonly>
        </div>
        <div class="form-group">
          <label>Email</label>
          <input type="email" id="email" class="form-control" name="email" readonly>
        </div>
        <div class="form-group">
          <p>Please select the user type below.</p>
          <label>User Type</label><br>
          <select id="tipe" class="custom-select" name="tipe">
            <?php foreach ($userType as $value) { ?>
            <option value="<?php echo $value->ID_TIPE_USER; ?>" 
              <?php 
                if ($value->NAMA_TIPE_USER == "Unverified")
                {
                  echo "selected";
                }
              ?>
              >
              <?php echo $value->NAMA_TIPE_USER; ?>
            </option>
          <?php } ?>
          </select>
        </div>
      </div>
      <div class="modal-footer">
          <button type="button" class="btn btn-sm btn-default waves-effect" data-dismiss="modal"><i class="feather icon-x"></i>Close</button>
          <button type="button" class="btn btn-sm btn-danger waves-effect" data-dismiss="modal" data-toggle="modal" data-target="#userDeleteModal"><i class="feather icon-trash-2"></i>Delete</button>
          <button id="submit" type="submit" class="btn btn-sm btn-warning waves-effect waves-light"><i class="feather icon-check-square"></i>Verify</button>
      </div>
      </form>
    </div>
  </div>
</div>

<!-- MODALS -->
<div class="modal" id="userDeleteModal" tabindex="-1" role="dialog">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Delete Data Pengguna</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
      </div>
      <div class="modal-body text-center">
        <form class="" action="<?php echo base_url('User/proses_delete') ?>" method="POST">
          <p>Anda yakin akan menghapus data pengguna ini?</p>
          <label id="namaDelete"></label>
          <input type="hidden" id="idDelete" class="form-control" name="idDelete">
      </div>
      <div class="modal-footer">
          <button type="button" class="btn btn-sm btn-default waves-effect" data-dismiss="modal"><i class="feather icon-x"></i>Close</button>
          <button id="submit" type="submit" class="btn btn-sm btn-danger waves-effect waves-light"><i class="feather icon-trash-2"></i>Delete</button>
      </div>
      </form>
    </div>
  </div>
</div>