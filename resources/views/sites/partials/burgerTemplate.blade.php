<nav class="border-gray-200 dark:bg-gray-800 dark:border-gray-700"
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
        <button id="dropdownNavbarLink" data-collapse-toggle="navbar-hamburger" type="button"
            class="inline-flex items-center justify-center p-2 w-10 h-10 text-sm text-gray-500 rounded-lg hover:bg-gray-100 focus:outline-none ring-gray-200 ring-2 focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600"
            aria-controls="navbar-hamburger" aria-expanded="false">
            <span class="sr-only">Open main menu</span>
            <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                viewBox="0 0 17 14">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M1 1h15M1 7h15M1 13h15" />
            </svg>
        </button>
        <div class="hidden w-full" id="navbar-hamburger">
            <ul class="flex flex-col font-medium mt-4 rounded-lg bg-gray-50 dark:bg-gray-800 dark:border-gray-700">




                <li>
                    <a href="#introduction" {{-- text-gray-900  --}} aria-current="page"
                        class="block py-2 px-3 text-gray-900 rounded   hover:bg-gray-100 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
                        {{-- <span class="ms-3">{{ $site->site_title }}</span> --}}
                        <span class="ms-3"> 1 - Introduction</span>

                    </a>
                </li>

                @foreach ($site_articles as $site_article)
                    <li>
                        <a href="#article-{{ $loop->index + 1 }}" {{-- text-gray-900  --}}
                            class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
                            <span class="ms-3"> {{ $loop->index + 2 }} - {{ $site_article->article_title }}</span>
                        </a>
                    </li>
                @endforeach


                <li>

                    <a href="#comments" {{-- text-gray-900  --}}
                        class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
                        {{-- <span class="ms-3">{{ $site->site_title }}</span> --}}
                        <span class="ms-3">{{ count($site_articles) + 2 }} - comments</span>

                    </a>
                </li>

                @if (auth()->user() && auth()->user()->id == $site->user_id)
                    <li class="flex justify-around pb-2">

                        <a class="hover:text-blue-500  " href="/sites/manager/edit/site/{{ $site->id }}">

                            <button
                                class="bg-blue-500 w-full m-auto hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                Edit
                            </button>
                        </a>

                        <br>

                        @include('sites.partials.deleteBtn', [
                            'site' => $site,
                            'class' => 'w-full m-auto',
                        ])


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
    ])



</div>

<script>
    const dropdownNavbar = document.getElementById('navbar-hamburger');
    const ToggleBtn = document.getElementById('dropdownNavbarLink');

    let itsOpen = false;

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
</script>
