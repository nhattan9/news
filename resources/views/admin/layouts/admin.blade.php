<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @yield('title')
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('adminTemplate/demo/assets/css/bootstrap.css')}}">

    <link rel="stylesheet"
        href="{{asset('adminTemplate/demo/assets/vendors/perfect-scrollbar/perfect-scrollbar.css')}}">
    <link rel="stylesheet" href="{{asset('adminTemplate/demo/assets/vendors/bootstrap-icons/bootstrap-icons.css')}}">
    <link rel="stylesheet" href="{{asset('adminTemplate/demo/assets/css/app.css')}}">
    <link rel="shortcut icon" href="{{asset('adminTemplate/demo/assets/images/favicon.ico')}}" type="image/x-icon">
    @yield('css')
</head>

<body>
    <div id="app">
        @include('admin.partials.sidebar')
        <div id="main" class='layout-navbar'>
            @include('admin.partials.header')
            <div id="main-content">

              @yield('content')

              @include('admin.partials.footer')
             
            </div>
        </div>
    </div>
    <script src="{{asset('adminTemplate/demo/assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js')}}"></script>
    <script src="{{asset('adminTemplate/demo/assets/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('adminTemplate\demo\assets\js\jquery.min.js')}}"></script>

    @yield('js')

    <script src="{{asset('adminTemplate/demo/assets/js/main.js')}}"></script>

</body>

</html>