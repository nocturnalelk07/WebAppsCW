@extends("layouts.testLayout")

@section("title", "User details")

@section("content")
    <ul>
        <li>Name: {{$user->name}} </li>
        <li>password: {{$user->password}} </li>  
    </ul>
@endsection
