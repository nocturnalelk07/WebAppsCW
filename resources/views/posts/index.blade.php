@extends("layouts.pageLayout")

@section("title", "Posts")

@section("content")
    <div>
        <a href="{{ route("posts.create")}}"> make your own post!</a>
    </div>
    <p>posts: </p>
    <ul>
        @foreach ($posts as $post)
            <li><a href="{{ route("posts.show", ["id" => $post->id]) }}"> {{$post->post_title}}</a></li>
        @endforeach
    </ul>        
@endsection   