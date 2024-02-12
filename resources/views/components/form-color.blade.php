@props(['label', 'name', 'placeholder', 'value'])


<div class="text-center">
    <label for="hs-color-input" class="block text-sm font-medium mb-2 dark:text-white "> {{ $label }}
    </label>
    <input type="color"
        class="p-1 h-10 w-14 block bg-white border border-gray-200 cursor-pointer rounded-lg 
        disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-900 dark:border-gray-700"
        id="hs-color-input" title="Choose your color" value="{{ $value ?? old($name) }}" name="{{ $name }}">

    @error($name)
        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
    @enderror

</div>
