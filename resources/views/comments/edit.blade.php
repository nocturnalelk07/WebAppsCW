@extends("layouts.pageLayout")

@section("title", "edit comment")

@section("content")
    <form method = "POST" action = "{{route("comments.update", ["id" => $comment->id])}}">
        @csrf
        @method('PUT')
        <p>Text: <input type = "text" name = "text" value = "{{ old("text") }}"></p>
        <p>add image functionality here</P>
        <input type = "submit" value = "submit">
        <a href="{{ route("posts.show", ["id" => $comment->id]) }}">Cancel</a>
    </form>
@endsection