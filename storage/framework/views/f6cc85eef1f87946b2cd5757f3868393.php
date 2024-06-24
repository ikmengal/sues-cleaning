<!DOCTYPE html>

<html
  lang="en"
  class="light-style layout-navbar-fixed layout-menu-fixed"
  dir="ltr"
  data-theme="theme-default"
  data-assets-path="<?php echo e(asset('public/admin')); ?>/assets/"
  data-template="vertical-menu-template-no-customizer"
>
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0"
    />

    <title><?php echo $__env->yieldContent('title'); ?></title>

    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <meta name="description" content="" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="<?php echo e(asset('public/admin')); ?>/assets/img/favicon/1684880051.ico" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
      rel="stylesheet"
    />

    <!-- Icons -->
    <link rel="stylesheet" href="<?php echo e(asset('public/admin')); ?>/assets/vendor/fonts/fontawesome.css" />
    <link rel="stylesheet" href="<?php echo e(asset('public/admin')); ?>/assets/vendor/fonts/tabler-icons.css" />
    <link rel="stylesheet" href="<?php echo e(asset('public/admin')); ?>/assets/vendor/fonts/flag-icons.css" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="<?php echo e(asset('public/admin')); ?>/assets/vendor/css/rtl/core.css" />
    <link rel="stylesheet" href="<?php echo e(asset('public/admin')); ?>/assets/vendor/css/rtl/theme-default.css" />
    <link rel="stylesheet" href="<?php echo e(asset('public/admin')); ?>/assets/css/demo.css" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="<?php echo e(asset('public/admin')); ?>/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />
    <!--<link rel="stylesheet" href="<?php echo e(asset('public/admin')); ?>/assets/vendor/libs/node-waves/node-waves.css" />-->
    <link rel="stylesheet" href="<?php echo e(asset('public/admin')); ?>/assets/vendor/libs/typeahead-js/typeahead.css" />
    <link rel="stylesheet" href="<?php echo e(asset('public/admin')); ?>/assets/vendor/libs/flatpickr/flatpickr.css" />
    <!--<link rel="stylesheet" href="<?php echo e(asset('public/admin')); ?>/assets/vendor/libs/apex-charts/apex-charts.css" />-->
    <!--<link rel="stylesheet" href="<?php echo e(asset('public/admin')); ?>/assets/vendor/libs/swiper/swiper.css" />-->
    <link rel="stylesheet" href="<?php echo e(asset('public/admin')); ?>/assets/vendor/libs/datatables-bs5/datatables.bootstrap5.css" />
    <link rel="stylesheet" href="<?php echo e(asset('public/admin')); ?>/assets/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.css" />
    <link rel="stylesheet" href="<?php echo e(asset('public/admin')); ?>/assets/vendor/libs/datatables-checkboxes-jquery/datatables.checkboxes.css" />

    <!-- Page CSS -->
    <link rel="stylesheet" href="<?php echo e(asset('public/admin')); ?>/assets/vendor/css/pages/cards-advance.css" />
    <!-- Helpers -->
    <script src="<?php echo e(asset('public/admin')); ?>/assets/vendor/js/helpers.js"></script>

    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="<?php echo e(asset('public/admin')); ?>/assets/js/config.js"></script>

    <?php echo $__env->yieldPushContent('style'); ?>
  </head>

  <body>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
      <div class="layout-container">
        <!-- Menu -->
        <?php echo $__env->make('admin.layouts.sidebar-menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <!-- / Menu -->

        <!-- Layout container -->
        <div class="layout-page">
          <!-- Navbar -->
          <?php echo $__env->make('admin.layouts.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
          <!-- / Navbar -->

          <!-- Content wrapper -->
          <div class="content-wrapper">
            <!-- Content -->
            <?php echo $__env->yieldContent('content'); ?>
            <!-- / Content -->

            <!-- Footer -->
            <?php echo $__env->make('admin.layouts.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <!-- / Footer -->

            <div class="content-backdrop fade"></div>
          </div>
          <!-- Content wrapper -->
        </div>
        <!-- / Layout page -->
      </div>

      <!-- Overlay -->
      <div class="layout-overlay layout-menu-toggle"></div>

      <!-- Drag Target Area To SlideIn Menu On Small Screens -->
      <div class="drag-target"></div>
    </div>
    <!-- / Layout wrapper -->

    <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->
    <script src="<?php echo e(asset('public/admin')); ?>/assets/vendor/libs/jquery/jquery.js"></script>
    <script src="<?php echo e(asset('public/admin')); ?>/assets/vendor/libs/popper/popper.js"></script>
    <script src="<?php echo e(asset('public/admin')); ?>/assets/vendor/js/bootstrap.js"></script>
    <script src="<?php echo e(asset('public/admin')); ?>/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>
    <!--<script src="<?php echo e(asset('public/admin')); ?>/assets/vendor/libs/node-waves/node-waves.js"></script>-->

    <script src="<?php echo e(asset('public/admin')); ?>/assets/vendor/libs/hammer/hammer.js"></script>
    <script src="<?php echo e(asset('public/admin')); ?>/assets/vendor/libs/i18n/i18n.js"></script>
    <script src="<?php echo e(asset('public/admin')); ?>/assets/vendor/libs/typeahead-js/typeahead.js"></script>
    <script src="<?php echo e(asset('public/admin')); ?>/assets/vendor/js/menu.js"></script>
    <!-- endbuild -->

    <!-- Vendors JS -->
    <!--<script src="<?php echo e(asset('public/admin')); ?>/assets/vendor/libs/apex-charts/apexcharts.js"></script>-->
    <!--<script src="<?php echo e(asset('public/admin')); ?>/assets/vendor/libs/swiper/swiper.js"></script>-->
    <script src="<?php echo e(asset('public/admin')); ?>/assets/vendor/libs/datatables-bs5/datatables-bootstrap5.js"></script>

    <!-- Main JS -->
    <script src="<?php echo e(asset('public/admin')); ?>/assets/js/main.js"></script>
    <script src="<?php echo e(asset('public/admin/assets/js/search.js')); ?>"></script>
    <script src="<?php echo e(asset('public/admin/assets/js/toastr.min.js')); ?>"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script> 

    <script>
        <?php if(Session::has('message')): ?>
            toastr.options =
            {
                "closeButton" : true,
                "progressBar" : true
            }
            toastr.success("<?php echo e(session('message')); ?>");
        <?php endif; ?>

        <?php if(Session::has('error')): ?>
            toastr.options =
            {
                "closeButton" : true,
                "progressBar" : true
            }
            toastr.error("<?php echo e(session('error')); ?>");
        <?php endif; ?>

        <?php if(Session::has('info')): ?>
            toastr.options =
            {
                "closeButton" : true,
                "progressBar" : true
            }
            toastr.info("<?php echo e(session('info')); ?>");
        <?php endif; ?>

        <?php if(Session::has('warning')): ?>
            toastr.options =
            {
                "closeButton" : true,
                "progressBar" : true
            }
            toastr.warning("<?php echo e(session('warning')); ?>");
        <?php endif; ?>

		$(document).on("input", ".numeric", function() {
			this.value = this.value.replace(/\D/g,'');
		});

        if (typeof description !== 'undefined') {
          CKEDITOR.replace('description');
        }
    </script>
    <!-- Page JS -->
    <?php echo $__env->yieldPushContent('js'); ?>
  </body>
</html>
<?php /**PATH C:\xampp\htdocs\suescleaning.dotverge.com\resources\views/admin/layouts/app.blade.php ENDPATH**/ ?>