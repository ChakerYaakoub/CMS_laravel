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
                        <p class="font-bold text-3xl">{{ $reactions->count() }} Reaction </p>
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
        <div class=" overflow-auto m-auto text-center items-center">
            <table class="m-auto bg-white  border-2  border-gray-100">
                <thead class="bg-gray-800 text-white border-2 border-gray-100">
                    <tr>
                        <th class="text-left py-3 px-4 uppercase font-semibold text-sm  border-2 border-gray-100">Site
                            Title</th>
                        <th class="text-left py-3 px-4 uppercase font-semibold text-sm border-2 border-gray-100"
                            colspan="3">
                            Reactions</th>
                        <th class="text-left py-3 px-4 uppercase font-semibold text-sm border-2 border-gray-100">
                            Visitors</th>
                        <th class="text-left py-3 px-4 uppercase font-semibold text-sm border-2 border-gray-100">Edit
                            Site</th>
                        <th class="text-left py-3 px-4 uppercase font-semibold text-sm border-2 border-gray-100">Delete
                            Site</th>
                    </tr>

                </thead>
                <tr class="bg-gray-500 text-white border-0">
                    <td></td>
                    <td class="border-2 border-gray-100">Likes</td>
                    <td class="border-2 border-gray-100">Dislikes</td>
                    <td class="border-2 border-gray-100">Loves</td>
                    <td class="border-none"></td>
                    <td class="border-none"></td>
                    <td class="border-none"></td>
                </tr>
                <tbody class="text-gray-700 items-center">
                    @foreach ($sites as $site)
                        <tr>
                            <td class="text-left py-3 px-4 border-x-2 border-gray-200  "><a class="hover:text-blue-500"
                                    href="/site/{{ $site->id }}">{{ $site->site_title }}</a></td>
                            <td class="text-left py-3 px-4 border">{{ $site->likes_count }}</td>
                            <td class="text-left py-3 px-4 border">{{ $site->dislikes_count }}</td>
                            <td class="text-left py-3 px-4 border">{{ $site->loves_count }}</td>
                            <td class="text-left py-3 px-4 text-center border">{{ $site->site_visits_count }}</td>
                            <td class="text-left py-3 px-4 border"><a class="hover:text-blue-500"
                                    href="edit/site/{{ $site->id }}"><button
                                        class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Edit</button></a>
                            </td>
                            <td class="border">
                                @include('sites.partials.deleteBtn', [
                                    'site' => $site,
                                    'class' => 'sm:w-full w-full',
                                ])
                            </td>
                        </tr>
                    @endforeach
                    @if ($sites->count() == 0)
                        <tr>
                            <td class="text-left py-3 px-4 w-full text-center" colspan="7">No sites found</td>
                        </tr>
                    @endif
                </tbody>
            </table>

        </div>
    </div>
</main>
