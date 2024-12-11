@extends("layouts.pageLayout")

@section("title", "User details")

@section("content")
    <ul>
        <li>Name: {{$user->name}} </li>
        <li>email: {{$user->email}}</li>  
        <li>user posts: </li>
        @foreach($posts as $post)
                <p><b>|</b> <a href="{{ route("posts.show", ["id" => $post->id])}}">{{$post->post_title}}</a><br></p>
                <p><b>--------------------------------------------------------</b></p>
            @endforeach
        <li>user comments: </li>
        @foreach($comments as $comment)
        @if($comment->commentable_type == "App\Models\Post")
                <p><b>|</b> post title: <a href="{{ route("posts.show", ["id" => $comment->commentable_id])}}">{{$comment->commentable->post_title}}</a></p>
                <p><b>|</b> {{$comment->comment_text}}</a></p>
                <p><b>--------------------------------------------------------</b></p>
                @endif
            @endforeach
    </ul>
@endsection
