@extends("layouts.pageLayout")

@section("title", "user's post")

@section("content")
    <ul>
        <li><b>OP:</b> <a href="{{ route("users.show", ["id" => $post->user_id])}}">{{$post->user->name}}</a></li>
        <li><b>title:</b> {{$post->post_title}} </li>
        <li><b>text:</b> {{$post->post_text}} </li>
        <li><b>edit post:</b> <a href="{{ route("posts.edit", ["id" => $post->id])}}">edit post</a></p>
        <li><b>post tags:</b><br>
            @foreach($tags as $tag)
                {{$tag->tag_name}} <br>
            @endforeach
        </li>
        <li><b>comments:</b>
            @foreach($comments as $comment)
                <p>| <a href="{{ route("users.show", ["id" => $comment->user_id])}}">{{$comment->user->name}}</a></p>
                <p><b>|</b> <a href="{{ route("comments.show", ["id" => $comment->id])}}">{{$comment->comment_text}}</a><br></p>
                <p><b>--------------------------------------------------------</b></p>
            @endforeach
            <a href="{{ route("comments.create", ["id" => $post->id])}}"> make your own comment!</a>
        </li>
    </ul>
@endsection
