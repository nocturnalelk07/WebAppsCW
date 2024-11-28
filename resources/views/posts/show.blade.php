@extends("layouts.pageLayout")

@section("title", "user's post")

@section("content")
    <ul>
        <li>title: {{$post->post_title}} </li>
        <li>text: {{$post->post_text}} </li>
        <li>user: {{$post->user_id}} </li>
    </ul>
@endsection
