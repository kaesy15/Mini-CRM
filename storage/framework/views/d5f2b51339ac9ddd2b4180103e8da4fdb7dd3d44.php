<?php $__env->startSection('title', trans('company.list')); ?>

<?php $__env->startSection('content'); ?>
<h1 class="page-header">
    <div class="pull-right">
    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('create', new App\Company)): ?>
        <?php echo e(link_to_route('companies.create', trans('company.create'), [], ['class' => 'btn btn-success'])); ?>

    <?php endif; ?>
    </div>
    <?php echo e(trans('company.list')); ?>

    <small><?php echo e(trans('app.total')); ?> : <?php echo e($companies->total()); ?> <?php echo e(trans('company.company')); ?></small>
</h1>
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default table-responsive">
            <div class="panel-heading">
                <?php echo e(Form::open(['method' => 'get','class' => 'form-inline'])); ?>

                <?php echo FormField::text('q', ['value' => request('q'), 'label' => trans('company.search'), 'class' => 'input-sm']); ?>

                <?php echo e(Form::submit(trans('company.search'), ['class' => 'btn btn-sm'])); ?>

                <?php echo e(link_to_route('companies.index', trans('app.reset'))); ?>

                <?php echo e(Form::close()); ?>

            </div>
            <table class="table table-condensed">
                <thead>
                    <tr>
                        <th class="text-center"><?php echo e(trans('app.table_no')); ?></th>
                        <th><?php echo e(trans('company.name')); ?></th>
                        <th><?php echo e(trans('company.email')); ?></th>
                        <th><?php echo e(trans('company.website')); ?></th>
                        <th><?php echo e(trans('company.address')); ?></th>
                        <th class="text-center"><?php echo e(trans('app.action')); ?></th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $companies; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $company): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td class="text-center"><?php echo e($companies->firstItem() + $key); ?></td>
                        <td><?php echo e($company->name); ?></td>
                        <td><?php echo e($company->email); ?></td>
                        <td><?php echo e($company->website); ?></td>
                        <td><?php echo e($company->address); ?></td>
                        <td class="text-center">
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view', $company)): ?>
                            <?php echo link_to_route(
                                'companies.show',
                                trans('app.show'),
                                [$company],
                                ['class' => 'btn btn-default btn-xs', 'id' => 'show-company-' . $company->id]
                            ); ?>

                        <?php endif; ?>
                        </td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
            <div class="panel-body"><?php echo e($companies->appends(Request::except('page'))->render()); ?></div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>