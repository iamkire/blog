<x-app-layout>
    <x-slot name="header">

    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    You're logged in!
                </div>
            </div>
        </div>
    </div>


    <!doctype html>
    <html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    </head>
    <body>


    <div class="m-5 flex flex justify-center ">
        <a class="m-1 bg-gray-700 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded "
           href="dashboard/post/create">Create a new Post</a> <br>

        <a class="m-1 bg-gray-700 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded "
           href="dashboard/category/create">Add a Category</a> <br>
        <a class="m-1 bg-gray-700 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded "
           href="dashboard/tag/create">Add a Tag</a> <br>


    </div>
    <section class="flex flex-wrap -mx-1 lg:-mx-4 justify-center">

        @forelse($posts as $post)

            <div
                class="m-5 text-white p-6 max-w-sm bg-white rounded-lg border border-gray-200 shadow-md dark:bg-gray-800 dark:border-gray-700">
                <h1 class="text-2xl  rounded p-1 m-3 ">{{$post->name}}</h1>
                <p class="inline-block align-middle w-4/5">{{$post->description}}</p>

                <div class="flex items-center">
                    <div class="grid-cols-6 ">
                        <form action="{{route('edit',$post->id)}}" method="POST">
                            {{csrf_field()}}
                            <p class="w-20 bg-blue-400 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded"><input
                                    type="submit" name="edit" value="Edit"></p>
                        </form>
                    </div>
                    <div class="grid-cols-6">
                        <form action="{{route('delete',$post->id)}}" method="POST">
                            @method('DELETE')
                            {{csrf_field()}}
                            <p class="w-20 bg-red-400 hover:bg-red-700 text-white font-bold py-2 px-4 rounded"><input
                                    type="submit" name="delete" value="Delete"></p>
                        </form>
                    </div>
                </div>
            </div>
        @empty
            No posts yet
        @endforelse

    </section>

    </body>
    </html>
</x-app-layout>


