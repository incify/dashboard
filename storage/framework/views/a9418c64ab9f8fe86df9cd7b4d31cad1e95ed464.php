<?php $__env->startSection('template_title'); ?>
	Buy NOVA Token
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div class="padding">
	<div class="row">
		<div class="col-lg-6 offset-lg-3">
			<div class="box">
				<div class="box-header"><h3>Payment method and price calculator</h3></div>
				<div class="box-body">
					<?php echo e(Form::open(array('url' => 'foo/bar'))); ?>

					<div class="radio">
						<label class="ui-image-radio">
							<svg width="38" height="38" viewBox="0 0 38 38" xmlns="http://www.w3.org/2000/svg" class="CurrencyIcon-ewqwUN cryMpR"><g fill="none" fill-rule="evenodd"><circle fill="#FFAD02" cx="19" cy="19" r="19"></circle><path d="M24.7 19.68a3.63 3.63 0 0 0 1.47-2.06c.74-2.77-.46-4.87-3.2-5.6l.89-3.33a.23.23 0 0 0-.16-.28l-1.32-.35a.23.23 0 0 0-.28.15l-.89 3.33-1.75-.47.88-3.32a.23.23 0 0 0-.16-.28l-1.31-.35a.23.23 0 0 0-.28.15l-.9 3.33-3.73-1a.23.23 0 0 0-.27.16l-.36 1.33c-.03.12.04.25.16.28l.22.06a1.83 1.83 0 0 1 1.28 2.24l-1.9 7.09a1.83 1.83 0 0 1-2.07 1.33.23.23 0 0 0-.24.12l-.69 1.24a.23.23 0 0 0 0 .2c.02.07.07.12.14.13l3.67.99-.89 3.33c-.03.12.04.24.16.27l1.32.35c.12.03.24-.04.28-.16l.89-3.32 1.76.47-.9 3.33c-.02.12.05.24.16.27l1.32.35c.12.03.25-.04.28-.16l.9-3.32.87.23c2.74.74 4.83-.48 5.57-3.25.35-1.3-.05-2.6-.92-3.48zm-5.96-5.95l2.64.7a1.83 1.83 0 0 1 1.28 2.24 1.83 1.83 0 0 1-2.23 1.3l-2.64-.7.95-3.54zm1.14 9.8l-3.51-.95.95-3.54 3.51.94a1.83 1.83 0 0 1 1.28 2.24 1.83 1.83 0 0 1-2.23 1.3z" fill="#FFF"></path></g></svg>
							<h6>BTC</h6>	
							<input type="radio" name="a" checked>
						</label>
					</div>
					<div class="input-group mb-2">
						<span class="input-group-addon">BTC</span> <?php echo e(Form::number('btc_quality',null,array('id' => 'btc_input','class' => 'form-control'))); ?>

					</div>
					<div class="input-group mb-2">
						<span class="input-group-addon">NOVA</span> <?php echo e(Form::number('token_quality',null,array('id' => 'token_input','class' => 'form-control'))); ?>

					</div>
					<?php echo e(Form::close()); ?>

				</div>
			</div>
		</div>
	</div>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('footer_scripts'); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>