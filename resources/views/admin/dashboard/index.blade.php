@extends('layouts.master')

@section('content')

<div class="container-fluid">
    @if ($user_role === 'teacher')
        <div class="col-lg-6 col-md-6 ">
            <div class="panel panel-default">
                <div class="panel-heading">Gestion des questions</div>
                <div class="panel-body">Question 1</div>
                <div class="panel-body">Question 2</div>
                <div class="panel-body">Question 3</div>
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
                <div class="panel-body">Articles 1</div>
            </div>
        </div>
        <div class="col-lg-6 col-md-6">
            <div class="panel panel-default">
                <div class="panel-heading">Gestion des élèves</div>
                <div class="panel-body">Panel content</div>
            </div>
        </div>
    </div>
    @elseif ($user_role === 'terminal' || $user_role === 'premiere') 
        <h2>Liste des question à repondre</h2>
        <a href="{{url('api/questions')}}" title="Repondre au question">Acceder au quesitonnaire</a>
    @else
        <p> Votre status est inconue </p>
    @endif

@endsection