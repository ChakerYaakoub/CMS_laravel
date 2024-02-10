

<x-card>
    <div class="flex">
        <img
            class="hidden w-48 mr-6 md:block"
            src="{{asset('images/no-image.png')}}"
            alt="{{$site->site_name}}-image"
        />
        <div>
            <h3 class="text-2xl">
                <a href="/site/{{$site->id}}">{{$site->site_name}}</a>
 
                
            </h3>
            {{-- <div class="text-xl font-bold mb-4">{{$site->company}}</div> --}}
            <x-site-tags :tags-csv="$site->tags" />

            <div class="text-lg mt-4">
                {{-- <i class="fa-solid fa-location-dot"></i> {{$site->location}} --}}
            </div>
        </div>


    
 </div>

</x-card>   