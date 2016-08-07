@extends('layouts.master')

@section('content')
<p class="action_response {{session('class')}}">
    {{session('message')}}
    <span></span>
</p>
<h2>liste des questions - Choisir une question pour commencer à répondre</h2>
<div id="article_container">
    <div class="page_pagination">
        {{$questions->links()}}
    </div>
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
                <td><a href="{{url('api/qcm_reponse', $question->id)}}">{{str_limit($question->title, 30)}}</a></td>
                <td>
                @foreach (App\Score::Note($question->id, Auth::user()->id) as $note)
                    {{ $note }}
                @endforeach
                </td>
                <td> {{ $class = App\Score::StatusDone($question->id, Auth::user()->id)}} <span class="{{$class}}"></span></td>
            </tr>
        </tbody>
        @empty
            <p>Pas de question.</p>
        @endforelse
    </table>
    @else Vous n'avez pas de QCM à faire
    @endif
</div>
@endsection
