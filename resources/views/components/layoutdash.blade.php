<div class="bg-gray-100 font-family-karla flex">






    <!-- Some other Blade file -->
    @include('manager.partials._sidebarDesktop', ['title' => $title])


    <div class="w-full flex flex-col h-screen overflow-y-hidden">



        <!-- Mobile  -->
        {{-- <x-manager.partials.headerMobile/> --}}

        @include('manager.partials.headerMobile', ['title' => $title])



        <div class="w-full overflow-x-hidden border-t flex flex-col">



            <main class="w-full flex-grow p-6">

                {{-- content  --}}



                {{ $slot }}





            </main>


        </div>

    </div>


</div>
