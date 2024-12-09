@extends("layouts.pageLayout")

@section("title", "create a comment")

@section("content")
    <form method = "POST" action = "{{route("comments.store") }}">
        @csrf
        <p>Text: <input type = "text" name = "text" value = "{{ old("text") }}"></p>
        <p>add image functionality here</P>
        <input type = "hidden" name = "id" value = {{$postId}}>
        <input type = "submit" value = "submit">

        <a href="{{ route("comments.index") }}">Cancel</a>
    </form>    
@endsection