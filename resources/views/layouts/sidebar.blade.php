<!-- ========== Left Sidebar Start ========== -->
<div class="vertical-menu">

    <!-- LOGO -->
    <div class="navbar-brand-box">
        <a href="{{ url('index') }}" class="logo logo-dark">
            <span class="logo-sm">
                <img src="{{ URL::asset('/assets/images/logo-sm.png') }}" alt="" height="22">
            </span>
            <span class="logo-lg">
                <img src="{{ URL::asset('/assets/images/logo-dark.png') }}" alt="" height="20">
            </span>
        </a>

        <a href="{{ url('index') }}" class="logo logo-light">
            <span class="logo-sm">
                <img src="{{ URL::asset('/assets/images/logo-sm.png') }}" alt="" height="22">
            </span>
            <span class="logo-lg">
                <img src="{{ URL::asset('/assets/images/logo-light.png') }}" alt="" height="20">
            </span>
        </a>
    </div>

    <button type="button" class="btn btn-sm px-3 font-size-16 header-item waves-effect vertical-menu-btn">
        <i class="fa fa-fw fa-bars"></i>
    </button>

    <div data-simplebar class="sidebar-menu-scroll">

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                <li class="menu-title">@lang('translation.Menu')</li>

                <li>
                    <a href="{{ url('/dashboard') }}">
                        <i class="uil-home-alt"></i>
                        <span>@lang('translation.Dashboard')</span>
                    </a>
                </li>
                <li>
                    <a href="{{ url('/dealer/' . Auth::user()->id) }}" target="_blank">
                        <i class="uil-globe"></i>
                        <span>View My WebPage</span>
                    </a>
                </li>



                <li class="menu-title">@lang('Data')</li>
                @can('view-dealers')
                    <li>
                        <a href="{{ url('/dealers') }}" class="waves-effect">
                            <i class="uil-user-check"></i>
                            <span>Dealers</span>
                        </a>
                    </li>
                @endcan
                @can('view-cars')
                    <li>
                        <a href="{{ url('/cars') }}" class=" waves-effect">
                            <i class="uil-car-sideview"></i>
                            <span>Cars</span>
                        </a>
                    </li>
                @endcan
                @can('view-enquiry')
                    <li>
                        <a href="{{ url('/enquiry') }}" class=" waves-effect">
                            <i class="uil-comment-alt-message"></i>
                            <span>Enquiry</span>
                        </a>
                    </li>
                @endcan
                @can('view-role')
                    <li>
                        <a href="{{ url('/role') }}" class=" waves-effect">
                            <i class="uil-user"></i>
                            <span>Role</span>
                        </a>
                    </li>
                @endcan
            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>
<!-- Left Sidebar End -->
