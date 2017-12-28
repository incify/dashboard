<?php $__env->startSection('template_title'); ?>
	PHP Information
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="panel panel-default">
					<div class="panel-heading">
						PHP Information
					</div>
					<div class="panel-body">
						<div class="table-responsive php-info">
							<?php
								ob_start();
								phpinfo();
								$pinfo = ob_get_contents();
								ob_end_clean();
								$pinfo = preg_replace( '%^.*<body>(.*)</body>.*$%ms','$1',$pinfo);
								echo $pinfo;
							?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>