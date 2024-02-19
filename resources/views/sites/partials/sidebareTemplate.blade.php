<nav class="fixed top-0 z-50 w-full bg-white border-b border-gray-200 dark:bg-gray-800 dark:border-gray-700">
    <div class="px-3 py-3 lg:px-5 lg:pl-3">
        <nav class="flex justify-between items-center mb-4">
            <a href="/"><img class="w-36" src="{{ asset('images/logo.png') }}" alt="" class="logo" /></a>
            <ul class="flex space-x-6 mr-6 md:text-lg  sm:x-sm" style="color : black">

                {{-- is login  --}}
                @auth

                    <li class="hidden md:block">
                        <span class="font-bold uppercase ">
                            Welcome, {{ auth()->user()->name }}
                        </span>
                    </li>

                    <li>
                        <a href="/sites/manager/dashboard" class="hover:text-laravel"><i class="fa-solid fa-gear"></i>
                            Manager
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
                        <a href="/register" class="hover:text-laravel"><i class="fa-solid fa-user-plus"></i> Register</a>
                    </li>
                    <li>
                        <a href="/login" class="hover:text-laravel"><i class="fa-solid fa-arrow-right-to-bracket"></i>
                            Login</a>
                    </li>

                @endauth
            </ul>
        </nav>
    </div>
</nav>

<aside id="logo-sidebar"
    class="fixed top-0 left-0 z-40 w-64 h-screen pt-40 transition-transform -translate-x-full bg-white border-r border-gray-200 sm:translate-x-0 dark:bg-gray-800 dark:border-gray-700"
    aria-label="Sidebar"
    style="background-color: {{ $site_color->background_color }}; 
     border-right: 2px solid rgba({{ hexdec(substr($site_color->section_separator_color, 1, 2)) }}, {{ hexdec(substr($site_color->section_separator_color, 3, 2)) }}, {{ hexdec(substr($site_color->section_separator_color, 5, 2)) }}, 0.5);">

    <div class="h-full
    px-3 pb-4 overflow-y-auto dark:bg-gray-800"
        style="background-color:{{ $site_color->background_color }} ;color : {{ $site_color->font_color }} ">
        <ul class="space-y-2 font-medium">

            <li>
                <p class="flex items-center space-x-3 rtl:space-x-reverse">
                    <img src="{{ $site->logo ? asset('storage/' . $site->logo) : 'images/no-image.png' }}"
                        alt="{{ $site->site_title }}-image" class="h-20 w-full rounded" />
                    {{-- <span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white">Flowbite</span> --}}
                </p>


            </li>

            <li>
                <a href="#introduction" {{-- text-gray-900  --}}
                    class="flex items-center p-2rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                    {{-- <span class="ms-3">{{ $site->site_title }}</span> --}}
                    <span class="ms-3"> 1 - Introduction</span>

                </a>
            </li>

            @foreach ($site_articles as $site_article)
                <li>
                    <a href="#article-{{ $loop->index + 1 }}" {{-- text-gray-900  --}}
                        class="flex items-center p-2rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                        <span class="ms-3"> {{ $loop->index + 2 }} - {{ $site_article->article_title }}</span>
                    </a>
                </li>
            @endforeach


            <li>

                <a href="#comments" {{-- text-gray-900  --}}
                    class="flex items-center p-2rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                    {{-- <span class="ms-3">{{ $site->site_title }}</span> --}}
                    <span class="ms-3">{{ count($site_articles) + 2 }} - comments</span>

                </a>
            </li>

            @if (auth()->user() && auth()->user()->id == $site->user_id)
                <li>

                    <a class="hover:text-blue-500" href="/sites/manager/edit/site/{{ $site->id }}"><button
                            class="bg-blue-500 w-full hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                            Edit
                        </button></a>

                </li>
                <li>
                    @include('sites.partials.deleteBtn', [
                        'site' => $site,
                        'class' => 'sm:w-full w-full',
                    ])
                </li>
            @endif

            {{-- <li>
                <a href="#about"
                    class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                    <span class="ms-3">about </span>
                </a>



            {{-- <li>
                <a href="#contact"
                    class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                    <span class="ms-3">contact </span>
                </a>
            </li> --}}



        </ul>
    </div>
</aside>

<div class="p-4 sm:ml-64"
    style="background-color:{{ $site_color->background_color }} ;color : {{ $site_color->font_color }} ">

    <button data-drawer-target="logo-sidebar" data-drawer-toggle="logo-sidebar" aria-controls="logo-sidebar"
        type="button" id="sidebar-toggle-btn" {{-- text-gray-500 --}}
        class="inline-flex items-center p-2 text-sm  rounded-lg sm:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600">
        <span class="sr-only">Open sidebar</span>
        <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20"
            xmlns="http://www.w3.org/2000/svg">
            <path clip-rule="evenodd" fill-rule="evenodd"
                d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z">
            </path>
        </svg>
    </button>


    {{-- // The content of the site is displayed here --}}


    <div id="content_side" class=" border-2  border-dashed rounded-lg dark:border-gray-700 mt-1"
        style=" border: 1px dashed {{ $site_color->section_separator_color }};
    ">


        @include('sites.partials.siteContents', [
            'site' => $site,
            'site_template' => $site_template,
            'site_color' => $site_color,
            'site_articles' => $site_articles,
            'comments' => $comments,
            'reactions' => $reactions,
        ])

    </div>


    <script>
        const sidebar = document.getElementById('logo-sidebar');
        const sidebarToggleBtn = document.getElementById('sidebar-toggle-btn');

        let itsOpen = false;

        sidebarToggleBtn.addEventListener('click', () => {

            sidebar.classList.toggle('sm:-translate-x-full');
            sidebar.classList.remove("-translate-x-full");

            itsOpen = true;

        });

        const content_side = document.getElementById('content_side');
        content_side.addEventListener('click', () => {

            if (itsOpen) {
                sidebar.classList.remove('sm:-translate-x-full');
                sidebar.classList.toggle("-translate-x-full");
            }


            itsOpen = false;


        });
    </script>
</div>
