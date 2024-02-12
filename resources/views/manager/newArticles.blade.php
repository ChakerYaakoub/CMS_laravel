<x-layout>
    <x-layoutdash title="Add New Blog">
        {{-- Pass both site_id and article_nb to the included partial --}}
        @include('manager.partials.article', ['site_id' => $site_id, 'article_nb' => $article_nb])
    </x-layoutdash>
</x-layout>
