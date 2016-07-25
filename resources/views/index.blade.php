<!DOCTYPE html>
<html>
    <head>
        <title>Elycée</title>
        
        <!-- inject:css -->
        <link rel="stylesheet" href="../dist/css/app.min.css">
        <!-- endinject -->

        <style>
            
        </style>
    </head>
    <body ng-app="elycee">


    	<header>
            <ul class="nav navbar-nav">
              <li><a href="#/">e-l</a></li>
              <li><a href="#/about">Le lycée</a></li>
              <li><a href="#/contact">Contact</a></li>
              <li><a href="#/login">Connexion</a></li>
            </ul>
        </header>

      
        <div class="container">
            <div class="content" ng-view>
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
    <script src="bower_components/angular-route/angular-route.js"></script>
    <script src="bower_components/angular-sanitize/angular-sanitize.js"></script>
    <script src="bower_components/angular-touch/angular-touch.js"></script>
    
    <!-- inject:js -->
    <script src="../dist/js/app.js"></script>
    <!-- endinject -->
    </body>


</html>


