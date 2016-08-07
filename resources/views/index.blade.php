<!DOCTYPE html>
<html>
    <head>
        <title>Elycée</title>
        
        <!-- inject:css -->
        <link rel="stylesheet" href="../dist/css/app.min.css">
        <!-- endinject -->
        <link href="../assets/css/bootstrap.css" rel="stylesheet">
        

        <style>
            .search_input{
                background: none;
                /*border-bottom: 1px solid gray;*/
                border-top: 0;
                border-left: 0;
                border-right: 0;
            }
            input,button:focus {
            outline: 0 !important;
            &:focus.underline{
            border-bottom: 5px solid white;
            padding-bottom: 0px;
        }
        </style>
    </head>
    <body ng-app="elycee">


    	<header>
            <ul class="nav navbar-nav">
                <li><a href="#/"><img src="dist/images/E-L.png" class="logo-w"><img src="dist/images/E-L_b.png" class="logo-b"></a></li>
                <li><a href="#/login">Login</a></li>
               <!--  <li><a href="{{url('/contact')}}">Contact</a></li> -->
                <li><a href="#/contact">Contact</a></li>
                <li><a href="#/about">Le lycée</a></li>
                <li><a href="#/search">Search</a></li>
                
                <li>
                <form action="{{ url('/search') }}" method="get">
                    <div> <input class="search_input" type="search" name="exp" placeholder="SEARCH"> </div>
                    @if(isset($errors))
                        @if($errors->has('exp')) <span class="error">{{ $errors->first('exp') }}</span> @endif
                    @endif
                </form>
                </li>
            </ul>
        </header>

      
        <div class="container">
            <div class="content transition" ng-view>
            </div>
        </div>

    <script type="text/javascript">		
	</script>

    <script src="bower_components/jquery/dist/jquery.js"></script>
    <script src="bower_components/angular/angular.js"></script>
    <script src="bower_components/bootstrap/dist/js/bootstrap.js"></script>
    <script src="bower_components/angular-animate/angular-animate.js"></script>
    <script src="bower_components/angular-cookies/angular-cookies.js"></script>
    <script src="bower_components/angular-resource/angular-resource.js"></script>
    <script src="bower_components/angular-ui-router/release/angular-ui-router.js"></script>
    <script src="bower_components/angular-local-storage/dist/angular-local-storage.min.js"></script>
    <script src="bower_components/angular-route/angular-route.js"></script>
    <script src="bower_components/angular-sanitize/angular-sanitize.js"></script>
    <script src="bower_components/angular-touch/angular-touch.js"></script>
    <script src="bower_components/gsap/src/uncompressed/TimelineMax.js"></script>
    <script src="bower_components/gsap/src/uncompressed/TweenMax.js"></script>
    
    <!-- inject:js -->
    <script src="../dist/js/app.js"></script>
    <!-- endinject -->
    </body>


</html>


