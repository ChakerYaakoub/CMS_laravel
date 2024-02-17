<div class="mx-4" style="background-color:{{ $site_color->background_color }} ; color : {{ $site_color->font_color }} ">




    <div class="mt-10"
        style="background-color:{{ $site_color->background_color }} ; color : {{ $site_color->font_color }} ">

        <div class="mb-4 md:mb-0 w-full mx-auto relative">
            <div class="px-4 lg:px-0">
                {{-- text-gray-800  --}}
                <h2 id="introduction" class="text-4xl font-semibold leading-tight">
                    {{ $site->site_title }}
                </h2>

                <p class="text-xl">
                    <span class="font-bold text-xl">
                        tags :


                    </span>
                    <span class="py-2 text-green-700 inline-flex items-center justify-center mb-2">
                        {{ $site->tags }}

                    </span>

                </p>


            </div>

            <img src="{{ $site->BasicImage ? asset('storage/' . $site->BasicImage) : 'images/no-image.png' }}"
                alt="{{ $site->site_title }}-image" class="w-full p-1 lg:rounded" style="height: 28em;" />
        </div>

        <div class="flex flex-col lg:flex-row lg:space-x-12">
            {{-- text-gray-700 --}}

            <div class="px-4 lg:px-0 mt-12   leading-relaxed w-full lg:w-3/4">
                {{-- text-gray-800  --}}
                <h1 class="text-2xl  mb-4 mt-4 text-2xl font-bold">
                    1 - Intorduction :
                </h1>
                {{-- <p class="pb-6"> </p> --}}

                <div class="border-l-4 text-lg border-gray-500 pl-4 mb-6 italic rounded">
                    {{ $site->introduction }}
                </div>


                <br>
                <hr width="100%"
                    style=" border: 1px solid {{ $site_color->section_separator_color }};
                border-radius: 5x; "
                    noshade>
                <br>



                @foreach ($site_articles as $site_article)
                    {{-- text-gray-800  --}}
                    <h1 id="article-{{ $loop->index + 1 }}" class="text-2xlfont-semibold mb-4 mt-4 font-bold text-2xl">
                        {{ $loop->index + 2 }} - {{ $site_article->article_title }}

                    </h1>
                    <div class="fr-view">
                        {!! $site_article->article_content !!}

                    </div>
                    <br>
                    <hr width="100%"
                        style=" border: 1px solid {{ $site_color->section_separator_color }};
                    border-radius: 5px; "
                        noshade>
                    <br>
                @endforeach






            </div>

            <div class="w-full lg:w-1/4 m-auto mt-12 max-w-screen-sm">
                <div class="p-4 border-t border-b md:border md:rounded">

                    <div class="flex py-2">
                        <img src="{{ asset('images/noProfil.png') }}"
                            class="h-10 w-10 rounded-full mr-2 object-cover" />
                        <div>
                            {{-- text-gray-700 --}}
                            <p class="font-semibold  text-sm"> {{ $site->site_builder }} </p>
                            {{-- text-gray-600 --}}
                            <p class="font-semibold  text-xs"> writer </p>
                        </div>
                    </div>

                    <img src="{{ $site->logo ? asset('storage/' . $site->logo) : 'images/no-image.png' }}"
                        alt="{{ $site->site_title }}-image" />

                    <br>


                    <button {{--  --}}
                        class="px-2 py-1 text-gray-100  bg-green-700 flex w-full items-center justify-center rounded">
                        like
                        <i class='bx bx-user-plus ml-2'></i>
                    </button>


                </div>
            </div>

        </div>
    </div>


    {{--  commnet its here  --}}
    {{-- https://flowbite.com/blocks/publisher/comments/ --}}


    @include('sites.partials.comments', [
        'site' => $site,
        'site_template' => $site_template,
        'site_color' => $site_color,
        'site_articles' => $site_articles,
        'comments' => $comments,
    ])



</div>
