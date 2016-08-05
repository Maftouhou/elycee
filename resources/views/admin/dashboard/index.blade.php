@extends('layouts.master')

@section('content')

    @if (Auth::user()->role === 'teacher')
        <div class="col-lg-6 col-md-6 ">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <a href="{{url('api/questions')}}">Gestion des questions</a>
                </div>
                <div class="panel-body">
                @foreach($questions as $q_key => $question)
                    <div class="panel-body-inner"><h4>{{str_limit($question->title, 30)}}</h4></div>
                    @if($q_key > 1) @break; 
                    @endif
                @endforeach
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading"><a href="{{url('api/post')}}">Gestion des articles</a></div>
                <div class="panel-body">
                @foreach($posts as $p_key => $post)
                    <div class="panel-body-inner"><h4>{{$post->title}}</h4></div>
                    @if($p_key > 1) @break; 
                    @endif
                @endforeach
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading">Gestion des élèves</div>
                <div class="panel-body">
                    <div class="panel-body-inner">Panel content</div>
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-md-6">
            <div class="panel panel-default">
                <div class="panel-heading">Statistiques</div>
                <div class="panel-body">
                    <div class="panel-body-inner"><h1>{{count($comments)}}</h1><h4>Commentaires</h4></div>
                    <div class="panel-body-inner"><h1>{{count($posts)}}</h1><h4>Posts publiées</h4></div>
                    <div class="panel-body-inner"><h1>{{count($questions)}}</h1><h4>Questions publiées</h4></div>
                    <div class="panel-body-inner"><h1>{{count($users)}}</h1><h4>Élèves</h4></div>
                </div>
            </div>
        </div>
       
    @elseif (Auth::user()->role === 'terminal' || Auth::user()->role === 'premiere') 
        <h2>Liste des question à repondre</h2>
        <a href="{{url('api/questions')}}" title="Repondre au question">Acceder au quesitonnaire</a>
    @else
        <p> Votre status est inconue </p>
    @endif

@endsection