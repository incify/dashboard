<?php $__env->startSection('template_title'); ?>
	Routing Information
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
	<div class="container">
		<div class="row">
			<div class="col-md-12">

				<?php echo $__env->make('partials.form-status', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

				<div class="panel panel-default">
					<div class="panel-heading">
						Routing Information
						<span class="badge badge-primary pull-right"><?php echo e(count($routes)); ?> routes</span>
					</div>
					<div class="panel-body">
						<div class="table-responsive">
							<table class="table table-striped table-condensed data-table">
								<thead>
									<tr class="success">
					                    <th>URI</th>
					                    <th>Name</th>
					                    <th>Type</th>
					                    <th>Method</th>
									</tr>
								</thead>
								<tbody>
							        <?php $__currentLoopData = $routes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $route): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
										<tr>
				                        <td><?php echo e($route->uri); ?></td>
				                        <td><?php echo e($route->getName()); ?></td>
				                        <td><?php echo e($route->getPrefix()); ?></td>
				                        <td><?php echo e($route->getActionMethod()); ?></td>
										</tr>
							        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>