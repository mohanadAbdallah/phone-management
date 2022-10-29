<!-- Main sidebar -->

<style>
    .sidebar-dark .nav-sidebar>.nav-item-open>.nav-link:not(.disabled), .sidebar-dark .nav-sidebar>.nav-item>.nav-link.active, .sidebar-light .card[class*=bg-]:not(.bg-light):not(.bg-white):not(.bg-transparent) .nav-sidebar>.nav-item-open>.nav-link:not(.disabled), .sidebar-light .card[class*=bg-]:not(.bg-light):not(.bg-white):not(.bg-transparent) .nav-sidebar>.nav-item>.nav-link.active {
        background-color: #ffffff;
        color: #858aca;
    }
    .menu-link:active{
        background-color: #ffffff;
    }
    .font-size-lg  nav-link  nav-link active {
        transition: color 0.2s ease, background-color 0.2s ease;
        background-color: rgb(248, 93, 93);
        color: #7a2c2c;
    }
    .aside-dark .menu .menu-item .menu-link.active .menu-title {
        color: #c90000;
    }
    .aside-dark .menu .menu-item .menu-link .menu-title {
        color: #bf0000;
    }
</style>
<div class="sidebar sidebar-dark sidebar-main sidebar-expand-md" style="background-color: #1a1a1a">

    <!-- Sidebar mobile toggler -->
    <div class="sidebar-mobile-toggler text-center">
        <a href="#" class="sidebar-mobile-main-toggle">
            <i class="icon-arrow-right8"></i>
        </a>
        Navigation
        <a href="#" class="sidebar-mobile-expand">
            <i class="icon-screen-full"></i>
            <i class="icon-screen-normal"></i>
        </a>
    </div>
    <!-- /sidebar mobile toggler -->


    <!-- Sidebar content -->
    <div class="sidebar-content" style="background-color: #1a1a1a">

        <!-- User menu -->
        <div class="sidebar-user mb-2">
            <div class="card-body">
                <div class="media">

                </div>
            </div>
        </div>
        <!-- /user menu -->


        <!-- Main navigation -->
        <div class="card card-sidebar-mobile">
            <ul class="nav nav-sidebar" data-nav-type="accordion">

                <!-- Main -->
                <li class="nav-item-header mb-3"><div class="text-uppercase font-size-lg  line-height-xs">@lang('app.dashboard')</div> <i class="icon-menu" title="Main"></i></li>
                <li class="nav-item">
                    <a href="{{route('home')}}" class=" font-size-lg  nav-link  {{request()->routeIs('home')?'nav-link active' :'' }}"  >
                        <i class="icon-home4"></i>
                        <span>@lang('app.dashboard')</span>
                    </a>
                </li>

                @role('User')
                <li class="nav-item" >
                    <a href="{{route('mobiles.index')}}" class="font-size-lg  nav-link {{request()->routeIs('mobiles.*')?'nav-link active' :'' }}"><i class="icon-mobile"></i><span>@lang('app.premiums')</span></a>
                </li>

                <li class="nav-item">
                    <a href="{{route('customers.index')}}" class=" font-size-lg nav-link {{request()->routeIs('customers.*')?'nav-link active' :'' }}"><i class="icon-user"></i> <span>@lang('app.customers')</span></a>
                </li>
                <li class="nav-item">
                    <a href="{{route('payments.required')}}" class=" font-size-lg nav-link {{request()->routeIs('payments.*')?'nav-link active' :'' }}"><i class="icon-user"></i> <span>@lang('app.required_premium')</span></a>
                </li>
                <li class="nav-item">
                    <a href="{{route('mobile.expired')}}" class=" font-size-lg nav-link {{request()->routeIs('mobile.expired')?'nav-link active' :'' }}"><i class="icon-user"></i> <span>@lang('app.expired_mobile')</span></a>
                </li>
                <li class="nav-item" >

                    <a href="{{route('setting.warning')}}" class="font-size-lg  nav-link {{request()->routeIs('setting.warning')?'nav-link active' :'' }}"><i class="icon-alert"></i><span>@lang('app.Warnings')</span></a>
                </li>
                @endrole
                @role('Super_Admin')
                <li class="nav-item" >
                    <a href="{{route('users.index')}}" class="font-size-lg  nav-link {{request()->routeIs('users.*')?'nav-link active' :'' }}"><i class="icon-users4"></i><span>@lang('app.manege_users')</span></a>
                </li>
                <li class="nav-item">
                    <a href="{{route('roles.index')}}" class="font-size-lg  nav-link {{request()->routeIs('roles.*')?'nav-link active' :'' }}"><i class="icon-lock2"></i> <span>@lang('app.roles')</span></a>
                </li>
                @endrole
                <li class="nav-item" >

                    <a href="{{route('show.profile')}}" class="font-size-lg  nav-link {{request()->routeIs('show.profile')?'nav-link active' :'' }}"><i class="icon-gear"></i><span>@lang('app.settings')</span></a>
                </li>




            </ul>

        </div>
        <!-- /main navigation -->

    </div>
    <!-- /sidebar content -->

</div>

<!-- /main sidebar -->
