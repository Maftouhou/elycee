@if(Auth::check() && Auth::user()->role === 'teacher' )
<div class="sidebar-wrapper {{Auth::check() ? (Auth::user()->role === 'teacher' ? 'menu_teacher':'') : '' }}">
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
@elseif(Auth::check() && Auth::user()->role !== 'teacher' )
<div class="sidebar-wrapper {{Auth::check() ? (Auth::user()->role !== 'teacher' ? 'menu_eleve':'') : '' }}">
    <ul class="nav navbar-nav side-nav">
        <li>
            <a href="{{url('api/dashboard')}}" title="Retourner au Dashboard">Dashbord Eleve</a>
        </li>
        <li>
            <a href="{{url('api/questions')}}" title="Repondre au question">Questionnaire</a>
        </li>
        <li>
            <p>Votre note est de __ / </p>
        </li>
    </ul>
</div>
@endif