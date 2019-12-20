 <?php
    $uri = Route::getCurrentRoute()->uri();
    $prefix = is_null(Route::current()->getPrefix())?"":Route::current()->getPrefix();

?> 
<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <link rel="icon" type="image/png" href="{{asset('builder/logo-empty.png')}}" />
  <title>Adminstrators - housesgardens.com</title>

  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="{{ asset('admin-lte/plugins/fontawesome-free/css/all.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('admin-lte/dist/css/adminlte.min.css')}}">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <style type="text/css">
    .nav.nav-treeview{
      background: rgba(71, 79, 86, 0.65);
    }
    .invalid-feedback{
      display: block!important;
    }
  </style>
  @yield("css")
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="index3.html" class="nav-link">Home</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Contact</a>
      </li>
    </ul>

    <!-- SEARCH FORM -->
    <form class="form-inline ml-3">
      <div class="input-group input-group-sm">
        <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
        <div class="input-group-append">
          <button class="btn btn-navbar" type="submit">
            <i class="fas fa-search"></i>
          </button>
        </div>
      </div>
    </form>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Messages Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-comments"></i>
          <!-- <span class="badge badge-danger navbar-badge">3</span> -->
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
         <!--  <a href="#" class="dropdown-item">
            
            <div class="media">
              <img src="dist/img/user1-128x128.jpg" alt="User Avatar" class="img-size-50 mr-3 img-circle">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  Brad Diesel
                  <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">Call me whenever you can...</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
              </div>
            </div>
           
          </a>
          <div class="dropdown-divider"></div> -->
          
        </div>
      </li>
      <!-- Notifications Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-bell"></i>
          <!-- <span class="badge badge-warning navbar-badge">15</span> -->
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <!-- <span class="dropdown-header">15 Notifications</span>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-envelope mr-2"></i> 4 new messages
            <span class="float-right text-muted text-sm">3 mins</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-users mr-2"></i> 8 friend requests
            <span class="float-right text-muted text-sm">12 hours</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-file mr-2"></i> 3 new reports
            <span class="float-right text-muted text-sm">2 days</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a> -->
        </div>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-user"></i>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right" style="min-width: auto;text-align: center;">
          <div class="dropdown-divider"></div>
          <a href="{{route('admin.profile')}}" class="dropdown-item">
            <i class="fas fa-id-badge mr-2"></i>Profile
            
          </a>
          <a href="{{route('register')}}" class="dropdown-item">
            <i class="fas fa-plus-circle mr-2"></i>Register
          </a>
          <div class="dropdown-divider"></div>
          <form action="{{route('logout')}}" method="post">
            @csrf
          <button type="submit" class="dropdown-item" >
            <i class="fas fa-sign-out-alt mr-2"></i>Sign out
          </button>
          </form>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#"><i
            class="fas fa-th-large"></i></a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="{{asset('builder/logo-empty.png')}}" alt="housesgardens-logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">House & Garden</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{ asset('admin-lte/dist/img/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">{{auth()->user()->name}}</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
              
          <li class="nav-item  ">
            <a href="{{route('home')}}" class="nav-link @if($prefix=='/home') active @endif">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
            
          </li>

          <li class="nav-item has-treeview @if($prefix=='/article' || $prefix=='article/category' || $prefix=='article/tag') menu-open @endif">
            <a href="#" class="nav-link  @if($prefix=='/article' || $prefix=='article/category' || $prefix=='article/tag') active @endif ">
              <i class="nav-icon fas fa-edit"></i>
              <p>
                Article
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('article.all')}}" class="nav-link @if($uri=='article') active @endif">
                  <i class="far fa-circle nav-icon"></i>
                  <p>All posts</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('article.new')}}" class="nav-link @if($uri=='article/new') active @endif">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add new</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('category.all')}}" class="nav-link @if($uri=='article/category') active @endif">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Categories</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('tag.all')}}" class="nav-link @if($uri=='article/tag') active @endif">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Tags</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item  @if($prefix=='/author') menu-open @endif">
            <a href="{{route('author.all')}}" class="nav-link @if($prefix=='/author') active @endif">
              <i class="nav-icon fas fa-book"></i>
              <p>
                Author
                <span class="right badge badge-danger">New</span>
              </p>
            </a>
          <li class="nav-header">File Manager</li>
          </li>
           <li class="nav-item ">
            <a href="{{route('helper.media')}}" class="nav-link @if($prefix=='/media') active @endif">
              <i class="nav-icon far fa-image"></i>
              <p>
                Media
                <span class="badge badge-info right">Runing</span>
              </p>
            </a>

          </li>
          <li class="nav-header">Oversea</li>
          <li class="nav-item ">
            <a href="{{route('special.all')}}" class="nav-link @if($prefix=='/media') active @endif">
              <i class="nav-icon far fa-plus-square"></i>
              <p>
                Special
              </p>
            </a>

          </li>
           <li class="nav-item has-treeview  @if($prefix=='/product') menu-open @endif">
            <a href="#" class="nav-link @if($prefix=='/product') active @endif">
              <i class="nav-icon far fa-plus-square"></i>
              <p>
                Products
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('product.all')}}" class="nav-link @if($uri=='product') active @endif">
                  <i class="far fa-circle nav-icon"></i>
                  <p>All products</p>
                </a>
              </li>
               <li class="nav-item">
                <a href="{{route('product.new')}}" class="nav-link @if($uri=='product/new') active @endif">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add new</p>
                </a>
              </li>
               
            </ul>
            
          </li>
           <li class="nav-item has-treeview  @if($prefix=='/config') menu-open @endif">
            <a href="#" class="nav-link @if($prefix=='/config') active @endif">
              <i class="nav-icon fas fa-power-off"></i>
              <p>
                Config
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('config.attribute')}}" class="nav-link @if($uri=='config/attribute') active @endif">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Attribute</p>
                </a>
              </li>
               <li class="nav-item">
                <a href="{{route('config.status')}}" class="nav-link @if($uri=='config/status') active @endif">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Status</p>
                </a>
              </li>
               
            </ul>
          </li>
          
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
  
      @yield("content")

    <!-- Content Header (Page header) -->

 </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
    <div class="p-3">
      <h5>Title</h5>
      <p>Sidebar content</p>
    </div>
  </aside>
  <!-- /.control-sidebar -->

  <!-- Main Footer -->
  <footer class="main-footer">
    <!-- To the right -->
    <div class="float-right d-none d-sm-inline">
     <img src="{{asset('builder/logo-house-garden.png')}}" width="120px" alt="">
    </div>
    <!-- Default to the left -->
    <strong>Copyright &copy; 2014-2019 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
  </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="{{ asset('admin-lte/plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('admin-lte/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('admin-lte/dist/js/adminlte.min.js') }}"></script>
<script src="{{ asset('admin-lte/dist/js/url.js') }}"></script>
  @yield("js")
</body>
</html>
