<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>

@include('layouts.parciales.head2')

<style>

#nr_topStrip {
    background: #fafafa;
    font-family: 'Open Sans', sans-serif;
    font-size: 20px;
    padding: 10px 0;
    height: 12%;
}
#nr_topStrip2 {
    background: #10519b;

    font-family: 'Open Sans', sans-serif;
    font-size: 20px;
    padding: 0px 0;
    height:15%;
}
</style>
@yield('css')

</head>

<section  id="nr_topStrip" class="row">
  <div  class="container">
    <div  class="row">

        <img src="{{ asset('images/banner_superior.jpg') }}" style="max-width:800%;height:100%;">

    </div>
  </div>
</section>
<!-- <section id="" class="row">
  <div class="container">
    <div class="row">
      <div class="col-9">
        <br>
        <img src="{{ asset('images/logo.png') }}" style="max-width:100%;height:auto;">
      </div>
     <div class="col-3">
        <br>
       <img src="{{ asset('images/logo.png') }}" style="max-width:100%;height:auto;">
      </div>
    </div>
</section> -->
<body class="hold-transition sidebar-mini layout-fixed">


  <div class="wrapper" id="app">

    {{-- <inactividad></inactividad> --}}
    <!-- Navbar -->
    {{-- @include('layouts.parciales.navbar') --}}
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    {{-- @include('layouts.parciales.sidebar') --}}


<!-- Content Wrapper. Contains page content -->
          <!-- <div class="content-wrapper"> -->
          <div class="container">
            <!-- Content Header (Page header) -->
            <div class="content-header">
              <div class="container-fluid">
                <div class="row">
                  <div class="col-sm-12">
                    <ol class="breadcrumb float-sm-left">

                        {{-- @foreach($breadcrumb as $items)
                            <li class="breadcrumb-item"><a href="{{ $items['link'] }}">{{ $items['name'] }}</a></li>
                        @endforeach                     --}}
                      <!-- li class="breadcrumb-item active">Dashboard v1</li -->
                    </ol>
                  </div><!-- /.col -->
                </div><!-- /.row -->
              </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <section class="content">
              <div class="container-fluid">
                <!-- Small boxes (Stat box) -->
                  <main class="py-4">
                    @include('components.flash_alerts')
                      @yield('content')
                  </main>

                  <!-- /.row (main row) -->
              </div><!-- /.container-fluid -->
            </section>
        <!-- /.content -->

          @include('layouts.parciales.footer2')

        </div>
    </div>

    <!-- /.content-wrapper -->



    </div>
    <!-- ./wrapper -->

    @include('layouts.parciales.script')

    @yield('script')
</body></html>
