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
<section class="flex flex-col items-center">
    @foreach($posts as $post)
        <form method="POST" action="{{route('update',$post->id)}}">
            @method('PUT')
            {{csrf_field()}}
            <p class="text-2xl bg-gray-200 rounded m-5 p-1"> Edit Post </p><br>
            <input
                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                type="text" name="edit" value="{{$post->name}}"> <br>
            <textarea
                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                type="text" name="editDesc">{{$post->description}}</textarea>
            <input
                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                type="submit" name="submit" value="Submit"> <br>
        </form>
    @endforeach
</section>
</body>
</html>
