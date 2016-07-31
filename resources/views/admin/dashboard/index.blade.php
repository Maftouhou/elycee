@extends('layouts.master')

@section('content')
<div class="wrapper">
    
    @if ($user_role === 'teacher')
        @include('admin.dashboard.post.main')
    @else 
        @include('admin.dashboard.reponse.main')
    @endif
    
</div>
@endsection