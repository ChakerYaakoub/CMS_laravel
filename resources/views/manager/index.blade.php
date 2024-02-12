<x-layout>

    <x-layoutdash title="dashboard">

        @include('manager.partials._dashboard', [
            'totalVisits' => $totalVisits,
            'totalSites' => $totalSites,
            'totalReactions' => $totalReactions,
        ])





    </x-layoutdash>

</x-layout>
