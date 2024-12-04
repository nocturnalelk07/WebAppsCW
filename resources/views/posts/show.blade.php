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
            <li><b>user: </b> {{User::find($comment->user_id)->name}}</li>
                <li><b>text: </b> {{$comment->comment_text}}</li>
            @endforeach
        </li>
    </ul>
@endsection
