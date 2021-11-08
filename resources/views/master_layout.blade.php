<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
		<meta name="description" content="AppiNews">
		<meta name="keywords" content="HTML,CSS,JavaScript">
		<meta name="author" content="AppifyLab">
	    <meta name="viewport" content="width=device-width, initial-scale=1">
		@yield('title')
        <link rel="icon" href={{asset('newsTemplate/assets/images/tt.png')}} type="image/png" sizes="16x16" >

        <!--===============
			CSS FILES
		=================-->
		
		<!-- Bootstrap CSS-->
		<link rel="stylesheet" href={{asset('newsTemplate/assets/css/bootstrap.min.css')}} type="text/css" media="all" />

		<!-- Owl Carousel CSS -->
		<link href={{asset('newsTemplate/assets/css/owl.carousel.min.css')}} rel="stylesheet" >
        <link href={{asset('newsTemplate/assets/css/owl.theme.default.min.css')}} rel="stylesheet" >
        
        <!-- Font Awesome CSS -->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

        <!-- Google Font -->
        <link href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i&display=swap" rel="stylesheet">
  
       <link href="https://fonts.googleapis.com/css2?family=Merriweather:ital,wght@0,300;0,400;0,700;0,900;1,300;1,400&display=swap" rel="stylesheet">

        <link href="https://fonts.googleapis.com/css?family=Ubuntu:400,400i,500,500i,700,700i&display=swap" rel="stylesheet">


        <!-- Custom CSS -->
        <link rel="stylesheet" href={{asset('newsTemplate/assets/css/style.css')}} type="text/css" media="all" />
		@yield('css')
    </head>

    <body>
        <!-- Preloader -->
		{{-- <div class="preloader">
            <div class="preloader-wrapper">
                <div class="ball-triangle">
                    <img src={{asset('newsTemplate/assets/fonts/ball-triangle.svg')}} width="60" alt="preloader">
                </div>
            </div>
        </div> --}}
        <!-- End Preloader -->

        @include('components.top_nav')
        @include('components.header')
        @include('components.nav')


        @yield('content')

        @include('components.footer')
        @include('components.login_modal')

        <!--================
				SCRIPT
        ====================-->
        

		<!-- JQUERY-1.12.0 -->
        <script src={{asset('newsTemplate/assets/js/jquery-1.12.0.min.js')}}></script>
        <script src={{asset('newsTemplate/assets/js/owl.carousel.min.js')}}></script>

        
        @yield('js')
		<!-- MAIN.JS -->
        <script src={{asset('newsTemplate/assets/js/custom.js')}}></script>
        <script src={{asset('news/loginAjax.js')}}></script>

    </body>
</html>