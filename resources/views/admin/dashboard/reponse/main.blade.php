<div id="reponse_container_eleve">
    <table class="article_list">
        <thead>
            <tr>
                <td>Titre</td>
                <td>Auteur</td>
                <td>comment</td>
                <td>Status</td>
                <td>Editer</td>
                <td>Suprimer</td>
            </tr>
        </thead>
        <?php $odd = 0; ?>
        @forelse($posts->reverse() as $post)
        <?php $odd++; ?>
        <tbody>
            <tr class="{{$odd%2==0?'evenClass':'oddClass'}}">
                <td><a href="{{url('post', $post->id)}}">{{str_limit($post->title, 7)}}</a></td>
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
                    <a class="edit_post" href="{{url('post/'.$post->id.'/edit')}}" class="">&ocir;</a>
                </td>
                <td>
                    <button class="delete_post_request"></button>
                    <div class="delete_post_confirmation">
                        <p>Etes vous sûr de vouloir supprimer l'article : {{$post->title}}</p>
                        <form class="delete_post" action="{{url('post', $post->id)}}" method="POST">
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
            <p>Pas d'article</p>
        @endforelse
    </table>
</div>
