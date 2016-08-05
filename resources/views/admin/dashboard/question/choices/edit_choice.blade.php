@extends('layouts.master')

@section('content')
<h2>Enregistrer les reponse à la question <b><u>{{$choice_Arr[0]['question']['title']}}</u></b></h2>
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
                    <select name="corection_{{$i+1}}" id="corection_{{$i+1}}" required>
                        <option>--Selectinner--</option>
                        <option value="1">Vrais</option>
                        <option value="0">Faux</option>
                    </select>
                </p>
            @endfor
            
            <p> <input type="submit" value="Envoyer"> </p>
    </form>
</div>
@endsection