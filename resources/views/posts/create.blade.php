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
    <form action="{{Route('storePost')}}" method="POST">
        @csrf
        <p class="text-3xl bg-gray-200 rounded m-5 p-1">Add New Post:</p><br>
        Add heading:
        <input
            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
            type="text" name="title"> <br>
        @error('title')
        <div class="text-white bg-red-600 rounded">{{ $message }}</div>
        @enderror
        Add Excerpt
        <input
            class="mb-2 shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
            type="text" name="excerpt"> <br>
        @error('excerpt')
        <div class="text-white bg-red-600 rounded">{{ $message }}</div>
        @enderror

        <select name="category" multiple class="form-select appearance-none block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding bg-no-repeat border border-solid border-gray-300 rounded transition ease-in-out m-0
      focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" aria-label="Default select example">
            <option selected>Select category</option>
            @foreach ($categories as $category)
                <option name="category[]" value="{{$category->id }}">{{ $category->name }}</option>
            @endforeach
        </select>
        @error('category')
        <div class="text-white bg-red-600 rounded">{{ $message }}</div>
        @enderror
        <div class="form-group">
            <div class="checkbox">
                <label for="">Add Tags </label> <br>
                @foreach($tags as $tag)
                    <label for="tag"><input type="checkbox"
                                            value="{{$tag->id}}"
                                            name="tag[]">{{$tag->name}}</label>
            </div>
            @endforeach
        </div>
        <br>
        @error('tag')
        <div class="text-white bg-red-600 rounded">{{ $message }}</div>
        @enderror
        Add Description:
        <textarea
            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
            type="text" name="description"></textarea><br>
        @error('description')
        <div class="text-white bg-red-600 rounded">{{ $message }}</div>
        @enderror
        <input
            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
            type="submit" name="submit">
    </form>
</section>
</body>
</html>
