<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>MedBlog</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.bunny.net/css2?family=Open+Sans:wght@400;600;700&display=swap">

        <!-- Styles -->
        @livewireStyles

        <!-- Scripts -->
        @livewireScripts
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased text-gray-900 text-sm bg-gray-100">
       <header class="flex items-center justify-between px-8 py-4">
           <a href="#" class="text-2xl"><img class="w-24 h-24" src="{{asset('image/MedBlog-1.png')}}" alt="logo"></a>
           <div class="flex items-center">
               @if (Route::has('login'))
                   <div class=" px-6 py-4 sm:block">
                       @auth
                           <form method="POST" action="{{ route('logout') }}">
                               @csrf
                               <a href="{{route('logout')}}"
                                                onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                   {{ __('Log Out') }}
                               </a>
                           </form>
                       @else
                           <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Log in</a>

                           @if (Route::has('register'))
                               <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Register</a>
                           @endif
                       @endauth
                   </div>
               @endif
               <a href="#">
                   <img src="https://www.gravatar.com/avatar/00000000000000000000000000000000?d=mp" alt="avatar"
                   class="w-10 h-10 rounded-full">
               </a>
           </div>
       </header>
    <main class="container mx-auto max-w-custom flex">
        <div class="w-70 mr-5">
            <div class="bg-white md:sticky md:top-8 border-2 border-blue rounded-xl mt-16"
                 style="border-image-source: linear-gradient(to bottom, rgba(50,138,241,0.22),rgba(99,123,255,0));
                    border-image-slice:1;
                    background-image: linear-gradient(to bottom,#ffffff,#ffffff),linear-gradient(to bottom,rgba(50,138,241,0.22),rgba(99,123,255,0));
                    background-origin: border-box;
                    background-clip: content-box, border-box;">
                <div class="text-center px-6 py-2 pt-6">
                    <h3 class="font-semibold text-base">Adauga o postare sau pune o intrebare</h3>
                    <p class="text-xs mt-4">
                        @auth
                            Lasa-ne sa stim ce te pune pe ganduri
                        @else
                            Trebuie sa te loghezi ca sa poti crea postari sau pune intrebari.
                        @endauth
                    </p>
                </div>
                @auth
                    <livewire:create-post/>
                @else
                    <div class="my-6 text-center">
                        <a href="{{route('login')}}" class="inline-block justify-center w-1/2 h-11 text-white text-xs bg-blue font-semibold rounded-xl border border-blue-200 hover:bg-blue-hover transition duration-150 ease-in px-6 py-3  ">
                            Login
                        </a>
                        <a href="{{route('register')}}" class="inline-block mt-3 justify-center w-1/2 h-11 text-xs bg-gray-100 font-semibold rounded-xl border border-gray-200 hover:border-gray-400 transition duration-150 ease-in px-6 py-3 ">
                            Sign up
                        </a>
                    </div>
                @endauth
            </div>
        </div>
        <div class="w-175">
            <nav class="flex items-center justify-between text-sm">
                <ul class="flex uppercase font-semibold border-b-4 pb-3 space-x-10">
                    <li><a href="#" class="border-b-4 pb-3 border-blue">Toate postarile(87)</a></li>
                    <li><a href="#" class="text-gray-400 transition duration-150 ease-in border-b-4 pb-3 hover:border-blue ">Postari preferate(6)</a></li>
                </ul>

                <ul class="flex uppercase font-semibold border-b-4 pb-3 space-x-10">
                    <li><a href="#" class="text-gray-400 transition duration-150 ease-in border-b-4 pb-3 hover:border-blue ">Postari populare(10)</a></li>
                </ul>
            </nav>
            <div class="mt-8">
                {{$slot}}
            </div>
        </div>
    </main>
    </body>
</html>
