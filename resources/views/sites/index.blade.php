
   
    {{-- if we use  @yield('content') in layout then    --}}
{{-- @extends('layout') --}}

{{-- @section('content') --}}


{{-- else if we use layout li componenr then  :  --}}

<x-layout>






@include('partials._hero')

@include('partials._search')




<div
class="lg:grid lg:grid-cols-2 gap-4 space-y-4 md:space-y-0 mx-4"
>

@unless (count($sites) ==0)
    

 
 @foreach($sites as $site)
<x-site-card :site="$site" />
 @endforeach

 @else 
 <h1>No Listings Found</h1>

 @endunless

</div>
 

{{-- @endsection --}}

</x-layout>