<?php $__env->startSection('content'); ?>
<div class="py-5 text-center w-100">
  <div class="mx-auto w-xxl w-auto-xs">
    <div class="px-3">
      <div>
        <?php echo $__env->make('partials.socials-icons', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
      </div>
      <div class="my-3 text-sm">OR</div>
      <form class="form" role="form" method="POST" action="<?php echo e(route('login')); ?>">
          <?php echo e(csrf_field()); ?>

        <div class="form-group">
          <input id="email" type="email" class="form-control" name="email" value="<?php echo e(old('email')); ?>" required autofocus>
          <?php if($errors->has('email')): ?>
              <span class="help-block">
                  <strong><?php echo e($errors->first('email')); ?></strong>
              </span>
          <?php endif; ?>
        </div>
        <div class="form-group">
            <input id="password" type="password" class="form-control" name="password" required>
        </div>
        <div class="mb-3">
          <label class="md-check"><input type="checkbox" name="remember" <?php echo e(old('remember') ? 'checked' : ''); ?>><i class="primary"></i> Keep me signed in</label>
        </div>
        <button type="submit" class="btn primary">Sign in</button>
      </form>
      <div class="my-4">
        <a href="<?php echo e(route('password.request')); ?>" class="text-primary _600">Forgot password?</a>
      </div>
      <div>
        Do not have an account? <a href="/register" class="text-primary _600">Sign up</a>
      </div>
    </div>
  </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>