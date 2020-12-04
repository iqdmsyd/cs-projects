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
    <!-- Notification.css -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>\files\assets\pages\notification\notification.css">
    <!-- Animate.css -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>\files\bower_components\animate.css\css\animate.css">
    <!-- Style.css -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>\files\assets\css\style.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>\files\assets\css\jquery.mCustomScrollbar.css">

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
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <!-- Authentication card start -->

                        <form class="md-float-material form-material" action="<?php echo base_url()?>login/proses_login" method="POST">
                            <div class="text-center">
                                <img style="max-width: 200px" src="<?php echo base_url() ?>\files\assets\images\logo\Logo_PT_KAI.svg" alt="Logo PT KAI">
                                <H1 class="btn-lg">Sistem Informasi Manajemen <br> E-Commerce (CPE) PT. KAI</H1>
                            </div>
                            <div class="auth-box card">
                                <div class="card-block">
                                    <div class="row m-b-20">
                                        <div class="col-md-12">
                                            <h3 class="text-center">Log In</h3>
                                        </div>
                                    </div>
                                    <div class="form-group form-primary">
                                        <input autofocus="" type="text" name="username" class="form-control" required="" placeholder="Username" value="<?php echo $this->session->userdata('username'); ?>">
                                        <span class="form-bar"></span>
                                    </div>
                                    <div class="input-group input-group-button form-group form-primary">
                                        <input id="password" type="password" name="password" class="form-control" required="" placeholder="Password" onkeyup='check_pass()'>
                                        <span class="form-bar"></span>
                                        <span class="input-group-addon btn btn-primary" onclick="show_pass()">
                                        <span><i class="fa fa-eye fa-fw" aria-hidden="true"></i></span>
                                    </span>
                                    </div>
                                    <div class="row m-t-25 text-left">
                                        <div class="col-12">
                                            <div class="forgot-phone text-right f-right">
                                                <!-- <a href="#" class="text-right f-w-600"> Lupa Password?</a><br> -->
                                                <a href="<?php echo base_url() ?>register" class="text-right f-w-600">Register Here</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row m-t-30">
                                        <div class="col-md-12 notification">
                                            <button type="submit" class="btn btn-primary btn-md btn-block waves-effect waves-light text-center m-b-20" data-type="inverse" data-from="top" data-align="center" data-icon="fa fa-comments">Log in</button>
                                        </div>
                                    </div>
                                    <hr>
                                </div>
                            </div>
                        </form>
                        <!-- end of form -->
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
    <!-- Custom js -->
    <script type="text/javascript" src="<?php echo base_url() ?>\files\assets\js\script.js"></script>
    <!-- notification js -->
    <script type="text/javascript" src="<?php echo base_url() ?>\files\assets\js\bootstrap-growl.min.js"></script>

    <script type="text/javascript" src="<?php echo base_url() ?>\files\assets\js\login_form.js"></script>

    <script>
    <?php if ($this->session->userdata('isWrong')) { ?>
          'use strict';
        $(window).on('load', function(){
                notify('inverse');
        });
    <?php } ?>

    <?php if ($this->session->userdata('isValid')) { ?>
        'use strict';
        $(window).on('load',function(){
            //Welcome Message (not for login page)
            function notify(message, type){
                $.growl({
                    message: message
                },{
                    type: "danger",
                    allow_dismiss: false,
                    label: 'Cancel',
                    className: 'btn-xs btn-inverse',
                    placement: {
                        from: 'top',
                        align: 'center'
                    },
                    // delay: 2500,
                    animate: {
                            enter: 'animated fadeInDown',
                            // exit: 'animated fadeOutRight'
                    },
                    offset: {
                        x: 30,
                        y: 30
                    }
                });
            };

                notify('Maaf, username atau password yang anda masukkan salah', 'inverse');
        });
    <?php } ?>
    </script>

</body>

</html>
