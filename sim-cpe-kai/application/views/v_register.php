<!DOCTYPE html>
<html lang="en">

<head>
    <title>Sistem Informasi Manajemen: E-Commerce PT. KAI </title>
    <!-- HTML5 Shim and Respond.js IE10 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 10]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
      <![endif]-->
    <!-- Meta -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="#">
    <meta name="keywords" content="Admin , Responsive, Landing, Bootstrap, App, Template, Mobile, iOS, Android, apple, creative app">
    <meta name="author" content="#">
    <!-- Favicon icon -->
    <link rel="icon" href="<?php echo base_url() ?>\files\assets\images\favicon.ico" type="image/x-icon">
    <!-- Google font--><link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,800" rel="stylesheet">
    <!-- Required Fremwork -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>\files\bower_components\bootstrap\css\bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>\files\bower_components\font-awesome\css\font-awesome.min.css">
    <!-- themify-icons line icon -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>\files\assets\icon\themify-icons\themify-icons.css">
    <!-- ico font -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>\files\assets\icon\icofont\css\icofont.css">
    <!-- Style.css -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>\files\assets\css\style.css">
    <!-- Animate.css -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>\files\bower_components\animate.css\css\animate.css">
    <!-- Notification.css -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>\files\assets\pages\notification\notification.css">

</head>

<body class="fix-menu">
    <!-- Pre-loader start -->
    <div class="theme-loader">
    <div class="ball-scale">
        <div class='contain'>
            <div class="ring"><div class="frame"></div></div>
            <div class="ring"><div class="frame"></div></div>
            <div class="ring"><div class="frame"></div></div>
            <div class="ring"><div class="frame"></div></div>
            <div class="ring"><div class="frame"></div></div>
            <div class="ring"><div class="frame"></div></div>
            <div class="ring"><div class="frame"></div></div>
            <div class="ring"><div class="frame"></div></div>
            <div class="ring"><div class="frame"></div></div>
            <div class="ring"><div class="frame"></div></div>
        </div>
    </div>
