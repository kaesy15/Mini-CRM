<?php $__env->startSection('title', trans('employee.list')); ?>

<?php $__env->startSection('content'); ?>
<h1 class="page-header">
    <div class="pull-right">
    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('create', new App\Employee)): ?>
        <?php echo e(link_to_route('employees.index', trans('employee.create'), ['action' => 'create'], ['class' => 'btn btn-success'])); ?>

    <?php endif; ?>
    </div>
    <?php echo e(trans('employee.list')); ?>

    <small><?php echo e(trans('app.total')); ?> : <?php echo e($employees->total()); ?> <?php echo e(trans('employee.employee')); ?></small>
</h1>
<div class="row">
    <div class="col-md-8">
        <div class="panel panel-default table-responsive">
            <div class="panel-heading">
                <?php echo e(Form::open(['method' => 'get','class' => 'form-inline'])); ?>

                <?php echo FormField::select('company_id', $companyList, ['label' => trans('employee.search'), 'placeholder' => trans('company.select'), 'class' => 'input-sm']); ?>

                <?php echo FormField::text('q', ['value' => request('q'), 'label' => false, 'class' => 'input-sm']); ?>

                <?php echo e(Form::submit(trans('employee.search'), ['class' => 'btn btn-sm'])); ?>

                <?php echo e(link_to_route('employees.index', trans('app.reset'))); ?>

                <?php echo e(Form::close()); ?>

            </div>
            <table class="table table-condensed">
                <thead>
                    <tr>
                        <th class="text-center"><?php echo e(trans('app.table_no')); ?></th>
                        <th><?php echo e(trans('app.name')); ?></th>
                        <th><?php echo e(trans('employee.company')); ?></th>
                        <th><?php echo e(trans('employee.email')); ?></th>
                        <th><?php echo e(trans('employee.phone')); ?></th>
                        <th class="text-center"><?php echo e(trans('app.action')); ?></th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $employees; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $employee): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td class="text-center"><?php echo e($employees->firstItem() + $key); ?></td>
                        <td><?php echo e($employee->first_name); ?> <?php echo e($employee->last_name); ?></td>
                        <td><?php echo e($employee->company->name); ?></td>
                        <td><?php echo e($employee->email); ?></td>
                        <td><?php echo e($employee->phone); ?></td>
                        <td class="text-center">
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('update', $employee)): ?>
                            <?php echo link_to_route(
                                'employees.index',
                                trans('app.edit'),
                                ['action' => 'edit', 'id' => $employee->id] + Request::only('page', 'q'),
                                ['id' => 'edit-employee-'.$employee->id]
                            ); ?> |
                        <?php endif; ?>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('delete', $employee)): ?>
                            <?php echo link_to_route(
                                'employees.index',
                                trans('app.delete'),
                                ['action' => 'delete', 'id' => $employee->id] + Request::only('page', 'q'),
                                ['id' => 'del-employee-'.$employee->id]
                            ); ?>

                        <?php endif; ?>
                        </td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
            <div class="panel-body"><?php echo e($employees->appends(Request::except('page'))->render()); ?></div>
        </div>
    </div>
    <div class="col-md-4">
        <?php if(Request::has('action')): ?>
        <?php echo $__env->make('employees.forms', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        <?php endif; ?>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>