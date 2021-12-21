<?php $__env->startSection('title', trans('company.edit')); ?>

<?php $__env->startSection('content'); ?>

<?php if(request('action') == 'delete' && $company): ?>
<div class="row">
    <div class="col-md-6 col-md-offset-3">
        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('delete', $company)): ?>
            <div class="panel panel-default">
                <div class="panel-heading"><h3 class="panel-title"><?php echo e(trans('company.delete')); ?></h3></div>
                <div class="panel-body">
                    <label class="control-label"><?php echo e(trans('company.name')); ?></label>
                    <p><?php echo e($company->name); ?></p>
                    <label class="control-label"><?php echo e(trans('company.email')); ?></label>
                    <p><?php echo e($company->email); ?></p>
                    <label class="control-label"><?php echo e(trans('company.website')); ?></label>
                    <p><?php echo e($company->website); ?></p>
                    <label class="control-label"><?php echo e(trans('company.address')); ?></label>
                    <p><?php echo e($company->address); ?></p>
                    <?php echo $errors->first('company_id', '<span class="form-error small">:message</span>'); ?>

                </div>
                <hr style="margin:0">
                <div class="panel-body"><?php echo e(trans('app.delete_confirm')); ?></div>
                <div class="panel-footer">
                    <?php echo FormField::delete(
                        ['route' => ['companies.destroy', $company]],
                        trans('app.delete_confirm_button'),
                        ['class'=>'btn btn-danger'],
                        [
                            'company_id' => $company->id,
                            'page' => request('page'),
                            'q' => request('q'),
                        ]
                    ); ?>

                    <?php echo e(link_to_route('companies.edit', trans('app.cancel'), [$company], ['class' => 'btn btn-default'])); ?>

                </div>
            </div>
        <?php endif; ?>
    </div>
</div>
<?php else: ?>
<div class="row">
    <div class="col-md-6">
        <div class="panel panel-default">
            <div class="panel-heading"><h3 class="panel-title"><?php echo e(trans('company.edit')); ?></h3></div>
            <?php echo Form::model($company, ['route' => ['companies.update', $company],'method' => 'patch']); ?>

            <div class="panel-body">
                <?php echo FormField::text('name', ['required' => true, 'label' => trans('company.name')]); ?>

                <?php echo FormField::email('email', ['required' => true, 'label' => trans('company.email')]); ?>

                <?php echo FormField::text('website', ['label' => trans('company.website')]); ?>

                <?php echo FormField::textarea('address', ['label' => trans('company.address')]); ?>

            </div>
            <div class="panel-footer">
                <?php echo Form::submit(trans('company.update'), ['class' => 'btn btn-success']); ?>

                <?php echo e(link_to_route('companies.show', trans('app.cancel'), [$company], ['class' => 'btn btn-default'])); ?>

                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('delete', $company)): ?>
                    <?php echo e(link_to_route('companies.edit', trans('app.delete'), [$company, 'action' => 'delete'], ['class' => 'btn btn-danger pull-right', 'id' => 'del-company-'.$company->id])); ?>

                <?php endif; ?>
            </div>
            <?php echo Form::close(); ?>

        </div>
    </div>
    <div class="col-md-6">
        <div class="panel panel-default">
            <div class="panel-heading"><h3 class="panel-title"><?php echo e(trans('company.logo_upload')); ?></h3></div>
            <div class="panel-body">
                <?php if($company->logo && is_file(public_path('storage/'.$company->logo))): ?>
                <?php echo e(Html::image('storage/'.$company->logo, $company->name, ['style' => 'width:100%'])); ?>

                <?php endif; ?>
                <?php echo e(Form::open(['route' => ['companies.logo-upload', $company], 'method' => 'patch', 'files' => true])); ?>

                <?php echo FormField::file('logo', ['label' => false]); ?>

                <?php echo e(Form::submit(trans('company.upload_logo'), ['class' => 'btn btn-primary'])); ?>

                <?php echo e(Form::close()); ?>

            </div>
        </div>
    </div>
</div>
<?php endif; ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>