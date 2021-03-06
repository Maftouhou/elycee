@extends('layouts.master')

@section('content')
<h2>Enregistrer les réponses à la question <b><u>{{$choice_Arr[0]['question']['title']}}</u></b></h2>
<div id="article_container">
    @if($errors->any)
    <ul class="form_field_error">
        @foreach($errors->all() as $error)
        <li>{{$error}}</li>
        @endforeach
    </ul>
    @endif
    <form action="{{url('api/choices', $choice_Arr[0]['id'])}}" method="POST">
        {{method_field('PATCH')}}
        {{csrf_field()}}
            <p> <input type="hidden" name="user_id" value="{{Auth::user()->id}}" /></p>
            <p> <input type="hidden" name="choice_num" value="{{$choice_num}}" /></p>
            <p> <input type="hidden" name="question_id" value="{{$choice_Arr[0]['question_id']}}" /></p>
            @for ($i = 0; $i < $choice_num; $i++)
                <?php $j = $i+1; ?>
                <p> Reponse  {{$i+1}}</p>
                <p> <textarea name="content_{{$i+1}}" id="" cols="50" rows="6" placeholder="Ecrire la reponse {{$i+1}}">{{$content_choice_Arr['content_'."$j"]}}</textarea> </p>
                <p>
                    <label for="vrai_{{$i+1}}">Vrai </label>
                    <input id="vrai_{{$i+1}}" type="radio" name="corection_{{$i+1}}" value="1" <?= $content_choice_Arr['corection_'."$j"] == 1 ? "checked" : "" ?> required />

                    <label for="faux_{{$i+1}}">Faux </label>
                    <input id="faux_{{$i+1}}" type="radio" name="corection_{{$i+1}}" value="0" <?= $content_choice_Arr['corection_'."$j"] == 0 ? "checked" : "" ?> required />
                </p>
            @endfor
            
            <p> <input type="submit" value="Envoyer"> </p>
    </form>
</div>
@endsection