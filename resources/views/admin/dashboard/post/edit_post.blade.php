@extends('layouts.master')

@section('content')
    @if($errors->any)
    <ul class="form_field_error">
        @foreach($errors->all() as $error)
        <li>{{$error}}</li>
        @endforeach
    </ul>
    @endif
    <h2>Editer l'article</h2>
    <div id="article_container">
    <form action="{{url('api/post', $post->id)}}" method="POST" enctype="multipart/form-data">
        {{method_field('PATCH')}}
        {{csrf_field()}}
            <p> <input type="hidden" name="user_id" value="{{Auth::user()->id}}" /></p>
            
            <p> Titre de l'article </p>
            <p> <input type="text" name="title" value="{{$post->title}}" placeholder="Titre de l'Article" required /> </p>
            <p> Contenu de l'article </p>
            <p> <textarea name="content" id="" cols="50" rows="6" placeholder="Contenu de l article" required>{{$post->content}}</textarea></p>
            
            @if($post->url_thumbnail)
                <p>
                    @if($post->url_thumbnail)
                    <img width="90" src="{{url('uploads/images/', $post->url_thumbnail)}}" alt="">
                    @else Vous pouvez ajouter une photo en clicant ci-dessous
                    @endif
                </p>
            @endif
            <p> <label for="picture">Télécharger une photo</label></p>
            <p> <input type="file" id="picture" name="url_thumbnail" /> </p>

            <legend>Gerer la publication </legend>
            <p>
                <label for="publish">Publier maintement </label>
                <input id="publish" type="radio" name="status" value="1" {{$post->status === 1 ? "checked" : ""}} required />
            
                <label for="unpublish">Publier Plus tard </label>
                <input id="unpublish" type="radio" name="status" value="0" {{$post->status === 0 ? "checked" : ""}} required />
            </p>
            <p>
                <input type="submit" value="Envoyer">
            </p>
    </form>
</div>
@endsection