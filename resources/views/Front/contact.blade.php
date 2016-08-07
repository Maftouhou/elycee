<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Contact</title>
    <style>
        body{ background-color: black;}
        
        .form_field_error{
            background-color: #828282;
            color: #d0d0d0;
        }
        
        .contact_wrapper{
            width: 100%;
            height: 100%;
            background-color: black;
        }
        
        .back_link{
            font-family: arial;
            font-weight: bold;
            text-decoration: none;
            text-transform: uppercase;
            color: #fff;
            font-size: 12px;
            margin-bottom: 65px;
        }
        
        form.contact {
            margin: 0 auto;
            width: 460px;
        }
        
        form.contact fieldset{
            border: 0;
        }
        
        form.contact fieldset legend {
            font-family: arial;
            font-weight: bold;
            text-transform: uppercase;
            color: #fff;
            font-size: 16px;
            margin-bottom: 65px;
        }
        form.contact p {
            margin-bottom: 25px;
        }
        
        form.contact p input[type=text],
        form.contact p input[type=email],
        form.contact p input[type=password] {
            width: 365px;
            height: 40px;
            border: 0;
            border-bottom: 5px solid #262626;
            background: none;
            padding-left: 7px;
            color: white;
        }
        
        form.contact textArea {
            background: none;
            border: 5px solid #262626;
            color: white;
        }

        form.contact p input[type=submit] {
            padding: 10px 20px;
            background-color: #272727;
            color: #fff;
            border: 0
        }
    </style>
</head>
<body>
    <div class="contact_wrapper">
        
        <div>
            <a class="back_link" href="{{url('/')}}" title="Back to home">Back</a>
        </div>
        <form class="contact" action="{{url('/send')}}" method="POST">
            <fieldset>
                <legend>Contact</legend>
                @if($errors->any)
                <ul class="form_field_error">
                    @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                    @endforeach
                </ul>
                @endif
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