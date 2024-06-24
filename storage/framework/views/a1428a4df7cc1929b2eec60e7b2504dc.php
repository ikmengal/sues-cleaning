<?php $__env->startSection('title', $title); ?>
<?php $__env->startSection('content'); ?>
    <div class="authentication-wrapper authentication-cover authentication-bg">
        <div class="authentication-inner row">
            <div class="d-none d-lg-flex col-lg-7 p-0">
                <div class="auth-cover-bg auth-cover-bg-color d-flex justify-content-center align-items-center">
                    <img
                        src="<?php echo e(asset('public/admin')); ?>/assets/img/illustrations/auth-login-illustration-light.png"
                        alt="auth-login-cover"
                        class="img-fluid my-5 auth-illustration"
                        data-app-light-img="illustrations/auth-login-illustration-light.png"
                        data-app-dark-img="illustrations/auth-login-illustration-dark.png"
                    />
    
                    <img src="<?php echo e(asset('public/admin')); ?>/assets/img/illustrations/bg-shape-image-light.png"
                        alt="auth-login-cover"
                        class="platform-bg"
                        data-app-light-img="illustrations/bg-shape-image-light.png"
                        data-app-dark-img="illustrations/bg-shape-image-dark.png"
                    />
                </div>
            </div>

            <div class="d-flex col-12 col-lg-5 align-items-center p-sm-5 p-4">
                <div class="w-px-400 mx-auto">
                    <div class="app-brand mb-4">
                        <a href="#" class="app-brand-link gap-2">
                            <?php if(isset(settings()->logo) && !empty(settings()->logo)): ?>
                                <img style="width: 100%" src="<?php echo e(asset('public/admin/assets/img/logo')); ?>/<?php echo e(settings()->logo); ?>" class="img-fluid light-logo" alt="<?php echo e(settings()->name); ?>"/>
                            <?php else: ?>
                                <img style="width: 100%" src="<?php echo e(asset('public/admin/default.png')); ?>" class="img-fluid light-logo" alt="Default"/>
                            <?php endif; ?>
                        </a>
                    </div>
                    <h3 class="mb-1 fw-bold">Welcome to <?php if(isset(settings()->name) && !empty(settings()->name)): ?> <?php echo e(settings()->name); ?> <?php endif; ?>! 👋</h3>
                    <p class="mb-4">Please sign-in to your account and start the adventure</p>
    
                    <form action="<?php echo e(route('admin.login')); ?>" id="formAuthentication" class="mb-3" method="POST">
                        <?php echo csrf_field(); ?>
    
                        <div class="mb-3">
                            <label for="email" class="form-label">Email or Username</label>
                            <input
                                type="text"
                                class="form-control"
                                id="email"
                                name="email"
                                placeholder="Enter your email or username"
                                autofocus
                            />
                        </div>
                        <div class="mb-3 form-password-toggle">
                            <div class="d-flex justify-content-between">
                                <label class="form-label" for="password">Password</label>
                                <a href="<?php echo e(route('password.request')); ?>">
                                    <small>Forgot Password?</small>
                                </a>
                            </div>
                            <div class="input-group input-group-merge">
                                <input
                                type="password"
                                id="password"
                                class="form-control"
                                name="password"
                                placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                                aria-describedby="password"
                                />
                                <span class="input-group-text cursor-pointer"><i class="ti ti-eye-off"></i></span>
                            </div>
                        </div>
                        <div class="mb-3">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="remember-me" />
                                <label class="form-check-label" for="remember-me"> Remember Me </label>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary d-grid w-100">Sign in <span id="loader"></span></button>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.auth.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/dotverge/public_html/suescleaning.dotverge.com/resources/views/admin/auth/login.blade.php ENDPATH**/ ?>