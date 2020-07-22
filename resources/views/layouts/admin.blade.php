<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>

    <!-- Scripts -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    

</head>
<body class="hold-transition sidebar-mini">
  

<div id="app" class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">

      <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
          </li>
          <li class="nav-item">
            <h1 class="m-0 text-dark">Admin Dashboard</h1>
          </li>
      </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Messages Dropdown Menu -->
 
      <!-- Notifications Dropdown Menu -->
   
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
      <img src="/storage/profileimages/statistics.png" alt="SajidTechShow" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">SajidTechShow</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="/storage/profileimages/boy.png" class="img-circle elevation-2" alt="User Image">
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
          <li class="nav-item has-treeview menu-open">
          <a href="{{route('admin.dashboard')}}" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          <li class="nav-item has-treeview">
              <a href="#" class="nav-link" id="nav-links">
                  <i class="fas fa-users"></i>                  
                  <p>
                  Users
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                <a href="{{route('admin.dasboard.users')}}" class="nav-link">
                    <i class="fas fa-user"></i>                    
                    <p>User</p>
                  </a>
                </li>
                <li class="nav-item">
                <a href="{{route('admin.dasboard.admins')}}" class="nav-link">
                    <i class="fas fa-users-cog"></i>                    
                    <p>Admin</p>
                  </a>
                </li>
              </ul>
            </li>
          
          <li class="nav-item" >
          <a href="{{route('admin.dasboard.posts')}}" class="nav-link" id="nav-links">
                <i class="nav-icon fas fa-th"></i>
                <p>
                  Posts
                  
                </p>
              </a>
            </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper" style="margin-top: 21px;">
    <!-- Content Header (Page header) -->
    {{-- @include('massages'); --}}
    @include('sweetalert::alert')

    @yield('content')
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->

    <div class="p-3">
      <h5>Title</h5>
      <a  href="{{ route('admin.logout') }}"
      onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
       {{ __('Logout') }}
   </a>

   <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" style="display: none;">
       @csrf
   </form>
   </a>
    </div>
  </aside>
  <!-- /.control-sidebar -->

  <!-- Main Footer -->
  <footer class="main-footer">
    <!-- To the right -->

    <!-- Default to the left -->
    <strong>Desigh by Sajid Ansari</strong>
  </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->




{{-- <script src="https://unpkg.com/vue"></script>
<script>
    var app = new Vue({
        el: '#app',
    });
</script> --}}


{{-- @yield('script') --}}
{{-- {!! $chart->script() !!} --}}

<script>
  $(document).ready(function(){

    var $title = $('#title').val();

      $('#submit').click(function () {

        $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
      });

        $('#submit').html('Posting..'); 

          $.ajax({
              type: "POST",
              url: "admin/dashboard/posts/save", // need to create this route
              data: "",
              dataType: 'JSON',
              success: function (data) {
                  alert('massage sent');
                  $('#messages').html(data);
              }
          });
      });

    });

    //       $.ajax({

//       method: "POST",
//       url: "/admin/dashboard/posts/save",
//       data: $('#post_store').serialize(),
//       dataType: "JSON",

//       success: function( response ) {
//           if(response.status=='success'){
//             $('#submit_form').html('Submit');
//             $('#res_message').show();
//             $('#res_message').html(response.msg);
//             $('#msg_div').removeClass('d-none');

//             document.getElementById("post_store").reset(); 
//             setTimeout(function(){
//             $('#res_message').hide();
//             $('#msg_div').hide();
//             },10000);

//           }else if(response.status=='error'){
//             $('#res_message').html(response.msg);
//             $('#msg_div').addClass('alert-danger');
//           }

//       }

//       });

//       });
</script>
</body>

</html>
