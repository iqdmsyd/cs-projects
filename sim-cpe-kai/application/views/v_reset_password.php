<div class="pcoded-content">
    <div class="pcoded-inner-content">
        <!-- Main-body start -->
        <div class="main-body">
            <div class="page-wrapper">
                <!-- Page-header start -->
                <div class="page-header">
                    <div class="row align-items-end">
                        <div class="col-lg-8">
                            <div class="page-header-title">
                                <div class="d-inline">
                                    <h4>User Profile</h4>
                                    <!-- <span>lorem ipsum dolor sit amet, consectetur adipisicing elit</span> -->
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="page-header-breadcrumb">
                                <ul class="breadcrumb-title">
                                    <li class="breadcrumb-item">
                                        <a href="<?php echo base_url() ?>"> <i class="feather icon-home"></i> </a>
                                    </li>
                                    <li class="breadcrumb-item"><a href="<?php echo base_url("user/profile"); ?>">User Profile</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Page-header end -->

                <!-- Page-body start -->
                <div class="page-body">
                    <!--profile cover start-->
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="cover-profile">
                                <div class="profile-bg-img">
                                    <img class="profile-bg-img img-fluid" src="<?php echo base_url() ?>\files\assets\images\user-profile\bg-img-kai.jpg" alt="bg-img">
                                    <div class="card-block user-info">
                                        <div class="col-md-12">
                                            <div class="media-left">
                                                <a href="#" class="profile-image">
                                                    <img class="user-img img-radius img-fluid" style="max-width: 100px" src="https://pixy.org/src/476/thumbs350/4764586.jpg" alt="user-img">
                                                </a>
                                            </div>
                                            <div class="media-body row">
                                                <div class="col-lg-12">
                                                    <div class="user-title">
                                                        <h2><?php echo $this->session->userdata('nama_lengkap') ?></h2>
                                                        <span class="text-white"><?php echo $this->session->userdata('nama_tipe_user') ?></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--profile cover end-->
                    <!-- tab content start -->
                    <div class="tab-content">
                        <!-- tab panel personal start -->
                        <div class="tab-pane active" id="personal" role="tabpanel">
                            <!-- personal card start -->
                            <div class="card">
                                <div class="card-header">
                                    <h5 class="card-header-text">Reset Password</h5>
                                    <span>Please insert your new password</span>
                                    <!-- <button id="edit-btn" type="button" class="btn btn-sm btn-primary waves-effect waves-light f-right">
                                        <i class="icofont icofont-edit"></i>
                                    </button> -->
                                </div>
                                <div class="card-block">
                                    <div class="view-info">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="general-info">
                                                    <form class="md-float-material form-material" action="<?php echo base_url()?>user/proses_reset_password" method="POST">
                                                        <div class="auth-box card">
                                                            <div class="card-block">
                                                                <div class="form-group form-primary">
                                                                    <input type="text" name="username" class="form-control" required="" placeholder="Username" value="<?php echo $this->session->userdata('username'); ?>" disabled>
                                                                    <span class="form-bar"></span>
                                                                </div>
                                                                <div class="input-group input-group-button">
                                                                    <input autofocus type="password" id="password" name="password" class="form-control" required="" placeholder="Password" onkeyup='check_pass()' title="Silahkan isi dengan password yang anda inginkan">
                                                                    <span class="form-bar"></span>
                                                                    <span class="input-group-addon btn btn-primary" onclick="show_pass()">
                                                                        <span><i class="fa fa-eye fa-fw" aria-hidden="true"></i></span>
                                                                    </span>
                                                                </div>

                                                                <div class="input-group input-group-button">
                                                                    <input type="password" id="confirm_password" name="confirm_password" class="form-control" required="" placeholder="Confirm Password" onkeyup='check_pass()' title="Silahkan isi dengan password anda sekali lagi">
                                                                    <span class="form-bar"></span>
                                                                    <span class="input-group-addon btn btn-primary" onclick="show_conf_pass()">
                                                                        <span><i class="fa fa-eye fa-fw" aria-hidden="true"></i></span>
                                                                    </span>
                                                                </div>
                                                                </div>
                                                                <div class="text-center"><span id='message'></span></div>
                                                                <div class="row m-t-30">
                                                                    <div class="col-md-12">
                                                                        <button type="submit" id="submit" class="  btn btn-primary btn-md btn-block waves-effect text-center m-b-20">Reset Password</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </form>
                                                    <!-- end of form -->
                                                </div>
                                                <!-- end of general info -->
                                            </div>
                                            <!-- end of col-lg-12 -->
                                        </div>
                                        <!-- end of row -->
                                    </div>
                                    <!-- end of view-info -->