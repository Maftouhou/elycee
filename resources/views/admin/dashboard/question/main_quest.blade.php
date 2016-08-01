@extends('layouts.master')

@section('content')
<h2>Creation des questions</h2>
<div id="article_container">
    <div class="panel">
        <p class="action_response {{session('class')}}">
            {{session('message')}} <span></span>
        </p>
        <ul>
            <li><a href="{{url('api/questions/create')}}">Ajouter</a></li>
        </ul>
    </div>
    <table class="article_list">
        <thead>
            <tr>
                <td>Titre</td>
                <td>Contenu</td>
                <td>class</td>
                <td>Status</td>
                <td>Editer</td>
                <td>Suprimer</td>
            </tr>
        </thead>
        <?php $odd = 0; ?>
        @forelse($questions->reverse() as $question)
        <?php $odd++; ?>
        <tbody>
            <tr class="{{$odd%2==0?'evenClass':'oddClass'}}">
                <td><a href="{{url('api/questions', $question->id)}}">{{str_limit($question->title, 7)}}</a></td>
                <td> {{str_limit($question->content, 20)}} </td>
                <td> {{$question->class}} </td>
                <td> {{$question->status}} </td>
                <td>
                    <a class="edit_post" href="{{url('api/questions/'.$question->id.'/edit')}}" class="">&ocir;</a>
                </td>
                <td>
                    <button class="delete_post_request"></button>
                    <div class="delete_post_confirmation">
                        <p>Etes vous sûr de vouloir supprimer la question : {{$question->title}}</p>
                        <form class="delete_post" action="{{url('api/questions', $question->id)}}" method="POST">
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
@endsection