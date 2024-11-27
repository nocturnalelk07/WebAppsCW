@extends("layouts.pageLayout")

@section("title", "User details")

@section("content")
    <ul>
        <li>Name: {{$user->name}} </li>
        <li>email: {{$user->email}}</li>  
    </ul>
@endsection