</div>
    <!-- Pre-loader end -->
    <section class="login-block">
        <!-- Container-fluid starts -->
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <form class="md-float-material form-material" action="<?php echo base_url()?>login/proses_register" method="POST">
                        <div class="text-center">
                            <img style="max-width: 200px" src="<?php echo base_url() ?>\files\assets\images\logo\Logo_PT_KAI.svg" alt="logo.png">
                            <H1 class="btn-lg">Sistem Informasi Manajemen <br> E-Commerce (CPE) PT. KAI</H1>
                        </div>
                        <div class="auth-box card">
                            <div class="card-block">
                                <div class="row m-b-20">
                                    <div class="col-md-12">
                                        <h3 class="text-center txt-primary">Account Registration</h3>
                                    </div>
                                </div>
                                <div class="form-group form-primary">
                                    <input id="nipField" autofocus="" type="text" name="nip" class="form-control" required="" placeholder="NIPP" title="Silahkan isi dengan Nomor Pegawai anda" value="<?php echo $this->session->userdata('nip') ?>">
                                    <span class="form-bar"></span>
                                    <span class="messages">
                                        <p id="nip_messages" class="text-danger error">
                                            <?php if ($this->session->userdata('nipExist')) {
                                                echo "Maaf, NIPP yang anda isi telah terdaftar";
                                            } ?>
                                        </p>
                                    </span>
                                </div>
                                <div class="form-group form-primary">
                                    <input id="nama_lengkapField" type="text" name="nama_lengkap" class="form-control" required="" placeholder="Full Name" title="Silahkan isi dengan Nama Lengkap anda" value="<?php echo $this->session->userdata('nama_lengkap') ?>">
                                    <span class="form-bar"></span>
                                </div>
                                <div class="form-group form-primary">
                                    <input id="usernameField" type="text" name="username" class="form-control" required="" placeholder="Username" title="Silahkan isi dengan Username yang anda inginkan, username akan digunakan untuk proses Login" value="<?php echo $this->session->userdata('username') ?>">
                                    <span class="form-bar"></span>
                                        <p class="text-danger error">
                                            <?php if ($this->session->userdata('usernameExist')) {
                                                echo "Maaf, username yang anda isi telah terdaftar, silahkan login atau gunakan username lain";
                                            } ?>
                                        </p>
                                </div>
                                <div class="form-group form-primary">
                                    <input type="email" name="email" class="form-control" required="" placeholder="Email Address" title="Silahkan isi dengan Email yang anda miliki" value="<?php echo $this->session->userdata('email') ?>">
                                    <span class="form-bar"></span>
                                        <p class="text-danger error">
                                            <?php if ($this->session->userdata('emailExist')) {
                                                echo "Maaf, email yang anda isi telah terdaftar, silahkan gunakan email lain";
                                            } ?>
                                        </p>
                                </div>
                                <div class="input-group input-group-button">
                                    <input type="password" id="password" name="password" class="form-control" required="" placeholder="Password" onkeyup='check_pass()' title="Silahkan isi dengan password yang anda inginkan">
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
                                        <button type="submit" id="submit" class="  btn btn-primary btn-md btn-block waves-effect text-center m-b-20">Register</button>
                                    </div>
                                </div>
                                <div class="row m-t-10 m-b-10 text-center">
                                    <div class="col-4">
                                        <hr>
                                    </div>
                                    <div class="col-4">
                                        <a href="<?php echo base_url() ?>login" class="text-right f-w-600"> Login</a>
                                    </div>
                                    <div class="col-4">
                                        <hr>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <!-- end of col-sm-12 -->
            </div>
            <!-- end of row -->
        </div>
        <!-- end of container-fluid -->
    </section>

    <!-- Required Jquery -->
    <script type="text/javascript" src="<?php echo base_url() ?>\files\bower_components\jquery\js\jquery.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url() ?>\files\bower_components\jquery-ui\js\jquery-ui.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url() ?>\files\bower_components\popper.js\js\popper.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url() ?>\files\bower_components\bootstrap\js\bootstrap.min.js"></script>
    <!-- jquery slimscroll js -->
    <script type="text/javascript" src="<?php echo base_url() ?>\files\bower_components\jquery-slimscroll\js\jquery.slimscroll.js"></script>
    <!-- modernizr js -->
    <script type="text/javascript" src="<?php echo base_url() ?>\files\bower_components\modernizr\js\modernizr.js"></script>
    <script type="text/javascript" src="<?php echo base_url() ?>\files\bower_components\modernizr\js\css-scrollbars.js"></script>
    <!-- i18next.min.js -->
    <script type="text/javascript" src="<?php echo base_url() ?>\files\bower_components\i18next\js\i18next.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url() ?>\files\bower_components\i18next-xhr-backend\js\i18nextXHRBackend.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url() ?>\files\bower_components\i18next-browser-languagedetector\js\i18nextBrowserLanguageDetector.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url() ?>\files\bower_components\jquery-i18next\js\jquery-i18next.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url() ?>\files\assets\js\common-pages.js"></script>
    <script type="text/javascript" src="<?php echo base_url() ?>\files\assets\js\script.js"></script>

    <!-- notification js -->
    <script type="text/javascript" src="<?php echo base_url() ?>\files\assets\js\bootstrap-growl.min.js"></script>
    <!-- Custom script for login & register forms -->
    <script type="text/javascript" src="<?php echo base_url() ?>\files\assets\js\login_form.js"></script>

    <script>
        // Install input filters
        setInputFilter(document.getElementById("nipField"), function(value) {
          return /^\d*$/.test(value); });
        setInputFilter(document.getElementById("nama_lengkapField"), function(value) {
          return /^[a-z\u0020\u00c0-\u024f]*$/i.test(value); });
        setInputFilter(document.getElementById("usernameField"), function(value){
          return /^[a-z\u005F\d]*$/i.test(value); });

        <?php if (array_key_exists("isValid", $this->session->userdata()) && $this->session->userdata('isValid') == 0) { ?>
          'use strict';
        $(window).on('load', function(){
                notifyFailedRegister('inverse');
        });
        <?php } ?>
    </script>

</body>

</html>
