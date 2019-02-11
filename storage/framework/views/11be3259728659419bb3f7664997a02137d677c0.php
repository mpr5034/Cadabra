<?php $__env->startSection('title', trans('saas.login')); ?>
<?php $__env->startSection('content'); ?>

    <section class="section ">

        <div class="container pt-lg-md bg-login ">
            <div class="row justify-content-center">
                <div class="col-lg-5">
                    <div class="card  shadow border-0">

                        <div class="card-body px-lg-5 py-lg-5">
                            <div class="text-center text-muted mb-4">
                                <h3><?php echo e(app('translator')->getFromJson('saas.sing_in_with_credentials')); ?></h3>
                            </div>
                            <form method="POST" action="<?php echo e(route('login')); ?>">
                                <?php echo csrf_field(); ?>


                                <div class="form-group text-center">
                                    <?php if(config('services.github.client_id')): ?>
                                        <a href="<?php echo e(url('/auth/github')); ?>" class="btn btn-sm btn-github"><i class="fa fa-github"></i> Github</a>
                                    <?php endif; ?>
                                    <?php if(config('services.twitter.client_id')): ?>
                                        <a href="<?php echo e(url('/auth/twitter')); ?>" class="btn btn-sm btn-twitter"><i class="fa fa-twitter"></i> Twitter</a>
                                    <?php endif; ?>
                                    <?php if(config('services.facebook.client_id')): ?>
                                        <a href="<?php echo e(url('/auth/facebook')); ?>" class="btn btn-sm btn-facebook"><i class="fa fa-facebook"></i> Facebook</a>
                                    <?php endif; ?>
                                </div>

                                <?php if(config('saas.demo')): ?>
                                    <div style="padding: 10px; font-size: 14px" >

                                        <b>Demo Login:</b> wesker@laravel-bap.com <br />

                                        <b>Demo Password:</b> admin

                                    </div>
                                <?php endif; ?>

                                <div class="form-group mb-3">
                                    <div class="input-group input-group-alternative">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="ni ni-email-83"></i></span>
                                        </div>
                                        <input placeholder="<?php echo e(app('translator')->getFromJson('saas.email')); ?>" id="email" type="email" class="form-control form-control-alternative <?php echo e($errors->has('email') ? ' is-invalid' : ''); ?>" name="email" value="<?php echo e(old('email')); ?>" required autofocus>


                                    </div>

                                    <?php if($errors->has('email')): ?>
                                        <span class="invalid-feedback text-center">
                                                <strong><?php echo e($errors->first('email')); ?></strong>
                                            </span>
                                    <?php endif; ?>
                                </div>
                                <div class="form-group">
                                    <div class="input-group input-group-alternative">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                                        </div>
                                        <input id="password" placeholder="<?php echo e(app('translator')->getFromJson('saas.password')); ?>" type="password" class="form-control form-control-alternative <?php echo e($errors->has('password') ? ' is-invalid' : ''); ?>" name="password" required>

                                        <?php if($errors->has('password')): ?>
                                            <span class="invalid-feedback">
                                                <strong><?php echo e($errors->first('password')); ?></strong>
                                            </span>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <div class="custom-control custom-control-alternative custom-checkbox">
                                    <input class="custom-control-input" name="remember" <?php echo e(old('remember') ? 'checked' : ''); ?> id=" customCheckLogin" type="checkbox">
                                    <label class="custom-control-label" for=" customCheckLogin">
                                        <span><?php echo e(app('translator')->getFromJson('saas.remember_me')); ?></span>
                                    </label>
                                </div>

                                <div class="text-center">

                                    <button type="submit" class="btn btn-primary my-4"><?php echo e(app('translator')->getFromJson('saas.sing_in')); ?></button>
                                </div>


                            </form>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-6">
                            <a href="<?php echo e(route('password.request')); ?>" class="text-light">
                                <small><?php echo e(app('translator')->getFromJson('saas.forgot_password')); ?></small>
                            </a>
                            <br />
                            <a href="<?php echo e(route('activation.resend')); ?>" class="text-light">
                                <small><?php echo e(app('translator')->getFromJson('saas.resend_activation_email')); ?></small>
                            </a>
                        </div>
                        <div class="col-6 text-right">
                            <a href="<?php echo e(route('register')); ?>" class="text-light">
                                <small><?php echo e(app('translator')->getFromJson('saas.create_new_account')); ?></small>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>