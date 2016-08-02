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
                <aside id="sidebar">
                    @include('partials.sidebar')
                </aside>
            </div>
            <div class="col-lg-6">
                <section id="page_content">
                    <main id="main_content">
                            @yield('content')
                    </main>
                </section>
            </div>
            <div class="col-lg-2"></div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <footer id="page_footer">
                        @include('partials.footer')
                </footer>                
            </div>
        </div>
        
    </div> <!-- end Container -->
    <script src="{{url('assets/js/app.js')}}" ></script>
    <script src="{{url('assets/js/jQuery.easymodal_1.3.js')}}" ></script>
</body>
</html>