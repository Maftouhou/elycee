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
            
<<<<<<< HEAD
            <p> Nombre de réponses possibles</p>
            <p> <input type="text" name="choice_num" placeholder="Entrez le nombre de choix possibles..."> </p>
=======
            <p> Nombre des choix des reponses </p>
            <p> <input type="number" name="choice_num" placeholder="Entrer le nombre des choix possible" required> </p>
>>>>>>> 70eab476ff7704ab4d3f87e5e17362916f5d944d
            <p> Titre de l'article </p>
            <p> <input type="text" name="title" placeholder="Titre de l'Article" required> </p>
            <p> Contenu de l'article </p>
<<<<<<< HEAD
            <p> <textarea name="content" id="" cols="50" rows="6" placeholder="Contenu de l'article"></textarea> </p>
            <p> Sélectionner la classe <br />
                <select name="class">
                    <option> -- sélectionner -- </option>
                    <option value="premiere" > Première</option>
=======
            <p> <textarea name="content" id="" cols="50" rows="6" placeholder="Contenu de l article" required></textarea> </p>
            <p> Selectionner la classe <br />
                <select name="class" required>
                    <option> -- selectionner -- </option>
                    <option value="premiere"> Première</option>
>>>>>>> 70eab476ff7704ab4d3f87e5e17362916f5d944d
                    <option value="terminal"> Terminal</option>
                </select>
            </p>
            
            <legend>Gerer la publication </legend>
            <p>
<<<<<<< HEAD
                <label for="publish">Publier maintenant </label>
                <input id="publish" type="radio" name="status" value="publish" />
            
                <label for="unpublish">Publier plus tard </label>
                <input id="unpublish" type="radio" name="status" value="unpublish" />
=======
                <label for="publish">Publier maintement </label>
                <input id="publish" type="radio" name="status" value="publish" required />
            
                <label for="unpublish">Publier Plus tard </label>
                <input id="unpublish" type="radio" name="status" value="unpublish" required />
>>>>>>> 70eab476ff7704ab4d3f87e5e17362916f5d944d
            </p>
            <p>
                <input type="submit" value="Envoyer">
            </p>

    </form>

</div>
@endsection