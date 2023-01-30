<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Moltran - Responsive Admin Dashboard Template</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <link href="{{asset("admin/css/bootstrap.min.css")}}" rel="stylesheet"/>


    <link href="{{asset("admin/assets/font-awesome/css/font-awesome.min.css")}}" rel="stylesheet"/>
    <link href="{{asset("admin/assets/ionicon/css/ionicons.min.css")}}" rel="stylesheet"/>
    <link href="{{asset("admin/css/material-design-iconic-font.min.css")}}" rel="stylesheet">


    <link href="{{asset("admin/css/animate.css")}}" rel="stylesheet"/>


    <link href="{{asset("admin/css/waves-effect.css")}}" rel="stylesheet">


    <link href="{{asset("admin/assets/sweet-alert/sweet-alert.min.css")}}" rel="stylesheet">


    <link href="{{asset("admin/css/helper.css")}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset("admin/css/style.css")}}" rel="stylesheet" type="text/css"/>


    <script src="{{asset("admin/js/modernizr.min.js")}}"></script>

    {{--Font Awesome--}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"
          integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w=="
          crossorigin="anonymous" referrerpolicy="no-referrer"/>

    {{--Toaster--}}

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.3/css/bootstrap-grid.min.css" integrity="sha512-JQksK36WdRekVrvdxNyV3B0Q1huqbTkIQNbz1dlcFVgNynEMRl0F8OSqOGdVppLUDIvsOejhr/W5L3G/b3J+8w==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.css" integrity="sha512-oe8OpYjBaDWPt2VmSFR+qYOdnTjeV9QPLJUeqZyprDEQvQLJ9C5PCFclxwNuvb/GQgQngdCXzKSFltuHD3eCxA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js" integrity="sha512-STof4xm1wgkfm7heWqFJVn58Hm3EtS31XFaagaa8VMReCXAkQnJZ+jEy8PCC/iT18dFy95WcExNHFTqLyp72eQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.js" integrity="sha512-lbwH47l/tPXJYG9AcFNoJaTMhGvYWhVM9YI43CT+uteTRRaiLCui8snIgyAN8XWgNjNhCqlAUdzZptso6OCoFQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    {{--Bootstrap--}}
{{--    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css"--}}
{{--          integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">--}}
    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="fixed-left">
    <div id="wrapper">
        <!-- Authentication Links -->
        @guest
        @else
            <!-- Top Bar Start -->
            <div class="topbar">
                <!-- LOGO -->
                <div class="topbar-left">
                    <div class="text-center">
                        <a href="index.html" class="logo"><i class="md md-terrain"></i> <span>Moltran </span></a>
                    </div>
                </div>
                <!-- Button mobile view to collapse sidebar menu -->
                <div class="navbar navbar-default" role="navigation">
                    <div class="container">
                        <div class="">
                            <div class="pull-left">
                                <button class="button-menu-mobile open-left">
                                    <i class="fa fa-bars"></i>
                                </button>
                                <span class="clearfix"></span>
                            </div>
                            <form class="navbar-form pull-left" role="search">
                                <div class="form-group">
                                    <input type="text" class="form-control search-bar"
                                           placeholder="Type here for search...">
                                </div>
                                <button type="submit" class="btn btn-search"><i class="fa fa-search"></i></button>
                            </form>

                            <ul class="nav navbar-nav navbar-right pull-right">
                                <li class="dropdown hidden-xs">
                                    <a href="#" data-target="#" class="dropdown-toggle waves-effect waves-light"
                                       data-toggle="dropdown" aria-expanded="true">
                                        <i class="md md-notifications"></i> <span
                                            class="badge badge-xs badge-danger">3</span>
                                    </a>
                                    <ul class="dropdown-menu dropdown-menu-lg">
                                        <li class="text-center notifi-title">Notification</li>
                                        <li class="list-group">
                                            <!-- list item-->
                                            <a href="javascript:void(0);" class="list-group-item">
                                                <div class="media">
                                                    <div class="pull-left">
                                                        <em class="fa fa-user-plus fa-2x text-info"></em>
                                                    </div>
                                                    <div class="media-body clearfix">
                                                        <div class="media-heading">New user registered</div>
                                                        <p class="m-0">
                                                            <small>You have 10 unread messages</small>
                                                        </p>
                                                    </div>
                                                </div>
                                            </a>
                                            <!-- list item-->
                                            <a href="javascript:void(0);" class="list-group-item">
                                                <div class="media">
                                                    <div class="pull-left">
                                                        <em class="fa fa-diamond fa-2x text-primary"></em>
                                                    </div>
                                                    <div class="media-body clearfix">
                                                        <div class="media-heading">New settings</div>
                                                        <p class="m-0">
                                                            <small>There are new settings available</small>
                                                        </p>
                                                    </div>
                                                </div>
                                            </a>
                                            <!-- list item-->
                                            <a href="javascript:void(0);" class="list-group-item">
                                                <div class="media">
                                                    <div class="pull-left">
                                                        <em class="fa fa-bell-o fa-2x text-danger"></em>
                                                    </div>
                                                    <div class="media-body clearfix">
                                                        <div class="media-heading">Updates</div>
                                                        <p class="m-0">
                                                            <small>There are
                                                                <span class="text-primary">2</span> new updates
                                                                available</small>
                                                        </p>
                                                    </div>
                                                </div>
                                            </a>
                                            <!-- last list item -->
                                            <a href="javascript:void(0);" class="list-group-item">
                                                <small>See all notifications</small>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="hidden-xs">
                                    <a href="#" id="btn-fullscreen" class="waves-effect waves-light"><i
                                            class="md md-crop-free"></i></a>
                                </li>
                                <li class="hidden-xs">
                                    <a href="#" class="right-bar-toggle waves-effect waves-light"><i
                                            class="md md-chat"></i></a>
                                </li>
                                <li class="dropdown">
                                    <a href="" class="dropdown-toggle profile" data-toggle="dropdown"
                                       aria-expanded="true"><img src="{{asset("admin/images/avatar-1.jpg")}}"
                                                                 alt="user-img"
                                                                 class="img-circle"> </a>
                                    <ul class="dropdown-menu">
                                        <li><a href="javascript:void(0)"><i class="md md-face-unlock"></i> Profile</a>
                                        </li>
                                        <li><a href="javascript:void(0)"><i class="md md-settings"></i> Settings</a>
                                        </li>
                                        <li><a href="javascript:void(0)"><i class="md md-lock"></i> Lock screen</a></li>
                                        <li><a href="{{route('logout')}}"
                                               onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();"
                                            ><i class="md md-settings-power"></i> Logout</a>
                                            <form id="logout-form" action="{{route('logout')}}" method="POST"
                                                  style="display: none">
                                                @csrf
                                            </form>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <!--/.nav-collapse -->
                    </div>
                </div>
            </div>
            <!-- Top Bar End -->

            <!-- ========== Left Sidebar Start ========== -->
            <div class="left side-menu">
                <div class="sidebar-inner slimscrollleft">
                    <div class="user-details">
                        <div class="pull-left">
                            <img src="{{asset("admin/images/users/avatar-1.jpg")}}" alt="" class="thumb-md img-circle">
                        </div>
                        <div class="user-info">
                            <div class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown"
                                   aria-expanded="false">{{Auth::user()->name}}<span class="caret"></span></a>
                                <ul class="dropdown-menu">
                                    <li><a href="javascript:void(0)"><i class="md md-face-unlock"></i> Profile
                                            <div class="ripple-wrapper"></div>
                                        </a></li>
                                    <li><a href="javascript:void(0)"><i class="md md-settings"></i> Settings</a></li>
                                    <li><a href="javascript:void(0)"><i class="md md-lock"></i> Lock screen</a></li>
                                    <li><a href="{{route('logout')}}"
                                           onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();"
                                        ><i class="md md-settings-power"></i> Logout</a>
                                        <form id="logout-form" action="{{route('logout')}}" method="POST"
                                              style="display: none">
                                            @csrf
                                        </form>
                                    </li>
                                </ul>
                            </div>

                            <p class="text-muted m-0">Administrator</p>
                        </div>
                    </div>
                    <!--- Divider -->
                    <div id="sidebar-menu">
                        <ul>
                            <li>
                                <a href="{{route('home')}}" class="waves-effect active"><i class="md md-home"></i><span> Dashboard </span></a>
                            </li>
                            <li>
                                <a href="{{route('pos.index')}}" class="waves-effect active"><i class="md md-home"></i><span> POS </span></a>
                            </li>

                            <li class="has_sub">
                                <a href="#" class="waves-effect"><i class="fa-solid fa-users"></i></i><span> Employees </span><span
                                        class="pull-right"><i class="md md-add"></i></span></a>
                                <ul class="list-unstyled">
                                    <li>
                                        <a href="{{route('employees.create')}}"><i class="fa-solid fa-user-plus"></i></i> Add
                                            Employee</a>
                                    </li>
                                    <li>
                                        <a href="{{route('employees.index')}}"><i class="fa-solid fa-users"></i> All
                                            Employee</a>
                                    </li>

                                </ul>
                            </li>

                            <li class="has_sub">
                                <a href="#" class="waves-effect"><i class="fa-sharp fa-solid fa-users"></i></i><span> Customers </span><span
                                        class="pull-right"><i class="md md-add"></i></span></a>
                                <ul class="list-unstyled">
                                    <li>
                                        <a href="{{route('customer.create')}}"><i class="fa-solid fa-user-plus"></i></i> Add
                                            Customer</a>
                                    </li>
                                    <li>
                                        <a href="{{route('customer.index')}}"><i class="fa-solid fa-users"></i> All
                                            Customers</a>
                                    </li>

                                </ul>
                            </li>

                            <li class="has_sub">
                                <a href="#" class="waves-effect"><i class="fa-solid fa-truck-field-un"></i><span> Supplier </span><span
                                        class="pull-right"><i class="md md-add"></i></span></a>
                                <ul class="list-unstyled">
                                    <li>
                                        <a href="{{route('supplier.index')}}"><i class="fa-solid fa-user-plus"></i></i> All
                                            Supplier</a>
                                    </li>
                                    <li>
                                        <a href="{{route('supplier.create')}}"><i class="fa-solid fa-users"></i> Add
                                            Supplier</a>
                                    </li>

                                </ul>
                            </li>

                            <li class="has_sub">
                                <a href="#" class="waves-effect"><i class="fa-solid fa-sack-dollar"></i><span> Salary (EMP) </span><span
                                        class="pull-right"><i class="md md-add"></i></span></a>
                                <ul class="list-unstyled">
                                    <li>
                                        <a href="{{route('salaries.create')}}"><i class="fa-solid fa-money-check-dollar"></i> Add Advance
                                            Salary</a>
                                    </li>
                                    <li>
                                        <a href="{{route('salaries.index')}}"><i class="fa-solid fa-money-bill-wheat"></i></i> All Advance
                                            Salary</a>
                                    </li>
                                    <li>
                                        <a href="{{route('pay_salaries.index')}}"><i class="fa-solid fa-user"></i> Pay Salary</a>
                                    </li>
                                    <li>
                                        <a href="{{route('salaries.index')}}"><i class="fa-solid fa-users"></i> Last Month salary</a>
                                    </li>

                                </ul>
                            </li>

                            <li class="has_sub">
                                <a href="#" class="waves-effect"><i class="fa-solid fa-parachute-box"></i><span> Category </span><span
                                        class="pull-right"><i class="md md-add"></i></span></a>
                                <ul class="list-unstyled">
                                    <li>
                                        <a href="{{route('categories.index')}}"><i class="fa-solid fa-parachute-box"></i> <span>All Categories</span></a>
                                    </li>

                                </ul>
                            </li>

                            <li class="has_sub">
                                <a href="#" class="waves-effect"><i class="fa-solid fa-truck-fast"></i><span> Products </span><span
                                        class="pull-right"><i class="md md-add"></i></span></a>
                                <ul class="list-unstyled">
                                    <li>
                                        <a href="{{route('products.index')}}"><i class="fa-solid fa-truck-fast"></i> All Products</a>
                                    </li>
                                    <li>
                                        <a href="{{route('products.create')}}"><i class="fa-solid fa-truck-fast"></i>Add Product</a>
                                    </li>
                                    <li>
                                        <a href="{{route('product.massInput')}}"><i class="fa-solid fa-truck-fast"></i>Import Product</a>
                                    </li>

                                </ul>
                            </li>

                            <li class="has_sub">
                                <a href="#" class="waves-effect"><i class="fa-solid fa-truck-fast"></i><span> Orders </span><span
                                        class="pull-right"><i class="md md-add"></i></span></a>
                                <ul class="list-unstyled">
                                    <li>
                                        <a href="{{route('approve.order')}}"><i class="fa-solid fa-truck-fast"></i> Approve Orders</a>
                                    </li>
                                    <li>
                                        <a href="{{route('orders.index')}}"><i class="fa-solid fa-truck-fast"></i>Pending Orders</a>
                                    </li>


                                </ul>
                            </li>

                            <li class="has_sub">
                                <a href="#" class="waves-effect"><i class="fa-solid fa-dollar-sign"></i><span> Expense </span><span
                                        class="pull-right"><i class="md md-add"></i></span></a>
                                <ul class="list-unstyled">
                                    <li>
                                        <a href="{{route('expenses.create')}}"><i class="fa-solid fa-dollar-sign"></i> Add New</a>
                                    </li>
                                    <li>
                                        <a href="{{route('expenses.index')}}"><i class="fa-solid fa-dollar-sign"></i> All Expense</a>
                                    </li>
                                    <li>
                                        <a href="{{route('expenses.month')}}"><i class="fa-solid fa-dollar-sign"></i> Monthly Expense</a>
                                    </li>
                                    <li>
                                        <a href="{{route('expenses.year')}}"><i class="fa-solid fa-dollar-sign"></i> Yearly Expense</a>
                                    </li>

                                </ul>
                            </li>

                            <li class="has_sub">
                                <a href="#" class="waves-effect"><i class="fa-solid fa-dollar-sign"></i><span> Attendance </span><span
                                        class="pull-right"><i class="md md-add"></i></span></a>
                                <ul class="list-unstyled">
                                    <li>
                                        <a href="{{route('attendance.create')}}"><i class="fa-solid fa-dollar-sign"></i> Take Attendance</a>
                                    </li>
                                    <li>
                                        <a href="{{route('attendance.index')}}"><i class="fa-solid fa-dollar-sign"></i>Today's Attendance</a>
                                    </li>
                                </ul>
                            </li>

                            <li class="has_sub">
                                <a href="#" class="waves-effect"><i class="fa-solid fa-gear"></i><span> Setting </span><span
                                        class="pull-right"></span></a>
                                <ul class="list-unstyled">
                                    <li>
                                        <a href="{{route('settings.create')}}"><i class="fa-solid fa-gear"></i> Create Setting</a>
                                    </li>
                                    <li>
                                        <a href="{{route('setting.show')}}"><i class="fa-solid fa-gear"></i> Update Setting</a>
                                    </li>
                                </ul>
                            </li>


                        </ul>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
            <!-- Left Sidebar End -->
        @endguest
        <main class="py-4">
            @yield('content')
        </main>
    </div>

<footer class="footer text-right position-fixed" style="position: fixed">
    2023 @ Molt ran
</footer>

<script>
    var resizefunc = [];
</script>

<!-- jQuery  -->
<script src="{{asset("admin/js/jquery.min.js")}}"></script>
<script src="{{asset("admin/js/bootstrap.min.js")}}"></script>
<script src="{{asset("admin/js/waves.js")}}"></script>
<script src="{{asset("admin/js/wow.min.js")}}"></script>
<script src="{{asset("admin/js/jquery.nicescroll.js")}}" type="text/javascript"></script>
<script src="{{asset("admin/js/jquery.scrollTo.min.js")}}"></script>
<script src="{{asset("admin/assets/chat/moment-2.2.1.js")}}"></script>
<script src="{{asset("admin/assets/jquery-sparkline/jquery.sparkline.min.js")}}"></script>
<script src="{{asset("admin/assets/jquery-detectmobile/detect.js")}}"></script>
<script src="{{asset("admin/assets/fastclick/fastclick.js")}}"></script>
<script src="{{asset("admin/assets/jquery-slimscroll/jquery.slimscroll.js")}}"></script>
<script src="{{asset("admin/assets/jquery-blockui/jquery.blockUI.js")}}"></script>

<!-- sweet alerts -->
<script src="{{asset("admin/assets/sweet-alert/sweet-alert.min.js")}}"></script>
<script src="{{asset("admin/assets/sweet-alert/sweet-alert.init.js")}}"></script>

<!-- flot Chart -->
<script src="{{asset("admin/assets/flot-chart/jquery.flot.js")}}"></script>
<script src="{{asset("admin/assets/flot-chart/jquery.flot.time.js")}}"></script>
<script src="{{asset("admin/assets/flot-chart/jquery.flot.tooltip.min.js")}}"></script>
<script src="{{asset("admin/assets/flot-chart/jquery.flot.resize.js")}}"></script>
<script src="{{asset("admin/assets/flot-chart/jquery.flot.pie.js")}}"></script>
<script src="{{asset("admin/assets/flot-chart/jquery.flot.selection.js")}}"></script>
<script src="{{asset("admin/assets/flot-chart/jquery.flot.stack.js")}}"></script>
<script src="{{asset("admin/assets/flot-chart/jquery.flot.crosshair.js")}}"></script>

{{--Toaster--}}




<!-- Counter-up -->
<script src="{{asset("admin/assets/counterup/waypoints.min.js")}}" type="text/javascript"></script>
<script src="{{asset("admin/assets/counterup/jquery.counterup.min.js")}}" type="text/javascript"></script>

<!-- CUSTOM JS -->
<script src="{{asset("admin/js/jquery.app.js")}}"></script>

<!-- Dashboard -->
<script src="{{asset("admin/js/jquery.dashboard.js")}}"></script>

<!-- Chat -->
<script src="{{asset("admin/js/jquery.chat.js")}}"></script>

<!-- Todo -->
<script src="{{asset("admin/js/jquery.todo.js")}}"></script>

<script type="{{asset("admin/text/javascript")}}"></script>

<script>
    jQuery(document).ready(function ($) {
        $('.counter').counterUp({
            delay: 100,
            time: 1200
        });
    });
</script>


{{--<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js"--}}
{{--        integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V"--}}
{{--        crossorigin="anonymous"></script>--}}
<script>
    @if(\Illuminate\Support\Facades\Session::has('message'))
    var type = "{{\Illuminate\Support\Facades\Session::get('alert-type','info')}}"
    console.log(type);

    switch (type) {
        case 'info':
            toastr.info("{{\Illuminate\Support\Facades\Session::get('message')}}");
            toastr.options={
                "closeButton" : true,
                "progressBar" : true
            };
            break;
        case 'success':
            toastr.success("{{\Illuminate\Support\Facades\Session::get('message')}}");
            toastr.options={
               "closeButton" : true,
                "progressBar" : true
            };
            break;
        case 'error':
            toastr.error("{{\Illuminate\Support\Facades\Session::get('message')}}");
            toastr.options={
                "closeButton" : true,
                "progressBar" : true
            };
            break;
    }

    @endif
</script>
</body>
</html>
