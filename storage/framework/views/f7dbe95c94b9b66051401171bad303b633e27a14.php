<?php $__env->startSection('template_title'); ?>
  	<?php echo e(trans('themes.showHeadTitle') . ' ' . $theme->name); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('template_fastload_css'); ?>

	.list-group-responsive span:not(.label) {
		display: block;
		overflow-y: auto;
	}
	.list-group-responsive span.label {
		margin-left: 7.25em;
	}

	.theme-details-list strong {
		width: 5.5em;
		display: inline-block;
		position: absolute;
	}

	.theme-details-list span {
	  	margin-left: 5.5em;
	}

<?php $__env->stopSection(); ?>

<?php
    $themeStatus = [
        'name'  => trans('themes.statusDisabled'),
        'class' => 'danger'
    ];
    if($theme->status == 1) {
        $themeStatus = [
            'name'  => trans('themes.statusEnabled'),
            'class' => 'success'
        ];
    }
?>

<?php $__env->startSection('content'); ?>

<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">
					<?php echo e(trans('themes.showTitle')); ?>

					<a href="/themes/" class="btn btn-primary btn-xs pull-right">
					  <i class="fa fa-fw fa-mail-reply" aria-hidden="true"></i>
					  <?php echo e(trans('themes.showBackBtn')); ?>

					</a>
				</div>
				<div class="panel-body">
					<div class="well well-sm">
					    <h1 class="text-center">
					        <?php echo e($theme->name); ?>

					    </h1>

					    <h4 class="text-center margin-bottom-2">
					        <span class="badge"><?php echo e(count($themeUsers)); ?></span> <?php echo e(trans('themes.showUsers')); ?>

					    </h4>

						<ul class="list-group list-group-responsive theme-details-list margin-bottom-3">

							<li class="list-group-item">
								<strong><?php echo e(trans('themes.showStatus')); ?></strong>
							    <span class="label label-<?php echo e($themeStatus['class']); ?>">
							        <?php echo e($themeStatus['name']); ?>

							    </span>
							</li>

							<li class="list-group-item"><strong>Id</strong> <span><?php echo e($theme->id); ?></span></li>

							<?php if($theme->link != null): ?>
								<li class="list-group-item"><strong><?php echo e(trans('themes.showLink')); ?></strong> <span> <a href="<?php echo e($theme->link); ?>" target="_blank" data-toggle="tooltip" title="Go to Link"><?php echo e($theme->link); ?></a></span></li>
							<?php endif; ?>

							<?php if($theme->notes != null): ?>
								<li class="list-group-item"><strong><?php echo e(trans('themes.showNotes')); ?></strong> <span><?php echo e($theme->notes); ?></span></li>
							<?php endif; ?>

							<li class="list-group-item"><strong><?php echo e(trans('themes.showAdded')); ?></strong> <span><?php echo e($theme->created_at); ?></span></li>
							<li class="list-group-item"><strong><?php echo e(trans('themes.showUpdated')); ?></strong> <span><?php echo e($theme->updated_at); ?></span></li>
						</ul>

						<?php if(count($themeUsers) > 0): ?>
							<h4 class="text-center margin-bottom-2">
							   	<i class="fa fa-users fa-fw" aria-hidden="true"></i> Theme Users
							</h4>

							<ul class="list-group">
								<?php $__currentLoopData = $themeUsers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $themeUser): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
								    <li class="list-group-item"><i class="fa fa-user fa-fw margin-right-1" aria-hidden="true"></i> <?php echo e($themeUser->name); ?></li>
								<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
							</ul>
						<?php endif; ?>
					</div>
				</div>
				<div class="panel-footer">
					<div class="row">
						<div class="col-xs-6">
							<a href="/themes/<?php echo e($theme->id); ?>/edit" class="btn btn-small btn-info btn-block">
								<i class="fa fa-pencil fa-fw" aria-hidden="true"></i> Edit<span class="hidden-xs hidden-sm"> this</span><span class="hidden-xs"> Theme</span>
							</a>
						</div>
						<?php echo Form::open(array('url' => 'themes/' . $theme->id, 'class' => 'col-xs-6')); ?>

							<?php echo Form::hidden('_method', 'DELETE'); ?>

							<?php echo Form::button('<i class="fa fa-trash-o fa-fw" aria-hidden="true"></i> Delete<span class="hidden-xs hidden-sm"> this</span><span class="hidden-xs"> Theme</span>', array('class' => 'btn btn-danger btn-block btn-flat','type' => 'button', 'data-toggle' => 'modal', 'data-target' => '#confirmDelete', 'data-title' => trans('themes.confirmDeleteHdr'), 'data-message' => trans('themes.confirmDelete'))); ?>

						<?php echo Form::close(); ?>

					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<?php echo $__env->make('modals.modal-delete', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('footer_scripts'); ?>

	<?php echo $__env->make('scripts.delete-modal-script', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
	<?php echo $__env->make('scripts.tooltips', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>