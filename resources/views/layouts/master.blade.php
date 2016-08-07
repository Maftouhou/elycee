<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Project ELycée</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <link rel="stylesheet" href="{{url('assets/css/app.min.css')}}" type="text/css"/>
    <link rel="stylesheet" href="{{url('assets/css/app_back.css')}}" type="text/css"/>
    
    <link rel="stylesheet" href="{{url('assets/css/bootstrap.css')}}" type="text/css"/>
</head>
<body>
    <div id="wrapper" class="conteiner">
        <div class="row">
            <div class="col-lg-8">
                <header id="page_header">
                    @include('partials.nav')
                </header>
            </div>
        </div>
        <div class="row">
            @include('partials.sidebar')       
            <div class="container-fluid">
                <div class="col-lg-12">
                    @yield('content')
                </div>
            </div>
        </div>
       <!--  <div class="row">
            <div class="col-lg-12 col-md-12 col-xs-12">
                <footer id="page_footer">
                        @include('partials.footer')
                </footer>                
            </div>
        </div> -->  
    </div>
    <script src="../bower_components/gsap/src/uncompressed/TimelineMax.js"></script>
    <script src="../bower_components/gsap/src/uncompressed/TweenMax.js"></script>
    <script src="{{url('assets/js/app.min.js')}}" ></script>
    <script src="{{url('assets/js/jQuery.easymodal_1.3.js')}}" ></script>
</body>
</html>