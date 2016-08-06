@extends('layouts.master')

@section('content')
    @forelse($posts->reverse() as $post)
    <article class="article_wrapper">
        <h2><a href="{{url('article', $post->id)}}">{{$post->title}}</a></h2>
        @if(!is_null($post->url_thumbnail))
        <figure id="{{$post->id}}">
            <a href="{{url('index', $post->id)}}">
                <img src="{{url('uploads/images', $post->url_thumbnail)}}">
            </a>
        @else <p>Pas de photo associé</p>
        @endif
            <figcaption>
                <p class="article_content">{{str_limit($post->content, 70)}}<br>
                    <a href="{{url('index', $post->id)}}"><span class="read_more">Lire la suite</span></a>
                </p>
            </figcaption>
        </figure>
    </article>
    @empty
        <p>Pas d'article</p>
    @endforelse
@endsection
