<?php if(Request::get('action') == 'create'): ?>
<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('create', new App\Employee)): ?>
    <?php echo Form::open(['route' => 'employees.store']); ?>

    <?php echo FormField::text('first_name', ['required' => true, 'label' => trans('employee.first_name')]); ?>

    <?php echo FormField::text('last_name', ['required' => true, 'label' => trans('employee.last_name')]); ?>

    <?php echo FormField::select('company_id', $companyList, ['required' => true, 'label' => trans('employee.company'), 'placeholder' => trans('company.select')]); ?>

    <?php echo FormField::email('email', ['label' => trans('employee.email')]); ?>

    <?php echo FormField::text('phone', ['label' => trans('employee.phone')]); ?>

    <?php echo Form::submit(trans('employee.create'), ['class' => 'btn btn-success']); ?>

    <?php echo e(link_to_route('employees.index', trans('app.cancel'), [], ['class' => 'btn btn-default'])); ?>

    <?php echo Form::close(); ?>

<?php endif; ?>
<?php endif; ?>
<?php if(Request::get('action') == 'edit' && $editableEmployee): ?>
<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('update', $editableEmployee)): ?>
    <?php echo Form::model($editableEmployee, ['route' => ['employees.update', $editableEmployee],'method' => 'patch']); ?>

    <?php echo FormField::text('first_name', ['required' => true, 'label' => trans('employee.first_name')]); ?>

    <?php echo FormField::text('last_name', ['required' => true, 'label' => trans('employee.last_name')]); ?>

    <?php echo FormField::select('company_id', $companyList, ['required' => true, 'label' => trans('employee.company'), 'placeholder' => trans('company.select')]); ?>

    <?php echo FormField::email('email', ['label' => trans('employee.email')]); ?>

    <?php echo FormField::text('phone', ['label' => trans('employee.phone')]); ?>

    <?php if(request('q')): ?>
        <?php echo e(Form::hidden('q', request('q'))); ?>

    <?php endif; ?>
    <?php if(request('page')): ?>
        <?php echo e(Form::hidden('page', request('page'))); ?>

    <?php endif; ?>
    <?php echo Form::submit(trans('employee.update'), ['class' => 'btn btn-success']); ?>

    <?php echo e(link_to_route('employees.index', trans('app.cancel'), [], ['class' => 'btn btn-default'])); ?>

    <?php echo Form::close(); ?>

<?php endif; ?>
<?php endif; ?>
<?php if(Request::get('action') == 'delete' && $editableEmployee): ?>
<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('delete', $editableEmployee)): ?>
    <div class="panel panel-default">
        <div class="panel-heading"><h3 class="panel-title"><?php echo e(trans('employee.delete')); ?></h3></div>
        <div class="panel-body">
            <label class="control-label"><?php echo e(trans('app.name')); ?></label>
            <p><?php echo e($editableEmployee->first_name); ?> <?php echo e($editableEmployee->last_name); ?></p>
            <label class="control-label"><?php echo e(trans('employee.company')); ?></label>
            <p><?php echo e($editableEmployee->company->name); ?></p>
            <label class="control-label"><?php echo e(trans('employee.email')); ?></label>
            <p><?php echo e($editableEmployee->email); ?></p>
            <label class="control-label"><?php echo e(trans('employee.phone')); ?></label>
            <p><?php echo e($editableEmployee->phone); ?></p>
            <?php echo $errors->first('employee_id', '<span class="form-error small">:message</span>'); ?>

        </div>
        <hr style="margin:0">
        <div class="panel-body"><?php echo e(trans('app.delete_confirm')); ?></div>
        <div class="panel-footer">
            <?php echo FormField::delete(
                ['route' => ['employees.destroy', $editableEmployee]],
                trans('app.delete_confirm_button'),
                ['class'=>'btn btn-danger'],
                [
                    'employee_id' => $editableEmployee->id,
                    'page' => request('page'),
                    'q' => request('q'),
                ]
            ); ?>

            <?php echo e(link_to_route('employees.index', trans('app.cancel'), [], ['class' => 'btn btn-default'])); ?>

        </div>
    </div>
<?php endif; ?>
<?php endif; ?>
