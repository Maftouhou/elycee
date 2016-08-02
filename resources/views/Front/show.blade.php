@extends('layouts.master')

@section('content')

<article class="article_wrapper single_post">
    <h1>{{$post->title}}</h1>

    <figure id="{{$post->id}}">

        @if(!is_null($post->url_thumbnail))
            <img class="simgle_image" src="{{url('uploads/images', $post->url_thumbnail)}}">
        @else <p>Pas de photo associé</p>
        @endif

        <figcaption>
            <p class="meta_data">
                @if(!is_null($post->user))
                By <span class="meta_data_user">{{$post->user->username}}</span>
                @else
                @endif
                <span class="meta_data_date"> on {{$post->created_at}}</span>
            </p>
            <p class="article_content">
                {{$post->content}}
            </p>
        </figcaption>
    </figure>
</article>
@if(count($post->comment)!== 0)
<h3>Il y a {{count($post->comment)}} commentaire pour l'article {{$post->title}}</h3>
@foreach($post->comment as $comment)
<h4>{{$comment->title}}</h4>
<p>{{$comment->content}}</p>
@endforeach

@else pas de commentaire pour {{$post->title}}

@endif

<form action="{{url('comments')}}" method="POST">
    @if($errors->any)
    <ul class="form_field_error">
        @foreach($errors->all() as $error)
        <li>{{$error}}</li>
        @endforeach
    </ul>
    @endif
    <fieldset>
        <legend>Laisser un commentaire </legend>
        {{csrf_field()}}
        <p> <input type="hidden" name="post_id" value="{{$post->id}}" /></p>
        <p> Titre</p>
        <p> <input type="text" name="title" id="comment_title"/> </p>
        <p> <textarea name="content" id="" cols="50" rows="6" placeholder="Votre commentiare ici"></textarea> </p>
        <p>
            <label for="publish">Publier maintement </label>
            <input id="publish" type="radio" name="status" value="0" />

            <label for="unpublish">Publier Plus tard </label>
            <input id="unpublish" type="radio" name="status" value="1" />
        </p>
        <p>
            <input type="submit" value="Envoyer">
        </p>
    </fieldset>
</form>

@endsection
