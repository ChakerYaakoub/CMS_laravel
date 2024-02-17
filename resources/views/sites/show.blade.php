<?php use Illuminate\Support\Facades\URL;
?>
{{-- @extends('layout') --}}
{{-- @section('content') --}}

<x-layout>

    <head>
        <style>
            main {
                background-color: {{ $site_color->background_color }};
                color: {{ $site_color->font_color }};
            }
        </style>
    </head>



    <a href="{{ url()->previous() }}" class="inline-block text-black ml-4 mb-4">
        <i class="fa-solid fa-arrow-left"></i> Back
    </a>
    {{-- {{ $site }} --}}
    {{-- {{ $site_template }} --}}
    {{-- {{ $site_color }} --}}

    <div class="fr-view">
        {{-- {!! $site_articles[0]->article_content !!} --}}

    </div>






    @if ($site_template == 'vertical_menu')
        @include('sites.partials.sidebareTemplate', [
            'site' => $site,
            'site_template' => $site_template,
            'site_color' => $site_color,
            'site_articles' => $site_articles,
            'comments' => $comments,
        ])
    @elseif ($site_template == 'horizontal_menu')
        @include('sites.partials.horizontalTemplate', [
            'site' => $site,
            'site_template' => $site_template,
            'site_color' => $site_color,
            'site_articles' => $site_articles,
            'comments' => $comments,
        ])
    @else
        @include('sites.partials.burgerTemplate', [
            'site' => $site,
            'site_template' => $site_template,
            'site_color' => $site_color,
            'site_articles' => $site_articles,
            'comments' => $comments,
        ])
    @endif




    {{-- @include('sites.partials.sidebareTemplate', [
        'site' => $site,
        'site_template' => $site_template,
        'site_color' => $site_color,
        'site_articles' => $site_articles,
    ]) --}}

    {{-- @include('sites.partials.siteContents', [
        'site' => $site,
        'site_color' => $site_color,
        'site_articles' => $site_articles,
    ]) --}
    }

    }








    {{-- @endsection --}}

    <script>
        console.log('site: ', @json($site_articles))
    </script>
    <script type='text/javascript' src='https://cdn.jsdelivr.net/npm/froala-editor@latest/js/froala_editor.pkgd.min.js'>
    </script>

</x-layout>
