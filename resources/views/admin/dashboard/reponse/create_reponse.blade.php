@extends('layouts.master')

@section('content')
    @if($errors->any)
    <ul class="form_field_error">
        @foreach($errors->all() as $error)
        <li>{{$error}}</li>
        @endforeach
    </ul>
    @endif
    <form action="{{url('api/')}}" method="POST">
        {{csrf_field()}}
            <h2>Reponse à la question {{ $choice_Arr[0]['question']['title'] }}</h2>
            <div id="article_container">
                <p> <input type="hidden" name="user_id" value="{{Auth::user()->id}}" /></p>
                <p> <input type="hidden" name="question_id" value="{{$choice_Arr[0]['question_id']}}" /></p>
                @if($choice_Arr[0]['question'])
                <p>{{ $choice_Arr[0]['question']['content'] }}</p>
                @endif
                
                @for ($i = 0; $i < $content_choice_Arr['choice_num']; $i++)
                    <p> Reponse  {{$i+1}}</p>
                    <?php $j = $i+1; ?>
                    <p>{{$content_choice_Arr[ 'content_'."$j"]}}</p>
                    
                    <p> Vrais <input type="radio" name="choice_{{$i+1}}" value="1" /> </p>
                    <p> Faux <input type="radio" name="choice_{{$i+1}}" value="0" /> </p>
                @endfor
                <p>
                    <input type="submit" value="Envoyer">
                </p>
            </div>
    </form>
@endsection