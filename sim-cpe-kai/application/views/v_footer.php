  <!-- Required Jquery -->
  <script type="text/javascript" src="<?php echo base_url() ?>files\bower_components\jquery\js\jquery.min.js"></script>
  <script type="text/javascript" src="<?php echo base_url() ?>files\bower_components\jquery-ui\js\jquery-ui.min.js"></script>
  <script type="text/javascript" src="<?php echo base_url() ?>files\bower_components\popper.js\js\popper.min.js"></script>
  <script type="text/javascript" src="<?php echo base_url() ?>files\bower_components\bootstrap\js\bootstrap.min.js"></script>
  <!-- jquery slimscroll js -->
  <script type="text/javascript" src="<?php echo base_url() ?>files\bower_components\jquery-slimscroll\js\jquery.slimscroll.js"></script>
  <!-- modernizr js -->
  <script type="text/javascript" src="<?php echo base_url() ?>files\bower_components\modernizr\js\modernizr.js"></script>
  <script type="text/javascript" src="<?php echo base_url() ?>files\bower_components\modernizr\js\css-scrollbars.js"></script>
  <!-- Syntax highlighter prism js -->
  <script type="text/javascript" src="<?php echo base_url() ?>files\assets\pages\prism\custom-prism.js"></script>

  <script type="text/javascript" src="<?php echo base_url() ?>files\assets\js\SmoothScroll.js"></script>
  <script src="<?php echo base_url() ?>files\assets\js\menu\menu-sidebar-fixed.js"></script>
  <script src="<?php echo base_url() ?>files\assets\js\pcoded.min.js"></script>
  <script src="<?php echo base_url() ?>files\assets\js\jquery.mCustomScrollbar.concat.min.js"></script>
  <script src="<?php echo base_url() ?>files\assets\js\vartical-layout.min.js"></script>
  <script type="text/javascript" src="<?php echo base_url() ?>files\assets\pages\dashboard\analytic-dashboard.min.js"></script>

  <!-- Custom js -->
  <script src="<?php echo base_url() ?>files\assets\js\pcoded.min.js"></script>
  <script src="<?php echo base_url() ?>files\assets\js\vartical-layout.min.js"></script>
  <script src="<?php echo base_url() ?>files\assets\js\jquery.mCustomScrollbar.concat.min.js"></script>
  <script type="text/javascript" src="<?php echo base_url() ?>files\assets\js\script.min.js"></script>
  <script type="text/javascript" src="<?php echo base_url() ?>\files\assets\js\bootstrap-growl.min.js"></script>

  <!-- i18next.min.js -->
  <script type="text/javascript" src="<?php echo base_url() ?>files\bower_components\i18next\js\i18next.min.js"></script>
  <script type="text/javascript" src="<?php echo base_url() ?>files\bower_components\i18next-xhr-backend\js\i18nextXHRBackend.min.js"></script>
  <script type="text/javascript" src="<?php echo base_url() ?>files\bower_components\i18next-browser-languagedetector\js\i18nextBrowserLanguageDetector.min.js"></script>
  <script type="text/javascript" src="<?php echo base_url() ?>files\bower_components\jquery-i18next\js\jquery-i18next.min.js"></script>

  <?php if (!empty($isImport)): ?>
    <!-- jquery file upload js -->
    <script src="<?php echo base_url() ?>files\assets\pages\jquery.filer\js\jquery.filer.min.js"></script>
    <script src="<?php echo base_url() ?>files\assets\pages\filer\custom-filer.js" type="text/javascript"></script>
    <script src="<?php echo base_url() ?>files\assets\pages\filer\jquery.fileuploads.init.js" type="text/javascript"></script>
    <script src="<?php echo base_url() ?>files\assets\js\custom-import.js" type="text/javascript"></script>
      
    <?php if (!empty($import_success_msg)): ?>
    <script>
      'use strict';
      $(window).on('load',function(){
          notify('<?php echo $import_success_msg ?>', 'inverse');
      });
    </script>
    <?php endif; ?>

    <?php if (!empty($import_error_msg)): ?>
    <script>
      'use strict';
          $(window).on('load',function(){
              notify('<?php echo $import_error_msg ?>', 'inverse');
          });
    </script>
    <?php endif; ?>
  <?php endif; ?>

  <?php if (!empty($isTransaction) || !empty($isUserList) || !empty($isUserVerify)): ?>
    <!-- data-table js -->
    <script src="<?php echo base_url() ?>files\bower_components\datatables.net\js\jquery.dataTables.min.js"></script>
    <script src="<?php echo base_url() ?>files\bower_components\datatables.net-buttons\js\dataTables.buttons.min.js"></script>
    <script src="<?php echo base_url() ?>files\assets\pages\data-table\js\jszip.min.js"></script>
    <script src="<?php echo base_url() ?>files\assets\pages\data-table\js\pdfmake.min.js"></script>
    <script src="<?php echo base_url() ?>files\assets\pages\data-table\js\vfs_fonts.js"></script>
    <script src="<?php echo base_url() ?>files\assets\pages\data-table\extensions\colreorder\js\dataTables.colReorder.min.js"></script>
    <script src="<?php echo base_url() ?>files\bower_components\datatables.net-buttons\js\buttons.print.min.js"></script>
    <script src="<?php echo base_url() ?>files\bower_components\datatables.net-buttons\js\buttons.html5.min.js"></script>
    <script src="<?php echo base_url() ?>files\bower_components\datatables.net-bs4\js\dataTables.bootstrap4.min.js"></script>
    <script src="<?php echo base_url() ?>files\bower_components\datatables.net-responsive\js\dataTables.responsive.min.js"></script>
    <script src="<?php echo base_url() ?>files\bower_components\datatables.net-responsive-bs4\js\responsive.bootstrap4.min.js"></script>
    <script src="<?php echo base_url() ?>\files\assets\pages\data-table\extensions\buttons\js\dataTables.buttons.min.js"></script>
    <script src="<?php echo base_url() ?>\files\assets\pages\data-table\extensions\buttons\js\buttons.flash.min.js"></script>
    <script src="<?php echo base_url() ?>\files\assets\pages\data-table\extensions\buttons\js\jszip.min.js"></script>
    <script src="<?php echo base_url() ?>\files\assets\pages\data-table\extensions\buttons\js\vfs_fonts.js"></script>
    <script src="<?php echo base_url() ?>\files\assets\pages\data-table\extensions\buttons\js\buttons.colVis.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/gasparesganga-jquery-loading-overlay@2.1.6/dist/loadingoverlay.min.js"></script>

    <!-- data-table Custom js -->
    <script src="<?php echo base_url() ?>files\assets\pages\data-table\js\data-table-custom.js"></script>
    <script src="<?php echo base_url() ?>\files\assets\pages\data-table\extensions\colreorder\js\colreorder-custom.js"></script>

     <!-- User Management Custom js -->
    <script type="text/javascript" src="<?php echo base_url() ?>\files\assets\js\user_management.js"></script>
  <?php endif; ?>

  <?php if (!empty($isResetPassword)): ?>
    <script type="text/javascript" src="<?php echo base_url() ?>\files\assets\js\login_form.js"></script>  
    <script>
      <?php if ($this->session->userdata('confirm_password') === FALSE) { ?>
            'use strict';
          $(window).on('load', function(){
                  notify('inverse');
          });
      <?php } ?>
    </script>
  <?php endif; ?>

