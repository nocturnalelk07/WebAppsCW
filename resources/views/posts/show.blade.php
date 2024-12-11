@extends("layouts.pageLayout")

@section("title", "user's post")

@section("content")
    <ul>
        <li><b>OP:</b> <a href="{{ route("users.show", ["id" => $post->user_id])}}">{{$post->user->name}}</a></li>
        <li><b>post tags:</b><br>
            @foreach($tags as $tag)
                {{$tag->tag_name}} <br>
            @endforeach
        </li>
        <li><b>title:</b> {{$post->post_title}} </li>
        <li><b>text:</b> {{$post->post_text}} </li>
        @if($post->contains_image)
        <img src={{asset("storage/" . $post->image_location)}} alt = "user submitted image"/>
        @endif
        <li><b>edit post:</b> <a href="{{ route("posts.edit", ["id" => $post->id])}}">edit post</a></p>
        
        <li><b>comments:</b>
            @foreach($post->comments as $comment)
                <p><b>|</b> <a href="{{ route("users.show", ["id" => $comment->user_id])}}">{{$comment->user->name}}</a></p>
                <p><b>|</b> {{$comment->comment_text}}<br></p>
                <p><b>|</b> <a href="{{ route("comments.edit", ["id" => $comment->id])}}">edit</a><br></p>
                <a href="{{ route("comments.create", ["id" => $comment->id, "type" => "App\Models\Comment"])}}"> reply</a>
                
                @foreach($comment->comments as $child)
                <p>     -----| <a href="{{ route("users.show", ["id" => $child->user_id])}}">{{$child->user->name}}</a></p>
                <p><b>  -----|</b> <a href="{{ route("comments.show", ["id" => $child->id])}}">{{$child->comment_text}}</a><br></p>
                <p><b>  -----|</b> <a href="{{ route("comments.edit", ["id" => $child->id])}}">edit</a><br></p>
                <p><b>--------------------------------------------------------</b></p>
                @endforeach
                <p><b>--------------------------------------------------------</b></p>
            @endforeach
            <a href="{{ route("comments.create", ["id" => $post->id, "type" => "App\Models\Post"])}}"> make your own comment!</a>
        </li>
    </ul>
@endsection
