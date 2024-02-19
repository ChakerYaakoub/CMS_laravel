<x-layout>

    <x-layoutdash title="dashboard">

        @include('manager.partials._dashboard', [
            'totalVisits' => $totalVisits,
            'totalSites' => $totalSites,
            'reactions' => $reactions,
        ])





    </x-layoutdash>

</x-layout>
