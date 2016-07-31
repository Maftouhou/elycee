<nav class="navication_menu {{Auth::check() ? (Auth::user()->role === 'teacher' ? 'menu_teacher':'') : '' }}">
    <ul class="navigation_list">
        <li class="navigation_item"><a href="#">Dashbord Prof</a></li>
        <li class="navigation_item"><a href="#">Fiches</a></li>
        <li class="navigation_item"><a href="#">Articles</a></li>
        <li class="navigation_item"><a href="#">Commentaire</a></li>
        <li class="navigation_item"><a href="#">Pages</a></li>
        <li class="navigation_item"><a href="#">Elèves</a></li>
    </ul>
</nav>
<nav class="navication_menu {{Auth::check() ? (Auth::user()->role !== 'teacher' ? 'menu_eleve':'') : '' }}">
    <ul class="navigation_list">
        <li class="navigation_item"><a href="#">Dashbord Eleve</a></li>
        <li class="navigation_item"><a href="#">Questionnaire</a></li>
    </ul>
</nav>
