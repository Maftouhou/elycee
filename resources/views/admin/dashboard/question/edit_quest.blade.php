@extends('layouts.master')

@section('content')
    <h2>Creer un nouvel article </h2>
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
            <p> <input type="hidden" name="choice_num" value="1"> </p>
            
            <p> Titre de la question </p>
            <p> <input type="text" name="title" placeholder="Titre de l'Article" value="{{$question->title}}"> </p>
            <p> Contenu de la question </p>
            <p> <textarea name="content" id="" cols="50" rows="6" placeholder="Contenu de l article">{{$question->content}}</textarea> </p>
            <p> Selectionner la classe <br />
                <select name="class">
                    <option> -- selectionner -- </option>
                    <option value="premiere" {{$question->class === 'premiere' ? "selected" : "" }}> Première</option>
                    <option value="terminal" {{$question->class === 'terminal' ? "selected" : "" }}> Terminal</option>
                </select>
            </p>
            
            <legend>Gerer la publication </legend>
            <p>
                <label for="publish">Publier maintement </label>
                <input id="publish" type="radio" name="status" value="publish" {{$question->status === 'publish' ? "checked" : "" }} />
            
                <label for="unpublish">Publier Plus tard </label>
                <input id="unpublish" type="radio" name="status" value="unpublish" {{$question->status === 'unpublish' ? "checked" : "" }} />
            </p>
            <p>
                <input type="submit" value="Envoyer">
            </p>
            </div>
    </form>
@endsection