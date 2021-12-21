<?php $__env->startSection('title', trans('company.create')); ?>

<?php $__env->startSection('content'); ?>
<div class="row">
    <div class="col-md-6 col-md-offset-3">
        <div class="panel panel-default">
            <div class="panel-heading"><h3 class="panel-title"><?php echo e(trans('company.create')); ?></h3></div>
            <?php echo Form::open(['route' => 'companies.store']); ?>

            <div class="panel-body">
                <?php echo FormField::text('name', ['required' => true, 'label' => trans('company.name')]); ?>

                <?php echo FormField::email('email', ['required' => true, 'label' => trans('company.email')]); ?>

                <?php echo FormField::text('website', ['label' => trans('company.website')]); ?>

                <?php echo FormField::textarea('address', ['label' => trans('company.address')]); ?>

                
            </div>
            <div class="panel-footer">
                <?php echo Form::submit(trans('company.create'), ['class' => 'btn btn-success']); ?>

                <?php echo e(link_to_route('companies.index', trans('app.cancel'), [], ['class' => 'btn btn-default'])); ?>

            </div>
            <?php echo Form::close(); ?>

        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>