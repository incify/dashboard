<?php $__env->startSection('template_title'); ?>
	Dashboard
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div class="padding">
    <div class="row">
      <div class="col-6 col-lg-3">
        <div class="box p-3">
          <div class="d-flex">
            <span class="text-muted">Your <?php echo e(env('TOKEN_NAME')); ?> balance</span>
          </div>
          <div class="py-3 text-center text-lg text-success"><?php echo e($token_balance); ?></div>
        </div>
      </div>
      <div class="col-6 col-lg-3">
        <div class="box p-3">
          <div class="d-flex">
            <span class="text-muted">Referral tokens</span>
          </div>
          <div class="py-3 text-center text-lg text-primary"><?php echo e($token_balance); ?></div>
        </div>
      </div>
      <div class="col-12 col-md-12 col-lg-6">
      <div class="list inset box">
        <div class="box-header"><h3>Transactions</h3></div>
        <div class="box-body">
          <?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <div class="list-item">
            <div><span class="w-40 avatar text-center text-success"><?php echo App\Helpers\Helpers::svg_icon($order->currency); ?></span></div>
            <div class="list-body">
              <div class="float-left">
                <?php if($order->status == 'completed'): ?>
                <a href="/token/paid-invoice/<?php echo e($order->id); ?>" class="_500">Invert <?php echo e($order->sent); ?> <?php echo e($order->currency); ?></a>
                <span class="badge badge-pill success pos-rlt text-sm mr-2"><b class="arrow left b-success pull-in"></b>Paid</span>
                <?php elseif($order->status == 'expired'): ?>
                <span class="_500">Invert <?php echo e($order->sent); ?> <?php echo e($order->currency); ?></span>
                <span class="badge badge-pill danger pos-rlt text-sm mr-2"><b class="arrow left b-danger pull-in"></b>Expired</span>
								<?php else: ?>
								<a href="/token/vieworder/<?php echo e($order->id); ?>" class="_500">Invert <?php echo e($order->sent); ?> <?php echo e($order->currency); ?></a>
								<span class="badge badge-pill warning pos-rlt text-sm mr-2"><b class="arrow left b-warning pull-in"></b>Pending</span>
                <?php endif; ?>
                <small class="d-block text-muted"><?php echo e($order->created_at); ?></small>
              </div>
              <div class="float-right text-right">
                <p class="token-balance"><b><?php echo e($order->token); ?> <?php echo e(env('TOKEN_NAME')); ?></b></p>
                <?php if($order->status == 'completed'): ?>
                <a href="/token/paid-invoice/<?php echo e($order->id); ?>" class="btn btn-sm success" href="#">View Invoice</a>
								<?php elseif($order->status == 'expired'): ?>
                <?php else: ?>
                <a href="/token/vieworder/<?php echo e($order->id); ?>" class="btn btn-sm primary" href="#">Invest Now</a>
                <?php endif; ?>
              </div>
            </div>
          </div>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

      </div>
    </div>
</div>
</div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>