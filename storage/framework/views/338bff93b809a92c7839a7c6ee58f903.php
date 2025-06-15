<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?php echo $__env->yieldContent('title', 'Dashboard'); ?></title>

    <!-- SB Admin 2 CSS -->
    <link href="<?php echo e(asset('sb-admin2/vendor/fontawesome-free/css/all.min.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('sb-admin2/css/sb-admin-2.min.css')); ?>" rel="stylesheet">
</head>
<body id="page-top">
    <!-- Page Wrapper -->
    <div id="wrapper">

        
        <?php echo $__env->make('partials.sidebar', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                
                <?php echo $__env->make('partials.navbar', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

                <!-- Begin Page Content -->
                <div class="container-fluid pt-4">
                    <?php echo $__env->yieldContent('content'); ?>
                </div>
                <!-- /.container-fluid -->

            </div>

            
            <?php echo $__env->make('partials.footer', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
        </div>
        <!-- End of Content Wrapper -->

    </div>

    <!-- JS -->
    <script src="<?php echo e(asset('sb-admin2/vendor/jquery/jquery.min.js')); ?>"></script>
    <script src="<?php echo e(asset('sb-admin2/vendor/bootstrap/js/bootstrap.bundle.min.js')); ?>"></script>
    <script src="<?php echo e(asset('sb-admin2/js/sb-admin-2.min.js')); ?>"></script>

    <?php echo $__env->yieldContent('scripts'); ?>
</body>
</html>
<?php /**PATH Z:\Kuliah\Semester_4\Pemweb\starter-kit\laravel-kit\resources\views/layouts/sbadmin2.blade.php ENDPATH**/ ?>