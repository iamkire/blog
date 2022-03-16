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
    @foreach($comments as $comment)
        <form action="{{route('updateComment', ['post' => $comment->post_id, 'comment' => $comment->id])}}"
              method="POST"><br>
            @csrf
            @method('PUT')
            Edit comment: <br>
            <textarea
                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                name="editComment">{{$comment->name}}</textarea> <br>
            <input
                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                placeholder="Edit" type="submit" name="submit"> <br>
        </form>
    @endforeach
</section>
</body>
</html>
