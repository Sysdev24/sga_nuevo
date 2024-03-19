<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>

    @include('layouts.parciales.head-login')

    @yield('css') 
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script type="text/javascript">
          function callbackThen(response){
              // read HTTP status
              console.log(response.status);
          
              // read Promise object
              response.json().then(function(data){
                  console.log(data);
              });
          }

          function callbackCatch(error){
              console.error('Error:', error)
          }
    </script>
 
    {!! htmlScriptTagJsApi([
        'callback_then' => 'callbackThen',
        'callback_catch' => 'callbackCatch'
    ]) !!}

</head>
<body class="hold-transition login-page">

  @yield('content')

  @include('layouts.parciales.script-login')

  @yield('script')

</body>
</html>
