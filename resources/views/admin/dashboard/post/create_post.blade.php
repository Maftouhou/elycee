@extends('layouts.master')

@section('content')
    @if($errors->any)
    <ul class="form_field_error">
        @foreach($errors->all() as $error)
        <li>{{$error}}</li>
        @endforeach
    </ul>
    @endif
    <h2>Ajouter un article</h2>
    <div id="article_container">
        <form action="{{url('api/post')}}" method="POST" enctype="multipart/form-data">
            {{csrf_field()}}
                <p> <input type="hidden" name="user_id" value="{{Auth::user()->id}}" /></p>
                
                <p> Titre de l'article </p>
                <p> <input type="text" name="title" placeholder="Titre de l'Article"> </p>
                <p> Contenu de l'article </p>
                <p> <textarea name="content" id="" cols="50" rows="6" placeholder="Contenu de l article"></textarea> </p>
                <p> <label for="picture">Télécharger une photo</label></p>
                <p> <input type="file" id="picture" name="url_thumbnail" /> </p>

                <legend>Gerer la publication </legend>
                <p>
                    <label for="publish">Publier maintement </label>
                    <input id="publish" type="radio" name="status" value="1" />
                
                    <label for="unpublish">Publier Plus tard </label>
                    <input id="unpublish" type="radio" name="status" value="0" />
                </p>
                <p>
                    <input type="submit" value="Envoyer">
                </p>
        </form>
    </div>
@endsection