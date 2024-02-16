<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="icon" href="images/favicon1.ico" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
        integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdn.tailwindcss.com"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <link href='https://cdn.jsdelivr.net/npm/froala-editor@latest/css/froala_editor.pkgd.min.css' rel='stylesheet'
        type='text/css' />

    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        laravel: "#ef3b2d",
                    },
                },
            },
        };
    </script>
    <title>CMS corte </title>
    <style>
        *:focus {
            outline: 0;
        }

        * {
            outline: 0;

        }

        .font-family-karla {
            font-family: karla;
        }


        .bg-site {
            background: rgb(248 113 113);
        }

        .bg-side {
            background: #FAF0E6;
        }

        .cta-btn {
            color: #3d68ff;
        }

        .upgrade-btn {
            background: #1947ee;
        }

        .upgrade-btn:hover {
            background: #0038fd;
        }

        .active-nav-link {
            background: #F7BCBC;
        }

        .nav-item:hover {
            background: rgb(248 113 113);
        }

        .account-link:hover {
            background: #3d68ff;
        }
    </style>
</head>

<body class="relative min-h-screen pb-28">
    <nav class="flex justify-between items-center mb-4 text-black-50">
        <a href="/"><img class="w-36" src="{{ asset('images/logo.png') }}" alt="" class="logo" /></a>
        <ul class="flex space-x-6 mr-6 md:text-lg  sm:x-sm text-black-50">

            {{-- is login  --}}
            @auth

                <li class="hidden md:block">
                    <span class="font-bold uppercase ">
                        Welcome, {{ auth()->user()->name }}
                    </span>
                </li>

                <li>
                    <a href="/sites/manager/dashboard" class="hover:text-laravel"><i class="fa-solid fa-gear"></i> Manager
                        Blogs</a>
                </li>

                <li>
                    <form class="inline" method="POST" action="/logout">
                        @csrf
                        <button type="submit" class="hover:text-laravel ">
                            <i class="fa-solid fa-door-closed"></i> Logout
                        </button>

                    </form>
                </li>


                {{-- not login   --}}
            @else
                <li>
                    <a href="/register" class="hover:text-laravel "><i class="fa-solid fa-user-plus"></i> Register</a>
                </li>
                <li>
                    <a href="/login" class="hover:text-laravel"><i class="fa-solid fa-arrow-right-to-bracket"></i>
                        Login</a>
                </li>

            @endauth
        </ul>
    </nav>

    <main>



        {{-- VIEW Output --}}
        {{-- @yield('content') --}}

        {{--  or  --}}

        {{ $slot }}
    </main>




    {{-- // opacity-90 --}}
    <footer
        class="absolute z-50 bottom-0 left-0 w-full flex items-center justify-start font-bold bg-red-400 text-white h-24    md:justify-center mt-12">
        <p class="ml-2">CMS Corte Copyright &copy; 2022, All Rights reserved</p>


    </footer>


    <x-flash-message />
</body>

</html>
