<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>Admin | @yield('title')</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport" />
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="{{url('admin/')}}/css/bootstrap.min.css" />
    <link rel="stylesheet" href="{{url('admin/')}}/css/font-awesome.min.css" />
    <link rel="stylesheet" href="{{url('admin/')}}/css/AdminLTE.css" />
    <link rel="stylesheet" href="{{url('admin/')}}/css/_all-skins.min.css" />
    <link rel="stylesheet" href="{{url('admin/')}}/css/style.css" />
    @yield('css')

</head>

<body class="hold-transition skin-blue sidebar-mini">
    <!-- <h2>{{url('admin/')}}</h2> -->
    <!-- Site wrapper -->
    <div class="wrapper">
        <header class="main-header">
            <!-- Logo -->
            <a href="" class="logo">
                <!-- mini logo for sidebar mini 50x50 pixels -->
                <span class="logo-mini"><b>A</b>LT</span>
                <!-- logo for regular state and mobile devices -->
                <span class="logo-lg"><b>Admin</b>LTE</span>
            </a>
            <!-- Header Navbar: style can be found in header.less -->
            <nav class="navbar navbar-static-top">
                <!-- Sidebar toggle button-->
                <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </a>

                <ul class="nav navbar-nav navbar-right" style="margin-right: 10px">
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Hi {{Auth::user()->name}} <b
                                class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li><a href="#">Thông tin</a></li>
                            <li><a href="{{route('logout')}}">Thoát tài khoản</a></li>
                        </ul>
                    </li>
                </ul>
            </nav>
        </header>

        <?php $menus = config('menu'); ?>

        <aside class="main-sidebar">
            <section class="sidebar">
                <ul class="sidebar-menu" data-widget="tree">
                    @foreach($menus as $m)
                    <?php $class =! empty($m['items']) ? 'treeview' : ''; ?>
                    <li class="{{$class}}">
                        <a href="{{Route::has($m['route']) ? route($m['route']) : '#' }}">
                            <i class="fa {{$m['icon']}}"></i> <span>{{$m['name']}}</sapn>
                                @if(!empty($m['items']))
                                <span class="pull-right-container">
                                    <i class="fa fa-angle-left pull-right"></i>
                                </span>
                                @endif
                        </a>
                        @if(!empty($m['items']))
                        <ul class="treeview-menu">
                            @foreach($m['items'] as $mc)
                            <li><a href="{{Route::has($mc['route']) ? route($mc['route']) : '#'}}">
                                    <i class="fa {{$mc['icon']}}"></i> {{$mc['name']}}

                                </a></li>
                            @endforeach
                        </ul>
                        @endif
                    </li>
                    @endforeach
                </ul>
            </section>
        </aside>

        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1>
                    @yield('title')
                </h1>
                <!-- <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Examples</a></li>
        <li class="active">Blank page</li>
      </ol> -->
            </section>

            <!-- Main content -->
            <section class="content">
                <!-- Default box -->
                <div class="box">
                    <div class="box-header with-border"></div>
                    <div class="box-body">@yield('main')</div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

        <footer class="main-footer">
            <div class="pull-right hidden-xs"><b>Version</b> 2.4.0</div>
            <strong>Copyright &copy; 2014-2016
                <a href="https://adminlte.io">Almsaeed Studio</a>.</strong>
            All rights reserved.
        </footer>
    </div>
    <!-- ./wrapper -->

    <!-- jQuery 3 -->

    <script src="{{url('admin/')}}/js/jquery.min.js"></script>
    <script src="{{url('admin/')}}/js/bootstrap.min.js"></script>
    <script src="{{url('admin/')}}/js/adminlte.min.js"></script>
    @yield('js')

</body>

</html>