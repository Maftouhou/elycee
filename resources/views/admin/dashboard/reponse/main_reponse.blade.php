@extends('layouts.master')

@section('content')
<h2>liste des questions - Choisir une question pour commencer à repondres</h2>
<div id="article_container">
    @if($questions)
    <table class="article_list">
        <thead>
            <tr>
                <td>Titre</td>
                <td>Note</td>
                <td>Status</td>
            </tr>
        </thead>
        <?php $odd = 0; ?>
        @forelse($questions as $question)
        <?php $odd++; ?>
        <tbody>
            <tr class="{{$odd%2==0?'evenClass':'oddClass'}}">
                <td><a href="{{url('api/qcm_reposne', $question->id)}}">{{str_limit($question->title, 7)}}</a></td>
                <td>
                
                </td>
                <td> {{ $class = App\Score::StatusDone($question->id, Auth::user()->id)}} <span class="{{$class}}"></span></td>
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