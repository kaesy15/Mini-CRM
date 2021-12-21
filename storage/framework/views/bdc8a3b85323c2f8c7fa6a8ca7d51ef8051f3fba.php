<?php $__env->startSection('title', trans('company.detail')); ?>

<?php $__env->startSection('content'); ?>
<div class="row">
    <div class="col-md-4">
        <div class="panel panel-default">
            <div class="panel-heading"><h3 class="panel-title"><?php echo e(trans('company.detail')); ?></h3></div>
            <?php if($company->logo && is_file(public_path('storage/'.$company->logo))): ?>
                <div class="panel-body">
                    <?php echo e(Html::image('storage/'.$company->logo, $company->name, ['style' => 'width:100%'])); ?>

                </div>
            <?php endif; ?>
            <table class="table table-condensed">
                <tbody>
                    <tr>
                        <td class="col-xs-4"><?php echo e(trans('company.name')); ?></td>
                        <td><?php echo e($company->name); ?></td>
                    </tr>
                    <tr>
                        <td><?php echo e(trans('company.email')); ?></td>
                        <td><?php echo e($company->email); ?></td>
                    </tr>
                    <tr>
                        <td><?php echo e(trans('company.website')); ?></td>
                        <td><?php echo e($company->website); ?></td>
                    </tr>
                    <tr>
                        <td><?php echo e(trans('company.address')); ?></td>
                        <td><?php echo e($company->address); ?></td>
                    </tr>
                </tbody>
            </table>
            <div class="panel-footer">
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('update', $company)): ?>
                    <?php echo e(link_to_route('companies.edit', trans('company.edit'), [$company], ['class' => 'btn btn-warning', 'id' => 'edit-company-'.$company->id])); ?>

                <?php endif; ?>
                <?php echo e(link_to_route('companies.index', trans('company.back_to_index'), [], ['class' => 'btn btn-default'])); ?>

            </div>
        </div>
    </div>
    <div class="col-md-8">
        <?php if(Request::has('action')): ?>
        <?php echo $__env->make('employees.forms', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        <?php endif; ?>
        <div class="panel panel-default">
            <div class="panel-heading">
                <?php echo e(Form::open(['method' => 'get','class' => 'form-inline pull-right'])); ?>

                <?php echo FormField::text('q', ['value' => request('q'), 'label' => trans('employee.search'), 'class' => 'input-sm']); ?>

                <?php echo e(Form::submit(trans('app.search'), ['class' => 'btn btn-sm'])); ?>

                <?php echo e(link_to_route('companies.show', trans('app.reset'), [$company])); ?>

                <?php echo e(Form::close()); ?>

                <h3 class="panel-title" style="margin: 6px 0px;"><?php echo e(trans('company.employees')); ?></h3>
            </div>
            <table class="table table-condensed">
                <thead>
                    <tr>
                        <th class="text-center"><?php echo e(trans('app.table_no')); ?></th>
                        <th><?php echo e(trans('app.name')); ?></th>
                        <th><?php echo e(trans('employee.email')); ?></th>
                        <th><?php echo e(trans('employee.phone')); ?></th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $employees; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $employee): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td class="text-center"><?php echo e($employees->firstItem() + $key); ?></td>
                        <td><?php echo e($employee->first_name); ?> <?php echo e($employee->last_name); ?></td>
                        <td><?php echo e($employee->email); ?></td>
                        <td><?php echo e($employee->phone); ?></td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
            <div class="panel-body"><?php echo e($employees->appends(Request::except('page'))->render()); ?></div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>