<div class="content-header white  box-shadow-4" id="content-header">
  <div class="navbar navbar-expand-lg">
    <!-- btn to toggle sidenav on small screen -->
    <a class="d-lg-none mx-2" data-toggle="modal" data-target="#aside">
      <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 512 512"><path d="M80 304h352v16H80zM80 248h352v16H80zM80 192h352v16H80z"/></svg>
    </a>
    <!-- Page title -->
    <div class="navbar-text nav-title flex" id="pageTitle">@if (trim($__env->yieldContent('template_title')))@yield('template_title')@endif</div>

    <ul class="nav flex-row order-lg-2">
      <li>
    <a href="?bg=light" class="change-preset"><img src="/images/sun.png" title="switch to day mode"></a>
</li>
      <!-- User dropdown menu -->
      @if (!Auth::guest())
      <li class="dropdown d-flex align-items-center">
        <a href="#" data-toggle="dropdown" class="d-flex align-items-center">My Account</a>
        <div class="dropdown-menu dropdown-menu-right w pt-0 mt-2 animate fadeIn">
          <a class="dropdown-item mt-2" href="/token/buy">
              <span>Buy NOVA</span>
          </a>
          <a class="dropdown-item" href="{{url('/profile/'.Auth::user()->name)}}">
            <span>{{trans('titles.profile')}}</span>
          </a>

            <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="{{ route('logout') }}"
              onclick="event.preventDefault();
                       document.getElementById('logout-form').submit();">
              <span>{!! trans('titles.logout') !!}</span>
          </a>

          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
              {{ csrf_field() }}
          </form>

        </div>
      </li>
      @endif
      <!-- Navarbar toggle btn -->
      <li class="d-lg-none d-flex align-items-center">
        <a href="#" class="mx-2" data-toggle="collapse" data-target="#navbarToggler">
          <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 512 512"><path d="M64 144h384v32H64zM64 240h384v32H64zM64 336h384v32H64z"/></svg>
        </a>
      </li>
    </ul>
    <!-- Navbar collapse -->
  </div>
</div>
