<?php $__env->startSection('template_title'); ?>
	Transaction details
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div class="padding">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="box">
          <div class="box-header text-center light lt">
            <h3>Thank You for purchasing <?php echo e($token_name); ?> Tokens!</h3>
          </div>
          <div class="box-body">
            <p class="text-center text-muted">
							<b>Funds were successfully deducted from your account.</b><br />
							Your tokens will be delivered straight to ETH wallet by the end of ICO.<br />
In case you don't have an Ethereum wallet, it will be created automatically.
            </p>
						<p class="text-center"><a href="/token/paid-invoice-detail/<?php echo e($order->id); ?>" class="btn btn-outline b-primary text-primary">View Invoice Detail</a></p>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('footer_scripts'); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>