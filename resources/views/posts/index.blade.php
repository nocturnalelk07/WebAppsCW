<!--
@extends("layouts.pageLayout")

@section("title", "Posts")

@section("content")
    <div>
        <a href="{{ route("posts.create")}}"> make your own post!</a>
    </div>
    <p>posts: </p>
    <ul>
        @foreach ($posts as $post)
            <li><a href="{{ route("posts.show", ["id" => $post->id]) }}"> {{$post->post_title}}</a></li>
        @endforeach
    </ul>        
@endsection   
-->
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Posts') }}
        </h2>
    </x-slot>

    <div class = "py-12">

        <div class = "max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class = "bg-white overflow-hidden shadow-sm sm:rounded-lg">

                <div class = "p-6 text-grey-900">
                    <a href="{{ route("posts.create")}}"> make your own post!</a>
                </div>

            </div>
        </div>

    </div>

    <div>
    @foreach ($posts as $post)
        <div class = "py-12">

            <div class = "max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class = "bg-white overflow-hidden shadow-sm sm:rounded-lg">

                    <div class = "p-6 text-grey-900">
                        <a href="{{ route("posts.show", ["id" => $post->id]) }}">{{ $post->post_title}}</a>
                    </div>

                </div>
            </div>

        </div>
    @endforeach
    
    </div>
 <div class = "container">
    {{ $posts->links() }}
</div>
</x-app-layout>