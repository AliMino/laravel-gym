<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Gym Management</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="{{asset('/bower_components/bootstrap/dist/css/bootstrap.min.css')}}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{asset('/bower_components/font-awesome/css/font-awesome.min.css')}}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="{{asset('/bower_components/Ionicons/css/ionicons.min.css')}}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('/dist/css/AdminLTE.min.css')}}">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="{{asset('/dist/css/skins/_all-skins.min.css')}}">

    <!-- Morris chart -->
    <link rel="stylesheet" href="{{asset('/bower_components/morris.js/morris.css')}}">
    <!-- jvectormap -->
    <link rel="stylesheet" href="{{asset('/bower_components/jvectormap/jquery-jvectormap.css')}}">
    <!-- Date Picker -->
    <link rel="stylesheet" href="{{asset('/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css')}}">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="{{asset('/bower_components/bootstrap-daterangepicker/daterangepicker.css')}}">
    <!-- bootstrap wysihtml5 - text editor -->
    <link rel="stylesheet" href="{{asset('/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css')}}">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https:////cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css" />
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- Google Font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
    <!-- DataTables -->
    <link rel="stylesheet" href="../../bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <link rel="stylesheet" href="../../bower_components/bootstrap-daterangepicker/daterangepicker.css">
    <!-- bootstrap datepicker -->
    <link rel="stylesheet" href="../../bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
    <!-- iCheck for checkboxes and radio inputs -->
    <link rel="stylesheet" href="../../plugins/iCheck/all.css">
    <!-- Bootstrap Color Picker -->
    <link rel="stylesheet" href="../../bower_components/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css">
    <!-- Bootstrap time Picker -->
    <link rel="stylesheet" href="../../plugins/timepicker/bootstrap-timepicker.min.css">
    <!-- Select2 -->
    <link rel="stylesheet" href="../../bower_components/select2/dist/css/select2.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../../dist/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="../../dist/css/skins/_all-skins.min.css">



    @yield('styles')

</head>
<body class="hold-transition skin-blue sidebar-mini">

<div class="wrapper">
    <header class="main-header">
        <!-- Logo -->
        <a href="{{ url('home') }}" class="logo">
            <!-- mini logo for sidebar mini 50x50 pixels -->
            <span class="logo-mini"><b>Gym</b></span>
            <!-- logo for regular state and mobile devices -->
            <span class="logo-lg"><b>Gym</b>System</span>
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top">
            <!-- Sidebar toggle button-->
            <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                <span class="sr-only">Toggle navigation</span>
            </a>

            <div class="navbar-custom-menu" style="margin-right:0%">
                <ul class="nav navbar-nav">
                    @if(auth()->user() == null)
                        <li>
                            <a href="{{route('login')}}">
                                <span>login</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{route('register')}}">
                                <span>register</span>
                            </a>
                        </li>
                    @else
                        <li>
                            <form method="POST" action="/logout">
                                @csrf
                                <input type="submit" value="logout" class="btn btn-dark">
                            </form>
                        </li>
                    @endif
                </ul>
            </div>
        </nav>
    </header>
    <!-- Left side column. contains the logo and sidebar -->
    <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
            <!-- Sidebar user panel -->
            <div class="user-panel">
                <div class="pull-left image">
                    <img src="" class="img-circle" >
                </div>
                <div class="pull-left info">
                    <p>Welcome
                        <a href="{{route('users.show',\Auth::user()->id)}}">
                            @if(auth()->user() !== null)
                                {{auth()->user()->name}}
                            @else
                                Guest
                            @endif
                        </a>
                    </p>
                </div>
            </div>


            <ul class="sidebar-menu" data-widget="tree">
                <li class="header">MAIN NAVIGATION</li>
                
                @if(auth()->user() && auth()->user()->can('manage city managers'))
                <li class="treeview">
                    <a href="{{route('citymanagers.index')}}" target="_blank">
                        <i class="fas fa-user-tie"></i>
                        <span>​City Managers</span>
                    </a>
                </li>
                @endif

                @if(auth()->user() && auth()->user()->can('manage gym managers'))
                <li class="treeview">
                    <a href="{{route('gymmanagers.index')}}">
                        <i class="fas fa-user-secret"></i>
                        <span>Gym Managers</span>
                    </a>
                </li>
                @endif

                @if(auth()->user() && auth()->user()->can('manage users'))
                <li>
                    <a href="/users">
                        <i class="far fa-address-card"></i>
                        <span>Users</span>
                    </a>
                </li>
                @endif

                @if(auth()->user() && auth()->user()->can('manage cities'))
                <li>
                    <a href="{{route('cities.index')}}">
                        <i class="fas fa-city"></i>
                        <span>Cities</span>
                    </a>
                </li>
                @endif

                @if(auth()->user() && auth()->user()->can('manage gyms'))
                <li class="treeview">
                    <a href="{{route('gyms.index')}}">
                        <i class="fas fa-dumbbell"></i>
                        <span>Gyms</span>
                    </a>
                </li>
                @endif

                @if(auth()->user() && auth()->user()->can('manage training packages'))
                <li class="treeview">
                    <a href="{{route('packages.index')}}">
                        <i class="fas fa-people-carry"></i>
                        <span>Training Packages</span>
                    </a>
                </li>
                @endif

                @if(auth()->user() && auth()->user()->can('manage coaches'))
                    <li>
                        <a href="{{route('coaches.index')}}">
                            <i class="far fa-hand-point-right"></i>
                            <span>Coaches</span>
                        </a>
                    </li>
                @endif

                @if(auth()->user() && auth()->user()->can('manage coaches'))
                    <li>
                        <a href="{{route('sessions.index')}}">
                            <i class="far fa-hand-point-right"></i>
                            <span>Sessions</span>
                        </a>
                    </li>
                @endif

                @if(auth()->user() && auth()->user()->can('manage attendance'))
                <li>
                    <a href="{{route('attendance.index')}}">
                        <i class="fas fa-edit"></i>
                        <span>Attendance</span>
                    </a>
                </li>
                @endif

                @if(auth()->user() && auth()->user()->can('manage training packages'))
                <li>
                    <a href="{{route('payment.create')}}">
                        <i class="fab fa-stripe"></i>

                        <span>BuyPackage</span>
                    </a>
                </li>
                @endif

                @if(auth()->user() && auth()->user()->can('manage revenue'))
                <li class="treeview">
                    <a href="{{route('revenue.index')}}">
                        <i class="fas fa-chart-line"></i>
                        <span>Revenue</span>
                    </a>
                </li>
                @endif

            </ul>
        </section>
        <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- content -->
        <section class="content">
            @yield('content')
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

