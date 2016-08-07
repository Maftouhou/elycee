@extends('layouts.master')

@section('content')
    <h2>Ajouter un nouvel article </h2>
    <div id="article_container">
    @if($errors->any)
    <ul class="form_field_error">
        @foreach($errors->all() as $error)
        <li>{{$error}}</li>
        @endforeach
    </ul>
    @endif
    <form action="{{url('api/questions')}}" method="POST">
        {{csrf_field()}}
            <p> <input type="hidden" name="user_id" value="{{Auth::user()->id}}" /></p> 
            <p>Nombre de réponses possibles </p>
            <p> <input type="number" name="choice_num" placeholder="Entrez le nombre de choix possibles..." required> </p>
            <p>Titre de l'article </p>
            <p> <input type="text" name="title" placeholder="Titre de l'Article" required> </p>
            <p>Contenu de l'article </p>
            <p> <textarea name="content" id="" cols="50" rows="6" placeholder="Contenu de l'article" required></textarea> </p>
            <p>Selectionner la classe <br />
                <select name="class" required>
                    <option> -- selectionner -- </option>
                    <option value="premiere">Première</option>
                    <option value="terminal">Terminal</option>
                </select>
            </p>
            
            <legend>Gérer la publication </legend>
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