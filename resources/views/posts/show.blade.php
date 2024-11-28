@extends("layouts.pageLayout")

@section("title", "user's post")

@section("content")
    <ul>
        <li><b>title:</b> {{$post->post_title}} </li>
        <li><b>text:</b> {{$post->post_text}} </li>
        <li><b>user:</b> {{$user}} </li>
        <li><b>post tags: </b></li>
        @foreach($tags as $tag)
            <li> {{$tag->tag_name}} </li>
        @endforeach
    </ul>
@endsection
