<?php $__env->startSection('title', @trans('saas.about')); ?>
<?php $__env->startSection('content'); ?>

    <section class="section">

        <div class="container">
            <div class="row">
                <div class="col-lg-12">

                    <div class="col-lg-12 text-center">

                        <h2 class="display-2"><span>BAP SAAS KIT</span></h2>
                        <p class="lead">
                            <b>MultiCRM is a collaboration platform launched in 2018.</b> <br/>
                            MultiCRM provides a complete communication and management tools for your team, including
                            CRM, files, calendars, and more. MultiCRM is available in cloud and on premise.
                        </p>

                    </div>
                </div>

            </div>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-lg-12">

                    <div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto">
                        <h3 class="display-2"><span>Management board</span></h3>
                    </div>

                </div>

            </div>
        </div>

        <div class="container">
            <div class="row">

                <?php $__currentLoopData = $employees; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $employee): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-md-6 col-lg-3 mb-5 mb-lg-0">
                        <div class="px-4">
                            <img src="<?php echo e(Voyager::image($employee->getThumbnail($employee->image, 'medium'))); ?>"
                                 class="rounded-circle img-center img-fluid shadow shadow-lg--hover"
                                 style="width: 200px;">
                            <div class="pt-4 text-center">
                                <h5 class="title">
                                    <span class="d-block mb-1"><?php echo e($employee->full_name); ?></span>
                                    <small class="h6 text-muted"><?php echo e($employee->role); ?></small>
                                </h5>
                                <div class="mt-3">
                                    <?php if($employee->twitter_url): ?>
                                        <a target="_blank" href="<?php echo e($employee->twitter_url); ?>"
                                           class="btn btn-warning btn-icon-only rounded-circle">
                                            <i class="fa fa-twitter"></i>
                                        </a>
                                    <?php endif; ?>
                                    <?php if($employee->facebook): ?>
                                        <a href="<?php echo e($employee->facebook); ?>"
                                           class="btn btn-warning btn-icon-only rounded-circle">
                                            <i class="fa fa-facebook"></i>
                                        </a>
                                    <?php endif; ?>

                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


            </div>
        </div>

    </section>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>