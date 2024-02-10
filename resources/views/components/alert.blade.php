@props(['color' => '' , 'text1' => '', 'text2' => ''])

@php
    $colors = [
        'default' => 'bg-red-100 border border-red-500 text-red-900',
        'success' => 'bg-green-100 border border-green-500 text-green-900',
        'danger' => 'bg-red-100 border border-red-500 text-red-900',
        // Add more colors as needed
    ];

    $colorClass = $colors[$color] ?? $colors['default'];
@endphp





<div x-data="{ open: true }" x-show="open"  class=" {{ $colorClass }} relative  border-t-4  rounded-b  px-4 py-3 shadow-md" role="alert">
    <div class="flex">
      <div class="py-1"><svg class="fill-current h-6 w-6  mr-4 {{ $colorClass }}  border-0" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M2.93 17.07A10 10 0 1 1 17.07 2.93 10 10 0 0 1 2.93 17.07zm12.73-1.41A8 8 0 1 0 4.34 4.34a8 8 0 0 0 11.32 11.32zM9 11V9h2v6H9v-4zm0-6h2v2H9V5z"/></svg></div>
      <div>
        <p class="font-bold">{{$text1}} </p>
        <p class="text-sm">{{$text2}}</p>
      </div>

      <span @click="open = false" class="absolute top-0 bottom-0 right-0 px-4 py-3 cursor-pointer">
        <svg class="fill-current h-6 w-6 text-red-500" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
            <title>Close</title>
            <path d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z"/>
        </svg>
    </span>
 </div>
</div>


{{-- 
  <x-alert color="danger" text1="Holy smokes ! " text2="Something seriously bad happened"/>
  <x-alert color="success" text1="success !" text2="success success success success success" /> --}}