<?php if (!empty($isUserProfile)): ?>
    <script type="text/javascript" src="<?php echo base_url() ?>\files\assets\js\login_form.js"></script>  
    <script>
      <?php if ($this->session->flashdata('reset_password')) { ?>
          'use strict';
        $(window).on('load', function(){
                notifyResetPasswordSuccess('inverse');
        });
      <?php } ?>
    </script>
  <?php endif; ?>

  <?php if (!empty($isAnalytics)): ?>
    <!-- Chart js -->
    <script type="text/javascript" src="<?php echo base_url() ?>files\bower_components\chart.js\js\Chart.js"></script>
    <!-- amchart js -->
    <script src="<?php echo base_url() ?>files\assets\pages\widget\amchart\amcharts.js"></script>
    <script src="<?php echo base_url() ?>files\assets\pages\widget\amchart\serial.js"></script>
    <script src="<?php echo base_url() ?>files\assets\pages\widget\amchart\light.js"></script>
    <!-- Custom js -->
    <script type="text/javascript" src="<?php echo base_url() ?>files\assets\pages\dashboard\analytic-dashboard.min.js"></script>
    <script src="//www.amcharts.com/lib/3/plugins/dataloader/dataloader.min.js"></script>
    <!-- sweet alert js -->
    <script type="text/javascript" src="<?php echo base_url() ?>files\bower_components\sweetalert\js\sweetalert.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url() ?>files\assets\js\modal.js"></script>
    <!-- sweet alert modal.js intialize js -->
    <!-- modalEffects js nifty modal window effects -->
    <script type="text/javascript" src="<?php echo base_url() ?>files\assets\js\modalEffects.js"></script>
    <script type="text/javascript" src="<?php echo base_url() ?>files\assets\js\classie.js"></script>
    <script type="text/javascript" src="<?php echo base_url() ?>files\assets\js\custom-analytics.js"></script>
    <script src="https://www.amcharts.com/lib/4/core.js"></script>
    <script src="https://www.amcharts.com/lib/4/charts.js"></script>
    <script src="https://www.amcharts.com/lib/4/themes/animated.js"></script>

    <script type="text/javascript" src="<?php echo base_url() ?>files\assets\js\custom-chart.js"></script>
  <?php endif; ?>


</html>
