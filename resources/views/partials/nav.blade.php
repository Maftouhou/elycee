<?php $loginState = Auth::check() ? true : false ?>
<nav>
    <ul id="navigation">
        <li><a href="{{url('/index')}}">&utrif; Home</a></li>
        <li><a>Contact &squarf;</a></li>
    </ul>
    <ul id="connexion">       
        @if($loginState === true)
            <li><a href="{{url('api/dashboard')}}">Bonjour {{Auth::user()->username}}</a></li>
            <li><a id="login" href="{{url('api/logout')}}">&ltrif; Logout </a></li>
            <li><a id="dashbord" href="{{url('api/dashboard')}}">Dashbord </a></li>
        @else
            <li><a id="logout" href="{{url('api/login')}}">Login &rtrif;</a></li>
        @endif
    </ul>
</nav>
