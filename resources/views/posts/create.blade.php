@extends("layouts.pageLayout")

@section("title", "create post")

@section("content")
    <form method = "POST" enctype="multipart/form-data" action = "{{route("posts.store") }}">
        @csrf
        <p>Title: <input type = "text" name = "title" value = "{{ old("title") }}"></p>
        <p>Text: <input type = "text" name = "text" value = "{{ old("text") }}"></p>
        <p>hold ctrl to select multiple tags here:</P>
        <p>
            <select name="tag[]" multiple="multiple">
                @foreach ($tags as $tag)
                    <option value = "{{ $tag->id }}">
                        {{$tag->tag_name}}
                    </option>
                @endforeach
            </select>
        </p>
        <p>upload an image: </p>
        <input type = "file" name = "image" value = "{{ old("image") }} accept = "image/*" ><br><br>
        <input type = "submit" value = "submit">
        
        <a href="{{ route("posts.index") }}">Cancel</a>
    </form>
        
@endsection