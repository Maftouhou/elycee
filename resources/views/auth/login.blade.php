@extends('layouts.master')

@section('content')
    <p class="action_response {{session('class')}}">
        {{session('message')}}
        <span></span>
    </p>
    <form id="login_request" action="{{url(('api/login'))}}" method="POST">
        {{csrf_field()}}
        <fieldset>
            <legend>Identifier-vous</legend>
            
            <p>
                <input type="text" name="username" placeholder="Your name here" required="">
            </p>
            <p>
                <input type="password" name="password" placeholder="Your password here" required>
            </p>
            <p>
                <input type="submit" value="Connection">
            </p>
        </fieldset>
    </form>
@endsection
