@extends("layouts.pageLayout")

@section("title", "Users")

@section("content")
    <p>users: </p>
    <ul>
        @foreach ($users as $user)
            <li><a href="{{ route("users.show", ["id" => $user->id]) }}"> {{$user->name}}</a></li>
        @endforeach
    </ul>        
@endsection   