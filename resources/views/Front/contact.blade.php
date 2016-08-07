<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Contact</title>
    <style>
        
    </style>
</head>
<body>
    <div class="wrapper">
        
        <div>
            <a href="{{url('/')}}" title="Back to home">Back</a>
        </div>
        <form action="{{url('/send')}}" method="POST">
            <fieldset>
                <legend>Contact</legend>
                {{csrf_field()}}
                <p> <input type="text" name="nom" placeholder="Votre nom"> </p>
                <p> <input type="text" name="prenom" placeholder="Votre prénom"> </p>
                <p> <input type="email" name="email" placeholder="Votre email"> </p>
                <p> <input type="text" name="titre" placeholder="Titre du message"> </p>
                <p> <textarea name="message" cols="50" rows="6" placeholder="Votre message"></textarea> </p>
                <p> <input type="submit" value="Envoyer" /> </p>
            </fieldset>
        </form>
        
    </div>
</body>
</html>