<!-- ========== Left Sidebar Start ========== -->
<div class="vertical-menu">

    <!-- LOGO -->
    <div class="navbar-brand-box">
        <a href="{{ url('index') }}" class="logo logo-dark">
            {{-- <span class="logo-sm app-brand-text demo menu-text fw-bolder ms-2">
                <img src="" alt="" height="22">
            </span> --}}

            <span class="logo-sm">
                <img src="{{ URL::asset('/assets/my-img/car-logo.png') }}" alt="" height="50">
            </span>

            <span class="logo-lg  ">

                {{-- <marquee behavior="scroll" direction="left" scrollamount="10" >
                    <img src="{{ URL::asset('/assets/my-img/car-logo.gif') }}" width="10%"></marquee> --}}
                <div class="app-brand justify-content-center bg-info rounded py-2" style="margin: 10% 14% 2% 4%">
                    <center><a href="https://abhcars.in/" class="app-brand-link gap-2">
                            <span class="app-brand-text demo text-body fw-semibold text-uppercase">
                                <img src="{{ URL::asset('/assets/my-img/ABH-logo.png') }}" width="100px"></span>
                        </a></center>
                </div>


                


            </span>
        </a>

        {{-- <a href="{{ url('index') }}" class="logo logo-light">
            <span class="logo-sm">
                <img src="" alt="" height="22">
            </span>
            <span class="logo-lg">
                <img src="" alt="" height="20">
            </span>
        </a> --}}
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
                <li>
                    <a href="{{ url('/cars-sold') }}" class="waves-effect">
                        <i class="uil-thumbs-up"></i>
                        <span>Sold Cars History</span>
                    </a>
                </li>
                <li>
                    <a href="{{ url('/search-cars') }}" class=" waves-effect">
                        <i class="uil-search"></i>
                        <span>Search Car</span>
                    </a>
                </li>
                @role('admin')
                    <li>
                        <a href="{{ url('/role') }}" class=" waves-effect">
                            <i class="uil-user"></i>
                            <span>Role</span>
                        </a>
                    </li>
                @endrole


            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>
<!-- Left Sidebar End -->
