<!-- <nav class="navication_menu {{Auth::check() ? (Auth::user()->role === 'teacher' ? 'menu_teacher':'') : '' }}">
    <ul class="navigation_list">
        <li class="navigation_item"><a href="{{url('api/dashboard')}}" title="Retourner au Dashboard">Dashbord Prof</a></li>
        <li class="navigation_item"><a href="{{url('api/questions')}}" title="Gerer les question">Questions</a></li>
        <li class="navigation_item"><a href="{{url('api/post')}}" title="Gerer les posts">Articles</a></li>
        <li class="navigation_item"><a href="#" title="Gerer les commentaire">Commentaire</a></li>
        <li class="navigation_item"><a href="#" title="Gerer les Pages">Pages</a></li>
        <li class="navigation_item"><a href="#" title="Gerer les Eleves">Elèves</a></li>
    </ul>
</nav>
<nav class="navication_menu {{Auth::check() ? (Auth::user()->role !== 'teacher' ? 'menu_eleve':'') : '' }}">
    <ul class="navigation_list">
        <li class="navigation_item"><a href="{{url('api/dashboard')}}" title="Retourner au Dashboard">Dashbord Eleve</a></li>
        <li class="navigation_item"><a href="{{url('api/questions')}}" title="Repondre au question">Questionnaire</a></li>
    </ul>
</nav>
 -->
<div class="collapse navbar-collapse navbar-ex1-collapse {{Auth::check() ? (Auth::user()->role === 'teacher' ? 'menu_teacher':'') : '' }}">
    <ul class="nav navbar-nav side-nav">
        <li>
            <a href="{{url('api/dashboard')}}" title="Retourner au Dashboard">Dashbord Prof</a>
        </li>
        <li>
            <a href="{{url('api/questions')}}" title="Gerer les question">Questions</a>
        </li>
        <li>
            <a href="{{url('api/post')}}" title="Gerer les posts">Articles</a>
        </li>
        <li>
            <a href="#" title="Gerer les Pages">Pages</a>
        </li>
        <li>
            <a href="#" title="Gerer les Eleves">Elèves</a>
        </li>
    </ul>
</div>

<div class="collapse navbar-collapse navbar-ex1-collapse {{Auth::check() ? (Auth::user()->role !== 'teacher' ? 'menu_eleve':'') : '' }}">
    <ul class="nav navbar-nav side-nav">
        <li>
            <a href="{{url('api/dashboard')}}" title="Retourner au Dashboard">Dashbord Eleve</a>
        </li>
        <li>
            <a href="{{url('api/questions')}}" title="Repondre au question">Questionnaire</a>
        </li>
    </ul>
</div>