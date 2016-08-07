@extends('layouts.master')

@section('content')
    <h2>Ajouter une question </h2>
    <div id="article_container">
    @if($errors->any)
    <ul class="form_field_error">
        @foreach($errors->all() as $error)
        <li>{{$error}}</li>
        @endforeach
    </ul>
    @endif
    <form class="dashboard" action="{{url('api/questions')}}" method="POST">
        {{csrf_field()}}
            <p> <input type="hidden" name="user_id" value="{{Auth::user()->id}}" /></p> 
            <p>Nombre de réponses possibles </p>
            <p> <input type="number" name="choice_num" placeholder="Entrez le nombre de choix possibles..." required> </p>
            <p>Titre de la question </p>
            <p> <input type="text" name="title" placeholder="Titre de la question" required> </p>
            <p>Contenu de la question </p>
            <p> <textarea name="content" id="" cols="50" rows="6" placeholder="Contenu de la question" required></textarea> </p>
            <p>Selectionner la classe <br />
                <select name="class" required>
                    <option> -- selectionner -- </option>
                    <option value="premiere">Première</option>
                    <option value="terminal">Terminal</option>
                </select>
            </p>
            
            <p>Gérer la publication </p>
                <label for="publish">Publier maintenant </label>
                <input id="publish" type="radio" name="status" value="publish" required />
            
                <label for="unpublish">Publier plus tard </label>
                <input id="unpublish" type="radio" name="status" value="unpublish" required />
            </p>
            <p>
                <input type="submit" value="Envoyer">
            </p>

    </form>

</div>
@endsection