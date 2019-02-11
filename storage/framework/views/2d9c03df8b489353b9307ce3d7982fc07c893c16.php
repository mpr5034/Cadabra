<?php $__env->startSection('title', trans('saas.sign_up')); ?>
<?php $__env->startSection('content'); ?>

    <section class="section  ">

        <div class="container pt-lg-md bg-register">
            <div class="row justify-content-center">
                <div class="col-lg-5">
                    <div class="card shadow border-0">

                        <div class="card-body px-lg-5 py-lg-5">
                            <div class="text-center text-muted mb-4">
                                <h3><?php echo e(app('translator')->getFromJson('saas.register')); ?></h3>
                            </div>
                            <form method="POST" action="<?php echo e(route('register')); ?>">
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

                                <div class="form-group mb-3">
                                    <div class="input-group input-group-alternative">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fa fa-user"></i></span>
                                        </div>
                                        <input placeholder="<?php echo e(app('translator')->getFromJson('saas.your_name')); ?>" id="name" type="text" class="form-control <?php echo e($errors->has('name') ? ' is-invalid' : ''); ?>" name="name" value="<?php echo e(old('name')); ?>" required autofocus>

                                   </div>

                                    <?php if($errors->has('name')): ?>
                                        <span class="invalid-feedback text-center">
                                                <strong><?php echo e($errors->first('name')); ?></strong>
                                            </span>
                                    <?php endif; ?>
                                </div>

                                <div class="form-group mb-3">
                                    <div class="input-group input-group-alternative">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="ni ni-email-83"></i></span>
                                        </div>
                                        <input placeholder="<?php echo e(app('translator')->getFromJson('saas.your_email')); ?>" id="email" type="email" class="form-control <?php echo e($errors->has('email') ? ' is-invalid' : ''); ?>" name="email" value="<?php echo e(old('email')); ?>" required>

                                    </div>

                                    <?php if($errors->has('email')): ?>
                                        <span class="invalid-feedback text-center">
                                                <strong><?php echo e($errors->first('email')); ?></strong>
                                            </span>
                                    <?php endif; ?>
                                </div>

                                <div class="form-group mb-3">
                                    <div class="input-group input-group-alternative">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                                        </div>
                                        <input placeholder="<?php echo e(app('translator')->getFromJson('saas.password')); ?>" id="password" type="password" class="form-control <?php echo e($errors->has('password') ? ' is-invalid' : ''); ?>" name="password" required>

                                    </div>

                                    <?php if($errors->has('password')): ?>
                                        <span class="invalid-feedback text-center">
                                                <strong><?php echo e($errors->first('password')); ?></strong>
                                            </span>
                                    <?php endif; ?>
                                </div>

                                <div class="form-group mb-3">
                                    <div class="input-group input-group-alternative">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                                        </div>
                                        <input placeholder="<?php echo e(app('translator')->getFromJson('saas.confirm_password')); ?>" id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                                    </div>


                                </div>

                                <div class="custom-control custom-control-alternative custom-checkbox">

                                    <input class="custom-control-input form-check-input<?php echo e($errors->has('terms') ? ' is-invalid' : ''); ?>" type="checkbox" id="terms" name="terms" required>
                                    <label class="custom-control-label" for="terms">
                                        <?php echo e(app('translator')->getFromJson('saas.i_accept')); ?> <br />
                                        <a href="<?php echo e(route('info.terms')); ?>" target="_blank"><?php echo e(app('translator')->getFromJson('saas.read_term_of_service')); ?></a>
                                    </label>

                                </div>

                                <div class="text-center">
                                    <button type="submit" class="btn btn-success my-4"><?php echo e(app('translator')->getFromJson('saas.sign_up')); ?></button>
                                </div>


                            </form>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-lg-12 text-center">
                            <a href="<?php echo e(route('login')); ?>" class="text-light font-weight-bold">
                                <small><?php echo e(app('translator')->getFromJson('saas.already_has_account')); ?></small>
                            </a>

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>