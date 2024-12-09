@extends("layouts.pageLayout")

@section("title", "user's post")

@section("content")
    <ul>
        <li><b>title:</b> {{$post->post_title}} </li>
        <li><b>text:</b> {{$post->post_text}} </li>
        <li><b>user:</b> {{$user}} </li>
        <li><b>post tags:</b><br>
            @foreach($tags as $tag)
                {{$tag->tag_name}} <br>
            @endforeach
        </li>
        <li><b>comments:</b>
            @foreach($comments as $comment)
                <p><b>|</b> <a href="{{ route("comments.show", ["id" => $comment->id])}}">{{$comment->comment_text}}</p>
            @endforeach
            <a href="{{ route("comments.create", ["id" => $post->id])}}"> make your own comment!</a>
        </li>
    </ul>
@endsection
