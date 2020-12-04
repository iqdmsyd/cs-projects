<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sign Up Form by Colorlib</title>

    <!-- Font Icon -->
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/form/fonts/material-icon/css/material-design-iconic-font.min.css">

    <!-- Main css -->
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/form/css/style.css">

</head>
<body>

    <div class="main">

        <section class="signup">
            <!-- <img src="images/signup-bg.jpg" alt=""> -->
            <div class="container">
                <div class="signup-content">
                    <form method="POST" id="signup-form" class="signup-form" action="<?php echo base_url() ?>signup">
                        <h2 class="form-title">Buat Akun</h2>
                        <?php if (isset($error)): ?>
                          <p style="text-align: center; color: red"><?php echo $error ?></p>
                          <br>
                        <?php endif; ?>
                        <div class="form-group">
                            <input type="text" class="form-input" name="Nama" id="name" placeholder="Nama lengkap" autofocus required/>
                        </div>
                        <div class="form-group">
                            <input type="email" class="form-input" name="Email" id="email" placeholder="Email pribadi" required/>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-input" name="Username" id="username" placeholder="Username anda" required/>
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-input" name="Password" id="password" placeholder="Password" required/>
                        </div>
                        <!-- <div class="form-group">
                            <input type="checkbox" name="agree-term" id="agree-term" class="agree-term" />
                            <label for="agree-term" class="label-agree-term"><span><span></span></span>I agree all statements in  <a href="#" class="term-service">Terms of service</a></label>
                        </div> -->
                        <div class="form-group">
                            <input type="submit" name="submit" id="submit" class="form-submit" value="Sign up"/>
                        </div>
                    </form>
                    <p class="loginhere">
                        Sudah punya akun? <a href="<?php echo base_url() ?>login" class="loginhere-link">Login di sini</a>
                    </p>
                </div>
            </div>
        </section>

    </div>

    <!-- JS -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="js/main.js"></script>
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->
</html>
