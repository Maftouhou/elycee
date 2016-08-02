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
        <fieldset>
            <legend>Enregistrer les reponse à la question {{$question->title}}</legend>
            <p> <input type="hidden" name="user_id" value="{{Auth::user()->id}}" /></p>
            <p> <input type="hidden" name="question_id" value="{{$question->id}}" /></p>
            
            @for ($i = 0; $i < $choice_num; $i++)
                <p> Reponse  $i</p>
                <p> <textarea name="content" id="" cols="50" rows="6" placeholder="Contenu de l article"></textarea> </p>
                <input type="checkbox" name="vrai_{{$i}}" value="1" />
                <input type="checkbox" name="faux_{{$i}}" value="0" />
            @endfor
            <p>
                <input type="submit" value="Envoyer">
            </p>
        </fieldset>
    </form>
@endsection