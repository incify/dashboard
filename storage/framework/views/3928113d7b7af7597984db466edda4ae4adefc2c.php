<?php $__env->startSection('content'); ?>
<div class="py-5 text-center w-100">
  <div class="mx-auto w-xxl w-auto-xs">
    <div class="px-3">
      <div>
        <?php echo $__env->make('partials.socials-icons', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
      </div>
      <div class="my-3 text-sm">OR</div>
        <?php echo Form::open(['route' => 'register', 'class' => 'form text-left', 'role' => 'form', 'method' => 'POST'] ); ?>

          <?php echo e(csrf_field()); ?>

          <div class="form-group<?php echo e($errors->has('name') ? ' has-error' : ''); ?>">
                <?php echo Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Username', 'id' => 'name', 'required', 'autofocus']); ?>

                <?php if($errors->has('name')): ?>
                    <span class="help-block">
                        <strong><?php echo e($errors->first('name')); ?></strong>
                    </span>
                <?php endif; ?>
          </div>
          <div class="form-group<?php echo e($errors->has('first_name') ? ' has-error' : ''); ?>">
              <?php echo Form::text('first_name', null, ['class' => 'form-control', 'placeholder' => 'First Name', 'id' => 'first_name']); ?>

              <?php if($errors->has('first_name')): ?>
                  <span class="help-block">
                      <strong><?php echo e($errors->first('first_name')); ?></strong>
                  </span>
              <?php endif; ?>
          </div>

          <div class="form-group<?php echo e($errors->has('last_name') ? ' has-error' : ''); ?>">
              <?php echo Form::text('last_name', null, ['class' => 'form-control', 'placeholder' => 'Last Name', 'id' => 'last_name']); ?>

              <?php if($errors->has('last_name')): ?>
                  <span class="help-block">
                      <strong><?php echo e($errors->first('last_name')); ?></strong>
                  </span>
              <?php endif; ?>
          </div>

          <div class="form-group<?php echo e($errors->has('email') ? ' has-error' : ''); ?>">
              <?php echo Form::email('email', null, ['class' => 'form-control', 'id' => 'email', 'placeholder' => 'E-Mail Address', 'required']); ?>

              <?php if($errors->has('email')): ?>
                  <span class="help-block">
                      <strong><?php echo e($errors->first('email')); ?></strong>
                  </span>
              <?php endif; ?>
          </div>

          <div class="form-group<?php echo e($errors->has('password') ? ' has-error' : ''); ?>">
              <?php echo Form::password('password', ['class' => 'form-control', 'id' => 'password', 'placeholder' => 'Password', 'required']); ?>

              <?php if($errors->has('password')): ?>
                  <span class="help-block">
                      <strong><?php echo e($errors->first('password')); ?></strong>
                  </span>
              <?php endif; ?>
          </div>

          <div class="form-group">
              <?php echo Form::password('password_confirmation', ['class' => 'form-control', 'id' => 'password-confirm', 'placeholder' => 'Confirm Password', 'required']); ?>

          </div>
          <?php if(config('settings.reCaptchStatus')): ?>
              <div class="form-group">
                  <div class="g-recaptcha" data-sitekey="<?php echo e(env('RE_CAP_SITE')); ?>"></div>
              </div>
          <?php endif; ?>
          <div class="mb-3 text-sm text-center"><span class="text-muted">By clicking Sign Up, I agree to the</span> <a href="#" data-pjax-click-state="anchor-empty">Terms of service</a> <span class="text-muted">and</span> <a href="#">Policy Privacy.</a></div>
        <p class="text-center">
          <button type="submit" class="btn primary">Register</button>
        </p>
      <?php echo Form::close(); ?>

      <div class="py-4 text-center"><div>Already have an account? <a href="/login" class="text-primary _600">Sign in</a></div></div>
    </div>
  </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('footer_scripts'); ?>

    <script src='https://www.google.com/recaptcha/api.js'></script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>