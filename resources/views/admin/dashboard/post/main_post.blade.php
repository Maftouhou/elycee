@extends('layouts.master')

@section('content')
<h2>Création un article</h2>
<div id="article_container">
    <div class="page_pagination">
        {{$posts->links()}}
    </div>
    <div class="panel">
        <p class="action_response {{session('class')}}">
            {{session('message')}}
            <span></span>
        </p>
        <ul>
            <li><a href="{{url('api/post/create')}}">Ajouter</a></li>
        </ul>
    </div>
    <table class="article_list">
        <thead>
            <tr>
                <td>Titre</td>
                <td>Auteur</td>
                <td>comment</td>
                <td>Status</td>
                <td>Editer</td>
                <td>Supprimer</td>
            </tr>
        </thead>
        <?php $odd = 0; ?>
        @forelse($posts->reverse() as $post)
        <?php $odd++; ?>
        <tbody>
            <tr class="{{$odd%2==0?'evenClass':'oddClass'}}">
                <td><a href="{{url('api/post', $post->id)}}">{{str_limit($post->title, 7)}}</a></td>
                <td><b><em>
                    @if($post->user) {{$post->user->username}}
                    @else pas d'auteur
                    @endif
                </em></b></td>
                <td>
                    @if($post->comment) {{count($post->comment)}}
                    @else pas de commentaire associé
                    @endif
                </td>
                <td>{{$post->status}}</td>
                <td>
                    <a class="edit_post" href="{{url('api/post/'.$post->id.'/edit')}}" class="">edit</a>
                </td>
                <td>
                    <a class="delete_post_request">delete</a>
                    <div class="delete_post_confirmation">
                        <p>Etes vous sûr de vouloir supprimer l'article : {{$post->title}}</p>
                        <form class="delete_post" action="{{url('api/post', $post->id)}}" method="POST">
                            {{method_field('DELETE')}}
                            {{csrf_field()}}
                            <input class="canncel_delete" type="reset" value="Annuler">
                            <input type="submit" value="Supprimer">
                        </form>
                    </div>
                </td>
            </tr>
        </tbody>
        @empty
            <p>Pas d'article</p>
        @endforelse
    </table>
</div>
@endsection