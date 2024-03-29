<nav class="bg-white border-gray-200 dark:bg-gray-900 dark:border-gray-700 w-full "
    style="background-color: {{ $site_color->background_color }};  
   color : {{ $site_color->font_color }} ;">
    <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4"
        style="background-color: {{ $site_color->background_color }};  
    color : {{ $site_color->font_color }} ;">
        <p class="flex items-center space-x-3 rtl:space-x-reverse">
            <img src="{{ $site->logo ? asset('storage/' . $site->logo) : 'images/no-image.png' }}"
                alt="{{ $site->site_title }}-image" class="h-20 w-full rounded border-solid border-2 border-gray-200 " />
            {{-- <span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white">Flowbite</span> --}}
        </p>
        <button id="openMenuPrincipal" data-collapse-toggle="navbar-dropdown" type="button" {{-- text-gray-500 --}}
            class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm  rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600"
            aria-controls="navbar-dropdown" aria-expanded="false">
            <span class="sr-only">Open main menu</span>
            <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                viewBox="0 0 17 14">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M1 1h15M1 7h15M1 13h15" />
            </svg>
        </button>
        <div class=" hidden w-full md:block md:w-auto" id="navbar-dropdown">
            <ul
                class="flex flex-col font-medium p-4 md:p-0 mt-4 border border-gray-100 rounded-lg bg-gray-50 md:space-x-8 rtl:space-x-reverse md:flex-row md:mt-0 md:border-0 md:bg-white dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700">
                <li>
                    <a href="#introduction"
                        class="block py-2 px-3   rounded md:bg-transparent md:text-blue-700 md:p-0 md:dark:text-blue-500 dark:bg-blue-600 md:dark:bg-transparent">
                        Introduction</a>
                </li>
                <li>
                    <button id="dropdownNavbarLink" data-dropdown-toggle="dropdownNavbar" {{-- text-gray-900  --}}
                        class="flex items-center justify-between w-full py-2 px-3 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 md:w-auto dark:text-white md:dark:hover:text-blue-500 dark:focus:text-white dark:border-gray-700 dark:hover:bg-gray-700 md:dark:hover:bg-transparent">
                        Sections
                        <svg class="w-2.5 h-2.5 ms-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            fill="none" viewBox="0 0 10 6">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 4 4 4-4" />
                        </svg></button>
                    <!-- Dropdown menu -->
                    <div id="dropdownNavbar"
                        class="z-10 hidden fixed font-normal w-60 bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700 dark:divide-gray-600">
                        {{-- text-gray-700  --}}
                        <ul class="py-2 text-sm dark:text-gray-400" aria-labelledby="dropdownLargeButton">

                            <div id="liHide">
                                <li>
                                    <a href="#introduction"
                                        class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                                        <span class="ms-3"> 1 - Introduction</span></a>
                                </li>

                                @foreach ($site_articles as $site_article)
                                    <li>
                                        <a href="#article-{{ $loop->index + 1 }}"
                                            class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                                            <span class="ms-3"> {{ $loop->index + 2 }} -
                                                {{ $site_article->article_title }}</span></a>
                                    </li>
                                @endforeach

                            </div>



                        </ul>

                    </div>
                </li>
                <li>
                    <a href="#comments"
                        class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">
                        Comments</a>
                </li>

                @if (auth()->user() && auth()->user()->id == $site->user_id)
                    <li class="hidden sm:block">

                        <a class="hover:text-blue-500" href="/sites/manager/edit/site/{{ $site->id }}">
                            <center><button
                                    class="bg-blue-500
                                sm:w-full w-1/4 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                    Edit
                                </button>
                            </center>
                        </a>



                    </li>
                    <li class="hidden sm:block">


                        @include('sites.partials.deleteBtn', [
                            'site' => $site,
                            'class' => 'sm:w-full w-1/4',
                        ])



                    </li>

                    <li class="block  sm:hidden">

                        <div class="flex justify-between">



                            <a class="hover:text-blue-500" href="/sites/manager/edit/site/{{ $site->id }}">
                                <center><button
                                        class="bg-blue-500
                                sm:w-full w-full hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                        Edit
                                    </button>
                                </center>
                            </a>

                            @include('sites.partials.deleteBtn', [
                                'site' => $site,
                                'class' => 'sm:w-full w-full',
                            ])


                        </div>

                    </li>
                @endif

            </ul>
        </div>
    </div>
</nav>

<div id="content_side" class=" border-2 sm:mx-20 mx-5  border-dashed rounded-lg dark:border-gray-700 mt-1"
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
    const dropdownNavbar = document.getElementById('dropdownNavbar');
    const ToggleBtn = document.getElementById('dropdownNavbarLink');
    const liHide = document.getElementById('liHide');

    const navbarDropdown = document.getElementById('navbar-dropdown');
    const openMenuPrincipal = document.getElementById('openMenuPrincipal');



    let itsOpen = false;
    let itsOpenMenuPrincipal = false;

    ToggleBtn.addEventListener('click', () => {

        if (itsOpen) {
            dropdownNavbar.classList.add('hidden');
            itsOpen = false;
            return;
        } else {
            dropdownNavbar.classList.remove('hidden');
            itsOpen = true;
        }



    });

    liHide.addEventListener('click', () => {

        if (itsOpen) {
            dropdownNavbar.classList.add('hidden');
            itsOpen = false;
            return;
        } else {
            dropdownNavbar.classList.remove('hidden');
            itsOpen = true;
        }



    });

    openMenuPrincipal.addEventListener('click', () => {

        if (itsOpenMenuPrincipal) {
            navbarDropdown.classList.add('hidden');
            itsOpenMenuPrincipal = false;
            return;
        } else {
            navbarDropdown.classList.remove('hidden');
            itsOpenMenuPrincipal = true;
        }
    });

    // openMenuPrincipal
</script>
