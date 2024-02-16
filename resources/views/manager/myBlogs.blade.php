<x-layout>

    <x-layoutdash title=" My Blogs ">


        <div class="text-2xl font-bold mb-4"> My Blogs : you have {{ $sites->count() }} blogs </div>

        <br>


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






    </x-layoutdash>

</x-layout>
