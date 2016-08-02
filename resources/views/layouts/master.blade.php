<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>PHP BLOG Project</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <link rel="stylesheet" href="{{url('assets/css/app.min.css')}}" type="text/css"/>
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
            <div class="col-lg-2">
                
                    @include('partials.sidebar')
              
            </div>
            <div class="col-lg-10">
                <section id="page_content">
                    <main id="main_content">
                            @yield('content')
                    </main>
                </section>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <footer id="page_footer">
                        @include('partials.footer')
                </footer>                
            </div>
        </div>
        
    </div> <!-- end Container -->
    <script src="{{url('assets/js/app.min.js')}}" ></script>
    <script src="{{url('assets/js/jQuery.easymodal_1.3.js')}}" ></script>
</body>
</html>
<!-- 

<div id="dashboard-page">
    <a href back class="back">back</a>
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                    <li>
                        <a href="">Dashboard</a>
                    </li>
                    <li>
                        <a href="">Fiches</a>
                    </li>
                    <li>
                        <a href="">Articles</a>
                    </li>
                    <li>
                        <a href="">Élèves</a>
                    </li>
                    <li>
                        <a href ng-click="out()">Logout</a>
                    </li>
                </ul>
            </div>
    <div class="container-fluid">
        <div class="col-lg-6 col-md-6 ">
            <div class="panel panel-default">
                <div class="panel-heading">Gestion des fiches</div>
                <div class="panel-body">Lorem ipsum dolor</div>
                <div class="panel-body">Lorem ipsum dolor</div>
                <div class="panel-body">Lorem ipsum dolor</div>
            </div>
        </div>
        <div class="col-lg-6 col-md-6">
            <div class="panel panel-default">
                <div class="panel-heading">Statistiques</div>
                <div class="panel-body">12 commentaires</div>
                <div class="panel-body">08 fiches publiées</div>
                <div class="panel-body">24 élèves</div>
            </div>
        </div>
        <div class="col-lg-6 col-md-6">
            <div class="panel panel-default">
                <div class="panel-heading">Gestion des articles</div>
                <div class="panel-body">Lorem ipsum dolor</div>
            </div>
        </div>
        <div class="col-lg-6 col-md-6">
            <div class="panel panel-default">
                <div class="panel-heading">Gestion des élèves</div>
                <div class="panel-body">Panel content</div>
            </div>
        </div>
    </div>
</div> -->