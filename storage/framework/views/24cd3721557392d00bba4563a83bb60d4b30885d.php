<?php $__env->startSection('title', 'Rest Password'); ?>
<?php $__env->startSection('content'); ?>

    <section class="section ">

        <div class="container pt-lg-md bg-login ">
            <div class="row justify-content-center">
                <div class="col-lg-7">
                    <div class="card  shadow border-0">

                        <div class="card-body px-lg-5 py-lg-5">
                            <div class="text-center text-muted mb-4">
                                <h3><?php echo e(app('translator')->getFromJson('saas.reset_password')); ?></h3>
                            </div>

                            <?php if(session('status')): ?>
                                <div class="alert alert-success">
                                    <?php echo e(session('status')); ?>

                                </div>
                            <?php endif; ?>

                            <form method="POST" action="<?php echo e(route('password.email')); ?>">
                                <?php echo csrf_field(); ?>

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

                                <div class="text-center">
                                    <button type="submit" class="btn btn-primary my-4"><?php echo e(app('translator')->getFromJson('saas.submit')); ?></button>
                                </div>
                                <br />
                                <br />
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>