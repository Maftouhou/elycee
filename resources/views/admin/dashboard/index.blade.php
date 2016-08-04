@extends('layouts.master')

@section('content')

    @if (Auth::user()->role === 'teacher')
        <div class="col-lg-6 col-md-6 ">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <a href="{{url('api/questions')}}">Gestion des questions</a>
                </div>
                @foreach($questions as $q_key => $question)
                    <div class="panel-body">{{$question->title}}</div>
                    @if($q_key > 1) @break; 
                    @endif
                @endforeach
            </div>
        </div>
        <div class="col-lg-6 col-md-6">
            <div class="panel panel-default">
                <div class="panel-heading">Statistiques</div>
                <div class="panel-body">{{count($comments)}} commentaires</div>
                <div class="panel-body">{{count($posts)}} Posts publiées</div>
                <div class="panel-body">{{count($questions)}} questions publiées</div>
                <div class="panel-body">{{count($users)}} élèves</div>
            </div>
        </div>
        <div class="col-lg-6 col-md-6">
            <div class="panel panel-default">
                <div class="panel-heading"><a href="{{url('api/post')}}">Gestion des articles</a></div>
                @foreach($posts as $p_key => $post)
                    <div class="panel-body">{{$post->title}}</div>
                    @if($p_key > 1) @break; 
                    @endif
                @endforeach
            </div>
        </div>
        <div class="col-lg-6 col-md-6">
            <div class="panel panel-default">
                <div class="panel-heading">Gestion des élèves</div>
                <div class="panel-body">Panel content</div>
            </div>
        </div>
        
    @elseif (Auth::user()->role === 'terminal' || Auth::user()->role === 'premiere') 
        <h2>Liste des question à repondre</h2>
        <a href="{{url('api/questions')}}" title="Repondre au question">Acceder au quesitonnaire</a>
    @else
        <p> Votre status est inconue </p>
    @endif

@endsection