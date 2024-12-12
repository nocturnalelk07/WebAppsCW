@extends("layouts.pageLayout")

@section("title", "create a comment")

@section("content")
    <form method = "POST" action = "{{route("comments.store") }}">
        @csrf
        <p>Text: <input type = "text" name = "text" value = "{{ old("text") }}"></p>
        <p>add image functionality here</P>
        <input type = "hidden" name = "id" value = {{$commentableId}}>
        <input type = "hidden" name = "type" value = {{$type}}>
        <input type = "hidden" name = "returnId" value = {{$cancelId}}>
        <input type = "submit" value = "submit">

        <a href="{{ route("posts.show", ["id" =>$cancelId]) }}">Cancel</a>
    </form>    
@endsection