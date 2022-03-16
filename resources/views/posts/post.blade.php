<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <title>Document</title>
</head>
<body>
<a href="/"
   class="mt-5 bg-purple-600 text-white px-4 py-2 rounded-md text-1xl font-medium hover:bg-purple-800 transition duration-300">Go
    back</a>
<section class="flex flex-col items-center ">
    <card class="bg-white p-8 w-[32rem]">
        <header class="flex font-light text-sm">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 rotate-90 -ml-2" viewBox="0 0 24 24"
                 stroke="#b91c1c">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 12H4"/>
            </svg>
            Visit Count: <br>
            {{$post->visit_count}}
        </header>
        <h2 class="font-bold text-3xl mt-2">
            {{$post->name}}
        </h2>

        <p class="font-light">{{$post->excerpt}}</p>
        <p class="font-light">{{$post->description}}</p>
    </card>
    <form action="/post/{{$post->id}}/comments" method="POST">
        @csrf
        <textarea
            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
            type="text" name="comment"></textarea><br>
        <input
            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
            type="submit" name="submit" value="Comment">
    </form>
    @error('comment')
    <div class="text-red-500">{{ 'Whoopss the field was empty try again!' }}</div>
    @enderror
    All Comments:
    <div>

        @foreach($post->comment as $comment) <br>

        <br><span class="bg-gray-200 p-12 m-2 rounded"> {{$comment->name}}
            </span>
        <div class="flex items-center">
            <div class="grid-cols-6 ">
                <form action="{{Route('editComment', ['post' => $comment->post_id, 'comment' => $comment->id])}}"
                      method="POST">
                    @csrf

                    <p class="w-20 bg-blue-400 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded"><input
                            type="submit" name="edit" value="Edit"></p>
                </form>
            </div>
            <div class="grid-cols-6">
                <form action="{{Route('deleteComment',$comment->id)}}" method="POST">
                    @method('DELETE')
                    {{csrf_field()}}
                    <p class="w-20 bg-red-400 hover:bg-red-700 text-white font-bold py-2 px-4 rounded"><input
                            type="submit" name="delete" value="Delete"></p>
                </form>
            </div>
        </div>
        @endforeach
    </div>
</section>
<div class="flex m-5">
    @foreach($post->tags as $tag)
        <button
            class="bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded">
            {{$tag->name}}
        </button>
    @endforeach
</div>
</body>
</html>
</body>
</html>
