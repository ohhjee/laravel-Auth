<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <title>My Form</title>
</head>

<body class="bg-gray-300">
    <nav class="bg-gray-100 flex justify-between items-center py-2 px-4">
        <div class="rounded bg-black md:w-1/12 w-3/12">
            <a href="{{ route('posts.index') }}"><img src="{{ asset('image/6.png') }}" class="text-white" alt=""
                    srcset=""></a>
        </div>
        <ul class="flex ">
            @auth
                <li> <a href="{{ route('dashboard') }}"
                        class="mx-3 text-xs md:text-sm capitalize font-medium">{{ auth()->user()->name }}</a>
                </li>
                <li>

                    {{-- <a href="{{ route('logout') }}" class="font-medium capitalize ">log out</a> --}}
                    <form action="{{ route('logout') }}" method="post">
                        @csrf
                        <button type="submit" class="text-xs md:text-sm capitalize font-medium">logout</button>
                    </form>
                </li>

            @endauth

            @guest
                <li> <a href="{{ route('login') }}" class="mx-3 text-xs md:text-sm capitalize font-medium">login</a></li>
                <li> <a href="{{ route('register') }}" class="text-xs md:text-sm capitalize font-medium">register</a>
                </li>
            @endguest
        </ul>
    </nav>
    <nav class="bg-gray-200 flex justify-center items-center py-1 px-4">

        <ul class="flex">
            <li> <a href="{{ route('posts.index') }}" class="mx-3 text-xs md:text-sm capitalize font-medium">home</a>
            </li>
            <li> <a href="{{ route('dashboard') }}" class="text-xs md:text-sm capitalize font-medium">dashboard</a>
            </li>
        </ul>
    </nav>
    @yield('content')
</body>

</html>
