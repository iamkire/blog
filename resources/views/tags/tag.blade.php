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
<section class="flex justify-center">
    <form action="{{Route('storeTag')}}" method="post">
        @csrf
        Add Tag <br>
        <input
            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
            type="text" name="tag"> <br>
        <input
            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
            type="submit" name="submit">
        @error('tag')
        <div class="text-red-500">{{ $message }}</div>
    @enderror
</section>
</form>
</section>
</body>
</html>

