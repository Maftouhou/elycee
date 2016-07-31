@extends('layouts.master')

@section('content')
<div class="wrapper">
    
    @if ($user_role === 'teacher')
    <section>
        <h2>Gestion des Questions</h2>
        <ul>
            <li>Questions 1</li>
            <li>Questions 2</li>
            <li>Questions n</li>
        </ul>
        <a href="{{url('api/questions')}}" title="Gerer les questions"> Voir tout les Questions</a>
        
        <h2>Gestion des Articles</h2>
        <ul>
            <li>Article 1</li>
            <li>Article 2</li>
            <li>Article n</li>
        </ul>
        <a href="{{url('api/post')}}" title="Gerer les Articles"> Voir tout les Articles</a>
        
        <h2>Gestion des Eleves</h2>
        <a href="#" title="Gerer les Eleves"> Voir tout les Eleves</a>
        
    </section>
    <aside>
        <h2>Statistique</h2>
        <ul>
            <li>Commentaire</li>
            <li>Fiches publié</li>
            <li>Elèves</li>
        </ul>
    </aside>
    @elseif ($user_role === 'terminal' || $user_role === 'premiere') 
        <h2>Liste des question à repondre</h2>
        <a href="{{url('api/questions')}}" title="Repondre au question">Acceder au quesitonnaire</a>
    @else
        <p> Votre status est inconue </p>
    @endif
    
</div>
@endsection