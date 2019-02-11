<?php $__env->startSection('title', trans('saas.menu.change_password')); ?>
<?php $__env->startSection('account.content'); ?>
    <h6><?php echo e(app('translator')->getFromJson('saas.menu.change_password')); ?></h6>
    <div class="card card-default">
         <div class="card-body">
            <form action="<?php echo e(route("account.password.store")); ?>" method="post">
                <?php echo csrf_field(); ?>

                <div class="form-group row">
                    <label for="password_current" class="col-md-4 col-form-label text-md-right"><?php echo e(app('translator')->getFromJson('saas.current_password')); ?></label>

                    <div class="col-md-6">
                        <input id="password_current" type="password" class="form-control form-control-alternative <?php echo e($errors->has('password_current') ? ' is-invalid' : ''); ?>" name="password_current" required>

                        <?php if($errors->has('password_current')): ?>
                            <span class="invalid-feedback">
                                        <strong><?php echo e($errors->first('password_current')); ?></strong>
                                    </span>
                        <?php endif; ?>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="password" class="col-md-4 col-form-label text-md-right"><?php echo e(app('translator')->getFromJson('saas.new_password')); ?></label>

                    <div class="col-md-6">
                        <input id="password" type="password" class="form-control form-control-alternative <?php echo e($errors->has('password') ? ' is-invalid' : ''); ?>" name="password" required>

                        <?php if($errors->has('password')): ?>
                            <span class="invalid-feedback">
                                        <strong><?php echo e($errors->first('password')); ?></strong>
                                    </span>
                        <?php endif; ?>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="password_confirmation" class="col-md-4 col-form-label text-md-right"><?php echo e(app('translator')->getFromJson('saas.new_password_again')); ?></label>

                    <div class="col-md-6">
                        <input id="password_confirmation" type="password" class="form-control form-control-alternative <?php echo e($errors->has('password_confirmation') ? ' is-invalid' : ''); ?>" name="password_confirmation" required>

                        <?php if($errors->has('password_confirmation')): ?>
                            <span class="invalid-feedback">
                                        <strong><?php echo e($errors->first('password_confirmation')); ?></strong>
                                    </span>
                        <?php endif; ?>
                    </div>
                </div>

                <div class="form-group row mb-0">
                    <div class="col-md-6 offset-md-4">
                        <button type="submit" class="btn btn-default">
                            <?php echo e(app('translator')->getFromJson('saas.change_password')); ?>
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('account.layouts.default', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>