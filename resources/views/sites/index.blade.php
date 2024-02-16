{{-- if we use  @yield('content') in layout then    --}}
{{-- @extends('layout') --}}

{{-- @section('content') --}}


{{-- else if we use layout li componenr then  :  --}}

<x-layout>






    @include('partials._hero')

    @include('partials._search')






    @unless (count($sites) == 0)
        <div class="lg:grid lg:grid-cols-2 gap-4 space-y-4 md:space-y-0 mx-4">



            @foreach ($sites as $site)
                <x-site-card :site="$site" />
            @endforeach

        </div>
    @else
        <br />
        <br />
        <center>
            <h1>No Blogs Found</h1>
            <center />


        @endunless




        {{-- @endsection --}}

</x-layout>
