<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
<nav class="bg-white border-gray-200 px-2 sm:px-4 py-2.5 rounded dark:bg-gray-800">
    <div class="container flex flex-wrap justify-between items-center mx-auto">
        <a href="#" class="flex items-center">

            <span class="self-center text-xl font-semibold whitespace-nowrap dark:text-white">My blog</span>
        </a>
        <div class="flex md:order-2">
            <span class="sr-only">Open main menu</span>
            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd"
                      d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z"
                      clip-rule="evenodd"></path>
            </svg>
            <svg class="hidden w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd"
                      d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                      clip-rule="evenodd"></path>
            </svg>
            </button>
        </div>
        <div class="hidden justify-between items-center w-full md:flex md:w-auto md:order-1" id="mobile-menu-4">
            <ul class="flex flex-col mt-4 md:flex-row md:space-x-8 md:mt-0 md:text-sm md:font-medium">
                <li>
                    <a href="{{route('welcome')}}"
                       class="block py-2 pr-4 pl-3 text-white bg-blue-700 rounded md:bg-transparent md:text-blue-700 md:p-0 dark:text-white"
                       aria-current="page">Home</a>
                </li>
                <li>
                    <a href="{{route('dashboard')}}"
                       class="block py-2 pr-4 pl-3 text-gray-700 border-b border-gray-100 hover:bg-gray-50 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 md:dark:hover:text-white dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">Dashboard</a>
                </li>
                <li>
                    <a href="{{route('login')}}"
                       class="block py-2 pr-4 pl-3 text-gray-700 border-b border-gray-100 hover:bg-gray-50 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 md:dark:hover:text-white dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">Login</a>
                </li>
                <li>
                    <a href="{{route('register')}}"
                       class="block py-2 pr-4 pl-3 text-gray-700 border-b border-gray-100 hover:bg-gray-50 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 md:dark:hover:text-white dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">Register</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<section class="flex justify-center p-5">
    @foreach($categories as $cat)
        <a href="/posts/category/{{$cat}}"
           class="bg-gray-700 hover:bg-blue-400 text-white font-bold py-2 px-4 border-b-4 border-gray-700 hover:border-gray-700 rounded">
            {{$cat}}
        </a>
    @endforeach
</section>

<section class="flex flex-wrap -mx-1 lg:-mx-4 justify-center">
    @forelse($posts as $post)
        <div
            class="m-5 text-white p-6 max-w-sm bg-white rounded-lg border border-gray-200 shadow-md dark:bg-gray-800 dark:border-gray-700">
            <div class="mb-8">
                <p class="text-sm text-gray-600 flex items-center"></p>
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 rotate-90 -ml-2" viewBox="0 0 24 24"
                     stroke="#b91c1c">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 12H4"/>
                </svg>
                <h1 class="text-red-500 text-2xl rounded p-1 m-3 "><a
                        href="{{route('showPost',$post->id)}}">{{$post->name}}</a></h1>
                <p class="text-center  text-gray-200">By {{$post->user->name}}<p/>
                <p class="m-2 inline-block align-middle w-3/5">{{$post->excerpt}}</p></p>
            </div>
            <div class="flex items-center">
            </div>
        </div>
        </div>

    @empty
        No posts yet
    @endforelse

</section>
</body>
</html>
</body>
</html>
