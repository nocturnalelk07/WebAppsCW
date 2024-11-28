@extends("layouts.pageLayout")

@section("title", "create post")

@section("content")
    <form method = "POST" action = "{{route("posts.store") }}">
        @csrf
        <p>Title: <input type = "text" name = "title" value = "{{ old("title") }}"></p>
        <p>Text: <input type = "text" name = "text" value = "{{ old("text") }}"></p>
        <p>add image functionality here</P>
        <p>
            <select name="tag[]" multiple="multiple">
                @foreach ($tags as $tag)
                    <option value = "{{ $tag->id }}">
                        {{$tag->tag_name}}
                    </option>
                @endforeach
            </select>
        </p>
        <input type = "submit" value = "submit">
        <a href="{{ route("posts.index") }}">Cancel</a>
    </form>    
@endsection