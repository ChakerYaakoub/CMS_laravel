<x-card>
    <div class="flex ">
        <img class="hidden w-48 mr-6 md:block"
            src="{{ $site->logo ? asset('storage/' . $site->logo) : 'images/no-image.png' }}"
            alt="{{ $site->site_title }}-image" />
        <div>
            <h3 class="text-2xl">
                <a href="/site/{{ $site->id }}">{{ $site->site_title }}</a>
            </h3>
            <br>
            <div class="text-xl font-bold mb-4">By : {{ $site->site_builder }}</div>
            {{-- <i class="fa-solid fa-user"></i> --}}
            <x-site-tags :tags-csv="$site->tags" />

            <div class="text-lg mt-4">
                <i class="fa-regular fa-clock"></i> {{ $site->created_at->format('Y-m-d ') }}
            </div>

            @if (auth()->user() && auth()->user()->id == $site->user_id)
                <div>

                    <a class=" absolute right-6 bottom-6 
                    hover:text-blue-500"
                        href="/sites/manager/edit/site/{{ $site->id }}"><button
                            class="bg-blue-500  hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                            Edit
                        </button></a>
                </div>
            @endif

        </div>



    </div>

</x-card>
