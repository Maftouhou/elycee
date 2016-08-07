@extends('layouts.master')

@section('content')
    <h2>Créer un nouvel article </h2>
    <div id="article_container">
    @if($errors->any)
    <ul class="form_field_error">
        @foreach($errors->all() as $error)
        <li>{{$error}}</li>
        @endforeach
    </ul>
    @endif
    <form action="{{url('api/questions', $question->id)}}" method="POST">
        {{method_field('PATCH')}}
        {{csrf_field()}}
            <p> <input type="hidden" name="user_id" value="{{Auth::user()->id}}" /></p>
            
<<<<<<< HEAD
            <p>Titre de la question </p>
            <p> <input type="text" name="title" placeholder="Titre de l'article" value="{{$question->title}}"> </p>
            <p>Contenu de la question </p>
            <p> <textarea name="content" id="" cols="50" rows="6" placeholder="Contenu de l'article">{{$question->content}}</textarea> </p>
            <p>Sélectionner la classe <br />
                <select name="class">
=======
            <p> Titre de la question </p>
            <p> <input type="text" name="title" placeholder="Titre de l'Article" value="{{$question->title}}" required> </p>
            <p> Contenu de la question </p>
            <p> <textarea name="content" id="" cols="50" rows="6" placeholder="Contenu de l article" required>{{$question->content}}</textarea> </p>
            <p> Selectionner la classe <br />
                <select name="class" required>
>>>>>>> 70eab476ff7704ab4d3f87e5e17362916f5d944d
                    <option> -- selectionner -- </option>
                    <option value="premiere" {{$question->class === 'premiere' ? "selected" : "" }}> Première</option>
                    <option value="terminal" {{$question->class === 'terminal' ? "selected" : "" }}> Terminal</option>
                </select>
            </p>
            
            <legend>Gérer la publication </legend>
            <p>
<<<<<<< HEAD
                <label for="publish">Publier maintenant </label>
                <input id="publish" type="radio" name="status" value="publish" {{$question->status === 'publish' ? "checked" : "" }} />
            
                <label for="unpublish">Publier plus tard </label>
                <input id="unpublish" type="radio" name="status" value="unpublish" {{$question->status === 'unpublish' ? "checked" : "" }} />
=======
                <label for="publish">Publier maintement </label>
                <input id="publish" type="radio" name="status" value="publish" required {{$question->status === 'publish' ? "checked" : "" }} />
            
                <label for="unpublish">Publier Plus tard </label>
                <input id="unpublish" type="radio" name="status" value="unpublish" required {{$question->status === 'unpublish' ? "checked" : "" }} />
>>>>>>> 70eab476ff7704ab4d3f87e5e17362916f5d944d
            </p>
            <p>
                <input type="submit" value="Envoyer">
            </p>
            </div>
    </form>
@endsection