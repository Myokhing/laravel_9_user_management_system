
@include('admin.layouts.header')

<body class="">
  <div class="wrapper ">
    @include('admin.layouts.sidebar')
    <div class="main-panel">
      <!-- Navbar -->
      @include('admin.layouts.navbar')
      <!-- End Navbar -->
      <div class="content">
        <div class="content">
          <div class="container-fluid">
            <div class="row">
              @yield('content')
            </div>
          </div>
        </div>
      </div>
      @include('admin.layouts.footer')
    </div>
  </div>
  @include('admin.layouts.right_sidebar')
  <!--   Core JS Files   -->
  @include('admin.layouts.scripts')
  @yield('scripts')