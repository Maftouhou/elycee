@extends('layouts.master')

@section('content')
    <form action="{{url('post')}}" method="POST" enctype="multipart/form-data">
        {{csrf_field()}}
        <fieldset>
            <legend>Editer l'article</legend>
            
            <p>Creer un nouvel article </p>
                <input type="hidden" name="user_id" value="{{$userId}}" />
            <p>Titre de l'article <br>
                <input type="text" name="title" placeholder="Titre de l'Article">
            </p>
            <p>Contenu de l'article <br>
                <textarea name="content" id="" cols="30" rows="10" placeholder="Contenu de l article"></textarea>
            </p>
            <p>
                <label for="picture">Télécharger une photo</label>
                <input type="file" id="picture" name="picture" />
            </p>
        </fieldset>

        <fieldset>
            <legend>Selectionner les options</legend>
            <p>Status de l'article </p>
            <p>
                <label for="draft">draft</label>
                <input type="radio" id="draft" name="status" value="draft"><br>
                <label for="online">online</label>
                <input type="radio" id="online" name="status" value="online"><br>
                <label for="offline">offline</label>
                <input type="radio" id="offline" name="status" value="offline"><br>
            </p>
            <p> Selectionner une categorie <br>
                <select name="category_id" id="">
                    <option>- Selectionner -</option>
                    @forelse($categories as $category)
                        @if(!is_null($category))
                            <option value="{{$category->id}}">{{$category->title}}</option>
                        @else

                        @endif
                    @empty

                    @endforelse
                </select>
            </p>
            <p>Selectionner une des mots clé <br>
                <select name="tag_id[]" id="" multiple>
                    <?php $odd = 0; ?>
                    @forelse($tags as $tag_id => $tag_value)
                        <?php $odd++; ?>
                        @if(!is_null($tag_value))
                            <option value="{{$tag_id}}" class="{{$odd%2==0?'even':'odd'}}" >{{$tag_value}}</option>
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