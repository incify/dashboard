<!DOCTYPE html>
<html lang="<?php echo e(config('app.locale')); ?>">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        
        <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

        <title><?php if(trim($__env->yieldContent('template_title'))): ?><?php echo $__env->yieldContent('template_title'); ?> | <?php endif; ?> <?php echo e(config('app.name', Lang::get('titles.app'))); ?></title>
        <!-- for ios 7 style, multi-resolution icon of 152x152 -->
        <meta name="apple-mobile-web-app-capable" content="yes">
        <meta name="apple-mobile-web-app-status-barstyle" content="black-translucent">
        <link rel="apple-touch-icon" href="/images/logo.svg">
        <meta name="apple-mobile-web-app-title" content="Flatkit">
        <!-- for Chrome on Android, multi-resolution icon of 196x196 -->
        <meta name="mobile-web-app-capable" content="yes">
        <link rel="shortcut icon" sizes="196x196" href="/images/logo.svg">
        <link rel="stylesheet" href="/libs/font-awesome/css/font-awesome.min.css" type="text/css" />
        <link rel="stylesheet" href="/libs/bootstrap/dist/css/bootstrap.min.css" type="text/css" />
        
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
            <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->

        
        <?php echo $__env->yieldContent('template_linked_fonts'); ?>

        
        <link href="/css/app.css" rel="stylesheet">
        <link rel="stylesheet" href="/css/style.css" type="text/css" />
        <?php echo $__env->yieldContent('template_linked_css'); ?>

        <style type="text/css">
            <?php echo $__env->yieldContent('template_fastload_css'); ?>

            <?php if(Auth::User() && (Auth::User()->profile) && (Auth::User()->profile->avatar_status == 0)): ?>
                .user-avatar-nav {
                    background: url(<?php echo e(Gravatar::get(Auth::user()->email)); ?>) 50% 50% no-repeat;
                    background-size: auto 100%;
                }
            <?php endif; ?>

        </style>

        
        <script>
            window.Laravel = <?php echo json_encode([
                'csrfToken' => csrf_token(),
            ]); ?>;
        </script>

        <?php if(Auth::User() && (Auth::User()->profile) && $theme->link != null && $theme->link != 'null'): ?>
            <link rel="stylesheet" type="text/css" href="<?php echo e($theme->link); ?>">
        <?php endif; ?>

        <?php echo $__env->yieldContent('head'); ?>

    </head>
    <body>

        <div class="app" id="app">

            <?php echo $__env->make('partials.nav', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

            <div id="content" class="app-content box-shadow-4 box-radius-4" role="main">
                <?php echo $__env->make('partials.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                <div class="content-main " id="content-main">
                <?php echo $__env->make('partials.form-status', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                <?php echo $__env->yieldContent('content'); ?>
                </div>
                <?php echo $__env->make('partials.footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            </div>

        </div>

        
        <script src="<?php echo e(mix('/js/app.js')); ?>"></script>
        <?php echo $__env->yieldContent('footer_scripts'); ?>
        <!-- jQuery -->
          <script src="/libs/jquery/dist/jquery.min.js"></script>
        <!-- Bootstrap -->
          <script src="/libs/popper.js/dist/umd/popper.min.js"></script>
          <script src="/libs/bootstrap/dist/js/bootstrap.min.js"></script>
        <!-- core -->
          <script src="/libs/pace-progress/pace.min.js"></script>
          <script src="/libs/pjax/pjax.js"></script>

          <script src="/scripts/lazyload.config.js"></script>
          <script src="/scripts/lazyload.js"></script>
          <script src="/scripts/plugin.js"></script>
          <script src="/scripts/nav.js"></script>
          <script src="/scripts/scrollto.js"></script>
          <script src="/scripts/toggleclass.js"></script>
          <script src="/scripts/theme.js"></script>
          <script src="/scripts/ajax.js"></script>
          <script src="/scripts/app.js"></script>
    </body>
</html>
