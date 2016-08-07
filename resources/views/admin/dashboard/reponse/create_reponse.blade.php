@extends('layouts.master')

@section('content')
<h2>Réponse à la question <b><u>{{ $choice_Arr[0]['question']['title'] }}</u></b></h2>
<div id="article_container">
    @if($errors->any)
    <ul class="form_field_error">
        @foreach($errors->all() as $error)
        <li>{{$error}}</li>
        @endforeach
    </ul>
    @endif
    <form class="dashboard" action="{{url('api/qcm_reponse')}}" method="POST">
        {{csrf_field()}}
            <p> <input type="hidden" name="user_id" value="{{Auth::user()->id}}" /></p>
            <p> <input type="hidden" name="question_id" value="{{$choice_Arr[0]['question_id']}}" /></p>
            <p> <input type="hidden" name="choice_id" value="{{$choice_Arr[0]['id']}}" /></p>
            <p> <input type="hidden" name="score_id" value="{{$score->id}}" /></p>
            
            @if($choice_Arr[0]['question'])
            <p> {{$choice_Arr[0]['question']['content']}} </p>
            @endif
            
            @for ($i = 0; $i < $content_choice_Arr['choice_num']; $i++)
                <p> Reponse  {{$i+1}}</p>
                <?php $j = $i+1; ?>
                <p>{{$content_choice_Arr[ 'content_'."$j"]}}</p>
                <p> <input type="radio" name="choice_repose" value="{{'content_'.$j}}" required /> </p>
            @endfor
            <p>
                <input type="submit" value="Envoyer">
            </p>
    </form>
</div>
@endsection