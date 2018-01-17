<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        {{-- CSRF Token --}}
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>@if (trim($__env->yieldContent('template_title')))@yield('template_title') | @endif {{ config('app.name', Lang::get('titles.app')) }}</title>
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
        {{-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries --}}
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
            <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->

        {{-- Fonts --}}
        @yield('template_linked_fonts')

        {{-- Styles --}}
        <link href="/css/app.css" rel="stylesheet">
        <link rel="stylesheet" href="/css/style.css" type="text/css" />
        @yield('template_linked_css')

        <style type="text/css">
            @yield('template_fastload_css')

            @if (Auth::User() && (Auth::User()->profile) && (Auth::User()->profile->avatar_status == 0))
                .user-avatar-nav {
                    background: url({{ Gravatar::get(Auth::user()->email) }}) 50% 50% no-repeat;
                    background-size: auto 100%;
                }
            @endif

        </style>

        {{-- Scripts --}}
        <script>
            window.Laravel = {!! json_encode([
                'csrfToken' => csrf_token(),
            ]) !!};
        </script

        @yield('head')

    </head>
    <body>

        <div class="app" id="app">
            @if(Auth::User())
            @include('partials.nav')
            @endif

            <div id="content" class="app-content box-shadow-4 box-radius-4" role="main">
                @include('partials.header')
                <div class="content-main " id="content-main">
                @include('partials.form-status')
                @yield('content')
                </div>
                @include('partials.footer')
            </div>

        </div>

        {{-- Scripts --}}
        <script src="{{ mix('/js/app.js') }}"></script>
        @yield('footer_scripts')
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
