<?php $__env->startSection('template_title'); ?>
	Transaction details
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div class="padding">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="box">
          <div class="box-header light lt">
            <h3><?php echo e($currency); ?> funds only</h3>
          </div>
          <div class="box-body">
            <p class="text-center text-muted">
							<?php if($currency == 'BTC'): ?>
							The funds will be credited after we get confirmations from the network.<br/><b>Please note</b> that the address the system gave you for this funding is unique and can only be used once.
							<?php elseif($currency == 'ETH'): ?>
              To make smooth & fast ETH transaction without rejection, set GAS LIMIT to 200,000 and gas price to 50 GWEI.<br/>Ethereum network is experiencing much higher traffic than usual. Please be patient.
							<?php elseif($currency == 'BCH'): ?>
							The funds will be credited after we get confirmations from the network.<br/><b>Please note</b> that the address the system gave you for this funding is unique and can only be used once.
							<?php elseif($currency == 'LTC'): ?>
							The funds will be credited after we get confirmations from the network.<br/><b>Please note</b> that the address the system gave you for this funding is unique and can only be used once.
							<?php endif; ?>
            </p>
            <div class="row">
              <div class="col-md-6">
                <p>Please send <span class="badge orange"><?php echo e($sent); ?> <b><?php echo e($currency); ?></b></span> to this address:</p>
                <div class="address-container">
                  <div class="form-group mb-4">
                    <input id="value" class="form-control" type="text" readonly="" value="<?php echo e($address); ?>">
                  </div>
                  <p class="text-right mb-5"><button onclick="document.getElementById('value').select();	document.execCommand('copy'); return false;" class="btn primary">Copy to clipboard</button></p>
									<a href="/token/buy" class="btn btn-outline b-primary text-primary">Previous</a>
									<a href="javascript:void(0);" id="check-order" class="btn btn-fw success ml-3">Check my <?php echo e($token_name); ?> balance</a>
									<div id="paid-notice-text"></div>
                </div>
              </div>
              <div class="col-md-6">
                <?php echo QrCode::size(220)->generate($address);; ?>

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('footer_scripts'); ?>
<script type="text/javascript">
window.onload = function () {
	jQuery(document).ready(function ($) {
		function checkorderstatus() {
			var data = { order_id: "<?php echo e($order_id); ?>", order_status: "<?php echo e($order_status); ?>", account_type: "<?php echo e($currency); ?>"};
			$("#paid-notice-text").html("<p class=\"pt-3\"><img src='/images/ajax-loader.svg'/></p>");
			$.ajax({
				headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
				type: "POST",
				url: "/token/updateorder",
				data: data,
				success: function_success,
				error: function_error
			});
		};
		function function_success(data2, status) {
			console.log(data2);
			if (data2.status == "completed") {
				window.location.replace(window.location.protocol+"//"+window.location.hostname+":"+window.location.port+"/token/paid-order/<?php echo e($order_id); ?>");
			} else if (data2.status == "pending") {
					$("#paid-notice-text").html("<p class=\"pt-3 b-warning text-warning\">Your payment in progress. Please check your balance again in a few minutes</p>");
	 		} else {
				$("#paid-notice-text").html("<p class=\"pt-3 b-danger text-danger\">Your payment has not reached us yet.It may take more than 1 network confirmations before your payment progress</p>");
			}
		};
		function function_error() {
			$("#paid-notice-text").html("<p class=\"pt-3 b-danger text-danger\">Your payment has not reached us yet. Please check your balance again in a few minutes</p>");
		};
		$('#check-order').click(checkorderstatus);

	});
}
 </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>