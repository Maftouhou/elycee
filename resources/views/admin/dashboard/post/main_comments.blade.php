@extends('layouts.master')

@section('content')

<article class="article_wrapper single_post">
    <h1>{{$post->title}}</h1>
    
    @if(count($post->comment) !== 0)
    <h3>Liste des commentaires associé au posts <b><u>{{$post->title}}</u></b></h3>
    <table class="article_list">
        <thead>
            <tr>
                <td>Titre</td>
                <!--<td>Afficher</td>-->
                <td>Suprimer</td>
            </tr>
        </thead>
        <?php $odd = 0; ?>
        @forelse($post->comment as $comment)
        <?php $odd++; ?>
        <tbody>
            <tr class="{{$odd%2==0?'evenClass':'oddClass'}}">
                <td><a href="#">{{$comment->title}}</a></td>
                
<!--                <td>
                    <a href="#" class="edit_post">Afficher</a>
                    <p class="view_post_comment">{{$comment->content}}</p>
                </td>-->
                <td>
                    <a href="#" class="delete_post_request">Suprimer</a>
                    <div class="delete_post_confirmation">
                        <p>Etes vous sûr de vouloir supprimer le commentaire : {{$comment->title}}</p>
                        <form class="delete_post" action="{{url('comments', $comment->id)}}" method="POST">
                            {{method_field('DELETE')}}
                            {{csrf_field()}}
                            <input class="canncel_delete" type="reset" value="Annuler">
                            <input type="submit" value="virer-le">
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
</article>

@endsection
