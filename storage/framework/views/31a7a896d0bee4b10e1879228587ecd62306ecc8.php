<?php $__env->startSection('title',  @trans('saas.pricing')); ?>
<?php $__env->startSection('content'); ?>

    <section class="section">

    <div class="container">
        <div class="row">
            <div class="col-lg-12">

                <div class="col-lg-12 text-center">

                    <h2 class="display-2"><span>Pricing</span></h2>
                    <p class="lead">
                        MultiCRM in cloud or self-hosted. You choose.
                    </p>
                </div>

            </div>

        </div>
    </div>

    <div class="container mt-100">
        <div class="card-deck mb-3">

            <?php $__currentLoopData = $plans; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $plan): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="card mb-4 <?php if($plan->featured ): ?> shadow-lg featured <?php else: ?> shadow <?php endif; ?> ">
                    <div class="card-header">
                        <h4 class="my-0 font-weight-normal text-center"><?php echo e($plan->name); ?></h4>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title pricing-card-title text-center">$<?php echo e($plan->price); ?>

                            <small class="text-muted">/ <?php echo e(app('translator')->getFromJson('saas.mo')); ?></small>
                        </h5>
                        <ul class="list-unstyled mt-3 mb-3">
                            <?php echo trans('saas.pricing_plans.plan_'.$plan->id); ?>

                        </ul>
                        <a href="<?php echo e(route('register')); ?>" class="btn btn-lg btn-block <?php if($plan->featured): ?> btn-success <?php else: ?> btn-outline-primary <?php endif; ?> "><?php echo e(app('translator')->getFromJson('saas.signup_now')); ?></a>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            <div class="card mb-3 shadow">
                <div class="card-header">
                    <h4 class="my-0 font-weight-normal text-center text-center">Enterprise</h4>
                </div>
                <div class="card-body">
                    <h5 class="card-title pricing-card-title text-center">
                        <small class="text-muted"><?php echo e(app('translator')->getFromJson('saas.contact')); ?></small>
                    </h5>
                    <ul class="list-unstyled mt-3 mb-3">
                        <?php echo trans('saas.pricing_plans.plan_4'); ?>

                    </ul>
                    <a href="<?php echo e(route('info.contact')); ?>" class="btn btn-lg btn-block btn-outline-primary"><?php echo e(app('translator')->getFromJson('saas.contact_us')); ?></a>
                </div>
            </div>


        </div>



    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>