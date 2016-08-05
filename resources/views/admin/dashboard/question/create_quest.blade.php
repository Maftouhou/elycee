@extends('layouts.master')

@section('content')
    <h2>Ajouter un nouvel article </h2>
    <div id="article_container">
    @if($errors->any)
    <ul class="form_field_error">
        @foreach($errors->all() as $error)
        <li>{{$error}}</li>
        @endforeach
    </ul>
    @endif
    <form action="{{url('api/questions')}}" method="POST">
        {{csrf_field()}}
            <p> <input type="hidden" name="user_id" value="{{Auth::user()->id}}" /></p>
            
            <p> Nombre des choix des reponses </p>
            <p> <input type="text" name="choice_num" placeholder="Entrer le nombre des choix possible"> </p>
            <p> Titre de l'article </p>
            <p> <input type="text" name="title" placeholder="Titre de l'Article"> </p>
            <p> Contenu de l'article </p>
            <p> <textarea name="content" id="" cols="50" rows="6" placeholder="Contenu de l article"></textarea> </p>
            <p> Selectionner la classe <br />
                <select name="class">
                    <option> -- selectionner -- </option>
                    <option value="premiere" > Première</option>
                    <option value="terminal"> Terminal</option>
                </select>
            </p>
            
            <legend>Gerer la publication </legend>
            <p>
                <label for="publish">Publier maintement </label>
                <input id="publish" type="radio" name="status" value="publish" />
            
                <label for="unpublish">Publier Plus tard </label>
                <input id="unpublish" type="radio" name="status" value="unpublish" />
            </p>
            <p>
                <input type="submit" value="Envoyer">
            </p>

    </form>

</div>
@endsection