</div>
        <!-- ./wrapper -->

        <!-- jQuery 3 -->
        <script src="{{ asset('bower_components/jquery/dist/jquery.min.js')}}"></script>
        <!-- jQuery UI 1.11.4 -->
        <script src="{{ asset('bower_components/jquery-ui/jquery-ui.min.js')}}"></script>
        <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
        <script>
            $.widget.bridge('uibutton', $.ui.button);
        </script>
        <!-- Bootstrap 3.3.7 -->
        <script src="{{ asset('bower_components/bootstrap/dist/js/bootstrap.min.js')}}"></script>
        <!-- Morris.js charts -->
        <script src="{{asset('bower_components/raphael/raphael.min.js')}}"></script>
        <script src="{{asset('/bower_components/morris.js/morris.min.js')}}"></script>
        <!-- Sparkline -->
        <script src="{{asset('bower_components/jquery-sparkline/dist/jquery.sparkline.min.js')}}"></script>
        <!-- jvectormap -->
        <script src="{{asset('plugins/jvectormap/jquery-jvectormap-1.2.2.min.js')}}"></script>
        <script src="{{asset('plugins/jvectormap/jquery-jvectormap-world-mill-en.js')}}"></script>
        <!-- jQuery Knob Chart -->
        <script src="{{asset('bower_components/jquery-knob/dist/jquery.knob.min.js')}}"></script>
        <!-- daterangepicker -->
        <script src="{{asset('bower_components/moment/min/moment.min.js')}}"></script>
        <script src="{{asset('bower_components/bootstrap-daterangepicker/daterangepicker.js')}}"></script>
        <!-- datepicker -->
        <script src="{{asset('bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js')}}"></script>
        <!-- Bootstrap WYSIHTML5 -->
        <script src="{{asset('plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js')}}"></script>
        <!-- Slimscroll -->
        <script src="{{asset('bower_components/jquery-slimscroll/jquery.slimscroll.min.js')}}"></script>
        <!-- FastClick -->
        <script src="{{asset('bower_components/fastclick/lib/fastclick.js')}}"></script>
        <!-- AdminLTE App -->
        <script src="{{asset('dist/js/adminlte.min.js')}}"></script>
        <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
        <script src="{{asset('dist/js/pages/dashboard.js')}}"></script>
        <!-- AdminLTE for demo purposes -->
        <script src="{{asset('dist/js/demo.js')}}"></script>
        <script src="https:////cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
        <!-- DataTables -->
        <script src="../../bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
        <script src="../../bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
        <!-- InputMask -->
            <script src="../../plugins/input-mask/jquery.inputmask.js"></script>
            <script src="../../plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
            <script src="../../plugins/input-mask/jquery.inputmask.extensions.js"></script>

            <script src={{asset('bower_components/select2/dist/js/select2.full.min.js')}}></script>





        <div class="content-wrapper">
            <!-- content -->
            <div>
            <section class="content">
                @yield('scripts')
            </section>
            <!-- /.content -->
        </div>
</body>
</html>
