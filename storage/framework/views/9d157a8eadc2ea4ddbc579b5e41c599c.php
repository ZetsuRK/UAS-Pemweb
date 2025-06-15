<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link href="<?php echo e(asset('sb-admin2/vendor/fontawesome-free/css/all.min.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('sb-admin2/css/sb-admin-2.min.css')); ?>" rel="stylesheet">
</head>
<body class="bg-gradient-primary">

<div class="container">
    <!-- Outer Row -->
    <div class="row justify-content-center">
        <div class="col-xl-6 col-lg-8 col-md-9">
            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-5">
                    <!-- Login Form -->
                    <div class="text-center">
                        <h1 class="h4 text-gray-900 mb-4">Selamat Datang Kembali!</h1>
                    </div>
                    <form method="POST" action="<?php echo e(route('login')); ?>">
                        <?php echo csrf_field(); ?>
                        <div class="form-group">
                            <input type="email" name="email" class="form-control form-control-user" placeholder="Alamat Email..." required autofocus>
                        </div>
                        <div class="form-group">
                            <input type="password" name="password" class="form-control form-control-user" placeholder="Kata Sandi..." required>
                        </div>
                        <div class="form-group">
                            <div class="custom-control custom-checkbox small">
                                <input type="checkbox" name="remember" class="custom-control-input" id="remember">
                                <label class="custom-control-label" for="remember">Ingat saya</label>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary btn-user btn-block">
                            Login
                        </button>
                    </form>
                    <hr>
                    <div class="text-center">
                        <a class="small" href="<?php echo e(route('password.request')); ?>">Lupa Kata Sandi?</a>
                    </div>
                    <div class="text-center">
                        <a class="small" href="<?php echo e(route('register')); ?>">Buat Akun Baru!</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="<?php echo e(asset('sb-admin2/vendor/jquery/jquery.min.js')); ?>"></script>
<script src="<?php echo e(asset('sb-admin2/vendor/bootstrap/js/bootstrap.bundle.min.js')); ?>"></script>
<script src="<?php echo e(asset('sb-admin2/js/sb-admin-2.min.js')); ?>"></script>
</body>
</html>

<hr>
<div class="text-center">
    <a href="<?php echo e(url('auth/github')); ?>" class="btn btn-dark btn-user btn-block">
        <i class="fab fa-github fa-fw"></i> Login dengan GitHub
    </a>
    <a href="<?php echo e(url('auth/microsoft')); ?>" class="btn btn-info btn-user btn-block">
        <i class="fab fa-microsoft fa-fw"></i> Login dengan Microsoft
    </a>
</div>

<a href="<?php echo e(route('google.login')); ?>" class="btn btn-danger btn-block">
    <i class="fab fa-google"></i> Login dengan Google
</a>
<?php /**PATH Z:\Kuliah\Semester_4\Pemweb\starter-kit\laravel-kit\resources\views/auth/login.blade.php ENDPATH**/ ?>