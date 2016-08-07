@extends('layouts.master')

@section('content')
<h2>Liste des commentaires associés au posts {{$post->title}} </h2>
<div id="article_container">
    @if(count($post->comment) !== 0)
    <table class="article_list">
        <thead>
            <tr>
                <td>Titre</td>
                <td>Contenu</td>
                <td>Supprimer</td>
            </tr>
        </thead>
        <?php $odd = 0; ?>
        @forelse($post->comment as $comment)
        <?php $odd++; ?>
        <tbody>
            <tr class="{{$odd%2==0?'evenClass':'oddClass'}}">
                <td><a href="#">{{$comment->title}}</a></td>
                
                <td>
                    <!-- <button class="edit_post">Edit</button> -->
                    <p class="view_post_comment">{{$comment->content}}</p>
                </td>
                <td>
                    <button class="delete_post_request">Delete</button>
                    <div class="delete_post_confirmation">
                        <p>Etes vous sûr de vouloir supprimer le commentaire : {{$comment->title}}</p>
                        <form class="delete_post" action="{{url('comments', $comment->id)}}" method="POST">
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
            <p>Pas de commentaire</p>
        @endforelse
    </table>
    
    @else pas de commentaire associé à l'article <b><u>{{$post->title}}</u></b>
    @endif

</div>

@endsection