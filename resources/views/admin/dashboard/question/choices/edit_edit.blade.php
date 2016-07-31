@extends('layouts.master')

@section('content')

@if(Session::has('message'))
    <p>{{Session::get('message')}}</p>
@endif

    <form method="POST" action="{{url('post', $post->id)}}" enctype="multipart/form-data" >
        {{method_field('PATCH')}}
        {{csrf_field()}}
        <fieldset>
            <legend>Modifier l'article</legend>
            
            <p>Modifier votre article le {{$curentDate}} </p>
            <input type="hidden" name="user_id" value="{{$userId}}" />
            <input type="hidden" name="updated_at" value="{{$curentDate}}" />
            <p>Titre de l'article <br>
                <input type="text" name="title" placeholder="Titre de l'Article" value="{{$post->title}}">
            </p>
            <p>Contenu de l'article <br>
                <textarea name="content" id="" cols="30" rows="10" placeholder="Contenu de l article">{{$post->content}}</textarea>
            </p>
            <p>
                @if(isset($post) && $post->picture)
                <img width="90" src="{{url('uploads', $post->picture->uri)}}" alt="">
                <p>
                    <label for="delete_picture">Remplacer / Supprimer l'image</label>
                    <input id="delete_picture" type="checkbox" name="delete_picture" value="delete">
                </p>
                @endif
                <label for="picture">Télécharger une photo</label><br>
                <input type="file" id="picture" name="picture" />
            </p>
        </fieldset>

        <fieldset>
            <legend>Selectionner les options</legend>
            <p>Status de l'article </p>
            <p>
                <label for="draft">draft</label>
                <input type="radio" id="draft" name="status" value="draft" {{$post->status==='draft'? "checked" : ""}}><br>
                <label for="online">online</label>
                <input type="radio" id="online" name="status" value="online" {{$post->status==='online'? "checked" : ""}}><br>
                <label for="offline">offline</label>
                <input type="radio" id="offline" name="status" value="offline" {{$post->status==='offline'? "checked" : ""}}><br>
            </p>
            <p> Selectionner une categorie <br>
                <select name="category_id" id="">
                    <option>- Selectionner -</option>
                    @forelse($categories as $category_id => $category_value)
                        @if(!is_null($category_value))
                        <option value="{{$category_value->id}}" {{$post->category_id==$category_value->id ? 'selected' : ''}}>{{$category_value->title}}</option>
                        @else

                        @endif
                    @empty

                    @endforelse
                </select>
            </p>
            <p>Selectionner une des mots clé <br>
                <select name="tag_id[]" id="" multiple>
                    @forelse($tags as $tag_id => $tag_value)
                        @if(!is_null($tag_value))
                            <option value="{{$tag_id}}" {{$post->hasTag($tag_id)? 'selected' : ''}}>{{$tag_value}}</option>
                        @else

                        @endif
                    @empty

                    @endforelse
                </select>
            </p>
            <p>
                <input type="submit" value="Envoyer">
            </p>
        </fieldset>
    </form>
@endsection