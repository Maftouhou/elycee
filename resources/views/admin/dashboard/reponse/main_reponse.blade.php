@extends('layouts.master')

@section('content')
<h2>liste des questions - Choisir une question pour commencer à repondres</h2>
<div id="article_container">
    @if($questions)
    <table class="article_list">
        <thead>
            <tr>
                <td>Titre</td>
                <td>Class</td>
                <td>Status</td>
            </tr>
        </thead>
        <?php $odd = 0; ?>
        @forelse($questions as $question)
        <?php $odd++; ?>
        <tbody>
            <tr class="{{$odd%2==0?'evenClass':'oddClass'}}">
                <td><a href="{{url('api/qcm_reponse', $question->id)}}">{{str_limit($question->title, 7)}}</a></td>
                <td> {{$question->class}} </td>
                <td> {{$question->status}} </td>
            </tr>
        </tbody>
        @empty
            <p>Pas de question à repondre</p>
        @endforelse
    </table>
    @else Vous n'avez pas de QCM à faire
    @endif
</div>
@endsection