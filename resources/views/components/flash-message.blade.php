@if(session()->has('message'))
<div x-data="{show: true}" x-show="show" x-init="setTimeout(() => show = false, 3000)"
class="fixed top-0 left-1/2 transform -translate-x-1/2 bg-red-400 text-white px-2 py-3 opacity-70 sm:px-8">
    <p>
        {{ session('message') }}
    </p>
</div>
@endif
