<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Posts ')}}
        </h2>
    </x-slot>

    <div class = "py-12">

        <div class = "max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class = "bg-white overflow-hidden shadow-sm sm:rounded-lg">

                <div class = "p-6 text-grey-900">
                    {{ __($joke)}}
                </div>

            </div>
        </div>

    
        @if(session("message"))
        <div class = "py-12">

            <div class = "max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class = "bg-white overflow-hidden shadow-sm sm:rounded-lg">

                    <div class = "p-6 text-grey-900">
                        <b>{{session("message")}}</b>
                    </div>

                </div>
            </div>

        </div>
        @endif()

        @if($errors->any())
        <div>
            <div class = "py-12">

                <div class = "max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div class = "bg-white overflow-hidden shadow-sm sm:rounded-lg">

                        <div class = "p-6 text-grey-900">
                            <b>error: </b>
                        </div>

                    </div>
                </div>

            </div>
            <ul>
                @foreach ($errors->all() as $error)
                <div class = "py-12">

                <div class = "max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div class = "bg-white overflow-hidden shadow-sm sm:rounded-lg">

                        <div class = "p-6 text-grey-900">
                            <b>{{$error}} </b>
                        </div>

                    </div>
                </div>

            </div>
                @endforeach
            </ul>
        </div>
        @endif
        </div>
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
</div>
</x-app-layout>