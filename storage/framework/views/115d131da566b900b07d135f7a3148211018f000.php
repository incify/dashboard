<?php $__env->startSection('template_title'); ?>
  	Theme <?php echo e($theme->name); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('template_fastload_css'); ?>

<?php $__env->stopSection(); ?>

<?php

    $themeActive = [
		'checked' => '',
		'value' => 0,
		'true'	=> '',
		'false'	=> 'checked'
    ];

    if($theme->status == 1) {
        $themeActive = [
        	'checked' => 'checked',
        	'value' => 1,
			'true'	=> 'checked',
			'false'	=> ''
        ];
    }

?>


<?php $__env->startSection('content'); ?>

	<div class="container">
		<div class="row">
			<div class="col-md-10 col-md-offset-1">
				<div class="panel panel-default">
					<div class="panel-heading">

						<strong><?php echo e(trans('themes.editTitle')); ?></strong> <?php echo e($theme->name); ?>


						<a href="/themes/<?php echo e($theme->id); ?>" class="btn btn-primary btn-xs pull-right" style="margin-left: 1em;">
						  	<i class="fa fa-fw fa-mail-reply" aria-hidden="true"></i>
						 	Back  <span class="hidden-xs">to Theme</span>
						</a>

						<a href="/themes" class="btn btn-info btn-xs pull-right">
							<i class="fa fa-fw fa-mail-reply" aria-hidden="true"></i>
							<span class="hidden-xs">Back to </span>Themes
						</a>

					</div>

					<?php echo Form::model($theme, array('action' => array('ThemesManagementController@update', $theme->id), 'method' => 'PUT')); ?>


						<?php echo csrf_field(); ?>


						<div class="panel-body">

							<div class="form-group has-feedback row <?php echo e($errors->has('status') ? ' has-error ' : ''); ?> <?php if($theme->id == 1): ?> disabled <?php endif; ?> ">
								<?php echo Form::label('status', trans('themes.statusLabel'), array('class' => 'col-md-3 control-label'));; ?>

								<div class="col-md-9">
									<label class="switch <?php echo e($themeActive['checked']); ?>" for="status">
										<span class="active"><i class="fa fa-toggle-on fa-2x"></i> <?php echo e(trans('themes.statusEnabled')); ?></span>
										<span class="inactive"><i class="fa fa-toggle-on fa-2x fa-rotate-180"></i> <?php echo e(trans('themes.statusDisabled')); ?></span>
										<input type="radio" name="status" value="1" <?php echo e($themeActive['true']); ?>>
										<input type="radio" name="status" value="0" <?php echo e($themeActive['false']); ?>>
									</label>

									<?php if($errors->has('status')): ?>
										<span class="help-block">
											<strong><?php echo e($errors->first('status')); ?></strong>
										</span>
									<?php endif; ?>
								</div>
							</div>

						  	<div class="form-group has-feedback row <?php echo e($errors->has('name') ? ' has-error ' : ''); ?>">
							    <?php echo Form::label('name', trans('themes.nameLabel') , array('class' => 'col-md-3 control-label'));; ?>

							    <div class="col-md-9">
							      	<div class="input-group">
							        	<?php echo Form::text('name', old('name'), array('id' => 'name', 'class' => 'form-control', 'placeholder' => trans('themes.namePlaceholder'))); ?>

							        	<label class="input-group-addon" for="name"><i class="fa fa-fw fa-pencil }}" aria-hidden="true"></i></label>
							      	</div>
									<?php if($errors->has('name')): ?>
										<span class="help-block">
											<strong><?php echo e($errors->first('name')); ?></strong>
										</span>
									<?php endif; ?>
							    </div>
						  	</div>

						  	<div class="form-group has-feedback row <?php echo e($errors->has('link') ? ' has-error ' : ''); ?>">
							    <?php echo Form::label('link', trans('themes.linkLabel') , array('class' => 'col-md-3 control-label'));; ?>

							    <div class="col-md-9">
							      	<div class="input-group">
							        	<?php echo Form::text('link', old('link'), array('id' => 'link', 'class' => 'form-control', 'placeholder' => trans('themes.linkPlaceholder'))); ?>

							        	<label class="input-group-addon" for="link"><i class="fa fa-fw fa-link fa-rotate-90 }}" aria-hidden="true"></i></label>
							      	</div>
									<?php if($errors->has('link')): ?>
										<span class="help-block">
											<strong><?php echo e($errors->first('link')); ?></strong>
										</span>
									<?php endif; ?>
							    </div>
						  	</div>

						  	<div class="form-group has-feedback row <?php echo e($errors->has('notes') ? ' has-error ' : ''); ?>">
							    <?php echo Form::label('notes', trans('themes.notesLabel') , array('class' => 'col-md-3 control-label'));; ?>

							    <div class="col-md-9">
							      	<div class="input-group">
							        	<?php echo Form::textarea('notes', old('notes'), array('id' => 'notes', 'class' => 'form-control', 'placeholder' => trans('themes.notesPlaceholder'))); ?>

							        	<label class="input-group-addon" for="notes"><i class="fa fa-fw fa-pencil }}" aria-hidden="true"></i></label>
							      	</div>
									<?php if($errors->has('notes')): ?>
										<span class="help-block">
											<strong><?php echo e($errors->first('notes')); ?></strong>
										</span>
									<?php endif; ?>
							    </div>
						  	</div>

						</div>
						<div class="panel-footer">

						  <div class="row">

						    <div class="col-xs-6">
						      <?php echo Form::button('<i class="fa fa-fw fa-save" aria-hidden="true"></i>' . trans('themes.editSave'), array('class' => 'btn btn-success btn-block margin-bottom-1 btn-save','type' => 'button', 'data-toggle' => 'modal', 'data-target' => '#confirmSave', 'data-title' => Lang::get('modals.edit_user__modal_text_confirm_title'), 'data-message' => Lang::get('modals.edit_user__modal_text_confirm_message'))); ?>

						    </div>
						  </div>
						</div>

					<?php echo Form::close(); ?>


				</div>
			</div>
		</div>
	</div>

	<?php echo $__env->make('modals.modal-save', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
	<?php echo $__env->make('modals.modal-delete', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('footer_scripts'); ?>

	<?php echo $__env->make('scripts.delete-modal-script', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
	<?php echo $__env->make('scripts.save-modal-script', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
	<?php echo $__env->make('scripts.check-changed', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
	<?php echo $__env->make('scripts.toggleStatus', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>