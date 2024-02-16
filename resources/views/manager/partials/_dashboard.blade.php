<main class="w-full flex-grow p-6">

    {{-- Dashboard --}}

    {{-- Digital data  --}}
    <h1 class="text-3xl text-black pb-6">Digital data</h1>

    <div class="flex flex-wrap">
        <!--Metric Card-->
        <div class="w-full md:w-1/2 xl:w-1/3 p-6">

            <div class="bg-gradient-to-b from-pink-200 to-pink-100 border-b-4 border-pink-500 rounded-lg shadow-xl p-5">
                <div class="flex flex-row items-center">
                    <div class="flex-shrink pr-4">
                        <div class="rounded-full p-5 bg-pink-600"><i class="fa-brands fa-blogger fa-2x fa-inverse"></i>
                        </div>
                    </div>
                    <div class="flex-1 text-right md:text-center">
                        <h2 class="font-bold uppercase text-gray-600">Total Blogs</h2>
                        <p class="font-bold text-3xl">{{ $totalSites }} b <span class="text-pink-500"><i
                                    class="fas fa-caret-up"></i></span></p>
                    </div>



                </div>
            </div>

        </div>
        <!--/Metric Card-->


        <!--Metric Card-->
        <div class="w-full md:w-1/2 xl:w-1/3 p-6">

            <div
                class="bg-gradient-to-b from-green-200 to-green-100 border-b-4 border-green-600 rounded-lg shadow-xl p-5">
                <div class="flex flex-row items-center">
                    <div class="flex-shrink pr-4">
                        <div class="rounded-full p-5 bg-green-600">
                            <i class="fa-regular fa-eye fa-2x fa-inverse"></i>
                        </div>
                    </div>
                    <div class="flex-1 text-right md:text-center">
                        <h2 class="font-bold uppercase text-gray-600">Total visites </h2>
                        <p class="font-bold text-3xl">{{ $totalVisits }} v <span class="text-green-500"><i
                                    class="fas fa-caret-up"></i></span></p>
                    </div>
                </div>
            </div>

        </div>


        <!--Metric Card-->

        <div class="w-full md:w-1/2 xl:w-1/3 p-6">
            <div class="bg-gradient-to-b from-blue-200 to-blue-100 border-b-4 border-blue-500 rounded-lg shadow-xl p-5">
                <div class="flex flex-row items-center">
                    <div class="flex-shrink pr-4">
                        <div class="rounded-full p-5 bg-blue-600"><i
                                class="fa-brands fa-nfc-directional fa-2x fa-inverse"></i></div>
                    </div>
                    <div class="flex-1 text-right md:text-center">
                        <h2 class="font-bold uppercase text-gray-600">Total Reaction </h2>
                        <p class="font-bold text-3xl">{{ $totalReactions }} Reaction </p>
                    </div>
                </div>
            </div>

        </div>
    </div>



    {{-- table if we want  --}}

    <div class="w-auto mt-12">
        <p class="text-xl pb-3 flex items-center">
            <i class="fas fa-list mr-3"></i> My Latest Blogs
        </p>
        <div class=" overflow-auto m-auto">
            <table class=" m-auto  bg-white">
                <thead class="bg-gray-800 text-white">

                    <tr>
                        <th class=" text-left py-3 px-4 uppercase font-semibold text-sm">Site Title </th>

                        <th class="text-left py-3 px-4 uppercase font-semibold text-sm">Edit Site</th>
                    </tr>
                </thead>

                <tbody class="text-gray-700">

                    @foreach ($sites as $site)
                        <tr>

                            <td class="text-left py-3 px-4"><a class="hover:text-blue-500"
                                    href="/site/{{ $site->id }}">{{ $site->site_title }}</a></td>
                            <td class="text-left py-3 px-4"><a class="hover:text-blue-500"
                                    href="edit/site/{{ $site->id }}"><button
                                        class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                        Edit
                                    </button></a></td>
                        </tr>
                    @endforeach




                </tbody>
            </table>
        </div>
    </div>
</main>
