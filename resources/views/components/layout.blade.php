<html lang="en" class="h-full bg-white">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    @vite('resources/css/app.css')
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>Task app</title>

</head>
<body class="h-full">
    <header>
        <nav class="bg-black mx-auto flex items-center justify-between p-4 lg:px-8" aria-label="Global">
            <div class="hidden lg:flex lg:flex-1 lg:justify-start">
                <div class="m-4">
                    <a href="/" class="no-underline text-white text-lg font-semibold">Home</a>
                </div>
            </div>
            @auth
                <div class="hidden lg:flex lg:flex-1 lg:justify-end">
                    <div class="m-4 mr-8">
                        <a href="/profile/{{auth()->user()->username}}" class="no-underline text-teal-600 hover:text-teal-800 text-lg font-semibold">Profile</a>
                    </div>
                    <div class=" mr-4 mt-4">
                        <form action="/logout" method="POST">
                            @csrf
                            <button class="text-orange-500 hover:text-orange-800 font-semibold">Logout</button>
                        </form>
                    </div>
                </div>
            @else
                <div class="hidden lg:flex lg:flex-1 lg:justify-end">
                    <div class="m-4">
                        <a href="/login" class="no-underline text-blue-600 hover:text-blue-950 text-lg font-semibold">Login</a>
                    </div>
                    <div class="m-4">
                        <a href="/register" class="no-underline text-green-600 hover:text-green-800 text-lg font-semibold">Register</a>
                    </div>
                </div>
            @endauth

        </nav>
    </header>

    @if(session()->has('success'))
        <div class="text-center py-4 lg:px-4">
            <div class="p-4 bg-green-700/50 items-center text-indigo-100 leading-none lg:rounded-full flex lg:inline-flex" role="alert">
                <span class="font-semibold mr-2 text-left flex-auto">{{session('success')}}</span>
            </div>
        </div>
    @elseif(session()->has('failure'))
        <div class="text-center py-4 lg:px-4">
            <div class="p-4 bg-red-700/50 items-center text-indigo-100 leading-none lg:rounded-full flex lg:inline-flex" role="alert">
                <span class="font-semibold mr-2 text-left flex-auto">{{session('failure')}}</span>
            </div>
        </div>
    @endif

    {{$slot}}

    <footer>
        <div class="mx-auto flex items-center justify-center p-6 lg:px-8" aria-label="Global">
            <p class="text-gray-700 text-lg font-semibold mb-3">App</p>
        </div>
    </footer>
    <script src="{{ asset('js/index.js') }}" defer></script>
</body>
</html>
