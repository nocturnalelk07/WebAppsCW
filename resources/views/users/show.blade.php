@extends("layouts.pageLayout")

@section("title", "User details")

@section("content")
    <ul>
        <li>Name: {{$user->name}} </li>
        <li>email: {{$user->find($user->id)->email->email}}</li>  
    </ul>
@endsection
